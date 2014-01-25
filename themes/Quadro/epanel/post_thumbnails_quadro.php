<?php 

/* sets predefined Post Thumbnail dimensions */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	
	//blog page template
	add_image_size( 'ptentry-thumb', 184, 184, true );
	//gallery page template
	add_image_size( 'ptgallery-thumb', 207, 136, true );
	
	//entry.php
	add_image_size( 'entry-thumb', 263, 108, true );	
	
	//featured.php
	add_image_size( 'featured', 159, 212, true );
	
	//page image size
	add_image_size( 'pageimage', get_option($shortname.'_thumbnail_width_pages'), get_option($shortname.'_thumbnail_height_pages'), true );
	
	//single post image size
	add_image_size( 'postimage', get_option($shortname.'_thumbnail_width_posts'), get_option($shortname.'_thumbnail_height_posts'), true );
};
/* --------------------------------------------- */

?>