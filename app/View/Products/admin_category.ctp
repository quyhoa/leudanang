 <script type="text/javascript">
    function detailForm(id)
      {
       	$.ajax({
       		type:'POST',
       		url :"<?php echo $this->Html->url(array('controller'=>'Products','action'=>'admin_view')); ?>",
       		data:{id:id},
       		asyns:false,
       		success: function(data){
       			data = $.parseJSON(data);
       			console.log(data.Product.content);
       			if(data.Product.content == ''){
       				content = 'Thông tin đang cập nhật';
       			}else{
       				content = data.Product.content;       				
       			}
       			$('#contentDetail').html(content);
       		}
       	});

       	$('#confirm-delete').modal({ backdrop: 'static', keyboard: false });
      }
 </script>
<style type="text/css">
	.div_select{
		float: left;
		margin-left: 5px;
		margin-right: 10px;
	}
</style>
<?php 	
	echo $this->element('popupDetail');
 ?>
 
<div class='popupDetail'></div>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html"><?php echo __('Home'); ?></a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#"><?php echo __('Danh mục sản phẩm'); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable ui-sortable">		
	<div class="box span12">
      <div class="box-content">
	      <?php echo $this->Form->create('Product',array(
	      		// 'url'=>array(),
				'inputDefaults'=>array(
									'label'=>false,
									'div'=>false,
									'novalidate'=>true
								),
				'class'		   => 'form-horizontal',
				'id'=>'actionProductForm'		
			)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th>
                  <?php echo __('ID') ?>
                  </th>
                  <th><?php echo  __('Name');?></th>
                  <th><?php echo  __('Detail');?></th>
                  <th><?php echo __('Actions') ?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($product as $key =>$product): ?>
               <tr>
                  <td><?php echo $this->Form->input("Product.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $product['Category']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"));
                    ?>
                  </td>
                  <td class="center"><?php echo h($product['Category']['id']); ?></td>
                  <td class="center"><?php echo h($product['Category']['name']); ?></td>
                  <td class="center" style="cursor: pointer;">    
                  	<?php echo $this->Form->button('<span>Chi tiết</span>',array(
                            'class'       => 'label',
                            'type'        => 'button',
                            'data-toggle' => 'modal',
                            'onclick'     => 'detailForm(this.id)',
                            'id' 		  => $product['Category']['id']
                          )); ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'controller' => 'Products',
                           'action'     => 'admin_edit_cate',
                            $product['Category']['id']
                        ),array(
                           'class'   =>'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php 
                        	echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
		                           'action'     => 'delete_cate',
		                            $product['Category']['id']
		                        ),array(
		                           'class'  => 'btn btn-danger',
		                           'escape' => false
		                        ),
		                        	__('Are you sure you want to delete # %s?', $product['Category']['name'])
		                        );
                         ?>		                                  

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>
         <hr/>				         
         <?php //echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px"></p>
         <div>
         	<?php echo $this->Html->link(__('Thêm mới chuyên mục'),array('action'=>'admin_add_cate'),array(
         			'class'   =>'btn btn-small btn-info',
         	)); ?>
         	
         <?php echo $this->Form->button(__('Delete choose'),array('class'=>'small btn-inverse','onclick'=>'deletetAll()')); ?>
         </div>
         <?php echo $this->Form->end(); ?>
		<?php echo $this->element('paginator');?>
      </div>
	</div>

</div>
<script>
	function deletetAll()
	{
		$("#actionProductForm").attr('action','/admin/Products/delete_all');
		$("#actionProductForm").submit();
	}
	function search()
	{
		$("#actionProductForm").attr('action','/admin/Products/index');
		$("#actionProductForm").submit();
	}
</script>