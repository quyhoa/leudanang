<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property ProductCategory $ProductCategory
 * @property OrderDetail $OrderDetail
 * @property ProductNews $ProductNews
 * @property ProductSpecial $ProductSpecial
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OrderProduct' => array(
			'className' => 'OrderProduct',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
	public $hasAndBelongsToMany = array(
        'Order' => array(
            'className' => 'Order',
            'joinTable' => 'order_products',
            'foreignKey' => 'product_id',
            'associationForeignKey' => 'order_id',
            // 'conditions' => array('SpfullDocomoUserRegister.status' => 0)
        )
    );
/*Method: test transaction*/
	// function begin() {
	//     $db =& ConnectionManager::getDataSource($this->useDbConfig);
	//     $db->begin($this);
	// }
	// function commit() {
	//     $db =& ConnectionManager::getDataSource($this->useDbConfig);
	//     $db->commit($this);
	// }
	// function rollback() {
	//     $db =& ConnectionManager::getDataSource($this->useDbConfig);
	//     $db->rollback($this);
	// }
// end

	// function newProduct($product, $image){
 //    if(!empty($product) && !empty($image)){
 //        $dataSource = $this->getDataSource();
 //        $dataSource->begin($this);
 //        if($this->save($product)){
 //            ClassRegistry::init('Image');
 //            $Image = new Image();
 //            $Image->product_id = $this->id; 
 //                //I'm stuck here, how to save ??
 //            return  $dataSource->commit($this);
 //        }
 //        $dataSource->rollback($this);
 //    }

 //    return false;
 //   }

}
