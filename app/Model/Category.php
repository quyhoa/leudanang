<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 */
class Category extends AppModel {
	public $useTable = 'categories';
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
    	'Product' => array(
    		'className' => 'Product',
			'foreignKey' => 'category_id',
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
