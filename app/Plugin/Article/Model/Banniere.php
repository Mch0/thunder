<?php
App::uses('AppModel', 'Banniere.Model');

class Banniere extends AppModel {

	public $order = 'Banniere.created DESC';
	
	public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        )
	);
	
	public $validate = array(
		'banniere_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Article Title.',
			),
		),

	    'photo' => array(
	        'rule' => array('isValidMimeType', array('image/jpg', 'image/png', 'image/jpeg')),
	        'message' => 'jpg, png ou jpeg',
			    'rule' => array('isBelowMaxSize', 5000000),
			    'message' => 'image trop grosse',
			        'rule' => array('isBelowMaxWidth', 200000, 2000000),
			        'message' => 'image trop grande'
	    )
	);	
}



