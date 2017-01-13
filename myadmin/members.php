<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
if($_REQUEST['action']=="delete"){
	$query="delete from  home_member where id='".$_REQUEST['id']."'";
	$obj->UpdateQuery($query);
	$img=$obj->GetValue("home_member","image","id='".$_REQUEST['id']."'");
	$obj->DeleteImage("home_member",$img,true);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Member has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdelete"){	
	$query="update home_member set image='' where id='".$_REQUEST['id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Member image has been deleted successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnupdate'])){
	$query="update home_member set title='".$obj->ReplaceSql($_POST['title'])."',des='".$obj->ReplaceSql($_POST['des'])."',image_title='".$obj->ReplaceSql($_POST['image_title'])."',image_alt='".$obj->ReplaceSql($_POST['image_alt'])."',date='".date("Y-m-d")."' where id='".$obj->ReplaceSql($_POST['id'])."'";
	$obj->UpdateQuery($query);
	if($_FILES['image']['name']!=''){
		$photo = array("name"=>$_FILES['image']['name'],"tmp_name"=>$_FILES['image']['tmp_name']);
		$obj->FixedUploadImage($photo,"home_member","image","id",$_POST['id'],92,85,0,0,false);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Member has been updated successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnsave'])){
	$maxno = $obj->SelectQuery("select max(orderid) as maxi from home_member");
	$maxno = $maxno[0]['maxi'] + 1;
	$query="insert into home_member set title='".$obj->ReplaceSql($_POST['title'])."',des='".$obj->ReplaceSql($_POST['des'])."',image_title='".$obj->ReplaceSql($_POST['image_title'])."',image_alt='".$obj->ReplaceSql($_POST['image_alt'])."',date='".date("Y-m-d")."',orderid='".$maxno."'";
	$id=$obj->InsertQuery($query);
	if($_FILES['image']['name']!=''){
		$photo = array("name"=>$_FILES['image']['name'],"tmp_name"=>$_FILES['image']['tmp_name']);
		$obj->FixedUploadImage($photo,"home_member","image","id",$id,92,85,0,0,false);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Member has been added successfully!";
	$obj->ReturnReferer();
}

if($_REQUEST['action']=='publish')
{
$upd=$_REQUEST['value'];
$query= "UPDATE `home_member` SET active='".$upd."' WHERE id='".$_REQUEST['id']."'";
$obj->UpdateQuery($query);
$obj->ReturnReferer();
} 


if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update home_member set orderid = ".($index + 1)." where id = ".$id);
		}
	}
	if($_POST['byajax']) { die(); } else { $message = 'Sortation has been saved.'; }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php");?>
<style type="text/css">
.clear {
	clear:both;
	width:100%;
	float:left;
}
#sortable-list {
	padding:0;
	margin:0px;
	width:100%;
}
#sortable-list li {
	padding:10px;
	color:#000;
	cursor:move;
	list-style:none;
	float:left;
	background:#ddd;
	margin:5px;
	border:1px solid #999;
	font-size:14px;
}
#message-box {
	background:#fffea1;
	border:2px solid #fc0;
	padding:4px 8px;
	margin:0 0 14px 0;
	width:500px;
}
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
<div class="full">
  <h1>Manage Home Members
    <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?>
    <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?>
    <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?>
  </h1>
</div>
<ul class="tabs">
  <li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>List of Members</a></li>
  <li><a href="?action=import"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Import Members</a></li>
  <li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
  
</ul>
<?php 
    if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
		$_POST['member_purity'] = 'Available Upon Request';
    if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
        $query = "select * from home_member where id='".$_REQUEST['id']."'";
        $data = $obj->SelectQuery($query); 
    }?>
<script type="text/javascript" src="js/nicEdit.js"></script> 
<script type="text/javascript">

	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('des',{hasPanel : true});

});

</script>

 <script type="text/javascript" src="js/jscolor.js"></script>
 
<form method="post" enctype="multipart/form-data" name="members" id="members" onsubmit="return validate(document.forms['members'])" >
  <table width="100%" cellspacing="1" cellpadding="10" class="tbl" id="tbl">
    <tr>
      <th colspan="2">Create Home Members</th>
    </tr>
    <tr>
      <td width="20%"><label id="err_title">Title : </label><span class="error">*</span></td>
      <td><input type="text" title="Title" class="R"  name="title" id="title" value="<?php echo (isset($data[0])) ? $data[0]['title'] : $_POST['title'] ;?>" size="50"/></td>
    </tr>
     <tr>
      <td width="20%"><label id="err_des"> Description : </label><span class="error">*</span></td>
      <td> <textarea title="Description" rows="4" cols="80" name="des" id="des" ><?php echo (isset($data[0])) ? $data[0]['des'] : $_POST['des'] ;?></textarea></td>
    </tr>
	
	 <tr>
        <td width="25%"><label for="image" id="err_image">Image : (Large image Width x Height 92 x 85)</label></td>
        <td><input type="file" name="image" id="image" title="Image"/>
            <?php if($data[0]['image']!=''){?>
            <br /><br /><img src="../images/home_member/<?php echo $data[0]['image'];?>" />
            <?php }?>
        </td>
    </tr>
    <tr>
      <td width="20%"><label id="err_image_title">Image Title : </label><span class="error">*</span></td>
      <td><input type="text" title="Image Title" class="R"  name="image_title" id="image_title" value="<?php echo (isset($data[0])) ? $data[0]['image_title'] : $_POST['image_title'] ;?>" size="50"/></td>
    </tr>
    <tr>
      <td width="20%"><label id="err_image_alt">Image Alt : </label><span class="error">*</span></td>
      <td><input type="text" title="Image Alt" class="R"  name="image_alt" id="image_alt" value="<?php echo (isset($data[0])) ? $data[0]['image_alt'] : $_POST['image_alt'] ;?>" size="50"/></td>
    </tr>
	
  </table>
   <table width="100%" cellspacing="1" cellpadding="11" class="tbl">
   <tr>
      <td width="25%">&nbsp;</td>
      <td class="txtcenter"><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="button" />
        <?php }else{?>
        <input type="submit" name="btnsave" value="Save" class="button" />
        <?php }?>
        <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
</form>
<?php }elseif($_REQUEST['action']=="display"){
		$query = "select * from home_member order by orderid asc";
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
			echo '<li title="'.$item['id'].'">'.$item['title'].'</li>';
			$order[] = $item['id'];
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
    <th colspan="8"> <form>
        keywords:
        <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
        <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
        <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
      </form>
    </th>
  </tr>
  <tr>
    <td colspan="8" class="paging"><?php for($i=65;$i<=90;$i++){ 
        if($_REQUEST['alpha']==chr($i)){?>
      <?php echo "<b>" . chr($i) ."</b>"?>
      <?php } else { ?>
      <a href="?category_id=<?php echo $_GET['category_id']; ?>&alpha=<?php echo chr($i)?>" title="[<?php echo chr($i)?>]"><?php echo chr($i)?></a>
      <?php }}?></td>
  </tr>
  <?php 
        $keyword = $obj->ReplaceSql($_REQUEST['keyword']);
        $alpha = $obj->ReplaceSql($_REQUEST['alpha']);
		$category_id = $obj->ReplaceSql($_REQUEST['category_id']);
        $where = '';
		if($category_id!=''){$where .= " and (category_id='".$category_id."' or category_id like '".$category_id.",%' or category_id like '%,".$category_id.",%' or category_id like '%,".$category_id."')";}
        if($alpha!=''){$where .= " and (title like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (title like '".$keyword."%' or title like '% ".$keyword."%')";}
        $query="select * from home_member where 1=1  $where order by id asc";
        $pager = new Pagination($query,$_REQUEST['page'],20,5);
        if($data = $pager->Paging()){$k = $pager->GetSNo();?>
  <tr>
    <th width="10%">Sr. No</th>
    <th width="10%">Member Title</th>
    <th width="40%">Member Description</th>
	<th width="30%">Member Image</th>
    <th width="10%">Action</th>
  </tr>
  <?php foreach ($data as $row){?>
  <tr>
    <td><?php echo $k++;?></td>
    <td><?php echo $row['title'];?></td>
    <td><div class="content"><?php echo $row['des'];?></div></td>
	<td><?php if($row['image']!='') { ?>
	<img src="../images/home_member/<?php echo $row['image'];?>"/>
	<?php } else { ?>
	No Image
	<?php } ?>
	
	</td>
    <td><a href="?action=edit&id=<?php echo $row['id'] ?>" class="edit" title="Edit"></a> <a href="?action=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="8" class="paging"><?php echo $pager->DisplayAllPaging();?></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="8" class="txtcenter">No Home Member Found!</td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>