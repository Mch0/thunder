<?php
App::uses('AdminController', 'Controller');
class ContactController extends AdminController{

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}


	function index(){
		parent::beforeFilter(); 
		$this->layout = 'default';
		if($this->request->is('post')){
			if(!empty($this->request->data['Contact']['website'])){
				$this->Session->setFlash("Votre mail nous est bien parvenu","ok");
				$this->request->data = array(); 
			}else{
				if($this->Contact->send($this->request->data['Contact'])){
					$this->Session->setFlash("Votre mail nous est bien parvenu","ok");
					$this->request->data = array(); 
				}else{
					$this->Session->setFlash("Merci de corriger vos champs","ko");
				}
			}
		}
	}

}