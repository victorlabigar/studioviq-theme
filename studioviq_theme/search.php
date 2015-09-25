<?php
/**
 * The template for displaying search results.
 *
 * Author: The Secret Lab
 * Author URI: http://thesecretlab.tv/
 *
 */ ?>

<?php get_header("search"); ?>

	<section class="page-default white-bg section-txt search-results">
		<div class="wrap">
			<div class="search-content">
          
          <?php if ( have_posts() ) : ?>
          <!-- <h2>Zoekresultaten</h2> -->
          <?php get_search_form(); ?>
          <h3 id="output">
    			
    			<?php printf( __( 'Je zocht op: %s', '' ), '<span>' . get_search_query() . '</span>' ); ?>

    			<?php /* Search Count */

    				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    				$allsearch = new WP_Query(array('s'=>$s, 'category_name' => 'blog', 'orderby'=> 'menu_order','paged'=>$paged) );
            //$allsearch = new WP_Query(array('s'=>$s, 'orderby'=> 'menu_order','paged'=>$paged, 'post_type' => array('blog')) );
    				$key = wp_specialchars($s, 1);
    				$count = $allsearch->found_posts;
    				_e('');
    				_e('<span class="search-terms">'); ('</span>');
    				_e(' &mdash; ');
    				echo $count . ' ';
    				_e('artikel(en)');
    				//wp_reset_query(); 
    				?>
    			</h3>

          <!-- Start the Loop -->
      		<?php
          $ctr = 1;
          //while ( have_posts() ) : the_post();
          while ( $allsearch->have_posts() ) : $allsearch->the_post();
          $exclude_search = get_custom_field('exclude_search');
          if($exclude_search == 1){
            /* SKIP */
          }else{
            ?>
        			<div class="odd_even<?php echo $ctr%2 === 0 ? " even": ""; ?>">
        				<h4><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
        				<p><?php echo strip_tags(improved_trim_excerpt(null, 30))?></p>
        			</div>
        		<?php
          }
          $ctr++;
          endwhile;
          ?>
          <br>
      			<?php kriesi_pagination($allsearch->max_num_pages); ?>
      		<?php else : ?>
            <h2>Helaas, niets gevonden!</h2>
            <br />
            <p>Probeer hieronder een andere zoekopdracht...</p>
            <?php get_search_form(); ?>
            
          <?php endif; ?>
			</div>
		</div>
	</section>


<?php get_footer(); ?>