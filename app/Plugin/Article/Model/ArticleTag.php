<?php
App::uses('ArticleAppModel', 'Article.Model');

class ArticleTag extends ArticleAppModel {

	public $recursive = -1; 
	public $useTable = "articles_tags"; 
	public $actsAs = array('containable'); 
	public $belongsTo = array(
		'Article',
		'Tag' => array(
			'counterCache' => 'count'
		)
	); 

	public function afterDelete(){
		$this->Tag->deleteAll(array(
			'count' => 0
		)); 
	}

}