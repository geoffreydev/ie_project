
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Add Staff Member'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("All Staff Members",true),"/staffs") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid" id="register">
                <div class="um_box_mid_content_mid_left">
                    <?php echo $this->Form->create('Staff', array('action' => 'add')); ?>
                    <div>
                        <div class="umstyle3"><?php echo __('First Name');?><font color='red'>*</font></div>
                        <div class="umstyle4" ><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
                        <div style="clear:both"></div>
                    </div>
                    <div>
                        <div class="umstyle3"><?php echo __('Last Name');?><font color='red'>*</font></div>
                        <div class="umstyle4" ><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
                        <div style="clear:both"></div>
                    </div>
                    <div>
                        <div class="umstyle3"><?php echo __('Mobile');?><font color='red'>*</font></div>
                        <div class="umstyle4" ><?php echo $this->Form->input("mobile_phone" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
                        <div style="clear:both"></div>
                    </div>
                    <div>
                        <div class="umstyle3"><?php echo __('Email');?></div>
                        <div class="umstyle4" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
                        <div style="clear:both"></div>
                    </div>

                    <div>
                        <div class="umstyle3"></div>
                        <div class="umstyle4"><?php echo $this->Form->Submit(__('Add Staff Member'));?></div>
                        <div style="clear:both"></div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
                <div class="um_box_mid_content_mid_right" align="right"></div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <div class="um_box_down"></div>
</div>