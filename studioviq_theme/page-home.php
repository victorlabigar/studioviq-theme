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
 * Template Name: Home
 *	
 *	
 */ ?>

<?php get_header("home"); ?>


	<!-- START HEADER -->
	<header id="header" class="header clear" role="banner">		
		<div class="align-horizontal">
			<div class="align-vertical">
				<div id="intro" class="text-container">
					<!-- logo -->
					<div id="logo" class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-element.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->
					<h1 id="caption">
						<span>We are studioviq</span>
						<span>We build and create</span>
						<span>your success.</span>
					</h1>
					<!-- <h2 id="sub-caption">wie wij zijn en wat we doen</h2> -->
					<div id="explore"><a class="scroll">wie wij zijn en wat we doen</a></div>
				</div>
			</div>
		</div>
	<!-- END HEADER -->
	</header>
	
<!-- START TOP-BAR -->
<?php include "partials/top-navigation.php"; ?>
<!-- END TOP-BAR -->	

<!-- INTRO SIDEBAR -->
<?php if( dynamic_sidebar('page_intro') ); ?>
	

<!-- Laatste berichten -->
<section id="latest-news" class="container-fluid grey-bg section-txt">
	<div class="row">
		
			<h2 class="text-center">Laatste berichten</h2>
			<?php
			  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			  $loop2 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 7, 'paged' => $paged, 'cat' => 3));
			?>
			<ul class="news-list">
				<?php
          $i=0;
          while ($loop2->have_posts()) {
					$loop2->the_post();
        ?>
				<li class="news-list-item">
					<div class="row contain">
						<div class="col-xs-12 col-sm-3"><span class="date"><?php echo get_the_date('j F Y'); ?></span></div>
						<div class="col-xs-12 col-sm-6"><h2><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h2></div>
						<div class="col-xs-12 col-sm-3 hidden-xs"><?php the_post_thumbnail('blog-thumb'); ?></div>
					</div>
				<?php
          if ($i % 2) {
	          //echo '<div class="clearfix"></div>';
	          }
						$i ++;
					} 
				?>
			</ul>
			
	</div> <!-- end row -->
</section> <!-- end latest-news -->
<!-- end latest-news -->


<section id="recent-cases" class="blue-bg">
	<div class="wrap">
		<div class="centered-text">
			<h2>Recente projecten</h2>
		</div>
	</div>

	<div class="row wrap case-grid">
		<?php
			//$cat_name2 = 'recent';
			$args2 = array( 'post_type' => 'project', 'showposts' => 8 );
			$loop = new WP_Query( $args2 );
			
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
					<a href="<?php echo get_permalink(); ?>"><?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_tag', 'overview-img') ); ?></a>
					<a href="<?php echo get_permalink(); ?>">
						<p class="related-title-white"><?php print_custom_field('overview_title'); ?><span><?php print_custom_field('overview_subtitle'); ?></span></p>
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


<!-- WHATWEDO SIDEBAR -->
<?php if( dynamic_sidebar('home_whatwedo') ); ?>

<!-- end latest-news -->

<!-- HOME SIDEBAR -->
<?php if( dynamic_sidebar('home_sidebar') ); ?>


<?php get_footer(); ?>