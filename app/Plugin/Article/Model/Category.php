<?php
App::uses('ArticleAppModel', 'Article.Model');
/**
 * Category Model
 *
 * @property Article $Article
*/
class Category extends ArticleAppModel {

	public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        ),
	);
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'category_name' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							'message' => 'Please enter the value for Category Name.',
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

	public $hasMany = array(
			'Article' => array(
					'className' => 'Article',
					'foreignKey' => 'category_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);


	public function beforeSave(){
		if(empty($this->data['Category']['slug']) && isset($this->data['Category']['slug']) && !empty($this->data['Category']['name']))
			$this->data['Category']['slug'] = strtolower(Inflector::slug($this->data['Category']['name'],'-'));
		return true; 
	}



	public function afterFind($data){
		foreach($data as $k=>$d){
			if(isset($d['Category']['slug']) && isset($d['Category']['id'])){
				$d['Category']['link'] = array(
					'controller'	=> 'articles',
					'action'		=> 'category',
					'slug'			=> $d['Category']['slug'],
					'plugin' 		=> 'article',
				);
			}
			$data[$k] = $d;
		}
		return $data;
	}





}
