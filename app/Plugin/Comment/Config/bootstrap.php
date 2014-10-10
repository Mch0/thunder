<?php
$default = array(
	'user'	 => array(
		'model' => 'User',
		'username' => 'user_name',
		'mail'	   => 'user_email',
	),
	'order'  => 'Comment.created ASC',
	'subcomments' => true,
  	'akismet'=> array('site' => "http://localhost/",'key' => "2cd22f5c6d5f"), 
);
Configure::write('Plugin.Comment', (Configure::read('Plugin.Comment') ? Configure::read('Plugin.Comment') : array()) + $default);

