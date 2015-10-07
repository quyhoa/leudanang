<style type="text/css">.style_capchar{
  cursor: pointer !important;
}
</style>
<div class="content_center col-md-6 right">
    <div class="content_product">
        <div id="dpro">
            <div class="dlink">                
                <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="index.html">Trang chủ</a> &gt; Xác nhận tài khoản
            </div>                             
        </div>  
        <div class="content_product">
            <div class="new_customer">
              <?php 
                echo  __('Thông tin mua hàng');
              ?>
            </div>
            <div id="check_out">    
                <?php echo  $this->Form->create(
                                    'Admin',
                                    array(
                                          'url'=>array('controller'=>'Pages','action'=>'confirm_rents'),
                                          'type'=>'POST',
                                          'id'=>'confirmForm',
                                          'inputDefaults' =>array(
                                                          'label'       =>false,
                                                          'div'         =>false,
                                                          'novalidate'=>true
                                                           )
                                      )                                            
                                ); 
                  ?> 

                  <div class="customer_options">
                        <?php echo  $this->Form->input('id',array('type'=>'text','hidden'=>true));?>
                        <?php echo  $this->Form->input('role_id',array('type'=>'text','hidden'=>true));?>
                        
                        
                    <div class="note">
                        <?php echo  __('Xin vui lòng nhập thông tin ở dưới để tiếp tục đặt thuê.')?> <br/><span class="require">(*)</span> Trường bắt buộc               
                    </div>
                    <div class="">
                    <table class="table table_customer table">                                      
                      <tbody><tr>
                        <th><?php echo  __('Họ tên')?>
                                  <span class="require">*</span>
                        </th>
                        <td>
                          <?php echo  $this->Form->input('username',array(
                            'type'        => 'text',
                            'class'       => 'input_email'
                          ));?>
                        </td>
                      </tr>
                      <tr>
                        <th>Số điện thoại
                                  <span class="require">*</span>
                        </th>
                        <td>
                          <?php echo  $this->Form->input('phone',array(
                            'type'        => 'text',
                            'class'       => 'input_email'
                          ));?>
                        </td>
                      </tr>
                      <tr>
                        <th>Địa chỉ<span class="require">*</span>
                        </th>
                        <td>
                          <?php echo  $this->Form->input('address',array(
                            'type'        => 'text',
                            'class'       => 'input_email'
                          ));?>
                        </td>
                      </tr>
                    <tr>
                      <th>Địa chỉ E-mail
                          <span class="require">*</span>
                      </th>
                      <td>
                        <?php echo $this->Form->input('email',array('type'=>'text','class'=>'input_email'));?>
                        
                      </td>
                    </tr>
                    <tr>
                      <th>Ngày mượn
                          <span class="require">*</span>
                      </th>
                      <td>
                        <?php echo $this->Form->input('brow_date',array('type'=>'text','class'=>'input_email'));?>
                        
                      </td>
                    </tr>
                    <tr>
                      <th>Ngày trả
                          <span class="require">*</span>
                      </th>
                      <td>
                        <?php echo $this->Form->input('pay_date',array('type'=>'text','class'=>'input_email'));?>
                        
                      </td>
                    </tr>
                    <tr>
                      <th>Tôi không phải là người máy
                          <span class="require">*</span>
                      </th>
                      <td class="checkCapchar">
                        <?php echo $this->Html->image('unchecked.png',array('width'=>'20px','class'=>'style_capchar','onclick'=>"checkCapchar('checkCapchar')"));?> 
                        <?php echo $this->Form->hidden('human'); ?>                       
                      </td>
                    </tr>
                                                
                      </tbody>
                  </table>
                </div>
              </div>
            <div class="button_area">
              <a><input type="button" class="btn btn-default" value="Quay lại" onclick="window.history.back()"></a>
              <a><input type="submit" class="btn btn-warning btn-large" value="Tiếp theo"></a>
            </div>                      
          <?php echo  $this->Form->end();?>
        </div>
      </div>
    </div>
</div>
<!-- custom javascript-->
<script>
$(document).ready(function(){
  /*
    Validated data using jquery.validator
  */
  

   $("#confirmForm").validate({
        ignore: "input[type='text']:hidden",
        rules: {
            'data[Admin][username]': {
                required: true,
                
            
            },
            'data[Admin][phone]':{
                required: true,
                maxlength: 13
            },
            'data[Admin][address]':{
                required: true,               
               
            },
           
            'data[Admin][email]':{
                required: true,
                email:true               
            },            
            //delivery info 
            'data[Admin][brow_date]': {
                required: true,
            },
            
            'data[Admin][pay_date]':{
                required: true,
            },
            'data[Admin][human]':{
                required: true,               
            },          
           

        },
        
        messages:{
            'data[Admin][username]': {
                required: '<?php echo __('Please input your name');?>',
                
            
            },
            'data[Admin][phone]':{
                required: '<?php echo __('Please select your gender');?>',
                maxlength:'<?php echo __('Please input your password not more 32 character ');?>'
            },
            'data[Admin][address]':{
                required: '<?php echo __('Please input your phone');?>',
               
            },
            'data[Admin][email]':{
                required: '<?php echo __('Please input your address');?>',
                 email:'<?php echo __('Your email is incorrect format');?>'
               
            },
            'data[Admin][brow_date]':{
                required: '<?php echo __('Bạn chưa chọn ngày mượn');?>',
               
            },
            'data[Admin][pay_date]':{
                required: '<?php echo __('Vui lòng chọn ngày trả');?>',
               
            },
           'data[Admin][human]':{
                required: '<?php echo __('Bạn chưa xác thực không phải robot');?>',
            },
                     

        }  ,
        ignore: [],
        onkeyup:     false,
        errorPlacement: function( label, element ) {
           label.insertAfter(element);
        },
        
        submitHandler: function(form) {
          form.submit();    
        }
    });
  

});
function checkCapchar($key){
  if($key == 'checkCapchar'){
    html = "<img src='/img/checkbox.png' width='20px' class='style_capchar imagesizeauto' "+"onclick=checkCapchar"+"('checkCapchar') alt=''><input type='hidden' name='data[Admin][human]' id='AdminHuman'>";
    $('.checkCapchar').html(html);
    $('#AdminHuman').val('1');
  }
}
// function checkrobot(id){
//   if($('#AdminHuman').val() == 0){
//     html = "<label id='checkrobot' class='error'>Bạn chưa xác thực không phải robot</label>"
//     $('#'+id).html(html);
//     return false;
//   }
  
// }
</script>