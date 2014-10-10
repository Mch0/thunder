<?php
App::uses('ArticleAppController', 'Article.Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
*/
class ArticlePagesController extends ArticleAppController {

	public $uses=array('ArticlePage','Article','Comment');

	var $name = 'ArticlePages';
	public function beforeFilter() {
		parent::beforeFilter();
	}



	/*
	function view($id = null,$slug = null){
		parent::beforeFilter(); 
		$this->layout = 'default';
		if(!$id) {
			$this->Session->setFlash(__('Invalid event type', true));
			$this->redirect(array('action' => 'admin_index'));
		}

		//$this->ArticlePage->recursive = 2;
		$this->ArticlePage->contain('Comment'); 

		$comments = $this->Article->Comment->find('all', array(
		'conditions' => array('Comment.ref_id' => $articlepage['ArticlePage']['article_id']),
		'contain'    => array('User'),
		'fields'     => array('Comment.id', 'Comment.user_id', 'Comment.content','Comment.created','User.user_name','User.id', 'User.avatar' ,'Comment.username','Comment.mail'),
		));

		$this->helpers[] = 'Comment.Comment';
		$this->set(compact('article','comments'));
		$this->set($d);
	}

*/


	function view($id = null){
		parent::beforeFilter(); 
		$this->layout = 'default';
		if(!$id)
			throw new NotFoundException('Aucun articlePage ne correspond à cet ID');
		$articlePage = $this->ArticlePage->find('first',array(
		 	'conditions' => array('ArticlePage.id' => $id),
		 	'recursive'  => 0
		));
		if(empty($articlePage))
			throw new NotFoundException('Aucun articlePage ne correspond à cet ID'); 
		$d['articlePage'] = $articlePage;
		$this->set($d);
	}



	public function admin_view($id = null) {
		parent::beforeFilter(); 
		$this->layout = 'default';
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->set('article', $this->Article->read(null, $id));
		$this->Article->$id;
		$comments = $this->Article->findComments();
		$this->set(compact('article','comments'));
	}
	
	public function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->ArticlePage->create();
			if ($this->ArticlePage->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('controller' => 'articles', 'action' => 'admin_index','plugin' => 'article'));
			} else {
				$errors = $this->ArticlePage->validationErrors;
			}
		}
		$this->set(compact('ArticlePages'));
	}

	public function admin_edit($id = null) {
		if($this->request->is('put') || $this->request->is('post')){
			if($this->Article->save($this->request->data)){
				$this->Session->setFlash("Le contenu a bien été modifié","notif");
				$this->redirect(array('action'=>'admin_index'));
			} 
		}elseif($id){
			$this->Article->id = $id;
			$this->request->data = $this->Article->read();
		}else{
		}
		$d['categories'] = $this->Article->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
				));
		$d['articleTypes'] = $this->Article->ArticleType->find('list',array(
				'fields' => array('ArticleType.id', 'ArticleType.name'),
				));
		$d['users'] = $this->Article->User->find('list',array(
				'fields' => array('User.id', 'User.user_name','User.role') ,
				'conditions', array('User.role' => array(
							'redacteur' , 'admin')), 
				));
		$this->set($d);
	}


	public function admin_edit_image($id = null) {
		$errors = array();
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Article->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Article->read(null, $id));
		}
		$categories = $this->Article->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$this->set('errors',$errors);
		$this->set(compact('categories'));
	}

	public function admin_delete($id = null) {
		$this->Session->setFlash('L\'article a bien été supprimé a bien été supprimée','notif'); 
		$this->Article->delete($id); 
		$this->redirect(array('action' => 'admin_index')); 
	}

}
