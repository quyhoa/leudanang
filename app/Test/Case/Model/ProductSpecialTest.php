<?php
App::uses('ProductSpecial', 'Model');

/**
 * ProductSpecial Test Case
 *
 */
class ProductSpecialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_special',
		'app.product',
		'app.product_category',
		'app.order_detail',
		'app.order',
		'app.user',
		'app.product_news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductSpecial = ClassRegistry::init('ProductSpecial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductSpecial);

		parent::tearDown();
	}

}
