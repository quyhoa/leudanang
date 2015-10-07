<?php
// debug($this->webroot);
$controller = $this->params['controller'];
$action = $this->params['action'];
?>
<style type="text/css">
    .test {
        color: red !important;
    }

    .div_menu {
        background-color: white !important;
        margin: 10px 20px;
    }

    cate_menu {
        display: none
    }

    #side-menu a {
        color: black
    }

    .title_top {
        padding-left: 20%;
        color: lightgray;
        padding-top: 13px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('#div_menu_left').find('li').removeClass('active');
        controller = "<?php echo $controller ?>";
        action = "<?php echo $action ?>";
        active = controller + '_' + action;
        $('#' + active).addClass('active');        
    });

</script>
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu" id="div_menu_left">	
			<li id="Products_admin_category">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Loại sản phẩm</span>",
				        array(
				            'controller' 	=> 'Products',
				            'action' 		=> 'category',
				            'admin' 		=> true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>
			<li id="Products_admin_index">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Sản phẩm</span>",
				        array(
				            'controller' => 'Products',
				            'action' => 'index',
				            'admin' => true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>
			<li id="Products_admin_new">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Tin tức</span>",
				        array(
				            'controller' => 'Products',
				            'action' => 'new',
				            'admin' => true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>
			<li id="Admins_admin_index">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Người dùng</span>",
				        array(
				            'controller' => 'Admins',
				            'action' => 'index',
				            'admin' => true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>
			<li id="Orders_admin_index">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Đơn hàng</span>",
				        array(
				            'controller' => 'Orders',
				            'action' => 'index',
				            'admin' => true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>
			<li id="Orders_admin_rent">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Đặt thuê</span>",
				        array(
				            'controller' => 'Orders',
				            'action' => 'admin_rent',
				            'admin' => true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>
			<li id="Orders_admin_statical">
				<?php
				    echo $this->Html->link("<i class='icon-folder-open'></i><span class='hidden-tablet'> Thống kê</span>",
				        array(
				            'controller' => 'Orders',
				            'action' => 'statical',
				            'admin' => true,
				        ),
				        array('escape' => false)
				    );
				?>
			</li>		
		</ul>
	</div>
</div>