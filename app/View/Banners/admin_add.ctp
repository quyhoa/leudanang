<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li>
   		<a href="#"><?php echo __("Danh sách banner"); ?></a>
   		<i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Thêm banner"); ?></a></li>
</ul>
<div class="row-fluid sortable">
   <?php echo $this->Session->flash(); ?>
   <?php echo $this->element('/banner/form'); ?>
</div>
