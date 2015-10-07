<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="/">Trang chủ</a> &gt; Phương thức thanh toán
                    </div>                             
                </div>  
                <div class="content_product">
                    <div class="table-responsive">
                      <table class="table_cart table">
                          <tbody>
                            <tr>
                              <th colspan="2">Tên sản phẩm</th>
                              <th>Giá</th>
                              <th>Số lượng</th>
                              <th>Tổng tiền</th>
                            </tr>
                            <?php foreach($carts as $cart):?>
                            <tr>
                              <td><img src="<?php echo $cart['image'] ?>" class="img_cart" alt=""></td>
                              <td class="textleft_cart"><?php echo h($cart['name']); ?></td>
                              <td><?php echo number_format($cart['price_sales']);?></td>
                              <td><?php echo h($cart['quantity']); ?></td>
                             
                              <td><?php echo number_format($cart['price_sales']*$cart['quantity']); echo __('VNĐ'); ?></td>
                              </tr>
                            <?php endforeach; ?>
                            <tr class="sum_money">                          
                              <td colspan="4" class="textright_cart">Phí vận chuyển</td>
                              <td>0 VND</td>
                            </tr>
                            <tr>                          
                              <td colspan="4" class="textright_cart">Tổng Tiền</td>
                              <td><?php echo number_format($total); echo __('VNĐ'); ?></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                    <div class="delivery_area">
                        <h3>Thông tin đặt hàng</h3>  
                        <div id="check_out">    
                          <div class="customer_options">
                     
                             <div class="">
                              <table class="table table_customer table">  
                                <tbody><tr>
                                  <th><?php echo  __('Họ tên')?>
                                  </th>
                                  <td>
                                    <?php echo  $info['Admin']['username'];?>
                                  </td>                                  
                                </tr>
                                <tr>
                                  <th>Số điện thoại
                                  </th>
                                  <td>
                                    <?php echo  $info['Admin']['phone'];?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Địa chỉ
                                  </th>
                                  <td>
                                    <?php echo  $info['Admin']['address'];?>
                                  </td>
                                </tr>
                                  <tr>
                                    <th>Địa chỉ E-mail
                                    </th>
                                    <td>
                                      <?php echo  $info['Admin']['email'];?>
                                      
                                    </td>
                                  </tr>
                                              
                              </tbody>
                          </table>
                        </div>
                      </div>

                      <h3>Thông tin vận chuyển</h3>
                         <?php if(!empty($info['delivery_type'])){?>
                          <table id="sendto_options_sub" class="table table_shipping" >

                            <tbody><tr>
                              <th>Họ Tên</th>
                              <td>
                                 <?php echo  $info['User']['delivery_name'];?>
                              </td>
                            </tr>

                            <tr>
                              <th>Số điện thoại</th>
                              <td>
                                <?php echo  $info['User']['delivery_tel'];?>
                              
                              </td>
                            </tr>

                            <tr>
                              <th>Địa chỉ</th>
                              <td>
                                <?php echo  $info['User']['delivery_address'];?>
                              </td>
                            </tr>

                     
                            <tr>
                              <th>
                                Tỉnh /Thành phố
                                <span class="require">*</span>
                              </th>
                              <td>
                                <?php echo $options[$info['User']['delivery_city']];?>
                                
                              </td>
                            </tr>
                            <tr>
                                <th>
                                  Huyện / quận
                                  <span class="require">*</span>
                                </th>
                                <td>
                                  
                                  <?php echo  $info['User']['delivery_district'];?>
                                </td>
                            </tr>
                          <tr>
                            <th>Ghi chú</th>
                            <td>
                             <?php echo  $info['User']['delivery_memo'];?>
                            </td>
                          </tr>
                    </tbody>
                </table>
                <?php } else {
                  echo "Sử dụng thông tin đặt hàng";
                } ?>
            
            </div>
            <div style="border-top:1px solid #ccc;margin-top:10px;">
                        <h3>Phương thức thanh toán</h3>  
                        <div class="note">
                            Quý khách có thể thanh toán trực tiếp hoặc chuyển khoản theo thông tin tài khoản bên dưới.Xin chân thành cám ơn
                        </div>                    
                        <table class="table_delivery">
                            <tbody>
                              <tr>
                                <th>
                                    <label for="d337" style="cursor: pointer;"><img src="<?php echo $this->webroot;?>images/thanhtoan/347.jpg"></label>
                                </th>
                                <td>
                                  <label for="d337" style="cursor: pointer;">
                                  Ngân hàng Vietcombank</label>
                                  <p class="explain">
                                      Chủ tài khoản: LE QUANG QUY HOA<br> 
                                      Số tài khoản:0771 000 792 860
                                  </p>
                                </td>
                              </tr>
                              
                              </tbody>
                        </table>
                    </div>
            <?php echo $this->Form->create('Page',array('url'=>array('controller'=>'Pages','action'=>'complete')));?>
            <?php echo $this->Form->hidden('carts',array('value'=>serialize($carts)));?>
            <?php echo $this->Form->hidden('total',array('value'=>$total));?>
            <?php echo $this->Form->hidden('info',array('value'=>serialize($info)));?>
            <div class="button_area">
              <a><input type="button" class="btn btn-default" value="Quay lại" onclick="window.history.back()"></a>
              <a><input type="submit" class="btn btn-warning btn-large" value="Tiếp theo"></a>
            </div> 
            <?php echo $this->Form->end();?>
          </div> 
        </div> 
        </div>
         </div>