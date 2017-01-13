<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	$fn = new Admin();

	if(isset($_POST['btnupdate'])){

		$query="update footer_settings set footer1='".$fn->ReplaceSql($_POST['footer1'])."', footer2='".$fn->ReplaceSql($_POST['footer2'])."',footer3='".$fn->ReplaceSql($_POST['footer3'])."',footer4='".$fn->ReplaceSql($_POST['footer4'])."',footer5='".$fn->ReplaceSql($_POST['footer5'])."',footer6='".$fn->ReplaceSql($_POST['footer6'])."',footer7='".$fn->ReplaceSql($_POST['footer7'])."',footer8='".$fn->ReplaceSql($_POST['footer8'])."',bottom_footer='".$fn->ReplaceSql($_POST['bottom_footer'])."'";

		$fn->UpdateQuery($query);

		$_SESSION['ERRORTYPE'] = "success";

		$_SESSION['ERRORMSG'] = "Admin Settings has been updated sucsessfully";

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
<script type="text/javascript" src="js/nicEdit.js"></script> 

<script type="text/javascript">

	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer1',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer2',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer3',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer4',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer5',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer6',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer7',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer8',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('bottom_footer',{hasPanel : true});

});

</script>
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

				<h1>Manage Admin Settings <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>

				</div>

				<?php require_once("message.php");?>

				<?php 

					if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){

						$query="select * from footer_settings";

						$data = $fn->SelectQuery($query);

						$_POST['footer1'] = (isset($_POST['footer1'])) ? $_POST['footer1'] : $data[0]['footer1'];

						$_POST['footer2'] = (isset($_POST['footer2'])) ? $_POST['footer2'] : $data[0]['footer2'];

						$_POST['footer3'] = (isset($_POST['footer3'])) ? $_POST['footer3'] : $data[0]['footer3'];

						$_POST['footer4'] = (isset($_POST['footer4'])) ? $_POST['footer4'] : $data[0]['footer4'];

						$_POST['footer5'] = (isset($_POST['footer5'])) ? $_POST['footer5'] : $data[0]['footer5'];

						$_POST['footer6'] = (isset($_POST['footer6'])) ? $_POST['footer6'] : $data[0]['footer6'];

						$_POST['footer7'] = (isset($_POST['footer7'])) ? $_POST['footer7'] : $data[0]['footer7'];

						$_POST['footer8'] = (isset($_POST['footer8'])) ? $_POST['footer8'] : $data[0]['footer8'];

						$_POST['bottom_footer'] = (isset($_POST['bottom_footer'])) ? $_POST['bottom_footer'] : $data[0]['bottom_footer'];

						?>

						

						

						

				<form name="form1" id="form1" method="post" onsubmit="return validate(document.forms['form1']);">

				<table width="100%" cellspacing="1" cellpadding="10" class="table table-bordered table-striped">

					<tr>

						<td><label for="footer1" id="err_footer1">Footer One :</label> <span class="error">*</span></td>

						<td><textarea name="footer1" title="Footer One" class="R" id="footer1" rows="5" cols="130"><?php echo $_POST['footer1'];?></textarea></td>

					</tr>

					

					<tr>

						<td><label for="footer2" id="err_footer2">Footer Two :</label> <span class="error">*</span></td>

						<td><textarea name="footer2" title="Footer Two" class="R" id="footer2" rows="5" cols="130"><?php echo $_POST['footer2'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="footer3" id="err_footer3">Footer Three :</label> <span class="error">*</span></td>

						<td><textarea name="footer3" title="Footer Three" class="R" id="footer3" rows="5" cols="130"><?php echo $_POST['footer3'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="footer4" id="err_footer4">Footer Four :</label> <span class="error">*</span></td>

						<td><textarea name="footer4" title="Footer Four" class="R" id="footer4" rows="5" cols="130"><?php echo $_POST['footer4'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="footer5" id="err_footer5">Footer Five :</label> <span class="error">*</span></td>

						<td><textarea name="footer5" title="Footer Five" class="R" id="footer5" rows="5" cols="130"><?php echo $_POST['footer5'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="footer6" id="err_footer6">Footer Six :</label> <span class="error">*</span></td>

						<td><textarea name="footer6" title="Footer Six" class="R" id="footer6" rows="5" cols="130"><?php echo $_POST['footer6'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="footer7" id="err_footer7">Footer Seven :</label> <span class="error">*</span></td>

						<td><textarea name="footer7" title="Footer Seven" class="R" id="footer7" rows="5" cols="130"><?php echo $_POST['footer7'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="footer8" id="err_footer8">Footer Eight :</label> <span class="error">*</span></td>

						<td><textarea name="footer8" title="Footer Eight" class="R" id="footer8" rows="5" cols="130"><?php echo $_POST['footer8'];?></textarea></td>

					</tr>

					<tr>

						<td><label for="bottom_footer" id="err_bottom_footer">Bottom Footer :</label> <span class="error">*</span></td>

						<td><textarea name="bottom_footer" title="Bottom Footer" class="R" id="bottom_footer" rows="5" cols="130"><?php echo $_POST['bottom_footer'];?></textarea></td>

					</tr>

					<tr>

						<td colspan="2">

							<?php if($_REQUEST['action']=="edit"){?>

							<input type="hidden" name="m_title" value="<?php echo $data[0]['m_title'];?>" />

							<input type="submit" name="btnupdate" value="Update" class="button" />

							<?php }else{?>

							<input type="submit" name="btnsave" value="Add" class="button" />

							<?php }?>

							<input type="button" onclick="location.href='<?php echo $_SESSION['CURRENT_URL'];?>'" class="button" value="Back" />

						</td>

					</tr>

				</table>

				</form>

				<?php }else{ $fn->SetCurrentUrl();?>

				<table width="100%" cellspacing="1" cellpadding="10" class="table table-bordered table-striped">

					<tr>

						<th width="10%">Footer One</th>
						<th width="10%">Footer Two</th>  
						<th width="10%">Footer Three</th>     
						<th width="10%">Footer Four</th>
						<th width="10%">Footer Five</th>
						<th width="10%">Footer Six</th>
						<th width="10%">Footer Seven</th>
						<th width="10%">Footer Eight</th>
						<th width="10%">Bottom Footer</th>
						<th width="10%">Action</th>

					</tr> 

					<?php 

						$query="select * from footer_settings order by id";

						if($data = $fn->SelectQuery($query)){

							foreach ($data as $row){ ?>

					<tr>

						<td><?php echo $row['footer1'];?></td>
						<td><?php echo $row['footer2'];?></td>       
						<td><?php echo $row['footer3'];?></td>        
						<td><?php echo $row['footer4'];?></td> 
						<td><?php echo $row['footer5'];?></td> 
						<td><?php echo $row['footer6'];?></td> 
						<td><?php echo $row['footer7'];?></td> 
						<td><?php echo $row['footer8'];?></td> 
						<td><?php echo $row['bottom_footer'];?></td> 
						<td>

							<a class="edit" href="?action=edit&m_title=<?php echo $row['m_title'];?>"></a>

						</td>

					</tr>

						<?php } }?>

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