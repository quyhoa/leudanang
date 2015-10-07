<div class="sidebar_first none_smart">
    <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span><?php echo __('SẢN PHẨM MỚI') ?></span></h2>
    <div class="g">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="25" direction="up" height="350" style="height: 350px;">    <?php foreach($topView as $key => $product):?>  
            <div class="p">
                <a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>" alt=""><img src="<?php echo $product['Product']['image'];?>" alt="" class="<?php echo $this->webroot; ?>imagesizeauto"></a>
                <h3><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h3>
                Giá: <?php echo number_format($product['Product']['price_sales']);?> VNĐ
                <div class="cl"></div>
            </div>   
            <?php endforeach;?>         
                  
        </marquee>
    </div>
</div>
<div class="sidebar_first none_smart">
    <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>SẢN PHẨM XEM NHIỀU</span></h2>
    <div class="g">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="25" direction="up" height="350" style="height: 350px;">    <?php foreach($topView as $key => $product):?>  
            <div class="p">
                <a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>" alt=""><img src="<?php echo $product['Product']['image'];?>" alt="" class="<?php echo $this->webroot; ?>imagesizeauto"></a>
                <h3><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h3>
                Giá: <?php echo number_format($product['Product']['price_sales']);?> VNĐ
                <div class="cl"></div>
            </div>   
            <?php endforeach;?>         
                  
        </marquee>
    </div>
</div>