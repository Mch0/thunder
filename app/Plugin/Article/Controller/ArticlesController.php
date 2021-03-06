<?php
App::uses('ArticleAppController', 'Article.Controller');
define('RIOT_URL','http://euw.leagueoflegends.com/fr');
class ArticlesController extends ArticleAppController {

	public $components = array('RequestHandler');

    public $paginate = array(
        'fields' => array(
  			'Article.id', 
  			'Article.article_title',
  			'Article.slug',
  			'Article.category_id',
  			'Article.article_summary',
  			'Article.photo',
  			'Article.photo_dir',
  			'Article.comment_count',
  			'Article.created',


  			'Category.id',
  			'Category.category_name',
  			'Category.photo',
  			'Category.photo_dir',

  			'User.id',
  			'User.user_name',
  			'User.avatar',
        ),
        'limit' => 12,
    );

	public $helpers = array(
		'Vothumb.Vothumb',
		'Tags.TagCloud',
		'Text'
	);


	/**
	 * Override pour définir les méthodes auxquels un visiteur non logué peut accéder
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');	
		$this->Auth->allow('view');
		$this->Auth->allow('recherche');
		$this->Auth->allow('feed');
	}

	/**
	 * Flux rss
	 * @TODO
	 */
	public function feed() {
	        $this->RequestHandler->respondAs('xml'); // Important pour Content-type: application/rss+xml
	        $posts = $this->Article->find('all', array('limit' => 20, 'order' => 'Article.created DESC'));
	        return $this->set($posts);

	}

	public function debug($id = null) {
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';

		//article
		$d['articles'] = $this->Paginate('Article',array('online'=>1, 'thumb_three' => 0, 'thumb_top' => 0, ), array( 
		));

		$d['thumbarticles'] = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_top' => 1,),
		 	'limit'  => 1,
		));
		$d['threearticle'] = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_three' => 1,),
		 	'limit'  => 4,
		));

		//video
		$this->loadModel('Video');
		$d['videos']  = $this->Video->find('all', array(
			'conditions' => array('online'=>1),
			'limit' => 15,
			'order' => array('Video.created' => 'desc'),
			'fields' => array(
	  			'Video.id', 
	  			'Video.video_title',
	  			'Video.comment_count', 
	  			'Video.slug',
	  			'Video.photo',
	  			'Video.photo_dir',
        )));


		//image
		$this->loadModel('Image');
		$d['images']  = $this->Image->find('all', array(
			'conditions' => array('validate'=>1),
			'limit' => 5,
			'order' => array('Image.created' => 'desc'),
			'fields' => array(
	  			'Image.id', 
	  			'Image.title',
	  			'Image.image', 
	  			'Image.slug',
	  			'Image.comment_count',
        )));

		$this->set($d);
	}

	/**
	 * Renvoi tout le contenu de la page html de riot euw
	 * @return mixed
	 */
	private function _getRiotPage()
	{
		libxml_use_internal_errors(true);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,RIOT_URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$resultat = curl_exec($ch);
		curl_close($ch);
		return $resultat;
	}

	/**
	 * Renvoi les liens des news de la page riot
	 * @return array
	 */
	private function _getRiotLinkArray()
	{
		$page = $this->_getRiotPage();
		try
		{
			$riotPage = new DOMDocument();
			$riotPage->loadHTML($page);
			foreach($riotPage->getElementsByTagName('div') as $div )
			{
				if($div->getAttribute('class') == "field field-name-field-short-title field-type-text field-label-hidden"
					|| $div->getAttribute('class') == "default-2-3")
				{

					foreach($div->getElementsByTagName('a') as $key => $lien)
					{
						$url =  $div->getElementsByTagName('a')->item(0)->getAttribute('href');
						$text =  $div->getElementsByTagName('a')->item(0)->nodeValue;
						$liens[] = array('url' => $url,'text' => utf8_encode($text)) ;
					}
				}
			}
			return $liens;
		}
		catch (Exception $e)
		{

		}
	}

	/**
	 * Construit le tableau de lien riot a afficher en front
	 * @return array
	 */
	private function _getRiotNewsLinks()
	{
		$links = $this->_getRiotLinkArray();
		foreach($links as $link)
		{
			$url = $link['url'];
			$text = utf8_decode($link['text']);
			$formatedLinks[] = "<a href='http://euw.leagueoflegends.com$url' target='_blank'>$text </a> ";
		}

		return $formatedLinks;
	}

	/**
	 * Main page du site
	 */
	function index() {

		//flux rss
	    if ($this->RequestHandler->isRss() ) {
	        $articles = $this->Article->find(
	            'all', array(
	            	'limit' => 20, 
	            	'order' => 'Article.created DESC',
	            	'online'=>1,
	            	'thumb_three' => 0, 
	            	'thumb_top' => 0,
	            )
	        );
	        return $this->set(compact('articles'));
	    }


		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		//event webtv
		$d['eventNow'] = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar_now','plugin' => 'full_calendar','admin'=>false));
		$d['eventsNext'] = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar','plugin' => 'full_calendar','admin'=>false));


		//article
		$d['articles'] = $this->Paginate('Article',array('online'=>1,  'thumb_top' => 0,), array(
		));

		/*$d['thumbarticles'] = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_top' => 1,),
		 	'limit'  => 1,
		));*/

		$d['threearticle'] = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_three' => 1,),
		 	'limit'  => 4,
		));

		 //webtv
		 $this->loadModel('Webtv');
		 $d['webtv'] = $this->Webtv->find('all',array(
			 'conditions' => array('online'=>1),
			 'limit' => 1,
		 ));

		 $d['riotLinks'] = $this->_getRiotNewsLinks();
		 if($_SESSION['Message']['flash']['message'])
		 {
			 $d['error'] = $_SESSION['Message']['flash']['message'];
		 }
		$this->set($d);
	}

	/**
	 * Details d'un article
	 * @param null $id
	 * @param null $slug
	 *
	 */
	function view($id = null,$slug = null){

		parent::beforeFilter(); 
		$this->layout = 'default';
	    $this->Article->updateAll(
	        array('Article.nb_acces'=>'Article.nb_acces +1'),
	        array('Article.slug'=>$slug)
	    );
		if(!$id)
			throw new NotFoundException('Aucun article ne correspond à cet ID');
		$article = $this->Article->find('first',array(
		 	'conditions' => array('Article.id' => $id),
		 	'recursive'  => 0
		));

		$idNext = $id + 1 ;
		$articlePageNext = $this->Article->find('first', array(
			'conditions' => array('Article.id' => $idNext, 'Article.online' => 1),
			'recursive' => 0
		));
		$d['articleNext'] = $articlePageNext;
		$idPrev = $id - 1;
		$articlePagePrev = $this->Article->find('first', array(
			'conditions' => array('Article.id' => $idPrev),
			'recursive'  => 0
		));
		$d['articlePrev'] = $articlePagePrev;
		if(empty($article))
			throw new NotFoundException('Aucun article ne correspond à cet ID'); 
		if($slug != $article['Article']['slug'])
			$this->redirect($article['Article']['link'],301); 
		$d['article'] = $article;


       // $comments = Cache::read('comments', 'short');
        //if ($comments === false) {
		$comments = $this->Article->Comment->find('all', array(
			'conditions' => array('Comment.ref_id' => $article['Article']['id']),
			'contain'    => array('User'),
			'fields'     => array('Comment.id', 'Comment.user_id', 'Comment.content','Comment.created','User.user_name','User.id', 'User.avatar' ,'Comment.username','Comment.mail','Comment.up'),
		));           
		//	Cache::write('comments', $comments, 'short');
		//  }
		$d['threearticles'] = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_three' => 1,),
		 	'limit'  => 4,
		));

		$tags =	$this->Article->Tagged->find('all', array(
			'model' => 'Article',
			'conditions' => array ('Tagged.foreign_key' => $id),
			'limit' => 10,
		));

		$this->helpers[] = 'Comment.Comment';
		$this->set(compact('article','comments', 'tags'));
		$this->set($d);
	}

	/**
	 * Fonction de recherche
	 * !!!N'est plus utilisé actuellement
	 */
	function recherche() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Article->recursive = 0;
		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Article']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Article']['page'] = $this->request->named['page'];
				}else{
					$filter['Article']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				if (!empty($filter['Article'])){
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Article']) && !empty($this->data['Article']['filter'])){
			$conditions = array(' article_title LIKE '  => '%'.trim($this->data['Article']['filter']).'%');
			$passArg = $this->data['Article'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Article']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Article']['page'];
			}
		}
		$paginate = array('limit' => 25);
		if (!empty($conditions)){
			$paginate['conditions'] = $conditions;
		}
		$this->paginate = $paginate;
		$this->set('passArg',$passArg);
		$this->set('title_for_layout', __('Toute l\'actualité League of Legends'));
		parent::beforeFilter(); 
		$this->layout = 'default';
		$d['articles'] = $this->Paginate('Article',array('online'=>1, 'thumb_three' => 0, 'thumb_top' => 0, ), array( 
		));
		$thumbarticles = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_top' => 1,),
		 	'limit'  => 1,
		));
		$threearticle = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_three' => 1,),
		 	'limit'  => 4,
		));



		//video
		$this->loadModel('Video');
		$d['videos']  = $this->Video->find('all', array(
			'conditions' => array('online'=>1),
			'limit' => 15,
			'order' => array('Video.created' => 'desc'),
			'fields' => array(
	  			'Video.id', 
	  			'Video.video_title',
	  			'Video.comment_count', 
	  			'Video.slug',
	  			'Video.photo',
	  			'Video.photo_dir',
        )));


		//image
		$this->loadModel('Image');
		$d['images']  = $this->Image->find('all', array(
			'conditions' => array('validate'=>1),
			'limit' => 10,
			'order' => array('Image.created' => 'desc'),
			'fields' => array(
	  			'Image.id', 
	  			'Image.title',
	  			'Image.image', 
	  			'Image.slug',
	  			'Image.comment_count',
        )));


		//webtv
		$this->loadModel('Webtv');
		$d['webtv'] = $this->Webtv->find('all',array(
			'conditions' => array('online'=>1),
			'limit' => 1,
		));
		
		$this->set(compact('article', 'thumbarticles', 'threearticle'));
		$this->set($d);
	}


/*=======================================================================*/
/*								ADMIN									 */
/*=======================================================================*/

	public function admin_index() {
		if ($this->request->isAjax())
		{
			$this->layout = null;
		}
		$this->Article->recursive = 0;
		
		if ($this->request->isGet())
		{
			if (!empty($this->request->named['filter']))
			{
				$filter = array();
				$filter['Article']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page']))
				{
					$filter['Article']['page'] = $this->request->named['page'];
				}
				else
				{
					$filter['Article']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}
			else
			{
				$filter = array();
				$filter['Article'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Article']))
				{
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Article']) && !empty($this->data['Article']['filter']))
		{
			$conditions = array(' article_title LIKE '  => '%'.trim($this->data['Article']['filter']).'%');
			$passArg = $this->data['Article'];
		}
		if (!empty($this->request->params['named']['page']))
		{
			$passArg['page'] = $this->request->params['named']['page'];
		}
		else
		{
			if (!empty($this->request->data['Article']['page']))
			{
				$this->request->params['named']['page'] = $this->request->data['Article']['page'];
			}
		}

		$paginate = array('limit' => 45);
		//$paginate = array();
		
		if (!empty($conditions))
		{
			$paginate['conditions'] = $conditions;
		}
		$this->paginate = $paginate;
		
		$this->set('passArg',$passArg);
		
		if (!empty($passArg))
		{
			$this->Cookie->write('srcPassArg',$passArg);
		}

		$this->set('articles', $this->paginate());
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



		$tags =	$this->Article->Tagged->find('all', array(
			'model' => 'Article',
			'conditions' => array ('Tagged.foreign_key' => $id),
			'limit' => 10,
		));

		$threearticles = $this->Article->find('all',array(
		 	'conditions' => array('online' => 1, 'thumb_three' => 1,),
		 	'limit'  => 4,
		));

		
		$this->set(compact('article','comments', 'tags', 'threearticles'));
	}
	
	public function admin_add() {
		$errors = array();
		$this->request->data['Article']['user_id'] = $this->Auth->user('id');
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Article->validationErrors;
			}
		}
		$categories = $this->Article->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$articleTypes = $this->Article->ArticleType->find('list',array(
				'fields' => array('ArticleType.id', 'ArticleType.name'),
		));
		$this->set(compact('categories','articleTypes'));
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
