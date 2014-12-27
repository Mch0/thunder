<?php

App::uses('AppModel', 'Model');

class Guide extends AppModel {


	public $belongsTo = array(
		'Champion' => array(
			'className' => 'Champion',
			'foreignKey' => 'champion_id'
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id'
		)
	);


}
