<?php
	class Account extends AppModel
	{
		public $useTable = false;
		public $name = "Account";
		public $Event = "Events";
		public $Dog = "Dogs";
		public $customer = "Users";
		public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
			'foreignKey' =>'dog_userid'
        )
    );
	
		var $validate = array(
				
				'User.oldpassword'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter old password',
						'last'=>true),
					'mustMatch'=>array(
						'rule' => array('verifyOldPass'),
						'message' => 'Please enter correct old password'),
					),
				'User.password'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter password',
						'on' => 'create',
						'last'=>true),
					'mustBeLonger'=>array(
						'rule' => array('minLength', 6),
						'message'=> 'Password must be greater than 5 characters',
						'on' => 'create',
						'last'=>true),
					'mustMatch'=>array(
						'rule' => array('verifies'),
						'message' => 'Both passwords must match')
						//'on' => 'create'
				)
			);

		
					/**
	 * Used to match passwords
	 *
	 * @access public
	 * @return boolean
	 */
	public function verifies() {
		return ($this->data['User']['password']===$this->data['User']['cpassword']);
	}
	/**
	 * Used to match old password
	 *
	 * @access public
	 * @return boolean
	 */
	public function verifyOldPass() {
		$userId = $this->userAuth->getUserId();
		$user = $this->findById($userId);
		$oldpass=$this->userAuth->makePassword($this->data['User']['oldpassword'], $user['User']['salt']);
		return ($user['User']['password']===$oldpass);
	}
	}
?>