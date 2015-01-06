<?php

	App::uses('GuidesAppController', 'Guide.Controller');

	class ChampionsController extends GuidesAppController
	{


		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('index');
		}
		public function index()
		{
			$this->layout = 'default';
			$this->set('title_for_layout', __('Guides League of Legends'));
			$d['champions'] = $this->Champion->find('all', array('order' => 'Champion.name','fields' => array('Champion.id','Champion.name','Champion.image'),'recursive' => 2));
			$this->loadModel('Role');
			$d['roles'] = $this->Role->find('list',array('fields' => array('Role.role')));
			$this->set($d);
		}

		public function view()
		{

		}
	}