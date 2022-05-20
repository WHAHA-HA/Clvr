<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Portfolio page 3 Columns
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

global $post;
// get the page id outside the loop (check if WPML plugin is installed and use the WPML way of getting the page ID in the current language)
$page_id = ( function_exists('icl_object_id') && function_exists('icl_get_default_language') ) ? icl_object_id($post->ID, 'page', true, icl_get_default_language()) : $post->ID;
$portfolio_cat_ID = $udesign_options['portfolio_cat_for_page_'.$page_id]; // Get the portfolio category specified by the user in the 'U-Design Options' page
if ( function_exists('icl_get_default_language') ) udesign_wpml_replace_category_id($portfolio_cat_ID); // Fix the category ID with the current language one
$current_categoryID = ( isset($_GET['cat']) ) ? $_GET['cat'] : '';
$categories =  get_categories( 'child_of='.$portfolio_cat_ID );
$query_string_prefix = ( get_option('permalink_structure') != '' ) ? '?' : '&amp;';
if ( preg_match( '/\?/', get_permalink() ) ) $query_string_prefix = '&amp;';
$portfolio_items_per_page = $udesign_options['portfolio_items_per_page_for_page_'.$page_id];
$portfolio_do_not_link_adjacent_items = $udesign_options['portfolio_do_not_link_adjacent_items_'.$page_id];
$portfolio_title_posistion = $udesign_options['portfolio_title_posistion'];

?>

<div id="content-container" class="container_24 portfolio-3-column-page">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       udesign_main_content_top( is_front_page() ); ?>

<?php	    // BEGIN the actual page content here...
	    if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post portfolio-page" id="post-<?php the_ID(); ?>">
<?php		if ( get_the_content() ) : ?>
<?php               udesign_entry_before(); ?>
		    <div class="entry">
<?php                   udesign_entry_top(); ?>
<?php			the_content(__('<p class="serif">Read the rest of this page &raquo;</p>', 'udesign')); ?>
<?php			udesign_entry_bottom(); ?>
		    </div>
<?php               udesign_entry_after(); ?>
<?php		endif; ?>
		</div>
<?php	    endwhile; endif; ?>


<?php
	    // Check if a category has been assigned as Portfolio section
	    if( $portfolio_cat_ID ) :
    		if ( $categories ) : ?>
		    <div id="category-links" class="grid_22">
			<ul>
			    <li><?php esc_html_e('Categories', 'udesign'); ?>: &nbsp;&nbsp;&nbsp;</li>
<?php			    // Generate the link to "All" categories:
			    if ( $current_categoryID ) : ?>
				<li><a href="<?php echo the_permalink(); ?>"><?php esc_html_e('All', 'udesign'); ?></a></li>
<?php			    else : ?>
				<li><a href="<?php echo the_permalink(); ?>" class="current"><?php esc_html_e('All', 'udesign'); ?></a></li>
<?php			    endif;
			    // Generate the link to the rest of categories:
			    foreach( $categories as $category ) :
				if ( $current_categoryID == $category->cat_ID ) : ?>
				    <li><a href="<?php echo the_permalink().$query_string_prefix.'cat='.$category->cat_ID; ?>" class="current"><?php echo $category->cat_name; ?></a></li>
<?php				else : ?>
				    <li><a href="<?php echo the_permalink().$query_string_prefix.'cat='.$category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></li>
<?php				endif; ?>
<?php			    endforeach; ?>
			</ul>
		    </div><!-- end category-links -->
<?php		endif;

		if ( !$current_categoryID )
		    $current_categoryID = $portfolio_cat_ID;

		//adhere to paging rules//adhere to paging rules
		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}
		// Switch the focus to the chosen portfolio category and its subcategories
		$portfolio_posts_query = new WP_Query( array(
			'cat' => $current_categoryID,
			'posts_per_page' => $portfolio_items_per_page,
			'paged' => $paged
		    )
		);

		// start Portfolio items' loop ?>
		<div class="clear"></div>
		<div class="portfolio-items-wrapper">
<?php 		$counter = 0;
		if ($portfolio_posts_query->have_posts()) :
		    while ($portfolio_posts_query->have_posts()) : $portfolio_posts_query->the_post(); ?>
			<div class="one_third<?php echo ( ++$counter == 3 )?' last_column':''; ?>">
<?php			    if( $portfolio_title_posistion == 'above' ): ?>
				<h2><?php the_title(); ?></h2>
<?php			    endif; ?>
			    <div class="thumb-holder-3-col pngfix">
				<div class="portfolio-img-thumb-3-col">
<?php					// Get Portfolio Item Thumbnail
					get_portfolio_item_thumbnail( $portfolio_posts_query->post->ID, '3', '248', '148', $portfolio_do_not_link_adjacent_items, true ); ?>
				</div><!-- end portfolio-img-thumb-3-col -->
			    </div><!-- end thumb-holder-3-col -->

<?php			    $portfolio_item_description = get_post_meta($portfolio_posts_query->post->ID, 'portfolio_item_description', true);
			    if ( $portfolio_item_description ) :
				if( $portfolio_title_posistion == 'below' ): ?>
				    <h2><?php the_title(); ?></h2>
<?php				endif; ?>
				<div class="clear"></div>
<?php				echo do_shortcode( __($portfolio_item_description) ); ?> 
<?php			    endif; ?>

			</div><!-- end one_third -->
<?php			if ( $counter == 3 ) : ?>
			    <div class='clear'> </div>
<?php			    $counter = 0;
			endif;

		    endwhile; ?>

		    <div id="paginationPortfolio" class="grid_23">
<?php			// Pagination
			if(function_exists('wp_pagenavi')) :
			    wp_pagenavi( array( 'query' => $portfolio_posts_query ) );
			else : ?>
			    <div class="navigation">
				    <div class="alignleft"><?php previous_posts_link() ?></div>
				    <div class="alignright"><?php next_posts_link() ?></div>
			    </div>
<?php			endif; ?>
		    </div>
<?php               // Restore original Post Data
                    wp_reset_postdata(); ?>
<?php		endif;
		// end Portfolio items' loop ?>
		</div><!-- end portfolio-items-wrapper -->
<?php
	    else : ?>
		<div class="grid_22 prefix_1 suffix_1">
		    <h2><?php esc_html_e('Portfolio section for this page has not been found!', 'udesign'); ?></h2>
		    <p><?php _e("<strong>Reason:</strong> No category has been assigned as Portfolio section for this page yet. In order to fix this, go to the theme's options page and assign a category for this page.", 'udesign'); ?></p>
		</div>
<?php
	    endif; ?>

	    <div class="clear"></div>
            
<?php	    udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();




