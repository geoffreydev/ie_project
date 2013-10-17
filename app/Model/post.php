<?php
	class Post extends AppModel {
		public $name = 'Post';
		
		var$validate = array(
		'title' => array('rule' => 'notEmpty', 
		'message' => 'Please enter a value for the company name field.'),
		
		'body'=>array('rule'=>'notEmpty', 
		'message'=>'Please enter a value for the contact firstnamefield.'), 
		);
	}
?>