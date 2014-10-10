<?php
App::uses('AdminController', 'Controller');
class CommentsController extends AdminController{

	public function beforeFilter(){
		parent::beforeFilter();
		extract(Configure::read('Plugin.Comment.user'));
		$this->paginate = array(
			'fields' => array("Comment.username","Comment.mail","$model.$username","$model.$mail","Comment.content","Comment.id"),
			'contain'=> array($model),
			'order'   => 'Comment.id DESC'
		);
	}



    function edit($id = null){
		parent::beforeFilter(); 
		$this->layout = 'default';

        if( $id ){
            $comment = $this->Comment->find('first', array(
                'conditions' => array('Comment.user_id' => $this->Auth->user("id"), 'Comment.id' => $id)
            ));
            if(empty($comment)){
                $this->Session->setFlash("Vous ne pouvez pas éditer ce comment","flash", array('class' => 'error'), 'commentForm');
        		return $this->redirect($this->referer());
            }
        }
        $this->request->data['Comment']['id'] = $this->Comment->id = $id; 
        $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
		if($this->request->is('post') || $this->request->is('put')){
			$this->Comment->save($this->request->data); 
			$this->Session->setFlash("La Comment a bien été sauvegardée","notif");
        	return $this->redirect('http://www.thunderbot.gg');
		}elseif($id){
			$this->Comment->id = $id; 
			$this->request->data = $this->Comment->read(); 
		}
    }



	function delete($id = null) {
        $comment = $this->Comment->findById($id, array('Comment.id','Comment.user_id'));
        if(
            $this->Auth->user('id') == $comment['Comment']['user_id']
        ){
		$this->Comment->delete($id); 
		$this->Session->setFlash("Commentaire supprimé","flash", array('class' => 'success'), 'commentForm');
        }else{
            $this->Session->setFlash("Vous n'avez pas le droit de supprimer ce commentaire", "flash", array('class' => 'error'), 'commentForm');
        }
        return $this->redirect($this->referer());
	}


	
	function add(){
		$referer = $this->referer().'#commentForm';
		if(!empty($this->request->data)){
			$user_id = $this->Auth->user("id");

			// We add new datas
			$this->request->data['Comment']['ip'] = $this->getIp();
			$this->request->data['Comment']['user_id'] = $user_id ? $user_id : 0;

			$this->Comment->create($this->request->data, true);

			$model = ClassRegistry::init($this->request->data['Comment']['ref']);

			// Does this record exists ?
			if(!$model->exists($this->request->data['Comment']['ref_id'])){
				$this->Session->setFlash(__("Impossible de commenter ce contenu2"), "flash", array('class' => 'error'), 'commentForm');
				return $this->redirect($referer);
			}

			if($this->request->data['Comment']['parent_id'] != 0 && !$this->Comment->exists($this->request->data['Comment']['parent_id'])){
				$this->Session->setFlash(__("Impossible de répondre à ce commentaire"), "flash", array('class' => 'error'), 'commentForm');
			}

			// Does this comment validates ?
			if( $this->Comment->validates() || ($user_id && !empty($this->request->data['Comment']['content'])) ){

				// Spam is configured ?
				if(Configure::read('Plugin.Comment.akismet') && !$user_id){
					$is_spam = $this->Comment->isSpam();
					if(!Configure::read('Plugin.Comment.keepSpam') && $is_spam){
						$this->Session->setFlash(__("Ce commentaire a été considéré comme spam et ne sera pas sauvegardé"), "flash", array('class' => 'error'), 'commentForm');
						return $this->redirect($referer);
					}elseif($is_spam){
						$this->Comment->data['Comment']['spam'] = 1;
					}
				}

				$this->Session->setFlash(__("<strong>Merci votre commentaire a été sauvegardé</strong>"), "flash", array('class' => 'success'), 'commentForm');
				$this->Comment->save(null, false);
				return $this->redirect($referer);

			}else{

				$this->Session->setFlash(__("Certains champs n'ont pas été rempli correctement, merci de corriger vos erreurs"), "flash", array('class' => 'error'), 'commentForm');
				return $this->redirect($referer);

			}
		}
	}


	function admin_index(){
		$comments = $this->paginate('Comment');
		$this->set(compact('comments'));

	}

	function admin_delete($id = null) {
		$this->Comment->delete($id);
		return $this->redirect($this->referer());
	}

	function admin_edit($id = null){
		if($this->request->is('post') || $this->request->is('put')){
			$this->Comment->save($this->request->data); 
			$this->Session->setFlash("La Comment a bien été sauvegardée","notif");
			$this->redirect(array('action'=>'admin_index'));
		}elseif($id){
			$this->Comment->id = $id; 
			$this->request->data = $this->Comment->read(); 
		}
	}

	private function getIp(){
		$ip;
		if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
		else
		$ip = false;
		return $ip;
	}

}