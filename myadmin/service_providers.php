<?php

require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");

	$fn = new Admin();

	$fn->RequireLogin();
if($_REQUEST['action']=="delete"){
		$query="delete from service_providers where id='".$_REQUEST['id']."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Record has been deleted successfully!";
		$fn->ReturnReferer();
		exit();
}
if(isset($_POST['btnupdate'])){
	$date=date("Y-m-d h:i:sa");
	$id = $_REQUEST['id'];
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
$company_des = $_POST['company_des'];
$sponsoringevents = $_POST['sponsoringevents'];
$uscities = implode(',', array_filter($_REQUEST['uscities']));
$global_chk = implode(',', array_filter($_REQUEST['global']));
$spdire = $_POST['spdire'];
$notes=$_POST['notes'];
$username= $_SESSION['ADMIN_NAME'];
$newnote = $date." ".$username." - " . $notes ;
$createdby = "Team";
	
	$query="update service_providers set fname='$fname', 
	lname='$lname',
	email='$email',
	phone='$email',
	company='$company',
	address='$address',
	city='$city',
	state='$state',
	zip='$zip',
	country='$country',
	company_des='$company_des',
	sponsoringevents='$sponsoringevents',
	uscities='".$uscities."',
	global_chk='".$global_chk."',
	spdire='$spdire',
	notes='$newnote', 
	Date='$date',
	Createdby = '$createdby'
	where id='$id'";
	$fn->UpdateQuery($query);

	
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Record has been updated successfully!";
	$fn->ReturnReferer();
	
}

if(isset($_POST["addition"]))
{
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
$company_des = $_POST['company_des'];
$sponsoringevents = $_POST['sponsoringevents'];
$uscities = implode(',', array_filter($_REQUEST['uscities']));
$global_chk = implode(',', array_filter($_REQUEST['global']));
$spdire = $_POST['spdire'];
$notes=$_POST['notes'];
$username= $_SESSION['ADMIN_NAME'];
						$newnote = $date." ".$username." - " . $notes ;
$createdby = "Team";
	


	$q="INSERT INTO service_providers (fname,lname,email,phone,company,address,city,state,zip,
	country,company_des,sponsoringevents,uscities,global_chk,spdire,notes,Date,Createdby)
 VALUES ('$fname','$lname','$email','$phone','$company','$address','$city','$state',
 '$zip','$country','$company_des','$sponsoringevents','$uscities','$global_chk','$spdire',
 '$newnote','$date','$createdby')";

$fn->InsertQuery($q);
$_SESSION['ERRORTYPE'] = "success";
$_SESSION['ERRORMSG'] = "Record has been inserted successfully!";
$fn->ReturnReferer();

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
$company_des = $filesop[10];
$company_logo = $filesop[11];
$marketing_material=$filesop[12];
$videos = $filesop[13];
$sponsoringevents = $filesop[14];
$uscities = $filesop[15];
$global_chk = $filesop[16];
$spdire = $filesop[17];
$notes=$filesop[18];
$username= $_SESSION['ADMIN_NAME'];
						$newnote = $date." ".$username." - " . $notes ;
$createdby = "Team";

$q="INSERT INTO service_providers (fname,lname,email,phone,company,address,city,state,zip,country,company_des,company_logo,
marketing_material,videos,sponsoringevents,uscities,global_chk,spdire,notes,Date,Createdby)
 VALUES ('$fname','$lname','$email','$phone','$company','$address','$city','$state','$zip','$country','$company_des','$company_logo',
'$marketing_material','$videos','$sponsoringevents','$uscities','$global_chk','$spdire','$newnote','$date','$createdby')";
//$sql = mysqli_query($conn,$q);
$fn->InsertQuery($q);
$c = $c + 1;
$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Record has been imported successfully!";
		$fn->ReturnReferer();

}


}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php include_once("inc.head.php"); ?>
<link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
	  
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
  

</script>
</head>

<body>

<div class="full">

<h1 style="float: left; width: 100%; margin-top: 15px;">List of Service Providers 

<span style="float: right; margin-right: 45px; margin-bottom:10px">
<a href="?action=add" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Add Membership</a>

 <a href="services_export.php" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Export Data</a>
<a  href="?action=import" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Import Data</a>
<a  href="service_providers.php" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">List Data</a>
</span></h1>

</div>

<?php require_once("message.php");
if($_REQUEST['action']=="edit"){
		$query="select * from service_providers WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
		$uscities = explode(',', $data[0]['uscities']);
		$global_chk = explode(',', $data[0]['global_chk']);
	?>
		<form action="" method="POST" enctype="multipart/form-data">
			<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped" id="tbl">
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
								<option value="United States" <?php if($data[0]['state'] == 'United States"') { echo 'selected="selected"'; } ?>>United States</option>
								<option value="Afganistan" <?php if($data[0]['state'] == 'Afganistan') { echo 'selected="selected"'; } ?>>Afghanistan</option>
								<option value="Albania" <?php if($data[0]['state'] == 'Albania') { echo 'selected="selected"'; } ?>>Albania</option>
								<option value="Algeria" <?php if($data[0]['state'] == 'Algeria') { echo 'selected="selected"'; } ?>>Algeria</option>
								<option value="American Samoa" <?php if($data[0]['state'] == 'American Samoa') { echo 'selected="selected"'; } ?>>American Samoa</option>
								<option value="Andorra" <?php if($data[0]['state'] == 'Andorra') { echo 'selected="selected"'; } ?>>Andorra</option>
								<option value="Angola" <?php if($data[0]['state'] == 'Angola') { echo 'selected="selected"'; } ?>>Angola</option>
								<option value="Anguilla" <?php if($data[0]['state'] == 'Anguilla') { echo 'selected="selected"'; } ?>>Anguilla</option>
								<option value="Antigua &amp; Barbuda" <?php if($data[0]['state'] == 'Antigua &amp; Barbuda') { echo 'selected="selected"'; } ?>>Antigua &amp; Barbuda</option>
								<option value="Argentina" <?php if($data[0]['state'] == 'Argentina') { echo 'selected="selected"'; } ?>>Argentina</option>
								<option value="Armenia" <?php if($data[0]['state'] == 'Armenia') { echo 'selected="selected"'; } ?>>Armenia</option>
								<option value="Aruba" <?php if($data[0]['state'] == 'Aruba') { echo 'selected="selected"'; } ?>>Aruba</option>
								<option value="Australia" <?php if($data[0]['state'] == 'Australia') { echo 'selected="selected"'; } ?>>Australia</option>
								<option value="Austria" <?php if($data[0]['state'] == 'Austria') { echo 'selected="selected"'; } ?>>Austria</option>
								<option value="Azerbaijan" <?php if($data[0]['state'] == 'Azerbaijan') { echo 'selected="selected"'; } ?>>Azerbaijan</option>
								<option value="Bahamas" <?php if($data[0]['state'] == 'Bahamas') { echo 'selected="selected"'; } ?>>Bahamas</option>
								<option value="Bahrain" <?php if($data[0]['state'] == 'Bahrain') { echo 'selected="selected"'; } ?>>Bahrain</option>
								<option value="Bangladesh" <?php if($data[0]['state'] == 'Bangladesh') { echo 'selected="selected"'; } ?>>Bangladesh</option>
								<option value="Barbados" <?php if($data[0]['state'] == 'Barbados') { echo 'selected="selected"'; } ?>>Barbados</option>
								<option value="Belarus" <?php if($data[0]['state'] == 'Belarus') { echo 'selected="selected"'; } ?>>Belarus</option>
								<option value="Belgium" <?php if($data[0]['state'] == 'Belgium') { echo 'selected="selected"'; } ?>>Belgium</option>
								<option value="Belize" <?php if($data[0]['state'] == 'Belize') { echo 'selected="selected"'; } ?>>Belize</option>
								<option value="Benin" <?php if($data[0]['state'] == 'Benin') { echo 'selected="selected"'; } ?>>Benin</option>
								<option value="Bermuda" <?php if($data[0]['state'] == 'Bermuda') { echo 'selected="selected"'; } ?>>Bermuda</option>
								<option value="Bhutan" <?php if($data[0]['state'] == 'Bhutan') { echo 'selected="selected"'; } ?>>Bhutan</option>
								<option value="Bolivia" <?php if($data[0]['state'] == 'Bolivia') { echo 'selected="selected"'; } ?>>Bolivia</option>
								<option value="Bonaire" <?php if($data[0]['state'] == 'Bonaire') { echo 'selected="selected"'; } ?>>Bonaire</option>
								<option value="Bosnia &amp; Herzegovina" <?php if($data[0]['state'] == 'Bosnia &amp; Herzegovina') { echo 'selected="selected"'; } ?>>Bosnia &amp; Herzegovina</option>
								<option value="Botswana" <?php if($data[0]['state'] == 'Botswana') { echo 'selected="selected"'; } ?>>Botswana</option>
								<option value="Brazil" <?php if($data[0]['state'] == 'Brazil') { echo 'selected="selected"'; } ?>>Brazil</option>
								<option value="British Indian Ocean Ter" <?php if($data[0]['state'] == 'British Indian Ocean Ter') { echo 'selected="selected"'; } ?>>British Indian Ocean Ter</option>
								<option value="Brunei" <?php if($data[0]['state'] == 'Brunei') { echo 'selected="selected"'; } ?>>Brunei</option>
								<option value="Bulgaria" <?php if($data[0]['state'] == 'Bulgaria') { echo 'selected="selected"'; } ?>>Bulgaria</option>
								<option value="Burkina Faso" <?php if($data[0]['state'] == 'Burkina Faso') { echo 'selected="selected"'; } ?>>Burkina Faso</option>
								<option value="Burundi" <?php if($data[0]['state'] == 'Burundi') { echo 'selected="selected"'; } ?>>Burundi</option>
								<option value="Cambodia" <?php if($data[0]['state'] == 'Cambodia') { echo 'selected="selected"'; } ?>>Cambodia</option>
								<option value="Cameroon" <?php if($data[0]['state'] == 'Cameroon') { echo 'selected="selected"'; } ?>>Cameroon</option>
								<option value="Canada" <?php if($data[0]['state'] == 'Canada') { echo 'selected="selected"'; } ?>>Canada</option>
								<option value="Canary Islands" <?php if($data[0]['state'] == 'Canary Islands') { echo 'selected="selected"'; } ?>>Canary Islands</option>
								<option value="Cape Verde" <?php if($data[0]['state'] == 'Cape Verde') { echo 'selected="selected"'; } ?>>Cape Verde</option>
								<option value="Cayman Islands" <?php if($data[0]['state'] == 'Cayman Islands') { echo 'selected="selected"'; } ?>>Cayman Islands</option>
								<option value="Central African Republic" <?php if($data[0]['state'] == 'Central African Republic') { echo 'selected="selected"'; } ?>>Central African Republic</option>
								<option value="Chad" <?php if($data[0]['state'] == 'Chad') { echo 'selected="selected"'; } ?>>Chad</option>
								<option value="Channel Islands" <?php if($data[0]['state'] == 'Channel Islands') { echo 'selected="selected"'; } ?>>Channel Islands</option>
								<option value="Chile" <?php if($data[0]['state'] == 'Chile') { echo 'selected="selected"'; } ?>>Chile</option>
								<option value="China" <?php if($data[0]['state'] == 'China') { echo 'selected="selected"'; } ?>>China</option>
								<option value="Christmas Island" <?php if($data[0]['state'] == 'Christmas Island') { echo 'selected="selected"'; } ?>>Christmas Island</option>
								<option value="Cocos Island" <?php if($data[0]['state'] == 'Cocos Island') { echo 'selected="selected"'; } ?>>Cocos Island</option>
								<option value="Colombia" <?php if($data[0]['state'] == 'Colombia') { echo 'selected="selected"'; } ?>>Colombia</option>
								<option value="Comoros" <?php if($data[0]['state'] == 'Comoros') { echo 'selected="selected"'; } ?>>Comoros</option>
								<option value="Congo" <?php if($data[0]['state'] == 'Congo') { echo 'selected="selected"'; } ?>>Congo</option>
								<option value="Cook Islands" <?php if($data[0]['state'] == 'Cook Islands') { echo 'selected="selected"'; } ?>>Cook Islands</option>
								<option value="Costa Rica" <?php if($data[0]['state'] == 'Costa Rica') { echo 'selected="selected"'; } ?>>Costa Rica</option>
								<option value="Cote DIvoire" <?php if($data[0]['state'] == 'Cote DIvoire') { echo 'selected="selected"'; } ?>>Cote D'Ivoire</option>
								<option value="Croatia" <?php if($data[0]['state'] == 'Croatia') { echo 'selected="selected"'; } ?>>Croatia</option>
								<option value="Cuba" <?php if($data[0]['state'] == 'Cuba') { echo 'selected="selected"'; } ?>>Cuba</option>
								<option value="Curaco" <?php if($data[0]['state'] == 'Curaco') { echo 'selected="selected"'; } ?>>Curacao</option>
								<option value="Cyprus" <?php if($data[0]['state'] == 'Cyprus') { echo 'selected="selected"'; } ?>>Cyprus</option>
								<option value="Czech Republic" <?php if($data[0]['state'] == 'Czech Republic') { echo 'selected="selected"'; } ?>>Czech Republic</option>
								<option value="Denmark" <?php if($data[0]['state'] == 'Denmark') { echo 'selected="selected"'; } ?>>Denmark</option>
								<option value="Djibouti" <?php if($data[0]['state'] == 'Djibouti') { echo 'selected="selected"'; } ?>>Djibouti</option>
								<option value="Dominica" <?php if($data[0]['state'] == 'Dominica') { echo 'selected="selected"'; } ?>>Dominica</option>
								<option value="Dominican Republic" <?php if($data[0]['state'] == 'Dominican Republic') { echo 'selected="selected"'; } ?>>Dominican Republic</option>
								<option value="East Timor" <?php if($data[0]['state'] == 'East Timor') { echo 'selected="selected"'; } ?>>East Timor</option>
								<option value="Ecuador" <?php if($data[0]['state'] == 'Ecuador') { echo 'selected="selected"'; } ?>>Ecuador</option>
								<option value="Egypt" <?php if($data[0]['state'] == 'Egypt') { echo 'selected="selected"'; } ?>>Egypt</option>
								<option value="El Salvador" <?php if($data[0]['state'] == 'El Salvador') { echo 'selected="selected"'; } ?>>El Salvador</option>
								<option value="Equatorial Guinea" <?php if($data[0]['state'] == 'Equatorial Guinea') { echo 'selected="selected"'; } ?>>Equatorial Guinea</option>
								<option value="Eritrea" <?php if($data[0]['state'] == 'Eritrea') { echo 'selected="selected"'; } ?>>Eritrea</option>
								<option value="Estonia" <?php if($data[0]['state'] == 'Estonia') { echo 'selected="selected"'; } ?>>Estonia</option>
								<option value="Ethiopia" <?php if($data[0]['state'] == 'Ethiopia') { echo 'selected="selected"'; } ?>>Ethiopia</option>
								<option value="Falkland Islands" <?php if($data[0]['state'] == 'Falkland Islands') { echo 'selected="selected"'; } ?>>Falkland Islands</option>
								<option value="Faroe Islands" <?php if($data[0]['state'] == 'Faroe Islands') { echo 'selected="selected"'; } ?>>Faroe Islands</option>
								<option value="Fiji" <?php if($data[0]['state'] == 'Fiji') { echo 'selected="selected"'; } ?>>Fiji</option>
								<option value="Finland" <?php if($data[0]['state'] == 'Finland') { echo 'selected="selected"'; } ?>>Finland</option>
								<option value="France" <?php if($data[0]['state'] == 'France') { echo 'selected="selected"'; } ?>>France</option>
								<option value="French Guiana" <?php if($data[0]['state'] == 'French Guiana') { echo 'selected="selected"'; } ?>>French Guiana</option>
								<option value="French Polynesia" <?php if($data[0]['state'] == 'French Polynesia') { echo 'selected="selected"'; } ?>>French Polynesia</option>
								<option value="French Southern Ter" <?php if($data[0]['state'] == 'French Southern Ter') { echo 'selected="selected"'; } ?>>French Southern Ter</option>
								<option value="Gabon" <?php if($data[0]['state'] == 'Gabon') { echo 'selected="selected"'; } ?>>Gabon</option>
								<option value="Gambia" <?php if($data[0]['state'] == 'Gambia') { echo 'selected="selected"'; } ?>>Gambia</option>
								<option value="Georgia" <?php if($data[0]['state'] == 'Georgia') { echo 'selected="selected"'; } ?>>Georgia</option>
								<option value="Germany" <?php if($data[0]['state'] == 'Germany') { echo 'selected="selected"'; } ?>>Germany</option>
								<option value="Ghana" <?php if($data[0]['state'] == 'Ghana') { echo 'selected="selected"'; } ?>>Ghana</option>
								<option value="Gibraltar" <?php if($data[0]['state'] == 'Gibraltar') { echo 'selected="selected"'; } ?>>Gibraltar</option>
								<option value="Great Britain" <?php if($data[0]['state'] == 'Great Britain') { echo 'selected="selected"'; } ?>>Great Britain</option>
								<option value="Greece" <?php if($data[0]['state'] == 'Greece') { echo 'selected="selected"'; } ?>>Greece</option>
								<option value="Greenland" <?php if($data[0]['state'] == 'Greenland') { echo 'selected="selected"'; } ?>>Greenland</option>
								<option value="Grenada" <?php if($data[0]['state'] == 'Grenada') { echo 'selected="selected"'; } ?>>Grenada</option>
								<option value="Guadeloupe" <?php if($data[0]['state'] == 'Guadeloupe') { echo 'selected="selected"'; } ?>>Guadeloupe</option>
								<option value="Guam" <?php if($data[0]['state'] == 'Guam') { echo 'selected="selected"'; } ?>>Guam</option>
								<option value="Guatemala" <?php if($data[0]['state'] == 'Guatemala') { echo 'selected="selected"'; } ?>>Guatemala</option>
								<option value="Guinea" <?php if($data[0]['state'] == 'Guinea') { echo 'selected="selected"'; } ?>>Guinea</option>
								<option value="Guyana" <?php if($data[0]['state'] == 'Guyana') { echo 'selected="selected"'; } ?>>Guyana</option>
								<option value="Haiti" <?php if($data[0]['state'] == 'Haiti') { echo 'selected="selected"'; } ?>>Haiti</option>
								<option value="Hawaii" <?php if($data[0]['state'] == 'Hawaii') { echo 'selected="selected"'; } ?>>Hawaii</option>
								<option value="Honduras" <?php if($data[0]['state'] == 'Honduras') { echo 'selected="selected"'; } ?>>Honduras</option>
								<option value="Hong Kong" <?php if($data[0]['state'] == 'Hong Kong') { echo 'selected="selected"'; } ?>>Hong Kong</option>
								<option value="Hungary" <?php if($data[0]['state'] == 'Hungary') { echo 'selected="selected"'; } ?>>Hungary</option>
								<option value="Iceland" <?php if($data[0]['state'] == 'Iceland') { echo 'selected="selected"'; } ?>>Iceland</option>
								<option value="India" <?php if($data[0]['state'] == 'India') { echo 'selected="selected"'; } ?>>India</option>
								<option value="Indonesia" <?php if($data[0]['state'] == 'Indonesia') { echo 'selected="selected"'; } ?>>Indonesia</option>
								<option value="Iran" <?php if($data[0]['state'] == 'Iran') { echo 'selected="selected"'; } ?>>Iran</option>
								<option value="Iraq" <?php if($data[0]['state'] == 'Iraq') { echo 'selected="selected"'; } ?>>Iraq</option>
								<option value="Ireland" <?php if($data[0]['state'] == 'Ireland') { echo 'selected="selected"'; } ?>>Ireland</option>
								<option value="Isle of Man" <?php if($data[0]['state'] == 'Isle of Man') { echo 'selected="selected"'; } ?>>Isle of Man</option>
								<option value="Israel" <?php if($data[0]['state'] == 'Israel') { echo 'selected="selected"'; } ?>>Israel</option>
								<option value="Italy" <?php if($data[0]['state'] == 'Italy') { echo 'selected="selected"'; } ?>>Italy</option>
								<option value="Jamaica" <?php if($data[0]['state'] == 'Jamaica') { echo 'selected="selected"'; } ?>>Jamaica</option>
								<option value="Japan" <?php if($data[0]['state'] == 'Japan') { echo 'selected="selected"'; } ?>>Japan</option>
								<option value="Jordan" <?php if($data[0]['state'] == 'Jordan') { echo 'selected="selected"'; } ?>>Jordan</option>
								<option value="Kazakhstan" <?php if($data[0]['state'] == 'Kazakhstan') { echo 'selected="selected"'; } ?>>Kazakhstan</option>
								<option value="Kenya" <?php if($data[0]['state'] == 'Kenya') { echo 'selected="selected"'; } ?>>Kenya</option>
								<option value="Kiribati" <?php if($data[0]['state'] == 'Kiribati') { echo 'selected="selected"'; } ?>>Kiribati</option>
								<option value="Korea North" <?php if($data[0]['state'] == 'Korea North') { echo 'selected="selected"'; } ?>>Korea North</option>
								<option value="Korea South" <?php if($data[0]['state'] == 'Korea South') { echo 'selected="selected"'; } ?>>Korea South</option>
								<option value="Kuwait" <?php if($data[0]['state'] == 'Kuwait') { echo 'selected="selected"'; } ?>>Kuwait</option>
								<option value="Kyrgyzstan" <?php if($data[0]['state'] == 'Kyrgyzstan') { echo 'selected="selected"'; } ?>>Kyrgyzstan</option>
								<option value="Laos" <?php if($data[0]['state'] == 'Laos') { echo 'selected="selected"'; } ?>>Laos</option>
								<option value="Latvia" <?php if($data[0]['state'] == 'Latvia') { echo 'selected="selected"'; } ?>>Latvia</option>
								<option value="Lebanon" <?php if($data[0]['state'] == 'Lebanon') { echo 'selected="selected"'; } ?>>Lebanon</option>
								<option value="Lesotho" <?php if($data[0]['state'] == 'Lesotho') { echo 'selected="selected"'; } ?>>Lesotho</option>
								<option value="Liberia" <?php if($data[0]['state'] == 'Liberia') { echo 'selected="selected"'; } ?>>Liberia</option>
								<option value="Libya" <?php if($data[0]['state'] == 'Libya') { echo 'selected="selected"'; } ?>>Libya</option>
								<option value="Liechtenstein" <?php if($data[0]['state'] == 'Liechtenstein') { echo 'selected="selected"'; } ?>>Liechtenstein</option>
								<option value="Lithuania" <?php if($data[0]['state'] == 'Lithuania') { echo 'selected="selected"'; } ?>>Lithuania</option>
								<option value="Luxembourg" <?php if($data[0]['state'] == 'Luxembourg') { echo 'selected="selected"'; } ?>>Luxembourg</option>
								<option value="Macau" <?php if($data[0]['state'] == 'Macau') { echo 'selected="selected"'; } ?>>Macau</option>
								<option value="Macedonia" <?php if($data[0]['state'] == 'Macedonia') { echo 'selected="selected"'; } ?>>Macedonia</option>
								<option value="Madagascar" <?php if($data[0]['state'] == 'Madagascar') { echo 'selected="selected"'; } ?>>Madagascar</option>
								<option value="Malaysia" <?php if($data[0]['state'] == 'Malaysia') { echo 'selected="selected"'; } ?>>Malaysia</option>
								<option value="Malawi" <?php if($data[0]['state'] == 'Malawi') { echo 'selected="selected"'; } ?>>Malawi</option>
								<option value="Maldives" <?php if($data[0]['state'] == 'Maldives') { echo 'selected="selected"'; } ?>>Maldives</option>
								<option value="Mali" <?php if($data[0]['state'] == 'Mali') { echo 'selected="selected"'; } ?>>Mali</option>
								<option value="Malta" <?php if($data[0]['state'] == 'Malta') { echo 'selected="selected"'; } ?>>Malta</option>
								<option value="Marshall Islands" <?php if($data[0]['state'] == 'Marshall Islands') { echo 'selected="selected"'; } ?>>Marshall Islands</option>
								<option value="Martinique" <?php if($data[0]['state'] == 'Martinique') { echo 'selected="selected"'; } ?>>Martinique</option>
								<option value="Mauritania" <?php if($data[0]['state'] == 'Mauritania') { echo 'selected="selected"'; } ?>>Mauritania</option>
								<option value="Mauritius" <?php if($data[0]['state'] == 'Mauritius') { echo 'selected="selected"'; } ?>>Mauritius</option>
								<option value="Mayotte" <?php if($data[0]['state'] == 'Mayotte') { echo 'selected="selected"'; } ?>>Mayotte</option>
								<option value="Mexico" <?php if($data[0]['state'] == 'Mexico') { echo 'selected="selected"'; } ?>>Mexico</option>
								<option value="Midway Islands" <?php if($data[0]['state'] == 'Midway Islands') { echo 'selected="selected"'; } ?>>Midway Islands</option>
								<option value="Moldova" <?php if($data[0]['state'] == 'Moldova') { echo 'selected="selected"'; } ?>>Moldova</option>
								<option value="Monaco" <?php if($data[0]['state'] == 'Monaco') { echo 'selected="selected"'; } ?>Monaco</option>
								<option value="Mongolia" <?php if($data[0]['state'] == 'Mongolia') { echo 'selected="selected"'; } ?>>Mongolia</option>
								<option value="Montserrat" <?php if($data[0]['state'] == 'Montserrat') { echo 'selected="selected"'; } ?>>Montserrat</option>
								<option value="Morocco" <?php if($data[0]['state'] == 'Morocco') { echo 'selected="selected"'; } ?>>Morocco</option>
								<option value="Mozambique" <?php if($data[0]['state'] == 'Mozambique') { echo 'selected="selected"'; } ?>>Mozambique</option>
								<option value="Myanmar" <?php if($data[0]['state'] == 'Myanmar') { echo 'selected="selected"'; } ?>>Myanmar</option>
								<option value="Nambia" <?php if($data[0]['state'] == 'Nambia') { echo 'selected="selected"'; } ?>>Nambia</option>
								<option value="Nauru" <?php if($data[0]['state'] == 'Nauru') { echo 'selected="selected"'; } ?>>Nauru</option>
								<option value="Nepal" <?php if($data[0]['state'] == 'Nepal') { echo 'selected="selected"'; } ?>>Nepal</option>
								<option value="Netherland Antilles" <?php if($data[0]['state'] == 'Netherland Antilles') { echo 'selected="selected"'; } ?>>Netherland Antilles</option>
								<option value="Netherlands" <?php if($data[0]['state'] == 'Netherlands') { echo 'selected="selected"'; } ?>>Netherlands (Holland, Europe)</option>
								<option value="Nevis" <?php if($data[0]['state'] == 'Nevis') { echo 'selected="selected"'; } ?>>Nevis</option>
								<option value="New Caledonia" <?php if($data[0]['state'] == 'New Caledonia') { echo 'selected="selected"'; } ?>>New Caledonia</option>
								<option value="New Zealand" <?php if($data[0]['state'] == 'New Zealand') { echo 'selected="selected"'; } ?>>New Zealand</option>
								<option value="Nicaragua" <?php if($data[0]['state'] == 'Nicaragua') { echo 'selected="selected"'; } ?>>Nicaragua</option>
								<option value="Niger" <?php if($data[0]['state'] == 'Niger') { echo 'selected="selected"'; } ?>>Niger</option>
								<option value="Nigeria" <?php if($data[0]['state'] == 'Nigeria') { echo 'selected="selected"'; } ?>>Nigeria</option>
								<option value="Niue" <?php if($data[0]['state'] == 'Niue') { echo 'selected="selected"'; } ?>>Niue</option>
								<option value="Norfolk Island" <?php if($data[0]['state'] == 'Norfolk Island') { echo 'selected="selected"'; } ?>>Norfolk Island</option>
								<option value="Norway" <?php if($data[0]['state'] == 'Norway') { echo 'selected="selected"'; } ?>>Norway</option>
								<option value="Oman" <?php if($data[0]['state'] == 'Oman') { echo 'selected="selected"'; } ?>>Oman</option>
								<option value="Pakistan" <?php if($data[0]['state'] == 'Pakistan') { echo 'selected="selected"'; } ?>>Pakistan</option>
								<option value="Palau Island" <?php if($data[0]['state'] == 'Palau Island') { echo 'selected="selected"'; } ?>>Palau Island</option>
								<option value="Palestine" <?php if($data[0]['state'] == 'Palestine') { echo 'selected="selected"'; } ?>>Palestine</option>
								<option value="Panama" <?php if($data[0]['state'] == 'Panama') { echo 'selected="selected"'; } ?>>Panama</option>
								<option value="Papua New Guinea" <?php if($data[0]['state'] == 'Papua New Guinea') { echo 'selected="selected"'; } ?>>Papua New Guinea</option>
								<option value="Paraguay" <?php if($data[0]['state'] == 'Paraguay') { echo 'selected="selected"'; } ?>>Paraguay</option>
								<option value="Peru" <?php if($data[0]['state'] == 'Peru') { echo 'selected="selected"'; } ?>>Peru</option>
								<option value="Phillipines" <?php if($data[0]['state'] == 'Phillipines') { echo 'selected="selected"'; } ?>>Philippines</option>
								<option value="Pitcairn Island" <?php if($data[0]['state'] == 'Pitcairn Island') { echo 'selected="selected"'; } ?>>Pitcairn Island</option>
								<option value="Poland" <?php if($data[0]['state'] == 'Poland') { echo 'selected="selected"'; } ?>>Poland</option>
								<option value="Portugal" <?php if($data[0]['state'] == 'Portugal') { echo 'selected="selected"'; } ?>>Portugal</option>
								<option value="Puerto Rico" <?php if($data[0]['state'] == 'Puerto Rico') { echo 'selected="selected"'; } ?>>Puerto Rico</option>
								<option value="Qatar" <?php if($data[0]['state'] == 'Qatar') { echo 'selected="selected"'; } ?>>Qatar</option>
								<option value="Republic of Montenegro" <?php if($data[0]['state'] == 'Republic of Montenegro') { echo 'selected="selected"'; } ?>>Republic of Montenegro</option>
								<option value="Republic of Serbia" <?php if($data[0]['state'] == 'Republic of Serbia') { echo 'selected="selected"'; } ?>>Republic of Serbia</option>
								<option value="Reunion" <?php if($data[0]['state'] == 'Reunion') { echo 'selected="selected"'; } ?>>Reunion</option>
								<option value="Romania" <?php if($data[0]['state'] == 'Romania') { echo 'selected="selected"'; } ?>>Romania</option>
								<option value="Russia" <?php if($data[0]['state'] == 'Russia') { echo 'selected="selected"'; } ?>>Russia</option>
								<option value="Rwanda" <?php if($data[0]['state'] == 'Rwanda') { echo 'selected="selected"'; } ?>>Rwanda</option>
								<option value="St Barthelemy" <?php if($data[0]['state'] == 'St Barthelemy') { echo 'selected="selected"'; } ?>>St Barthelemy</option>
								<option value="St Eustatius" <?php if($data[0]['state'] == 'St Eustatius') { echo 'selected="selected"'; } ?>>St Eustatius</option>
								<option value="St Helena" <?php if($data[0]['state'] == 'St Helena') { echo 'selected="selected"'; } ?>>St Helena</option>
								<option value="St Kitts-Nevis" <?php if($data[0]['state'] == 'St Kitts-Nevis') { echo 'selected="selected"'; } ?>>St Kitts-Nevis</option>
								<option value="St Lucia" <?php if($data[0]['state'] == 'St Lucia') { echo 'selected="selected"'; } ?>>St Lucia</option>
								<option value="St Maarten" <?php if($data[0]['state'] == 'St Maarten') { echo 'selected="selected"'; } ?>>St Maarten</option>
								<option value="St Pierre &amp; Miquelon" <?php if($data[0]['state'] == 'St Pierre &amp; Miquelon') { echo 'selected="selected"'; } ?>>St Pierre &amp; Miquelon</option>
								<option value="St Vincent &amp; Grenadines" <?php if($data[0]['state'] == 'St Vincent &amp; Grenadines') { echo 'selected="selected"'; } ?>>St Vincent &amp; Grenadines</option>
								<option value="Saipan" <?php if($data[0]['state'] == 'Saipan') { echo 'selected="selected"'; } ?>>Saipan</option>
								<option value="Samoa" <?php if($data[0]['state'] == 'Samoa') { echo 'selected="selected"'; } ?>>Samoa</option>
								<option value="Samoa American" <?php if($data[0]['state'] == 'Samoa American') { echo 'selected="selected"'; } ?>>Samoa American</option>
								<option value="San Marino" <?php if($data[0]['state'] == 'San Marino') { echo 'selected="selected"'; } ?>>San Marino</option>
								<option value="Sao Tome &amp; Principe" <?php if($data[0]['state'] == 'Sao Tome &amp; Principe') { echo 'selected="selected"'; } ?>>Sao Tome &amp; Principe</option>
								<option value="Saudi Arabia" <?php if($data[0]['state'] == 'Saudi Arabia') { echo 'selected="selected"'; } ?>>Saudi Arabia</option>
								<option value="Senegal" <?php if($data[0]['state'] == 'Senegal') { echo 'selected="selected"'; } ?>>Senegal</option>
								<option value="Serbia" <?php if($data[0]['state'] == 'Serbia') { echo 'selected="selected"'; } ?>>Serbia</option>
								<option value="Seychelles" <?php if($data[0]['state'] == 'Seychelles') { echo 'selected="selected"'; } ?>>Seychelles</option>
								<option value="Sierra Leone" <?php if($data[0]['state'] == 'Sierra Leone') { echo 'selected="selected"'; } ?>>Sierra Leone</option>
								<option value="Singapore" <?php if($data[0]['state'] == 'Singapore') { echo 'selected="selected"'; } ?>>Singapore</option>
								<option value="Slovakia" <?php if($data[0]['state'] == 'Slovakia') { echo 'selected="selected"'; } ?>>Slovakia</option>
								<option value="Slovenia" <?php if($data[0]['state'] == 'Slovenia') { echo 'selected="selected"'; } ?>>Slovenia</option>
								<option value="Solomon Islands" <?php if($data[0]['state'] == 'Solomon Islands') { echo 'selected="selected"'; } ?>>Solomon Islands</option>
								<option value="Somalia" <?php if($data[0]['state'] == 'Somalia') { echo 'selected="selected"'; } ?>>Somalia</option>
								<option value="South Africa" <?php if($data[0]['state'] == 'South Africa') { echo 'selected="selected"'; } ?>>South Africa</option>
								<option value="Spain" <?php if($data[0]['state'] == 'Spain') { echo 'selected="selected"'; } ?>>Spain</option>
								<option value="Sri Lanka" <?php if($data[0]['state'] == 'Sri Lanka') { echo 'selected="selected"'; } ?>>Sri Lanka</option>
								<option value="Sudan" <?php if($data[0]['state'] == 'Sudan') { echo 'selected="selected"'; } ?>>Sudan</option>
								<option value="Suriname" <?php if($data[0]['state'] == 'Suriname') { echo 'selected="selected"'; } ?>>Suriname</option>
								<option value="Swaziland" <?php if($data[0]['state'] == 'Swaziland') { echo 'selected="selected"'; } ?>>Swaziland</option>
								<option value="Sweden" <?php if($data[0]['state'] == 'Sweden') { echo 'selected="selected"'; } ?>>Sweden</option>
								<option value="Switzerland" <?php if($data[0]['state'] == 'Switzerland') { echo 'selected="selected"'; } ?>>Switzerland</option>
								<option value="Syria" <?php if($data[0]['state'] == 'Syria') { echo 'selected="selected"'; } ?>>Syria</option>
								<option value="Tahiti" <?php if($data[0]['state'] == 'Tahiti') { echo 'selected="selected"'; } ?>>Tahiti</option>
								<option value="Taiwan" <?php if($data[0]['state'] == 'Taiwan') { echo 'selected="selected"'; } ?>>Taiwan</option>
								<option value="Tajikistan" <?php if($data[0]['state'] == 'Tajikistan') { echo 'selected="selected"'; } ?>>Tajikistan</option>
								<option value="Tanzania" <?php if($data[0]['state'] == 'Tanzania') { echo 'selected="selected"'; } ?>>Tanzania</option>
								<option value="Thailand" <?php if($data[0]['state'] == 'Thailand') { echo 'selected="selected"'; } ?>>Thailand</option>
								<option value="Togo" <?php if($data[0]['state'] == 'Togo') { echo 'selected="selected"'; } ?>>Togo</option>
								<option value="Tokelau" <?php if($data[0]['state'] == 'Tokelau') { echo 'selected="selected"'; } ?>>Tokelau</option>
								<option value="Tonga" <?php if($data[0]['state'] == 'Tonga') { echo 'selected="selected"'; } ?>>Tonga</option>
								<option value="Trinidad &amp; Tobago" <?php if($data[0]['state'] == 'Trinidad &amp; Tobago') { echo 'selected="selected"'; } ?>>Trinidad &amp; Tobago</option>
								<option value="Tunisia" <?php if($data[0]['state'] == 'Tunisia') { echo 'selected="selected"'; } ?>>Tunisia</option>
								<option value="Turkey" <?php if($data[0]['state'] == 'Turkey') { echo 'selected="selected"'; } ?>>Turkey</option>
								<option value="Turkmenistan" <?php if($data[0]['state'] == 'Turkmenistan') { echo 'selected="selected"'; } ?>>Turkmenistan</option>
								<option value="Turks &amp; Caicos Is" <?php if($data[0]['state'] == 'Turks &amp; Caicos Is') { echo 'selected="selected"'; } ?>>Turks &amp; Caicos Is</option>
								<option value="Tuvalu" <?php if($data[0]['state'] == 'Tuvalu') { echo 'selected="selected"'; } ?>>Tuvalu</option>
								<option value="Uganda" <?php if($data[0]['state'] == 'Uganda') { echo 'selected="selected"'; } ?>>Uganda</option>
								<option value="Ukraine" <?php if($data[0]['state'] == 'Ukraine') { echo 'selected="selected"'; } ?>>Ukraine</option>
								<option value="United Arab Erimates" <?php if($data[0]['state'] == 'United Arab Erimates') { echo 'selected="selected"'; } ?>>United Arab Emirates</option>
								<option value="United Kingdom" <?php if($data[0]['state'] == 'United Kingdom') { echo 'selected="selected"'; } ?>>United Kingdom</option>
								<option value="United States of America" <?php if($data[0]['state'] == 'United States of America') { echo 'selected="selected"'; } ?>>United States of America</option>
								<option value="Uraguay" <?php if($data[0]['state'] == 'Uraguay') { echo 'selected="selected"'; } ?>>Uruguay</option>
								<option value="Uzbekistan" <?php if($data[0]['state'] == 'Uzbekistan') { echo 'selected="selected"'; } ?>>Uzbekistan</option>
								<option value="Vanuatu" <?php if($data[0]['state'] == 'Vanuatu') { echo 'selected="selected"'; } ?>>Vanuatu</option>
								<option value="Vatican City State" <?php if($data[0]['state'] == 'Vatican City State') { echo 'selected="selected"'; } ?>>Vatican City State</option>
								<option value="Venezuela" <?php if($data[0]['state'] == 'Venezuela') { echo 'selected="selected"'; } ?>>Venezuela</option>
								<option value="Vietnam" <?php if($data[0]['state'] == 'Vietnam') { echo 'selected="selected"'; } ?>>Vietnam</option>
								<option value="Virgin Islands (Brit)" <?php if($data[0]['state'] == 'Virgin Islands (Brit)') { echo 'selected="selected"'; } ?>>Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)" <?php if($data[0]['state'] == 'Virgin Islands (USA') { echo 'selected="selected"'; } ?>>Virgin Islands (USA)</option>
								<option value="Wake Island" <?php if($data[0]['state'] == 'Wake Island') { echo 'selected="selected"'; } ?>>Wake Island</option>
								<option value="Wallis &amp; Futana Is" <?php if($data[0]['state'] == 'Wallis &amp; Futana Is') { echo 'selected="selected"'; } ?>>Wallis &amp; Futana Is</option>
								<option value="Yemen" <?php if($data[0]['state'] == 'Yemen') { echo 'selected="selected"'; } ?>>Yemen</option>
								<option value="Zaire" <?php if($data[0]['state'] == 'Zaire') { echo 'selected="selected"'; } ?>>Zaire</option>
								<option value="Zambia" <?php if($data[0]['state'] == 'Zambia') { echo 'selected="selected"'; } ?>>Zambia</option>
								<option value="Zimbabwe" <?php if($data[0]['state'] == 'Zimbabwe') { echo 'selected="selected"'; } ?>>Zimbabwe</option>
								</select>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Description of company</label></td>
					<td>
						<textarea title="Description of company" rows="4" cols="80" name="company_des" id="company_des" ><?php echo (isset($data[0])) ? $data[0]['company_des'] : $_POST['company_des'] ;?></textarea>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Are you intrested in sponsoring events?</label></td>
					<td>
						<input name="sponsoringevents" value="Yes" type="radio" <?php if($data[0]['sponsoringevents'] == 'Yes') { echo 'checked="checked"'; } ?>>Yes
		<input name="sponsoringevents" value="No" type="radio" <?php if($data[0]['sponsoringevents'] == 'No') { echo 'checked="checked"'; } ?>>No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Other Locations of Intrest: U.S Cities</label></td>
					<td>
							<input name="uscities[]" value="New York City" type="checkbox" <?php if (in_array("New York City", $uscities )) { echo 'checked="checked"'; }?>>New York City
		<input name="uscities[]" value="London" type="checkbox" <?php if (in_array("Londonl", $uscities )) { echo 'checked="checked"'; }?>>London
		<input name="uscities[]" value="China" type="checkbox" <?php if (in_array("China", $uscities )) { echo 'checked="checked"'; }?>>China
		<input name="uscities[]" value="Hongkong" type="checkbox" <?php if (in_array("Hongkong", $uscities )) { echo 'checked="checked"'; }?>>Hongkong
		<input name="uscities[]" value="Canada" type="checkbox" <?php if (in_array("Canada", $uscities )) { echo 'checked="checked"'; }?>>Canada
		<input name="uscities[]" value="Brazil" type="checkbox" <?php if (in_array("Brazil", $uscities )) { echo 'checked="checked"'; }?>>Brazil
		<input name="uscities[]" value="London" type="checkbox" <?php if (in_array("London", $uscities )) { echo 'checked="checked"'; }?>>London
		<input name="uscities[]" value="Chicago" type="checkbox" <?php if (in_array("Chicago", $uscities )) { echo 'checked="checked"'; }?>>Chicago
		<input name="uscities[]" value="Boston" type="checkbox" <?php if (in_array("Boston", $uscities )) { echo 'checked="checked"'; }?>>Boston
		<input name="uscities[]" value="Houston" type="checkbox" <?php if (in_array("Houston", $uscities )) { echo 'checked="checked"'; }?>>Houston
		<input name="uscities[]" value="Palm Beach" type="checkbox" <?php if (in_array("Palm Beach", $uscities )) { echo 'checked="checked"'; }?>>Palm Beach
		<input name="uscities[]" value="San Francisco" type="checkbox" <?php if (in_array("San Francisco", $uscities )) { echo 'checked="checked"'; }?>>San Francisco
		<input name="uscities[]" value="Dallas" type="checkbox" <?php if (in_array("Dallas", $uscities )) { echo 'checked="checked"'; }?>>Dallas
		<input name="uscities[]" value="Atlanta" type="checkbox" <?php if (in_array("Atlanta", $uscities )) { echo 'checked="checked"'; }?>>Atlanta
		<input name="uscities[]" value="Naples" type="checkbox" <?php if (in_array("Naples", $uscities )) { echo 'checked="checked"'; }?>>Naples
		<input name="uscities[]" value="San Diego" type="checkbox" <?php if (in_array("San Diego", $uscities )) { echo 'checked="checked"'; }?>>San Diego
		<input name="uscities[]" value="Miami" type="checkbox" <?php if (in_array("Miami", $uscities )) { echo 'checked="checked"'; }?>>Miami
		<input name="uscities[]" value="Tampa Bay" type="checkbox" <?php if (in_array("Tampa Bay", $uscities )) { echo 'checked="checked"'; }?>>Tampa Bay
		<input name="uscities[]" value="Connecticut" type="checkbox" <?php if (in_array("Connecticut", $uscities )) { echo 'checked="checked"'; }?>>Connecticut
		<input name="uscities[]" value="Denver" type="checkbox" <?php if (in_array("Denver", $uscities )) { echo 'checked="checked"'; }?>>Denver
		<input name="global[]" value="Singapore" type="checkbox" <?php if (in_array("Singapore", $uscities )) { echo 'checked="checked"'; }?>>Singapore
		<input name="global[]" value="Washington DC" type="checkbox" <?php if (in_array("Washington DC", $uscities )) { echo 'checked="checked"'; }?>>Singapore
		<input name="uscities[]" value="Other" id="otherbox" type="checkbox" <?php if (in_array("Other", $uscities )) { echo 'checked="checked"'; }?>>Other<span><input name="othercity" id="extrafied" placeholder="If other please Explain" style="" type="text"></span>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Global</label></td>
					<td>
						<input name="global[]" value="Australia" type="checkbox" <?php if (in_array("Australia", $global_chk  )) { echo 'checked="checked"'; }?>>Australia
		<input name="global[]" value="Latin America" type="checkbox" <?php if (in_array("Latin America", $global_chk  )) { echo 'checked="checked"'; }?>>Latin America
		<input name="global[]" value="Eastern Europe" type="checkbox" <?php if (in_array("Eastern Europe", $global_chk  )) { echo 'checked="checked"'; }?>>Eastern Europe
		<input name="global[]" value="Middle East" type="checkbox" <?php if (in_array("Middle East", $global_chk  )) { echo 'checked="checked"'; }?>>Middle East
		<input name="global[]" value="Australia" type="checkbox" <?php if (in_array("Australia", $global_chk  )) { echo 'checked="checked"'; }?>>Hong Kong
		<input name="global[]" value="China" type="checkbox" <?php if (in_array("China", $global_chk  )) { echo 'checked="checked"'; }?>>China
		<input name="global[]" value="Canada" type="checkbox" <?php if (in_array("Canada", $global_chk  )) { echo 'checked="checked"'; }?>>Canada
		<input name="global[]" value="Brazil" type="checkbox" <?php if (in_array("Brazil", $global_chk  )) { echo 'checked="checked"'; }?>>Brazil
		<input name="global[]" value="Switzerland" type="checkbox" <?php if (in_array("Switzerland", $global_chk  )) { echo 'checked="checked"'; }?>>Switzerland
		<input name="global[]" value="Singapore" type="checkbox" <?php if (in_array("Singapore", $global_chk  )) { echo 'checked="checked"'; }?>>Singapore
		<input name="global[]" value="London" type="checkbox" <?php if (in_array("London", $global_chk  )) { echo 'checked="checked"'; }?>>London 
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Would you like your firm to be listed in FON’s service provider directory?</label></td>
					<td>
						<input name="spdire" value="Yes" type="radio" <?php if($data[0]['spdire'] == 'Yes') { echo 'checked="checked"'; } ?>>Yes
		<input name="spdire" value="No" type="radio" <?php if($data[0]['spdire'] == 'No') { echo 'checked="checked"'; } ?>>No
					</td>
				</tr>
				
				<tr>
					<td width="20%"> <label id="err_page_title">Notes</label></td>
					<td>
						<textarea title="Notes" rows="4" cols="80" name="notes" id="notes" ><?php echo (isset($data[0])) ? $data[0]['notes'] : $_POST['notes'] ;?></textarea>
					</td>
				</tr>
			
   <tr>
      <td width="20%">&nbsp;</td>
      <td class="txtcenter"><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="btn btn-primary" />
        <?php } ?>
        <input type="button" value="Back" class="btn btn-primary" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
		</form>
	<?php
	}
	
	elseif($_REQUEST['action']=="add"){
		
	?>
		<form action="" method="POST" enctype="multipart/form-data">
			<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped" id="tbl">
			
				<tr>
				  <th colspan="2">Add  Membership</th>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">First Name</label></td>
					<td>
						<input type="text" title="First Name" class="R"  name="fname" id="fname"  size="50"/>
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
						<input type="text" title="Company" class="R"  name="company" id="company"   size="50"/>
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
						<input type="text" title="City" class="R"  name="city" id="city"   size="50"/>
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
						<input type="text" title="Zip Code" class="R"  name="zip" id="zip"   size="50"/>
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
					<td width="20%"> <label id="err_page_title">Description of company</label></td>
					<td>
						<textarea title="Description of company" rows="4" cols="80" name="company_des" id="company_des" ></textarea>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Are you intrested in sponsoring events?</label></td>
					<td>
						<input name="sponsoringevents" value="Yes" type="radio" >Yes
		<input name="sponsoringevents" value="No" type="radio" >No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Other Locations of Intrest: U.S Cities</label></td>
					<td>
							<input name="uscities[]" value="New York City" type="checkbox" >New York City
		<input name="uscities[]" value="London" type="checkbox" >London
		<input name="uscities[]" value="China" type="checkbox" >China
		<input name="uscities[]" value="Hongkong" type="checkbox" >Hongkong
		<input name="uscities[]" value="Canada" type="checkbox" >Canada
		<input name="uscities[]" value="Brazil" type="checkbox" >Brazil
		<input name="uscities[]" value="London" type="checkbox">London
		<input name="uscities[]" value="Chicago" type="checkbox" >Chicago
		<input name="uscities[]" value="Boston" type="checkbox" >Boston
		<input name="uscities[]" value="Houston" type="checkbox" >Houston
		<input name="uscities[]" value="Palm Beach" type="checkbox" >Palm Beach
		<input name="uscities[]" value="San Francisco" type="checkbox" >San Francisco
		<input name="uscities[]" value="Dallas" type="checkbox" >Dallas
		<input name="uscities[]" value="Atlanta" type="checkbox" >Atlanta
		<input name="uscities[]" value="Naples" type="checkbox" >Naples
		<input name="uscities[]" value="San Diego" type="checkbox" >San Diego
		<input name="uscities[]" value="Miami" type="checkbox" >Miami
		<input name="uscities[]" value="Tampa Bay" type="checkbox" >Tampa Bay
		<input name="uscities[]" value="Connecticut" type="checkbox" >Connecticut
		<input name="uscities[]" value="Denver" type="checkbox" >Denver
		<input name="global[]" value="Singapore" type="checkbox" >Singapore
		<input name="global[]" value="Washington DC" type="checkbox" >Singapore
		<input name="uscities[]" value="Other" id="otherbox" type="checkbox" >Other<span><input name="othercity" id="extrafied" placeholder="If other please Explain" style="" type="text"></span>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Global</label></td>
					<td>
						<input name="global[]" value="Australia" type="checkbox" >Australia
		<input name="global[]" value="Latin America" type="checkbox" >Latin America
		<input name="global[]" value="Eastern Europe" type="checkbox" >Eastern Europe
		<input name="global[]" value="Middle East" type="checkbox" >Middle East
		<input name="global[]" value="Australia" type="checkbox" >Hong Kong
		<input name="global[]" value="China" type="checkbox" >China
		<input name="global[]" value="Canada" type="checkbox" >Canada
		<input name="global[]" value="Brazil" type="checkbox" >Brazil
		<input name="global[]" value="Switzerland" type="checkbox" >Switzerland
		<input name="global[]" value="Singapore" type="checkbox" >Singapore
		<input name="global[]" value="London" type="checkbox"  >London 
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Would you like your firm to be listed in FON’s service provider directory?</label></td>
					<td>
						<input name="spdire" value="Yes" type="radio" >Yes
		<input name="spdire" value="No" type="radio" >No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Does your company have a website?</label></td>
					<td>
						<input name="website" value="Yes" type="radio" >Yes
							<input name="website" value="No" type="radio" >No
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">If so, Please input your website link:</label></td>
					<td>
					<input value="" placeholder="http://" onfocus="this.placeholder = ''" onblur="this.placeholder = 'http://'" name="url" type="text">
					</td>
				</tr>
			
   <tr>
      <td width="20%">&nbsp;</td>
      <td >
        <input type="submit" value="Add Membership" name="addition" class="btn btn-primary" /></td>
    </tr>
  </table>
		</form>
	<?php
	}
	
elseif($_REQUEST['action']=="import"){

		
		?>
		<form name="import" method="post" enctype="multipart/form-data">
	<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped">
	<h3> Importing the members list in the website</h3>
	<tr>
	<td>Select the file</td>
	<td><input type="file" name="file" class="btn btn-success"></td>
	</tr>
	<tr>
	<td colspan=2> <input type="submit" name="fileselect" value="Submit" class="btn btn-primary">
		</td>
		</tr>
	</table>
	</form>

<?php 
}


	elseif($_REQUEST['action']=="view"){

		$query="select * from service_providers WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
		
		?>

	<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped">
		<tr>
			<td>Notes</td>
			<td>
				<form action="" method="POST">
				<table class="table  table-bordered table-striped">
					<tr>
					<th class ="info">Notes</th>
					</tr>
					<tr>
						
						<td><?php $ds = $data[0]['notes'];
                              if($ds != null)
							  {
								  echo $ds;
							  }
							  else{
								  echo "No Notes Found Yet";
							  }
								?>
						
						</td>
					</tr>
					</table>
					<textarea name="notes" rows="4" placeholder="Enter new Note" cols="50"></textarea><br>
					<input type="hidden" name="mid" value="<?php echo $data[0]['id']; ?>" />
					<input type="submit" value="submit" name="coaches_notes" style="margin-top:5px;" class="btn btn-primary" />
				</form>
				<?php 
				
						function writeMsg() {
								$d= $data[0]['i'];
							echo '<script>window.location.href = "service_providers.php?action=view&id="'.$d.'"";</script>';
						
						}
					
					if(isset($_POST['coaches_notes']))
					{
						$note = $_POST['notes'];
						if($note != null)
						{
							$date=date("Y-m-d h:i:sa");
						$username= $_SESSION['ADMIN_NAME'];
						$newnote = $date." ".$username." - " . $note ;
						
						$oldnote= $data[0]['notes'];
						if($oldnote == null)
						{
							$notes = $newnote;
						}
						else
						{
							$notes= $oldnote ."<br>".$newnote;
						}
							
						$aa = $fn->UpdateQuery("UPDATE service_providers SET notes='$notes' where id=".$_REQUEST['mid']);
						//
						echo "<meta http-equiv='refresh' content='0'>";
						}
						else
						{
							writeMsg();
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
			<td>Company Description</td>
			<td><?php echo $data[0]['company_des']; ?></td>
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
			<td>Are you intrested in sponsoring events?</td>
			<td><?php echo $data[0]['sponsoringevents']; ?></td>
		</tr>
		<tr>
			<td>Other Locations of Intrest: U.S Cities </td>
			<td><?php echo $data[0]['uscities']; ?></td>
		</tr>
		<tr>
			<td>Global</td>
			<td><?php echo $data[0]['global_chk']; ?></td>
		</tr>
		<tr>
			<td>Would you like your firm to be listed in FON’s service provider directory?</td>
			<td><?php echo $data[0]['spdire']; ?></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="button" onclick="location.href='<?php echo $_SESSION['CURRENT_URL'];?>'" class="btn btn-primary" value="Back" /></td>
		</tr>
	</table>

<?php }else{ $fn->SetCurrentUrl();?>
<div class="col-md-12">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
					<th >Sr. No</th>
					<th >First Name</th>  
					<th >Last Name</th>     
					<th >Email</th>
					<th >Phone</th>
					<th >Company</th>
					<th >Date</th>
					<th> Created By </th>
					<th >Action</th>
                 
                </tr>
                </thead>
                <tbody>
			
				
               
               <?php 

    	$query="select * from service_providers order by id";

		if($data = $fn->SelectQuery($query)){
$k = 1;
			foreach ($data as $row){ ?>

    <tr>

        <td><?php echo $k;?></td>
        <td><?php echo $row['fname'];?></td>       
        <td><?php echo $row['lname'];?></td>        
        <td><?php echo $row['email'];?></td> 
        <td><?php echo $row['phone'];?></td> 
        <td><?php echo $row['company'];?></td> 
        <td><?php echo $row['Date'];?></td> 
		<td><?php echo $row['Createdby'];?></td> 
    	
		<td>

        	<a class="view" href="?action=view&id=<?php echo $row['id'];?>"></a>
        	<a class="edit" href="?action=edit&id=<?php echo $row['id'];?>"></a>
        	<a href="?action=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>

        </td>

    </tr>

	    <?php $k++; } }?>
			   
                </tfoot>
              </table>
			  </div>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>