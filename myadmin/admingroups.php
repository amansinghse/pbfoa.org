<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$fn = new Admin();
$fn->RequireLogin();
if($_REQUEST['action']=="delete"){
	if($fn->ValueExists("adminusers","group_id",$_REQUEST['id'])){
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Group Could not be deleted! Already used in another form";
	}else{
		$query="delete from adminuser_groups where group_id='".$_REQUEST['id']."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Group deleted successfully!";
		$fn->ReturnReferer();
	}
}	
if(isset($_POST['btnupdate'])){	
	if($fn->ValueExists("adminuser_groups","group_title",$fn->ReplaceSql($_POST['group_title']),"group_id",$fn->ReplaceSql($_POST['id']))==false){
		$query="update adminuser_groups set group_title='".$fn->ReplaceSql($_POST['group_title'])."' where group_id='".$fn->ReplaceSql($_POST['id'])."'";
		$fn->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Group Updated successfully!";
		$fn->ReturnReferer();
	}else {
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Group Already Exists";
	}
}
if(isset($_POST['btnsave'])){
	if($fn->ValueExists("adminuser_groups","group_title",$fn->ReplaceSql($_POST['group_title']))==false){
		$date=date("Y-m-d H:i:s");
		$query="insert into adminuser_groups set group_title='".$fn->ReplaceSql($_POST['group_title'])."'";
		$fn->InsertQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Group Added successfully!";
		$fn->ReturnReferer();
	} else {
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Group Already Exists";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=8859-1" />
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<title>Admin Panel</title>
<?php require_once("inc.head.php");?>
</head>
<body>
<?php include_once("message.php"); ?>
<div class="full">
<h1>Manage Group <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>
</div>
<?php require_once("message.php");
if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
	if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
		$query = "select * from adminuser_groups where group_id='".$_REQUEST['id']."'";
		$data = $fn->SelectQuery($query);}?>
<form method="post" enctype="multipart/form-data" name="brandform" id="brandform" onsubmit="return validate(document.forms['brandform']);">
<table width="100%" cellspacing="1" cellpadding="3" class="tbl">
    <tr>
        <th colspan="2"><?php echo (isset($data)) ? "Edit" : "Add" ;?> Group</th>
    </tr>
    <tr>
        <td width="250px"><label id="err_group_title">Group Name : </label><span class="error">*</span></td>
        <td><input type="text" size="30" title="Group Name" class="R" name="group_title" id="group_title" value="<?php echo (isset($data)) ? $data[0]['group_title'] : '' ;?>"/>
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
<?php }else{if($_REQUEST['action']==""){$fn->SetCurrentUrl();}?>
<table width="100%" cellspacing="1" cellpadding="3" class="tbl">
    <tr>
	    <th><input type="button" value="Add Group" onclick="window.location='?action=add';" class="button" /></th>
    	<th colspan="2">
        	<form>
            	Search by keywords: 
                <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
                <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
                <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
            </form>
        </th>
    </tr>
    <tr>
        <td colspan="3" class="paging">
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
        <th>Group Name</th>
        <th width="15%">Edit / Delete</th>
    </tr> 
<?php 
	$keyword = trim($_REQUEST['keyword']);
	$alpha = trim($_REQUEST['alpha']);
	$where = '';
	if($keyword!=''){
		$where .= " and (group_title like '".$keyword."%' or group_title like '% ".$keyword."%')";
	}
	if($alpha!=''){
		$where .= " and (group_title like '".$alpha."%')";
	}		
	$query="select * from adminuser_groups where 1=1 $where order by group_title";
	$pager = new Pagination($query,$_REQUEST['page'],20,5);
	if($data = $pager->Paging()){
		$i = $pager->GetSNo();
		foreach ($data as $row){ ?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $row['group_title'];?></td>
			<td>
				<a class="edit" href="?action=edit&id=<?php echo $row['group_id'];?>"></a>
				<a class="delete" href="?action=delete&id=<?php echo $row['group_id'];?>" onclick="return confirm('Are you sure to delete Group');"></a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="3" class="paging"><?php echo $pager->DisplayAllPaging("alpha=".$_GET['alpha']."&keyword=".$_GET['keyword']);?></td>
		</tr>
	<?php } else { ?>
		<tr>
			<td colspan="3" class="error">No Group Found!</td>
		</tr>
	<?php } ?>
</table>
<?php } ?>
<?php include "footer.php";?>   
</body>
</html>