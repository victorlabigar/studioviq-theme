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

<?php get_header("home"); 
	
	$post_type_name = "project";
?>

<?php //include "partials/top-navigation.php"; ?>

<!-- <div class="row"> -->
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php
			$next_post = get_next_post();
			$previous_post = get_previous_post();
		?>
		
		<!-- START PROJECT-TOP-BAR -->
		<div id="project-top-bar">
			<div class="col-xs-2">
				<?php if ($previous_post != '') { ?>
					<a href="<?php echo get_permalink( $previous_post->ID ); ?>" class="load"><div id="previous-project"><i class="fa fa-angle-left fa-3x"></i></div></a>
					<div id="previous-project-name" style="left: 8em; opacity: 0;"><h2 id="project-title"><?php echo $previous_post->post_title; ?></h2></div>
				<?php } ?>
			</div>
			<div class="col-xs-8">
				<div class="show-offcanvas aligncenter">
					<a href="/?page_id=21"><i class="fa fa-times fa-2x"></i></a>
				</div>			
			</div>
			<div class="col-xs-2">
				<?php if ($next_post != '') { ?>
					<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="load"><div id="next-project"><i class="fa fa-angle-right fa-3x  "></i></div></a>
					<div id="next-project-name"><h2 id="project-title"><?php echo $next_post->post_title; ?></h2></div>
				<?php } ?>
			</div>
		<!-- END PROJECT-TOP-BAR -->
		</div>
		
		
		<div id="project">
			<div id="project-header">
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
				<img src="<?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_src') ); ?>" />
			</div>
		</div>

			
	
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- article -->
		<article>
			
			<h1><?php _e( 'Sorry, nothing to display.', 'cotton' ); ?></h1>
			
		</article>
		<!-- /article -->
	
	<?php endif; ?>
		
<!-- </div> -->

<section class="white-bg section-txt">
	<div class="wrap">
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" >
			
				<div id="project-details" <?php post_class(); ?>>
					<!-- <div class="container"> -->
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-1">
								<h2 id="project-title"><?php the_title();?></h2>
								<!-- <h3><?php print_custom_field('slider_title'); ?></h3> -->
								<p id="project-client"><?php print_custom_field('client'); ?></p>
								<p id="project-sidenote"><?php print_custom_field('sidenote'); ?></p>
								<p id="project-tags"><?php the_tags( __( '', 'studioviq' ), ', ', '<br>'); ?></p>
								<p id="project-share">
									<span class="col-sm-3">
										<?php
										// Function via: http://css-tricks.com/snippets/php/get-current-page-url/
										function getUrl() {
										$url = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] : 'https://'.$_SERVER["SERVER_NAME"];
										$url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
										$url .= $_SERVER["REQUEST_URI"];
										return $url;
										}
										 
										// Print Share link on Page
										$encoded_url = urlencode( getUrl() );
										if ( !empty($encoded_url) ){ ?>
										<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_url; ?>" target="_blank">
										<i class="fa fa-facebook-square"></i>
										</a>
										<?php } ?>
										&nbsp;
										<a target="_blank" href="http://twitter.com/home?status=Currently reading <?php echo urlencode(get_permalink()); ?>" alt="Deel dit project op Twitter"><i class="fa fa-twitter-square"></i></a> &nbsp;
										<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo strip_tags(get_the_content()); ?>" alt="Deel dit project op LinkedIn"><i class="fa fa-linkedin-square"></i></a>
									</span>

								</p>
								<?php echo edit_post_link('<i class="fa fa-edit fa-2x"></i>'); ?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-7 end">
								<?php the_content();?>
							</div>
						</div>
					<!-- </div> -->
				</div>
			
							
			</article>
			<!-- /article -->
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
	
	<div class="row wrap case-grid">
	
	<?php	
	
    global $post;
    $categories = wp_get_post_terms($post->ID, 'post');
    
    $showLinkTitle = true;
    
    if (is_array($categories)) {
        foreach ($categories as $key => $cat) {
            
            if( $cat->parent == 9){
                $showLinkTitle = false;
            }
            
            $categories[$key] = $cat->term_id;
        }
    } else {
        $categories = array();
    }

    $post = get_post();
    $query = new WP_Query(array(
        'post_type' => 'project',
        'posts_per_page' => 6,
        'orderby' => 'modified',
        'post__not_in' => array($post->ID)
    ));
    ?>


    <?php if (have_posts()): ?>
		

		<?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class="case col-xs-12  col-sm-6 col-md-4">
				<a href="<?php echo get_permalink(); ?>"><?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_tag', 'overview-img') ); ?></a>
				<a href="<?php echo get_permalink(); ?>">
					<p class="related-title"><?php print_custom_field('overview_title'); ?><span><?php print_custom_field('overview_subtitle'); ?></span></p>
				</a>
			</div>
		<?php endwhile; ?>
		
		<div class="clearfix"></div>
		
		<?php
    	endif;
			wp_reset_query();
    ?>
		
		
		
	</div>
</section> <!-- end recent-cases -->

<?php if( dynamic_sidebar('blue-background') ); ?>


<?php get_footer(); ?>