<?php
App::uses('AdminAppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 */
class AdminsController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $theme = "Metro";
    public $helpers = array('Html', 'Form', 'Session', 'Text', 'Time', 'Js', 'Paginator');
	public $uses = array('Admin');
	public $components = array('Paginator');
/**
*Name method: login
*login system
*@author: Hoa
*@create date:
**/
	public function admin_login() {
		$this->layout = 'login';
		if($this->request->is(array("POST")))
		{ 
		   	$aData		=  $this->request->data;
		    $vPassword 	= md5($aData['Admin']['password']);         
		   	$vEmail 	= $aData['Admin']['email']; 
		   	$conditions = array('Admin.email' => $vEmail, 'Admin.password' => $vPassword);
		  	$checkLogin = $this->Admin->find('first',array(
											  		'conditions' => $conditions,
											  		'contain' => false
											  		)
											  	); 
		  	if($checkLogin){
		    	$this->Session->write('admin',$checkLogin);
				$this->redirect(array('controller'=>"Products",'action'=>'index','admin'=>true));
				              
		    }
		    else {
		    	$this->Session->setFlash(__('Please check email or password again'),'error');
		    }
		 }
	}
	/**
* logout method
* @return login
* @author hoa
* @create_day: 18/05/2015
**/
	public function admin_logout() {
		$this->Session->destroy();
		$this->redirect('/admin');
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Admin->recursive = 0;
		$admins =  $this->Paginator->paginate('Admin');
		$model = 'Admin';
		$this->set(compact('admins','model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
		$this->set('admin', $this->Admin->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			$data = $this->request->data;
			$data['Admin']['password'] = md5($data['Admin']['password']);
			if ($this->Admin->save($data)) {
				$this->Session->setFlash(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
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
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['Admin']['password'] = md5($data['Admin']['password']);
			if ($this->Admin->save($data)) {
				$this->Session->setFlash(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
			$this->request->data = $this->Admin->find('first', $options);
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
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->Admin->delete()) {
			$this->Session->setFlash(__('The admin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The admin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check name Admin is exist
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
				$conditions = array('Admin.email'=>$name);
			}

			//edit category
			else{
				$conditions = array('Admin.id !='=>$id,'Admin.email'=>$name);
			}
			$isExist = $this->Admin->find('count',array('conditions'=>$conditions));
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
}
