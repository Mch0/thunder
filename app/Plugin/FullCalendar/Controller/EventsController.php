<?php
class EventsController extends FullCalendarAppController {

		var $name = 'Events';
        var $paginate = array(
            'limit' => 15
        );
        
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('feed');
		$this->Auth->allow('webtv_bar');
		$this->Auth->allow('webtv_bar_now');
		$this->Auth->allow('webtv_bar_index');
	}


//event now
	function webtv_bar_now($id=null) {
		
		$start = date('Y-m-d H:i(:s)', strtotime("+1 days"));
		$end = date('Y-m-d H:i(:s)');
		$now = date('Y-m-d H:i(:s)');

		$conditions = array('Event.start <=' => $now, 'Event.end >=' => $now);
		$events = $this->Event->find('all', array(
			'conditions' => $conditions,
			'limit' => 1,
			));
		return $events;
	}


//event next
	function webtv_bar($id=null) {
		$start = date('Y-m-d H:i(:s)', strtotime("+20 hours"));
		$end = date('Y-m-d H:i(:s)');
		$now = date('Y-m-d H:i(:s)');

		$conditions = array('Event.start <=' => $start, 'Event.start >=' => $now);
		$events = $this->Event->find('all', array(
			'limit' => 4,
			'conditions' => $conditions));
		return $events;
	}

//event next sur index article elemenet
	function webtv_bar_index($id=null) {
		$start = date('Y-m-d H:i(:s)', strtotime("+20 hours"));
		$end = date('Y-m-d H:i(:s)');
		$now = date('Y-m-d H:i(:s)');

		$conditions = array('Event.start <=' => $start, 'Event.start >=' => $now);
		$events = $this->Event->find('all', array(
			'conditions' => $conditions,
			'limit' => 4,
			));
		return $events;
	}


        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function feed($id=null) {
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Event->find('all', $conditions);
		foreach($events as $event) {
			if($event['Event']['all_day'] == 1) {
				$allday = true;
				$end = $event['Event']['start'];
			} else {
				$allday = false;
				$end = $event['Event']['end'];
			}
			$data[] = array(
					'id' => $event['Event']['id'],
					'title'=>$event['Event']['title'],
					'start'=>$event['Event']['start'],
					'end' => $end,
					'allDay' => $allday,
					'details' => $event['Event']['details'],
					'className' => $event['EventType']['color']
			);
		}
		$this->set("json", json_encode($data));
	}




        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function update() {
		$vars = $this->params['url'];
		$this->Event->id = $vars['id'];
		$this->Event->saveField('start', $vars['start']);
		$this->Event->saveField('end', $vars['end']);
		$this->Event->saveField('all_day', $vars['allday']);
	}

    function admin_index() {
		$this->Event->recursive = 1;
		$this->set('events', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'admin_index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function admin_add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Event->validationErrors;
			}
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function admin_edit($id = null) {
		$errors = array();
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$errors = $this->Event->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Event->read(null, $id));
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}


	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'admin_index'));
	}

}

?>
