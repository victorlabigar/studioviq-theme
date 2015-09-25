<?php
	add_action( 'after_setup_theme', 'vludio_setup' );
	
	define( 'TEMPPATH' , get_bloginfo ('stylesheet_directory'));
	define( 'IMAGES', TEMPPATH. "/images");

/****************************************************************
   * REGISTER MENUS
****************************************************************/

function vludio_setup(){
	// Add Menu Support
	add_theme_support('menus');
	load_theme_textdomain('studioviq_theme', get_template_directory() . '/languages');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'overview-img', 1024, 576, true );
	add_image_size( 'slider-img', 1200, 763, true );
	add_image_size( 'slider-logo', 210, 154, false );
	add_image_size( 'blog-thumb', 150, 150, true );
}




// Change the fallback menu styling
function add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
$divclass = $matches[1];
$toreplace = array('<div class="'.$divclass.'">', '</div>');
$new_markup = str_replace($toreplace, '', $page_markup);
$new_markup = preg_replace('/^<ul>/i', '<ul class="sidebar-nav">', $new_markup);
return $new_markup; }




// Register cotton Blank Navigation
function register_studioviq_menu(){
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'studioviq_theme'), // Main Navigation
        'off-canvas-menu' => __('Off-Canvas Menu', 'studioviq_theme'), // Off-Canvas Navigation
        'header-menu-pages' => __('Main Menu', 'studioviq_theme' ),
				'footer-menu-pages' => __('Footer Menu', 'studioviq_theme' )
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var){
    return is_array($var) ? array() : '';
}





/*------------------------------------*\
	Functions NAV
\*------------------------------------*/

// cotton Blank navigation
function studioviq_header_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => '',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="header-nav list-inline">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new description_walker()
		)
	);
}

// cotton Blank navigation
function studioviq_sidebar_nav(){
	wp_nav_menu(
	array(
		'theme_location'  => 'off-canvas-menu',
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="sidebar-nav">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}



class description_walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth, $args)
  {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$prepend = '<strong>';
		$append = '</strong>';
		$description  = '<div class="header-nav_list-hover"></div>';
		
		if($depth != 0)
		{
		         $description = $append = $prepend = "";
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
}




/****************************************************************
   * WP-TITLE STANDARD (needed for the <title></title> tag)
****************************************************************/

function VLUDIO_title(){
	
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'studioviq_theme' ), max( $paged, $page ) );	
}


/****************************************************************
 * EXCERPT FUNCTION - limits the text
 ****************************************************************/

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function improved_trim_excerpt($text = '',$wordLimit = 20) { // Fakes an excerpt if needed
  if ( '' == $text ) {
    $text = get_the_content('');
  }

  $text = apply_filters('the_content', $text);
  $text = str_replace('\]\]\>', ']]&gt;', $text);
  $text = strip_tags($text, '<ol>,<h1>,<h2>,<h3>,<h4>,<ul>,<li>,<p>');
  $excerpt_length = $wordLimit;
  $words = explode(' ', $text, $excerpt_length + 1);

  if (count($words)> $excerpt_length) {
    array_pop($words);
    array_push($words, '[...]');
    $text = implode(' ', $words);
  }

  return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');


/****************************************************************
   * KRIESI PAGINATION - creates a pagination
****************************************************************/
function kriesi_pagination($pages = '', $range = 2)
{
   $showitems = ($range * 2)+1;

   global $paged;
   if(empty($paged)) $paged = 1;

   if($pages == '')
   {
       global $wp_query;
       $pages = $wp_query->max_num_pages;
       if(!$pages)
       {
           $pages = 1;
       }
   }

   if(1 != $pages)
   {
       echo "<div class='pagination'><div class='pagesWrap'>";
       if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
       if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

       for ($i=1; $i <= $pages; $i++)
       {
           if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
           {
               echo ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class=\"btn-green\">".$i."</a>";
           }
       }

       if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
       if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
       echo "</div></div>\n";
   }
}

/****************************************************************
   * ADD CUSTOM POST TYPE - news post type
****************************************************************/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'breaking-news',
		array(
			'labels' => array(
				'name' => __( 'Nieuws' ),
				'singular_name' => __( 'nieuws' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}

/****************************************************************
   * REGISTER WIDGETS- news post type
****************************************************************/
require_once('classes'.DIRECTORY_SEPARATOR. 'vl_widget_widget_white.php');
require_once('classes'.DIRECTORY_SEPARATOR. 'vl_widget_widget_grey.php');
require_once('classes'.DIRECTORY_SEPARATOR. 'vl_widget_widget_blue.php');
require_once('classes'.DIRECTORY_SEPARATOR. 'vl_widget_widget_intro.php');
require_once('classes'.DIRECTORY_SEPARATOR. 'vl_widget_widget_green.php');

function my_widgets_init() {   
	
	register_sidebar( array(
		'name' => 'Introduction',
		'id' => 'page_intro',
		'description' => __( 'A widget area for introduction', 'studioviq_theme' ),
		'before_widget' => '<section id="over" class="introduction white-bg section-txt"><div class="wrap"><div class="contain">',
		'after_widget' => '</div></div></section>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Home - What We Do',
		'id' => 'home_whatwedo',
		'description' => __( 'A widget area for homepage whatwedo', 'studioviq_theme' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Home sidebar',
		'id' => 'home_sidebar',
		'description' => __( 'A widget area for various widgets', 'studioviq_theme' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => 'Page sidebar',
		'id' => 'page_sidebar',
		'description' => __( 'A widget area for various widgets', 'studioviq_theme' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Referenties',
		'id' => 'referenties',
		'description' => __( 'A widget area for References', 'studioviq_theme' ),
		'before_widget' => '<section id="what-we-do" class="white-bg section-txt"><div class="wrap"><div class="centered-text">',
		'after_widget' => '</div></div></section>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
	register_widget('Widget_White');
	register_widget('Widget_Grey');
	register_widget('Widget_Blue');
	register_widget('Widget_Intro');
	register_widget('Widget_Green');
}

add_action( 'widgets_init', 'my_widgets_init' );


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')){
  // Define Sidebar Widget Area 1
  register_sidebar(array(
      'name' => __('Widget Area 1', 'studioviq_theme'),
      'description' => __('The widgets will be displayed at offcanvas menu..', 'studioviq_theme'),
      'id' => 'widget-area-1',
      'before_widget' => '<div id="%1$s" class="%2$s">',
      'after_widget' => '</div></div>',
      'before_title' => '<h3>',
      'after_title' => '</h3><div class="collapse">'
  ));

}

/****************************************************************
   * SEARCH HOOK - only search in blog
****************************************************************/

function SearchFilter($query) {
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
}


// Load cotton Blank scripts (header.php)
function studioviq_header_scripts()
{

    if (!is_admin()) {
    
    	wp_deregister_script('jquery');
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', array(), '1.9.1');
    	wp_enqueue_script('jquery');
    	
    	wp_register_script('conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/2.2.0/conditionizr.min.js', array(), '2.2.0');
        wp_enqueue_script('conditionizr');

        wp_register_script('modernizr', get_template_directory_uri() . '/js/libs/modernizr.min.custom.js', array(), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr');

        wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/libs/bootstrap.min.js', array(), '3.1.1'); // bootstrap
        wp_enqueue_script('bootstrap');

        wp_register_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), '4.0.3', 'all');
        wp_enqueue_style('font-awesome'); 
        
        wp_register_script('jquery-easing', get_template_directory_uri() . '/js/libs/jquery.easing.js', array(), '1.3.0'); 
        wp_enqueue_script('jquery-easing');
        
        wp_register_script('idangerous-swiper', get_template_directory_uri() . '/js/libs/idangerous.swiper.js', array(), '2.1.0'); 
        wp_enqueue_script('idangerous-swiper');
       
        wp_register_script('jquery-mixitup', get_template_directory_uri() . '/js/libs/jquery.mixitup.js', array(), '1.5.3'); 
        wp_enqueue_script('jquery-mixitup');

        wp_register_script('jquery-player', get_template_directory_uri() . '/js/libs/jquery.jplayer.js', array(), '2.3.0'); 
        wp_enqueue_script('jquery-player');

        wp_register_script('flickr', get_template_directory_uri() . '/js/libs/jquery.flickr.js', array(), '1.5.3'); 
        wp_enqueue_script('flickr');

        wp_register_script('instagram', get_template_directory_uri() . '/js/libs/jquery.instagram.js', array(), '1.5.3'); 
        wp_enqueue_script('instagram');
        
        wp_register_script('twitter', get_template_directory_uri() . '/js/libs/jquery.twitter.js', array(), '1.5.3'); 
        wp_enqueue_script('twitter');
        
        wp_register_script('timeago', get_template_directory_uri() . '/js/libs/jquery.timeago.js', array(), '1.5.3'); 
        wp_enqueue_script('timeago');

        wp_register_script('fluidvids', get_template_directory_uri() . '/js/libs/fluidvids.js', array(), '1.2.0', true); 
        wp_enqueue_script('fluidvids');

        wp_register_script('masonry', get_template_directory_uri() . '/js/libs/masonry.js', array(), '3.1.2', true);
        wp_enqueue_script('masonry');        
        wp_register_script('images-loaded', get_template_directory_uri() . '/js/libs/imagesloaded.js', array(), '3.0.4', true); 
        wp_enqueue_script('images-loaded'); 
       
        wp_register_script('studioviqscripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0.0'); 
        wp_enqueue_script('studioviqscripts'); 
    }
}

// Load cotton Blank conditional scripts
function studioviq_conditional_scripts(){
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); 
    }
}

// Load cotton Blank styles
function studioviq_styles() {
	
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Cabin:400,700,400italic|Merriweather:900|Lora:400,700,400italic', array(), '1.0', 'all');
    wp_enqueue_style('google-fonts'); 

    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); 

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.1.1', 'all');
    wp_enqueue_style('bootstrap'); 

    
    wp_register_style('studioviq_theme', get_template_directory_uri() . '/css/styles.min.css', array(), '1.0', 'all');
    wp_enqueue_style('studioviq_theme'); 
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

add_action('init', 'studioviq_header_scripts'); // Add Custom Scripts to wp_head
add_action('init', 'vludio_setup' );
add_action('init', 'register_studioviq_menu'); // Add cotton Blank Menu
add_action('wp_enqueue_scripts', 'studioviq_styles'); // Add Theme Stylesheet

add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('wp_page_menu', 'add_menuid');
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)


/****************************************************************
   * REMOVE DEFAULT WIDGETS
****************************************************************/

function remove_some_wp_widgets(){
  unregister_widget('WP_Widget_Calendar');
  //unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Tag_Cloud');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Nav_Menu_Widget');
  unregister_widget('WP_Widget_Pages');

}

add_action('widgets_init','remove_some_wp_widgets', 1);