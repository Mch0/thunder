<?php
App::uses('ArticleAppController', 'Article.Controller');

class BannieresController extends ArticleAppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('element_sidebar');
        $this->Auth->allow('element_sidebar_admin');    
    }
    



    function element_sidebar(){
        $bannieres = $this->Banniere->find('all',array(
            'conditions' => array('online'=>1),
            'limit' => 1,
        )); 
        return $bannieres;
    }

    function element_sidebar_admin(){
        $bannieres = $this->Banniere->find('all',array(
            'limit' => 8,
        )); 
        return $bannieres;
    }

	public function admin_index() {
        $d['bannieres'] = $this->Banniere->find('all');
        $this->set($d);
    }

    public function admin_add() {
        $errors = array();
        if ($this->request->is('post')) {
            $this->Banniere->create();
            if ($this->Banniere->save($this->request->data)) {
                $this->Cookie->delete('srcPassArg');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $errors = $this->Banniere->validationErrors;
            }
        }
        $this->set('errors',$errors);
    }


    public function admin_edit($id = null) {
        $errors = array();
        $this->Banniere->id = $id;
        if (!$this->Banniere->exists()) {
            throw new NotFoundException(__('Invalid article'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Banniere->save($this->request->data)) {
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $errors = $this->Banniere->validationErrors;
            }
        } else {
            $this->request->data = am($this->request->data,$this->Banniere->read(null, $id));
        }
        $this->set('errors',$errors);
    }



    public function admin_delete($id){
        $this->Session->setFlash('La Banniere a bien été supprimée','notif');
        $this->Banniere->delete($id);
        $this->redirect($this->referer());
    }
}
