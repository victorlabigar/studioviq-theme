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
 * Template Name: News
 *	
 *	
 */ ?>

<?php get_header(); ?>

<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $loop = new WP_Query(array('post_type' => 'breaking-news', 'posts_per_page' => 24, 'paged' => $paged));
?>



<section id="latest-news" class="white-bg section-txt">
	<div class="wrap">
		<div class="centered-text">
			<h2><?php the_title(); ?></h2>
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
</section> <!-- end latest-news -->


<!-- PAGE SIDEBAR -->
<?php if( dynamic_sidebar('page_sidebar') ); ?>


<?php get_footer(); ?>