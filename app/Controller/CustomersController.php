<?php
/*
	This is the customer controller used by staff members to administer customers.
*/

App::uses('UserMgmtAppController', 'Usermgmt.Controller');


class CustomersController extends UserMgmtAppController {

	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken', 'Dog','Dog_Events', 'Event', 'User', 'Customer');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth=$this->UserAuth;
	}

	public function index() {
        $keywords = NULL;
        $this->set('users',$this->paginate());
        $this->set('keywords',$keywords);
	}

    public function search()
    {
        $keywords=$this->params->query['keywords'];
        $this->set('keywords',$keywords);
        $cond = array();
        $this->set('users',$this->paginate());
        $this->set('users',null);

        if (!empty($this->params->query['keywords'])){
            $cond=array('OR'=>array("User.last_name LIKE '%$keywords%'","User.mobile_phone LIKE '%$keywords%'", "User.work_phone LIKE '%$keywords%'","User.landline_phone LIKE '%$keywords%'",)  );
        }
        $count = $this->User->find('count', array('conditions' => $cond));
        $this->set('count',$count);
        $this->set('as',$this->paginate($cond));

    }

	public function view($userId=null) {

		if (!empty($userId)) {
            $this->set("dogs",$this->Dog->find("all",array('conditions'=>array('Dog.dog_userid'=>$userId, 'Dog.status'=>1),'fields'=>array('Dog.id','Dog.name', 'Dog.breed','Dog.weight', 'Dog.sex','Dog.age', 'Dog.comment'))));
            $this->set("events",$this->Event->find("all",array('conditions'=>array('Event.event_userid'=>$userId, 'Event.proplanning'=>2),'fields'=>array('Event.id','Event.date','Event.event_theme', 'Event.event_comment','Event.hour','Event.minute','Event.proplanning'))));
            $user = $this->User->read(null, $userId);
			$this->set('user', $user);
		} else {
			$this->redirect('/customers');
		}
	}

	public function add() {
        if ($this->request -> isPost()) {
            $this->Customer->set($this->data);
            if ($this->Customer->CustomerValidate()) {
                $this->request->data['User']['email_verified']=1;
                $this->request->data['User']['active']=1;
                $salt=$this->UserAuth->makeSalt();
                $this->request->data['User']['salt'] = $salt;
                $thepass=$this->generatePassword();
                $theuser=$this->generateUsername();
                $this->request->data['User']['password'] = $this->UserAuth->makePassword($thepass, $salt);
                $this->request->data['User']['user_group_id'] = 2;
                $this->request->data['User']['username'] = $theuser;
                $this->request->data['User']['mobile_phone'] = $this->data['Customer']['mobile_phone'];
                $this->request->data['User']['work_phone'] = $this->data['Customer']['work_phone'];
                $this->request->data['User']['landline_phone'] = $this->data['Customer']['landline_phone'];
                $this->request->data['User']['email'] = $this->data['Customer']['email'];
                $this->request->data['User']['first_name'] = $this->data['Customer']['first_name'];
                $this->request->data['User']['last_name'] = $this->data['Customer']['last_name'];
                $this->User->save($this->request->data,false);
                $this->Session->setFlash(__('Customer added with username: '.$theuser.' and password: '.$thepass));
                $this->redirect('/customers');
            } else {
                $this->Session->setFlash(__('Customer validation failed'));
            }
        }
    }

    public function delete($id) {
        if (!empty($id)) {
            $this->User->delete($id);
            $thisone = $this->Dog->query('Delete FROM dogs WHERE dog_userid='.$id);
            $thisone = $this->Dog->query('Delete FROM events WHERE event_userid='.$id);
            $this->Session->setFlash('The customer has been removed.');
            $this->redirect('/customers');
        } else {

            $this->Session->setFlash('No customer was specified.');
            $this->redirect('/customers');
        }
    }

    public function edit($id) {
        if (!empty($id)) {
            $this->User->id = $id;
            if ($this->request -> isPut())
            {
                if ($this->User->save($this->request->data))
                {
                    $this->Session->setFlash('Customer details updated');
                    $this->redirect(array('controller' => 'customers', 'action' => 'index'));
                }
                else
                {
                    $this->Session->setFlash('The information could not be saved. Please, try again.');
                }
            } else {
                $user = $this->User->read(null, $id);
                $this->request->data=null;
                if (!empty($user)) {
                    $user['Customer']['password']='';
                    $this->request->data = $user;
                }
            }
        }
    }

    public function generatePassword($length=9, $strength=1) {
        $vowels = 'aeuy';
        $consonants = 'bdghjmnpqrstvz';
        if ($strength & 1) {
            $consonants .= 'BDGHJLMNPQRSTVWXZ123456789';
        }
        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $password .= $consonants[(rand() % strlen($consonants))];
                $alt = 0;
            } else {
                $password .= $vowels[(rand() % strlen($vowels))];
                $alt = 1;
            }
        }
        return $password;
    }

    public function generateUsername() {
        $firstname = strtolower(substr($this->data['Customer']['first_name'], 0, 2));
        $lastname = strtolower(substr($this->data['Customer']['last_name'], 0, 3));
        $number = 1;
        while ($user = $this->User->findByUsername($firstname.$lastname.$number)) {
            $number = $number + 1;
        }
        return $firstname.$lastname.$number;
    }

    public function result()
    {

        $urlArray = $this->params['url'];

        if( !empty($urlArray) ){
            $this->redirect($urlArray, null, true);
        }


    }
}