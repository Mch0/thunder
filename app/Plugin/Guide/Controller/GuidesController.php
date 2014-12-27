<?php

	App::uses('GuidesAppController', 'Guide.Controller');

class GuidesController extends GuidesAppController {


	public $paginate = array(
		'fields' => array(
			'Guide.id',
			'Guide.title',
			'Guide.nb_acces',
			'Guide.online',
			'Guide.created',
			'Guide.modified',
			'Champion.name',
			'Role.role'
	));

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

/*=======================================================================*/
/*								FRONT									 */
/*=======================================================================*/
	function index(){


		$this->set('title_for_layout', __('Guides League of Legends'));
		$this->layout = 'default';
		$d['guides'] = $this->Guide->find('first',array(
			'conditions' => array('Guide.id' => 1),
		));
		$this->set($d);
	}

	function view()
	{

	}
/*=======================================================================*/
/*								ADMIN									 */
/*=======================================================================*/

	function admin_index()
	{
		if($this->request->isGet())
		{
			$data = $this->paginate();
		}
		$this->set('title_for_layout', __('Admin | Liste des guides'));
		$d['guides'] = $data;
		$this->set($d);

	}

	function admin_add()
	{
		$errors = array();
		$this->request->data['Guide']['user_id'] = $this->Auth->user('id');
		//var_dump($this->request->data);
		if($this->request->is('get'))
		{
			//Récupération des roles sous forme de liste
			//http://book.cakephp.org/2.0/fr/models/retrieving-your-data.html#find-list
			$this->loadModel('Role');
			$d['roles'] = $this->Role->find('list',array('fields' => array('Role.role')));

			//Récupération des champions
			$this->loadModel('Champion');
			$d['champions'] = $this->Champion->find('list',array('fields' => array('Champion.name')));
			$this->set($d);
		}
		if ($this->request->is('post')) {
			$this->Guide->create();
			if ($this->Guide->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Article->validationErrors;
			}
		}
	}

	function admin_edit()
	{

	}

	function admin_delete()
	{

	}

	function admin_view()
	{

	}



}
