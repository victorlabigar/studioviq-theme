<?php get_header(); ?>

<section id="news-single-wrap" class="white-bg section-txt">
	<div class="wrap">

			<?php // get_search_form(); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="single-blog-post">
				<h2 class="title"><a href="<?php get_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
					
				<p class="description">Geschreven door <?php the_author(); ?> op <span class="date"><?php echo get_the_date('j F Y'); ?></span> in <span class="tags"><?php the_tags(); ?></span>
				</p>
			</div>
			<?php endwhile; // end of the loop. ?>
			

	</div>
</section>

<?php get_footer(); ?>