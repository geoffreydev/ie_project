 <title>Canine Clip Joint</title>

    <?php $this->layout = 'default'; ?>
    <?php echo $this->Html->script('cfcoda.js'); ?>
 <?php echo $this->Html->css(array('tab.small.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1px) and (max-width: 851px)'));?>
 <?php echo $this->Html->css(array('tab.medium.css'), 'stylesheet', array('media' => 'only screen and (min-width: 852px) and (max-width: 1260px)'));?>
 <?php echo $this->Html->css(array('tab.square.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1261px) and (max-width: 1290px)'));?>
 <?php echo $this->Html->css(array('tab.medium.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1291px) and (max-width: 1500px)'));?>
 <?php echo $this->Html->css(array('tab.large.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1501px) and (max-width: 4000px)'));?>

<div id="accounts">
<div id="toolbarwrap">
	<h2 style="text-align:center">My Account</h2>
	
 <ul id="toolbar" class="navigation">
  <li id="home-tab"><a href="#home-pane" onclick="javascript:ScrollSection('home-pane', 'scroller', 'home-pane'); return false">My Details</a></li>
    <li id="booking-tab"><a href="#booking-pane" onclick="javascript:ScrollSection('booking-pane', 'scroller', 'home-pane'); return false">My Bookings</a></li>
    <li id="dog-tab"><a href="#dog-pane" onclick="javascript:ScrollSection('dog-pane', 'scroller', 'home-pane'); return false">Dogs</a></li>
  </ul>


	
</div>
	<div id="frame">
		<div id="scroller">
			<div id="content">
            <br>
			      <div class="section" id="home-pane"> 
					<div class="account-submenu"> 
					<a><?php //echo $this->Html->link("Edit",array('controller'=>'accounts','action'=>'edit'));
                        echo $this->Html->link('Edit Profile',
                            array('plugin' => null, 'controller' => 'accounts', 'action' => 'edit')
                            ,array('class' => 'buttoned', 'escape'=>false));
                        ?>

                    </a>
					<a><?php
                        //echo $this->Html->link("Change Password",array('plugin' => null, 'controller' => 'changePassword', 'action' => ''));
                        echo $this->Html->link('Change  Password',
                            array('plugin' => null, 'controller' => 'changePassword', 'action' => '')
                            ,array('class' => 'buttoned', 'escape'=>false));
                        ?></a>
					</div>
                      <br>
				<table id="greytable" width="50%">

                    <tr>
                        <th width="120px" style="text-align:right;"> Username: </th>
                        <td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $user['User']['username']; ?></td>
                    </tr>
					<tr>
					 <th width="160px" style="text-align:right;"> Name: </th>
					  <td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $user['User']['first_name']."  
					  ".$user['User']['last_name']; ?></td> 
					</tr>

					<tr>
					<th width="120px" style="text-align:right;"> Mobile Phone: </th>
					  <td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $user['User']['mobile_phone']; ?></td> 
					</tr>
                    <tr>
                        <th width="120px" style="text-align:right;"> Home Phone: </th>
                        <td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $user['User']['landline_phone']; ?></td>
                    </tr>
                    <tr>
					<th width="120px" style="text-align:right;"> Email: </th>
					  <td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $user['User']['email'];?></td> 
					</tr> 
					</table>
					
			
				</div>

	      <div class="section" id="booking-pane"> 
	
			<div class="event-submenu">
			<?php
                if (empty($dogs)) {
                    echo "Dogs must be added before bookings.";
                }else {
                    //echo this->Html->link("Create New Booking",array("controller"=>"events","action"=>"newevent"));
                    echo $this->Html->link('Create New Booking',
                        array("controller"=>"events","action"=>"newevent")
                        ,array('class' => 'buttoned', 'escape'=>false));
                }
                ?>

         	</div>
              <?php
              if (empty($events)) {
                  echo "<br>";
                  echo "No Bookings";
              } else {
              ?>
              <br>
         	<table id="greytable" >
         	<tr style="padding-right: 20px;padding-bottom: 20px;text-align: left;">
         	<th>Status: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th>Service:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th>Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th>Time:&nbsp;&nbsp;&nbsp;</th>
                <!--<th>Comments:</th>-->
            <th>Actions:</th>
         	</tr>
                <?php
                }
                ?>
		 	<?php
		 		foreach($events as $event){
		 	?>
			 <tr style="padding-right: 10px;padding-bottom: 10px;text-align: left;">
             <td><?php
			 if($event['Event']['proplanning'] == 0)
			 {
				 echo 'Not Specified';
			 }
			 elseif($event['Event']['proplanning'] == 1)
			 {
				 echo 'Pending';
			 }
			 elseif($event['Event']['proplanning'] ==2)
			 {
				 echo 'Accepted';
			 }
			 elseif($event['Event']['proplanning'] ==3)
			 {
				 echo 'Declined';
			 }
			 elseif($event['Event']['proplanning'] ==4)
			 {
				 echo 'Cancelled';
			 }
			 else
			 {
				 echo 'No Professional Planning';
			 }
			 ?></td>
             <td><?php echo $this->Html->link($event['Event']['event_theme'],array("controller"=>"events","action"=>"view", $event['Event']['id'])); ?></td>
             <td><?php echo $event['Event']['date']; ?></td>
             <td><?php
                 //echo substr( $event['Event']['start'], 0, 5);
                 echo $event['Event']['hour'];
                 ?>:<?php
                 //echo substr( $event['Event']['start'], 0, 5);
                 echo $event['Event']['minute'];
                 ?>
             </td><!--
             <td><?php
                 echo substr( $event['Event']['event_comment'], 0, 25);
                 ?>...</td>-->
             <td><?php // echo $this->Html->image('images/view.png', array ('url' => array("controller"=>"events","action"=>"view", $event['Event']['id']))); ?>

             <?php
			 //$urlDel = array("controller"=>"events", "action"=>"delete",$event['Event']['id'],$event['Event']['event_theme']);
			 //echo $this->Html->image('images/delete.png',array('onclick' => "if(confirm('Are you sure you want to delete this Booking?')) location.href='".$this->Html->url($urlDel)."'"));
             //    echo $this->Html->link('Cancel Booking', array("controller"=>"events","action"=>"delete", $event['Event']['id']),array('class' => 'buttoned'));
                 echo $this->Html->link(
                     'Cancel Booking',
                     array('controller' => 'events', 'action' => 'delete', $event['Event']['id']),
                     array('class' => 'buttoned'),
                     "Are you sure you wish to cancel the booking on ".$event['Event']['date']."?" );
                 ?>
                 <?php //echo $this->Html->image('images/edit.png', array ('url' => array("controller"=>"events","action"=>"edit", $event['Event']['id'])));
                 if($event['Event']['proplanning'] == 1)
                 {
                     echo $this->Html->link('Update Booking', array("controller"=>"events","action"=>"edit", $event['Event']['id']),array('class' => 'buttoned'));
                 }
                 ?>
             </td>
             </tr>
		 <?php }
		 ?>
         </table>
			
			
		
	</div>
	
	 <div class="section" id="dayCare-pane"> This feature will be available in a later build. <br />
        <br />
        <br />
        <br />
        <br />
        <br />
         <br />
         <br />
         <br />
         <br />
         <br />
         <br />
         <br />
         <br />
         <br />
         <br />
        <?php //&laquo; <a href="javascript:ScrollArrow('left','toolbar','scroller','home-pane');">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:ScrollArrow('right','toolbar','scroller','home-pane');">Next</a> &raquo; <br />?>
      </div>

      <div class="section" id="dog-pane">
          <div class="account-submenu">
              <a><?php
                  //echo $this->Html->link("Add New Dog",array('controller'=>'/dogs/','action'=>'add_dog'));
                  echo $this->Html->link('Add New Dog',
                      array("controller"=>"dogs","action"=>"add_dog")
                      ,array('class' => 'buttoned', 'escape'=>false));
                  ?></a>
	      </div>
          <br>
          <?php
          if (empty($dogs)) {
              echo "No dogs added yet.";
          } else {
          ?>
          <table id="greytable" style="text-align: left">
         	<tr>
         	<th >Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th> Breed &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th> Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th> Sex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         	<th> Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <!--<th> Comments </th>-->
            <th>Actions:</th>
         	</tr>
              <?php
              }
              ?>
		 	<?php
		 		foreach($dogs as $dog){
		 	?>
			 <tr>
             
             <td><?php
                 echo $dog['Dog']['name'];
                 //echo $this->Html->link($dog['Dog']['name'],array("controller"=>"dogs","action"=>"edit", $dog['Dog']['id']));
                 ?>&nbsp;&nbsp;</td>
             <td><?php echo $dog['Dog']['breed']; ?></td>
             <td><?php echo $dog['Dog']['weight']; ?></td>
             <td><?php echo $dog['Dog']['sex']; ?></td>
			 <td><?php echo $dog['Dog']['age'].' '.$dog['Dog']['age_measure']; ?></td>
             <!--<td><?php echo htmlentities(substr($dog['Dog']['comment'], 0, 25));?>...</td>-->
			 <td><?php
                 //echo $this->Html->image('images/edit.png', array ('url' => array("controller"=>"dogs","action"=>"edit", $dog['Dog']['id'])));
                 echo $this->Html->link('View/Edit Dog', array("controller"=>"dogs","action"=>"edit", $dog['Dog']['id']),array('class' => 'buttoned'));
                 ?>&nbsp;&nbsp;
             <?php
             echo $this->Html->link(
                 'Remove Dog',
                 array('controller' => 'dogs', 'action' => 'delete', $dog['Dog']['id']),
                 array('class' => 'buttoned'),
                 "Are you sure you wish to remove ".$dog['Dog']['name']."?" );
                 ?></td>
             </tr>
		 <?php }
		 ?>
         </table>
					
			
				</div>
        </div>

      
	
	</div>	
</div>
</div>

</div>

