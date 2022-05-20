<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       udesign_main_content_top( is_front_page() ); ?>
            <h2 class="margin-top-3"><?php esc_html_e('About:', 'udesign'); ?> <?php echo $curauth->display_name; ?></h2>
            <p>
                <div class="small-custom-frame-wrapper alignleft"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><?php echo get_avatar($curauth->user_email, 100); ?></div></div></div>
                <strong><?php esc_html_e('Website:', 'udesign'); ?></strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><br />
                <strong><?php esc_html_e('Profile:', 'udesign'); ?></strong> <br />
                <?php echo $curauth->user_description; ?>
            </p>
            <div class="clear"></div>
            <h2><?php esc_html_e('Posts by', 'udesign'); ?> <?php echo $curauth->display_name; ?>:</h2>
<?php       if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); ?>
                    <ul class="list-11">
                        <li>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> (<?php echo get_the_date(); ?> - <?php the_category(', ');?>)
                        </li>
                    </ul>
<?php           endwhile; ?>
                <div class="clear"></div>
<?php           // Pagination
                if(function_exists('wp_pagenavi')) :
                    wp_pagenavi();
                else : ?>
                    <div class="navigation">
                            <div class="alignleft"><?php previous_posts_link() ?></div>
                            <div class="alignright"><?php next_posts_link() ?></div>
                    </div>
<?php           endif; ?>
<?php       else: ?>
                <p><?php esc_html_e('No posts by this author.', 'udesign'); ?></p>
<?php       endif; ?>
	    <div class="clear"></div>
<?php	    udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();
