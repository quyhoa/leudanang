<?php
App::uses('AdminAppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrdersController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $uses = array('Order');
	public function admin_index() {
		$model = 'Order';
		$limit = LIMIT;
		$listOrder = $this->Order->find('all',array(
			'order'		=>array('Order.created'),
			'contain' 	=> array('Admin','Product'),
			'conditions'=>array('Order.level'=>1),
		));
		$this->set(compact('listOrder','model','cities'));
	}
	/**
	 * Method: 
	 * Description: show list ProductCategory, paginate
	 * @return void
	 * @author: hoalqq
	 * @create_date: 03/09/2015
	 */
	public function admin_release($id)
	{
        $this->Order->id = $id;
        $info = $this->Order->find('first',array('conditions'=>array('Order.id'=>$id)));
        if($info['Order']['level'] == 1){
			$url['action'] = 'index';
		}else{
			$url['action'] = 'rent';
		}
		if($this->Order->saveField('status',1))
		{			
			$this->Session->setFlash(__('Bạn đã cập nhật trạng thái đặt hàng'),'success');
		}
		else{
			$this->Session->setFlash(__('Trạng thái đặt hàng chưa được cập nhật'),'error');
		}
		return $this->redirect($url);
	}
	/**
	 * Method: 
	 * Description: show list ProductCategory, paginate
	 * @return void
	 * @author: hoalqq
	 * @create_date: 03/09/2015
	 */
	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Đặt hàng đã bị xóa.'),'success');
		} else {
			$this->Session->setFlash(__('Không thể xóa đặt hàng này.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * Method: 
	 * Description: show list ProductCategory, paginate
	 * @return void
	 * @author: hoalqq
	 * @create_date: 11/09/2015
	 */
	public function admin_statical() {
		
	}
	/**
	 * Method: 
	 * Description: show list ProductCategory, paginate
	 * @return void
	 * @author: hoalqq
	 * @create_date: 11/09/2015
	 */
	public function admin_rent() {
		$model = 'Order';
		$limit = LIMIT;
		$listOrder = $this->Order->find('all',array(
			'order'		=>array('Order.created'),
			'contain' 	=> array('Admin','Product'),
			'conditions'=>array('Order.level'=>0),
		));
		$this->set(compact('listOrder','model','cities'));
	}

}
