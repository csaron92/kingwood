<ul class="idTabs">
	<?php if (get_option('quadro_show_tabarea_recententries') == 'on') { ?>
		<li><a href="#recententries"><?php _e('Recent Entries','Quadro'); ?></a></li>
	<?php }; ?>
	<?php if (get_option('quadro_show_tabarea_recentcomments') == 'on') { ?>
		<li><a href="#recentcomments2"><?php _e('Recent Comments','Quadro'); ?></a></li>
	<?php }; ?>
	<?php if (get_option('quadro_show_tabarea_popular') == 'on') { ?>
		<li><a href="#mostcomments"><?php _e('Popular Posts','Quadro'); ?></a></li>
	<?php }; ?>
</ul>

<?php if (get_option('quadro_show_tabarea_recententries') == 'on') { ?>
	<div id="recententries">
		<span class="toptitle"><?php _e('Recent Posts','Quadro'); ?></span>
		<?php $recentPostsNum = get_option('quadro_recentposts_num'); ?>
		<ul class="list2">
			<?php wp_get_archives('postbypost', $recentPostsNum); ?>
		</ul>
	</div> <!-- end #recententries -->
<?php }; ?>

<?php if (get_option('quadro_show_tabarea_recentcomments') == 'on') { ?>
	<div id="recentcomments2">
		<span class="toptitle"><?php _e('Recent Comments','Quadro'); ?></span>
		<?php $recentCommentsNum = get_option('quadro_recentcomments_num'); ?>
		<?php include (TEMPLATEPATH . '/simple_recent_comments.php'); /* recent comments plugin by: www.g-loaded.eu */?>
		<?php if (function_exists('src_simple_recent_comments')) { src_simple_recent_comments($recentCommentsNum, 60, '', ''); } ?>
	</div> <!-- end #recentcomments2 -->
<?php }; ?>

<?php if (get_option('quadro_show_tabarea_popular') == 'on') { ?>
	<div id="mostcomments">
		<span class="toptitle"><?php _e('Popular Articles','Quadro'); ?></span>
		<?php $popularNum = get_option('quadro_popular_posts_num'); ?>
		<ul class="list2">
			<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $popularNum");
			foreach ($result as $post) {
				#setup_postdata($post);
				$postid = $post->ID;
				$title = $post->post_title;
				$commentcount = $post->comment_count;
				if ($commentcount != 0) { ?>
				<li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>">
				<?php echo $title ?> (<?php echo $commentcount ?>)</a> </li>
			<?php } } ?>
		</ul>
	</div> <!-- end #mostcomments -->
<?php }; ?>