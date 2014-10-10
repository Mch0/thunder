<?php
App::uses('PollsAppModel', 'Polls.Model');

class Poll extends PollsAppModel {
	public $actsAs = array('Containable');

	public $displayField = 'question';

	public $validate = array(
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);


	public $hasMany = array(
		'PollOption' => array(
			'className' => 'Polls.PollOption',
			'foreignKey' => 'poll_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => 'vote_count'
		),
		'PollVote' => array(
			'className' => 'Polls.PollVote',
			'foreignKey' => 'poll_id',
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

}
