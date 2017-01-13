 <?php require_once("class/class.functions.php");
$fn = new Functions();
include('header.php');
      $t=$_SERVER['REQUEST_URI'];
	  $page = explode('/', $_SERVER['REQUEST_URI']);
	  $page_slug = end(array_filter($page));
	  $page_data=$fn->SelectQuery("select * from pages where page_slug LIKE '".$page_slug."'");
	  $footer = $fn->SelectQuery("select * from footer_settings WHERE id=1");

	  if($page_slug == 'myadmin ' || $_REQUEST['page_id'] == 'myadmin')
	  { ?>
		<meta http-equiv="refresh" content="1,URL=<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/myadmin/index.php">
	  <?php 
	  }
	  
	
	  
	  if($page_slug == 'about-us ' || $_REQUEST['page_id'] == 'about-us')
	  { 
		?>
		<script>location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/team.php"</script>
	  <?php 
		  }
	  
	   if($page_slug == 'team ' || $_REQUEST['page_id'] == 'team')
	  { 
		?>
		<script>location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/team.php"</script>
	  <?php 
	  }
	  
	  if($page_slug == 'event-photos-and-videos')
	  { ?>
  <!--  event photo and videos -->
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/wonderplugingallery.js"></script>
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/wonderplugingridlightbox.js"></script>
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/js/wonderplugingridgallery.js"></script>
		<article id="member_wrapper">
		<section class="container">
			<div class="innerPages" id="page-<?php echo $page_slug; ?>" style="margin: 14% auto 2%; float:left;width:100%;text-align:left;">
				<h1><?php echo $page_data[0]['page_title']; ?></h1>
					<p><?php echo $page_data[0]['page_detail']; ?></p>
				<div class="featured-events-gallery">
					<style type="text/css">.html5gallery-box-2{float:left!important; width:49%!important; } .html5gallery-car-2{float:right!important; position:relative!important; top:0px!important; width:49%!important;  height:377px;} .html5gallery-box-2 .html5gallery-elem-2, .html5gallery-box-2 .html5gallery-elem-img-2 {max-width:100%;} .html5gallery-title-2{max-width:100%; top:auto!important; bottom:0px; } .html5gallery-box-2 img{max-width:100%!important; height:auto!important; } .html5gallery-car-2 div{max-width:100%; left:0px!important; margin-left:0px!important; } .html5gallery-elem-img-2 img{top:0px!important; } .html5gallery-tn-img-2{opacity:1!important; }</style><div class="wonderplugingallery-container" id="wonderplugingallery-container-2" style="max-width:1150px;margin:0 auto;"><div class="wonderplugingallery" id="wonderplugingallery-2" data-galleryid="2" data-width="1150" data-height="375" data-skin="mediapage" data-autoslide="true" data-autoplayvideo="false" data-html5player="true" data-responsive="true" data-fullwidth="false" data-showtitle="true" data-showdescription="true" data-showplaybutton="true" data-showfullscreenbutton="true" data-showtimer="true" data-showcarousel="true" data-galleryshadow="false" data-slideshadow="false" data-thumbshowtitle="false" data-thumbshadow="false" data-lightboxshowtitle="true" data-lightboxshowdescription="true" data-specifyid="true" data-donotinit="false" data-addinitscript="false" data-duration="1500" data-slideduration="1000" data-slideshowinterval="6000" data-googleanalyticsaccount="" data-resizemode="fill" data-imagetoolboxmode="mouseover" data-effect="fade" data-padding="0" data-bgcolor="" data-bgimage="" data-thumbwidth="270" data-thumbheight="183" data-thumbgap="10" data-thumbrowgap="10" data-lightboxtextheight="72" data-lightboxtitlecss="{color:#333333; font:bold 12px Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; line-height:18px;}" data-lightboxdescriptioncss="{color:#333333; font:normal 12px Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; line-height:14px;}" data-titlecss="{color:#ffffff; font-size:14px; font-family:Armata, sans-serif, Arial; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background:rgba(102, 102, 102, 0.6);}" data-descriptioncss="{color:#ffffff; font-size:12px; font-family:Armata, sans-serif, Arial; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background:rgba(102, 102, 102, 0.6);}" data-jsfolder="http://pbfoa.org/events/wp-content/plugins/wonderplugin-gallery/engine/" style="display: block; position: relative; max-width: 100%; width: 1150px; height: 500px;"><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13417608_1138710786170234_7814269820479988855_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13417608_1138710786170234_7814269820479988855_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13435466_1138715746169738_516719716731747583_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13435466_1138715746169738_516719716731747583_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://www.youtube.com/embed/UdRbqJgrbOM" data-poster="http://img.youtube.com/vi/UdRbqJgrbOM/0.jpg" style="display: none;"><img class="html5galleryimg" src="http://img.youtube.com/vi/UdRbqJgrbOM/1.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13418881_1138715639503082_7515182054060492242_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13418881_1138715639503082_7515182054060492242_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13413713_1138715739503072_3096444493798479541_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13413713_1138715739503072_3096444493798479541_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13413745_1138710919503554_2002668531244939573_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13413745_1138710919503554_2002668531244939573_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13418920_1138715742836405_3253624997757511623_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13418920_1138715742836405_3253624997757511623_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13428586_1138710872836892_1722790661974627546_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13428586_1138710872836892_1722790661974627546_n-250x250.jpg" alt="Miami Family Office Association: Mandarin Oriental 2016" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><div class="html5gallery-container-2" style="width: 1150px; height: 500px;"><div class="html5gallery-box-2" style="width: 1150px; height: 375px;"><div class="html5gallery-elem-2" style="width: 1150px; height: 375px;"><div class="html5gallery-elem-img-2" style="display: block; position: absolute; overflow: hidden; width: 1150px; height: 375px; left: 0px; margin-left: 0px; top: 0px; margin-top: 0px;"><img class="html5gallery-elem-image-2" style="border:none; position:absolute; opacity:inherit; filter:inherit; padding:0px; margin:0px; left:0px; top:-169px; max-width:none; max-height:none; width:1150px; height:713px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13418881_1138715639503082_7515182054060492242_n.jpg"><div class="html5gallery-watermark-2" style="display:none;"></div></div><div class="html5gallery-loading-2"></div><div class="html5gallery-loading-2"></div></div><div class="html5gallery-title-2" style="width: 1150px; display: none;"><div class="html5gallery-title-text-2">Miami Family Office Association: Mandarin Oriental 2016</div><div class="html5gallery-description-text-2"><span>14/06/16</span></div></div><div class="html5gallery-timer-2" style="width: 278px; top: 373px;"></div><div class="html5gallery-viral-2" style="top: 0px;"></div><div class="html5gallery-toolbox-2" style="display: none;"><div class="html5gallery-toolbox-bg-2"></div><div class="html5gallery-toolbox-buttons-2"><div class="html5gallery-play-2" style="top: 320px; left: 1054px; display: none;"></div><div class="html5gallery-pause-2" style="top: 320px; left: 1054px; display: none;"></div><div class="html5gallery-left-2" style="top: 164px; display: block;"></div><div class="html5gallery-right-2" style="top: 164px; left: 1102px; display: block;"></div><div class="html5gallery-lightbox-2" style="top: 320px; left: 1102px; display: none;"></div></div></div></div><div class="html5gallery-car-2" style="width: 1150px; top: 399px;"><div class="html5gallery-car-list-2" style="width: 1142px;"><div class="html5gallery-car-mask-2" style="left: 151px; width: 840px;"><div class="html5gallery-thumbs-2" style="margin-left: 20px; width: 1150px;"><div id="html5gallery-tn-2-0" class="html5gallery-tn-2" data-index="0"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13417608_1138710786170234_7814269820479988855_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-1" class="html5gallery-tn-2" data-index="1"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13435466_1138715746169738_516719716731747583_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-2" class="html5gallery-tn-2" data-index="2"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:203px;" src="http://img.youtube.com/vi/UdRbqJgrbOM/1.jpg"></div><div class="html5gallery-tn-img-play-2" style="display:block; overflow:hidden; position:absolute; width:100%;height:100%; top:0px; left:0px;background:url(&quot;http://pbfoa.org/events/wp-content/plugins/wonderplugin-gallery/engine/skins/mediapage/playvideo.png&quot;) no-repeat center center;"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-3" class="html5gallery-tn-selected-2" data-index="3"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13418881_1138715639503082_7515182054060492242_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-4" class="html5gallery-tn-2" data-index="4"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13413713_1138715739503072_3096444493798479541_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-5" class="html5gallery-tn-2" data-index="5"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13413745_1138710919503554_2002668531244939573_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-6" class="html5gallery-tn-2" data-index="6"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13418920_1138715742836405_3253624997757511623_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div id="html5gallery-tn-2-7" class="html5gallery-tn-2" data-index="7"><div class="html5gallery-tn-img-2" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-2" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13428586_1138710872836892_1722790661974627546_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-2">Miami Family Office Association: Mandarin Oriental 2016</div></div><div style="clear:both;"></div></div></div><div class="html5gallery-car-slider-bar-2"><div class="html5gallery-car-slider-bar-top-2"></div><div class="html5gallery-car-slider-bar-middle-2"></div><div class="html5gallery-car-slider-bar-bottom-2"></div></div><div class="html5gallery-car-left-2" style="background-position: -64px 0px; display: block;"></div><div class="html5gallery-car-right-2" style="background-position: 0px 0px; display: block;"></div><div class="html5gallery-car-slider-2"></div></div></div></div></div></div>		</div>
				<div class="featured-events-gallery">
					<style type="text/css">.html5gallery-box-3{max-width:49%!important; float:left!important;  }   .html5gallery-elem-img-3, .html5gallery-elem-3, .html5gallery-elem-img-3, .html5gallery-elem-img-3 img{max-width:100%!important; }  .html5gallery-elem-img-3 img{max-width:100%!important;  height:auto!important; top:0px!important;  }  .html5gallery-car-3{max-width:49%!important; float:right!important; position:relative!important; top:0px!important;   }  .html5gallery-car-list-3, .html5gallery-car-mask-3, .html5gallery-thumbs-3{max-width:100%!important; left:0px!important; margin-left:0px!important;  }  .html5gallery-title-3{max-width:100%; top:auto!important; bottom:0px!important; }</style><div class="wonderplugingallery-container" id="wonderplugingallery-container-3" style="max-width:1150px;margin:0 auto;"><div class="wonderplugingallery" id="wonderplugingallery-3" data-galleryid="3" data-width="1150" data-height="375" data-skin="mediapage" data-autoslide="true" data-autoplayvideo="false" data-html5player="true" data-responsive="true" data-fullwidth="false" data-showtitle="true" data-showdescription="true" data-showplaybutton="true" data-showfullscreenbutton="true" data-showtimer="true" data-showcarousel="true" data-galleryshadow="false" data-slideshadow="false" data-thumbshowtitle="false" data-thumbshadow="false" data-lightboxshowtitle="true" data-lightboxshowdescription="true" data-specifyid="true" data-donotinit="false" data-addinitscript="false" data-duration="1500" data-slideduration="1000" data-slideshowinterval="6000" data-googleanalyticsaccount="" data-resizemode="fill" data-imagetoolboxmode="mouseover" data-effect="fade" data-padding="0" data-bgcolor="" data-bgimage="" data-thumbwidth="270" data-thumbheight="183" data-thumbgap="10" data-thumbrowgap="10" data-lightboxtextheight="72" data-lightboxtitlecss="{color:#333333; font:bold 12px Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; line-height:18px;}" data-lightboxdescriptioncss="{color:#333333; font:normal 12px Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; line-height:14px;}" data-titlecss="{color:#ffffff; font-size:14px; font-family:Armata, sans-serif, Arial; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background:rgba(102, 102, 102, 0.6);}" data-descriptioncss="{color:#ffffff; font-size:12px; font-family:Armata, sans-serif, Arial; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background:rgba(102, 102, 102, 0.6);}" data-jsfolder="http://pbfoa.org/events/wp-content/plugins/wonderplugin-gallery/engine/" style="display: block; position: relative; max-width: 100%; width: 1150px; height: 500px;"><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13450243_1138710639503582_5659827014962695809_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13450243_1138710639503582_5659827014962695809_n-250x250.jpg" alt="Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://www.youtube.com/embed/UdRbqJgrbOM" data-poster="http://img.youtube.com/vi/UdRbqJgrbOM/0.jpg" style="display: none;"><img class="html5galleryimg" src="http://img.youtube.com/vi/UdRbqJgrbOM/1.jpg" alt="Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13450203_1138710646170248_5531594632421051665_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13450203_1138710646170248_5531594632421051665_n-250x250.jpg" alt="Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13445366_1138710772836902_3095106156883444857_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13445366_1138710772836902_3095106156883444857_n-250x250.jpg" alt="Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><a href="http://pbfoa.org/events/wp-content/uploads/2016/06/13442120_1138710642836915_451908404009275215_n.jpg" data-mediatype="1" style="display: none;"><img class="html5galleryimg" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13442120_1138710642836915_451908404009275215_n-250x250.jpg" alt="Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks" data-description="&lt;span&gt;14/06/16&lt;/span&gt;"></a><div class="html5gallery-container-3" style="width: 1150px; height: 500px;"><div class="html5gallery-box-3" style="width: 1150px; height: 375px;"><div class="html5gallery-elem-3" style="width: 1150px; height: 375px;"><div class="html5gallery-elem-img-3" style="display: block; position: absolute; overflow: hidden; width: 1150px; height: 375px; left: 0px; margin-left: 0px; top: 0px; margin-top: 0px;"><img class="html5gallery-elem-image-3" style="border:none; position:absolute; opacity:inherit; filter:inherit; padding:0px; margin:0px; left:0px; top:-187px; max-width:none; max-height:none; width:1150px; height:750px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13445366_1138710772836902_3095106156883444857_n.jpg"><div class="html5gallery-watermark-3" style="display:none;"></div></div></div><div class="html5gallery-title-3" style="width: 1150px;"><div class="html5gallery-title-text-3">Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks</div><div class="html5gallery-description-text-3"><span>14/06/16</span></div></div><div class="html5gallery-timer-3" style="width: 278px; top: 373px;"></div><div class="html5gallery-viral-3" style="top: 0px;"></div><div class="html5gallery-toolbox-3"><div class="html5gallery-toolbox-bg-3"></div><div class="html5gallery-toolbox-buttons-3"><div class="html5gallery-play-3" style="top: 320px; left: 1054px;"></div><div class="html5gallery-pause-3" style="top: 320px; left: 1054px;"></div><div class="html5gallery-left-3" style="top: 164px;"></div><div class="html5gallery-right-3" style="top: 164px; left: 1102px;"></div><div class="html5gallery-lightbox-3" style="top: 320px; left: 1102px;"></div></div></div></div><div class="html5gallery-car-3" style="width: 1150px; top: 399px;"><div class="html5gallery-car-list-3" style="width: 1142px;"><div class="html5gallery-car-mask-3" style="left: 151px; width: 840px;"><div class="html5gallery-thumbs-3" style="margin-left: 20px; width: 1150px;"><div id="html5gallery-tn-3-0" class="html5gallery-tn-3" data-index="0"><div class="html5gallery-tn-img-3" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-3" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13450243_1138710639503582_5659827014962695809_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-3">Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks</div></div><div id="html5gallery-tn-3-1" class="html5gallery-tn-3" data-index="1"><div class="html5gallery-tn-img-3" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-3" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:203px;" src="http://img.youtube.com/vi/UdRbqJgrbOM/1.jpg"></div><div class="html5gallery-tn-img-play-3" style="display:block; overflow:hidden; position:absolute; width:100%;height:100%; top:0px; left:0px;background:url(&quot;http://pbfoa.org/events/wp-content/plugins/wonderplugin-gallery/engine/skins/mediapage/playvideo.png&quot;) no-repeat center center;"></div></div><div class="html5gallery-tn-title-3">Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks</div></div><div id="html5gallery-tn-3-2" class="html5gallery-tn-3" data-index="2"><div class="html5gallery-tn-img-3" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-3" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13450203_1138710646170248_5531594632421051665_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-3">Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks</div></div><div id="html5gallery-tn-3-3" class="html5gallery-tn-selected-3" data-index="3"><div class="html5gallery-tn-img-3" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-3" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13445366_1138710772836902_3095106156883444857_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-3">Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks</div></div><div id="html5gallery-tn-3-4" class="html5gallery-tn-3" data-index="4"><div class="html5gallery-tn-img-3" style="position:relative;"><div style="display:block; overflow:hidden; position:absolute; width:270px;height:183px; top:0px; left:0px;"><img class="html5gallery-tn-image-3" style="border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:270px; height:270px;" src="http://pbfoa.org/events/wp-content/uploads/2016/06/13442120_1138710642836915_451908404009275215_n-250x250.jpg"></div></div><div class="html5gallery-tn-title-3">Miami Family Office Association Cocktail Reception at the Mandarin Oriental. -Family Office Networks</div></div><div style="clear:both;"></div></div></div><div class="html5gallery-car-slider-bar-3"><div class="html5gallery-car-slider-bar-top-3"></div><div class="html5gallery-car-slider-bar-middle-3"></div><div class="html5gallery-car-slider-bar-bottom-3"></div></div><div class="html5gallery-car-left-3" style="background-position: -64px 0px; display: block;"></div><div class="html5gallery-car-right-3" style="background-position: 0px 0px; display: block;"></div><div class="html5gallery-car-slider-3"></div></div></div></div></div></div>		</div>
			</div>

		</section
	<!-- end of event photo and videos -->
		</article>
<?php
	  }
	  else
	  {
		?>
	  <article id="member_wrapper">				
		  <section class="container">
			<div class="innerPages" id="page-<?php echo $page_slug; ?>" style="margin: 14% auto 2%; float:left;width:100%;text-align:left;">
				<h1><?php echo $page_data[0]['page_title']; ?></h1>
				<p><?php echo $page_data[0]['page_detail']; ?></p>
				<?php 
				$newSlug = explode('?', $page_slug);
				$newslg = current($newSlug);
				if($page_slug == 'membership' || $newslg == 'membership') { 
					  $page = explode('?', $_SERVER['REQUEST_URI']);
					  $page1 = explode('=', $page[1]);
					  $page_slug1 = end(array_filter($page1));
					  $page_slug2 = current(array_filter($page1));
					  if($page_slug2 != 'plan') {
				?>
					<form name="FormName" id="FormNameMem" action="" method="POST">
						<figure class="membership-box seprator">
							<h3>Family Offices</h3>
							<input name="RB1" value="family_ofc" type="radio">
						</figure>
						<figure class="membership-box last-box">
							<h3>Asset Managers</h3>
							<input name="RB1" value="asset_managers" type="radio">
						</figure>
						<figure class="membership-box seprator">
							<h3>Service Providers</h3>
							<input name="RB1" value="service_provider" type="radio">
						</figure>
						<figure class="membership-box last-box">
							<h3>Other Membership</h3>
							<input name="RB1" value="other" type="radio">
						</figure>
						<div style="clear:both; display:block;"></div>
						<input value="Next" name="NxtMemberbutt" id="NxtMember" type="submit">
					</form>
					  <?php 
						if(isset($_POST['NxtMemberbutt']))
						{
							echo $_REQUEST['RB1'];
							?>
							
								<meta http-equiv="refresh" content="0,URL=<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/membership?plan=<?php echo $_POST['RB1']; ?>">
							<?php
						}
					  }
					  
						if($page_slug1 == 'family_ofc') { ?>
					<div id="family_ofc">
						<h1>Family Office Membership</h1>
						<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
							<ul class="personal-reg">
								<li>
									<input value="" placeholder="First Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="fname" type="text">
								</li>
								<li>
									<input value="" placeholder="Last Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name:'" name="lname" type="text">
								</li>
								<li>
									<input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" type="email">
								</li>
								<li>
									<input value="" placeholder="Phone Number:  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number:  '" name="phone" type="tel" >
								</li>
								<li>
									<input value="" placeholder="Company:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company:'" name="company" type="text">
								</li>
								
								<li><input value="" placeholder="Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address:'" name="address" type="text"></li>
								<li><input value="" placeholder="City:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City:'" name="city" type="text"></li>
								<li><select name="state">
								<option value="">State</option>
								<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option>
								</select></li>
								<li><input value="" placeholder="Zip /Postal Code:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip / Postal Code:'" name="zipcode" type="text"></li>
								<li>
								<select name="country">
								<option value="United States">United States</option>
								<option value="Afganistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bonaire">Bonaire</option>
								<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Canary Islands">Canary Islands</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Channel Islands">Channel Islands</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Island">Cocos Island</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote DIvoire">Cote D'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Curaco">Curacao</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Ter">French Southern Ter</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Great Britain">Great Britain</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea North">Korea North</option>
								<option value="Korea Sout">Korea South</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Malawi">Malawi</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Midway Islands">Midway Islands</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Nambia">Nambia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherland Antilles">Netherland Antilles</option>
								<option value="Netherlands">Netherlands (Holland, Europe)</option>
								<option value="Nevis">Nevis</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau Island">Palau Island</option>
								<option value="Palestine">Palestine</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Phillipines">Philippines</option>
								<option value="Pitcairn Island">Pitcairn Island</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Republic of Montenegro">Republic of Montenegro</option>
								<option value="Republic of Serbia">Republic of Serbia</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="St Barthelemy">St Barthelemy</option>
								<option value="St Eustatius">St Eustatius</option>
								<option value="St Helena">St Helena</option>
								<option value="St Kitts-Nevis">St Kitts-Nevis</option>
								<option value="St Lucia">St Lucia</option>
								<option value="St Maarten">St Maarten</option>
								<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
								<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
								<option value="Saipan">Saipan</option>
								<option value="Samoa">Samoa</option>
								<option value="Samoa American">Samoa American</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia">Serbia</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Tahiti">Tahiti</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Erimates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States of America">United States of America</option>
								<option value="Uraguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City State">Vatican City State</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								<option value="Wake Island">Wake Island</option>
								<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
								<option value="Yemen">Yemen</option>
								<option value="Zaire">Zaire</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
								</select>
								</li>
								</ul>
								<ul class="uploadfile-reg">
								<li><span>Upload Company Logo </span> <div class="filetag"><input name="filea" id="picture" type="file"></div> <small id="pic_small">No file Chosen</small>
								<p id="pic_error1" style="display: none; color: rgb(255, 0, 0);">Image formats should be JPG, JPEG, PNG or GIF.</p>
								<p id="pic_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 1MB.</p></li>
								</ul>
								<script style="">
								document.getElementById('picture').onchange = uploadImage;
								function uploadImage() {
								var text = this.value;
								document.getElementById('pic_small').innerHTML = text;
								}
								</script>
								<ul class="uploadfile-reg">
								<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" name="fileb" class="doc" type="file"></div> <small id="docsmall">No file Chosen</small>
								<p id="doc_error1" style="display: none; color: rgb(255, 0, 0);">Document formats should be DOC, TXT or PDF.</p>
								<p id="doc_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 2MB.</p>
								</li>
								</ul>
								<script style="">
								document.getElementById('docfile').onchange = uploadDoc;
								function uploadDoc() {
								var text = this.value;
								document.getElementById('docsmall').innerHTML = text;
								}
								</script>
								<ul class="uploadfile-reg">
								<li><span>Upload Relevant Videos </span> <div class="filetag"><input id="videofile" name="filec" class="video" type="file"></div> <small id="videosmall">No file Chosen</small>
								<p id="video_error1" style="display: none; color: rgb(255, 0, 0);">Video formats should be MP4, MPV, AVI, MOV, WMV, 3GP.</p>
								<p id="video_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 5MB.</p>
								</li>
								</ul>
								<script style="">
								document.getElementById('videofile').onchange = uploadVid;
								function uploadVid() {
								var textvideo = this.value;
								document.getElementById('videosmall').innerHTML = textvideo;

								}
								</script>
								<ul class="radio-reg">
								<h5>Areas of interest</h5>
								<li style="position:relative;"><input name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox"><input name="areainterest[]" value="Private Equity" type="checkbox">Private Equity</li>
								<li><input name="areainterest[]" value="Real Estate" type="checkbox">Real Estate</li>
								<li><input name="areainterest[]" value="Estate Planning" type="checkbox">Estate Planning</li>
								<li><input name="areainterest[]" value="Hedge Funds" type="checkbox">Hedge Funds</li>
								<li><input name="areainterest[]" value="Hedge Funds" type="checkbox">Legal Services</li>
								<li><input name="areainterest[]" value="Venture Capital" type="checkbox">Venture Capital</li>
								<li><input name="areainterest[]" value="Insurance" type="checkbox">Insurance</li>
								<li><input name="areainterest[]" value="Direct Investment" type="checkbox">Direct Investment</li>
								<li><input name="areainterest[]" value="Accounting Services" type="checkbox">Accounting Services</li>
								<li><input name="areainterest[]" value="Joint Venture" type="checkbox">Joint Venture</li>
								<li><input name="areainterest[]" value="Luxury Goods" type="checkbox">Luxury Goods</li>
								<li><input name="areainterest[]" value="Events" type="checkbox">Events</li>
								<li><input name="areainterest[]" value="Travel" type="checkbox">Travel</li>
								<li><input name="areainterest[]" value="Financial Services" type="checkbox">Financial Services</li>
								<li><input name="areainterest[]" value="Philanthropy" type="checkbox">Philanthropy</li>
								<li><input name="areainterest[]" value="Health Care" type="checkbox">Health Care</li>
								<li><input name="areainterest[]" value="Education" type="checkbox">Education</li>
								<li><input name="areainterest[]" value="Bio Tech" type="checkbox">Bio Tech</li>
								<li><input name="areainterest[]" value="Sports" type="checkbox">Sports</li>
								<li><input name="areainterest[]" value="Alternative Energy" type="checkbox">Alternative Energy</li>
								<li><input name="areainterest[]" value="Art" type="checkbox">Art</li>
								<li><input name="areainterest[]" value="Oil Gas" type="checkbox">Oil Gas</li>
								<li><input name="areainterest[]" value="Yachting Boating" type="checkbox">Yachting Boating</li>
								<li><input name="areainterest[]" value="Mining" type="checkbox">Mining</li>
								<li><input name="areainterest[]" value="Employment" type="checkbox">Employment</li>
								<li><input name="areainterest[]" value="Technology" type="checkbox">Technology</li>
								<li><input name="areainterest[]" value="Private Jets" type="checkbox">Private Jets</li>
								<li><input name="areainterest[]" value="Consumer Goods" type="checkbox">Consumer Goods</li>
								<li><input name="areainterest[]" value="Transportations" type="checkbox">Transportations</li>
								<li><input name="areainterest[]" value="Cannabies" type="checkbox">Cannabies</li>
								<li><input name="areainterest[]" value="Aerospace &amp; Defence" type="checkbox">Aerospace &amp; Defence</li>
								<li><input name="areainterest[]" value="Others" id="otherbox" type="checkbox">Others<input name="others" id="extrafied" placeholder="If other please Explain" style="" type="text"></li>
								<script style="">
								$(document).ready(function(){
								$("#otherbox").click(function(){
								$("#extrafied").slideToggle();
								});
								});
								</script>
								<ul class="radiobuttonreg">
								<h5>Family office net worth?<span>*</span></h5>
								<li><input name="networth" value="Under 100 mil" type="radio">Under 100 Mil</li>
								<li style="width:180px !important;"><input name="networth" value="500 mil" type="radio">100 Mil - 500 Mil</li>
								<li style="width:180px !important;"><input name="networth" value="1 Bil" type="radio">500 Mil - 1 Bil</li>
								<li><input name="networth" value="1 Billion+" type="radio">1 Billion +</li>
								</ul>
								<ul class="radiobuttonreg">
								<h5>Does you or your family office invest in real estate? <span>*</span></h5>
								<li><input name="fminvest" value="Yes" type="radio">Yes</li>
								<li><input name="fminvest" value="No" type="radio">No</li>
								</ul>
								<h5>If yes, what type of real estate transactions had your firm participated in? </h5>
								<li style="position:relative;"><input name="estatetrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox"><input name="estatetrans[]" value="Commercial" type="checkbox">Commercial</li>
								<li><input name="estatetrans[]" value="Speculation" type="checkbox">Speculation</li>
								<li><input name="estatetrans[]" value="Residential" type="checkbox">Residential</li>
								<li><input name="estatetrans[]" value="Income Producing" type="checkbox">Income Producing</li>
								<li><input name="estatetrans[]" value="Land Development" type="checkbox">Land Development</li>
								<li><input name="estatetrans[]" value="REITS" type="checkbox">REITS</li>
								<ul class="radiobuttonreg">
								<h5>Do you or your family office invest in private equity? <span>*</span></h5>
								<li><input name="privatequity" value="Yes" type="radio">Yes</li>
								<li><input name="privatequity" value="No" type="radio">No</li>
								</ul>
								<h5>If yes, what type of private equity transactions had your firm participated in? </h5>
								<li style="position:relative;"><input name="firmtrans[]" value=" " style="width:0; height:0; visibility:hidden; position:absolute; z-index:-1100;" checked="" type="checkbox"><input name="firmtrans[]" value="Financial Services" type="checkbox">Financial Services</li>
								<li><input name="firmtrans[]" value="Oil / Gas" type="checkbox">Oil / Gas</li>
								<li><input name="firmtrans[]" value="Health Services" type="checkbox">Health Services</li>
								<li><input name="firmtrans[]" value="Technology" type="checkbox">Technology</li>
								<li><input name="firmtrans[]" value="Bio Tech" type="checkbox">Bio Tech</li>
								<li><input name="firmtrans[]" value="Consumer Goods" type="checkbox">Consumer Goods</li>
								<ul class="radiobuttonreg">
								<h5>What is the average size of your private equity investments? <span>*</span></h5>
								<li><input name="averagesize" value="Under 1 Mil" type="radio">Under 1 Mil</li>
								<li><input name="averagesize" value="1 Mil - 10 Mil" type="radio">1 Mil - 10 Mil</li>
								<li><input name="averagesize" value="10 Mil - 50 Mil" type="radio">10 Mil - 50 Mil</li>
								<li><input name="averagesize" value="50 Mil +" type="radio">50 Mil +</li>
								</ul>
								<input value="SUBMIT" class="red-btn" id="submit_membership" name="submit_membership" type="Submit">
							</ul>
						</form>
						
					</div>
				<?php
					
				if(isset($_REQUEST['submit_membership'])){
					$createdby = $_SERVER['SERVER_NAME'];
					$today=date("Y-m-d h:i:sa");
					$firmtrans = implode(',', array_filter($_REQUEST['firmtrans']));
					$areainterest = implode(',', array_filter($_REQUEST['areainterest']));
					$estatetrans = implode(',', array_filter($_REQUEST['estatetrans']));
					$cat="family office";
					$add = $fn->InsertQuery("INSERT INTO `family_office`(`fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_logo`, `marketing_material`, `videos`, `interest`, `net_worth`, `invest`, `transactions`, `invest_equity`, `transactions_equity`, `equity_size`,`Date`, `Createdby`,`category`) VALUES ('".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['company']."','".$_REQUEST['address']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['zipcode']."','".$_REQUEST['country']."','".$_REQUEST['filea']."','".$_REQUEST['fileb']."','".$_REQUEST['filec']."','".$areainterest."','".$_REQUEST['networth']."','".$_REQUEST['fminvest']."','".$estatetrans."','".$_REQUEST['privatequity']."','".$firmtrans."','".$_REQUEST['averagesize']."','$today','$createdby','$cat')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "Family Office Membership";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
							Hi, <br/>".$_REQUEST['fname']." has registered From ".$_SERVER['SERVER_NAME']." through family office membership form  .
							<br> Email address is ".$_REQUEST['email']." 
							<br> Phone number is ".$_REQUEST['phone']."
							<br> at $today;
						
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@pbfoa.org>' . "\r\n";

						mail($to,$subject,$message,$headers);
						//echo '<script type="text/javascript">window.setTimeout(function() { window.location.href = "http://pbfoa.org/thankyou.php";}, 500);</script>';
					    $clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
					}
					else{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				}
				
				}
			
				if($page_slug1 == 'asset_managers') { ?>
					<div id="asset_managers">
						<h1>Asset Manager Membership</h1>
						<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
						<ul class="personal-reg">
							<li><input value="" placeholder="First Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="fname" reqiured="" type="text"></li>
							<li><input value="" placeholder="Last Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name:'" name="lname" reqiured="" type="text"></li>
							<li><input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" reqiured="" type="email"></li>
							<li><input value="" placeholder="Phone Number: " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number: '" name="phone" reqiured="" type="tel" ></li>
							<li><input value="" placeholder="Company:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company:'" name="company" reqiured="" type="text"></li>
						<li>	<input value="" placeholder="Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address:'" name="address" reqiured="" type="text"></li>
						<!--<li>	<input type="text" value="" placeholder="Street Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Street Address:'" name="street_address" /></li>!-->
						<li>	<input value="" name="city" placeholder="City:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City:'" reqiured="" type="text"></li>
						<li>	<select name="state">
								<option value="">State</option>
								<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option>
							</select></li>
							<li><input value="" placeholder="Zip /Postal Code:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip / Postal Code:'" name="zipcode" reqiured="" type="text"></li>
							<li>
							<select name="country">
					<option value="United States">United States</option>
					<option value="Afganistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bonaire">Bonaire</option>
					<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Canary Islands">Canary Islands</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Channel Islands">Channel Islands</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos Island">Cocos Island</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote DIvoire">Cote D'Ivoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Curaco">Curacao</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="East Timor">East Timor</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands">Falkland Islands</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Ter">French Southern Ter</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Great Britain">Great Britain</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guinea">Guinea</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran">Iran</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Isle of Man">Isle of Man</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea North">Korea North</option>
					<option value="Korea Sout">Korea South</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Laos">Laos</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libya">Libya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macau">Macau</option>
					<option value="Macedonia">Macedonia</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Malawi">Malawi</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Midway Islands">Midway Islands</option>
					<option value="Moldova">Moldova</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Nambia">Nambia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherland Antilles">Netherland Antilles</option>
					<option value="Netherlands">Netherlands (Holland, Europe)</option>
					<option value="Nevis">Nevis</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau Island">Palau Island</option>
					<option value="Palestine">Palestine</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Phillipines">Philippines</option>
					<option value="Pitcairn Island">Pitcairn Island</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Republic of Montenegro">Republic of Montenegro</option>
					<option value="Republic of Serbia">Republic of Serbia</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Rwanda">Rwanda</option>
					<option value="St Barthelemy">St Barthelemy</option>
					<option value="St Eustatius">St Eustatius</option>
					<option value="St Helena">St Helena</option>
					<option value="St Kitts-Nevis">St Kitts-Nevis</option>
					<option value="St Lucia">St Lucia</option>
					<option value="St Maarten">St Maarten</option>
					<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
					<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
					<option value="Saipan">Saipan</option>
					<option value="Samoa">Samoa</option>
					<option value="Samoa American">Samoa American</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serbia">Serbia</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syria">Syria</option>
					<option value="Tahiti">Tahiti</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Thailand">Thailand</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Erimates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States of America">United States of America</option>
					<option value="Uraguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Vatican City State">Vatican City State</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
					<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
					<option value="Wake Island">Wake Island</option>
					<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
					<option value="Yemen">Yemen</option>
					<option value="Zaire">Zaire</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
					</select>
							</li>
							
							<li><textarea value="" placeholder="Description of Company " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description of Company '" name="textmsg"></textarea></li>
							</ul>
							
							<ul class="uploadfile-reg">
							<li><span>Upload Company Logo </span> <div class="filetag"><input name="filea" id="picture" type="file"></div> <small id="pic_small">No file Chosen</small>
							<p id="pic_error1" style="display: none; color: rgb(255, 0, 0);">Image formats should be JPG, JPEG, PNG or GIF.</p>
								<p id="pic_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 1MB.</p></li>
							</ul>
							
							<script style="">
					  
							  document.getElementById('picture').onchange = uploadImage;
							  
							function uploadImage() {
								var text = this.value;
								document.getElementById('pic_small').innerHTML = text;
							}
							</script>
						
							<ul class="uploadfile-reg">
							<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" name="fileb" class="doc" type="file"></div> <small id="docsmall">No file Chosen</small>
							<p id="doc_error1" style="display: none; color: rgb(255, 0, 0);">Document formats should be DOC, TXT or PDF.</p>
							<p id="doc_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 2MB.</p>
							</li>
							</ul>
							
							<script style="">
					  
							  document.getElementById('docfile').onchange = uploadDoc;

							function uploadDoc() {
								var text = this.value;
								document.getElementById('docsmall').innerHTML = text;
							}
							</script>
							
							
							<ul class="uploadfile-reg">
							<li><span>Upload Relevant Videos </span> <div class="filetag"><input id="videofile" name="filec" class="video" type="file"></div> <small id="videosmall">No file Chosen</small>
							<p id="video_error1" style="display: none; color: rgb(255, 0, 0);">Video formats should be MP4, MPV, AVI, MOV, WMV, 3GP.</p>
							<p id="video_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 5MB.</p>
							</li>
							</ul>
							
							<script style="">
					  
							  document.getElementById('videofile').onchange = uploadVid;

							function uploadVid() {
								var textvideo = this.value;
								document.getElementById('videosmall').innerHTML = textvideo;
								
							}
							</script>
							
							
							<ul class="radio-reg">
						
							<h5>Select what best describes you</h5>
							<li><input name="descrbe[]" value="Hedge Funds" type="checkbox">Hedge Funds</li>
							<li><input name="descrbe[]" value="Venture Capital" type="checkbox">Venture Capital</li>
							<li><input name="descrbe[]" value="RIA" type="checkbox">RIA</li>
							<li><input name="descrbe[]" value="Broker Dealer" type="checkbox">Broker Dealer</li>
							<li><input name="descrbe[]" value="Private Equity Firm" type="checkbox">Private Equity Firm</li>
							<li><input name="descrbe[]" value="Rest Estate" type="checkbox">Rest Estate</li>
							<li><input name="descrbe[]" value="Others" id="otherbox" type="checkbox">Others<span><input name="others" placeholder="If other explain" id="extrafied" style="" type="text"></span></li>
							<script style="">
								$(document).ready(function(){
									$("#otherbox").click(function(){
										$("#extrafied").slideToggle();
									});
								});
							</script>
							
							<ul class="radiobuttonreg">
							<h5>Are you looking to raise capital for your firm? <span>*</span></h5>
							
							<li><input name="raisecapital" value="Yes" type="radio">Yes</li>
							<li><input name="raisecapital" value="No" type="radio">No</li>
							</ul>
							
							<ul class="radiobuttonreg">
							<h5>What is your AUM?<span>*</span></h5>
							
							<li><input name="aum" value="1-25 Mil" type="radio">1-25 Mil</li>
							<li><input name="aum" value="25-100 Mil" type="radio">25-100 Mil</li>
							<li><input name="aum" value="100-500 Mil" type="radio">100-500 Mil</li>
							<li><input name="aum" value="500+" type="radio">500+</li>
							</ul>
							
							<ul class="radiobuttonreg">
							<h5>If yes, how much are you looking to raise?</h5>
							
							<li><input name="raisehow" value="1-10 Mil" type="radio">1-10 Mil</li>
							<li><input name="raisehow" value="10-15 Mil" type="radio">10-15 Mil</li>
							<li><input name="raisehow" value="50-500 Mil" type="radio">50-500 Mil</li>
							<li><input name="raisehow" value="500+ Mil" type="radio">500+ Mil</li>
							</ul>
							
							<ul class="radiobuttonreg">
							<h5>Does your company have a website?</h5>
					<li><input name="website" value="Yes" type="radio">Yes</li>
							<li><input name="website" value="No" type="radio">No</li>
					</ul>
							<h5>If so, Please input your website link:</h5>
					<li><input value="" placeholder="http://" onfocus="this.placeholder = ''" onblur="this.placeholder = 'http://'" name="url" type="text"></li>
							
						
							</ul>
							
							<input value="Submit" class="red-btn" id="submit" name="submit_asset" type="Submit">
						</form>
					</div>
				<?php 
					
				if(isset($_REQUEST['submit_asset'])){
					$createdby = $_SERVER['SERVER_NAME'];
					$today=date("Y-m-d h:i:sa");
					$descrbe = implode(',', array_filter($_REQUEST['descrbe']));
					$cat="asset manager";
					$add = $fn->InsertQuery("INSERT INTO `asset_manager`(`fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `company_logo`, `marketing_material`, `videos`, `descrbe`, `raisecapital`, `aum`, `raisehow`, `website`, `url`, `Date` , `Createdby`,`category`) VALUES ('".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['company']."','".$_REQUEST['address']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['zipcode']."','".$_REQUEST['country']."','".$_REQUEST['textmsg']."','".$_REQUEST['filea']."','".$_REQUEST['fileb']."','".$_REQUEST['filec']."','".$descrbe."','".$_REQUEST['raisecapital']."','".$_REQUEST['aum']."','".$_REQUEST['raisehow']."','".$_REQUEST['website']."','".$_REQUEST['url']."','$today','$createdby','$cat')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "Asset Manager Membership";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
							
							Hi, <br/>".$_REQUEST['fname']." has registered From ".$_SERVER['SERVER_NAME']." through asset manager membership form .
							<br> Email address is ".$_REQUEST['email']." 
							<br> Phone number is ".$_REQUEST['phone']."
							<br> at $today;
						
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@pbfoa.org>' . "\r\n";
						mail($to,$subject,$message,$headers);
						
						
						$clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
						
						
					}
					else{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				}
				
				} if($page_slug1 == 'service_provider') { ?>
					<div id="service_provider">
	<h1>Service Provider Membership</h1>
	
		
	<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
	<ul class="personal-reg">
		<li><input value="" placeholder="First Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="fname" required="" type="text"></li>
		<li><input value="" placeholder="Last Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name:'" name="lname" required="" type="text"></li>
		<li><input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" required="" type="email"></li>
		<li><input value="" placeholder="Phone Number:  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number: '" name="phone"  required="" type="tel"  /></li>
		<li><input value="" placeholder="Company:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company:'" name="company" required="" type="text"></li>
	<li>	<input value="" placeholder="Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address:'" name="address" required="" type="text"></li>
	<li>	<input value="" name="city" placeholder="City:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City:'" required="" type="text"></li>
	<li>	<select name="state">
			<option value="">State</option>
			<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option>
		</select></li>
		
		<li><input value="" placeholder="Zip /Postal Code:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip / Postal Code:'" name="zipcode" required="" type="text"></li>
		
	
		
		<li>
		<select name="country" required="">
<option value="United States">United States</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
		</li>
		
		<li><textarea value="" placeholder="Description of Company " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description of Company '" name="textmsg" required=""></textarea></li>
		</ul>
		
		<ul class="uploadfile-reg">
		<li><span>Upload Company Logo </span> <div class="filetag"><input name="filea" id="picture" type="file"></div> <small id="pic_small">No file Chosen</small>
		<p id="pic_error1" style="display: none; color: rgb(255, 0, 0);">Image formats should be JPG, JPEG, PNG or GIF.</p>
			<p id="pic_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 1MB.</p></li>
		</ul>
		
		<script style="">
  
		  document.getElementById('picture').onchange = uploadImage;
		  
		function uploadImage() {
			var text = this.value;
			document.getElementById('pic_small').innerHTML = text;
		}
		</script>
	
		<ul class="uploadfile-reg">
		<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" name="fileb" class="doc" type="file"></div> <small id="docsmall">No file Chosen</small>
		<p id="doc_error1" style="display: none; color: rgb(255, 0, 0);">Document formats should be DOC, TXT or PDF.</p>
		<p id="doc_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 2MB.</p>
		</li>
		</ul>
		
		<script style="">
  
		  document.getElementById('docfile').onchange = uploadDoc;

		function uploadDoc() {
			var text = this.value;
			document.getElementById('docsmall').innerHTML = text;
		}
		</script>
		
		
		<ul class="uploadfile-reg">
		<li><span>Upload Relevant Videos </span> <div class="filetag"><input id="videofile" name="filec" class="video" type="file"></div> <small id="videosmall">No file Chosen</small>
		<p id="video_error1" style="display: none; color: rgb(255, 0, 0);">Video formats should be MP4, MPV, AVI, MOV, WMV, 3GP.</p>
		<p id="video_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 5MB.</p>
		</li>
		</ul>
		
		<script style="">
  
		  document.getElementById('videofile').onchange = uploadVid;

		function uploadVid() {
			var textvideo = this.value;
			document.getElementById('videosmall').innerHTML = textvideo;
			
		}
		</script>
		
		
		<ul class="radio-reg">
	
	<ul class="radiobuttonreg">
		<h5>Are you intrested in sponsoring events?</h5>
		<li><input name="sponsoringevents" value="Yes" type="radio">Yes</li>
		<li><input name="sponsoringevents" value="No" type="radio">No</li>
		
		</ul>	
		<h5>Other Locations of Intrest: U.S Cities</h5>
		<li><input name="uscities[]" value="New York City" type="checkbox">New York City</li>
		<li><input name="uscities[]" value="London" type="checkbox">London</li>
		<li><input name="uscities[]" value="China" type="checkbox">China</li>
		<li><input name="uscities[]" value="Hongkong" type="checkbox">Hongkong</li>
		<li><input name="uscities[]" value="Canada" type="checkbox">Canada</li>
		<li><input name="uscities[]" value="Brazil" type="checkbox">Brazil</li>
		<li><input name="uscities[]" value="London" type="checkbox">London</li>
		<li><input name="uscities[]" value="Chicago" type="checkbox">Chicago</li>
		<li><input name="uscities[]" value="Boston" type="checkbox">Boston</li>
		<li><input name="uscities[]" value="Houston" type="checkbox">Houston</li>
		<li><input name="uscities[]" value="Palm Beach" type="checkbox">Palm Beach</li>
		<li><input name="uscities[]" value="San Francisco" type="checkbox">San Francisco</li>
		<li><input name="uscities[]" value="Dallas" type="checkbox">Dallas</li>
		<li><input name="uscities[]" value="Atlanta" type="checkbox">Atlanta</li>
		<li><input name="uscities[]" value="Naples" type="checkbox">Naples</li>
		<li><input name="uscities[]" value="San Diego" type="checkbox">San Diego</li>
		<li><input name="uscities[]" value="Miami" type="checkbox">Miami</li>
		<li><input name="uscities[]" value="Tampa Bay" type="checkbox">Tampa Bay</li>
		<li><input name="uscities[]" value="Connecticut" type="checkbox">Connecticut</li>
		<li><input name="uscities[]" value="Denver" type="checkbox">Denver</li>
		<li><input name="global[]" value="Singapore" type="checkbox">Singapore</li>
		<li><input name="global[]" value="Washington DC" type="checkbox">Singapore</li>
		<li><input name="uscities[]" value="Other" id="otherbox" type="checkbox">Other<span><input name="othercity" id="extrafied" placeholder="If other please Explain" style="" type="text"></span></li>
		
		<script style="">
			$(document).ready(function(){
				$("#otherbox").click(function(){
					$("#extrafied").slideToggle();
				});
			});
		</script>
		
		<h5>Global</h5>
		<li><input name="global[]" value="Australia" type="checkbox">Australia</li>
		<li><input name="global[]" value="Latin America" type="checkbox">Latin America</li>
		<li><input name="global[]" value="Eastern Europe" type="checkbox">Eastern Europe</li>
		<li><input name="global[]" value="Middle East" type="checkbox">Middle East</li>
		<li><input name="global[]" value="Australia" type="checkbox">Hong Kong</li>
		<li><input name="global[]" value="China" type="checkbox">China</li>
		<li><input name="global[]" value="Canada" type="checkbox">Canada</li>
		<li><input name="global[]" value="Brazil" type="checkbox">Brazil</li>
		<li><input name="global[]" value="Switzerland" type="checkbox">Switzerland</li>
		<li><input name="global[]" value="Singapore" type="checkbox">Singapore</li>
		<li><input name="global[]" value="London" type="checkbox">London </li>
		
		<ul class="radiobuttonreg">
		<h5>Would you like your firm to be listed in FON’s service provider directory? </h5>
		
<li><input name="spdire" value="Yes" type="radio">Yes</li>
		<li><input name="spdire" value="No" type="radio">No</li>

		</ul>
		
	
		</ul>
		
		<input value="NEXT" class="red-btn" name="submit_servicePro" type="Submit">
	</form>
					</div>
				<?php
					
				if(isset($_REQUEST['submit_servicePro'])){
					$today=date("Y-m-d h:i:sa");
					$createdby = $_SERVER['SERVER_NAME'];
					$uscities = implode(',', array_filter($_REQUEST['uscities']));
					$global_chk = implode(',', array_filter($_REQUEST['global']));
					$cat="service providers";
					$add = $fn->InsertQuery("INSERT INTO `service_providers`(`fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `company_logo`, `marketing_material`, `videos`, `sponsoringevents`, `uscities`, `global_chk`, `spdire`,`Date`, `Createdby`,`category`) VALUES ('".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['company']."','".$_REQUEST['address']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['zipcode']."','".$_REQUEST['country']."','".$_REQUEST['textmsg']."','".$_REQUEST['filea']."','".$_REQUEST['fileb']."','".$_REQUEST['filec']."','".$_REQUEST['sponsoringevents']."','".$uscities."','".$global_chk."','".$_REQUEST['spdire']."','$today','$createdby','$cat')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "Service Provider Membership";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
							
							Hi, <br/>".$_REQUEST['fname']." has registered From ".$_SERVER['SERVER_NAME']." through service provider membership form .
							<br> Email address is ".$_REQUEST['email']." 
							<br> Phone number is ".$_REQUEST['phone']."
							<br> at $today;
							
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@pbfoa.org>' . "\r\n";

						mail($to,$subject,$message,$headers);
						 $clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
						}
					else{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				}
				
				} if($page_slug1 == 'other') { ?>
					<div id="other">
	<h1>Other Membership</h1>
    
        
<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
	<ul class="personal-reg">
		<li><input value="" placeholder="Your Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="name" required="" type="text"></li>
		
		<li><input value="" placeholder="Company:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company:'" name="company" required="" type="text"></li>
		
		<li><input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" required="" type="email"></li>
		
		<li><input value="" placeholder="Phone Number: " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number:  '" name="phone" required="" type="tel" ></li>
		
		<li><input value="" placeholder="Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address:'" name="address" required="" type="text"></li>
		
	<li>	<input value="" name="city" placeholder="City:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City:'" required="" type="text"></li>
	<li>	<select name="state">
			<option value="">State</option>
			<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option>
		</select></li>
		
		<li><input value="" placeholder="Zip /Postal Code:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip / Postal Code:'" name="zipcode" required="" type="text"></li>
		
	
		
		<li>
		<select name="country" required="">
<option value="United States">United States</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
		</li>

	<li class="uploadfile-reg"><textarea placeholder="Description" name="textmsg"></textarea></li>
	</ul>
	
<input value="SUBMIT" class="red-btn" name="submit_other" type="Submit">
</form>

<script style="">


$('input[type="submit"]').prop("disabled", false);
var a=0;
var b=0;
//binds to onchange event of your input field
$('.doc').bind('change', function() {
if ($('input:submit').attr('disabled',false)) {$('input:submit').attr('disabled',false);}	
var extb = $('.doc').val().split('.').pop().toLowerCase();
    if($.inArray(extb, ['doc','txt','pdf','docx']) == -1)
    { $('#doc_error1').slideDown("slow"); $('#doc_error2').slideUp("slow"); a=0;} else { 
    var picsizeb = (this.files[0].size);
    if (picsizeb &gt; 2088576 )
    { $('#doc_error2').slideDown("slow"); a=0;} else { a=1; $('#doc_error2').slideUp("slow"); }
$('#doc_error1').slideUp("slow");
if (a==1 &amp;&amp; b==2) {$('input:submit').attr('disabled',false);}
}
});



 
</script>
		
					</div>
				<?php  if(isset($_REQUEST['submit_other'])){
					$today=date("Y-m-d h:i:sa");
					$createdby = $_SERVER['SERVER_NAME'];
					$cat="other membership";
					$add = $fn->InsertQuery("INSERT INTO `other_membership`(`fname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`,`Date`,`Createdby`,`category`) VALUES ('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['company']."','".$_REQUEST['address']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['zipcode']."','".$_REQUEST['country']."','".$_REQUEST['textmsg']."','$today','$createdby','$cat')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "Other Membership";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
						
							Hi, <br/>".$_REQUEST['name']." has registered from ".$_SERVER['SERVER_NAME']." through Other Membership form .
							<br> Email address is ".$_REQUEST['email']." 
							<br> Phone number is ".$_REQUEST['phone']."
							<br> at $today;
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@japanfoa.org>' . "\r\n";

						mail($to,$subject,$message,$headers);
					 $clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
						 }
					else{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				} } } if($page_slug == 'sponsorship') { ?>
				<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
	<ul class="personal-reg">
		<li><input value="" placeholder="First Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="fname" required="" type="text"></li>
		<li><input value="" placeholder="Last Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name:'" name="lname" required="" type="text"></li>
		<li><input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" required="" type="email"></li>
		<li><input value="" placeholder="Phone Number: " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number:  '" name="phone" required="" type="tel" /></li>
		<li><input value="" placeholder="Company:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company:'" name="company" required="" type="text"></li>
	<li>	<input value="" placeholder="Address:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address:'" name="address" required="" type="text"></li>
	<li>	<input value="" name="city" placeholder="City:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City:'" required="" type="text"></li>
	<li>	<select name="state">
			<option value="">State</option>
			<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option>
		</select></li>
		
		<li><input value="" placeholder="Zip /Postal Code:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip / Postal Code:'" name="zipcode" required="" type="text"></li>
		
		
		
		
		<li>
		<select name="country" required="">
<option value="United States">United States</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
		</li>
		
		
		<li><textarea value="" placeholder="Description of Company " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description of Company '" name="textmsg" required=""></textarea></li>
		</ul>
		
		<ul class="uploadfile-reg">
		<li><span>Upload Company Logo </span> <div class="filetag"><input name="filea" id="picture" type="file"></div> <small id="pic_small">No file Chosen</small>
		<p id="pic_error1" style="display: none; color: rgb(255, 0, 0);">Image formats should be JPG, JPEG, PNG or GIF.</p>
			<p id="pic_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 1MB.</p></li>
		</ul>
		
		<script style="">
  
		  document.getElementById('picture').onchange = uploadImage;
		function uploadImage() {
			var text = this.value;
			document.getElementById('pic_small').innerHTML = text;
		}
		</script>
	
		<ul class="uploadfile-reg">
		<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" name="fileb" class="doc" type="file"></div> <small id="docsmall">No file Chosen</small>
		<p id="doc_error1" style="display: none; color: rgb(255, 0, 0);">Document formats should be DOC, TXT or PDF.</p>
		<p id="doc_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 2MB.</p>
		</li>
		</ul>
		
		<script style="">
  
		  document.getElementById('docfile').onchange = uploadDoc;
		function uploadDoc() {
			var text = this.value;
			document.getElementById('docsmall').innerHTML = text;
		}
		</script>
		<input value="Submit" class="red-btn" name="submit_sponsorship" type="Submit">
	</form>
				<?php if(isset($_REQUEST['submit_sponsorship'])){
					$add = $fn->InsertQuery("INSERT INTO `sponsorship`(`fname`,`lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `filea`, `fileb`) VALUES ('".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['company']."','".$_REQUEST['address']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['zipcode']."','".$_REQUEST['country']."','".$_REQUEST['textmsg']."','".$_REQUEST['filea']."','".$_REQUEST['fileb']."')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "Sponsorship";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
							Hi, <br/>Someone is here through sponsorship form.
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@pbfoa.org>' . "\r\n";

						mail($to,$subject,$message,$headers);
						 $clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
					}
					else{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				} }
				if($page_slug == 'contact-us')
				{
					?>
					
<section class="container">
<h1>Contact Us</h1>
<figure class="contact_left">
<figure class="contact-office">
<h3>West Palm Beach Office</h3>
<img src="images/posts/palmbeach-office-building.jpg" alt="Palm Beach Office Building">
<p>
</p><figcaption>
<h6>Address:</h6>
<p>
307 Evernia st,
<br>
3rd Floor.
<br>
West Palm Beach, FL 33401
<br>
Avilable Monday - Friday,
<br>
8:30 am-5:30pm EST
</p>
</figcaption>
<figcaption>
<h6>Phone &amp; Fax:</h6>
<p>
P: 561.906.1181
<br>
F: 561.906.1181
</p>
</figcaption>
<p>
</p></figure>
<figure class="contact-office">
<h3>New York Office</h3>
<img src="images/posts/newyork-office-building.jpg" alt="Palm Beach Office Building">
<p>
</p><figcaption>
<h6>Address:</h6>
<p>
747 3rd Avenue, 2nd Floor
<br>
New York, NY 10017
<br>
Avilable Monday - Friday,
<br>
8:30 am-5:30pm EST
</p>
</figcaption>
<figcaption>
<h6>Phone &amp; Fax:</h6>
<p>
P: 646 291-4820
<br>
F: 917 747-6198
</p>
</figcaption>
<p>
</p></figure>
</figure>
<figure class="contact_right">
<p>
Whether you’re interested in a membership or to learn more about what we have to offer, we’d love to hear from you.
<br>
Fill out your name, phone number, email, and best time to contact you and someone from our office will reach out to you at your convenience. Connect and grow stronger through the best Family Office networking organization.
</p>
				<form class="contact-form" method="post">
					<input value="" placeholder="Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name:'" name="yourname" required="" type="text">
					<input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="youremail" required="" type="email">
					<input value="" placeholder="Phone:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone:'" name="yourphone" required="" type="tel">
					<input value="" placeholder="Subject:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject:'" name="yoursubject" required="" type="text">
					<textarea placeholder="Message:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message:'" name="yoursmessage" required=""></textarea>
					<input value="Submit" name="submit_mail" class="signup-btn" type="submit">
				</form></section>	
</figure>
</section>			
				<?php  if(isset($_REQUEST['submit_mail'])){
					$add = $fn->InsertQuery("INSERT INTO `contact_us`(`yourname`,`youremail`, `yourphone`, `yoursubject`, `yoursmessage`) VALUES ('".$_REQUEST['yourname']."','".$_REQUEST['youremail']."','".$_REQUEST['yourphone']."','".$_REQUEST['yoursubject']."','".$_REQUEST['yoursmessage']."')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "Contact Us";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
							Hi, <br/> Someone is here through contact us form.
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@pbfoa.org>' . "\r\n";

						mail($to,$subject,$message,$headers);
						 $clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
						 }
					else
					{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				} }
				if($page_slug == 'submit-to-fon-news')
				{
					?>
				<form class="registration-form membership-forms" method="post" enctype="multipart/form-data">
					<ul class="personal-reg">
						<li><input value="" placeholder="Your Name:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name:'" name="name" required="" type="text"></li>
						
					
						
						<li><input value="" placeholder="Email:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email:'" name="email" required="" type="email"></li>
						
						<li><input value="" placeholder="Phone Number:  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number: '" name="phone" required="" type="tel" ></li>
						
						<li><input value="" placeholder="Source URL http://example.com/:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Source URL http://example.com/:'" name="url" required="" type="text"></li>

					<li>
						<select name="remain" required="">
							<option value="I wish to remain anonymous">I wish to remain anonymous</option>
							<option value="I want my name listed on the news">I want my name listed on the news</option>
						</select>
					</li>
					<li class="uploadfile-reg"><textarea placeholder="News Description" name="textmsg"></textarea></li>
					</ul>
					
					
					
					<ul class="uploadfile-reg">
						<li><span>Upload Marketing Materials </span> <div class="filetag"><input id="docfile" name="file" class="doc" type="file"></div> <small id="docsmall">No file Chosen</small>
						<p id="doc_error1" style="display: none; color: rgb(255, 0, 0);">Document formats should be DOC, TXT or PDF.</p>
						<p id="doc_error2" style="display: none; color: rgb(255, 0, 0);">Max file size should be 2MB.</p>
						</li>
						</ul>
						
						<script style="">
				  
						  document.getElementById('docfile').onchange = uploadDoc;

						function uploadDoc() {
							var text = this.value;
							document.getElementById('docsmall').innerHTML = text;
						}
						</script>
				<input value="Submit" class="red-btn" name="submit_news" type="Submit">
				</form>		
				<?php  if(isset($_REQUEST['submit_news'])){
					$add = $fn->InsertQuery("INSERT INTO `fon_news`(`name`,`email`, `phone`, `url`, `remain`, textmsg, marketing_material) VALUES ('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['url']."','".$_REQUEST['remain']."','".$_REQUEST['textmsg']."', '')");
					if($add)
					{
						$to = "er.kunal2006@gmail.com";
						$subject = "FON News";

						$message = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>
							Hi, <br/>".$_REQUEST['name']." has submitted new news. Please check and get back to him.
						</div></body></html>";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <info@pbfoa.org>' . "\r\n";

						mail($to,$subject,$message,$headers);
					 ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
						$clientemail= $_REQUEST['email'];
						$subjectforclient = "Notification from ". $_SERVER['SERVER_NAME'];
						$st="Active";
						$query1="select * from thankuemails where status='$st'";
						$data = $fn->SelectQuery($query1);
												
						$mess= $data[0]['emailmessage'];
						$messagenew = "<html><body><div class='email_con' style='max-width:600px;margin:0 auto;width:100%;'>"
						.$mess.		"</div></body></html>";
						
						
						mail($clientemail,$subjectforclient,$messagenew,$headers);
					     ?>
						 <script type="text/javascript">
						 window.setTimeout(function() 
						 { 
						 window.location.href = "<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/thankyou.php";
						 }, 100);
						 </script>
						 <?php
						 }
					else
					{
						echo '<div class="errorMsg">There is something wrong.</div>';
					}
				} }	?>
			</div>
		  </section>			
	  </article> 
	  <?php } ?>
<?php include('footer.php'); ?>