<?php require_once("../class/class.admin.php");
	$fn = new Admin();
	$fn->RequireLogin();
	if(isset($_POST['btnupdate'])){
		if(!$fn->ValueExists("videos","video_page",$fn->ReplaceSql($_POST['video_page']),"video_page",$fn->ReplaceSql($_POST['vtitle']))){
			$query="update videos set video_link='".$fn->ReplaceSql($_POST['video_link'])."', video_title='".$fn->ReplaceSql($_POST['video_title'])."',video_desc='".$fn->ReplaceSql($_POST['video_desc'])."',video_status='".$fn->ReplaceSql($_POST['video_status'])."' where video_page='".$fn->ReplaceSql($_POST['vtitle'])."'";
			$fn->UpdateQuery($query);
			if($_FILES['file']['name']!=''){
				$fn->DeleteImage("videos",$_POST['Oldfile']);
				$file = array("name"=>$_FILES['file']['name'],"tmp_name"=>$_FILES['file']['tmp_name']);
				$fn->UploadImageFile($file,"videos","file","video_page",$fn->ReplaceSql($_POST['vtitle']));
			}
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "Video has been updated sucsessfully";
			$fn->ReturnReferer();
		}else{
			$_SESSION['ERRORTYPE'] = "error";
			$_SESSION['ERRORMSG'] = "Video already exists!";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php"); ?>
<script>
$(document).ready(function(){
	$('#video_page').keyup(function(){
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
var myelements='video_desc';
</script>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
		new nicEditor().panelInstance('video_desc');
	});
</script>
<link rel="stylesheet" href="css/icon_style.css" media="screen" type="text/css" />
<script type="text/javascript" src="js/jacs.js"></script>
<script language="javascript">
$(document).ready(function(){
	$(".prettybox").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:10000,social_tools:''});
});
function prettyclose(){
	$.prettyPhoto.close();
}
</script>
</head>
<body>
<div class="full">
<h1>Manage Video for <?php echo ucfirst($_GET['for']);?> <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>
</div>
<?php require_once("message.php");?>
<?php 
	if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
	if($_REQUEST['action']=="edit"){
		$query="select * from videos where video_page='".$fn->ReplaceSql($_GET['vtitle'])."'";
		$data = $fn->SelectQuery($query);
		$_POST['video_page'] = (isset($_POST['video_page'])) ? $_POST['video_page'] : $data[0]['video_page'];
		$_POST['video_title'] = (isset($_POST['video_title'])) ? $_POST['video_title'] : $data[0]['video_title'];
		$_POST['video_link'] = (isset($_POST['video_link'])) ? $_POST['video_link'] : $data[0]['video_link'];
		$_POST['video_desc'] = (isset($_POST['video_desc'])) ? $_POST['video_desc'] : $data[0]['video_desc'];
		$_POST['video_status'] = (isset($_POST['video_status'])) ? $_POST['video_status'] : $data[0]['video_status'];
		$_POST['file'] = (isset($_POST['file'])) ? $_POST['file'] : $data[0]['file'];
	}?>
<form name="form1" id="form1" method="post" enctype="multipart/form-data" onsubmit="return validate(document.forms['form1']);">
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
	<tr>
    	<td><label>Apply Video:</label></td>
        <td>
        	<select name="video_status">
            	<option value="null">..Apply Video..</option>
            	<option <?php echo $_POST['video_status']=='Yes' ?'selected="selected"':'';?> value="Yes">Yes</option>
                <option <?php echo $_POST['video_status']=='No' ?'selected="selected"':'';?> value="No">No</option>
            </select>
        </td>
    </tr>
    <tr>
		<td>Embed video code<span class="error">*</span><br /><br />
Video Size: 475 X 300
</td>
        <td valign="top">
         	<textarea id="video_link" name="video_link" rows="5" class="R" title="Video Embed Code" cols="130"><?php echo $_POST['video_link'];?></textarea>	
                
        </td>
    </tr>
     <tr>
    	<td><label for="video_title" id="err_video_title">Form Title:</label> </td>
	    <td><input type="text" name="video_title" title="Title"  id="video_title" value="<?php echo $_POST['video_title'];?>" size="60"/> </td>
    </tr>
    <tr>
        <td width="25%"><label id="err_file">Upload File : </label><span class="error"></span></td>
        <td width="75%"><div style="float:left"><input type="file" size="45" title="File" class="isDoc" name="file" id="file"/> (e.g.image,pdf,docs etc.)</div>
        <div style="float:left; padding-left:20px">
        <?php if($data[0]['file']!=""){
         $ext=strstr($data[0]['file'],".");
            $ext=substr($ext,1,strlen($ext));
            if($ext=="pdf" || $ext=="xls" || $ext=="xlsx" || $ext=="doc" || $ext=="docx" || $ext=="ppt" || $ext=="pptx" || $ext=="csv" || $ext=="zip" || $ext=="rar"){ ?>
            <a href="http://docs.google.com/gview?url=<?php echo WEBSITE_URL?>/videos/<?php echo $_POST['file'];?>&embedded=true&iframe=true" class="prettybox icon-ext_<?php echo $ext;?>"></a>
            <?php } if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){ ?>
                <a href="<?php echo WEBSITE_URL?>/videos/<?php echo $_POST['file'];?>" class="prettybox icon-ext_<?php echo $ext;?>"></a>
            <?php } ?> 
            <input type="hidden" name="Oldfile" id="Oldfile" value="<?php echo $_POST['file'];?>"/>
            <?php }?>
            </div>
        </td>
    </tr>
    <tr>
    	<td><label for="contact_inquiry" id="err_contact_inquiry">Thank You Message for Download  :</label> <span class="error">*</span></td>
	    <td><textarea name="video_desc" title="Thank You Message for Download" class="R" id="video_desc" rows="5" cols="130"><?php echo $_POST['video_desc'];?></textarea></td>
    </tr>	
    <tr>
        <td colspan="5">
        	<?php if($_REQUEST['action']=="edit"){?>
            <input type="hidden" name="vtitle" value="<?php echo $data[0]['video_page'];?>" />
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
    	<th width="35%">Video Link</th>
        <th width="20%">Form Title</th>
       	<th width="10%">Download File</th>
        <th width="15%">Download File Message</th>
	    <th width="5%">Action</th>
    </tr> 
    <?php  
        $keyword = $fn->ReplaceSql($_REQUEST['keyword']);
        $alpha = $fn->ReplaceSql($_REQUEST['alpha']);
        $where = '';
        if($alpha!=''){$where .= " and (video_title like '".$alpha."%')";}
		if($keyword!=''){$where .= " and (video_title like '".$keyword."%' or video_title like '% ".$keyword."%')";}
    	$query="select * from videos where video_page='".$fn->ReplaceSql($_GET['for'])."' $where order by video_title";
		if($data = $fn->SelectQuery($query)){foreach ($data as $row){ ?>
    <tr>
    	
    	<td><?php echo $row['video_link'];?></td>
        <td><?php echo $row['video_title'];?></td>
       <td>
		<?php $ext=strstr($row['file'],".");
        $ext=substr($ext,1,strlen($ext));
        if($ext=="pdf"){ ?>
        <a href="<?php echo WEBSITE_URL?>/videos/<?php echo $row['file'];?>" class="prettybox icon-ext_<?php echo $ext;?>"></a>
        <?php } if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){ ?>
        <a href="<?php echo WEBSITE_URL?>/videos/<?php echo $row['file'];?>" class="prettybox icon-ext_<?php echo $ext;?>"></a>
        <?php } ?> 
      </td>
      <td><?php echo $row['video_desc'];?></td>
    	<td>
        	<a class="edit" href="?for=<?php echo $row['video_page']?>&action=edit&vtitle=<?php echo $row['video_page'];?>"></a>
        </td>
    </tr>
	    <?php } } ?>
    </table>
<?php }?>
  
<?php include_once("footer.php");?>
</body>
</html>