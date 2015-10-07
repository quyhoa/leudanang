<div class="box span12" style="position:relative">
      <div class="box-content">
				<div class="box span12">
					<div class="box-content">

						<?php echo $this->Form->create('Admin',array(
							'inputDefaults'=>array(
												'label'=>false,
												'div'=>false,
												'novalidate'=>true
											),
							'class'		   => 'form-horizontal',
							'type' 		   =>'file'	,
							'id'		   =>'AdminForm' 		
						)) ?>
						<?php echo $this->Form->hidden('id');?>
							<fieldset>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Email') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('email',array(
								  		'class'=>'input-xlarge focused',
								  		'type' =>'text'
								  	));
								   ?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label"><?php echo __('Password') ?>(<span class="required">*</span>)</label>								
								<div class="controls">
								  <?php 
								  	echo $this->Form->input('password',array(
								  		'class'=>'input-xlarge focused'
								  )); ?>
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
									if(!empty($this->request->data['Admin']['id']))
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
	$("#AdminForm").validate({
        rules: {
            'data[Admin][email]': {
              	required: true,
              	email: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'Admins','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#AdminEmail").val();},id:function(){ return $("#AdminId").val();}},
				}
            
            },
            'data[Admin][password]': {
              	required: true,
              	minlength: 4,
              	maxlength:32            
            },
         
           
        },
        
        messages:{
            'data[Admin][email]': {
              	required: "<?php echo __('Please input email');?>",
              	remote:"<?php echo __('Email is exist');?>",
                email  :'<?php echo __('Email is incorrect format');?>'        
           },
           'data[Admin][password]': {
              	required: "<?php echo __('Please input password');?>", 
              	minlength: "<?php echo __('Please input password from 4 to 32 character');?>",  
              	maxlength: "<?php echo __('Please input password from 4 to 32 character');?>",                                              
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