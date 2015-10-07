<?php $options= array();
                                      $options['']= '';
                                      $options[158]="Hà Nội";
                                      $options[159]="TP-Hồ Chí Minh";
                                      $options[160]="Đà Nẵng";
                                      $options[161]="An Giang";
                                      $options[162]="Bà Rịa - Vũng Tàu";
                                      $options[163]="Bạc Liêu";
                                      $options[164]="Bắc Kạn";
                                      $options[165]="Bắc Giang";
                                      $options[166]="Bắc Ninh";
                                      $options[167]="Bến Tre";
                                      $options[168]="Bình Dương";
                                      $options[169]="Bình Định";
                                      $options[170]="Bình Phước";
                                      $options[171]="Bình Thuận";
                                      $options[172]="Cà Mau";
                                      $options[173]="Cao Bằng";
                                      $options[174]="Cần Thơ (TP)";
                                      $options[176]="Đắk Lắk";
                                      $options[177]="Đắk Nông";
                                      $options[178]="Điện Biên";
                                      $options[179]="Đồng Nai";
                                      $options[180]="Đồng Tháp";
                                      $options[181]="Gia Lai";
                                      $options[182]="Hà Giang";
                                      $options[183]="Hà Nam";
                                      $options[184]="Hà Tỉnh";
                                      $options[185]="Hải Dương";
                                      $options[186]="Hải Phòng (TP)";
                                      $options[187]="Hòa Bình";
                                      $options[188]="Hậu Giang";
                                      $options[189]="Hưng Yên";
                                      $options[190]="Khánh Hòa";
                                      $options[191]="Kiên Giang";
                                      $options[192]="Kon Tum";
                                      $options[193]="Lai Châu";
                                      $options[194]="Lào Cai";
                                      $options[195]="Lạng Sơn";
                                      $options[196]="Lâm Đồng";
                                      $options[197]="Long An";
                                      $options[198]="Nam Định";
                                      $options[199]="Nghệ An";
                                      $options[200]="Ninh Bình";
                                      $options[201]="Ninh Thuận";
                                      $options[202]="Phú Thọ";
                                      $options[203]="Phú Yên";
                                      $options[204]="Quảng Bình";
                                      $options[205]="Quảng Nam";
                                      $options[206]="Quảng Ngãi";
                                      $options[207]="Quảng Ninh";
                                      $options[208]="Quảng Trị";
                                      $options[209]="Sóc Trăng";
                                      $options[210]="Sơn La";
                                      $options[211]="Tây Ninh";
                                      $options[212]="Thái Nguyên";
                                      $options[213]="Thanh Hóa";
                                      $options[214]="Thừa Thiên - Huế";
                                      $options[215]="Tiêng Giang";
                                      $options[216]="Trà Vinh";
                                      $options[217]="Tuyên Quang";
                                      $options[218]="Vĩnh Long";
                                      $options[219]="Vĩnh Phúc";
                                      $options[220]="Yên Bái";
                                      ?>
<div class="content_center col-md-6 right">
        <?php if(!empty($banners)):?>    
            <div id="banner">               
                <div id="wrap-slide">
                    <div id="slideshow">
                        <ul>
                            <?php foreach($banners as $key=> $banner):?>
                                <li <?php if($key==0) echo 'class="current"'?>>
                                
                                <img src="<?php echo $banner['Banner']['image']; ?>"/>
                                
                            </li>                           
                          
                            <?php endforeach;?>
                        </ul>
                      <span id="prev"></span><span id="next"></span>
                      <p id="controlNav"></p>
                    </div>
                </div>                
            </div>
            <?php endif;?>
            <?php if($mobileDeteted):?>
            <div class="newproduct">
                <h2 class="h2index">Danh mục sản phẩm</h2>
                
                  <ul class="link_list">   
                  <?php foreach($leftMenu as $k=>$vl){?>
                  <li class="menu1"><a href="<?php echo "/danh-muc/".$vl['ProductCategory']['code'].".html" ?>"><?php echo $vl['ProductCategory']['name'];?></a>
                    <?php if(!empty($vl['child'])){ ?>
                      <ul class="submenu">
                      <?php  foreach($vl['child'] as $child){?>

                          <li><a href="<?php echo "/danh-muc/".$child['ProductCategory']['name'] ?>"><?php echo $child['ProductCategory']['code'].".html"; ?>1</a></li>
                        

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
            <?php endif;?>
            <div class="newproduct">
                <h2 class="h2index">sản phẩm mới</h2>
                <div class="g">
                    <ul class="upro">
                        <?php foreach($productNews as $k=>$product){ ?>
                        <li class="">
                            <div class="b"><img src="<?php echo $this->webroot; ?>images/2.gif" alt="new product"></div>
                            <a class="m" href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>">
                            <img src="<?php echo $product['Product']['image'] ?>" alt="<?php echo $product['Product']['code'] ?>"></a>
                            <h4><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h4>
                            <b><?php echo number_format($product['Product']['price_sales']) ; echo __(' VNĐ');?></b>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'add_cart',$product['Product']['id']));?>" class="cart_spec_a"><?php echo __('Đặt Mua') ?>
                            </a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'handle_rent',$product['Product']['id']));?>" class="cart_spec_b"><?php echo __('Đặt Thuê') ?></a>
                        </li>
                        <?php } ?>
                                 
                    </ul>
                    <div class="cl"></div>        
                 </div>
            </div>
            <!-- test các chuyên mục khác -->
<!--             <div class="newproduct">
                <h2 class="h2index">sản phẩm mới</h2>
                <div class="g">
                    <ul class="upro">
                        <?php foreach($productNews as $k=>$product){ ?>
                        <li class="">
                            <div class="b"><img src="<?php echo $this->webroot; ?>images/2.gif" alt="new product"></div>
                            <a class="m" href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>">
                            <img src="<?php echo $product['Product']['image'] ?>" alt="<?php echo $product['Product']['code'] ?>"></a>
                            <h4><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h4>
                            <b><?php echo number_format($product['Product']['price_sales']) ; echo __(' VNĐ');?></b>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'add_cart',$product['Product']['id']));?>" class="cart_spec_a"><?php echo __('Đặt Mua') ?>
                            </a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'handle_rent',$product['Product']['id']));?>" class="cart_spec_b"><?php echo __('Đặt Thuê') ?></a>
                        </li>
                        <?php } ?>
                                 
                    </ul>
                    <div class="cl"></div>        
                 </div>
            </div> -->
           <!--  <div class="newproduct">
                <h2 class="h2index">Sản phẩm hot</h2>
                <div class="g">
                    <ul class="upro">
                        <?php foreach($productHots as $k=>$product){ ?>
                        <li class="">
                            <div class="b"><img src="<?php echo $this->webroot; ?>images/1.gif" alt="product_host"></div>
                            <a class="m" href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>">
                            <img src="<?php echo $product['Product']['image'] ?>" alt="<?php echo $product['Product']['code'] ?>"></a>
                            <h4><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h4>
                            <b><?php echo number_format($product['Product']['price']) ; echo __(' VNĐ');?></b>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'add_cart',$product['Product']['id']));?>" class="cart_spec_a">Mua Hàng</a>
                        </li>
                        <?php } ?>                
                    </ul>
                    <div class="cl"></div>        
                 </div>
            </div> -->
           
        </div>