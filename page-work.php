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
 * Template Name: Work
 *	
 *	
 */ ?>

<?php get_header(); ?>

<section id="recent-cases" class="white-bg paddingTop100 section-txt">
	<div class="wrap">
		<div class="centered-text">
			<!-- <h2><?php the_title(); ?></h2> -->
		</div>
	</div>
	
	<div class="row wrap case-grid">
		<?php
			//$cat_name2 = 'recent';
			$args = array( 'post_type' => 'project', 'showposts' => -1 );
			$loop = new WP_Query( $args );
			
			$counter = 1;
			
			if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
		?>
		
		
		<?php
      if ($counter == 2 || $counter == 1 )  {
          $fluidClasses = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
      } else  {
          $fluidClasses = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
      }
    ?>
		
				<div class="case <?php echo $fluidClasses; ?>  ">
					<a href="<?php echo get_permalink(); ?>">
						<?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_tag', 'overview-img') ); ?>
					</a>
					<a href="<?php echo get_permalink(); ?>">
						<p class="related-title"><?php print_custom_field('overview_title'); ?><span><?php print_custom_field('overview_subtitle'); ?></span></p>
					</a>
				</div>

				<?php
        	if ( ( $counter ) === 2 || ($counter - 2) % 3 === 0) :
        ?>
		      <div class="clearfix visible-md visible-lg "></div>
        <?php endif; ?>


		<?php
			$counter++;
			endwhile;
		?>
		
		<?php else : ?>

        <div id="post-not-found" class="hentry clearfix">
            <div class="article-header">
                <h3><?php _e('Helaas, er zijn nog geen artikelen!', 'purepress'); ?></h3>
            </div>
            <div class="entry-content">
                <p><?php _e('Probeer aub één van onze andere categorieën hier boven', 'purepress'); ?></p>
            </div>
        </div>
        
    <?php endif;  ?>
    
	</div>
	
</section> <!-- end recent-cases -->

<!-- PAGE SIDEBAR -->
<?php if( dynamic_sidebar('page_sidebar') ); ?>

<section id="we-can-help" class="white-bg section-txt">
	<div class="wrap">
		<div class="centered-text">
			<h2>StudioViq helpt graag</h2>
			<p>Neem dan vrijblijvend contact met ons op en laat je verrassen door de services en diensten die StudioViq jou kan aanbieden.</p>
		</div> <!-- end centered-text -->
	</div> <!-- end wrap -->
	
	<ul class="also-help-with">
		<li>
			<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-mobile.png" alt="" />
			<span class="help-title">
				Bij het ontwikkelen van een nieuw product
			</span>
		</li>
		<li>
			<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			<span class="help-title">
				Bij het verbeteren van een bestaand product
			</span>
		</li>
		<li>
			<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-manage.png" alt="" />
			<span class="help-title">
				Bij het beheren van uw website
			</span>
		</li>
	</ul>
</section> <!-- end we-can-help -->

<?php get_footer(); ?>