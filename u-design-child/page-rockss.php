<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Home Page Film on the Rocks
 *
 */
get_header('filmrocks'); ?>
		<!-- start custom header section -->
			<?php echo get_top_navigation('filmrocks'); ?>

			</header>

			<!-- home slider -->
						<!-- SLIDER -->
			<?php // echo starz_slider_content();?>
			<?php  echo manual_slider_content('Starz 2014 Slider');?>
			<?php
if ( is_single() ) :
the_title( '<h1 class="entry-title">', '</h1>' );
else :
the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
endif;
?>

<div id="main-content"  class="<?php echo $content_position; ?>" style=" margin-top:0 !important">
	<div style="text-align:left;  padding-right:20px;">
		<?php	    if (have_posts()) : while (have_posts()) : the_post();
						?>

								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php               udesign_entry_before(); ?>
								    <div class="entry">
						<?php                   udesign_entry_top(); ?>
						<?php			the_content();
							?>
						<?php                   udesign_entry_bottom(); ?>
								    </div>
						<?php               udesign_entry_after(); ?>
								</div>
						<?php	    endwhile; endif; ?>
	</div>
</div>
<?php
echo get_feed_part();
get_footer();


