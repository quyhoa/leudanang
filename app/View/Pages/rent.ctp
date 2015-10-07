<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="<?php echo $this->Html->url('/');?>"><?php echo __('Home');?></a> &gt; <?php echo  __('cart');?>
                    </div>                             
                </div>  
                <?php if(!empty($carts)): ?>
                <div class="table-responsive">                
                    <table class="table_cart table">
                        <tbody>
                          <tr>
                            <th colspan="2" class="img_cart_td">Tên sản phẩm</th>
                            <th><?php echo __('Giá')?></th>
                            <th><?php echo __('Số lượng')?></th>
                            <th><?php echo __('Cập nhật')?></th>
                            <th><?php echo __('Xóa')?></th>
                          </tr>
                          <?php foreach($carts as $key=>$cart):
                          if(!empty($cart['id'])){
                          ?>
                          <tr>

                            <td>
                            <?php echo $this->Html->image($cart['image']);?>
                            </td>
                            <td class="textleft_cart">
                            <a href="<?php echo $this->Html->url('/san-pham/'.$cart['code'].'.html');?>">  
                            <?php echo h($cart['name']);?>
                            </a>
                            </td>
                            <td><?php echo number_format($cart['price_brow']);?></td>
                            <!-- create form -->
                            <?php echo $this->Form->create(
                                            'Product',
                                            array(
                                                  'url'=>array('controller'=>'Pages','action'=>'update_rent'),
                                                  'inputDefaults' =>array(
                                                                  'label'       =>false,
                                                                  'div'         =>false,
                                                                  'novalidate'  =>true,
                                                                  'required'    =>false
                                                    )
                                              )                                            
                                        ); 
                            ?>
                            <td>
                                <?php echo $this->Form->input('quantity',array('type'=>'text','value'=>$cart['quantity']));?>
                            </td>
                            <td>
                            <?php echo $this->Form->input('id',array('type'=>'text','value'=>$cart['id'],'size'=>3,'hidden'=>true));?>
                            <?php  echo $this->Form->input(__('Cập nhật'),array('type'=>'submit','class'=>'update_cart update img-thumbnail'));?>
                            </td>
                            <?php echo  $this->Form->end() ?>
                            <!-- endform -->
                            <td>
                            <?php echo $this->Form->postLink($this->Html->image('images/delete_cart.png',array('class'=>'update_cart')),'/Pages/remove_rent/'.$cart['id'],array('escape'=>false)); 
                            ?>
                            </td>
                          </tr>
                      <?php } endforeach; ?>
                        </tbody>
                    </table>                    
                    <div class="pay_money_cart">
                        <a href="/"><input type="button" class="btn btn-default" value="Quay lại cửa hàng"/></a>
                        
                        <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'confirm_rent'));?>"><input type="button" class="btn btn-warning" value="Tiếp tục"/></a>
                    </div>
                    <?php $this->Form->end(); ?>
                </div> 
              <?php else: ?>
                 <h3 style="text-align:center;"> <?php echo __('cart empty');?></h3>
                 <div class="pay_money_cart">

                        <a href="/"><input type="button" class="btn btn-default" value="Quay lại cửa hàng"/></a>
                        
                        
                   </div>
              <?php endif; ?>
            </div> 
        </div>
<!-- <div class="sidebar_first none_smart">
                <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>Giỏ hàng</span></h2>
                 <div class="g">
                    <div id="giohang">
                        <i class="fa fa-shopping-cart icon_giohang"></i>
                        Số sản phẩm : <b id="giohang_sosanpham">2 </b><br>
                        Thành tiền :
                        <b><label id="giohang_gia">0</label>  VND</b><br>
                        <a rel="nofollow" href="giohang.html"><b>Xóa giỏ hàng</b></a><span> &nbsp;
                        <a href="javascript:xoa_giohang('Xóa giỏ hàng');"><b><i class="fa fa-trash-o"></i>
                        </b></a></span>
                    </div>     
                </div>
            </div> -->