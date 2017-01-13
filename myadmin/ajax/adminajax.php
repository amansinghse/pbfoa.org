<?php 
require_once("../../class/class.admin.php");
$fn = new Admin();
$fn->RequireLogin();
if($_POST['type']=='delete-file'){
	if($dt = $fn->SelectQuery("select property_img from ".$_POST['t']." where ".$_POST['f']."='".$_POST['v']."'")){
		@unlink(UPLOAD_PATH_ORG.$_POST['t']."/th_".$dt[0]['property_img']);
		@unlink(UPLOAD_PATH_ORG.$_POST['t']."/".$dt[0]['property_img']);
		$fn->UpdateQuery("update ".$_POST['t']." set property_img='' where ".$_POST['f']."='".$_POST['v']."'");
		echo "File deleted!";
	}else{
		echo "No File found!";
	}
}
?>