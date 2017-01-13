<?php	
	require_once("../../class/class.functions.php");
	$fn = new Functions();
	header('Content-Type: text/html; charset=iso-8859-1');

if($_REQUEST['type']=='step'){?>
<?php $training=$fn->SelectQuery("select * from steps where step_id='".$_POST['step_id']."' and step_type='".$_POST['step_type']."'"); ?>
	<?php if($_POST['step_type']=='Video'){?>
		<tr>
        <td width="150px"><label id="err_step_media" for="step_media">Embed Video Code</label><br /><br />
		<br /><br />
		Video Size: 420 x 315
		</td>
        <td><textarea name="step_media" id="step_media" class="R" title="Video Embed Code" rows="5" cols="100"><?php echo $training[0]['step_media'];?></textarea></td>
	</tr>		
	<?php }else if($_POST['step_type']=='Image'){?>
	<tr>
				<td><label for="step_media" id="err_step_media">Image</label>(Width x Height, 642 x 216)</td>
                <td>
                	<input type="file" name="step_media" id="step_media" title="Image" class="<?php echo $training[0]['step_media']=='' ? '':'';?>isImg" />
                    <br /><br />
                    <?php if($training[0]['step_media']!=''){?>
                    <img src="../steps/<?php echo $training[0]['step_media']; ?>" height="271" width="300" />
                    <?php }?>

                </td>
			</tr>
			
<?php } }?>




