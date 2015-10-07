<?php
App::uses('ProductNews', 'Model');

/**
 * ProductNews Test Case
 *
 */
class ProductNewsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_news',
		'app.product',
		'app.product_category',
		'app.order_detail',
		'app.order',
		'app.user',
		'app.product_special'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductNews = ClassRegistry::init('ProductNews');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductNews);

		parent::tearDown();
	}

}
