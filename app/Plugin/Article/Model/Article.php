<?php
App::uses('ArticleAppModel', 'Article.Model');

class Article extends ArticleAppModel {
	
	public $order = 'Article.created DESC';
	
	public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        ),
		'Comment.Commentable',
		'Tags.Taggable',
	);


	public $validate = array(
		'article_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '',
			),
		),
	    'photo' => array(
	        'rule' => array('isValidMimeType', array('image/jpg', 'image/png', 'image/jpeg')),
	        'message' => 'jpg, png ou jpeg',
			    'rule' => array('isBelowMaxSize', 5000000),
			    'message' => 'image trop grosse',
			        'rule' => array('isBelowMaxWidth', 1500, 1500),
			        'message' => 'image trop grande'
	    ),
		'slug' => array(
			'rule' 		 => '/^[a-z0-9\-]+$/',
			'allowEmpty' => true,
			'message'	 => "L'url n'est pas valide"
		),
	);
	
    public $hasMany = array(
    );


	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ArticleType' => array(
			'className' => 'ArticleType',
			'foreignKey' => 'article_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'User' => array(
			'className' => 'user',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
	);

	public function afterFind($data){
		foreach($data as $k=>$d){
			if(isset($d['Article']['slug']) && isset($d['Article']['id'])){
				$d['Article']['link'] = array(
					'controller'	=> 'articles',
					'action'		=> 'view',
					'id'			=> $d['Article']['id'],
					'slug'			=> $d['Article']['slug']
				);
			}
			$data[$k] = $d;
		}
		return $data;
	}



	public function beforeSave(){
		if(empty($this->data['Article']['slug']) && isset($this->data['Article']['slug']) && !empty($this->data['Article']['article_title']))
			$this->data['Article']['slug'] = strtolower(Inflector::slug($this->data['Article']['article_title'],'-'));
		return true; 
	}


}