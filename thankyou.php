 <?php require_once("class/class.functions.php");
$fn = new Functions();
include('header.php');
  $footer = $fn->SelectQuery("select * from footer_settings WHERE id=1");

?>
<article id="member_wrapper">
	<section class="container">
		<div class="innerPages" id="page-thankyou" style="margin: 14% auto 2%; float:left;width:100%;text-align:left;">
			<h1>Thank You</h1>
			<p>Thank you for getting in touch with <?php echo   $_SERVER['SERVER_NAME'] ?>.</p>
		</div>
	</section>
<article>
<?php include('footer.php'); ?>