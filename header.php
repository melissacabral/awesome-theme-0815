<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- HTML5 shiv -->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/reset.css" />
	<?php 
	//Necessary in <head> for JS and plugins to work. 
	//I like it before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<body <?php body_class(); ?>>	
	<div id="wrapper">
	<header role="banner">
		<div class="top-bar clearfix">

		
			<!-- <img src="<?php header_image(); ?>" alt="" class="hideous-banner" id="whatever"> -->
	


			<h1 class="site-name">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"> 
					<?php bloginfo('name'); ?> 
				</a>
			</h1>
			<h2 class="site-description"> <?php bloginfo('description'); ?> </h2>
			
			<?php wp_nav_menu( array(
				'theme_location' 	=> 'main_nav',  //defined in functions.php
				'container'			=> 'nav',       //wrap with <nav></nav>
				'menu_class'		=> 'nav', 		//<ul class="nav">
				'fallback_cb'		=> '',			//no menu if no menu selected
			) ); ?>

		</div><!-- end .top-bar -->
		
		<?php wp_nav_menu( array(
				'theme_location' 	=> 'utilities', 
				'container' 		=> false,   	//no container
				'menu_class'		=> 'utilities',
				'fallback_cb'		=> '',		   //no menu if no menu selected
		) ); ?>

		<?php get_search_form(); //includes searchform.php if it exists, if not, this outputs the default search bar ?>	
	</header>