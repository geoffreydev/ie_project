 <title>Canine Clip Joint</title>

<?php $this->layout = 'default'; ?>


<table id="greytable">
         	<tr>
         	<th ><span class="col1">Email</span> </th>
         	<th><span class="col1">Booking Name</span></th>
         	<th><span class="col1">Booking Date</span></th>
         	<th><span class="col1">Start</span></th>
         	<th><span class="col1">End</span></th>
         	</tr>
		 	<?php
		 		foreach($users as $user){
		 	?>
			 <tr>
            
             <td><?php echo $user['User']['last_name']; ?></td>
             <td><?php echo $user['User']['first_name']; ?></td>
             <td><?php echo $user['User']['phone']; ?></td>
             <td><?php echo $user['User']['suburb']; ?></td>
             <td><?php echo $this->Html->image('../img/images/view.png', array ('url' => array("controller"=>"users","action"=>"view", $user['User']['id']))); ?>
             <?php echo $this->Html->image('../img/images/edit.png', array ('url' => array("controller"=>"users","action"=>"edit", $user['User']['id']))); ?>
             <?php 
			 $urlDel = array("controller"=>"users", "action"=>"delete",$user['User']['id'],$user['User']['username']); 
			 echo $this->Html->image('../img/images/delete.png',array('onclick' => "if(confirm('Are you sure you want to delete this Booking?')) location.href='".$this->Html->url($urlDel)."'")); ?></td>
             </tr>
		 <?php }
		 ?>
         </table>
			