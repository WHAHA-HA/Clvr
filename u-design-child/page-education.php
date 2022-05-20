<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: HomePage Education
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options;

    get_header('education');
// Home Page Main -Denver Festival
?>
			<!--  start custom header content -->
			<?php echo get_top_navigation('education');?>
			</header>

			<!-- HOME SLIDER -->
			<?php  echo home_slider_content();?>
<?php
		$content_position = "grid_24";
?>
<div id="main-content-film-eudcation" class="<?php echo $content_position; ?> <?php  get_page_template();?>">
<?php
if (have_posts ()) :
		while ( have_posts () ) :
			the_post ();
			?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                       udesign_single_post_entry_before(); ?>
                            <div class="entry">
<?php
			the_content ( __ ( '<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign' ) );
			?>
			    </div>
	</div>
<?php
		endwhile
		;
	 else :
		?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>

<?php           udesign_main_content_bottom(); ?>

<?php

	?>
	</div>
<!-- <div class="clear"></div> -->
<script type="text/javascript">

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php
echo get_feed_part();
get_footer();