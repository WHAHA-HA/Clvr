<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Portfolio page 1 Column Sortable
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
if ( !$current_categoryID ) { $current_categoryID = $portfolio_cat_ID; }
$query_string_prefix = ( get_option('permalink_structure') != '' ) ? '?' : '&amp;';
if ( preg_match( '/\?/', get_permalink() ) ) $query_string_prefix = '&amp;';
//$portfolio_items_per_page = $udesign_options['portfolio_items_per_page_for_page_'.$page_id];
$portfolio_items_per_page = -1;
$portfolio_do_not_link_adjacent_items = $udesign_options['portfolio_do_not_link_adjacent_items_'.$page_id];
$portfolio_title_posistion = $udesign_options['portfolio_title_posistion'];
$portfolio_filter_category = get_post_meta($post->ID, 'portfolio_filter_category', true);
$portfolio_filter_tags = get_post_meta($post->ID, 'portfolio_filter_tags', true);
$portfolio_filter_sorting = get_post_meta($post->ID, 'portfolio_filter_sorting', true);
?>


<div id="content-container" class="isotoope-portfolio-wrapper portfolio-1-column-sortable-page">
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
            
                    
<?php       // Check if a category has been assigned as Portfolio section
            if( $portfolio_cat_ID ) : ?>
                <div id="isotope-options" class="isotope-options-padding">
<?php               if ( $categories && ($portfolio_filter_category != "0") ) : ?>
                        <div class="option-combo">
                            <ul id="filter" class="option-set" data-option-key="filter">
                                    <li id="option-combo-filter-categories"><?php esc_html_e('Categories:', 'udesign'); ?></li>
                                    <li><a href="#show-all" data-option-value="*" class="selected"><?php esc_html_e('Show All', 'udesign'); ?></a></li>
<?php                           // Generate the link to the rest of categories:
                                foreach( $categories as $category ) : 
                                    $category_identifier = 'cat-'.$category->slug; ?>
                                    <li><a href="<?php echo '#'.$category_identifier; ?>" data-option-value=".<?php echo $category_identifier; ?>"><?php echo ucwords($category->cat_name); ?></a></li>

<?php                           endforeach; ?>
                            </ul>
                        </div>
                        <div class="divider"></div>
<?php               endif; ?>
                    
                    
<?php               if ( $portfolio_filter_tags != "0" ) :  
                        $post_tags_array = array();
                        $current_posts = new WP_Query( array( 'cat' => $current_categoryID, 'posts_per_page' => $portfolio_items_per_page ) );
                        if ($current_posts->have_posts()) : 
                            while ($current_posts->have_posts()) : $current_posts->the_post();
                                $post_tags_array = array_merge( $post_tags_array, wp_get_post_tags( $current_posts->post->ID, array( 'fields' => 'all' )) );
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        $unique_tag_array = array();
                        foreach ( $post_tags_array as $current_tag ) {
                            $unique_tag_array[$current_tag->slug] = $current_tag;
                        }
                        if ( $unique_tag_array ) : ?>
                            <div class="option-combo">
                                <ul id="filter" class="option-set" data-option-key="filter">
                                    <li id="option-combo-filter-tags"><?php esc_html_e('Tags:', 'udesign'); ?></li>
                                    <li><a href="#show-all" data-option-value="*" class="selected"><?php esc_html_e('Show All', 'udesign'); ?></a></li>
<?php                               // sort them based on "slug" criteria but for humans display the actual tag name
                                    foreach ($unique_tag_array as $current_tag) : ?>
                                        <li><a href="<?php echo '#'.$current_tag->slug; ?>" data-option-value=".<?php echo $current_tag->slug; ?>"><?php echo $current_tag->name; ?></a></li>
<?php                               endforeach; ?>
                                </ul>
                            </div>
                            <div class="divider"></div>
<?php                   endif; ?>
<?php               endif; ?>
                    
<?php               if ( $portfolio_filter_sorting != "0" ) : ?>
                        <div class="option-combo-sorting">
                            <ul id="sort" class="option-set" data-option-key="sortBy">
                                <li id="option-combo-sorting-description"><?php esc_html_e('Sort By:', 'udesign'); ?></li>
                                <li><a title="<?php esc_html_e('Original Order', 'udesign'); ?>" href="#sortBy=number" data-option-value="srt-number" class="selected"><?php esc_html_e('Original Order', 'udesign'); ?></a></li>
                                <li><span class="s-divider">/</span></li>
                                <li><a title="<?php esc_html_e('Alphabetical', 'udesign'); ?>" href="#sortBy=alphabetical" data-option-value="alphabetical"><?php esc_html_e('Alphabetical', 'udesign'); ?></a></li>
                            </ul>
                            
                            <ul id="sort-direction" class="option-set" data-option-key="sortAscending">
                                <li><a title="<?php esc_html_e('Ascending', 'udesign'); ?>" href="#sortAscending=true" data-option-value="true" class="selected">&uarr;</a></li>
                                <li><a title="<?php esc_html_e('Descending', 'udesign'); ?>" href="#sortAscending=false" data-option-value="false">&darr;</a></li>
                            </ul>
                        </div><!-- end option-combo-sort-direction -->
<?php               endif; ?>
                    
                </div><!-- end isotope-options -->

<?php 
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

                
                $srt_number = 1;
		// start Portfolio items' loop ?>
		<div class="clear"></div>
                <div id="portfolio-container" class="super-list variable-sizes clearfix portfolio-items-wrapper1">
<?php		
                if ($portfolio_posts_query->have_posts()) :
		    while ($portfolio_posts_query->have_posts()) : $portfolio_posts_query->the_post(); ?>
                    
<?php                   // generate slugs for filtering by category
                        $classes_identifiers = '';
                        if ( $portfolio_filter_category != "0" ) {
                            $post_categories = wp_get_post_categories( $portfolio_posts_query->post->ID );
                            $cats = array();
                            foreach($post_categories as $c) {
                                    $cat = get_category( $c );
                                    $cats[] = 'cat-'.$cat->slug;
                            }
                            $classes_identifiers = implode(" ", $cats);
                        }
                        // generate slugs for filtering by tags
                        $tags_names = ( $portfolio_filter_tags != "0" ) ? implode(" ", wp_get_post_tags( $portfolio_posts_query->post->ID, array( 'fields' => 'slugs' ) )) : '';
?>
			<div class="portfolio-category <?php echo $classes_identifiers; ?> <?php echo $tags_names; ?>">
                            <div class="one_half_isotope">
                                <div class="srt-name" style="display:none;"><?php the_title(); ?></div>
                                <div class="srt-number" style="display:none;"><?php echo $srt_number++; ?></div>

                                <div class="thumb-holder-2-col pngfix">
                                    <div class="portfolio-img-thumb-2-col">
    <?php					// Get Portfolio Item Thumbnail
                                            get_portfolio_item_thumbnail( $portfolio_posts_query->post->ID, '2', '410', '220', $portfolio_do_not_link_adjacent_items, true ); ?>
                                    </div><!-- end portfolio-img-thumb-2-col -->
                                </div><!-- end thumb-holder-2-col -->
                            </div><!-- end one_half -->

                            <div class="one_half_isotope">
                                <h2 class="portfolio-single-column"><?php the_title(); ?></h2>
                                <div class="clear"></div>
    <?php			    $portfolio_item_description = get_post_meta($portfolio_posts_query->post->ID, 'portfolio_item_description', true);
                                if ( $portfolio_item_description ) {
                                    echo do_shortcode( __($portfolio_item_description) );
                                }; ?>
                                <div class="clear"></div>
                            </div><!-- end one_half iso_last_column -->
			</div><!-- end full_width_isotope -->

			<div class='clear'> </div>
                        
<?php               endwhile; 
                   // Restore original Post Data
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


