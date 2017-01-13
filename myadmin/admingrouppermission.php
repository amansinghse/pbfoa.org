<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$fn = new Admin();
$fn->RequireLogin(false);
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
<meta http-equiv="Content-Type" content="text/html; charset=8859-1" />
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<title>Admin Panel</title>
<?php include_once("inc.head.php"); ?>
</head>
<body>
<?php include_once("message.php"); ?>
<div class="full"><h1>Manage Permissions</h1></div>
<form method="post" enctype="multipart/form-data" name="artcatform" id="artcatform" onsubmit="return validate(document.forms['artcatform']);">
<table width="100%" cellspacing="1" cellpadding="3" class="tbl">
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
<?php include "footer.php";?>   
</body>
</html>