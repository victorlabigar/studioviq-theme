<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till the menu
 *
 * Author: The Secret Lab
 * Author URI: http://thesecretlab.nl/
 */ ?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml"> <!--<![endif]-->
	<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="google-site-verification" content="1f6YCa3znAWVDxX9697BeaXAIXe0ByS2RpvyNWZ5xVI" />
    
    <meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
    
    <!-- OG META TAGS -->
				<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>  
				<!-- the default values -->  
				<meta property="fb:app_id" content="267402996770920" />
				<meta property="fb:admins" content="1536724528" />
    
    <!-- if page is content page -->  
				<?php if (is_single()) { ?>  
				<meta property="og:url" content="<?php the_permalink() ?>"/>  
				<meta property="og:title" content="<?php single_post_title(''); ?>" />  
				<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />  
				<meta property="og:type" content="article" />  
				<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />  
				  
				<!-- if page is others -->  
				<?php } else { ?>  
				<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />  
				<meta property="og:description" content="<?php bloginfo('description'); ?>" />  
				<meta property="og:type" content="website" />  
				<meta property="og:image" content="http://studioviq.nl/wp-content/themes/studioviq_theme/css/img/logo.png" /> <?php } ?>
    
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Kreon:300,400' rel='stylesheet' type='text/css'>
		
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Merriweather:400,900,700' rel='stylesheet' type='text/css'>
		
    <title><?php VLUDIO_title(); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144.png" />
    
    <link rel="icon" href="http://www.studioviq.nl/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="http://www.studioviq.nl/favicon.ico" type="image/x-icon" />

    <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

		
    <?php wp_head(); ?>
    
    <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-51396428-1', 'studioviq.nl');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');
		</script>
		
<?php include('partials/ascii.php'); ?>
		
  </head>

	<body <?php body_class(); ?>>
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&appId=201323433266624&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div id="page" class="content" role="main">