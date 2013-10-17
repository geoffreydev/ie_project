<?php $this->layout = 'default'; ?>

<h2 style="text-align:center;font-size:25px;color:black;">View Photo</h2> 
<div class="products">
<table id=graytable width="80%">
<tr>
<th class="heading" width="30%">Name</th>
<td class="data" width="60%"><?php echo $gallery['Photo']['gallery_name']; ?></td>
</tr>
<tr>
<th class="heading" width="30%">Image</th>
<td class="datacentre" width="60%">
<?php
if($gallery['Photo']['gallery_image'] != null)
{
echo $gallery['Photo']['gallery_image']."<br /><br />";
echo $this->Html->image('uploads/'.$gallery['Photo']['gallery_image']);
}
else
{
echo "No Image Available";
}
?>
</td>
</tr>
</table>

<table class="btnTable" width="30%">
<tr>

    <td class="button1">
<?php
        $urlEdit = array('controller' => '/photos/','action' => 'edit',$gallery['Photo']['id']);
        echo $this->Form->button('Edit', array('onclick' => "location.href='".$this->Html->url($urlEdit)."'"));
?>
    </td>
    <td class="button1">
<?php
        $urlDel = array('controller'=>'photos','action'=>'delete', $gallery['Photo']['id'],addslashes($gallery['Photo']['gallery_name']));
        echo $this->Form->button('Delete', array('onclick' => "if(confirm('Are you sure you want to delete this image?'))location.href='".$this->Html->url($urlDel)."'"));
?>
    </td>
    <td class="button1">
<?php
        $urlView = array('controller'=>'photos', 'action'=>'viewall');
        echo $this->Form->button('Return to List', array('onclick' => "location.href='".$this->Html->url($urlView)."'"));
?>
    </td>
</tr>
</table> 
</div>