<?php

class FullCalendarController extends FullCalendarAppController {

	var $name = 'FullCalendar';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	function index() {
		$this->set('title_for_layout', __('Programme'));
		parent::beforeFilter(); 
		$this->layout = 'default';
	}


	function admin_index() {
	}


}

?>
