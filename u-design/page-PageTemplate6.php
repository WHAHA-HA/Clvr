<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Page Template 6
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$content_position = ( $udesign_options['pages_sidebar_6'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php       udesign_main_content_top( is_front_page() ); ?>

<?php	    if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php               udesign_entry_before(); ?>
		    <div class="entry">
<?php                   udesign_entry_top(); ?>
<?php			the_content(__('<p class="serif">Read the rest of this page &raquo;</p>', 'udesign')); ?>
<?php			udesign_entry_bottom(); ?>
		    </div>
<?php               udesign_entry_after(); ?>
		</div>
<?php		( $udesign_options['show_comments_on_pages'] == 'yes' ) ? comments_template() : '';
	    endwhile; endif; ?>
	    <div class="clear"></div>
<?php	    udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php if( sidebar_exist('PagesSidebar6') ) { get_sidebar('PagesSidebar6'); } ?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



