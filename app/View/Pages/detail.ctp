<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><?= $this->Html->link(__('Trang chủ'),'/'); ?> &gt; <?= $this->Html->link('Bộ chuyển đổi','/'); ?>
                    </div>  
                    <div class="content_detail">                      
                      <div class="pdl zoom-small-image">
                           <a href="<?php echo $product['Product']['image_large'];?>" class='cloud-zoom big_img' id='zoom1' rel="adjustX: 10, adjustY:-4">
              <img src="<?php echo $product['Product']['image_large'];?>" alt="">
                          </a>


                         
                          <a href="<?php echo $product['Product']['image_large'];?>" class="thumnai_img example-image-link" data-lightbox="example-set">
                            <img src="<?php echo $product['Product']['image'];?>" alt="" data-lightbox="example-1" class="example-image">
                          </a>                      
                      </div>
                      <div class="pdr">
                          <h1><a href=""><?php echo h($product['Product']['name']); ?></a></h1>
                          <b class="price" ><?php echo __('Giá bán');?></b>
                          <div class="infor_product">
                          <span class="i1"><?php echo number_format($product['Product']['price_sales']); ?> VNĐ <span class="i2">(Giá trên chưa VAT)</span></span>
                          </div>
                           <b class="price" ><?php echo __('Giá thuê');?></b>
                          <div class="infor_product">
                          <span class="i1"><?php echo number_format($product['Product']['price_brow']); ?> VNĐ / lượt đầu tiên<span class="i2">(Giá trên chưa VAT)</span></span>
                          </div>
                          <b class="price" ><?php echo __('Giá thuê ngày tiếp theo:');?></b>
                          <div class="infor_product">
                          <span class="i1"><?php echo number_format($product['Category']['price_date']); ?> VNĐ / ngày<span class="i2">(Giá trên chưa VAT)</span></span>
                          </div>
                          <?php echo $product['Product']['descriptions']; ?>
                          <?php echo $this->Form->create('Product',array('url'=>array('controller'=>'Pages','action'=>'add_cart')));?>
                          <div class="number_product">
                              <b><?php echo __('Number');?>:</b> 
                              <?php echo $this->Form->input('number',array('type'=>'text','class'=>'border_product','value'=>1,'div'=>false,'label'=>false));
                               echo $this->Form->hidden('id',array('value'=>$product['Product']['id']));?>
                              <a  onclick="$('#ProductDetailForm').submit()"><img src="<?php echo $this->webroot;?>images/chitietsanpham/cart.gif" alt="Đặt Mua"></a>

                          </div> 
                          <?php $this->Form->end();?>
                          <?php echo $this->Form->create('Product',array('url'=>array('controller'=>'Pages','action'=>'handle_rent')));?>
                          <div class="number_product">
                              <b><?php echo __('Number');?>:</b> 
                              <?php echo $this->Form->input('number',array('type'=>'text','class'=>'border_product','value'=>1,'div'=>false,'label'=>false,'readOnly'));
                               echo $this->Form->hidden('id',array('value'=>$product['Product']['id']));?>
                              <a  href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'handle_rent',$product['Product']['id']));?>"><img src="<?php echo $this->webroot;?>images/chitietsanpham/rent.jpg" alt="Đặt thuê"></a>

                          </div> 
                          <?php $this->Form->end();?>
                      </div>                      
                    </div>
                    <div
                      class="fb-like"
                      data-share="true"
                      data-width="450"
                      data-show-faces="true">
                    </div>
                      <!-- <div class="fb-like"></div> -->
                    <div class="fb-comments" data-href="http://chothueleutrai.tk/san-pham/<?php echo $product['Product']['code'].'.html' ?>" data-numposts="5" width='700px'></div>
                    <div class="cl"></div>                    
                    <h2 class="h2dt"><span><i class="fa fa-plus-square"></i><?= __('Thông tin sản phẩm')?></span>
                       
                    </h2>

                    <div class="intro">
                        <?php echo $product['Product']['content'];?>
                    </div>                                                 
                    <h2 class="h2index"><i class="fa fa-list-ul"></i> Sản phẩm cùng loại</h2>
                    <div class="cl"></div>
                    <div id="ispro">
                    <ul class="upro">
                    <?php foreach($relasts as $key => $relast): ?>
                      <?php foreach ($relast['Product'] as $key => $value):?>
                       <li class="">
                            <div class="b"><img src="<?php echo $this->webroot; ?>images/2.gif" alt="new product"></div>
                            <a class="m" href="<?php echo $this->Html->url('/san-pham/'.$value['code'].'.html');?>">
                            <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['code'] ?>"></a>
                            <h4><a href="<?php echo $this->Html->url('/san-pham/'.$value['code'].'.html');?>"><?php echo h($value['name']);?></a></h4>
                            <b><?php echo number_format($value['price_sales']) ; echo __(' VNĐ');?></b>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'add_cart',$value['id']));?>" class="cart_spec_a"><?php echo __('Đặt Mua') ?>
                            </a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'handle_rent',$value['id']));?>" class="cart_spec_b"><?php echo __('Đặt Thuê') ?></a>
                        </li>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                    </ul>                
                </div>                    
                <!-- <div id="fpage"><b>Trang:</b>
                 <a id="aa1" href="javascript:delt('#ispro','2335','120800','1')" style="font-weight: bold;">1</a><a id="aa2" href="javascript:delt('#ispro','2335','120800','2')" style="font-weight: normal;">2</a><a id="aa3" href="javascript:delt('#ispro','2335','120800','3')">3</a></div>   
                <div id="fb-root"></div> -->
                
               <!--  <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="2"></div>  -->             
                </div> 
            </div>
        </div>