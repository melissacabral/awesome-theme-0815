<?php
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



//no close PHP