<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="/"><?php echo __('Home');?></a> &gt; <a href=""><?php echo __('News');?> </a>&gt; <?php echo (!empty($newCate['NewsCategory']['name']))?h($newCate['NewsCategory']['name']):'';?>
                </div>                             
                </div>  
                <div class="content_product">
                <?php if(!empty($newslist)){?>
                <?php foreach($newslist as $key => $newsl): ?>                    
                    <div class="div_infor">
                        <img src="<?php echo $newsl['News']['image'];?>" class="left image_left_infor" alt="<?php echo $newsl['News']['code'];?>"> 
                        
                        <div class="right infor_right">
                            <!-- <a href="" class="title">Giải pháp cấp nguồn qua Ethernet - PoE (Power Over Ethernet)</a> -->
                            <?php echo $this->Html->link($newsl['News']['title'],'/detailnews/'.$newsl['News']['code'],array('class'=>'title')); ?>
                            <p class="clock_infor textLeft"><i class="fa fa-clock-o"></i>(<?php echo $newsl['News']['created'] ?>)</p>
                            <p class="textLeft" style="height: 45px;"> <?php echo $newsl['News']['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                     <!-- <div id="fpage"><b>Trang:</b> <a id="aa1" href="javascript:delt('#ispro','2335','120800','1')" style="font-weight: bold;">1</a><a id="aa2" href="javascript:delt('#ispro','2335','120800','2')" style="font-weight: normal;">2</a><a id="aa3" href="javascript:delt('#ispro','2335','120800','3')">3</a></div>  -->
                <?php } else{
                    echo __('No news');
               
                }?>
                </div> 
            </div> 
        </div>