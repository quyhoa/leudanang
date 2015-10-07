<?php
/*test*/
	$model_name = isset($model) ? $model : null;
	$option_url = $this->passedArgs;
	if(count($this->params->query) > 0) {
		$option_url['?'] = $this->params->query;
	}
	$this->Paginator->options(array('url' => $option_url));
	$hasPages = ($this->params['paging'][$model_name]['pageCount'] > 1);
 	if ($hasPages) {
 		echo '<ul class="pagination admin-pagination">';
	  	echo $this->Paginator->prev(PREV, null, null, array('tag' => 'li'));
	    echo $this->Paginator->numbers(array(
	    	'before' 		=> false, 
	    	'after' 		=> false,
	    	'modulus' 		=> 3, 
	    	"separator" 	=> "&nbsp;", 
	    	"tag" 			=> "li", 
	    	'currentTag' 	=> 'a',
	    	'ellipsis' 		=> '...'
	    ));
	    echo $this->Paginator->next(NEXT, null, null, array('tag' => 'li'));
	    echo '</ul>';
	    echo '<br/>';
   	}
?>
<style type="text/css">
	/* PAGINATION */
/*.pagination{
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
.pagination>li {
    display: inline;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pagination > li > a {
    background: #fafafa;
    color: #666;
    -webkit-box-shadow: inset 0px -2px 0px 0px rgba(0, 0, 0, 0.09);
    -moz-box-shadow: inset 0px -2px 0px 0px rgba(0, 0, 0, 0.09);
    box-shadow: inset 0px -1px 0px 0px rgba(0, 0, 0, 0.09);
}
.pagination > li:first-of-type a,.pagination > li:last-of-type a {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
.pagination>.current>a,
.pagination>.current>span,
.pagination>.current>a:hover,
.pagination>.current>span:hover,
.pagination>.current>a:focus,
.pagination>.current>span:focus
{
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #428bca;
    border-color: #428bca;
}
span.next,span.prev{
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    color:#666;
    box-shadow: inset 0px -1px 0px 0px rgba(0, 0, 0, 0.09);
}
span.next:hover,span.prev:hover{
    background-color: #eee;
}
span.next a,span.prev a{
    color:#666;
}
li.prev,li.next{
    color: #999;
    cursor: not-allowed;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: inset 0px -1px 0px 0px rgba(0, 0, 0, 0.09);
}*/
</style>
 