<h2>Edit Post</h2>

<?php	
	echo $this->Form->create('Post', array('action'=>'edit'));
	echo $this->Form->input('title');
	echo $this->Form->input('body');
	echo $this->Form->end('Edit');
?>