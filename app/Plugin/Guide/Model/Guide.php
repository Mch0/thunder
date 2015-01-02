<?php

App::uses('AppModel', 'Model');

class Guide extends AppModel {


	public $belongsTo = array(
		'Champion' => array(
			'className' => 'Champion',
			'foreignKey' => 'champion_id'
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id'
		)
	);


	public function afterFind($data){
		foreach($data as $k=>$d){
			if(isset($d['Guide']['slug']) && isset($d['Guide']['id'])){
				$d['Guide']['link'] = array(
					'controller'	=> 'guides',
					'action'		=> 'view',
					'id'			=> $d['Guide']['id'],
					'slug'			=> $d['Guide']['slug']
				);
			}
			$data[$k] = $d;
		}
		return $data;
	}



	public function beforeSave(){
		if(empty($this->data['Guide']['slug']) && isset($this->data['Guide']['slug']) && !empty($this->data['Guide']['title']))
			$this->data['Guide']['slug'] = strtolower(Inflector::slug($this->data['Guide']['title'],'-'));
		return true;
	}


}
