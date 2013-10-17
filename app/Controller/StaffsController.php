<?php
/*
	This is the staff controller used by staff members to administer other staff members.
*/

App::uses('UserMgmtAppController', 'Usermgmt.Controller');


class StaffsController extends UserMgmtAppController {

    public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken', 'Dog','Dog_Events', 'Event', 'User', 'Staff');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->User->userAuth=$this->UserAuth;
    }

    public function index() {
        $keywords = NULL;
        $this->set('users',$this->paginate());
        $this->set('keywords',$keywords);
    }

	public function view($userId=null) {
		if (!empty($userId)) {
			$user = $this->User->read(null, $userId);
			$this->set('user', $user);
		} else {
			$this->redirect('/staffs');
		}
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

	public function add() {
        if ($this->request -> isPost()) {
            $this->Staff->set($this->data);
          //  if ($this->Staff->RegisterValidate()) {
                if ($this->Staff->StaffValidate()) {
                    $this->request->data['User']['email_verified']=1;
                    $this->request->data['User']['active']=1;
                    $salt=$this->UserAuth->makeSalt();
                    $this->request->data['User']['salt'] = $salt;
                    $thepass=$this->generatePassword();
                    $theuser=$this->generateUsername();
                    $this->request->data['User']['password'] = $this->UserAuth->makePassword($thepass, $salt);
                    $this->request->data['User']['user_group_id']=1;
                    $this->request->data['User']['username'] = $theuser;
                    $this->request->data['User']['mobile_phone'] = $this->data['Staff']['mobile_phone'];
                    $this->request->data['User']['email'] = $this->data['Staff']['email'];
                    $this->request->data['User']['first_name'] = $this->data['Staff']['first_name'];
                    $this->request->data['User']['last_name'] = $this->data['Staff']['last_name'];
                    $this->User->save($this->request->data,false);
                    $this->Session->setFlash(__('Staff member added with username: '.$theuser.' and password: '.$thepass));
                    $this->redirect('/staffs');
                }
         //   }
        }
    }

		public function result()
		{

		$keywords = NULL;
			if(isset($this->passedArgs['search']))
			{
				$keywords = $this->passedArgs['search'];
				$conditions = array("OR"=>array(
											"User.last_name LIKE"=>"%$keywords%"
										));
				$this->set('users',$this->paginate($conditions));
				$count = $this->User->find('count', array('conditions' => $conditions));
				
				$this->set('count',$count);
			}
			else
			{
				$this->set('users',$this->paginate());
			}
			$this->set('keywords',$keywords);

		}

    public function delete($userId=null) {
        if (!empty($userId)) {
            $user = $this->User->read(null, $userId);
            $this->set('user', $user);
            $this->User->delete($userID);
            $this->Session->setFlash('The staff member has been removed.');
            $this->redirect(array('controller' => 'staffs', 'action' => 'index'));
        } else {
            $this->Session->setFlash('No staff member specified.');
            $this->redirect('/staffs');
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
        $firstname = strtolower(substr($this->data['Staff']['first_name'], 0, 2));
        $lastname = strtolower(substr($this->data['Staff']['last_name'], 0, 3));
        $number = 1;
        while ($user = $this->User->findByUsername($firstname.$lastname.$number)) {
            $number = $number + 1;
        }
        return $firstname.$lastname.$number;
    }

    public function edit($id) {
        if (!empty($id)) {
            $this->User->id = $id;
            if ($this->request -> isPut())
            {
                if ($this->User->save($this->request->data))
                {
                    if ($this->Session->read('UserAuth.User.user_group_id') == 4) {
                        $this->Session->setFlash('Staff member details updated.');
                        $this->redirect(array('controller' => 'staffs', 'action' => 'index'));
                    } else if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
                        $this->Session->setFlash('Your details were updated.');
                        $this->redirect(array('controller' => 'admins', 'action' => 'index'));
                    }
                }
                else
                {
                    $this->Session->setFlash('The information could not be saved. Please, try again.');
                }
            } else {
                $user = $this->User->read(null, $id);
                $this->request->data=null;
                if (!empty($user)) {
                    $user['Staff']['password']='';
                    $this->request->data = $user;
                }
            }
        }
    }
}