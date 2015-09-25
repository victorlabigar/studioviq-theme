<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header("tags"); ?>

	<section id="blog-wrap" class="container-fluid paddingTop100 white-bg section-txt">
		<div class="row wrap">

				<div class="contain">
				<div class="header-tag">
					<h3>Tag: <?php printf( single_tag_title( '', false ) ); ?></h3>
					<span><?php echo $wp_query->found_posts.' posts'; ?></span>
					<div class="clearfix"></div>
				</div>
				</div>
				
				<ul class="news-list">
					 
					<?php while ( have_posts() ) : the_post(); ?>
					<li class="news-list-item">
						<div class="row contain">
							<div class="col-xs-12 col-sm-3"><span class="date"><?php echo get_the_date('j F Y'); ?></span></div>
							<div class="col-xs-12 col-sm-6">
								<h2><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h2>
								<p class="description"><span class="tags"><?php echo get_the_tag_list('  ',', ',''); ?></span></p>
							</div>
							<div class="col-xs-12 col-sm-3 hidden-xs"><?php the_post_thumbnail('blog-thumb'); ?></div>
							<?php //echo improved_trim_excerpt(null, 30) ?>
							<p><?php //echo strip_tags(improved_trim_excerpt(null, 30))?></p>
							
							
						</div>
					</li>
					<?php endwhile; ?>
				</ul>


		</div>
	</section> <!-- end latest-news -->
	
	
	<!-- PAGE SIDEBAR -->
	<?php if( dynamic_sidebar('page_sidebar') ); ?>
	
<?php get_footer(); ?>