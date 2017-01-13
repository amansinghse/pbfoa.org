<?php
if(isset($_REQUEST['aid']))
{
$ad_id=$_REQUEST['aid'];
$q="SELECT * FROM `ad_posts` WHERE `ad_id`='$ad_id';";
$qr=mysql_query($q);
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);
?>
<script type="text/javascript">
var postState = '<?php echo $qrow["ad_state"]; ?>';
var postCountry = '<?php echo $qrow["ad_country"]; ?>';
</script>
<script type="text/javascript" src="includes/countryState.js"></script>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Edit Property Post</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Edit Post </a></li> 
						<!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
						<div class="tab-content default-tab" id="tab1"> 
<form name="createPost" action="admin.php?mod=manageEmails&action=edit&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
<input type="hidden" name="ad_id" value="<?php echo $ad_id; ?>" />
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Email Subject:</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="ad_title" value="<?php echo $qrow["ad_title"]; ?>" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
										<p>
									<label>Country :  </small></label>
								 <select id='countrySelect' name='country' onchange='populateState()'>
        </select> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
								<label>State: </label>
									  <select id='stateSelect' name='state'>
        </select>
        <script type="text/javascript">initCountry('US'); </script>
								</p>
								<p>
									<label> City:</label>
									<input class="text-input small-input" type="text" id="medium-input" name="ad_city" value="<?php echo $qrow["ad_city"]; ?>" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								<p>
									<label>ZipCode: <small><a href="#" title="This is Menu Hower Text"></a></small></label>
									<input class="text-input small-input" type="text" id="medium-input" name="ad_zipcode" value="<?php echo $qrow["ad_zipcode"]; ?>" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
					

								<p>
									<label>Logo:  </small></label>
									<input class="text-input" type="file" id="medium-input" name="ad_image" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
					
							
						<p>
									<label>Email Type: </label>              
									<select name="ad_type" class="small-input">
										<option value="Need" <?php if($qrow['ad_type']=='Need') { echo "selected=\"selected\""; } ?>>I Need</option>
										<option value="Have"  <?php if($qrow['ad_type']=='Have') { echo "selected=\"selected\""; } ?>>I Have</option>
						                      </select> 
							</p> 
								<p>
									<label>Email Status:</label>              
									<select name="ad_status" class="small-input">
										<option value="Active" <?php if($qrow['ad_status']=='Active') { echo "selected=\"selected\""; } ?>>Active</option>
										<option value="InActive" <?php if($qrow['ad_status']=='InActive') { echo "selected=\"selected\""; } ?>>InActive</option>
									</select> 
								</p> 
								<p>
								
								<label>Email Owner:</label>
								<select name="ad_user" class="small-input">
<?php
$qu="SELECT * FROM `web_users` WHERE 1;";
$qur=mysql_query($qu);
while($qurow=mysql_fetch_array($qur,MYSQL_ASSOC))
{
?>								
						<option value="<?php echo $qurow['user_id']; ?>"  <?php if($qrow['ad_user']==$qurow['user_id']) { echo "selected=\"selected\""; } ?>><?php echo $qurow['username']; ?></option>
<?php
}
?>

							</select>
								
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Description: *</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="ad_content" cols="79" rows="15"><?php echo $qrow["ad_content"]; ?></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" name="edit" />
									<a href="admin.php?mod=managePosts"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
						</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->
<?php
}
?>