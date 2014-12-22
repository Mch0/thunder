<?php

	App::uses('AppModel', 'Model');

	class Champion extends AppModel {
		public $hasMany = array(
			'Guide' => array(
				'className' => 'Guide',
				'foreignKey' => 'champion_id',
			)
		);

	}
