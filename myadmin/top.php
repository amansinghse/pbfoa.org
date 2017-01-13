<?php require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="shortcut icon" href="<?php echo WEBSITE_URL; ?>images/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortcut icon" href="<?php echo WEBSITE_URL; ?>images/favicon.png" />
<style>
@import url("css/fonts.css");
*{outline:none;font-family:"Droid Sans";}
body{ margin:0px; padding:0px;font-family:"Droid Sans"; font-size:12px;background:#ffffff; color:#fff; min-width:1000px;}
h1,h2,h3,h4,h5,h6,p{margin:2px 0px; padding:2px 0px;}
a{text-decoration:underline; color:#fff;}
a:hover{ text-decoration:none; color:#000;}
.txtright{ text-align:right}
.full{ clear:both; float:left; width:100%;border-bottom:1px solid #000;}
.cols40{ float:left; width:38%; padding:7px 1%;}
.cols60{ float:left; width:57%; padding:3px 1%;}
</style>
<body>
<div class="full" style="background:#000">
	<div class="cols40"><!--<img src="images/logo.png" alt="img" />-->Palm Beach</div>
    <div class="cols60 txtright">
    	<h2>Welcome to <?php echo COMPANY_NAME;?> Admin Panel</h2>
        <big>Welcome <?php echo $_SESSION['ADMIN_NAME'];?>! <a href="?signout" title="<?php echo COMPANY_NAME;?>" target="_parent">Logout</a></big>
    </div>
</div>
</body>
</html>