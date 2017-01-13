<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	
require_once("../class/class.pagination.php");
$fn = new Admin();

if($_REQUEST['action']=="delete"){
	$user=$_SESSION['GROUP_ID'];
	if($user!=3)
	{
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "You don't have permission to delete!";
	$fn->ReturnReferer();
	}
	else{
		$query="delete from adminusers where admin_id='".$_REQUEST['id']."'";
	$fn->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "User deleted successfully!";
	$fn->ReturnReferer();
	}
	
}	
if(isset($_POST['btnupdate'])){	
$user=$_SESSION['GROUP_ID'];
	if($user!=3)
	{
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "You don't have permission to change your password Please Contact Super admin for this!";
		$fn->ReturnReferer();
	}
	else{
		if(!$fn->ValueExists("adminusers","email",$fn->ReplaceSql($_POST['email']),"admin_id",$fn->ReplaceSql($_POST['id']))){
		if($_POST['userpass']!=''){
			$pass = "userpass='".$fn->Encrypt($_POST['userpass'])."',";
		}
		$query="update adminusers set group_id='".$fn->ReplaceSql($_POST['group_id'])."', email='".$fn->ReplaceSql($_POST['email'])."', {$pass} full_name='".$fn->ReplaceSql($_POST['full_name'])."' where admin_id='".$fn->ReplaceSql($_POST['id'])."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "User Updated successfully!";
		$fn->ReturnReferer();
	}else{
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Email Already Exists!";
	 }
	}
	
}
if(isset($_POST['btnsave'])){
	if(!$fn->ValueExists("adminusers","email",$fn->ReplaceSql($_POST['email']))){
		$query="insert into adminusers set group_id='".$fn->ReplaceSql($_POST['group_id'])."', email='".$fn->ReplaceSql($_POST['email'])."', userpass='".$fn->Encrypt($_POST['userpass'])."', full_name='".$fn->ReplaceSql($_POST['full_name'])."'";
		$id=$fn->InsertQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "User Added successfully!";
		$fn->ReturnReferer();
	}else{
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Email Already Exists!";
	}
}
if(isset($_POST['btnsendemail'])){
	if($fn->ReplaceSql($_POST['id'])!=''){
		if(!$fn->ValueExists("adminusers","email",$fn->ReplaceSql($_POST['email']),"admin_id",$fn->ReplaceSql($_POST['id']))){
			if($_POST['userpass']!=''){
				$pass = "userpass='".$fn->Encrypt($_POST['userpass'])."',";
				$spass = $_POST['userpass'];
			}else{
				$spass = $fn->Decrypt($_POST['oldpass']);
			}
			$query="update adminusers set group_id='".$fn->ReplaceSql($_POST['group_id'])."', email='".$fn->ReplaceSql($_POST['email'])."', {$pass} full_name='".$fn->ReplaceSql($_POST['full_name'])."' where admin_id='".$fn->ReplaceSql($_POST['id'])."'";
			$fn->UpdateQuery($query);
			$body="<div style='font-family:Arial; font-size:12px;color:#575757'><h3>Admin Login Info:</h3><table cellpadding='5' cellspacing='0' border='0' width='600px' style='border:1px solid #aaaaaa; font-family:Arial, Helvetica, sans-serif; font-size:12px;background-color:#f5f5f5'><tr><td bgcolor='#cccccc' height='35px' style='color:#ffffff;' colspan='2'><span style='font-size:18pt'>".COMPANY_NAME."</span></td></tr><tr><td width='100'><strong>Email</strong></td><td>".$fn->ReplaceSql($_POST['email'])."</td></tr><tr><td><strong>Password</strong> </td><td>".$spass."</td></tr><tr><td><strong>Name</strong></td><td>".$fn->ReplaceSql($_POST['full_name'])."</td></tr></table><p>Enjoy!<br />The ".COMPANY_NAME." Team</p></div>";
			$fn->SendEmail($fn->ReplaceSql($_POST['email']),COMPANY_MAIL,COMPANY_NAME,$body,"Admin User Infomation","","");
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "User Updated successfully!";
			$fn->ReturnReferer();
		}else{
			$_SESSION['ERRORTYPE'] = "error";
			$_SESSION['ERRORMSG'] = "Email Already Exists!";
		}
	}else{
		if(!$fn->ValueExists("adminusers","email",$fn->ReplaceSql($_POST['email']))){
			$query="insert into adminusers set group_id='".$fn->ReplaceSql($_POST['group_id'])."', email='".$fn->ReplaceSql($_POST['email'])."', userpass='".$fn->Encrypt($_POST['userpass'])."', full_name='".$fn->ReplaceSql($_POST['full_name'])."'";
			$id=$fn->InsertQuery($query);
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "User Added successfully!";
			$body="<div style='font-family:Arial; font-size:12px;color:#575757'><h3>Admin Login Info:</h3><table cellpadding='5' cellspacing='0' border='0' width='600px' style='border:1px solid #aaaaaa; font-family:Arial, Helvetica, sans-serif; font-size:12px;background-color:#f5f5f5'><tr><td bgcolor='#cccccc' height='35px' style='color:#ffffff;' colspan='2'><span style='font-size:18pt'>".COMPANY_NAME."</span></td></tr><tr><td width='100'><strong>Email</strong></td><td>".$fn->ReplaceSql($_POST['email'])."</td></tr><tr><td><strong>Password</strong> </td><td>".$_POST['userpass']."</td></tr><tr><td><strong>Name</strong></td><td>".$fn->ReplaceSql($_POST['full_name'])."</td></tr></table><p>Enjoy!<br />The ".COMPANY_NAME." Team</p></div>";
			$fn->SendEmail($fn->ReplaceSql($_POST['email']),COMPANY_MAIL,COMPANY_NAME,$body,"Admin User Infomation","","");
			$fn->ReturnReferer();
		}else{
			$_SESSION['ERRORTYPE'] = "error";
			$_SESSION['ERRORMSG'] = "Email Already Exists!";
		}
	}
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
			<div class="full">
			<h1>Manage Users <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>
			</div>
			<?php require_once("message.php");?>
			<?php if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
					if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
						$query = "select * from adminusers where admin_id='".$_REQUEST['id']."'";
						$data = $fn->SelectQuery($query);}?>
			<form method="post" enctype="multipart/form-data" name="project" id="project" onsubmit="return validate(document.forms['project']);">
			<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped">
				<tr>
					<th colspan="2"><?php echo (isset($data)) ? "Edit" : "Add" ;?> Users</th>
				</tr>
				<tr>
					<td width="250px"><label id="err_group_id">Group : </label><span class="error">*</span></td>
					<td>
						<select id="group_id" name="group_id" class="R" title="Group">
							<option value="" >-Select Group-</option>
							<?php $country_cmb = $fn->SelectQuery("select * from adminuser_groups order by group_title");?><?php foreach ($country_cmb as $country) { ?><option <?php echo ($data[0]['group_id']==$country['group_id'])?'selected="selected"':'';?> value="<?php echo $country['group_id']?>"><?php echo ucfirst($country['group_title']);?></option><?php } ?>
						</select> 
					</td>
				</tr>
				<tr>
					<td><label id="err_email">Email : </label><span class="error">*</span></td>
					<td><input type="text" size="30" title="Email" class="RisEmail" name="email" id="email" value="<?php echo ($_POST['email']!='') ? $_POST['email'] : $data[0]['email'];?>"/>
					</td>
				</tr>
				<tr>
					<td width="250px"><label id="err_password">Password : </label><?php echo ($data[0]['userpass']!='') ? "":'<span class="error">*</span>';?></td>
					<td><input type="text" size="30" title="Password" class="<?php echo ($data[0]['userpass']!='') ? "":"R";?>" name="userpass" id="userpass" value=""/>
						<?php echo ($data[0]['userpass']!='') ? "Fill Password if you want to change<input type='hidden' name='oldpass' value='".$data[0]['userpass']."' />":'';?>
					</td>
				</tr>
				<tr>
					<td width="250px"><label id="err_email">Full Name : </label><span class="error">*</span></td>
					<td><input type="text" size="30" title="Full Name" class="R" name="full_name" id="full_name" value="<?php echo ($_POST['full_name']) ? $_POST['full_name'] : $data[0]['full_name'];?>"/>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?php if($_REQUEST['action']=="edit"){?>
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
						<input type="submit" name="btnupdate" value="Update" class="button" />
						<?php }else{?>
						<input type="submit" name="btnsave" value="Add" class="button" />
						<?php }?>
						<input type="submit" name="btnsendemail" value="Send Login Information" class="button" />
						<input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
					</td>
				</tr>
			</table>
			</form>
			<?php }else{ $fn->SetCurrentUrl();?>
			<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped">
				<tr>
					<th><input type="button" value="Add User" onclick="window.location='?action=add';" class="button" /></th>
					<th colspan="4">
						<form action="" method="get">
							Search by keywords: 
							<input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
							<input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
							<input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
						</form>
					</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="4" class="paging">
						Search by Alphabets: 
						<?php for($i=65;$i<=90;$i++){ 
						if($_REQUEST['alpha']==chr($i)){?>
						<?php echo "<b>" . chr($i) ."</b>"?>
						<?php } else { ?>	
						<a href="?alpha=<?php echo chr($i)?>" title="[<?php echo chr($i)?>]"><?php echo chr($i)?></a>
						<?php }}?>
					</td>
				</tr>
				<tr>
					<th width="10%">Sr. No.</th>
					<th>Email</th>
					<th>Full Name</th>
					<th>Group</th>
					<th width="20%">Edit / Delete</th>
				</tr> 
				<?php 
					$alpha = $fn->ReplaceSql($_REQUEST['alpha']);
					$keyword = $fn->ReplaceSql($_REQUEST['keyword']);
					$where = '';
					if($keyword!=''){
						$where .= " and (u.email like '".$keyword."%' or u.email like '% ".$keyword."%' or u.full_name like '".$keyword."%' or u.full_name like '% ".$keyword."%')";
					}
					if($alpha!=''){
						$where .= " and (u.email like '".$alpha."%' or u.full_name like '".$alpha."%')";
					}
					$query="select u.*,g.group_title from adminusers u inner join adminuser_groups g on u.group_id=g.group_id where 1=1 $where order by u.email";
					$pager = new Pagination($query,$_REQUEST['page'],20,5);
					if($data = $pager->Paging()){
						$i = $pager->GetSNo();
						foreach ($data as $row){ ?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['full_name'];?></td>
							<td><?php echo $row['group_title'];?></td>
							<td>
								<a class="edit" href="?action=edit&id=<?php echo $row['admin_id'];?>"></a>
								<a class="delete" href="?action=delete&id=<?php echo $row['admin_id'];?>" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="5" class="paging"><?php echo $pager->DisplayAllPaging("alpha=".$_GET['alpha']."&keyword=".$_GET['keyword']);?></td>
						</tr>
					<?php } else { ?>
						<tr>
							<td colspan="5" class="error">No User added!</td>
						</tr>
					<?php } ?>   
				</table>
				<?php } ?>
		
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