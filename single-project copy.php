<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Author: Vludio
 * Author URI: http://vludio.nl/
 * 
 *
 *	
 *	
 */ ?>

<?php get_header(); 
	
	$post_type_name = "project";
?>



<div class="container-single">
	<?php //include "partials/header-navigation.php"; ?>
	<div class="case-single">
	    <div>
		    <section class="case-image">
		    	<div class="image" style="background-image:url('<?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_src') ); ?>');background-size:cover;background-position: 50% 0px;"></div>
		    </section>
		    <section class="case-intro">
			    <div class="wrap">
				    <div class="project-text">
					    <!-- <div class="case-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/vludio-logo-shape.png" alt="" /></div> -->
					    <div class="case-title"><h1><?php print_custom_field('slider_title'); ?></h1></div>
					    <div class="case-meta-wrap">
					    	<p><?php print_custom_field('slider_description'); ?></p>
					    	<?php $btnOne = null; if($btnOne = get_custom_field('button_one_value')){ ?>
					    	<a class="readmore-btn white-txt" target="_blank" href="<?php echo $btnOne; ?>">
					    		<?php print_custom_field('button_one_label'); ?>
					    	</a>
					    	<?php } ?>
					    	<?php $btnTwo = null; if($btnTwo = get_custom_field('button_two_label')){ ?>
					    	<a class="readmore-btn white-txt" href="#single-intro">
					    		<?php echo $btnTwo; ?>
					    	</a>
					    	<?php } ?>
					    </div>
				    </div> <!-- end project-text -->
			    </div>
		    </section>
	    </div>
	    
	</div>
</div> <!-- end container-carousel -->

<section id="single-intro" class="white-bg section-txt">
	<div class="wrap">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="centered-text">
			<?php the_content(); ?>
			
		</div>
		<?php endwhile; ?>
	</div>
</section> <!-- end what-we-do -->


<?php if( dynamic_sidebar('referenties') ); ?>


<section id="more-cases" class="white-bg section-txt">
	<div class="wrap">
		<div class="centered-text">
			<h2>Meer projecten</h2>
		</div>
	</div>
	
	<div class="wrap case-grid">

		<?php while ( have_posts() ) : the_post(); ?>
		<div class="case third">
			<a href="<?php echo get_permalink(); ?>"><?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_tag', 'overview-img') ); ?></a>
			<a href="<?php echo get_permalink(); ?>">
				<p class="related-title"><?php print_custom_field('overview_title'); ?><span><?php print_custom_field('overview_subtitle'); ?></span></p>
			</a>
		</div>
		<?php endwhile; ?>
		<div class="clearfix"></div>
		
	</div>
</section> <!-- end recent-cases -->

<?php if( dynamic_sidebar('blue-background') ); ?>


<?php get_footer(); ?>