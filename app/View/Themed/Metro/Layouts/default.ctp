<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Control Panel</title>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<?php echo $this->Html->css('bootstrap.min');?>
	<?php echo $this->Html->css('bootstrap-responsive.min');?>
	<?php echo $this->Html->css('style');?>
	<?php //echo $this->Html->css('bootstrap-multiselect');?>
	<?php echo $this->Html->css('style-responsive');?>
	<!--  -->
	<?php //echo $this->Html->script('bootstrap-multiselect');?>
	
		<?php echo $this->Html->script('jquery-1.9.1.min');?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<?php echo $this->Html->css('ie');?>
	<![endif]-->
	
	<!--[if IE 9]>
		<?php echo $this->Html->css('ie9');?>
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/"><span>Control Panel</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo (!empty($admin))?$admin['Admin']['email']:'';?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<!-- <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li> -->
								<li>
								<!-- <a href="login.html"><i class="halflings-icon off"></i> Logout</a> -->
								<?php echo $this->Html->link('<i class="halflings-icon off"></i>Logout',array(
		                           'controller' => 'admins',
		                           'action'     => 'logout'
		                        ),array(
		                           // 'class'  => 'btn btn-info',
		                           'escape' => false
		                        )); ?>
								</li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full" style="overflow:visible;min-height:958px">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php echo $this->element('left_menu'); ?>
			<!-- end: Main Menu -->
			
			<!-- <noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript> -->
			
			<!-- start: Content -->
			<div id="content" class="span10">					
			<?php 
			echo  $this->fetch('content');
			?>
			</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<!-- <div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div> -->
	
	<!-- <div class="clearfix"></div> -->
	
	<footer>

		<p>
			<!-- <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span> -->
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->
		<?php echo $this->Html->script('jquery-migrate-1.0.0.min');?>
		<?php echo $this->Html->script('jquery-ui-1.10.0.custom.min');?>
		<?php echo $this->Html->script('jquery.ui.touch-punch');?>
		<?php echo $this->Html->script('modernizr');?>
		<?php echo $this->Html->script('bootstrap.min');?>
		<?php //echo $this->Html->script('jquery.cookie');?>
		<?php //echo $this->Html->script('fullcalendar.min');?>
		<?php //echo $this->Html->script('jquery.dataTables.min');?>
		<?php //echo $this->Html->script('excanvas');?>
		<?php //echo $this->Html->script('jquery.flot');?>
		<?php //echo $this->Html->script('jquery.flot.pie');?>
		<?php //echo $this->Html->script('jquery.flot.stack');?>
		<?php //echo $this->Html->script('jquery.flot.resize.min');?>
		<?php //echo $this->Html->script('jquery.chosen.min');?>
		<?php //echo $this->Html->script('jquery.uniform.min');?>
		<?php //echo $this->Html->script('jquery.cleditor.min');?>
		<?php //echo $this->Html->script('jquery.noty');?>
		<?php //echo $this->Html->script('jquery.elfinder.min');?>
		<?php //echo $this->Html->script('jquery.raty.min');?>
		<?php //echo $this->Html->script('jquery.iphone.toggle');?>
		<?php //echo $this->Html->script('jquery.uploadify-3.1.min');?>
		<?php //echo $this->Html->script('jquery.gritter.min');?>
		<?php //echo $this->Html->script('jquery.imagesloaded');?>
		<?php //echo $this->Html->script('jquery.masonry.min');?>
		<?php //echo $this->Html->script('jquery.knob.modified');?>
		<?php //echo $this->Html->script('jquery.sparkline.min');?>
		<?php //echo $this->Html->script('counter');?>
	    <?php //echo $this->Html->script('retina');?>
	    <?php //echo $this->Html->script('custom');?>
		<?php echo $this->Html->script('common');?>
		<?php echo $this->Html->script('jquery.validate.min');?>
		<?php echo $this->Html->script('ckeditor/ckeditor');?>

	<!-- end: JavaScript-->
	
</body>
</html>
