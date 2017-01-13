<?php
if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=="edit")
	{
		$service_id=$_REQUEST['sid'];
		//$service_image=$_FILES['service_image']['name'];
		$service_content=$_REQUEST['service_content'];
		$service_color="#".$_REQUEST['service_color'];
		$pricelist_page=$_REQUEST['pricelist_page'];
		if($_FILES['service_image']['name']=="")
		{
		$service_image=$_REQUEST['simage']; 
		$file=1;
		}
		else
		{
		$service_image=$_FILES['service_image']['name'];
		$file=move_uploaded_file($_FILES['service_image']['tmp_name'],"../modules/services/images/".$_FILES['service_image']['name']);
		}
		//$file=move_uploaded_file($_FILES['service_image']['tmp_name'],"../modules/services/images/".$_FILES['service_image']['name']);
		$q="UPDATE `cms_services` SET `service_image` = '$service_image',`service_color`='$service_color',`service_content` = '$service_content', `pricelist_page`='$pricelist_page' WHERE `service_id` ='$service_id';";
		if($file)
		{
		$qr=mysql_query($q);
		}
		else
		{
		$qr=0;
		}
		//trace($qr);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Section Updated ! 
		</div>
		</div>
		<?php
		
		}
		else
		{
		?>
		<div class="notification error png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Update Section ! 
		</div>
		</div>
		<?php
		
		}

	}
}

?>
<script>
function validate()
{
if(document.addService.service_name.value=="")
{
alert("Provide Service Name");
return false;
}
else if(document.addService.service_image.value=="")
{
alert("Provide Service Image");
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
					
					<h3>Manage Content Sections </h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Sections Listing</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add Section</a></li> <!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<!-- <div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div> -->
						
						<table>
							
							<thead>
								<tr>
							    <!--  <th width="20"><input class="check-all" type="checkbox" /></th> -->
								   <th width="115">Section Image </th>
								   <th width="115">Section Name  </th>
								   <th width="128">Actions</th>
								  <th width="121">Sub Sections</th>
								<!-- <th width="149">List Images</th> -->
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
									<!--	<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div> -->
										
								<!--		<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>										</div> End .pagination
										<div class="clear"></div>	 -->						</td>
								</tr>
							</tfoot>
							<tbody>
<?php

$q="SELECT * FROM `cms_services` WHERE `service_parent`='0';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>
								<tr>
								<!--	<td><input type="checkbox" /></td> -->
									<td><img src="../modules/services/images/<?php echo $qrow['service_image']; ?>" width="25%" height="25%" /></td>
									<td><?php echo $qrow['service_name']; ?></td>
									<td>
										<!-- Icons -->
										<a href="admin.php?mod=editService&sid=<?php echo $qrow['service_id'].'&token='.time(); ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 									
										<!-- <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&current='.$qrow['gallery_status'].'&gid='.$qrow['gallery_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> 
										  <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&gid='.$qrow['gallery_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $qrow['gallery_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a>-->	</td>
								    <td><form name="listSubService" action="admin.php?mod=manageSubServices&sid=<?php echo $qrow['service_id']; ?>&action=list" method="post"> <input type="submit" name="subService" value="List Sections" /></form></td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
					
					</div> <!-- End #tab1 -->
					<div class="tab-content" id="tab2">
					<form name="addService" action="admin.php?mod=manageSubServices&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Section Name:</label>
										<input class="text-input small-input" type="text" id="small-input" name="service_name" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<!-- <small> small text </small> -->

								</p>
								<input type="hidden" id="small-input" name="pricelist_page" value="0" /> 
							<!--	<p>
									<label>PriceList Page Number: <small> ( Enter 0 for disabling pricelist for this service )</small></label>
										<input class="text-input small-input" type="hidden" id="small-input" name="pricelist_page" value="0" />  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention 
										 <small> small text </small> 

								</p>
								-->
								<p>
									<label>Section Image:</label>
									<input class="text-input small-input" type="file" id="medium-input" name="service_image" />
									</p>
									 <!-- <span class="input-notification error png_bg">Error message</span> 
								</p>
							<p>
									<label>Gallery URL:</label>
									<input class="text-input large-input datepicker" type="text" id="large-input" name="menu_link" />  <span class="input-notification error png_bg">Error message</span> 
								</p> -->
								<p>
								
									<label>Section BG Color: </label>
									<input class="color" type="text" name="service_color" />
								</p>
								
								<p>
									<label>Section Parent:</label>              
									<select name="service_parent" class="small-input">
<?php
$q="SELECT * FROM `cms_services` WHERE `service_parent`='0' or `service_parent`='2' or `service_parent`='3' or `service_parent`='4' or `service_parent`='5';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>									
							<option value="<?php echo $qrow['service_id']; ?>"><?php echo $qrow['service_name']; ?></option>
<?php
}
?>
									</select> 
								</p>
								
								<p>
									<label>Section Description:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="service_content" cols="79" rows="15"></textarea>
								</p> 
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								<a href="admin.php?mod=manageServices"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
					</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->