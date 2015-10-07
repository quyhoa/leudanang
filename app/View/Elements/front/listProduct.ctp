<div class="g">
    <ul class="upro">
        <?php foreach($productHots as $k=>$product){ ?>
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
 