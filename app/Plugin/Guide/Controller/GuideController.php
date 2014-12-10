<?php

App::uses('AppController', 'Controller');

class GuideController extends AdminController {


	function index(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Guides'));
		$this->layout = 'default';
	}

	function view()
	{

	}

}
