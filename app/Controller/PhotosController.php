<?php
	class PhotosController extends AppController
	{
		
		
		var $uses = array('Photo');
		public $helpers = array('Html', 'Form', 'Paginator');
		public $name = "Photos";
		public $data = null;
		public $paginate = array(
        'limit' => 9,
		'page' => 1,
		'order' => 'Photo.id',
        
    );
	
		public function search()
		{
			$url['action'] = 'index';  
			$url['search'] = $this->request->data['Photo']['Keywords'];
			$this->redirect($url, null, true); 
		}
		
		public function index()
		{
			if( !isset($this->passedArgs['search']))
			{
				$url['action'] = 'index';
				$url['search'] = '';
				$this->redirect($url, null, true);
			}
			
			$this->Photo->recursive = 0;  
			$themeId = 0;
			$keywords = NULL;
		
		
		// Search Keywords
		if(isset($this->passedArgs['search']))
		{
			$keywords = $this->passedArgs['search'];
			$conditions = array( 'OR' => array(
				"Photo.path_alt LIKE" => "%$keywords%"
			));
			$this->set('gallerys',$this->paginate($conditions));
			
		}
		else
		{
		$this->set('gallerys', $this->paginate()); 
		}
		$this->set('keywords', $keywords);
			
		}
		
		public function view($id=NULL)
		{
			$this->Photo->id = $id;
			$this->set('gallery', $this->Photo->read(null, $id));

		}
		
		public function viewall() {
		$this->set('gallerys', $this->Photo->find('all'));
		}
		
		public function add() {
			

		  if ($this->request->is('post'))
		  { 
			  if(isset($this->request->data['Cancel']))
			  {
				  $this->Session->setFlash('-- Image Not Saved --'); 
				  $this->redirect(array('action' => 'viewall')); 
			  }
		  //upload image if user has selected one
			$fileOK = $this->uploadFiles('img/uploads', $this->request->data['Photo']['gallery_image']);

			if(array_key_exists('urls', $fileOK))
				{
					$this->request->data['Photo']['gallery_image'] = $fileOK['urls'][0];
					
					 
					if ($this->Photo->saveAll($this->request->data)) 
					{ 
					 $this->Session->setFlash('Gallery Added Successfully'); 
					 $this->redirect(array('action' => 'viewall')); 
					} 
				}
			else
				{
					$this->Session->setFlash('-- Must Select An Image --'); 
				}
		  }
		}
		
		public function edit($id=NULL)
		{
			$this->Photo->id = $id;
			
			 $this->set('gallery', $this->Photo->findById($id));
			if ($this->request->is('post') || $this->request->is('put'))
			{
				// abort if cancel button was pressed
				if (isset( $this->request->data['Cancel']))
				{
					$this->Session->setFlash('Changes were not saved', true);
					$this->redirect( array( 'action' => 'viewall' ));
				}
	
				$conditions = array("Photo.id" => $id);
				$results = $this->Photo->find('first', array('conditions' => $conditions));
	
				$currentImage = $results['Photo']['gallery_image'];
	
				//upload image
				$fileOK = $this->uploadFiles('img/uploads', $this->request->data['Photo']['gallery_image']);
	
				if(array_key_exists('urls', $fileOK))
				{
					$this->request->data['Photo']['gallery_image'] = $fileOK['urls'][0];
				}
				else
				{
					$this->request->data['Photo']['gallery_image'] = $currentImage;
				}


			 if ($this->Photo->saveAll($this->request->data))
				{
					$this->Session->setFlash('The image has been saved');
					$this->redirect(array('action' => 'viewall'));
				}
				else
				{
					$this->Session->setFlash('The image could not be saved. Please, try again.');
				}
			}
			else
				{
				$this->request->data = $this->Photo->read(null, $id);
				$currentImage = $this->Photo->data['Photo']['gallery_image'];
	
				if($currentImage != null)
				{
					$blnImage = true;
					$this->set(compact('blnImage'));
				}
				else
				{
					$blnImage = false;
					$this->set(compact('blnImage'));
				}
			}
		}
		/*
		public function delete($id = NULL)
		{
			$this->Photo->id = $id; 
			$this->Session->setFlash('Gallery '.$id.' has been deleted.');
			$this->Photo->delete($id); 
			$this->redirect(array('action'=>'viewall')); 
		}*/
		
		  public function delete($id = NULL) 
    { 
        $this->Photo->id = $id; 

        $conditions = array("Photo.id" => $id); 
        $results = $this->Photo->find('first', array('conditions' => $conditions)); 

        $currentImage = $results['Photo']['gallery_image']; 

        if(($currentImage != null) && ($currentImage !='noimage.jpg')) 
        { 
            $imageFolder = WWW_ROOT."img/uploads"; 
            $imagePath = $imageFolder.'/'.$currentImage; 
            unlink($imagePath); 
        } 

         $photoName = $this->Photo->path_alt; 
        if($this->Photo->delete($id)) 
        { 
            $this->Session->setFlash('Photo '.$photoName.' has been deleted.'); 
            $this->redirect(array('action'=>'index')); 
        } 
    } 
	}
	

  


?>