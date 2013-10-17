		<?php $this->layout = 'default'; ?>
        <?php echo $this->Html->script('mootools.js'); ?>
        <?php echo $this->Html->script('calendar.js'); ?>
        <?php echo $this->Html->css('calendar.css'); ?>


<div id=new_event>
		<h2 style="text-align:center">View Booking</h2>
    <div id="editform">
        <?php
        echo $this->Form->create('Event'); 
		?>
        <table id=greytable width = "50%" >
       	
        <tr>
        <th width = "200px">Service:</th>
        <td>
        <?php
		echo $this->Form->input('event_theme', array('type'=>'text','style'=>'width:300px', 'label' =>'', 'readonly'=>'readonly'));
		?>
        </td>
        </tr>
        <tr>
            <th width = "200px">Date Of Booking:</th>
            <td>
                <?php echo $this->Form->input('date',array('type'=>'hidden','value'=>'readValue()','class'=>'calendar')); ?>
                <?php
                echo $this->Form->input('date', array('type'=>'text','label' =>'','id'=>'date','readonly'=>'readonly'));
                ?>
            </td>
        </tr>
        <tr>
        <th width = "200px">Drop Off Time:</th>
        <td>
        <?php
            echo $this->Form->input('start', array('type'=>'text','label' =>'', 'readonly'=>'readonly'));
            //substr( $event['Event']['start'], 0, 5);
		?>
        </td>
        </tr>
        <tr>
        <th width = "200px">Comments:</th>
        <td>
        <?php
		echo $this->Form->input('event_comment', array('type'=>'textarea', 'style'=>'width:300px', 'label' => '', 'readonly'=>'readonly'));
		?>
        </td>
        </tr>
        </table>

    </div>

</div>
