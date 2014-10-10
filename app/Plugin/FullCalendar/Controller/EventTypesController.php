<?php

 
class EventTypesController extends FullCalendarAppController {

	var $name = 'EventTypes';

        var $paginate = array(
            'limit' => 15
        );

	function admin_index() {
		$this->EventType->recursive = 0;
		$this->set('eventTypes', $this->paginate());
	}

	function admin_view($id = null) {
		if(!$id) {
			$this->Session->setFlash(__('Invalid event type', true));
			$this->redirect(array('action' => 'admin_index'));
		}
		$this->set('eventType', $this->EventType->read(null, $id));
	}


	function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->EventType->create();
			if ($this->EventType->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('The event type could not be saved. Please, try again.', true));
			}
		}
	}


	function admin_edit($id = null) {
		$errors = array();
		$this->EventType->id = $id;
		if (!$this->EventType->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventType->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->EventType->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->EventType->read(null, $id));
		}
		if (empty($this->data)) {
			$this->data = $this->EventType->read(null, $id);
		}
	}


	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event type', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		if ($this->EventType->delete($id)) {
			$this->Session->setFlash(__('Event type deleted', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		$this->Session->setFlash(__('Event type was not deleted', true));
		$this->redirect(array('action' => 'admin_index'));
	}
}
?>
