<?php

	App::uses('AppModel', 'Model');

	class Champion extends AppModel {
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
				foreach ($value['Guide'] as $k => $d)
				{
					if (isset($d['slug']) && isset($d['id']) && $d['online'] == 1)
					{
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
			return $data;
		}
	}
