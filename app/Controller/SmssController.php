<?php
App::uses('Controller', 'Users');
App::import('component', 'CakeSession');
class SmssController extends AppController{

    public $helpers = array('Html', 'Form','Usermgmt.UserAuth');
    public $name = "Smss";
    public $user = null;

    var $uses = array('User', 'Sms', 'Event');

    public function send($id=null)
    {
            $custID = $this->params['url']['custID'];
            $this->set("users",$this->User->find('all', array('fields'=>array('id','mobile_phone'))));
            $this->set("user",$this->request->data=$this->User->findById($custID));
            $user=$this->request->data=$this->User->findById($custID);
            $this->request->data=$this->Sms->findById($id);
            $this->request->data['Sms']['purpose'];
            $this->Session->setFlash('SMS sent!');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, "http://www.smsglobal.com/http-api.php?action=sendsms&user=Sirucci&password=yourpass&from=0411497391&to=61".substr($user['User']['mobile_phone'], 1)."&text=".$this->request->data['Sms']['message']);
            if(curl_exec($ch)) {
                    $this->Session->setFlash('Message Sent');
                    $this->redirect('/events/viewall/0');
            }
            else
            {
                $this->Session->setFlash(__('SMS Sending error.'));
            }
    }


    public function edit($id=null)
    {
        if(empty($this->request->data))
        {
        $this->set("smss",$this->Sms->find('all', array('fields'=>array('Sms.id','Sms.purpose', 'Sms.message'))));
        $this->request->data=$this->Sms->findById($id);
        $this->request->data['Sms']['message'] = urldecode($this->request->data['Sms']['message']);
        } else {
            $this->request->data['Sms']['message'] = urlencode($this->request->data['Sms']['message']);
            if($this->Sms->save($this->request->data)) {
                $this->Session->setFlash('SMS updated!');
                $this->redirect('/smss');
            }
        }
    }


    public function index($id=null)
    {
        $this->set("smss",$this->Sms->find('all', array('fields'=>array('Sms.id','Sms.purpose', 'Sms.message'))));

        if(empty($this->request->data))
        {
        }
        elseif($this->request->is('post')||$this->request->is('put'))
        {
            $this->request->data=$this->Sms->findById($id);
            $this->request->data['Sms']['purpose'];
            $this->Session->setFlash('SMS sent!');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://www.smsglobal.com/http-api.php?action=sendsms&user=Sirucci&password=yourpass&from=0411223344&to=61401598418&text=".$this->request->data['Sms']['message']);
            if(curl_exec($ch)/*1 == 1*/) {
                $this->Session->setFlash('SMS sent!');
            }
            else
            {
                $this->Session->setFlash(__('Unknown error'));
            }
        }
    }

    /**
     * This function is called from a cronjob on the localhost.
     * Login system must be setup to allow access from guests.
     */
    public function autoSend($id=null)
    {
        /**
         * Tomorrow's date is defined below.
         */
//        $tomorrow = date("d/m/Y", mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y")));
        $tomorrow = date("Y-m-d", mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y")));
        echo $tomorrow;
        /**
         * If the request does not come from the same ip address as the server, it will be rejected.
         */
        if ($_SERVER['REMOTE_ADDR'] != $_SERVER['SERVER_ADDR']) {
            $this->redirect('/');
        } else {
            /* Loop through and send smses to all results found */
            $this->set("events",$this->Event->find('all', array('fields'=>array('id','event_userid'), 'conditions'=>array('Event.date'=>$tomorrow, 'Event.proplanning' => 2, 'Event.sms_toggle' => 1))));
            $events=$this->Event->find('all', array('fields'=>array('id','event_userid'), 'conditions'=>array('Event.date'=>$tomorrow, 'Event.proplanning' => 2, 'Event.sms_toggle' => 1)));
            $this->set("users",$this->User->find('all', array('fields'=>array('id','mobile_phone'))));

            /*
             * Get the sms with id 2 which is the Booking Reminder
             */
            $this->request->data=$this->Sms->findById(2);
            $this->request->data['Sms']['purpose'];
            $this->set("sms",$this->request->data=$this->Sms->findById(2));
            $sms=$this->request->data=$this->Sms->findById(2);


            foreach ($events as $event) {
                echo $event['Event']['event_userid'];
                $this->set("user",$this->request->data=$this->User->findById($event['Event']['event_userid']));
                $user=$this->request->data=$this->User->findById($event['Event']['event_userid']);
                debug($user['User']['mobile_phone']);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://www.smsglobal.com/http-api.php?action=sendsms&user=Sirucci&password=yourpass&from=0411223344&to=61".substr($user['User']['mobile_phone'], 1)."&text=".$sms['Sms']['message']);
                curl_exec($ch);
            }
        }
    }
}
		