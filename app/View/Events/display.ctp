<?php $this->layout = 'default'; ?>
<?php echo $this->Html->script('sortable.js');?>
<?php echo $this->Html->css('calendar.css'); ?>
		<?php echo $this->Html->script('jquery-1.9.1.js'); ?>
		<?php echo $this->Html->script('jquery-ui.js'); ?>
		<?php echo $this->Html->css('jquery-ui.css'); ?>
<?php
function toMoney($val,$symbol='$',$r=2)
{

    if( !defined( "length" )){
        define('length', 'length');
    }
    $n = $val;
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r);
    $j = (($j = $i.length) > 3) ? $j % 3 : 0;

    return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}

?>
<?php
//debug($dogs);
		 if (isset($_GET['Save'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
    var_dump($from);
	var_dump($to);
  }  
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
dmy = ("0"+date.getDate()).slice(-2) + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + date.getFullYear();

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

<script type="text/javascript">
    $(document).ready(function(){
        $(".hide2").click(function(){
            $(this).siblings("div").hide();
        });
        $(".show2").click(function(){
            $(this).siblings("div").show();
        });
    });

</script>
  
    <div class="umtop">

        <?php echo $this->Element('eventdash'); ?>
    <?php echo $this->Session->flash(); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
		<div id=new_event>
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php
                        echo __('All Bookings between  '.$from.'  and '.$to);
                    ?>
                    </span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("",true),"/customers/add") ?></span>
                <div style="clear:both"></div>
            </div>

            <div class="umhr"></div>
        <div id="products">


            <table cellspacing="0" cellpadding="5" width="100%" border="0" >
                <thead>
                <tr style="text-align:left;">
                    <th style="text-align: left;">Customer</th>
                    <th style="text-align: left;">Phone</th>
                    <th style="text-align: left;">Service</th>
                    <th style="text-align: left;">Arrival</th>
                    <th style="text-align: left;">Status</th>
                    <th style="text-align: left;">Date</th>
                    <th style="text-align: left;">Cost</th>
                    <th style="text-align: left;">GST</th>
                    <th style="text-align: left;">Actions</th>
                </tr>
                </thead>
         <tbody>
		 <?php
         if (!empty($events)) {
         $sl=0;
         $num=2;
		 foreach($events as $event) {
             if ($num % 2 != 0)
             {
                 $trtype='tr_alt';
             } else {
                 $trtype='tr_std';
             }
             if ($id == 0 ){

             $sl++;
             ?>
			 <tr class=<?php echo $trtype; ?>>
                 <td><?php
                     echo $this->Html->link($event['User']['first_name'].' '.$event['User']['last_name'],array('controller'=>'customers','action'=>'view', $event['Event']['event_userid']));

                     ?></td>
                 <td><?php
                     if ($event['User']['mobile_phone'] != '') {
                         echo $event['User']['mobile_phone'];
                     } else if ($event['User']['landline_phone'] != ''){
                         echo $event['User']['landline_phone'];
                     } else if ($event['User']['work_phone'] != ''){
                         echo $event['User']['work_phone'];
                     }
                     ?></td>
                 <td><?php
                     echo $event['Event']['event_theme'];
                     ?></td>
                 <td><?php
                     echo $event['Event']['hour'].":".$event['Event']['minute'];
                     ?></td>


                 <td><?php
                 if ($event['Event']['proplanning'] == 1) {
                        echo "Pending";
                 } else if ($event['Event']['proplanning'] == 2) {
                         echo "Confirmed";
                 } else if ($event['Event']['proplanning'] == 3) {
                         echo "Cancelled";
                 } else if ($event['Event']['proplanning'] == 5) {
                     echo "DNA";
                 } else if ($event['Event']['proplanning'] == 4) {
                         echo "Completed";
                 }
                    ?>

                 </td>
				 <td>

				 <?php
                 $date = date('d/m/Y', strtotime($event['Event']['date']));
                 echo $date;
                 ?>
				 </td>
                 <td>
                     <?php
                     echo '$'.$event['Event']['price'];
                     ?>
                 </td>
                 <td>
                     <?php
                     echo toMoney($event['Event']['price']/1.1/10);
                     ?>
                 </td>
                 <td><?php
                     echo $this->Html->link('View/Update', array("controller"=>"events","action"=>"edit", $event['Event']['id'],'?' => array('goto' => $event['Event']['proplanning'])),array('class' => 'buttoned'));
                     ?>&nbsp;&nbsp;&nbsp;

                     <?php
                     if ($event['Event']['proplanning'] == 1 || $event['Event']['proplanning'] == 2 ) {
                         echo $this->Html->link('Cancel', array("controller"=>"events","action"=>"delete", $event['Event']['id']),array('class' => 'buttoned'));
                     } else if ($event['Event']['proplanning'] == 4) {
                         echo $this->Html->link('Clone', array("controller"=>"events","action"=>"copy", $event['Event']['id']),array('class' => 'buttoned'));
                     }
                     ?>&nbsp;&nbsp;&nbsp;
                     <?php
                     if ($event['Event']['proplanning'] == 2) {
                         echo $this->Html->link('Complete  ', array("controller"=>"events","action"=>"complete", $event['Event']['id']),array('class' => 'buttoned'));
                         echo $this->Html->link('SMS-Complete  ', array("controller"=>"smss","action"=>"send", 3, '?' => array('custID' => $event['Event']['event_userid'])),array('class' => 'buttoned'));
                     } else if ($event['Event']['proplanning'] == 1) {
                         echo $this->Html->link('Confirm ', array("controller"=>"events","action"=>"confirm", $event['Event']['id']),array('class' => 'buttoned'));
                         echo $this->Html->link('SMS-Confirm ', array("controller"=>"smss","action"=>"send", 1, '?' => array('custID' => $event['Event']['event_userid'])),array('class' => 'buttoned'));
                         echo $this->Html->link('SMS-Reject ', array("controller"=>"smss","action"=>"send", 4, '?' => array('custID' => $event['Event']['event_userid'])),array('class' => 'buttoned'));
                     } else {
                         echo $this->Html->link('Bring Back Booking', array("controller"=>"events","action"=>"confirm", $event['Event']['id']),array('class' => 'buttoned'));
                     }
                     ?>&nbsp;&nbsp;&nbsp;
                     <?php
                     if ($event['Event']['proplanning'] == 2) {
                         echo $this->Html->link('DNA', array("controller"=>"events","action"=>"dna", $event['Event']['id']),array('class' => 'buttoned'));
                     }
                     ?>
                 </td>
             </tr>

                 <?php
                 $counter=1;
                 foreach($dogs as $dog){
                     if ($dog['Dog']['dog_userid'] == $event['Event']['event_userid']) {
                         ?>
                         <tr>

                             <td><b><?php
                                     echo $counter;
                                     $counter++;
                                     ?>)</b> <?php
                                 echo $this->Html->link($dog['Dog']['name'], array("controller"=>"dogs","action"=>"edit", $dog['Dog']['id']),array('class' => 'buttoned'));
                                 ?>&nbsp;&nbsp;/ <?php echo $dog['Dog']['breed']; ?></td>
                             <td><?php
                                 ?></td>
                         </tr>

                     <?php
                     }
                 }
                 ?>
                 <?php
                 $num++;
             }
         }
         } else {
             echo "<tr><td colspan=10><br/><br/>No Bookings Exist!</td></tr>";
         }
         ?>
         </tbody>
            </table>
        </div></div></div></div>