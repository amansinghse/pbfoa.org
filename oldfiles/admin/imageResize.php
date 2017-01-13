<?php

header('Content-Type: image/jpeg');

$img=$_REQUEST['image'];

$xscale=$_REQUEST['scale'];

   include "includes/imageResizeLib.php";

   $image = new SimpleImage();

   $image->load($img);

	$width = $_REQUEST['width'];
	$height = $_REQUEST['height'];
	
	$image->resize($width,$height);
   //$image->scale($xscale);

   $image->output();

?>