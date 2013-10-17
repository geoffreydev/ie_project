		<?php $this->layout = 'default'; ?>
 <div id="events">
 <h3 style="text-align:center">Bookings Menu</h3>

		<div id=bookingtop>
        <?php echo $this->Html->image('../img/images/all_bookings.png', array('alt' => 'All Bookings Button', 'class' => 'adminimages', 'onmouseover' =>'this.src="../img/images/all_hover.png"', 'onmouseout' => 'this.src="../img/images/all_bookings.png"', 'url' => array('controller' => 'events', 'action' => 'viewall/0'))); ?>
        <?php echo $this->Html->image('../img/images/pending_booking.png', array('alt' => 'Pending Bookings Button', 'class' => 'adminimages', 'onmouseover' =>'this.src="../img/images/pending_hover.png"', 'onmouseout' => 'this.src="../img/images/pending_booking.png"', 'url' => array('controller' => 'events', 'action' => 'viewall/1'))); ?>
        </div>
        <div id=bookingbottom>
        <?php echo $this->Html->image('../img/images/confirm_bookings.png', array('alt' => 'Confirmed Bookings Button', 'class' => 'adminimages', 'onmouseover' =>'this.src="../img/images/confirm_hover.png"', 'onmouseout' => 'this.src="../img/images/confirm_bookings.png"', 'url' => array('controller' => 'events', 'action' => 'viewall/2'))); ?>
        <?php echo $this->Html->image('../img/images/decline_booking.png', array('alt' => 'Declined Bookings Button', 'class' => 'adminimages', 'onmouseover' =>'this.src="../img/images/decline_hover.png"', 'onmouseout' => 'this.src="../img/images/decline_booking.png"', 'url' => array('controller' => 'events', 'action' => 'viewall/3'))); ?>    
        </div>
 </div>