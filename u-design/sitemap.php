<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Sitemap page
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$content_position = ( $udesign_options['sitemap_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php           udesign_main_content_top( is_front_page() ); ?>
<?php		if (have_posts()) : while (have_posts()) : the_post();
		    the_content();
		endwhile; endif; ?>
		
		<div class="one_half">
			<h3><?php esc_html_e('Site Feeds', 'udesign'); ?></h3>
			<ul class="list-10">
				<li><a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e('Main RSS Feed', 'udesign'); ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e('Comments RSS Feed', 'udesign'); ?></a></li>
			</ul>

			<h3><?php esc_html_e('Pages', 'udesign'); ?></h3>
			<ul class="list-10">
				<li><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home', 'udesign'); ?></a></li>
				<?php wp_list_pages('title_li='); ?>
			</ul>

			<h3><?php esc_html_e('Categories', 'udesign'); ?></h3>
			<ul class="list-10">
				<?php wp_list_categories('title_li='); ?>
			</ul>

			<h3><?php esc_html_e('Monthly Archives', 'udesign'); ?></h3>
			<ul class="list-10">
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
<?php			if ( function_exists('wp_tag_cloud') ) : ?>
			    <h3><?php esc_html_e('Tags', 'udesign'); ?></h3>
<?php			    echo preg_replace('/class=\"(.*?)\"|class=\'(.*?)\'/', 'class="list-10"', wp_tag_cloud('smallest=9&largest=9&format=list&echo=0'));
			endif; ?>
		</div>

		<div class="one_half last_column">
			<h3><?php esc_html_e('All Articles', 'udesign'); ?></h3>
			<ol class="list-2">
<?php			    $all_articles = new WP_Query('showposts=-1');
			    if ($all_articles->have_posts()) : 
                                while ($all_articles->have_posts()) : $all_articles->the_post(); ?>
                                    <li style="margin-bottom:10px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><br /><?php the_time(__('j-M-y', 'udesign')); ?> &bull; <?php the_author_posts_link(); ?> &bull; <?php comments_popup_link( __( '0 Comment', 'udesign' ), __( '1 Comment', 'udesign' ), __( '% Comments', 'udesign' ) ); ?></li>
<?php                           endwhile;
                                wp_reset_postdata(); // Restore original Post Data
                            endif; ?>
                        </ol>
		</div>
	    <div class="clear"></div>
            
<?php	    udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php if( sidebar_exist('SitemapSidebar') ) { get_sidebar('SitemapSidebar'); } ?>
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



