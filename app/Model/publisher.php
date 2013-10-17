<?php 
 class Publisher extends AppModel 
 { 
 public $name = "Publisher"; 
 
 public $validate = array( 
 'company_name' => array('rule1' => array('rule'=>'notEmpty', 
						'message' => 'Please enter a value for the company name field.'), 
						'rule2' => array('rule'=>'alphaNumeric', 
						'message' => 'Only alphabets and numbers allowed')),
 'contact_fname'=>array('rule1'=> array('rule'=>'notEmpty', 
						'message'=>'Please enter a value for the contact firstname field.'), 
						'rule2' => array('rule'=> 'alphaNumeric', 
						'message' => 'Only alphabets and numbers allowed')),
 'contact_sname'=>array('rule1'=> array('rule'=>'notEmpty', 
						'message'=>'Please enter a value for the contact surname field.'),
						'rule2'=> array('rule'=> 'alphaNumeric', 
						'message' => 'Only alphabets and numbers allowed')),						
 'phone'=>array('rule1'=>array('rule'=>'notEmpty', 
				'message'=>'Please enter a value for the phone field.'),
				'rule2'=>array('rule'=>'Numeric',
				'message'=>'Numbers only'),
				'rule3' =>array('rule'=> array('maxLength', 10),
				'message' => 'maxLength is 10')),
 'pub_street'=>array('rule'=>'notEmpty', 
				'message'=>'Please enter a value for the street field.'),
 'pub_suburb'=>array('rule'=>'notEmpty', 
				'message'=>'Please enter a value for the suburb field.'),
 'pub_state'=>array('rule1'=>array('rule'=>'notEmpty', 
				'message'=>'Please enter a value for the phone field.'),
				'rule2'=>array('rule'=>'notNumeric',
				'message'=>'Alphabets only')),
 'pub_pc'=>array('rule1' => array('rule'=>'notEmpty', 
				'message' => 'Please enter a value for the company name field.'), 
				'rule2' => array('rule'=>'alphaNumeric', 
				'message' => 'Only alphabets and numbers allowed')),
 'email'=>array('rule'=>'email', 
				'message'=>'Please enter the correct email address.'));
 
 
 
 
} 
?> 