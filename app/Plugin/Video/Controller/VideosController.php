<?php
App::uses('VideoAppController', 'Video.Controller');

class VideosController extends VideoAppController {
	
	public $helpers=array('Vothumb.Vothumb') ;
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
		$this->Auth->allow('index');	
		$this->Auth->allow('sidebar');
	}



	function sidebar($id = null,$slug = null){
		$videos = $this->Video->find('all',array(
			'conditions' => array('online'=>1),
			'limit' => 8,
		));	
		return $videos;

	}



	function index() {
		$this->set('title_for_layout', __('Videos'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		$d['videos'] = $this->Paginate('Video',array('online'=>1));
		$this->set($d);
	}



	function view($id = null,$slug = null){
		parent::beforeFilter(); 
		$this->layout = 'default';
	    $this->Video->updateAll(
	        array('Video.nb_acces'=>'Video.nb_acces +1'),
	        array('Video.slug'=>$slug)
	    );
		if(!$id)
			throw new NotFoundException('Aucun video ne correspond à cet ID');
		$video = $this->Video->find('first',array(
		 	'conditions' => array('Video.id' => $id),
		 	'recursive'  => 0
		));
		if(empty($video))
			throw new NotFoundException('Aucun video ne correspond à cet ID'); 
		if($slug != $video['Video']['slug'])
			$this->redirect($video['Video']['link'],301); 
		$d['video'] = $video;
		
		$comments = $this->Video->Comment->find('all', array(
		'conditions' => array('Comment.ref_id' => $video['Video']['id']),
		'contain'    => array('User'),
		'fields'     => array('Comment.id', 'Comment.user_id', 'Comment.content','Comment.created','User.user_name','User.id', 'User.avatar' ,'Comment.username','Comment.mail'),
		));


		//video
		$this->loadModel('Video');
		$d['videos']  = $this->Video->find('all', array(
			'conditions' => array('online' => 1),
			'limit' => 9,
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
		$this->set(compact('video','comments'));
		$this->set($d);
	}


	public function admin_index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Video->recursive = 0;
		
		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Video']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Video']['page'] = $this->request->named['page'];
				}else{
					$filter['Video']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Video'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Video'])){
					$this->request->Video = am($this->request->data,$filter);
				}
			}
		}
		
		
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Video']) && !empty($this->data['Video']['filter'])){
			$conditions = array('webtv_title LIKE '  => '%'.trim($this->data['Video']['filter']).'%');
			$passArg = $this->data['Video'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Video']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Video']['page'];
			}
		}
		
		//$paginate = array('limit' => 2);
		$paginate = array();
		
		if (!empty($conditions)){
			$paginate['conditions'] = $conditions;
		}
		
		//print_r($this->data);
		
		$this->paginate = $paginate;
		
		$this->set('passArg',$passArg);
		
		if (!empty($passArg)){
			$this->Cookie->write('srcPassArg',$passArg);
		}
		
		$this->set('videos', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid Video'));
		}
		$this->set('webtv', $this->Video->read(null, $id));
	}

	public function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Video->create();
			if ($this->Video->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Video->validationErrors;
			}
		}
		$categories = $this->Video->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$videoTypes = $this->Video->VideoType->find('list',array(
				'fields' => array('VideoType.id', 'VideoType.name'),
		));
		$this->set('errors',$errors);
		$this->set(compact('categories',"videoTypes"));
	}

	public function admin_edit($id = null) {
		if($this->request->is('put') || $this->request->is('post')){
			if($this->Video->save($this->request->data)){
				$this->Session->setFlash("Le contenu a bien été modifié","notif");
				$this->redirect(array('action'=>'admin_index'));
			} 
		}elseif($id){
			$this->Video->id = $id;
			$this->request->data = $this->Video->read();
		}else{
		}
		$d['categories'] = $this->Video->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
				));
		$videoTypes = $this->Video->VideoType->find('list',array(
				'fields' => array('VideoType.id', 'VideoType.name'),
		));
		$this->set($d);
		$this->set(compact('categories',"videoTypes"));
	}



	public function admin_edit_streamer($id = null) {
		$errors = array();
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Video->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Video->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Video->read(null, $id));
		}
		$d['categories'] = $this->Video->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
				));
		$videoTypes = $this->Video->VideoType->find('list',array(
				'fields' => array('VideoType.id', 'VideoType.name'),
		));
		$eventTypes = $this->Video->EventType->find('list',array(
				'fields' => array('EventType.id', 'EventType.name'),
		));
		$this->set($d);
		$this->set(compact('categories','videoTypes','eventTypes'));
	}



	public function admin_edit_image($id = null) {
		$errors = array();
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Video->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Video->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Video->read(null, $id));
		}
		$d['categories'] = $this->Video->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
				));
		$videoTypes = $this->Video->VideoType->find('list',array(
				'fields' => array('VideoType.id', 'VideoType.name'),
		));
		$this->set($d);
		$this->set(compact('categories','videoTypes'));
	}


	public function admin_delete($id = null) {
		$this->Session->setFlash('L\'article a bien été supprimé a bien été supprimée','notif'); 
		$this->Video->delete($id); 
		$this->redirect(array('action' => 'admin_index')); 
	}



}
