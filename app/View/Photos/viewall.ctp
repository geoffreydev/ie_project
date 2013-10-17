<?php echo $this->Html->css('lightbox'); ?> 
<?php echo $this->Html->script('lightbox-1');?>
<?php $this->layout = 'default'; ?>
<?php echo $this->Html->script('jquery1'); ?>
<?php echo $this->Html->script('jquery2');?>
<div class="products">
<h2 style="text-align:center;font-size:25px;color:black;">Photo Gallery</h2>
<?php echo $this->Html->image('images/button_upload_photo.png', array('url' =>array("controller"=>"photos","action"=>"add"))); ?>
</div>
<div id=viewe>
        <table border = "2" class="data"> 
        <thead>
             <tr> 
               <th><span class="h2reset">Photo Name</span></th>
               <th><span class="h2reset">Date Uploaded</span></th>
			   <th><span class="h2reset">Description</span></th> 
               <th><span class="h2reset">thumnail</span></th> 
			   <th><span class="h2reset">Functions</span></th> 

             </tr>   
        </thead>  
             <!-- here is where we loop through our $enquirys array --> 
            
             <tbody>
              <?php foreach($gallerys as $gallery)  
              { 
              ?> 
              <tr class="list" align="center"> 
                 <td><?php echo $gallery['Photo']['gallery_name']; ?></td>
                 <td><?php echo $gallery['Photo']['created']; ?></td>
				 <td><?php echo $gallery['Photo']['path_alt']; ?></td>

				 <td style="text-align:center;"><?php
				if($gallery['Photo']['gallery_image'] != null)
				{
				echo $gallery['Photo']['gallery_image']."<br />";
				echo $this->Html->image('uploads/'.$gallery['Photo']['gallery_image']);
				}
				?></td>

              <td>
			  <div id=thumnail>
            	<?php echo $this->Html->image('images/view.png', array ('url' => array("controller"=>"photos", "action"=>"view",$gallery["Photo"]["id"])));?>
            	<?php echo $this->Html->image('images/edit.png', array ('url' => array("controller"=>"photos", "action"=>"edit",$gallery["Photo"]["id"])));?>
            	<?php 
				$url = array("controller"=>"photos","action"=>"delete",$gallery['Photo']['id'],addslashes($gallery['Photo']['gallery_name']));				
				echo $this->Html->image('images/delete.png',array("onclick"=>"if(confirm('Are you sure you want to delete this Photo?')) location.href='".$this->Html->url($url)."'")); ?>
               </div>
			  </td>
              </tr>
              <?php  
             }  
             ?> 
             </tbody>
        </table>
       </div>
	   
	   <br />