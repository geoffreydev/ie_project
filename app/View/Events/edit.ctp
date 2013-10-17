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
            dmy = ("0"+date.getDate()).slice(-2) + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + date.getFullYear();

            if ($.inArray(dmy, unavailableDates) < 0) {
                return [true,"","Book Now"];
            } else {
                return [false,"","Trololololol Booked Out"];
            }
        }

        function noWeekendsOrHolidays(date) {
            var noWeekend = jQuery.datepicker.noWeekends(date);
            return noWeekend[0] ? unavailable(date) : noWeekend;
        }


        $("#date").datepicker({
            minDate:"+0d",
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

        $("#date1").datepicker({
            minDate:"+1d",
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
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });

    });



</script>

<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Update Booking'); ?></span>
                <span class="umstyle2" style="float:right"><?php
                    echo $this->Html->link(__("Back to bookings   ",true),"/events/viewall/0");
                    ?>
                    <span class="umstyle2" style="float:left">
                        <?php
                        //  echo $this->Html->link(__("   Back to customer",true),"/customers/view/0");
                        ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>


            <div id=new_event>
                <div id="editform">
                    <?php
                    echo $this->Form->create('Event');
                    ?>
                    <table id=greytable width = "50%" >

                        <?php
                        echo $this->Form->input('id', array('type'=>'hidden'));
                        echo $this->Form->input('event_userid',array('type'=>'hidden'));
                        ?>
                        <tr>
                            <th width = "200px" style="text-align: right;">Service:</th>
                            <td>
                                <?php
                                echo $this->Form->input('event_theme', array('type'=>'text','style'=>'width:300px', 'label' =>'', 'maxlength' => '22'));
                                ?>
                            </td>
                        </tr><?php /*
                         */ ?>
                        <tr>
                            <th width = "200px" style="text-align: right;">Date:</th>
                            <td>
                                <?php
                                $date = date('d/m/Y',strtotime($event[0]['Event']['date']));

                                echo $this->Form->input('date', array('type'=>'text','label' =>'','value'=>$date,'id'=>'date','readonly'=>'readonly'));
                                //echo $this->Form->input('date', array('type'=>'text','label' =>'','id'=>'date','readonly'=>'readonly'));

                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th width = "200px" style="text-align: right;">Time:</th>
                            <td class="dropTimeTD">
                                <?php
                                $hourArray = array('7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13');
                                echo $this->Form->input('hour', array('type'=>'select','options'=>$hourArray,'style'=>'width:auto;float:left;','label' => '', 'default' => '13'));
                                ?><?php
                                $minuteArray = array('00'=>'00','15'=>'15','30'=>'30','45'=>'45');
                                echo $this->Form->input('minute', array('type'=>'select','options'=>$minuteArray,'style'=>'width:auto;float:left;','label' => '', 'default' => '13'));
                                ?>
                            </td>

                        </tr>
                        <?php
                        if ($this->Session->read('UserAuth.User.user_group_id') == 1){
                            ?>

                            <tr>
                                <th width="250px" style="text-align: right;"> Automatic SMS? </th>
                                <td>
                                    <?php $options = array(
                                        0 => 'No',
                                        1 => 'Yes'
                                    );

                                    $attributes = array(
                                        'legend' => false,
                                        'value' => 0
                                    );
                                    echo $this->Form->radio('sms_toggle', $options, $attributes,array('style'=>'width:300px','label' => ''));
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <th width = "250px" style="text-align: right;">Comments:</th>
                            <td>
                                <?php
                                echo $this->Form->input('event_comment', array('type'=>'textarea', 'style'=>'width:300px', 'label' =>'', 'maxlength' => '250'));
                                ?>
                            </td>
                            <td width="250px">
                                <b>For Example:</b><br>
                                - Who is collecting? <br><br>
                                - Preferred phone number?</br><br>
                                - Any current injuries?
                            </td>
                        </tr>
                        <?php if ($this->Session->read('UserAuth.User.user_group_id') == 1) { ?>
                        <tr>
                            <th width = "200px" style="text-align: right;">Cost: $</th>
                            <td>
                                <?php
                                echo $this->Form->input('price', array('type'=>'text','style'=>'width:300px', 'label' =>'', 'maxlength' => '22'));
                                ?>
                            </td>
                        </tr>
                        <?php } ?>


                        <tr>
                            <th width="250px" style="text-align: right;">Which Dog(s)?</th>
                            <td>
                            <?php
                            $checked = $this->Form->value('Dog.Dog');
                            foreach ($dogs as $id=>$label)
                            {
                                echo "<tr style='text-align:right;width:100px;padding-left:200px;'>";
                                echo "<td class='heading'>".$label."</td>";
                                echo "<td class='data' style='float:left; margin-left:20px;'>";
                                echo $this->Form->input("Dog.checkbox.$id", array('label'=>'','legend'=>false,'type'=>'checkbox','checked'=>(isset($checked[$id])?'checked':false),));
                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
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
            </div>        </div>
    </div></div>
