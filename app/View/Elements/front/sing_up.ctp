<?php echo $this->Form->create('Admin',
                                    array(
                                          '/sing_up',
                                          'inputDefaults' =>array(
                                                          'label'       =>false,
                                                          'div'         =>false,
                                                          'novalidate'  =>true,
                                                          'required'    =>false
                                            )
                                      )                                            
                                ); 
?>   
<div class="content_product">
    <?php echo $this->Session->flash();?>
    <div class="new_customer new_customer">
        Đăng kí tài khoản
    </div>
    <table class="table table_customer">                                      
        <tbody><tr>
            <th>Họ tên
                        <span class="require">*</span>
            </th>
            <td>
                <?php echo $this->Form->input('username',array('class'=>'input_name')); ?>
               
            </td>
        </tr>
        <tr>
            <th>Giới tính
                    <span class="require">*</span>
            </th>
            <td>
            <?php echo $this->Form->input('gender',array('class'=>'input_name','type'=>'select','options'=>array('1'=>'Nam','2'=>'Nữ'))); ?>
            </td>
        </tr>
        <tr>
            <th>Số điện thoại
                    <span class="require">*</span>
            </th>
            <td>
            <?php echo $this->Form->input('phone',array('class'=>'input_name','maxlength'=>"13")); ?>
            </td>
        </tr>
        <tr>
          <th>Địa chỉ 
                <span class="require">*</span>
          </th>
          <td>
            <?php echo $this->Form->input('address',array('class'=>'input_name','maxlength'=>"100")); ?>
           
          </td>
        </tr>  
        <tr>
            <th>Địa chỉ E-mail
                <span class="require">*</span>
            </th>
            <td>
               <?php echo $this->Form->input('email',array('type'=>'text','class'=>'input_name','maxlength'=>'100')); ?>
            </td>
        </tr>
        <tr>
            <th>Mật khẩu 
                <span class="require">*</span>
            </th>
            <td>
           
                  <?php echo $this->Form->input('password',array('type'=>'password','class'=>'input_name')); ?>
                  <span class="explain">( sử dụng 4-32 ký tự )</span>
              
            </td>
        </tr> 
        <tr>
            <th>Xác thực mật khẩu 
                <span class="require">*</span>
            </th>
            <td>
           
                  <?php echo $this->Form->input('comfirm_password',array('type'=>'password','class'=>'input_name')); ?>
                  <span class="explain">( sử dụng 4-32 ký tự )</span>
              
            </td>
        </tr> 

        </tbody>
    </table>
    <div class="button_area">
      
       <?php echo $this->Form->input(__('Back'),array('type'=>'button','class'=>'btn btn-default','onclick'=>"return window.history.back()")); ?>
       <?php //echo $this->Form->input(__('Đăng kí'),array('type'=>'submit','class'=>'btn btn-warning btn-large','div'=>false)); ?>
       <input type="submit" name="<?php echo __('Regist');?>" class='btn btn-warning btn-large'/>
       
    </div>
</div>
<?php $this->Form->end(); ?>
<script>
// $(document).ready(function(){
//   /*
//     Validated data using jquery.validator
//   */
//   $("#UserSingUpForm").validate({
//         rules: {
//             'data[User][name]': {
//                 required: true,
                
            
//             },
//             'data[User][gender]':{
//                 required: true,
               
//             },
//             'data[User][tel]':{
//                 required: true,
               
//             },
//             'data[User][address]':{
//                 required: true,
               
               
//             },
//             'data[User][city]':{
//                 required: true,
               
//             },
//             'data[User][email]':{
//                 required: true,
//                 email:true
               
//             },
//             'data[User][password]':{
//                 required: true,
//                 minlength:4,
//                 maxlength:32
               
//             },
           
           

//         },
        
//         messages:{
//             'data[User][name]': {
//                 required: '<?php echo __('Please input your name');?>',
                
            
//             },
//             'data[User][gender]':{
//                 required: '<?php echo __('Please select your gender');?>',
               
//             },
//             'data[User][tel]':{
//                 required: '<?php echo __('Please input your phone');?>',
               
//             },
//             'data[User][address]':{
//                 required: '<?php echo __('Please input your address');?>',
                
               
//             },
//             'data[User][city]':{
//                 required: '<?php echo __('Please select a city');?>',
               
//             },
//             'data[User][email]':{
//                 required: '<?php echo __('Please input your email');?>',
//                 email:'<?php echo __('Your email is incorrect format');?>'
               
//             },
//             'data[User][password]':{
//                 required: '<?php echo __('Please input your passowrd');?>',
//                 minlength:'<?php echo __('Please input password less 4 character');?>',
//                 maxlength:'<?php echo __('Please input your password not more 32 character ');?>'
               
//             },
           
                     

//         }  ,
//         errorPlacement: function( label, element ) {
//            label.insertAfter(element);
//         },
        
//         submitHandler: function(form) {
//           form.submit();    
//         }
//     });
  

// });
  
</script>