<script>
function editSeq(img_id)
{
var seq=prompt("Enter New Sequence");
if(seq!=null && seq!="")
{
location.href="admin.php?mod=manageImages&action=editSeq&img_id="+img_id+"&seq="+seq+"&gal=<?php echo $_REQUEST['gal']; ?>&token=<?php echo time(); ?>";
return true;
}
return false;
}

</script>
<?php
if(isset($_REQUEST['upflag'])&& $_REQUEST['upflag']==1 && !isset($_REQUEST['action']))
{
?>

		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Image Uploaded Successfully !
		</div>
		</div>
<?php
}

if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$image_title=$_REQUEST['image_title'];
$image_gallery=$_REQUEST['gal'];
$image_dir=$_REQUEST['gal'];
$image_thumb=$_FILES['image_thumb']['name'];
$image_main=$_FILES['image_main']['name'];
$image_time=date('l jS \of F Y h:i:s A');
$image_seq=$_REQUEST['image_seq'];

//trace($qr);

$thumb=move_uploaded_file($_FILES['image_thumb']['tmp_name'],"../gallery/".$image_dir."/".$_FILES['image_thumb']['name']);
$main=move_uploaded_file($_FILES['image_main']['tmp_name'],"../gallery/".$image_dir."/".$_FILES['image_main']['name']);
if($thumb && $main)
{

$q="INSERT INTO `gal_image` (`image_id` ,`image_title` ,`image_thumb` ,`image_main` ,`image_dir` ,`image_gallery` ,`image_time` ,`img_seq`)VALUES (NULL , '$image_title', '$image_thumb', '$image_main', '$image_dir', '$image_gallery', '$image_time', '$image_seq');";
$qr=mysql_query($q);
if($qr)
{
?>
<script>
location.href="admin.php?mod=manageImages&token=1268066143&gal=<?php echo $_REQUEST['gal']; ?>&upflag=1";
</script>

<?php

}
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Image Uploaded Successfully !
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
		Failed to Upload Image !  <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
		<?php

}


}


if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$image_id=$_REQUEST['img_id'];
		$q="DELETE FROM `gal_image` WHERE `image_id`='$image_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Image Deleted !
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
		Failed to Delete Image !
		</div>
		</div>
		<?php
		
		}
	}
	else if($_REQUEST['action']=='bulkDelete')
	{
		$imgDel=$_REQUEST['imgDel'];
		//$image_id=$_REQUEST['img_id'];
		while (list ($key,$val) = @each ($imgDel))
		{
		$qd="DELETE FROM `gal_image` WHERE `image_id`='$val';";
		$qrd=mysql_query($qd);
		}
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Selected Images Deleted !
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
		An error occured while deleting images !
		</div>
		</div>
		<?php
		
		}
	}
	else if($_REQUEST['action']=="editSeq")
	{
	
		$imgID=$_REQUEST['img_id'];
		$imgSeq=$_REQUEST['seq'];
		$qd="UPDATE `gal_image` SET `img_seq`='$imgSeq' WHERE `image_id`='$imgID';";
		$qrd=mysql_query($qd);
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Image Sequence Updated !
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
		Failed to Update Image Sequence !
		</div>
		</div>
		<?php
		
		}
	
	}
	
}
$gal_name=$_REQUEST['gal'];
?>
<form action="admin.php?mod=manageImages&gal=<?php echo $gal_name; ?>&action=bulkDelete" method="post">
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Manage Images</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Image Listing</a></li> <!-- href must be unique and match the id of target div -->

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
							      <th width="20"><input class="check-all" type="checkbox" /></th>
								   <th width="115">Image Preview </th>
								   <th width="115">Image Title  </th>
								   <th width="128">Image Gallery</th>
								   <th width="316">Image Sequence</th>
								   <th width="316">Actions</th>
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
$gal_name=$_REQUEST['gal'];
$q="SELECT * FROM `gal_image` WHERE `image_gallery`='$gal_name' ORDER BY `img_seq`;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
								<tr>
									<td><input type="checkbox" name="imgDel[]" value="<?php echo $qrow['image_id']; ?>"/></td>
									<td><img src="<?php echo "imageResize.php?image=../gallery/".$qrow['image_dir']."/".$qrow['image_main']; ?>&scale=15" alt="<?php echo $qrow['image_title']; ?>" /></td>
									<td><?php echo $qrow['image_title']; ?></td>
									<td><?php echo $qrow['image_gallery']; ?></td>
									<td><?php echo $qrow['img_seq']; ?></td>
									<td>
										<!-- Icons -->
									<a href="#" onclick="return editSeq('<?php echo $qrow['image_id']; ?>');" title="Edit Sequence"><img src="resources/images/icons/pencil.png" alt="Edit Sequence" /></a> 
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&img_id='.$qrow['image_id']; ?>&gal=<?php echo $gal_name; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['gallery_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										<!--  <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&mid='.$qrow['image_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>							-->		</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
							<a href="admin.php?mod=manageGallery"><input class="button" type="button" name="Back" value="Back" /></a> <input class="button" type="submit" name="bulkDelete" value="Delete Selected" /> <a href="admin.php?mod=uploadImage&gal=<?php echo $_REQUEST['gal']; ?>"><input class="button" type="button" name="Back" value="Upload Image" /></a>
					</div> <!-- End #tab1 -->
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->
</form>