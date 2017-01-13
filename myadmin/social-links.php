<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
if(isset($_POST['btnupdate'])){	
	$query="update social_links set 
				facebook_link='".$obj->ReplaceSql($_POST['facebook_link'])."', 
				twitter_link='".$obj->ReplaceSql($_POST['twitter_link'])."',
				vimeo_link='".$obj->ReplaceSql($_POST['vimeo_link'])."', 
				linkedin_link='".$obj->ReplaceSql($_POST['linkedin_link'])."',
				myspace_link='".$obj->ReplaceSql($_POST['myspace_link'])."',
				youtube_link='".$obj->ReplaceSql($_POST['youtube_link'])."',
				google_link='".$obj->ReplaceSql($_POST['google_link'])."'
				 where social_link_id='".$obj->ReplaceSql($_POST['social_link_id'])."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Social media has been updated successfully!";
	$obj->ReturnReferer();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<title>Admin Panel</title>
<?php include_once("inc.head.php"); ?>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
		new nicEditor().panelInstance('social_desc');
	});
</script>
</head>
<body>
<div class="full">
  <h1>Manage Social Media
    <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?>
    <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?>
    <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?>
  </h1>
</div>
<?php require_once("message.php");?>
<?php if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
		if($_REQUEST['action']=="edit" && isset($_REQUEST['social_link_id'])){
			$query = "select * from social_links where social_link_id='".$_REQUEST['social_link_id']."'";
			$data = $obj->SelectQuery($query);
		}?>
<form method="post" enctype="multipart/form-data" name="brandform" id="brandform" onsubmit="return validate(document.forms['brandform']);">
  <table width="100%" cellspacing="1" cellpadding="3" class="tbl">
    <tr>
      <th colspan="2"><?php echo (isset($data)) ? "Edit" : "Add" ;?> Social Media</th>
    </tr>
    <tr>
      <td width="250px"><label id="err_facebook_link" for="facebook_link">Facebook URL : </label>
        </td>
      <td><input type="text" size="30" title="Facebook URL"  name="facebook_link" id="facebook_link" value="<?php echo (isset($data)) ? $data[0]['facebook_link'] : '' ;?>"/>
        (http://www.facebook.com/brandlabsmedia) </td>
    </tr>
    <tr>
      <td width="250px"><label id="err_twitter_link" for="twitter_link">Twitter URL : </label>
        </td>
      <td><input type="text" size="30" title="Twitter URL"  name="twitter_link" id="twitter_link" value="<?php echo (isset($data)) ? $data[0]['twitter_link'] : '' ;?>"/>
        (http://www.twitter.com/brandlabsmedia) </td>
    </tr>
    <tr>
      <td width="250px"><label id="err_vimeo_link" for="vimeo_link">Vimeo URL : </label>
        </td>
      <td><input type="text" size="30" title="Vimeo URL" name="vimeo_link" id="vimeo_link" value="<?php echo (isset($data)) ? $data[0]['vimeo_link'] : '' ;?>"/>
        (http://www.vimeo.com/brandlabsmedia) </td>
    </tr>
    
    <tr>
      <td width="250px"><label id="err_linkedin_link" for="linkedin_link">Linkedin URL : </label>
        </td>
      <td><input type="text" size="30" title="Linkedin URL"  name="linkedin_link" id="linkedin_link" value="<?php echo (isset($data)) ? $data[0]['linkedin_link'] : '' ;?>"/>
        (http://www.linkedin.com/brandlabsmedia) </td>
    </tr>
    <tr>
      <td width="250px"><label id="err_myspace_link" for="myspace_link">Pinterest URL : </label>
        </td>
      <td><input type="text" size="30" title="Pinterest URL"  name="myspace_link" id="myspace_link" value="<?php echo (isset($data)) ? $data[0]['myspace_link'] : '' ;?>"/>
        (http://www.pinterest.com/brandlabsmedia) </td>
    </tr>
    <tr>
      <td width="250px"><label id="err_youtube_link" for="youtube_link">Youtube URL : </label>
        </td>
      <td><input type="text" size="30" title="Youtube URL"  name="youtube_link" id="youtube_link" value="<?php echo (isset($data)) ? $data[0]['youtube_link'] : '' ;?>"/>
        (http://www.youtube.com/brandlabsmedia) </td>
    </tr>
    <tr>
      <td width="250px"><label id="err_google_link" for="google_link">Google+ URL : </label>
        </td>
      <td><input type="text" size="30" title="Google+ URL"  name="google_link" id="google_link" value="<?php echo (isset($data)) ? $data[0]['google_link'] : '' ;?>"/>
        (http://www.google.com/brandlabsmedia) </td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="social_link_id" value="<?php echo $_REQUEST['social_link_id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="button" />
        <?php }else{?>
        <input type="submit" name="btnsave" value="Add" class="button" />
        <?php }?>
        <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
</form>
<?php }else{ $obj->SetCurrentUrl();	?>
<table width="100%" cellspacing="1" cellpadding="3" class="tbl">
  <tr>
    <th width="14%">Facebook</th>
    <th width="14%">Twitter</th>
    <th width="14%">Vimeo</th>
    <th width="14%">Linkedin</th>
    <th width="14%">Pinterest</th>
    <th width="14%">Youtube</th>
    <th width="12%">Google+</th>
    <th width="4%">Action</th>
  </tr>
  <?php 
    	$query="select * from social_links";
		if($data = $obj->SelectQuery($query)){
		foreach ($data as $row){ ?>
  <tr>
    <td><?php echo $row['facebook_link'];?></td>
    <td><?php echo $row['twitter_link'];?></td>
    <td><?php echo $row['vimeo_link'];?></td>
    
    <td><?php echo $row['linkedin_link'];?></td>
    <td><?php echo $row['myspace_link'];?></td>
    <td><?php echo $row['youtube_link'];?></td>
    <td><?php echo $row['google_link'];?></td>
    
    <td><a class="edit" href="?action=edit&social_link_id=<?php echo $row['social_link_id'];?>"></a></td>
  </tr>
  <?php } ?>
  <?php } else { ?>
  <tr>
    <td colspan="5" class="error">No Social Media Found!</td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>