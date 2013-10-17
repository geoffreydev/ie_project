<title>Canine Clip Joint</title>

<?php $this->layout = 'default'; ?>
<?php echo $this->Html->script('sortable.js');?>
<div class="umtop">
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Staff Members'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add New Staff Member",true),"/staffs/add") ?></span>
                <div style="clear:both"></div>
            </div>

            <div class="umhr"></div>
            <!--Added for search -->

            <div id="search">
                <table width="250">
                    <?php echo $this->Form->create('User', array('type'=>'get','url'=>array('controller' => 'staffs', 'action' => 'search'))); ?>
                    <tr>

                        <td><?php
                            echo $this->Form->input('keywords',array('type' => 'text','empty' => '-- Enter Keywords --', 'placeholder'=>"Surname or Mobile",  'value' => $keywords));
                            ?>
                            <?php echo $this->Form->submit('Go', array('name'=>'submitName','id'=>'search_button' )); ?>
                        </td>
                    </tr>
                    <?php echo $this->Form->end(); ?>

                </table>
            </div>

            <div class="um_box_mid_content_mid" id="index">
            </div>
            <table cellspacing="0" cellpadding="10" width="100%" border="0" >
                <thead>
                <tr >
                    <th style="text-align: left;"><?php echo __('Name');?></th>
                    <th style="text-align: left;"><?php echo __('Username');?></th>
                    <th style="text-align: left;"><?php echo __('Phone');?></th>
                </tr>
                </thead>

                <tbody>
                <?php
                if (!empty($users)) {
                $sl=0;
                $num=2;
                foreach ($users as $row) {
                if ($num % 2 != 0)
                {
                    $trtype='tr_alt';
                } else {
                    $trtype='tr_std';
                }

                $sl++;
                if ($row['User']['user_group_id'] == 1)
                {
                ?>
                <tr class="<?php echo $trtype;?>" ><?php

                    echo "<td><a href='".$this->Html->url('/staffs/view/'.$row['User']['id'])."'>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</td>";
                    echo "<td>".h($row['User']['username'])."</td>";
                    if ((h($row['User']['mobile_phone'])) != null) {
                        echo "<td>".h($row['User']['mobile_phone'])."</td>";
                    } else if ((h($row['User']['landline_phone'])) != null) {
                        echo "<td>".h($row['User']['landline_phone'])."</td>";
                    }
                    echo "<td>";

                    echo "</td>";
                    echo "</tr>";
                    }
                    $num++;
                    }
                    } else {
                        echo "<tr><td colspan=10><br/><br/>No Customers Exist!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="um_box_down"></div>
</div>