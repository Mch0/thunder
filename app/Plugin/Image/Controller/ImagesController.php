<?php
class ImagesController extends ImageAppController {



	public $helpers=array('Vothumb.Vothumb') ;


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
		$this->Auth->allow('view');
	}

	/*
	function sidebar_img($id = null,$slug = null){
		$images = $this->Image->find('all',array(
			'conditions' => array('validate'=>1,  'online'=>1),
			'limit' => 5,
		));	
		return $images;
	}*/



	function index() {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		$d['images'] = $this->Paginate('Image',array('validate'=>1), array( 
		));


		$this->loadModel('Video');
		$d['videos']  = $this->Video->find('all', array(
			'conditions' => array('online' => 1),
			'limit' => 10,
			'order' => array('Video.created' => 'desc'),
			'fields' => array(
	  			'Video.id', 
	  			'Video.video_title',
	  			'Video.comment_count', 
	  			'Video.slug',
	  			'Video.photo',
	  			'Video.photo_dir',
        )));

        
		$this->set(compact('article'));
		$this->set($d);
	}


	function view($id = null,$slug = null){
		parent::beforeFilter(); 
		$this->layout = 'default';

	    $this->Image->updateAll(
	        array('Image.nb_acces'=>'Image.nb_acces +1'),
	        array('Image.slug'=>$slug)
	    );
		if(!$id)
			throw new NotFoundException('Aucun image ne correspond à cet ID');
		$image = $this->Image->find('first',array(
		 	'conditions' => array('Image.id' => $id),
		 	'recursive'  => 0
		));
		if(empty($image))
			throw new NotFoundException('Aucun image ne correspond à cet ID'); 
		if($slug != $image['Image']['slug'])
			$this->redirect($image['Image']['link'],301); 
		$d['image'] = $image;
		$comments = $this->Image->Comment->find('all', array(
		'conditions' => array('Comment.ref_id' => $image['Image']['id']),
		'contain'    => array('User'),
		'fields'     => array('Comment.id', 'Comment.user_id', 'Comment.content','Comment.created','User.user_name','User.id', 'User.avatar' ,'Comment.username','Comment.mail'),
		));


		$this->loadModel('Video');
		$d['videos']  = $this->Video->find('all', array(
			'conditions' => array('online' => 1),
			'limit' => 10,
			'order' => array('Video.created' => 'desc'),
			'fields' => array(
	  			'Video.id', 
	  			'Video.video_title',
	  			'Video.comment_count', 
	  			'Video.slug',
	  			'Video.photo',
	  			'Video.photo_dir',
        )));


		$this->helpers[] = 'Comment.Comment';
		$this->set(compact('image','comments'));
		$this->set($d);
	}











/* PRIVATE */



	function index_user() {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		$d['images'] = $this->Image->find('all', array(
		'conditions' => array('validate'=> 0, array('Image.user_id' => $this->Auth->user("id")))
		));
		$this->set(compact('images'));
		$this->set($d);
	}

	function index_user_validate() {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		$d['images'] = $this->Image->find('all', array(
		'conditions' => array('validate'=> 1, array('Image.user_id' => $this->Auth->user("id")))
		));
		$this->set(compact('images'));
		$this->set($d);
	}



	public function add() {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		$errors = array();
		$this->request->data['Image']['user_id'] = $this->Auth->user('id');
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'index_user'));
			} else {
				$errors = $this->Image->validationErrors;
			}
		}
	}


	public function edit($id = null) {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';

        if( $id ){
            $validate = $this->Image->find('all', array(
                'conditions' => array('validate'=> 0)
            ));
            if(empty($validate)){
                $this->Session->setFlash("Vous ne pouvez pas éditer cette image","flash");
                return $this->redirect(array('action' => 'index_user'));
            }
        }

        if( $id ){
            $image = $this->Image->find('first', array(
                'conditions' => array('Image.user_id' => $this->Auth->user("id"), 'Image.id' => $id)
            ));
            if(empty($image)){
                $this->Session->setFlash("Vous ne pouvez pas éditer cette image","flash");
                return $this->redirect(array('action' => 'index_user'));
            }
        }
		if($this->request->is('put') || $this->request->is('post')){
			if($this->Image->save($this->request->data)){
				$this->request->data['Image']['id'] = $image['Image']['id'];
				$this->Session->setFlash("Le contenu a bien été modifié","notif");
				$this->redirect(array('action'=>'index_user'));
			} 
		}elseif($id){
			$this->Image->id = $id;
			$this->request->data['Image']['id'] = $image['Image']['id'];
			$this->request->data = $this->Image->read();
		}else{
		}
		$d['users'] = $this->Image->User->find('list',array(
				'fields' => array('User.id', 'User.name'),
				));
		$this->set($d);
		$this->set(compact('users'));
	}






	public function delete($id = null) {
        $image = $this->Image->findById($id, array('Image.id','Image.user_id'));
        if(
            $this->Auth->user('id') == $image['Image']['user_id']
        ){
		$this->Image->delete($id); 
		$this->Session->setFlash("Commentaire supprimé","flash", array('class' => 'success'), 'commentForm');
        }else{
            $this->Session->setFlash("Vous n'avez pas le droit de supprimer ce commentaire", "flash", array('class' => 'error'), 'commentForm');
        }
        return $this->redirect(array('action' => 'index_user'));
	}















/* ADMIN*/


	public function admin_validate() {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		$d['images'] = $this->Image->find('all', array(
		'conditions' => array('validate'=>0,  'online'=>1),
		));
		$this->set(compact('image'));
		$this->set($d);
	}




	public function admin_index() {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		$d['images'] = $this->Image->find('all', array(
		'conditions' => array('validate'=>1,  'online'=>1),
		));
		$this->set(compact('image'));
		$this->set($d);
	}

	public function admin_add() {
		$errors = array();
		$this->request->data['Image']['user_id'] = $this->Auth->user('id');
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_validate'));
			} else {
				$errors = $this->Image->validationErrors;
			}
		}

		$this->set(compact());
	}

	public function admin_edit($id = null) {
		if($this->request->is('put') || $this->request->is('post')){
			if($this->Image->save($this->request->data)){
				$this->Session->setFlash("Le contenu a bien été modifié","notif");
				$this->redirect(array('action'=>'admin_validate'));
			} 
		}elseif($id){
			$this->Image->id = $id;
			$this->request->data = $this->Image->read();
		}else{
		}
		$this->set($d);
	}

	public function admin_delete($id = null) {
		$this->Session->setFlash('L\'article a bien été supprimé a bien été supprimée','notif'); 
		$this->Image->delete($id); 
		$this->redirect(array('action' => 'admin_validate')); 
	}










}