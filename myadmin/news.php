<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	require_once("../class/class.pagination.php");
require_once("../class/class.rss.php");

$rss = new RSS();

if($_REQUEST['action']=="delete"){
	$query="delete from news where news_id='".$_REQUEST['news_id']."'";
	$obj->UpdateQuery($query);
	$img=$obj->GetValue("news","news_image","news_id='".$_REQUEST['news_id']."'");
	$obj->DeleteImage("news",$img,true);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "News has been deleted successfully!";
	$obj->ReturnReferer();
}
if($_REQUEST['action']=="imgdelete"){	
	$query="update news set news_image='' where news_id='".$_REQUEST['news_id']."'";
	$obj->UpdateQuery($query);
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "News image has been deleted successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnupdate'])){	
	$query="update news set news_title='".$obj->ReplaceSql($_POST['news_title'])."',category_id='".$obj->ReplaceSql($_POST['category_id'])."', news_description='".$obj->ReplaceSql($_POST['news_description'])."', news_url='".$obj->ReplaceSql($_POST['url'])."',news_date='".$obj->ReplaceSql($_POST['news_date'])."' where news_id='".$obj->ReplaceSql($_POST['news_id'])."'";
	$obj->UpdateQuery($query);
	$rss->GenerateRss();
	if($_FILES['news_image']['name']!=''){
		$photo = array("name"=>$_FILES['news_image']['name'],"tmp_name"=>$_FILES['news_image']['tmp_name']);
		$obj->FixedUploadImage($photo,"news","news_image","news_id",$_POST['news_id'],642,300,204,126,true);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "News has been updated successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['btnsave'])){
	$query="insert into news set news_title='".$obj->ReplaceSql($_POST['news_title'])."',category_id='".$obj->ReplaceSql($_POST['category_id'])."', news_description='".$obj->ReplaceSql($_POST['news_description'])."', news_url='".$obj->ReplaceSql($_POST['url'])."',news_date='".$obj->ReplaceSql($_POST['news_date'])."'";
	$news_id=$obj->InsertQuery($query);
	$rss->GenerateRss();
	if($_FILES['news_image']['name']!=''){
		$photo = array("name"=>$_FILES['news_image']['name'],"tmp_name"=>$_FILES['news_image']['tmp_name']);
		$obj->FixedUploadImage($photo,"news","news_image","news_id",$news_id,642,300,204,126,true);
	}
	$_SESSION['ERRORTYPE'] = "success";
	$_SESSION['ERRORMSG'] = "News has been added successfully!";
	$obj->ReturnReferer();
}
if(isset($_POST['do_submit'])){
	$ids = explode(',',$_POST['sort_order']);
	foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$obj->UpdateQuery("update news set orderid = ".($index + 1)." where news_id = ".$id);
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
<script type="text/javascript" src="js/jacs.js"></script>
<style type="text/css">
.clear{ clear:both; width:100%; float:left;}
#sortable-list	{ padding:0; margin:0px; width:100%;}
#sortable-list li{ padding:10px; color:#000; cursor:move; list-style:none; float:left; background:#ddd; margin:5px; border:1px solid #999; font-size:14px;}
#message-box{ background:#fffea1; border:2px solid #fc0; padding:4px 8px; margin:0 0 14px 0; width:500px; }
</style>

<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
	
	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('news_description',{hasPanel : true});

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
			<div class="full"><h1>News <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1></div>
			<ul class="tabs">
				<li><a href="?action=add"<?php echo $_GET['action']=='add' ? ' class="current"': '';?>>Add New</a></li>
				<li><a href="?"<?php echo $_GET['action']!='add' ? ' class="current"': '';?>>News List</a></li>
			</ul>
			<?php if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){
					if($_REQUEST['action']=="edit" && isset($_REQUEST['news_id'])){
						$query = "select * from news where news_id='".$_REQUEST['news_id']."'";
						$data = $obj->SelectQuery($query); 
					}?>





			<form method="post" enctype="multipart/form-data" name="newsform" id="newsform" onsubmit="return validate(document.forms['newsform']);">
				<table width="100%" cellspacing="1" cellpadding="3"  class="table table-bordered table-striped">
				<tr>
					<td width="25%"><label id="err_category_id" for="category_id">Category Name : </label><span class="error">*</span></td>
					<td>
						<select id="category_id" name="category_id" class="R" title="Category Name">
							<option value="" >-Select Category-</option>
							<?php $category_cmb = $obj->SelectQuery("select * from news_category order by category_name");?><?php foreach ($category_cmb as $category) { ?><option <?php echo ($data[0]['category_id']==$category['category_id'])?'selected="selected"':'';?> value="<?php echo $category['category_id']?>"><?php echo ucfirst($category['category_name']);?></option><?php } ?>
						</select> 
					</td>
				</tr>
				<tr>
					<td><label id="err_news_title">Title : </label><span class="error">*</span></td>
					<td><input type="text" size="30" title="Title" class="R" name="news_title" id="news_title" value="<?php echo (isset($data)) ? $data[0]['news_title'] : '' ;?>"/>
					</td>
				</tr>
				 <tr>
					<td><label id="err_news_date">Date : </label><span class="error">*</span></td>
					<td><input type="text" size="30" title="Date" readonly="readonly" class="R" name="news_date" id="news_date" value="<?php echo (isset($data)) ? $data[0]['news_date'] : '' ;?>" onfocus="JACS.show(this,event)" />
					</td>
				</tr>
				 <tr>
					<td><label for="news_image" id="err_news_image">Image : (Large image Width x Height 642*216)</label></td>
					<td><input type="file" name="news_image" id="news_image" title="Image"/>
						<?php if($data[0]['news_image']!=''){?>
						<br /><br /><img src="../images/news/th_<?php echo $data[0]['news_image'];?>" />
						<?php }?>
					</td>
				</tr>
				<tr>

					<td width="250px"><label id="err_news_description">Description : </label></td>

					<td>
					<div class="rows">

					<textarea title="Description" name="news_description" id="news_description" cols="100" rows="10"><?php echo (isset($data)) ? $data[0]['news_description'] : '' ;?></textarea>

					</div>

					</td>

				</tr>
				<tr>
					<td><label id="err_news_url">URL : </label><span class="error">*</span></td>
					<td><input type="text" size="30" title="URL" class="R" name="news_url" id="news_url" value="<?php echo (isset($data)) ? $data[0]['url'] : '' ;?>"/>
					</td>
				</tr>
				<?php /*?><tr>
					<td><label id="err_news_description">News Description : </label></td>
					<td>
					
					<textarea title="News Description" name="news_description" id="news_description" cols="100" rows="10"><?php echo (isset($data)) ? $data[0]['news_description'] : '' ;?></textarea>
					</td>
				</tr><?php */?>
					<tr>
					<td>&nbsp;</td>
					<td>
						<?php if($_REQUEST['action']=="edit"){?>
						<input type="hidden" name="news_id" value="<?php echo $_REQUEST['news_id']?>" />
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
					$query = "select * from news where category_id='".$_GET['category_id']."' order by orderid asc";
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
					<form> 
					<select name="category_id" onchange="window.location='?action=display&category_id='+this.value;">
								<option value="">-Select Category-</option>
							<?php  
							 $mem = mysql_query("select * from news_category order by orderid") or die(mysql_error());
							 while($up  = mysql_fetch_assoc($mem)){
								echo "<option ".(($_GET['category_id']==$up['category_id']) ? 'selected="selected"' :'' )." value='".$up['category_id']."'>".$up['category_name']."</option>"; 
							 } ?>
							</select>
						
					 </form>
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
						echo '<li title="'.$item['news_id'].'">'.$item['news_title'].'</li>';
						$order[] = $item['news_id'];
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
				<tr>
					<th colspan="7">
					<form> 
						<select name="category_id" onchange="window.location='?category_id='+this.value;">
								<option value="">-Select Category-</option>
							<?php  
							 $mem = mysql_query("select * from news_category order by orderid") or die(mysql_error());
							 while($up  = mysql_fetch_assoc($mem)){
								echo "<option ".(($_GET['category_id']==$up['category_id']) ? 'selected="selected"' :'' )." value='".$up['category_id']."'>".$up['category_name']."</option>"; 
							 } ?>
							</select>
						keywords: 
						<input type="text" name="keyword" id="keyword" value="Search Title" onfocus="if(this.value==this.defaultValue){this.value='';}" size="40"/>
						<input type="submit" value="Go" class="button" onclick="if($('#keyword').val()=='Search Title'){$('#keyword').val('');}" />
						<input type="button" value="View All" class="button" onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';" />
					 </form>
					</th>
				</tr>
				<tr>
					<td colspan="7" class="paging">
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
					if($alpha!=''){$where .= " and (news_title like '".$alpha."%')";}
					if($keyword!=''){$where .= " and (news_title like '".$keyword."%' or news_title like '% ".$keyword."%')";}
					
					$query="select * from news as n inner join news_category as c on n.category_id=c.category_id $where order by n.news_date desc";
					$pager = new Pagination($query,$_REQUEST['page'],20,5);
					if($data = $pager->Paging()){ $i = $pager->GetSNo();?>
				<tr>
					<th width="10%">Sr. No.</th>
					<th width="10%">Category</th>
					<th width="15%">News Title</th>
					<th width="15%">News Image</th>
					<th width="30%">News Description</th>
					<th width="10%">Date</th>
					<th width="10%">Edit / Delete</th>
				</tr>
				<?php foreach ($data as $row){?>
					<tr>
						<td  width="10%"><?php echo $i++;?></td>
						<td  width="10%"><?php echo $row['category_name'];?></td>
						<td  width="15%"><?php echo $row['news_title'];?></td>
						<td  width="15%"><img src="../images/news/th_<?php echo $row['news_image'];?>"/>
							<?php if($row['news_image']!=""){?><br /><br />
							   <a href="?action=imgdelete&news_id=<?php echo $row['news_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>	<?php } ?>
						</td>
						<td  width="30%"><div class="content"><?php echo $row['news_description'];?></div></td>
						<td  width="10%"><?php echo date("m/d/Y",strtotime($row['news_date']));?></td>
						<td  width="10%">
							<a href="?action=edit&news_id=<?php echo $row['news_id'] ?>" class="edit" title="Edit"></a>
							<a href="?action=delete&news_id=<?php echo $row['news_id'] ?>" onclick="return confirm('Are you sure to delete?')" class="delete" title="Delete"></a>
						</td>            
					</tr>
				 <?php } ?>
				<tr><td colspan="7" class="paging"><?php echo $pager->DisplayAllPaging("keyword=".$_GET['keyword']."&alpha=".$_GET['alpha']."&category_id=".$_GET['category_id']);?></td></tr>
				<?php } else { ?>
				<tr><td colspan="7" class="txtcenter">No News Found!</td></tr>
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