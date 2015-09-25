<?php get_header("blog"); ?>

<section id="blog-single-wrap" class="white-bg section-txt">
	<div class="body-text">

			<?php //get_search_form(); ?>
			<!-- <a href="/blog" class="back-button">Terug naar blog</a> -->
			
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="single-blog-post">
				
				<p class="description"><span class="date"><?php echo get_the_date('j F Y'); ?></span></p>
				<h2 class="title"><?php the_title(); ?></h2>
				
				
				<?php the_content(); ?>
					
				<p class="description"><?php echo get_the_tag_list(' Tags: ',', ',''); ?><br />Geschreven door <?php the_author(); ?></p>
			</div>
			<?php endwhile; // end of the loop. ?>
			

	</div>
</section>

<?php get_footer(); ?>