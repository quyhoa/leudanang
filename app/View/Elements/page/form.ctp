<?php echo $this->Html->script('ckeditor/ckeditor');?>
<?php echo $this->Session->flash();?>
<div class="box-content">
	<!-- <form class="form-horizontal"> -->
	<?php echo $this->Form->create('PageList',array(
		'inputDefaults'=>array(
							'label'=>false,
							'div'=>false,
							'novalidate'=>true
						),
		'class'		   => 'form-horizontal',
		'id'=>'PageListForm'		
	)) ?>
	<?php echo $this->Form->hidden('id');?>
	<fieldset>
	  <div class="control-group">
		<label class="control-label"><?php echo __('page_name') ?>
		(<span class="required">*</span>)</label>								
		<div class="controls">
		<!-- <span class='note'>(*)</span> -->
		  <?php echo $this->Form->input('name',array(
		  		'class'=>'input-xlarge focused span6',
		  		'type' =>'text'

		  )); ?>
		</div>
	  </div>							  
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('page_parent');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('parent',array(
		  		'class'=>'input focused span6',
		  		'type' =>'select',
		  		'options'=>$pageParent,
		  		'empty'=>__("Please select a parent category")
		  )); ?>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('url');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('url',array(
		  		'class'=>'input focused span6',
		  		'type' =>'text',
		  	
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
		<label class="control-label" for="optionsCheckbox2"><?php echo __('Position') ?>(<span class="required">*</span>)</label>
		<div class="controls">
		 	<?php echo $this->Form->input('position', 
	            array(
	              'label' => false, 
	              'type'  =>'text',
	              'class'=>'input focused span2',	
	              'div'   => false
	          )); ?> 
	          </label>
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
			if(!empty($this->request->data['PageList']['id']))
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
	$("#PageListForm").validate({
        rules: {
            'data[PageList][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'PageLists','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#PageListName").val();},id:function(){ return $("#PageListId").val();}},
				}
            
            },
            'data[PageList][content]':{
                required: true,
               
          	},
            'data[PageList][position]': {
              	required: true,
				number: true,
            
            }

        },
        
        messages:{
            'data[PageList][name]': {
              	required: "<?php echo __('Please input page name');?>",
              	remote:"<?php echo __('Page is exist');?>"
                        
           },
           'data[PageList][position]': {
              	required: "<?php echo __('Please input postion');?>",
              	number:"<?php echo __('Please input number');?>"
                        
           },
           'data[PageList][content]': {
              	required: "<?php echo __('Please input content');?>",
              	
                        
           },
                     

      	}  ,
        ignore: [],
	    errorPlacement: function( label, element ) {
	    	if (element.is('textarea') && element.is('.ckeditor')) {
                 label.insertAfter($("#cke_PageListContent"));

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