<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 */
class Admin extends AppModel {
	public $useTable = 'admins';
 //    public $primaryKey = 'category_id';
 //    public $useDbConfig = 'naxosmobile_call';
    // public $actsAs = array('Containable'); 
    /**
	 * Method: 
	 * Description: show list ProductCategory, paginate
	 * @return void
	 * @author: hoalqq
	 * @create_date: 03/09/2015
	 */
    public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	/**
	 * Method: 
	 * Description: show list ProductCategory, paginate
	 * @return void
	 * @author: hoalqq
	 * @create_date: 03/09/2015
	 */
	public $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'admin_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
