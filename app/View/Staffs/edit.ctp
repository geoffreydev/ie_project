<?php $this->layout = 'default'; ?>
<div class="umtop">
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Edit Staff Member'); ?></span>
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
<div id="new_event">
    <div id="editform">
        <?php
        echo $this->Form->create('User');
        ?>
        <table id=greytable width = "50%" >
            <tr>
            <tr>
                <th style="text-align: right;"><div class="umstyle3"><?php echo __('First Name: ');?><font color='red'>*</font></div></th>
                <td>
                    <?php
                    echo $this->Form->input('first_name', array('type'=>'text','style'=>'width:300px', 'label' =>      ''));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;"><div class="umstyle3"><?php echo __('Last Name: ');?><font color='red'>*</font></div></th>
                <td>
                    <?php
                    echo $this->Form->input('last_name', array('type'=>'text','style'=>'width:300px', 'label' =>      ''));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;"><div class="umstyle3"><?php echo __('Email: ');?></div></th>
                <td>
                    <?php
                    echo $this->Form->input('email', array('type'=>'text','style'=>'width:300px', 'label' =>      ''));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;"><div class="umstyle3"><?php echo __('Mobile: ');?></div></th>
                <td>
                    <?php
                    echo $this->Form->input('mobile_phone', array('type'=>'text','style'=>'width:95px', 'label' =>'', 'maxlength' => 10));
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="event-submit">

        <table width ="60%">
            <tr>
                <td class="button">
                    <?php echo $this->Form->submit(__('Save Changes', true), array('name' => 'Save', 'div' => false)); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
        </div>
    </div>
</div>
