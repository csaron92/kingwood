<?php 
/*
Template Name: Gallery Page
*/
?>

<?php the_post(); ?>
<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];

$gallery_cats = isset( $et_ptemplate_settings['et_ptemplate_gallerycats'] ) ? $et_ptemplate_settings['et_ptemplate_gallerycats'] : array();
$et_ptemplate_gallery_perpage = isset( $et_ptemplate_settings['et_ptemplate_gallery_perpage'] ) ? $et_ptemplate_settings['et_ptemplate_gallery_perpage'] : 12;
?>

<?php get_header(); ?>

<div id="container">
	<div id="container2">
		<div id="left-div">
			
				<div class="post-wrapper <?php if($fullwidth) echo (' no_sidebar"');?>">
					<h1 class="titles">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','Quadro'), the_title()) ?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<div style="clear: both;"></div>
					
					<?php if (get_option('quadro_page_thumbnails') == 'on') { ?>
					
						<?php $thumb = ''; 	  

						$width = get_option('quadro_thumbnail_width_pages');
						$height = get_option('quadro_thumbnail_height_pages');
						$classtext = '';
						$titletext = get_the_title();
						
						$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
						$thumb = $thumbnail["thumb"]; ?>
						
						<?php if($thumb <> '') { ?>
							<div style="float: left; margin: 10px 10px 10px 0px;">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
							</div>
						<?php }; ?>
							
					<?php }; ?>
					
					<?php the_content(); ?>
										<div id="et_pt_gallery" class="clearfix">
						<?php $gallery_query = ''; 
						if ( !empty($gallery_cats) ) $gallery_query = '&cat=' . implode(",", $gallery_cats);
						else echo '<!-- gallery category is not selected -->'; ?>
						<?php query_posts("showposts=$et_ptemplate_gallery_perpage&paged=$paged" . $gallery_query); ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<?php $width = 207;
							$height = 136;
							$titletext = get_the_title();

							$thumbnail = get_thumbnail($width,$height,'portfolio',$titletext,$titletext,true,'Portfolio');
							$thumb = $thumbnail["thumb"]; ?>
							
							<div class="et_pt_gallery_entry">
								<div class="et_pt_item_image">
									<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, 'portfolio'); ?>
									<span class="overlay"></span>
									
									<a class="fancybox zoom-icon" title="<?php the_title(); ?>" rel="gallery" href="<?php echo($thumbnail['fullpath']); ?>"><?php _e('Zoom in','Quadro'); ?></a>
									<a class="more-icon" href="<?php the_permalink(); ?>"><?php _e('Read more','Quadro'); ?></a>
								</div> <!-- end .et_pt_item_image -->
							</div> <!-- end .et_pt_gallery_entry -->
							
						<?php endwhile; ?>
							<div class="page-nav clearfix">
								<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
								else { ?>
									 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
								<?php } ?>
							</div> <!-- end .entry -->
						<?php else : ?>
							<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
						<?php endif; wp_reset_query(); ?>
					
					</div> <!-- end #et_pt_gallery -->
					
					<div style="clear: both;"></div>
				
					<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Quadro').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php edit_post_link(__('Edit this page','Quadro')); ?>
					
					<?php if (get_option('quadro_show_pagescomments') == 'on') { ?>
						<!--Begin Comments Template-->
						<div class="recentposts">
							<?php comments_template('', true); ?>
						</div>
						<!--End Comments Template-->
					<?php }; ?>
				</div> <!-- end .post-wrapper -->
			
		</div> <!-- end #left-div -->
	</div> <!-- end #container2 -->
	
	<?php if (!$fullwidth) get_sidebar(); ?>
</div> <!-- end #container -->
<?php get_footer(); ?>
</body>
</html>
