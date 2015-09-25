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
					<h1 id="caption">Welkom bij Studioviq</h1>
					<h2 id="sub-caption">Wij zijn er voor jouw succes!</h2>
					<div id="explore"><a class="scroll"><i class="fa fa-angle-down fa-4x"></i></a></div>
				</div>
			</div>
		</div>
	<!-- END HEADER -->
	</header>
	
	
	<!-- START TOP-BAR -->
	<div id="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-xs-10 col-md-4">
					
					<div id="logo-lettering">
						<a class="scroll header" href="#header"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-studioviq.png" alt="Logo Lettering"/></a>
					</div>
					
				</div>
				<div id="menu-mobile" class="col-xs-2 hidden-md hidden-lg">
					<i class="fa fa-align-justify fa-2x"></i>
				</div>
				<div class="col-xs-12 col-md-8">
					<nav id="top-navigation" role="navigation">
						<?php studioviq_header_nav(); ?>
					</nav>
				</div>

			</div>
		</div>
	</div>
	<!-- END TOP-BAR -->	
	
	<!-- OFFCANVAS NAVIGATION -->
	<!--
<div id="offcanvas">
	
		<div class="show-offcanvas">
			<i class="fa fa-align-justify fa-2x"></i>
			<i class="fa fa-times fa-2x"></i>
		</div>
	
		<nav id="offcanvas-navigation">
			<?php //get_template_part('sidebar'); ?>
		</nav>
		
	</div>
-->

	<!-- INTRO SIDEBAR -->
	<?php if( dynamic_sidebar('page_intro') ); ?>


<section id="recent-cases" class="blue-bg">
	<div class="wrap">
		<div class="centered-text">
			<h2>Recente projecten</h2>
		</div>
	</div>

	<div class="wrap case-grid">
		<?php
			$i=0;
			$cat_name2 = 'recent';
			$args2 = array( 'post_type' => 'project','category_name' => $cat_name2 );
			$loop = new WP_Query( $args2 );
			
			while ($loop->have_posts()) {
			$loop->the_post();
		?>
		
		<div class="case half">
			<a href="<?php echo get_permalink(); ?>"><?php echo( CCTM::filter( get_post_meta(get_the_ID(), 'slider_image', true), 'to_image_tag', 'overview-img') ); ?></a>
			<a href="<?php echo get_permalink(); ?>">
				<p class="related-title-white"><?php print_custom_field('overview_title'); ?><span><?php print_custom_field('overview_subtitle'); ?></span></p>
			</a>
		</div>
		
		<?php
		  if ($i % 2) {
			  echo '<div class="clearfix"></div>';
		  }
			  $i ++;
		  } 
		?>

	</div>
	
</section> <!-- end recent-cases -->

<!-- WHATWEDO SIDEBAR -->
<?php if( dynamic_sidebar('home_whatwedo') ); ?>


<!--
<section id="latest-news" class="grey-bg section-txt">
	<div class="wrap">
		<div class="centered-text">
			<h2>Recente berichten</h2>
			<?php
			  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			  $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 7, 'paged' => $paged, 'cat' => 3));
			?>
			<ul class="news-list">
				<?php
          //$i=0;
          while ($loop->have_posts()) {
					$loop->the_post();
        ?>
				<li><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a><span class="date"><?php echo get_the_date('j F Y'); ?></span></li>
				<?php
          if ($i % 2) {
	          //echo '<div class="clearfix"></div>';
	          }
						$i ++;
					} 
				?>
			</ul>
			<p></p>
		</div>
	</div>
</section>
--> <!-- end latest-news -->

<!-- HOME SIDEBAR -->
<?php if( dynamic_sidebar('home_sidebar') ); ?>


<?php get_footer(); ?>
