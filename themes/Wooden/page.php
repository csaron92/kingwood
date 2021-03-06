﻿<?php get_header(); ?>

<div id="container">
	<div id="left-div">
		<div id="left-inside">
			<?php the_post(); ?>
			
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
				<div style="clear: both; margin-bottom: 20px;"></div>
				
				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Wooden').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php edit_post_link(__('Edit this page','Wooden')); ?>
				
				<?php if (get_option('wooden_show_pagescomments') == 'on') comments_template('', true); ?>
			</div>
			
		</div>
	</div>

	<?php get_sidebar(); ?>

</div> <!-- end #container -->

<?php get_footer(); ?>

</body>
</html>
