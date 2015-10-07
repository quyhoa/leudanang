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
	<li><a href="#"><?php echo __('List product'); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable ui-sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo __('List product') ?></h2>
		</div>
		<div class="box-content">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
				
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->create('Product',array(
								'url'=>array('action'=>'admin_index'),
								'inputDefaults'=>array(
													'label'     =>false,
													'div'       =>false,
													'novalidate'=>true
												),
								// 'class'		   => 'form-horizontal'		
							)); ?>
						<div class='div_select'>
							<label>
								<?php  echo $this->Form->input('limit',array(
								'style'=>"width: 71px;",		
                                'options'   =>array('10'=>10,'25'=>'25','50'=>50,'100'=>100),
                                )); ?>
								 
								<span>kết quả/trang</span>							
							</label>
						</div>
						
						<div class='div_select'>
							<?php  echo $this->Form->input('listCate',array(

                                'options'   =>$categories,
                                'empty'=>__('Product Category'),
                              )); ?>
						</div>
						<!-- <div class='div_select'>
							<label>
								<?php echo $this->Form->input('price',array(
									'type'       =>'text',
									'placeholder'=>__('Price')
								)); ?>
							</label>
						</div> -->
						<div class='div_select'>
							<label>
								<?php echo $this->Form->input('name',array(
									'type'       =>'text',
									'placeholder'=>__('Product Name')
								)); ?>
							</label>
						</div>
						<div class='div_select'>
							<label>
								<?php echo $this->Form->button(__('Search'),array(
									'onclick'=>'search()',
									'class'  =>'btn'
								)); ?>
							</label>
						</div>
						<?php echo $this->Form->end(); ?>

					</div>
				</div>
				
				<!-- table -->
				<!-- element content -->
				
<div class="row-fluid sortable" id="formProduct">
				   <div class="box span12" style="position:relative">
				      <div class="box-header" data-original-title>
				         <h2><?= h('List product'); ?></h2>

				      </div>
				      <div class="box-content">
				      <?php echo $this->Form->create('Product',array(
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
				                  <th><?=  __('ID');?></th>
				                  <th><?=  __('Name');?></th>
				                  <th><?=  __('Image');?></th>
				                  <th><?=  __('Categories');?></th>
				                  <th><?=  __('Price');?></th>
				                  <th><?=  __('Detail');?></th>
				                  <th><?=  __('Status');?></th>
				                  <th><?=  __('add type');?></th>
				                  <th><?= __('Actions') ?></th>
				               </tr>
				            </thead>
				            <tbody>
				            <?php foreach($product as $key =>$product): ?>
				               <tr>
				                  <td><?php echo $this->Form->input("Product.$key.id",array(
				                     'type'      =>'checkbox',
				                     'value'=> $product['Product']['id'],
				                     'div'       =>false,
				                     'label'     =>false,
				                     'class'=>"mulchk"));
				                    ?>
				                  </td>
				                  <td class="center"><?php echo h($product['Product']['id']); ?></td>
				                  <td class="center"><?php echo h($product['Product']['name']); ?></td>
				                  <td class="center">
				                  	<?php echo $this->Html->image($product['Product']['image'],array(
									   		'class'  	=> 'img-thumbnail',
									   		'width' 	=> '100',
									   		'alt'    	=> $product['Product']['code']
									   )); ?>
				                  </td>
				                  <td class="center"><?php echo h($product['Category']['name']); ?></td>
				                  <td class="center"><?php echo number_format($product['Product']['price_sales']).' VNĐ'; ?></td>
				                  <td class="center" style="cursor: pointer;">    
				                  	<?php echo $this->Form->button('<span>Chi tiết</span>',array(
		                                    'class'       => 'label',
		                                    'type'        => 'button',
		                                    'data-toggle' => 'modal',
		                                    'onclick'     => 'detailForm(this.id)',
		                                    'id' 		  => $product['Product']['id']
		                                  )); ?>
				                  </td>
				                  <td class="center">
				                  	<?php if($product['Product']['status']){
				                  		 echo $this->Html->link(__('Publish'),array(
				                           'action'     => 'unpublish',
				                            $product['Product']['id']
				                        ),array(
				                           'class'  => 'label label-success',
				                           'escape' => false
				                        ),	__('Are you sure you want to unpulish # %s?', $product['Product']['name'])
				                        ); 
				                    }else{ 
										echo $this->Html->link(__('Unpublish'),array(
				                           'action'     => 'publish',
				                            $product['Product']['id']
				                        ),array(
				                           'class'  => 'label',
				                           'escape' => false
				                        ),
				                        	__('Are you sure you want to publish # %s?', $product['Product']['name'])
				                        ); 
				                    } ?>
				                    
				                  </td>
				                  <td class="center">
				                  	<?php 
				                  	if(empty($product['ProductNews'])){
					                  	echo $this->Html->link('<span class="label label-success">'.__('addNew').'</span>',array(
					                           'controller' => 'Products',
					                           'action'     => 'admin_new',
					                            $product['Product']['id']
					                        ),array(
					                           'escape' => false,
					                           'style'=>'display:block;margin-bottom:5px;'
					                        ));
					                }
					                if(empty($product['ProductSpecial'])){
					                  	echo $this->Html->link('<span class="label label-success">'.__('addHot').'</span>',array(
					                           'controller' => 'Products',
					                           'action'     => 'admin_hot',
					                            $product['Product']['id']
					                        ),array(
					                           'escape' => false
					                        ));
				                        } ?>
				                  </td>

				                  <td class="center">
				                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
				                           'controller' => 'Products',
				                           'action'     => 'admin_edit',
				                            $product['Product']['id']
				                        ),array(
				                           'class'   =>'btn btn-info',
				                           'escape' => false
				                        )); ?>
				                        <?php 
				                        	echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
						                           'action'     => 'delete',
						                            $product['Product']['id']
						                        ),array(
						                           'class'  => 'btn btn-danger',
						                           'escape' => false
						                        ),
						                        	__('Are you sure you want to delete # %s?', $product['Product']['name'])
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
				         	<?php echo $this->Html->link(__('Add product'),array('action'=>'admin_add'),array(
				         			'class'   =>'btn btn-small btn-info',
				         	)); ?>
				         <?php echo $this->Form->button(__('Delete choose'),array('class'=>'small btn-inverse','onclick'=>'deletetAll()')); ?>
				         </div>
				         <?php echo $this->Form->end(); ?>
						<?php echo $this->element('paginator');?>
				      </div>
				   </div>
				   <!--/span-->
				</div>				
		 </div>            
		</div>
	</div><!--/span-->

</div>
<script>
	function deletetAll()
	{
		$("#actionProductForm").attr('action','/admin/Products/delete_all');
		$("#actionProductForm").submit();
	}
	function addNewAll()
	{
		$("#actionProductForm").attr('action','/admin/Products/add_new_all');
		$("#actionProductForm").submit();
	}
	function addHotAll()
	{
		$("#actionProductForm").attr('action','/admin/Products/add_hot_all');
		$("#actionProductForm").submit();
	}
	function search()
	{
		$("#actionProductForm").attr('action','/admin/Products/index');
		$("#actionProductForm").submit();
	}
</script>