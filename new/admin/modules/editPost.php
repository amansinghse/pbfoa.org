<script>
function validate()
{
if(document.createPage.cat_title.value=="")
{
alert("Please enter Post Title");
document.createPage.cat_title.focus();
return false;
}
return true;
}
</script>
<?php
$cat_id = $_REQUEST['post_id'];
$q="SELECT * FROM `manage_posts` WHERE `post_id`='$cat_id';";
$qr=mysql_query($q);
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);

?>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Edit Post</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Edit Post</a></li> <!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
				
						<div class="tab-content  default-tab" id="tab1"> 
<form name="createUser" action="admin.php?mod=managePosts&token=<?php echo time(); ?>&action=edit" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Post Title: * </label>  
										<input type="hidden" name="cateId" value="<?php echo $qrow['post_id'];?>"  />
										<input class="text-input small-input" type="text" id="small-input" value="<?php echo $qrow['post_title'];?>" name="cat_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->

										<br />

								</p>
								<p>

									<label>Post Image: * </label>

									<input class="text-input small-input" type="file" id="medium-input" name="cat_img" /> 
                                    <input type="hidden" name="cat_prev_image" value="<?php echo $qrow['post_image'];?>" />

								</p>
								<p>

									<label>Post Category: </label>              

									<select name="cat_parent" class="small-input">

										<option value="0" selected="selected">None</option>

<?php



$q="SELECT * FROM `manage_cate` WHERE  cat_status = 1 ;";

$qr=mysql_query($q);

while($Parent=mysql_fetch_array($qr,MYSQL_ASSOC))

{

?>

										<option value="<?php echo $Parent['cat_id']; ?>" <?php echo  $Parent['cat_id']==$qrow['cate_id']?'selected="selected"':'';?>><?php echo $Parent['cat_title']; ?></option>

<?php

}
?>										

										</select> 

								</p> 

								<p>

									<label>Page Status:</label>              

									<select name="page_status" class="small-input"> 

										<option value="1" <?php echo $qrow['post_status']=='1'?'selected="selected"':'';?> >Active</option>

										<option value="0" <?php echo $qrow['post_status']=='0'?'selected="selected"':'';?>>InActive</option>

									</select> 

								</p>


								<p>

								<!-- text-input textarea  -->

									<label>Content: </label>

									<textarea class="text-input textarea" id="cat_content"name="cat_content" cols="79" rows="15"><?php echo $qrow['post_desc']?></textarea>

								<script type="text/javascript">
										CKEDITOR.replace( 'cat_content', {
										  extraPlugins: 'imageuploader'
										});
									</script>

								</p>
								
								<p>

								<!-- text-input textarea  -->

									<label>Short Content: </label>

									<textarea class="text-input textarea" id="post_short"name="post_short" cols="79" rows="15"><?php echo $qrow['post_short'];?></textarea>

								<script type="text/javascript">
										CKEDITOR.replace( 'post_short', {
										  extraPlugins: 'imageuploader'
										});
									</script>

								</p>

								<p>
									<input class="button" type="submit" value="Update" name="Update" />
								</p>

								

							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
						</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->