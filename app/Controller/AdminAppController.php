<?php

App::uses('AppController', 'Controller');

class AdminAppController extends AppController {
    public $theme = "Metro";
    public $helpers = array('Html', 'Form', 'Session', 'Text', 'Time', 'Js', 'Paginator');
	public $components = array('Tool','Session','RequestHandler','Cookie');
	
    
    public function beforeFilter() {
		parent::beforeFilter();
		 $this->checkLogined();
		// $this->isAdmin();
        // $admin = array();
        // if($this->Session->check('admin'))
        // {
        // 	$admin = $this->Session->read('admin');
        // 	debug($admin);
        // }
        // $this->set(compact('admin'));
		// check login


    }
	/**
	*Method: checklogin
	*Description:check admin's user is logined
	*@author: haipt
	*@create_date: 2015-04-16
	**/
	public function checkLogined()
	{
		if (!(strtolower($this -> action) == 'admin_login')) {
			if (!$this->_isAdmin()) {
            	$this -> redirect(array('controller' => 'Admins', 'action' => 'login','admin'=>true));
            } else {
                $admin = $this -> Session -> read('admin');
                $this->set(compact('admin'));
            }
        }
	}
	/**
	*Method: checklogin
	*Description:check admin's user is logined
	*@author: haipt
	*@create_date: 19/09/2015
	**/
	public function isLogined()
	{
		return $this -> Session -> check('admin');
	}
	/**
	*Method: checklogin
	*Description:check admin's user is logined
	*@author: haipt
	*@create_date: 19/09/2015
	**/
	public function _isAdmin()
	{
		$checkAdmin = false;
		if($this->isLogined()){
			$admin = $this->Session->read('admin');
			$this->loadModel('Admin');
			$getInfo = $this->Admin->find('first',array(
				'conditions'=>array(
					'Admin.email' 		=> $admin['Admin']['email'],
					'Admin.password' 	=>$admin['Admin']['password'],
					'Admin.role_id' 	=> 1
				),
			));
			if(!empty($getInfo)){
				$checkAdmin = true;
			}
		}		
		return $checkAdmin;
	}
	
	/**
	* Method: blackholeError
	* Descript: handler blackhole
	* @author: haipt
	* @create_date: 2015-05-08
	**/
    public function blackholeError($type)
    {
      // $this->redirect(array('controller'=>'admins','action'=>'error', 'admin' => true));
    }
/**
* Function create thumbnail
**/	

	public function createThumbs($pathToImages, $pathToThumbs, $thumbWidth,$thumbHeight ) 
	{
		ini_set('track_errors', '1');
	    $info = pathinfo($pathToImages);
	    // continue only if this is a JPEG image
	    $ext = strtolower($info['extension']);

	    //debug($ext);exit;
	    if($ext){
	    	try{
	    		switch($ext)
				{
				  	case 'gif':
				   		$img = imagecreatefromgif($pathToImages);
				 	 break;
				  
					case 'jpg':
					   $img = imagecreatefromjpeg($pathToImages);
					  break;
					case 'jpeg':
					  	 $img = imagecreatefromjpeg($pathToImages);
					  break;
					  
					case 'png':
					   $img = imagecreatefrompng($pathToImages);
					   
					  break;
				}
				if($img){
					//width and height image
				    $width = imagesx( $img );
				    $height = imagesy( $img );
					if($width/$height >=1)
					{
						$new_width = $thumbWidth;
						$new_height = floor($new_width * $height/$width);
					}
					else{
						$new_height = $thumbHeight;
						$new_width = floor($new_height * $width/$height);
					}
					$new_width = $thumbWidth;
				    $new_height = floor( $height * ( $thumbWidth / $width ) );

				    // create a new temporary image
				    $tmp_img = imagecreatetruecolor( $new_width, $new_height );

				    // copy and resize old image into new image 
				    imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

				    // save thumbnail into a file
				    switch($ext)
					{
					  	case 'gif':
					   		imagegif( $tmp_img, $pathToThumbs);
					 	 break;
					  
						case 'jpg':
						   imagejpeg( $tmp_img, $pathToThumbs);
						  break;
						case 'jpeg':
						  	imagejpeg( $tmp_img, $pathToThumbs);
						  break;
						  
						case 'png':
						   imagepng( $tmp_img, $pathToThumbs);
						   
						  break;
					} 
					return true;
				} 
				else{
					return false;
				}
				
	    	}
	    	catch(Exception $e)
	    	{
	    		debug("Test");exit;
	    		return false;
	    	}
		    
		    
	    }
	   
	  
	  
	}
	
}
