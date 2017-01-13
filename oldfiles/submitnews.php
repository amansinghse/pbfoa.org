<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('Etc/UTC');
 
include('PHPMailerAutoload.php');
include('class.phpmailer.php');
include('class.smtp.php');
  
if(isset($_POST['submit_news'])):


$sender_message = "
		<html>
		<head>
		<title>FON Submit News</title>
		</head>
		<body>
		<table border='1' cellpadding='0' cellspacing='0' height='100%' width='100%' id='bodyTable' style='text-align: left; text-indent: 12px; line-height: 35px;'>
		<tr>
		<th>Firstname : </th><td>".$_POST["name"]."</td></tr><tr>
		<th>Email : </th><td>".$_POST["email"]."</td></tr><tr>
		<th>Phone : </th><td>".$_POST["phone"]."</td></tr><tr>
		<th>Wish to remain anonymous : </th><td>".$_POST["remain"]."</td></tr><tr>
		<th>Comment : </th><td>".$_POST["textmsg"]."</td>
		</tr>
		</table>
		</body>
		</html>
		";

$username = $_POST["name"];
$usermail = $_POST["email"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = "relay-hosting.secureserver.net";
$mail->setFrom(''.$usermail.'', ''.$username.'');
$mail->addAddress('andrew@familyofficenetworks.com', 'Andrew');
$mail->addAddress('steven@familyofficenetworks.com', 'Steven');
$mail->Subject = 'FON Submit News';
$mail->msgHTML($sender_message);
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file

$mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
//$mail->AddAttachment($_FILES['fileb']['tmp_name'], $_FILES['fileb']['name']);
 
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	 
	$sendmail = new PHPMailer();
	$sendmail->isSMTP();
	$sendmail->Debugoutput = 'html';
	$sendmail->Host = "relay-hosting.secureserver.net";
	$sendmail->setFrom('no-reply@pbfoa.org', 'Family Office Team');
	$sendmail->addAddress(''.$_POST["email"].'', 'Family Office Team');
	$sendmail->Subject = 'Thank you for News';
	$sendmail->msgHTML("Thank you for sending us your news, we will review it for the chance to be added to our site.");
	$sendmail->AltBody = 'This is a plain-text message body';

	if (!$sendmail->send()) {
		echo "Mailer Error: " . $sendmail->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
	 
	if(! session_id()): @ session_start(); endif;
	
    $_SESSION['autmess'] = '<section class="container successfully-message"><p style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; font-weight: 700; font-size: 18px;"><strong> Thank you</strong> for sending us your news, we will review it for the chance to be added to our site.</p></section>';
}

endif;
  
?>
<script src="js/jquery-1.9.1.min.js"></script>
<article id="inner-page-wrapper">
	<section class="container">
	<h1>Submit News</h1>
	
	<?php 
		if(isset($_SESSION['autmess'])):
			echo $_SESSION['autmess'];
			unset($_SESSION['autmess']);
		endif;
	?>
	
<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
	<ul class="personal-reg">
		<li><input type="text" value="" placeholder="Your Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="name" required/></li>
		
	
		
		<li><input type="email" value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" required/></li>
		
		<li><input type="tel" value="" placeholder="Phone Number:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number:'" name="phone" required/></li>
		
		<li><input type="text" value="" placeholder="Source URL http://example.com/:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Source URL http://example.com/:'" name="url" required/></li>

	<li>
		<select name="remain" required="">
			<option value="I wish to remain anonymous">I wish to remain anonymous</option>
			<option value="I want my name listed on the news">I want my name listed on the news</option>
		</select>
	</li>
	<li class="uploadfile-reg"><textarea placeholder="News Description" name="textmsg"></textarea></li>
	</ul>
	
	
	
	<ul class="uploadfile-reg">
		<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" type="file" name="file"  class="doc"/></div> <small id="docsmall">No file Chosen</small>
		<p id="doc_error1" style="display:none; color:#FF0000;">Document formats should be DOC, TXT or PDF.</p>
		<p id="doc_error2" style="display:none; color:#FF0000;">Max file size should be 2MB.</p>
		</li>
		</ul>
		
		<script>
  
		  document.getElementById('docfile').onchange = uploadDoc;

		function uploadDoc() {
			var text = this.value;
			if (this.files && this.files.length > 1) {
			  var filenames = [];
			  for(i=0; i++; i<this.files.length) {
				var filenames = this.files[i].name;
				var lastIndex = filename.lastIndexOf("\\");
				if (lastIndex >= 0) {
					filename = filename.substring(lastIndex + 1);
				}
				filenames.push(filename);
			  }
			  text = filenames.join();
			}
			
			document.getElementById('docsmall').innerHTML = text;
		}
		</script>
<input type="Submit" value="Submit" class="red-btn" name="submit_news"/>
</form>

<script>


$('input[type="submit"]').prop("disabled", false);
var a=0;
var b=0;
//binds to onchange event of your input field
$('.doc').bind('change', function() {
if ($('input:submit').attr('disabled',false)) {$('input:submit').attr('disabled',false);}	
var extb = $('.doc').val().split('.').pop().toLowerCase();
    if($.inArray(extb, ['doc','txt','pdf','docx']) == -1)
    { $('#doc_error1').slideDown("slow"); $('#doc_error2').slideUp("slow"); a=0;
	document.getElementById('docsmall').innerHTML = 'No file Chosen';
} else { 
    var picsizeb = (this.files[0].size);
    if (picsizeb > 2088576 )
    { $('#doc_error2').slideDown("slow"); a=0;} else { a=1; $('#doc_error2').slideUp("slow"); }
$('#doc_error1').slideUp("slow");
if (a==1 && b==2) {$('input:submit').attr('disabled',false); 
}
}
});

</script>
	</section>
</article>