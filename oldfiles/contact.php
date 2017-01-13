<section class="container">
	<h1>Contact Us</h1>
	
	<figure class="contact_left">
	<?php contact_sidebar('42'); ?>
</figure>
	
	<figure class="contact_right">
	<p>Whether you’re interested in a membership or to learn more about what we have to offer, we’d love to hear from you. <br/>Fill out your name, phone number, email, and best time to contact you and someone from our office will reach out to you at your convenience. Connect and grow stronger through the best Family Office networking organization. </p>
 
	<form class="contact-form" method="post">
		<input type="text" value="" placeholder="Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name:'" name="yourname" required/>
		<input type="email" value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="youremail" required/>
		<input type="tel" value="" placeholder="Phone:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone:'" name="yourphone" required/>
		<input type="text" value="" placeholder="Subject:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject:'" name="yoursubject" required/>
		<textarea placeholder="Message:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message:'" name="yoursmessage" required></textarea>
		
		<input type="submit" value="Submit" name="submit_mail" class="signup-btn" />
	</form>
	
<?php
if(isset($_POST['submit_mail'])){

date_default_timezone_set('Etc/UTC');
 
include('PHPMailerAutoload.php');
include('class.phpmailer.php');
include('class.smtp.php');


$message = "
<html>
<head>
<title>Palm Beach</title>
</head>
<body>
<p>This email sent from Palm Beach!</p>
<table>
<tr>
<th>Name:</th>
<th>Email:</th>
<th>Phone:</th>
</tr>
<tr>
<td>".$_POST['yourname']."</td>
<td>".$_POST['youremail']."</td>
<td>".$_POST['yourphone']."</td>
</tr>
<tr>
<th>Message:</th>
</tr>
<tr>
<td>".$_POST['yoursmessage']."</td>
</tr>
</table>
</body>
</html>
";


$username = $_POST["yourname"];
$usermail = $_POST["youremail"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = "relay-hosting.secureserver.net";
$mail->setFrom(''.$usermail.'', ''.$username.'');
$mail->addAddress('andrew@familyofficenetworks.com', 'Andrew');
$mail->addAddress('steven@familyofficenetworks.com', 'Steven');
$mail->Subject = 'Contact Us';
$mail->msgHTML($message);
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
     
	$sendmail = new PHPMailer();
	$sendmail->isSMTP();
	$sendmail->Debugoutput = 'html';
	$sendmail->Host = "relay-hosting.secureserver.net";
	$sendmail->setFrom('no-reply@pbfoa.org', 'Family Office Team');
	$sendmail->addAddress(''.$_POST["youremail"].'', 'Family Office Team');
	$sendmail->Subject = 'Thank you for contacting us.';
	$sendmail->msgHTML("Thank you for contacting us. We will be in touch with you shortly.");
	$sendmail->AltBody = 'This is a plain-text message body';

	if (!$sendmail->send()) {
		echo "Mailer Error: " . $sendmail->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
	 
	if(! session_id()): @ session_start(); endif;
		?>
		<div class="notification success png_bg">
		<div>
		Thank you for contacting us. We will be in touch with you shortly. 
		</div>
		</div>
		<?php 
}
 }
 ?>
	</figure>

	</section>
</article>