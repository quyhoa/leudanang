<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="/">Trang chủ</a> &gt; <a href=""><?php echo $detailnews['NewsCategory']['name'] ?></a>&gt; <?php echo $detailnews['News']['title'] ?>
                    </div>                             
                </div>  
                <div class="content_detail">   
                      <?php if(!empty($detailnews['News']['image'])){?>                   
                      <div class="pdl zoom-small-image">  
                        <img src="<?php echo $detailnews['News']['image'];?>" class="left image_left_infor" alt="<?php $detailnews['News']['code'];?>">                       
                                        
                      </div>
                      <?php } ?>
                      <div class="pdr">
                          <h1><?php echo $detailnews['News']['description'] ?></h1>
                          <p class="clock_infor textLeft"><i class="fa fa-clock-o"></i><?php echo $detailnews['News']['created'] ?></p>
                          <div class="">
                            <?php echo $detailnews['News']['content'] ?>
                          </div>              
                      </div>
                    </div>
                    <div class="cl"></div>  
                    <h2 class="h2index"><i class="fa fa-list-ul"></i><?php echo ('Related news');?></h2>
                    <ul class="news_related">
                    <?php foreach($relestsNews as $key => $newsl): ?>                    
                   
                        <li>
                            <?php echo $this->Html->link($newsl['News']['title'],'/detailnews/'.$newsl['News']['code'],array('class'=>'title')); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
            </div> 

        </div>