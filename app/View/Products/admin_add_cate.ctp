<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Thêm danh mục"); ?></a></li>
</ul>
<div class="row-fluid sortable">
   <?php echo $this->Session->flash(); ?>
   <div class="box span12" style="position:relative">
      <div class="box-content">
				<div class="box span12">
					<div class="box-content">

						<?php echo $this->Form->create('Category',array(
							'url'=>array('controller'=>'Products','action'=>'add_cate','admin'=>true),
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
								<label class="control-label"><?php echo __('Giá thuê mỗi ngày') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('price_date',array(
								  		'class'=>'input-xlarge focused',
								  		'type' =>'text'
								  	));
								   ?>
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
            'data[Category][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'Products','action'=>'checkNameCateExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#CategoryNames").val();},id:function(){ return $("#CategoryId").val();}},
				}
            
            },
            'data[Category][price_date]': {
              	required: true,            
            },
            'data[Product][price_sales]': {
              	required: true,            
            },
            'data[Product][price_brow]': {
              	required: true,            
            },
            // 'data[Product][image]': {
            //   	required: {
            //   		depends: function(element) {
            //   		 	var id = $("#ProductId").val();
	           //           	if (!id){
	           //             		return true;
	           //         		}
	           //           	else{
	           //             		return false;
	           //         		}
	           //       	}
	           //  }
              	            
            // }

        },
        
        messages:{
            'data[Category][name]': {
              	required: "<?php echo __('Please input name product category');?>",
              	remote:"<?php echo __('Category is exist');?>"
                        
           },
           'data[Category][price_date]': {
              	required: "<?php echo __('Please input price brow');?>",                        
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
</div>
