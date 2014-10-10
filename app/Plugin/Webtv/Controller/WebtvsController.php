<?php
App::uses('WebtvAppController', 'Webtv.Controller');
/**
 * Chaines Controller
 *
 * @property Webtv $Webtv
*/
class WebtvsController extends WebtvAppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('sidebar_webtv');
		$this->Auth->allow('index');	
		$this->Auth->allow('index2');	
		$this->Auth->allow('view');
	}


	function sidebar_webtv($id = null,$slug = null){
		$webtvs = $this->Webtv->find('all',array(
			'conditions' => array('online'=>1),
			'limit' => 1,
		));	
		return $webtvs;
	}





	function index() {
		$this->set('title_for_layout', __('La TV ThunderBot c\'est des programmes et des joueurs pro sur League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';


		//webtv
		$webtvs = $this->Webtv->find('all',array(
			'conditions' => array('online'=>1),
			'limit' => 1,
		));
		//debug($webtvs);
		$this->set(compact('webtvs','webtvs'));
		$this->set($webtvs);
	}

 


	function index2() {
		$this->set('title_for_layout', __('La TV ThunderBot c\'est des programmes et des joueurs pro sur League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';


		//webtv
		$webtvs = $this->Webtv->find('all',array(
			'conditions' => array('online'=>1),
			'limit' => 1,
		));	
		//debug($webtvs);
		$this->set(compact('webtvs','webtvs'));
		$this->set($webtvs);
	}

 
















	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Webtv->recursive = 0;
		
		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Webtv']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Webtv']['page'] = $this->request->named['page'];
				}else{
					$filter['Webtv']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Webtv'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Webtv'])){
					$this->request->Webtv = am($this->request->data,$filter);
				}
			}
		}
		
		
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Webtv']) && !empty($this->data['Webtv']['filter'])){
			$conditions = array('webtv_title LIKE '  => '%'.trim($this->data['Webtv']['filter']).'%');
			$passArg = $this->data['Webtv'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Webtv']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Webtv']['page'];
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
		
		$this->set('webtvs', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this->Webtv->id = $id;
		if (!$this->Webtv->exists()) {
			throw new NotFoundException(__('Invalid Webtv'));
		}
		$this->set('webtv', $this->Webtv->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Webtv->create();
			if ($this->Webtv->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Webtv->validationErrors;
			}
		}
		$categories = $this->Webtv->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$this->set('errors',$errors);
		$this->set(compact('categories'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function stream_edit($id = null) {
		$errors = array();
		$this->Webtv->id = $id;
		if (!$this->Webtv->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Webtv->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Webtv->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Webtv->read(null, $id));
		}
		$categories = $this->Webtv->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$this->set('errors',$errors);
		$this->set(compact('categories'));
		$this->set('eventTypes', $this->Webtv->EventType->find('list'));
	}



	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if($this->request->is('put') || $this->request->is('post')){
			if($this->Webtv->save($this->request->data)){
				$this->Session->setFlash("Le contenu a bien été modifié","notif");
				$this->redirect(array('action'=>'admin_index'));
			} 
		}elseif($id){
			$this->Webtv->id = $id;
			$this->request->data = $this->Webtv->read();
		}else{
		}
		$d['categories'] = $this->Webtv->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
				));
		$this->set($d);
	}


	public function admin_edit_image($id = null) {
		$errors = array();
		$this->Webtv->id = $id;
		if (!$this->Webtv->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Webtv->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Webtv->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Webtv->read(null, $id));
		}
		$categories = $this->Webtv->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$this->set('errors',$errors);
		$this->set(compact('categories'));

	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Session->setFlash('L\'article a bien été supprimé a bien été supprimée','notif'); 
		$this->Webtv->delete($id); 
		$this->redirect(array('action' => 'admin_index')); 
	}

}
