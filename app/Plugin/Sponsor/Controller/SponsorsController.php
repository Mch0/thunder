<?php

	App::uses('SponsorsAppController', 'Sponsor.Controller');

	class SponsorsController extends SponsorsAppController
	{
		public function index()
		{
			$this->set('title_for_layout', __('Sponsors thunderbot'));
			$this->layout = 'default';
		}
	}