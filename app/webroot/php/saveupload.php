<?php
include ('connect.php');
if (isset($_POST['add'])) {
	/* Determine Filename */
	if ($_FILES["file"]["name"] != '') {
		$extension = end(explode(".", $_FILES["file"]["name"]));
		$filenamez = uniqid('cover', true) . '.' . $extension;
		move_uploaded_file($_FILES["file"]["tmp_name"],
		"../img/uploads/" . $filenamez);
	} else {
		$filenamez = 'Default_Image.png';
	}
	?>
	<?php


    if (isset($_POST['caption'])) {
        if ($_POST['caption'] != '') {
            $caption = $_POST['caption'];
        } else {
            $caption = "No Caption Set";
        }

    } else {
        $caption = "No Caption Set";
    }
  $query="INSERT INTO photos (filename, caption, location) VALUES ('".$filenamez."', '".$caption."', '".$_POST['destination']."')";
    mysql_query($query);
	}
//echo $query;
  header( 'Location: /Sirucci/pagecontents/gallery' ) ;

?>