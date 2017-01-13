<?php
if(! session_id()): @ session_start(); endif; 
/* if(isset($_POST['bronze'])){
	$_SESSION['membershipship'] = $_POST['bronze'];
}elseif(isset($_POST['silver'])){
	$_SESSION['membershipship'] = $_POST['silver'];
}elseif(isset($_POST['gold'])){
	$_SESSION['membershipship'] = $_POST['gold'];
} */
?> 
<article id="inner-page-wrapper">
	<section class="container">
	
	<h1 class="entry-title">Member Benefits</h1>
	
	<section id="packages">
<figure class="packages-box">
<h2 class="free">Free</h2>

<ul>
	<li>Discounts for best in class industry professionals.</li>
	<li>Listing in the PBFOA directory</li>
	<li>Discounts to industry events (both domestically and globally).</li>
	<li>Free access to family office webinars.</li>
	<li>Use of the PBFOA logo on your website and other marketing materials.</li>
	<li>May include the term PBFOA Member&acirc; &euro; &trade; in their signature.</li>
	<li>Receive our weekly newsletters.</li>
	<li>Receive educational materials and whitepapers.</li>
	<li>May utilize a link to PBFOA website on their website.</li>
	
	<?php 
		if(! session_id()): @ session_start(); endif; 
		$dcryp = "abdj39?0@92hfs@aj834&932@383jsfdk284329kdfndfj3398sdkf932^**%%%%";
		$key = md5($dcryp);
		$_SESSION['acceskey'] = $key;
	?>
	<form action="http://pbfoa.org/thank_membership.php?success_key=<?php echo $key; ?>&&package_key=free" method="post">
		<input type="submit" class="free-btn signup-btn" value="Sign up">
	</form>

</ul>
</figure>

<figure class="packages-box">
<h2 class="bronze">Bronze $1995/year</h2>

<ul>
	<li>Free admission to all exclusive PBFOA events.</li>
	<li>Personal introductions.</li>
	<li>Membership included for 1-2 employees.</li>
	<li>Discounts for best in class industry professionals.</li>
	<li>Listing in the PBFOA directory</li>
	<li>Discounts to industry events (both domestically and globally).</li>
	<li>Free access to family office webinars.</li>
	<li>Use of the PBFOA logo on your websites or other marketing materials.</li>
	<li>May include the term &acirc; &euro; &tilde; PBFOA Member &acirc; &euro; &trade; in their signature.</li>
	<li>Receive our weekly newsletters.</li>
	<li>Receive educational materials and whitepapers.</li>
	<li>May utilize a link to PBFOA website on their website.</li>
	
	<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">!-->
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="business" value="hedgefof@gmail.com">
		<input type="hidden" name="item_name_1" value="Bronze">
		<input type="hidden" name="amount_1" value="1995">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="bronze" value="bronze">
		<input type="hidden" name="shopping_url" value="http://pbfoa.org/">
		<input type="hidden" name="return" value="http://pbfoa.org/thank_membership.php?success_key=<?php echo $key; ?>">
		<input type="submit" class="bronze-btn signup-btn" name="bronze" value="Sign up">
	</form>

</ul>
</figure>

<figure class="packages-box">
<h2 class="silver">Silver $3995/year</h2>

<ul>
	<li>Includes membership to PBFOA and two additional cities; Palm Beach, Naples, Washington D.C., New York City, Connecticut, Boston, Chicago, Denver, Texas, Seattle, Portland, San Francisco, Los Angeles, San Diego, London, Geneva, Singapore, Hong Kong(as well as other global participants).</li>
	<li>Membership for 3-4 employees.</li>
	<li>Free admission to all exclusive PBFOA events.</li>
	<li>Receive personal introductions.</li>
	<li>Free membership for 1-2 additional employees.</li>
	<li>Discounts to industry events (both domestically and globally).</li>
	<li>Free access to family office webinars.</li>
	<li>Use of the PBFOA logo on their websites or other marketing materials.</li>
	<li>May include the term &acirc; &euro; &tilde; PBFOA Member &acirc; &euro; &trade; in their signature.</li>
	<li>Receive our weekly newsletters.</li>
	<li>Receive educational materials and whitepapers.</li>
	<li>May utilize a link to PBFOA website on their website.</li>
	
	<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">!-->
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="business" value="hedgefof@gmail.com">
		<input type="hidden" name="item_name_1" value="Silver">
		<input type="hidden" name="amount_1" value="3995">
		<input type="hidden" name="silver" value="silver">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="shopping_url" value="http://pbfoa.org/">
		<input type="hidden" name="return" value="http://pbfoa.org/thank_membership.php?success_key=<?php echo $key; ?>">
		<input type="submit" class="silver-btn signup-btn" name="silver" value="Sign up">
	</form>
	
</ul>
</figure>

<figure class="packages-box">
<h2 class="gold">Gold $7995/year</h2>

<ul> 
	<li>Access to all associations within the FON community; Palm Beach, Naples, Washington D.C., New York City, Connecticut, Boston, Chicago, Denver, Texas, Seattle, Portland, San Francisco, Los Angeles and San Diego, London, Geneva, Singapore, Hong Kong (as well as other global participants).</li>
	<li>Membership for 5-7 additional employees.</li>
	<li>Membership for 3-4 employees.</li>
	<li>Free admission to all exclusive PBFOA events.</li>
	<li>Receive personal introductions.</li>
	<li>Discounts to best in class industry professionals.</li>
	<li>Discounts to industry events (both domestically and globally).</li>
	<li>Free access to family office webinars.</li>
	<li>Use of the PBFOA logo on your websites or other marketing materials.</li>
	<li>May include the term &acirc; &euro; &tilde; PBFOA Member &acirc; &euro; &trade; in their signature.</li>
	<li>Receive our weekly newsletters.</li>
	<li>Receive educational materials and whitepapers.</li>
	<li>May utilize a link to PBFOA website on their website.</li>
	
	<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">!-->
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="business" value="hedgefof@gmail.com">
		<input type="hidden" name="item_name_1" value="Gold">
		<input type="hidden" name="amount_1" value="7995">
		<input type="hidden" name="gold" value="gold">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="shopping_url" value="http://pbfoa.org/">
		<input type="hidden" name="return" value="http://pbfoa.org/thank_membership.php?success_key=<?php echo $key; ?>">
		<input type="submit" class="gold-btn signup-btn" name="gold" value="Sign up">
	</form>
 
</ul>
</figure>
</section>
 
	</section>
</article>

