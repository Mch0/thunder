<?php
App::uses('VideoAppModel', 'Video.Model');
/**
 * Chaine Model
 *
 * @property Category $Category
 */
class Video extends VideoAppModel {

	public $order = 'Video.created DESC';
	
	public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        ),
		'Containable',
		'Comment.Commentable',
	);
	
	public $validate = array(
		'Video_title' => array(
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
		'slug' => array(
			'rule' 		 => '/^[a-z0-9\-]+$/',
			'allowEmpty' => true,
			'message'	 => "L'url n'est pas valide"
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
			'order' => '',
		),
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'VideoType' => array(
			'className' => 'VideoType',
			'foreignKey' => 'video_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
	);


	public function beforeSave(){
		if(empty($this->data['Video']['slug']) && isset($this->data['Video']['slug']) && !empty($this->data['Video']['video_title']))
			$this->data['Video']['slug'] = strtolower(Inflector::slug($this->data['Video']['video_title'],'-'));
		return true; 
	}

	public function afterFind($data){
	    foreach($data as $k=>$d){
	        if(isset($d['Video']['slug']) && isset($d['Video']['id'])){
	            $d['Video']['link'] = array(
	                'controller'    => 'videos',
	                'action'        => 'view',
	                'id'            => $d['Video']['id'],
	                'slug'          => $d['Video']['slug'],
	                'plugin' => 'video',
	            );
	        }
	        $data[$k] = $d;
	    }
	    return $data;
	}

}





