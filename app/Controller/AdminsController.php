<?php
    App::uses('Controller', 'Users'); 
	App::import('component', 'CakeSession');  
	class AdminsController extends AppController
	{
		public $helpers = array('Html','Form','Paginator','Js');
		public $uses = array('User','Dog','Event');
		public $name = "Admins";
		
		public $paginate = array(
			'limit'=>12,
			'page'=>1,
			'order'=>array('User.id' =>'asc'),);
			
			
			
		public function index()
		{
            $this->loadModel('PageContent');
            $this->set('contactcontent', $this->PageContent->findByPage('contactus', 'content'));

		}
	}
?>
