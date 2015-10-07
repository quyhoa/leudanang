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
                              <th>Giá thuê ngày tiếp theo</th>
                            </tr>
                            <?php foreach($carts as $cart):?>
                            <tr>
                              <td><img src="<?php echo $cart['image'] ?>" class="img_cart" alt=""></td>
                              <td class="textleft_cart"><?php echo h($cart['name']); ?></td>
                              <td><?php echo number_format($cart['price_brow']);?></td>
                              <td><?php echo h($cart['quantity']); ?></td>
                               <td><?php echo h($cart['price_date']); ?></td>
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
                                <!-- <tr>
                                  <th>
                                    Tỉnh/Thành phố
                                  </th>
                                  <td>
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
                                      echo $options[$info['User']['city']];
                                      ?>
                                   
                                  </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Huyện/quận
                                    </th>
                                    <td>
                                      <?php echo  $info['User']['district'];?>
                                    </td>
                                  </tr> -->
                                  <tr>
                                    <th>Địa chỉ E-mail
                                    </th>
                                    <td>
                                      <?php echo  $info['Admin']['email'];?>
                                      
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Ngày mượn
                                    </th>
                                    <td>
                                      <?php echo  $info['Admin']['brow_date'];?>
                                      
                                    </td>
                                  </tr>  
                                  <tr>
                                    <th>Ngày trả
                                    </th>
                                    <td>
                                      <?php echo  $info['Admin']['pay_date'];?>
                                      
                                    </td>
                                  </tr>          
                              </tbody>
                          </table>
                        </div>
                      </div>
                      
            </div>
            <?php echo $this->Form->create('Page',array('url'=>array('controller'=>'Pages','action'=>'complete_rent')));?>
            <?php echo $this->Form->hidden('carts',array('value'=>serialize($carts)));?>
            <?php echo $this->Form->hidden('total',array('value'=>$total));?>
            <?php echo $this->Form->hidden('info',array('value'=>serialize($info)));?>
            <div class="button_area">
              <a><input type="button" class="btn btn-default" value="Quay lại" onclick="window.history.back()"></a>
              <a><input type="submit" class="btn btn-warning btn-large" value="Thanh Toán"></a>
            </div> 
            <?php echo $this->Form->end();?>
          </div> 
        </div> 
        </div>
         </div>