<?php

	class PostsController extends AppController {
		public $name = 'Posts';
		
		public function index() {
			$this->set('posts',$this->Post->find('all') );
			$this->set('title_for_layout', 'Our Blog Title');
		}
					
		public function view($id = NULL) {
			$this->Post->id = $id;
			if (!$this->Post->exists()) {
				throw new NotFoundException('Invalid Post');
			}
			$this->set('post',$this->Post->read() );
		}
			
		public function add() {
			$this->set('title_for_layout', 'Add A Post');
			if ($this->request->is('post')) {
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash('The post was successfully added!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('The post was not saved, please try again');
				}
			}
		}
		
		public function edit($id = NULL) {
			$this->Post->id = $id;
			
			if (!$this->Post->exists()) {
				throw new NotFoundException('Invalid Post');
			}
			
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash('Save Worked');
					$this->redirect(array('action'=>'index'));
					
				} else {
					$this->Session->setFlash('Saved did not work');
				}
		
			} else {
				$this->request->data = $this->Post->read();
			}
		}
		
		function delete($id = NULL) {
			$this->Post->delete($id);
			$this->Session->setFlash('The post has been deleted');
			$this->redirect(array('action'=>'index'));
		}
		

	}
?>