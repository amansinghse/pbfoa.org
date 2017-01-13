<?php
ob_start();
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
require_once("../class/class.rss.php"); 
$obj = new Admin();
$rss = new RSS();
$obj->RequireLogin();
if($_REQUEST['action']=="delete"){
		$query="delete from events where event_id='".$_REQUEST['event_id']."'";
		$obj->UpdateQuery($query);
		$img=$obj->GetValue("events","event_gallery","event_id='".$_REQUEST['event_id']."'");
		$obj->DeleteImage("events",$img,true);
		$img=$obj->GetValue("events","event_secondary","event_id='".$_REQUEST['event_id']."'");
		$obj->DeleteImage("events",$img,true);
		$img=$obj->GetValue("events","event_creative","event_id='".$_REQUEST['event_id']."'");
		$obj->DeleteImage("events",$img,true);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Event has been deleted successfully!";
		$obj->ReturnReferer();
		exit();
}
if($_REQUEST['action']=="imgdelete"){	
	$query="update events set event_gallery='' where event_id='".$_REQUEST['event_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Event gallery has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdeletes"){	
	$query="update events set event_secondary='' where event_id='".$_REQUEST['event_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Event Secondary has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdelete1"){	
	$query="update events set event_creative='' where event_id='".$_REQUEST['event_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Event creative upload has been deleted successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnupdate'])){
function create_slug($string){
	   $event_slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	   $event_slug=strtolower($event_slug);
	   return $event_slug;
	}
	$query="update events set event_title='".$obj->ReplaceSql($_POST['event_title'])."', event_slug='".create_slug($_POST['event_title'])."',event_location='".$obj->ReplaceSql($_POST['event_location'])."',event_contact='".$obj->ReplaceSql($_POST['event_contact'])."',event_url='".$obj->ReplaceSql($_POST['event_url'])."',event_active='".$obj->ReplaceSql($_POST['event_active'])."',meta_title='".$obj->ReplaceSql($_POST['meta_title'])."',meta_des='".$obj->ReplaceSql($_POST['meta_detail'])."',event_date='".$obj->ReplaceSql($_POST['event_date'])."' where event_id='".$obj->ReplaceSql($_POST['event_id'])."'";
	$obj->UpdateQuery($query);
	/*$rss->GenerateRss();*/
	if($_FILES['event_gallery']['name']!=''){
		$photo = array("name"=>$_FILES['event_gallery']['name'],"tmp_name"=>$_FILES['event_gallery']['tmp_name']);
		$obj->FixedUploadImage($photo,"events","event_gallery","event_id",$_POST['event_id'],300,642,204,126,true);
	}
	if($_FILES['event_secondary']['name']!=''){
		$photo = array("name"=>$_FILES['event_secondary']['name'],"tmp_name"=>$_FILES['event_secondary']['tmp_name']);
		$obj->FixedUploadImage($photo,"events","event_secondary","event_id",$_POST['event_id'],300,642,204,126,true);
	}
	if($_FILES['event_creative']['name']!=''){
		$photo = array("name"=>$_FILES['event_creative']['name'],"tmp_name"=>$_FILES['event_creative']['tmp_name']);
		$obj->FixedUploadImage($photo,"events","event_creative","event_id",$_POST['event_id'],300,642,204,126,true);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Event has been updated successfully!";
	$obj->ReturnReferer();
	
}
if(isset($_POST['btnsave'])){
	function create_slug($string){
		   $event_slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   $event_slug=strtolower($event_slug);
		   return $event_slug;
		}
	$query="insert into events set event_title='".$obj->ReplaceSql($_POST['event_title'])."',event_slug='".create_slug($_POST['event_title'])."',event_location='".$obj->ReplaceSql($_POST['event_location'])."',event_contact='".$obj->ReplaceSql($_POST['event_contact'])."',event_url='".$obj->ReplaceSql($_POST['event_url'])."',event_active='".$obj->ReplaceSql($_POST['event_active'])."',meta_title='".$obj->ReplaceSql($_POST['meta_title'])."',meta_des='".$obj->ReplaceSql($_POST['meta_detail'])."',event_date='".$obj->ReplaceSql($_POST['event_date'])."'";
	$id=$obj->InsertQuery($query);
	
	$obj->UpdateQuery("update events set orderid = ".$id." where event_id = ".$id);
	
	/*$rss->GenerateRss();*/
	if($_FILES['event_gallery']['name']!=''){
		$photo = array("name"=>$_FILES['event_gallery']['name'],"tmp_name"=>$_FILES['event_gallery']['tmp_name']);
		$obj->FixedUploadImage($photo,"events","event_gallery","event_id",$id,300,642,204,126,true);
	}
	if($_FILES['event_secondary']['name']!=''){
		$photo = array("name"=>$_FILES['event_secondary']['name'],"tmp_name"=>$_FILES['event_secondary']['tmp_name']);
		$obj->FixedUploadImage($photo,"events","event_secondary","event_id",$id,300,642,204,126,true);
	}
	if($_FILES['event_creative']['name']!=''){
		$photo = array("name"=>$_FILES['event_creative']['name'],"tmp_name"=>$_FILES['event_creative']['tmp_name']);
		$obj->FixedUploadImage($photo,"events","event_creative","event_id",$id,300,642,204,126,true);
	}
		
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Event has been added successfully!";
	$obj->ReturnReferer();
	
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update events set orderid = ".($index + 1)." where event_id = ".$id);
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
  <h1>Manage events
    <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?>
    <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?>
    <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?>
  </h1>
</div>
<ul class="tabs">
<li><a href="?action=display"<?php echo $_GET['action']=='display' ? ' class="current"': '';?>>Display Order</a></li>
  <li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>List of events</a></li>
  <li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
</ul>
<?php 
    if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
		$_POST['event_purity'] = 'Available Upon Request';
    if($_REQUEST['action']=="edit" && isset($_REQUEST['event_id'])){
        $query = "select * from events where event_id='".$_REQUEST['event_id']."'";
        $data = $obj->SelectQuery($query); 
    }?>
<script type="text/javascript" src="js/nicEdit.js"></script> 
<script type="text/javascript">

	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	
	/*bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('event_detail',{hasPanel : true});

});*/
</script>

 <script type="text/javascript" src="js/jscolor.js"></script>
 
<form method="post" enctype="multipart/form-data" name="events" id="events" onsubmit="return validate(document.forms['events'])" >
  <table width="100%" cellspacing="1" cellpadding="10" class="tbl" id="tbl">
    <tr>
      <th colspan="2">Create Event</th>
    </tr>
    
    
	 <tr>
    	<td width="20%"> <label id="err_event_title"> Event Title</label></td>
        <td>
			<input type="text" title="event Title" class="R"  name="event_title" id="event_title" value="<?php echo (isset($data[0])) ? $data[0]['event_title'] : $_POST['event_title'] ;?>" size="50"/>
        </td>
	</tr>	
     <tr>
        <td><label id="err_news_date">Event Date : </label><span class="error">*</span></td>
        <td><input type="text" size="30" title="Date" readonly="readonly" class="R" name="event_date" id="event_date" value="<?php echo (isset($data)) ? $data[0]['event_date'] : '' ;?>" onfocus="JACS.show(this,event)" />
        </td>
    </tr>
	 <tr>
    	<td width="20%"> <label id="err_event_location"> Event Location</label></td>
        <td>
			<input type="text" title="Event Location " class="R"  name="event_location" id="event_location" value="<?php echo (isset($data[0])) ? $data[0]['event_location'] : $_POST['event_location'] ;?>" size="50"/>
        </td>
	</tr>	
	 <tr>
    	<td width="20%"> <label id="err_event_contact"> Event Contact</label></td>
        <td>
			<input type="text" title="Event Contact" class="R"  name="event_contact" id="event_contact" value="<?php echo (isset($data[0])) ? $data[0]['event_contact'] : $_POST['event_contact'] ;?>" size="50"/>
        </td>
	</tr>	
	 <tr>
    	<td width="20%"> <label id="err_event_url"> Event URL</label></td>
        <td>
			<input type="text" title="Event URL" class="R"  name="event_url" id="event_url" value="<?php echo (isset($data[0])) ? $data[0]['event_url'] : $_POST['event_url'] ;?>" size="50"/>
        </td>
	</tr>	
	 <tr>
    	<td width="20%"> <label id="err_event_gallery"> Event Gallery</label></td>
        <td>
			<input type="file" name="event_gallery" id="event_gallery" title="Image"/>
			 <?php if($data[0]['event_gallery']!=''){?>
            <br /><br /><img src="../images/events/th_<?php echo $data[0]['event_gallery'];?>" />
            <?php }?>
        </td>
	</tr>	
	 <tr>
    	<td width="20%"> <label id="err_event_secondary"> Event Secodary Image</label></td>
        <td>
			<input type="file" name="event_secondary" id="event_secondary" title="Image"/>
			 <?php if($data[0]['event_secondary']!=''){?>
            <br /><br /><img src="../images/events/th_<?php echo $data[0]['event_secondary'];?>" />
            <?php }?>
        </td>
	</tr>	
	 <tr>
    	<td width="20%"> <label id="err_event_creative">Upload Event Creative</label></td>
        <td>
			<input type="file" name="event_creative" id="event_creative" title="Image"/>
			 <?php if($data[0]['event_creative']!=''){?>
            <br /><br /><img src="../images/events/th_<?php echo $data[0]['event_creative'];?>" />
            <?php }?>
        </td>
	</tr>	
	 <tr>
    	<td width="20%"> <label id="err_event_active"> Active</label></td>
        <td>
			<select name="event_active">
				<option value="Yes" <?php if($data[0]['event_active'] == 'Yes'){ echo 'selected="selected"'; } ?>>Yes</option>
				<option value="No" <?php if($data[0]['event_active'] == 'No'){ echo 'selected="selected"'; } ?>>No</option>
			</select>
        </td>
	</tr>	

	<tr>
    	<td width="20%"> <label id="err_meta_title"> Meta Title</label></td>
        <td>
			<input type="text" title="Meta Title" class="R"  name="meta_title" id="meta_title" value="<?php echo (isset($data[0])) ? $data[0]['meta_title'] : $_POST['meta_title'] ;?>" size="50"/>
        </td>
	</tr>
    <tr>
      <td width="20%"><label id="err_event_title">Meta Description : </label><span class="error">*</span></td>
      <td><textarea title="Meta Detail" rows="4" cols="80" name="meta_detail" id="meta_detail" ><?php echo (isset($data[0])) ? $data[0]['meta_des'] : $_POST['meta_des'] ;?></textarea></td>
    </tr>
	
  </table>
   <table width="100%" cellspacing="1" cellpadding="11" class="tbl">
   <tr>
      <td width="20%">&nbsp;</td>
      <td class="txtcenter"><?php if($_REQUEST['action']=="edit"){?>
        <input type="hidden" name="event_id" value="<?php echo $_REQUEST['event_id']?>" />
        <input type="submit" name="btnupdate" value="Update" class="button" />
        <?php }else{?>
        <input type="submit" name="btnsave" value="Save" class="button" />
        <?php }?>
        <input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" /></td>
    </tr>
  </table>
</form>
<?php }elseif($_REQUEST['action']=="display"){
		$query = "select * from events order by orderid asc";
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
			echo '<li title="'.$item['event_id'].'">'.$item['event_title'].'</li>';
			$order[] = $item['event_id'];
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
    <th colspan="9"> <form>
        keywords:
        <input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
        <input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
        <input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
      </form>
    </th>
  </tr>
  <tr>
    <td colspan="9" class="paging"><?php for($i=65;$i<=90;$i++){ 
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
        if($alpha!=''){$where .= " and (event_title like '".$alpha."%')";}
        if($keyword!=''){$where .= " and (event_title like '".$keyword."%' or event_title like '% ".$keyword."%')";}
        $query="select * from events where 1=1  $where order by orderid asc";
        $eventr = new Pagination($query,$_REQUEST['event'],20,5);
        if($data = $eventr->Paging()){$k = $eventr->GetSNo();?>
  <tr>
    <th width="10%">Sr. No</th>
    <th width="20%">Event Title</th>
    <th width="10%">Event Gallery</th>
    <th width="10%">Creative Upload</th>
    <th width="10%">Event Secondary</th>
    <th width="10%">Event Contact</th>
    <th width="10%">Event Date</th>
    <th width="10%">Active</th>
	<?php if($_SESSION['ADMIN_NAME'] != 'Editor') { ?>
    <th width="10%">Action</th>
	<?php } ?>
  </tr>
  <?php foreach ($data as $row){?>
  <tr>
    <td><?php echo $k++;?></td>
    <td><?php echo $row['event_title'];?></td>
    <td>
		<img src="../images/events/th_<?php echo $row['event_gallery'];?>"/>
		<?php if($row['event_gallery']!=""){?><br /><br />
		   <a href="?action=imgdelete&event_id=<?php echo $row['event_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>	
		<?php } ?>
	</td>
    <td>
		<img src="../images/events/th_<?php echo $row['event_creative'];?>"/>
		<?php if($row['event_creative']!=""){?><br /><br />
		   <a href="?action=imgdelete1&event_id=<?php echo $row['event_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>	
		<?php } ?>
	</td>
    <td>
		<img src="../images/events/th_<?php echo $row['event_secondary'];?>"/>
		<?php if($row['event_secondary']!=""){?><br /><br />
		   <a href="?action=imgdeletes&event_id=<?php echo $row['event_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>	
		<?php } ?>
	</td>
    <td><div class="content"><?php echo $row['event_contact'];?></div></td>
	<td><?php echo date("M d,Y",strtotime($row['event_date']));?></td>
	<td><?php echo $row['event_active'];?></td>
	<?php if($_SESSION['ADMIN_NAME'] != 'Editor') { ?>
    <td><a href="?action=edit&event_id=<?php echo $row['event_id'] ?>" class="edit" title="Edit"></a> <a href="?action=delete&event_id=<?php echo $row['event_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a></td>
  </tr>
  <?php } } ?>
  <tr>
    <td colspan="9" class="paging"><?php echo $eventr->DisplayAllPaging();?></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="9" class="txtcenter">No Event Found!</td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<?php include_once("footer.php");?>
</body>
</html>  