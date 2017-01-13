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
$cat_content = addslashes($_REQUEST['cat_content']);

$cat_img = $_FILES['cat_img']['name'];

// cat_img cat_parent page_status cat_content

//trace($qr);
$thumb = '';


$thumb = move_uploaded_file($_FILES['cat_img']['tmp_name'],"../images/category/".$_FILES['cat_img']['name']);



$q = "INSERT INTO `manage_cate` (`cat_id` ,`cat_title` ,`cat_thumb` ,`cat_parent` ,`cat_status` ,`cat_content` )VALUES (NULL , '$cat_title', '$cat_img', '$cat_parent', '$page_status', '$cat_content');";

$qr=mysql_query($q);
if($qr)
{
?>
<script>
location.href="admin.php?mod=manageCategories&token=1268066143&gal=<?php echo $_REQUEST['gal']; ?>&upflag=1";
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
		$image_id=$_REQUEST['cat_id'];
		$q="DELETE FROM `manage_cate` WHERE `cat_id`='$image_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Category Deleted !
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
		Failed to Delete Category !
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
		$cat_content = addslashes($_REQUEST['cat_content']);
		$cateId = $_REQUEST['cateId'];
		$cat_img = $_FILES['cat_img']['name'];
		$oldImage =  $_REQUEST['cat_prev_image'];
		
		// cat_img cat_parent page_status cat_content
		
		//trace($qr);
		$thumb = '';
		
		if($_FILES['cat_img']['size']>0){
			$thumb = move_uploaded_file($_FILES['cat_img']['tmp_name'],"../images/category/".$_FILES['cat_img']['name']);
			@unlink("../images/category/".$oldImage);
			$thumb = $_FILES['cat_img']['name'];
		}
		else
			$thumb = $oldImage;
		
		$query = "UPDATE `manage_cate` SET 
		`cat_title` = '$cat_title',
		`cat_thumb` = '$thumb',
		`cat_status` = '$page_status',
		`cat_content` = '$cat_content'
		WHERE cat_id = '$cateId'
		";
		
		
	
	
		
		$qrd=mysql_query($query);
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Category  Updated !
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
		Failed to Update Category !
		</div>
		</div>
		<?php
		
		}
	
	}
	
}
?>

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Manage Categories</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage Categories</a></li> <!-- href must be unique and match the id of target div -->					<li><a href="#tab2" >Add Category</a></li>

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
								   <th width="315">Category Title  </th>
								   <th width="228">Category Status</th>
                                   
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
$q="SELECT * FROM `manage_cate` WHERE 1 ORDER BY `cat_id` DESC;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
								<tr>
									
									<td><img src="<?php echo "imageResize.php?image=../images/category/".$qrow['cat_thumb']; ?>&width=50&height=50" alt="<?php echo $qrow['image_title']; ?>" /></td>
									<td><?php echo $qrow['cat_title']; ?></td>
									<td><?php echo $qrow['cat_status']==1?'Active':'Inactive'; ?></td>
									
									<td>
										<!-- Icons -->
									<a href="<?php echo 'admin.php?mod=editCat'.'&action=edit&cat_id='.$qrow['cat_id']; ?>"  title="Edit Category"><img src="resources/images/icons/pencil.png" alt="Edit Category" /></a> 
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&cat_id='.$qrow['cat_id']; ?>&gal=<?php echo $gal_name; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['cat_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
												</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
							

					</div> <!-- End #tab1 -->
                    <div class="tab-content" id="tab2">
						<form name="createPage" action="admin.php?mod=manageCategories&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">

							

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Category Title: * </label>  

										<input class="text-input small-input" type="text" id="small-input" name="cat_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->

										<br />

								</p>
								<p>

									<label>Category Image: * </label>

									<input class="text-input small-input" type="file" id="medium-input" name="cat_img" /> <!-- <span class="input-notification error png_bg">Error message</span> -->

								</p>
								<p>

									<label>Category Parent: </label>              

									<select name="cat_parent" class="small-input">

										<option value="0" selected="selected">None</option>

<?php



$q="SELECT * FROM `manage_cate` WHERE `cat_parent`='0' AND cat_status = 1;";

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

									<label>Page Status:</label>              

									<select name="page_status" class="small-input"> 

										<option value="1" selected="selected">Active</option>

										<option value="0">InActive</option>

									</select> 

								</p>


								<p>

								<!-- text-input textarea  -->

									<label>Category Content: </label>

									<textarea class="text-input textarea" id="cat_content"name="cat_content" cols="79" rows="15"></textarea>

								<script type="text/javascript">

							//<![CDATA[

				

								CKEDITOR.replace( 'cat_content',

									{

										skin : 'v2'

									});

				

							//]]>

							</script>

								</p>



								

													

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
