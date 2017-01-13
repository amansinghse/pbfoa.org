<?php
error_reporting(0);
ini_set("display_errors", 0); ?>
	  <?php include('header.php')?>	
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/owl.transitions.css" rel="stylesheet">

		<div id="main_banner">
		<div id="owl-demo" class="owl-carousel">
                <div class="item" style="background:url(images/home-banner-1.jpg) no-repeat center top; background-size:cover;"></div>
                <div class="item" style="background:url(images/home-banner-2.jpg) no-repeat center top; background-size:cover;"></div>
                <div class="item" style="background:url(images/home-banner-3.jpg) no-repeat center top; background-size:cover;"></div>
                <div class="item" style="background:url(images/home-banner-4.jpg) no-repeat center top; background-size:cover;"></div>
                <div class="item" style="background:url(images/home-banner-5.jpg) no-repeat center top; background-size:cover;"></div>
          </div>
			<div class="home_banner_content_wrapper">
				<div class="home_banner_content">
					<h3><?php get_post_desc('145'); ?></h3>
					<a href="page.php?page_id=58" class="slider_btn">Be A Part of Our Family!!</a> 
				</div>
			</div>
          </div>
		  <script src="js/jquery-1.9.1.min.js"></script> 
			<script src="js/owl.carousel.js"></script>
			<link href="css/animate.css" type="">


    <script>
    $(document).ready(function() {
		
		$(document).ready(function() {

      var owl = $("#owl-demo");
        owl.owlCarousel({
        //navigation : true,
        autoPlay: 10000,
		rewindNav:true,
        singleItem : true,
		loop:true,
        transitionStyle : "fade"
      });

      //Select Transtion Type
      $("#transitionType").change(function(){
        var newValue = $(this).val();

        //TransitionTypes is owlCarousel inner method.
        owl.data("owlCarousel").transitionTypes(newValue);

        //After change type go to next slide
        owl.trigger("owl.next");
      });
    });
    });


    </script>
		  
	  <article id="member_wrapper">				
	  <section class="container">
		
		
	  <h1>How We Serve Our Members</h1>					
		<?php how_we_serv('7'); ?>				
	  </section>			
	  </article>	


	  <article id="events_wrapper">				
	  <section class="container">				
	  <figure class="left_content">					
	  <h2><a href="http://pbfoa.org/events/?post_type=tribe_events&eventDisplay=list">Upcoming Events</a><br/><span>All Family Office Events</span></h2>
	  <?php upcoming_section('56'); ?>
	  <div class="customNavigation">
                <a class="btn prev">Previous</a>
                <a class="btn next">Next</a>
              </div>
	   <script>
    $(document).ready(function() {
      $("#owl-event-upcoming").owlCarousel({
        autoPlay: false,
		rewindNav:false,
		dots:false,
		dotsContainer:false,
		loop:false,
		   rewindSpeed: 0,
        items : 2,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [979,2],
		itemsMobile : [479,1]

		
      });
	  
	  var owl = $("#owl-event-upcoming");
	  // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })
	  

    });
	
	function moved() {
    var owl = $(".owl-carousel").data('owlCarousel');
    if (owl.currentItem + 1 === owl.itemsAmount) {
        alert('THE END');
    }
}

    </script>
	  
	  
	  <style>
		#owl-event-upcoming .item img{max-width:98%; margin:0px auto; height:auto; }
		$owl-event-upcoming .owl-pagination{display:none!important; }
		.customNavigation{text-align:right; }
		.customNavigation a{float:none!important;  display:inline-block; }
	  </style>
	  </figure>		
	  
	  <figure class="right_content">					
	  <h2>Interview with<br/><span>Andrew Schneider / CEO & Founder of FON</span></h2>										
	  <figcaption><?php get_post_desc('12'); ?></figcaption>					
	  </figure>				
	  </section>			
	  </article>						
	  <article id="services_wrapper">				
	  <section class="container">					
		  <figure class="left_content">						
			  <figcaption class="service_provider">							
					<?php get_post('13'); ?>
			  </figcaption>												
			  <figcaption class="events_photos">							
			  <h4>FON Events Photos / Videos</h4>							
					<div class="event-gallery">
						<?php get_post_desc('135'); ?>
					</div>
					
			  </figcaption>																
		  </figure>										
	  <figure class="right_content">						
	  <figcaption class="newsletter-subs">							
	  <img src="images/fon-newsletter-head.jpg" alt="FON Newsletter" />	
	  <form method="post" enctype="multipart/form-data" id="newsletter">
		<li><input type="email" value=""  placeholder="Your Email.." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email..'" name="email" reqiured/> 
		</li>							
		<li><input type="text" value="" placeholder="Your Name.." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name..'"  name="name" reqiured/></li>
		<li><input type="submit" value="Subscribe Now!" class="red-btn" name="newsletter"/></li>
	  </form>
		<?php
			if(isset($_POST['newsletter'])):
			
			include('PHPMailerAutoload.php');
			include('class.phpmailer.php');
			include('class.smtp.php');
			
			$message = '
				<html>
				<head>
				  <title>Newsletter Subscribe</title>
				</head>
				<body>
				  <p>New Newsletter Subscriber</p>
				  <table border="1" style="border-collapse: collapse; border:1px solid #ddd; width:450px; text-align: left; text-indent: 5px; line-height: 40px;">
					<tr style="border-collapse: collapse; border:1px solid #ddd; ">
					  <th style="border-collapse: collapse; border:1px solid #ddd; ">Name</th><th style="border-collapse: collapse; border:1px solid #ddd;"> Email </th>
					</tr>
					<tr style="border-collapse: collapse; border:1px solid #ddd;">
					  <td style="border-collapse: collapse; border:1px solid #ddd;">'.$_POST['name'].'</td><td style="border-collapse: collapse; border:1px solid #ddd; ">'.$_POST['email'].'</td>
					</tr>
				  </table>
				</body>
				</html>
				';
				
			$username = $_POST["name"];
			$usermail = $_POST["email"];

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Debugoutput = 'html';
			$mail->Host = "relay-hosting.secureserver.net";
			$mail->setFrom(''.$usermail.'', ''.$username.'');
			$mail->addAddress('andrew@familyofficenetworks.com', 'Andrew');
			$mail->addAddress('steven@familyofficenetworks.com', 'Steven');
			$mail->Subject = 'Newsletter Subscribe';
			$mail->msgHTML($message);
			$mail->AltBody = 'This is a plain-text message body';
			
			if($mail->send()){ ?>
			<!--<div class="notification success png_bg">
				
				<div></div>
			</div>!-->
			
					<script>
						alert("Thank you for Newsletter Subscription.");
						$("#newsletter")[0].reset();
					</script>
				
				
			<?php } endif; ?>
	  <p><img src="images/lock-icon.jpg" alt="icon" align="absmiddle"/> We will NEVER share or sell your info.</p>						
	  </figcaption>												
	  
	  <figcaption class="newsletter-subs">							
	  <img src="images/fon-luxury-newsletter-head.jpg" alt="FON Newsletter" />
	  <form method="post" enctype="multipart/form-data" id="newsletter">							
		<li><input type="email" value=""  placeholder="Your Email.." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email..'" name="email" reqiured/> 
		</li>							
		<li><input type="text" value="" placeholder="Your Name.." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name..'"  name="name" reqiured/></li>							
		<li><input type="submit" value="Subscribe Now!" class="red-btn" name="luxurynewsletter"/></li>
	  </form>

		<?php
			if(isset($_POST['luxurynewsletter'])):
			
			include('PHPMailerAutoload.php');
			include('class.phpmailer.php');
			include('class.smtp.php');
			
			$email = $_POST['email'];
			$name = $_POST['name'];
			$message = '
				<html>
				<head>
				  <title>Luxury Newsletter Subscribe</title>
				</head>
				<body>
				  <p>New Luxury Newsletter Subscriber</p>
				  <table border="1" style="border-collapse: collapse; border:1px solid #ddd; width:450px; text-align: left; text-indent: 5px; line-height: 40px;">
					<tr style="border-collapse: collapse; border:1px solid #ddd; ">
					  <th style="border-collapse: collapse; border:1px solid #ddd; ">Name</th><th style="border-collapse: collapse; border:1px solid #ddd;"> Email </th>
					</tr>
					<tr style="border-collapse: collapse; border:1px solid #ddd;">
					  <td style="border-collapse: collapse; border:1px solid #ddd;">'.$_POST['name'].'</td><td style="border-collapse: collapse; border:1px solid #ddd; ">'.$_POST['email'].'</td>
					</tr>
				  </table>
				</body>
				</html>
				';
				
				$username = $_POST["name"];
				$usermail = $_POST["email"];

				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Debugoutput = 'html';
				$mail->Host = "relay-hosting.secureserver.net";
				$mail->setFrom(''.$usermail.'', ''.$username.'');
				$mail->addAddress('andrew@familyofficenetworks.com', 'Andrew');
				$mail->addAddress('steven@familyofficenetworks.com', 'Steven');
				$mail->Subject = 'Luxury Newsletter Subscribe';
				$mail->msgHTML($message);
				$mail->AltBody = 'This is a plain-text message body';
			if($mail->send()){ ?>
			
					<script>
						alert("Thank you for Newsletter Subscription.");
						$("#newsletter")[0].reset(); 
					</script> 
				
				
			<?php } endif; ?>
	  
	  <p><img src="images/lock-icon.jpg" alt="icon" align="absmiddle"/> We will NEVER share or sell your info.</p>						
	  </figcaption>											
	  </figure>				
	  </section>			
	  </article>						
	  <article id="team_wrapper">				
	  <section class="container">					
		  <figure class="team-member key-team">					
			  <img src="images/key-members.png" alt="key team"/>						
			  <p>The Palm Beach Family Asscociation is led by and advised by experts in a wide variety of fields.</p>						
		  <img src="images/key-team.png" alt="key team"/>											</figure>	
	  <?php featured_team('26,27,30'); ?>
	  					
	  </section>
	  </article>	  	  
        <div id="main_data_div" style="display:none;">
       	  <div id="lft_data">
           	<?php 
			if($id!='')
			{
				$query ="Select * from `cms_pages` WHERE page_parent=$id";
			}else{$query ="Select * from `cms_pages` WHERE page_parent=23";}
			
			$subpages=mysql_query($query); 
			//$sub_pages  = mysql_fetch_array($subpages);
			
			if(mysql_num_rows($subpages)>0)
			{
				echo '<div id="side_nav"><ul>';
				while($qrow=mysql_fetch_array($subpages,MYSQL_ASSOC))
				{
					echo '<li class="h18"><a href="index.php?page_id='.$qrow['page_id'].'">-'.$qrow['page_title'].'</a></li>';
				}
				echo '</ul></div><br /><br />';
				
			}
			?>
			<?php //echo stripslashes($resutl['left_content']);
			echo htmlspecialchars_decode($resutl['left_content'], ENT_NOQUOTES);

			?>
          </div>


          <div id="right_data">
			
			<?php if($resutl['page_type']=='gallery') { include('gallery.php');}?>
            <?php echo $resutl['page_content']?>
          </div>
            
            
            
			<div class="clr"></div>
        </div>
		<?php include('footer.php')?>