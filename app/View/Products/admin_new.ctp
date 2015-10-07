<div class="row-fluid sortable" id="formProduct">
				   <div class="box span12" style="position:relative">
				      <div class="box-header" data-original-title>
				         <h2><?php echo __("Danh mục sản phẩm"); ?></h2>

				      </div>
				      <div class="box-content">
				      <?php echo $this->Form->create('New',array(
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
				                  <th></th>
				                  <th><?php echo __('ID');?></th>
				                  <th><?php echo __('Name');?></th>
				                  <th><?php echo __('Image');?></th>
				                  <th><?php echo __('Categories');?></th>
				                  <th><?php echo __('Price');?></th>
				                  <th><?php echo __('Detail');?></th>
				                  <th><?php echo __('Status');?></th>
				                  <th>Actions</th>
				               </tr>
				            </thead>
				            <tbody>
				            <?php foreach($product as $productCategorie =>$product): ?>
				               <tr>
				                  <td><?php echo $this->Form->input('status',array(
				                     'type'      =>'checkbox',
				                     'div'       =>false,
				                     'label'     =>false,
				                     'checked'   => $product['New']['status']
				                  ));?>
				                  </td>
				                  <td class="center"><?php echo $product['New']['id'] ?></td>
				                  <td class="center"><?php echo $product['New']['name'] ?></td>
				                  <td class="center">
				                  	<?php echo $this->Html->image($product['New']['image'],array(
									   		'class'  	=> 'img-thumbnail',
									   		'width' 	=> '200',
									   		'height'	=> '150',
									   		'alt'    	=> $product['New']['code']
									   )); ?>
				                  </td>
				                  <td class="center"><?php echo $product['New']['name'] ?></td>
				                  <td class="center"><?php echo $product['New']['price'] ?></td>
				                  <td class="center" style="cursor: pointer;">    
				                  	<?php echo $this->Form->button('<span>Chi tiết</span>',array(
		                                    'class'       => 'label',
		                                    'type'        => 'button',
		                                    'data-toggle' => 'modal',
		                                    'onclick'     => 'detailForm(this.id)',
		                                    'id' 		  => $product['New']['id']
		                                  )); ?>
				                  </td>
				                  <td class="center">
				                     <span class="label label-success">Publish</span>
				                  </td>
				                  <td class="center">
				                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
				                           'controller' => 'Products',
				                           'action'     => 'admin_edit',
				                            $product['Product']['id']
				                        ),array(
				                           'class'  => 'btn btn-info',
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

				         	<?php echo $this->Html->link(__('Add new product'),array('action'=>'admin_new'),array(
				         			'class'   =>'btn btn-small btn-info',
				         	)); ?>
				         	<?php echo $this->Html->link(__('Add hot product'),array('action'=>'admin_hot'),array(
				         			'class'   =>'btn btn-small btn-info',
				         	)); ?>
				         <?php echo $this->Form->button(__('Delete choose'),array('class'=>'small btn-inverse')); ?>
				         </div>
				         <?php echo $this->Form->end(); ?>
						<div class="pagination pagination-centered">
				            <ul>
				               <li><a href="#">Prev</a></li>
				               <li class="active">
				                  <a href="#">1</a>
				               </li>
				               <li><a href="#">2</a></li>
				               <li><a href="#">3</a></li>
				               <li><a href="#">4</a></li>
				               <li><a href="#">Next</a></li>
				            </ul>
				         </div>
				      </div>
				   </div>
				   <!--/span-->
				</div>