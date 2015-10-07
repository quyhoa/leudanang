<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('FrontAppController', 'Controller');
App::uses('CakeEmail','Network/email');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends FrontAppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $uses = array('Category','Product','Admin','Order','OrderProduct','Banner');


	public function beforeFilter() {
		parent::beforeFilter();
    }
/**
* index method
* @description: home page
* @author: hoalqq
* @created 03/09/2015
**/
	public function index()
	{
		$title_for_layout = __('Linh phu kien cao cap');
		$productNews = $this->Product->find('all',array(
			'conditions'=>array('Product.status'=>0),
			'order'=>array('Product.created'=>'desc'),
			'limit'=>12,
			'recursive'=>1

		));
		// $productHots = $this->ProductSpecial->find('all',array(
		// 	'conditions'=>array('ProductSpecial.status'=>0,'ProductSpecial.publish'=>1),
		// 	'order'=>array('ProductSpecial.sort'=>'asc'),
		// 	'limit'=>12,
		// 	'recursive'=>1
		// 	));
		$banners = $this->Banner->find('all',array('conditions'=>array('Banner.status'=>0,'Banner.publish'=>1),'order'=>array('Banner.sort'=>'asc')));
		$this->set(compact('title_for_layout','banners','productNews'));
	}
/**
* lists method
* @description: list product
* @author: haipt
* @created 2015-08-05
**/
	public function lists()
	{
		$title_for_layout= __('Sản phẩm');
		$request  = $this->request->params;
		$limit = 16;
		$order = array();
		if($this->request->is(array('POST')))
		{
			$data = $this->request->data;
			$order = array($data['Product']['field_order']=>$data['Product']['type_order']);
			$limit = $data['Product']['limit'];	
		}
		if(!empty($request['cate_code']))
		{
			$cate_code = $request['cate_code'];
			$productCategory = $this->Category->find('first',array('conditions'=>array('Category.code'=>$cate_code),'recursive'=>-1));
			$conditions =array('Product.category_id'=>$productCategory['Category']['id'],'Product.status'=>0);
			$this->Paginator->settings=array(
				'conditions'=>$conditions,
				'limit'=>$limit,
				'order'=>$order
				);
			$products = $this->Paginator->paginate('Product');
			$this->set(compact('products','productCategory','title_for_layout'));
		}
		else{
			$this->redirect('/');
		}
	}
/**
* detail method
* @description: product detail
* @author: haipt
* @created 2015-08-05
**/
	public function detail()
	{
		$title_for_layout = __('Sản phẩm');
		$product_code = $this->request->params['product_code'];
		$product = $this->Product->find('first',array(
			'conditions'=>array('Product.code'=>$product_code,'Product.status'=>0)
			));
		//numview
		$numview = (isset($product['Product']['num_view']))?$product['Product']['num_view']:0;
		$numview += 1;
		$this->Product->id = $product['Product']['id'];
		$rs = $this->Product->saveField('num_view',$numview);
		// san pham lien quan
		$relasts = $this->Category->find('all',array(
			'conditions'=>array(
					'Category.parent' => $product['Category']['parent'],
					'Category.status' => 1,
			),
			'contain'=>array(
				'Product' => array(
					'conditions'=>array('Product.id'=>$product['Category']['id']),
					'order' 	=> array('Product.created'=>'desc')
				),
			),
			'limit' 	=> LIMIT,
		));
		$this->set(compact('product','relasts','title_for_layout'));
	}
/**
* info method
* @description: normal page
* @author: haipt
* @created 2015-08-05
**/	
	// public function info()
	// {
		
	// 	$page_code = $this->request->params['page_code'];
	// 	if(!empty($page_code))
	// 	{
	// 		$page= $this->PageList->find('first',array(
	// 			'conditions'=>array('PageList.code'=>$page_code,
	// 								'PageList.status'=>0,
	// 								'PageList.publish'=>1,
	// 								)
	// 			));
	// 		$title_for_layout = (!empty($page))?$page['PageList']['name']:__('Trang thông tin');
	// 		$this->set(compact('page','title_for_layout'));
	// 	}else{
	// 		$this->redirect("/");
	// 	}
	// }
	/**
	* info add_to_cart
	* @description: normal page
	* @author: hoalqq
	* @created 2015-08-06
	**/	
	public function add_cart($id = null)
	{
		if($this->request->is(array('POST')))
		{
			$data = $this->request->data;
			$id = $data['Product']['id'];
			$quantity = $data['Product']['number'];
		}
		else{
			$quantity = 1;
		}
		if(!empty($id))
		{
			$products = $this->Product->find('first',array(
				'conditions'=>array(
					'Product.id'=>$id,
					)
				));
			//Kiem tra su ton tai cua san pham trong gio hang
			if($this->Session->check('cart.'.$id)){
				$item = $this->Session->read('cart.'.$id);
				$item['quantity'] += $quantity;
			}else{
				$item = array(
				'id'			=>$products['Product']['id'],
				'name'			=>$products['Product']['name'],
				'code'			=>$products['Product']['code'],
				'image'			=>$products['Product']['image'],
				'price_sales'	=>$products['Product']['price_sales'],
				'quantity'		=>1
				);
			}
			//tao gio hang va them san pham vao gia hang
			$this->Session->write('cart.'.$id,$item);
			//tinh tong tien dang co trong gio hang
			$carts = $this->Session->read('cart');
			$total = $this->Tool->sum($carts);//được tao trong Components
			$this->Session->write('total',$total);
		    $this->redirect(array('action'=>'view_cart'));	
		}
		else{
			$this->redirect($this->referer());
		}
	}
	/**
	* info view_cart
	* @description: detail cart
	* @author: hoalqq
	* @created 2015-08-06
	**/	
	public function view_cart(){
		$title_for_layout = __('Thông tin đặt hàng');
		$carts = $this->Session->read('cart');
		$total = $this->Session->read('total');
		$this->set(compact('carts','total','cart','title_for_layout'));		
		
	}
	/**
	* info update_cart
	* @description: update_cart cart
	* @author: hoalqq
	* @created 2015-08-06
	**/	
	public function update_cart() {
		if($this->request->is('post')){
			// $this->request->allowMethod('post', 'update_cart');
			$cart = $this->request->data;
			$tmp = $this->Session->read('cart');
		 	$this->Session->delete('cart');
			$this->Session->delete('total');
			$quantity = 1;
			$id = $cart['Product']['id'];
			if($cart['Product']['quantity'] > 1)
			{
				$quantity = $cart['Product']['quantity'];
			}
			foreach($tmp as $tp){
				if($tp['id'] == $id){
					$tp['quntity']=$quantity;
				}
			}
			$tmp[$id]['quantity'] = $quantity;
			$this->Session->write('cart',$tmp);
			$total = $this->Tool->sum($tmp);
			$this->Session->write('total',$total);
			$this->redirect($this->referer());
		}
	}
	/**
	* info empty_cart
	* @description: empty_cart cart
	* @author: hoalqq
	* @created 2015-08-06
	**/
	public function empty_cart()
	{
		if($this->request->is('post')){
			$this->Session->delete('cart');
			$this->Session->delete('total');
			$this->redirect($this->referer());
		}
	}
	/**
	* info remove
	* @description: remove some product in cart
	* @author: hoalqq
	* @created 2015-08-06
	**/
	public function remove($id = null)
	{
		if($this->request->is('post'))
		{
			$this->Session->Delete('cart.'.$id);
			$cart = $this->Session->read('cart');
			if(empty($cart)){
				// delete from cart
				$this->empty_cart();
			}else{
				// update total
				$total = $this->Tool->sum($cart);
				$this->Session->write('total',$total);
			}
			$this->redirect($this->referer());
		}

	}
	/**
	* info confirm
	* @description: confirm working order product
	* @author: hoalqq
	* @created 2015-08-06
	**/
	public function confirm() {
		$isLogin = false;
		$infoUser = $this->Session->check('users');
		$user = array();
		if($infoUser)
		{
			$user = $this->Session->read('users');
			$isLogin = true;
		}
		// if($this->request->is(array('POST')))
		// {
		// 	$data = $this->request->data;
		// 	$email = $data['User']['email'];
		// 	$password = $data['User']['password'];
		// 	$this->loadModel('User');
		// 	$user = $this->User->find('first',array('conditions'=>array('email'=>$email,'password'=>md5($password),'status'=>0),'recursive'=>-1));
		// 	if(!empty($user)){
		// 		$isLogin = true;
		// 		$this->Session->write('users',$user);
		// 	}
		// }
        $this->request->data = $user;
        // debug($user);exit;
			
		// sent info to view
		$this->set(compact('infoUser','user','isLogin'));
	}
	/**
	* info search
	* @description: search follow categories or key product
	* @author: hoalqq
	* @created 2015-08-06
	**/
	public function search() {
		$title_for_layout = __('Tìm kiếm sản phẩm');
		$conditions = array('Product.status'=>0);
			
		if($this->request->is(array('post','put'))){
			$data = $this->request->data;
			$key 		= $data['Product']['key'];
			if(!empty($key))
			{
				$conditions[] = array('OR'=>array('Product.code LIKE '=>'%'.$this->to_slug($key).'%'));
			}
			if(!empty($data['Product']['number']))
			{
				$conditions[] = array('ProductCategory.id'=>$data['Product']['number']);
			}
			
		}
		$resultSearchs = $this->Product->find('all',array(
													'conditions'=> $conditions,
													'order'		=> array('Product.created'=>'desc'),
													'recursive'	=> 1,
													'limit' 	=> 40
													));
		$this->loadModel('Banner');
		$banners = $this->Banner->find('all',array('conditions'=>array('Banner.status'=>0,'Banner.publish'=>1),'order'=>array('Banner.sort'=>'asc')));

		
		$this->set(compact('resultSearchs','title_for_layout','banners'));
	}
	/**
	* info cate
	* @description: Lisst cate for search
	* @author: hoalqq
	* @created 08/08/2015
	**/
	function lisnews(){
		$title_for_layout = __('Tin tức');
		$newscate_code = $this->request->params['lisnews'];
		$newCate = $this->NewsCategory->find('first',array('conditions'=>array('NewsCategory.code'=>$newscate_code),'recursive'=>-1));
		$newslist = $this->News->find('all',array(
				'conditions'=> array(
					'NewsCategory.code'		=>$newscate_code,
					'News.status' 	   		=> 1,
					'NewsCategory.publish'	=>1,
					'News.status'			=>1,
					),

			));
		$this->set(compact('newslist','newCate','title_for_layout'));
	}
	
	/**
	* info detailnews
	* @description: detailnews
	* @author: hoalqq
	* @created 08/08/2015
	**/

	public function detailnews() {
		$title_for_layout = __('Tin tức');
		$code = $this->request->params['detailnews'];
		$detailnews = $this->News->find('first',array(
			'conditions'=>array(
					'News.code'		=>$code,
					'News.status' 	   		=> 1,
					'News.status'			=>1,
				),
			));
		// tin lien quan
		$relestsNews = $this->News->find('all',array(
			'conditions'=>array(
					'News.status' 	   		=>1,
					'News.status'			=>1,
					'News.code <>'			=>$code,
				),
			'order'=>array('News.updated'=>'desc'),
			'limit'=>5
			));
		$this->set(compact('detailnews','relestsNews','title_for_layout'));
	}
	/**
	* info detailnews
	* @description: detailnews
	* @author: hoalqq
	* @created 19/09/2015
	**/
	public function infouser() {
		$title_for_layout = __('Thông tin các nhân');
		$code = $this->request->params['detailnews'];
		$info = $this->Admin->find('first',array(
			'conditions'=>array('Admin.code'=>$code/*,'Admin.role_id'=>4*/),
			'contain'=>array('Order')
		));
		$this->set(compact('info','title_for_layout'));
	}
	public function contact()
	{
		$title_for_layout = __('Liên hệ');
		if($this->request->is(array('POST')))
		{
			$data = $this->request->data;
			$this->loadModel('Contact');
			if($this->Contact->save($data))
			{
				unset($this->request->data);
				$this->Session->setFlash(__('Contact is sent'),'success');
			}
			else{
				$this->Session->setFlash(__('Contact isnot sent'),'success');
			}
		}

		$page_code ='lien-he';
		// $page = $this->PageList->find('first',
		// 	array('conditions'=>array('PageList.status'=>0,'PageList.publish'=>1,'PageList.code'=>$page_code,'PageList.type'=>1)));
		$this->set(compact('page','title_for_layout'));
	}
	public function confirm2()
	{
		$carts = $this->Session->read('cart');
		$info = $this->request->data;
		$total = $this->Session->read('total');
		if(empty($carts) || empty($info))
		{
			$this->redirect('/');
		}
		if($info['Admin']['human'] != '' && $info['Admin']['human']){
			$this->set(compact('carts','info','total'));
		}else{
			return $this->redirect(array('action'=>'confirm'));
		}		
	}
	public function complete()
	{
		$data = $this->request->data;
		if(!empty($data) && $this->Session->check('cart')){
			$carts = unserialize($data['Page']['carts']);
			$info = unserialize($data['Page']['info']);
			$total = $data['Page']['total'];
				if(!empty($info)){
					try{
	                	$datasource = $this->Admin->getDataSource();
	                	$datasource->begin();
	                	if(empty($info['Admin']['id']) && empty($info['Admin']['role_id'])){
	                		$info['Admin']['role_id'] = ROLE_GUEST;
	                		$this->Admin->create();
	                		if($this->Admin->save($info)){
								$datasource->commit();
								$info['Admin']['id'] = $this->Admin->getLastInsertId();
							}						
						}
						// save order
							$orders['Order']['admin_id'] 		= $info['Admin']['id'];
							$orders['Order']['total'] 			= $total;
							$orders['Order']['id'] 				= '';
							$orders['Order']['level'] 			= $info['Admin']['level'];
							$this->Order->create();
							$infoUserMail  =" Thông tin người đặt hàng \n ";
							$infoUserMail .=" Tên khách hàng: ".$info['Admin']['username']."\n";
							$infoUserMail .=" Số ĐT: ".$info['Admin']['phone']."\n";
							$infoUserMail .=" Email: ".$info['Admin']['email']."\n";
							$infoUserMail .=" Địa chỉ: ".$info['Admin']['address']."\n";
							$inforOrderMail ="Thông tin mua sản phẩm\n";
							if($this->Order->save($orders)){
								$datasource->commit();
								$orderId = $this->Order->getLastInsertId();
								foreach($carts as $cart):
									$this->OrderProduct->create();
									$orderDetail = array();
									$orderDetail['OrderProduct']['product_id'] 	= $cart['id'];
									$orderDetail['OrderProduct']['quanlity'] 	= $cart['quantity'];
									$orderDetail['OrderProduct']['order_id'] 	= $orderId;
									$this->OrderProduct->save($orderDetail);
									//info mail
									$inforOrderMail .="Tên sản phẩm:".$cart['name']." X". $cart['quantity'] ."\n";
								endforeach;							
							}						
							$inforOrderMail .="Tổng tiền:". $total. "\n";
							// 	//send mail order
						$msg  =" Dear. Hệ thống đã tiếp nhận thông tin đặt hàng như sau:\n";
						$msg .= $infoUserMail."\n";
						$msg .= $inforOrderMail.".\n Hãy liên hệ với khách hàng trong thời gian sớm nhất, xin cám ơn";
						$email = new CakeEmail('gmail');
						$email->from(FROM);
						$email->to(TO);
						$email->subject('Thông tin đặt hàng '.date('Y-m-d:H:i:s'));	
						$email->send($msg);
						$this->Session->delete('cart');
						$this->Session->delete('rent');
						$this->Session->delete('total');
						$this->Session->setFlash(__('Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sơm nhất. Xin chân thành cám ơn'),'success');
						$this->redirect('/');
	                } catch (Exception $e) {
	                	$this->Session->setFlash('MS_DELETE_FAIL', 'error');
	                	$datasource->rollback();
	                	$this->Session->setFlash(__('Rất tiếc, bạn đặt hàng không thành công, hãy kiểm tra lại thông tin đặt hàng của bạn'),'error');
	                }
				}
			}
			else{
				$this->Session->setFlash(__('Rất tiếc, bạn đặt hàng không thành công, hãy kiểm tra lại thông tin đặt hàng của bạn'),'error');
			
			}
	}
/**
*Name method: login
*login system
*@author: Hoa
*@create date:
**/
	public function login() {
		if($this->request->is(array('POST')))
		{
			$data = $this->request->data;
			$email = $data['User']['email'];
			$password = md5($data['User']['password']);
			$user = $this->User->find('first',array(
				'conditions'=>array('User.email'=>$email,
									'User.password'=>$password,
									'User.status'=>0
									),
				'recursive'=>-1
				));
			if(!empty($user))
			{
				$this->Session->write('user',$user);
				$this->redirect('/');
			}
			else{
				$this->Session->setFlash(__('Email or Password is incorrect'),'error');
			}
		}

	}
/**
* logout method
* @return login
* @author hoa
* @create_day: 18/05/2015
**/
	public function logout() {
		$this->Session->destroy();
		$this->redirect('/');
	}
	/**
	* logout sing_up
	* @return sing_up
	* @author hoa
	* @create_day: 8/08/2015
	**/
	public function sing_up() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			debug($data);exit;
				if(empty($infoUs)){
					// make code
					$day = date("Y-m-d H:i:s");
					$code = md5($data['User']['email'].$day);
					
					$link_comfirm = 'http://linhphukien.loc/comfirm/'.$code;
					$msg = 'Rất vui khi bạn đăng kí là thành viên của trang web của chúng tôi, hãy click vào link sau để kích hoạt người dùng '.$link_comfirm;
					$data['User']['code'] = $code;
					/*Kiêm tra send mail*/

						//$email = new CakeEmail('gmail');
						//$email->from('testlinhphukien@gmail.com');
						//$email->to($data['User']['email']);
						//$email->subject('Xác thực người dùng');	
						//$email->send($msg);
						// debug($email->send($msg));
					/**/
					// save db
					$this->User->create();
					$data['User']['password'] = md5($data['User']['password']);
					if ($this->User->save($data)) {
						$this->Session->setFlash('Bạn đã đăng ký thành công','success');
						unset($this->request->data);
					} else {
						$this->Session->setFlash('Đăng kí không thành công vui lòng thử lại','error');
					}
				}else{
					$this->Session->setFlash('Email đã tồn tại','error');
				}
		}
	}
	/**
	* logout comfirm
	* Descriptions: comfirm sing_up
	* @return sing_up
	* @author hoa
	* @create_day: 8/08/2015
	**/
	public function comfirm($code=null){
		if(!empty($code)){
			$user = $this->User->findByCode($code);
			debug($user);exit;
			if(!empty($user)){
				$this->User->id = $user['User']['id'];
				$this->User->updateAll(array('User.status'=>1),array('User.id'=>$user['User']['id']));
				// $this->User->saveField('actived',1);
				$this->User->updateAll(array('User.code'=>null),array('User.id'=>$user['User']['id']));
				$this->Session->setFlash('Bạn đã kích hoạt tài khoản thành công','success');
				// $this->redirect(array('action'=>'comfirm'));
				$this->redirect('/');
			}
		}
	}	
	/**
	* logout comfirm
	* Descriptions: comfirm sing_up
	* @return sing_up
	* @author hoa
	* @create_day: 11/09/2015
	**/
	public function rent() {
		$title_for_layout = __('Thông tin đặt thuê');
		$carts = $this->Session->read('rent');
		$this->set(compact('carts','total','title_for_layout'));
	}
	/**
	* Method
	* Descriptions: comfirm sing_up
	* @return sing_up
	* @author hoa
	* @create_day: 11/09/2015
	**/
	public function handle_rent($id = null) {

		// if($this->request->is(array('POST')))
		// {
		// 	$data = $this->request->data;
		// 	$id = $data['Product']['id'];
		// 	$quantity = $data['Product']['number'];
		// }
		// else{
		// 	$quantity = 1;
		// }
		if(!empty($id))
		{
			$products = $this->Product->find('first',array(
				'conditions'=>array(
					'Product.id'=>$id,
					)
				));
			//Kiem tra su ton tai cua san pham trong gio hang
			if($this->Session->check('rent.'.$id)){
				$item = $this->Session->read('rent.'.$id);
				$item['quantity'] += 1;
			}else{
				$item = array(
				'id'			=>$products['Product']['id'],
				'name'			=>$products['Product']['name'],
				'code'			=>$products['Product']['code'],
				'image'			=>$products['Product']['image'],
				'price_brow'	=>$products['Product']['price_brow'],
				'quantity'		=>1,
				'category_id'   => $products['Category']['id'],
				'price_date'	=> $products['Category']['price_date'],
				);
			}

			$this->Session->write('rent.'.$id,$item);
			$carts = $this->Session->read('rent');
			$this->redirect(array('action'=>'rent'));	
		}
		else{
			$this->redirect($this->referer());
		}
	}
	/**
	* Method
	* Descriptions: update_rent
	* @return sing_up
	* @author hoa
	* @create_day: 14/09/2015
	**/
	public function update_rent() {
		if($this->request->is('post')){
			// $this->request->allowMethod('post', 'update_cart');
			$cart = $this->request->data;
			$tmp = $this->Session->read('rent');
		 	$this->Session->delete('rent');
			$quantity = 1;
			$id = $cart['Product']['id'];
			if($cart['Product']['quantity'] > 1)
			{
				$quantity = $cart['Product']['quantity'];
			}
			foreach($tmp as $tp){
				if($tp['id'] == $id){
					$tp['quntity']=$quantity;
				}
			}
			$tmp[$id]['quantity'] = $quantity;
			$this->Session->write('rent',$tmp);
			$this->redirect($this->referer());
		}
	}
	/**
	* Method
	* Descriptions: remove_rent
	* @return sing_up
	* @author hoa
	* @create_day: 14/09/2015
	**/
	public function remove_rent($id=null) {
		if(!empty($id)){
			$rents = $this->Session->read('rent');
			$rent = $rents;
			foreach ($rents as $key => $value) {
				if($id == $key){
					unset($rent[$key]);
					$this->Session->write('rent',$rent);
				}
			}
			$this->redirect($this->referer());
		}
	}
	/**
	* Method
	* Descriptions: comfirm confirm_rent
	* @return sing_up
	* @author hoa
	* @create_day: 14/09/2015
	**/
	public function confirm_rent() {
		if($this->Session->check('users')){
			$this->request->data = $this->Session->read('users');
		}
	}
	/**
	* Method
	* Descriptions: confirm_rents
	* @return sing_up
	* @author hoa
	* @create_day: 14/09/2015
	**/
	public function confirm_rents() {
		$sumDay 	= 0;
		$hieuDay 	= 0;
		$total 		= 0;			
		$carts 		= $this->Session->read('rent');
		$info 		= $this->request->data;
		$browDate 	= strtotime($info['Admin']['brow_date']);
		$payDate 	= strtotime($info['Admin']['pay_date']);
		$hieuDay 	= $payDate - $browDate;
		$sumDay 	+= floor($hieuDay / (60*60*24));
		if($sumDay == 0){
			$sumDay = 1;
		}
		if($info['Admin']['human'] != '' && $info['Admin']['human'] == 1){
			// tinh tong hoa don
			foreach ($carts as $key => $value) {
				$total +=  $value['price_brow'] * $value['quantity'] + $value['price_date'] * $sumDay;
			}
			$this->set(compact('total','carts','sumDay','info'));
		}else{
			return $this->redirect(array('action'=>'confirm_rent'));
		}
		
	}
	/**
	* Method
	* Descriptions: complete_rent
	* @return sing_up
	* @author hoa
	* @create_day: 14/09/2015
	**/
	public function complete_rent() {

		$data = $this->request->data;
		if(!empty($data) && $this->Session->check('rent')){
			$carts = unserialize($data['Page']['carts']);
			$info  = unserialize($data['Page']['info']);
			$total = $data['Page']['total'];
			if(!empty($info))
			{
				// kiem tra ton tai cua user
				$username 	= $info['Admin']['username'];
				$code 		= $this->to_slug($username);
				$info['Admin']['code'] = $code;				
                try{
                	$datasource = $this->Admin->getDataSource();
                	$datasource->begin();
                	if(empty($info['Admin']['id']) && empty($info['Admin']['role_id'])){
                		$info['Admin']['role_id'] = ROLE_GUEST;
                		$this->Admin->create();
                		if($this->Admin->save($info)){
							$datasource->commit();
							$info['Admin']['id'] = $this->Admin->getLastInsertId();
						}						
					}
					// save order
						$orders['Order']['admin_id'] 		= $info['Admin']['id'];
						$orders['Order']['brow_date'] 		= $info['Admin']['brow_date'];
						$orders['Order']['pay_date'] 		= $info['Admin']['pay_date'];
						$orders['Order']['total'] 			= $total;
						$orders['Order']['id'] 				= '';
						$this->Order->create();
						$infoUserMail  =" Thông tin người đặt hàng \n ";
						$infoUserMail .=" Tên khách hàng: ".$info['Admin']['username']."\n";
						$infoUserMail .=" Số ĐT: ".$info['Admin']['phone']."\n";
						$infoUserMail .=" Email: ".$info['Admin']['email']."\n";
						$infoUserMail .=" Địa chỉ: ".$info['Admin']['address']."\n";
						$inforOrderMail ="Thông tin mua sản phẩm\n";
						if($this->Order->save($orders)){
							$datasource->commit();
							$orderId = $this->Order->getLastInsertId();
							foreach($carts as $cart):
								$this->OrderProduct->create();
								$orderDetail = array();
								$orderDetail['OrderProduct']['product_id'] 	= $cart['id'];
								$orderDetail['OrderProduct']['quanlity'] 	= $cart['quantity'];
								$orderDetail['OrderProduct']['order_id'] 	= $orderId;
								$this->OrderProduct->save($orderDetail);
								//info mail
								$inforOrderMail .="Tên sản phẩm:".$cart['name']." X". $cart['quantity'] ."\n";
							endforeach;							
						}						
						$inforOrderMail .="Tổng tiền:". $total. "\n";
						// 	//send mail order
					$msg  =" Dear. Hệ thống đã tiếp nhận thông tin đặt hàng như sau:\n";
					$msg .= $infoUserMail."\n";
					$msg .= $inforOrderMail.".\n Hãy liên hệ với khách hàng trong thời gian sớm nhất, xin cám ơn";
					$email = new CakeEmail('gmail');
					$email->from(FROM);
					$email->to(TO);
					$email->subject('Thông tin đặt hàng '.date('Y-m-d:H:i:s'));	
					$email->send($msg);
					$this->Session->delete('rent');
					$this->Session->delete('total');
					$this->Session->setFlash(__('Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sơm nhất. Xin chân thành cám ơn'),'success');
					$this->redirect('/');
                } catch (Exception $e) {
                	$this->Session->setFlash('MS_DELETE_FAIL', 'error');
                	$datasource->rollback();
                	$this->Session->setFlash(__('Rất tiếc, bạn đặt hàng không thành công, hãy kiểm tra lại thông tin đặt hàng của bạn'),'error');
                }				
			}
			else{
				$this->Session->setFlash(__('Rất tiếc, bạn đặt hàng không thành công, hãy kiểm tra lại thông tin đặt hàng của bạn'),'error');
			
			}
			
		}
		else{
			$this->redirect('/');
		}	
	}
			/**
	 * checkNameExist dang_nhap
	 * Description: check name Admin is exist
	 * @created 19/09/2015
	 * @author hoa
	 * @return boolean
	 */
	public function dang_nhap() {
		if($this->request->is('post')){
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
		  		$this->Session->write('confirm',$checkLogin);
		    	$this->Session->write('users',$checkLogin);
		    	if(empty($aData['Admin']['form_login'])){		    		
					$this->redirect($this->referer());
		    	}else{
		    		$this->redirect('/');
		    	}								              
		    }
		    else {
		    	$this->Session->setFlash(__('Please check email or password again'),'error');
		    }
		}else{
			if($this->Session->check('users')){
				$this->Session->write('users',$this->Session->read('users'));
				$this->redirect($this->referer());
			}
		}
	}
	/*---------------------------function sendmail--------------------------------------------*/	
	public function send_mail($to_mail=null,$subject=null,$msg=null){
		$kt = false;
		// $email = new CakeEmail('gmail');
		// $email->from('testcakequyhoa@gmail.com');
		// $email->to($to_mail);
		// $email->subject('Xác thực người dùng');
		$from 	='testcakequyhoa@gmail.com';
		$to 	=$to_mail;
		$subject='Xác thực người dùng';
		$message=$msg;
		$options="Content-type:text/html;charset=utf-8\r\nFrom:$from\r\nReply-to:$from";
		mail($to,$subject,$message,$options);	
		// $email->send($msg);	
		if(mail($to,$subject,$message,$options)){
			$kt = true;
		}
		return $kt;
	}
	/**
	 * checkNameExist gioi_thieu
	 * Description: check name Admin is exist
	 * @created 19/09/2015
	 * @author hoa
	 * @return boolean
	 */
	public function gioi_thieu() {

	}
	
	/**
	 * checkNameExist gioi_thieu
	 * Description: check name Admin is exist
	 * @created 19/09/2015
	 * @author hoa
	 * @return boolean
	 */
	public function showbuy() {

	}	
	/**
	 * checkNameExist gioi_thieu
	 * Description: check name Admin is exist
	 * @created 19/09/2015
	 * @author hoa
	 * @return boolean
	 */
	public function showrent() {

	}
























}
