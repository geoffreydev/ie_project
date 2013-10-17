<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


	var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
    public $components = array(/*'DebugKit.Toolbar',*/'RequestHandler','Usermgmt.UserAuth','Session');
	
	function beforeFilter(){
		$this->userAuth();
      //  $this->loadModel('PageContent');
      //  $this->set('contactcontent', $this->PageContent->findByPage('contactus', 'content'));
		}
	private function userAuth(){
		$this->UserAuth->beforeFilter($this);
		}

    function uploadFiles($folder, $formdata, $itemId = null)
    {
// setup dir names absolute and relative
        $folder_url = WWW_ROOT.$folder;
        $rel_url = $folder;

// create the folder if it does not exist
        if(!is_dir($folder_url)) {
            mkdir($folder_url);
        }

// if itemId is set create an item folder
        if($itemId) {
// set new absolute folder
            $folder_url = WWW_ROOT.$folder.'/'.$itemId;
// set new relative folder
            $rel_url = $folder.'/'.$itemId;
// create directory
            if(!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

// list of permitted file types
        $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/pdf', 'text/pdf', 'text/x-pdf', 'text/doc', 'text/docx', 'txt/pdf', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

// replace spaces with underscores
        $filename = str_replace(' ', '_', $formdata['name']);
// assume filetype is false
        $typeOK = false;
// check filetype is ok
        foreach($permitted as $type)
        {
            if($type == $formdata['type'])
            {
                $typeOK = true;
                break;
            }
        }
// if file type ok upload the file
        if($typeOK)
        {
// switch based on error code
            switch($formdata['error']) {
                case 0:
// create full filename
                    $full_url = $folder_url.'/'.$formdata['name'];
                    $url = $rel_url.'/'.$formdata['name'];
// upload the file - overwrite existing file
                    $success = move_uploaded_file($formdata['tmp_name'], $url);

// if upload was successful
                    if($success)
                    {
//save the filename of the file
                        $result['urls'][] = $formdata['name'];
                    } else
                    {
                        $result['errors'][] = "Error uploaded ". $formdata['name']. "Please try again.";
                    }
                    break;
                case 3:
// an error occurred
                    $result['errors'][] = "Error uploading ".$formdata['name']." Please try again.";
                    break;
                default:
// an error occurred
                    $result['errors'][] = "System error uploading ".$formdata['name']. "Contact webmaster.";
                    break;
            }
        } elseif($formdata['error'] == 4) {
// no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
// unacceptable file type
            $result['errors'][] = $formdata['name']." cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }

        return $result;
    }
}

