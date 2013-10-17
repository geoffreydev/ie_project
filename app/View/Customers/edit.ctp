<?php $this->layout = 'default'; ?>
<div class="umtop">
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Edit Customer'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Customers",true),"/customers") ?></span>
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
                <th style="text-align: right;">Firstname:</th>
                <td>
                    <?php
                    echo $this->Form->input('first_name', array('type'=>'text','style'=>'width:300px', 'label' =>      ''));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;">Surname:</th>
                <td>
                    <?php
                    echo $this->Form->input('last_name', array('type'=>'text','style'=>'width:300px', 'label' =>      ''));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;">Email:</th>
                <td>
                    <?php
                    echo $this->Form->input('email', array('type'=>'text','style'=>'width:300px', 'label' =>      ''));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;">Mobile Number:</th>
                <td>
                    <?php
                    echo $this->Form->input('mobile_phone', array('type'=>'text','style'=>'width:95px', 'label' =>'', 'maxlength' => 10));
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align: right;">Home Number:</th>
                <td>
                    <?php
                    echo $this->Form->input('landline_phone', array('type'=>'text','style'=>'width:95px', 'label' =>'', 'maxlength' => 10));
                    ?>
                </td>
            </tr>

            <tr>
                <th style="text-align: right;">Work Number:</th>
                <td>
                    <?php
                    echo $this->Form->input('work_phone', array('type'=>'text','style'=>'width:95px', 'label' =>'', 'maxlength' => 10));
                    ?>
                </td>
            </tr>

            <tr>
                <th style="text-align: right;">Secret Comments:</th>
                <td>
                    <?php
                    echo $this->Form->input('secret_comment', array('type'=>'textarea','style'=>'width:400px', 'label' =>''));
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
