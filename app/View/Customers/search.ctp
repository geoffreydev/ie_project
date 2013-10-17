
<title>Canine Clip Joint</title>

<?php $this->layout = 'default'; ?>
<?php //echo $this->Html->css('style');?>
<?php echo $this->Html->script('sortable.js');?>

<div class="umtop">
    <?php //echo $this->Session->flash(); ?>
    <?php //echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                 <span class="umstyle1"><?php echo __('Customer Search Results'); ?></span>
                 <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Back to Full Customer List",true),"/customers") ?></span>
                <div style="clear:both"></div>
            </div>

            <div class="umhr"></div>
            <!--Added for search -->

            <div id="search">
                <table width="250">
                     <?php echo $this->Form->create('User', array('type'=>'get','url'=>array('controller' => 'customers', 'action' => 'search'))); ?>
                    <tr>
                        <td>
                            <?php
                            echo $this->Form->input('keywords',array('type' => 'text','empty' => '-- Enter Keywords --', 'placeholder'=>"last name...",  'value' => $keywords));
                            echo $this->Form->submit('Go', array('name'=>'submitName','id'=>'search_button' ));
                            ?>
                         </td>
                     </tr>
                     <?php echo $this->Form->end(); ?>

                 </table>
             </div>

             <!-- End search -->

 <div id="count" style="text-align:center;color:red;">
 <tr >
    <td  ><?php //echo $count. " Result(s) Found";?></span></td>
</tr>
			</div>
<table id="greytable" class="sortable">

<thead>
  <tr><th>Name</th><th>Username</th><th>Phone</th><!--<th class="sorttable_nosort">Actions</th>--></tr>
</thead>
			<tbody>
			<?php
                $sl=0;
                $num=2;
		 		foreach($as as $user){
                    if ($num % 2 != 0)
                    {
                        $trtype='tr_alt';
                    } else {
                        $trtype='tr_std';
                    }

                    $sl++;
            if ($user['User']['user_group_id'] == 2)
            {
		 	?>
                <tr class="<?php echo $trtype;?>" >

             <?php echo "<td><a href='".$this->Html->url('/customers/view/'.$user['User']['id'])."'>".h($user['User']['first_name'])." ".h($user['User']['last_name'])."</td>"; ?>
             <td><?php echo $user['User']['username']; ?></td>
             <td><?php echo $user['User']['mobile_phone']; ?></td>
             </tr>
		 <?php                             }
                    $num++;
                }

		 ?>
		 </tbody>
        </table>
		 
	<div id=paginatorbtnlow style="text-align:center;margin-left:35%;">
	<table id=blacktable ><th></th><tr><td>
	<?php //echo $this->Paginator->prev(' << ' . __('prev'), array(), null, array('class' => 'prev disabled'))." ";?>
	</td>
	<td>
	<div id=paginatornum>
	<?php //echo $this->Paginator->numbers(array('first' => 'First page'))." ";?>
	</div>
	</td>
	<td>
	<?php //echo $this->Paginator->next( __('next').' >> ' , array(), null, array('class' => 'next disabled'))." ";?>
	</td>
	</tr>
	</table>
    </div>	</div>	</div>	</div>	</div>
