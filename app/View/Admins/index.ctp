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
                 <span class="umstyle1"><?php echo __('Staff Context'); ?></span>
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
        <?php //echo $this->Html->image('images/administration.png', array('alt' => 'Administration Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/administration_hover.png"', 'onmouseout' => 'this.src="img/images/administration.png"', 'url' => array('controller' => 'manages', 'action' => ''))); ?>
        </td>
        <td width="25px" align="center">
        <?php echo $this->Html->image('images/customers.png', array('alt' => 'Customers Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/customers_hover.png"', 'onmouseout' => 'this.src="img/images/customers.png"', 'url' => array('controller' => 'customers', 'action' => ''))); ?>
        </td>
        <td width="25px" align="center">
        <?php echo $this->Html->image('images/staff.png', array('alt' => 'Staff Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/staff_hover.png"', 'onmouseout' => 'this.src="img/images/staff.png"', 'url' => array('controller' => 'staffs', 'action' => 'edit', $this->Session->read('UserAuth.User.id')))); ?>
        </td>
        </tr>
        <tr>
        <td width="25px" align="center">
        <?php //echo $this->Html->image('images/reports.png', array('alt' => 'Report Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/reports_hover.png"', 'onmouseout' => 'this.src="img/images/reports.png"', 'url' => array('controller' => 'reports', 'action' => 'index'))); ?>
        </td>
        <td width="25px" align="center">
        <?php echo $this->Html->image('images/manage.png', array('alt' => 'Manage Sites Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/manage_hover.png"', 'onmouseout' => 'this.src="img/images/manage.png"', 'url' => array('controller' => 'manages', 'action' => 'index'))); ?>
        </td>
        <td width="115px" align="center">
        <?php echo $this->Html->image('images/booking.png', array('alt' => 'Bookings Home Button', 'class' => 'adminicons', 'onmouseover' =>'this.src="img/images/booking_hover.png"', 'onmouseout' => 'this.src="img/images/booking.png"', 'url' => array('controller' => 'events', 'action' => 'viewall', 0))); ?>
        </td>
        </tr>
        
        </table>
        </div>
</div>        </div>
     </div></div>