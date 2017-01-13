<?php require_once("class/class.functions.php");
$fn = new Functions();
 if(isset($_REQUEST['signout'])){
 $fn->SignOut();}
$footer = $fn->SelectQuery("select * from footer_settings WHERE id=1");
$homeDes = $fn->SelectQuery("select * from home_content order by id DESC");
$event = $fn->SelectQuery("select * from events where event_date >= CURDATE() && event_active LIKE 'Yes' order by event_id DESC");
/*
			echo '<pre>';
			print_r($event);
			echo '</pre>';*/
//error_reporting(0);
//ini_set("display_errors", 0); ?>
	  <?php include('header.php')?>
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/owl.transitions.css" rel="stylesheet">
		<?php
			$slider_data=$fn->SelectQuery("select * from home_banners order by orderid");
		?>
		<div id="main_banner">
		<div id="owl-demo" class="owl-carousel">
			<?php if($slider_data) { foreach($slider_data as $slider){ ?>
                <div class="item" style="background:url(home_banners/<?php echo $slider['imagefull'];?>) no-repeat center top; background-size:cover;">
					<div class="home_banner_content_wrapper">
						<div class="home_banner_content">
							<h3><?php echo $slider['banner_desc']; ?></h3>
							<a href="<?php echo $slider['url']; ?>" class="slider_btn">Be A Part of Our Family!!</a>
						</div>
					</div>
			</div>
			<?php } } else { ?>
                <div class="item" style="background:url(images/home-banner-1.jpg) no-repeat center top; background-size:cover;">
					<div class="home_banner_content_wrapper">
						<div class="home_banner_content">
							<h3></h3>
							<a href="" class="slider_btn">Be A Part of Our Family!!</a>
						</div>
					</div>
				</div>
			<?php } ?>
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

		<?php
			$mem_data=$fn->SelectQuery("select * from home_member order by id DESC");
		?>
	  <article id="member_wrapper">
		  <section class="container">
			<h1>How We Serve Our Members</h1>
			<?php if($mem_data) { foreach($mem_data as $membrs) { ?>
			<figure class="serve-box">
				<a href=""><h3 style="margin: 0px auto; width: 100%;"><img src="images/home_member/<?php echo $membrs['image']; ?>" alt="<?php echo $membrs['image_alt']; ?>" title="<?php echo $membrs['image_title']; ?>" border="0"> <br>
				<?php echo $membrs['title']; ?></h3></a>
			</figure>

			<?php } } ?>
		  </section>
	  </article>


	  <article id="events_wrapper">
	  <section class="container">
	  <figure class="left_content">
	  <h2><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/upcoming-events">Upcoming Events</a><br/><span>All Family Office Events</span></h2>
	  <div id="owl-event-upcoming">
		<?php if($event) { foreach($event as $events) { ?>
			<figure class="item">
				<a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/upcoming-events"><img src="images/events/<?php echo $events['event_secondary'];?>" alt="Event Secondary"/></a>
			</figure>
		<?php } } ?>
		</div>
	  <div class="customNavigation">
                <a class="btn prev">Previous</a>
                <a class="btn next">Next</a>
              </div>
	   <script>
    $(document).ready(function() {
      $("#owl-event-upcoming").owlCarousel({
        autoPlay: true,
		rewindNav:true,
		dots:false,
		dotsContainer:false,
		loop:true,
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
	 <?php echo $homeDes[0]['interview']; ?>
	  </figure>
	  </section>
	  </article>
<?php echo $homeDes[0]['description']; ?>
<?php /*
	  <article id="services_wrapper">
	  <section class="container">
		  <figure class="left_content">
			  <figcaption class="service_provider">

			  </figcaption>
			  <figcaption class="events_photos">
			  <h4>FON Events Photos / Videos</h4>
					<div class="event-gallery">

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
	  </article>*/ ?>


		<?php
			$team_data=$fn->SelectQuery("select * from home_team order by id DESC LIMIT 0,3");
		?>
	  <article id="team_wrapper">
	  <section class="container">
		  <figure class="team-member key-team">
			  <img src="images/key-members.png" alt="key team"/>
			  <p>The Palm Beach Family Asscociation is led by and advised by experts in a wide variety of fields.</p>
		  <img src="images/key-team.png" alt="key team"/>
		  </figure>
		  <?php if($mem_data) { foreach($team_data as $team) { ?>
	  		<figure class="team-member home_team_member">
				<a href="">
				<div style="background:url(images/home_team/<?php echo $team['image']?>) no-repeat right top;  background-size:cover; width:191px; height:191px; display:block; margin:0px auto 13px auto; border-radius: 50%;"></div>
				<h5><?php echo $team['title']; ?></h5></a>
				<p><?php echo $team['des']; ?></p>
			</figure>
		  <?php } } ?>
	  </section>
	  </article>
		<?php include('footer.php')?>
