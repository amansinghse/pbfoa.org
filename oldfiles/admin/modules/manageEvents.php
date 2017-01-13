<script>
function editSeq(img_id)
{
var seq=prompt("Enter New Sequence");
if(seq!=null && seq!="")
{
location.href="admin.php?mod=manageImages&action=editSeq&img_id="+img_id+"&seq="+seq+"&gal=<?php echo $_REQUEST['gal']; ?>&token=<?php echo time(); ?>";
return true;
}
return false;
}

</script>
<?php
if(isset($_REQUEST['upflag'])&& $_REQUEST['upflag']==1 && !isset($_REQUEST['action']))
{
?>

<div class="notification success png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Image Uploaded Successfully ! </div>
</div>
<?php
}

if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$event_title	= $_REQUEST['event_title'];
$event_sdate	= strtotime($_REQUEST['event_sdate']);
$event_edate	= strtotime($_REQUEST['event_edate']);
$image_thumb	= $_FILES['event_img']['name'];
$event_video	= $_REQUEST['event_video'];
$page_status	= $_REQUEST['page_status'];
$event_content	= addslashes($_REQUEST['page_content']);

$eventStart = date('Y-m-d',$event_sdate);
$eventEnd = date('Y-m-d',$event_edate);
//trace($qr);

$thumb=move_uploaded_file($_FILES['event_img']['tmp_name'],"../images/events/".$_FILES['event_img']['name']);
if($thumb)
{

$q="INSERT INTO `manage_events` (`event_id` ,`event_title` ,`event_img` ,`event_video` ,`event_des` ,`event_startdate` ,`event_enddate` ,`event_status`)VALUES (NULL , '$event_title', '$image_thumb', '$event_video', '$event_content', '$eventStart', '$eventEnd', '$page_status');";

$qr=mysql_query($q);
if($qr)
{
?>
<script>
location.href="admin.php?mod=manageEvents&token=1268066143&gal=<?php echo $_REQUEST['event_title']; ?>&upflag=1";
</script>
<?php

}
		?>
<div class="notification success png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Event Added Successfully ! </div>
</div>
<?php
}
else
{

		?>
<div class="notification error png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Failed to Add Event ! <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a> </div>
</div>
<?php

}


}


if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$event_id	= $_REQUEST['event_id'];
		$q="DELETE FROM `manage_events` WHERE `event_id`='$event_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
<div class="notification success png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Event Deleted ! </div>
</div>
<?php
		}
		else
		{
		?>
<div class="notification error png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Failed to Delete Event ! </div>
</div>
<?php
		
		}
	}

	else if($_REQUEST['action']=="edit")
	{
		$event_title	= $_REQUEST['cat_title'];
		$event_sdate	= strtotime($_REQUEST['event_sdate']);
		$event_edate	= strtotime($_REQUEST['event_edate']);
		$image_thumb	= $_FILES['event_img']['name'];
		$event_video	= $_REQUEST['event_video'];
		$page_status	= $_REQUEST['page_status'];
		$event_content	= addslashes($_REQUEST['cat_content']);
		$eventId 		= $_REQUEST['cateId'];
		$eventStart = date('Y-m-d',$event_sdate);
		$eventEnd = date('Y-m-d',$event_edate);
		//trace($qr);
		
		$thumbImg = '';
		
		if($_FILES['event_img']['size']){
		$thumb=move_uploaded_file($_FILES['event_img']['tmp_name'],"../images/events/".$_FILES['event_img']['name']);
		unlink("../images/events/".$_REQUEST['event_prev_image']);
		$thumbImg = $_FILES['event_img']['name'];
		}else{
			$thumbImg = $_REQUEST['event_prev_image'];
		}
		
		$qr = "UPDATE `manage_events` SET
		`event_title` = '$event_title',
		`event_img` = '$thumbImg',
		`event_video` = '$event_video',
		`event_des` = '$event_content',
		`event_startdate` = '$eventStart',
		`event_enddate` = '$eventEnd',
		`event_status` = '$page_status'
		WHERE event_id = $eventId
		";
 
 		$qrd=mysql_query($qr);
		if($qrd)
		{
		
		?>
<div class="notification success png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Event Updated ! </div>
</div>
<?php
		}
		else
		{
		?>
<div class="notification error png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> Failed to Update Event ! </div>
</div>
<?php
		
		}
	
	}
	
}
$gal_name=$_REQUEST['gal'];
?>
<div class="content-box">
<!-- Start Content Box -->

<div class="content-box-header">
  <h3>Manage Events</h3>
  <ul class="content-box-tabs">
    <li><a href="#tab1" class="default-tab">Manage Events</a></li>
    <!-- href must be unique and match the id of target div -->
    <li><a href="#tab2" >Add Event</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab --> 
  
  
  <table>
    <thead>
      <tr>
        <th width="115">Image Preview </th>
        <th width="115">Event Title </th>
        <th width="128">Event Start</th>
        <th width="216">Event End</th>
        <th width="100">Event Status</th>
        <th width="316">Actions</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="6"></td>
      </tr>
    </tfoot>
    <tbody>
      <?php
$gal_name=$_REQUEST['gal'];
$q="SELECT * FROM `manage_events` where 1 ;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
      <tr>
        
        <td><img src="<?php echo "imageResize.php?image=../images/events/".$qrow['event_img']; ?>&width=50&height=50" alt="<?php echo $qrow['event_title']; ?>" /></td>
        <td><?php echo $qrow['event_title']; ?></td>
        <td><?php echo $qrow['event_startdate']; ?></td>
        <td><?php echo $qrow['event_enddate']; ?></td>
        <td><?php echo $qrow['event_status']==1?'Active':'Inactive'; ?></td>
        <td><!-- Icons --> 
          <a href="admin.php?mod=editEvent&action=edit&event_id=<?php echo $qrow['event_id'];?>"   title="Edit Sequence"><img src="resources/images/icons/pencil.png" alt="Edit Sequence" /></a> 
          <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&event_id='.$qrow['event_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['gallery_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
          <!--  <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&mid='.$qrow['image_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>							--></td>
      </tr>
      <?php
}
?>
    </tbody>
  </table>
  
 </div>
<div class="tab-content" id="tab2">
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
		CKEDITOR.replace( 'event_content', {
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
<!-- End #tab1 -->
</div>
<!-- End .content-box-content -->

</div>
<!-- End .content-box -->
