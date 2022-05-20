<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Office Directory Page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
	// Home Page Main -Denver Festival
?>
<!--  start custom header content -->
<?php echo get_top_navigation();?>
</header>

<?php $content_position = 'grid_16'; ?>

<div id="main-page-content" class="<?php echo $content_position; ?>">
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
<aside class="widget_quote">
	<div id="sidebar" class="grid_8 movie_sidebar">
		<div id="sidebarSubnav">
			<div class="widget widget_em_showtime substitute_widget_class ">
			<P>
			"The Starz Denver International Film Festival" is the diamond in the rough.It's the best hidden secret amongst the overabundance of film festivals. Aside from the quality and eclectic
			lineup of films, you won't find better a friendlier and more accommodating staff anywhere. It's the best late night
			entertainment you'll experience, so don't expect to sleep."
			</P>
			<p>-Mark Brian Smith<br/>Producer/Director,<br/>Overnight</p>
			</div>
		</div>
	</div>
</aside>
<?php

get_footer();