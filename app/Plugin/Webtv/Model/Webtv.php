<?php
App::uses('WebtvAppModel', 'Webtv.Model');

class Webtv extends WebtvAppModel {
	
	public $order = 'Webtv.created DESC';

	public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        ),

	);
	
	public $validate = array(
		'Webtv_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Chaine Title.',
			),
		),
	    'photo' => array(
	        'rule' => array('isValidMimeType', array('image/jpg', 'image/png', 'image/jpeg')),
	        'message' => 'jpg, png ou jpeg',
			    'rule' => array('isBelowMaxSize', 5000000),
			    'message' => 'image trop grosse',
			        'rule' => array('isBelowMaxWidth', 330, 165),
			        'message' => 'image trop grande'
	    ),
	);


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id'
		),
	);


	public function beforeSave(){
		if(empty($this->data['Webtv']['slug']) && isset($this->data['Webtv']['slug']) && !empty($this->data['Webtv']['webtv_title']))
			$this->data['Webtv']['slug'] = strtolower(Inflector::slug($this->data['Webtv']['webtv_title'],'-'));
		return true; 
	}

	public function afterFind($data){
		foreach($data as $k=>$d){
			if(isset($d['Webtv']['slug']) && isset($d['Webtv']['id'])){
				$d['Webtv']['link'] = array(
					'controller'	=> 'webtvs',
					'action'		=> 'view',
					'id'			=> $d['Webtv']['id'],
					'slug'			=> $d['Webtv']['slug']
				);
			}
			$data[$k] = $d;
		}
		return $data;
	}

}





