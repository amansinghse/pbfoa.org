<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
date_default_timezone_set('Etc/UTC');
 
include('PHPMailerAutoload.php');
include('class.phpmailer.php');
include('class.smtp.php');
  
if(isset($_POST['submit_membership'])):


$sender_message = "
		<html>
		<head>
		<title>Family Office Membership</title>
		</head>
		<body>
		<table border='1' cellpadding='0' cellspacing='0' height='100%' width='100%' id='bodyTable' style='text-align: left; text-indent: 12px; line-height: 35px;'>
		<tr>
		<th>Firstname : </th><td>".$_POST["fname"]."</td></tr><tr>
		<th>Lastname : </th><td>".$_POST["lname"]."</td></tr><tr>
		<th>Email : </th><td>".$_POST["email"]."</td></tr><tr>
		<th>Phone : </th><td>".$_POST["phone"]."</td></tr><tr>
		<th>Company : </th><td>".$_POST["company"]."</td></tr><tr>
		<th>Job Designation : </th><td>".$_POST["job"]."</td></tr><tr>
		<th>Adress : </th><td>".$_POST["address"]."</td></tr><tr>
		<th>City : </th><td>".$_POST["city"]."</td></tr><tr>
		<th>State : </th><td>".$_POST["state"]."</td></tr><tr>
		<th>Zip Code : </th><td>".$_POST["zipcode"]."</td></tr><tr>
		<th>Country : </th><td>".$_POST["country"]."</td></tr><tr>
		<th>Area of Interest : </th><td>". @join(", ", $_REQUEST["areainterest"]) ."</td></tr><tr>
		<th>Others : </th><td>". $_POST["others"] ."</td></tr><tr>
		<th>Networth  : </th><td>".$_POST["networth"]."</td></tr><tr>
		<th>Invest in real estate :  </th><td>".$_POST["averagesize"]."</td></tr><tr>
		<th>Firm participated in : </th><td>". @join(", ", $_REQUEST["estatetrans"]) ."</td></tr><tr>
		<th>Invest in private equity : </th><td>".$_POST["privatequity"]."</td></tr><tr>
		<th>Firm participated in : </th><td>". @join(", ", $_REQUEST["firmtrans"]) ."</td></tr><tr>
		<th>Private equity investments : </th><td>".$_POST["averagesize"]."</td>
		</tr>
		</table>
		</body>
		</html>
		";

$username = $_POST["fname"].' '.$_POST["lname"];
$usermail = $_POST["email"];

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

//Attach an image file

$mail->AddAttachment($_FILES['filea']['tmp_name'], $_FILES['filea']['name']);
$mail->AddAttachment($_FILES['fileb']['tmp_name'], $_FILES['fileb']['name']);
$mail->AddAttachment($_FILES['filec']['tmp_name'], $_FILES['filec']['name']);
 
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
	$sendmail->Subject = 'Thank you for Membership';
	$sendmail->msgHTML("Thank you for your interest in becoming a member, we will be in touch with you shortly.");
	$sendmail->AltBody = 'This is a plain-text message body';

	if (!$sendmail->send()) {
		echo "Mailer Error: " . $sendmail->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
	 
	if(! session_id()): @ session_start(); endif;
	
    $_SESSION['autmess'] = '<section class="container successfully-message"><p style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; font-weight: 700; font-size: 18px;"><strong> Thank you</strong> for your interest in becoming a member, we will be in touch with you shortly.</p></section>';
}

endif;

?>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(){
	/* $("#submit").click(function(){
		 if(! $("input:").val().length === 0 ) {
        $("#light").show();
		$("#fade").show();
		}
	}); */

});
</script>
<?php 

//$_SESSION['name'] = "this is testing session";
//echo $_SESSION['name'];
?>

<script>
            function send() {
				
				var networth = document.getElementsByName("networth");
                if (! networth[0].checked == false) {
                } else if (! networth[1].checked == false) {
                } else if (! networth[2].checked == false) {
                } else if (! networth[3].checked == false) {
                } else {
                    alert("You must select Family office net worth");
                    return false;
                } 
				
                var fminvest = document.getElementsByName("fminvest");
                if (! fminvest[0].checked == false) {
                } else if (! fminvest[1].checked == false) {
                } else {
                    alert("You must select family office invest in real estate");
                    return false;
                }
				
				var privatequity = document.getElementsByName("privatequity");
                if (! privatequity[0].checked == false) {
                } else if (! privatequity[1].checked == false) {
                } else {
                    alert("You must select invest in private equity");
                    return false;
                } 
				
				var averagesize = document.getElementsByName("averagesize");
                if (! averagesize[0].checked == false) {
                } else if (! averagesize[1].checked == false) {
                } else if (! averagesize[2].checked == false) {
                } else if (! averagesize[3].checked == false) {
                } else {
                    alert("You must select average size of your private equity investments?");
                    return false;
                } 
				
				
                return true;
            }
 
</script>

<article id="inner-page-wrapper">
	<section class="container">
	<h1>Family Office Membership</h1>
	
	<?php 
		if(isset($_SESSION['autmess'])):
			echo $_SESSION['autmess'];
			unset($_SESSION['autmess']);
		endif;
	?>
	
	<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
	<ul class="personal-reg">
		<li><input type="text" value="" placeholder="First Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="fname" /></li>
		<li><input type="text" value="" placeholder="Last Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name:'" name="lname" /></li>
		<li><input type="email" value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" /></li>
		<li><input type="tel" value="" placeholder="Phone Number:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number:'" name="phone" /></li>
		<li><input type="text" value="" placeholder="Company:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company:'" name="company" /></li>
		<li><input type="text" value="" placeholder="Job Title:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Job Title:'" name="job" /></li>
	<li>	<input type="text" value="" placeholder="Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address:'" name="address" /></li>
	
	<li>	<input type="text" value="" placeholder="City:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City:'" name="city" /></li>
	<li>	<select name="state">
			<option value="">State</option>
			<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option>
		</select></li>
		<li><input type="text" value="" placeholder="Zip /Postal Code:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip / Postal Code:'" name="zipcode"/></li>
		
		
		<li>
		<select name="country" >
<option value="United States">United States</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
		</li>
		
		</ul>
		
		<ul class="uploadfile-reg">
		<li><span>Upload Company Logo </span> <div class="filetag"><input type="file" name="filea" id="picture"/></div> <small id="pic_small">No file Chosen</small>
		<p id="pic_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
			<p id="pic_error2" style="display:none; color:#FF0000;">Max file size should be 1MB.</p></li>
		</ul>
		
		<script>
  
		  document.getElementById('picture').onchange = uploadImage;
		  
		function uploadImage() {
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
			
			document.getElementById('pic_small').innerHTML = text;
		}
		</script>
	
		<ul class="uploadfile-reg">
		<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" type="file" name="fileb"  class="doc"/></div> <small id="docsmall">No file Chosen</small>
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
		
		
		<ul class="uploadfile-reg">
		<li><span>Upload Relevant Videos </span> <div class="filetag"><input id="videofile" type="file" name="filec"  class="video"/></div> <small id="videosmall">No file Chosen</small>
		<p id="video_error1" style="display:none; color:#FF0000;">Video formats should be MP4, MPV, AVI, MOV, WMV, 3GP.</p>
		<p id="video_error2" style="display:none; color:#FF0000;">Max file size should be 5MB.</p>
		</li>
		</ul>
		
		<script>
  
		  document.getElementById('videofile').onchange = uploadVid;

		function uploadVid() {
			var textvideo = this.value;
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
			  textvideo = filenames.join();
			}
			
			document.getElementById('videosmall').innerHTML = textvideo;
			
		}
		</script>
		
		
		<ul class="radio-reg">
	
		<h5>Areas of interest</h5>
	<li style="position:relative;"><input type="checkbox" name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked><input type="checkbox" name="areainterest[]" value="Private Equity">Private Equity</li>
		<li><input type="checkbox" name="areainterest[]" value="Real Estate">Real Estate</li>
		<li><input type="checkbox" name="areainterest[]" value="Estate Planning">Estate Planning</li>
		<li><input type="checkbox" name="areainterest[]" value="Hedge Funds">Hedge Funds</li>
		<li><input type="checkbox" name="areainterest[]" value="Hedge Funds">Legal Services</li>
		<li><input type="checkbox" name="areainterest[]" value="Venture Capital">Venture Capital</li>
		<li><input type="checkbox" name="areainterest[]" value="Insurance">Insurance</li>
		<li><input type="checkbox" name="areainterest[]" value="Direct Investment">Direct Investment</li>
		<li><input type="checkbox" name="areainterest[]" value="Accounting Services">Accounting Services</li>
		<li><input type="checkbox" name="areainterest[]" value="Joint Venture">Joint Venture</li>
		<li><input type="checkbox" name="areainterest[]" value="Luxury Goods">Luxury Goods</li>
		<li><input type="checkbox" name="areainterest[]" value="Events">Events</li>
		<li><input type="checkbox" name="areainterest[]" value="Travel">Travel</li>
		<li><input type="checkbox" name="areainterest[]" value="Financial Services">Financial Services</li>
		<li><input type="checkbox" name="areainterest[]" value="Philanthropy">Philanthropy</li>
		<li><input type="checkbox" name="areainterest[]" value="Health Care">Health Care</li>
		<li><input type="checkbox" name="areainterest[]" value="Education">Education</li>
		<li><input type="checkbox" name="areainterest[]" value="Bio Tech">Bio Tech</li>
		<li><input type="checkbox" name="areainterest[]" value="Sports">Sports</li>
		<li><input type="checkbox" name="areainterest[]" value="Alternative Energy">Alternative Energy</li>
		<li><input type="checkbox" name="areainterest[]" value="Art">Art</li>
		<li><input type="checkbox" name="areainterest[]" value="Oil Gas">Oil Gas</li>
		<li><input type="checkbox" name="areainterest[]" value="Yachting Boating">Yachting Boating</li>
		<li><input type="checkbox" name="areainterest[]" value="Mining">Mining</li>
		<li><input type="checkbox" name="areainterest[]" value="Employment">Employment</li>
		<li><input type="checkbox" name="areainterest[]" value="Technology">Technology</li>
		<li><input type="checkbox" name="areainterest[]" value="Private Jets">Private Jets</li>
		<li><input type="checkbox" name="areainterest[]" value="Consumer Goods">Consumer Goods</li>
		<li><input type="checkbox" name="areainterest[]" value="Transportations">Transportations</li>
		<li><input type="checkbox" name="areainterest[]" value="Cannabies">Cannabies</li>
		<li><input type="checkbox" name="areainterest[]" value="Aerospace & Defence">Aerospace & Defence</li>
		<li><input type="checkbox" name="areainterest[]" value="Others" id="otherbox">Others<input type="text" name="others" id="extrafied" placeholder="If other please Explain"/></li>
		<script>
			$(document).ready(function(){
				$("#otherbox").click(function(){
					$("#extrafied").slideToggle();
				});
			});
		</script>

		
			<ul class="radiobuttonreg">
		<h5>Family office net worth?<span>*</span></h5>
		<li><input type="radio" name="networth" value="Under 100 mil">Under 100 Mil</li>
		<li style="width:180px !important;"><input type="radio" name="networth" value="500 mil">100 Mil - 500 Mil</li>
		<li style="width:180px !important;"><input type="radio" name="networth" value="1 Bil">500 Mil - 1 Bil</li>
		<li><input type="radio" name="networth" value="1 Billion+">1 Billion +</li>
		</ul>
		
		<ul class="radiobuttonreg">
		<h5>Does you or your family office invest in real estate? <span>*</span></h5>
		<li><input type="radio" name="fminvest" value="Yes">Yes</li>
		<li><input type="radio" name="fminvest" value="No">No</li>
		</ul>
			<h5>If yes, what type of real estate transactions had your firm participated in? </h5>
		
	<li style="position:relative;"><input type="checkbox" name="estatetrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked><input type="checkbox" name="estatetrans[]" value="Commercial">Commercial</li>
		<li><input type="checkbox" name="estatetrans[]" value="Speculation">Speculation</li>
		<li><input type="checkbox" name="estatetrans[]" value="Residential">Residential</li>
		<li><input type="checkbox" name="estatetrans[]" value="Income Producing">Income Producing</li>
		<li><input type="checkbox" name="estatetrans[]" value="Land Development">Land Development</li>
		<li><input type="checkbox" name="estatetrans[]" value="REITS">REITS</li>
		<ul class="radiobuttonreg">
		<h5>Do you or your family office invest in private equity? <span>*</span></h5>
		<li><input type="radio" name="privatequity" value="Yes">Yes</li>
		<li><input type="radio" name="privatequity" value="No">No</li>
		</ul>
		
			<h5>If yes, what type of private equity transactions had your firm participated in? </h5>
	<li style="position:relative;"><input type="checkbox" name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked><input type="checkbox" name="firmtrans[]" value="Financial Services">Financial Services</li>
		<li><input type="checkbox" name="firmtrans[]" value="Oil / Gas">Oil / Gas</li>
		<li><input type="checkbox" name="firmtrans[]" value="Health Services">Health Services</li>
		<li><input type="checkbox" name="firmtrans[]" value="Technology">Technology</li>
		<li><input type="checkbox" name="firmtrans[]" value="Bio Tech">Bio Tech</li>
		<li><input type="checkbox" name="firmtrans[]" value="Consumer Goods">Consumer Goods</li>

		<ul class="radiobuttonreg">
			<h5>What is the average size of your private equity investments? <span>*</span></h5>
			<li><input type="radio" name="averagesize" value="Under 1 Mil">Under 1 Mil</li>
			<li><input type="radio" name="averagesize" value="1 Mil - 10 Mil">1 Mil - 10 Mil</li>
			<li><input type="radio" name="averagesize" value="10 Mil - 50 Mil">10 Mil - 50 Mil</li>
			<li><input type="radio" name="averagesize" value="50 Mil +">50 Mil +</li>
		</ul>
		
		<input type="Submit" value="SUBMIT" class="red-btn" id="submit" name="submit_membership"  onclick="return send();" />
	</form>

	
	</section>
</article>

<script>
$("#checkall .checkall").change(function () {
    $("#checkall input:checkbox").prop('checked', $(this).prop("checked"));
});

$('input[type="submit"]').prop("disabled", false);
var a=0;
var b=0;
//binds to onchange event of your input field
$('#picture').bind('change', function() {
	var text = this.value;
if ($('input:submit').attr('disabled',false)) {$('input:submit').attr('disabled',false);}	
var ext = $('#picture').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    { $('#pic_error1').slideDown("slow"); $('#pic_error2').slideUp("slow"); a=0;
	document.getElementById('pic_small').innerHTML ='No file Chosen';
} else { 
    var picsize = (this.files[0].size);
    if (picsize > 1048576 )
    { $('#pic_error2').slideDown("slow"); a=0;} else { a=1; $('#pic_error2').slideUp("slow"); }
$('#pic_error1').slideUp("slow");
if (a==1 && b==2) {$('input:submit').attr('disabled',false);

}
}
});



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
$(this).parent().find('small').hide();
}
}
});
 


$('input[type="submit"]').prop("disabled", false);
var a=0;
var b=0;
//binds to onchange event of your input field
$('.video').bind('change', function() {
if ($('input:submit').attr('disabled',false)) {$('input:submit').attr('disabled',false);}	
var extc = $('.video').val().split('.').pop().toLowerCase();
    if($.inArray(extc, ['mp4','avi','mpv','mov','wmv','3gp']) == -1)
    { $('#video_error1').slideDown("slow"); $('#video_error2').slideUp("slow"); a=0;
	document.getElementById('videosmall').innerHTML = 'No file Chosen';
} else { 
    var picsizec = (this.files[0].size);
    if (picsizec > 6242880 )
    { $('#video_error2').slideDown("slow"); a=0;} else { a=1; $('#video_error2').slideUp("slow"); }
$('#video_error1').slideUp("slow");
if (a==1 && b==2) {$('input:submit').attr('disabled',false);
$(this).parent().find('small').hide();
}
}
});  
</script>