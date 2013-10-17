<?php
    App::uses('Controller', 'Users'); 
	App::import('component', 'CakeSession');  
	class UsersController extends AppController
	{
		public $helpers = array('Html','Form','Paginator','Js');
		public $uses = array('User','Dog','Event');
		public $name = "Users";
		
		public $paginate = array(
			'limit'=>12,
			'page'=>1,
			'order'=>array('User.id' =>'asc'),);
			
			
			
		public function index()
		{
		$keywords = NULL;
			if(isset($this->passedArgs['search']))
			{
				$keywords = $this->passedArgs['search'];
				$conditions = array("OR"=>array("User.last_name LIKE"=>"%$keywords%"
										));
				$this->set('users',$this->paginate($conditions));
			}
			else
			{
				$this->set('users',$this->paginate());
			}
			$this->set('keywords',$keywords);
			

		}
		
		
		
		
		
		public function search()
		{
			$url['action']='index';
			$url['search']=$this->data['User']['Keywords'];
			
			$this->redirect($url,null,true);
		
		}
	}
?>
