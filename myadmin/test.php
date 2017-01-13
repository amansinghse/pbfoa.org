<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
if($_REQUEST['action']=="delete"){
		$query="delete from family_office where id='".$_REQUEST['id']."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Record has been deleted successfully!";
		$fn->ReturnReferer();
		exit();
}
if(isset($_POST["addition"]))
{
	/*
	$date=date("Y-m-d h:i:sa");
 $fname = $_POST['fname']; 
$lname = $_POST['lname'];
 $email = $_POST['email'];
$phone = $_POST['phone']; 
$company = $_POST['company'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$areainterest = implode(',', array_filter($_REQUEST['areainterest']));
$net_worth = $_POST['networth'];
$invest = $_POST['fminvest'];
 $estatetrans = implode(',', array_filter($_REQUEST['estatetrans']));
$invest_equity = $_POST['privatequity']; 
$firmtrans = implode(',', array_filter($_REQUEST['firmtrans']));
$equity_size = $_POST['averagesize'];


	$q="INSERT INTO family_office (fname,lname,email,phone,company,address,city,state,zip,country,
	interest,net_worth,invest,transactions,invest_equity,transactions_equity,equity_size,Date)
 VALUES ('$fname','$lname','$email','$phone','$company','$address','$city','$state',
 '$zip','$country','$areainterest','$net_worth','$invest','$estatetrans','$invest_equity',
 '$firmtrans','$equity_size','$date')";

$fn->InsertQuery($q);
$_SESSION['ERRORTYPE'] = "success";
$_SESSION['ERRORMSG'] = "Record has been inserted successfully!";
$fn->ReturnReferer();
*/
}

if(isset($_POST["fileselect"]))
{
	$date=date("Y-m-d h:i:sa");
$file = $_FILES['file']['tmp_name'];

$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
	
$fname = $filesop[0];
$lname = $filesop[1];
$email = $filesop[2];
$phone = $filesop[3];
$company = $filesop[4];
$address = $filesop[5];
$city = $filesop[6];
$state = $filesop[7];
$zip = $filesop[8];
$country = $filesop[9];
$company_logo = $filesop[10];
$marketing_material=$filesop[11];
$videos = $filesop[12];
$interest = $filesop[13];
$net_worth = $filesop[14];
$invest = $filesop[15];
$transactions = $filesop[16];
$invest_equity = $filesop[17];
$transactions_equity = $filesop[18];
$equity_size = $filesop[19];
$notes=$filesop[20];

$q="INSERT INTO family_office (fname,lname,email,phone,company,address,city,state,zip,country,company_logo,
marketing_material,videos,interest,net_worth,invest,transactions,invest_equity,transactions_equity,equity_size,notes,Date)
 VALUES ('$fname','$lname','$email','$phone','$company','$address','$city','$state','$zip','$country','$company_logo',
'$marketing_material','$videos','$interest','$net_worth','$invest','$transactions','$invest_equity','$transactions_equity','$equity_size','$notes','$date')";
//$sql = mysqli_query($conn,$q);
$fn->InsertQuery($q);
$c = $c + 1;
$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Record has been imported successfully!";
		$fn->ReturnReferer();

}


}


if(isset($_POST['btnupdate'])){
		$date=date("Y-m-d h:i:sa");
 $firmtrans = implode(',', array_filter($_REQUEST['firmtrans']));
 $areainterest = implode(',', array_filter($_REQUEST['areainterest']));
 $estatetrans = implode(',', array_filter($_REQUEST['estatetrans']));
 $query="update family_office set fname='".$fn->ReplaceSql($_POST['fname'])."', lname='".create_slug($_POST['lname'])."',email='".$fn->ReplaceSql($_POST['email'])."',phone='".$fn->ReplaceSql($_POST['phone'])."',company='".$fn->ReplaceSql($_POST['company'])."',address='".$fn->ReplaceSql($_POST['address'])."',city='".$fn->ReplaceSql($_POST['city'])."',state='".$fn->ReplaceSql($_POST['state'])."',zip='".$fn->ReplaceSql($_POST['zip'])."',country='".$fn->ReplaceSql($_POST['country'])."',interest='".$areainterest."',net_worth='".$fn->ReplaceSql($_POST['networth'])."',invest='".$fn->ReplaceSql($_POST['fminvest'])."',transactions='".$estatetrans."',invest_equity='".$fn->ReplaceSql($_POST['privatequity'])."',transactions_equity='".$firmtrans."',equity_size='".$fn->ReplaceSql($_POST['averagesize'])."',notes='".$fn->ReplaceSql($_POST['notes'])."',Date='$date' where page_id='".$fn->ReplaceSql($_POST['page_id'])."'";
 $fn->UpdateQuery($query);

 
 $_SESSION['ERRORTYPE'] = "success";
 $_SESSION['ERRORMSG'] = "Record has been updated successfully!";
 $fn->ReturnReferer();
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php");?>
<style type="text/css">
.clear {
	clear:both;
	width:100%;
	float:left;
}
#sortable-list {
	padding:0;
	margin:0px;
	width:100%;
}
#sortable-list li {
	padding:10px;
	color:#000;
	cursor:move;
	list-style:none;
	float:left;
	background:#ddd;
	margin:5px;
	border:1px solid #999;
	font-size:14px;
}
#message-box {
	background:#fffea1;
	border:2px solid #fc0;
	padding:4px 8px;
	margin:0 0 14px 0;
	width:500px;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		/* grab important elements */
		var sortInput = jQuery('#sort_order');
		var submit = jQuery('#autoSubmit');
		var messageBox = jQuery('#message-box');
		var list = jQuery('#sortable-list');
		/* create requesting function to avoid duplicate code */
		var request = function() {
			jQuery.ajax({
				beforeSend: function() {
					messageBox.text('Updating the sort order in the database.');
				},
				complete: function() {
					messageBox.text('Database has been updated.');
				},
				data: 'sort_order=' + sortInput[0].value + '&ajax=' + submit[0].checked + '&do_submit=1&byajax=1', //need [0]?
				type: 'post',
				url: '<?php echo $_SERVER["REQUEST_URI"]; ?>'
			});
		};
		/* worker function */
		var fnSubmit = function(save) {
			var sortOrder = [];
			list.children('li').each(function(){
				sortOrder.push(jQuery(this).data('id'));
			});
			sortInput.val(sortOrder.join(','));
			if(save) {
				request();
			}
		};
		/* store values */
		list.children('li').each(function() {
			var li = jQuery(this);
			li.data('id',li.attr('title')).attr('title','');
		});
		/* sortables */
		list.sortable({
			opacity: 0.7,
			update: function() {
				fnSubmit(submit[0].checked);
			}
		});
		list.disableSelection();
		/* ajax form submission */
		jQuery('#dd-form').bind('submit',function(e) {
			if(e) e.preventDefault();
			fnSubmit(true);
		});
	});
</script>
</head>
<body>
<?php require_once("message.php");?>
<div class="full">

<h1 style="float: left; width: 100%; margin-top: 15px;">List of Family Office Membership 
<?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> 
<?php if($_REQUEST['action']=="view"){ echo "[View]";} ?>

<span style="float: right; margin-right: 45px; margin-bottom: 10px">
<a href="?action=add" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Add Membership</a>

<a href="family_export.php" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Export Data</a>
<a  href="?action=import" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Import Data</a>
<a  href="test.php" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">List Data</a></span></h1>

</div>

<?php  require_once("message.php");
   
if($_REQUEST['action']=="edit"){
		$query="select * from family_office WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
		$interest = explode(',', $data[0]['interest']);
		$transactions = explode(',', $data[0]['transactions']);
		$transactions_equity = explode(',', $data[0]['transactions_equity']);
	?>
		<form action="" method="POST" enctype="multipart/form-data">
			<table width="100%" cellspacing="1" cellpadding="10" class="tbl" id="tbl">
				<tr>
				  <th colspan="2">Edit Membership</th>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">First Name</label></td>
					<td>
						<input type="text" title="First Name" class="R"  name="fname" id="fname" value="<?php echo (isset($data[0])) ? $data[0]['fname'] : $_POST['fname'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Last Name</label></td>
					<td>
						<input type="text" title="Last Name" class="R"  name="lname" id="lname" value="<?php echo (isset($data[0])) ? $data[0]['lname'] : $_POST['lname'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Email</label></td>
					<td>
						<input type="text" title="Email" class="R"  name="email" id="email" value="<?php echo (isset($data[0])) ? $data[0]['email'] : $_POST['email'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Phone</label></td>
					<td>
						<input type="text" title="Phone" class="R"  name="phone" id="phone" value="<?php echo (isset($data[0])) ? $data[0]['phone'] : $_POST['phone'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Company</label></td>
					<td>
						<input type="text" title="Company" class="R"  name="company" id="company" value="<?php echo (isset($data[0])) ? $data[0]['company'] : $_POST['company'] ;?>" size="50"/>
					</td>
				</tr>
				
				<tr>
					<td width="20%"> <label id="err_page_title">Addresse</label></td>
					<td>
						<input type="text" title="Address" class="R"  name="address" id="address" value="<?php echo (isset($data[0])) ? $data[0]['address'] : $_POST['address'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">City</label></td>
					<td>
						<input type="text" title="City" class="R"  name="city" id="city" value="<?php echo (isset($data[0])) ? $data[0]['city'] : $_POST['city'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">State</label></td>
					<td>
						<select name="state">
								<option value="">State</option>
								<option value="Alabama" <?php if($data[0]['state'] == 'Alabama') { echo 'selected="selected"'; } ?>>Alabama</option>
								<option value="Alaska" <?php if($data[0]['state'] == 'Alaska') { echo 'selected="selected"'; } ?>>Alaska</option>
								<option value="Arizona" <?php if($data[0]['state'] == 'Arizona') { echo 'selected="selected"'; } ?>>Arizona</option>
								<option value="Arkansas" <?php if($data[0]['state'] == 'Arkansas') { echo 'selected="selected"'; } ?>>Arkansas</option>
								<option value="California" <?php if($data[0]['state'] == 'California') { echo 'selected="selected"'; } ?>>California</option>
								<option value="Colorado" <?php if($data[0]['state'] == 'Colorado') { echo 'selected="selected"'; } ?>>Colorado</option>
								<option value="Connecticut" <?php if($data[0]['state'] == 'Connecticut') { echo 'selected="selected"'; } ?>>Connecticut</option>
								<option value="Delaware" <?php if($data[0]['state'] == 'Delaware') { echo 'selected="selected"'; } ?>>Delaware</option>
								<option value="District of Columbia" <?php if($data[0]['state'] == 'District of Columbia') { echo 'selected="selected"'; } ?>>District of Columbia</option>
								<option value="Florida" <?php if($data[0]['state'] == 'Florida') { echo 'selected="selected"'; } ?>>Florida</option>
								<option value="Georgia" <?php if($data[0]['state'] == 'Georgia') { echo 'selected="selected"'; } ?>>Georgia</option>
								<option value="Hawaii" <?php if($data[0]['state'] == 'Hawaii') { echo 'selected="selected"'; } ?>>Hawaii</option>
								<option value="Idaho" <?php if($data[0]['state'] == 'Idaho') { echo 'selected="selected"'; } ?>>Idaho</option>
								<option value="Illinois" <?php if($data[0]['state'] == 'Illinois') { echo 'selected="selected"'; } ?>>Illinois</option>
								<option value="Indiana" <?php if($data[0]['state'] == 'Indiana') { echo 'selected="selected"'; } ?>>Indiana</option>
								<option value="Iowa" <?php if($data[0]['state'] == 'Iowa') { echo 'selected="selected"'; } ?>>Iowa</option>
								<option value="Kansas" <?php if($data[0]['state'] == 'Kansas') { echo 'selected="selected"'; } ?>>Kansas</option>
								<option value="Kentucky <?php if($data[0]['state'] == 'Kentucky') { echo 'selected="selected"'; } ?>">Kentucky</option>
								<option value="Louisiana" <?php if($data[0]['state'] == 'Louisiana') { echo 'selected="selected"'; } ?>>Louisiana</option>
								<option value="Maine" <?php if($data[0]['state'] == 'Maine') { echo 'selected="selected"'; } ?>>Maine</option>
								<option value="Maryland" <?php if($data[0]['state'] == 'Maryland') { echo 'selected="selected"'; } ?>>Maryland</option>
								<option value="Massachusetts" <?php if($data[0]['state'] == 'Massachusetts') { echo 'selected="selected"'; } ?>>Massachusetts</option>
								<option value="Michigan" <?php if($data[0]['state'] == 'Michigan') { echo 'selected="selected"'; } ?>>Michigan</option>
								<option value="Minnesota" <?php if($data[0]['state'] == 'Minnesota') { echo 'selected="selected"'; } ?>>Minnesota</option>
								<option value="Mississippi" <?php if($data[0]['state'] == 'Mississippi') { echo 'selected="selected"'; } ?>>Mississippi</option>
								<option value="Missouri" <?php if($data[0]['state'] == 'Missouri') { echo 'selected="selected"'; } ?>>Missouri</option>
								<option value="Montana" <?php if($data[0]['state'] == 'Montana') { echo 'selected="selected"'; } ?>>Montana</option>
								<option value="Nebraska" <?php if($data[0]['state'] == 'Nebraska') { echo 'selected="selected"'; } ?>>Nebraska</option>
								<option value="Nevada" <?php if($data[0]['state'] == 'Nevada') { echo 'selected="selected"'; } ?>>Nevada</option>
								<option value="New Hampshire" <?php if($data[0]['state'] == 'New Hampshire"') { echo 'selected="selected"'; } ?>>New Hampshire</option>
								<option value="New Jersey" <?php if($data[0]['state'] == 'New Jersey') { echo 'selected="selected"'; } ?>>New Jersey</option>
								<option value="New Mexico" <?php if($data[0]['state'] == 'New Mexico') { echo 'selected="selected"'; } ?>>New Mexico</option>
								<option value="New York" <?php if($data[0]['state'] == 'New York') { echo 'selected="selected"'; } ?>>New York</option>
								<option value="North Carolina" <?php if($data[0]['state'] == 'North Carolina') { echo 'selected="selected"'; } ?>>North Carolina</option>
								<option value="North Dakota" <?php if($data[0]['state'] == 'North Dakota') { echo 'selected="selected"'; } ?>>North Dakota</option>
								<option value="Ohio" <?php if($data[0]['state'] == 'Ohio') { echo 'selected="selected"'; } ?>>Ohio</option>
								<option value="Oklahoma" <?php if($data[0]['state'] == 'Oklahoma') { echo 'selected="selected"'; } ?>>Oklahoma</option>
								<option value="Oregon" <?php if($data[0]['state'] == 'Oregon') { echo 'selected="selected"'; } ?>>Oregon</option>
								<option value="Pennsylvania" <?php if($data[0]['state'] == 'Pennsylvania') { echo 'selected="selected"'; } ?>>Pennsylvania</option>
								<option value="Rhode Island" <?php if($data[0]['state'] == 'Rhode Island') { echo 'selected="selected"'; } ?>>Rhode Island</option>
								<option value="South Carolina" <?php if($data[0]['state'] == 'South Carolina') { echo 'selected="selected"'; } ?>>South Carolina</option>
								<option value="South Dakota" <?php if($data[0]['state'] == 'South Dakota"') { echo 'selected="selected"'; } ?>>South Dakota</option>
								<option value="Tennessee" <?php if($data[0]['state'] == 'Tennessee') { echo 'selected="selected"'; } ?>>Tennessee</option>
								<option value="Texas" <?php if($data[0]['state'] == 'Texas') { echo 'selected="selected"'; } ?>>Texas</option>
								<option value="Utah" <?php if($data[0]['state'] == 'Utah') { echo 'selected="selected"'; } ?>>Utah</option>
								<option value="Vermont" <?php if($data[0]['state'] == 'Vermont') { echo 'selected="selected"'; } ?>>Vermont</option>
								<option value="Virginia" <?php if($data[0]['state'] == 'Virginia') { echo 'selected="selected"'; } ?>>Virginia</option>
								<option value="Washington" <?php if($data[0]['state'] == 'Washington') { echo 'selected="selected"'; } ?>>Washington</option>
								<option value="West Virginia" <?php if($data[0]['state'] == 'West Virginia') { echo 'selected="selected"'; } ?>>West Virginia</option>
								<option value="Wisconsin" <?php if($data[0]['state'] == 'Wisconsin') { echo 'selected="selected"'; } ?>>Wisconsin</option>
								<option value="Wyoming" <?php if($data[0]['state'] == 'Wyoming') { echo 'selected="selected"'; } ?>>Wyoming</option>
								<option value="Armed Forces Americas" <?php if($data[0]['state'] == 'Armed Forces Americas') { echo 'selected="selected"'; } ?>>Armed Forces Americas</option>
								<option value="Armed Forces Europe" <?php if($data[0]['state'] == 'Armed Forces Europe') { echo 'selected="selected"'; } ?>>Armed Forces Europe</option>
								<option value="Armed Forces Pacific" <?php if($data[0]['state'] == 'Armed Forces Pacific') { echo 'selected="selected"'; } ?>>Armed Forces Pacific</option>
								</select>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Zip Code</label></td>
					<td>
						<input type="text" title="Zip Code" class="R"  name="zip" id="zip" value="<?php echo (isset($data[0])) ? $data[0]['zip'] : $_POST['zip'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Country</label></td>
					<td>
						<select name="country">
								<option value="United States" <?php if($data[0]['country'] == 'United States') { echo 'selected="selected"'; } ?>>United States</option>
								<option value="Afganistan" <?php if($data[0]['country'] == 'Afganistan') { echo 'selected="selected"'; } ?>>Afghanistan</option>
								<option value="Albania" <?php if($data[0]['country'] == 'Albania') { echo 'selected="selected"'; } ?>>Albania</option>
								<option value="Algeria" <?php if($data[0]['country'] == 'Algeria') { echo 'selected="selected"'; } ?>>Algeria</option>
								<option value="American Samoa" <?php if($data[0]['country'] == 'American Samoa') { echo 'selected="selected"'; } ?>>American Samoa</option>
								<option value="Andorra" <?php if($data[0]['country'] == 'Andorra') { echo 'selected="selected"'; } ?>Andorra</option>
								<option value="Angola" <?php if($data[0]['country'] == 'Angola') { echo 'selected="selected"'; } ?>>Angola</option>
								<option value="Anguilla" <?php if($data[0]['country'] == 'Anguilla') { echo 'selected="selected"'; } ?>>Anguilla</option>
								<option value="Antigua &amp; Barbuda" <?php if($data[0]['country'] == 'Antigua &amp; Barbuda') { echo 'selected="selected"'; } ?>>Antigua &amp; Barbuda</option>
								<option value="Argentina" <?php if($data[0]['country'] == 'Argentina') { echo 'selected="selected"'; } ?>>Argentina</option>
								<option value="Armenia" <?php if($data[0]['country'] == 'Armenia') { echo 'selected="selected"'; } ?>>Armenia</option>
								<option value="Aruba" <?php if($data[0]['country'] == 'Aruba') { echo 'selected="selected"'; } ?>>Aruba</option>
								<option value="Australia" <?php if($data[0]['country'] == 'Australia') { echo 'selected="selected"'; } ?>>Australia</option>
								<option value="Austria" <?php if($data[0]['country'] == 'Austria') { echo 'selected="selected"'; } ?>>Austria</option>
								<option value="Azerbaijan" <?php if($data[0]['country'] == 'Azerbaijan') { echo 'selected="selected"'; } ?>>Azerbaijan</option>
								<option value="Bahamas" <?php if($data[0]['country'] == 'Bahamas') { echo 'selected="selected"'; } ?>>Bahamas</option>
								<option value="Bahrain" <?php if($data[0]['country'] == 'Bahrain') { echo 'selected="selected"'; } ?>>Bahrain</option>
								<option value="Bangladesh" <?php if($data[0]['country'] == 'Bangladesh') { echo 'selected="selected"'; } ?>>Bangladesh</option>
								<option value="Barbados" <?php if($data[0]['country'] == 'Barbados') { echo 'selected="selected"'; } ?>>Barbados</option>
								<option value="Belarus" <?php if($data[0]['country'] == 'Belarus') { echo 'selected="selected"'; } ?>>Belarus</option>
								<option value="Belgium" <?php if($data[0]['country'] == 'Belgium') { echo 'selected="selected"'; } ?>>Belgium</option>
								<option value="Belize" <?php if($data[0]['country'] == 'Belize') { echo 'selected="selected"'; } ?>>Belize</option>
								<option value="Benin" <?php if($data[0]['country'] == 'Benin') { echo 'selected="selected"'; } ?>>Benin</option>
								<option value="Bermuda" <?php if($data[0]['country'] == 'Bermuda') { echo 'selected="selected"'; } ?>>Bermuda</option>
								<option value="Bhutan" <?php if($data[0]['country'] == 'Bhutan') { echo 'selected="selected"'; } ?>>Bhutan</option>
								<option value="Bolivia" <?php if($data[0]['country'] == 'Bolivia') { echo 'selected="selected"'; } ?>>Bolivia</option>
								<option value="Bonaire" <?php if($data[0]['country'] == 'Bonaire') { echo 'selected="selected"'; } ?>Bonaire</option>
								<option value="Bosnia &amp; Herzegovina" <?php if($data[0]['country'] == 'Herzegovina') { echo 'selected="selected"'; } ?>>Bosnia &amp; Herzegovina</option>
								<option value="Botswana" <?php if($data[0]['country'] == 'Botswana') { echo 'selected="selected"'; } ?>>Botswana</option>
								<option value="Brazil" <?php if($data[0]['country'] == 'Brazil
								') { echo 'selected="selected"'; } ?>>Brazil</option>
								<option value="British Indian Ocean Ter" <?php if($data[0]['country'] == 'British Indian Ocean Ter') { echo 'selected="selected"'; } ?>>British Indian Ocean Ter</option>
								<option value="Brunei" <?php if($data[0]['country'] == 'Brunei') { echo 'selected="selected"'; } ?>>Brunei</option>
								<option value="Bulgaria" <?php if($data[0]['country'] == 'Bulgaria') { echo 'selected="selected"'; } ?>>Bulgaria</option>
								<option value="Burkina Faso" <?php if($data[0]['country'] == 'Burkina Faso') { echo 'selected="selected"'; } ?>>Burkina Faso</option>
								<option value="Burundi" <?php if($data[0]['country'] == 'Burundi') { echo 'selected="selected"'; } ?>>Burundi</option>
								<option value="Cambodia" <?php if($data[0]['country'] == 'Cambodia') { echo 'selected="selected"'; } ?>>Cambodia</option>
								<option value="Cameroon" <?php if($data[0]['country'] == 'Cameroon') { echo 'selected="selected"'; } ?>>Cameroon</option>
								<option value="Canada" <?php if($data[0]['country'] == 'Canada') { echo 'selected="selected"'; } ?>>Canada</option>
								<option value="Canary Islands" <?php if($data[0]['country'] == 'Canary Islands') { echo 'selected="selected"'; } ?>>Canary Islands</option>
								<option value="Cape Verde" <?php if($data[0]['country'] == 'Cape Verde') { echo 'selected="selected"'; } ?>>Cape Verde</option>
								<option value="Cayman Islands" <?php if($data[0]['country'] == 'Cayman Islands') { echo 'selected="selected"'; } ?>>Cayman Islands</option>
								<option value="Central African Republic" <?php if($data[0]['country'] == 'Central African Republic') { echo 'selected="selected"'; } ?>>Central African Republic</option>
								<option value="Chad" <?php if($data[0]['country'] == 'Chad') { echo 'selected="selected"'; } ?>>Chad</option>
								<option value="Channel Islands" <?php if($data[0]['country'] == 'Channel Islands') { echo 'selected="selected"'; } ?>>Channel Islands</option>
								<option value="Chile" <?php if($data[0]['country'] == 'Chile') { echo 'selected="selected"'; } ?>>Chile</option>
								<option value="China" <?php if($data[0]['country'] == 'China') { echo 'selected="selected"'; } ?>>China</option>
								<option value="Christmas Island" <?php if($data[0]['country'] == 'Christmas Island') { echo 'selected="selected"'; } ?>>Christmas Island</option>
								<option value="Cocos Island" <?php if($data[0]['country'] == 'Cocos Island') { echo 'selected="selected"'; } ?>>Cocos Island</option>
								<option value="Colombia" <?php if($data[0]['country'] == 'Colombia') { echo 'selected="selected"'; } ?>>Colombia</option>
								<option value="Comoros" <?php if($data[0]['country'] == 'Comoros') { echo 'selected="selected"'; } ?>>Comoros</option>
								<option value="Congo" <?php if($data[0]['country'] == 'Congo') { echo 'selected="selected"'; } ?>>Congo</option>
								<option value="Cook Islands" <?php if($data[0]['country'] == 'Cook Islands') { echo 'selected="selected"'; } ?>>Cook Islands</option>
								<option value="Costa Rica" <?php if($data[0]['country'] == 'Costa Rica') { echo 'selected="selected"'; } ?>>Costa Rica</option>
								<option value="Cote DIvoire" <?php if($data[0]['country'] == 'Cote DIvoire') { echo 'selected="selected"'; } ?>>Cote D'Ivoire</option>
								<option value="Croatia" <?php if($data[0]['country'] == 'Croatia') { echo 'selected="selected"'; } ?>>Croatia</option>
								<option value="Cuba" <?php if($data[0]['country'] == 'Cuba') { echo 'selected="selected"'; } ?>>Cuba</option>
								<option value="Curaco" <?php if($data[0]['country'] == 'Curaco') { echo 'selected="selected"'; } ?>>Curacao</option>
								<option value="Cyprus" <?php if($data[0]['country'] == 'Cyprus') { echo 'selected="selected"'; } ?>>Cyprus</option>
								<option value="Czech Republic" <?php if($data[0]['country'] == 'Czech Republic') { echo 'selected="selected"'; } ?>>Czech Republic</option>
								<option value="Denmark" <?php if($data[0]['country'] == 'Denmark') { echo 'selected="selected"'; } ?>>Denmark</option>
								<option value="Djibouti" <?php if($data[0]['country'] == 'Djibouti') { echo 'selected="selected"'; } ?>>Djibouti</option>
								<option value="Dominica" <?php if($data[0]['country'] == 'Dominica') { echo 'selected="selected"'; } ?>>Dominica</option>
								<option value="Dominican Republic" <?php if($data[0]['country'] == 'Dominican Republic') { echo 'selected="selected"'; } ?>>Dominican Republic</option>
								<option value="East Timor" <?php if($data[0]['country'] == 'East Timor') { echo 'selected="selected"'; } ?>>East Timor</option>
								<option value="Ecuador" <?php if($data[0]['country'] == 'Ecuadorc') { echo 'selected="selected"'; } ?>>Ecuador</option>
								<option value="Egypt" <?php if($data[0]['country'] == 'Egypt') { echo 'selected="selected"'; } ?>>Egypt</option>
								<option value="El Salvador" <?php if($data[0]['country'] == 'El Salvador') { echo 'selected="selected"'; } ?>>El Salvador</option>
								<option value="Equatorial Guinea" <?php if($data[0]['country'] == 'Equatorial Guinea') { echo 'selected="selected"'; } ?>>Equatorial Guinea</option>
								<option value="Eritrea" <?php if($data[0]['country'] == 'Eritrea') { echo 'selected="selected"'; } ?>>Eritrea</option>
								<option value="Estonia" <?php if($data[0]['country'] == 'Estonia') { echo 'selected="selected"'; } ?>>Estonia</option>
								<option value="Ethiopia" <?php if($data[0]['country'] == 'Ethiopia') { echo 'selected="selected"'; } ?>>Ethiopia</option>
								<option value="Falkland Islands" <?php if($data[0]['country'] == 'Falkland Islands') { echo 'selected="selected"'; } ?>>Falkland Islands</option>
								<option value="Faroe Islands" <?php if($data[0]['country'] == 'Faroe Islands') { echo 'selected="selected"'; } ?>>Faroe Islands</option>
								<option value="Fiji" <?php if($data[0]['country'] == 'Fiji') { echo 'selected="selected"'; } ?>>Fiji</option>
								<option value="Finland" <?php if($data[0]['country'] == 'Finland') { echo 'selected="selected"'; } ?>>Finland</option>
								<option value="France" <?php if($data[0]['country'] == 'France') { echo 'selected="selected"'; } ?>>France</option>
								<option value="French Guiana" <?php if($data[0]['country'] == 'French Guiana') { echo 'selected="selected"'; } ?>>French Guiana</option>
								<option value="French Polynesia" <?php if($data[0]['country'] == 'French Polynesia') { echo 'selected="selected"'; } ?>>French Polynesia</option>
								<option value="French Southern Ter" <?php if($data[0]['country'] == 'French Southern Ter') { echo 'selected="selected"'; } ?>>French Southern Ter</option>
								<option value="Gabon" <?php if($data[0]['country'] == 'Gabon') { echo 'selected="selected"'; } ?>>Gabon</option>
								<option value="Gambia" <?php if($data[0]['country'] == 'Gambia') { echo 'selected="selected"'; } ?>>Gambia</option>
								<option value="Georgia" <?php if($data[0]['country'] == 'Georgia') { echo 'selected="selected"'; } ?>>Georgia</option>
								<option value="Germany" <?php if($data[0]['country'] == 'Germany') { echo 'selected="selected"'; } ?>>Germany</option>
								<option value="Ghana" <?php if($data[0]['country'] == 'Ghana') { echo 'selected="selected"'; } ?>>Ghana</option>
								<option value="Gibraltar" <?php if($data[0]['country'] == 'Gibraltar') { echo 'selected="selected"'; } ?>>Gibraltar</option>
								<option value="Great Britain" <?php if($data[0]['country'] == 'Great Britain') { echo 'selected="selected"'; } ?>>Great Britain</option>
								<option value="Greece" <?php if($data[0]['country'] == 'Greece') { echo 'selected="selected"'; } ?>>Greece</option>
								<option value="Greenland" <?php if($data[0]['country'] == 'Greenland') { echo 'selected="selected"'; } ?>>Greenland</option>
								<option value="Grenada" <?php if($data[0]['country'] == 'Grenada') { echo 'selected="selected"'; } ?>>Grenada</option>
								<option value="Guadeloupe" <?php if($data[0]['country'] == 'Guadeloupe') { echo 'selected="selected"'; } ?>>Guadeloupe</option>
								<option value="Guam" <?php if($data[0]['country'] == 'Guam') { echo 'selected="selected"'; } ?>>Guam</option>
								<option value="Guatemala" <?php if($data[0]['country'] == 'Guatemala') { echo 'selected="selected"'; } ?>>Guatemala</option>
								<option value="Guinea" <?php if($data[0]['country'] == 'Guinea') { echo 'selected="selected"'; } ?>>Guinea</option>
								<option value="Guyana" <?php if($data[0]['country'] == 'Guyana') { echo 'selected="selected"'; } ?>>Guyana</option>
								<option value="Haiti" <?php if($data[0]['country'] == 'Haiti') { echo 'selected="selected"'; } ?>>Haiti</option>
								<option value="Hawaii" <?php if($data[0]['country'] == 'Hawaii') { echo 'selected="selected"'; } ?>>Hawaii</option>
								<option value="Honduras" <?php if($data[0]['country'] == 'Honduras') { echo 'selected="selected"'; } ?>>Honduras</option>
								<option value="Hong Kong" <?php if($data[0]['country'] == 'Hong Kong') { echo 'selected="selected"'; } ?>>Hong Kong</option>
								<option value="Hungary" <?php if($data[0]['country'] == 'Hungary') { echo 'selected="selected"'; } ?>>Hungary</option>
								<option value="Iceland" <?php if($data[0]['country'] == 'Iceland') { echo 'selected="selected"'; } ?>>Iceland</option>
								<option value="India" <?php if($data[0]['country'] == 'India') { echo 'selected="selected"'; } ?>>India</option>
								<option value="Indonesia" <?php if($data[0]['country'] == 'Indonesia') { echo 'selected="selected"'; } ?>>Indonesia</option>
								<option value="Iran" <?php if($data[0]['country'] == 'Iran') { echo 'selected="selected"'; } ?>>Iran</option>
								<option value="Iraq" <?php if($data[0]['country'] == 'Iraq') { echo 'selected="selected"'; } ?>>Iraq</option>
								<option value="Ireland" <?php if($data[0]['country'] == 'Ireland') { echo 'selected="selected"'; } ?>>Ireland</option>
								<option value="Isle of Man" <?php if($data[0]['country'] == 'Isle of Man') { echo 'selected="selected"'; } ?>>Isle of Man</option>
								<option value="Israel" <?php if($data[0]['country'] == 'Israel') { echo 'selected="selected"'; } ?>>Israel</option>
								<option value="Italy" <?php if($data[0]['country'] == 'Italy') { echo 'selected="selected"'; } ?>>Italy</option>
								<option value="Jamaica" <?php if($data[0]['country'] == 'Jamaica') { echo 'selected="selected"'; } ?>>Jamaica</option>
								<option value="Japan" <?php if($data[0]['country'] == 'Japan') { echo 'selected="selected"'; } ?>>Japan</option>
								<option value="Jordan" <?php if($data[0]['country'] == 'Jordan') { echo 'selected="selected"'; } ?>>Jordan</option>
								<option value="Kazakhstan" <?php if($data[0]['country'] == 'Kazakhstan') { echo 'selected="selected"'; } ?>>Kazakhstan</option>
								<option value="Kenya" <?php if($data[0]['country'] == 'Kenya') { echo 'selected="selected"'; } ?>>Kenya</option>
								<option value="Kiribati" <?php if($data[0]['country'] == 'Kiribati') { echo 'selected="selected"'; } ?>>Kiribati</option>
								<option value="Korea North" <?php if($data[0]['country'] == 'Korea North') { echo 'selected="selected"'; } ?>>Korea North</option>
								<option value="Korea South" <?php if($data[0]['country'] == 'Korea South') { echo 'selected="selected"'; } ?>>Korea South</option>
								<option value="Kuwait" <?php if($data[0]['country'] == 'Kuwait') { echo 'selected="selected"'; } ?>>Kuwait</option>
								<option value="Kyrgyzstan" <?php if($data[0]['country'] == 'Kyrgyzstan') { echo 'selected="selected"'; } ?>>Kyrgyzstan</option>
								<option value="Laos" <?php if($data[0]['country'] == 'Laos') { echo 'selected="selected"'; } ?>>Laos</option>
								<option value="Latvia" <?php if($data[0]['country'] == 'Latvia') { echo 'selected="selected"'; } ?>>Latvia</option>
								<option value="Lebanon" <?php if($data[0]['country'] == 'Lebanon') { echo 'selected="selected"'; } ?>>Lebanon</option>
								<option value="Lesotho" <?php if($data[0]['country'] == 'Lesotho') { echo 'selected="selected"'; } ?>>Lesotho</option>
								<option value="Liberia" <?php if($data[0]['country'] == 'Liberia') { echo 'selected="selected"'; } ?>>Liberia</option>
								<option value="Libya" <?php if($data[0]['country'] == 'Libya') { echo 'selected="selected"'; } ?>>Libya</option>
								<option value="Liechtenstein" <?php if($data[0]['country'] == 'Liechtenstein') { echo 'selected="selected"'; } ?>>Liechtenstein</option>
								<option value="Lithuania" <?php if($data[0]['country'] == 'Lithuania') { echo 'selected="selected"'; } ?>>Lithuania</option>
								<option value="Luxembourg" <?php if($data[0]['country'] == 'Luxembourg') { echo 'selected="selected"'; } ?>>Luxembourg</option>
								<option value="Macau" <?php if($data[0]['country'] == 'Macau') { echo 'selected="selected"'; } ?>>Macau</option>
								<option value="Macedonia" <?php if($data[0]['country'] == 'Macedonia') { echo 'selected="selected"'; } ?>>Macedonia</option>
								<option value="Madagascar" <?php if($data[0]['country'] == 'Madagascar') { echo 'selected="selected"'; } ?>>Madagascar</option>
								<option value="Malaysia" <?php if($data[0]['country'] == 'Malaysia') { echo 'selected="selected"'; } ?>>Malaysia</option>
								<option value="Malawi" <?php if($data[0]['country'] == 'Malawi') { echo 'selected="selected"'; } ?>>Malawi</option>
								<option value="Maldives" <?php if($data[0]['country'] == 'Maldives') { echo 'selected="selected"'; } ?>>Maldives</option>
								<option value="Mali" <?php if($data[0]['country'] == 'Mali') { echo 'selected="selected"'; } ?>>Mali</option>
								<option value="Malta" <?php if($data[0]['country'] == 'Malta') { echo 'selected="selected"'; } ?>>Malta</option>
								<option value="Marshall Islands" <?php if($data[0]['country'] == 'Marshall Islands') { echo 'selected="selected"'; } ?>>Marshall Islands</option>
								<option value="Martinique" <?php if($data[0]['country'] == 'Martinique') { echo 'selected="selected"'; } ?>>Martinique</option>
								<option value="Mauritania" <?php if($data[0]['country'] == 'Mauritania') { echo 'selected="selected"'; } ?>>Mauritania</option>
								<option value="Mauritius" <?php if($data[0]['country'] == 'Mauritius') { echo 'selected="selected"'; } ?>>Mauritius</option>
								<option value="Mayotte" <?php if($data[0]['country'] == 'Mayotte') { echo 'selected="selected"'; } ?>>Mayotte</option>
								<option value="Mexico" <?php if($data[0]['country'] == 'Mexico') { echo 'selected="selected"'; } ?>>Mexico</option>
								<option value="Midway Islands" <?php if($data[0]['country'] == 'Midway Islands') { echo 'selected="selected"'; } ?>>Midway Islands</option>
								<option value="Moldova" <?php if($data[0]['country'] == 'Moldova') { echo 'selected="selected"'; } ?>>Moldova</option>
								<option value="Monaco" <?php if($data[0]['country'] == 'Monaco') { echo 'selected="selected"'; } ?>>Monaco</option>
								<option value="Mongolia" <?php if($data[0]['country'] == 'Mongolia') { echo 'selected="selected"'; } ?>>Mongolia</option>
								<option value="Montserrat" <?php if($data[0]['country'] == 'Montserrat') { echo 'selected="selected"'; } ?>>Montserrat</option>
								<option value="Morocco" <?php if($data[0]['country'] == 'Morocco') { echo 'selected="selected"'; } ?>>Morocco</option>
								<option value="Mozambique" <?php if($data[0]['country'] == 'Mozambique') { echo 'selected="selected"'; } ?>>Mozambique</option>
								<option value="Myanmar" <?php if($data[0]['country'] == 'Myanmar') { echo 'selected="selected"'; } ?>>Myanmar</option>
								<option value="Nambia" <?php if($data[0]['country'] == 'Nambia') { echo 'selected="selected"'; } ?>>Nambia</option>
								<option value="Nauru" <?php if($data[0]['country'] == 'Nauru') { echo 'selected="selected"'; } ?>>Nauru</option>
								<option value="Nepal" <?php if($data[0]['country'] == 'Nepal') { echo 'selected="selected"'; } ?>>Nepal</option>
								<option value="Netherland Antilles" <?php if($data[0]['country'] == 'Netherland Antilles') { echo 'selected="selected"'; } ?>>Netherland Antilles</option>
								<option value="Netherlands" <?php if($data[0]['country'] == 'Netherlands') { echo 'selected="selected"'; } ?>>Netherlands (Holland, Europe)</option>
								<option value="Nevis" <?php if($data[0]['country'] == 'Nevis') { echo 'selected="selected"'; } ?>>Nevis</option>
								<option value="New Caledonia" <?php if($data[0]['country'] == 'New Caledonia') { echo 'selected="selected"'; } ?>>New Caledonia</option>
								<option value="New Zealand" <?php if($data[0]['country'] == 'New Zealand') { echo 'selected="selected"'; } ?>>New Zealand</option>
								<option value="Nicaragua" <?php if($data[0]['country'] == 'Nicaragua') { echo 'selected="selected"'; } ?>>Nicaragua</option>
								<option value="Niger" <?php if($data[0]['country'] == 'Niger') { echo 'selected="selected"'; } ?>>Niger</option>
								<option value="Nigeria" <?php if($data[0]['country'] == 'Nigeria') { echo 'selected="selected"'; } ?>>Nigeria</option>
								<option value="Niue" <?php if($data[0]['country'] == 'Niue') { echo 'selected="selected"'; } ?>>Niue</option>
								<option value="Norfolk Island" <?php if($data[0]['country'] == 'Norfolk Island') { echo 'selected="selected"'; } ?>>Norfolk Island</option>
								<option value="Norway" <?php if($data[0]['country'] == 'Norway') { echo 'selected="selected"'; } ?>>Norway</option>
								<option value="Oman" <?php if($data[0]['country'] == 'Oman') { echo 'selected="selected"'; } ?>>Oman</option>
								<option value="Pakistan" <?php if($data[0]['country'] == 'Pakistan') { echo 'selected="selected"'; } ?>>Pakistan</option>
								<option value="Palau Island" <?php if($data[0]['country'] == 'Palau Island') { echo 'selected="selected"'; } ?>>Palau Island</option>
								<option value="Palestine" <?php if($data[0]['country'] == 'Palestine') { echo 'selected="selected"'; } ?>>Palestine</option>
								<option value="Panama" <?php if($data[0]['country'] == 'Panama') { echo 'selected="selected"'; } ?>>Panama</option>
								<option value="Papua New Guinea" <?php if($data[0]['country'] == 'Papua New Guinea') { echo 'selected="selected"'; } ?>>Papua New Guinea</option>
								<option value="Paraguay" <?php if($data[0]['country'] == 'Paraguay') { echo 'selected="selected"'; } ?>>Paraguay</option>
								<option value="Peru" <?php if($data[0]['country'] == 'Peru') { echo 'selected="selected"'; } ?>>Peru</option>
								<option value="Phillipines" <?php if($data[0]['country'] == 'Phillipines') { echo 'selected="selected"'; } ?>>Philippines</option>
								<option value="Pitcairn Island" <?php if($data[0]['country'] == 'itcairn Island') { echo 'selected="selected"'; } ?>>Pitcairn Island</option>
								<option value="Poland" <?php if($data[0]['country'] == 'Poland') { echo 'selected="selected"'; } ?>>Poland</option>
								<option value="Portugal" <?php if($data[0]['country'] == 'Portugal') { echo 'selected="selected"'; } ?>>Portugal</option>
								<option value="Puerto Rico" <?php if($data[0]['country'] == 'Puerto Rico') { echo 'selected="selected"'; } ?>>Puerto Rico</option>
								<option value="Qatar" <?php if($data[0]['country'] == 'Qatar') { echo 'selected="selected"'; } ?>>Qatar</option>
								<option value="Republic of Montenegro" <?php if($data[0]['country'] == 'Republic of Montenegro') { echo 'selected="selected"'; } ?>>Republic of Montenegro</option>
								<option value="Republic of Serbia" <?php if($data[0]['country'] == 'Republic of Serbia') { echo 'selected="selected"'; } ?>>Republic of Serbia</option>
								<option value="Reunion" <?php if($data[0]['country'] == 'Reunion') { echo 'selected="selected"'; } ?>>Reunion</option>
								<option value="Romania" <?php if($data[0]['country'] == 'Romania') { echo 'selected="selected"'; } ?>>Romania</option>
								<option value="Russia" <?php if($data[0]['country'] == 'Russia') { echo 'selected="selected"'; } ?>>Russia</option>
								<option value="Rwanda" <?php if($data[0]['country'] == 'Rwanda') { echo 'selected="selected"'; } ?>>Rwanda</option>
								<option value="St Barthelemy" <?php if($data[0]['country'] == 'St Barthelemy') { echo 'selected="selected"'; } ?>>St Barthelemy</option>
								<option value="St Eustatius" <?php if($data[0]['country'] == 'St Eustatius') { echo 'selected="selected"'; } ?>v>St Eustatius</option>
								<option value="St Helena" <?php if($data[0]['country'] == 'St Helena') { echo 'selected="selected"'; } ?>>St Helena</option>
								<option value="St Kitts-Nevis" <?php if($data[0]['country'] == 'St Kitts-Nevis') { echo 'selected="selected"'; } ?>>St Kitts-Nevis</option>
								<option value="St Lucia" <?php if($data[0]['country'] == 'St Lucia') { echo 'selected="selected"'; } ?>>St Lucia</option>
								<option value="St Maarten" <?php if($data[0]['country'] == 'St Maarten') { echo 'selected="selected"'; } ?>>St Maarten</option>
								<option value="St Pierre &amp; Miquelon" <?php if($data[0]['country'] == 'St Pierre &amp; Miquelon') { echo 'selected="selected"'; } ?>>St Pierre &amp; Miquelon</option>
								<option value="St Vincent &amp; Grenadines" <?php if($data[0]['country'] == 'St Vincent &amp; Grenadines') { echo 'selected="selected"'; } ?>>St Vincent &amp; Grenadines</option>
								<option value="Saipan" <?php if($data[0]['country'] == 'Saipan') { echo 'selected="selected"'; } ?>>Saipan</option>
								<option value="Samoa" <?php if($data[0]['country'] == 'Samoa') { echo 'selected="selected"'; } ?>>Samoa</option>
								<option value="Samoa American" <?php if($data[0]['country'] == 'Samoa American') { echo 'selected="selected"'; } ?>>Samoa American</option>
								<option value="San Marino" <?php if($data[0]['country'] == 'San Marino') { echo 'selected="selected"'; } ?>>San Marino</option>
								<option value="Sao Tome &amp; Principe" <?php if($data[0]['country'] == 'Sao Tome &amp') { echo 'selected="selected"'; } ?>>Sao Tome &amp; Principe</option>
								<option value="Saudi Arabia" <?php if($data[0]['country'] == 'Saudi Arabia') { echo 'selected="selected"'; } ?>>Saudi Arabia</option>
								<option value="Senegal" <?php if($data[0]['country'] == 'Senegal') { echo 'selected="selected"'; } ?>>Senegal</option>
								<option value="Serbia" <?php if($data[0]['country'] == 'Serbia') { echo 'selected="selected"'; } ?>>Serbia</option>
								<option value="Seychelles" <?php if($data[0]['country'] == 'Seychelles') { echo 'selected="selected"'; } ?>>Seychelles</option>
								<option value="Sierra Leone" <?php if($data[0]['country'] == 'ierra Leone') { echo 'selected="selected"'; } ?>>Sierra Leone</option>
								<option value="Singapore" <?php if($data[0]['country'] == 'Singapore') { echo 'selected="selected"'; } ?>>Singapore</option>
								<option value="Slovakia" <?php if($data[0]['country'] == 'Slovakia') { echo 'selected="selected"'; } ?>>Slovakia</option>
								<option value="Slovenia" <?php if($data[0]['country'] == 'Slovenia') { echo 'selected="selected"'; } ?>>Slovenia</option>
								<option value="Solomon Islands" <?php if($data[0]['country'] == 'Solomon Islands') { echo 'selected="selected"'; } ?>>Solomon Islands</option>
								<option value="Somalia" <?php if($data[0]['country'] == 'Somalia') { echo 'selected="selected"'; } ?>>Somalia</option>
								<option value="South Africa" <?php if($data[0]['country'] == 'South Africa') { echo 'selected="selected"'; } ?>>South Africa</option>
								<option value="Spain" <?php if($data[0]['country'] == 'Spain') { echo 'selected="selected"'; } ?>>Spain</option>
								<option value="Sri Lanka" <?php if($data[0]['country'] == 'ri Lanka') { echo 'selected="selected"'; } ?>>Sri Lanka</option>
								<option value="Sudan" <?php if($data[0]['country'] == 'Sudan') { echo 'selected="selected"'; } ?>>Sudan</option>
								<option value="Suriname" <?php if($data[0]['country'] == 'Suriname') { echo 'selected="selected"'; } ?>>Suriname</option>
								<option value="Swaziland" <?php if($data[0]['country'] == 'Swaziland') { echo 'selected="selected"'; } ?>>Swaziland</option>
								<option value="Sweden" <?php if($data[0]['country'] == 'Sweden') { echo 'selected="selected"'; } ?>>Sweden</option>
								<option value="Switzerland" <?php if($data[0]['country'] == 'Switzerland') { echo 'selected="selected"'; } ?>>Switzerland</option>
								<option value="Syria" <?php if($data[0]['country'] == 'Syria') { echo 'selected="selected"'; } ?>>Syria</option>
								<option value="Tahiti" <?php if($data[0]['country'] == 'Tahiti') { echo 'selected="selected"'; } ?>>Tahiti</option>
								<option value="Taiwan" <?php if($data[0]['country'] == 'Taiwan') { echo 'selected="selected"'; } ?>>Taiwan</option>
								<option value="Tajikistan" <?php if($data[0]['country'] == 'Tajikistan') { echo 'selected="selected"'; } ?>>Tajikistan</option>
								<option value="Tanzania" <?php if($data[0]['country'] == 'Tanzania') { echo 'selected="selected"'; } ?>>Tanzania</option>
								<option value="Thailand" <?php if($data[0]['country'] == 'Thailand') { echo 'selected="selected"'; } ?>>Thailand</option>
								<option value="Togo" <?php if($data[0]['country'] == 'Togo') { echo 'selected="selected"'; } ?>>Togo</option>
								<option value="Tokelau" <?php if($data[0]['country'] == 'Tokelau') { echo 'selected="selected"'; } ?>>Tokelau</option>
								<option value="Tonga" <?php if($data[0]['country'] == 'Tonga') { echo 'selected="selected"'; } ?>>Tonga</option>
								<option value="Trinidad &amp; Tobago" <?php if($data[0]['country'] == 'Trinidad &amp; Tobago') { echo 'selected="selected"'; } ?>>Trinidad &amp; Tobago</option>
								<option value="Tunisia" <?php if($data[0]['country'] == 'Tunisia') { echo 'selected="selected"'; } ?>>Tunisia</option>
								<option value="Turkey" <?php if($data[0]['country'] == 'Turkey') { echo 'selected="selected"'; } ?>>Turkey</option>
								<option value="Turkmenistan" <?php if($data[0]['country'] == 'Turkmenistan') { echo 'selected="selected"'; } ?>>Turkmenistan</option>
								<option value="Turks &amp; Caicos Is" <?php if($data[0]['country'] == 'Turks &amp; Caicos Is') { echo 'selected="selected"'; } ?>>Turks &amp; Caicos Is</option>
								<option value="Tuvalu" <?php if($data[0]['country'] == 'Tuvalu') { echo 'selected="selected"'; } ?>>Tuvalu</option>
								<option value="Uganda" <?php if($data[0]['country'] == 'Uganda') { echo 'selected="selected"'; } ?>>Uganda</option>
								<option value="Ukraine" <?php if($data[0]['country'] == 'Ukraine') { echo 'selected="selected"'; } ?>>Ukraine</option>
								<option value="United Arab Emirates" <?php if($data[0]['country'] == 'United Arab Emirates') { echo 'selected="selected"'; } ?>>United Arab Emirates</option>
								<option value="United Kingdom" <?php if($data[0]['country'] == 'United Kingdom') { echo 'selected="selected"'; } ?>>United Kingdom</option>
								<option value="United States of America" <?php if($data[0]['country'] == 'United States of America') { echo 'selected="selected"'; } ?>>United States of America</option>
								<option value="Uraguay" <?php if($data[0]['country'] == 'Uraguay') { echo 'selected="selected"'; } ?>>Uruguay</option>
								<option value="Uzbekistan" <?php if($data[0]['country'] == 'Uzbekistan') { echo 'selected="selected"'; } ?>>Uzbekistan</option>
								<option value="Vanuatu" <?php if($data[0]['country'] == 'Vanuatu') { echo 'selected="selected"'; } ?>>Vanuatu</option>
								<option value="Vatican City State" <?php if($data[0]['country'] == 'Vatican City State') { echo 'selected="selected"'; } ?>>Vatican City State</option>
								<option value="Venezuela" <?php if($data[0]['country'] == 'Venezuela') { echo 'selected="selected"'; } ?>>Venezuela</option>
								<option value="Vietnam" <?php if($data[0]['country'] == 'Vietnam') { echo 'selected="selected"'; } ?>>Vietnam</option>
								<option value="Virgin Islands (Brit)" <?php if($data[0]['country'] == 'Virgin Islands (Brit)') { echo 'selected="selected"'; } ?>>Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)" <?php if($data[0]['country'] == 'Virgin Islands (USA)') { echo 'selected="selected"'; } ?>>Virgin Islands (USA)</option>
								<option value="Wake Island" <?php if($data[0]['country'] == 'Wake Island') { echo 'selected="selected"'; } ?>>Wake Island</option>
								<option value="Wallis &amp; Futana Is" <?php if($data[0]['country'] == 'Wallis &amp; Futana Is') { echo 'selected="selected"'; } ?>>Wallis &amp; Futana Is</option>
								<option value="Yemen" <?php if($data[0]['country'] == 'Yemen') { echo 'selected="selected"'; } ?>>Yemen</option>
								<option value="Zaire" <?php if($data[0]['country'] == 'Zaire') { echo 'selected="selected"'; } ?>>Zaire</option>
								<option value="Zambia" <?php if($data[0]['country'] == 'Zambia') { echo 'selected="selected"'; } ?>>Zambia</option>
								<option value="Zimbabwe" <?php if($data[0]['country'] == 'Zimbabwe') { echo 'selected="selected"'; } ?>>Zimbabwe</option>
								</select>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Areas of interest</label></td>
					<td>
						<input name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox"><input name="areainterest[]" value="Private Equity" type="checkbox" <?php if (in_array("Private Equity", $interest)) { echo 'checked="checked"'; }?>>Private Equity
								<input name="areainterest[]" value="Real Estate" type="checkbox" <?php if (in_array("Real Estate", $interest)) { echo 'checked="checked"'; }?>>Real Estate
								<input name="areainterest[]" value="Estate Planning" type="checkbox" <?php if (in_array("Estate Planning", $interest)) { echo 'checked="checked"'; }?>>Estate Planning
								<input name="areainterest[]" value="Hedge Funds" type="checkbox" <?php if (in_array("Hedge Funds", $interest)) { echo 'checked="checked"'; }?>>Hedge Funds
								<input name="areainterest[]" value="Legal Services" type="checkbox" <?php if (in_array("Legal Services", $interest)) { echo 'checked="checked"'; }?>>Legal Services
								<input name="areainterest[]" value="Venture Capital" type="checkbox" <?php if (in_array("Venture Capital", $interest)) { echo 'checked="checked"'; }?>>Venture Capital
								<input name="areainterest[]" value="Insurance" type="checkbox" <?php if (in_array("Insurance", $interest)) { echo 'checked="checked"'; }?>>Insurance
								<input name="areainterest[]" value="Direct Investment" type="checkbox" <?php if (in_array("Direct Investment", $interest)) { echo 'checked="checked"'; }?>>Direct Investment
								<input name="areainterest[]" value="Accounting Services" type="checkbox" <?php if (in_array("Accounting Services", $interest)) { echo 'checked="checked"'; }?>>Accounting Services
								<input name="areainterest[]" value="Joint Venture" type="checkbox" <?php if (in_array("Joint Venture", $interest)) { echo 'checked="checked"'; }?>>Joint Venture
								<input name="areainterest[]" value="Luxury Goods" type="checkbox" <?php if (in_array("Luxury Goods", $interest)) { echo 'checked="checked"'; }?>>Luxury Goods
								<input name="areainterest[]" value="Events" type="checkbox" <?php if (in_array("Events", $interest)) { echo 'checked="checked"'; }?>>Events
								<input name="areainterest[]" value="Travel" type="checkbox" <?php if (in_array("Travel", $interest)) { echo 'checked="checked"'; }?>>Travel
								<input name="areainterest[]" value="Financial Services" type="checkbox" <?php if (in_array("Financial Services", $interest)) { echo 'checked="checked"'; }?>>Financial Services
								<input name="areainterest[]" value="Philanthropy" type="checkbox" <?php if (in_array("Philanthropy", $interest)) { echo 'checked="checked"'; }?>>Philanthropy
								<input name="areainterest[]" value="Health Care" type="checkbox" <?php if (in_array("Health Care", $interest)) { echo 'checked="checked"'; }?>>Health Care
								<input name="areainterest[]" value="Education" type="checkbox" <?php if (in_array("Education", $interest)) { echo 'checked="checked"'; }?>>Education
								<input name="areainterest[]" value="Bio Tech" type="checkbox" <?php if (in_array("Bio Tech", $interest)) { echo 'checked="checked"'; }?>>Bio Tech
								<input name="areainterest[]" value="Sports" type="checkbox" <?php if (in_array("Sports", $interest)) { echo 'checked="checked"'; }?>>Sports
								<input name="areainterest[]" value="Alternative Energy" type="checkbox" <?php if (in_array("Alternative Energy", $interest)) { echo 'checked="checked"'; }?>>Alternative Energy
								<input name="areainterest[]" value="Art" type="checkbox" <?php if (in_array("Art", $interest)) { echo 'checked="checked"'; }?>>Art
								<input name="areainterest[]" value="Oil Gas" type="checkbox" <?php if (in_array("Oil Gas", $interest)) { echo 'checked="checked"'; }?>>Oil Gas
								<input name="areainterest[]" value="Yachting Boating" type="checkbox" <?php if (in_array("Yachting Boating", $interest)) { echo 'checked="checked"'; }?>>Yachting Boating
								<input name="areainterest[]" value="Mining" type="checkbox" <?php if (in_array("Mining", $interest)) { echo 'checked="checked"'; }?>>Mining
								<input name="areainterest[]" value="Employment" type="checkbox" <?php if (in_array("Employment", $interest)) { echo 'checked="checked"'; }?>>Employment
								<input name="areainterest[]" value="Technology" type="checkbox" <?php if (in_array("Technology", $interest)) { echo 'checked="checked"'; }?>>Technology
								<input name="areainterest[]" value="Private Jets" type="checkbox" <?php if (in_array("Private Jets", $interest)) { echo 'checked="checked"'; }?>>Private Jets
								<input name="areainterest[]" value="Consumer Goods" type="checkbox" <?php if (in_array("Consumer Goods", $interest)) { echo 'checked="checked"'; }?>>Consumer Goods
								<input name="areainterest[]" value="Transportations" type="checkbox" <?php if (in_array("Transportations", $interest)) { echo 'checked="checked"'; }?>>Transportations
								<input name="areainterest[]" value="Cannabies" type="checkbox" <?php if (in_array("Cannabies", $interest)) { echo 'checked="checked"'; }?>>Cannabies
								<input name="areainterest[]" value="Aerospace &amp; Defence" type="checkbox" <?php if (in_array("Aerospace &amp; Defence", $interest)) { echo 'checked="checked"'; }?>>Aerospace &amp; Defence
								<input name="areainterest[]" value="Others" id="otherbox" type="checkbox" <?php if (in_array("Others", $interest)) { echo 'checked="checked"'; }?>>Others<input name="others" id="extrafied" placeholder="If other please Explain" style="" type="text">
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Family office net worth?</label></td>
					<td>
						<input name="networth" value="Under 100 mil" type="radio" <?php if($data[0]['net_worth'] == 'Under 100 mil') { echo 'checked="checked"'; } ?>>Under 100 Mil
								<input name="networth" value="500 mil" type="radio" <?php if($data[0]['net_worth'] == '500 mil') { echo 'checked="checked"'; } ?>>100 Mil - 500 Mil
								<input name="networth" value="1 Bil" type="radio" <?php if($data[0]['net_worth'] == '1 Bil') { echo 'checked="checked"'; } ?>>500 Mil - 1 Bil
								<input name="networth" value="1 Billion+" type="radio" <?php if($data[0]['net_worth'] == '1 Billion+') { echo 'checked="checked"'; } ?>>1 Billion +
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Does you or your family office invest in real estate?</label></td>
					<td>
							<input name="fminvest" value="Yes" type="radio" <?php if($data[0]['invest'] == 'Yes') { echo 'checked="checked"'; } ?>>Yes
								<input name="fminvest" value="No" type="radio" <?php if($data[0]['invest'] == 'No') { echo 'checked="checked"'; } ?>>No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">If yes, what type of real estate transactions had your firm participated in?</label></td>
					<td>
						<input name="estatetrans[]" value="Commercial" type="checkbox" <?php if (in_array("Commercial", $transactions)) { echo 'checked="checked"'; }?>>Commercial
								<input name="estatetrans[]" value="Speculation" type="checkbox" <?php if (in_array("Speculation", $transactions)) { echo 'checked="checked"'; }?>>Speculation
								<input name="estatetrans[]" value="Residential" type="checkbox" <?php if (in_array("Residential", $transactions)) { echo 'checked="checked"'; }?>>Residential
								<input name="estatetrans[]" value="Income Producing" type="checkbox" <?php if (in_array("Income Producing", $transactions)) { echo 'checked="checked"'; }?>>Income Producing
								<input name="estatetrans[]" value="Land Development" type="checkbox" <?php if (in_array("Land Development", $transactions)) { echo 'checked="checked"'; }?>>Land Development
								<input name="estatetrans[]" value="REITS" type="checkbox">REITS
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Do you or your family office invest in private equity?</label></td>
					<td>
						<input name="privatequity" value="Yes" type="radio" <?php if($data[0]['invest_equity'] == 'Yes') { echo 'checked="checked"'; } ?>>Yes
								<input name="privatequity" value="No" type="radio" <?php if($data[0]['invest_equity'] == 'No') { echo 'checked="checked"'; } ?>>No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">If yes, what type of private equity transactions_equity  had your firm participated in? </label></td>
					<td>
						<input name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox" <?php if (in_array("Land Development", $transactions_equity )) { echo 'checked="checked"'; }?>>
						<input name="firmtrans[]" value="Financial Services" type="checkbox" <?php if (in_array("Financial Services", $transactions_equity )) { echo 'checked="checked"'; }?>>Financial Services
								<input name="firmtrans[]" value="Oil / Gas" type="checkbox" <?php if (in_array("Oil / Gas", $transactions_equity )) { echo 'checked="checked"'; }?>>Oil / Gas
								<input name="firmtrans[]" value="Health Services" type="checkbox" <?php if (in_array("Health Services", $transactions_equity )) { echo 'checked="checked"'; }?>>Health Services
								<input name="firmtrans[]" value="Technology" type="checkbox" <?php if (in_array("Technology", $transactions_equity )) { echo 'checked="checked"'; }?>>Technology
								<input name="firmtrans[]" value="Bio Tech" type="checkbox" <?php if (in_array("Bio Tech", $transactions_equity )) { echo 'checked="checked"'; }?>>Bio Tech
								<input name="firmtrans[]" value="Consumer Goods" type="checkbox" <?php if (in_array("Consumer Goods", $transactions_equity )) { echo 'checked="checked"'; }?>>Consumer Goods
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">What is the average size of your private equity investments?</label></td>
					<td>
							<input name="averagesize" value="Under 1 Mil" type="radio" <?php if($data[0]['equity_size'] == 'Under 1 Mil') { echo 'checked="checked"'; } ?>>Under 1 Mil
								<input name="averagesize" value="1 Mil - 10 Mil" type="radio" <?php if($data[0]['equity_size'] == '1 Mil - 10 Mi') { echo 'checked="checked"'; } ?>>1 Mil - 10 Mil
								<input name="averagesize" value="10 Mil - 50 Mil" type="radio" <?php if($data[0]['equity_size'] == '10 Mil - 50 Mil') { echo 'checked="checked"'; } ?>>10 Mil - 50 Mil
								<input name="averagesize" value="50 Mil +" type="radio" <?php if($data[0]['equity_size'] == '50 Mil +') { echo 'checked="checked"'; } ?>>50 Mil +
					</td>
				</tr>
			</table>   <table width="100%" cellspacing="1" cellpadding="11" class="tbl">
   <tr>
      <td width="20%">&nbsp;</td>
      <td class="txtcenter"><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="button" />
        <?php } ?>
        <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
		</form>
	<?php
	}	
	elseif($_REQUEST['action']=="import"){

		
		?>
		<form name="import" method="post" enctype="multipart/form-data">
	<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
	<h3> Importing the members list in the website</h3>
	<tr>
	<td>Select the file</td>
	<td><input type="file" name="file"></td>
	</tr>
	<tr>
	<td colspan=2> <input type="submit" name="fileselect" value="Submit" class="button">
		</td>
		</tr>
	</table>
	</form>

<?php 
}
	elseif($_REQUEST['action']=="add"){

		
		?>
		<form name="addition" method="post" enctype="multipart/form-data">
	<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
	<h3> Add New Office Membership </h3>
				<tr>
					<td width="20%"> <label id="err_page_title">First Name</label></td>
					<td>
						<input type="text" title="First Name" class="R"  name="fname" id="fname" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Last Name</label></td>
					<td>
						<input type="text" title="Last Name" class="R"  name="lname" id="lname"  size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Email</label></td>
					<td>
						<input type="text" title="Email" class="R"  name="email" id="email"  size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Phone</label></td>
					<td>
						<input type="text" title="Phone" class="R"  name="phone" id="phone"  size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Company</label></td>
					<td>
						<input type="text" title="Company" class="R"  name="company" id="company"  size="50"/>
					</td>
				</tr>
				
				<tr>
					<td width="20%"> <label id="err_page_title">Addresse</label></td>
					<td>
						<input type="text" title="Address" class="R"  name="address" id="address"  size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">City</label></td>
					<td>
						<input type="text" title="City" class="R"  name="city" id="city" value="<?php echo (isset($data[0])) ? $data[0]['city'] : $_POST['city'] ;?>" size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">State</label></td>
					<td>
						<select name="state">
								<option value="">State</option>
								<option value="Alabama" >Alabama</option>
								<option value="Alaska" >Alaska</option>
								<option value="Arizona" >Arizona</option>
								<option value="Arkansas" >Arkansas</option>
								<option value="California" >California</option>
								<option value="Colorado" >Colorado</option>
								<option value="Connecticut" >Connecticut</option>
								<option value="Delaware" >Delaware</option>
								<option value="District of Columbia" >District of Columbia</option>
								<option value="Florida" >Florida</option>
								<option value="Georgia" >Georgia</option>
								<option value="Hawaii" >Hawaii</option>
								<option value="Idaho" >Idaho</option>
								<option value="Illinois" >Illinois</option>
								<option value="Indiana" >Indiana</option>
								<option value="Iowa" >Iowa</option>
								<option value="Kansas">Kansas</option>
								<option value="Kentucky ">Kentucky</option>
								<option value="Louisiana" >Louisiana</option>
								<option value="Maine" >Maine</option>
								<option value="Maryland" >Maryland</option>
								<option value="Massachusetts" >Massachusetts</option>
								<option value="Michigan" >Michigan</option>
								<option value="Minnesota" >Minnesota</option>
								<option value="Mississippi" >Mississippi</option>
								<option value="Missouri" >Missouri</option>
								<option value="Montana" >Montana</option>
								<option value="Nebraska" >Nebraska</option>
								<option value="Nevada" >Nevada</option>
								<option value="New Hampshire" >New Hampshire</option>
								<option value="New Jersey" >New Jersey</option>
								<option value="New Mexico" >New Mexico</option>
								<option value="New York" >New York</option>
								<option value="North Carolina" >North Carolina</option>
								<option value="North Dakota" >North Dakota</option>
								<option value="Ohio" >Ohio</option>
								<option value="Oklahoma" >Oklahoma</option>
								<option value="Oregon" >Oregon</option>
								<option value="Pennsylvania" >Pennsylvania</option>
								<option value="Rhode Island" >Rhode Island</option>
								<option value="South Carolina" >South Carolina</option>
								<option value="South Dakota" >South Dakota</option>
								<option value="Tennessee" >Tennessee</option>
								<option value="Texas" >Texas</option>
								<option value="Utah" >Utah</option>
								<option value="Vermont" >Vermont</option>
								<option value="Virginia" >Virginia</option>
								<option value="Washington" >Washington</option>
								<option value="West Virginia" >West Virginia</option>
								<option value="Wisconsin" >Wisconsin</option>
								<option value="Wyoming" >Wyoming</option>
								<option value="Armed Forces Americas" >Armed Forces Americas</option>
								<option value="Armed Forces Europe" >Armed Forces Europe</option>
								<option value="Armed Forces Pacific" >Armed Forces Pacific</option>
								</select>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Zip Code</label></td>
					<td>
						<input type="text" title="Zip Code" class="R"  name="zip" id="zip"  size="50"/>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Country</label></td>
					<td>
														<select name="country">
								<option value="United States">United States</option>
								<option value="Afganistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bonaire">Bonaire</option>
								<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Canary Islands">Canary Islands</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Channel Islands">Channel Islands</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Island">Cocos Island</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote DIvoire">Cote D'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Curaco">Curacao</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Ter">French Southern Ter</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Great Britain">Great Britain</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea North">Korea North</option>
								<option value="Korea Sout">Korea South</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Malawi">Malawi</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Midway Islands">Midway Islands</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Nambia">Nambia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherland Antilles">Netherland Antilles</option>
								<option value="Netherlands">Netherlands (Holland, Europe)</option>
								<option value="Nevis">Nevis</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau Island">Palau Island</option>
								<option value="Palestine">Palestine</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Phillipines">Philippines</option>
								<option value="Pitcairn Island">Pitcairn Island</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Republic of Montenegro">Republic of Montenegro</option>
								<option value="Republic of Serbia">Republic of Serbia</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="St Barthelemy">St Barthelemy</option>
								<option value="St Eustatius">St Eustatius</option>
								<option value="St Helena">St Helena</option>
								<option value="St Kitts-Nevis">St Kitts-Nevis</option>
								<option value="St Lucia">St Lucia</option>
								<option value="St Maarten">St Maarten</option>
								<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
								<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
								<option value="Saipan">Saipan</option>
								<option value="Samoa">Samoa</option>
								<option value="Samoa American">Samoa American</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia">Serbia</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Tahiti">Tahiti</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Erimates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States of America">United States of America</option>
								<option value="Uraguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City State">Vatican City State</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								<option value="Wake Island">Wake Island</option>
								<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
								<option value="Yemen">Yemen</option>
								<option value="Zaire">Zaire</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
								</select>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Areas of interest</label></td>
					<td>
						<input name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox"><input name="areainterest[]" value="Private Equity" type="checkbox" <?php if (in_array("Private Equity", $interest)) { echo 'checked="checked"'; }?>>Private Equity
								<input name="areainterest[]" value="Real Estate" type="checkbox" >Real Estate
								<input name="areainterest[]" value="Estate Planning" type="checkbox" >Estate Planning
								<input name="areainterest[]" value="Hedge Funds" type="checkbox" >Hedge Funds
								<input name="areainterest[]" value="Legal Services" type="checkbox" >Legal Services
								<input name="areainterest[]" value="Venture Capital" type="checkbox" >Venture Capital
								<input name="areainterest[]" value="Insurance" type="checkbox" >Insurance
								<input name="areainterest[]" value="Direct Investment" type="checkbox" >Direct Investment
								<input name="areainterest[]" value="Accounting Services" type="checkbox" >Accounting Services
								<input name="areainterest[]" value="Joint Venture" type="checkbox" >Joint Venture
								<input name="areainterest[]" value="Luxury Goods" type="checkbox" >Luxury Goods
								<input name="areainterest[]" value="Events" type="checkbox" >Events
								<input name="areainterest[]" value="Travel" type="checkbox" >Travel
								<input name="areainterest[]" value="Financial Services" type="checkbox" >Financial Services
								<input name="areainterest[]" value="Philanthropy" type="checkbox">Philanthropy
								<input name="areainterest[]" value="Health Care" type="checkbox" >Health Care
								<input name="areainterest[]" value="Education" type="checkbox" >Education
								<input name="areainterest[]" value="Bio Tech" type="checkbox" >Bio Tech
								<input name="areainterest[]" value="Sports" type="checkbox" >Sports
								<input name="areainterest[]" value="Alternative Energy" type="checkbox" >Alternative Energy
								<input name="areainterest[]" value="Art" type="checkbox" >Art
								<input name="areainterest[]" value="Oil Gas" type="checkbox" >Oil Gas
								<input name="areainterest[]" value="Yachting Boating" type="checkbox" >Yachting Boating
								<input name="areainterest[]" value="Mining" type="checkbox" >Mining
								<input name="areainterest[]" value="Employment" type="checkbox" >Employment
								<input name="areainterest[]" value="Technology" type="checkbox" >Technology
								<input name="areainterest[]" value="Private Jets" type="checkbox" >Private Jets
								<input name="areainterest[]" value="Consumer Goods" type="checkbox" >Consumer Goods
								<input name="areainterest[]" value="Transportations" type="checkbox" >Transportations
								<input name="areainterest[]" value="Cannabies" type="checkbox" >Cannabies
								<input name="areainterest[]" value="Aerospace &amp; Defence" type="checkbox" >Aerospace &amp; Defence
								<input name="areainterest[]" value="Others" id="otherbox" type="checkbox" >Others
								<input name="others" id="extrafied" placeholder="If other please Explain" style="" type="text">
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Family office net worth?</label></td>
					<td>
						<input name="networth" value="Under 100 mil" type="radio" >Under 100 Mil
								<input name="networth" value="500 mil" type="radio" >100 Mil - 500 Mil
								<input name="networth" value="1 Bil" type="radio" >500 Mil - 1 Bil
								<input name="networth" value="1 Billion+" type="radio" >1 Billion +
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Does you or your family office invest in real estate?</label></td>
					<td>
							<input name="fminvest" value="Yes" type="radio" >Yes
								<input name="fminvest" value="No" type="radio" >No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">If yes, what type of real estate transactions had your firm participated in?</label></td>
					<td>
						<input name="estatetrans[]" value="Commercial" type="checkbox" >Commercial
								<input name="estatetrans[]" value="Speculation" type="checkbox" >Speculation
								<input name="estatetrans[]" value="Residential" type="checkbox" >Residential
								<input name="estatetrans[]" value="Income Producing" type="checkbox" >Income Producing
								<input name="estatetrans[]" value="Land Development" type="checkbox" >Land Development
								<input name="estatetrans[]" value="REITS" type="checkbox">REITS
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Do you or your family office invest in private equity?</label></td>
					<td>
						<input name="privatequity" value="Yes" type="radio" >Yes
								<input name="privatequity" value="No" type="radio" >No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">If yes, what type of private equity transactions_equity  had your firm participated in? </label></td>
					<td>
						<input name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox" >
						<input name="firmtrans[]" value="Financial Services" type="checkbox" >Financial Services
								<input name="firmtrans[]" value="Oil / Gas" type="checkbox" >Oil / Gas
								<input name="firmtrans[]" value="Health Services" type="checkbox" >Health Services
								<input name="firmtrans[]" value="Technology" type="checkbox" >Technology
								<input name="firmtrans[]" value="Bio Tech" type="checkbox" >Bio Tech
								<input name="firmtrans[]" value="Consumer Goods" type="checkbox" >Consumer Goods
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">What is the average size of your private equity investments?</label></td>
					<td>
							<input name="averagesize" value="Under 1 Mil" type="radio" >Under 1 Mil
								<input name="averagesize" value="1 Mil - 10 Mil" type="radio" >1 Mil - 10 Mil
								<input name="averagesize" value="10 Mil - 50 Mil" type="radio" >10 Mil - 50 Mil
								<input name="averagesize" value="50 Mil +" type="radio" >50 Mil +
					</td>
				</tr>
	<tr>
	<td colspan=2> <input type="submit" name="addition" value="Submit" class="button">
		</td>
		</tr>
	</table>
	</form>

<?php 
}

	// for view of the data
	elseif($_REQUEST['action']=="view"){

		$query="select * from family_office WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
		
		?>
	<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
	<tr>
			<td>Notes</td>
			<td>
				<form action="" method="POST">
					<textarea name="notes" rows="4" cols="50"><?php echo $data[0]['notes']; ?></textarea>
					<input type="hidden" name="mid" value="<?php echo $data[0]['id']; ?>" />
					<input type="submit" value="submit" name="coaches_notes" class="button button-primary button-large" />
				</form>
				<?php 
					if(isset($_REQUEST['coaches_notes']))
					{
						$aa = $fn->UpdateQuery("UPDATE family_office SET notes='".$_REQUEST['notes']."' where id=".$_REQUEST['mid']);
						if($aa)
						{
							echo '<meta http-equiv="refresh" content="30">';
						}
					}
				?>
			</td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><?php echo $data[0]['fname']; ?></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><?php echo $data[0]['lname']; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $data[0]['email']; ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $data[0]['phone']; ?></td>
		</tr>
		<tr>
			<td>Company</td>
			<td><?php echo $data[0]['company']; ?></td>
		</tr>
		
		<tr>
			<td>Address</td>
			<td><?php echo $data[0]['address']; ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $data[0]['city']; ?></td>
		</tr>
		<tr>
			<td>State</td>
			<td><?php echo $data[0]['state']; ?></td>
		</tr>
		<tr>
			<td>Zip Code</td>
			<td><?php echo $data[0]['zip']; ?></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><?php echo $data[0]['country']; ?></td>
		</tr>
		<tr>
			<td>Company Logo</td>
			<td></td>
		</tr>
		<tr>
			<td>Marketting Material</td>
			<td></td>
		</tr>
		<tr>
			<td>Relevant Videos</td>
			<td></td>
		</tr>
		<tr>
			<td>Areas of interest</td>
			<td><?php echo $data[0]['interest']; ?></td>
		</tr>
		<tr>
			<td>Family office net worth</td>
			<td><?php echo $data[0]['net_worth']; ?></td>
		</tr>
		<tr>
			<td>Does you or your family office invest in real estate?</td>
			<td><?php echo $data[0]['invest']; ?></td>
		</tr>
		<tr>
			<td>If yes, what type of real estate transactions had your firm participated in?</td>
			<td><?php echo $data[0]['transactions']; ?></td>
		</tr>
		<tr>
			<td>Do you or your family office invest in private equity?</td>
			<td><?php echo $data[0]['invest_equity']; ?></td>
		</tr>
		<tr>
			<td>If yes, what type of private equity transactions had your firm participated in? </td>
			<td><?php echo $data[0]['transactions_equity']; ?></td>
		</tr>
		<tr>
			<td>What is the average size of your private equity investments?</td>
			<td><?php echo $data[0]['equity_size']; ?></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="button" onclick="location.href='<?php echo $_SESSION['CURRENT_URL'];?>'" class="button" value="Back" /></td>
		</tr>
	</table>

<?php 
}
else{$obj->SetCurrentUrl();?>
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
  <tr>
    <th colspan="8"> <form>
        keywords:
        <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
        <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
        <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
      </form>
    </th>
  </tr>
  <tr>
    <td colspan="8" class="paging"><?php for($i=65;$i<=90;$i++){ 
        if($_REQUEST['alpha']==chr($i)){?>
      <?php echo "<b>" . chr($i) ."</b>"?>
      <?php } else { ?>
      <a href="?category_id=<?php echo $_GET['category_id']; ?>&alpha=<?php echo chr($i)?>" title="[<?php echo chr($i)?>]"><?php echo chr($i)?></a>
      <?php }}?></td>
  </tr>
  <?php 
        $keyword = $obj->ReplaceSql($_REQUEST['keyword']);
        $alpha = $obj->ReplaceSql($_REQUEST['alpha']);
		$category_id = $obj->ReplaceSql($_REQUEST['category_id']);
        $where = '';
		if($category_id!=''){$where .= " and (category_id='".$category_id."' or category_id like '".$category_id.",%' or category_id like '%,".$category_id.",%' or category_id like '%,".$category_id."')";}
        if($alpha!=''){$where .= " and (fname like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (fname like '".$keyword."%' or fname like '% ".$keyword."%')";}
        $query="select * from family_office where 1=1  $where order by id asc";
        $pager = new Pagination($query,$_REQUEST['page'],20,5);
        if($data = $pager->Paging()){$k = $pager->GetSNo();?>
  <tr>
    <th width="10%">Sr. No</th>
    <th width="15%">First Name</th>  
		<th width="15%">Last Name</th>     
		<th width="15%">Email</th>
		<th width="10%">Phone</th>
		<th width="15%">Company</th>
		<th width="10%">Date</th>
		<th width="10%">Action</th>
  </tr>
  <?php foreach ($data as $row){?>
  <tr>
    <td><?php echo $k++;?></td>
    <td><?php echo $row['fname'];?></td>
    <td><?php echo $row['lname'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['phone'];?></td>
    <td><?php echo $row['comapany'];?></td>
	<td><?php echo $row['Date'];?></td>
    
    <td><a href="?action=edit&id=<?php echo $row['id'] ?>" class="edit" title="Edit"></a> <a href="?action=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="8" class="paging"><?php echo $pager->DisplayAllPaging();?></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="8" class="txtcenter">No Team Member Found!</td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>