<?php 

 $code=$_SESSION['active_key'];
$_SESSION['price'];
?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmPaypal" id="frmPaypal">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="naeem.pixector@gmail.com">
		<input type="hidden" name="item_name" value="Services Provider">
		<input type="hidden" name="item_number" value="123">
		<input type="hidden" name="amount" value="<?=$_SESSION['price']?>">
		<input type="hidden" name="first_name" value="<?=$_SESSION['firstname']?>">
		<input type="hidden" name="last_name" value="">
		<INPUT TYPE="hidden" NAME="return" value="http://pbfoa.org/directory/thankyou.php?successkey=<?php echo $code; ?>">
		<INPUT TYPE="hidden" NAME="currency_code" value="USD">
		<input type="hidden" name="email" value="<?=$_SESSION['useremail']?>">
		
		<script type="text/javascript">
		document.frmPaypal.submit();
		</script>
</form>

