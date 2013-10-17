<?php $this->layout = 'default';?>

<div id = "add_dog">
    <h2 style = "text-align:center"> Send Email </h2>

    <div id="dogForm">
        <?php echo $this->Form->create('Mail');?>

        <table id="greytable" width="100%" >

            <?php
            echo $this->Form->input('id', array('type'=>'hidden'));
            ?>
            <tr>
                <th width="100px"> Message: </th>
                <td>
                    <?php
                    //echo $this->Form->input('message',array('type'=>'text','style'=>'width:300px','label' => ''));
                    echo urldecode($this->request->data['Mail']['message']);
                    ?>
                </td>

                <td>
                    <?php echo $this->Form->end('Send'); ?>
                </td>
            </tr>
        </table>
    </div>
