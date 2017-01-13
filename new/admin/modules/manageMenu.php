<?php

if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$menu_title=$_REQUEST['menu_title'];
$menu_alt=$_REQUEST['menu_alt'];
$menu_link=$_REQUEST['menu_link'];
$menu_target=$_REQUEST['menu_target'];
$menu_parent=$_REQUEST['menu_parent'];
$menu_status=$_REQUEST['menu_status'];

$q="INSERT INTO `cms_menu` (`menu_id` ,`menu_title` ,`menu_alt` ,`menu_link` ,`menu_target` ,`menu_parent` ,`menu_status`)VALUES (NULL , '$menu_title', '$menu_alt', '$menu_link', '$menu_target', '$menu_parent', '$menu_status');";
$qr=mysql_query($q);
//trace($qr);
if($qr)
{
?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Menu " <?php echo $_REQUEST['menu_title']; ?> " Added Successfully !
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
		Failed to Add  Menu Item !  <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
<?php
}


}


if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$menu_id=$_REQUEST['mid'];
		$q="DELETE FROM `cms_menu` WHERE `menu_id`='$menu_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Item Deleted !
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
		Failed to Delete Item !
		</div>
		</div>
		<?php
		
		}
	}
	else if($_REQUEST['action']=="status")
	{
		if($_REQUEST['current']=="active")
		{
			$status="inactive";
		}
		else
		{
			$status="active";
		}
		$menu_id=$_REQUEST['mid'];
		$q="UPDATE `cms_menu` SET `menu_status` = '$status' WHERE `menu_id` ='$menu_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Menu Updated !
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
		Failed to Update Menu ! 
		</div>
		</div>
		<?php
		}	
	}
	else if($_REQUEST['action']=="edit")
	{
		$mid=$_REQUEST['mid'];
		$menu_title=$_REQUEST['menu_title'];
		$menu_alt=$_REQUEST['menu_alt'];
		$menu_link=$_REQUEST['menu_link'];
		$menu_target=$_REQUEST['menu_target'];
		$menu_parent=$_REQUEST['menu_parent'];
		$menu_status=$_REQUEST['menu_status'];
	
		$mid=$_REQUEST['mid'];
		$q="UPDATE `cms_menu` SET `menu_title` = '$menu_title',`menu_alt` = '$menu_alt',`menu_link` = '$menu_link',`menu_target` = '$menu_target',`menu_parent`='$menu_parent',`menu_status` = '$menu_status' WHERE `menu_id` ='$mid';";
		$qr=mysql_query($q);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Menu Updated !
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
		Failed to Update Menu ! 
		</div>
		</div>
		<?php
		}
	
	}
	else if($_REQUEST['action']=='bulkDelete')
	{
		$delMenu=$_REQUEST['delMenu'];
		while (list ($key,$val) = @each ($delMenu))
		{
		$qd="DELETE FROM `cms_menu` WHERE `menu_id`='$val';";
		$qrd=mysql_query($qd);
		}
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Selected Menu Items Deleted !
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
		An error occured while deleting Menu Items !
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
if(document.createMenu.menu_title.value=="")
{
alert("Provide Menu Title");
return false;
}
else if(document.createMenu.menu_link.value=="")
{
alert("Provide Menu Link");
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
					
					<h3>Manage Site Navigation</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Menu Items Listing</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add Menu Item</a></li> <!-- href must be unique and match the id of target div -->

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
		<form action="admin.php?mod=manageMenu&action=bulkDelete&token=<?php echo time(); ?>" method="post">
						<table>
							
							<thead>
								<tr>
							      <th width="20"><input class="check-all" type="checkbox" /></th>
								   <th width="115">Menu Title </th>
								   <th width="76">Preview </th>
								   <th width="111">Parent Menu</th>
								   <th width="111">Menu Status </th>
								   <th width="120">Actions</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
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
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>										</div> End .pagination
										<div class="clear"></div>			-->						</td>
								</tr>
							</tfoot>
							<tbody>
<?php

$q="SELECT * FROM `cms_menu` WHERE 1;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
$menu_parent=$qrow['menu_parent'];
?>
								<tr>
									<td><input type="checkbox" name="delMenu[]" value="<?php echo $qrow['menu_id']; ?>"/></td>
									<td><?php echo $qrow['menu_title']; ?></td>
									<td><a href="<?php echo $qrow['menu_link']; ?>" title="<?php echo $qrow['menu_alt']; ?>" target="_blank"><?php echo $qrow['menu_title']; ?></a></td>
									<td>
									
<?php
if($menu_parent==0)
{
echo "NONE";
}
else
{
$q2="SELECT * FROM `cms_menu` WHERE `menu_id`='$menu_parent'";
$qr2=mysql_query($q2);
$qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC);
echo $qrow2['menu_title'];
}
?>					
									
									</td>
									<td><?php echo $qrow['menu_status']; ?></td>
									<td>
										<!-- Icons -->
										 <a href="admin.php?mod=editMenu&mid=<?php echo $qrow['menu_id'].'&token'.time(); ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&mid='.$qrow['menu_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['menu_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									  <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&current='.$qrow['menu_status'].'&mid='.$qrow['menu_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>			</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
						<input class="button" type="submit" name="bulkDelete" value="Delete Selected" />
				</form>		
					</div> <!-- End #tab1 -->
					<div class="tab-content" id="tab2"> 
					<form name="createMenu" action="admin.php?mod=manageMenu&token=<?php echo time(); ?>" method="post" onsubmit="return validate();">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Menu Title: *</label>
										<input class="text-input small-input" type="text" id="small-input" name="menu_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Menu Hover Text: <small><a href="#" title="This is Menu Hower Text">[?]</a></small> </label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="menu_alt" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Link URL: * <small> ( e.g http://www.mywebsite.com/mylink.html )</small></label>
								  
									<input class="text-input large-input datepicker" type="text" id="large-input" name="menu_link" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<!--	<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<p>
									<label>Link Target: </label>
									<input value="_parent" type="radio" name="menu_target"/> 
									Same Window<br />
									<input value="_blank" type="radio" name="menu_target" />
									New Window </p>
							
							<p>
									<label>Parent Menu Item: </label>              
									<select name="menu_parent" class="small-input">
										<option value="0" selected="selected">None</option>
<?php

$q="SELECT * FROM `cms_menu` WHERE `menu_parent`='0';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
										<option value="<?php echo $qrow['menu_id']; ?>"><?php echo $qrow['menu_title']; ?></option>
<?php
}

?>										
										</select> 
								</p>  
								
								<p>
									<label>Menu Status:</label>              
									<select name="menu_status" class="small-input">
										<option value="active" selected="selected">Active</option>
										<option value="inactive">InActive</option>
									</select> 
								</p>
								
							<!--	<p>
									<label>Page Content:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								<a href="admin.php?mod=manageGallery"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					
					</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->