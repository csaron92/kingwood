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
					<div id="et-login">
						<div class='et-protected'>
							<div class='et-protected-form'>
								<form action='<?php echo get_option('home'); ?>/wp-login.php' method='post'>
									<p><label><?php _e('Username','Quadro'); ?>: <input type='text' name='log' id='log' value='<?php echo wp_specialchars(stripslashes($user_login), 1) ?>' size='20' /></label></p>
									<p><label><?php _e('Password','Quadro'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
									<input type='submit' name='submit' value='Login' class='etlogin-button' />
								</form> 
							</div> <!-- .et-protected-form -->
							<p class='et-registration'><?php _e('Not a member?','Quadro'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php _e('Register today!','Quadro'); ?></a></p>
						</div> <!-- .et-protected -->
					</div> <!-- end #et-login -->
					
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
