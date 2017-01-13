<?php
	$pagetitle_custom = "Gold Membership";
	include('header.php');
	require_once('connection.php');
	
 ?>

<article id="inner-page-wrapper">
	<section class="container">
<section class="register_area">
 
		<form method="post" enctype="multipart/form-data" >
		<h1>About You (Contact Person)</h1>
			<label>First Name<sup>*</sup><br />
			<input type="text" name="fname"  />
			</label>
			
			<label>Last Name<br />
			<input type="text" name="lname" />
			</label>
			
			<label>Position (Job Title)<sup>*</sup><br />
			<input type="text" name="jobtitle" />
			</label>
			
			
			<h1>Company Information</h1>
			
			
			<label>Company Name<br />
			<input type="text" name="cname" />
			</label>
			
			<label>Category<sup>*</sup><br />
				<select name="categories" > 
					<option value="">Select a category</option>
					<?php $pages_query = mysql_query('SELECT * FROM cms_pages WHERE page_parent=63');
							while($page_row = mysql_fetch_array($pages_query)){
								echo '<option value="'.$page_row['page_id'].'">'.$page_row['page_title'].'</option>';
						}?>
				</select>
			</label>
			
			<label>Phone Number<br />
			<input type="text" name="phone" />
			</label>
			
			<label>Fax Number<br />
			<input type="text" name="fax" />
			</label>
			
			
			<label>Address Line 1<sup>*</sup><br />
			<input type="text" name="addressa" />
			</label>
			
			<label>Address Line 1<br />
			<input type="text" name="addressb" />
			</label>
			
			<label>City/Town<sup>*</sup><br />
			<input type="text" name="city"  />
			</label>
			
			<label>State/Province<sup>*</sup><br />
			<input type="text" name="state"  />
			</label>
			
			<label>Postal Code / Zip Code<sup>*</sup><br />
			<input type="text" name="zip" />
			</label>
			
			
			<label>Country<sup>*</sup><br />
			<select name="country" required>
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
			</label>
			
			<label>Company Email<sup>*</sup><br />
			<input type="text" name="companyemail" />
			</label>
			
			<label>Company Website<br />
			<input type="text" name="companyweb" />
			</label>
			
			<label>Twitter Page<br />
			<input type="text" name="tiwtter" />
			</label>
			
			<label>Facebook Page<br />
			<input type="text" name="facebook" />
			</label>
			
			<label>LinkedIn Page<br />
			<input type="text" name="linkedin" />
			</label>

			<label>Google+ Page<br />
			<input type="text" name="googleplus" />
			</label>

	<label class="full">Company Bio (* text only, no html codes) - limited to 1500 characters. <span class="char_limit"></span><br />
			
			<textarea id="textarea" name="company_bio" placeholder="Company bio goes here..." maxlength="1500" ></textarea>
			
			</label>
			<div class="full"></div>
			<h1 >Upload Your Logo</h1>
			<label class="full">
			
			<input type="file" name="upload_pic" id="picture"/>
			<p id="pic_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
			<p id="pic_error2" style="display:none; color:#FF0000;">Max file size should be 1MB.</p>

			</label>
			
			
			
			<!---<h1>Login Information</h1>
			
			<label>Email Address<sup>*</sup><br />
			<input type="text" name="loginemail" />
			</label>
			
			<label>Password<sup>*</sup><br />
			<input type="password" name="password"  />
			</label>
			
			<div class="full"></div>
			<h1>Opt-In</h1>
			<br style="clear:both; display:block; width:100%; "/>
			<p>Would you like more information about <strong>Family Offices™</strong> our liquid alternatives platform?</p>
			
			<label class="full radio">
			<li>
			<input type="radio" name="group1" value="Yes" checked /><span><strong>Yes</strong></span>
			</li>
			<li>
			<input type="radio" name="group1" value="No" /><span><strong>No</strong></span>
			</li>
			</label> --->
			
			
			
			
			<label class="full trem_area"><input type="checkbox" name="accterm" /><span><strong>I accept the Terms & Conditions<sup>*</sup></span></strong></label>
			
			
			<label class="full"><input type="submit" name="submit_gold" value="Submit Listing" /></label>
		</form>
	</section>

<script>
$('#textarea').keypress(function(e) {
    var tval = $('#textarea').val(),
        tlength = tval.length,
        set = 1500,
        remain = parseInt(set - tlength);
    $('.char_limit').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#textarea').val((tval).substring(0, tlength - 1))
    }
})

</script>








<?php 

include "connection.php";

if(isset($_POST['submit_gold'])){
 $fname = mysqli_real_escape_string($con,$_POST['fname']);
 $lname = mysqli_real_escape_string($con,$_POST['lname']);
 $jobtitle = mysqli_real_escape_string($con,$_POST['jobtitle']);
 $cname = mysqli_real_escape_string($con,$_POST['cname']);
 $categories = mysqli_real_escape_string($con,$_POST['categories']);
 $phone = mysqli_real_escape_string($con,$_POST['phone']);
 $fax = mysqli_real_escape_string($con,$_POST['fax']);
 $addressa = mysqli_real_escape_string($con,$_POST['addressa']);
 $addressb = mysqli_real_escape_string($con,$_POST['addressb']);
 $city = mysqli_real_escape_string($con,$_POST['city']);
 $state = mysqli_real_escape_string($con,$_POST['state']);
 $zip = mysqli_real_escape_string($con,$_POST['zip']);
 $country = mysqli_real_escape_string($con,$_POST['country']);
 $companyemail = mysqli_real_escape_string($con,$_POST['companyemail']);
 $companyweb = mysqli_real_escape_string($con,$_POST['companyweb']);
 $tiwtter = mysqli_real_escape_string($con,$_POST['tiwtter']);
 $facebook = mysqli_real_escape_string($con,$_POST['facebook']);
 $linkedin = mysqli_real_escape_string($con,$_POST['linkedin']);
 $googleplus = mysqli_real_escape_string($con,$_POST['googleplus']);
 $company_bio = mysqli_real_escape_string($con,$_POST['company_bio']);
 //$loginemail = mysqli_real_escape_string($con,$_POST['loginemail']);
 //$password = mysqli_real_escape_string($con,$_POST['password']);
 //$opt = mysqli_real_escape_string($con,$_POST['group1']);
$date = date("y-m-d");
 
 $chars 		="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
		$code   =mysqli_real_escape_string($con,substr(str_shuffle($chars), 0, 15));
 

					  $filename = $_FILES['upload_pic']['tmp_name'];
					  if(filesize($filename) >100){
						  echo "is there";
						}
					 is_uploaded_file($_FILES['upload_pic']['tmp_name']);
						if (file_exists("../images/company_logos/" . $_FILES["upload_pic"]["name"]))
							{
								$temp = explode(".",$_FILES["upload_pic"]["name"]);
								$fileName = rand(1,99999) . '.' .end($temp);
								$fileTempName = $_FILES['upload_pic']['tmp_name'];  
								$path = "../images/company_logos/";
								$upload_pic = $path.$fileName;
								move_uploaded_file($fileTempName, $upload_pic);
							}else{
					  $fileName = basename($_FILES['upload_pic']['name']); 
					  $fileTempName = $_FILES['upload_pic']['tmp_name'];  
					  $path = "../images/company_logos/";
					  $upload_pic = $path.$fileName;
					  move_uploaded_file($fileTempName, $upload_pic);
					  }  
					  
					  
					  
					  
					$package_series=1;  
					$_SESSION['firstname']=$_POST['fname'];  
					$_SESSION['useremaily']=$_POST['companyemail'];  
					$_SESSION['price']= 4995.00;  
					  
					  

					  $_SESSION['save_result'] = "INSERT INTO services_provider(fname,lname,job_title,company_name,category,phone,fax,address,addressb,city,state,zip,country,company_email,companyweb,tiwtter,facebook,linkedin,googleplus,company_bio,date,file,package_series) VALUES('$fname','$lname','$jobtitle','$cname','$categories','$phone','$fax','$addressa','$addressb','$city','$state','$zip','$country','$companyemail','$companyweb','$tiwtter','$facebook','$linkedin','$googleplus','$company_bio','$date','$upload_pic','$package_series')";	
					  
					  $_SESSION['active_key'] = $code;
					  if(! $_SESSION['save_result']){echo "not error here";}else{
					  
					  
					  //$user_query = mysqli_query($con, $user_data_insert);
					  //if($user_query){echo "insert";}else{echo "not insert".mysqli_error($con);}
					  include('paypal.php');
					  
					  ?>
					  
							 <script>
					  //window.location ="";
					  </script>	
								
					  
					  <?php  

				mysqli_close($con);
}
 }
	
?> 
</section>
			</article>
<script>
$('input[type="submit"]').prop("disabled", false);
var a=0;
var b=0;
//binds to onchange event of your input field
$('#picture').bind('change', function() {
if ($('input:submit').attr('disabled',false)) {$('input:submit').attr('disabled',true);}	
var ext = $('#picture').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    { $('#pic_error1').slideDown("slow"); $('#pic_error2').slideUp("slow"); a=0;} else { 
    var picsize = (this.files[0].size);
    if (picsize > 100000 )
    { $('#pic_error2').slideDown("slow"); a=0;} else { a=1; $('#pic_error2').slideUp("slow"); }
$('#pic_error1').slideUp("slow");
if (a==1 && b==2) {$('input:submit').attr('disabled',false);}
}
});
</script>

<?php include('footer.php'); ?>