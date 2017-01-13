<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$menu_title=$_REQUEST['menu_title'];
$menu_alt=$_REQUEST['menu_alt'];
$menu_link=$_REQUEST['menu_link'];
$menu_target=$_REQUEST['menu_target'];
$menu_parent=$_REQUEST['menu_parent'];
$menu_status=$_REQUEST['menu_status'];

$q="INSERT INTO `cms_menu` (`menu_id` ,`menu_title` ,`menu_alt` ,`menu_link` ,`menu_target` ,`menu_parent` ,`menu_status`)VALUES (NULL , '$menu_title', '$menu_alt', '$menu_link', '$menu_target', '$menu_parent', '$menu_status');";
$qr=mysql_query($q);
//trace($qr);
if($qr)
{
$notify="true";
}


}

?>
<script>
function validate()
{
if(document.editMenu.menu_title.value=="")
{
alert("Provide Menu Title");
return false;
}
else if(document.editMenu.menu_link.value=="")
{
alert("Provide Menu Link");
return false;
}
else
{
return true;
}

}
</script>
<?php
$mid=$_REQUEST['mid'];
$q="SELECT * FROM `cms_menu` WHERE `menu_id`='$mid';";
$qr=mysql_query($q);
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);
$menu_id=$qrow['menu_id'];
$menu_parent=$qrow['menu_parent'];
?>
<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Edit Menu Item</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Update Menu Item</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 

<form name="editMenu" action="admin.php?mod=manageMenu&token=<?php echo time(); ?>&action=edit" method="post" onsubmit="return validate();">
<input type="hidden" name="mid" value="<?php echo $qrow['menu_id']; ?>" />
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Menu Title: *</label>
										<input class="text-input small-input" type="text" id="small-input" name="menu_title" value="<?php echo $qrow['menu_title']; ?>" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Menu Hover Text: <small><a href="#" title="This is Menu Hower Text">[?]</a></small> </label>
									<input class="text-input small-input datepicker" type="text" id="medium-input" name="menu_alt" value="<?php echo $qrow['menu_alt']; ?>" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Link URL: * <small> ( e.g http://www.mywebsite.com/mylink.html )</small></label>
								  
									<input class="text-input large-input datepicker" type="text" id="large-input" name="menu_link" value="<?php echo $qrow['menu_link']; ?>" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<!--	<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<p>
									<label>Link Target: </label>
									<input value="_parent" type="radio" name="menu_target"/> 
									Same Window<br />
									<input value="_blank" type="radio" name="menu_target" />
									New Window </p>
								<!-- <input type="hidden" name="menu_parent" value="0" /> -->
							<p>
									<label>Parent Menu Item: </label>              
									<select name="menu_parent" class="small-input">
										<option value="0">None</option>
<?php

$q2="SELECT * FROM `cms_menu` WHERE `menu_parent`='0' and `menu_id`!='$menu_id';";
$qr2=mysql_query($q2);
while($qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC))
{
?>
										<option value="<?php echo $qrow2['menu_id']; ?>" <?php 
										if($menu_parent==$qrow2['menu_id'])
										{
										echo "selected=\"selected\"";
										}
										?> > <?php echo $qrow2['menu_title']; ?></option>
<?php
}

?>										
										</select> 
								</p> 
								
								<p>
									<label>Menu Status:</label>              
									<select name="menu_status" class="small-input">
										<option value="active" selected="selected">Active</option>
										<option value="inactive">InActive</option>
									</select> 
								</p>
								
							<!--	<p>
									<label>Page Content:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="Submit" name="edit" />
									<a href="admin.php?mod=manageGallery"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->