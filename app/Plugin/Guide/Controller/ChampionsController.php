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
			$d['champions'] = $this->Champion->find('first');
			var_dump($d);
			die();
			$this->set($d);
		}
	}