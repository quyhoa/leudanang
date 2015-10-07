<?php
App::uses('AdminAppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses 	   = array('Category','Product');

/**
 * admin_index method
 * Description: show list ProductCategory, paginate
 * @return void
 * @author: hoalqq
 * @create_date: 2015-07-31
 */
	public function admin_index() {
		// paginate
		$model = "Product";	
		// conditions default
		$condition = array();
        $limit = LIMIT;
		// handle search form
		if($this->request->is(array('post','put'))){
			$data = $this->request->data;			
			// set value
			$limit = $data['Product']['limit'];
			// conditions default
			$condition = array(
				'Product.category_id'	=>$data['Product']['listCate'],
				'Product.name like'  	=>'%'.$data['Product']['name'].'%',
			);
			if(empty($data['Product']['listCate']))
			{
				unset($condition['Product.category_id']);
			}	
			if(empty($data['Product']['name']))
			{
				unset($condition['Product.name like']);
			}			
			
		}		
		$this->Paginator->settings = array(
							'conditions'=>$condition,
							'order' 	=>array('Product.created'=>'desc'),
							'limit'     => $limit,
							'recursive' => 1
						);
		$product = $this->Paginator->paginate($model);
		$categories = $this->Product->Category->find('list',array('conditions'=>array('parent <>'=>null)));
		// set value
		$this->set(compact('model','product','categories'));
	}

/**
 * admin_add method
 * Description: add new Product
 * @return void
 * @author: hoalqq
 * @create_date: 2015-07-31
 */
	public function admin_add() {
		if($this->request->is('post')) {
			$data 		= $this->request->data;
			if(!empty($data['Product']['name'])){				
				// make slug
				$slug = $this->to_slug($data['Product']['name']);
				$data['Product']['code'] = $slug;				
			}
			// upload image
			$files = $data['Product']['image'];
			$ext = substr(strtolower(strrchr($files['name'], '.')), 1);
			$arr_ext = array('jpg', 'png','jpeg','gif');					
			if (in_array($ext, $arr_ext)) {
				if(!empty($files['name']) && $files['error'] != 1){
					$name_image=date('YmdHis').'.'.$ext;
					//upload file
					move_uploaded_file($files['tmp_name'], WWW_ROOT.'/img/product/'.$name_image);
			        //Thummanail
			        
			        $this->createThumbs(WWW_ROOT.'/img/product/'.$name_image,WWW_ROOT.'/img/thumbnail/'.$name_image,125,94);
			        $data['Product']['image']=$this->webroot."img/thumbnail/".$name_image;
			        $data['Product']['image_large']=$this->webroot."img/product/".$name_image;
			        $this->Product->create();
			        if ($this->Product->save($data)) {
						$this->Session->setFlash(__('The product has been saved.'),'success');
						return $this->redirect(array('action' => 'index'));
					}
					else{
						$this->Session->setFlash(__('The product could not be saved. Please, try again.'),'error');
					}
				}
				else{
					$this->Session->setFlash(__('Image error,please select other image.'),'error');
				}
			}else{
				$this->Session->setFlash(__('Please select image with extention (.jpg,.jpeg,.gif,.png).'),'error');
			}			
		}
		$productCategories = $this->Category->find('list',array('conditions'=>array('parent'=>8)));
		$this->set(compact('productCategories'));
	}

	/**
	 * admin_edit method
	 * Description: edit Product
	 * @return void
	 * @author: hoalqq
	 * @create_date: 2015-07-31
	 */
	public function admin_edit($id = null) {
		// if (!$this->Product->exists($id)) {
		// 	throw new NotFoundException(__('Invalid product'));
		// }
		if($this->request->is(array('post','put'))) {
			$data 		= $this->request->data;
			if(!empty($data['Product']['name'])){				
				// chuyen qua slug
				$slug = $this->to_slug($data['Product']['name']);
				$data['Product']['code'] = $slug;
				
			}
			$productId = $data['Product']['id'];
			$product  = $this->Product->find('first',array('conditions'=>array('Product.id'=>$productId),'recursive'=>-1));
			// upload image
			$files = $data['Product']['image'];
			if(!empty($files['name']))
			{
				$ext = substr(strtolower(strrchr($files['name'], '.')), 1);
				$arr_ext = array('jpg', 'png','jpeg','gif');					
				if (in_array($ext, $arr_ext)) {
					if(!empty($files['name']) && $files['error'] != 1){

						$name_image=date('YmdHis').'.'.$ext;
						//upload file
						move_uploaded_file($files['tmp_name'], WWW_ROOT.'/img/product/'.$name_image);
				        //Thummanail
				        
				        if($this->createThumbs(WWW_ROOT.'/img/product/'.$name_image,WWW_ROOT.'/img/thumbnail/'.$name_image,100,50))
				        {
				        	$data['Product']['image']=$this->webroot."img/thumbnail/".$name_image;
					        $data['Product']['image_large']=$this->webroot."img/product/".$name_image;
					        $this->Product->create();
					        if ($this->Product->save($data)) {
								//remove old image;
								if(file_exists(WWW_ROOT.$product['Product']['image']))
								{
									unlink(WWW_ROOT.$product['Product']['image']);
								}
								if(file_exists(WWW_ROOT.$product['Product']['image']))
								{
									unlink(WWW_ROOT.$product['Product']['image_large']);
								}
								
								$this->Session->setFlash(__('The product has been saved.'),'success');
								return $this->redirect(array('action' => 'index'));
							}
							else{
								$this->Session->setFlash(__('The product could not be saved. Please, try again.'),'error');
							}
				        }else{
				        	if(file_exists(WWW_ROOT.'/img/product/'.$name_image))
							{
								unlink(WWW_ROOT.'/img/product/'.$name_image);
								$this->Session->setFlash(__('Image error,please select other image.'),'error');
							}
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
				$data['Product']['image'] = $product['Product']['image'];
				$data['Product']['image_large'] = $product['Product']['image_large'];
				if ($this->Product->save($data)) {
							$this->Session->setFlash(__('The product has been saved.'),'success');
							return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Session->setFlash(__('The product could not be saved. Please, try again.'),'error');
				}      
			}
			
			
			
		} else {
			$options = array('conditions' => array('Product.id' => $id));
			$this->request->data = $this->Product->find('first',$options);		
		}
		$productCategories = $this->Product->Category->find('list',array('conditions'=>array('parent'=>8)));
		$this->set(compact('productCategories'));
	}
	/**
	 * admin_edit method
	 * Description: edit Product
	 * @return void
	 * @author: hoalqq
	 * @create_date: 04-09-2015
	 */
	public function uploadFile($files=array(), $folder=null){
        if(empty($folder)){
            $folder = 'songcall';
        }
        $flagUpload         = false;
        $result['status']   = 500;
        $result['path']     = '';
        $result['error']    = '';
        if($files['size'] <= 3145728){
            if($files['name'] != ''){
                $ext = substr(strtolower(strrchr($files['name'], '.')), 1);
                $arr_ext = array('jpg', 'png','jpeg','gif');                    
                if (in_array($ext, $arr_ext)) {
                    if(!empty($files['name']) && $files['error'] != 1){
                        $name_image=date('YmdHis').'.'.$ext;
                        //upload file
                        $check = move_uploaded_file($files['tmp_name'], WWW_ROOT.'img/'.$folder.'/'.$name_image);
                        if($check){
                            $result['path'] = $name_image;
                            $result['status'] = 400;
                        }                
                    }
                }else{
                    $result['error']    = ERROR_TYPR_IMAGE;
                } 
            }
        }else{
            $result['error']    = ERROR_SIZE_IMAGE;
        }
        return $result;
    }
	/**
	 * admin_edit method
	 * Description: edit Product
	 * @return void
	 * @author: hoalqq
	 * @create_date: 2015-07-31
	 */
	function admin_view(){
		$this->autoRender = false;
		if($this->request->is(array('post','put'))){
			$data = $this->request->data;
			$id = $data['id'];
			// get infomation product detail
			$info = $this->Product->find('first',array(
				'conditions' => array('Product.id'=>$id),
				'recursive'  => -1
			));
			echo json_encode($info);
		}
		return;
	}
/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		try {
			if($this->Product->delete()){
				$this->Session->setFlash(__('The product has been deleted.'),'success');
			}else{
				$this->Session->setFlash(__('The product has not been deleted.'),'error');
			}
		} catch (Exception $e) {
			$this->Session->setFlash(__('The product has not been deleted.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
		
	}
	
	/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete_cate($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		try {
			if($this->Category->delete()){
				$this->Session->setFlash(__('The product has been deleted.'),'success');
			}else{
				$this->Session->setFlash(__('The product has not been deleted.'),'error');
			}
		} catch (Exception $e) {
			$this->Session->setFlash(__('The product has not been deleted.'),'error');
		}
		return $this->redirect(array('action' => 'category'));
		
	}
	/**
	 * ajax search product
	 * @author quyhoa
	 * 
	 * @return true or false
	 * @create day: 1/08/2015
	 */

	function admin_search(){
		$this->autoRender = false;
		$conditions = array();
		if($this->request->is(array('post','put'))){
			$data = $this->request->data;
			// 
			parse_str($data, $values);
			// set value
			$product = $values['data'];
			// conditions default
			$condition = array('Product.product_category_id'=>$product['Product']['listCate']);
			// set conditions
			// if price not empty
			if(!empty($product['Product']['price'])){				
				$condition = array(
					'Product.product_category_id'=>$product['Product']['listCate'],
					'Product.price' 			 =>$product['Product']['price'],
				);
			}
			// if name not empty
			if(!empty($product['Product']['name'])){
				$slug = $this->to_slug($product['Product']['name']);				
				$condition = array(
					'Product.product_category_id'=>$product['Product']['listCate'],
					'Product.name like' 		 =>'%'.$slug.'%',
				);
			}

			// if price and name not empty
			if(	!empty($product['Product']['name']) && 	!empty($product['Product']['name'])){

				$slug = $this->to_slug($product['Product']['name']);				
				$condition = array(
					'Product.product_category_id'=>$product['Product']['listCate'],
					'Product.name like' 		 =>'%'.$slug.'%',
					'Product.price' 			 =>$product['Product']['price'],
				);
			}
			$conditions = $condition;
			// $conditions['order'] = 'Product.created desc';
			// search
			$resultSearch = $this->Product->find('all',array(
				'conditions' => $conditions
			));
			
			echo json_encode($resultSearch);
		}
		return;
	}
/**
 * checkNameExist method
 * Description: check name category is exist
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
				$conditions = array('Product.name'=>$name,'Product.status'=>0);
			}

			//edit category
			else{
				$conditions = array('Product.id !='=>$id,'Product.name'=>$name);
			}
			$isExist = $this->Product->find('count',array('conditions'=>$conditions));
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
	 * admin_new method
	 * Description: add product to new product
	 * @created 2015-08-03
	 * @author hoalqq
	 * @return void
	 */
	public function admin_new() {
		// if(!empty($id)){
		// 	// load model
		// 	$this->loadModel('ProductNews');
		// 	$check = $this->ProductNews->find('count',array('conditions'=>array('ProductNews.status'=>0,'ProductNews.id'=>$id)));
		// 	if($check==0)
		// 	{
		// 		$this->ProductNews->set('product_id',$id);
		// 		if($this->ProductNews->save())
		// 		{
		// 			$this->Session->setFlash(__('Product is added to new product'),'success');
		// 		}
		// 		else{
		// 			$this->Session->setFlash(__('Product is not added to new product'),'error');
		// 		}
		// 	}
		// 	else{
		// 		$this->Session->setFlash(__('Product is added to new product before'),'error');
		// 	}
		// 	$this->redirect('index');
		// }
	}
		/**
	 * admin_new method
	 * Description: add product to specail product
	 * @created 2015-08-03
	 * @author hoalqq
	 * @return void
	 */
	public function admin_hot($id) {
		if(!empty($id)){
			// load model
			$this->loadModel('ProductSpecial');
			$check = $this->ProductSpecial->find('count',array('conditions'=>array('ProductSpecial.status'=>0,'ProductSpecial.id'=>$id)));
			if($check==0)
			{
				$this->ProductSpecial->set('product_id',$id);
				if($this->ProductSpecial->save())
				{
					$this->Session->setFlash(__('Product is added to hot product'),'success');
				}
				else{
					$this->Session->setFlash(__('Product is not added to hot product'),'error');
				}
			}
			else{
				$this->Session->setFlash(__('Product is added to hot product before'),'error');
			}
			
		}
		$this->redirect('index');
	}
/**
 * admin_delete_all method
 * Description: deleting category is selected
 * @created 2015-08-01
 * @author haipt
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->Product->recursive = -1;
			$data = $this->request->data['Product'];
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
				$this->loadModel('ProductNews');
				$this->loadModel('ProductSpecial');
				$this->ProductNews->updateAll(array('ProductNews.status'=>1),array('ProductNews.product_id'=>$aId));
				$this->ProductSpecial->updateAll(array('ProductSpecial.status'=>1),array('ProductSpecial.product_id'=>$aId));
				$this->Product->updateAll(array('Product.status'=>1),array('Product.id'=>$aId));
				$this->Session->setFlash(__('Delete product is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a product before '),'error');
			}
			
		}
		
		$this->redirect('index');
	}
	public function admin_add_new_all()
	{
		$this->loadModel('ProductNews');
		if($this->request->is(array('post')))
		{
			$data = $this->request->data['Product'];
			$aId = array();
			$aNewProduct = array();
			$exist = false;
			foreach($data as $key=>$value)
			{

				if(!empty($value['id']))
				{
					$check = $this->ProductNews->find('count',array('conditions'=>array('ProductNews.status'=>0,'ProductNews.id'=>$value['id'])));
					if($check==0)
					{
						$aNewProduct[$key]['product_id'] = $value['id'];
					}
					else{
						$exist = true;
					}


					
				}
			}
			if(!empty($aNewProduct))
			{
				if($this->ProductNews->saveAll($aNewProduct))
				{
					$this->Session->setFlash(__('Add news product is successfull'),'success');
				}
				else{
					$this->Session->setFlash(__('Add news product is unsuccessfull'),'success');
				}
			}
			else{
				if($exist)
				{
					$this->Session->setFlash(__('Product is added in product news before'),'error');
				}
				else{
					$this->Session->setFlash(__('Please select a product before'),'error');	
				}
				
			}
			
		}
		
		$this->redirect('index');
	}
	public function admin_add_hot_all()
	{
		$this->loadModel('ProductSpecial');
		if($this->request->is(array('post')))
		{
			$data = $this->request->data['Product'];
			$aId = array();
			$aHotProduct = array();
			$exist = false;
			foreach($data as $key=>$value)
			{

				if(!empty($value['id']))
				{
					$check = $this->ProductSpecial->find('count',array('conditions'=>array('ProductSpecial.status'=>0,'ProductSpecial.id'=>$value['id'])));
					if($check==0)
					{
						$aHotProduct[$key]['product_id'] = $value['id'];
					}
					else{
						$exist = true;
					}


					
				}
			}
			if(!empty($aHotProduct))
			{
				if($this->ProductSpecial->saveAll($aHotProduct))
				{
					$this->Session->setFlash(__('Add hot product is successfull'),'success');
				}
				else{
					$this->Session->setFlash(__('Add hot product is unsuccessfull'),'success');
				}
			}
			else{
				if($exist)
				{
					$this->Session->setFlash(__('Product is added in product hot before'),'error');
				}
				else{
					$this->Session->setFlash(__('Please select a product before'),'error');	
				}
				
			}
			
		}
		
		$this->redirect('index');
	}		
/**
 * admin_pulish method
 * Description: publish a category
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_publish($productId = null)
	{
		$this->Product->id = $productId;
		if($this->Product->saveField('status',1))
		{
			$this->Session->setFlash(__('Publish product is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish product is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_unpulish method
 * Description: unpublish a category
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_unpublish($productId = null)
	{
		$this->Product->id = $productId;
		if($this->Product->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish product is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish product is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
	/**
 * admin_unpulish method
 * Description: unpublish a category
 * @created 18/09/2015
 * @author hoa
 * @return null
 */
	public function admin_category() {
				// paginate
		$model = "Category";	
		// conditions default
		$condition = array('Category.status'=>0);
        $limit = LIMIT;
		$this->Paginator->settings = array(
							'conditions'=>$condition,
							'order' 	=>array('Category.created'=>'desc'),
							'limit'     => $limit,
							'recursive' => 1
						);
		$product = $this->Paginator->paginate($model);
		$categories = $this->Category->find('list',array('conditions'=>array('parent'=>null)));
		// set value
		$this->set(compact('model','product','categories'));
	}
/**
 * admin_unpulish method
 * Description: unpublish a category
 * @created 18/09/2015
 * @author hoa
 * @return null
 */
	public function admin_add_cate() {
		if($this->request->is('post')){
			$data = $this->request->data;
			$data['Category']['code'] = $this->to_slug($data['Category']['name']);
			$this->Category->create();
			if($this->Category->save($data)){
				$this->Session->setFlash(__('Save successfuly'),'success');
			}else{
				$this->Session->setFlash(__('Save unsuccessfuly'),'error');
			}
			$this->redirect($this->referer());
		}		
	}
/**
 * admin_edit_cate method
 * Description: unpublish a category
 * @created 18/09/2015
 * @author hoa
 * @return null
 */
	public function admin_edit_cate($id=null) {
		if($this->request->is('put')){
			$data = $this->request->data;
			$this->Category->create();
			$data['Category']['code'] = $this->to_slug($data['Category']['name']);
			$this->Category->create();
			if($this->Category->save($data)){
				$this->Session->setFlash(__('Save successfuly'),'success');
			}else{
				$this->Session->setFlash(__('Save unsuccessfuly'),'error');
			}
			$this->redirect(array('action'=>'category'));
		}
		$this->request->data = $this->Category->findById($id);
			
	}
	/**
 * admin_edit_cate method
 * Description: unpublish a category
 * @created 18/09/2015
 * @author hoa
 * @return null
 */
	public function checkNameCateExist(){
		$this->layout = false;
		$this->autoRender= false;
		if($this->request->is(array('post')))
		{
			$name = $this->to_slug(trim($this->request->data['name']));
			$id = trim($this->request->data['id']);
			//add category
			if($id == '')
			{
				$conditions = array('Category.code'=>$name,'Category.status'=>0);
			}
			//edit category
			else{
				$conditions = array('Category.id !='=>$id,'Category.code'=>$name,'Category.status'=>0);
			}
			$isExist = $this->Category->find('count',array('conditions'=>$conditions));
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
