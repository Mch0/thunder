<?php

	App::uses('AppModel', 'Model');

	class Role extends AppModel {

		public $hasMany = array(
			'Guide' => array(
				'className' => 'Guide',
				'foreignKey' => 'role_id',
			)
		);

	}
