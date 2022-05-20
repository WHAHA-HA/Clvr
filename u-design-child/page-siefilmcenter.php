<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Sie Film Center Page
 *
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('sie');
	// Home Page Main -Denver Festival
?>
	<!--  start custom header content -->
	<?php echo get_top_navigation('sie');?>
</header>

<!-- home slider -->
<?php echo home_slider_content();?>

<?php $content_position = 'grid_24'; ?>
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

get_footer();