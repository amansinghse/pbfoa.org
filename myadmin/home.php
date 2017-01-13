<?php
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	 $page = explode('/', $_SERVER['REQUEST_URI']);
	  $page_slug = end(array_filter($page));
	 
	  
	  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php include_once("inc.head.php"); ?>
</head>
<body>
<div class="cols100 txtcenter"><h1>Welcome <?php echo $_SESSION['ADMIN_NAME'];?>!</h1></div>
<?php require_once("message.php");?>  
<?php include_once("footer.php");?>
</body>
</html>
