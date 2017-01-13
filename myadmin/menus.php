<?php
ob_start();
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
$_SESSION['IMG_LARGE']['W'] = 642;
$_SESSION['IMG_LARGE']['H'] = 216;
$_SESSION['IMG_THUMB']['W'] = 540;
$_SESSION['IMG_THUMB']['H'] = 230;
$_SESSION['IMG_THUMB_SMALL']['W'] = 425;
$_SESSION['IMG_THUMB_SMALL']['H'] = 185;
if($_REQUEST['action']=="delete"){
		$query="delete from menus where menu_id='".$_REQUEST['menu_id']."'";
		$obj->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Menu has been deleted successfully!";
		$obj->ReturnReferer();
		exit();
}
if(isset($_POST['btnupdate'])){
	function create_slug($string){
	   $menu_slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	   $menu_slug=strtolower($menu_slug);
	   return $menu_slug;
	}
	$query="update menus set menu_title='".$obj->ReplaceSql($_POST['menu_title'])."', menu_slug='".create_slug($_POST['menu_title'])."', parent='".$obj->ReplaceSql($_POST['parent'])."' where menu_id='".$obj->ReplaceSql($_POST['menu_id'])."'";
	$obj->UpdateQuery($query);

	
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Menu has been updated successfully!";
	$obj->ReturnReferer();
	
}
if(isset($_POST['btnsave'])){

	function create_slug($string){
	   $menu_slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	   $menu_slug=strtolower($menu_slug);
	   return $menu_slug;
	}
$query="insert into menus set menu_title='".$obj->ReplaceSql($_POST['menu_title'])."', menu_slug='".create_slug($_POST['menu_title'])."', parent='".$obj->ReplaceSql($_POST['parent'])."'";
	$id=$obj->InsertQuery($query);
	
	$obj->UpdateQuery("update menus set orderid = ".$id." where menu_id = ".$id);
	
	
	
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Menu has been added successfully!";
	$obj->ReturnReferer();
	
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update menus set orderid = ".($index + 1)." where menu_id = ".$id);
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
  <h1>Manage Menus
    <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?>
    <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?>
    <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?>
  </h1>
</div>
<ul class="tabs">
<li><a href="?action=display"<?php echo $_GET['action']=='display' ? ' class="current"': '';?>>Display Order</a></li>
  <li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>List of Menus</a></li>
  <li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
</ul>
<?php 
    if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
		$_POST['menu_purity'] = 'Available Upon Request';
    if($_REQUEST['action']=="edit" && isset($_REQUEST['menu_id'])){
        $query = "select * from menus where menu_id='".$_REQUEST['menu_id']."'";
        $data = $obj->SelectQuery($query); 
    }?>
<script type="text/javascript" src="js/nicEdit.js"></script> 
<script type="text/javascript">

	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	
	/*bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('menu_detail',{hasPanel : true});

});*/
</script>

 <script type="text/javascript" src="js/jscolor.js"></script>
 
<form method="post" enctype="multipart/form-data" name="menus" id="menus" onsubmit="return validate(document.forms['menus'])" >
  <table width="100%" cellspacing="1" cellpadding="10" class="tbl" id="tbl">
    <tr>
      <th colspan="2">Create Menus</th>
    </tr>
    <tr>
    	<td width="20%"> <label id="err_menu_title"> Parent Menu</label></td>
        <td>
		<select name="parent" style="width:150px;">
		 <option value="0" >-Select Parent Menu-</option>
         <?php $category_cmb = $obj->SelectQuery("select * from menus where parent=0 order by orderid ASC"); ?><?php foreach ($category_cmb as $category) { ?><option <?php echo ($data[0]['parent']==$category['menu_title'])?'selected="selected"':'';?> value="<?php echo $category['menu_title']?>"><?php echo ucfirst($category['menu_title']);?></option><?php } ?>
		</select>
        </td>
	</tr>
    <tr>
    	<td width="20%"> <label id="err_menu_title"> Menu Title</label></td>
        <td>
		<select name="menu_title" style="width:150px;">
		 <option value="" >-Select Menu-</option>
         <?php $category_cmb = $obj->SelectQuery("select * from pages order by page_id ASC"); ?><?php foreach ($category_cmb as $category) { ?><option <?php echo ($data[0]['menu_title']==$category['page_title'])?'selected="selected"':'';?> value="<?php echo $category['page_title']?>"><?php echo ucfirst($category['page_title']);?></option><?php } ?>
		</select>
        </td>
	</tr>
  </table>
   <table width="100%" cellspacing="1" cellpadding="11" class="tbl">
   <tr>
      <td width="20%">&nbsp;</td>
      <td class="txtcenter"><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="menu_id" value="<?php echo $_REQUEST['menu_id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="button" />
        <?php }else{?>
        <input type="submit" name="btnsave" value="Save" class="button" />
        <?php }?>
        <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
</form>
<?php }elseif($_REQUEST['action']=="display"){
		$query = "select * from menus order by orderid asc";
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
			echo '<li title="'.$item['menu_id'].'">'.$item['menu_title'].'</li>';
			$order[] = $item['menu_id'];
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
    <th colspan="5"> <form>
        keywords:
        <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
        <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
        <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
      </form>
    </th>
  </tr>
  <tr>
    <td colspan="5" class="paging"><?php for($i=65;$i<=90;$i++){ 
        if($_REQUEST['alpha']==chr($i)){?>
      <?php echo "<b>" . chr($i) ."</b>"?>
      <?php } else { ?>
      <a href="?alpha=<?php echo chr($i)?>" title="[<?php echo chr($i)?>]"><?php echo chr($i)?></a>
      <?php }}?></td>
  </tr>
  <?php 
        $keyword = $obj->ReplaceSql($_REQUEST['keyword']);
        $alpha = $obj->ReplaceSql($_REQUEST['alpha']);
		$menu_id = $obj->ReplaceSql($_REQUEST['menu_id']);
        $where = '';
		if($menu_id!=''){$where .= " and (menu_id='".$menu_id."' or menu_id like '".$menu_id.",%' or menu_id like '%,".$menu_id.",%' or menu_id like '%,".$menu_id."')";}
        if($alpha!=''){$where .= " and (menu_detail like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (menu_detail like '".$keyword."%' or menu_detail like '% ".$keyword."%')";}
        $query="select * from menus where 1=1  $where order by orderid asc";
        $pager = new Pagination($query,$_REQUEST['page'],20,5);
        if($data = $pager->Paging()){$k = $pager->GetSNo();?>
  <tr>
    <th width="20%">Sr. No</th>
    <th width="20%">Parent Menu</th>
    <th width="20%">Menu Title</th>
    <th width="20%">Action</th>
  </tr>
  <?php foreach ($data as $row){?>
  <tr>
    <td><?php echo $k++;?></td>
    <td><?php echo $row['parent'];?></td>
    <td><?php echo $row['menu_title'];?></td>
    <td><a href="?action=edit&menu_id=<?php echo $row['menu_id'] ?>" class="edit" title="Edit"></a> <a href="?action=delete&menu_id=<?php echo $row['menu_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="5" class="paging"><?php echo $pager->DisplayAllPaging();?></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="5" class="txtcenter">No Menu Found!</td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>