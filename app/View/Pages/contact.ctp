<div class="content_center col-md-6 right">
    <div class="content_product">
        <div id="dpro">
            <div class="dlink">                
                <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="<?php echo $this->Html->url('/');?>"><?php echo __('Home');?></a> &gt; <?php echo __('Liên hệ') ?>
            </div>                             
        </div>  
        <div class="content_product">
            <?php echo $this->Session->flash();?>
            <div class="main_contact">
            </div>
             <p class="textLeft margin_bottom">
                Quý khách liên hệ với chúng tôi bằng cách điền vào mẫu Form dưới đây và gửi cho chúng tôi. Thông tin của quý khách sẽ được xem xét và trả lời trong thời gian sớm nhất.<br>
                Ghi chú: Những ô có dấu (*) là những ô yêu cầu nhập đầy đủ thông tin
             </p>
             <?php echo $this->Form->create('Contact',array('url'=>array('controller'=>'Pages','action'=>'contact'),'class'=>'contact_form'));?>

                <div class="contact1">
                  <label class="left">
                      Họ và tên <span class="clt_bg">*</spam>
                  </label>
                  <?php echo $this->Form->input('name',array('type'=>'text','class'=>'right form-control','div'=>false,'label'=>false));?>
                 
                </div>
                <div class="contact1">
                  <label class="left">
                      Địa chỉ <span class="clt_bg">*</spam>
                  </label>
                  <?php echo $this->Form->input('address',array('type'=>'text','class'=>'right form-control','div'=>false,'label'=>false));?>
                </div>
                <div class="contact1">
                  <label class="left">
                      Điện thoại <span class="clt_bg">*</spam>
                  </label>
                  <?php echo $this->Form->input('phone',array('type'=>'text','class'=>'right form-control','div'=>false,'label'=>false));?>
                </div>
                <div class="contact1">
                  <label class="left">
                      Địa chỉ e-mail <span class="clt_bg">*</spam>
                  </label>
                  <?php echo $this->Form->input('email',array('type'=>'text','class'=>'right form-control','div'=>false,'label'=>false));?>
                </div>
                <div class="contact1">
                  <label class="left">
                      Tiêu đề liên hệ <span class="clt_bg">*</spam>
                  </label>
                  <?php echo $this->Form->input('title',array('type'=>'text','class'=>'right form-control','div'=>false,'label'=>false));?>
                </div>
                <div class="contact1">
                  <label class="left">
                      Nội dung<span class="clt_bg">*</spam>
                  </label>
                  <?php echo $this->Form->textarea('content',array('type'=>'text','class'=>'right form-control','div'=>false,'label'=>false));?>
                </div>
                 <div class="contact1">
                  <label class="left">                             
                  </label>
                  <div class="contact1_submit right">
                    <input type="submit" class="btn btn-warning" value="Gửi"/>
                    <input type="reset" class="btn btn-default" value="Điền lại" onclick="$('#ContactContactForm')[0].reset();"/>
                  </div>
                </div>
             <?php echo $this->Form->end();?>
        </div> 
    </div> 
  </div>
<script>
$(document).ready(function(){
  /*
    Validated data using jquery.validator
  */
  $("#ContactContactForm").validate({
        rules: {
            'data[Contact][name]': {
                required: true,
                
            
            },
            'data[Contact][address]':{
                required: true,
               
            },
             'data[Contact][phone]':{
                required: true,
               
            },
             'data[Contact][email]':{
                required: true,
                email:true,
               
            },
             'data[Contact][title]':{
                required: true,
               
            },
             'data[Contact][content]':{
                required: true,
               
            },
           
           

        },
        
        messages:{
            'data[Contact][name]': {
                required: '<?php echo __('Please input fields') ;?>',
                
            
            },
            'data[Contact][address]':{
                required: '<?php echo __('Please input fields') ;?>',
               
            },
             'data[Contact][phone]':{
                required: '<?php echo __('Please input fields') ;?>',
               
            },
             'data[Contact][email]':{
                required: '<?php echo __('Please input fields') ;?>',
                email:'<?php echo __('Email is incorrect format') ;?>',
               
            },
             'data[Contact][title]':{
                required: '<?php echo __('Please input fields') ;?>',
               
            },
             'data[Contact][content]':{
                required: '<?php echo __('Please input fields') ;?>',
               
            },
           
                     

        }  ,
        errorPlacement: function( label, element ) {
           label.insertAfter(element);
        },
        
        submitHandler: function(form) {
          form.submit();    
        }
    });
  

});
  
</script>