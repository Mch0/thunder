<?php

	App::uses('GuidesAppController', 'Guide.Controller');

	class ChampionsController extends GuidesAppController
	{

		public $paginate = array(
			'fields' => array(
				'Champion.id',
				'Champion.name',
			),
			'limit' => 150);

		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('index');
			$this->Auth->allow('view');
		}

		/*=======================================================================*/
		/*								FRONT									 */
		/*=======================================================================*/
		public function index()
		{
			$this->layout = 'default';
			$this->set('title_for_layout', __('Guides League of Legends'));
			$d['champions'] = $this->Champion->find('all',
				array('order' => 'Champion.name',
					  'fields' => array('Champion.id','Champion.name','Champion.image'),
					  'recursive' => 2));
			$this->loadModel('Role');
			$d['roles'] = $this->Role->find('list',array('fields' => array('Role.role')));
			$this->set($d);
		}

		public function view()
		{

		}

		/*=======================================================================*/
		/*								ADMIN									 */
		/*=======================================================================*/

		function admin_index()
		{
			$this->Champion->recursive = 0;
			if ($this->request->isGet()) {
				$data = $this->paginate();
			}
			$this->set('title_for_layout', __('Admin | Liste des champions'));
			$d['champions'] = $data;
			$this->set($d);
		}

		function admin_add()
		{
			$this->set('title_for_layout', __('Admin | Créer un champion'));
			$errors = array();
			$this->request->data['Champion']['user_id'] = $this->Auth->user('id');
			if ($this->request->is('post'))
			{

				$this->Champion->create();
				if ($this->Champion->save($this->request->data)) {
					$this->Cookie->delete('srcPassArg');
					$this->redirect(array('action' => 'admin_index'));
				} else {
					$errors = $this->Champion->validationErrors;
				}
			}
		}
	}