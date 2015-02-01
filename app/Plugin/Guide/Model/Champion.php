<?php

	App::uses('AppModel', 'Model');

	class Champion extends AppModel {

		public $actsAs = array(
			'Upload.Upload' => array(
				'image' => array(
					'fields' => array(
						'dir' => 'folder'
					),
					'path' => '{ROOT}webroot{DS}img{DS}champion{DS}',
					'pathMethod' => 'flat',
				)
			)
		);

		public $recursive = 2 ;
		public $hasMany = array(
			'Guide' => array(
				'className' => 'Guide',
				'foreignKey' => 'champion_id',
				'conditions' => array('online' => 1)
			)
		);



		//genère le lien vers chaque guide
		public function afterFind($data){

			foreach($data as $key => $value)
			{
				if(array_key_exists('Guide',$value)) {
					foreach ($value['Guide'] as $k => $d) {
						if (isset($d['slug']) && isset($d['id']) && $d['online'] == 1) {
							$d['link'] = array(
								'controller' => 'guides',
								'action' => 'view',
								'id' => $d['id'],
								'slug' => $d['slug']
							);
						}
						$data[$key]['Guide'][$k] = $d;
					}
				}
			}
			return $data;
		}


	public function beforeSave(){

	if(empty($this->data['Champion']['slug']) && isset($this->data['Champion']['slug']) && !empty($this->data['Champion']['name']))
	{
		$this->data['Champion']['slug'] = strtolower(Inflector::slug($this->data['Champion']['name'], '-'));
	}
	return true;
}
	}