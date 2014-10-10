<?php
App::uses('ImageAppModel', 'Image.Model');

class Image extends ImageAppModel {

	public $order = 'Image.created DESC';
	

	public $actsAs = array(
	    'Upload_Grafikart.Uploadgrafikart' => array(
	        'fields' => array(
	            'image' => 'files/galeries/:id1000/:id'
	        )
	    ),
		'Containable',
		'Comment.Commentable',
	);


	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '',
			),
		),
		'slug' => array(
			'rule' 		 => '/^[a-z0-9\-]+$/',
			'allowEmpty' => true,
			'message'	 => "L'url n'est pas valide"
		),
		'image_file' => array(
			'rule' => array('fileExtension', array('jpg','png')),
			'message'	 => "Le fichier doit être jpg, png",
    		),
	);




	public $belongsTo = array(
		'User' => array(
			'className' => 'user',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
	);


	public function beforeSave(){
		if(empty($this->data['Image']['slug']) && isset($this->data['Image']['slug']) && !empty($this->data['Image']['title']))
			$this->data['Image']['slug'] = strtolower(Inflector::slug($this->data['Image']['title'],'-'));
		return true; 
	}

	public function afterFind($data){
	    foreach($data as $k=>$d){
	        if(isset($d['Image']['slug']) && isset($d['Image']['id'])){
	            $d['Image']['link'] = array(
	                'controller'    => 'images',
	                'action'        => 'view',
	                'id'            => $d['Image']['id'],
	                'slug'          => $d['Image']['slug'],
	                'plugin' => 'image',
	            );
	        }
	        $data[$k] = $d;
	    }
	    return $data;
	}

}





