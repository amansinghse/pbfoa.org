<?php
require_once("../class/class.admin.php");
	$fn = new Admin();
	$fn->RequireLogin();
	if(isset($_POST['btnupdate'])){
		$query="update mail_settings set email='".$fn->ReplaceSql($_POST['email'])."', contact_inquiry='".$fn->ReplaceSql($_POST['contact_inquiry'])."',quick_contact='".$fn->ReplaceSql($_POST['quick_contact'])."',copyright_title='".$fn->ReplaceSql($_POST['copyright_title'])."',quick_contact_title='".$fn->ReplaceSql($_POST['quick_contact_title'])."'";
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
		new nicEditor().panelInstance('footer_contact');
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
		$query="select * from mail_settings";
		$data = $fn->SelectQuery($query);
		$_POST['email'] = (isset($_POST['email'])) ? $_POST['email'] : $data[0]['email'];
		$_POST['contact_inquiry'] = (isset($_POST['contact_inquiry'])) ? $_POST['contact_inquiry'] : $data[0]['contact_inquiry'];
		$_POST['quick_contact'] = (isset($_POST['quick_contact'])) ? $_POST['quick_contact'] : $data[0]['quick_contact'];
		$_POST['quick_contact_title'] = (isset($_POST['quick_contact_title'])) ? $_POST['quick_contact_title'] : $data[0]['quick_contact_title'];
		$_POST['copyright_title'] = (isset($_POST['copyright_title'])) ? $_POST['copyright_title'] : $data[0]['copyright_title'];
		?>
		
		
        
<form name="form1" id="form1" method="post" onsubmit="return validate(document.forms['form1']);">
<table width="100%" cellspacing="1" cellpadding="10" class="tbl">
    <tr>
    	<td><label for="email" id="err_email">Your Email for Receiving Emails :</label> <span class="error">*</span></td>
	    <td><input type="text" name="email" title="Email for Receiving Emails" class="R" id="email" value="<?php echo $_POST['email'];?>" size="60"/></td>
    </tr>
    
    <tr>
    	<td><label for="contact_inquiry" id="err_contact_inquiry">Thank You Message for Contact Inquiry :</label> <span class="error">*</span></td>
	    <td><textarea name="contact_inquiry" title="Thank You Message for Contact Inquiry" class="R" id="contact_inquiry" rows="5" cols="130"><?php echo $_POST['contact_inquiry'];?></textarea></td>
    </tr>
   
    <tr>
    	<td><label for="quick_contact" id="err_quick_contact">Quick Contact Title:</label> </td>
	    <td><input type="text" name="quick_contact_title" title="Quick Contact Title" value="<?php echo $_POST['quick_contact_title'];?>" size="60"/></td>
    </tr>
    <tr>
    	<td><label for="quick_contact" id="err_quick_contact">Quick Contact:</label> </td>
	    <td><input type="text" name="quick_contact" title="Quick Contact"  value="<?php echo $_POST['quick_contact'];?>" size="60" maxlength="15"/></td>
    </tr>
     <tr>
    	<td><label for="quick_contact" id="err_quick_contact">Footer Copyright:</label> </td>
	    <td><input type="text" name="copyright_title" title="Footer Copyright"  value="<?php echo $_POST['copyright_title'];?>" size="60" /></td>
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
        <th width="15%">Your Email for Receiving Emails</th>
        <th width="20%">For Contact Inquiry</th>  
        <th width="20%">Quick Contact Title</th>     
        <th width="20%">Quick Contact</th>
        <th width="20%">Footer Copyright</th>
		<th width="5%">Action</th>
    </tr> 
    <?php 
    	$query="select * from mail_settings order by email";
		if($data = $fn->SelectQuery($query)){
			foreach ($data as $row){ ?>
    <tr>
        <td><?php echo $row['email'];?></td>
        
        <td><?php echo $row['contact_inquiry'];?></td>       
        <td><?php echo $row['quick_contact_title'];?></td>        
        <td><?php echo $row['quick_contact'];?></td> 
        <td><?php echo $row['copyright_title'];?></td> 
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