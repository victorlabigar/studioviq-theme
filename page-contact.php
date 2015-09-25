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
 * Template Name: Contact
 *	
 *	
 */ ?>

<?php get_header(); ?>

<section id="contact-wrap" class="container-fluid white-bg section-txt paddingTop100">
	<div class="row">
		<div class="contain">
			<!-- <h2 class="text-center">Let's work together!</h2> -->
			<a id="gmaproute" href="https://maps.google.com/maps?q=Eerste+Hugo+de+Grootstraat+54I,+Frederik+Hendrikbuurt,+Amsterdam,+The+Netherlands&hl=en&ll=52.376542,4.872694&spn=0.008934,0.018797&sll=52.376625,4.87201&sspn=0.008934,0.018797&oq=Eerste+Hugo+de+Grootstraat+54I,+Frederik+Hendrikbuurt,+Amsterdam,+The+Netherlands&hnear=Eerste+Hugo+de+Grootstraat+54I,+1052+KT+Westerpark,+Amsterdam,+Noord-Holland,+The+Netherlands&t=m&z=16" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/images/gmaps.png" alt="" />
				<span id="dropDiv" style=""></span>
			</a>
		</div>
	</div>
</section> <!-- end latest-news -->

<section class="container-fluid white-bg section-txt paddingTop40 paddingBottom40">
	<div class="row">
		<div class="contain">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<!-- <h2><?php the_title(); ?></h2> -->
				<!-- <p class="subtitle blue-color"></p> -->
				<div class="col-xs-12 col-sm-6"><?php the_content(); ?></div>
			<?php endwhile; ?>
			
			<div id="we-can-help" class="col-xs-12 col-sm-6">
				<h2>StudioViq helpt graag</h2>
				
				<div class="row">
					<div class="colBlock col-sm-12">
						<div class="row">
							<div class="col-xs-6 col-sm-6 text-left"><img src="<?php echo get_template_directory_uri(); ?>/images/help-with-mobile.png" alt="" /></div>
							<div class="col-xs-6 col-sm-6"><span class="help-title">Bij het ontwikkelen van een nieuw product</span></div>
						</div>
					</div>
					<div class="colBlock col-sm-12">
						<div class="row">
							<div class="col-xs-6 col-sm-6 text-left"><img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" /></div>
							<div class="col-xs-6 col-sm-6"><span class="help-title">Bij het verbeteren van een bestaand product</span></div>
						</div>
					</div>
					<div class="colBlock col-sm-12">
						<div class="row">
							<div class="col-xs-6 col-sm-6 text-left"><img src="<?php echo get_template_directory_uri(); ?>/images/help-with-manage.png" alt="" /></div>
							<div class="col-xs-6 col-sm-6"><span class="help-title">Bij het beheren van uw website</span></div>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
</section> <!-- end introduction -->


<!-- PAGE SIDEBAR -->
<?php if( dynamic_sidebar('page_sidebar') ); ?>



<?php get_footer(); ?>