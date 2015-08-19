<?php
//required - make titles more SEO friendly. use wp-title() in header
add_theme_support( 'title-tag' );

//activate sleeping wordpress features
add_theme_support( 'post-thumbnails' );

//allow different kinds of posts to be styled differently
add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'audio', 'video', 'image', 'chat', 'status', 'aside' ));

add_theme_support( 'custom-background' );

//2-step process. do this and then add the <img> in your header file
add_theme_support( 'custom-header' , array(
										'width' => 300,
										'height' => 150,
									) );

//wordpress uses XHTML1 by default on these things. switch them to HTML5:
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//make RSS feeds better and more accessible. 
add_theme_support( 'automatic-feed-links' );

//add any custom image sizes you need for banners, ads, etc
//					name 	 width  height  crop?
add_image_size( 'big-banner', 1065, 250, true );

//required for auto embeds. set to the width of your content column
if ( ! isset( $content_width ) ) $content_width = 680;

//Make excerpts better
//custom length (number of words)

function awesome_excerpt_length(){
	return 20;
}
add_filter( 'excerpt_length', 'awesome_excerpt_length' );

//fix the [...]
function awesome_readmore(){
	return ' <a href="' . get_permalink() . '" class="readmore">Read More</a>';
}
			// built in  		//custom 
add_filter( 'excerpt_more', 'awesome_readmore' );

//Register all menu areas
function awesome_menus(){
	register_nav_menus( array(
		//code_name => 'Human Readable Name',
		'main_nav' 	=> 'Main Navigation Area',
		'utilities'	=> 'Utility Bar',
	) );
}
add_action( 'init', 'awesome_menus' );


/**
 * Demo for my audits and will :)
 */
function awesome_script(){
	wp_enqueue_script( 'jquery' );

	//custom script
	//1. register it	
	$path = get_stylesheet_directory_uri() . '/js/custom.js';
	//				handle , path , dependencies,  ver, in footer?   
	wp_register_script( 'custom', $path , 'jquery', '1.0' , true );
	//2. enqueue it
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'awesome_script' );


//Create all widget Areas
function awesome_widget_areas(){
	register_sidebar( array(
		'name' 		=> 'Blog Sidebar', 	//human readable. will show in admin panel
		'id'		=> 'blog-sidebar', 	//code-friendly. use when displaying the area
		'description'=> 'These widgets appear next to the blog archives',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 		=> 'Footer Widgets', 	//human readable. will show in admin panel
		'id'		=> 'footer-widgets', 	//code-friendly. use when displaying the area
		'description'=> 'These widgets appear at the bottom of all pages',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 		=> 'Page Sidebar', 	//human readable. will show in admin panel
		'id'		=> 'page-sidebar', 	//code-friendly. use when displaying the area
		'description'=> 'These widgets appear next to most pages',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 		=> 'Home Widgets', 	//human readable. will show in admin panel
		'id'		=> 'home-widgets', 	//code-friendly. use when displaying the area
		'description'=> 'These widgets appear on the static home page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'awesome_widget_areas' );


//make better UX when replying to comments. 
//the form will jump up to the comment being replied to
function awesome_comment_script(){
	if ( is_singular() ){
		 wp_enqueue_script( "comment-reply" );
	}
}
add_action( 'wp_enqueue_scripts', 'awesome_comment_script' );

//no close PHP