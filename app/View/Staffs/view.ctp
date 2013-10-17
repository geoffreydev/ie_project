 <?php $this->layout = 'default';?>
<div class="umtop">
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Staff Member Details'); ?></span>
				<span class="umstyle2" style="float:right"><?php
                    if ($this->Session->read('UserAuth.User.user_group_id') != 4){
                        echo $this->Html->link(__("Back to staff context",true),"/admins/");
                    } else {
                        echo $this->Html->link(__("Back to list of staff members",true),"/staffs");
                    }
                    ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="index">
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <tbody>
                    <?php       if (!empty($user)) { ?>

                        <tr>
                            <td><strong><?php echo __('Username');?></strong></td>
                            <td><?php echo h($user['User']['username'])?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Name');?></strong></td>
                            <td><?php echo h($user['User']['first_name'])?> <?php echo h($user['User']['last_name'])?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Email');?></strong></td>
                            <td><?php echo h($user['User']['email'])?></td>
                        <tr>
                            <td><strong><?php echo __('Mobile Phone');?></strong></td>
                            <td><?php echo h($user['User']['mobile_phone'])?></td>
                        </tr>
                    <?php   } else {
                        echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="um_box_mid_content_mid" id="index">
                <hr />
                <span class="umstyle1"><?php echo __('Actions'); ?></span>
                <br><br>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <td>
                        <?php echo $this->Html->link('Edit Staff Member', array("controller"=>"staffs","action"=>"edit", $user['User']['id']),array('class' => 'buttoned')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $this->Html->link(
                            'Delete Staff Member',
                            array('controller' => 'staffs', 'action' => 'delete', $user['User']['id']),
                            array('class' => 'buttoned'),
                            "Are you sure you wish to delete this staff member?" ); ?></td>
                </table>
            </div>

        </div>
    </div>
    <div class="um_box_down"></div>
</div>