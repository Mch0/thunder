<?php

	App::uses('SponsorsAppController', 'Sponsor.Controller');

	class SponsorsController extends SponsorsAppController
	{

		/**
		 * Override pour définir les méthodes auxquels un visiteur non logué peut accéder
		 */
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('index');
		}

		public function index()
		{
			$this->set('title_for_layout', __('Sponsors thunderbot'));
			$this->layout = 'default';
		}
	}