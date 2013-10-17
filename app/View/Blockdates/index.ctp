		<?php $this->layout = 'default'; ?>
		<?php echo $this->Html->css('calendar.css'); ?>
		<?php echo $this->Html->script('jquery-1.9.1.js'); ?>
		<?php echo $this->Html->script('jquery-ui.js'); ?>
		<?php echo $this->Html->css('jquery-ui.css'); ?>

		  <?php 
		  
  include ('php/connect.php');
  $sql="SELECT * FROM blockdates";
  $result=mysql_query($sql) or die(mysql_error());
		?>
 
  
 <script >
 $(function() { 
	
var unavailableDates = [
<?php while ($row = mysql_fetch_array($result)) 
  { 
  echo '"'; 
  echo $row['dates'];
  echo '",'; 
  }
?>
];

function unavailable(date) {
<?php /*dmy = ("0"+date.getDate()).slice(-2) + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + date.getFullYear();*/?>
    dmy = date.getFullYear() + "-" + ("0"+(date.getMonth()+1)).slice(-2) + "-" + ("0"+date.getDate()).slice(-2);

  if ($.inArray(dmy, unavailableDates) < 0) {
    return [true,"","Book Now"];
  } else {
    return [false,"","Booked Out"];
  }
}

function noWeekendsOrHolidays(date) {
	var noWeekend = jQuery.datepicker.noWeekends(date);
	return noWeekend[0] ? unavailable(date) : noWeekend;
}
		 
		 $("#date1").datepicker({
		minDate:"+2d",
		maxDate: "+12m",
		dateFormat: 'dd/mm/yy',
		constrainInput: true,
		showOn: "button", 
		buttonImage: "<?php echo $this->webroot.IMAGES_URL; ?>images/calendar-icon.png", 
		buttonImageOnly: true, 
		buttonText: 'Show', 
		changeMonth: true, 
		changeYear:true,
        beforeShowDay:noWeekendsOrHolidays

		 });
		 
		 $( "#from" ).datepicker({
		defaultDate: "+1w",
		showOn: "button", 
		buttonImage: "<?php echo $this->webroot.IMAGES_URL; ?>images/calendar-icon.png", 
		buttonImageOnly: true, 
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
	  	dateFormat: 'dd/mm/yy',
		buttonImageOnly: true, 
		showOn: "button", 
		buttonImage: "<?php echo $this->webroot.IMAGES_URL; ?>images/calendar-icon.png", 
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
		 
});
  </script>
    <div class="umtop">
            <div class="um_box_up"></div>
            <div class="um_box_mid">
                <div class="um_box_mid_content">
                    <div class="um_box_mid_content_top">
                        <span class="umstyle1"><?php echo __('Date Blocking System'); ?></span>
                        <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Site Management",true),"/manages") ?></span>
                        <div style="clear:both"></div>
                    </div>
                    <div class="umhr"></div>
<div id=new_event>
    <div id="editform">
        <?php
        echo $this->Form->create('Blockdate',array('enctype' => 'multipart/form-data')); 
		?>
        <table id=greytable width = "30%" >
       	
      
      
       
        <tr>
        <th width = "200px">View Blocked Dates:</th>
        <td>
		 <?php
		 echo $this->Form->input('date1',array('type'=>'hidden','id'=>'date1','label'=>'','readonly'=>''));
		?>
		 
        </td>
            <td>
                <br>
            </td>
            <br>
            <td>
                <br><br><br><br><br><br>
            </td>
        </tr>
		
		<tr>
        <th width = "200px">Block these dates:</th>
        <td>

		 <label for="from">From</label>
		 <?php
		 echo $this->Form->input('from',array('type'=>'text','id'=>'from','label'=>'','readonly'=>''));?>
		 <label for="to">to</label>
		 <?php echo $this->Form->input('to',array('type'=>'text','id'=>'to','label'=>'','readonly'=>''));
		?>
		
		  <?php
        echo $this->Form->input('id', array('type'=>'hidden'));  
        echo $this->Form->input('event_userid',array('type'=>'hidden')); 
		?>
		 
        </td>
        </tr>
        </table>

		
    </div>

        <div id="event-submit">
               <table id=greytable width = "50%"  >
        <TR>
        <TD>
                  <?php echo $this->Form->submit(__('Save', true), array('name' => 'Save', 'div' => false)); ?>

        </TD>
		

        </TR>
        </TABLE>
        </div>
</div>        </div>
            </div>
</div>