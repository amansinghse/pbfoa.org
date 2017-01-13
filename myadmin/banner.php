<?php require_once("../class/class.admin.php");
	$fn = new Admin();
	$fn->RequireLogin();
	if(isset($_POST['btnupdate'])){
		if(!$fn->ValueExists("banners","banner_page",$fn->ReplaceSql($_POST['banner_page']),"banner_page",$fn->ReplaceSql($_POST['btitle']))){
			$query="update banners set banner_url='".$fn->ReplaceSql($_POST['banner_url'])."' where banner_page='".$fn->ReplaceSql($_POST['btitle'])."'";
			$fn->UpdateQuery($query);
			if($_FILES['banner_image']['name']!=''){
			$photo = array("name"=>$_FILES['banner_image']['name'],"tmp_name"=>$_FILES['banner_image']['tmp_name']);
			$fn->UploadFixImage($photo,"banners","banner_image","banner_page",$_POST['btitle'],893,138);
			}
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "Banner Image has been updated sucsessfully";
			$fn->ReturnReferer();
		}else{
			$_SESSION['ERRORTYPE'] = "error";
			$_SESSION['ERRORMSG'] = "Page Name already exists!";
		}
	}
if($_REQUEST['action']=="imgdelete"){
	$del=$fn->SelectQuery("select banner_image from banners where banner_page='".$_REQUEST['btitle']."'");
	unlink("../banners/th_".$del[0]['banner_image']);		
	$query="update banners set banner_image='' where banner_page='".$_REQUEST['btitle']."'";
	$fn->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Banner image has been deleted successfully!";
	$fn->ReturnReferer();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php"); ?>
<script>
$(document).ready(function(){
	$('#banner_page').keyup(function(){
		$('#content_id').removeClass('R');
		$('span.error-keyup-2').remove();
		var inputVal = $(this).val();
		var characterReg = /^\s*[a-zA-Z0-9-]+\s*$/;
		if(!characterReg.test(inputVal)){
			$(this).after('<span class="error error-keyup-2"> No special characters allowed.</span>');
			$('#content_id').addClass('R');
		}
	});
});
var myelements='content_desc';
</script>
</head>
<body>
<div class="full">
<h1>Manage Banner Image for <?php echo ucfirst($_GET['for']);?> <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>
</div>
<?php require_once("message.php");?>
<?php 
	if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
	if($_REQUEST['action']=="edit"){
		$query="select * from banners where banner_page='".$fn->ReplaceSql($_GET['btitle'])."'";
		$data = $fn->SelectQuery($query);
		$_POST['banner_url'] = (isset($_POST['banner_url'])) ? $_POST['banner_url'] : $data[0]['banner_url'];
		$_POST['banner_image'] = (isset($_POST['banner_image'])) ? $_POST['banner_image'] : $data[0]['banner_image'];
	}?>
<form name="form1" id="form1" method="post" enctype="multipart/form-data" onsubmit="return validate(document.forms['form1']);">
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
    <tr>
    	<td><label for="banner_url" id="err_banner_url">URL :</label></td>
	    <td><input type="text" name="banner_url" title="URL" class="isURL"  id="banner_url" value="<?php echo $_POST['banner_url'];?>" size="60"/> e.g. (http://www.example.com)</td>
    </tr> 
	<tr>
        <td><label for="banner_image" id="err_banner_image">Image : <br /><br /> (893 x 138)</label></td>
        <td><input type="file" name="banner_image" id="banner_image" title="Image"/>
            <?php if($_POST['banner_image']!=''){?>
            <br /><br /><img src="../banners/th_<?php echo $_POST['banner_image'];?>" height="138" width="893" />
            <?php }?>
        </td>
    </tr>
    
    <tr>
        <td colspan="5">
        	<?php if($_REQUEST['action']=="edit"){?>
            <input type="hidden" name="btitle" value="<?php echo $data[0]['banner_page'];?>" />
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
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
    <tr>
    	<th width="30%">URL</th>
    	<th width="60%">Image</th>
	    <th width="10%">Action</th>
    </tr> 
    <?php  
        $keyword = $fn->ReplaceSql($_REQUEST['keyword']);
        $alpha = $fn->ReplaceSql($_REQUEST['alpha']);
        $where = '';
        if($alpha!=''){$where .= " and (page_title like '".$alpha."%')";}
		if($keyword!=''){$where .= " and (page_title like '".$keyword."%' or page_title like '% ".$keyword."%')";}
    	$query="select * from banners where banner_page='".$fn->ReplaceSql($_GET['for'])."' $where";
		if($data = $fn->SelectQuery($query)){foreach ($data as $row){ ?>
    <tr>
        <td><?php echo $row['banner_url'];?></td>
        <td><img src="../banners/th_<?php echo $row['banner_image'];?>" height="138" width="893" />
        </td>
    	<td>
        	<a class="edit" href="?for=<?php echo $row['banner_page']?>&action=edit&btitle=<?php echo $row['banner_page'];?>"></a>
                <?php if($row['banner_image']!=""){?>
     			   <a href="?action=imgdelete&btitle=<?php echo $row['banner_page'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a><?php } ?>
            
        </td>        
    </tr>
	    <?php } } ?>
    </table>
<?php }?>
  
<?php include_once("footer.php");?>
</body>
</html>