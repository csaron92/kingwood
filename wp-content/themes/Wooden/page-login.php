<?php 
/*
Template Name: Login Page
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
					<div id="et-login">
						<div class='et-protected'>
							<div class='et-protected-form'>
								<form action='<?php echo get_option('home'); ?>/wp-login.php' method='post'>
									<p><label><?php _e('Username','Wooden'); ?>: <input type='text' name='log' id='log' value='<?php echo wp_specialchars(stripslashes($user_login), 1) ?>' size='20' /></label></p>
									<p><label><?php _e('Password','Wooden'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
									<input type='submit' name='submit' value='Login' class='etlogin-button' />
								</form> 
							</div> <!-- .et-protected-form -->
							<p class='et-registration'><?php _e('Not a member?','Wooden'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php _e('Register today!','Wooden'); ?></a></p>
						</div> <!-- .et-protected -->
					</div> <!-- end #et-login -->
				
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
