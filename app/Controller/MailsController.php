<?php
App::uses('Controller', 'Users', 'CakeEmail', 'Network/Email');
App::import('component', 'CakeSession');
class MailsController extends AppController{

    public $helpers = array('Html', 'Form','Usermgmt.UserAuth');
    public $name = "Mails";
    public $user = null;

    var $uses = array('User', 'Mail');

    public function send($id=null)
    {

        if(empty($this->request->data))
        {

        }
        elseif($this->request->is('post')||$this->request->is('put'))
        {
                    $Email = new CakeEmail('gmail');
                    $this->request->data=$this->Mail->findById($id);
                    $Email->to('paul.christidis@gmail.com');
                    $Email->subject('Test');
                    $Email->template('default');
                    $Email->emailFormat('html');
                    $Email->send();
                    $this->Session->setFlash('email sent!');
        }
    }
    public function index() {

    }


}
		