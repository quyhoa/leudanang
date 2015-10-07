<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="<?php echo $this->Html->url('/');?>">Trang chủ</a> &gt; <a href=""><?php echo (!empty($page))?$page['PageList']['name']:'';?></a>
                    </div>                             
                </div>  
                <div class="content_product">
                    <?php if(!empty($page))
                    {
                        echo $page['PageList']['content'];
                    }
                    else{
                        echo __('Sorry! Page not found.');
                    }
                    ?>
                </div> 
            </div> 
        </div>