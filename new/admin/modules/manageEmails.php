<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{
$ad_title=$_REQUEST['ad_title'];
$ad_country=$_REQUEST['country'];
$ad_state=$_REQUEST['state'];
$ad_city=$_REQUEST['ad_city'];
$ad_zipcode=$_REQUEST['ad_zipcode'];
$ad_type=$_REQUEST['ad_type'];
$ad_status=$_REQUEST['ad_status'];
$ad_content=$_REQUEST['ad_content'];
$ad_time=date('l jS \of F Y h:i:s A');
$ad_user=$_REQUEST['ad_user'];
$ad_cat=@implode(",",$_REQUEST['ad_cat']);
$ad_market=@implode(",",$_REQUEST['ad_markets']);
if($_FILES['ad_image']['name']!="")
{
$ad_image=$ad_user."_".time()."_".$_FILES['ad_image']['name'];
$file=move_uploaded_file($_FILES['ad_image']['tmp_name'],"../UsersData/ad_images/".$ad_image);
}
else
{
$ad_image="noimage.jpg";
$file=1;
}


$q="INSERT INTO `ad_posts` (`ad_id` ,`ad_user` ,`ad_title` ,`ad_content` ,`ad_image` ,`ad_city` ,`ad_state` ,`ad_zipcode` ,`ad_country` ,`ad_type` ,`ad_cat` ,`ad_markets` ,`ad_time` ,`ad_status`)VALUES (NULL , '$ad_user', '$ad_title', '$ad_content', '$ad_image', '$ad_city', '$ad_state', '$ad_zipcode', '$ad_country', '$ad_type', '$ad_cat', '$ad_market', '$ad_time', '$ad_status');";



if($file)
{
$qr=mysql_query($q);
}
else
{
$qr=0;
}

//$qr=mysql_query($q);
//trace($qr);
if($qr)
{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Email "<?php echo $_REQUEST['ad_title']; ?>: Queued  Successfully !
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
		Failed to Create Enail !  <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
		<?php
}


}

if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$ad_id=$_REQUEST['aid'];
		$q="DELETE FROM `ad_posts` WHERE `ad_id`='$ad_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Post Deleted !
		</div>
		</div>
		<?php
		}
		else
		{
		?>
		<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Delete Post !
		</div>
		</div>
		<?php
		
		}
	}
	else if($_REQUEST['action']=="status")
	{
		if($_REQUEST['current']=="Active")
		{
			$status="InActive";
		}
		else
		{
			$status="Active";
		}
		$ad_id=$_REQUEST['aid'];
		$q="UPDATE `ad_posts` SET `ad_status` = '$status' WHERE `ad_id` ='$ad_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Post Updated !
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
		Failed to Update Post ! 
		</div>
		</div>
		<?php
		}	
	}
	else if($_REQUEST['action']=="edit")
	{
		
	$pid=$_REQUEST['page_id'];
	
	$page_title=$_REQUEST['page_title'];
	//$page_name=$_REQUEST['page_name'];
	$page_menu_title=$_REQUEST['page_menu_title'];
	$page_menu_alt=$_REQUEST['page_menu_alt'];
	$page_heading=$_REQUEST['page_heading'];
	$page_color="#".$_REQUEST['page_color'];
	//$page_image=$_FILES['page_image']['name'];
	$page_content=$_REQUEST['page_content'];
	$page_parent=$_REQUEST['page_parent'];
	$page_time=date('l jS \of F Y h:i:s A');
	$page_status=$_REQUEST['page_status'];
	$page_file_content=$page_content;
		
		if($_FILES['page_image']['name']=="")
		{
		$page_image=$_REQUEST['pimage']; 
		$file=1;
		}
		else
		{
		$page_image=$_FILES['page_image']['name'];
		$file=move_uploaded_file($_FILES['page_image']['tmp_name'],"../modules/cms/images/".$_FILES['page_image']['name']);
		}

	$q="UPDATE `cms_pages` SET `page_title` = '$page_title',`page_menu_title` = '$page_menu_title',`page_menu_alt` = '$page_menu_alt',`page_heading`='$page_heading',`page_color`='$page_color',`page_image`='$page_image',`page_content` = '$page_content',`page_parent`='$page_parent',`page_time` = '$page_time',`page_status` = '$page_status' WHERE `page_id` ='$pid';";
		if($file)
		{
		$qr=mysql_query($q);
		}
		else
		{
		$qr=0;
		}
	//$qr=mysql_query($q);
//trace($qr);
	if($qr)
	{
	?>
	<div class="notification success png_bg">
	<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
	<div>
	Page Updated !
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
	Failed to Update Page ! 
	</div>
	</div>
	<?php
	}	
	
	}
	else if($_REQUEST['action']=='bulkDelete')
	{
		$delPosts=$_REQUEST['delPosts'];
		while (list ($key,$val) = @each ($delPages))
		{
		$qd="DELETE FROM `ad_posts` WHERE `ad_id`='$val';";
		$qrd=mysql_query($qd);
		}
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Selected Posts Deleted !
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
		An error occured while deleting Posts !
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
if(document.createPost.ad_title.value=="")
{
alert("Provide Email Subject");
document.createPost.ad_title.focus();
return false;
}
else if(document.createPost.ad_city.value=="")
{
alert("Provide City");
document.createPost.ad_city.focus();
return false;
}
else if(document.createPost.ad_zipcode.value=="")
{
alert("Provide ZipCode");
document.createPost.ad_zipcode.focus();
return false;
}
else if(document.createPost.ad_content.value=="")
{
alert("Provide Few Lines of Description");
//document.createPost.ad_content.focus();
return false;
}
else
{
return true;
}

}
</script>

<script type="text/javascript">
function showCats(catid, status)
{
		if((document.getElementById(catid).style.display=='block' || document.getElementById(catid).style.display=='') && status!=true)
		{
		document.getElementById(catid).style.display='none';
		}
		else
		{
		if(status==true)
		{
		document.getElementById(catid).style.display='';
		}
		}
//alert(status);
}


</script>

<script type="text/javascript">
var postState = '';
var postCountry = 'US';
</script>
<script type="text/javascript" src="includes/countryState.js"></script>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Email Exchange </h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Email Listing </a></li> 
						<!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Send New Email</a></li> 
						<!-- href must be unique and match the id of target div -->

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
	<form name="delAdForm" action="admin.php?mod=manageEmails&action=bulkDelete&token=<?php echo time(); ?>" method="post">
						<table>
							
							<thead>
								<tr>
								   <th width="20"><input class="check-all" type="checkbox" /></th>
								   <th width="33">ID  </th>
								   <th width="104">Logo</th>
								   <th width="174">Email Subject </th>
								   <th width="121">Email Owner </th>
								   <th width="111">Location </th>
								   <th width="131"> Time </th>
								   <th width="131">Email Type </th>
								   <th width="131"> Email Ad Status </th>
								   <th width="120">Actions</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="10">
									<!--	<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div> -->
										
									<!--	<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>										</div>  End .pagination 
										<div class="clear"></div>	-->								</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<?php
$adtype=$_REQUEST['ad_type'];
$q="SELECT * FROM `ad_posts` WHERE `ad_type`='$adtype';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{

?>
								<tr>
									<td><input type="checkbox" name="delPages[]" value="<?php echo $qrow['ad_id']; ?>"/></td>
									<td align="left" valign="top"><?php echo $qrow['ad_id']; ?></td>
									<td valign="bottom"><img src="<?php echo "imageResize.php?image=../UsersData/ad_images/".$qrow['ad_image']; ?>&scale=10" alt="<?php echo $qrow['image_title']; ?>" /></td>
									<td valign="top"><?php echo $qrow['ad_title']; ?></td>
									<td align="left" valign="top"><?php echo $qrow['ad_user']; ?></td>
									<td align="left" valign="top"><?php echo $qrow['ad_city'].", ".$qrow['ad_state']."<br/>".$qrow['ad_zipcode'].", ".$qrow['ad_country']; ?></td>
									<td align="left" valign="top"><?php echo $qrow['ad_time']; ?></td>
									<td align="left" valign="top"><?php echo $qrow['ad_type']; ?></td>
									<td align="left" valign="top"><?php echo $qrow['ad_status']; ?></td>
									<td align="left" valign="top">
										<!-- Icons -->
										<a href="admin.php?mod=editEmail&aid=<?php echo $qrow['ad_id'].'&token='.time(); ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&ad_type='.$_REQUEST['ad_type'].'&action=delete&aid='.$qrow['ad_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete Post: <?php echo $qrow['ad_title']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									 <a href="<?php echo $_SERVER['REQUEST_URI'].'&ad_type='.$_REQUEST['ad_type'].'&action=status&current='.$qrow['ad_status'].'&aid='.$qrow['ad_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>							</td>
								</tr>
<?php
}
?>
							</tbody>
		</table>
						<input type="submit" name="bulkDelete" value="Delete Selected" class="button" /> <input type="button" name="Preview" value="Preview Email" class="button" /> <input type="button" name="Preview" value="Preview Recievers" class="button" /> <input type="button" name="Preview" value="Send Selected Emails" class="button" />
					  </form>
					</div> <!-- End #tab1 -->
						<div class="tab-content" id="tab2"> 
<form name="createPost" action="admin.php?mod=manageEmails&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Email Subject:</label>
										<input class="text-input small-input" type="text" id="small-input" name="ad_title" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
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
									<label>City:</label>
									<input class="text-input small-input" type="text" id="medium-input" name="ad_city" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								<p>
									<label> ZipCode: <small><a href="#" title="This is Menu Hower Text"></a></small></label>
									<input class="text-input small-input" type="text" id="medium-input" name="ad_zipcode" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
					

								<p>
									<label>Logo:  </small></label>
									<input class="text-input" type="file" id="medium-input" name="ad_image" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
					
							
						<p>
									<label>Ad Type: </label>              
									<select name="ad_type" class="small-input">
										<option value="Need">I Need</option>
										<option value="Have" selected="selected">I Have</option>
						                      </select> 
							</p> 
							
						<p>
									<label>Category(s)</label>  
									<ul>
<?php
$q="SELECT * FROM `ad_categories` WHERE `cat_parent`='1';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{

?>
	<li>		<input type="checkbox" name="ad_cat[]" value="<?php echo $qrow['cat_id']; ?>" onClick="showCats('sub<?php echo $qrow['cat_id']; ?>',this.checked)" /><?php echo $qrow['cat_name']; ?><br /></li>
				<ul style="background: #fff url('admin/resources/images/bg-form-field.gif') top left repeat-x; border:#CCCCCC dashed 1px; display:none; max-width:200px; margin-left:30px; list-style:none; padding-top:7px; padding-bottom:7px;" id="sub<?php echo $qrow['cat_id']; ?>">
				<?php
				$qid=$qrow['cat_id'];
				$q2="SELECT * FROM `ad_categories` WHERE `cat_parent`='$qid';";
				$qr2=mysql_query($q2);
				while($qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC))
				{
				
				?>
				<li>		<input type="checkbox" name="ad_cat[]" value="<?php echo $qrow2['cat_id']; ?>" /><?php echo $qrow2['cat_name']; ?><br /></li>
				<?php
				}
				?>
					<li>		<input type="checkbox" name="ad_cat[]" value="10" />TEST 2</li>	<li>		<input type="checkbox" name="ad_cat[]" value="11" />TEST 1</li>
				</ul>

<?php
}
?>
	</ul>								
							</p> 
								<p>
									<label>Markets(s)</label>   
									<ul>
							<?php
$q="SELECT * FROM `ad_categories` WHERE `cat_parent`='2';";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{

?>
<li>			<input type="checkbox" name="ad_markets[]" value="<?php echo $qrow['cat_id']; ?>" onClick="showCats('sub<?php echo $qrow['cat_id']; ?>',this.checked)"/><?php echo $qrow['cat_name']; ?><br /></li>

	<ul style="background: #fff url('admin/resources/images/bg-form-field.gif') top left repeat-x; border:#CCCCCC dashed 1px; display:none; max-width:200px; margin-left:30px; list-style:none; padding-top:7px; padding-bottom:7px;" id="sub<?php echo $qrow['cat_id']; ?>">
				<?php
				$qid=$qrow['cat_id'];
				$q2="SELECT * FROM `ad_categories` WHERE `cat_parent`='$qid';";
				$qr2=mysql_query($q2);
				while($qrow2=mysql_fetch_array($qr2,MYSQL_ASSOC))
				{
				
				?>
				<li>		<input type="checkbox" name="ad_markets[]" value="<?php echo $qrow2['cat_id']; ?>" /><?php echo $qrow2['cat_name']; ?></li>
				<?php
				}
				?>
					<li>		<input type="checkbox" name="ad_markets[]" value="10" />TEST 2</li>	<li>		<input type="checkbox" name="ad_markets[]" value="11" />TEST 1</li>
				</ul>

<?php
}
?>
									</ul>
							</p> 
							
								<p>
									<label>Email Status:</label>              
									<select name="ad_status" class="small-input">
										<option value="Active" selected="selected">Active</option>
										<option value="InActive">InActive</option>
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
						<option value="<?php echo $qurow['user_id']; ?>"><?php echo $qurow['username']; ?></option>
<?php
}
?>

							</select>
								
								</p>
								<p>
								<!-- text-input textarea  -->
									<label>Description: *</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="ad_content" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
									<a href="admin.php?mod=managePosts"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
						</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->