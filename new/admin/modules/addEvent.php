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

?>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Add Event</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Add Event</a></li> <!-- href must be unique and match the id of target div -->

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
						<form name="createPage" action="admin.php?mod=manageEvents&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
  <fieldset>
    <p>
      <label>Event Title: * </label>
      <input class="text-input small-input" type="text" id="small-input" name="event_title" />
      
      
    </p>
    <p>
      <label>Event Start Date: *</label>
      <input class="text-input small-input datepicker" type="text" id="event_sdate" name="event_sdate" />
    </p>
    <p>
      <label>Event End Date: </label>
       <input class="text-input small-input datepicker" type="text" id="event_edate" name="event_edate" />
    </p>
    <p>
      <label>Event Image: </label>
       <input class="text-input small-input" type="file" id="medium-input" name="event_img" />
    </p>
    <p>
      <label>Event Video: </label>
       <textarea name="event_video" id="event_video"  cols="79" rows="15"></textarea>
    </p>
    <p>
      <label>Event Status:</label>
      <select name="page_status" class="small-input">
        <option value="1" selected="selected">Active</option> 
        <option value="0">InActive</option>
      </select>
    </p>
    
    <p> 
      
      <!-- text-input textarea  -->
      
      <label>Event Content: </label>
      <textarea class="text-input textarea" id="event_content" name="page_content" cols="79" rows="15"></textarea>
      <script type="text/javascript">
		CKEDITOR.replace( 'page_content', {
			extraPlugins: 'imageuploader'
		});
	</script>
    </p>
    
      <!-- text-input textarea  -->
    <p>
      <input class="button" type="submit" value="Submit" name="submit" />
       </p>
  </fieldset>
  <div class="clear"></div>
  <!-- End .clear -->
  
</form>

						
						</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->