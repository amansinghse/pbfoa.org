<?php	
	require_once("../../class/class.functions.php");
	$fn = new Functions();
	header('Content-Type: text/html; charset=iso-8859-1');
	if($_POST['type']=="category"){
		echo '<option value="">-Select Category-</option>';
		if($cmb = $fn->SelectQuery("select * from category order by category_name")){
			foreach($cmb as $val){
				echo '<option value="'.$val['category_id'].'"'.(($val['category_id']==$_POST['sel']) ? ' selected="selected"':'').'>'.$val['category_name'].'</option>';
			}
		}
	}
	if($_REQUEST['type']=="taxcost"){
	$cost=$_POST['cost'];
	echo $ret=((int)($cost / 30)*100);
	}
?>
<?php if($_REQUEST['type']=='applynow'){
	$order=$fn->SelectQuery("select * from home_banners where id='".$_POST['id']."' and apply_order='".$_POST['apply_order']."'");
	if($_POST['apply_order']=='1'){
	echo "<tr>
        <td width='150px'><label id='err_order_link' for='order_link'>Link</label><span class='error'>*</span></td>
        <td><input type='text' name='order_link' id='order_link'  class='RisURL' size='60' title='Link URL' value='".$order[0]['order_link']."' /> eg.( http://www.brandlabsmedia.com )</td>
	</tr>";		
	}else{
	echo " ";	
	}
}
?>
<?php if($_REQUEST['type']=="sub_category"){
	if(!$fn->ValueExists("sub_category","category_id",$_POST['category_id'])==false){?>
	<select title="Sub Category" name="sub_category_id" id="sub_category_id">
        <option value="">--Select Sub Category--</option>
		<?php $subcategory_cmb = $fn->SelectQuery("select * from sub_category where category_id='".$_POST['category_id']."' order by orderid");?><?php foreach ($subcategory_cmb as $subcategory) { ?><option <?php echo ($_POST['sub_category_id']==$subcategory['sub_category_id']) ? 'selected="selected"' : '';?>  value="<?php echo $subcategory['sub_category_id']?>"><?php echo ucfirst($subcategory['sub_category_title']);?></option><?php } ?>
</select>
	<?php }else{ ?>
    No Sub Catgory
    <?php }?>
<?php }?>
