<?php	
	require_once("../../class/class.functions.php");
	$fn = new Functions();
	header('Content-Type: text/html; charset=iso-8859-1');

if($_REQUEST['type']=='servicesbl'){?>
<?php $faq=$fn->SelectQuery("select * from services where service_id='".$_REQUEST['service_id']."' and service_type='".$_REQUEST['service_type']."'"); ?>
	<?php if($_REQUEST['service_type']=='Video'){?>
		<tr>
        <td width="150px"><label id="err_service_media" for="service_media">Embed Video Code</label><br /><br />
		<br /><br />
		Video Size: 420 x 315
		</td>
        <td><textarea name="service_media" id="service_media" class="R" title="Video Embed Code" rows="5" cols="100"><?php echo $faq[0]['service_media'];?></textarea></td>
	</tr>		
	<?php }else if($_REQUEST['service_type']=='Image'){?>
	<tr>
				<td><label for="service_media" id="err_service_media">Image</label>(Width x Height, 642 x 216)</td>
                <td>
                	<input type="file" name="service_media" id="service_media" title="Image" class="<?php echo $faq[0]['service_media']=='' ? '':'';?>isImg" />
                    <br /><br />
                    <?php if($faq[0]['service_media']!=''){?>
                    <img src="../servicesbl/<?php echo $faq[0]['service_media']; ?>" height="271" width="300" />
                    <?php }?>

                </td>
			</tr>
			
<?php } }?>




