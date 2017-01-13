<div class="video-fulldiv">
    <div id="slidyBanner" class="slidyContainer" style="float:left;width:773px;">
        <div class="banner">	  
			
              <?php if($slider_data=$fn->SelectQuery("select * from home_banners order by orderid")){ ?>
			  	
					<div id="demo1" class="webwidget_slideshow_dot">
						<ul>
							<?php  foreach($slider_data as $slider){ ?>

								<?php if($slider['url']!=''){ ?>
					
										<!-- Your context goes here -->
									   <li> 
										   <a href="<?php echo $slider['url']; ?>"><img src="home_banners/<?php echo $slider['imagefull']; ?>" width="773" height="286" alt="" align="right"></a>
											<div class="slidertxt">
												<div class="slidertitile"><?php echo $slider['banner_title']; ?></div>
												<div class="sliderdes"><?php $string = $slider['banner_desc'];   
															$mytext = substr($string, 0,300);
								
															echo $mytext;?></div>
											</div>
										</li>
						   
							
								<?php }else{?>
					<li>
						<img src="home_banners/<?php echo $slider['imagefull']; ?>" width="773" height="286" alt="" align="right" >
						<div class="slidertxt">
							<div class="slidertitile"><?php echo $slider['banner_title']; ?></div>
							<div class="sliderdes"><?php $string = $slider['banner_desc'];   
															$mytext = substr($string, 0,300);
								
															echo $mytext.".... <div class='learn'><a href='#'> Read More</a></div>"; ?></div>
						</div>
						
					</li>
					<?php } } ?>
					</ul>
				   </div>
				
			  <?php }?>

		</div>	
	</div>
</div>	

<script type="text/javascript" language="javascript" src="slider/slider/js/jquery.carouFredSel-6.1.0-packed.js"></script>

<script type="text/javascript" src="slider/slider/js/webwidget_slideshow_dot.js"></script>
<script language="javascript" type="text/javascript">
            $(function() {
                $("#demo1").webwidget_slideshow_dot({
                    slideshow_time_interval: '5000',
                    slideshow_window_width: '787',
                    slideshow_window_height: '300',
                    slideshow_title_color: '#17cccc',
                    soldeshow_foreColor: '#000',
                    directory: 'slider/slider/images/'
                });
            });
        </script>