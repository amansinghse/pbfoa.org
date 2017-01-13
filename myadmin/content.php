<?php require_once("../class/class.admin.php");
	$fn = new Admin();
	$fn->RequireLogin();
	if(isset($_POST['btnupdate'])){
		if(!$fn->ValueExists("content_table","content_title",$fn->ReplaceSql($_POST['content_title']),"content_title",$fn->ReplaceSql($_POST['ctitle']))){
			$query="update content_table set content_desc='".$fn->ReplaceSql($_POST['content_desc'])."', page_title='".$fn->ReplaceSql($_POST['page_title'])."',footer_title='".$fn->ReplaceSql($_POST['footer_title'])."',footer_desc='".$fn->ReplaceSql($_POST['footer_desc'])."' where content_title='".$fn->ReplaceSql($_POST['ctitle'])."'";
			$fn->UpdateQuery($query);
			if($_FILES['content_image']['name']!=''){
			$photo = array("name"=>$_FILES['content_image']['name'],"tmp_name"=>$_FILES['content_image']['tmp_name']);
			$fn->UploadFixImage($photo,"content_table","content_image","content_title",$_POST['ctitle'],287,155);
			}
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "Page content has been updated sucsessfully";
			$fn->ReturnReferer();
		}else{
			$_SESSION['ERRORTYPE'] = "error";
			$_SESSION['ERRORMSG'] = "Page Name already exists!";
		}
	}
if($_REQUEST['action']=="imgdelete"){
	$del=$fn->SelectQuery("select content_image from content_table where content_title='".$_REQUEST['ctitle']."'");
	unlink("../content_table/th_".$del[0]['content_image']);		
	$query="update content_table set content_image='' where content_title='".$_REQUEST['ctitle']."'";
	$fn->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Company image has been deleted successfully!";
	$fn->ReturnReferer();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php"); ?>
<script>
$(document).ready(function(){
	$('#content_title').keyup(function(){
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
<script type="text/javascript" src="js/nicEdit.js"></script>
<?php /*?><?php if($_REQUEST['for']!='homecontact'){?><?php */?>
<script type="text/javascript">
	
	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('content_desc',{hasPanel : true});

});
</script>
<?php /*?><?php }?><?php */?>
</head>
<body>
<div class="full">
<h1>Manage Content for <?php echo ucfirst($_GET['for']);?> <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>
</div>
<?php require_once("message.php");?>
<?php 
	if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
	if($_REQUEST['action']=="edit"){
		$query="select * from content_table where content_title='".$fn->ReplaceSql($_GET['ctitle'])."'";
		$data = $fn->SelectQuery($query);
		$_POST['content_title'] = (isset($_POST['content_title'])) ? $_POST['content_title'] : $data[0]['content_title'];
		$_POST['page_title'] = (isset($_POST['page_title'])) ? $_POST['page_title'] : $data[0]['page_title'];
		$_POST['link_title'] = (isset($_POST['link_title'])) ? $_POST['link_title'] : $data[0]['link_title'];
		$_POST['content_desc'] = (isset($_POST['content_desc'])) ? $_POST['content_desc'] : $data[0]['content_desc'];		
		$_POST['footer_title'] = (isset($_POST['footer_title'])) ? $_POST['footer_title'] : $data[0]['footer_title'];
		$_POST['footer_desc'] = (isset($_POST['footer_desc'])) ? $_POST['footer_desc'] : $data[0]['footer_desc'];
		$_POST['content_image'] = (isset($_POST['content_image'])) ? $_POST['content_image'] : $data[0]['content_image'];
	}?>
<form name="form1" id="form1" method="post" enctype="multipart/form-data" onsubmit="return validate(document.forms['form1']);">
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
        <tr>
    	<td><label for="page_title" id="err_page_title"><?php echo ($_REQUEST['for']=='contact')?"Title":"Page Title"; ?> :</label> <?php if($_REQUEST['for']!='welcome' ){?><span class="error">*</span><?php }?></td>
	    <td><input type="text" name="page_title" title="Page Title" class="<?php echo ($_REQUEST['for']=='welcome')?"":"R"; ?>" maxlength="50" id="page_title" value="<?php echo $_POST['page_title'];?>" size="60"/> e.g. (Title of content and maximum 50 characters)</td>
    </tr>
    

        <tr>
		<td><?php echo ($_REQUEST['for']=='contact')?"Content":"Content"; ?></td>
        <td valign="top">Upload Image of maximum Width 642px<br /><br />
            <textarea id="content_desc" name="content_desc" rows="5" cols="130"><?php echo $_POST['content_desc'];?></textarea>	
        </td>
    </tr>
    
    <tr>
        <td colspan="5">
        	<?php if($_REQUEST['action']=="edit"){?>
            <input type="hidden" name="ctitle" value="<?php echo $data[0]['content_title'];?>" />
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
    <?php  if($_REQUEST['for']=='welcome' || $_REQUEST['for']=='terms' || $_REQUEST['for']=='policy' || $_REQUEST['for']=='company'){ ?>
    	<th width="40%">Title</th>
       	<th width="50%">Content</th>
	    <th width="10%">Action</th>
    
    <?php }elseif ($_REQUEST['for']=='contact') {?>
    	<th width="30%">Title</th>
    	<th width="60%">Content</th>
    	
    	
	    <th width="10%">Action</th>
    <?php } else {?>
    	<th width="15%"><?php echo ($_REQUEST['for']=='requestquote')?"Title":"Title"; ?></th>
    	<th width="30%"><?php echo ($_REQUEST['for']=='requestquote')?"Content":"Content"; ?></th>
    	
    	
	    <th width="10%">Action</th>
    <?php }?>
    </tr> 
    <?php  
        $keyword = $fn->ReplaceSql($_REQUEST['keyword']);
        $alpha = $fn->ReplaceSql($_REQUEST['alpha']);
        $where = '';
        if($alpha!=''){$where .= " and (page_title like '".$alpha."%')";}
		if($keyword!=''){$where .= " and (page_title like '".$keyword."%' or page_title like '% ".$keyword."%')";}
    	$query="select * from content_table where content_title='".$fn->ReplaceSql($_GET['for'])."' $where order by page_title";
		if($data = $fn->SelectQuery($query)){foreach ($data as $row){ ?>
    <tr>
        <?php if($_REQUEST['for']=='company'){ ?>
        <td><?php echo $row['page_title'];?></td>
    	<td><?php echo $row['content_desc'];?></td>
    	<td>
        	<a class="edit" href="?for=<?php echo $row['content_title']?>&action=edit&ctitle=<?php echo $row['content_title'];?>"></a>
        </td>        
        <?php }else if($_REQUEST['for']=='welcome'  || $_REQUEST['for']=='terms' || $_REQUEST['for']=='policy'){ ?>
    	<td><?php echo $row['page_title'];?></td>
    	<td><?php echo $row['content_desc'];?></td>
    	<td>
        	<a class="edit" href="?for=<?php echo $row['content_title']?>&action=edit&ctitle=<?php echo $row['content_title'];?>"></a>
        </td>        
        
        <?php }else if($_REQUEST['for']=='contact') {?>
        <td><?php echo $row['page_title'];?></td>
    	<td><?php echo $row['content_desc'];?></td>
        
    	
    	<td>
        	<a class="edit" href="?for=<?php echo $row['content_title']?>&action=edit&ctitle=<?php echo $row['content_title'];?>"></a>
        </td>        
        
        <?php } else {?>
		<td><?php echo $row['page_title'];?></td>
        <!--td><?php //echo $row['footer_desc'];?></td-->
        <!--td><?php// echo $row['footer_title'];?></td-->
    	<td><?php echo $row['content_desc'];?></td>
        
    	
    	<td>
        	<a class="edit" href="?for=<?php echo $row['content_title']?>&action=edit&ctitle=<?php echo $row['content_title'];?>"></a>
        </td>  
		<?php } ?>
    </tr>
	    <?php } } ?>
    </table>
<?php }?>
  
<?php include_once("footer.php");?>
</body>
</html>