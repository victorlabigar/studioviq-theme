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
 * Template Name: Blog
 *	
 *	
 */ ?>

<?php get_header("blog"); ?>

<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 12, 'paged' => $paged, 'cat' => 3));
?>

<section id="blog-wrap" class="container-fluid white-bg paddingTop100 section-txt">
	<div class="row wrap">

			<div class="contain">
				<?php //get_search_form(); ?>
			</div>
			
			<ul class="news-list">
				<?php
          //$i=0;
          while ($loop->have_posts()) {
					$loop->the_post();
        ?>
				<li class="news-list-item">
					
					<div class="row contain">
						<div class="col-xs-12 col-sm-3"><span class="date"><?php echo get_the_date('j F Y'); ?></span></div>
						<div class="col-xs-12 col-sm-6"><h2><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h2></div>
						<div class="col-xs-12 col-sm-3 hidden-xs"><?php the_post_thumbnail('blog-thumb'); ?></div>
					</div>
					
					<!-- <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
<?php //echo improved_trim_excerpt(null, 20) ?>
<?php //echo strip_tags(improved_trim_excerpt(null, 30))?>


<!--
<p class="description">Geschreven door <?php the_author(); ?> op <span class="date"><?php echo get_the_date('j F Y'); ?></span> in <span class="tags">
<?php
	//$posttags = get_the_tags();
		//if ($posttags) {
			//foreach($posttags as $tag) {
				//echo '<a href="';echo bloginfo(url);
				//echo '/tags/' . $tag->slug . '" class="' . $tag->slug . '">' . $tag->name . '</a>, ';
			//}
		//}
//?></span>
</p>
-->

				</li>
				<?php
          if ($i % 2) {
            //echo '<div class="clearfix"></div>';
          }
	          $i ++;
	        } 
	      ?>
			</ul>
			
			<div class="pagination-wrapper">
				<?php
        $big = 999999999;
        echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'prev_next' => true,
                'prev_text'    => __('Previous page'),
                'next_text'    => __('Next page'),
                'current' => max( 1, get_query_var('paged') ),
                'total' => $loop->max_num_pages,
                'type' => 'list'
            ));
        ?>
			</div>

	</div>
</section> <!-- end latest-news -->


<!-- PAGE SIDEBAR -->
<?php if( dynamic_sidebar('page_sidebar') ); ?>


<?php get_footer(); ?>