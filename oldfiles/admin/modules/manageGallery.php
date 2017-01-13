<script>
function editSeq(gal_id)
{
var seq=prompt("Enter New Sequence");
if(seq!=null && seq!="")
{
location.href="admin.php?mod=manageGallery&action=updateSeq&gid="+gal_id+"&seq="+seq+"&token=<?php echo time(); ?>";
return true;
}
return false;
}

</script>
<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$gallery_title=$_REQUEST['gallery_title'];
$gallery_name=$_REQUEST['gallery_folder'];
$gallery_folder=$_REQUEST['gallery_folder'];
$gallery_xml=$_REQUEST['gallery_folder'].".xml";
$gallery_parent=0;
$gallery_status=$_REQUEST['gallery_status'];
$gallery_seq=$_REQUEST['gallery_sequence'];

$q="INSERT INTO `gal_galleries` (`gallery_id` ,`gallery_title` ,`gallery_name` ,`gallery_parent` ,`gallery_folder` ,`gallery_xml` ,`gallery_seq` ,`gallery_status`)VALUES (NULL , '$gallery_title', '$gallery_name', '$gallery_parent', '$gallery_folder', '$gallery_xml', '$gallery_seq', '$gallery_status');";
$qr=mysql_query($q);
//trace($qr);
if($qr && @mkdir("../gallery/".$gallery_name,0777))
{

// create folder
// generate xml
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Gallery Created
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
		Failed to Create Gallery  <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
		<?php

}


}

?>
<?php
if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$gallery_id=$_REQUEST['gid'];
		$q="DELETE FROM `gal_galleries` WHERE `gallery_id`='$gallery_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Gallery Deleted !
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
		Failed to Delete Gallery ! 
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
		$gallery_id=$_REQUEST['gid'];
		$q="UPDATE `gal_galleries` SET `gallery_status` = '$status' WHERE `gallery_id` ='$gallery_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Gallery Updated !
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
		Failed to Update Gallery ! 
		</div>
		</div>
		<?php
		}	
	}
	else if($_REQUEST['action']=="edit")
	{
		$gallery_id=$_REQUEST['gal_id'];
		$gallery_title=$_REQUEST['gallery_title'];
		$gallery_name=$_REQUEST['gallery_folder'];
		$gallery_folder=$_REQUEST['gallery_folder'];
		$gallery_xml=$_REQUEST['gallery_folder'].".xml";
		$gallery_parent=0;
		$gallery_status=$_REQUEST['gallery_status'];
		$gallery_seq=$_REQUEST['gallery_sequence'];

		$q="UPDATE `gal_galleries` SET `gallery_title` = '$gallery_title',`gallery_seq`='$gallery_seq',`gallery_status` = '$gallery_status' WHERE `gallery_id` ='$gallery_id';";
		$qr=mysql_query($q);
		//trace($qr);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Gallery Updated ! 
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
		Failed to Update Gallery ! 
		</div>
		</div>
		<?php
		
		}

	}
	else if($_REQUEST['action']=="updateSeq")
	{
		$gallery_id=$_REQUEST['gid'];
		$gallery_seq=$_REQUEST['seq'];

		$q="UPDATE `gal_galleries` SET `gallery_seq` = '$gallery_seq' WHERE `gallery_id` ='$gallery_id';";
		$qr=mysql_query($q);
		//trace($qr);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Gallery Sequence Updated ! 
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
		Failed to Update Gallery Sequence ! 
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
if(document.createGal.gallery_title.value=="")
{
alert("Provide Gallery Title");
return false;
}
else if(document.createGal.gallery_folder.value=="")
{
alert("Provide Gallery Folder Name");
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
					
					<h3>Manage Image Galleries</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Gallery Listing</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add Image Gallery</a></li> <!-- href must be unique and match the id of target div -->

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
						
						<table>
							
							<thead>
								<tr>
							    <!--  <th width="20"><input class="check-all" type="checkbox" /></th> -->
								   <th width="115">Gallery Title </th>
								   <th width="115">Gallery Folder  </th>
								   <th width="128">Gallery Status</th>
								   <th width="121">Gallery Sequence </th>
								   <th width="121">Actions</th>
								   <th width="149">Upload Images</th>
								   <th width="149">List Images</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="8">
									<!--	<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div> -->
										
								<!--		<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>										</div> End .pagination
										<div class="clear"></div>	 -->						</td>
								</tr>
							</tfoot>
							<tbody>
<?php

$q="SELECT * FROM `gal_galleries` ORDER BY `gallery_seq`;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
								<tr>
								<!--	<td><input type="checkbox" /></td> -->
									<td><?php echo $qrow['gallery_title']; ?></td>
									<td><?php echo $qrow['gallery_folder']; ?></td>
									<td><?php echo $qrow['gallery_status']; ?></td>
									<td>[<a href="#" onclick="return editSeq('<?php echo $qrow['gallery_id']; ?>');" title="Edit Sequence"> <?php echo $qrow['gallery_seq']; ?> </a>]</td>
									<td>
										<!-- Icons -->
										<a href="admin.php?mod=editGallery&gid=<?php echo $qrow['gallery_id'].'&token='.time(); ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 									
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&current='.$qrow['gallery_status'].'&gid='.$qrow['gallery_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> 
										  <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&gid='.$qrow['gallery_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['gallery_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a>	</td>
								    <td><form name="uploadImage" action="admin.php?mod=uploadImage&gal=<?php echo $qrow['gallery_name']; ?>" method="post"> <input type="submit" name="upload" value="Upload Image" /></form></td>
								    <td><form name="listImage" action="admin.php?mod=manageImages&gal=<?php echo $qrow['gallery_name']; ?>" method="post"> <input type="submit" name="upload" value="List Images" /></form></td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
					
					</div> <!-- End #tab1 -->
					<div class="tab-content" id="tab2">
					<form name="createGal" action="admin.php?mod=manageGallery&token=<?php echo time(); ?>" method="post" onsubmit="return validate();">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Gallery Title:</label>
										<input class="text-input small-input" type="text" id="small-input" name="gallery_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Gallery Folder:</label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="gallery_folder" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
						<p>
									<label>Gallery Sequence:</label>
									<input class="text-input small-input" type="text" id="medium-input" name="gallery_sequence" value="0"/> <!-- <span class="input-notification error png_bg">Error message</span> -->
					</p>
							<!--<p>
									<label>Gallery URL:</label>
									<input class="text-input large-input datepicker" type="text" id="large-input" name="menu_link" />  <span class="input-notification error png_bg">Error message</span> 
								</p>
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
								
								<p>
									<label>Gallery Status:</label>              
									<select name="gallery_status" class="small-input">
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