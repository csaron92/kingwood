<?php if (!is_single() && get_option('wooden_postinfo1') <> '') { ?>
	<span class="post-info"><?php _e('Posted','Wooden'); ?> <?php if (in_array('author', get_option('wooden_postinfo1'))) { ?> <?php _e('by','Wooden'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('wooden_postinfo1'))) { ?> <?php _e('on','Wooden'); ?> <?php the_time(get_option('wooden_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('wooden_postinfo1'))) { ?> <?php _e('in','Wooden'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('wooden_postinfo1'))) { ?> | <?php comments_popup_link(__('0 comments','Wooden'), __('1 comment','Wooden'), '% '.__('comments','Wooden')); ?><?php }; ?></span>
<?php } elseif (is_single() && get_option('wooden_postinfo2') <> '') { ?>
	<div class="heading"><?php _e('Posted','Wooden'); ?> <?php if (in_array('author', get_option('wooden_postinfo2'))) { ?> <?php _e('by','Wooden'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('wooden_postinfo2'))) { ?> <?php _e('on','Wooden'); ?> <?php the_time(get_option('wooden_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('wooden_postinfo2'))) { ?> <?php _e('in','Wooden'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('wooden_postinfo2'))) { ?> | <?php comments_popup_link(__('0 comments','Wooden'), __('1 comment','Wooden'), '% '.__('comments','Wooden')); ?><?php }; ?></div>
<?php }; ?>