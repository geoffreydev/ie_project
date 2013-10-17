<?php $this->layout = 'default'; ?>
        <div class="products">
		<h2 style="text-align:center;color:black;">Add Photo</h2>
        <br />
        <div id="addform">
        <?php
        echo $this->Form->create('Photo', array('enctype' => 'multipart/form-data')); 
        echo $this->Form->input('id', array('type'=>'hidden')); 
		
		?>
		<table>
		<tr>
	<th class="heading" width="30%"><p align="left">Name : </p></th>
   <td class="data" width="60%"><?php echo $this->Form->input('gallery_name', array('label' =>'','size'=>'62'));?></td> 
</tr>
   <tr>
	<th class="heading" width="30%"><p align="left">Description: </p></th>
    <td class="data" width="60%"><?php echo $this->Form->input('path_alt', array('type' => 'textarea', 'label' =>'','style'=>'width:400px'));?></td>
   </tr>
   <tr>
	<th class="heading" width="30%"><p align="left">Photo Image: </p></th>
    <td class="data" width="60%"><?php echo $this->Form->file('gallery_image', array('label' =>'','size'=>'50'));?></td>
   </tr>
    </table>
        
        <div id="button-submit">
        <table BORDER="2" class="btnTable">
		<tr>
        <td align="left">
        
	<?php echo $this->Form->button(__('Add Image', true), array('name' => 'Save Image', 'div' => false)); ?>
            </td>
        <td align="right" width="50%">
    	    <?php echo $this->Form->button(__('Cancel', true), array('name' => 'Cancel','div' => false)); ?> 

        </td>
        </tr>
        </table>
        </div>
         
         </div>
         </div>
       