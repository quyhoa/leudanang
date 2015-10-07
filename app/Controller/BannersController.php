<?php
App::uses('AdminAppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BannersController extends AdminAppController {
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Banner->recursive = 0;
		$this->Paginator->settings= array(
			'conditions'=>array('Banner.status'=>0),
			'order'=>array('Banner.order'=>'desc')	
			);
		$banners = $this->Paginator->paginate('Banner');
		$model = 'Banner';
		$this->set(compact('banners','model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
		$this->set('banner', $this->Banner->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$data  = $this->request->data;
			// upload image
			$files = $data['Banner']['image'];
			$ext = substr(strtolower(strrchr($files['name'], '.')), 1);
			$arr_ext = array('jpg', 'png','jpeg','gif');					
			if (in_array($ext, $arr_ext)) {
				if(!empty($files['name']) && $files['error'] != 1){
					$name_image=date('YmdHis').'.'.$ext;
					//upload file
					move_uploaded_file($files['tmp_name'], WWW_ROOT.'/img/tmp/'.$name_image);
			        //Thummanail
			        
			        $this->createThumbs(WWW_ROOT.'/img/tmp/'.$name_image,WWW_ROOT.'/img/banner/'.$name_image,735,240);
			        unlink(WWW_ROOT.'/img/tmp/'.$name_image);
			        $data['Banner']['image']=$this->webroot."img/banner/".$name_image;
			        $this->Banner->create();
					if ($this->Banner->save($data)) {
						$this->Session->setFlash(__('The Banner has been saved.'),'success');
						return $this->redirect(array('action' => 'index'));
					}
					else{
						$this->Session->setFlash(__('The Banner could not be saved. Please, try again.'),'error');
					}
				}
				else{
					$this->Session->setFlash(__('Image error,please select other image.'),'error');
				}
			}else{
				$this->Session->setFlash(__('Please select image with extention (.jpg,.jpeg,.gif,.png).'),'error');
			}


			
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is(array('post','put'))) {
			$data  = $this->request->data;
			// upload image
			$files = $data['Banner']['image'];
			$id = $data['Banner']['id'];
			$this->Banner->id = $id;
			$banner = $this->Banner->read();
			if(!empty($files['name']))
			{
				$ext = substr(strtolower(strrchr($files['name'], '.')), 1);
				$arr_ext = array('jpg', 'png','jpeg','gif');					
				if (in_array($ext, $arr_ext)) {
					if(!empty($files['name']) && $files['error'] != 1){
						$name_image=date('YmdHis').'.'.$ext;
						//upload file
						move_uploaded_file($files['tmp_name'], WWW_ROOT.'/img/tmp/'.$name_image);
				        //Thummanail
				        
				        $this->createThumbs(WWW_ROOT.'/img/tmp/'.$name_image,WWW_ROOT.'/img/banner/'.$name_image,735,240);
				        unlink(WWW_ROOT.'/img/tmp/'.$name_image);
				        $data['Banner']['image']=$this->webroot."img/banner/".$name_image;
				        $this->Banner->create();
						if ($this->Banner->save($data)) {
							if(file_exists(WWW_ROOT.$banner['Banner']['image']))
							{
								unlink(WWW_ROOT.$banner['Banner']['image']);
							}
							
							$this->Session->setFlash(__('The Banner has been saved.'),'success');
							return $this->redirect(array('action' => 'index'));
						}
						else{
							$this->Session->setFlash(__('The Banner could not be saved. Please, try again.'),'error');
						}
					}
					else{
						$this->Session->setFlash(__('Image error,please select other image.'),'error');
					}
				}else{
					$this->Session->setFlash(__('Please select image with extention (.jpg,.jpeg,.gif,.png).'),'error');
				}
			}
			else{
				$data['Banner']['image'] = $banner['Banner']['image'];
				if ($this->Banner->save($data)) {
					$this->Session->setFlash(__('The Banner has been saved.'),'success');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Session->setFlash(__('The Banner could not be saved. Please, try again.'),'error');
				}
			}
			

		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Banner->delete()) {
			$this->Session->setFlash(__('The banner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The banner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check name banner is exist
 * @created 2015-08-01
 * @author haipt
 * @return boolean
 */
	public function checkNameExist()
	{
		$this->layout = false;
		$this->autoRender= false;
		if($this->request->is(array('post')))
		{
			$name = trim($this->request->data['name']);
			$id = trim($this->request->data['id']);
			//add category
			if($id == '')
			{
				$conditions = array('Banner.name'=>$name,'Banner.status'=>0);
			}

			//edit category
			else{
				$conditions = array('Banner.id !='=>$id,'Banner.name'=>$name,'Banner.status'=>0);
			}
			$isExist = $this->Banner->find('count',array('conditions'=>$conditions));
			if($isExist)
			{
				echo 'false';exit;
			}
			else{
				echo 'true';exit;
			}

			
		}
		echo 'true';exit;
	}
/**
 * admin_pulish method
 * Description: publish a category
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_publish($bannerId = null)
	{
		$this->Banner->id = $bannerId;
		if($this->Banner->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish banner is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish banner is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_unpulish method
 * Description: unpublish a banner
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_unpublish($bannerId = null)
	{
		$this->Banner->id = $bannerId;
		if($this->Banner->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish banner is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish banner is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_delete_all method
 * Description: deleting Banner is selected
 * @created 2015-08-02
 * @author haipt
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->Banner->recursive = -1;
			$data = $this->request->data['Banner'];
			$aId = array();
			foreach($data as $key=>$value)
			{
				if(!empty($value['id']))
				{
					$aId[]= $value['id'];
				}
			}
			if(!empty($aId))
			{
				$this->Banner->updateAll(array('Banner.status'=>1),array('Banner.id'=>$aId));
				$this->Session->setFlash(__('Delete banner is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a banner before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}
}
