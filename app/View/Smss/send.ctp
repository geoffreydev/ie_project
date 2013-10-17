<?php /*
$this->layout = 'default';?>

<div id = "add_dog">
    <h2 style = "text-align:center"> Send Sms </h2>

    <div id="dogForm">
        <?php echo $this->Form->create('Sms');?>

        <table id="greytable" width="100%" >

            <?php
            echo $this->Form->input('id', array('type'=>'hidden'));
            ?>
            <tr>


             <td>Sending message to:
                    61<?php echo substr($user['User']['mobile_phone'], 1); ?>
                    <?php echo $this->Form->end('Send'); ?>
                </td>
            </tr>
        </table>
    </div>
*/ ?>