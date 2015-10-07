<?php echo $this->Html->script('ckeditor/ckeditor');?>
<?php echo $this->Session->flash();?>
<div class="box-content">
	<!-- <form class="form-horizontal"> -->
	<?php echo $this->Form->create('News',array(
		'inputDefaults'=>array(
							'label'=>false,
							'div'=>false,
							'novalidate'=>true
						),
		'class'		   => 'form-horizontal',
		'id'=>'NewsForm'		
	)) ?>
	<?php echo $this->Form->hidden('id');?>
	<fieldset>
	  <div class="control-group">
		<label class="control-label"><?php echo __('news_title') ?>
		(<span class="required">*</span>)</label>								
		<div class="controls">
		<!-- <span class='note'>(*)</span> -->
		  <?php echo $this->Form->input('title',array(
		  		'class'=>'input-xlarge focused span6',
		  		'type' =>'text'

		  )); ?>
		</div>
	  </div>							  
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('news_cateogry');?>(<span class="required">*</span>)</label>
		<div class="controls">
		  <?php echo $this->Form->input('news_category_id',array(
		  		'class'=>'input focused span6',
		  		'type' =>'select',
				'empty'=>__("Please select a news category")
		  )); ?>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('description');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('description',array(
		  		'class'=>'input focused span6',
		  		'type' =>'textarea',
		  	
		  )); ?>
		</div>
	  </div>
	  <div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2"><?php echo __('content') ?>(<span class="required">*</span>)</label>
		  <div class="controls">
			<?php echo $this->Form->input('content',array(
				'rows' => 20,
				'cols' => 100,
				'type' => 'textarea',
				'class'=>'ckeditor'
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
	              'default'=>'1',	
	              'div'   => false
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
			if(!empty($this->request->data['News']['id']))
			{
				echo $this->Form->button(__('Edit_page'),array(
															'type'  => 'submit',
															'class' => 'btn btn-primary'));
			}
			else{
				echo $this->Form->button(__('Add_page'),array(
															'type'  => 'submit',
															'class' => 'btn btn-primary'));
			}
			 
		?>
		
	  </div>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
<!-- custom javascript-->
<script>
$(document).ready(function(){
	/*
		Validated data using jquery.validator
	*/
	$("#NewsForm").validate({
        rules: {
            'data[News][title]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'News','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#NewsTitle").val();},id:function(){ return $("#NewsId").val();}},
				}
            
            },
            'data[News][news_category_id]':{
                required: true,
               
          	},
            'data[News][content]':{
                required: true,
               
          	},
           

        },
        
        messages:{
            'data[News][name]': {
              	required: "<?php echo __('Please input news title');?>",
              	remote:"<?php echo __('News is exist');?>"
                        
           },
          
           'data[News][content]': {
              	required: "<?php echo __('Please input content');?>",
              	
                        
           },
            'data[News][news_category_id]': {
              	required: "<?php echo __('Please select a news category');?>",
              	
                        
           },
                     

      	}  ,
        ignore: [],
	    errorPlacement: function( label, element ) {
	    	if (element.is('textarea') && element.is('.ckeditor')) {
                 label.insertAfter($("#cke_NewsContent"));

            }
            else{
            	label.insertAfter(element);

            }
		},
    
        submitHandler: function(form) {
        	form.submit();    
        }
    });
	

});
	
</script>