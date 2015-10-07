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
            <!-- form -->
                <div class="content_search_bar">
                  <form action="" method="">
                    <div class="content_detail_child">                      
                      <div class="left">Sắp xếp: </div>
                      <div>
                        <?php echo $this->Form->input('type_order',array('type'=>'select','options'=>array('asc'=>__('Asc'),'desc'=>__('Desc')),'empty'=>'','label'=>false,'div'=>false));?>
                        
                      </div>
                    </div>
                    <div class="content_detail_child">
                      <div class="left">Theo: </div>
                      <div>
                        <?php echo $this->Form->input('field_order',array('type'=>'select','options'=>array('Product.name'=>__('Product Name'),'Product.price_sales'=>__('Price')),'empty'=>'','label'=>false,'div'=>false));?>
                      </div>
                    </div>
                    <div class="content_detail_child">
                      <div class="left">Số sản phẩm: </div>
                      <div>
                         <?php echo $this->Form->input('limit',array('type'=>'select','options'=>array('8'=>8,'16'=>16,'24'=>24,'32'=>32,'48'=>48),'label'=>false,'div'=>false,'default'=>'16'));?>
                      </div>
                    </div>

                    <input type="submit" name="button" value="Tìm kiếm"  class="btn-small btn-info">
                                  
              </div>
            <!-- endfrom -->
                <h2 class="h2index">sản phẩm mới</h2>
                <div class="g">
                    <ul class="upro">
                        <?php foreach($products as $k=>$product){ ?>
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