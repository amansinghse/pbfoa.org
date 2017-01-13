<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
if($_REQUEST['action']=="delete"){
	$query="delete from menu_pages where page_id='".$_REQUEST['page_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Page has been deleted successfully!";
	$obj->ReturnReferer();
	exit();
}
if(isset($_POST['btnupdate'])){
	if($obj->PreCategoryValueExists("menu_pages","menu_title",$obj->ReplaceSql($_POST['menu_title']),"page_id",$obj->ReplaceSql($_POST['page_id']),$obj->ReplaceSql($_POST['pre_category_id']))==false){
		$query="update menu_pages set menu_title='".$obj->ReplaceSql($_POST['menu_title'])."', page_title='".$obj->ReplaceSql($_POST['page_title'])."', url='".$obj->ReplaceSql($_POST['url'])."', featured='".$obj->ReplaceSql($_POST['featured'])."', parent='".$obj->ReplaceSql($_POST['parent'])."', pre_category_id='".$obj->ReplaceSql($_POST['pre_category_id'])."', page_desc='".$obj->ReplaceSql($_POST['page_desc'])."' where page_id='".$obj->ReplaceSql($_POST['page_id'])."'";
		$obj->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Page has been updated successfully!";
		$obj->ReturnReferer();
	} else {
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Menu Title Already Exists";
	}
}
if(isset($_POST['btnsave'])){
	if($obj->PreCategoryValueExists("menu_pages","menu_title",$obj->ReplaceSql($_POST['menu_title']),"","",$obj->ReplaceSql($_POST['pre_category_id']))==false){	
		$query="insert into menu_pages set menu_title='".$obj->ReplaceSql($_POST['menu_title'])."', page_title='".$obj->ReplaceSql($_POST['page_title'])."', url='".$obj->ReplaceSql($_POST['url'])."', featured='".$obj->ReplaceSql($_POST['featured'])."', parent='".$obj->ReplaceSql($_POST['parent'])."', pre_category_id='".$obj->ReplaceSql($_POST['pre_category_id'])."', page_desc='".$obj->ReplaceSql($_POST['page_desc'])."'";
		$page_id=$obj->InsertQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Page has been added successfully!";
		$obj->ReturnReferer();
	} else {
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Page Title Already Exists";
	}
}
if(isset($_POST['do_submit']))
{
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) 
	{
		$id = (int) $id;
		if($id != '') 
		{
			$obj->UpdateQuery("update menu_pages set orderid = ".($index + 1)." where page_id = ".$id);
		}
	}
	if($_POST['byajax']) { die(); } else { $message = 'Sortation has been saved.'; }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("inc.head.php");?>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({
		fullPanel : true,
		uploadURI : 'nicUpload.php', 
	}).panelInstance('page_desc',{hasPanel : true});
});
</script>
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
<div class="full"><h1>Manage TOP Section 
<?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1></div>
<ul class="tabs">
    <li><a href="?pre_category_id=<?php echo $_REQUEST['pre_category_id']?>&action=display" <?php echo $_GET['action']=='display' ? ' class="current"': '';?>>Display Order</a></li>
    <li><a href="?pre_category_id=<?php echo $_REQUEST['pre_category_id']?>" <?php echo $_GET['action']!='add' ? ' class="current"': '';?>>List of Pages</a></li>
    <li><a href="?pre_category_id=<?php echo $_REQUEST['pre_category_id']?>&action=add" <?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
</ul>
<?php 
    if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
    if($_REQUEST['action']=="edit" && isset($_REQUEST['page_id'])){
        $query = "select * from menu_pages where page_id='".$_REQUEST['page_id']."' and pre_category_id='".$_REQUEST['pre_category_id']."'";
        $data = $obj->SelectQuery($query); 
		$where =" and page_id!='".$_REQUEST['page_id']."'";
    }?>
<form method="post" enctype="multipart/form-data" name="page" id="page" onsubmit="return validate(document.forms['page']);" >
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
	<tr>
    	<th colspan="2">Create Top menu</th>
	</tr>
   <?php /*?>  <tr>
        <td><label id="err_parent" for="parent">Parent Page : </label><span class="error">*</span></td>
        <td>
            <select id="parent" name="parent" class="R" title="Parent Page">
                <option value="" >-Select Parent Page-</option>
                <option value="0" <?php echo ($data[0]['parent']==0)?'selected="selected"':'';?>>Parent</option>
                <?php 
				echo "select * from menu_pages where pre_category_id='".$_REQUEST['pre_category_id']."' {$where} order by page_title";
				$category_cmb = $obj->SelectQuery("select * from menu_pages where pre_category_id='".$_REQUEST['pre_category_id']."' and parent=0 {$where} order by page_title");?><?php foreach ($category_cmb as $category) { ?><option <?php echo ($data[0]['parent']==$category['page_id'])?'selected="selected"':'';?> value="<?php echo $category['page_id']?>"><?php echo ucfirst($category['menu_title']);?></option><?php } ?>
            </select> 
        </td>
    </tr><?php */?>
    <tr>
    	<td width="25%"><label id="err_menu_title">Menu Title : </label> <span class="error">*</span></td>
        <td><input type="text" title="Menu Title" class="R"  name="menu_title" id="menu_title" value="<?php echo (isset($data[0])) ? $data[0]['menu_title'] : $_POST['menu_title'];?>" size="40"/> e.g. (It should be unique, otherwise system will give an error.)
        </td>
	</tr>
     <tr>
      <td width="25%"><label id="err_url" for="url">URL: </label><span class="error">*</span></td>
      <td><input type="text" size="30" title="URL" name="url" id="url" class="RisURL" value="<?php echo (isset($data)) ? $data[0]['url'] : '' ;?>"/>
       e.g. ( http://www.example.com ) </td>
    </tr>
      <tr>
            <td width="20%"><label id="err_featured" for="featured">Onclick open in : </label><span class="error">*</span></td>
            <td>
                <select id="featured1" name="featured" class="R" title="Onclick open in">
                    <option value="">Select  Onclick open in </option>
                   <option <?php echo ($data[0]['featured']=='N')?'selected="selected"':'';?> value="N">New Tab</option>
                   <option <?php echo ($data[0]['featured']=='S')?'selected="selected"':'';?> value="S">Same Tab</option>
                </select> 
            </td>
        </tr>
    <?php /*?><tr>
    	<td width="25%"><label id="err_page_title">Page Title : </label> <span class="error">*</span></td>
        <td><input type="text" title="Page Title" class="R"  name="page_title" id="page_title" value="<?php echo (isset($data[0])) ? $data[0]['page_title'] : $_POST['page_title'];?>" size="40"/>
        </td>
	</tr><?php */?>
   	 <?php /*?><tr>
		<td><label for="page_desc" id="err_page_desc">Page Description</label></td>
        <td valign="top">
            <b>Note: Upload image size should be less than 1 MB in text editor (image width maximum 600px)</b><br /><br />
            <textarea id="page_desc" name="page_desc" title="Page Description" rows="5" cols="130"><?php echo (isset($data[0])) ? $data[0]['page_desc'] : $_POST['page_desc'];?></textarea>	
        </td>
    </tr><?php */?>
    <tr>
    	<td>&nbsp;</td>
    	<td class="txtcenter">
            <?php if($_REQUEST['action']=="edit"){?>
            <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
            <input type="submit" name="btnupdate" value="Update" class="button" />
            <?php }else{?>
            <input type="submit" name="btnsave" value="Save" class="button" />
            <?php }?>
            <input type="hidden" name="pre_category_id" value="<?php echo $_REQUEST['pre_category_id']?>" />
            <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
        </td>
	</tr>
</table>
</form>
<?php } elseif($_REQUEST['action']=="display"){
	  $_GET['p_id'] = $_GET['p_id']!='' ? $_GET['p_id'] : 0;
		$query = "select * from menu_pages where pre_category_id='".$_REQUEST['pre_category_id']."' and parent='".$obj->ReplaceSql($_GET['p_id'])."'  order by orderid asc";
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
	<?php /*?><tr>
    	<th>Display Child Pages 
        <select title="Parent Page" onchange="window.location='?action=display&&p_id='+this.value;">
            <option value="0">-Parent Pages-</option>
            <?php if($country = $obj->SelectQuery("select * from menu_pages  order by orderid")){foreach ($country as $cnt) { ?>
                <option <?php echo ($_GET['p_id']==$cnt['page_id'])?'selected="selected"':'';?> value="<?php echo $cnt['page_id']?>"><?php echo $cnt['menu_title']?></option>
            <?php } }?>
        </select></th>
    </tr><?php */?>
    <tr>
    	<td>
<?php if($result){?>
	<div id="content-left">
	<br />
    <div id="message-box"> <?php echo $message; ?> Waiting for sortation submission...</div>
	<form id="dd-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<p>
    	<input type="checkbox" value="1" name="autoSubmit" id="autoSubmit" <?php if($_POST['autoSubmit']) { echo 'checked="checked"'; } ?> />
    	<label for="autoSubmit">Automatically submit on drop event</label><br />
	</p>
	<ul id="sortable-list">
	<?php $order = array();
		foreach($result as $item)
		 { 
			 echo '<li title="'.$item['page_id'].'">'.$item['menu_title'].'</li>';
			 $order[] = $item['page_id'];
		}  ?>	
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
        <th colspan="6">
        <form> 
			keywords: 
            <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
            <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
            <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
		 </form>
        </th>
    </tr>
    <tr>
        <td colspan="6" class="paging">
        Search By Alphabets: 
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
        if($alpha!=''){$where .= " and (menu_title 	 like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (menu_title  like '%".$keyword."%')";}
        $query="select * from menu_pages  where 1=1  $where order by orderid asc";
        $pager = new Pagination($query,$_REQUEST['page'],20,5);
        if($data = $pager->Paging()){$i = $pager->GetSNo();?>
	<tr>
    	<th width="10%">Sr. No</th>
        <th width="10%">Title</th>
        <th width="20%">Url</th>
         <th width="20%">Onclick open in</th>
        <th width="10%">Action</th>
    </tr>
    <?php foreach ($data as $row){?>
	<tr>
    	<td><?php echo $i++;?></td>
        <td><?php echo $row['menu_title'];?></td>
        <td><?php echo $row['url'];?></td>
        <td><?php if($row['featured']!="S") { ?>
		<?php echo 'New Tab'; ?> 
		<?php } else { ?>
		<?php echo 'Same Tab';?>
		<?php } ?>
        </td>
        <td>
        	<a href="?action=edit&page_id=<?php echo $row['page_id'];?>" class="edit" title="Edit"></a>
            <a href="?action=delete&page_id=<?php echo $row['page_id'];?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>
		</td>            
	</tr>
        <?php } ?>
		<tr><td colspan="6" class="paging"><?php echo $pager->DisplayAllPaging("page_id=".$_REQUEST['page_id']."&alpha=".$alpha."&keyword=".$keyword);?></td></tr>
    <?php } else { ?>
    	<tr><td colspan="6" class="txtcenter">No Page Found!</td></tr>
    <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>