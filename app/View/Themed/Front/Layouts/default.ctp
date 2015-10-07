<!DOCTYPE html>
<html>
<head>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta content="width=device-width; initial-scale=1.0" name="viewport">
    
    <!-- <meta property="fb:app_id" content="1665981583614034" />
    <meta property="fb:admins" content="USER ID"/> -->
    <title><?php echo $title_for_layout;?></title>
    <?php echo $this->Html->css('font-awesome/css/font-awesome');?>
    <?php echo $this->Html->css('bootstrap/css/bootstrap');?>
    <?php echo $this->Html->css('common');?>
    <?php //echo $this->Html->css('style1');?>
    <?php echo $this->Html->css('slicknav');?>
    <?php echo $this->Html->css('lightbox');?>
    <?php echo $this->Html->script('jquery-1.9.1.min');?>
    <?php echo $this->Html->script('custom');?>
    <?php echo $this->Html->css('cloud-zoom');?>
    <?php //echo $this->Html->css('fancybox/jquery.fancybox-1.3.4');?>
    <?php echo $this->Html->script('jquery.min');?>
    <?php echo $this->Html->script('cloud-zoom.1.0.2');?>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
</head>
<body> 
<div id="fb-root"></div>
<script>
  // window.fbAsyncInit = function() {
  //   FB.init({
  //     appId      : '1665981583614034',
  //     xfbml      : true,
  //     version    : 'v2.4'
  //   });
  // };

  // (function(d, s, id){
  //    var js, fjs = d.getElementsByTagName(s)[0];
  //    if (d.getElementById(id)) {return;}
  //    js = d.createElement(s); js.id = id;
  //    js.src = "//connect.facebook.net/en_US/sdk.js";
  //    fjs.parentNode.insertBefore(js, fjs);
  //  }(document, 'script', 'facebook-jssdk'));
</script>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=1665981583614034";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="header">
    <div class="inner">    
        <!-- <div class="logo left">
            <a href="<?php echo $this->Html->url('/');?>">
            <?php if($mobileDeteted):?>
              <img class="logo_mobile" src="<?php echo $this->webroot;?>img/logo_mobile.png"/>
            <?php else :?>  
              <img class="logo_pc" src="<?php echo $this->webroot;?>img/logo.png"/>
            <?php endif;?>  
            </a>
        </div> -->  
        <?php if(!$mobileDeteted):?>
        <div class="toplogo right">

           
           <div class="search">
                <?php echo $this->Form->create(
                                            'Product',
                                            array(
                                                  'url'=>array('controller'=>'Pages','action'=>'search'),
                                                  'inputDefaults' =>array(
                                                                  'label'       =>false,
                                                                  'div'         =>false,
                                                                  'novalidate'  =>true,
                                                                  'required'    =>false
                                                    ),
                                                  'id'=>'search_form'
                                              )                                            
                                        ); 
                          ?> 
                   <?php echo $this->Form->input('key',array('type'=>'text','class'=>'input','div'=>false,'label'=>false,'placeholder'=>"Từ khóa"));?>
                   <?php  
                   // echo $this->Form->input('number',array(
                   //              'options'   => $productCategories,
                   //              'class'     => 'select',
                   //              'empty'     =>"Tất cả"
                   //            )); 
                   ?> 
                   <input type="submit" value="" class="icon-search">

                <?php echo $this->Form->end();?>

           </div>
           <div class="cart_header">
              <a rel="" href="<?php echo $this->Html->url('/Pages/view_cart');?>">
                <span class="text"><?php echo __('cart'); ?></span>
              </a>
              <span id="cart-num" class="cart-number"><?php echo $numberOrder;?></span>
          </div>
        </div> 
        <?php endif;?>  
              
    </div>
</div>
<!-- top menu -->
<div id="mainNav">
  <div class="inner">
  <?php if(!$mobileDeteted):?>
      <div class="menu" id="globalNavi">
          <ul>
            <li class="menu0 active">
              <a class="menu0" href="<?php echo $this->Html->url('/'); ?>">Trang chủ</a>
            </li>
            <li class="menu1">
              <a class="menu1" href="<?php echo $this->Html->url('/gioi-thieu.html'); ?>">Giới Thiệu</a>
            </li>
           <!--  <li class="menu2 hasSub">
              <a class="menu2"><?php echo __('Tin Tức') ?></a>
              <ul class="subNav" >
              <?php foreach($listnews as $key => $listnew): ?>
                  <li class="subNav">
                    <?php echo $this->Html->link($listnew['NewsCategory']['name'],'/tin-tuc/'.$listnew['NewsCategory']['code'],array('class'=>'subNav subNav1')); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="menu3">
              <a class="menu3" href="<?php echo $this->Html->url('/huong-dan-mua-hang.html'); ?>">Hướng dẫn mua hàng</a>
            </li>
            <li class="menu3">
              <a class="menu3" href="<?php echo $this->Html->url('/huong-dan-dat-thue.html'); ?>">Hướng dẫn đặt thuê</a>
            </li> -->
            <li class="menu4">
              <a class="menu4" href="<?php echo $this->Html->url('/lien-he.html'); ?>">Liên hệ</a>
            </li>
           
          </ul>

      </div>
    <?php else:?>
      <!-- memu for mobile -->
        <div class="menu" id="menuMobile">
          <ul>             
            <li>
              <a href="/" class="btn2 width100"><img src="<?php echo $this->webroot;?>img/icon_home.png" alt="Home" width="20" height="20"></a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/Pages/view_cart');?>" class="btn2 width100"><img src="<?php echo $this->webroot;?>img/icon_cart_2.png" alt="Giỏ hàng" width="20" height="20"></a>
            </li>         
            <li>
              <a href="#cmsearch" class="btn2"><img src="<?php echo $this->webroot;?>img/icon_search.png" alt="Tìm kiếm" width="20" height="20">Tìm kiếm</a>             
            </li>
          </ul>
        </div>
        <!-- end -->
    <?php endif;?>    
  </div>
</div>
<?php if($mobileDeteted):?>
<div class="none_destop">
    <div class="inner">
        
         <ul id="menu">
            <li class="menu0 active">
              <a class="menu0" href="<?php echo $this->Html->url('/'); ?>">Trang chủ</a>
            </li>
            <li class="menu1">
              <a class="menu1" href="<?php echo $this->Html->url('/gioi-thieu.html'); ?>">Giới Thiệu</a>
            </li>
            <!-- <li class="menu2 hasSub">
              <a class="menu2"><?php echo __('Tin Tức') ?></a>
              <ul class="subNav" >
              <?php foreach($listnews as $key => $listnew): ?>
                  <li class="subNav">
                    <?php echo $this->Html->link($listnew['NewsCategory']['name'],'/tin-tuc/'.$listnew['NewsCategory']['code'],array('class'=>'subNav subNav1')); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="menu3">
              <a class="menu3" href="<?php echo $this->Html->url('/huong-dan-mua-hang.html'); ?>">Hướng dẫn mua hàng</a>
            </li> -->
            <li class="menu4">
              <a class="menu4" href="<?php echo $this->Html->url('/lien-he.html'); ?>">Liên hệ</a>
            </li>
    </div>
</div>
<?php endif;?>
<!-- end menu -->
<div id="wrapper">
    <div class="inner"> 
        <?php echo $this->fetch('content');?>
        <!--content -->   
        <!-- sidebar left -->
        <div class="sidebar_left col-md-3 left">
            <?php if($mobileDeteted):
                  echo $this->element('front/search_advance');
                  endif;
            ?>    
            <?php echo $this->element('front/left_menu');?>            
            <?php echo $this->element('front/top_view');?>
                
            <?php //echo $this->element('front/news_new');?>
            <?php echo $this->element('front/support');?>            
        </div>
        <!-- end sidebar -->       
    </div>
</div>
<!-- footer -->
<div id="footer">
  <div class="inner">
    <div class="topFooter">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="25">  
            <ul id="" class="listslow">
              <?php foreach($imageProduct as $k=>$product):?>
                <li>
                  <a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>" target="_blank">
                    <img style="max-height:50px;" src="<?php echo $product['Product']['image'];?>" alt="<?php echo $product['Product']['code'];?>">
                  </a>
                </li> 
                <?php endforeach;?>       
                             
            </ul>
        </marquee>        
    </div>    
    <div class="contact">
        <div class="menufooter">
          <ul class="listmenu">
            <li>
              <a href="<?php echo $this->Html->url('/');?>">Trang Chủ | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/gioi-thieu');?>">Giới Thiệu | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/tin-tuc/tin-tuc-cong-ty');?>">Tin Tức Công Ty | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/tin-tuc/tin-tuc-khuyen-mai');?>">Tin Tức Khuyến Mãi | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/tin-tuc/tin-tuc-cong-nghe');?>">Tin Tức Công Nghệ | </a>
            </li>
            <!-- <li>
              <a href="">Hướng Dẫn Mua Hàng | </a>
            </li> -->
            <li>
              <a href="<?php echo $this->Html->url('/gioi-thieu');?>">Liên Hệ | </a>
            </li>
           <!--  <li>
              <a href="">Hướng Dẫn  </a>
            </li>  -->             
          </ul>
        </div>
        <div class="col-md-12">
            <span class="nameCompany"><strong>DỊCH VỤ CHO THUÊ LỀU - TRẠI - THUYỀN HÒA TẾN TÂM</strong></span>
            <ul class="content_detail">
                <li>
                    <i class="fa fa-map-marker"></i> Địa chỉ: Số 05 Cầm Bá Thước ,Hải Châu ,TP Đà Nẵng
                </li>
                <li>
                    <i class="fa fa-phone"></i> Điện thoại: <span><a href="">04.3868 3905</a></span> - <span><a href="">04.66 58 68 58</a>  Hỗ trợ kỹ thuật: <span><a href="">0164 2287922</a></span>
                </li>
                <li><i class="fa fa-home"></i> Website: <a href="http://nhattin.vn">http://nhattin.vn</a>   <i class="fa fa-envelope"></i> Email: <a href="mailto:quyhoait@gmail.com">maytinhnhattin@gmail.com</a></li>
                <li><i class="fa fa-clock-o"></i> Thời gian làm việc: Từ 8h - 21h - Tất cả các ngày</li>
            </ul>
        </div>        
    </div>
</div>
</div>
<a href="#0" class="cd-top"></a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php echo $this->Html->script('main');?>
<?php echo $this->Html->script('lightbox-plus-jquery.min');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.slicknav');?>
<?php echo $this->Html->script('jquery.validate.min');?>
<script type="text/javascript">
$(document).ready(function(){
    $('#menu').slicknav();
    $("#hasSub1").click(function(){
            $("#subNav1").slideToggle();
        });
      $("#hasSub_spec").click(function(){
          $("#subNav_spec").slideToggle();
      });
      $("#toogle").click(function(){
          $(".link_list").slideToggle();
      });
});
</script>

</body>
</html> 