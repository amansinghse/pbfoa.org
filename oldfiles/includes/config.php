<?php

//This is configuration file for Xrchive Administration Panel

$admin_title="Cx.CMS :: PBFOA Administration Panel";
$xsuite_title="PBFOA";
$admin_web_path="/admin/";
$admin_FS_path="/admin/";
$admin_host_os="windows";
$xsuite_http_site="/";
$xsuite_FS_site="/admin/";



$admin_db_name="1007558_japfoa2";
$admin_db_host="mariadb-127.wc2.dfw3.stabletransit.com";
$admin_db_user="1007558_japfoa2";
$admin_db_pass="pbFoa@pixector9333";
$admin_db_port="";

$admin_debug="false";

$dbConnect = mysql_connect($admin_db_host,$admin_db_user,$admin_db_pass,true);
if($dbConnect)
{

$dbSelect = mysql_select_db($admin_db_name,$dbConnect);
if(!$dbSelect)
{
?>
<script>
//location.href="index.php?note=DataBase Not Found";
</script>
<?php
}

}
else
{
?>
<script>
//location.href="index.php?note=DataBase Connection Failed";
</script>
<?php
}

$con=mysqli_connect($admin_db_host,$admin_db_user,$admin_db_pass,"1007558_japfoa2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>