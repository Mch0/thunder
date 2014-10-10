<?php
class MediasController extends AppController{
	
	public $components = array('Img'); 

	public function beforeFilter(){
		parent::beforeFilter(); 
		$this->layout = 'modal';
	}

	function index($article_id){
		if($this->request->is('post')){
			$data = $this->request->data['Media'];
			if(isset($data['url'])){
				$this->redirect(array('action'=>'show','?class=&alt=&src='.urlencode($data['url'])));
			}
			$dir = IMAGES.date('Y');
			if(!file_exists($dir))
				mkdir($dir,0777);
			$dir .= DS.date('m');
			if(!file_exists($dir))
				mkdir($dir,0777);
			$f = explode('.',$data['file']['name']); 
			$ext = '.'.end($f);  
			$filename = Inflector::slug(implode('.',array_slice($f,0,-1)),'-');
			// Sauvegarde en bdd
			$success = $this->Media->save(array(
				'name' => $data['name'],
				'url'  => date('Y').'/'.date('m').'/'.$filename.$ext,
				'article_id'=> $article_id
			));
			if($success){
				move_uploaded_file($data['file']['tmp_name'], $dir.DS.$filename.$ext);
				foreach(Configure::read('Media.formats') as $k=>$v){
					$prefix = $k;
					$size = explode('x',$v);
					$this->Img->crop( $dir.DS.$filename.$ext,$dir.DS.$filename.'_'.$prefix.'.jpg',$size[0],$size[1]); 
				}
			}else{
				$this->Session->setFlash("L'image n'est pas au bon format","notif",array('type'=>'error'));
			}
		}
		$d = array(); 
		$d['medias'] = $this->Media->find('all',array(
			'conditions' => array('article_id' => $article_id)
		));
		$d['formats'] = Configure::read('Media.formats'); 
		$this->set($d);
	}

	function show($id=null,$format = ''){
		$d = array();
		if($this->request->is('post')){
			$this->set($this->request->data['Media']);
			$this->layout = false;
			$this->render('tinymce'); 
			return; 
		}
		if($id){
			$this->Media->id = $id;  
			$media = current($this->Media->read());
			$d['src'] = Router::url('/img/'.$media['url'.$format]); 
			$d['alt'] = $media['name'];  
			$d['class'] = 'alignLeft';  
		}else{
			$d = $this->request->query;
			$d['src'] = urldecode($d['src']); 
		}
		$this->set($d);
	}

	function delete($id){
		$this->Media->delete($id);
		$this->Session->setFlash("L'image a bien été supprimée","notif");
		$this->redirect($this->referer());
	}

}