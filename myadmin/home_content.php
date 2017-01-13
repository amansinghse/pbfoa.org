<?php require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	if($_REQUEST['action']=="delete"){
	$query="delete from home_content where id='".$_REQUEST['id']."'";
	$obj->UpdateQuery($query);
	$img=$obj->GetValue("home_content","image","id='".$_REQUEST['id']."'");
	$obj->DeleteImage("home_content",$img,true);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Content has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdelete"){	
	$query="update home_content set image='' where id='".$_REQUEST['id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Content image has been deleted successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnupdate'])){
	$query="update home_content set title='".$obj->ReplaceSql($_POST['title'])."',url='".$obj->ReplaceSql($_POST['url'])."',interview='".$obj->ReplaceSql($_POST['interview'])."',description='".$obj->ReplaceSql($_POST['description'])."', meta_title='".$obj->ReplaceSql($_POST['meta_title'])."',meta_des='".$obj->ReplaceSql($_POST['meta_des'])."', img_title='".$obj->ReplaceSql($_POST['img_title'])."',img_alt='".$obj->ReplaceSql($_POST['img_alt'])."' where id='".$obj->ReplaceSql($_POST['id'])."'";
	$obj->UpdateQuery($query);
	if($_FILES['image']['name']!=''){
		$photo = array("name"=>$_FILES['image']['name'],"tmp_name"=>$_FILES['image']['tmp_name']);
		$obj->FixedUploadImage($photo,"home_content","image","id",$_POST['id'],253,220,0,0,false);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Content has been updated successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnsave'])){
	$maxno = $obj->SelectQuery("select max(orderid) as maxi from home_content");
	$maxno = $maxno[0]['maxi'] + 1;
	$query="insert into home_content set title='".$obj->ReplaceSql($_POST['title'])."',url='".$obj->ReplaceSql($_POST['url'])."',interview='".$obj->ReplaceSql($_POST['interview'])."',description='".$obj->ReplaceSql($_POST['description'])."', meta_title='".$obj->ReplaceSql($_POST['meta_title'])."', meta_des='".$obj->ReplaceSql($_POST['meta_des'])."', img_title='".$obj->ReplaceSql($_POST['img_title'])."', img_alt='".$obj->ReplaceSql($_POST['img_alt'])."',orderid='".$maxno."'";
	$id=$obj->InsertQuery($query);
	if($_FILES['image']['name']!=''){
		$photo = array("name"=>$_FILES['image']['name'],"tmp_name"=>$_FILES['image']['tmp_name']);
		$obj->FixedUploadImage($photo,"home_content","image","id",$id,253,220,0,0,false);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "Home Content has been added successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update home_content set orderid = ".($index + 1)." where id = ".$id);
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
<script type="text/javascript" src="js/nicEdit.js"></script> 
<script type="text/javascript">

		bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('description',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('interview',{hasPanel : true});

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
			<div class="full">
			  <?php require_once("message.php");?>
				<h1>Home Content <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?></h1>
			</div>

				<?php if($_REQUEST['action']=="edit"){
						if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
							$query = "select * from home_content where id='".$_REQUEST['id']."'";
							$data = $obj->SelectQuery($query); 
						}?>
				<script type="text/javascript" src="js/jscolor.js"></script>
				<form method="post" enctype="multipart/form-data" name="testimonialform" id="testimonialform" onsubmit="return validate(document.forms['testimonialform']);">
					<table width="100%" cellspacing="1" cellpadding="13"  class="table table-bordered table-striped">
				  
					<tr>
						<td width="25%"><label id="err_title">Title : </label><span class="error">*</span></td>
						<td><input type="text" size="40" title="Title" class="R" name="title" id="title" value="<?php echo (isset($data)) ? $data[0]['title'] : '' ;?>"/>
						</td>
					</tr>
					 <tr>
						<td width="25%"><label id="err_description">Interview With Text : </label></td>
						<td><textarea title="Interview With" rows="4" cols="80" name="interview" id="interview"><?php echo (isset($data[0])) ? $data[0]['interview'] : $_POST['interview'] ;?></textarea>
						</td>
					</tr>
					 <tr>
						<td width="25%"><label id="err_description">Description : </label></td>
						<td><textarea title="Description" rows="4" cols="80" name="description" id="description"><?php echo (isset($data[0])) ? $data[0]['description'] : $_POST['description'] ;?></textarea>
						</td>
					</tr>	    <tr>        <td width="25%"><label id="err_meta_title">Meta Title : </label><span class="error">*</span></td>        <td><input type="text" size="40" title="Meta Title" class="R" name="meta_title" id="meta_title" value="<?php echo (isset($data)) ? $data[0]['meta_title'] : $_POST['meta_title'] ;?>"/>        </td>    </tr>     <tr>        <td width="25%"><label id="err_meta_description">Meta Description : </label></td>        <td><textarea title="Description" rows="4" cols="80" name="meta_des" id="meta_des"><?php echo (isset($data[0])) ? $data[0]['meta_des'] : $_POST['meta_des'] ;?></textarea>		</td>    </tr>	
					 <tr>
						<td width="25%"><label for="image" id="err_image">Image : (Large image Width x Height 470 x 264)</label></td>
						<td><input type="file" name="image" id="image" title="Image"/>
							<?php if($data[0]['image']!=''){?>
							<br /><br /><img src="../images/home_content/<?php echo $data[0]['image'];?>" />
							<?php }?>
						</td>
					</tr>	   
					<tr>        <td width="25%"><label id="err_img_alt">Image Alt : </label><span class="error">*</span></td>        <td><input type="text" size="40" title="Alt Text" class="R" name="img_alt" id="img_alt" value="<?php echo (isset($data)) ? $data[0]['img_alt'] : $_POST['img_alt'] ;?>"/>        </td>    </tr>    <tr>        <td width="25%"><label id="err_img_title">Image Title : </label><span class="error">*</span></td>        <td><input type="text" size="40" title="Image Title" class="R" name="img_title" id="img_title" value="<?php echo (isset($data)) ? $data[0]['img_title'] : $_POST['img_title'] ;?>"/>        </td>    </tr>
					<tr>
						<td width="25%"><label id="err_url">URL : </label></td>
						<td><input type="text" size="30" title="URL" class="isURL" name="url" id="url" value="<?php echo (isset($data)) ? $data[0]['url'] : '' ;?>"/> http://www.example.com
						</td>
					</tr>
						<tr>
						<td width="25%">&nbsp;</td>
						<td>
							<?php if($_REQUEST['action']=="edit"){?>
							<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
							<input type="submit" name="btnupdate" value="Update" class="button" />
							<?php } ?>
							<input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
						</td>
					</tr>
					</table>
				</form>
				<?php }elseif($_REQUEST['action']=="display"){
						$query = "select * from home_content order by orderid asc";
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
				<table width="100%" cellspacing="1" cellpadding="3" class="table table-bordered table-striped">
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
				<table width="100%" cellspacing="1" cellpadding="10"  class="table table-bordered table-striped">
				  <!--  <tr>
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
					</tr>     -->
					<?php 
						$keyword = $obj->ReplaceSql($_REQUEST['keyword']);
						$alpha = $obj->ReplaceSql($_REQUEST['alpha']);
						$where = '';
						if($alpha!=''){$where .= " and (title like '".$alpha."%')";}
						if($keyword!=''){$where .= " and (title like '".$keyword."%' or title like '% ".$keyword."%')";}
						$query="select * from home_content where 1=1 $where order by id asc";
						$pager = new Pagination($query,$_REQUEST['page'],20,5);
						if($data = $pager->Paging()){ $i = $pager->GetSNo();?>
					<tr>
						<th width="5%">Sr. No.</th>
						<th width="20%">Title</th>
						<th width="60%">Description</th>
						<th width="10%">Edit / Delete</th>
					</tr>
					<?php foreach ($data as $row){?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['title'];?></td>
							<td><div class="content"><?php echo $row['description'];?></div></td>			
							<td>
								<a href="?action=edit&id=<?php echo $row['id'] ?>" class="edit" title="Edit"></a>
							</td>            
						</tr>
					 <?php } ?>
					<tr><!--<td colspan="9" class="paging"><?php //echo $pager->DisplayAllPaging("keyword=".$_GET['keyword']."&alpha=".$_GET['alpha']);?></td>--></tr>
					<?php } else { ?>
					<tr><td colspan="9" class="txtcenter">No Home Content Found!</td></tr>
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