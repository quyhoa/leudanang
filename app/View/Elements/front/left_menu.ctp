<!-- Block infomation persional -->
<!-- test -->

<?php //$isLogined = 1; ?>
<!-- endtest -->
<div class="sidebar_first">
    <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span><?php echo __('Thông tin cá nhân') ?></span></h2>
    <?php if(!empty($login)): ?>
      <?php $infoUsers = $this->Session->read('users'); ?>
      <ul class="list_product_spec" id="menu">               
         <li class="hassub"><a href="<?php echo '/acount/'.$infoUsers['Admin']['code'].'.html' ?>">Xem thông tin cá nhân</a>
        </li> 
        <li class="hassub"><a href="<?php echo "/pages/logout" ?>">Đăng xuất</a>
        </li>
      </ul>
    <?php else: ?>
      <div class="div_login">
        <?php echo  $this->Form->create(
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
                   <div class="search_spec">
                        <label>
                            <?php echo $this->Form->input('email',array(
                              'type'=>'text',
                              'class'=>'key form-control',
                              'placeholder'=>'Nhập email'
                            )); ?>
                        </label>
                        <label>
                        <?php echo $this->Form->input('password',array(
                              'type'=>'password',
                              'class'=>'key form-control',
                              'placeholder'=>'Nhập password'
                            )); ?>
                        </label>
                        <?php echo $this->Form->input('Đăng nhập',array(
                              'type'=>'submit',
                              'class'=>'btn btn-warning',
                            )); ?>
                </div>
        <?php echo $this->Form->end() ?>        
      </div>
    <?php endif; ?>
</div>

<!-- Block list menu -->
<div class="sidebar_first none_smart">
    <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span><?php echo __('Sản phẩm') ?></span></h2>
    <ul class="list_product_spec" id="menu">
      <?php foreach($leftMenu as $k=>$vl){?>
        <li class="hassub"><a href="<?php echo "/danh-muc/".$vl['Category']['code'].".html" ?>"><?php echo $vl['Category']['name'];?></a>
          <?php if(!empty($vl['child'])){ ?>
            <ul class="submenu">
            <?php  foreach($vl['child'] as $child){?>

                <li><a href="<?php echo "/danh-muc/".$child['Category']['name'] ?>"><?php echo $child['Category']['code'].".html"; ?>1</a></li>
              
            <?php 
            }
            ?>
            </ul>
            <?php
          }
          ?>
          
        </li>
      <?php } ?>  
        
    </ul>
</div>

<!-- thông tin dăt thuê -->
<!-- <div class="sidebar_first none_smart">
    <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>THÔNG TIN ĐẶT THUÊ</span></h2>
    thông tin dăt thuê
</div> -->