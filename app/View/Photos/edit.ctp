<?php $this->layout = 'default'; ?>
        <div class="products">
		
        <h2 style="text-align:center;font-size:25px;color:black;">Edit Photo</h2>
		
        <br />
        <div id="addform">
        <?php
        echo $this->Form->create('Photo', array('enctype' => 'multipart/form-data')); 
        echo $this->Form->input('id', array('type'=>'hidden')); 
		
		?>
		<table>
			<tr>

	<th class="heading" width="30%"><p align="left">Photo Name:</p></th>
   <td class="data" width="60%"><?php echo $this->Form->input('gallery_name', array('label' =>'','size'=>'63'));?></td> 
</tr>
<tr>
	<th class="heading" width="30%"><p align="left">Tags : </p></th>
	
    <td class="data" width="60%"><?php echo $this->Form->input('path_alt', array('type' => 'textarea', 'label' =>'','style'=>'width:400px'));?></td>
    </tr>
    
    <tr>
    <th class="heading" width="30%"><p align="left">Current Image : </p></th>
    <td>
    <?php if($blnImage)
	{
	echo $gallery['Photo']['gallery_image']."<br /><br />";
	echo $this->Html->image('uploads/'.$gallery['Photo']['gallery_image']);
	}
	else
	{
	echo "no image available";
	}
	?>
    </td>
    </tr>
    </table>
		<table>
	<th class="heading" width="30%"><p align="left">Upload New Image : </p></th>
    <td class="data" width="60%"><?php echo $this->Form->file('gallery_image', array('label' =>'','size'=>'50'));?></td>
    <td width="10%"></td>
    </table>
        </div>
        <table  class="btnTable">
		<tr>
        <td align="left">
        <?php echo $this->Form->button(__('Save', true), array('name' => 'Save', 'div' => false)); ?>
        </td>
        <td align="right">
        <?php echo $this->Form->button(__('Cancel', true), array('name' => 'Cancel','div' => false)); ?>
        </td>
		</tr>
        </table>
         
                 </div>

        