
<?php
/**
 * Sample template for displaying single post posts.
 * Save this file as as single-post.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>
<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	

	<h1><?php the_title(); ?></h1>
		<?php the_content(); 
		echo $post->ID;
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
		print_r($thumb);
?>
		
		<strong>Képek:</strong> <?php 
		get_template_part( 'pretty_photo', get_post_format() );
?><br />


<?php			// Previous/next post navigation.
					twentyfourteen_post_nav();

 endwhile; // end of the loop. 
?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer(); 
?>