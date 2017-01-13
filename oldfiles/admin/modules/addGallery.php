<script>
function validate()
{
if(document.createGal.gallery_title.value=="" || document.createGal.gallery_folder.value=="")
{
alert("Please Provide Complete Details");
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

<h3>Create New Gallery</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Add Gallery</a></li> <!-- href must be unique and match the id of target div -->
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
<?php  if($notify=="true") { echo "Gallery \"".$_REQUEST['gallery_title']."\" added successfully !"; } else { echo "Failed to Perform Operation, Please Try Again"; }?>
</div>
</div>
<?php
}
?>
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
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="gallery_folder" /> <!-- <span class="input-notification error png_bg">Error message</span> 
								</p>
							<p>
									<label>Gallery URL:</label>
									<input class="text-input large-input datepicker" type="text" id="large-input" name="menu_link" />  <span class="input-notification error png_bg">Error message</span> 
								</p>
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
								<p>
									<label>Gallery Sequence:</label>
									<input class="text-input small-input" type="text" id="medium-input" name="gallery_sequence" value="0"/> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Gallery Status:</label>              
									<select name="gallery_status" class="small-input">
										<option value="active" selected="selected">Active</option>
										<option value="inactive">InActive</option>
									</select> 
								</p>
								<p>
									<label>Page :</label>              
									<select name="page_id" class="small-input">
										<?php
										//$gal_name=$_REQUEST['gal'];
										$q="SELECT page_id 	,page_title FROM `cms_pages` where page_type='gallery' ORDER BY `page_id`;";
										$qr=mysql_query($q);
										while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
										{
										?>
										<option value="<?php echo $qrow['page_id']?>"><?php echo $qrow['page_title']?></option>
										<?php }?>
									</select> 
								</p>
								
							<!--	<p>
									<label>Page Content:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->