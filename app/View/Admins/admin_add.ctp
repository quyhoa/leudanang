<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li>
   		<a href="#"><?php echo __("Danh sách admin"); ?></a>
   		<i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Thêm admin"); ?></a></li>
</ul>
<div class="row-fluid sortable">
   <?php echo $this->Session->flash(); ?>
   <?php echo $this->element('/admin/form'); ?>
</div>
