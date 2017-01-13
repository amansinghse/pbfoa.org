<?php
	function how_we_serv($catname){
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$catname' LIMIT 6");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
				<figure class="serve-box">
					<a href="page.php?page_id=58"><h3><img src="images/posts/<?php echo $row['post_image']; ?>" alt="icon" border="0"/> <br />
					<?php echo $row['post_title']; ?></h3></a>
			</figure>
			<?php }
		}
	}
	
	function get_post_desc($post_id){
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE post_id='$post_id'");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ 
				echo htmlspecialchars_decode($row['post_desc']); 

			 }
		}
	}
	
	function get_post($post_id){
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE post_id='$post_id'");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ 
				if($row['post_image']){ ?>
					<img src="images/posts/<?php echo $row['post_image']; ?>" alt="Palm Beach Office Building" />
				<?php }
				echo "<h4>".$row['post_title']."</h4>"; 
				echo htmlspecialchars_decode($row['post_desc']); 

			 }
		}
	}
	
	
	function faq($faq){
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$faq' ORDER BY post_id ASC");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
				<button class="accordion"><?php echo $row['post_title']; ?></button>
				<div class="panel">
				 <?php echo htmlspecialchars_decode($row['post_desc']); ?>
				</div>

<?php		}
		}
	}
	
	function contact_sidebar($contact){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$contact' ORDER BY post_id DESC");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
		<figure class="contact-office">
		<h3><?php echo $row['post_title']; ?></h3>
		<img src="images/posts/<?php echo $row['post_image']; ?>" alt="Palm Beach Office Building" />
		
		<?php echo htmlspecialchars_decode($row['post_desc']);  ?>
		</figure>

<?php		}
		}
	}	
	
function featured_news($featured_news){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$featured_news' LIMIT 2");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="featured-news">
			<figure class="news-video">
			<?php echo htmlspecialchars_decode($row['post_short']);  ?>
			</figure>
			<figure class="featured-newscontent">
			<h2><?php echo $row['post_title']; ?></h2>
				<?php echo htmlspecialchars_decode($row['post_desc']); ?>
			</figure>
</figure>
<?php		}
		}
	}
	 
function news_section($news){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$news' ORDER BY post_id DESC");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="news-listing">
				<img src="images/posts/<?php echo $row['post_image']; ?>" alt="News Image" />
				<h2><?php echo $row['post_title']; ?></h2>
				<?php echo htmlspecialchars_decode($row['post_desc']); ?>
			</figure>

<?php		}
		}
	}
	
	function event_section($currentevents){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$currentevents'");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="event-listing">
				<img src="images/posts/<?php echo $row['post_image']; ?>" alt="News Image" />
			</figure>

<?php		}
		}
	}
	
	function upcoming_section($upcoming){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$upcoming' LIMIT 6");
		if($selectcat){
			echo '<div id="owl-event-upcoming">';
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="item">
				<a href="http://pbfoa.org/events/?post_type=tribe_events&eventDisplay=list"><img src="images/posts/<?php echo $row['post_image']; ?>" alt="News Image" /></a>
			</figure>

<?php		}
			echo '</div>';
		}
	}
	
	function white_section($whitepapers){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$whitepapers'");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="papers-listing">
				<img src="images/posts/<?php echo $row['post_image']; ?>" alt="News Image" />
			</figure>

<?php		}
		}
	}
	
	
		 
function locations_pbfoa($loc){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$loc'");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<?php echo htmlspecialchars_decode($row['post_desc']); ?>
<?php		}
		}
	}
	 
	function featured_team($featured_team){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE post_id IN ($featured_team) ORDER BY post_id ASC");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="team-member home_team_member">
				<a href="http://pbfoa.org/page.php?page_id=48">
				<div style="background:url(images/posts/<?php echo $row['post_image']; ?>) no-repeat right top;  background-size:cover; width:191px; height:191px; display:block; margin:0px auto 13px auto; border-radius: 50%;"></div>
				<h5><?php echo $row['post_title']; ?></h5></a>
				<?php echo htmlspecialchars_decode($row['post_short']); ?>
			</figure>
<?php		}
		}
	}	
	
	function pbfoa_team($team){ 
		$selectcat = mysql_query("SELECT * FROM manage_posts WHERE cate_id='$team' ORDER BY post_id ASC");
		if($selectcat){
			while($row=mysql_fetch_array($selectcat)){ ?>
			<figure class="team_page">
			<img src="images/posts/<?php echo $row['post_image']; ?>" class="list_prev" alt="Speakr Img"/>
				<h3 class="list_prev"><?php echo $row['post_title']; ?></h3>
				<figcaption><?php echo htmlspecialchars_decode($row['post_desc']); ?></figcaption>
			</figure>
<?php		}
		}
	}
	
	
?>