<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="/">Trang chủ</a> &gt; Đăng nhập
                    </div>                             
                </div>  
                <div class="content_product">
                    <div id="login_account">
                       <?php 
                               echo  $this->Form->create(
                                    'Admin',
                                    array(
                                          'url'=>array('controller'=>'pages','action'=>'dang_nhap','admin'=>false),
                                          'type'=>'POST',
                                          'id'=>'confirmForm',
                                          'inputDefaults' =>array(
                                                            'label'       =>false,
                                                            'div'         =>false,
                                                            'novalidate'  =>true
                                                           )
                                      )                                            
                                ); 
                  		?>  
                      <?php echo $this->Form->hidden('form_login',array('type'=>'text','value'=>'true')) ?>                 
                          <h2>Đăng nhập vào tài khoản của bạn</h2>
                          <div class="note">
                            Nhập tài khoản (địa chỉ e-mail) và mật khẩu đăng nhập.
                          </div>        
                          <table class="table_login">
                            <tbody><tr>
                              <th>E-mail</th>
                              <td>
                              <?php echo $this->Form->input('email',array(
                              	'type'=>'text',
                              	'class'=>'input_email',
                              	'placeholder'=>'Nhập địa chỉ E-mail'
                              )); ?>
                              <!-- <input type="text" name="login_email" value="" class="input_email" placeholder="Nhập địa chỉ E-mail"> -->
                              </td>
                            </tr>
                            <tr>
                              <th>Password</th>
                              <td>
                              <?php echo $this->Form->input('password',array('type'=>'password','class'=>'input_password','placeholder'=>'Nhập mật khẩu')); ?>
                              </td>
                            </tr>
                          </tbody>
                          </table>

                          <div class="button_area">
                            <!-- <input type="button" onclick="" value="Đăng nhập thành viên" class="btn btn-warning btn-large"> -->
                            <?php echo $this->Form->input(__("Đăng nhập thành viên"),array('type'=>'submit','class'=>'btn btn-warning btn-large')); ?>
                          </div>

                          <div class="forgot_area">
                            <a class="sign_up" href="<?php echo $this->Html->url('/sing-up.html'); ?>"><i class="fa fa-sign-in"></i>Đăng Kí</a>
                            <a href="/quen-mat-khau.html" target="_blank">*Bạn Quên Mật Khẩu?</a>
                          </div>
                        <?php echo $this->Form->end() ?>
                    </div>
                </div> 
            </div> 
        </div>