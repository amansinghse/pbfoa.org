<?php
require_once("../class/class.admin.php");
require_once("../class/class.pagination.php");
require_once("../class/class.rss.php");
$obj = new Admin();
$rss = new RSS();
$obj->RequireLogin();
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
<?php include_once("inc.head.php");?>
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
    <table width="100%" cellspacing="1" cellpadding="3" class="tbl">
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
<table width="100%" cellspacing="1" cellpadding="3" class="tbl">
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
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
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
<?php include_once("footer.php");?>
</body>
</html>