 <title>Canine Clip Joint</title>

<?php $this->layout = 'default'; ?>
<?php echo $this->Html->css('style');?>
<?php echo $this->Html->script('sortable.js');?>

 <h3 style="text-align:center;"> Customers </h3>
 <div id="count" style="text-align:center;color:red;">
 <tr >
			<td  ><?php echo $count. " Result(s) Found";?></span></td>
			</tr>
			</div>
<table id="greytable" class="sortable">

<thead>
  <tr><th>Username</th><th>Name</th><th>Phone</th><th>Email</th><th class="sorttable_nosort">Actions</th></tr>
</thead>
			<tbody>
			<?php
		 		foreach($as as $user){
		 	?>
			 <tr>
            
             <td><?php echo $user['User']['username']; ?></td>
             <td><?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?></td>
             <td><?php echo $user['User']['phone']; ?></td>
          
			 <td><?php echo $user['User']['email']; ?></td>
             <td><?php echo $this->Html->image('../img/images/view.png', array ('url' => array("controller"=>"users","action"=>"view", $user['User']['id']))); ?>
             <?php echo $this->Html->image('../img/images/edit.png', array ('url' => array("controller"=>"users","action"=>"edit", $user['User']['id']))); ?>
             <?php 
			 $urlDel = array("controller"=>"users", "action"=>"delete",$user['User']['id'],$user['User']['username']); 
			 echo $this->Html->image('../img/images/delete.png',array('onclick' => "if(confirm('Are you sure you want to delete this Booking?')) location.href='".$this->Html->url($urlDel)."'")); ?></td>
             </tr>
		 <?php }
		 ?>
		 </tbody>
        </table>
		 
	<div id=paginatorbtnlow style="text-align:center;margin-left:35%;">
	<table id=blacktable ><th></th><tr><td>
	<?php echo $this->Paginator->prev(' << ' . __('prev'), array(), null, array('class' => 'prev disabled'))." ";?>
	</td>
	<td>
	<div id=paginatornum>
	<?php echo $this->Paginator->numbers(array('first' => 'First page'))." ";?>
	</div>
	</td>
	<td>
	<?php echo $this->Paginator->next( __('next').' >> ' , array(), null, array('class' => 'next disabled'))." ";?>
	</td>
	</tr>
	</table>
	</div>