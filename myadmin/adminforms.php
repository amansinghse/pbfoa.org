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
		$query="delete from adminuser_forms where form_id='".$_REQUEST['id']."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Form deleted successfully!";
		$fn->ReturnReferer();
}	
if(isset($_POST['btnupdate'])){	
	$query="update adminuser_forms set form_name='" .$fn->ReplaceSql($_POST['form_name'])."',form_code='" .$fn->ReplaceSql($_POST['form_code'])."', display_order='" .$fn->ReplaceSql($_POST['display_order'])."', parent_id='".$fn->ReplaceSql($_POST['Parent'])."' where form_id='".$fn->ReplaceSql($_POST['id'])."'";
	$fn->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Form Updated successfully!";
	$fn->ReturnReferer();
}
if(isset($_POST['btnsave'])){
	$query="insert into adminuser_forms set form_name='" .$fn->ReplaceSql($_POST['form_name'])."',form_code='" .$fn->ReplaceSql($_POST['form_code'])."', display_order='" .$fn->ReplaceSql($_POST['display_order'])."', parent_id='".$fn->ReplaceSql($_POST['Parent'])."'";
	$id=$fn->InsertQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Form Added successfully!";
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
			<?php include_once("message.php"); ?>
			<div class="full"><h1>Manage Forms <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1></div>
			<?php if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
					if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
						$query = "select * from adminuser_forms where form_id='".$_REQUEST['id']."'";
						$data = $fn->SelectQuery($query);}?>
			<form method="post" enctype="multipart/form-data" name="project" id="project" onsubmit="return validate(document.forms['project']);">
			<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped">
				<tr>
					<th colspan="2"><?php echo (isset($data)) ? "Edit" : "Add" ;?> Forms</th>
				</tr>
				<tr>
					<td width="250px"><label for="form_name" id="err_form_name">Form Name</label> <span class="red">*</span></td>
					<td>
						<input type="text" size="30" name="form_name" id="form_name" value="<?php echo (isset($data)) ? $data[0]['form_name'] : '' ;?>" class="R" title="Form Name" /></td>
				</tr>
				<tr>
					<td><label for="form_code" id="err_form_code">Form Code</label> &nbsp;</td>
					<td><input type="text" size="30" name="form_code" id="form_code" value="<?php echo (isset($data)) ? $data[0]['form_code'] : '' ;?>" title="Form Code" /></td>
				</td>
				<tr>
					<td><label for="display_order" id="err_display_order">Display Order</label> <span class="red">*</span></td>
					<td><input type="text" size="30" name="display_order" id="display_order" value="<?php echo (isset($data)) ? $data[0]['display_order'] : '' ;?>" class="RisNo" title="Display Order" /></td>
				</tr>
				<tr>
					<td><label for="form_code" id="err_form_code">Parent Form</label> <span class="red">*</span></td>
					<td>
						<select name="Parent" id="Parent" class="R" title="Parent Form">
						<option value="0">-Parent-</option>
						<?php if($country = $fn->SelectQuery("select * from adminuser_forms where parent_id=0 and form_id!='".$_POST['id']."' order by display_order")){foreach ($country as $cnt) { ?>
							<option <?php echo ($data[0]['parent_id']==$cnt['form_id'])?'selected="selected"':'';?> value="<?php echo $cnt['form_id']?>"><?php echo $cnt['form_name']?></option>
						<?php } }?>
					</select>
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
						<input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
					</td>
				</tr>
			</table>
			</form>
			<?php }else{ $fn->SetCurrentUrl();?>
			<form>
			<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped">
				<tr>
					<th><input type="button" value="Add Form" onclick="window.location='?action=add';" class="button" /></th>
					<th colspan="4">
						Search by keywords: 
						<input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
						<input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
						<input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
					</th>
				</tr>
				<tr>
					<td colspan="5" class="paging">
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
					<th>Form Name</th>
					<th>Form Code</th>
					<th>Parent Form</th>
					<th width="20%">Edit / Delete</th>
				</tr> 
				<?php 
					$alpha = $fn->ReplaceSql($_GET['alpha']);
					$keyword = $fn->ReplaceSql($_GET['keyword']);
					$where = '';
					if($keyword!=''){
						$where .= " and (f1.form_name like '".$keyword."%' or f1.form_name like '% ".$keyword."%')";
					}
					if($alpha!=''){
						$where .= " and (f1.form_name like '".$alpha."%')";
					}
					$query="select f1.*,f2.form_name as Parent_Name from adminuser_forms f1 left outer join adminuser_forms f2 on f1.parent_id=f2.form_id where 1=1 {$where} order by f1.parent_id,f1.display_order";
					$pager = new Pagination($query,$_REQUEST['page'],50,5);
					if($data = $pager->Paging()){
						$i = $pager->GetSNo();
						foreach ($data as $row){ ?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['form_name'];?></td>
							<td><?php echo $row['form_code'];?></td>
							<td><?php echo $row['Parent_Name'];?></td>
							<td>
								<a class="edit" href="?action=edit&id=<?php echo $row['form_id'];?>"></a>
								<a class="delete" href="?action=delete&id=<?php echo $row['form_id'];?>" onclick="retuen confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="5" class="paging"><?php echo $pager->DisplayAllPaging("alpha=".$_GET['alpha']."&keyword=".$_GET['keyword']);?></td>
						</tr>
					<?php } else { ?>
						<tr>
							<td colspan="5" class="error">No Form added!</td>
						</tr>
					<?php } ?>   
				</table>
			</form>
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

 <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="menu/sidebar-menu.js"></script>
  <script>
    $.sidebarMenu($('.sidebar-menu'))
  </script>

</body>
</html>