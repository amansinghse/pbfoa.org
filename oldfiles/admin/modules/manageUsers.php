<?php
if(isset($_POST['submit']) && isset($_REQUEST['token']))
{

$firstName=$_REQUEST['first_name'];
$lastName=$_REQUEST['last_name'];
$userName=$_REQUEST['username'];
$email=$_REQUEST['email'];
$sex=$_REQUEST['sex'];
$country=$_REQUEST['country'];
$zipCode=$_REQUEST['zipcode'];
$userImage=$userName."_".time()."_".$_FILES['user_image']['name'];
$userType=$_REQUEST['user_type'];
$userStatus=$_REQUEST['user_status'];
$profileContent=$_REQUEST['profile_content'];
$userUpdated=date('l jS \of F Y h:i:s A');

$q="INSERT INTO `web_users` (`user_id` ,`username` ,`firstname` ,`lastname` ,`email` ,`sex` ,`country` ,`zipcode` ,`profile_avatar` ,`profile_content` ,`user_type` ,`user_status` ,`last_updated`)VALUES (NULL , '$userName', '$firstName', '$lastName', '$email', '$sex', '$country', '$zipCode', '$userImage', '$profileContent', '$userType', '$userStatus', '$userUpdated');";
if(!$_FILES['user_image']['name']=="")
{
	$file=move_uploaded_file($_FILES['user_image']['tmp_name'],"../UsersData/avatars/".$userImage);
	
	if($file)
	{
		$qr=mysql_query($q);
	}
	else
	{
		$qr=0;
	}
}
else
{
	$qr=mysql_query($q);	
}



//$qr=mysql_query($q);
//trace($qr);
if($qr)
{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		User "<?php echo $_REQUEST['username']; ?>: Added Successfully !
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
		Failed to Add User "<?php echo $_REQUEST['username']; ?>" !  <a href="javascript:history.go(-1)" title="Go Back" style="color:#FFFFFF;"> Click here to Try Again </a>
		</div>
		</div>
		<?php
}


}

if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=='delete')
	{
		$user_id=$_REQUEST['uid'];
		$q="DELETE FROM `web_users` WHERE `user_id`='$user_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		
		?>
		<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		User Deleted !
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
		Failed to Delete User !
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
		$user_id=$_REQUEST['uid'];
		$q="UPDATE `web_users` SET `user_status` = '$status' WHERE `user_id` ='$user_id';";
		$qr=mysql_query($q);
		if($qr)
		{
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		User Updated !
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
		Failed to Update User ! 
		</div>
		</div>
		<?php
		}	
	}
	else if($_REQUEST['action']=="edit")
	{
		
	$uid=$_REQUEST['user_id'];
	
	$firstName=$_REQUEST['first_name'];
	$lastName=$_REQUEST['last_name'];
	$userName=$_REQUEST['username'];
	$email=$_REQUEST['email'];
	$sex=$_REQUEST['sex'];
	$country=$_REQUEST['country'];
	$zipCode=$_REQUEST['zipcode'];
	$userImage=$userName."_".time()."_".$_FILES['user_image']['name'];
	$userType=$_REQUEST['user_type'];
	$userStatus=$_REQUEST['user_status'];
	$profileContent=$_REQUEST['profile_content'];
	$userUpdated=date('l jS \of F Y h:i:s A');
		
		if($_FILES['user_image']['name']=="")
		{
		$userImage=$_REQUEST['pimage']; 
		$file=1;
		}
		else
		{
		//$page_image=$_FILES['page_image']['name'];
		$file=move_uploaded_file($_FILES['page_image']['tmp_name'],"../UsersData/avatars/".$userImage);
		}

	$q="UPDATE `web_users` SET `page_title` = '$page_title',`page_menu_title` = '$page_menu_title',`page_menu_alt` = '$page_menu_alt',`page_heading`='$page_heading',`page_color`='$page_color',`page_image`='$page_image',`page_content` = '$page_content',`page_parent`='$page_parent',`page_time` = '$page_time',`page_status` = '$page_status' WHERE `page_id` ='$pid';";
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
	User Updated !
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
	Failed to Update User ! 
	</div>
	</div>
	<?php
	}	
	
	}
	else if($_REQUEST['action']=='bulkDelete')
	{
		$delUsers=$_REQUEST['delUsers'];
		while (list ($key,$val) = @each ($delUsers))
		{
		$qd="DELETE FROM `web_users` WHERE `user_id`='$val';";
		$qrd=mysql_query($qd);
		}
		if($qrd)
		{
		
		?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Selected Users Deleted !
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
		An error occured while deleting Users !
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
if(document.createUser.firstname.value=="")
{
alert("Provide First Name");
document.createUser.firstname.focus();
return false;
}
else if(document.createUser.lastname.value=="")
{
alert("Provide Last Name");
document.createUser.lastname.focus();
return false;
}
else if(document.createUser.username.value=="")
{
alert("Provide Username");
document.createUser.username.focus();
return false;
}
else if(document.createUser.email.value=="")
{
alert("Provide Email");
document.createUser.email.focus();
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
					
					<h3>Users Management </h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage Users</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add New User</a></li> <!-- href must be unique and match the id of target div -->

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
	<form name="delUsersForm" action="admin.php?mod=manageUsers&action=bulkDelete&token=<?php echo time(); ?>" method="post">
						<table>
							
							<thead>
								<tr>
								   <th width="20"><input class="check-all" type="checkbox" /></th>
								   <th width="80">User Avatar </th>
								   <th width="102">Username (Name)</th>
								   <th width="83">Country</th>
								   <th width="147">User Type </th>
								   <th width="131">User Status</th>
								   <th width="120">Actions</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="7">
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

$q="SELECT * FROM `web_users` WHERE 1;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{

?>
								<tr>
									<td><input type="checkbox" name="delUsers[]" value="<?php echo $qrow['user_id']; ?>"/></td>
									<td><img src="<?php echo "imageResize.php?image=../UsersData/avatars/".$qrow['profile_avatar']; ?>&scale=15" alt="<?php echo $qrow['username']; ?>" /></td>
									<td><?php echo $qrow['username']." (".$qrow['firstname']." ".$qrow['lastname'].")"; ?></td>
									<td><?php echo $qrow['country']; ?></td>
									<td><?php echo $qrow['user_type']; ?></td>
									<td><?php echo $qrow['user_status']; ?></td>
									<td>
										<!-- Icons -->
										<a href="admin.php?mod=editUser&uid=<?php echo $qrow['user_id'].'&token='.time(); ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=delete&uid='.$qrow['user_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete user <?php echo $qrow['username']; ?> ?');"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									 <a href="<?php echo $_SERVER['REQUEST_URI'].'&action=status&current='.$qrow['user_status'].'&uid='.$qrow['user_id']; ?>" title="Toggle Status"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>							</td>
								</tr>
<?php
}
?>
							</tbody>
						</table>
						<input type="submit" name="bulkDelete" value="Delete Selected" class="button" />
						</form>
					</div> <!-- End #tab1 -->
						<div class="tab-content" id="tab2"> 
<form name="createUser" action="admin.php?mod=manageUsers&token=<?php echo time(); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>FirstName: * </label>
									<input class="text-input small-input" type="text" id="small-input" name="first_name" />
								</p>
								<p>
								<label>Last Name: * </label>
									<input class="text-input small-input" type="text" id="small-input" name="last_name" />

								</p>
								
								<p>
									<label>Username: *</label>
									<input class="text-input small-input" type="text" id="medium-input" name="username" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
								<label>Email: *</label>
									<input class="text-input small-input" type="text" id="medium-input" name="email" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Sex:</small></label>
								<select name="sex">
								<option value="male" selected="selected">Male</option>
								<option value="female">Female</option>
								</select>
								<!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<p>
									<label>Location:</label>
									<select name="country">
    <option value="AF">Afghanistan</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AS">American Samoa</option>
    <option value="AD">Andorra</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarctica</option>
    <option value="AG">Antigua and Barbuda</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbaijan</option>
    <option value="BS">Bahamas</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermuda</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Bolivia</option>
    <option value="BA">Bosnia and Herzegowina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Bouvet Island</option>
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="CV">Cape Verde</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CN">China</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, the Democratic Republic of the</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="CI">Cote d'Ivoire</option>
    <option value="HR">Croatia (Hrvatska)</option>
    <option value="CU">Cuba</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="TP">East Timor</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Ethiopia</option>
    <option value="FK">Falkland Islands (Malvinas)</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="FX">France, Metropolitan</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Georgia</option>
    <option value="DE">Germany</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard and Mc Donald Islands</option>
    <option value="VA">Holy See (Vatican City State)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IR">Iran (Islamic Republic of)</option>
    <option value="IQ">Iraq</option>
    <option value="IE">Ireland</option>
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JM">Jamaica</option>
    <option value="JP">Japan</option>
    <option value="JO">Jordan</option>
    <option value="KZ">Kazakhstan</option>
    <option value="KE">Kenya</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Korea, Democratic People's Republic of</option>
    <option value="KR">Korea, Republic of</option>
    <option value="KW">Kuwait</option>
    <option value="KG">Kyrgyzstan</option>
    <option value="LA">Lao People's Democratic Republic</option>
    <option value="LV">Latvia</option>
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libyan Arab Jamahiriya</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    <option value="MO">Macau</option>
    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Marshall Islands</option>
    <option value="MQ">Martinique</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MX">Mexico</option>
    <option value="FM">Micronesia, Federated States of</option>
    <option value="MD">Moldova, Republic of</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Netherlands</option>
    <option value="AN">Netherlands Antilles</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Norfolk Island</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="NO">Norway</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua New Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
    <option value="PN">Pitcairn</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
    <option value="RE">Reunion</option>
    <option value="RO">Romania</option>
    <option value="RU">Russian Federation</option>
    <option value="RW">Rwanda</option>
    <option value="KN">Saint Kitts and Nevis</option> 
    <option value="LC">Saint LUCIA</option>
    <option value="VC">Saint Vincent and the Grenadines</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Sao Tome and Principe</option> 
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    <option value="SK">Slovakia (Slovak Republic)</option>
    <option value="SI">Slovenia</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="GS">South Georgia and the South Sandwich Islands</option>
    <option value="ES">Spain</option>
    <option value="LK">Sri Lanka</option>
    <option value="SH">St. Helena</option>
    <option value="PM">St. Pierre and Miquelon</option>
    <option value="SD">Sudan</option>
    <option value="SR">Suriname</option>
    <option value="SJ">Svalbard and Jan Mayen Islands</option>
    <option value="SZ">Swaziland</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
    <option value="SY">Syrian Arab Republic</option>
    <option value="TW">Taiwan, Province of China</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania, United Republic of</option>
    <option value="TH">Thailand</option>
    <option value="TG">Togo</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad and Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey</option>
    <option value="TM">Turkmenistan</option>
    <option value="TC">Turks and Caicos Islands</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="GB">United Kingdom</option>
    <option value="US" selected="selected">United States</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VE">Venezuela</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Virgin Islands (British)</option>
    <option value="VI">Virgin Islands (U.S.)</option>
    <option value="WF">Wallis and Futuna Islands</option>
    <option value="EH">Western Sahara</option>
    <option value="YE">Yemen</option>
    <option value="YU">Yugoslavia</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select><!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>ZipCode:</label>
									<input type="text" id="medium-input" name="zipcode" class="text-input small-input"/> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								<p>
									<label>Profile Avatar:</label>
									<input class="text-input small-input" type="file" id="medium-input" name="user_image" /> <!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
							<!--	<p>
									<label>File Name:</label>
									<input class="text-input small-input datepicker" type="text" id="page_file" name="page_file" /> 
									 <span class="input-notification error png_bg">Error message</span> 
								</p> 
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<!-- <p>
									<label>Page Type: </label>
									<input value="dynamic" type="radio" name="page_type" /> 
									Dynamic<br />
									<input value="static" type="radio" name="page_type" />
									HTML File </p> -->
						<p>
									<label>User Type: </label>              
									<select name="user_type" class="small-input">
										<option value="provider" selected="selected">Provider</option>
										<option value="buyer">Buyer</option>
								
										</select> 
								</p> 
								<p>
									<label>User Status:</label>              
									<select name="user_status" class="small-input">
										<option value="Active" selected="selected">Active</option>
										<option value="InActive">InActive</option>
									</select> 
								</p> 
								
								<p>
								<!-- text-input textarea  -->
									<label>Profile Information:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="profile_content" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
									<a href="admin.php?mod=manageUsers"><input class="button" type="button" name="Back" value="Back" /></a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
						</div>
</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->