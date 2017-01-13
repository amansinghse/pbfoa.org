<script>
function validate()
{
if(document.createPage.cat_title.value=="")
{
alert("Please enter Category Title");
document.createPage.cat_title.focus();
return false;
}
return true;
}
</script>


<?php 


if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$cat_title = $_REQUEST['cat_title'];
$cat_parent = $_REQUEST['cat_parent'];
$page_status = $_REQUEST['page_status'];
$post_short = $_REQUEST['post_short'];
$cat_content = $_REQUEST['cat_content'];

$cat_img = $_FILES['cat_img']['name'];

// cat_img cat_parent page_status cat_content

//trace($qr);
$thumb = '';


$thumb = move_uploaded_file($_FILES['cat_img']['tmp_name'],"../images/posts/".$_FILES['cat_img']['name']);



$q = "INSERT INTO `manage_posts` (`post_id` ,`post_title` ,`post_image` ,`post_desc` ,`post_short` ,`post_status` ,`cate_id` )VALUES (NULL , '$cat_title', '$cat_img', '$cat_content', '$post_short', '$page_status', '$cat_parent');";

$qr=mysql_query($q);
if($qr)
{
?>
<script>
location.href="admin.php?mod=managePosts&token=1268066143&gal=<?php echo $_REQUEST['gal']; ?>&upflag=1";
</script>

<?php

}
		?>
		
		
	
		<?php



}


if(isset($_REQUEST['action']))
{
	
	if($_REQUEST['action']=='delete')
	{
		$image_id = $_REQUEST['post_id'];
		$q="DELETE FROM `manage_posts` WHERE `post_id`='$image_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Post Deleted !
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
		Failed to Delete Post !
		</div>
		</div>
		<?php
		
		}
	}
	
	else if($_REQUEST['action']=="edit")
	{
		
		$cat_title = $_REQUEST['cat_title'];
		$cat_parent = $_REQUEST['cat_parent'];
		$page_status = $_REQUEST['page_status'];
		$cat_content = $_REQUEST['cat_content'];
		$post_short = $_REQUEST['post_short'];
		$cateId = $_REQUEST['cateId'];
		$cat_img = $_FILES['cat_img']['name'];
		$oldImage =  $_REQUEST['cat_prev_image'];
		
		// cat_img cat_parent page_status cat_content
		
		//trace($qr);
		$thumb = '';
		
		if($_FILES['cat_img']['size']>0){
			$thumb = move_uploaded_file($_FILES['cat_img']['tmp_name'],"../images/posts/".$_FILES['cat_img']['name']);
			@unlink("../images/posts/".$oldImage);
			$thumb = $_FILES['cat_img']['name'];
		}
		else
			$thumb = $oldImage;
		
		$query = "UPDATE `manage_posts` SET 
		`post_title` = '$cat_title',
		`post_image` = '$thumb',
		`post_desc` = '$cat_content',
		`post_short` = '$post_short',
		`post_status` = '$page_status',
		`cate_id` = '$cat_parent'
		
		WHERE post_id = '$cateId'
		";
		
		
	
	
		
		$qrd=mysql_query($query);
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Post Updated !
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
		Failed to Update Post !
		</div>
		</div>
		<?php
		
		}
	
	}
	
}
?>

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Manage Posts</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage Posts</a></li> <!-- href must be unique and match the id of target div -->					<li><a href="#tab2" >Add Post</a></li>

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
							     
								   <th width="315">Image Preview </th>
								   <th width="315">Post Title  </th>
								   <th width="228">Post Status</th>
                                   
								   <th width="316">Actions</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="4">
														</td>
								</tr>
							</tfoot>
							<tbody>
<?php
$gal_name=$_REQUEST['gal'];
$q="SELECT * FROM `manage_posts` WHERE 1 ORDER BY `post_id` DESC;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
								<tr>
									
									<td><img src="<?php echo "imageResize.php?image=../images/posts/".$qrow['post_image']; ?>&width=50&height=50" alt="<?php echo $qrow['image_title']; ?>" /></td>
									<td><?php echo $qrow['post_title']; ?></td>
									<td><?php echo $qrow['post_status']==1?'Active':'Inactive'; ?></td>
									
									<td>
										<!-- Icons -->
									<a href="<?php echo 'admin.php?mod=editPost'.'&action=edit&post_id='.$qrow['post_id']; ?>"  title="Edit Category"><img src="resources/images/icons/pencil.png" alt="Edit Category" /></a> 
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&post_id='.$qrow['post_id']; ?>&gal=<?php echo $gal_name; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['cat_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
												</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
							

					</div> <!-- End #tab1 -->
                    <div class="tab-content" id="tab2">
						<form name="createPage" action="admin.php?mod=managePosts&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">

							

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Post Title: * </label>  

										<input class="text-input small-input" type="text" id="small-input" name="cat_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->

										<br />

								</p>
								<p>

									<label>Post Image: * </label>

									<input class="text-input small-input" type="file" id="medium-input" name="cat_img" /> <!-- <span class="input-notification error png_bg">Error message</span> -->

								</p>
								<p>

									<label>Post Category: </label>              

									<select name="cat_parent" class="small-input">

										<option value="0" selected="selected">None</option>

<?php



$q="SELECT * FROM `manage_cate` WHERE cat_status = 1;";

$qr=mysql_query($q);

while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))

{

?>

										<option value="<?php echo $qrow['cat_id']; ?>"><?php echo $qrow['cat_title']; ?></option>

<?php

}
?>										

										</select> 

								</p> 

								<p>

									<label>Post Status:</label>              

									<select name="page_status" class="small-input"> 

										<option value="1" selected="selected">Active</option>

										<option value="0">InActive</option>

									</select> 

								</p>


								<p>

								<!-- text-input textarea  -->

									<label>Post Content: </label>

									<textarea class="text-input textarea" id="cat_content"name="cat_content" cols="79" rows="15"></textarea>

									<script type="text/javascript">
										CKEDITOR.replace( 'cat_content', {
										  extraPlugins: 'imageuploader'
										});
									</script>

								</p>
								
								<p>

								<!-- text-input textarea  -->

									<label>Short Content: </label>

									<textarea class="text-input textarea" id="post_short"name="post_short" cols="79" rows="10"></textarea>

								

								</p>



								<script type="text/javascript">
										CKEDITOR.replace( 'post_short', {
										  extraPlugins: 'imageuploader'
										});
									</script>

													

								<p>

									<input class="button" type="submit" value="Submit" name="submit" />

								

								</p>

								

							</fieldset>

							

							<div class="clear"></div><!-- End .clear -->

							

						</form>

						

						</div>
</div>
</div>
 <!-- End .content-box-content -->
				
 <!-- End .content-box -->
