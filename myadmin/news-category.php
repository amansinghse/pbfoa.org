<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
$obj = new Admin();
$obj->RequireLogin();
if($_REQUEST['action']=="delete"){
	if($obj->ValueExists("news","category_id",$_REQUEST['id'])==false){
		$delquery="delete from news_category where category_id='".$_REQUEST['id']."'";
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "News Category has been deleted successfully";	
		$obj->UpdateQuery($delquery);
	}else{
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "News Category Could not be deleted! Already used in Newss";	
	}
	$obj->ReturnReferer();
	exit();
}
if(isset($_POST['btnupdate'])){
	if($obj->ValueExists("news_category","category_name",$obj->ReplaceSql($_POST['category_name']),"category_id",$obj->ReplaceSql($_POST['id']))==false){
		$query="update news_category set category_name='".$obj->ReplaceSql($_POST['category_name'])."',bgcolor='".$obj->ReplaceSql($_POST['bgcolor'])."' where category_id='".$obj->ReplaceSql($_POST['id'])."'";
		$obj->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "News Category has been updated successfully!";
		$obj->ReturnReferer();
	} else {
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Category name already exists";
	}
}
if(isset($_POST['btnsave'])){
	if($obj->ValueExists("news_category","category_name",$obj->ReplaceSql($_POST['category_name']))==false){
		$query="insert into news_category set category_name='".$obj->ReplaceSql($_POST['category_name'])."',bgcolor='".$obj->ReplaceSql($_POST['bgcolor'])."'";
		$obj->InsertQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "News Category has been added successfully!";
		$obj->ReturnReferer();
	} else {
		$_SESSION['ERRORTYPE'] = "error";
		$_SESSION['ERRORMSG'] = "Category name already exists";
	}
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update news_category set orderid = ".($index + 1)." where category_id = ".$id);
		}
	}
	if($_POST['byajax']) { die(); } else { $message = 'Sortation has been saved.'; }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
	  
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
  

</script>
  <style>
@import url("css/fonts.css");
*{outline:none;font-family:"Droid Sans";}
body{ margin:0px; padding:0px 5px 0px 0px;font-family:"Droid Sans"; font-size:10pt; background:#fff; color:#0B5FAE;}
.navi ul{ width:200px; margin:0px; padding:0px; border:1px dashed #0064BB; list-style:none; float:left;}
.navi ul ul{ border:none;border-top:1px dashed #0064BB; display:none}
.navi ul li{ width:100%; margin:0px; padding:0px; list-style:none; float:left;border-bottom:1px dashed #0064BB; }
.navi ul li a{ color:#0064BB; width:90%; height: auto; margin:0px; float:left; padding:10px 5%; text-decoration:none; text-transform:uppercase;font-size:12px;}
.navi ul li ul li a{ color:#0064BB; width:90%; margin:0px; float:left; padding:10px 5%; text-decoration:none; text-transform:capitalize}
.navi ul li a:hover, ul li a.active, ul li a:active{color:#fff; background:#0064BB;}
.navi ul li ul li a:hover, ul li ul li a.active, ul li ul li a:active{color:#fff; background:#0064BB;}
.navi ul li:last-child{ border-bottom:none;}

</style>
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
<div class="container-fluid" >

<!-- header section-->
	<div class="row" style="background:#000; color:white;">
		<div class="col-md-4">
		<h3>Palm Beach</h3></div>
		<div class="col-md-8 " style="text-align:right" >
			<h3>Welcome to <?php echo COMPANY_NAME;?> Admin Panel</h3>
			<big>Welcome <?php echo $_SESSION['ADMIN_NAME'];?>! <a href="?signout" title="<?php echo COMPANY_NAME;?>" target="_parent">Logout</a></big>
		</div>
	</div>
	<!-- header section-->
	<!--center section--> 
	
	<div class="row">
	<!--menu section--> 
		<div class="col-md-2 navi">
			<ul>
			<?php foreach($_SESSION['PAGE_NAME'] as $k => $v){ ?>
				<li <?php if(($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Members') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Users') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Website Settings') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Membership')) { ?> style="display:none;<?php } ?>"><a href="javascript:;" onclick="$(this).next('ul').slideToggle(500); $(this).toggleClass('active');" class="arrow"><?php echo $k;?></a>
					<ul><?php foreach($v as $code => $page){ ++$i; ?>
						<li <?php if($_SESSION['ADMIN_NAME'] == 'Admin' && $page == 'Change Your Password') { ?> style="display:none;<?php } ?>><a href="<?php echo $code;?>" onclick="$('[rel=sublink]').removeClass('active');$(this).addClass('active');" rel="sublink">&raquo; <?php echo $page;?></a></li>
					<?php }?>
					</ul>
				</li>
			<?php }?>
			</ul>
		</div>
		<!--menu section--> 
		
		<!--main section--> 
		<div class="col-md-10">
			<?php require_once("message.php");?>
				<div class="full"><h1>News Category <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1></div>
				<ul class="tabs">
					<li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
					<li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>Category List</a></li>
				</ul>
				<?php 
					if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
					if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
						$query = "select * from news_category where category_id='".$_REQUEST['id']."'";
						$data = $obj->SelectQuery($query); 
						}?>
				<script type="text/javascript" src="js/jscolor.js"></script>
				<form method="post" enctype="multipart/form-data" name="brandform" id="brandform" onsubmit="return validate(document.forms['brandform']);">
				<table width="100%" cellspacing="1" cellpadding="10"  class="table table-bordered table-striped">
					<tr>
						<th colspan="2">Category Name</th>
					</tr>
					<tr>
						<td width="20%"> <label id="err_category_name">Category Name : </label><span class="error">*</span></td>
						<td><input type="text" title="Category Name" class="R" maxlength="60" size="40" name="category_name" id="category_name" value="<?php echo (isset($data[0])) ? $data[0]['category_name'] : $_POST['category_name'] ;?>"/> (e.g. Maximum 60 Characters)
						</td>
					</tr>
					<tr>
						<td colspan="4" class="txtcenter">
							<?php if($_REQUEST['action']=="edit"){?>
							<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
							<input type="submit" name="btnupdate" value="Update" class="button" />
							<?php }else{?>
							<input type="submit" name="btnsave" value="Save" class="button" />
							<?php }?>
							<input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
						</td>
					</tr>
				</table>
				</form>
				<?php }elseif($_REQUEST['action']=="display"){
						$query = "select * from news_category order by orderid asc";
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
				<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped">
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
							echo '<li title="'.$item['category_id'].'">'.$item['category_name'].'</li>';
							$order[] = $item['category_id'];
						}?>	
					</ul>
					<input type="hidden" name="sort_order" id="sort_order" value="<?php echo implode(',',$order); ?>" />
					<div class="clear">
					<input type="submit" name="do_submit" value="Submit Sortation" class="button" />
					</div>
					</form>
					</div>
					<?php } ?>
						</td>
					</tr>
				</table>

				<?php }else{$obj->SetCurrentUrl();?>
				<table width="100%" cellspacing="1" cellpadding="10"  class="table table-bordered table-striped">
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
						if($alpha!=''){$where .= " and (category_name like '".$alpha."%')";}
						if($keyword!=''){$where .= " and (category_name like '".$keyword."%' or category_name like '% ".$keyword."%')";}
						$query="select * from news_category where 1=1 $where order by orderid";
						$pager = new Pagination($query,$_REQUEST['page'],20,5);
						if($data = $pager->Paging()){$i = $pager->GetSNo();?>
					<tr>
						<th width="10%">S No</th>
						<th width="80%">Category Name</th>
						<th width="10%">Action</th>
					</tr>
					<?php foreach ($data as $row){?>
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $row['category_name'];?></td>
						<td>
							<a href="?action=edit&id=<?php echo $row['category_id'] ?>" class="edit" title="Edit"></a>
							<a href="?action=delete&id=<?php echo $row['category_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>
						</td>            
					</tr>
						<?php } ?>
					<tr><td colspan="3" class="paging"><?php echo $pager->DisplayAllPaging("keyword=".$_GET['keyword']."&alpha=".$_GET['alpha']);?></td></tr>
					<?php } else { ?>
					<tr><td colspan="3" class="txtcenter">No News Category Found!</td></tr>
					<?php } ?>
				</table>
				<?php } ?>
				
		
		</div>
		<!--main section--> 
		
	</div>
	<!--center section--> 
	<!--footer section--> 
	<div class="row">
		<?php include_once("footer.php");?>
	</div>
	<!--footer section--> 
	
</div>



</body>
</html>