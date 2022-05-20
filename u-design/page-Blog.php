<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Blog page
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


get_header();

global $post;
// get the page id outside the loop (check if WPML plugin is installed and use the WPML way of getting the page ID in the current language)
$page_id = ( function_exists('icl_object_id') && function_exists('icl_get_default_language') ) ? icl_object_id($post->ID, 'page', true, icl_get_default_language()) : $post->ID;
$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_blog_sidebar'] == 'yes' ) $content_position = 'grid_24';

?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php       udesign_main_content_top( is_front_page() ); ?>
            
<?php   // Begin: Display Blog page Content if there is any
            $blog_page_query = new WP_Query( 'page_id='.$page_id );
	    if ($blog_page_query->have_posts()) : while ($blog_page_query->have_posts()) : $blog_page_query->the_post();
                if( get_the_content() ) : ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                   udesign_entry_before(); ?>
                        <div class="entry">
<?php                       udesign_entry_top(); ?>
<?php                       the_content(); ?>
<?php                       udesign_entry_bottom(); ?>
                        </div>
<?php                   udesign_entry_after(); ?>
                    </div>
<?php           endif;
            endwhile; endif;
	    //Reset Query
	    wp_reset_postdata(); ?>
	    <div class="clear"></div>
<?php   // End: Display Blog page Content if there is any ?>

<?php       
            // Begin main posts' loop stuff here
            //adhere to paging rules
            if ( get_query_var('paged') ) {
                $paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            
            if ( $udesign_options['exclude_portfolio_from_blog'] == 'yes' ) {
                // get the portfolio categories to be excluded from the Blog section
                global $portfolio_cats_with_minus;
                $blog_posts_query_args = "cat=$portfolio_cats_with_minus&paged=$paged";
            } else {
                $blog_posts_query_args = "cat=0&paged=$paged";
            }

            $blog_posts_query = new WP_Query( $blog_posts_query_args );

            if ($blog_posts_query->have_posts()) :
		while ($blog_posts_query->have_posts()) : $blog_posts_query->the_post(); ?>
		    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                   udesign_blog_entry_before(); ?>
                        <div class="entry">
<?php                       udesign_blog_entry_top(); ?>
                            <div class="post-top">
<?php                           udesign_blog_post_top_area_inside(); ?>
                            </div><!-- end post-top -->
                            
                            <div class="clear"></div>
<?php                       udesign_blog_post_content_before(); ?>
<?php                       // Post Image
                            display_post_image_fn( $blog_posts_query->post->ID, true ); ?>
                            
<?php			    if ( $udesign_options['show_excerpt'] == 'yes' ) {
				the_excerpt(); //display the excerpt
                                if ( $udesign_options['blog_button_text'] ) {
                                    echo do_shortcode('[read_more text="'.$udesign_options['blog_button_text'].'" title="'.$udesign_options['blog_button_text'].'" url="'.get_permalink().'" align="left"]');
                                    echo '<div class="clear"></div>';
                                }
			    } else {
                                global $more; $more = 0; // Enable 'more tag' for this page
				the_content( $udesign_options['blog_button_text'] );
			    } ?>
                            
<?php                       udesign_blog_entry_bottom(); ?>
			</div><!-- end entry -->
<?php                   udesign_blog_entry_after(); ?>
		    </div>
                    <?php echo do_shortcode('[divider_top]'); ?>
<?php		endwhile; ?>

		<div class="clear"></div>

<?php		// Pagination
		if(function_exists('wp_pagenavi')) :
		    wp_pagenavi( array( 'query' => $blog_posts_query ) );
		else : ?>
		    <div class="navigation">
			    <div class="alignleft"><?php previous_posts_link() ?></div>
			    <div class="alignright"><?php next_posts_link() ?></div>
		    </div>
<?php		endif;

                // Restore original Post Data
                wp_reset_postdata(); ?>

<?php	    else : ?>
		<h2 class="center"><?php esc_html_e('Not Found', 'udesign'); ?></h2>
		<p class="center"><?php esc_html_e("Sorry, but you are looking for something that isn't here.", 'udesign'); ?></p>
<?php		get_search_form();
	    endif; ?>

	    <div class="clear"></div>
<?php       udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( ( !$udesign_options['remove_blog_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


