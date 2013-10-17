<?php $this->layout = 'default';?>

<div id = "add_dog">
    <h2 style = "text-align:center"> Edit Dog </h2>

    <div id="dogForm">
        <?php echo $this->Form->create('Dog');?>

        <table id="greytable" width="50%" >

            <?php
            echo $this->Form->input('id', array('type'=>'hidden'));
            echo $this->Form->input('dog_userid', array('type'=>'hidden'));
            ?>
            <tr>
                <th width="250px"> Name: </th>
                <td>
                    <?php echo $this->Form->input('name',array('type'=>'text','style'=>'width:300px','label' => '', 'readonly'=>'readonly')); ?>
                </td>
            </tr>
            <tr>
                <th width="250px"> Breed: </th>
                <td>
                    <?php echo $this->Form->input('breed',array('type'=>'text','style'=>'width:300px','label' => '', 'readonly'=>'readonly')); ?>
                </td>
            </tr>
            <tr>
                <th width="250px"> Weight: </th>
                <td>
                    <?php echo $this->Form->input('weight',array('type'=>'text','style'=>'width:300px','label' => '', 'readonly'=>'readonly')); ?>
                </td>
            </tr>
            <tr>
                <th width="250px"> Sex: </th>
                <td>
                    <?php echo $this->Form->input('sex',array('type'=>'text','style'=>'width:300px','label' => '', 'readonly'=>'readonly')); ?>
                </td>
            </tr>
            <tr>
                <th width="250px"> Age: </th>
                <td>
                    <?php
                    echo $this->Form->input('dob',array('type'=>'text','label' => '', 'readonly'=>'readonly'));
                    ?>
                </td>
            </tr>

        </table>
    </div>
