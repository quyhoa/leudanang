<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 */
class Role extends AppModel {
	public $useTable = 'roles';
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
    public $hasMany = array(
    	'Admin' => array(
    		'className' => 'Admin',
			'foreignKey' => 'role_id',
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
