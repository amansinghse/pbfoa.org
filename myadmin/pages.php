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
		$query="delete from pages where page_id='".$_REQUEST['page_id']."'";
		$obj->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Page has been deleted successfully!";
		$obj->ReturnReferer();
		exit();
}
if(isset($_POST['btnupdate'])){
function create_slug($string){
	   $page_slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	   $page_slug=strtolower($page_slug);
	   return $page_slug;
	}

	$query="update pages set page_title='".$obj->ReplaceSql($_POST['page_title'])."', page_slug='".create_slug($_POST['page_title'])."',page_detail='".$obj->ReplaceSql($_POST['page_detail'])."',meta_title='".$obj->ReplaceSql($_POST['meta_title'])."',meta_des='".$obj->ReplaceSql($_POST['meta_detail'])."',page_date='".date("Y-m-d")."' where page_id='".$obj->ReplaceSql($_POST['page_id'])."'";
	$obj->UpdateQuery($query);

	
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Page has been updated successfully!";
	$obj->ReturnReferer();
	
}
if(isset($_POST['btnsave'])){
function create_slug($string){
	   $page_slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	   $page_slug=strtolower($page_slug);
	   return $page_slug;
	}
$query="insert into pages set page_title='".$obj->ReplaceSql($_POST['page_title'])."',page_slug='".create_slug($_POST['page_title'])."',page_detail='".$obj->ReplaceSql($_POST['page_detail'])."',meta_title='".$obj->ReplaceSql($_POST['meta_title'])."',meta_des='".$obj->ReplaceSql($_POST['meta_detail'])."',page_date='".date("Y-m-d")."'";
	$id=$obj->InsertQuery($query);
	
	$obj->UpdateQuery("update pages set orderid = ".$id." where page_id = ".$id);
	
	
	
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Page has been added successfully!";
	$obj->ReturnReferer();
	
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update pages set orderid = ".($index + 1)." where page_id = ".$id);
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
<?php require_once("message.php");
?>
<div class="full">
  <h1>Manage Pages
    <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?>
    <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?>
    <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?>
  </h1>
</div>
<ul class="tabs">
<li><a href="?action=display"<?php echo $_GET['action']=='display' ? ' class="current"': '';?>>Display Order</a></li>
  <li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>List of Pages</a></li>
  <li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
</ul>
<?php 
    if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
		$_POST['page_purity'] = 'Available Upon Request';
    if($_REQUEST['action']=="edit" && isset($_REQUEST['page_id'])){
        $query = "select * from pages where page_id='".$_REQUEST['page_id']."'";
        $data = $obj->SelectQuery($query); 
    }?>
<script type="text/javascript" src="js/nicEdit.js"></script> 
<script type="text/javascript">

	/*bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });*/
	
	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('page_detail',{hasPanel : true});

});
	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('meta_detail',{hasPanel : true});

});
</script>

 <script type="text/javascript" src="js/jscolor.js"></script>
 
<form method="post" enctype="multipart/form-data" name="pages" id="pages" onsubmit="return validate(document.forms['pages'])" >
  <table width="100%" cellspacing="1" cellpadding="10" class="tbl" id="tbl">
    <tr>
      <th colspan="2">Create Pages</th>
    </tr>
    
    
	 <tr>
    	<td width="20%"> <label id="err_page_title"> Page Title</label></td>
        <td>
			<input type="text" title="Page Title" class="R"  name="page_title" id="page_title" value="<?php echo (isset($data[0])) ? $data[0]['page_title'] : $_POST['page_title'] ;?>" size="50"/>
        </td>
	</tr>
    <tr>
      <td width="20%"><label id="err_page_title">Page Detail : </label><span class="error">*</span></td>
      <td><textarea title="Page Detail" rows="4" cols="80" name="page_detail" id="page_detail" ><?php echo (isset($data[0])) ? $data[0]['page_detail'] : $_POST['page_detail'] ;?></textarea></td>
    </tr>	

	<tr>
    	<td width="20%"> <label id="err_meta_title"> Meta Title</label></td>
        <td>
			<input type="text" title="Meta Title" class="R"  name="meta_title" id="meta_title" value="<?php echo (isset($data[0])) ? $data[0]['meta_title'] : $_POST['meta_title'] ;?>" size="50"/>
        </td>
	</tr>
    <tr>
      <td width="20%"><label id="err_page_title">Meta Description : </label><span class="error">*</span></td>
      <td><textarea title="Meta Detail" rows="4" cols="80" name="meta_detail" id="meta_detail" ><?php echo (isset($data[0])) ? $data[0]['meta_des'] : $_POST['meta_des'] ;?></textarea></td>
    </tr>
	
  </table>
   <table width="100%" cellspacing="1" cellpadding="11" class="tbl">
   <tr>
      <td width="20%">&nbsp;</td>
      <td class="txtcenter"><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="button" />
        <?php }else{?>
        <input type="submit" name="btnsave" value="Save" class="button" />
        <?php }?>
        <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
</form>
<?php }elseif($_REQUEST['action']=="display"){
		$query = "select * from pages order by orderid asc";
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
			echo '<li title="'.$item['page_id'].'">'.$item['page_detail'].'</li>';
			$order[] = $item['page_id'];
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
        $where = '';
        if($alpha!=''){$where .= " and (page_title like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (page_title like '".$keyword."%' or page_title like '% ".$keyword."%')";}
        $query="select * from pages where 1=1  $where order by orderid asc";
        $pager = new Pagination($query,$_REQUEST['page'],20,5);
        if($data = $pager->Paging()){$k = $pager->GetSNo();?>
  <tr>
    <th width="10%">Sr. No</th>
    <th width="20%">Page Title</th>
    <th width="40%">Page Description</th>
    <th width="15%">Date</th>
	<?php if($_SESSION['ADMIN_NAME'] != 'Editor') { ?>
    <th width="15%">Action</th>
	<?php } ?>
  </tr>
  <?php foreach ($data as $row){?>
  <tr>
    <td><?php echo $k++;?></td>
    <td><?php echo $row['page_title'];?></td>
    <td><div class="content"><?php echo $row['page_detail'];?></div></td>
	<td><?php echo date("M d,Y",strtotime($row['page_date']));?></td>
	<?php if($_SESSION['ADMIN_NAME'] != 'Editor') { ?>
    <td>
		<a href="<?php echo "http://" . $_SERVER['SERVER_NAME']."/".$row['page_slug']; ?>" class="view" title="View" target="blank"></a> 
		<a href="?action=edit&page_id=<?php echo $row['page_id'] ?>" class="edit" title="Edit"></a> 
		<a href="?action=delete&page_id=<?php echo $row['page_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>
	</td>
  </tr>
	<?php } } ?>
  <tr>
    <td colspan="5" class="paging"><?php echo $pager->DisplayAllPaging();?></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="5" class="txtcenter">No Page Found!</td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>