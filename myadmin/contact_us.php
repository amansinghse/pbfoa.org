<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	
	$fn = new Admin();

	


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
			<div class="full">

				<h1>List of FON News <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>

				</div>

				<?php require_once("message.php");
					if($_REQUEST['action']=="view"){
						$query="select * from contact_us WHERE id=".$_REQUEST['id'];
						$data = $fn->SelectQuery($query);
				?>
					<table width="100%" cellspacing="1" cellpadding="10"  class="table table-bordered table-striped">
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

				<table width="100%" cellspacing="1" cellpadding="10"  class="table table-bordered table-striped">

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