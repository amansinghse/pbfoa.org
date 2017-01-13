<?php

$ssid=$_REQUEST['ssid'];
$q="SELECT * FROM `cms_services` WHERE `service_id`='$ssid';";
$qr=mysql_query($q);
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);
$service_parent=$qrow['service_parent'];
?>

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Edit Service</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Edit Service</a></li> <!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
				<div class="tab-content default-tab" id="tab1">
					<form name="addService" action="admin.php?mod=manageSubServices&token=<?php echo time(); ?>&action=edit" method="post" onsubmit="return validate();" enctype="multipart/form-data">
					<input type="hidden" name="ssid" value="<?php echo $ssid; ?>"/>
					<input type="hidden" name="simage" value="<?php echo $qrow['service_image']; ?>"/>
					
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Service Name:</label>
							<input class="text-input small-input" type="text" id="small-input" name="service_name" value="<?php echo $qrow['service_name']; ?>"/> 
							</p>
								<p>
									<label>PriceList Page Number: <small> ( Enter 0 for disabling pricelist for this service )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="pricelist_page" value="<?php echo $qrow['pricelist_page']; ?>" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<!-- <small> small text </small> -->

								</p>
								<p>
								
									<label>Service Color: </label>
									<input class="color" type="text" name="service_color" value="<?php echo $qrow['service_color']; ?>"/>
								</p>
								<p>
									<label>Service Image:</label>
									<input class="text-input small-input datepicker" type="file" id="medium-input" name="service_image" /> <!-- <span class="input-notification error png_bg">Error message</span> 
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
									<label>Service Parent:</label>              
							<!--		<select name="service_parent" class="small-input">
<?php
$q2="SELECT * FROM `cms_services` WHERE `service_parent`='0';";
$qr2=mysql_query($q2);
while($qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC))
{
?>									
							<option value="<?php echo $qrow2['service_id']; ?>" <?php 
							if($service_parent==$qrow2['service_id'])
							{
							echo "selected=\"selected\"";
							}							
							?> ><?php echo $qrow2['service_name']; ?></option>
<?php
}
?>
									</select>  -->
																		<select name="service_parent" class="small-input">
<?php
$q2="SELECT * FROM `cms_services` WHERE `service_parent`='0' or `service_parent`='2' or `service_parent`='3' or `service_parent`='4' or `service_parent`='5';";
$qr2=mysql_query($q2);
while($qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC))
{
?>									
							<option value="<?php echo $qrow2['service_id']; ?>" <?php
							if($service_parent==$qrow2['service_id'])
							{
							echo "selected=\"selected\"";
							}							
							?> ><?php echo $qrow2['service_name']; ?></option>
<?php
}
?>
									</select> 
								</p> 
								
								<p>
									<label>Service Description:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="service_content" cols="79" rows="15"><?php echo $qrow['service_content']; ?></textarea>
								</p> 
								
								<p>
									<input class="button" type="submit" value="Update" name="edit" />
								<a href="admin.php?mod=manageServices"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
					</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->