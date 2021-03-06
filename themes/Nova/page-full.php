<?php 
/* 
Template Name: Full Width Page
*/
?>

<?php the_post(); ?>
<?php get_header(); ?>

<div id="main-content" class="fullwidth">
	<div class="container clearfix">		
		<div id="entries-area">
			<div id="entries-area-inner">
				<div id="entries-area-content" class="clearfix">
					<div id="content-area">
						<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
						
						<div class="entry post clearfix">							
							<h1 class="title"><?php the_title(); ?></h1>
							
							<?php if (get_option('nova_page_thumbnails') == 'on') { ?>
								<?php 
									$thumb = '';
									$width = 160;
									$height = 160;
									$classtext = '';
									$titletext = get_the_title();
									
									$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Portfolio');
									$thumb = $thumbnail["thumb"];
								?>
								
								<?php if($thumb <> '') { ?>
									<div class="thumbnail">
										<a href="<?php the_permalink(); ?>">
											<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
											<span class="overlay2"></span>
										</a>
									</div> <!-- .thumbnail -->
								<?php } ?>
							<?php } ?>
							
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Nova').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							<?php edit_post_link(__('Edit this page','Nova')); ?>
						
						</div> <!-- end .entry -->
												
						<?php if (get_option('nova_show_pagescomments') == 'on') comments_template('', true); ?>
						
					</div> <!-- end #content-area -->
					
				</div> <!-- end #entries-area-content -->
			</div> <!-- end #entries-area-inner -->
		</div> <!-- end #entries-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-content -->
		
<?php get_footer(); ?>