<?php
$pagetitle_custom = "Thank You";
	include('header.php');
	require_once('connection.php');
	if ( ! session_id() ) @ session_start();
	
 ?>
<article id="inner-page-wrapper">
	<section class="container">


<?php 

		if(isset($_GET['successkey'])){
		
		$passkey=$_GET['successkey'];
		
		$storkey=$_SESSION['active_key'];
		
		if($passkey==$storkey){
		
			$user_data_insert=$_SESSION['save_result'];
		$user_query = mysqli_query($con,$user_data_insert);
		if($user_query){
			
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'To: '.$_SESSION['firstname'].' <'.$_SESSION['useremaily'].'>' . "\r\n";
					$headers .= 'From: Services Provider <andrew@familyofficenetworks.com>' . "\r\n";
					$headers .= 'Cc: ' . "\r\n";
					$headers .= 'Bcc: ' . "\r\n";
					$automsg = "<strong>Thank you</strong> for registering for our Service Provider Directory. Your listing is in the process of being approved, someone will be in contact with you shortly.";
					$autosubject = "Thank you for registering Directory";
				
					@mail($_SESSION['useremaily'],$autosubject,$automsg,$headers); 
					
					echo '<section class="container successfully-message"><p style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6;"><strong>Thank you</strong> for registering for our Service Provider Directory. Your listing is in the process of being approved, someone will be in contact with you shortly.</h3>';
					 session_destroy(); 
		}

		}else{
		echo "<h1>page Not fond!</h1>";
		}
		}
?>

</section></article>

<?php include('footer.php'); ?>