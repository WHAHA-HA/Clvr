<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Denver Page without Slider
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('sie');
	// Home Page Main -Denver Festival
?>
			<!--  start custom header content -->
				<?php echo get_top_navigation('sie');?>
			</header>

			<!-- SLIDER -->
			<?php // echo home_slider_content(); ?>

<?php $content_position = 'grid_24'; ?>

	  <div id="main-page-content" class="<?php echo $content_position; ?>">
<?php	    if (have_posts()) : while (have_posts()) : the_post();
?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php               udesign_entry_before(); ?>
		    <div class="entry">
<?php                   udesign_entry_top(); ?>
<?php			the_content($post);
	?>
<?php                   udesign_entry_bottom(); ?>
		    </div>
<?php               udesign_entry_after(); ?>
		</div>
<?php	    endwhile; endif; ?>
	</div>
<div class="clear"></div>

<?php

get_footer();