<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="/admin"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Danh sách đặt hàng"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
      <div class="box-content">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        <!-- <div class="row-fluid">
          <div class="span12">
          <?php echo $this->Form->create('Order',array(
                'url'=>array('action'=>'admin_index'),
                'inputDefaults'=>array(
                          'label'     =>false,
                          'div'       =>false,
                          'novalidate'=>true
                        ),
                // 'class'       => 'form-horizontal'   
              )); ?>
            <div class='span3'>
              <label>
                <span>Số kết quả hiển thị</span>
                <?php  echo $this->Form->input('limit',array(
                'style'=>"width: 71px;",    
                                'options'   =>array('10'=>10,'25'=>'25','50'=>50,'100'=>100),
                                )); ?>
                 
                              
              </label>
            </div>
            
            <div class='span4'>
              <?php  echo $this->Form->input('created',array(

                                'options'   =>array("date('Ymd')"=>'Ngày hôm nay'),'empty'=>'Tất cả'
                              )); ?>
            </div>
            
            <div class='div_select'>
              <label>
                <?php echo $this->Form->button(__('Lọc kết quả'),array(
                  'onclick'=>'search()',
                  'class'  =>'btn'
                )); ?>
              </label>
            </div>
            <?php echo $this->Form->end(); ?>

          </div>
        </div> -->

      <div class="box-content">

        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                    <th><?php echo __('ID'); ?></th>
                    <th><?php echo __('Tên khách hàng'); ?></th>
                    <th><?php echo __('tel'); ?></th>
                    <th><?php echo __('Tình trạng'); ?></th>
                    <th><?php echo $this->Paginator->sort('created',__('Ngày đặt hàng')); ?></th>
                    <th><?php echo $this->Paginator->sort('brow_date',__('Ngày tạo')); ?></th>
                    <th><?php echo __('total'); ?></th>                    
                    <th class="actions"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
            <?php 
            $i= 0;
            foreach($listOrder as $key =>$order):
              $i++;
            ?>
               <tr>
                    <td><?php echo $i; ?>&nbsp;</td>
                    <td><?php echo h($order['Admin']['username']); ?>&nbsp;</td>
                    <td><?php echo h($order['Admin']['phone']); ?>&nbsp;</td>
                    <td <?php echo ($order['Order']['status']==0)?'style="background-color:yellow;"':''?>><?php echo ($order['Order']['status']==0)?"Mới đặt hàng":"Đã giao hàng"; ?>&nbsp;
                    </td>                    
                    <td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
                    <td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
                    <td><?php echo number_format($order['Order']['total'])."VNĐ"; ?>&nbsp;</td>
                    <td>
                  <?php 
                  if($order['Order']['status']==0){
                               echo $this->Html->link(__('Giao hàng'),array(
                                   'action'     => 'release',
                                    $order['Order']['id']
                                ),array(
                                   'class'  => 'label label-success',
                                   'escape' => false
                                ),  __('Bạn muốn chuyển trạng thái giao hàng # %s?', $order['Order']['id'])
                                ); 
                    }
                    ?>
                    </td>
                    <td>
                    <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $order['Order']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                          ),
                            __('Are you sure you want to delete # %s?', $order['Order']['id'])
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
   </div>
  </div>