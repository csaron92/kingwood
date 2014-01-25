<!--Begin Featured Article-->
<div id="featured">
	<div id="heading-featured">
		<span style="font-size: 14px; font-weight: bold;"><?php _e('Featured Articles','Wooden'); ?></span>
	</div>
	
	<?php $ids = array();
	$arr = array();
			
	$featured_cat = get_option('wooden_feat_cat');
	$featured_num = get_option('wooden_featured_num');

	query_posts("showposts=$featured_num&cat=".get_catId($featured_cat)); 
	while (have_posts()) : the_post(); ?>
		
		<?php $thumb = ''; 	  

			$width = 367;
			$height = 186;
			$classtext = 'no-border';
			$titletext = get_the_title();
			
			$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Featured');
			$thumb = $thumbnail["thumb"];	
		?>
		
		<?php if($thumb <> '') { ?>
			<div id="thumbnail-div-featured">
				<a href="<?php the_permalink() ?>">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
				</a>
			</div>
		<?php }; ?>
		
		<div id="featured-content">
			<h1 class="titles-featured">
				<a href="<?php the_permalink() ?>" title="<?php printf(__ ('Permanent Link to %s', 'Wooden'), $titletext) ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<div class="post-info"><?php _e('Posted by','Wooden'); ?>
				<?php the_author() ?>
				<?php _e('in','Wooden'); ?>
				<?php the_category(', ') ?>
				<?php _e('on','Wooden'); ?>
				<?php the_time(get_option('wooden_date_format')) ?>
				|
				<?php comments_popup_link(__('0 comments','Wooden'), __('1 comment','Wooden'), '% '.__('comments','Wooden')); ?>
			</div>
			<?php truncate_post(410); ?>
			<div style="clear: both;"></div>
			
			<div class="readmore">
				<a href="<?php the_permalink() ?>"><?php _e('Read More','Wooden'); ?></a>
			</div>
		</div>
		<div style="clear: both;"></div>
		
	<?php $ids[]= $post->ID; 
	endwhile; wp_reset_query(); ?>
</div> <!-- end #featured -->
<!--End Featured Article-->