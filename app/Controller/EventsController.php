<?php
    App::uses('Controller', 'Users'); 
	App::import('component', 'CakeSession');  
	class EventsController extends AppController
	{	
		public $helpers = array('Html', 'Form');
		public $name = "Events";
		public $user = null;
		var $uses = array('User', 'Event','Dog', 'Sms', 'DogsEvents');
		
		public function newevent()
		{
            if ($this->Session->read('UserAuth.User.user_group_id') == 2)
            {
                $proplanning = 1;
                $id = $this->UserAuth->getUserId();
                $custID = $this->UserAuth->getUserId();

            } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                $id = $this->params['url']['custID'];
                $proplanning = 2;
            } else {
                $this->redirect("/login");
            }
            if ($this->request->is('post')) {

                $this->Event->create();
                $data['Event']['Event']=array();
                $data = array();
                if ($this->Session->read('UserAuth.User.user_group_id') == 2)
                {
                    $data['sms_toggle']=0;
                    debug('zero');

                } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                    $data['sms_toggle']=$this->request->data['Event']['sms_toggle'];
                }
                $data['event_userid']=$id;
                $data['event_theme']= $this->request->data['Event']['event_theme'];
                $data['date']= $this->request->data['Event']['date'];
                $data['hour']= $this->request->data['Event']['hour'];//$hours;
                $data['minute']= $this->request->data['Event']['minute'];//$minutes;
                $data['proplanning']=$proplanning;

                $data['event_comment']= $this->request->data['Event']['event_comment'];

                $data['Dog']['Dog'] = array();
                foreach($this->request->data['Dog']['check'] as $k=>$v)
                {
                    if($v) $data['Dog']['Dog'][] = $k;
                }

			
			$this->set("dogs",$this->Dog->find("all",array('conditions'=>array('Dog.dog_userid'=>$id, 'Dog.status'=>1),'fields'=>array('Dog.id','Dog.name', 'Dog.breed','Dog.weight', 'Dog.sex','Dog.age'))));
                if($this->Event->save($data)) {
                    $date = date('d/m/Y', strtotime($this->request->data['Event']['date']));
                    if ($this->Session->read('UserAuth.User.user_group_id') == 2) {
                    $this->Session->setFlash(__('Thank you for your enquiry.  We will contact you as soon as possible to confirm your booking.'));
                    } else {
                        $this->Session->setFlash(__('The booking has been confirmed for '.$date));
                    }
                    if ($this->Session->read('UserAuth.User.user_group_id') == 2)
                    {
                        $this->redirect("/accounts/#booking-pane");
                    } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                        $this->redirect("/customers/view/$id");
                    }
                }
		    }

                $dogs= $this->Event->Dog->find('list', array('conditions'=>array('Dog.dog_userid'=>$id, 'Dog.status'=>1),'fields'=>array('Dog.id','Dog.name')));
                $this->set(compact('dogs'));
		}

        public function edit($id=null){
            $testEvent = $this->Event->find("all",array('conditions'=>array('Event.id'=>$id),'fields'=>array('Event.id','Event.date','Event.event_theme', 'Event.event_comment','Event.hour','Event.minute','Event.proplanning')));
            $this->set("event",$testEvent);

            if (empty($this->data))
            {
                $this->data = $this->Event->findById($id);
            }
            if(($this->request->is('post')) || ($this->request->is('put')))
            {
                foreach($this->data['Dog']['checkbox'] as $k=>$v)
                {
                    if ($v) $this->request->data['Dog']['Dog'][] = $k;
                }
                $from = $this->request->data['Event']['date'];
                $from = str_replace('/', '-', $from);
                $f =  date('Y-m-d', strtotime($from));
                $this->request->data['Event']['date']=$f;


                if ($this->User->validates()) {
                    if($this->Event->save($this->request->data))
                    {
                        $this->Session->setFlash(__('Booking has been updated successfully!'));
                        if ($this->Session->read('UserAuth.User.user_group_id') == 2){
                            $this->redirect("/accounts/#booking-pane");
                        } else {
                            $goto=$id = $this->params['url']['goto'];
                            if ($goto < 5 ) {
                                $this->redirect("/events/viewall/".$goto);
                            } else if ($goto > 4 ){
                                $this->redirect("/customers/view/".$goto);
                            } else {
                                $this->redirect("/events/viewall/0");
                            }
                        }
                    }
                }
            }
            $passData = $this->request->params['pass'];
            $ID = $passData[0];
            $userID = $this->Event->query('SELECT event_userid FROM events WHERE id='.$ID);
            $test = $userID[0]['events']['event_userid'];
            $dogs = $this->Event->Dog->find('list',array('conditions' => array('Dog.dog_userid'=>$test, 'Dog.status'=>1),array('fields'=>array('Dog.id','Dog.name'))));
            $this->set(compact('dogs'));
        }



        public function view($id=null){
            if (empty($this->data))
            {
                $this->data = $this->Event->findById($id);
            }
            if(($this->request->is('post')) || ($this->request->is('put')))
            {
                if($this->Event->save($this->request->data))
                {

                    $this->Session->setFlash(__('Booking has been UPDATED successfully!'));
                    $this->redirect("/accounts/#booking-pane");
                }
                elseif(isset($this->request->data['Cancel']))
                {
                    $this->Session->setFlash(__('Changes were not saved',true));
                    $this->redirect("/accounts/#booking-pane");
                }
                else
                {
                    $this->Session->setFlash(__('Unknown error'));
                }
            }
        }
		
	
		public function delete($id)
		{
			$this->Event->id = $id;
			$this->Session->setFlash('The booking has been canceled.');
            $this->data = $this->Event->findById($id);
            $this->request->data['Event']['proplanning']=3;
            if($this->Event->save($this->request->data))
                $this->Event->query('Update dogs_events SET status=1 WHERE  event_id='.$id);

            if ($this->Session->read('UserAuth.User.user_group_id') == 2)
            {
                $this->redirect("/accounts/#booking-pane");

            } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                $this->redirect('/events/viewall/0');
            } else {
                $this->redirect("/login");
            }

		}

        public function dna($id)
        {
            $this->Event->id = $id;
            $this->Session->setFlash('The booking has been canceled.');
            $this->data = $this->Event->findById($id);
            $this->request->data['Event']['proplanning']=5;
            if($this->Event->save($this->request->data))
                $this->Event->query('Update dogs_events SET status=1 WHERE  event_id='.$id);

            if ($this->Session->read('UserAuth.User.user_group_id') == 2)
            {
                $this->redirect("/accounts/#booking-pane");

            } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                $this->redirect('/events/viewall/0');
            } else {
                $this->redirect("/login");
            }

        }

        public function confirm($id)
        {
            $this->Event->id = $id;
            $this->Session->setFlash('The booking has been confirmed.');
            $this->data = $this->Event->findById($id);
            $this->request->data['Event']['proplanning']=2;
            if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                if($this->Event->save($this->request->data)) {
                    $this->redirect('/events/viewall/0');
                }
            }
        }
    	public function adminview($id)
		{
			$this->Event->id = $id;
			$this->set("events", $this->Event->find("all",array('conditions' => array('Event.id'=>$id))));
			$this->set('event', $this->Event->read());
		}

        public function viewall($id)
        {
            date_default_timezone_set('Australia/Melbourne');
            $today=date('Y/m/d');
            $this->set('id', $id);
            if($id > 4)
            {
                $id = 0;
            }
            if($id == 0) {
                $this->set("events", $this->Event->find("all", array('order' => 'Event.event_userid ASC', 'conditions'=>array('Event.date'=>$today), 'fields'=> array ('Event.id','event_userid', 'Event.event_comment', 'Event.proplanning','Event.hour','Event.price','Event.date','Event.minute','Event.event_theme','User.first_name','User.last_name','User.mobile_phone','User.work_phone','User.landline_phone'))));

            } else if ($id == 3) {
                $this->set("events", $this->Event->find("all", array('conditions'=>array('Event.proplanning'=>$id),'order' => 'Event.event_userid ASC', 'fields'=> array ('Event.id','Event.event_comment','Event.date','Event.event_userid','Event.proplanning','Event.hour','Event.price','Event.minute','Event.event_theme','Event.end','User.first_name','User.last_name','User.mobile_phone','User.work_phone','User.landline_phone'))));

            } else {
                $this->set("events", $this->Event->find("all", array('conditions'=>array('Event.proplanning'=>$id),'order' => 'Event.event_userid ASC', 'fields'=> array ('Event.id','Event.event_comment','Event.date','Event.event_userid','Event.proplanning','Event.hour','Event.price','Event.minute','Event.event_theme','Event.end','User.first_name','User.last_name','User.mobile_phone','User.work_phone','User.landline_phone'))));
            }
            $this->set("dogs",$this->Dog->find("all",array('conditions'=>array('Dog.status'=>1),'fields'=>array('Dog.id','Dog.name','Dog.age_measure', 'Dog.breed','Dog.weight', 'Dog.sex','Dog.age', 'Dog.comment', 'Dog.status', 'Dog.dog_userid'))));

        }
		public function index()
		{
		$keywords = NULL;
			if(isset($this->passedArgs['search']))
			{
				$keywords = $this->passedArgs['search'];
				$conditions = array('OR'=>array(
											"Event.event_name LIKE"=>"%keywords%"
										));
				$this->set('events',$this->paginate($conditions));
			}
			else
			{
				$this->set('events',$this->paginate());
			}
			$this->set('keywords',$keywords);
        }

        public function search()
		{
			$url['action']='index';
			$url['search']=$this->data['Event']['Keywords'];
			$this->redirect($url,null,true);
		}

        public function complete($id)
        {
            if ($this->Session->read('UserAuth.User.user_group_id') == 2)
            {
                $this->redirect("/accounts");

            } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {

            } else {
                $this->redirect("/login");
            }
            $this->Event->id = $id;
            $this->Session->setFlash('The booking has been confirmed.');
            $this->data = $this->Event->findById($id);
            $this->request->data['Event']['proplanning']=4;
            if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                if($this->Event->save($this->request->data)) {
                    $this->redirect('/events/viewall/0');
                }
            }
            $this->request->data=$this->Event->findById($id);
            $events=$this->Event->find("all", array('conditions'=>array('Event.proplanning'=>$id),'order' => 'Event.event_userid ASC', 'fields'=> array ('Event.id','Event.event_userid')));
                    $this->Session->setFlash('Booking completed.');
                    $this->redirect("/smss/send/3?custID=".$this->request->data['Event']['event_userid']);
        }

        public function generateHoursMinites() {
            $hours = $this->data['Event']['hour']+7;
            if ($this->data['Event']['minute'] != '0') {
                $minutes = $this->data['Event']['minute']*15;
            } else {
                $minutes = '00';
            }
            $hrsMinsArray=array($hours,$minutes);
            return $hrsMinsArray;
        }

        public function copy($id=null){
            $testEvent = $this->Event->find("all",array('conditions'=>array('Event.id'=>$id),'fields'=>array('Event.id','Event.date','Event.event_theme', 'Event.event_comment','Event.hour','Event.minute','Event.proplanning')));
            $this->set("event",$testEvent);
            if (empty($this->data))
            {
                $testEvent = $this->Event->find("all",array('conditions'=>array('Event.id'=>$id),'fields'=>array('Event.id','Event.date','Event.event_theme', 'Event.event_comment','Event.hour','Event.minute','Event.proplanning')));
                $this->set("event",$testEvent);
                //Make this a new booking (create) rather than an update.
                unset($this->request->data['Event']['id']);
                unset($this->request->data['Event']['price']);
                $this->data = $this->Event->findById($id);
            }
            if(($this->request->is('post')) || ($this->request->is('put')))
            {
                $from = $this->request->data['Event']['date'];
                $from = str_replace('/', '-', $from);
                $f =  date('Y-m-d', strtotime($from));

                $row = $this->Event->findById($id);
                $row['Event']['id'] = NULL;
                $row['Event']['price'] = NULL;
                $row['Event']['proplanning'] = 2;
                $row['Event']['sms_toggle'] = $this->request->data['Event']['sms_toggle'];
                $row['Event']['date']=$f;
                $row['Event']['minute']=$this->request->data['Event']['minute'];
                $row['Event']['hour']=$this->request->data['Event']['hour'];
                $this->Event->save($row);
                $this->redirect("/events/viewall/0");
            }
        }
        public function display()
        {
            date_default_timezone_set('Australia/Melbourne');
            $this->set('id', 0);
            $id = 0;
            if ($this->request->is('post')) {
                $this->Event->create();
                $from = $this->request->data['Event']['from'];
                $to = $this->request->data['Event']['to'];
                $this->set('from', $from);
                $this->set('to', $to);
                $from = str_replace('/', '-', $from);
                $start = strtotime($from);
                $f =  date('Y-m-d', strtotime($from));
                $to = str_replace('/', '-', $to);
                $start = strtotime($to);
                $t =  date('Y-m-d', strtotime($to));
                if($id == 0) {
                    $conditions = array('Event.date BETWEEN ? AND ?' => array($f,$t));
                    $this->set("events", $this->Event->find("all", array('conditions'=>$conditions,'order' => 'Event.event_userid ASC', 'fields'=> array ('Event.id','event_userid','Event.proplanning','Event.date','Event.price','Event.hour','Event.minute','Event.event_theme','User.first_name','User.last_name','User.mobile_phone','User.work_phone','User.landline_phone'))));
                    $this->set("dogs",$this->Dog->find("all",array('conditions'=>array('Dog.status'=>1),'fields'=>array('Dog.id','Dog.name','Dog.age_measure', 'Dog.breed','Dog.weight', 'Dog.sex','Dog.age', 'Dog.comment', 'Dog.status', 'Dog.dog_userid'))));
                }
            }
        }
    }
?>