
<title>Functions, D��core & More</title>
<div id="productspage">
<?php $this->layout = 'default'; ?>
<?php echo $this->Html->script('jquery1.js'); ?>
<?php echo $this->Html->script('jquery2.js');?>
<?php echo $this->Html->script('jquery-1.7.2.min.js');?>

<?php echo $this->Html->css('lightbox.css',null,array('media' => 'screen'));?>
<?php echo $this->Html->script('lightbox-1.js');?>
<div id=testimonials>
<h1>Photo Gallery</h1>
</div>
    <div id=gallery>
    <div id=linkitemsproducts>
        <?php /* This is cool; however, client did not request it.
    <?php echo $this->Form->create('Photo',array('action' => 'search')); ?>
    <?php echo $this->Form->input('Keywords', array('type' => 'text', 'empty' => '-- Enter Keywords --', 'options' => $keywords, 'selected' => $keywords)); ?>
    <?php echo $this->Form->submit('Search'); ?>
    <?php echo $this->Form->end(); ?>
    */ ?>
    </div>
    <div id=productlist>
    <div id=productsearch>
    <?php
	
	?>
    </div>
    <?php
	echo "<div id=galleryview>";
		$x = 0;//product counter for each page
		$y = 0;//counter for each set of three
		
		echo "<table class='producttable'>";
		//loops through all products
		foreach($gallerys as $gallery) {
			//creates new row
			if($x == 0) {
				echo"<th></th><tr>";
			}
			//CONTENT
			echo "<td>";
			echo "<div id=gallery".$y.">";//creates 3 diff div names product0, product1, product2
					//photo
					echo "<div id=photo>";
					?>
					<a href="../../../../img/uploads/<?php
                    echo $gallery['Photo']['gallery_image'];
                    ?>" rel="lightbox[]" title="<?php
                    echo $gallery["Photo"]["gallery_name"];
                    ?>"><img width="200px" height="200px" src="../../../../img/uploads/<?php
                        echo $gallery['Photo']['gallery_image'];
                        ?>" /></a>
					<?php
					
					
					echo "</div>";
				echo "</td>";
				if($x == 2) {
					echo "</tr>";
					$x = -1;
				}
				$x++;
		}		
		echo "</table>";
		echo "</div>";
		echo "<div id=paginatorbtnlow>";
	echo "<table id=blacktable ><th></th><tr><td>";
	echo $this->Paginator->prev(' << ' . __('prev'), array(), null, array('class' => 'prev disabled'))." ";
	echo "</td><td>";
	echo "<div id=paginatornum>";
	echo $this->Paginator->numbers(array('first' => 'First page'))." ";
	echo "</div>";
	echo "</td><td>";
	echo $this->Paginator->next( __('next').' >> ' , array(), null, array('class' => 'next disabled'))." ";
	echo "</td></tr></table>";
	echo "</div>";
    ?>        
</div>
</div>
</div>

