<?php

		class Dog extends AppModel{
			
			
		
		
			public $name = "Dog";
			public $users = "Users";
			public $belongsTo = array(
								'User'=>array(
								'className' => 'User',
								'foreignKey' =>'dog_userid'));


            public $validate = array(

                'name' => array(
                    'minlength' => array(
                        'rule' => array('minlength', 1),
                        'message' => 'What is your dog\'s name?',
                        'allowEmpty' => false
                    ),
                    'maxlength' => array(
                        'rule' => array('maxlength', 12),
                        'message' => 'What is your dog\'s name?',
                        'allowEmpty' => false
                    ),
                    'onlyletter' => array(
                        'rule'    => '/^[a-z0-9 ]{1,}$/i',
                        'message' => 'The breed may only contain letters.'
                    )
                ),
                'breed' => array(
                    'minlength' => array(
                        'rule' => array('minlength', 2),
                        'message' => 'Which breed is your dog?',
                        'allowEmpty' => false
                    ),
                    'maxlength' => array(
                        'rule' => array('maxlength', 20),
                        'message' => 'Which breed is your dog?',
                        'allowEmpty' => false
                    ),
                    'onlyletter' => array(
                        'rule'    => '/^[a-z ]{1,}$/i',
                        'message' => 'The breed may only contain letters.'
                    )
                ),
                'weight' => array(
                    'minlength' => array(
                        'rule' => array('minlength', 1),
                        'message' => 'How much does your dog weigh?',
                        'allowEmpty' => false
                    ),
                    'maxlength' => array(
                        'rule' => array('maxlength', 2),
                        'message' => 'Weight must be 1-99.',
                        'allowEmpty' => false
                    ),
                        'number' => array(
                            'rule'    => array('range', 0, 100),
                            'message' => 'Please enter a number between 1 and 99'
                        )
                    ),
                    'onlynumber' => array(
                        'rule'    => '/^[0-9]{1,}$/i',
                        'message' => 'Weight must be a number'
                    )

            );
        }
?>