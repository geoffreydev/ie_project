<h1>Publishers</h1> 

<?php 
	$urlAdd = array("controller"=>"Publishers", "action"=>"edit");
	
	echo $this->Form->button('Add Publisher', array('onclick'=>"location.href='".$this->Html->url($urlAdd)."'"));
	?>
<table> 
 <tr> 
 <th>ID</th> 
 <th>Company Name</th> 
 <th>Contact</th> 
 <th>Address</th> 
 </tr> 
 <!-- here is where we loop through our $publishers array --> 
 <?php foreach($publishers as $publisher) 
 { 
 ?> 
 <tr> 
 <td><?php echo $publisher['Publisher']['id']; ?></td> 
 <td><?php echo $publisher['Publisher']['company_name']; ?></td> 
 <td><?php echo $publisher['Publisher']['contact_fname']." 
 ".$publisher['Publisher']['contact_sname']?> 
 </td> 
 <td> 
 <?php echo $publisher['Publisher']['pub_street']; ?><br /> 
 <?php echo $publisher['Publisher']['pub_suburb']; ?> 
 <?php echo $publisher['Publisher']['pub_state']; ?><br /> 
 <?php echo $publisher['Publisher']['pub_pc']; ?><br /> 
 </td> 
 <td> 
	<?php echo $this->Html->link("Details",array("controller"=>
			"Publishers", "action"=>"view", $publisher["Publisher"]["id"]));?>
 </td>
 </tr> 
 <?php 
 } 
 ?> 
</table>