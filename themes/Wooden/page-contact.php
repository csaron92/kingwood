<?php session_start();
/*
Template Name: Contact Page
*/
?>

<?php the_post(); ?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];
	
	$et_regenerate_numbers = isset( $et_ptemplate_settings['et_regenerate_numbers'] ) ? (bool) $et_ptemplate_settings['et_regenerate_numbers'] : (bool) $et_ptemplate_settings['et_regenerate_numbers'];
		
	$et_error_message = '';
	$et_contact_error = false;
	
	if ( isset($_POST['et_contactform_submit']) ) {
		if ( !isset($_POST['et_contact_captcha']) || empty($_POST['et_contact_captcha']) ) {
			$et_error_message .= '<p>' . __('Make sure you entered the captcha. ','Wooden') . '</p>';
			$et_contact_error = true;
		} else if ( $_POST['et_contact_captcha'] <> ( $_SESSION['et_first_digit'] + $_SESSION['et_second_digit'] ) ) {			
			$et_numbers_string = $et_regenerate_numbers ? __('Numbers regenerated.') : '';
			$et_error_message .= '<p>' . __('You entered the wrong number in captcha. ','Wooden') . $et_numbers_string . '</p>';
			
			if ($et_regenerate_numbers) {
				unset( $_SESSION['et_first_digit'] );
				unset( $_SESSION['et_second_digit'] );
			}
			
			$et_contact_error = true;
		} else if ( empty($_POST['et_contact_name']) || empty($_POST['et_contact_email']) || empty($_POST['et_contact_subject']) || empty($_POST['et_contact_message']) ){
			$et_error_message .= '<p>' . __('Make sure you fill all fields. ','Wooden') . '</p>';
			$et_contact_error = true;
		}
		
		if ( !is_email( $_POST['et_contact_email'] ) ) {
			$et_error_message .= '<p>' . __('Invalid Email. ','Wooden') . '</p>';
			$et_contact_error = true;
		}
	} else {
		$et_contact_error = true;
		if ( isset($_SESSION['et_first_digit'] ) ) unset( $_SESSION['et_first_digit'] );
		if ( isset($_SESSION['et_second_digit'] ) ) unset( $_SESSION['et_second_digit'] );
	}
	
	if ( !isset($_SESSION['et_first_digit'] ) ) $_SESSION['et_first_digit'] = $et_first_digit = rand(1, 15);
	else $et_first_digit = $_SESSION['et_first_digit'];
	
	if ( !isset($_SESSION['et_second_digit'] ) ) $_SESSION['et_second_digit'] = $et_second_digit = rand(1, 15);
	else $et_second_digit = $_SESSION['et_second_digit'];
	
	if ( !$et_contact_error ) {
		$et_email_to = ( isset($et_ptemplate_settings['et_email_to']) && !empty($et_ptemplate_settings['et_email_to']) ) ? $et_ptemplate_settings['et_email_to'] : get_site_option('admin_email');
				
		wp_mail($et_email_to, sprintf( '[%s] ' . esc_html($_POST['et_contact_subject']), $current_site->site_name ), esc_html($_POST['et_contact_message']),'From: "'. esc_html($_POST['et_contact_name']) .'" <' . esc_html($_POST['et_contact_email']) . '>');
		
		$et_error_message = '<p>' . __('Thanks for contacting us','Wooden') . '</p>';
	}
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
				<div id="et-contact">

					<div id="et-contact-message"><?php echo($et_error_message); ?> </div>
					
					<?php if ( $et_contact_error ) { ?>
						<form action="<?php echo(get_permalink($post->ID)); ?>" method="post" id="et_contact_form">
							<div id="et_contact_left">
								<p class="clearfix">
									<input type="text" name="et_contact_name" value="<?php if ( isset($_POST['et_contact_name']) ) echo esc_attr($_POST['et_contact_name']); else _e('Name','Wooden'); ?>" id="et_contact_name" class="input" />
								</p>
								
								<p class="clearfix">
									<input type="text" name="et_contact_email" value="<?php if ( isset($_POST['et_contact_email']) ) echo esc_attr($_POST['et_contact_email']); else _e('Email Address','Wooden'); ?>" id="et_contact_email" class="input" />
								</p>
								
								<p class="clearfix">
									<input type="text" name="et_contact_subject" value="<?php if ( isset($_POST['et_contact_subject']) ) echo esc_attr($_POST['et_contact_subject']); else _e('Subject','Wooden'); ?>" id="et_contact_subject" class="input" />
								</p>
							</div> <!-- #et_contact_left -->
							
							<div id="et_contact_right">
								<p class="clearfix">
									<?php 
										_e('Captcha: ','Wooden');	
										echo '<br/>';
										echo esc_attr($et_first_digit) . ' + ' . esc_attr($et_second_digit) . ' = ';
									?>
									<input type="text" name="et_contact_captcha" value="<?php if ( isset($_POST['et_contact_captcha']) ) echo esc_attr($_POST['et_contact_captcha']); ?>" id="et_contact_captcha" class="input" size="2" />
								</p>
							</div> <!-- #et_contact_right -->
							
							<div class="clear"></div>
							
							<p class="clearfix">
								<textarea class="input" id="et_contact_message" name="et_contact_message"><?php if ( isset($_POST['et_contact_message']) ) echo esc_attr($_POST['et_contact_message']); else _e('Message','Wooden'); ?></textarea>
							</p>
								
							<input type="hidden" name="et_contactform_submit" value="et_contact_proccess" />
							
							<input type="reset" id="et_contact_reset" value="<?php _e('Reset','Wooden'); ?>" />
							<input class="et_contact_submit" type="submit" value="<?php _e('Submit','Wooden'); ?>" id="et_contact_submit" />
						</form>
					<?php } ?>
				</div> <!-- end #et-contact -->
				
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
