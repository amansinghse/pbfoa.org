<?php require_once("../class/class.admin.php");
require_once("../class/class.ImageResize.php");
	
	$obj = new Admin();
	$obj->RequireLogin(false);
	$image = new ImageResize();
	$date=date("Y-m-d H:i:s");
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	if(isset($_POST['btnupdate']) || isset($_POST['btnsave'])){
		if(isset($_POST['btnsave'])){
			$query="insert into home_banners set banner_title='".$obj->ReplaceSql($_POST['banner_title'])."',banner_desc='".$obj->ReplaceSql($_POST['banner_desc'])."', url='".$obj->ReplaceSql($_POST['url'])."',image_type='".$obj->ReplaceSql($_POST['image_type'])."',apply_order='".$obj->ReplaceSql($_POST['apply_order'])."',order_link='".$obj->ReplaceSql($_POST['order_link'])."'";
			$id = $obj->InsertQuery($query);
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "Home Banner added sucsessfully";
		}
		if(isset($_POST['btnupdate'])){
			$query="update home_banners set banner_title='".$obj->ReplaceSql($_POST['banner_title'])."',banner_desc='".$obj->ReplaceSql($_POST['banner_desc'])."', url='".$obj->ReplaceSql($_POST['url'])."',image_type='".$obj->ReplaceSql($_POST['image_type'])."',apply_order='".$obj->ReplaceSql($_POST['apply_order'])."',order_link='".$obj->ReplaceSql($_POST['order_link'])."'  where id='".$_POST['id']."'";
			$obj->UpdateQuery($query);
			$id = $_POST['id'];
			$_SESSION['ERRORTYPE'] = "success";
			$_SESSION['ERRORMSG'] = "Home Banner updated sucsessfully";
		}
		if($_POST['image_type']=='1'){
			if($_FILES['_imgfull']['name']!=""){
			$obj->UploadImageFix($_FILES['_imgfull'],"home_banners","imagefull","id",$id,1380,731,0,0);
			}	
		}else if($_POST['image_type']=='0'){
			if($_FILES['_img']['name']!=""){
			$obj->UploadImageFix($_FILES['_img'],"home_banners","image","id",$id,423,262,0,0);
			}			
		}

		$obj->ReturnReferer();
	}
	if(isset($_POST['do_submit']))  {
  		$ids = explode(',',$_POST['sort_order']);
	  	foreach($ids as $index=>$id) {
    		$id = (int) $id;
    		if($id != '') {
    	  		$obj->UpdateQuery("UPDATE home_banners SET orderid = ".($index + 1).", apply_order=1 WHERE id = ".$id);
    		}	
  		}
  		if($_POST['byajax']) { die(); } else { $message = 'Sortation has been saved.'; }
	}
	if($_REQUEST['T']=='D'){
		$data = $obj->SelectQuery("select image from home_banners where id='".$_REQUEST['id']."'");
		@unlink("../home_banners/".$data[0]['image']);
		@unlink("../home_banners/th_".$data[0]['image']);
		$query="delete from home_banners where id='".$_REQUEST['id']."'";
		$obj->UpdateQuery($query);
		$_SESSION['ERRORTYPE'] = "success";
		$_SESSION['ERRORMSG'] = "Home Banner deleted sucsessfully";
		$obj->ReturnReferer();
		exit();
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
.clear{ clear:both; width:100%; float:left;}
#sortable-list	{ padding:0; margin:0px; width:100%;}
#sortable-list li{ padding:5px; color:#000; cursor:move; list-style:none; float:left; background:#ddd; margin:5px; border:1px solid #999; }
#message-box{ background:#fffea1; border:2px solid #fc0; padding:4px 8px; margin:0 0 14px 0; width:500px; }

</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
	function deleteconfirm(val){
		if (confirm('Are you want to delete?')){
			window.location='?T=D&id='+val;
		}
	}
	/* when the DOM is ready */
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
				<h1>Manage Home Banners <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>
			</div>
			<?php require_once("message.php");?>
				<?php if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
						if($_REQUEST['action']=="edit" && isset($_REQUEST['id'])){
							$query = "select * from home_banners where id='".$_REQUEST['id']."'";
							$data = $obj->SelectQuery($query);}?>
					<form method="post" enctype="multipart/form-data" name="topform" id="topform" onsubmit="return validate(document.forms['topform']);">
						<table width="100%" cellspacing="1" cellpadding="3" class="tbl">	
						<tr>
							<th colspan="2"><?php echo (isset($data)) ? "Edit" : "Add" ;?> Banner Images</th>
						</tr>
						<tr>
							<td width="25%"><label for="banner_title" id="err_banner_title">Banner Title</label></td>
							<td><input type="text" size="40" name="banner_title" id="banner_title" title="Banner Title" class="" value="<?php echo $data[0]['banner_title'];?>" />
							</td>
						</tr>
						<tr>
							<td><label for="url" id="err_url">Link URL</label></td>
							<td><input type="text" size="40" name="url" id="url" title="Link Url" class="isURL" value="<?php echo $data[0]['url'];?>" /> e.g. ( http://www.website.com )
							</td>
						</tr>
						<tr>
							<td width="25%"><label for="banner_desc" id="err_banner_desc">Banner Description</label></td>
							<td><textarea rows="10" cols="100" name="banner_desc" id="banner_title" title="Banner Description"><?php echo $data[0]['banner_desc'];?></textarea>
							</td>
						</tr>
						<tr>
				<td width="25%"><label id="err_" for="">Image Type</label></td>
				<td><input type="radio" name="image_type" id="image_type"  value="1" <?php echo ($data[0]['image_type']=='1')?"checked='checked'":""; ?> onclick="senddata('banner','type=bannertype&id=<?php echo $_REQUEST['id']; ?>&image_type=1','bannerdiv')"/> Full Size 
				</td>
			   <tbody id="bannerdiv">
			   <?php if($_REQUEST['action']=='edit'){?>
			   <script language="javascript">senddata('banner','type=bannertype&id=<?php echo $_REQUEST['id']; ?>&image_type=<?php echo $data[0]['image_type']; ?>','bannerdiv')</script>
			   <?php }?>
			   </tbody> 
			   </tr>
						<?php /*?><tr>
							<td><label for="_img" id="err__img">Image</label><?php if($data[0]['image']==''){?> <span class="red">*</span> <?php } ?>(Width x Height, 423 x 262)</td>
							<td>
								<input type="file" name="_img" id="_img" title="Image" class="<?php echo $data[0]['image']=='' ? 'R':'';?>isImg" />
								<br /><br />
								<?php if($data[0]['image']!=''){?><br /><img src="../home_banners/<?php echo $data[0]['image'];?>" height="100" width="200" /><?php } ?>                    
							</td>
						</tr><?php */?>
						
						
					<!--	<tbody id="orderdiv">
			   <?php if($_REQUEST['action']=='edit'){?>
			   <script language="javascript">senddata('combos','type=applynow&id=<?php echo $_REQUEST['id']; ?>&apply_order=<?php echo $data[0]['apply_order']; ?>','orderdiv')</script>
			   <?php }?>
			   </tbody>-->
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php if($_REQUEST['action']=="edit"){?>
								<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" />
								<input type="submit" name="btnupdate" value="Update" class="button" />
								<?php }else{?>
								<input type="submit" name="btnsave" value="Add" class="button" />
								<?php }?>
								<input type="button" value="Back" class="button" onclick="window.location='<?php echo $_SESSION['CURRENT_URL']?>';" />
							</td>
						</tr>
						</table>
					</form>
				<?php }else{ $obj->SetCurrentUrl();
					$query = "SELECT * FROM home_banners ORDER BY orderid ASC";
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
					<td>
					<?php if($obj->CountQuery("select id from home_banners")<5){?>
					<input type="button" onclick="window.location='?action=add';" value="Add New Image" class="button" />
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>
			<?php if($result){?>
				<div id="content-left">
				<div id="message-box"> <?php echo $message; ?> Waiting for sortation submission...</div>
				<form id="dd-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
				<p>
					<input type="checkbox" value="1" name="autoSubmit" id="autoSubmit" <?php if($_POST['autoSubmit']) { echo 'checked="checked"'; } ?> />
					<label for="autoSubmit">Automatically submit on drop event</label>
				</p>
				<ul id="sortable-list">
				<?php $order = array();
					foreach($result as $item) {
						echo '<li title="'.$item['id'].'"><a href="javascript:deleteconfirm(\''.$item['id'].'\');" title="Delete" class="delete"></a>&nbsp;<a href="?action=edit&id='.$item['id'].'" title="Edit" class="edit"></a>'.(($item['apply_order']=='1') ? ' Apply Order: Yes' : ' Apply Order: No').'<br /><br />
						<img src="../home_banners/'.(($item['image_type']=='1') ? $item['imagefull'] : $item['image']).'" height="90" width="200" /></li>';
						$order[] = $item['id'];
					}?>	
				</ul>
				<input type="hidden" name="sort_order" id="sort_order" value="<?php echo implode(',',$order); ?>" />
				<div class="clear">
				<input type="submit" name="do_submit" value="Submit Sortation" class="button" />
				</div>
				</form>
				</div>
				<?php } ?>
			<?php } ?>
					</td>
				</tr> 
				</table>
		
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