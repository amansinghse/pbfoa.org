<?php
$t=$_SERVER['REQUEST_URI'];
$arr = explode('/', $_SERVER['REQUEST_URI']);
$lastArr = end($arr);
$social = $fn->SelectQuery("select * from social_links");
$menusData = $fn->SelectQuery("select * from menus WHERE parent='0' ORDER BY orderid ASC");
if($lastArr == 'index.php')
{
$title = $fn->SelectQuery("select * from home_content");
$meta_title = $title[0]['meta_title'];
$meta_des = $title[0]['meta_des'];
}
else
{
	$title = $fn->SelectQuery("select * from pages WHERE page_slug LIKE '$lastArr'");
	$meta_title = $title[0]['meta_title'];
	$meta_des = $title[0]['meta_des'];
}
  if($t != null)
	  { ?>
		<meta http-equiv="refresh" content="1,URL=<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/index.php">
	  <?php }
	  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $meta_title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $meta_des; ?>" />
<!--<meta name="keywords" content="<?php echo $resutl['	page_keywords']?>" />-->
<link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/css/lightbox.css" type="text/css" media="screen" />

<link href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="wonderplugin-gridgallery-engine-css-css" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/css/wonderplugingridgalleryengine.css" type="text/css" media="all">
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/jquery-1.3.2.js"></script>
<!--<script type="text/javascript" src="js/jquery.galleriffic.js"></script>-->

<!-- Optionally include jquery.history.js for history support -->
<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/jquery.history.js"></script>
<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/jquery.opacityrollover.js"></script>

<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/lightbox.js"></script>


<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#more_images ul.more_images li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});

				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#more_images').galleriffic({
					delay:                     2500,
					numThumbs:                 5,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#b_img',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          false,
					renderNavControls:         false,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.more_images').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>
</head>
<body>
	<article id="main_header_wrapper">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<header id="main_header">
			<section class="container">
			<figure class="logo">
			<a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/index.php"><img src="<?php echo WEBSITE_URL; ?>images/social_links/<?php echo $social[0]['site_logo']; ?>" alt="logo" />
			</a>
			</figure>
			<div id="menu-icon"><img src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/images/editor_hambuger_list_menu_view-128.png" alt="Menu" /></div>
				<nav class="main_nav">
					<ul id="menu-panel">
						<?php if($menusData) { foreach($menusData as $menus) {
							$SubmenuData = $fn->SelectQuery("select * from menus WHERE parent LIKE '".$menus['menu_title']."' ORDER BY orderid ASC ");
						?>
						<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/<?php echo $menus['menu_slug']; ?>"><?php echo $menus['menu_title']; ?></a>
						<?php if($SubmenuData) { echo '<ul>'; foreach($SubmenuData as $submenu) {
							echo '<li><a href="http://'. $_SERVER['SERVER_NAME'].'/'.$submenu['menu_slug'].'">'.$submenu['menu_title'].'</a></li>';
						 } echo '</ul>'; } ?>
						</li>
						<?php } } ?>
					</ul>
				</nav>
			</section>
		</header>

		<script>
			$(document).ready(function(){
				$("#menu-icon").click(function(){
					$("#menu-panel").slideToggle("slow");
				});
			});
		</script>
	</article>
