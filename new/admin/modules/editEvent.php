
<?php 
$cat_id = $_REQUEST['event_id'];
$q  = "SELECT * FROM `manage_events` WHERE `event_id`='$cat_id';";

$qr=mysql_query($q);
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);

?>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Edit Event</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Edit Event</a></li> <!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
				
						<div class="tab-content  default-tab" id="tab1"> 
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="resources/scripts/jquery.plugin.js"></script>
<script src="resources/scripts/jquery.datepick.js"></script>
<script>
$(function() {
	$('#event_sdate').datepick();
	$('#event_edate').datepick();
});
</script>
<form name="createUser" action="admin.php?mod=manageEvents&token=<?php echo time(); ?>&action=edit" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Event Title: * </label>  
										<input type="hidden" name="cateId" value="<?php echo $qrow['event_id'];?>"  />
										<input class="text-input small-input" type="text" id="small-input" value="<?php echo $qrow['event_title'];?>" name="cat_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->

										<br />

								</p>
                                <p>
                                  <label>Event Start Date: *</label>
                                  <?php $sDate = date('Y-m-d',strtotime($qrow['event_startdate']));?>
                                  <input class="text-input small-input datepicker" type="text" id="event_sdate" value="<?php echo $sDate;?>" name="event_sdate" />
                                </p>
                                <p>
                                  <label>Event End Date: </label>
                                  
                                  <?php $eDate = date('Y-m-d',strtotime($qrow['event_enddate']));?>
                                   <input class="text-input small-input datepicker" type="text" id="event_edate" value="<?php echo $eDate?>" name="event_edate" />
                                </p>
								<p>

									<label>Event Image: * </label>

									<input class="text-input small-input" type="file" id="medium-input" name="event_img" /> 
                                    <input type="hidden" name="event_prev_image" value="<?php echo $qrow['event_img'];?>" />

								</p>
								<p>
                              <label>Event Video: </label>
                               <textarea name="event_video" id="event_video"  cols="79" rows="15"><?php echo $qrow['event_video'];?></textarea>
                            </p>
                            

								<p>

									<label>Page Status:</label>              

									<select name="page_status" class="small-input"> 

										<option value="1" <?php echo $qrow['event_status']=='1'?'selected="selected"':'';?> >Active</option>

										<option value="0" <?php echo $qrow['event_status']=='0'?'selected="selected"':'';?>>InActive</option>

									</select> 

								</p>


								<p>

								<!-- text-input textarea  -->

									<label>Event Content: </label>

									<textarea class="text-input textarea" id="cat_content"name="cat_content" cols="79" rows="15"><?php echo $qrow['event_des']?></textarea>

								<script type="text/javascript">
									CKEDITOR.replace( 'cat_content', {
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