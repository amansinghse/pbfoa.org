<?php
session_start();

//This is configuration file for Xrchive Administration Panel

$admin_title="Cx.CMS :: PBFO Administration Panel";
$xsuite_title="PBFO";
$admin_web_path="http://pbfoa.org/admin/";
$admin_FS_path="http://pbfoa.org/admin/";
$admin_host_os="windows";
$xsuite_http_site="http://pbfoa.org/";
$xsuite_FS_site="http://pbfoa.org/";




$admin_db_name="1007558_pbfoa";
$admin_db_host="mariadb-133.wc2.dfw3.stabletransit.com";
$admin_db_user="1007558_pbfoa";
$admin_db_pass="pbFoa@pixector9333";
$admin_db_port="";

$admin_debug="false";

$dbConnect = mysql_connect($admin_db_host,$admin_db_user,$admin_db_pass);
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
?>