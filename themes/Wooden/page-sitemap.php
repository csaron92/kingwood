<?php 
/*
Template Name: Sitemap Page
*/
?>

<?php the_post(); ?>
<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];
?>

<?php get_header(); ?>

<div id="container" <?php if($fullwidth) echo (' class="no_sidebar"');?>>
	<div id="left-div">
		<div id="left-inside">
			
			
			<div class="post-wrapper clearfix">
				<?php if (get_option('wooden_show_share') == 'on') include(TEMPLATEPATH . '/includes/share.php');  ?>
				
				<h1 class="titles2">
					<a href="<?php the_permalink() ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h1>
				<div style="clear: both;"></div>
				
				<?php if (get_option('wooden_page_thumbnails') == 'on') { ?>
					
					<?php $thumb = ''; 	  

					$width = 111;
					$height = 111;
					$classtext = '';
					$titletext = get_the_title();
					
					$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
					$thumb = $thumbnail["thumb"]; ?>
					
					<?php if($thumb <> '') { ?>
						<div class="thumbnail-div">
							<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
						</div>
					<?php }; ?>
						
				<?php }; ?>
				
				<?php the_content(); ?>
					<div id="sitemap">
						<div class="sitemap-col">
							<h2><?php _e('Pages','Wooden'); ?></h2>
							<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
						
						<div class="sitemap-col">
							<h2><?php _e('Categories','Wooden'); ?></h2>
							<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
						
						<div class="sitemap-col">
							<h2><?php _e('Tags','Wooden'); ?></h2>
							<ul id="sitemap-tags">
								<?php $tags = get_tags();
								if ($tags) {
									foreach ($tags as $tag) {
										echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
									}
								} ?>
							</ul>
						</div> <!-- end .sitemap-col -->
												
						<div class="sitemap-col<?php echo ' last'; ?>">
							<h2><?php _e('Authors','Wooden'); ?></h2>
							<ul id="sitemap-authors" ><?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?></ul>
						</div> <!-- end .sitemap-col -->
					</div> <!-- end #sitemap -->
				
				<div style="clear: both; margin-bottom: 20px;"></div>
				
				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Wooden').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php edit_post_link(__('Edit this page','Wooden')); ?>
				
				<?php if (get_option('wooden_show_pagescomments') == 'on') comments_template('', true); ?>
			</div>
			
		</div>
	</div>

	<?php if (!$fullwidth) get_sidebar(); ?>
</div> <!-- end #container -->

<?php get_footer(); ?>

</body>
</html>
