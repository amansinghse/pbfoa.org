<script>
  function OpenWindow(){
    for(i=0;i<document.FormName["RB1"].length;i++){
      if(document.FormName["RB1"][i].checked){
    window.open(document.FormName["RB1"][i].value);
    break;
  }
}
  }
</script>

<article id="inner-page-wrapper">
	<section class="container">
	<h1>Membership</h1>
<section class="membership">
		<h5>Which one best describes you? <span>*</span></h5>
	<form name="FormName">
	
	<figure class="membership-box seprator">
	<h3>Family Offices</h3>
	<!--<p>When you register with the PBFOA, you’re joining one of the most powerful organizations for promoting wealth preservation and education. You also gain access to a host of networking opportunities for you, your family and your company.</p>!-->
	<input type="radio" name="RB1" value="http://pbfoa.org/page.php?page_id=59" checked>
	</figure>
	
	<figure class="membership-box last-box">
	<h3>Asset Managers</h3>
	<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque magna eros, luctus eu quam vel, hendrerit cursus orci. Phasellus ut augue lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>!-->
	<input type="radio" name="RB1" value="http://pbfoa.org/page.php?page_id=60">
	</figure>
    
<figure class="membership-box seprator">
<h3>Service Providers</h3>
	<!--<p>If you would like to list your company in our service provider directory register here.</p>!-->
<input type="radio" name="RB1" value="http://pbfoa.org/page.php?page_id=61">

</figure>
<figure class="membership-box last-box">
<h3>Other Membership</h3>
	<!--<p>If you would like to list your company in our service provider directory register here.</p>!-->
<input type="radio" name="RB1" value="http://pbfoa.org/page.php?page_id=149">

</figure>

<div style="clear:both; display:block;"></div>
<input type="button" value="Next" name="butt" onclick="OpenWindow()">
  </form>
		
</section>

	</section>
</article>