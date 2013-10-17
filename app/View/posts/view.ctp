<h2><?php echo $post['Post']['title']; ?></h2>

<p><?php echo $post['Post']['body']; ?></p>

<p><small>Created on: <?php echo $post['Post']['created'];?>
Last modified on: <?php echo $post['Post']['modified'];  ?></small></p>

<br />
<p>
<?php
	echo $this->Html->link('Back', array('action'=>'index'));
	echo $this->Html->link(' Edit', array('action'=>'edit', $post['Post']['id']));
	echo $this->Html->link(' Delete', array('action'=>'delete', $post['Post']['id']));
	
?>
	</p>