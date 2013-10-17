<?php /*
  * <title>Canine Clip Joint</title>

<?php $this->layout = 'default'; ?>
<?php echo $this->Html->css('style');?>

<table id="greytable">
    <tr>
        <th ><span class="col1">Username</span> </th>
        <th><span class="col1">Name</span></th>
        <th><span class="col1">Mobile</span></th>

        <th><span class="col1">Email</span></th>
    </tr>

    <tr>
        <td span class="col2"><?php echo $count. " Result(s) Found";?></span></td>
    </tr>
    <?php
    foreach($users as $user){
        ?>
        <tr>

            <td><?php echo $user['User']['username']; ?></td>
            <td><?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?></td>
            <td><?php echo $user['User']['mobile_phone']; ?></td>

            <td><?php echo $user['User']['email']; ?></td>
            <td><?php echo $this->Html->image('../img/images/view.png', array ('url' => array("controller"=>"users","action"=>"view", $user['User']['id']))); ?>
                <?php echo $this->Html->image('../img/images/edit.png', array ('url' => array("controller"=>"users","action"=>"edit", $user['User']['id']))); ?>
                <?php
                $urlDel = array("controller"=>"users", "action"=>"delete",$user['User']['id'],$user['User']['username']);
                echo $this->Html->image('../img/images/delete.png',array('onclick' => "if(confirm('Are you sure you want to delete this Booking?')) location.href='".$this->Html->url($urlDel)."'")); ?></td>
        </tr>
    <?php }
    ?>
</table>
*/?>