<?php
if(! session_id()): @ session_start(); endif;
//session_destroy();
//error_reporting(E_ALL);
ini_set("display_errors", 0);
date_default_timezone_set('Etc/UTC');
 
include('PHPMailerAutoload.php');
include('class.phpmailer.php');
include('class.smtp.php');
 if(isset($_SESSION['form_submited'])):
if(isset($_GET['success_key']) && $_GET['success_key']==$_SESSION['acceskey'] ):

	$sender_message = $_SESSION['data'];
   $username = $_SESSION['name'];
   $usermail = $_SESSION['email'];
	
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = "relay-hosting.secureserver.net";
$mail->setFrom(''.$usermail.'', ''.$username.'');
$mail->addAddress('andrew@familyofficenetworks.com', 'Andrew');
$mail->addAddress('steven@familyofficenetworks.com', 'Steven');
$mail->Subject = 'Family Office Membership';
$mail->msgHTML($sender_message);
$mail->AltBody = 'This is a plain-text message body';

$mail->AddAttachment($_SESSION['filemedia1']);
$mail->AddAttachment($_SESSION['filemedia2']);
$mail->AddAttachment($_SESSION['filemedia3']);

//$mail->addAddress('naeem.pixector@gmail.com', 'Naeem');
//$mail->addAddress('andrew@familyofficenetworks.com', 'Andrew');
//$mail->addAddress('steven@familyofficenetworks.com', 'Steven');
//Attach an image file 
/*  $files = $mail->AddAttachment($_SESSION['file_a']['tmp_name'],$_SESSION['file_a']['name']);
 $mail->AddAttachment($_SESSION['file_b']['tmp_name'],$_SESSION['file_b']['name']);
 $mail->AddAttachment($_SESSION['file_c']['tmp_name'],$_SESSION['file_c']['name']);
if(! $files){
echo "file not send";
} */


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	 
	$sendmail = new PHPMailer();
	$sendmail->isSMTP();
	$sendmail->Debugoutput = 'html';
	$sendmail->Host = "relay-hosting.secureserver.net";
	$sendmail->setFrom('no-reply@pbfoa.org', 'Family Office Team');
	$sendmail->addAddress(''.$usermail.'', 'Family Office Team');
	$sendmail->Subject = 'Thank you for Membership';
	$sendmail->msgHTML("Thank you for your interest in becoming a member, we will be in touch with you shortly.");
	$sendmail->AltBody = 'This is a plain-text message body';

	if (!$sendmail->send()) {
		echo "Mailer Error: " . $sendmail->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
	 
    $_SESSION['autmess'] = '<section class="container successfully-message"><p style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; font-weight: 700; font-size: 18px;"><strong> Thank you</strong> for your interest in becoming a member, we will be in touch with you shortly.</p></section>';
}
elseif(! isset($_GET['success_key'])): ?>
<script> 
	window.location.href="http://pbfoa.org/";
</script>
<?php
endif;
endif;
 ?>
<?php include('header.php'); ?>
<div class="inner_banner page_id_60"></div>
<article id="inner-page-wrapper">
	<section class="container">
	
	<?php if(isset($_GET['success_key']) && $_GET['success_key']==$_SESSION['acceskey'] ): ?>
	<h1>Thank You</h1>
	<?php else: ?>
	<h2>Page not found 404</h2>
	<p>Please Submit your company information before from <span><a href="http://pbfoa.org/page.php?page_id=58">Membership</a></span></p>
	<?php endif; ?>	 
	<?php 
		if(isset($_SESSION['autmess'])):
			echo $_SESSION['autmess'];
			if(isset($_SESSION['filemedia1'])):
				 $image = $_SESSION['filemedia1'];
				unlink($image);
			endif;
			if(isset($_SESSION['filemedia2'])):
				 $doc = $_SESSION['filemedia2'];
				unlink($doc);
			endif;
			if(isset($_SESSION['filemedia3'])):
				 $vid = $_SESSION['filemedia3'];
				unlink($vid);
			endif;
			unset($_SESSION['acceskey']);
			unset($_SESSION['autmess']);
			unset($_SESSION['email']);
			unset($_SESSION['data']);
			unset($_SESSION['name']);
			unset($_SESSION['form_submited']);
			
		endif;
		
	?>	 
	</section>   
</article>
<?php include('footer.php'); ?>
