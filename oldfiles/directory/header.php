<?php $id = $_REQUEST['page_id'];
			include("../includes/config.php");			
			include_once("../includes/function.php");
			if($id!='')
			{
				$q="Select * from `cms_pages` WHERE page_id=$id";
			}
			else
			{
				$q="Select * from `cms_pages` WHERE page_id=23";	
			}
			$qr=mysql_query($q); 
			$resutl  = mysql_fetch_array($qr);
			//print_r($resutl);
if ( ! session_id() ) @ session_start();			
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php if(isset($pagetitle_custom)){echo $pagetitle_custom; }else{ echo $resutl['page_title']; }?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $resutl['page_metatags']?>" />
<meta name="keywords" content="<?php echo $resutl['	page_keywords']?>" />

<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/jquery-1.3.2.js"></script>
<!--<script type="text/javascript" src="../js/jquery.galleriffic.js"></script>-->

<!-- Optionally include jquery.history.js for history support -->
<script type="text/javascript" src="../js/jquery.history.js"></script>
<script type="text/javascript" src="../js/jquery.opacityrollover.js"></script>

</head>
<body>
	<article id="main_header_wrapper">
		<header id="main_header">
			<section class="container">	
			<figure class="logo" style="margin-top:30px;">	
			<a href="../index.php"><img src="../images/Japan_top.png" alt="logo" />
			</a>	
			</figure>
			<div id="menu-icon"><img src="../images/editor_hambuger_list_menu_view-128.png" alt="Menu" /></div>
				<nav class="main_nav">	
					<ul id="menu-panel">
						<li><a href="../page.php?page_id=58">Membership</a></li>
						
						<li><a href="http://pbfoa.org/events/?post_type=tribe_events">Events</a>
							<ul>
								<li><a href="http://pbfoa.org/events/?post_type=tribe_events">Event Calendar</a></li>
								<li><a href="../page.php?page_id=147">Current Events</a></li>
								<li><a href="http://pbfoa.org/events/?page_id=72">Event Photos & Videos</a></li>
								<li><a href="../page.php?page_id=62">Sponsorship</a></li>
							</ul>
						</li>
						
						<li><a href="../page.php?page_id=143">News</a>
							<ul>
								<li><a href="../page.php?page_id=143">Family Office News</a></li>
								<li><a href="../page.php?page_id=144">White Papers</a></li>
								<li><a href="../page.php?page_id=145">Press Releases</a></li>
								<li><a href="../page.php?page_id=146">Luxury News</a></li>
								<li><a href="../page.php?page_id=49">Submit to FON News</a></li>
							</ul>
						</li>
						
						<li class="services_provider_menu"><a href="http://pbfoa.org/directory">Service Providers</a>
							<ul class="serv_prov_drosown"> 
								<ul>
								<li><a href="http://pbfoa.org/directory/?page_id=64">Accounting Firms </a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=67">Futures/Forex Brokerage </a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=71">Govt/Regulatory/Agency/Assoc</a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=73">Health Insurance</a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=76">Automated Fund Tax Calculations</a></li>
								
								<li class="list_company_btn"><a href="http://pbfoa.org/directory/?page_id=63">LIST YOUR COMPANY </a></li>
								</ul>

								<ul>
								<li><a href="http://pbfoa.org/directory/?page_id=82">Broker-Dealers </a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=84">Cash Management </a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=109"> Prime Brokers</a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=88">Charitable Organizations</a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=90">Class Action Services</a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=137">Multi Family Office </a></li>
								<li><a href="http://pbfoa.org/directory/?page_id=89">IRA Custodian</a></li>
								<li><a href="directory/">View all Services Providers </a></li>
								</ul>

								<ul>
								<li><h3>Featured Service Provider</h3></li>
								<li><img src="http://pbfoa.org/images/company_logo.png" alt="logo" /></li>
								<li class="partner_li">PBFOA Partners<br />
								Level 6, 301 George Street<br />
								Palm Beach, Florida 33458</li>

								<li class="partner_li">info@pbfoa.com<br />
								www.pbfoa.com<br />
								689.672.8901</li>
								</ul>
							</ul>
						</li>
						
						<li><a href="../page.php?page_id=146">Luxury</a>
						<!---	<ul>
								<li><a href="../page.php?page_id=50">Automotive</a></li>
								<li><a href="../page.php?page_id=51">Aviation</a></li>
								<li><a href="../page.php?page_id=52">Culinary</a></li>
								<li><a href="../page.php?page_id=53">Fashion</a></li>
								<li><a href="../page.php?page_id=54">Homes</a></li>
								<li><a href="../page.php?page_id=55">Travel</a></li>
								<li><a href="../page.php?page_id=56">Liquor</a></li>
								<li><a href="../page.php?page_id=57">Technology</a></li>
							</ul> -->
						</li>
						
						<li class="location_menu"><a href="../page.php?page_id=36">Our Locations</a>
							<!--- <ul>
								<li><a href="http://nycfoa.org">New York Family Office Association</a></li>
								<li><a href="http://hongkongfoa.org">Hong Kong Family Office Association</a></li>
								<li><a href="http://canadafoa.org">Canada Family Office Association</a></li>
								<li><a href="http://londonfoa.org/">London Family Office Association</a></li>
								<li><a href="http://pbfoa.org/">Palm Beach Family Office Association</a></li>
							</ul>--->
						</li>
						<li><a href="../page.php?page_id=48">About Us</a>
							<ul>
							<li><a href="../page.php?page_id=148">Our Mission<a></li>
								<li><a href="../page.php?page_id=48">Our Team</a></li>
								<li><a href="../page.php?page_id=44">In The News</a></li>
								<li><a href="../page.php?page_id=47">Our Members</a></li>
								<li><a href="http://familyofficenetworks.com/?page_id=962" target="_blank">Blog</a></li>
								<li><a href="../page.php?page_id=41">FAQ</a></li>
							</ul>
						</li>		

						<li><a href="../page.php?page_id=42">Contact Us</a></li>						
					</ul>	
				</nav>
			</section>
			<script>
			$(document).ready(function(){
				$("#menu-icon").click(function(){
					$("#menu-panel").slideToggle("slow");
				});
			});
		</script>
		</header>
	</article>
	<div class="inner_banner"></div>
	 
	