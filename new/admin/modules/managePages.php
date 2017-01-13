<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
	$page_title		= $_REQUEST['page_title'];
	$page_name		= $_REQUEST['page_name'];
	$page_content	= $_REQUEST['page_content'];
	$page_left		= addslashes($_REQUEST['page_left']);
	$page_metatags	= $_REQUEST['page_metatags'];
	$page_keywords	= $_REQUEST['page_keywords'];
	$page_parent	= $_REQUEST['page_parent'];
	$page_status	= $_REQUEST['page_status'];
	$page_time		= date('l jS \of F Y h:i:s A');
	$page_type		= $_REQUEST['page_type'];
	
	$page_file_content=$page_content;


$q="INSERT INTO `cms_pages` 
(`page_id` ,`page_title` ,`page_name` ,`page_content` ,`left_content` ,`page_metatags` ,`page_keywords` ,`page_parent` ,`page_time` ,`page_status` ,`page_type`)
VALUES ('','$page_title', '$page_name', '$page_file_content', '$page_left', '$page_metatags', '$page_keywords', '$page_parent', '$page_time', '$page_status', '$page_type');";
$qr=mysql_query($q);

//$qr=mysql_query($q);
//trace($qr);
if($qr)
{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Page "<?php echo $_REQUEST['page_name']; ?>: Added Successfully !
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
		Failed to Add "<?php echo $_REQUEST['page_name']; ?>" Page !  <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
		<?php
}


}

if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$page_id=$_REQUEST['pid'];
		$q="DELETE FROM `cms_pages` WHERE `page_id`='$page_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Page Deleted !
		</div>
		</div>
		<?php
		}
		else
		{
		?>
		<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Delete Page !
		</div>
		</div>
		<?php
		
		}
	}
	else if($_REQUEST['action']=="status")
	{
		if($_REQUEST['current']=="Active")
		{
			$status="InActive";
		}
		else
		{
			$status="Active";
		}
		$page_id=$_REQUEST['pid'];
		$q="UPDATE `cms_pages` SET `page_status` = '$status' WHERE `page_id` ='$page_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Page Updated !
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
		Failed to Update Page ! 
		</div>
		</div>
		<?php
		}	
	}
	else if($_REQUEST['action']=="edit")
	{
		
	
	$pid=$_REQUEST['page_id'];
	
		$page_title		= $_REQUEST['page_title'];
		$page_name		= $_REQUEST['page_name'];
		$page_content	= $_REQUEST['page_content'];
		$page_left		= addslashes($_REQUEST['page_left']);
		$page_metatags	= $_REQUEST['page_metatags'];
		$page_keywords	= $_REQUEST['page_keywords'];
		$page_parent	= $_REQUEST['page_parent'];
		$page_status	= $_REQUEST['page_status'];
		$page_time		= date('l jS \of F Y h:i:s A');
		$page_type		= $_REQUEST['page_type'];
		
		$page_file_content=$page_content;

		
		
	$q="UPDATE `cms_pages` SET `page_title` = '$page_title',`page_name` = '$page_name',`page_content` = '$page_file_content',
	`left_content`='$page_left',`page_metatags`='$page_metatags',`page_keywords`='$page_keywords',`page_parent` = '$page_parent',`page_time`='$page_time',
	`page_status` = '$page_status',`page_type` = '$page_type' WHERE `page_id` ='$pid';";
	
	//print_r($_POST);
		$qr=mysql_query($q);
		
	//$qr=mysql_query($q);
//trace($qr);
	if($qr)
	{
	?>
	<div class="notification success png_bg">
	<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
	<div>
	Page Updated !
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
	Failed to Update Page ! 
	</div>
	</div>
	<?php
	}	
	
	}
	else if($_REQUEST['action']=='bulkDelete')
	{
		$delPages=$_REQUEST['delPages'];
		while (list ($key,$val) = @each ($delPages))
		{
		$qd="DELETE FROM `cms_pages` WHERE `page_id`='$val';";
		$qrd=mysql_query($qd);
		}
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Selected Pages Deleted !
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
		An error occured while deleting Pages !
		</div>
		</div>
		<?php
		
		}
	}
	
}

?>
<script>
function validate()
{
if(document.createPage.page_title.value=="")
{
alert("Provide Page Title");
document.createPage.page_title.focus();
return false;
}
else if(document.createPage.page_name.value=="")
{
alert("Provide Page Name");
document.createPage.page_name.focus();
return false;
}
else if(document.createPage.page_type.value=="0")
{
alert("Please select page type");
document.createPage.page_type.focus();
return false;
}
else
{
return true;
}

}
</script>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content Page Listing</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage Content Pages</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add Content Page</a></li> <!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<!-- <div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div> -->
	<form name="delPageForm" action="admin.php?mod=managePages&action=bulkDelete&token=<?php echo time(); ?>" method="post">
						<table>
							
							<thead>
								<tr>
								   <th width="20"><input class="check-all" type="checkbox" /></th>
								   <th width="80">Page Name </th>
								   <th width="102">Menu Preview </th>
								   <th width="83">Page Status </th>
								   <th width="147">Last Update </th>
								   <th width="131"> Parent Page </th>
								   <th width="120">Actions</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="7">
									<!--	<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div> -->
										
									<!--	<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>										</div>  End .pagination 
										<div class="clear"></div>	-->								</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<?php

$q="SELECT * FROM `cms_pages` WHERE 1;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
$page_parent=$qrow['page_parent'];
?>
								<tr>
									<td><input type="checkbox" name="delPages[]" value="<?php echo $qrow['page_id']; ?>"/></td>
									<td><?php echo $qrow['page_title']; ?></td>
									<td><a href="<?php echo $xsuite_http_site."/index.php?page=".$qrow['page_id']; ?>" title="<?php echo $qrow['page_menu_alt']; ?>" target="_blank"><?php echo $qrow['page_menu_title']; ?></a></td>
									<td><?php echo $qrow['page_status']; ?></td>
									<td><?php echo $qrow['page_time']; ?></td>
									<td>
<?php
if($page_parent==0)
{
echo "NONE";
}
else
{
$q2="SELECT * FROM `cms_pages` WHERE `page_id`='$page_parent';";
$qr2=mysql_query($q2);
$qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC);
echo $qrow2['page_title'];
}
?>					

									</td>
									<td>
										<!-- Icons -->
										<a href="admin.php?mod=editPage&pid=<?php echo $qrow['page_id'].'&token='.time(); ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&pid='.$qrow['page_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['page_menu_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&current='.$qrow['page_status'].'&pid='.$qrow['page_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>							</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
						<input type="submit" name="bulkDelete" value="Delete Selected" class="button" />
						</form>
					</div> <!-- End #tab1 -->
						<div class="tab-content" id="tab2"> 
<?php /*?><form name="createPage" action="admin.php?mod=managePages&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Page Title: * <small>( Text to Show in Title Bar of Browser )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="page_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Page Name: * <small>( Unique Name of Your Page )</small></label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="page_name" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
								<label>Page Menu Title: * <small>( Text to Show on Menu Item of This Page )</small></label>
									<input class="text-input small-input" type="text" id="medium-input" name="page_menu_title" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Page Menu Hover Text:  <small><a href="#" title="This is Menu Hower Text">[?]</a></small></label>
									<input class="text-input small-input" type="text" id="medium-input" name="page_menu_alt" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<p>
									<label>Page Heading:  </small></label>
									<input class="text-input small-input" type="text" id="medium-input" name="page_heading" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Page Color:  </small></label>
									<input class="color" type="text" id="medium-input" name="page_color" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Page Image:  </small></label>
									<input class="text-input small-input" type="file" id="medium-input" name="page_image" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<!--	<p>
									<label>File Name:</label>
									<input class="text-input small-input datepicker" type="text" id="page_file" name="page_file" /> 
									 <span class="input-notification error png_bg">Error message</span> 
								</p> 
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<!-- <p>
									<label>Page Type: </label>
									<input value="dynamic" type="radio" name="page_type" /> 
									Dynamic<br />
									<input value="static" type="radio" name="page_type" />
									HTML File </p> -->
									<input type="hidden" name="page_type" value="dynamic" />
						<p>
									<label>Parent Menu Item: </label>              
									<select name="page_parent" class="small-input">
										<option value="0" selected="selected">None</option>
<?php

$q="SELECT * FROM `cms_pages` WHERE `page_parent`='0';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
										<option value="<?php echo $qrow['page_id']; ?>"><?php echo $qrow['page_title']; ?></option>
<?php
}

?>										
										</select> 
								</p> 
								<p>
									<label>Page Status:</label>              
									<select name="page_status" class="small-input">
										<option value="Active" selected="selected">Active</option>
										<option value="InActive">InActive</option>
									</select> 
								</p> 
								
								<p>
								<!-- text-input textarea  -->
									<label>Page Content: *</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="page_content" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
									<a href="admin.php?mod=managePages"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form><?php */?>
						<form name="createPage" action="admin.php?mod=managePages&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Page Title: * <small>( Text to Show in Title Bar of Browser )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="page_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Page Name: * <small>( Unique Name of Your Page )</small></label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="page_name" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								<p>
									<label>Page Parent: </label>              
									<select name="page_parent" class="small-input">
										<option value="0" selected="selected">None</option>
<?php

$q="SELECT * FROM `cms_pages` WHERE `page_parent`='0';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
										<option value="<?php echo $qrow['page_id']; ?>"><?php echo $qrow['page_title']; ?></option>
<?php
}

?>										
										</select> 
								</p> 
								<p>
									<label>Page Status:</label>              
									<select name="page_status" class="small-input">
										<option value="Active" selected="selected">Active</option>
										<option value="InActive">InActive</option>
									</select> 
								</p>
								<p>
									<label>Page Type: *</label>              
									<select name="page_type" class="small-input">
										<option value="content">Content</option>
										<option value="directory">Directory</option>
										<option value="locations">Locations Template</option>										
										<option value="faq">FAQ's Template</option>										
										<option value="news">News Template</option>	
										<option value="family-office-news">Family Office News Template</option>
										<option value="white-papers">White Papers Template</option>
										<option value="press-release">Press Release Template</option>
										<option value="luxury-news">Luxury News Template</option>
										<option value="current-events">Current Events Template</option>										
										<option value="team">Team Template</option>										
										<option value="contact">Contact Template</option>										
										<option value="register">Register Template</option>	
											<option value="aviation">Aviation</option>
										<option value="automotive">Automotive</option>
										<option value="fashion">Fashion</option>
										<option value="homes">Homes</option>
										<option value="travel">Travel</option>
										<option value="culinary">Culinary</option>										
										<option value="liquor">Liquor</option>										
										<option value="technology">Technology</option>										
										<option value="gallery">Gallery</option>
										<option value="membership">Membership</option>
										<option value="family-office-asset-managers">Family Office Asset Managers</option>
										<option value="family-office-membership">Family Office Membership</option>
										<option value="family-office-service-providers">Family Office Service Providers</option>
										<option value="other">Other Family Office Membership</option>
										<option value="submitnews">Submit News</option>
										<option value="sponsorship">Sponsorship</option>
										
									</select> 
								</p> 
								
								<p>
								<!-- text-input textarea  -->
									<label>Page Content: </label>
									<textarea class="text-input textarea" id="page_content"name="page_content" cols="79" rows="15"></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'page_content', {
										extraPlugins: 'imageuploader'
									});
								</script>
								</p>

								<p>
								<!-- text-input textarea  -->
									<label>Page Left Content: </label>
									<textarea class="text-input textarea" id="page_left"  name="page_left" cols="79" rows="15"></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'page_left', {
										extraPlugins: 'imageuploader'
									});
								</script>
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Meta tags: </label>
									<textarea class="text-input textarea " id="textarea" name="page_metatags" cols="79" rows="10"></textarea>
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Keywords: </label>
									<textarea class="text-input textarea " id="textarea" name="page_keywords" cols="79" rows="10"></textarea>
								</p>								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								<a href="admin.php?mod=managePages"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
						</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->