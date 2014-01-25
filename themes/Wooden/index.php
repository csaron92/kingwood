<?php get_header(); ?>

<div id="<?php if (is_home()) echo('wrapper-home'); else echo('container'); ?>">
	<?php if (get_option('wooden_featured') <> 'false' && is_home()) include(TEMPLATEPATH . '/includes/featured.php'); ?>

	<div id="left-div">
		<div id="left-inside">
		
			<div class="home-post-wrap">
				<div class="heading">
					<span style="font-size: 14px; font-weight: bold;"><?php _e('Recent Articles','Wooden'); ?></span>
				</div>
			   
				<?php if (is_archive()) $post_number = get_option('wooden_archivenum_posts');
				if (is_search()) $post_number = get_option('wooden_searchnum_posts');
				if (is_tag()) $post_number = get_option('wooden_tagnum_posts');
				if (is_category()) $post_number = get_option('wooden_catnum_posts');
				
				if (is_home()) { 
					if (get_option('wooden_duplicate') == 'false') {
						$args=array(
						   'showposts'=>get_option('wooden_homepage_posts'),
						   'post__not_in' => $ids,
						   'paged'=>$paged,
						   'category__not_in' => get_option('wooden_exlcats_recent'),
						);
					} else {
						$args=array(
						   'showposts'=>get_option('wooden_homepage_posts'),
						   'paged'=>$paged,
						   'category__not_in' => get_option('wooden_exlcats_recent'),
						);
					};
				}; ?>
			   
			   <?php 
					if (!is_search()) {
						global $query_string; 
						if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
						elseif (is_home()) query_posts($args);
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
					
					<?php $thumb = ''; 	  

					$width = 111;
					$height = 111;
					$classtext = '';
					$titletext = get_the_title();
					
					$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
					$thumb = $thumbnail["thumb"]; ?>
						
					<!--Begin Post Single-->
					<div class="post clearfix">
						<?php if($thumb != '' && get_option('wooden_thumbnails_index') <> 'false') { ?>
							<div class="thumbnail-div">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
							</div>
						<?php }; ?>
						
						<div class="home-post-content">
							<h2 class="titles">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__ ('Permanent Link to %s', 'Wooden'), $titletext) ?>">
									<?php truncate_title(35); ?>
								</a>
							</h2>
							
							<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
							
							<div>
								<?php truncate_post(240); ?>
							</div>
							
							<div class="readmore">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__ ('Permanent Link to %s', 'Wooden'), $titletext) ?>"><?php _e('Read More','Wooden'); ?></a>
							</div>
						</div> <!-- end .home-post-content -->
					</div> <!-- end .post -->
			    <?php endwhile; ?>
					<div style="clear: both;"></div>
					<?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
				<?php else : ?>
					<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
				<?php endif; wp_reset_query(); ?>
			
			</div> <!-- end .home-post-wrap -->		
			<div style="clear: both;"></div>
			
			<?php if (is_home()) { ?>
			
				<?php if (get_option('wooden_show_recent_comments') == 'on') { ?>
					<!--Begin Recent Comments-->
					<div class="home-squares">
						<div class="heading">
							<span style="font-size: 14px; font-weight: bold;"><?php _e('Recent Comments','Wooden'); ?></span>
						</div>
						<div class="recent-comments">
							<?php include (TEMPLATEPATH . '/simple_recent_comments.php'); /* recent comments plugin by: www.g-loaded.eu */?>
							<?php if (function_exists('src_simple_recent_comments')) { src_simple_recent_comments(6, 60, '', ''); } ?>
						</div>
					</div>
					<!--End Recent Comments-->
				<?php }; ?>
				
				<?php if (get_option('wooden_show_random_posts') == 'on') { ?>
					<!--Begin Random Posts-->
					<div class="home-squares">
						<div class="heading">
							<span style="font-size: 14px; font-weight: bold;"><?php _e('Random Articles','Wooden'); ?></span>
						</div>
						
						<?php query_posts("orderby=rand&showposts=3");
						while (have_posts()) : the_post(); ?>
							<?php $thumb = ''; 	  

							$width = 70;
							$height = 80;
							$classtext = 'no-border';
							$titletext = get_the_title();
							
							$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							$thumb = $thumbnail["thumb"]; ?>
						
							<div class="random">
								<?php if($thumb != '') { ?>
									<div class="random-image">
										<a href="<?php the_permalink() ?>">
											<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
										</a>
									</div>
								<?php }; ?>
								<div class="random-content">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__ ('Permanent Link to %s', 'Wooden'), $titletext) ?>">
										<?php truncate_title(35); ?>
									</a>
									<?php truncate_post(90); ?>
								</div>
							</div> <!-- end. random-->
						<?php endwhile; ?>
					</div>
					<!--End Random Posts-->
				<?php }; ?>
				
				<?php if (get_option('wooden_show_aboutus') == 'on') { ?>
					<!--Begin About Us-->
					<div class="home-post-wrap">
						<div class="heading">
							<span style="font-size: 14px; font-weight: bold;"><?php _e('About Us','Wooden'); ?></span>
						</div>
						<?php echo(get_option('wooden_about_us')); ?>
					</div>
					<!--End About Us-->
				<?php }; ?>
			
			<?php }; ?>
			
		</div> <!-- end #left-inside -->
	</div> <!-- end #left-div -->

	<!--Begin Sidebar-->
	<?php get_sidebar(); ?>
	<!--End Sidebar-->

</div> <!-- end #wrapper-home -->

<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
</body>
</html>