<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{



}

?>
<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Bulk Image Uploader</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Bulk Image Album Upload</a></li> <!-- href must be unique and match the id of target div -->
<li><a href="#tab2">FTP Interface</a></li>
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
<form name="uploadImage" action="admin.php?mod=bulkUploadImage&token=<?php echo time(); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								<p>
									<label>Gallery Title:</label>
										<input class="text-input small-input" type="text" id="small-input" name="gallery_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Gallery Name:</label>
									<input class="text-input small-input datepicker" type="text" id="small-input" name="image_name" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<!--	<p>
									<label>Description:</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" /> <span class="input-notification error png_bg"> Error message </span>
								</p>
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<p>
									<label>Gallery Status:</label>
									<input type="radio" name="gallery_status" value="active"/> 
									Active <br />
									<input type="radio" name="gallery_status" value="inactive" />
									In Active </p>
								
					<!--		<p>
									<label>Album Gallery:</label>              
									<select name="dropdown" class="small-input">
										<option value="1">Gallery 1</option>
										<option value="2">Gallery 2</option>
										<option value="3">Gallery 3</option>
										<option value="4">Gallery 4</option>
									</select> 
								</p>  -->
								
							<!--	<p>
									<label>Gallery Caption:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="image_caption" cols="79" rows="15"></textarea>
								</p> 
								-->
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
						<div class="tab-content" id="tab2">
				FTP 
					</div> 
						</div> <!-- End .content-box-content -->
			
			</div> <!-- End .content-box -->