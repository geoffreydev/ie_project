<?php $this->layout = 'default'; ?>
<div class="umtop">
    <?php // echo $this->Session->flash(); ?>
    <?php //echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('SMS Templates'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Site Management",true),"/manages") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
<div id = "add_dog">

    <div id="dogForm">
        <?php echo $this->Form->create('Sms');?>

        <table id="greytable" style="width: 100%">
            <tr style="text-align: left;">
                <th >Purpose </th>
                <th>Message</th>
                <th>Action</th>
            </tr>

            <?php
            $num=2;
            $col=2;
            foreach($smss as $sms){

            if ($num % 2 != 0)
            {
                $trtype='tr_alt';
            } else {
                $trtype='tr_std';
            }
            ?>
                <tr class="<?php echo $trtype;?>">
                    <td><?php echo $sms['Sms']['purpose']; ?></td>
                    <td><?php echo urldecode($sms['Sms']['message']); ?></td>
                    <td><?php echo $this->Html->link("Edit",array('controller'=>'/smss','action'=>'edit', $sms['Sms']['id']),array('class' => 'buttoned'));?></td>
            <?php
                    $num++;
                    }
            ?>
            </tr>
        </table>
    </div>
</div>
        </div>
    </div></div>
