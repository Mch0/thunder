<?php

	App::uses('GuidesAppController', 'Guide.Controller');

class GuidesController extends GuidesAppController {

	public $paginate = array(
		'fields' => array(
			'Guide.id',
			'Guide.title',
			'Guide.nb_acces',
			'Guide.online',
			'Guide.created',
			'Guide.modified',
			'Champion.name'
	));
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	function index(){


		$this->set('title_for_layout', __('Guides League of Legends'));
		$this->layout = 'default';
		$d['guides'] = $this->Guide->find('first',array(
			'conditions' => array('Guide.id' => 1),
			'recursive'  => 0
		));
		$this->set($d);
	}

	function view()
	{

	}
/*=======================================================================*/
/*								ADMIN									 */
/*=======================================================================*/

	function admin_index()
	{
		if($this->request->isGet())
		{
			$data = $this->paginate();
		}
		$this->set('title_for_layout', __('Admin | Liste des guides'));
		$d['guides'] = $data;
		$this->set($d);

	}

	function admin_add()
	{

	}

	function admin_edit()
	{

	}

	function admin_delete()
	{

	}

	function admin_view()
	{

	}



}
