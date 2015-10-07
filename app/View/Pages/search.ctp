<div class="content_center col-md-6 right">
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
            <div class="newproduct">
                <h2 class="h2index"><?php echo __('Kết quả tìm kiếm')?></h2>
                <?php if(empty($resultSearchs)): ?>
                    <h3><?php h('Không có kết quả nào')?></h3>
                <?php else: ?>
                     <?php echo $this->element('front/listProduct',array('productHots'=>$resultSearchs));?>
                <?php endif; ?>
               
            </div>

        </div>
