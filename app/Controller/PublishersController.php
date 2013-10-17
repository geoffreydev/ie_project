<?php 
 class PublishersController extends AppController 
 { 
 public function index() 
 { 
 $this->set("publishers", 
 $this->Publisher->find("all", array('order' => 'company_name 
 ASC'))); 
 }


public function view($id=null)
{
		$this->Publisher->id = $id;
		$this->set('publisher', $this->Publisher->read());
}

public function edit($id=null)
{
		$this->Publisher->id = $id;
		if(empty($this->data))
		{
			$this->data=$this->Publisher->findById($id);
			}
		else
		{
			if($this->Publisher->save($this->data))
			{
				$this->Session->setFlash('Publisher Updated Successfully');
				$this->redirect(array('action' => 'index'));
			}
		}

}

public 	function delete($id, $companyName) 
 { 
	 $this->Publisher->id = $id; 
	 $this->Publisher->company_name = $companyName;
	 $this->Session->setFlash('Company '.$companyName.' has been deleted.'); 
	 $this->Publisher->delete($id); 
	 $this->redirect(array('action'=>'index')); 
 } 	
		
		

 } 
 ?>