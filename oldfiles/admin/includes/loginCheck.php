<?php
if(isset($_REQUEST["login"]))
{
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$q="SELECT * from `admin_users` WHERE `adminUserName`='$username' and `adminUserPass`='$password';";
$qr=mysql_query($q);
$qnr=mysql_num_rows($qr);
if($qnr==1)
{
$qrow=mysql_fetch_array($qr,MYSQL_ASSOC);
$_SESSION["xsuite_admin"]="active";
$_SESSION["xsuite_admin_id"]=$qrow["adminUserID"];
$_SESSION["xsuite_admin_name"]=$qrow["adminUserName"];
$_SESSION["xsuite_admin_email"]=$qrow["adminUserEmail"];
$_SESSION["xsuite_admin_level"]=$qrow["adminUserLevel"];

}
else
{
//login failed
$_SESSION["xsuite_admin"]="inactive";
$_SESSION["xsuite_admin_id"]=0;
$_SESSION["xsuite_admin_name"]="";
$_SESSION["xsuite_admin_email"]="";
$_SESSION["xsuite_admin_level"]="";
?>
<script>
location.href="index.php?note=Invalid Username or Password, Try Again!";
</script>
<?php
}
}
else if(isset($_REQUEST["logout"]))
{

$_SESSION["xsuite_admin"]="inactive";
$_SESSION["xsuite_admin_id"]=0;
$_SESSION["xsuite_admin_name"]="";
$_SESSION["xsuite_admin_email"]="";
$_SESSION["xsuite_admin_level"]="";

}


if(isset($_SESSION["xsuite_admin"]) && $_SESSION["xsuite_admin_name"]!="")
{
if($scriptName!="admin.php")
{
?>
<script>
location.href="admin.php";
</script>
<?php
}
}
else
{
if($scriptName!="index.php")
{
?>
<script>
location.href="index.php";
</script>
<?php
}
}
?>