<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	$fn = new Admin();
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	if(isset($_POST['btnupdate'])){
		$query="update mail_settings set email='".$fn->ReplaceSql($_POST['email'])."', contact_inquiry='".$fn->ReplaceSql($_POST['contact_inquiry'])."',quick_contact='".$fn->ReplaceSql($_POST['quick_contact'])."',copyright_title='".$fn->ReplaceSql($_POST['copyright_title'])."',quick_contact_title='".$fn->ReplaceSql($_POST['quick_contact_title'])."'";
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
		new nicEditor().panelInstance('footer_contact');
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
					$query="select * from mail_settings";
					$data = $fn->SelectQuery($query);
					$_POST['email'] = (isset($_POST['email'])) ? $_POST['email'] : $data[0]['email'];
					$_POST['contact_inquiry'] = (isset($_POST['contact_inquiry'])) ? $_POST['contact_inquiry'] : $data[0]['contact_inquiry'];
					$_POST['quick_contact'] = (isset($_POST['quick_contact'])) ? $_POST['quick_contact'] : $data[0]['quick_contact'];
					$_POST['quick_contact_title'] = (isset($_POST['quick_contact_title'])) ? $_POST['quick_contact_title'] : $data[0]['quick_contact_title'];
					$_POST['copyright_title'] = (isset($_POST['copyright_title'])) ? $_POST['copyright_title'] : $data[0]['copyright_title'];
					?>
					
					
					
			<form name="form1" id="form1" method="post" onsubmit="return validate(document.forms['form1']);">
			<table width="100%" cellspacing="1" cellpadding="10" class="table table-bordered table-striped">
				<tr>
					<td><label for="email" id="err_email">Your Email for Receiving Emails :</label> <span class="error">*</span></td>
					<td><input type="text" name="email" title="Email for Receiving Emails" class="R" id="email" value="<?php echo $_POST['email'];?>" size="60"/></td>
				</tr>
				
				<tr>
					<td><label for="contact_inquiry" id="err_contact_inquiry">Thank You Message for Contact Inquiry :</label> <span class="error">*</span></td>
					<td><textarea name="contact_inquiry" title="Thank You Message for Contact Inquiry" class="R" id="contact_inquiry" rows="5" cols="130"><?php echo $_POST['contact_inquiry'];?></textarea></td>
				</tr>
			   
				<tr>
					<td><label for="quick_contact" id="err_quick_contact">Quick Contact Title:</label> </td>
					<td><input type="text" name="quick_contact_title" title="Quick Contact Title" value="<?php echo $_POST['quick_contact_title'];?>" size="60"/></td>
				</tr>
				<tr>
					<td><label for="quick_contact" id="err_quick_contact">Quick Contact:</label> </td>
					<td><input type="text" name="quick_contact" title="Quick Contact"  value="<?php echo $_POST['quick_contact'];?>" size="60" maxlength="15"/></td>
				</tr>
				 <tr>
					<td><label for="quick_contact" id="err_quick_contact">Footer Copyright:</label> </td>
					<td><input type="text" name="copyright_title" title="Footer Copyright"  value="<?php echo $_POST['copyright_title'];?>" size="60" /></td>
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
					<th width="15%">Your Email for Receiving Emails</th>
					<th width="20%">For Contact Inquiry</th>  
					<th width="20%">Quick Contact Title</th>     
					<th width="20%">Quick Contact</th>
					<th width="20%">Footer Copyright</th>
					<th width="5%">Action</th>
				</tr> 
				<?php 
					$query="select * from mail_settings order by email";
					if($data = $fn->SelectQuery($query)){
						foreach ($data as $row){ ?>
				<tr>
					<td><?php echo $row['email'];?></td>
					
					<td><?php echo $row['contact_inquiry'];?></td>       
					<td><?php echo $row['quick_contact_title'];?></td>        
					<td><?php echo $row['quick_contact'];?></td> 
					<td><?php echo $row['copyright_title'];?></td> 
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