<?php
App::uses('ArticleAppModel', 'Article.Model');

class ArticlePage extends ArticleAppModel {

	var $name = 'ArticlePage';
	var $displayField = 'article_title_page';

	public $order = 'ArticlePage.created DESC';

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
		'article_title_page' => array(
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
			        'rule' => array('isBelowMaxWidth', 300, 185),
			        'message' => 'image trop grande'
	    ),
		'slug' => array(
			'rule' 		 => '/^[a-z0-9\-]+$/',
			'allowEmpty' => true,
			'message'	 => "L'url n'est pas valide"
		),
	);
	


  	public $hasMany = "Comment";

	public $belongsTo = array(
		'article' => array(
			'className' => 'article',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	public function afterFind($data){
		foreach($data as $k=>$d){
			if(isset($d['ArticlePage']['slug']) && isset($d['ArticlePage']['id'])){
				$d['ArticlePage']['link'] = array(
					'controller'	=> 'articles',
					'action'		=> 'view',
					'id'			=> $d['ArticlePage']['id'],
					'slug'			=> $d['ArticlePage']['slug']
				);
			}
			$data[$k] = $d;
		}
		return $data;
	}



	public function beforeSave(){
		if(empty($this->data['ArticlePage']['slug']) && isset($this->data['ArticlePage']['slug']) && !empty($this->data['ArticlePage']['article_title_page']))
			$this->data['ArticlePage']['slug'] = strtolower(Inflector::slug($this->data['ArticlePage']['article_title_page'],'-'));
		return true; 
	}


}