<?php
App::uses('EquipesAppController', 'Equipe.Controller');

class EquipesController extends EquipesAppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
		$this->Auth->allow('index2');
	}


	function index2($id = null,$slug = null){


		//image
		$this->loadModel('User');
		$d['users']  = $this->User->find('all', array(
			'limit' => 10,
        ));

		parent::beforeFilter(); 
		$this->layout = 'default';
		$paginate = array('limit' => 200);
		$d['equipes'] = $this->Paginate('Equipe');
		$this->set($d);
	}




	function index() {
		parent::beforeFilter(); 
		$this->layout = 'default';
		$paginate = array('limit' => 200);
		$d['equipes'] = $this->Paginate('Equipe');
		$this->set($d);
	}





	public function admin_index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Equipe->recursive = 0;
		
		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Equipe']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Equipe']['page'] = $this->request->named['page'];
				}else{
					$filter['Equipe']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Equipe'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Equipe'])){
					$this->request->Equipe = am($this->request->data,$filter);
				}
			}
		}
		
		
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Equipe']) && !empty($this->data['Equipe']['filter'])){
			$conditions = array('webtv_title LIKE '  => '%'.trim($this->data['Equipe']['filter']).'%');
			$passArg = $this->data['Equipe'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Equipe']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Equipe']['page'];
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
		
		$this->set('equipes', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->Equipe->id = $id;
		if (!$this->Equipe->exists()) {
			throw new NotFoundException(__('Invalid Equipe'));
		}
		$this->set('webtv', $this->Equipe->read(null, $id));
	}

	public function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Equipe->create();
			if ($this->Equipe->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Equipe->validationErrors;
			}
		}
		$this->set('errors',$errors);
	}

	public function admin_edit($id = null) {
		$errors = array();
		$this->Equipe->id = $id;
		if (!$this->Equipe->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Equipe->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Equipe->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Equipe->read(null, $id));
		}
		$this->set('errors',$errors);
	}



	public function admin_edit_streamer($id = null) {
		$errors = array();
		$this->Equipe->id = $id;
		if (!$this->Equipe->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Equipe->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Equipe->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Equipe->read(null, $id));
		}
		$d['categories'] = $this->Equipe->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
				));
		$videoTypes = $this->Equipe->VideoType->find('list',array(
				'fields' => array('VideoType.id', 'VideoType.name'),
		));
		$eventTypes = $this->Equipe->EventType->find('list',array(
				'fields' => array('EventType.id', 'EventType.name'),
		));
		$this->set($d);
		$this->set(compact('categories','videoTypes','eventTypes'));
	}



	public function admin_edit_image($id = null) {
		$errors = array();
		$this->Equipe->id = $id;
		if (!$this->Equipe->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Equipe->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Equipe->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Equipe->read(null, $id));
		}
		$this->set('errors',$errors);
	}


	public function admin_delete($id = null) {
		$this->Session->setFlash('L\'article a bien été supprimé a bien été supprimée','notif'); 
		$this->Equipe->delete($id); 
		$this->redirect(array('action' => 'admin_index')); 
	}

}
