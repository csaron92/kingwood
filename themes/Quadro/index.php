<?php get_header(); ?>

<div id="container">
	<div id="container2">
		<div id="left-div">			
			<?php if (is_archive()) $post_number = get_option('quadro_archivenum_posts');
			if (is_search()) $post_number = get_option('quadro_searchnum_posts');
			if (is_tag()) $post_number = get_option('quadro_tagnum_posts');
			if (is_category()) $post_number = get_option('quadro_catnum_posts');
			
			if (!is_search()) {
				global $query_string; 
				if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
				else query_posts($query_string . "&showposts=$post_number&paged=$paged"); 
			} else {
				global $query_string; 

				parse_str($query_string, $qstring_array);
							
				$args = array('showposts' => $post_number,'paged'=>$paged);
				
				if ( isset($_GET['et_searchform_submit']) ) {			
					$postTypes = array();
					if ( !isset($_GET['et-inc-posts']) && !isset($_GET['et-inc-pages']) ) $postTypes = array('post');
					if ( isset($_GET['et-inc-pages']) ) $postTypes = array('page');
					if ( isset($_GET['et-inc-posts']) ) $postTypes[] = 'post';
					$args['post_type'] = $postTypes;
					
					if ( $_GET['et-month-choice'] != 'no-choice' ) {
						$et_year = substr($_GET['et-month-choice'],0,4);
						$et_month = substr($_GET['et-month-choice'], 4, strlen($_GET['et-month-choice'])-4);
						$args['year'] = $et_year;
						$args['monthnum'] = $et_month;
					}
					
					if ( $_GET['et-cat'] != 0 )
						$args['cat'] = $_GET['et-cat'];
				}	
				
				$args = array_merge($args,$qstring_array);
							
				query_posts($args);
			}
			?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
			<?php endwhile; ?>
				<div style="clear: both;"></div>
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				else { ?>
				     <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
				<?php } ?>
			<?php else : ?>
				<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
			<?php endif; wp_reset_query(); ?>
		</div> <!-- end #left-div -->
	</div> <!-- end #container2 -->

	<?php get_sidebar(); ?>
	
</div> <!-- end #container -->
<?php get_footer(); ?>
</body>
</html>