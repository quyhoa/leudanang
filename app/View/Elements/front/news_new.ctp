<div class="sidebar_first none_smart">
                <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>Tin Tức Mới</span></h2>
                 <div class="g">
                 <?php foreach($newNews as $news):?>
                  <div class="n">
                      <?php if(!empty($news['News']['image'])){?>
                      <a href=""><img class="m" src="<?php echo $news['News']['image'];?>" alt=""></a>
                      <?php } ?>
                      <h3><a href=""><?php echo h($news['News']['title']);?></a></h3>
                      <div class="cl"></div>
                  </div>     
                <?php endforeach;?>               
                               
                </div>
            </div>