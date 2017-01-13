<?php
include "includes/config.php";
if(isset($_REQUEST['gid']))
{
$gid=$_REQUEST['gid'];
}
echo "<?xml version=\"1.0\" ?>\n<document>";
$q="SELECT * FROM `gal_retouch` WHERE 1;";
$qr=mysql_query($q);
while($qrow=mysql_fetch_array($qr,MYSQL_ASSOC))
{
?>

<project before="gallery/retouch/images/<?php echo $qrow['img_before']; ?>" after="gallery/retouch/images/<?php echo $qrow['img_after']; ?>"><![CDATA[<?php echo $qrow['img_caption']; ?>]]></project>

<?php
}
echo "</document>";
?>