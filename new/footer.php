<footer id="footer-wrapper">
	<section class="container">
	
		<nav class="register"><h6>Membership</h6>
		<li><a href="page.php?page_id=58">Membership</a></li>
		</nav>
		
		<nav class="locations">
		<h6>Our Locations</h6>
			<li><a href="http://nycfoa.org">New York FON</a></li>
			<li><a href="http://hongkongfoa.org">Hong Kong FON</a></li>
			<li><a href="http://canadafoa.org">Canada FON</a></li>
			<li><a href="http://londonfoa.org/">London FON</a></li>
			<li><a href="http://pbfoa.org/">Palm Beach FON</a></li>
		</nav>
		
		<nav class="events">
		<h6>Events</h6>
			<li><a href="http://pbfoa.org/events/?post_type=tribe_events">Event Calendar</a></li>
			<li><a href="page.php?page_id=147">Current Events</a></li>
			<li><a href="http://pbfoa.org/events/?page_id=72">Event Photos & Videos</a></li>
			<!---<li><a href="page.php?page_id=46">Member Benefits</a></li>-->
			<li><a href="page.php?page_id=62">Sponsorship</a></li>
		</nav>
		
		<nav class="events">
		<h6>News</h6>
			<li><a href="page.php?page_id=143">Family Office News</a></li>
								<li><a href="page.php?page_id=144">White Papers</a></li>
								<li><a href="page.php?page_id=145">Press Releases</a></li>
								<li><a href="page.php?page_id=146">Luxury News</a></li>
								<li><a href="page.php?page_id=150">Submit to FON News</a></li>
		</nav>
		
		<nav class="service">
			<h6>Service Provider</h6>
			<li><a href="directory/?page_id=63">List Your Company</a></li>
		</nav>
		
		<nav class="luxury">
		<h6>Luxury</h6>
	
		
		<!---	<li><a href="page.php?page_id=50">Automotive</a></li>
			<li><a href="page.php?page_id=51">Aviation</a></li>
			<li><a href="page.php?page_id=52">Culinary</a></li>
			<li><a href="page.php?page_id=53">Fashion</a></li>
			<li><a href="page.php?page_id=54">Homes</a></li>
			<li><a href="page.php?page_id=55">Travel</a></li>		
			<li><a href="page.php?page_id=56">Liquor</a></li>
			<li><a href="page.php?page_id=57">Technology</a></li> --->
		</nav>
	
		<nav class="about">
			<h6>About</h6>
			<!--<li><a href="page.php?page_id=4">Our Mission<a></li>-->
			<li><a href="page.php?page_id=48">Our Team<a></li>
			<li><a href="page.php?page_id=44">In The News</a></li>
			<li><a href="page.php?page_id=47">Our Members<a></li>
			<li><a href="http://familyofficenetworks.com/?page_id=962" target="_blank">Blog</a></li>
			<li><a href="page.php?page_id=41">FAQ<a></li>
		</nav>

		<nav class="contact">
			<h6>Contact Us</h6>
			<li><a href="page.php?page_id=42">Contact Us</a></li>
		</nav>
		
		<section class="footer-bottom">
			<figure class="footer-logo">
				<img src="images/pbfoa-footer-logo.jpg" alt="Pbfoa logo" />
				<a href="http://www.familyofficenetworks.com" target="_blank"><img src="images/fon-footer-logo.jpg" alt="FON logo" />
			</figure>
			<figure class="copyright">
				<figcaption>
					<a href="https://www.facebook.com/FamilyOfficeNetworks" target="_blank"><img src="images/facebook.jpg" alt="icon" /></a>
					<a href="https://www.linkedin.com/company/the-family-office-networks" target="_blank"><img src="images/linkedin.jpg" alt="icon" /></a>
					<a href="https://twitter.com/FamilyOfficeNet" target="_blank"><img src="images/twitter.jpg" alt="icon" /></a>
					<a href="#"><img src="images/googleplus.jpg" alt="icon" /></a>
				</figcaption>
				<figcaption>
				<p>&copy; <?php echo date('Y');?> Family Office Networks. All Rights Reserved</p>
				</figcaption>
			</figure>
		</section>
		
	</section>
</footer>
<script>
var all = document.body.getElementsByTagName("*");
for (var i = 0; i < all.length; i++) {
    if (jQuery('body').outerWidth() < jQuery(all[i]).outerWidth()) {
        console.log(all[i]);
    }
}
</script>
</body>
</html>
