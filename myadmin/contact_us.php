<?php

require_once("../class/class.admin.php");

	$fn = new Admin();

	$fn->RequireLogin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php include_once("inc.head.php"); ?>

</head>

<body>

<div class="full">

<h1>List of FON News <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>

</div>

<?php require_once("message.php");
	if($_REQUEST['action']=="view"){
		$query="select * from contact_us WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
?>
	<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
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
			<td colspan="2"><input type="button" onclick="location.href='<?php echo $_SESSION['CURRENT_URL'];?>'" class="button" value="Back" /></td>
		</tr>
	</table>

<?php }else{ $fn->SetCurrentUrl();?>

<table width="100%" cellspacing="1" cellpadding="10" class="tbl">

    <tr>

        <th width="15%">Sr. No</th>

        <th width="15%">Name</th>  

        <th width="15%">Email</th>     

        <th width="15%">Phone</th>

        <th width="20%">Subject</th>
		
        <th width="20%">Message</th>

    </tr> 

    <?php 

    	$query="select * from contact_us order by id";
		if($data = $fn->SelectQuery($query)){
$k = 1;
			foreach ($data as $row){ ?>

    <tr>

        <td><?php echo $k;?></td>

        <td><?php echo $row['yourname'];?></td>       

        <td><?php echo $row['youremail'];?></td>        

        <td><?php echo $row['yourphone'];?></td> 

        <td><?php echo $row['yoursubject'];?></td> 

        <td><?php echo $row['yoursmessage'];?></td>

    </tr>

	    <?php $k++; } }?>

    </table>

<?php }?>

<?php include_once("footer.php");?>

</body>

</html>