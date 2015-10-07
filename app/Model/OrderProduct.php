<?php
App::uses('AppModel', 'Model');

/**
 * Board Model
 *
 * @property User $User
 * @property Memo $Memo
 */
class OrderProduct extends AppModel
{

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'order_products';
    // public $primaryKey = 'course_id';
    // public $actsAs = array('Containable');
    // public $hasAndBelongsToMany = array(
    //     'SpfullDocomoUser' => array(
    //         'className' => 'SpfullDocomoUser',
    //         'joinTable' => 'spfull_docomo_user_register',
    //         'foreignKey' => 'course_id',
    //         'associationForeignKey' => 'user_id',
    //         'conditions' => array('SpfullDocomoUserRegister.status' => 0)
    //     )
    // );
    public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}

?>