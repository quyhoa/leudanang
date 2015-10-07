<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cloud-zoom');
		echo $this->Html->css('/font-awesome/css/font-awesome');
		echo $this->Html->css('/bootstrap/css/bootstrap');
		echo $this->Html->css('common');
		echo $this->Html->css('style');
		echo $this->Html->css('slicknav');
		// load script
		echo $this->Html->script('jquery-1.9.1.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
    $(document).ready(function(){
        $("#hasSub1").click(function(){
            $("#subNav1").slideToggle();
        });

        $("#hasSub_spec").click(function(){
            $("#subNav_spec").slideToggle();
        });

        $("#toogle").click(function(){
            $(".link_list").slideToggle();
        });

        $('#menu').slicknav();
    	$('.slicknav_menu').css("margin-top",'35px');       
    });
    function viewCart(){document.view_cart.submit();}
    </script>
    <?= $this->Html->script('custom'); ?>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
</head>
<body>
	<?php echo $this->Session->flash(); ?>
 	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>
	<?= $this->Html->script('main'); ?>
	<?= $this->Html->script('slicknav'); ?>
</body>


</html>
