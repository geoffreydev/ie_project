<?php $this->layout = 'default'; ?>
<div class="umtop">
    <?php //echo $this->Session->flash(); ?>
    <?php //echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Update SMS Template'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("SMSes",true),"/smss") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>

<div id = "add_dog">
    <div id="dogForm">
        <?php echo $this->Form->create('Sms');?>

        <table id="greytable" width="100%" >

            <?php
            echo $this->Form->input('id', array('type'=>'hidden'));
            ?>
            <tr>
                <th width="100px"> Message: </th>
                <td>
                    <?php
                    echo $this->Form->input('message',array('type'=>'text','style'=>'width:600px','label' => '', 'maxlength'=>'160'));
                    ?>
                </td>

                <td>
                    <?php echo $this->Form->end('Update'); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
        </div>
    </div>    </div>
