<?php

/**

Template Name: Events Photos and Videos
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<article id="inner-page-wrapper">
	<section class="container">
	
	<h1 class="entery-title event-title"><?php the_title(); ?></h1>
	
		<div class="featured-events-gallery">
			<?php echo do_shortcode('[wonderplugin_gallery id="2"]'); ?>
		</div>
		<div class="featured-events-gallery">
			<?php echo do_shortcode('[wonderplugin_gallery id="3"]'); ?>
		</div>
<?php 
$cat = 4;
$eventquery = new WP_Query(array('posts_per_page'=>6, 'post_type'=>'tribe_events',
'tax_query' => array(
            array(
                'taxonomy' => 'tribe_events_cat',
                'field' => 'term_id',
                'terms' => 2,
            )) 
));
	if($eventquery->have_posts()){
		while($eventquery->have_posts()): $eventquery->the_post(); ?>
		<div class="evets-lists">
			<div class="date"><span><?php echo get_the_date('M'); ?></span><?php echo get_the_date('d'); ?>ND</div>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?> 
			<span><?php echo get_the_date('d/m/Y'); ?></span>
			</a>
		</div>
		<?php 
	endwhile; }
?>


</section>
</article>

<?php get_footer(); ?>

