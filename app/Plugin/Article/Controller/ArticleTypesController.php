<?php

 
class ArticleTypesController extends ArticleAppController {

	var $name = 'ArticleTypes';

        var $paginate = array(
            'limit' => 15
        );

	function admin_index() {
		$this->ArticleType->recursive = 0;
		$this->set('articleTypes', $this->paginate());
	}

	function admin_view($id = null) {
		if(!$id) {
			$this->Session->setFlash(__('Invalid event type', true));
			$this->redirect(array('action' => 'admin_index'));
		}
		$this->set('articleTypes', $this->ArticleType->read(null, $id));
	}


	function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->ArticleType->create();
			if ($this->ArticleType->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('The event type could not be saved. Please, try again.', true));
			}
		}
	}


	function admin_edit($id = null) {
		$errors = array();
		$this->ArticleType->id = $id;
		if (!$this->ArticleType->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArticleType->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->ArticleType->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->ArticleType->read(null, $id));
		}
		if (empty($this->data)) {
			$this->data = $this->ArticleType->read(null, $id);
		}
	}


	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event type', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		if ($this->ArticleType->delete($id)) {
			$this->Session->setFlash(__('Event type deleted', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		$this->Session->setFlash(__('Event type was not deleted', true));
		$this->redirect(array('action' => 'admin_index'));
	}
}
?>
