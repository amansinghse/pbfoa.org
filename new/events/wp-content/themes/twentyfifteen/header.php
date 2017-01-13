<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
	<script src="http://pbfoa.org/js/jquery-1.9.1.min.js"></script>
	
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<article id="main_header_wrapper">
		<header id="main_header">
			<section class="container">	
			<figure class="logo">		
			<a href="http://pbfoa.org/"><img src="http://pbfoa.org/images/pbfoa_logo.png" alt="logo" />
			</a>	
			</figure>
			
				<div id="menu-icon"><img src="http://pbfoa.org/images/editor_hambuger_list_menu_view-128.png" alt="Menu" /></div>
				<nav class="main_nav">	
					<ul id="menu-panel">
						<li><a href="http://pbfoa.org/page.php?page_id=58">Membership</a></li>
						
						<li><a href="http://pbfoa.org/events/?post_type=tribe_events">Events</a>
							<ul>
								<li><a href="http://pbfoa.org/events/?post_type=tribe_events">Event Calendar</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=147">Current Events</a></li>
								<li><a href="http://pbfoa.org/events/?page_id=72">Event Photos & Videos</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=62">Sponsorship</a></li>
							</ul>
						</li>
						
						<li><a href="http://pbfoa.org/page.php?page_id=143">News</a>
							<ul>
								<li><a href="http://pbfoa.org/page.php?page_id=143">Family Office News</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=144">White Papers</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=145">Press Releases</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=146">Luxury News</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=49">Submit to FON News</a></li>
							</ul>
						</li>
						
						<li class="services_provider_menu"><a href="http://pbfoa.org/directory/">Service Providers</a>
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
						
						<li><a href="http://pbfoa.org/page.php?page_id=50">Luxury</a>
						</li>
						
						<li class="location_menu"><a href="http://pbfoa.org/page.php?page_id=36">Our Locations</a>
							
						</li>
						
						<li><a href="http://pbfoa.org/page.php?page_id=48">About Us</a>
							<ul>
							<li><a href="http://pbfoa.org/page.php?page_id=148">Our Mission<a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=48">Our Team</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=44">In The News<a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=47">Our Members</a></li>
								<li><a href="http://familyofficenetworks.com/?page_id=962" target="_blank">Blog</a></li>
								<li><a href="http://pbfoa.org/page.php?page_id=41">FAQ</a></li>
							</ul>
						</li>		

					<li><a href="http://pbfoa.org/page.php?page_id=42">Contact Us</a></li>						
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
	
	<div class="inner_banner page_id_59"></div>
	
	