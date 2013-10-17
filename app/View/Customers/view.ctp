<?php echo $this->Html->script('jquery-1.9.1.js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".hide1").click(function(){
            $(this).siblings("div").hide();
        });
        $(".show").click(function(){
            $(this).siblings("div").show();
        });
    });

</script>

<div class="umtop">
    <?php //echo $this->Session->flash(); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Customer Details'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Customers",true),"/customers") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid" id="index">
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <tbody>
                    <?php       if (!empty($user)) { ?>

                        <tr>
                            <td><strong><?php echo __('Username');?></strong></td>
                            <td><?php echo h($user['User']['username'])?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Name');?></strong></td>
                            <td><?php echo h($user['User']['first_name'])?> <?php echo h($user['User']['last_name'])?></td>
                        </tr>

                        <tr>
                            <td><strong><?php echo __('Email');?></strong></td>
                            <td><?php echo h($user['User']['email'])?></td>
                        <tr>
                            <td><strong><?php echo __('Mobile Phone');?></strong></td>
                            <td><?php echo h($user['User']['mobile_phone'])?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Home Phone');?></strong></td>
                            <td><?php echo h($user['User']['landline_phone'])?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Work Phone');?></strong></td>
                            <td><?php echo h($user['User']['work_phone'])?></td>
                        </tr>
                        <tr><hd> </hd></tr>
                        <tr>
                            <td><strong><?php echo __('Secret Comments');?></strong></td>
                            <td><?php echo h($user['User']['secret_comment'])?></td>
                        </tr>
                    <?php   } else {
                        echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
                    } ?>
                    </tbody>
                </table>


            </div>
            <div class="um_box_mid_content_mid" id="index">
                <hr />
                <span class="umstyle1"><?php echo __('Dogs'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add New Dog",true),"/dogs/add_dog?custID=".$user['User']['id']) ?></span>
                <br>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <thead>
                    <tr >
                        <th style="text-align: left;"><?php echo __('Name');?></th>
                        <th style="text-align: left;"><?php echo __('Breed');?></th>
                        <th style="text-align: left;"><?php echo __('Sex');?></th>
                        <th style="text-align: left;"><?php echo __('Age');?></th>
                        <th style="text-align: left;"><?php echo __('Comments');?></th>
                        <th style="text-align: left;"><?php echo __('Actions');?></th>

                    </tr>
                    </thead>
                    <?php
                    foreach($dogs as $dog) {
                        echo "<tr>";
                        echo "<td>".$this->Html->link($dog['Dog']['name'],array('controller'=>'dogs','action'=>'edit', $dog['Dog']['id'],'?' => array('goto' => $user['User']['id'])))."</td>";
                        echo "<td>".$dog['Dog']['breed']."</td>";
                        echo "<td>".$dog['Dog']['sex']."</td>";
                        echo "<td>".$dog['Dog']['age']."</td>";
                    ?>
                        <td>

                        <button class="hide1">Hide</button>
                        <button class="show">Show</button>
                        <div id="comments" style="width:200px;height:auto; overflow:scroll; position:relative; display:none;">
                            <p style="margin:0;"><?php echo $dog['Dog']['comment'];?></p>
                        </div>
                        </td>
                        <td>
                        <?php
                        echo $this->Html->link(
                        'Remove Dog',
                        array('controller' => 'dogs', 'action' => 'delete', $dog['Dog']['id']),
                        array('class' => 'buttoned'),
                        "Are you sure you wish to remove ".$dog['Dog']['name']."?" );
                    ?></td>
                    </tr>
                    <?php
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="um_box_mid_content_mid" id="index">
                <hr />
                <span class="umstyle1"><?php echo __('Bookings'); ?></span>
                <span class="umstyle1" style="float:right"><?php
                    if (empty($dogs)) {
                        echo "Dogs must be added before bookings.";
                    } else {
                    echo $this->Html->link(__("Add New Booking",true),"/events/newevent?custID=".$user['User']['id']);

                    }

                    ?></span>
                <br>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <thead>
                    <tr >
                        <th style="text-align: left;"><?php echo __('Service');?></th>
                        <th style="text-align: left;"><?php echo __('Date');?></th>
                        <th style="text-align: left;"><?php echo __('Drop Off Time');?></th>
                        <th style="text-align: left;"><?php echo __('Dogs');?></th>
                        <th style="text-align: left;"><?php echo __('Comments');?></th>

                    </thead>
                    <?php
                    ?>
                    <?php
                    foreach($events as $event) {
                        echo "<tr>";
                        echo "<td>".$this->Html->link($event['Event']['event_theme'],array('controller'=>'events','action'=>'edit', $event['Event']['id'],'?' => array('goto' => $user['User']['id'])))."</td>";?>
                        <td><?php
                            $date = date('d/m/Y', strtotime($event['Event']['date']));
                            echo $date;
                            ?></td><?php
                        echo "<td>".$event['Event']['hour'].":".$event['Event']['minute']."</td>";?>
                        <td>
                            <?php
                            foreach($event['Dog'] as $dog)
                            {
                                echo"(". $dog['name'].")";
                            }
                            ?>
                        </td>
                        <td>

                            <button class="hide1">Hide</button>
                            <button class="show">Show</button>
                            <div id="comments" style="width:200px;height:auto; overflow:scroll; position:relative; display:none;">

                                <p style="margin:0;">		<?php echo $event['Event']['event_comment'];?></p>

                            </div>
                        </td>

                        <?php echo "</tr>";
                    }
                    ?>

                </table>
            </div>
            <?php /*
            <div class="um_box_mid_content_mid" id="index">
                <hr />
                <span class="umstyle1"><?php echo __('Dogs'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add New Dog",true),"/dogs/add_dog?custID=".$user['User']['id']) ?></span>
                <br>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <thead>
                    <tr >
                        <th style="text-align: left;"><?php echo __('Name');?></th>
                        <th style="text-align: left;"><?php echo __('Breed');?></th>
                        <th style="text-align: left;"><?php echo __('Sex');?></th>
                        <th style="text-align: left;"><?php echo __('Age');?></th>
                        <th style="text-align: left;"><?php echo __('Comments');?></th>
                        <th style="text-align: left;"><?php echo __('Actions');?></th>

                    </tr>
                    </thead>
                    <?php

                    foreach($dogs as $dog) {
                        echo "<tr>";
                        echo "<td>".$this->Html->link($dog['Dog']['name'],array('controller'=>'dogs','action'=>'edit', $dog['Dog']['id'],'?' => array('goto' => $user['User']['id'])))."</td>";
                        echo "<td>".$dog['Dog']['breed']."</td>";
                        echo "<td>".$dog['Dog']['sex']."</td>";
                        echo "<td>".$dog['Dog']['age']."</td>";
                        ?>
                        <td>

                            <button class="hide">Hide</button>
                            <button class="show">Show</button>
                            <div id="comments" style="width:200px;height:auto; overflow:scroll; position:relative; display:none;">

                                <p style="margin:0;">		<?php echo $dog['Dog']['comment'];?></p>

                            </div>
                        </td>
                        <?php
                        echo "<td>";
                        echo $this->Html->link(
                            'Remove Dog',
                            array('controller' => 'dogs', 'action' => 'delete', $dog['Dog']['id']),
                            array('class' => 'buttoned'),
                            "Are you sure you wish to remove ".$dog['Dog']['name']."?" );
                        ?></td>
                        </tr>
                        <?php
                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
 */ ?>
            <div class="um_box_mid_content_mid" id="index">
                <hr />
                <span class="umstyle1"><?php echo __('Actions'); ?></span>
                <br><br>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" >
                    <td>
                        <?php
                        echo $this->Html->link('Edit Customer Information',
                            array("controller"=>"customers","action"=>"edit", $user['User']['id'])
                            ,array('class' => 'buttoned', 'escape'=>false));
                        ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                        echo $this->Html->link(
                            'Delete Customer Forever!',
                            array('controller' => 'customers', 'action' => 'delete', $user['User']['id']),
                            array('class' => 'buttoned'),
                            "-----WARNING----- Are you sure you wish to delete this customer?  By clicking [OK], this customer and all associated records will be ERASED from the system FOREVER.  There is no going back." );
                    ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                        if ($user['User']['mobile_phone'] != '') {
                            echo $this->Html->link('SMS-Request-Call ', array("controller"=>"smss","action"=>"send", 5, '?' => array('custID' => $user['User']['id'])),array('class' => 'buttoned'));
                        }
                        ?>
                    </td>

                </table>
            </div>

        </div>
    </div>
    <div class="um_box_down"></div>
</div>