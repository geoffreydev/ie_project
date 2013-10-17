<ht> View All Posts </ht>

<table>
	<tr>
		<th>Title</th>
		<th>Body</th>
		<th>Actions</th>
	</tr>
	<?php 
	foreach($posts as $post) {
	?>
	<tr>
		<td>
			<?php  
			echo $this->Html->link($post['Post']['title'], array('action'=>'view', $post['Post']['id']));
			?>
		</td>
		<td>
			<?php echo $post['Post']['body']; ?>
		</td>
		<td>
		<?php echo $this->Html->link('Edit', array('action'=>'edit', $post['Post']['id'])); ?>
		 <?php echo $this->Html->link('Delete', array('action'=>'delete', $post['Post']['id']), NULL, 'Are you sure you want to delete this post?') ?>
		</td>
	</tr>
	<?php 
	} 
	?>
</table>
<br>
<center><p><?php echo $this->Html->link('Add a post', array('action'=>'add')); ?></p></center>