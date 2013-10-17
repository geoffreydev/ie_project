<?php $this->layout = 'default'; ?>
        <div id="edit">
		<?php
        echo "<h1>My Account</h1>"; 
		?>
        <br />
        <div id="My Account">
        <?php
		echo $this->Form->create('Customer');
		echo $this->Form->input('Customer.id', array('type'=>'hidden'));  
        echo $this->Form->input('Customer.contact_fname',array('type'=>'text','label' =>        'Firstname:')); 
        echo $this->Form->input('Customer.contact_sname',array('type'=>'text','label' =>        'Surname:')); 
        echo $this->Form->input('Customer.contact_street', array('type'=>'text','label' =>      'Street:')); 
        echo $this->Form->input('Customer.contact_suburb', array('type'=>'text','label' =>      'Suburb:')); 
        echo $this->Form->input('Customer.contact_state', array('type'=>'text','label' =>       'State:')); 
        echo $this->Form->input('Customer.contact_postcode', array('type'=>'text','label' =>    'Postcode:')); 
        echo $this->Form->input('Customer.contact_homephone', array('type'=>'text','label' =>   'Phone:')); 
        echo $this->Form->input('Customer.contact_mobilephone', array('type'=>'text','label' => 'Mobile:')); 
		echo $this->Form->input('Customer.contact_email', array('type'=>'text', 'label'=> 'Email:'));
		echo $this->Form->input('Myaccount.id', array('type'=>'hidden'));
		echo $this->Form->input('Myaccount.pastscale', array('type'=>'text', 'label'=>'Past Scale:'));
        ?>
        <div id="cancelbtn">
         <?php $urlBack = array('controller' => '','action' => 'index');
            echo $this->Form->button('Cancel', array('onclick' => "location.href='".$this->Html->url($urlBack)."'")); 
         ?>
         <button type="submit">Save</button>
			
         <?php echo $this->Form->end(); ?>
         </div>
         <div id="Wish List">
         echo "<h1>Wish List</h1>";
         
         </div>
         </div>