<?php
$scriptName="admin.php";
include "includes/config.php";
include "includes/loginCheck.php";
include "includes/header.php";
?>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<!--<h1 id="sidebar-title"><a href="#">XSuite Admin</a></h1> -->
		  
			<!-- Logo (221px wide) -->
			<!-- <a href="#"><img id="logo" src="resources/images/logo.jpg" alt="Admin logo" /></a> -->
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
			<h2 style="padding-top:10px; color:#CCCCCC;"> FON Admin</h2>
				Hello<a href="#" title="Edit your profile"> <?php echo $_SESSION["xsuite_admin_name"]; ?></a>! <!-- you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br /> -->
				<br />
				<a href="<?php echo $xsuite_http_site; ?>" title="View the Site" target="_blank">View the Site</a> | <a href="?logout" title="Sign Out">Sign Out</a>
		  </div>        
			
		<!-- SideBar Navigation -->
		<?php include "includes/sidenav.php"; ?>
		<!-- / SideBar Navigation -->
			
			<?php include "includes/messages.php"; ?>
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="../../../browsehappy.com/index.htm" title="Upgrade to a better browser">upgrade</a> your browser or <a href="../../../www.google.com/support/bin/answer_2EEFB1D5.py" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			

			
			<?php
			include "includes/welcome.php";
			//include "includes/topnav.php";
			
			?>
			
			<div class="clear"></div> <!-- End .clear -->
			
			

<?php
if(isset($_REQUEST['mod']) && $_REQUEST['mod']!="")
{
include "modules/".$_REQUEST['mod'].".php";
}
else
{
include "modules/dashboard.php";
}

include "includes/footer.php";

?>

		</div> <!-- End #main-content -->
		
	</div>
	
	
	</body>
  
</html>
