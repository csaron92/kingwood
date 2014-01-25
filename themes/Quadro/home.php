<?php get_header(); ?>

<div id="container">
	<div id="container2">
		<div id="left-div">
			<?php if (get_option('quadro_featured') == 'on') include(TEMPLATEPATH . '/includes/featured.php'); ?>

			<?php if (get_option('quadro_show_tabs') == 'on') include(TEMPLATEPATH . '/includes/tabs.php'); ?>
			
			<div style="clear: both;"></div>
			
			<?php if (get_option('quadro_duplicate') == 'false') {
				$args=array(
					   'showposts'=>get_option('quadro_homepage_posts'),
					   'post__not_in' => $ids,
					   'paged'=>$paged,
					   'category__not_in' => get_option('quadro_exlcats_recent'),
				);
			} else {
				$args=array(
				   'showposts'=>get_option('quadro_homepage_posts'),
				   'paged'=>$paged,
				   'category__not_in' => get_option('quadro_exlcats_recent'),
				);
			};
			query_posts($args); ?>
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