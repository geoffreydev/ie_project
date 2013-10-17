<?php 
	 App::uses('Controller', 'Users'); 
	App::import('component', 'CakeSession');
class PagecontentsController extends AppController {
	
		public $helpers = array('Html', 'Form', 'Tinymce', 'TinyMCE.TinyMCE');

		public $name = "Pagecontents";
		public $user = null;
		
		//var $uses = array('User', 'Dog');

	public function edit($id=null)
	{
        $this->loadModel('PageContent');
      //  $this->set('content', $this->PageContent->findByPage($page, 'content'));
		$this->PageContent->id = $id;
		if(empty($this->request->data))
		{
			$this->request->data=$this->PageContent->findById($id);
            //Compensate for index offset in view.
            $this->request->data['PageContent']['page']=$this->request->data['PageContent']['page'];
		}
		elseif($this->request->is('post')||$this->request->is('put'))
		{
            //Compensate for index offset in view.
            $this->request->data['PageContent']['page']=$this->request->data['PageContent']['page'];
			if($this->PageContent->save($this->request->data))
			{
				$this->Session->setFlash('Page Edited!');
                if($this->Session->read('UserAuth.User.user_group_id') == 1)
                    $this->redirect("/pagecontents/edit/".$id);
                }
			}
		}

    public function index() {

    }

    public function gallery() {

    }


}
		