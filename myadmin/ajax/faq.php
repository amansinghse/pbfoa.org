<?php	
	require_once("../../class/class.functions.php");
	$fn = new Functions();
	header('Content-Type: text/html; charset=iso-8859-1');

if($_REQUEST['type']=='faq'){?>
<?php $faq=$fn->SelectQuery("select * from faqs where faq_id='".$_POST['faq_id']."' and faq_type='".$_POST['faq_type']."'"); ?>
	<?php if($_POST['faq_type']=='Video'){?>
		<tr>
        <td width="150px"><label id="err_faq_media" for="faq_media">Embed Video Code</label><br /><br />
		<br /><br />
		Video Size: 420 x 315
		</td>
        <td><textarea name="faq_media" id="faq_media" class="R" title="Video Embed Code" rows="5" cols="100"><?php echo $faq[0]['faq_media'];?></textarea></td>
	</tr>		
	<?php }else if($_POST['faq_type']=='Image'){?>
	<tr>
				<td><label for="faq_media" id="err_faq_media">Image</label>(Width x Height, 642 x 216)</td>
                <td>
                	<input type="file" name="faq_media" id="faq_media" title="Image" class="<?php echo $faq[0]['faq_media']=='' ? '':'';?>isImg" />
                    <br /><br />
                    <?php if($faq[0]['faq_media']!=''){?>
                    <img src="../faqsbl/<?php echo $faq[0]['faq_media']; ?>" height="271" width="300" />
                    <?php }?>

                </td>
			</tr>
			
<?php } }?>




