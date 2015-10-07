<div class="sidebar_first" id="cmsearch">
                <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>TÌM KIẾM NÂNG CAO</span></h2>
                <div class="search_spec">
                    <?php echo $this->Form->create(
                                            'Product',
                                            array(
                                                  'url'=>array('controller'=>'Pages','action'=>'search'),
                                                  'inputDefaults' =>array(
                                                                  'label'       =>false,
                                                                  'div'         =>false,
                                                                  'novalidate'  =>true,
                                                                  'required'    =>false
                                                    )
                                              )                                            
                                        ); 
                          ?> 
                        <label>
                            <span class="floatLeft">Từ khóa:</span>
                            <?php echo $this->Form->input('key',array('type'=>'text','class'=>'key form-control'));?>
                        </label>
                        <label>
                             <span class="floatLeft">Danh mục: </span>
                             <?php  echo $this->Form->input('number',array(
                                'options'   => $productCategories,
                                'id'        => 'tk_danhmuc_0',
                                'class'     => 'tk_input form-control',
                                'empty'     =>"Tất cả"
                              )); ?> 
                        </label>
                        <?php echo $this->Form->input(h('Tìm kiếm'),array('type'=>'submit','class'=>'btn btn-warning'));?>
                   <?= $this->Form->end();?>
                </div>
            </div>