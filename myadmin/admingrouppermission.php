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

if(isset($_POST['btnsave'])){
	$fn->UpdateQuery("delete from admingroup_permissions where group_id='".$_POST['group_id']."'");
	for($i=0;$i<count($_POST['form_id']);$i++){
		$query="insert into admingroup_permissions set form_id='".$_POST['form_id'][$i]."', group_id='".$_POST['group_id']."'";
		$fn->InsertQuery($query);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Permissions has been updated successfully!";
	$fn->ReturnReferer();
}
$fn->SetCurrentUrl();

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
			<?php include_once("message.php"); ?>
			<div class="full"><h1>Manage Permissions</h1></div>
			<form method="post" enctype="multipart/form-data" name="artcatform" id="artcatform" onsubmit="return validate(document.forms['artcatform']);">
			<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped"
				<tr>
					<th colspan="4">
						Select Group 
						<select id="group_id" name="group_id" title="Member Type" onchange="window.location='?Category_Id=<?php echo $_GET['Category_Id'] ?>&group_id='+this.value">
								<option value="">-Select Group-</option>
					   <?php $group_combos = $fn->SelectQuery("select * from adminuser_groups order by group_title");foreach ($group_combos as $group) {?>
					   <option <?php echo ($_REQUEST['group_id'] == $group['group_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $group['group_id']?>"><?php echo ucfirst($group['group_title']);?></option>
					   <?php } ?>
						</select>
					</th>
				</tr>
				<tr>
					<th width="10%">Sr. No.</th>
					<th width="25%">Form Name</th>
					<th width="20%">Main Menu</th>
					<th width="20%"><label><input type="checkbox" onclick="$('[rel=chk]').attr('checked',this.checked);" /> Permission</label></th>
				</tr> 
				<?php if($_REQUEST['group_id']!=""){
						$query="select p.per_id,f.*,b.form_name as Parent_Name from adminuser_forms as f left outer join adminuser_forms as b on f.parent_id=b.form_id left outer join admingroup_permissions as p on (f.form_id=p.form_id and p.group_id='".$_GET['group_id']."') order by parent_id,display_order";
						$pager = new Pagination($query,$_REQUEST['page'],100,5);
						if($data = $pager->Paging()){ $flg=false; $pid=1;
						$i = $pager->GetSNo();?>
						<tr>
							<td colspan="4"><h3>Main Menu <small>[You have to enable both Menu and sub menus options.]</small></h3></td>
						</tr>
						<?php foreach ($data as $row){ 
						if($flg==false && $row['parent_id']!='0'){ $flg=true;?>
						<tr>
							<td colspan="4"><h3>Sub Menus</h3></td>
						</tr>
						<?php }?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['form_name'];?></td>
							<td><?php echo $row['Parent_Name'];?></td>
							<td>
								<input type="checkbox" name="form_id[]" rel="chk" value="<?php echo $row['form_id'] ?>" <?php echo $row['per_id']!="" ? 'checked="checked"': ''; ?> />
							</td>
						</tr>
						<?php } ?>
						 <tr>
							<td colspan="4">
								<input type="submit" name="btnsave" value="Submit" class="button" />
							</td>
						</tr>
						<tr>
							<td colspan="4" class="paging"><?php echo $pager->DisplayAllPaging();?></td>
						</tr>
					<?php } else { ?>
						<tr>
							<td colspan="4" class="error">No Form Found!</td>
						</tr>
					<?php } }?>   
				</table>
			  </form>  
		
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