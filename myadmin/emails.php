<?php

require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");


	$fn = new Admin();

	$fn->RequireLogin();
if($_REQUEST['action']=="delete"){
		$query="delete from thankuemails where id='".$_REQUEST['id']."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Record has been deleted successfully!";
		$fn->ReturnReferer();
		exit();
}
if(isset($_POST['btnupdate'])){
	$date = date("Y-m-d h:i:sa");
	$id = $_REQUEST['id'];
	$creatorname = $_SESSION['ADMIN_NAME'];
	$emailmessage = $_POST['emailmessage'];
	$status = $_POST['status'];
	
	
	
	$query="update thankuemails set emailmessage='$emailmessage', createdby='$creatorname', Date='$date', status= '$status'
	where id='$id'";
	$fn->UpdateQuery($query);	

	if($status == "Active")
	{
		$status1 = "Deactive";
	
	}
	else
	{
		$status1 = "Active";
	
	}
	$query1="update thankuemails set status= '$status1'
	where id !='$id'";
	$fn->UpdateQuery($query1);	
	
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Record has been updated successfully!";
	$fn->ReturnReferer();
	
}

if(isset($_POST["addition"]))
{
	$date=date("Y-m-d h:i:sa");
	$creatorname = $_SESSION['ADMIN_NAME'];
	$emailmessage = $_POST['emailmessage'];
	$status = $_POST['status'];

$q="INSERT INTO thankuemails (emailmessage,createdby,Date,Status)
 VALUES ('$emailmessage','$creatorname','$date','$status')";

$fn->InsertQuery($q);
$_SESSION['ERRORTYPE'] = "success";
$_SESSION['ERRORMSG'] = "Record has been inserted successfully!";
$fn->ReturnReferer();

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

<h1 style="float: left; width: 100%; margin-top: 15px;">List of Thanku Emails for Users Who Registered
 
 <span style="float: right; margin-right: 45px; margin-bottom: 10px;">
 <a href="?action=add" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Add Email Messages</a>
<a  href="emails.php" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">List Messages</a>

 </span></h1>

</div>

<?php require_once("message.php");
if($_REQUEST['action']=="edit"){
		$query="select * from thankuemails WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
	?>
		<form action="" method="POST" enctype="multipart/form-data">
			<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped" id="tbl">
				<h3>Edit Thank You Emails Messages</h3>
				<tr>
				  <th colspan="2">Edit Message</th>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Email Message</label></td>
					<td>
						<textarea name="emailmessage" rows="4" cols="50"><?php echo (isset($data[0])) ? $data[0]['emailmessage'] : $_POST['emailmessage'] ;?></textarea>
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Status</label></td>
					<td>
						<select name="status" >
								<option value="Active" <?php if($data[0]['status'] == 'Active') { echo 'selected="selected"'; } ?>>Active</option>
								<option value="Deactive" <?php if($data[0]['status'] == 'Deactive') { echo 'selected="selected"'; } ?>>Deactive</option>
						</select>
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
			<h3> Add Thank You Emails Messages</h3>
				<tr>
				  <th colspan="2">Add Message</th>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Email Message</label></td>
					<td>
								<textarea name="emailmessage" rows="4" cols="50"></textarea>
				
					</td>
				</tr>
				<tr>
					<td width="20%"> <label id="err_page_title">Status</label></td>
					<td>
								<select name="status" >
								<option value="Active">Active</option>
								<option value="Deactive">Deactive</option>
								</select>
				
					</td>
				</tr>
				
			   <tr>
				  <td width="20%">&nbsp;</td>
				  <td >
					<input type="submit" value="Add Membership" class="btn btn-primary" name="addition" />
				  </td>
				</tr>
  </table>
		</form>
	<?php
	}
	

	elseif($_REQUEST['action']=="view"){

		$query="select * from thankuemails WHERE id=".$_REQUEST['id'];
		$data = $fn->SelectQuery($query);
		
		?>

	<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped">
		<tr>
			<td>Email Message</td>
			<td>
				
					<?php echo (isset($data[0])) ? $data[0]['emailmessage'] : $_POST['emailmessage'] ;?>
					
			</td>
			
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo (isset($data[0])) ? $data[0]['status'] : $_POST['status'] ;?></td>
			
		</tr>
	
		<tr>
			<td colspan="2"><input type="button" onclick="location.href='<?php echo $_SESSION['CURRENT_URL'];?>'" class="btn btn-primary" value="Back" /></td>
		</tr>
	</table>

<?php }else{ $fn->SetCurrentUrl();?>
<div class="col-md-12 ">
 <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr class="info">
		<th >Sr. No</th>
        <th >Email Message</th>  
        <th >Created By</th>
        <th >Date</th>
        <th >Status</th>
        <th >Action</th>
                 
                </tr>
                </thead>
                <tbody>
			
				
               
               <?php 

    	$query="select * from thankuemails order by id";
		if($data = $fn->SelectQuery($query)){
$k = 1;
			foreach ($data as $row){ ?>

    <tr>

        <td><?php echo $k;?></td>
        <td><?php echo $row['emailmessage'];?></td>            
        <td><?php echo $row['createdby'];?></td> 
        <td><?php echo $row['Date'];?></td> 
    	<td><?php echo $row['status'];?></td> 
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