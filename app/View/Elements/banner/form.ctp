<!-- test -->
<div id='imageId'></div>
<!-- end test image -->
<div class="box span12" style="position:relative">
      <div class="box-content">
				<div class="box span12">
					<div class="box-content">

						<?php echo $this->Form->create('Banner',array(
							'inputDefaults'=>array(
												'label'=>false,
												'div'=>false,
												'novalidate'=>true
											),
							'class'		   => 'form-horizontal',
							'type' 		   =>'file'	,
							'id'		   =>'BannerForm' 		
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
								<label class="control-label"><?php echo __('Url') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('link',array(
								  		'class'=>'input-xlarge focused',
								  		'type' =>'text'
								  	));
								   ?>
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
									   'onChange'=>'$("#demoImage").hide();  return showImage(this,"imgBanner",200,200)'
								  )); 
								  ?>
								  <img id="imgBanner" />								  
								</div>
								<div class="control-group">
								<label class="control-label"></label>							
								<div class="controls" id='demoImage'>
									<?php if(!empty($this->request->data['Banner']['image'])): ?>
										<?php echo $this->Html->image($this->request->data['Banner']['image'],array(
									   		'class'  	=> 'img-thumbnail',
									   		'width' 	=> '304',
									   		'height'	=> '236',
									   		'alt'    	=> ''
									   )); ?>									   		  
									<?php endif; ?>
								</div>
							  </div>
							  </div>
							 
							   <div class="control-group">
								<label class="control-label"><?php echo __('Sort') ?></label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('sort',array(
								  		'class'=>'input-xlarge focused'
								  )); ?>
								</div>
							  </div>	
							  <div class="control-group">
								<label class="control-label" for="optionsCheckbox2"><?php echo __('Publish') ?></label>
								<div class="controls">
								  <label class="checkbox">
									<?php echo $this->Form->input('publish', 
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
									if(!empty($this->request->data['Banner']['id']))
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
	$("#BannerForm").validate({
        rules: {
            'data[Banner][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'Banners','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#BannerName").val();},id:function(){ return $("#BannerId").val();}},
				}
            
            },
            'data[Banner][link]': {
              	required: true,
              	url: true            
            },
         
            'data[Banner][image]': {
              	required:  {
              		depends: function(element) {
              		 	var id = $("#BannerId").val();
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
            'data[Banner][name]': {
              	required: "<?php echo __('Please input name Banner category');?>",
              	remote:"<?php echo __('Banner category is exist');?>"
                        
           },
           'data[Banner][link]': {
              	required: "<?php echo __('Please input link');?>", 
              	url: "<?php echo __('Please input format link');?>",                        
           },
          
           'data[Banner][image]': {
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