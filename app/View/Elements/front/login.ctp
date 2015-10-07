<!-- <div class="content_product">
    <div id="login_account">
        <?php echo $this->Form->create(
                            'User',
                            array(
                                  '/login',
                                  'inputDefaults' =>array(
                                                  'label'       =>false,
                                                  'div'         =>false,
                                                  'novalidate'  =>true,
                                                  'required'    =>false
                                    )
                              )                                            
                        ); 
            ?>                         
          <h2>Đăng nhập vào tài khoản của bạn</h2>
          <div class="note">
            Nhập tài khoản (địa chỉ e-mail) và mật khẩu đăng nhập.
          </div>  
          <?php echo $this->Session->flash();?>      
          <table class="table_login">
            <tbody><tr>
              <th>E-mail</th>
              <td>
              <?php echo $this->Form->input('email',array('type'=>'email','class'=>'input_email','placeholder'=>'Nhập địa chỉ E-mail')); ?>
              </td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
              <?php echo $this->Form->input('password',array('type'=>'password','class'=>'input_password','placeholder'=>'Nhập mật khẩu')); ?>
              </td>
            </tr>
          </tbody></table>

          <div class="button_area">
            <?php echo $this->Form->input('Đăng nhập thành viên',array('type'=>'submit','class'=>'btn btn-warning btn-large')); ?>
          </div>

          <div class="forgot_area">
            <!-- <a class="sign_up" href="sign_up.html"><i class="fa fa-sign-in"></i>Đăng Kí</a> -->
            <?php echo $this->Html->link(__('<i class="fa fa-sign-in"></i>Đăng Kí'),'/sing_up',array('class'=>'sign_up','escape'=>false)); ?>
            <a href="<?php echo $this->Html->url('/sing_up')?>" target="_blank">*Bạn Quên Mật Khẩu?</a>
          </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div> -->
<!-- custom javascript-->
<script>
// $(document).ready(function(){
//   /*
//     Validated data using jquery.validator
//   */
//   $("#UserLoginForm").validate({
//         rules: {
//             'data[User][email]': {
//                 required: true,
//                 email:true,
            
//             },
//             'data[User][password]':{
//                 required: true,
               
//             },
           
           

//         },
        
//         messages:{
//             'data[User][email]': {
//                 required: "<?php echo __('Please input email');?>",
//                 email:"<?php echo __('Email is incorrect format');?>"
                        
//            },
          
//            'data[User][password]': {
//                 required: "<?php echo __('Please input password');?>",
                
                        
//            },
            
                     

//         }  ,
//         errorPlacement: function( label, element ) {
//             if (element.is('textarea') && element.is('.ckeditor')) {
//                      label.insertAfter($("#cke_NewsContent"));

//                 }
//                 else{
//                   label.insertAfter(element);

//                 }
//         },
        
//         submitHandler: function(form) {
//           form.submit();    
//         }
//     });
  

// });
  
</script>