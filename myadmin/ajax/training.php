<?php	
	require_once("../../class/class.functions.php");
	$fn = new Functions();
	header('Content-Type: text/html; charset=iso-8859-1');

if($_REQUEST['type']=='training'){?>
<?php $training=$fn->SelectQuery("select * from trainings where training_id='".$_POST['training_id']."' and training_type='".$_POST['training_type']."'"); ?>
	<?php if($_POST['training_type']=='Video'){?>
		<tr>
        <td width="150px"><label id="err_training_media" for="training_media">Embed Video Code</label><br /><br />
		<br /><br />
		Video Size: 420 x 315
		</td>
        <td><textarea name="training_media" id="training_media" class="R" title="Video Embed Code" rows="5" cols="100"><?php echo $training[0]['training_media'];?></textarea></td>
	</tr>		
	<?php }else if($_POST['training_type']=='Image'){?>
	<tr>
				<td><label for="training" id="err_training_media">Image</label>(Width x Height, 642 x 216)</td>
                <td>
                	<input type="file" name="training_media" id="training_media" title="Image" class="<?php echo $training[0]['training_media']=='' ? '':'';?>isImg" />
                    <br /><br />
                    <?php if($training[0]['training_media']!=''){?>
                    <img src="../trainingsbl/<?php echo $training[0]['training_media']; ?>" height="271" width="300" />
                    <?php }?>

                </td>
			</tr>
			
<?php } }?>




