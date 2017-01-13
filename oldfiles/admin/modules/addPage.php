<script>
function validate()
{
if(document.createPage.page_title.value=="")
{
alert("Provide Page Title");
document.createPage.page_title.focus();
return false;
}
else if(document.createPage.page_name.value=="")
{
alert("Provide Page Name");
document.createPage.page_name.focus();
return false;
}
else if(document.createPage.page_type.value=="0")
{
alert("Please select page type");
document.createPage.page_type.focus();
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

<h3>Create New Page</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Add New Page</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 

<form name="createPage" action="admin.php?mod=managePages&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Page Title: * <small>( Text to Show in Title Bar of Browser )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="page_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Page Name: * <small>( Unique Name of Your Page )</small></label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="page_name" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								<p>
									<label>Page Parent: </label>              
									<select name="page_parent" class="small-input">
										<option value="0" selected="selected">None</option>
<?php

$q="SELECT * FROM `cms_pages` WHERE `page_parent`='0';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
										<option value="<?php echo $qrow['page_id']; ?>"><?php echo $qrow['page_title']; ?></option>
<?php
}

?>										
										</select> 
								</p> 
								<p>
									<label>Page Status:</label>              
									<select name="page_status" class="small-input">
										<option value="Active" selected="selected">Active</option>
										<option value="InActive">InActive</option>
									</select> 
								</p>
								<p>
									<label>Page Type: *</label>              
									<select name="page_type" class="small-input">										
									<option value="content">Content</option>
									<option value="directory">Directory</option>
										<option value="0">Select page type</option>										
										<option value="locations">Locations Template</option>										
										<option value="faq">FAQ's Template</option>										
										<option value="news">News Template</option>		
										<option value="family-office-news">Family Office News Template</option>
										<option value="white-papers">White Papers Template</option>
										<option value="press-release">Press Release Template</option>
										<option value="luxury-news">Luxury News Template</option>
										<option value="current-events">Current Events Template</option>										
										<option value="team">Team Template</option>										
										<option value="contact">Contact Us Template</option>										
										<option value="register">Register Us Template</option>										
										<option value="aviation">Aviation</option>
										<option value="automotive">Automotive</option>
										<option value="fashion">Fashion</option>
										<option value="homes">Homes</option>
										<option value="travel">Travel</option>
										<option value="liquor">Liquor</option>
										<option value="technology">Technology</option>
										<option value="culinary">Culinary</option>
										<option value="gallery" >Gallery</option>
										<option value="membership">Membership</option>
										<option value="family-office-asset-managers">Family Office Asset Managers</option>
										<option value="family-office-membership">Family Office Membership</option>
										<option value="family-office-service-providers">Family Office Service Providers</option>
										<option value="other">Other Family Office Membership</option>
										<option value="submitnews">Submit News</option>
									
										
										
									</select> 
								</p> 
								
								<p>
								<!-- text-input textarea  -->
									<label>Page Content: </label>
									<textarea class="text-input textarea"  name="page_content" id="page_content" cols="79" rows="15"></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'page_content', {
										extraPlugins: 'imageuploader'
									});
								</script>
								
								</p>

								<p>
								<!-- text-input textarea  -->
									<label>Page Left Content: </label>
									<textarea class="text-input textarea" name="page_left" id="page_left" cols="79" rows="15"></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'page_left', {
										extraPlugins: 'imageuploader'
									});
								</script>
								
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Meta tags: </label>
									<textarea class="text-input textarea " id="textarea" name="page_metatags" cols="79" rows="5"></textarea>
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Page Keywords: </label>
									<textarea class="text-input textarea " id="textarea" name="page_keywords" cols="79" rows="5"></textarea>
								</p>								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								<a href="admin.php?mod=managePages"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->