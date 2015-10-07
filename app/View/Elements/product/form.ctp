<div class="box span12" style="position:relative">
      <div class="box-content">
				<div class="box span12">
					<div class="box-content">

						<?php echo $this->Form->create('Product',array(
							'inputDefaults'=>array(
												'label'=>false,
												'div'=>false,
												'novalidate'=>true
											),
							'class'		   => 'form-horizontal',
							'type' 		   =>'file'	,
							'id'		   =>'productForm'		
						)) ?>
						<?php echo $this->Form->hidden('id');?>
							<fieldset>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Name') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('name',array(
								  		'class'=>'input-xlarge focused',
								  		'type' =>'text'
								  	));
								   ?>
								</div>
							  </div>							  
							  <div class="control-group">
								<label class="control-label" for="selectError3"><?php echo __('Category') ?>(<span class="required">*</span>)</label>
								<div class="controls">
								<?php echo $this->Form->input('category_id',array(
									'options'   =>$productCategories,
								)); ?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Giá bán') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('price_sales',array(
								  		'class'=>'input-xlarge focused',
								  		'type' => 'number'
								  )); ?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Giá thuê') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('price_brow',array(
								  		'class'=>'input-xlarge focused',
								  		'type' => 'number'
								  )); ?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Số lượng') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('amount',array(
								  		'class'=>'input-xlarge focused',
								  		'type' => 'number'
								  )); ?>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label"><?php echo __('Description') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('descriptions',array(
								  		'type'=>'textarea',
								  		'class'=>'ckeditor'
								  		
								  )); ?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Image') ?>(<span class="required">*</span>)</label>								
								<div class="controls">								  
								  <?php 
								  echo $this->Form->input('image',array(
									  'label'		=>false,
									  'type'		=>'file',
									  'style'		=>'display:block',
									   'onChange'=>'$("#demoImage").hide();return showImage(this,"imgProduct",200,200)'
								  )); 
								  ?>
								  <img id="imgProduct" />								  
								</div>
								<div class="control-group">
								<label class="control-label"></label>							
								<div class="controls" id='demoImage'>
									<?php if(!empty($this->request->data['Product']['image'])): ?>
										<?php echo $this->Html->image($this->request->data['Product']['image'],array(
									   		'class'  	=> 'img-thumbnail',
									   		'width' 	=> '304',
									   		'height'	=> '236',
									   		'alt'    	=> ''
									   )); ?>									   		  
									<?php endif; ?>
								</div>
							  </div>
							  </div>
							 
							  <!--
							  <div class="control-group">
								<label class="control-label"><?php echo __('Add image') ?></label>							
								<div class="controls">
	               					<div id='addFiles'>
	               						<?php echo $this->Form->input('files.', array('type' => 'file', 'multiple'));?>
	               					</div>
								</div>									
							  </div>
							-->
							  <!-- upload file -->
							  <!--  -->
							  <div class="control-group hidden-phone">
								  <label class="control-label" for="textarea2"><?php echo __('Detail') ?></label>
								  <div class="controls">
									<?php echo $this->Form->input('content',array(
										'rows' => 10,
										'cols' => "70",
										'cols' => 100,
										'type' => 'textarea',
										'class'=>'ckeditor'
									)); ?>
								  </div>
							   </div>	
							  <div class="control-group">
								<label class="control-label" for="optionsCheckbox2"><?php echo __('Không cho phép hiển thị') ?></label>
								<div class="controls">
								  <label class="checkbox">
									<?php echo $this->Form->input('status', 
		                                array(
		                                  'label' => false, 
		                                  'type'  =>'checkbox', 
		                                  'div'   => false,
		                                  'default'=>1
		                              )); ?> 
								  </label>
								</div>
							  </div>
							  <div class="control-group">								
								<div class="controls">
								(<span class="required">*</span>)<?php echo __("Required information");?>
								</div>
							  </div>					  
							  <div class="form-actions">
							  	<?php echo $this->Form->button(__('Back'),array(
										'type'  => 'button',
										'class' => 'btn',
										'onclick'=>'back()'
								)); ?>
								<?php
									if(!empty($this->request->data['Product']['id']))
									{
										echo $this->Form->button(__('Edit'),array(
																					'type'  => 'submit',
																					'class' => 'btn btn-primary'));
									}
									else{
										echo $this->Form->button(__('Add'),array(
																					'type'  => 'submit',
																					'class' => 'btn btn-primary'));
									}								 
							?>
							
							  </div>
							</fieldset>
						  <?php echo $this->Form->end(); ?>
					
					</div>
				</div><!--/span-->
			
		</div>
	</div>
	<script>
$(document).ready(function(){
	/*
		Validated data using jquery.validator
	*/
	$("#productForm").validate({
        rules: {
            'data[Product][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'Products','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#ProductName").val();},id:function(){ return $("#ProductId").val();}},
				}
            
            },
            'data[Product][category_id]': {
              	required: true,            
            },
            'data[Product][price_sales]': {
              	required: true,            
            },
            'data[Product][price_brow]': {
              	required: true,            
            },
            'data[Product][image]': {
              	required: {
              		depends: function(element) {
              		 	var id = $("#ProductId").val();
	                     	if (!id){
	                       		return true;
	                   		}
	                     	else{
	                       		return false;
	                   		}
	                 	}
	            }
              	            
            }

        },
        
        messages:{
            'data[Product][name]': {
              	required: "<?php echo __('Please input name product category');?>",
              	// remote:"<?php echo __('Product category is exist');?>"
                        
           },
           'data[Product][category_id]': {
              	required: "<?php echo __('Please input postion');?>",                        
           },
           'data[Product][price_sales]': {
              	required: "<?php echo __('Please input price sales');?>",                        
           },
           'data[Product][price_brow]': {
              	required: "<?php echo __('Please input price brow');?>",                        
           },
           'data[Product][image]': {
              	required: "<?php echo __('Please input image');?>",                        
           },
                     

      	}  ,
      
	    errorPlacement: function( label, element ) {
		  	if(label.text() !=''){
		   		label.insertAfter( element );
		  	}
		},
    
        submitHandler: function(form) {
        	form.submit();    
        }
    });
	

});
	
</script>