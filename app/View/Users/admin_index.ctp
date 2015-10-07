<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Danh sách thành viên"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("Danh sách thành viên"); ?></h2>

      </div>
      <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><?php echo __('ID');?></th>
                  <th><?php echo __('Tên');?></th>
                  <th><?php echo __('Giới tính');?></th>
                  <th><?php echo __('Địa chỉ');?></th>
                  <th><?php echo __('Số ĐT');?></th>
                  <th><?php echo __('Email');?></th>
                  <th><?php echo __('Ngày đăng ký');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($users as $key =>$user): ?>
               <tr>
                  <td class="center"><?php echo $user['User']['id'] ?></td>
                  <td class="center"><?php echo h($user['User']['name']); ?></td>
                  <td class="center"><?php echo ($user['User']['gender']==1)?'Nam':'Nữ';?></td>
                  <td class="center"><?php echo h($user['User']['address']); ?></td>
                  <td class="center"><?php echo h($user['User']['tel']); ?></td>
                  <td class="center"><?php echo h($user['User']['email']); ?></td>
                  <td class="center"><?php echo h($user['User']['created']); ?></td>
                
                  <td class="center">
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $user['User']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $user['User']['email'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         
		<?php echo $this->Form->end();?>
      </div>
   </div>
   <!--/span-->
</div>
<!--/row-->