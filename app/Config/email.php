<?php
class EmailConfig {

	public $default = array(
			'transport' => 'Mail',
			'from' => 'contact@thunderbot.gg',
	);

	/*public $default = array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => 465,
			'username' => 'my@gmail.com',
			'password' => 'secret',
			'transport' => 'Smtp',
// 			'tls' => true // As of 2.3.0 you can also enable TLS SMTP
	);*/
}