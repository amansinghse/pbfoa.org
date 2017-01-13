<?php

require_once("../class/class.admin.php");

	$fn = new Admin();

	$fn->RequireLogin();

	if(isset($_POST['btnupdate'])){

		$query="update footer_settings set footer1='".$fn->ReplaceSql($_POST['footer1'])."', footer2='".$fn->ReplaceSql($_POST['footer2'])."',footer3='".$fn->ReplaceSql($_POST['footer3'])."',footer4='".$fn->ReplaceSql($_POST['footer4'])."',footer5='".$fn->ReplaceSql($_POST['footer5'])."',footer6='".$fn->ReplaceSql($_POST['footer6'])."',footer7='".$fn->ReplaceSql($_POST['footer7'])."',footer8='".$fn->ReplaceSql($_POST['footer8'])."',bottom_footer='".$fn->ReplaceSql($_POST['bottom_footer'])."'";

		$fn->UpdateQuery($query);

		$_SESSION['ERRORTYPE'] = "success";

		$_SESSION['ERRORMSG'] = "Admin Settings has been updated sucsessfully";

		$fn->ReturnReferer();		

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php include_once("inc.head.php"); ?>

<script type="text/javascript" src="js/nicEdit.js"></script> 

<script type="text/javascript">

	bkLib.onDomLoaded(function() {

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer1',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer2',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer3',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer4',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer5',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer6',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer7',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('footer8',{hasPanel : true});

	new nicEditor({

		fullPanel : true,

		uploadURI : 'nicUpload.php', 

	}).panelInstance('bottom_footer',{hasPanel : true});

});

</script>

</head>

<body>

<div class="full">

<h1>Manage Admin Settings <?php if($_REQUEST['action']=="edit"){ echo "[Edit]";} ?> <?php if($_REQUEST['action']=="add"){ echo "[Add]";} ?> <?php if($_REQUEST['action']=="view"){ echo "[View]";} ?></h1>

</div>

<?php require_once("message.php");?>

<?php 

	if($_REQUEST['action']=="add" || $_REQUEST['action']=="edit"){

		$query="select * from footer_settings";

		$data = $fn->SelectQuery($query);

		$_POST['footer1'] = (isset($_POST['footer1'])) ? $_POST['footer1'] : $data[0]['footer1'];

		$_POST['footer2'] = (isset($_POST['footer2'])) ? $_POST['footer2'] : $data[0]['footer2'];

		$_POST['footer3'] = (isset($_POST['footer3'])) ? $_POST['footer3'] : $data[0]['footer3'];

		$_POST['footer4'] = (isset($_POST['footer4'])) ? $_POST['footer4'] : $data[0]['footer4'];

		$_POST['footer5'] = (isset($_POST['footer5'])) ? $_POST['footer5'] : $data[0]['footer5'];

		$_POST['footer6'] = (isset($_POST['footer6'])) ? $_POST['footer6'] : $data[0]['footer6'];

		$_POST['footer7'] = (isset($_POST['footer7'])) ? $_POST['footer7'] : $data[0]['footer7'];

		$_POST['footer8'] = (isset($_POST['footer8'])) ? $_POST['footer8'] : $data[0]['footer8'];

		$_POST['bottom_footer'] = (isset($_POST['bottom_footer'])) ? $_POST['bottom_footer'] : $data[0]['bottom_footer'];

		?>

		

		

        

<form name="form1" id="form1" method="post" onsubmit="return validate(document.forms['form1']);">

<table width="100%" cellspacing="1" cellpadding="10" class="tbl">

    <tr>

    	<td><label for="footer1" id="err_footer1">Footer One :</label> <span class="error">*</span></td>

	    <td><textarea name="footer1" title="Footer One" class="R" id="footer1" rows="5" cols="130"><?php echo $_POST['footer1'];?></textarea></td>

    </tr>

    

    <tr>

    	<td><label for="footer2" id="err_footer2">Footer Two :</label> <span class="error">*</span></td>

	    <td><textarea name="footer2" title="Footer Two" class="R" id="footer2" rows="5" cols="130"><?php echo $_POST['footer2'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="footer3" id="err_footer3">Footer Three :</label> <span class="error">*</span></td>

	    <td><textarea name="footer3" title="Footer Three" class="R" id="footer3" rows="5" cols="130"><?php echo $_POST['footer3'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="footer4" id="err_footer4">Footer Four :</label> <span class="error">*</span></td>

	    <td><textarea name="footer4" title="Footer Four" class="R" id="footer4" rows="5" cols="130"><?php echo $_POST['footer4'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="footer5" id="err_footer5">Footer Five :</label> <span class="error">*</span></td>

	    <td><textarea name="footer5" title="Footer Five" class="R" id="footer5" rows="5" cols="130"><?php echo $_POST['footer5'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="footer6" id="err_footer6">Footer Six :</label> <span class="error">*</span></td>

	    <td><textarea name="footer6" title="Footer Six" class="R" id="footer6" rows="5" cols="130"><?php echo $_POST['footer6'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="footer7" id="err_footer7">Footer Seven :</label> <span class="error">*</span></td>

	    <td><textarea name="footer7" title="Footer Seven" class="R" id="footer7" rows="5" cols="130"><?php echo $_POST['footer7'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="footer8" id="err_footer8">Footer Eight :</label> <span class="error">*</span></td>

	    <td><textarea name="footer8" title="Footer Eight" class="R" id="footer8" rows="5" cols="130"><?php echo $_POST['footer8'];?></textarea></td>

    </tr>

    <tr>

    	<td><label for="bottom_footer" id="err_bottom_footer">Bottom Footer :</label> <span class="error">*</span></td>

	    <td><textarea name="bottom_footer" title="Bottom Footer" class="R" id="bottom_footer" rows="5" cols="130"><?php echo $_POST['bottom_footer'];?></textarea></td>

    </tr>

	<tr>

        <td colspan="2">

        	<?php if($_REQUEST['action']=="edit"){?>

            <input type="hidden" name="m_title" value="<?php echo $data[0]['m_title'];?>" />

            <input type="submit" name="btnupdate" value="Update" class="button" />

            <?php }else{?>

            <input type="submit" name="btnsave" value="Add" class="button" />

            <?php }?>

            <input type="button" onclick="location.href='<?php echo $_SESSION['CURRENT_URL'];?>'" class="button" value="Back" />

        </td>

    </tr>

</table>

</form>

<?php }else{ $fn->SetCurrentUrl();?>

<table width="100%" cellspacing="1" cellpadding="10" class="tbl">

    <tr>

        <th width="10%">Footer One</th>

        <th width="10%">Footer Two</th>  

        <th width="10%">Footer Three</th>     

        <th width="10%">Footer Four</th>

        <th width="10%">Footer Five</th>

        <th width="10%">Footer Six</th>

        <th width="10%">Footer Seven</th>

        <th width="10%">Footer Eight</th>

        <th width="10%">Bottom Footer</th>

		<th width="10%">Action</th>

    </tr> 

    <?php 

    	$query="select * from footer_settings order by id";

		if($data = $fn->SelectQuery($query)){

			foreach ($data as $row){ ?>

    <tr>

        <td><?php echo $row['footer1'];?></td>

        <td><?php echo $row['footer2'];?></td>       

        <td><?php echo $row['footer3'];?></td>        

        <td><?php echo $row['footer4'];?></td> 

        <td><?php echo $row['footer5'];?></td> 

        <td><?php echo $row['footer6'];?></td> 

        <td><?php echo $row['footer7'];?></td> 

        <td><?php echo $row['footer8'];?></td> 

        <td><?php echo $row['bottom_footer'];?></td> 

    	<td>

        	<a class="edit" href="?action=edit&m_title=<?php echo $row['m_title'];?>"></a>

        </td>

    </tr>

	    <?php } }?>

    </table>

<?php }?>

<?php include_once("footer.php");?>

</body>

</html>