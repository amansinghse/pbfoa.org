<?php require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	$fn = new Admin();
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

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
  <style>
@import url("css/fonts.css");
*{outline:none;font-family:"Droid Sans";}
body{ margin:0px; padding:0px 5px 0px 0px;font-family:"Droid Sans"; font-size:10pt; background:#fff; color:#0B5FAE;}
.navi ul{ width:200px; margin:0px; padding:0px; border:1px dashed #0064BB; list-style:none; float:left;}
.navi ul ul{ border:none;border-top:1px dashed #0064BB; display:none}
.navi ul li{ width:100%; margin:0px; padding:0px; list-style:none; float:left;border-bottom:1px dashed #0064BB; }
.navi ul li a{ color:#0064BB; width:90%; height: auto; margin:0px; float:left; padding:10px 5%; text-decoration:none; text-transform:uppercase;font-size:12px;}
.navi ul li ul li a{ color:#0064BB; width:90%; margin:0px; float:left; padding:10px 5%; text-decoration:none; text-transform:capitalize}
.navi ul li a:hover, ul li a.active, ul li a:active{color:#fff; background:#0064BB;}
.navi ul li ul li a:hover, ul li ul li a.active, ul li ul li a:active{color:#fff; background:#0064BB;}
.navi ul li:last-child{ border-bottom:none;}
</style>
</head>
<body>
<div class="container-fluid" >

<!-- header section-->
	<div class="row" style="background:#000; color:white;">
		<div class="col-md-4">
		<h3>Palm Beach</h3></div>
		<div class="col-md-8 " style="text-align:right" >
			<h3>Welcome to <?php echo COMPANY_NAME;?> Admin Panel</h3>
			<big>Welcome <?php echo $_SESSION['ADMIN_NAME'];?>! <a href="?signout" title="<?php echo COMPANY_NAME;?>" target="_parent">Logout</a></big>
		</div>
	</div>
	<!-- header section-->
	<!--center section--> 
	
	<div class="row">
	<!--menu section--> 
		<div class="col-md-2 navi">
			<ul>
			<?php foreach($_SESSION['PAGE_NAME'] as $k => $v){ ?>
				<li <?php if(($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Members') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Users') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Website Settings') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Membership')) { ?> style="display:none;<?php } ?>"><a href="javascript:;" onclick="$(this).next('ul').slideToggle(500); $(this).toggleClass('active');" class="arrow"><?php echo $k;?></a>
					<ul><?php foreach($v as $code => $page){ ++$i; ?>
						<li <?php if($_SESSION['ADMIN_NAME'] == 'Admin' && $page == 'Change Your Password') { ?> style="display:none;<?php } ?>><a href="<?php echo $code;?>" onclick="$('[rel=sublink]').removeClass('active');$(this).addClass('active');" rel="sublink">&raquo; <?php echo $page;?></a></li>
					<?php }?>
					</ul>
				</li>
			<?php }?>
			</ul>
		</div>
		<!--menu section--> 
		
		<!--main section--> 
		<div class="col-md-10">
			<div class="row">

			<h1 style="float: left; width: 100%; margin-top: 15px;">List of Thanku Emails for Users Who Registered
 			<span style="float: right; margin-right: 45px; margin-bottom: 10px;">
			<a href="?action=add" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">Add Email Messages</a>
			<a  href="emails.php" style="color: #0064bb; text-decoration: none; font-size: 14px; border: 1px solid; padding: 7px 20px;" class="xport">List Messages</a>
			</span></h1>
			</div>
			<div class="row">
				<?php 
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

				<?php }
				else{
				 $fn->SetCurrentUrl();?>
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
			</div>
		</div>
		<!--main section--> 
		
	</div>
	<!--center section--> 
	<!--footer section--> 
	<div class="row">
		<?php include_once("footer.php");?>
	</div>
	<!--footer section--> 
	
</div>



</body>
</html>