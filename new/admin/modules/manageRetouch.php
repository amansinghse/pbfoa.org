<script>
function editSeq(img_id)
{
var seq=prompt("Enter New Sequence");
if(seq!=null && seq!="")
{
location.href="admin.php?mod=manageRetouch&action=edit&img_id="+img_id+"&seq="+seq+"&token=<?php echo time(); ?>";
return true;
}
return false;
}

</script>
<?php
if(isset($_REQUEST['upflag']) && $_REQUEST['upflag']==1 && !isset($_REQUEST['action']))
{
	?>
	
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Images Uploaded !
		</div>
		</div>
		
<?php
}
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{

$image_before=$_FILES['image_file_before']['name'];
$image_after=$_FILES['image_file_after']['name'];
$image_caption=$_REQUEST['image_caption'];
$image_seq=$_REQUEST['image_seq'];

if(!empty($_FILES['image_file_before']['tmp_name']))
{

$before=move_uploaded_file($_FILES['image_file_before']['tmp_name'], "../gallery/retouch/images/".$_FILES['image_file_before']['name']);
$after=move_uploaded_file($_FILES['image_file_after']['tmp_name'],'../gallery/retouch/images/'.$_FILES['image_file_after']['name']);

    if($before && $after)
	{ 
	
	$q="INSERT INTO `gal_retouch` (`img_id` ,`img_before` ,`img_after` ,`img_caption` ,`img_seq`)VALUES (NULL , '$image_before', '$image_after', '$image_caption', '$image_seq');";
	$qr=mysql_query($q);
	if($qr)
	{
	?>
	<script>
	location.href="admin.php?mod=manageRetouch&upflag=1&token=<?php echo time(); ?>"
	</script>
	<?php
	//redirect
	
	}
	
	}		
	else
	{
	
		?>
		<div class="notification error png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Upload Image(s) ! <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
		<?php
	
	}
	
}

else
	{
	
		?>
		<div class="notification error png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Perform Operation ! <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
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
		$img_id=$_REQUEST['img_id'];
		$q="DELETE FROM `gal_retouch` WHERE `img_id`='$img_id';";
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
		$qd="DELETE FROM `gal_retouch` WHERE `img_id`='$val';";
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
	else if($_REQUEST['action']=="edit")
	{
	
		$imgID=$_REQUEST['img_id'];
		$imgSeq=$_REQUEST['seq'];
		$qd="UPDATE `gal_retouch` SET `img_seq`='$imgSeq' WHERE `img_id`='$imgID';";
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

?>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Manage Before After Images Gallery </h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Retouched Image Listing</a></li> 
						<!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Upload Retouched Images</a></li> 

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<form action="admin.php?mod=manageRetouch&action=bulkDelete&token=<?php echo time(); ?>" method="post">
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
								   <th width="115">Image Before </th>
								   <th width="115">Image After </th>
								   <th width="128">Image Sequence </th>
								   <th width="316">Actions</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="5">
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

$q="SELECT * FROM `gal_retouch` ORDER BY `img_seq`;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
								<tr>
									<td><input type="checkbox" name="imgDel[]" value="<?php echo $qrow['img_id']; ?>" /></td>
									<td><img src="imageResize.php?image=../gallery/retouch/images/<?php echo $qrow['img_before']; ?>&scale=15" alt="Before"/></td>
									<td><img src="imageResize.php?image=../gallery/retouch/images/<?php echo $qrow['img_after']; ?>&scale=15" alt="After"/></td>
									<td align="center" valign="middle"> [ <?php echo $qrow['img_seq']; ?> ]     </td>
									<td>
										<!-- Icons -->
										   <a href="#" onclick="return editSeq('<?php echo $qrow['img_id']; ?>');" title="Edit Sequence"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										<a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&img_id='.$qrow['img_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['gallery_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										<!--  <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&mid='.$qrow['img_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>							-->		</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
						<input type="submit" name="bulkDelete" value="Delete Selected" class="button" />
					</div> <!-- End #tab1 -->
					</form>
			<div class="tab-content" id="tab2">
			<form name="uploadImage" action="admin.php?mod=manageRetouch&token=<?php echo time(); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Browse Before Image:</label>
										<input class="medium-input" type="file" id="medium-input" name="image_file_before" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>		
								<p>
									<label>Browse After Image:</label>
										<input class="medium-input" type="file" id="medium-input" name="image_file_after" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>	
								<p>
									<label>Image Caption: <small>( A brief description of image )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="image_caption" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Image Sequence: <small>( 0 for displaying image at first position )</small></label>
									<input class="text-input small-input" type="text" id="small-input" name="image_seq" value="1" /> 
							<!--	<p>
									<label>Description:</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" /> <span class="input-notification error png_bg"> Error message </span>
								</p>
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<!-- <p>
									<label>Image Type: </label>
									<input type="radio" name="image_type" value="hq"/> 
									H.Q.<br />
									<input type="radio" name="image_type" value="hd" />
									H.D. </p>
								
							<p> -->
																
							<!--	<p>
									<label>Image Caption:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="image_caption" cols="79" rows="15"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>

			</div>
			
</div> <!-- End .content-box-content -->			
</div> <!-- End .content-box -->