<?php
	App::import('component', 'CakeSession');   
	App::uses('Controller', 'Users'); 	
	class FaqsController extends AppController
	{
		public $helpers = array('Html', 'Form','Js','Paginator');
		public $name = "Faqs";
		public $data = null;
		var $uses = array('User', 'Event','Dog');
		 
		//Redirects if an admin
		public function index()
		{        
		
		}
		
		
	}
		
	
		
		
?>