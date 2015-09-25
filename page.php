<?php get_header(); ?>

<section class="white-bg section-txt paddingTop100 paddingBottom40">
	<div class="wrap">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="contain">
			<!-- <h2><?php the_title(); ?></h2> -->
			<!-- <p class="subtitle blue-color"></p> -->
			<?php the_content(); ?>
		</div>
	</div>
	<?php endwhile; ?>
</section> <!-- end introduction -->

<!-- PAGE SIDEBAR -->
<?php if( dynamic_sidebar('page_sidebar') ); ?>

<?php get_footer(); ?>

