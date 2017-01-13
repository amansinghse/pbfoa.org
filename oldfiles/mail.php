<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
if(! session_id()): @ session_start(); endif; 

echo $_SESSION['abc']."<br />";
//session_destroy(); 

/* $filename = 'hello.txt';
$ext = pathinfo($_FILES["fileb"]["name"], PATHINFO_EXTENSION);
$ext2 = pathinfo($_FILES["fileb"]["name"], PATHINFO_FILENAME);
echo $ext;
echo $ext2; */
date_default_timezone_set('Etc/UTC');
echo $_SESSION['abc'];
if(isset($_POST['file_subs'])):

$_SESSION['abc'] = $_POST['namebase'];

//$_SESSION['filess'][] = $_FILES['fileb'];

//echo "The file ". basename( $_FILES["fileb"]["name"]). " has been uploaded.";
/* $target_dir = "mailmedia/";
$exten = pathinfo($_FILES["fileb"]["name"], PATHINFO_EXTENSION);

$filename = time().'_doc.'.$exten;
$target_file = $target_dir.$filename;

if (move_uploaded_file($_FILES["fileb"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileb"]["name"]). " has been uploaded.";
}
echo $_SESSION['filemedia'] = $target_file; */
//$_SESSION['temp'] = tempnam(sys_get_temp_dir(), $_FILES['fileb']['tmp_name']);
//$_SESSION['name'] =$_FILES['fileb']['name'];
//echo $uploadfile.'<br />'.$filename;
endif;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
 
include('PHPMailerAutoload.php');
include('class.phpmailer.php');
include('class.smtp.php');
  
if(isset($_POST['submit'])):
  
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug   = 2;
//$mail->DKIM_domain = '192.168.1.119';
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "relay-hosting.secureserver.net";
//Set the SMTP port number - likely to be 25, 465 or 587
//$mail->Port = 80;
//Whether to use SMTP authentication
//$mail->SMTPAuth    = true;
//Username to use for SMTP authentication
//$mail->Username    = "peter@pbfoa.org";
//Password to use for SMTP authentication
//$mail->Password    = "peter@123";
//$mail->SMTPSecure  = 'ssl';

//Set who the message is to be sent from
$mail->setFrom('no-reply@arjunphp.com', 'First Last');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('naeem.pixector@gmail.com', 'Arjun');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("this is testing message");
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment($_FILE['file']);

$file = $mail->AddAttachment($_SESSION["filemedia"]);  


//$_SESSION['imgArrayFile'][] = $_FILES['file']; //Your file infromations
  //$_SESSION['imgArrayName'][] = $_POST["ImgNewNamePlacowki"]; //new name for img
  //$_SESSION['ImgArrayAlt'][] = $_POST["ImgAltPlacowki"]; // alt tags if you use them
  //$_SESSION['obj_image_session'][] = file_get_contents($_FILES['file']['tmp_name']); 

if(! $file){echo "file not send..."; }  
//$mail->AddAttachment($_FILES['fileb']['tmp_name'], $_FILES['fileb']['name']);
   
//send the message, check for errors 
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
endif;

echo $_SESSION['uploaded_file'];
?> 
<?php
$t=time('H-I-S');
echo($t . "<br>");
//echo(date("Y-m-d",$t));
?>

<form method="post" enctype="multipart/form-data" >
	<input type="submit" name="submit" />
</form>


<form action="http://pbfoa.org/mail.php" method="post"  enctype="multipart/form-data" >
	<input type="text" name="namebase" value="this is tesx">
	<input type="submit" name="file_subs" /> 
</form> 