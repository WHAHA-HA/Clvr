<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Root Press Page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
	// Home Page Main -Denver Festival
?>
<!--  start custom header content -->
<p class="quote">
	<span>"The Denver Film Society is the greatest institution in Colorado
		to experience film at a higher level."</span> <br> - DFS Founder Ron
	Henderson
</p>
</header>

<!-- SLIDER -->
<?php // echo home_slider_content(); ?>

<?php $content_position = 'grid_16'; ?>

<div id="main-page-content" class="<?php echo $content_position; ?>">
<?php	    if (have_posts()) : while (have_posts()) : the_post();
?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php               udesign_entry_before(); ?>
		    <div class="entry">
<?php                   udesign_entry_top(); ?>
<?php			echo get_the_content($post);
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
			"A rare jewel in the film festival world: a well-organized large fest in a large city that treats filmmakers and guests with courtesy and respect."
			</P>
			<br/>
			<p>-IndieWire</p>
			</div>
		</div>
	</div>
</aside>
<?php

get_footer();