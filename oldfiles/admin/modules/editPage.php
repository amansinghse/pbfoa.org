<script>
function validate()
{
if(document.editPage.page_title.value=="")
{
alert("Provide Page Title");
document.editPage.page_title.focus();
return false;
}
else if(document.editPage.page_name.value=="")
{
alert("Provide Page Name");
document.editPage.page_name.focus();
return false;
}
else
{
return true;
}

}
</script>
<?php
$pid=$_REQUEST['pid'];
$q="SELECT * FROM `cms_pages` WHERE `page_id`='$pid';";
$qr=mysql_query($q);
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);
$page_parent=$qrow['page_parent'];
$page_id=$qrow['page_id'];
?>
<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Edit Content Page</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Update Page</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 

<form name="editPage" action="admin.php?mod=managePages&token=<?php echo time(); ?>&action=edit" method="post" onsubmit="return validate();" enctype="multipart/form-data">
<input type="hidden" name="page_id" value="<?php echo $qrow['page_id']; ?>" />
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Page Title: * <small>( Text to Show in Title Bar of Browser )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="page_title" value="<?php echo $qrow['page_title']; ?>" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Page Name: * <small>( Unique Name of Your Page )</small></label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="page_name" value="<?php echo $qrow['page_name']; ?>" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								<p>
								<label>Page Parent:</label>  
								<select name="page_parent" class="small-input">
										<option value="0">None</option>
<?php

$q2="SELECT * FROM `cms_pages` WHERE `page_parent`='0' and `page_id`!='$page_id';";
$qr2=mysql_query($q2);
while($qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC))
{
?>
										<option value="<?php echo $qrow2['page_id']; ?>" <?php
										if($qrow2['page_id']==$page_parent)
										{
										echo "selected=\"selected\"";
										}										
										?> ><?php echo $qrow2['page_title']; ?></option>
<?php
}

?>										
										</select> 
								
								</p>
								<p>
									<label>Page Status:</label>              
									<select name="page_status" class="small-input">
										<option value="Active" <?php echo (($qrow['page_status']=='Active')?'selected="selected"':'');?>>Active</option>
										<option value="InActive" <?php echo (($qrow['page_status']=='InActive')?'selected="selected"':'');?>>InActive</option>
									</select> 
								</p> 
								<p>
									<label>Page Type:</label>              
									<select name="page_type" class="small-input">										
									<option value="content" <?php echo (($qrow['page_type']=='content')?'selected="selected"':'');?>>Content</option>
									<option value="directory" <?php echo (($qrow['page_type']=='directory')?'selected="selected"':'');?>>Directory</option>										
									<option value="locations" <?php echo (($qrow['page_type']=='locations')?'selected="selected"':'');?>>Locations Template</option>										
									<option value="faq" <?php echo (($qrow['page_type']=='faq')?'selected="selected"':'');?>>FAQ's Template</option>										
<option value="news" <?php echo (($qrow['page_type']=='news')?'selected="selected"':'');?>>News Template</option>
<option value="family-office-news" <?php echo (($qrow['page_type']=='family-office-news')?'selected="selected"':'');?>>Family Office News Template</option>
<option value="white-papers" <?php echo (($qrow['page_type']=='white-papers')?'selected="selected"':'');?>>White Papers Template</option>
<option value="press-release" <?php echo (($qrow['page_type']=='press-release')?'selected="selected"':'');?>>Press Release Template</option>
<option value="luxury-news" <?php echo (($qrow['page_type']=='luxury-news')?'selected="selected"':'');?>>Luxury News Template</option>
<option value="current-events" <?php echo (($qrow['page_type']=='current-events')?'selected="selected"':'');?>>Current Events Template</option>
										
									<option value="team" <?php echo (($qrow['page_type']=='team')?'selected="selected"':'');?>>Team Template</option>										
									<option value="contact" <?php echo (($qrow['page_type']=='contact')?'selected="selected"':'');?>>Contact Template</option>										
									<option value="register" <?php echo (($qrow['page_type']=='register')?'selected="selected"':'');?>>Register Template</option>
									<option value="gallery" <?php echo (($qrow['page_type']=='gallery')?'selected="selected"':'');?>>Gallery</option>
									<option value="aviation" <?php echo (($qrow['page_type']=='aviation')?'selected="selected"':'');?>>Aviation</option>
										<option value="automotive" <?php echo (($qrow['page_type']=='automotive')?'selected="selected"':'');?>>Automotive</option>
										<option value="fashion" <?php echo (($qrow['page_type']=='fashion')?'selected="selected"':'');?>>Fashion</option>
										<option value="homes" <?php echo (($qrow['page_type']=='homes')?'selected="selected"':'');?>>Homes</option>
										<option value="travel" <?php echo (($qrow['page_type']=='travel')?'selected="selected"':'');?>>Travel</option>
										<option value="culinary" <?php echo (($qrow['page_type']=='culinary')?'selected="selected"':'');?>>Culinary</option>
										<option value="liquor"  <?php echo (($qrow['page_type']=='liquor')?'selected="selected"':'');?>>Liquor</option>
										<option value="technology"  <?php echo (($qrow['page_type']=='technology')?'selected="selected"':'');?>>Technology</option>
										<option value="membership" <?php echo (($qrow['page_type']=='membership')?'selected="selected"':'');?>>Membership</option>
										<option value="family-office-asset-managers" <?php echo (($qrow['page_type']=='family-office-asset-managers')?'selected="selected"':'');?>>Family Office Asset Managers</option>
										<option value="family-office-membership" <?php echo (($qrow['page_type']=='family-office-membership')?'selected="selected"':'');?>>Family Office Membership</option>
										<option value="family-office-service-providers" <?php echo (($qrow['page_type']=='family-office-service-providers')?'selected="selected"':'');?>>Family Office Service Providers</option>
										<option value="other" <?php echo (($qrow['page_type']=='other')?'selected="selected"':'');?>>Other Family Office Membership</option>
										
										<option value="submitnews" <?php echo (($qrow['page_type']=='submitnews')?'selected="selected"':'');?>>Submit News</option>
										
										<option value="sponsorship" <?php echo (($qrow['page_type']=='sponsorship')?'selected="selected"':'');?>>Sponsorship</option>
										
										
									</select> 
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Content: </label>
									<textarea class="text-input textarea" id="page_content" name="page_content" cols="79" rows="15"><?php echo $qrow['page_content']; ?></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'page_content', {
										extraPlugins: 'imageuploader'
									});
								</script>
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Left Content: </label>
									<textarea class="text-input textarea " id="page_left"name="page_left" cols="79" rows="15"><?php echo $qrow['left_content']; ?></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'page_left', {
										extraPlugins: 'imageuploader'
									});
								</script>
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Meta tags: </label>
									<textarea class="text-input textarea " id="textarea" name="page_metatags" cols="79" rows="5"><?php echo $qrow['page_metatags']; ?></textarea>
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Keywords: </label>
									<textarea class="text-input textarea " id="textarea" name="page_keywords" cols="79" rows="5"><?php echo $qrow['page_keywords']; ?></textarea>
								</p>
								<p>
									<input class="button" type="submit" value="Submit" name="edit" />
								<a href="admin.php?mod=managePages"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->