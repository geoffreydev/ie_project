<?php $this->layout = 'default';?>
<div class="umtop">
    <?php //echo $this->Session->flash(); ?>
    <?php //echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Add Dog'); ?></span>
                <span class="umstyle2" style="float:right"><?php
                    if ($this->Session->read('UserAuth.User.user_group_id') == 1){
                        echo $this->Html->link(__("Back to customer",true),"/customers/view/".$this->params['url']['custID']);
                    } else {
                        echo $this->Html->link(__("Back to profile",true),"/accounts");
                    }
                    ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
<div id = "add_dog">


<div id="dogForm">
<?php echo $this->Form->create('Dog');?>

<table id="greytable" width="50%" >

<?php 
	echo $this->Form->input('id', array('type'=>'hidden'));
	echo $this->Form->input('dog_userid', array('type'=>'hidden'));
?>
<tr>
<th width="250px" style="text-align: right;"> Name: </th>
<td>
<?php echo $this->Form->input('name',array('type'=>'text','style'=>'width:300px','label' => '', 'maxlength' => '12')); ?>
</td>
</tr>
<tr>
<th width="250px" style="text-align: right;">  Breed: </th>
<td>
<?php echo $this->Form->input('breed',array('type'=>'text','style'=>'width:300px','label' => '', 'maxlength' => '20')); ?>
</td>
</tr>
<tr>
<th width="250px" style="text-align: right;"> Approx. Weight: </th>
<td>
<?php echo $this->Form->input('weight',array('type'=>'text','style'=>'width:300px','label' => '', 'maxlength' => '2')); ?>
</td>
    <td width="250px">
        Kg
    </td>
</tr>
<tr>
<th width="250px" style="text-align: right;"> Sex: </th>
<td>
<?php $options = array(
    'Male' => 'Male',
    'Female' => 'Female'
);

$attributes = array(
    'legend' => false,
   'value' => 'Male'
);
echo $this->Form->radio('sex', $options, $attributes,array('style'=>'width:300px','label' => ''));
?>
</td>
</tr>
<tr>
<th width="250px" style="text-align: right;"> Approx. Age: </th>
<td>
<?php
    $hourArray = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');
    $measureArray = array('Weeks'=>'Weeks','Months'=>'Months','Years'=>'Years');
    echo $this->Form->input('age', array('type'=>'select','options'=>$hourArray,'style'=>'width:auto;float:left;','label' => ''));
    echo $this->Form->input('age_measure', array('type'=>'select','options'=>$measureArray,'style'=>'width:auto;float:left;','label' => ''));
    ?>
</td>
</tr>
    <tr>
        <th width="250px" style="text-align: right;"> Comments: </th>
        <td>
            <?php echo $this->Form->input('comment',array('type'=>'textarea', 'style'=>'width:300px; height:150px;','label' => '')); ?>
        </td>
        <td width="250px">
            - Special shampoos?</br><br>
            - Any persistent injuries?
        </td>
    </tr>
</table>

</div>

    <div id="event-submit">
        <table id=greytable width = "50%" >
            <TR>
                <TD>
                    <?php
                    echo $this->Form->end('Save');
                    ?>
                </TD>
            </TR>
        </TABLE>
    </div>
</div>    </div>
    </div>    </div>
</div>