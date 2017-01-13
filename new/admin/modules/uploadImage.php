<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{



}

?>
<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Upload Image</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Basic Image Upload</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 
<?php 
if(isset($_REQUEST['token']))
{
?>
<div class="notification attention png_bg">
<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
<div>
<?php echo "Image \"".$_REQUEST['image_title']."\" added successfully !"; ?>
</div>
</div>
<?php
}
?>
<form name="uploadImage" action="admin.php?mod=manageImages&token=<?php echo time(); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Browse Thumbnail Image:</label>
										<input class="medium-input" type="file" id="medium-input" name="image_thumb" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>		
								<p>
									<label>Browse Main Image:</label>
										<input class="medium-input" type="file" id="medium-input" name="image_main" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>	
								<p>
									<label>Image Title:</label>
										<input class="text-input small-input" type="text" id="small-input" name="image_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
			<p>
									<label>Image Sequence:</label>
										<input class="text-input small-input" type="text" id="small-input" name="image_seq" value="0"/> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
							<!--	<p>
									<label>Image Name:</label>
									<input class="text-input small-input datepicker" type="text" id="small-input" name="image_name" />  <span class="input-notification error png_bg">Error message</span>
								</p>
								<p>
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
								 -->
							<p>
									<label>Image Gallery:</label>              
									<select name="gal" class="small-input">
										<option value="default" selected="selected">Default</option>
<?php

$q="SELECT * FROM `gal_galleries` WHERE 1;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
if(isset($_REQUEST['gal']) && $_REQUEST['gal']==$qrow['gallery_name'])
{
?>
							
										<option value="<?php echo $qrow['gallery_name']; ?>" selected="selected"><?php echo $qrow['gallery_id']." - ".$qrow['gallery_title']; ?></option>
<?php
}
else
{
?>										
										<option value="<?php echo $qrow['gallery_name']; ?>"><?php echo $qrow['gallery_id']." - ".$qrow['gallery_title']; ?></option>
										
<?php
}
}
?>
									</select> 
								</p> 

								
							<!--	<p>
									<label>Image Caption:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="image_caption" cols="79" rows="15"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
									<a href="admin.php?mod=manageGallery"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->