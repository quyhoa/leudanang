<?php
App::uses('OrderDetail', 'Model');

/**
 * OrderDetail Test Case
 *
 */
class OrderDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_detail',
		'app.product',
		'app.product_category',
		'app.product_news',
		'app.product_special',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderDetail = ClassRegistry::init('OrderDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderDetail);

		parent::tearDown();
	}

}
