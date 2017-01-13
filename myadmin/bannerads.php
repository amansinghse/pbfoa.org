<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
if($_REQUEST['action']=="delete"){
	$query="delete from bannerads where advertisement_id='".$_REQUEST['advertisement_id']."'";
	$obj->UpdateQuery($query);
	$img=$obj->GetValue("bannerads","advertisement_img_one","advertisement_id='".$_REQUEST['advertisement_id']."'");
	$obj->DeleteImage("bannerads",$img,false);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Advertisements has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdelete"){	
	$query="update bannerads set advertisement_img_one='' where advertisement_id='".$_REQUEST['advertisement_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Advertisements image has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdeletesecond"){	
	$query="update bannerads set advertisement_img_second='' where advertisement_id='".$_REQUEST['advertisement_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Advertisements image has been deleted successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnupdate'])){
	$query="update bannerads set advertisement_title='".$obj->ReplaceSql($_POST['advertisement_title'])."',advertisement_caption='".$obj->ReplaceSql($_POST['advertisement_caption'])."',advertisement_url_one='".$obj->ReplaceSql($_POST['advertisement_url_one'])."' where advertisement_id='".$obj->ReplaceSql($_POST['advertisement_id'])."'";
	$obj->UpdateQuery($query);
	if($_FILES['advertisement_img_one']['name']!=''){
		$photo = array("name"=>$_FILES['advertisement_img_one']['name'],"tmp_name"=>$_FILES['advertisement_img_one']['tmp_name']);
		$obj->FixedUploadImage($photo,"bannerads","advertisement_img_one","advertisement_id",$_POST['advertisement_id'],287,155,0,0,false);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Advertisements has been updated successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnsave'])){
	$query="insert into bannerads set advertisement_title='".$obj->ReplaceSql($_POST['advertisement_title'])."',advertisement_caption='".$obj->ReplaceSql($_POST['advertisement_caption'])."',advertisement_url_one='".$obj->ReplaceSql($_POST['advertisement_url_one'])."'";
	$advertisement_id=$obj->InsertQuery($query);
	if($_FILES['advertisement_img_one']['name']!=''){
		$photo = array("name"=>$_FILES['advertisement_img_one']['name'],"tmp_name"=>$_FILES['advertisement_img_one']['tmp_name']);
		$obj->FixedUploadImage($photo,"bannerads","advertisement_img_one","advertisement_id",$advertisement_id,287,155,0,0,false);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Advertisements has been added successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update bannerads set orderid = ".($index + 1)." where advertisement_id = ".$id);
		}
	}
	if($_POST['byajax']) { die(); } else { $message = 'Sortation has been saved.'; }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php");?>
<script type="text/javascript" src="js/jacs.js"></script>
<style type="text/css">
.clear{ clear:both; width:100%; float:left;}
#sortable-list	{ padding:0; margin:0px; width:100%;}
#sortable-list li{ padding:10px; color:#000; cursor:move; list-style:none; float:left; background:#ddd; margin:5px; border:1px solid #999; font-size:14px;}
#message-box{ background:#fffea1; border:2px solid #fc0; padding:4px 8px; margin:0 0 14px 0; width:500px; }
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		/* grab important elements */
		var sortInput = jQuery('#sort_order');
		var submit = jQuery('#autoSubmit');
		var messageBox = jQuery('#message-box');
		var list = jQuery('#sortable-list');
		/* create requesting function to avoid duplicate code */
		var request = function() {
			jQuery.ajax({
				beforeSend: function() {
					messageBox.text('Updating the sort order in the database.');
				},
				complete: function() {
					messageBox.text('Database has been updated.');
				},
				data: 'sort_order=' + sortInput[0].value + '&ajax=' + submit[0].checked + '&do_submit=1&byajax=1', //need [0]?
				type: 'post',
				url: '<?php echo $_SERVER["REQUEST_URI"]; ?>'
			});
		};
		/* worker function */
		var fnSubmit = function(save) {
			var sortOrder = [];
			list.children('li').each(function(){
				sortOrder.push(jQuery(this).data('id'));
			});
			sortInput.val(sortOrder.join(','));
			if(save) {
				request();
			}
		};
		/* store values */
		list.children('li').each(function() {
			var li = jQuery(this);
			li.data('id',li.attr('title')).attr('title','');
		});
		/* sortables */
		list.sortable({
			opacity: 0.7,
			update: function() {
				fnSubmit(submit[0].checked);
			}
		});
		list.disableSelection();
		/* ajax form submission */
		jQuery('#dd-form').bind('submit',function(e) {
			if(e) e.preventDefault();
			fnSubmit(true);
		});
	});
</script>
</head>
<body>
<?php require_once("message.php");?>
<div class="full"><h1>Advertisements <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1></div>
<ul class="tabs">
    <li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
    <li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>Advertisements List</a></li>
</ul>
<?php if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
		if($_REQUEST['action']=="edit" && isset($_REQUEST['advertisement_id'])){
			$query = "select * from bannerads where advertisement_id='".$_REQUEST['advertisement_id']."'";
			$data = $obj->SelectQuery($query); 
		}?>
<form method="post" enctype="multipart/form-data" name="advform" id="advform" onsubmit="return validate(document.forms['advform']);">
    <table width="100%" cellspacing="1" cellpadding="3" class="tbl">
    <tr>
        <td width="350px;"><label for="advertisement_img_one" id="err_advertisement_img_one">Image : (Large image Width x Height 287 x 155)</label></td>
        <td><input type="file" name="advertisement_img_one" id="advertisement_img_one" title="Image"/>
            <?php if($data[0]['advertisement_img_one']!=''){?>
            <br /><br /><img src="../images/bannerads/<?php echo $data[0]['advertisement_img_one'];?>" />
            <?php }?>
        </td>
    </tr>
    <tr>
        <td width="350px;"><label id="err_advertisement_url_one">URL : </label></td>
        <td><input type="text" size="30" title="URL" class="isURL" name="advertisement_url_one" id="advertisement_url_one" value="<?php echo (isset($data)) ? $data[0]['advertisement_url_one'] : '' ;?>"/> http://www.example.com
        </td>
    </tr>
        <tr>
        <td>&nbsp;</td>
        <td>
            <?php if($_REQUEST['action']=="edit"){?>
            <input type="hidden" name="advertisement_id" value="<?php echo $_REQUEST['advertisement_id']?>" />
            <input type="submit" name="btnupdate" value="Update" class="button" />
            <?php }else{?>
            <input type="submit" name="btnsave" value="Add" class="button" />
            <?php }?>
            <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
        </td>
    </tr>
    </table>
</form>
<?php }elseif($_REQUEST['action']=="display"){
		$query = "select * from bannerads order by orderid asc";
		$result = $obj->SelectQuery($query);
	?>
<script type="text/javascript">
(function(){
  var bsa = document.createElement('script');
     bsa.type = 'text/javascript';
     bsa.async = true;
     bsa.src = '//s3.buysellads.com/ac/bsa.js';
  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();
</script>
<table width="100%" cellspacing="1" cellpadding="3" class="tbl">
	<tr>
    	<th>Display Order</th>
    </tr>
    <tr>
    	<td>
<?php if($result){?>
	<div id="content-left">
	<br /><div id="message-box"> <?php echo $message; ?> Waiting for sortation submission...</div>
	<form id="dd-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<p>
    	<input type="checkbox" value="1" name="autoSubmit" id="autoSubmit" <?php if($_POST['autoSubmit']) { echo 'checked="checked"'; } ?> />
    	<label for="autoSubmit">Automatically submit on drop event</label><br />
	</p>
	<ul id="sortable-list">
	<?php $order = array();
		foreach($result as $item) {
			echo '<li title="'.$item['advertisement_id'].'">'?>
			<img src="../bannerads/<?php echo $item['advertisement_img_one'];?>" height="100" width="100"/>
		<?php '</li>'; $order[] = $item['advertisement_id'];
		}?>	
    </ul>
	<input type="hidden" name="sort_order" id="sort_order" value="<?php echo implode(',',$order); ?>" />
    <div class="clear">
	<input type="submit" name="do_submit" value="Submit Sortation" class="button" />
    </div>
	</form>
	</div>
	<?php }?>
    	</td>
   	</tr>
</table>

<?php }else{$obj->SetCurrentUrl();?>
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
    <tr>
        <th colspan="9">
        <form> 
			keywords: 
            <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
            <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
            <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
		 </form>
        </th>
    </tr>
    <tr>
        <td colspan="9" class="paging">
        <?php for($i=65;$i<=90;$i++){ 
        if($_REQUEST['alpha']==chr($i)){?>
        <?php echo "<b>" . chr($i) ."</b>"?>
        <?php } else { ?>	
        <a href="?alpha=<?php echo chr($i)?>" title="[<?php echo chr($i)?>]"><?php echo chr($i)?></a>
        <?php }}?>
        </td>
	</tr>      
    <?php 
        $keyword = $obj->ReplaceSql($_REQUEST['keyword']);
        $alpha = $obj->ReplaceSql($_REQUEST['alpha']);
        $where = '';
        if($alpha!=''){$where .= " and (advertisement_title like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (advertisement_title like '".$keyword."%' or advertisement_title like '% ".$keyword."%')";}
        $query="select * from bannerads where 1=1 $where order by orderid";
        $pager = new Pagination($query,$_REQUEST['page'],20,5);
        if($data = $pager->Paging()){ $i = $pager->GetSNo();?>
	<tr>
    	<th width="5%">Sr. No.</th>
        <th width="10%">Image </th>
        <th width="15%">URL</th>
        <th width="10%">Edit / Delete</th>
    </tr>
    <?php foreach ($data as $row){?>
        <tr>
            <td><?php echo $i++;?></td>
            <td><img src="../images/bannerads/<?php echo $row['advertisement_img_one'];?>" height="100" width="100"/>
            	<?php if($row['advertisement_img_one']!=""){?><br /><br />
     			   <a href="?action=imgdelete&advertisement_id=<?php echo $row['advertisement_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>	<?php } ?>
            </td>
            <td><?php echo $row['advertisement_url_one'];?></td>
            <td>
                <a href="?action=edit&advertisement_id=<?php echo $row['advertisement_id'] ?>" class="edit" title="Edit"></a>
                <a href="?action=delete&advertisement_id=<?php echo $row['advertisement_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>
            </td>            
        </tr>
     <?php } ?>
	<tr><td colspan="9" class="paging"><?php echo $pager->DisplayAllPaging("keyword=".$_GET['keyword']."&alpha=".$_GET['alpha']);?></td></tr>
    <?php } else { ?>
    <tr><td colspan="9" class="txtcenter">No Advertisements Found!</td></tr>
    <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>