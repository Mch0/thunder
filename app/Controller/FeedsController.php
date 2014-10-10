<?php



class FeedsController extends AppController {



	public $components = array('RequestHandler');


	public function feed() {
		$this->layout = 'default';
		$this->loadModel('Article');
		$articles  = $this->Article->find('all', array(
			'limit' => 10,
        ));

	}





}
