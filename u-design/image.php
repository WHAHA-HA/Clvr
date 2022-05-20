<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       udesign_main_content_top( is_front_page() ); ?>

<?php	    if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php               udesign_entry_before(); ?>
                    <div class="entry">
<?php                   udesign_entry_top(); ?>
                        <div class="attachment">
                            <?php $img_html = '<a rel="prettyPhoto" href="'.wp_get_attachment_url($post->ID).'">'.wp_get_attachment_image( $post->ID, 'large' ).'</a>'; ?>
                            <?php echo do_shortcode('[custom_frame_center]'.$img_html.'[/custom_frame_center]'); ?>
                        </div>
<?php                   // this is the "caption"
                        if ( !empty( $post->post_excerpt ) ) : ?>
                            <div class="caption"><?php the_excerpt();  ?></div>
<?php                   endif; ?>
                        
<?php                   // the_content will display the attachment "Description"
                        the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign')); ?>

                        <div class="clear"></div>

                        <div class="navigation">
                            <div class="alignleft"><?php previous_image_link( 'thumbnail', esc_html__('Previous Image', 'udesign') ) ?></div>
                            <div class="alignright"><?php next_image_link( 'thumbnail', esc_html__('Next Image', 'udesign') ) ?></div>
                        </div>
                        
                        <div class="clear"></div>
                        
<?php                   udesign_entry_bottom(); ?>
		    </div>
<?php               udesign_entry_after(); ?>
		</div>

<?php		endwhile; else: ?>

		    <p><?php esc_html_e('Sorry, no attachments matched your criteria.', 'udesign'); ?></p>

<?php	    endif; ?>

	    <div class="clear"></div>
            
<?php       udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php get_footer();
