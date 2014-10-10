<?php
App::uses('VideoAppModel', 'Equipe.Model');
/**
 * Chaine Model
 *
 * @property Category $Category
 */
class Equipe extends EquipeAppModel {

	public $order = 'Equipe.created DESC';
	
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
	);


	public $belongsTo = array(
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





