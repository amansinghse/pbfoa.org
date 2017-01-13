<?php	
	require_once("../../class/class.functions.php");
	$fn = new Functions();
	header('Content-Type: text/html; charset=iso-8859-1');

if($_REQUEST['type']=='bannertype'){?>
<?php $banner=$fn->SelectQuery("select * from home_banners where id='".$_POST['id']."'"); ?>
	<?php if($_POST['image_type']=='1'){?>
		<tr>
				<td><label for="_imgfull" id="err__imgfull">Image</label><?php if($banner[0]['image']==''){?> <span class="red">*</span> <?php } ?>(Width x Height, 1380 x 731)</td>
                <td>
                	<input type="file" name="_imgfull" id="_imgfull" title="Image" class="<?php echo $banner[0]['imagefull']=='' ? 'R':'';?>isImg" />
                    <br /><br />
                    <?php if($banner[0]['imagefull']!=''){?><br /><img src="../home_banners/<?php echo $banner[0]['imagefull'];?>" height="100" width="200" /><?php } ?>                    
                </td>
			</tr>
	<?php }else if($_POST['image_type']=='0'){?>
		<tr>
				<td><label for="_img" id="err__img">Image</label><?php if($banner[0]['image']==''){?> <span class="red">*</span> <?php } ?>(Width x Height, 642 x 216)</td>
                <td>
                	<input type="file" name="_img" id="_img" title="Image" class="<?php echo $banner[0]['image']=='' ? 'R':'';?>isImg" />
                    <br /><br />
                    <?php if($banner[0]['image']!=''){?><br /><img src="../home_banners/<?php echo $banner[0]['image'];?>" height="100" width="200" /><?php } ?>                    
                </td>
			</tr>
			
<?php } }?>




