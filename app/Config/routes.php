<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
    Router::connect('/lien-he', array('controller' => 'Pages', 'action' => 'contact'));
    Router::connect('/gioi-thieu', array('controller' => 'Pages', 'action' => 'gioi_thieu'));
    Router::connect('/huong-dan-mua-hang', array('controller' => 'Pages', 'action' => 'showbuy'));
     Router::connect('/huong-dan-dat-thue', array('controller' => 'Pages', 'action' => 'showrent'));	
    Router::connect('/sing-up', array('controller' => 'Pages', 'action' => 'sing_up'));
	
	Router::connect('/logout', array('controller' => 'Pages', 'action' => 'logout')); 
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/login', array('controller' => 'Pages', 'action' => 'login'));
	Router::connect('/comfirm/:code', array('controller' => 'Pages', 'action' => 'comfirm'),array('pass'=>array('code')));
	Router::connect('/admin', array('controller' => 'Orders', 'action' => 'index','admin'=>true));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'home'));

/*
	rewrite url frontend
*/
	/* product detail */
	Router::connect('/san-pham/:product_code', array('controller' => 'Pages', 'action' => 'detail',array('pass' => array('code'),'code'=>'[a-z A-Z 0-9]+')));
	Router::connect('/tin-tuc/:lisnews', array('controller' => 'Pages', 'action' => 'lisnews',array('pass' => array('code'),'code'=>'[a-z A-Z 0-9]+')));
	Router::connect('/detailnews/:detailnews', array('controller' => 'Pages', 'action' => 'detailnews',array('pass' => array('code'),'code'=>'[a-z A-Z 0-9]+')));
	Router::connect('/acount/:detailnews', array('controller' => 'Pages', 'action' => 'infouser',array('pass' => array('code'),'code'=>'[a-z A-Z 0-9]+')));
	Router::connect('/danh-muc/:cate_code', array('controller' => 'Pages', 'action' => 'lists',array('pass' => array('code'),'code'=>'[a-z A-Z 0-9]+')));
	Router::connect('/:page_code', array('controller' => 'Pages', 'action' => 'info',array('pass' => array('page_code'),'page_code'=>'[a-z A-Z 0-9 %_-]+')));
   // Router::connect('/dat-hang.html', array('controller' => 'Pages', 'action' => 'add_cart'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
    Router::parseExtensions('html', 'rss');
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
