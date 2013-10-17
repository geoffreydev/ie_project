<?php
	App::uses('AppController', 'Controller');

     class ManagesController extends AppController{
	 
		
		
	public function index(){

	}
	
	
	public function view($id=null){
		$this->Photo->id = $id;
		if(!$this->Photo->exists()){
			throw new NotFoundException(__('Photo Not Found'));
		}
		$this->set('Photo',$this->Photo->read(null,$id));
		}
	
	public function add(){
		if($this->request->is('post')){
			if($this->Photo->Save($this->request->data)){
				$this->Session->write('No',$_SESSION['No']+1);
				$this->Session->setFlash(__('Photo added!! Add another photo or Navigate away..'));
				$this->redirect(array('action' => 'add/?id='.$this->data['Photo']['dogs_id']));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		}
	
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
public function edit($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been updated'));
				$this->redirect(array('controller'=>'dogs','action'=>'edit',$this->data['Photo']['dogs_id']));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Photo->read(null, $id);
		}

      
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->Photo->delete()) {
			$this->Session->setFlash(__('Photo deleted'));
			if(isset($_SESSION['role'])){
			$this->redirect(array('controller'=>'dogs','action' => 'admineditdog',$this->data['dogs_id']));
			}
			else{
			$this->redirect(array('controller'=>'dogs','action' => 'edit',$this->data['dogs_id']));	
			}
		}
		$this->Session->setFlash(__('Photo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
