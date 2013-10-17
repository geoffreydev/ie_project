<?php 
	 App::uses('Controller', 'Users'); 
	App::import('component', 'CakeSession'); 
	class DogsController extends AppController{
	
		public $helpers = array('Html', 'Form');
		public $name = "Dogs";	
		public $user = null;
		
		var $uses = array('User', 'Dog');
	public function add_dog(){
        /**
         * Sets the user ID for the dog.
         * If admin, this is derrived from HTTP GET parameters.
         * If customer, it is determined by their customer ID.
         * This also prevents customers from adding dogs to each other.
         */
        if ($this->Session->read('UserAuth.User.user_group_id') == 2)
        {
            $id = $this->UserAuth->getUserId();

        } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
            $id = $this->params['url']['custID'];
        } else {
            $this->redirect("/login");
        }
		
		if($this->request->is('post')){
			$data = array(
            "Dog"=>array(
                'dog_userid'=>$id,
                'name'=>$this->request->data['Dog']['name'],
                'breed'=>$this->request->data['Dog']['breed'],
                'weight'=>$this->request->data['Dog']['weight'],
                'sex'=>$this->request->data['Dog']['sex'],
                'age'=>$this->request->data['Dog']['age'] + 1,
                'comment'=>$this->request->data['Dog']['comment'],
                'age_measure'=>$this->request->data['Dog']['age_measure']
                )
            );
            if($this->Dog->save($data)){
                $this->Session->setFlash(__('Your dog has been added to your Canine Clip Joint account!'));
                if ($this->Session->read('UserAuth.User.user_group_id') == 2)
                {
                    $this->redirect("/accounts/#dog-pane");

                } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                    $this->Session->setFlash('The customer\'s dog has been added to their account.');
                    $this->redirect("/customers/view/$id");
                } else {
                    $this->redirect("/login");
                }
            }
	    }
    }
	
	public function edit($id=null)
	{
		$this->Dog->id = $id;
		if(empty($this->request->data))
		{
			$this->request->data=$this->Dog->findById($id);
            //Compensate for index offset in view.
            $this->request->data['Dog']['age']=$this->request->data['Dog']['age'] - 1;
		}
		elseif($this->request->is('post')||$this->request->is('put'))
		{
            //Compensate for index offset in view.
            $this->request->data['Dog']['age']=$this->request->data['Dog']['age'] + 1;
			if($this->Dog->save($this->request->data))
			{
				$this->Session->setFlash('This dog\'s details have been updated!');
                if ($this->Session->read('UserAuth.User.user_group_id') == 2)
                {
                    $this->redirect("/accounts/#dog-pane");
                } else if($this->Session->read('UserAuth.User.user_group_id') == 1)
                    $goto=$id = $this->params['url']['goto'];
                    $this->redirect("/customers/view/".$goto);
                }
            //Reset dog age if validation fails (prevent it from incrementing each time).
            $this->request->data['Dog']['age']=$this->request->data['Dog']['age'] - 1;
			}
		}

	
	public function delete($id)
	{
        $this->Dog->id = $id;
       // debug($id);

        /**
         * If the dog is booked into any events, do not allow them to be updated.
         */
        $thisone = $this->Dog->query('SELECT event_id FROM dogs_events WHERE dog_id='.$id.' AND status = 0');
 //       debug($thisone);
        $this->request->data=$this->Dog->findById($id);
        if (!empty($thisone)) {
            $this->Session->setFlash($this->request->data['Dog']['name'].' is currently booked in.  Please remove '.$this->request->data['Dog']['name'].' from any bookings and try again.');
            if ($this->Session->read('UserAuth.User.user_group_id') == 2)
            {
                $this->redirect("/accounts/#dog-pane");
            } else if($this->Session->read('UserAuth.User.user_group_id') == 1)
            {
                $this->request->data=$this->Dog->findById($id);

                $this->redirect("/customers/view/".$this->request->data['Dog']['dog_userid']);
            }
        }

        /**
         * Soft-Delete the dog.
         */

        $this->request->data['Dog']['status']=0;
        $this->request->data['Dog']['date_of_removal']=date('Y-m-d H:i:s');


            if($this->Dog->save($this->request->data))
            {
                $this->Session->setFlash($this->request->data['Dog']['name'].' has been removed.');
                if ($this->Session->read('UserAuth.User.user_group_id') == 2)
                {
                    $this->redirect("/accounts/#dog-pane");
                } else if($this->Session->read('UserAuth.User.user_group_id') == 1)
                {
                    $this->redirect("/customers/view/43");
                }
        }


        //Actually Delete The dog (this code has been depreceated).
        /*
		$this->Dog->id = $id;
		$this->Session->setFlash('The Dog has been removed.');
		$this->Dog->delete($id);
        if ($this->Session->read('UserAuth.User.user_group_id') == 2)
        {
		$this->redirect("/accounts/#dog-pane");
        } else if($this->Session->read('UserAuth.User.user_group_id') == 1)
        {
            $this->redirect("/customers");
        }*/
    }
}
		