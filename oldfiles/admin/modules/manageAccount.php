<?php
if(isset($_REQUEST['submit']) && isset($_REQUEST['token']))
{
$admin_user_id=$_REQUEST['admin_user_id'];
$admin_user_pass=$_REQUEST['admin_user_pass'];

$q="UPDATE `admin_users` SET `adminUserPass`='$admin_user_pass' WHERE `adminUserID`='$admin_user_id';";
$qr=mysql_query($q);

 if($qr)
 { 
	
?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Account Updated !
		</div>
		</div>
		<?php
	
	}
	else
	{
		?>
		<div class="notification error png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Update Account !
		</div>
		</div>
		<?php
	
	
	}
	
}


?>
<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Account Settings</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Admin Account</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 


<form name="adminAccount" action="admin.php?mod=manageAccount&token=<?php echo time(); ?>" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							<input type="hidden" name="admin_user_id" value="<?php echo $_SESSION["xsuite_admin_id"]; ?>"/>
							<p>
									<label>Admin Username:</label>
										<input class="text-input small-input" type="text" id="small-input" name="admin_user_name" value="<?php echo $_SESSION["xsuite_admin_name"]; ?>" disabled="disabled"/> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>	
								
								
								<p>
									<label>Admin Email:</label>
										<input class="text-input small-input" type="text" id="small-input" name="admin_user_pass" value="<?php echo $_SESSION["xsuite_admin_email"]; ?>" disabled="disabled"/> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>		
								<p>
									<label>Admin Password:</label>
										<input class="text-input small-input" type="password" id="small-input" name="admin_user_pass" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>	
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->