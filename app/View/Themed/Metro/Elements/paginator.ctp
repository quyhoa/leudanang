<div class="pagination pagination-centered">         
<?php
   $model_name = isset($model) ? $model : null;
   $option_url = $this->passedArgs;
   if(count($this->params->query) > 0) {
      $option_url['?'] = $this->params->query;
   }
   $this->Paginator->options(array('url' => $option_url));
?>
<ul>
<?php
  $hasPages = ($this->params['paging'][$model_name]['pageCount'] > 1);
   if ($hasPages) {
      if($this->Paginator->hasPrev())
      {
         echo $this->Paginator->prev(__('previous'), array('tag' => 'li'));
      }   
       
      
      echo $this->Paginator->numbers(array('modulus' => 4, "separator" => "&nbsp;", "tag" => "li", 'currentTag' => 'a','currentClass'=>'active'));
      if($this->Paginator->hasNext()) 
      {

       echo $this->Paginator->next(__('next'), array('tag' => 'li'));
      }
   }
?>
</ul>    
</div>      

