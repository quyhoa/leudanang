<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="/">Trang chủ</a> &gt; Thông tin cá nhân
                    </div>                             
                </div>  
                <div class="content_product">
                    <div class="delivery_area">
                        <h3>Thông tin cá nhân</h3>  
                        <?php if(!empty($info)): ?>
                          <div id="check_out">    
                                  <div class="customer_options">
                             
                                     <div class="">
                                      <table class="table table_customer table">                                      
                                        <tbody><tr>
                                          <th><?php echo  h('Họ tên')?>
                                          </th>
                                          <td>
                                            <?php echo  h($info['Admin']['username']);?>
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
                          <a href="#">Lịch sữ mua hàng</a>                            
                        </div>
                      <?php endif; ?>
                 <div class="button_area">
                    <a href="/"><input type="button" class="btn btn-default" value="Quay lại"></a>             
                  </div> 
                </div>  
        </div> 
        </div>
         </div>