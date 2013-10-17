
<div class="dogs-index">
	<h1><?php echo __('View all Pets');?></h1>

	<table width="100%">
	<?php
	$i = 0;
	foreach ($dogs as $dog):
	$i++;
	
	if(($i%4)==1){
	echo "	
	<tr>
    <td>
    ";
    echo "<table width='100%'><tr><td>";
    echo $this->Html->image('/'.$dog['Dog']['dir'].'/thumb/medium/'.$dog['Dog']['p_img_link'] ,array('height'=>'150','url' => array('controller' => 'dogs', 'action' => 'view', $dog['Dog']['id']),'class'=>'thumbnail'));
    echo"</td></tr><tr><td>";
    echo $dog['Dog']['name'];
    echo"</td></tr></table>";
    echo"</td>";
	}
	else if (($i%4)==2){
	echo "<td>";
    echo "<table width='100%'><tr><td>";
    echo $this->Html->image('/'.$dog['Dog']['dir'].'/thumb/medium/'.$dog['Dog']['p_img_link'] ,array('height'=>'150','url' => array('controller' => 'dogs', 'action' => 'view', $dog['Dog']['id']),'class'=>'thumbnail'));
    echo"</td></tr><tr><td>";
    echo $dog['Dog']['name'];
    echo"</td></tr></table>";
     echo"</td>";	
	}
	else if (($i%4)==3){
	echo "<td>";
    echo "<table width='100%'><tr><td>";
    echo $this->Html->image('/'.$dog['dog']['dir'].'/thumb/medium/'.$dog['Dog']['p_img_link'],array('height'=>'150','url' => array('controller' => 'dogs', 'action' => 'view', $dog['Dog']['id']),'class'=>'thumbnail'));
    echo"</td></tr><tr><td>";
    echo $dog['Dog']['name'];
    echo"</td></tr></table>";
    echo"</td>";	
	}
	else if (($i%4)==0){
	echo "<td>";
    echo "<table width='100%'><tr><td>";
    echo $this->Html->image('/'.$dog['Dog']['dir'].'/thumb/medium/'.$dog['Dog']['p_img_link'],array('height'=>'150','url' => array('controller' => 'dogs', 'action' => 'view', $dog['Dog']['id']),'class'=>'thumbnail'));
    echo"</td></tr><tr><td>";
    echo $dog['Dog']['name'];
    echo"</td></tr></table>";
    echo"</td></tr>";	
	}
	endforeach; 
	?>
	</table>
	<?php /*
  <p>
  <?php
  echo $this->Paginator->counter(array(
  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
  ));
  ?>  </p>

  <div class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ' '));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
  </div>
  */ ?>
</div>