<?php
App::uses('AuthAclAppController', 'AuthAcl.Controller');
/**
 * Groups Controller
 *
*/
class AuthAclController extends AuthAclAppController {

	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	var $layout = 'waiting';


	public function index(){
		$this->set('title_for_layout', __('!'));
	}
}
