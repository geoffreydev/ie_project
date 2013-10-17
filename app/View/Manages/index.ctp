<title>Canine Clip Joint</title>

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>


<?php $this->layout = 'default'; $options= array("username","phone", "email");?>

<div class="umtop">
    <?php //echo $this->Session->flash(); ?>
    <?php //echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Site Management'); ?></span>
                <span class="umstyle2" style="float:right"><?php
                    //echo $this->Html->link(__("Some link here",true),"/");?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>

            <div id=adminhome>
    <div id="icons" >
        <table width="200" id="icon">
            <tr>
                <td width="25" align="center">
                    <?php echo $this->Html->image('images/smstemplates.png', array('alt' => 'Administration Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/smstemplates_hover.png"', 'onmouseout' => 'this.src="img/images/smstemplates.png"', 'url' => array('controller' => 'smss', 'action' => ''))); ?>
                </td>
                <td width="25px" align="center">
                    <?php //echo $this->Html->image('images/emailtemplates.png', array('alt' => 'Customers Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/emailtemplates_hover.png"', 'onmouseout' => 'this.src="img/images/emailtemplates.png"', 'url' => array('controller' => 'mails', 'action' => ''))); ?>
                </td>

                <td width="25px" align="center">
                    <?php echo $this->Html->image('images/doc.png', array('alt' => 'Pages Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/doc_hover.png"', 'onmouseout' => 'this.src="img/images/doc.png"', 'url' => array('controller' => 'pagecontents', 'action' => ''))); ?>
                </td>
            </tr>
            <tr>
                <td width="25" align="center">
                    <?php echo $this->Html->image('images/calendarpic.png', array('alt' => 'Administration Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/calendarpic_hover.png"', 'onmouseout' => 'this.src="img/images/calendarpic.png"', 'url' => array('controller' => 'blockdates', 'action' => ''))); ?>
                </td>
                <td width="25px" align="center">
                    <?php //echo $this->Html->image('images/emailtemplates.png', array('alt' => 'Customers Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/emailtemplates_hover.png"', 'onmouseout' => 'this.src="img/images/emailtemplates.png"', 'url' => array('controller' => 'mails', 'action' => ''))); ?>
                </td>

                <td width="25px" align="center">
                    <?php //echo $this->Html->image('images/staff.png', array('alt' => 'Pages Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/staff_hover.png"', 'onmouseout' => 'this.src="img/images/staff.png"', 'url' => array('controller' => 'pagecontents', 'action' => ''))); ?>
                </td>
            </tr>

        </table>
    </div>
            </div>    </div>
    </div></div>