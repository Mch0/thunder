<?php
App::uses('AuthAclAppModel', 'AuthAcl.Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
*/
class User extends AuthAclAppModel {






	public $validate = array(
			'user_email' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Vous devez entrer un e-mail'
					),
					'email' => array(
							'rule' => array('email'),
							'message' => 'Cet e-mail n est pas valide'
					),
					'isEmailExisted' => array(
							'rule' => array('isEmailExisted'),
							'message' => 'Cet e-mail existe déjà'
					)

			),
			'user_password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ce mot de passe n est pas valide'
					)
			),
			'user_confirm_password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ce mot de passe n est pas valide'
					),
					'checkPassword' => array(
							'rule' => array('checkPassword'),
							'message' => 'Les mots de passe ne sont pas les mêmes',
					)
			),
			'user_name' => array(
				'rule' 		 => 'isUnique',
				'allowEmpty' => false,
				'message'	 => "Ce nom d'utilisateur est déja pris"
			),
			'avatar_file' => array(
				'rule' => array('fileExtension', array('jpg')),
				'message'	 => "Le fichier doit être jpg",
	    		),
	);


	public $reset_password_validate = array(
			'user_password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ce mot de passe n est pas valide'
					)
			),
			'user_confirm_password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ce mot de passe n est pas valide'
					),
					'checkPassword' => array(
							'rule' => array('checkPassword'),
							'message' => 'Les mots de passe ne sont pas les mêmes',
					)
			)
	);

	public $signup_validate = array(
			'user_email' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Vous devez entrer un e-mail'
					),
					'email' => array(
							'rule' => array('email'),
							'message' => 'Cet e-mail n est pas valide'
					),
					'isEmailExisted' => array(
							'rule' => array('isEmailExisted'),
							'message' => 'Cet e-mail existe déjà'
					)

			),
			'user_password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ce mot de passe n est pas valide'
					)
			),
			'user_confirm_password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ce mot de passe n est pas valide'
					),
					'checkPassword' => array(
							'rule' => array('checkPassword'),
							'message' => 'Les mots de passe ne sont pas les mêmes.',
					)
			),
			'user_name' => array(
				'rule' 		 => 'isUnique',
				'allowEmpty' => false,
				'message'	 => "Ce nom d'utilisateur est déja pris"
			),
			'recaptcha' => array(
					'required' => array(
							'rule' => array('recaptcha'),
							'message' => 'Le ReCaptCha n est pas valide '
					)
			)
	);

	public $hasAndBelongsToMany = array(
			'Group' => array(
					'className' => 'Group',
					'joinTable' => 'users_groups',
					'foreignKey' => 'user_id',
					'associationForeignKey' => 'group_id',
					'unique' => 'keepExisting',
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'finderQuery' => '',
					'deleteQuery' => '',
					'insertQuery' => ''
			)
	);


	public $actsAs = array(
	    'Upload_Grafikart.Uploadgrafikart' => array(
	        'fields' => array(
	            'avatar' => 'files/users/:id1000/:id',
	        )
	    ),
	    'Acl' => array('type' => 'requester')
	);

	public function parentNode() {
		return null;
	}

	public function isEmailExisted($check){
		$user = $this->find('first',array('conditions'=>array('`User`.`user_email`'=>$check['user_email'])));
		if (!empty($user)){
			return false;
		}else{
			return true;
		}
	}

	public function beforeSave($options = array()) {
		if (!empty($this->data['User']['user_password'])){
			$this->data['User']['user_password'] = AuthComponent::password($this->data['User']['user_password']);
		}
		return true;
	}

	public function checkPassword($check){
		return ($this->data['User']['user_password'] == $this->data['User']['user_confirm_password']);
	}

	public function recaptcha($check){
		App::uses('Setting', 'AuthAcl.Model');
		$Setting = new Setting();

		$general = $Setting->find('first',array('conditions' => array('setting_key' => sha1('general'))));
		if (!empty($general)){
			$general = unserialize($general['Setting']['setting_value']);
		}
		$flag = false;
		$privatekey = $general['Setting']['recaptcha_private_key'];
		$resp = null;
		$captchaerror = null;

		if (isset($_POST["recaptcha_response_field"]) && $_POST["recaptcha_response_field"]) {
			$resp = recaptcha_check_answer ($privatekey,
					$_SERVER["REMOTE_ADDR"],
					$_POST["recaptcha_challenge_field"],
					$_POST["recaptcha_response_field"]);

			if ($resp->is_valid) {
				$flag = true;
			}
		}

		return $flag;
	}

}
