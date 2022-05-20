<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Redirect user to the "U-Design" theme settings page after activation
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
    wp_redirect( admin_url( 'admin.php?page=udesign_options_page' ) );
    exit;
}

// Create Text Domain For the Themes' Translations
if (function_exists('load_theme_textdomain')) {
    load_theme_textdomain('udesign', get_template_directory().'/locale');
}

// U-Design action hook functions
include( 'lib/u-design-hooks/u-design-theme-hooks.php' );

// load styles
function udesign_init_styles() {
    if( !is_admin() ){
	// get the desired color scheme
	global $udesign_options, $udesign_responsive;
	// Format the Google WebFonts as string
	if( $udesign_options['google_web_fonts_assoc'] ) {
	    $google_fonts_string = implode( '|', array_unique($udesign_options['google_web_fonts_assoc']) );
	    if( $google_fonts_string )
		    printf("<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=%s' type='text/css' />\r\n", str_replace(' ', '+', $google_fonts_string));
	}
//	wp_enqueue_style('u-design-reset', get_bloginfo('template_url') . '/styles/common-css/reset.css', false, '1.0', 'screen');
//	wp_enqueue_style('u-design-text', get_bloginfo('template_url') . "/styles/style1/css/text.css", false, '1.0', 'screen');
//	wp_enqueue_style('u-design-grid-960', get_bloginfo('template_url') . '/styles/common-css/960.css', false, '1.0', 'screen');
//	wp_enqueue_style('u-design-superfish_menu', get_bloginfo('template_url') . '/scripts/superfish-menu/css/superfish.css', false, '1.7.2', 'screen');
        if ( $udesign_options['enable_prettyPhoto_script'] ) {
            wp_enqueue_style('u-design-pretty_photo', get_bloginfo('template_url') . '/scripts/prettyPhoto/css/prettyPhoto.css', false, '3.1.5', 'screen');
        }
	wp_enqueue_style('u-design-style', get_bloginfo('template_url') . "/styles/style1/css/style.css", false, '2.4.6', 'screen');

        // load the appropriate custom styles file optimized for performance
        if ( get_theme_mod( 'udesign_custom_styles_use_css_file' ) ) { // load "custom_style.css" file
            $rand_ver = '.'.get_theme_mod( 'udesign_rand_ver_for_caching' );
          //  wp_enqueue_style('u-design-custom-style', get_bloginfo('template_url') . '/styles/custom/custom_style.css', false, '2.4.6'.$rand_ver, 'screen');
        } else { // otherwise use "custom_style.php" file
          //  wp_enqueue_style('u-design-custom-style', get_bloginfo('template_url') . '/styles/custom/custom_style.php', false, '2.4.6', 'screen');
        }

        if ( $udesign_responsive ) {
            wp_enqueue_style('u-design-responsive', get_bloginfo('template_url') . '/styles/common-css/responsive.css', false, '2.4.6', 'screen');
        }
        if ( $udesign_options['max_theme_width'] || $udesign_options['global_theme_width'] > 960 ||
                                get_theme_mod( 'udesign_custom_width_page') == 'yes' || get_theme_mod( 'udesign_max_width_page') == 'yes' ) {
            wp_enqueue_style('u-design-fluid', get_bloginfo('template_url') . '/styles/common-css/fluid.css', false, '2.4.6', 'screen');
        }

        if ( $udesign_options['enable_default_style_css'] ) {
            wp_enqueue_style('u-design-style-orig', get_stylesheet_directory_uri() . "/style.css", false, '2.4.6', 'screen');
        }

    }
}
add_action('wp_enqueue_scripts', 'udesign_init_styles');

// load scripts
function udesign_init_scripts() {
    if( !is_admin() ){
	global $udesign_options, $current_slider, $udesign_responsive;

        // Load jQuery
	wp_enqueue_script('jquery');

	// Cufon
	if( $udesign_options['enable_cufon'] ) {
	    wp_enqueue_script('cufon_lib', get_bloginfo('template_url')."/scripts/cufon/cufon-yui.js", array('jquery'), '1.09i', true);

	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Aubrey' )
		    wp_enqueue_script('font_aubrey', get_bloginfo('template_url')."/scripts/cufon/Aubrey/Aubrey_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Bebas' )
		    wp_enqueue_script('font_bebas', get_bloginfo('template_url')."/scripts/cufon/Bebas/Bebas_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Blue Highway' )
		    wp_enqueue_script('font_blue_highway', get_bloginfo('template_url')."/scripts/cufon/Blue_Highway/Blue_Highway_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Blue Highway D Type' )
		    wp_enqueue_script('font_blue_highway_d_type', get_bloginfo('template_url')."/scripts/cufon/Blue_Highway/Blue_Highway_D_Type_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Diavlo Book' )
		    wp_enqueue_script('font_diavlo_book', get_bloginfo('template_url')."/scripts/cufon/Diavlo/Diavlo_Book_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'eurofurence' )
		    wp_enqueue_script('font_eurofurence', get_bloginfo('template_url')."/scripts/cufon/Eurofurence/eurofurence_500.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'GeosansLight' )
		    wp_enqueue_script('font_geosanslight', get_bloginfo('template_url')."/scripts/cufon/GeosansLight/GeosansLight_500.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Oregon LDO' )
		    wp_enqueue_script('font_oregon_ldo', get_bloginfo('template_url')."/scripts/cufon/Oregon_LDO/Oregon_LDO_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Qlassik Medium' )
		    wp_enqueue_script('font_qlassik_medium', get_bloginfo('template_url')."/scripts/cufon/Qlassik/Qlassik_Medium_500.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Sansation' )
		    wp_enqueue_script('font_sansation', get_bloginfo('template_url')."/scripts/cufon/Sansation/Sansation_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Sniglet' )
		    wp_enqueue_script('font_sniglet', get_bloginfo('template_url')."/scripts/cufon/Sniglet/Sniglet_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Tertre Med' )
		    wp_enqueue_script('font_tertre_med', get_bloginfo('template_url')."/scripts/cufon/Tertre/Tertre_Med_800.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Waukegan LDO' )
		    wp_enqueue_script('font_waukegan_ldo', get_bloginfo('template_url')."/scripts/cufon/Waukegan_LDO/Waukegan_LDO_400.font.js", array('cufon_lib'), '1.0', true);
	    if ( $udesign_options['cufon_fonts_assoc']['title_headings_font_family'] == 'Yorkville' )
		    wp_enqueue_script('font_yorkville', get_bloginfo('template_url')."/scripts/cufon/Yorkville/yorkville_400.font.js", array('cufon_lib'), '1.0', true);
	}

	// swfobject scripts
	if( is_front_page() && $current_slider == '1' ) {
	    wp_enqueue_script('flashmo-swfobject', get_bloginfo('template_url')."/sliders/flashmo/grid_slider/swfobject.js", '', '2.2', false);
	}
	if( is_front_page() && ( $current_slider == '2' || $current_slider == '3' ) ) {
	    wp_enqueue_script('piecemaker-swfobject', get_bloginfo('template_url')."/sliders/piecemaker/js/swfobject.js", '', '1.5', false);
	}

	// Cycle 1 Slider Plugin
	if( is_front_page() && $current_slider == '4' ) {
	    wp_enqueue_script('cycle', get_bloginfo('template_url')."/sliders/cycle/jquery.cycle.all.min.js", array('jquery'), '3.0.3', true);
	    wp_enqueue_script('cycle1', get_bloginfo('template_url')."/sliders/cycle/cycle1/cycle1_script.js", array('jquery'), '1.0.1', true);
            // Generate an array of Cycle 1 parameters and pass them to "cycle1_script.js":
            $c1_slides_array = explode( ',', $udesign_options['c1_slides_order_str'] );
            $c1_transition_types_array = array();
            foreach( $c1_slides_array as $slide_row_number ) {
                $c1_transition_types_array[] = $udesign_options['c1_transition_type_'.$slide_row_number];
            }
            $c1_transition_types_csv = implode(',', $c1_transition_types_array);
            $cycle1_params = array(
                    fx		=> $c1_transition_types_csv,
                    speed	=> $udesign_options['c1_speed'],
                    timeout	=> $udesign_options['c1_timeout'],
                    sync	=> ( $udesign_options['c1_sync'] ) ? 1 : 0
            );
            wp_localize_script( 'cycle1', 'cycle1_params', $cycle1_params );
	}

	// Cycle 2 Slider Plugin
	if( is_front_page() && $current_slider == '5' ) {
	    wp_enqueue_script('cycle', get_bloginfo('template_url')."/sliders/cycle/jquery.cycle.all.min.js", array('jquery'), '3.0.3', true);
	    wp_enqueue_script('cycle2', get_bloginfo('template_url')."/sliders/cycle/cycle2/cycle2_script.js", array('jquery'), '1.0.1', true);
            // Generate an array of Cycle 2 parameters and pass them to "cycle2_script.js":
            $c2_slides_array = explode( ',', $udesign_options['c2_slides_order_str'] );
            $c2_transition_types_array = array();
            foreach( $c2_slides_array as $slide_row_number ) {
                $c2_transition_types_array[] = $udesign_options['c2_transition_type_'.$slide_row_number];
            }
            $c2_transition_types_csv = implode(',', $c2_transition_types_array);
            $cycle2_params = array(
                    fx		=> $c2_transition_types_csv,
                    speed	=> $udesign_options['c2_speed'],
                    timeout	=> $udesign_options['c2_timeout'],
                    sync	=> ( $udesign_options['c2_sync'] ) ? 1 : 0,
                    texttrans	=> ( $udesign_options['c2_text_transition_on'] ) ? 1 : 0
            );
            wp_localize_script( 'cycle2', 'cycle2_params', $cycle2_params );
	}

	// Cycle 3 Slider Plugin
	if( is_front_page() && $current_slider == '6' ) {
	    wp_enqueue_script('cycle', get_bloginfo('template_url')."/sliders/cycle/jquery.cycle.all.min.js", array('jquery'), '3.0.3', true);
	    wp_enqueue_script('jquery-easing', get_bloginfo('template_url')."/sliders/cycle/jquery.easing.1.3.js", array('jquery'), '1.3', true);
	    wp_enqueue_script('cycle3', get_bloginfo('template_url')."/sliders/cycle/cycle3/cycle3_script.js", array('jquery'), '1.0.1', true);
            // Generate an array of Cycle 1 parameters and pass them to "cycle3_script.js":
            $cycle3_params = array(
                    timeout	=> $udesign_options['c3_timeout'],
                    autostop	=> ( $udesign_options['c3_autostop'] ) ? 1 : 0
            );
            wp_localize_script( 'cycle3', 'cycle3_params', $cycle3_params );
	}

	// PrettyPhoto script
	if( $udesign_options['enable_prettyPhoto_script'] ) {
            wp_enqueue_script('pretty-photo-lib', get_bloginfo('template_url')."/scripts/prettyPhoto/js/jquery.prettyPhoto.js", array('jquery'), '3.1.5', true);
            wp_enqueue_script('pretty-photo-custom-params', get_bloginfo('template_url')."/scripts/prettyPhoto/custom_params.js", array('pretty-photo-lib'), '3.1.5', true);
            wp_localize_script('pretty-photo-custom-params', 'pretty_photo_custom_params', array(
                        'window_width_to_disable_pp' => $udesign_options['responsive_disable_pretty_photo_at_width']
                    )
            );
        }

	// jQuery validation script
        if ( is_page_template('page-Contact.php') ) {
            wp_enqueue_script('jquery_validate_lib', get_bloginfo('template_url')."/scripts/jquery-validate/jquery.validate.min.js", array('jquery'), '1.11.1', true);
            wp_enqueue_script('masked_input_plugin', get_bloginfo('template_url')."/scripts/masked-input-plugin/jquery.maskedinput.min.js", array('jquery'), '1.3.1', true);
        }

	// Isotope related Sortable Portfolio scripts
        if ( is_page_template('page-Portfolio1ColSortable.php') || is_page_template('page-Portfolio2ColSortable.php') || is_page_template('page-Portfolio3ColSortable.php') || is_page_template('page-Portfolio4ColSortable.php') ) {
            wp_enqueue_script('jquery-isotope-lib', get_bloginfo('template_url')."/scripts/isotope/jquery.isotope.min.js", array('jquery'), '1.5.25', true);
            wp_enqueue_script('isotope-custom-scripts', get_bloginfo('template_url')."/scripts/isotope/isotope-custom-scripts.js", array('jquery-isotope-lib'), '1.0.0', true);
        }

	// Superfish Dropdown menu scripts (combined)
	wp_enqueue_script('superfish-menu', get_bloginfo('template_url')."/scripts/superfish-menu/js/superfish.combined.js", array('jquery'), '1.7.2', true);

	// Miscellaneous JS scripts
	wp_enqueue_script('udesign-scripts', get_bloginfo('template_url')."/scripts/script.js", array('jquery'), '1.0', true);
        wp_localize_script('udesign-scripts', 'udesign_script_vars', array(
                    'search_widget_placeholder' => __('Type here to search', 'udesign'),
                    'remove_fixed_menu_on_mobile' => $udesign_options['remove_fixed_menu_on_mobile_devices']
		)
	);

        // Responsive Menu
        if ( $udesign_responsive ) {
            if ( $udesign_options['responsive_menu'] == 'responsive_menu_2') {
                wp_enqueue_script('udesign-responsive-menu-2', get_bloginfo('template_url') . '/scripts/responsive/meanmenu/jquery.meanmenu.2.0.min.js', '', '2.0', true);
                wp_enqueue_script('udesign-responsive-menu-2-options', get_bloginfo('template_url') . '/scripts/responsive/meanmenu/jquery.meanmenu.options.js', '', '2.0', true);
            } else {
                wp_enqueue_script('udesign-responsive-menu-1', get_bloginfo('template_url') . '/scripts/responsive/selectnav/selectnav.min.js', '', '0.1', true);
                wp_enqueue_script('udesign-responsive-menu-1-options', get_bloginfo('template_url') . '/scripts/responsive/selectnav/selectnav-options.js', '', '0.1', true);
                wp_localize_script('udesign-responsive-menu-1-options', 'udesign_selectnav_vars', array(
                            'selectnav_menu_label' => __('Navigation', 'udesign')
                        )
                );
            }
        }
    }
}
// add_action('wp_enqueue_scripts', 'udesign_init_scripts');


// Set the content width based. Used to set the width of images and content.
if ( !isset( $content_width ) ) $content_width = 600;

// Define a global variable '$portfolio_pages_array' as an array containing all pages assigned to be Portfolio pages
global $portfolio_pages_array;
$portfolio_1_pages_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio1Col.php&hierarchical=0');
$portfolio_2_pages_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio2Col.php&hierarchical=0');
$portfolio_3_pages_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio3Col.php&hierarchical=0');
$portfolio_4_pages_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio4Col.php&hierarchical=0');
$portfolio_1_pages_sortable_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio1ColSortable.php&hierarchical=0');
$portfolio_2_pages_sortable_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio2ColSortable.php&hierarchical=0');
$portfolio_3_pages_sortable_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio3ColSortable.php&hierarchical=0');
$portfolio_4_pages_sortable_array = get_pages('meta_key=_wp_page_template&meta_value=page-Portfolio4ColSortable.php&hierarchical=0');
$portfolio_pages_array = array_merge($portfolio_1_pages_array, $portfolio_2_pages_array, $portfolio_3_pages_array, $portfolio_4_pages_array, $portfolio_1_pages_sortable_array, $portfolio_2_pages_sortable_array, $portfolio_3_pages_sortable_array, $portfolio_4_pages_sortable_array);


// Menu functions with support for WordPress 3.0 menus
if ( function_exists('wp_nav_menu') ) {
    add_theme_support( 'nav-menus' );
    register_nav_menus( array(
	'primary' => esc_html__( 'Primary Navigation', 'udesign' ),
    ) );
}

function udesign_nav() {
    if ( function_exists( 'wp_nav_menu' ) ) {
        $defaults = array(
                'container_class' => 'navigation-menu',
                'container_id' => 'navigation-menu',
                'menu_id'    => 'main-top-menu',
                'menu_class' => 'sf-menu',
                'link_before'=> '<span>',
                'link_after' => '</span>',
                'theme_location' => 'primary',
                'fallback_cb' => 'udesign_nav_fallback'
        );
        wp_nav_menu( $defaults );
    } else {
        udesign_nav_fallback();
    }
}

function udesign_nav_fallback() {
    global $udesign_options;
    $menu_html = '<div id="navigation-menu" class="navigation-menu">';
    $menu_html .= '<ul id="main-top-menu" class="sf-menu">';
    $menu_html .= is_front_page() ? "<li class='current_page_item'>" : "<li>";
    $menu_html .= '<a href="'.get_bloginfo('url').'"><span>'.esc_html__('Home', 'udesign').'</span></a></li>';
    $menu_html .= wp_list_pages('depth=5&title_li=0&sort_column=menu_order&link_before=<span>&link_after=</span>&echo=0');
    $menu_html .= '</ul>';
    $menu_html .= '</div>';
    echo $menu_html;
}

//Automatic Feed Links is a theme feature introduced with Version 3.0. This feature addes to HTML <head> RSS feed links.
if ( function_exists('add_theme_support') ) {
    add_theme_support( 'automatic-feed-links' );
}


// replace the original get_search_form() with the internationalized version here:
function translatable_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="'.get_bloginfo('url').'" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:', 'udesign') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'udesign') .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'translatable_search_form' );


/* Check for image */
function findImage() {
	$content = get_the_content();
	$count = substr_count($content, '<img');
	if ($count > 0) return true;
	else return false;
}

/* Get the first image from the post and return it */
function get_image_url() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
	$first_img = "/images/thumbnail-default.jpg";
    }
    return $first_img;
}


/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7+
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
function test_post_is_in_descendant_category( $cats, $_post = null )
{
    foreach ( (array) $cats as $cat ) {
	// get_term_children() accepts integer ID only
	$descendants = get_term_children( (int) $cat, 'category');
	if ( $descendants && in_category( $descendants, $_post ) )
	return true;
    }
    return false;
}

/**
 * Tests if any of a post's assigned categories are in the target categories or in any of the descendants
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7+
 */
function post_is_in_category_or_descendants( $cats, $_post = null )
{
    if( in_category( $cats, $_post = null ) || test_post_is_in_descendant_category( $cats, $_post = null ) ) {
	return true;
    }
    return false;
}

/**
 * This function is used to generate custom breadcrumbs for single posts view. Portfolio section or regular Blog is considered
 * when generating the link structure.
 */
function get_category_parents_for_breadcrumbs( $id, $link = false, $separator = '/' ) {
	global $udesign_options, $portfolio_pages_array;
	$portfolio_cats_array = explode( ',', $udesign_options['portfolio_categories'] );
	if ( post_is_in_category_or_descendants($portfolio_cats_array) ) { // if the current post belongs to any Porfolio category
	    foreach ( $portfolio_pages_array as $portfolio_page_obj ) {
		$port_page_ID = $portfolio_page_obj->ID;
		if ( post_is_in_category_or_descendants( $udesign_options['portfolio_cat_for_page_'.$port_page_ID] ) ) {
		    echo get_category_parents_for_portfolio_page( $id, $link, $separator, FALSE , $port_page_ID );
		    break;
		}
	    }
	} else { // if the current category is a regular blog category
            echo is_wp_error( $cat_parents = get_category_parents( $id, $link, $separator, FALSE ) ) ? '' : $cat_parents;
	}
}
/**
 * This is the modified version of the "get_category_parents()" WP function
 * Retrieve category parents with separator for use in the Portfolio section to generate proper breadcrumb links.
 * The new parameter added is $portfolio_page_id which is the id of the page assigned with the Porfolio page template.
 * @since 1.2.0
 * @param int $id Category ID.
 * @param bool $link Optional, default is false. Whether to format with link.
 * @param string $separator Optional, default is '/'. How to separate categories.
 * @param bool $nicename Optional, default is false. Whether to use nice name for display.
 * @param string $portfolio_page_id Optional. Already linked to categories to prevent duplicates.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string
 */
function get_category_parents_for_portfolio_page( $id, $link = false, $separator = '/', $nicename = false, $portfolio_page_id='', $visited = array() ) {
	global $udesign_options;
	$chain = '';
	$parent = &get_category( $id );
	if ( is_wp_error( $parent ) ) return $parent;
	$name = ( $nicename ) ? $parent->slug : $parent->cat_name;
	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= '<a href="'.get_permalink( $portfolio_page_id ).'" title="'.esc_attr( sprintf( __( "Go back to %s", 'udesign' ), get_the_title($portfolio_page_id) ) ).'">'.get_the_title($portfolio_page_id).'</a>' . $separator . ' ';
	}
	if ( $link ) { // generate comma separated list of categories' links that the current single post has been assigned to
		$query_string_prefix = ( get_option('permalink_structure') != '' ) ? '?' : '&amp;';
		$categories_names_array = array();
		foreach((get_the_category()) as $category) {
		    if ( ( cat_is_ancestor_of( $udesign_options['portfolio_cat_for_page_'.$portfolio_page_id], $category->term_id ) ||
					       $udesign_options['portfolio_cat_for_page_'.$portfolio_page_id] == $category->term_id ) ) { // belongs to a category associated with the current portfolio page
			if ( preg_match( '/\?/', get_permalink($portfolio_page_id) ) ) $query_string_prefix = '&amp;';
                        $curr_cat_link = '<a href="'.get_permalink($portfolio_page_id).$query_string_prefix.'cat=' . ( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "Go back to %s", 'udesign' ), $category->cat_name ) ) . '">'.$category->cat_name.'</a>';
			array_push( $categories_names_array, $curr_cat_link );
		    }
		}
		$chain .= implode( ", ", $categories_names_array ) . $separator;
	} else { // generate comma separated list of categories' names that the current single post has been assigned to
		$categories_names_array = array();
		foreach((get_the_category()) as $category) {
		    if ( ( cat_is_ancestor_of( $udesign_options['portfolio_cat_for_page_'.$portfolio_page_id], $category->term_id ) ||
					       $udesign_options['portfolio_cat_for_page_'.$portfolio_page_id] == $category->term_id ) ) { // belongs to a category associated with the current portfolio page
			array_push( $categories_names_array, $category->cat_name );
		    }
		}
		$chain .= implode( ", ", $categories_names_array ) . $separator;
	}
	return $chain;
}

/**
 * Check the validity of the given Phone Numbers (North American)
 * This regex will validate a 10-digit North American telephone number.
 * Separators are not required, but can include spaces, hyphens, or periods.
 * Parentheses around the area code are also optional.
 *
 * @param string $phone The phone number
 * @return bool true if the phone number is valid or false otherwise
 */
function isPhoneNumberValid( $phone ) {
    // validate a phone number
    $pattern = '/^((([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+)*$/';
    return preg_match( $pattern, $phone );
}


// Custom Comment template
if ( !function_exists( 'udesign_theme_comment' ) ) {
    function udesign_theme_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        ob_start(); ?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"> <?php // WordPress will supply the closing </li> tag automatically ?>
            <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-meta">
                    <div class="avatar-wrapper">
<?php                   echo get_avatar( $comment, $size='52' ); ?>
                    </div>
                    <div class="commentmetadata">
                        <div class="author"><?php comment_author_link() ?></div>
<?php                   printf(__('<span class="the-comment-time-and-date"><span class="time">%1$s</span> on <a class="comment-date" href="#comment-%2$s" title="%3$s">%3$s</a></span>', 'udesign'), get_comment_time(__('g:i a', 'udesign')), get_comment_ID(), get_comment_date(__('F j, Y', 'udesign')) );
                        edit_comment_link(esc_html__('edit', 'udesign'),'&nbsp;&nbsp;',''); ?>
                    </div>
                </div>

                <div class="commenttext">
<?php               if ($comment->comment_approved == '0') : ?>
                        <em><?php esc_html_e('Your comment is awaiting moderation.', 'udesign') ?></em>
                        <br />
<?php               endif; ?>
<?php               comment_text() ?>
                    <div class="reply">
<?php                   comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                </div>
            </div>

<?php   $udesign_comment_template_html = ob_get_clean();
        echo apply_filters( 'udesign_get_comment_template', $udesign_comment_template_html );

    }
}

// Include the posts' count under a category into the a-tag when listing the categories
function posts_count_inside_the_link( $html ) {
    $html = preg_replace( '/\<\/a\> \((.*)\)/', ' <span class="posts-counter">($1)</span></a>', $html );
    return $html;
}
add_filter('wp_list_categories', 'posts_count_inside_the_link');

// Include the posts' count under an archive into the a-tag when listing the categories
function posts_count_inside_archive_link( $html ) {
    $html = preg_replace( '/\<\/a\>&nbsp;\((.*)\)/', ' <span class="posts-counter">($1)</span></a>', $html );
    return $html;
}
add_filter('get_archives_link', 'posts_count_inside_archive_link');

/***************** BEGIN EXCERPTS ******************/
// change the length of excerpts
function new_excerpt_length( $length ) {
    global $udesign_options;
    return $udesign_options['excerpt_length_in_words'];
}
add_filter('excerpt_length', 'new_excerpt_length');

// remove the '[...]'
function moreLink( $content ){
    return str_replace( '[...]', '', do_shortcode($content) );
}
add_filter('the_excerpt', 'moreLink');

// Custom length of the excerpt in words
function custom_string_length_by_words( $string, $limit ) {
    $array_of_words = explode(' ', $string, ($limit + 1));
    if( count($array_of_words) > $limit ){
	array_pop($array_of_words);
    }
    return implode(' ', $array_of_words);
}
/***************** END EXCERPTS ******************/


/***************** BEGIN SHORTCODES ******************/
// Allows shortcodes to be used in widgets
if ( !is_admin() ){
    add_filter('widget_text', 'do_shortcode');
}

// Shortcode: "Read More ->" Link.
// Usage: [read_more text="Read more" title="Read More..." url="http://www.some_url_goes_here.com/" align="left" target="_blank"]
function read_more_func( $atts ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Read more', 'udesign'),
	    'title' => '',
	    'url' => '#',
	    'align' => 'left',
	    'target' => '',
    ), $atts));

    $target = ($target == '_blank') ? ' target="_blank"' : '';
    $align_class = ( $align == 'right' ) ? '-align-right': '-align-left';
    $more_arrow = ( is_rtl() ) ? '&larr;' : '&rarr;';
    $html = '<a class="read-more'.$align_class.'" href="'.$url.'" title="'.$title.'"'.$target.'><span>'.do_shortcode($text).'</span> '.$more_arrow.'</a>';
    return $html;
}
add_shortcode('read_more', 'read_more_func');

// Shortcode: Button.
// Usage: [button text="Read more..." style="light" title="Nice Button" url="http://www.some_url_goes_here.com/" align="left" target="_blank"]
function button_func( $atts ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Read more...', 'udesign'),
	    'style' => 'dark',
	    'title' => '',
	    'url' => '#',
	    'align' => 'left',
	    'target' => '',
    ), $atts));

    $target = ($target == '_blank') ? ' target="_blank"' : '';
    $style_class = ( $style == 'dark' ) ? ' dark-button': ' light-button';
    $align_class = '';
    $before = $after = '<div class="clear"></div>';
    if( $align == 'right' ) {
        $align_class = ' align-btn-right';
    } elseif ( $align == 'left' ) {
        $align_class = ' align-btn-left';
    } else { // catch 'center'
        $before = '<div class="align-btn-center">';
        $after = '</div>';
    }
    $html = '<a class="pngfix'.$style_class.$align_class.'" href="'.$url.'" title="'.$title.'"'.$target.'><span class="pngfix">'.do_shortcode($text).'</span></a>';
    return $before.$html.$after;
}
add_shortcode('button', 'button_func');

// Shortcode: Small Button.
// Usage: [small_button text="Read more..." style="light" title="Nice Button" url="http://www.some_url_goes_here.com/" align="left" target="_blank"]
function small_button_func( $atts ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Read more...', 'udesign'),
	    'style' => 'dark',
	    'title' => '',
	    'url' => '#',
	    'align' => 'left',
	    'target' => '',
    ), $atts));

    $target = ($target == '_blank') ? ' target="_blank"' : '';
    $style_class = ( $style == 'dark' ) ? ' small-dark-button': ' small-light-button';
    $align_class = '';
    $before = $after = '<div class="clear"></div>';
    if( $align == 'right' ) {
        $align_class = ' align-btn-right';
    } elseif ( $align == 'left' ) {
        $align_class = ' align-btn-left';
    } else { // catch 'center'
        $before = '<div class="align-btn-center">';
        $after = '</div>';
    }
    $html = '<a class="pngfix'.$style_class.$align_class.'" href="'.$url.'" title="'.$title.'"'.$target.'><span class="pngfix">'.do_shortcode($text).'</span></a>';
    return $before.$html.$after;
}
add_shortcode('small_button', 'small_button_func');

// Shortcode: Round Button.
// Usage: [round_button text="Read more..." style="light" title="Nice Button" url="http://www.some_url_goes_here.com/" align="left" target="_blank"]
function round_button_func( $atts ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Read more...', 'udesign'),
	    'style' => 'dark',
	    'title' => '',
	    'url' => '#',
	    'align' => 'left',
	    'target' => '',
    ), $atts));
    $target = ($target == '_blank') ? ' target="_blank"' : '';
    $style_class = ( $style == 'dark' ) ? ' dark-round-button': ' light-round-button';
    $align_class = '';
    $before = $after = '<div class="clear"></div>';
    if( $align == 'right' ) {
        $align_class = ' align-btn-right';
    } elseif ( $align == 'left' ) {
        $align_class = ' align-btn-left';
    } else { // catch 'center'
        $before = '<div class="align-btn-center">';
        $after = '</div>';
    }
    $html = '<a class="pngfix'.$style_class.$align_class.'" href="'.$url.'" title="'.$title.'"'.$target.'><span class="pngfix">'.do_shortcode($text).'</span></a>';
    return $before.$html.$after;
}
add_shortcode('round_button', 'round_button_func');

// Shortcode: Custom Button.
// Usage: [custom_button text="Read more..." title="Nice Button" url="http://www.some_url_goes_here.com/" size="medium" bg_color="#FF5C00" text_color="#FFFFFF" align="left" target="_blank"]
// Options: align: left, right or center, size: small, medium, large and x-large, the rest are self explanatory...
function custom_button_func( $atts ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Read more...', 'udesign'),
	    'title' => '',
	    'url' => '#',
	    'size' => 'medium',
	    'bg_color' => '#FF5C00',
	    'text_color' => '#FFFFFF',
	    'align' => 'left',
	    'target' => '',
    ), $atts));
    $target = ($target == '_blank') ? ' target="_blank"' : '';
    $align_class = $before = $after = '';
    if( $align == 'right' ) {
        $align_class = ' align-btn-right';
    } elseif ( $align == 'left' ) {
        $align_class = ' align-btn-left';
    } else { // catch 'center'
        $before = '<div class="align-btn-center">';
        $after = '</div>';
    }
    $html = '<a class="'.strtolower($size).' custom-button'.$align_class.'" href="'.$url.'" title="'.$title.'"'.$target.'><span style="background-color:'.$bg_color.'; color:'.$text_color.'">'.do_shortcode($text).'</span></a>';
    return $before.$html.$after;
}
add_shortcode('custom_button', 'custom_button_func');

// Shortcode: Flat Custom Button.
// Usage: [flat_button text="Flat Button..." title="Flat Button" url="http://www.some_url_goes_here.com/" padding="10px 20px" bg_color="#FF5C00" border_color="#FF5C00" border_width="1px" text_color="#FFFFFF" text_size="14px" align="left" target="_blank"]
// Options: align: left, right or center, the rest are self explanatory...
function flat_custom_button_func( $atts ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Read more...', 'udesign'),
	    'title' => '',
	    'url' => '#',
	    'padding' => '10px 20px',
	    'bg_color' => '#FF5C00',
	    'border_color' => '#FF5C00',
	    'border_width' => '1px',
	    'text_color' => '#FFFFFF',
	    'text_size' => '14px',
	    'align' => 'left',
	    'target' => '',
    ), $atts));
    $target = ($target == '_blank') ? ' target="_blank"' : '';
    $align_class = $before = $after = '';
    if( $align == 'right' ) {
        $align_class = ' align-btn-right';
    } elseif ( $align == 'left' ) {
        $align_class = ' align-btn-left';
    } else { // catch 'center'
        $before = '<div class="align-btn-center">';
        $after = '</div>';
    }
    $html = '<a class="flat-custom-button'.$align_class.'" href="'.$url.'" title="'.$title.'"'.$target.'><span style="padding:'.$padding.'; background-color:'.$bg_color.'; border:'.$border_width.' solid '.$border_color.'; color:'.$text_color.'; font-size:'.$text_size.';">'.do_shortcode($text).'</span></a>';
    return $before.$html.$after;
}
add_shortcode('flat_button', 'flat_custom_button_func');

// Shortcode: Divider with an anchor link to top of page.
// Usage: [divider]
function divider_func( $atts ) {
    return '<div class="divider"></div>';
}
add_shortcode('divider', 'divider_func');

// Shortcode: Divider with an anchor link to top of page.
// Usage: [divider_top]
function divider_top_func( $atts ) {
    return '<div class="divider top-of-page"><a href="#top" title="'.esc_html__('Top of Page', 'udesign').'">'.esc_html__('Back to Top', 'udesign').'</a></div>';
}
add_shortcode('divider_top', 'divider_top_func');

// Shortcode: Clear , used to clear an element of its neighbors, no floating elements are allowed on the left or the right side.
// Usage: [clear]
function clear_func( $atts ) {
    return '<div class="clear"></div>';
}
add_shortcode('clear', 'clear_func');

// Shortcode: Mesage Box. Predefined and custom.
// Usage (pre-defined): [message type="info"]Your info message goes here...[/message]
// there are 4 pre-set message types: "info", "success", "warning", "erroneous"
// Usage (custom): [message type="custom" width="100%" start_color="#FFFFFF" end_color="#EEEEEE" border="#BBBBBB" color="#333333"]Your info message goes here...[/message]
// width could be in pixels as well, e.g. width="250px"
// Usage (simple): [message type="simple" bg_color="#EEEEEE" color="#333333"]Your info message goes here...[/message]
function message_box_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'type' => 'custom',
	    'align' => 'left',
	    'start_color' => '#FFFFFF',
	    'end_color' => '#EEEEEE',
	    'border' => '#BBBBBB',
	    'width' => '100%',
	    'color' => '#333333',
	    'bg_color' => '#F5F5F5',
    ), $atts));
    if ($type == 'custom') {
	if ($align == 'center') {
	    $margin_left = $margin_right = 'auto !important';
	} elseif ($align == 'right') {
	    $margin_left = 'auto !important';
	    $margin_right = '0 !important';
	} else { // default: LEFT
	    $margin_left = $margin_right = '0 !important';
	}
	$html = '<div class="'.$type.'" style="background:-moz-linear-gradient(center top , '.$start_color.', '.$end_color.') repeat scroll 0 0 transparent;
					       background: -webkit-gradient(linear, center top, center bottom, from('.$start_color.'), to('.$end_color.'));
                                               background: -o-linear-gradient(top, '.$start_color.' 0%,'.$end_color.' 99%); /* Opera 11.10+ */
                                               background: -ms-linear-gradient(top, '.$start_color.' 0%,'.$end_color.' 99%); /* IE10+ */
					       margin-left:'.$margin_left.';
					       margin-right:'.$margin_right.';
					       border:1px solid '.$border.';
					       background-color: '.$end_color.';
					       width:'.$width.';
					       color:'.$color.';"><div class="inner-padding">'.do_shortcode($content).'</div></div>';
    } elseif ($type == 'simple') {
	$html = '<div class="'.$type.'" style="background-color:'.$bg_color.'; color:'.$color.';"><div class="inner-padding">'.do_shortcode($content).'</div></div>';
    } else {
	$html = '<div class="'.$type.'"><div class="msg-box-icon pngfix">'.do_shortcode($content).'</div></div>';
    }
    return $html;
}
add_shortcode('message', 'message_box_func');

// Shortcode: PullQuote.
// Usage: [pullquote style="left" quote="light"], style options: 'left', 'right'; quote options: 'light' (optional), otherwise defaults to dark style
function pullquote_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'style' => 'left',
	    'quote' => 'dark',
    ), $atts));
    $align = ($style == 'right') ? 'alignright' : 'alignleft';
    $quote_color = ($quote == 'light') ? ' bq-light' : '';
    return '<blockquote class="'.$align.$quote_color.'">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('pullquote', 'pullquote_func');

// Shortcode: Dropcap
// Usage: [dropcap]A[/dropcap]
function dropcap_func( $atts, $content = null ) {
    return '<span class="dropcap">'.$content.'</span>';
}
add_shortcode('dropcap', 'dropcap_func');

// Shortcode: one_fourth
// Usage: [one_fourth]Content goes here...[/one_fourth]
function one_fourth_func( $atts, $content = null ) {
    return '<div class="one_fourth">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'one_fourth_func');

// Shortcode: one_fourth_last
// Usage: [one_fourth_last]Content goes here...[/one_fourth_last]
function one_fourth_last_func( $atts, $content = null ) {
    return '<div class="one_fourth last_column">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth_last', 'one_fourth_last_func');

// Shortcode: one_third
// Usage: [one_third]Content goes here...[/one_third]
function one_third_func( $atts, $content = null ) {
    return '<div class="one_third">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'one_third_func');

// Shortcode: one_third_last
// Usage: [one_third_last]Content goes here...[/one_third_last]
function one_third_last_func( $atts, $content = null ) {
    return '<div class="one_third last_column">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third_last', 'one_third_last_func');

// Shortcode: one_half
// Usage: [one_half]Content goes here...[/one_half]
function one_half_func( $atts, $content = null ) {
    return '<div class="one_half">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half', 'one_half_func');

// Shortcode: one_half_last
// Usage: [one_half_last]Content goes here...[/one_half_last]
function one_half_last_func( $atts, $content = null ) {
    return '<div class="one_half last_column">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half_last', 'one_half_last_func');

// Shortcode: two_third
// Usage: [two_third]Content goes here...[/two_third]
function two_third_func( $atts, $content = null ) {
    return '<div class="two_third">'.do_shortcode($content).'</div>';
}
add_shortcode('two_third', 'two_third_func');

// Shortcode: two_third_last
// Usage: [two_third_last]Content goes here...[/two_third_last]
function two_third_last_func( $atts, $content = null ) {
    return '<div class="two_third last_column">'.do_shortcode($content).'</div>';
}
add_shortcode('two_third_last', 'two_third_last_func');

// Shortcode: three_fourth
// Usage: [three_fourth]Content goes here...[/three_fourth]
function three_fourth_func( $atts, $content = null ) {
    return '<div class="three_fourth">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourth', 'three_fourth_func');

// Shortcode: three_fourth_last
// Usage: [three_fourth_last]Content goes here...[/three_fourth_last]
function three_fourth_last_func( $atts, $content = null ) {
    return '<div class="three_fourth last_column">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourth_last', 'three_fourth_last_func');

// Shortcode: toggle_content
// Usage: [toggle_content title="Title"]Your content goes here...[/toggle_content]
function toggle_content_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
    $html = '<h4 class="slide_toggle"><a href="#">' .$title. '</a></h4>';
    $html .= '<div class="slide_toggle_content" style="display: none;">'.do_shortcode($content).'</div>';
    return $html;
}
add_shortcode('toggle_content', 'toggle_content_func');

// Shortcode: tab
// Usage: [tab title="title 1"]Your content goes here...[/tab]
function tab_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
    global $single_tab_array;
    $single_tab_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
    return $single_tab_array;
}
add_shortcode('tab', 'tab_func');

/* Shortcode: tabs
 * Usage:   [tabs]
 * 		[tab title="title 1"]Your content goes here...[/tab]
 * 		[tab title="title 2"]Your content goes here...[/tab]
 * 	    [/tabs]
 */
function tabs_func( $atts, $content = null ) {
    global $single_tab_array;
    $single_tab_array = array(); // clear the array

    $tabs_nav = '<div class="clear"></div>';
    $tabs_nav .= '<div class="tabs-wrapper">';
    $tabs_nav .= '<ul class="tabs">';
    do_shortcode($content); // execute the '[tab]' shortcode first to get the title and content
    $count = 1;
    foreach ($single_tab_array as $tab => $tab_attr_array) {
	$default = ( $tab == 0 ) ? ' class="defaulttab"' : '';
	$tabs_nav .= '<li><a href="javascript:void(0)"'.$default.' id="tab-'.$count.'"><span>'.$tab_attr_array['title'].'</span></a></li>';
	$tabs_content .= '<div class="tab-content" id="tab-'.$count++.'-content"><div class="tabs-inner-padding">'.$tab_attr_array['content'].'</div></div>';
    }
    $tabs_nav .= '</ul>';
    $tabs_output .= $tabs_nav . $tabs_content;
    $tabs_output .= '</div><!-- tabs-wrapper end -->';
    $tabs_output .= '<div class="clear"></div>';
    return $tabs_output;
}
add_shortcode('tabs', 'tabs_func');

// Shortcode: accordion_toggle
// Usage: [accordion_toggle title="title 1"]Your content goes here...[/accordion_toggle]
function accordion_toggle_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
    global $single_accordion_toggle_array;
    $single_accordion_toggle_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
    return $single_accordion_toggle_array;
}
add_shortcode('accordion_toggle', 'accordion_toggle_func');

/* Shortcode: accordion
 * Usage:   [accordion]
 * 		[accordion_toggle title="title 1"]Your content goes here...[/accordion_toggle]
 * 		[accordion_toggle title="title 2"]Your content goes here...[/accordion_toggle]
 * 	    [/accordion]
 */
function accordion_func( $atts, $content = null ) {
    global $single_accordion_toggle_array;
    $single_accordion_toggle_array = array(); // clear the array

    $accordion_output = '<div class="clear"></div>';
    $accordion_output .= '<div class="accordion-wrapper">';
    do_shortcode($content); // execute the '[accordion_toggle]' shortcode first to get the title and content
    foreach ($single_accordion_toggle_array as $tab => $accordion_toggle_attr_array) {
	$accordion_output .= '<h3 class="accordion-toggle"><a href="#">'.$accordion_toggle_attr_array['title'].'</a></h3>';
        $accordion_output .= '<div class="accordion-container">';
        $accordion_output .= '  <div class="content-block">'.$accordion_toggle_attr_array['content'].'</div>';
        $accordion_output .= '</div><!-- end accordion-container -->';
    }
    $accordion_output .= '</div><!-- end accordion-wrapper -->';
    $accordion_output .= '<div class="clear"></div>';
    return $accordion_output;
}
add_shortcode('accordion', 'accordion_func');

// Shortcode: list
// Usage: [custom_list style="list-1"]List html goes here...[/custom_list]
function custom_list_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'style' => 'list-1',
    ), $atts));
    $content = str_replace('<ul>', '<ul class="'.$style.'">', do_shortcode($content));
    return $content;
}
add_shortcode('custom_list', 'custom_list_func');

// Shortcode: custom_table
// Usage: [custom_table]Table html goes here...[/custom_table]
function custom_table_func( $atts, $content = null ) {
    $content = str_replace('<table', '<table class="custom-table" ', do_shortcode($content));
    return $content;
}
add_shortcode('custom_table', 'custom_table_func');

// Shortcode: custom_frame_left
// Usage: [custom_frame_left]<img src="http://image-url-path-goes-here.jpg"/>[/custom_frame_left]
// Options: shadow="on"
function custom_frame_left_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'shadow' => 'off',
    ), $atts));
    $shadow_class = ($shadow == 'off') ? '': ' frame-shadow';
    $content = preg_replace('/\n|\r|<br>|<br \/>|alignleft|alignright/','',$content); // remove new line and carriage return characters accidentally added by user
    $content = preg_replace('/aligncenter|alignleft|alignright/','alignnone',$content); // replaces the 'aligncenter','alignleft' and 'alignright' classes added to img with 'alignnone'
    return  '<div class="custom-frame-wrapper alignleft'.$shadow_class.'"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding">' . do_shortcode($content) . '</div></div></div>';
}
add_shortcode('custom_frame_left', 'custom_frame_left_func');

// Shortcode: custom_frame_right
// Usage: [custom_frame_right]<img src="http://image-url-path-goes-here.jpg"/>[/custom_frame_right]
// Options: shadow="on"
function custom_frame_right_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'shadow' => 'off',
    ), $atts));
    $shadow_class = ($shadow == 'off') ? '': ' frame-shadow';
    $content = preg_replace('/\n|\r|<br>|<br \/>|alignleft|alignright/','',$content); // remove new line and carriage return characters accidentally added by user
    $content = preg_replace('/aligncenter|alignleft|alignright/','alignnone',$content); // replaces the 'aligncenter','alignleft' and 'alignright' classes added to img with 'alignnone'
    return  '<div class="custom-frame-wrapper alignright'.$shadow_class.'"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding">' . do_shortcode($content) . '</div></div></div>';
}
add_shortcode('custom_frame_right', 'custom_frame_right_func');

// Shortcode: custom_frame_center
// Usage: [custom_frame_center]<img src="http://image-url-path-goes-here.jpg"/>[/custom_frame_center]
// Options: shadow="on"
function custom_frame_center_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'shadow' => 'off',
    ), $atts));
    $shadow_class = ($shadow == 'off') ? '': ' frame-shadow';
    $content = preg_replace('/\n|\r|<br>|<br \/>|alignleft|alignright/','',$content); // remove new line and carriage return characters accidentally added by user
    $content = preg_replace('/aligncenter|alignleft|alignright/','alignnone',$content); // replaces the 'aligncenter','alignleft' and 'alignright' classes added to img with 'alignnone'
    return  '<div style="text-align:center;"><div class="custom-frame-wrapper aligncenter'.$shadow_class.'"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding">' . do_shortcode($content) . '</div></div></div></div>';
}
add_shortcode('custom_frame_center', 'custom_frame_center_func');

/*
 * Shortcode: udesign_recent_posts
 * Usage: [udesign_recent_posts]
 * Options: title="Recent Posts" category_id="9" num_posts="3" post_offset="0" num_words_limit="23" show_date_author="1" show_more_link="0" more_link_text="Read more" show_thumbs="1" thumb_frame_shadow="1" post_thumb_width="120" post_thumb_height="60"
 */
function udesign_recent_posts_func( $atts, $content = null) {
    global $wp_widget_factory;
    extract(shortcode_atts(array(
        'title' => esc_html__('Latest Posts', 'udesign'),
        'category_id' => '',
        'num_posts' => 3,
        'post_offset' => 0,
        'num_words_limit' => 13,
        'show_date_author' => false,
        'show_more_link' => false,
        'more_link_text' => esc_html__('Read more', 'udesign'),
        'show_thumbs' => true,
        'thumb_frame_shadow' => false,
        'post_thumb_width' => 60,
        'post_thumb_height' => 60
    ), $atts));
    $widget_name = esc_html('Latest_Posts_Widget');
    $id = $category_id;
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));

        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct", 'udesign'),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    ob_start();
    the_widget( $widget_name,
       array(
            'title' => esc_html($title),
            'category_id' => $category_id,
            'num_posts' => $num_posts,
            'post_offset' => $post_offset,
            'num_words_limit' => $num_words_limit,
            'show_date_author' => $show_date_author,
            'show_more_link' => $show_more_link,
            'more_link_text' => esc_html($more_link_text),
            'show_thumbs' => $show_thumbs,
            'thumb_frame_shadow' => $thumb_frame_shadow,
            'post_thumb_width' => $post_thumb_width,
            'post_thumb_height' => $post_thumb_height
       ),
       array(
            'widget_id'=>'arbitrary-instance-'.$id,
            'before_widget' => '<div class="widget widget_latest_posts">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        )
    );
    return ob_get_clean();

}
add_shortcode('udesign_recent_posts','udesign_recent_posts_func');

/*
 * Shortcode: Content Block Shortcode
 * Usage:     [content_block bg_image="http://your_image_url" max_bg_width="yes" bg_fixed="yes" bg_position="center top" bg_repeat="repeat-x" parallax_scroll="no" bg_color="#969696" content_padding="40px 0" font_color="#FFFFFF" class="class-name"]Your content goes here...[/content_block]
 *
 */
function content_block_func($atts, $content = null) {
    global $udesign_options;
    extract(shortcode_atts(array(
                    'bg_image' => '',
                    'bg_position' => '50% 0',
                    'bg_repeat' => 'repeat',
                    'parallax_scroll' => 'yes',
                    'bg_color' => 'transparent',
                    'bg_fixed' => 'no',
                    'font_color' => 'inherit',
                    'max_bg_width' => 'yes',
                    'content_padding' => '40px 0',
                    'class' => ''
                ), $atts)
            );
    $bg_fixed = ( $bg_fixed == 'yes' ) ? 'fixed': 'scroll';
    $unique_id = rand(1000,2000);
    // Grab just the X bg position value from the user shortcode
    $bg_pos_X = explode(' ', $bg_position);
    $bg_pos_X = $bg_pos_X[0];

    ob_start(); ?>
            <style type="text/css">
                #content-block-background-<?php echo $unique_id; ?> { background-image: url(<?php echo $bg_image; ?>); background-position: <?php echo $bg_position; ?>; background-repeat: <?php echo $bg_repeat; ?>; background-color: <?php echo $bg_color; ?>; background-attachment: <?php echo $bg_fixed; ?>; }
                #content-block-body-<?php echo $unique_id; ?> { padding: <?php echo $content_padding; ?>; color: <?php echo $font_color; ?>; }
                .content-block-body { margin-left: auto; margin-right: auto; position: relative; }
            </style>
<?php       if( $max_bg_width == "yes" ) : ?>
                <style type="text/css">
                    #wrapper-1 { overflow-x: hidden; }
                    #content-block-background-<?php echo $unique_id; ?> { margin: 0 -10000px; padding: 0 10000px; }
                </style>
<?php       endif; ?>

<?php       if( $parallax_scroll == "yes" ) : ?>
                <script type="text/javascript">
                    // <![CDATA[
                    jQuery(document).ready(function($){
                        if( ! $("body").hasClass( "mobile-detected" ) ){
                            $("#content-block-background-"+<?php echo $unique_id; ?>).each(function(){
                                var $bgobj = $(this); // assigning the object
                                var xPos = '<?php echo $bg_pos_X; ?>'; // x bg position value from the user shortcode
                                $(window).scroll(function() {
                                    var yPos = -($(window).scrollTop() / 3);
                                    // Put together our final background position
                                    var coords = xPos+' '+yPos+'px';
                                    // Move the background
                                    $bgobj.css({ backgroundPosition: coords });
                                });
                            });
                        }
                    });
                    // ]]>
                </script>
<?php       endif; ?>

            <div class="clear"></div>
            <div id="content-block-background-<?php echo $unique_id; ?>" class="content-block-background <?php echo $class; ?>">
                <div id="content-block-body-<?php echo $unique_id; ?>" class="content-block-body">
                    <div class="clear"></div>
                    <?php echo do_shortcode($content); ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
<?php
    return ob_get_clean();
}
add_shortcode('content_block', 'content_block_func');

/***************** END SHORTCODES ******************/



/**
 * Checks whether a dynamic sidebar exists
 *
 * @param string $sidebar_name, sidebar name
 * @return bool True, if sidebar exists. False otherwise.
 */
function sidebar_exist( $sidebar_name ) {
    global $wp_registered_sidebars;
    foreach ( (array) $wp_registered_sidebars as $index => $sidebar ) {
	if ( in_array($sidebar_name, $sidebar) )
	    return true;
    }
    return false;
}

/**
 * Checks whether a dynamic sidebar exists and if is active (has any widgets)
 *
 * @param string $sidebar_name, sidebar name
 * @return bool True, if exists and active (using widgets). False otherwise.
 */
function sidebar_exist_and_active( $sidebar_name ) {
    global $wp_registered_sidebars;
    foreach ( (array) $wp_registered_sidebars as $index => $sidebar ) {
	if ( in_array($sidebar_name, $sidebar) ) {
	    return is_active_sidebar( $sidebar['id'] );
	}
    }
    return false;
}

/* Widget Settings */

function recent_comment_author_link( $return ) {
	return str_replace( $return, "<span></span>$return", $return );
}
add_filter('get_comment_author_link', 'recent_comment_author_link');

function filter_widget( $params ) {
    switch( _get_widget_id_base($params[0]['widget_id']) ) {
	case 'recent-posts':
	case 'categories':
	case 'archives':
	case 'pages':
	case 'links':
	case 'meta':
	case 'custom-category-widget': // U-Design: Custom Category
	case 'loginform-widget': // U-Design: Login Form
	case 'subpages-widget': // U-Design: Subpages
	case 'nav_menu': // WP 3 widget menu support
	      $params[0]['before_widget'] = str_replace( 'substitute_widget_class', 'custom-formatting', $params[0]['before_widget'] ); // add the 'custom-formatting' class
	      return $params;
	      break;
	case 'rss':
	      $params[0]['before_widget'] = str_replace( 'substitute_widget_class', 'custom-rss-formatting', $params[0]['before_widget'] ); // add the 'custom-formatting' class
	      return $params;
	      break;
	default:
	      //var_dump( _get_widget_id_base($params[0]['widget_id']) );
	      //var_dump( $params );
	      return $params;
    }
}
add_filter('dynamic_sidebar_params','filter_widget');

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Pages Sidebar',
		'description' => esc_html__('A widget area, used as a sidebar for regular pages.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PortfolioSidebar',
		'description' => esc_html__('A widget area, used as a sidebar for the Portfolio section.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'BlogSidebar',
		'description' => esc_html__('A widget area, used as a sidebar for the Blog/News section.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'ContactSidebar',
		'description' => esc_html__('A widget area, used as a sidebar for the Contact page.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'SitemapSidebar',
		'description' => esc_html__('A widget area, used as a sidebar for the Sitemap page.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	// Front Page Before Content Widget Area
	register_sidebar(array(
		'name' => esc_html__('Home Page Before Content', 'udesign'),
		'id' => 'home-page-before-content',
		'description' => esc_html__('A widget area positioned just above the Home Page Main Content area.', 'udesign'),
		'before_widget' => '<div class="cont_col_1 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="before_cont_title">',
		'after_title' => '</h3>',
	));

	// Front Page Content Widget Areas
	register_sidebar(array(
		'name' => esc_html__('Home Page Column 1', 'udesign'),
		'id' => 'home-page-column-1',
		'description' => esc_html__('A widget area, used as the 1st column in the Main Content area.', 'udesign'),
		'before_widget' => '<div class="cont_col_1 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="cont_col_1_title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => esc_html__('Home Page Column 2', 'udesign'),
		'id' => 'home-page-column-2',
		'description' => esc_html__('A widget area, used as the 2nd column in the Main Content area.', 'udesign'),
		'before_widget' => '<div class="cont_col_2 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="cont_col_2_title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => esc_html__('Home Page Column 3', 'udesign'),
		'id' => 'home-page-column-3',
		'description' => esc_html__('A widget area, used as the 3rd column in the Main Content area.', 'udesign'),
		'before_widget' => '<div class="cont_col_3 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="cont_col_3_title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => esc_html__('Home Page Column 4', 'udesign'),
		'id' => 'home-page-column-4',
		'description' => esc_html__('A widget area, used as the 4th column in the Main Content area.', 'udesign'),
		'before_widget' => '<div class="cont_col_4 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="cont_col_4_title">',
		'after_title' => '</h3>',
	));

	// Front Page After Content Row 1 Widget Area
	register_sidebar(array(
		'name' => esc_html__('Home Page After Content Row 1', 'udesign'),
		'id' => 'home-page-after-content-row-1',
		'description' => esc_html__('A widget area positioned just below the Home Page Main Content area.', 'udesign'),
		'before_widget' => '<div class="after_cont_row_1 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="after_cont_row_1_title">',
		'after_title' => '</h3>',
	));

	// Front Page After Content Row 2 Widget Area
	register_sidebar(array(
		'name' => esc_html__('Home Page After Content Row 2', 'udesign'),
		'id' => 'home-page-after-content-row-2',
		'description' => esc_html__('A widget area positioned just above the Bottom Widget area.', 'udesign'),
		'before_widget' => '<div class="after_cont_row_2 %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="after_cont_row_2_title">',
		'after_title' => '</h3>',
	));

	// Bottom Widget Areas
	register_sidebar(array(
		'name' => esc_html__('Bottom 1', 'udesign'),
		'id' => 'bottom-widget-area-1',
		'description' => esc_html__('A widget area, used as the 1st column in the Bottom area (just above the footer).', 'udesign'),
		'before_widget' => '<div class="bottom-col-content %2$s substitute_widget_class">',
		'before_title' => '<h3 class="bottom-col-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>',
	));

	register_sidebar(array(
		'name' => esc_html__('Bottom 2', 'udesign'),
		'id' => 'bottom-widget-area-2',
		'description' => esc_html__('A widget area, used as the 2nd column in the Bottom area (just above the footer).', 'udesign'),
		'before_widget' => '<div class="bottom-col-content %2$s substitute_widget_class">',
		'before_title' => '<h3 class="bottom-col-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>',
	));

	register_sidebar(array(
		'name' => esc_html__('Bottom 3', 'udesign'),
		'id' => 'bottom-widget-area-3',
		'description' => esc_html__('A widget area, used as the 3rd column in the Bottom area (just above the footer).', 'udesign'),
		'before_widget' => '<div class="bottom-col-content %2$s substitute_widget_class">',
		'before_title' => '<h3 class="bottom-col-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>',
	));

	register_sidebar(array(
                'name' => esc_html__('Bottom 4', 'udesign'),
                'id' => 'bottom-widget-area-4',
                'description' => esc_html__('A widget area, used as the 4th column in the Bottom area (just above the footer).', 'udesign'),
                'before_widget' => '<div class="bottom-col-content %2$s substitute_widget_class">',
                'before_title' => '<h3 class="bottom-col-title">',
                'after_title' => '</h3>',
                'after_widget' => '</div>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar2',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 2.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar3',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 3.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar4',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 4.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar5',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 5.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar6',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 6.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar7',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 7.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'PagesSidebar8',
		'description' => esc_html__('A widget area, used as a sidebar for the Page Template 8.', 'udesign'),
		'before_widget' => '<div id="%1$s" class="widget %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

	// Top Area Social Media Widget Area
	register_sidebar(array(
		'name' => esc_html__('Top Area Social Media', 'udesign'),
		'id' => 'top-area-social-media',
		'description' => esc_html__('A widget area positioned in the top right corner of the site designated for social media links and icons.', 'udesign'),
		'before_widget' => '<div class="social_media_top %2$s substitute_widget_class">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="social_media_title">',
		'after_title' => '</h3>',
	));

}


/* Custom widgets... */
include ('widgets/loginForm-widget.php');
include ('widgets/customCategory-widget.php');
include ('widgets/googleMap-widget.php');
include ('widgets/latestPost-widget.php');
include ('widgets/subpages-widget.php');

// Return the column (widget area) HTML
function get_dynamic_column( $id = '', $class = '', $widget_area = '' ) {
    $html = "<div id='{$id}' class='{$class}'><div class='column-content-wrapper'>".udesign_get_dynamic_sidebar( $widget_area )."</div></div><!-- end {$id} -->";
    $html = apply_filters( 'udesign_get_dynamic_column', $html, $id, $class, $widget_area );
    return $html;
}
// Currently there is no available function to return the contents of a dynamic sidebar. Therefore use this one:
function udesign_get_dynamic_sidebar($index = '') {
	$sidebar_contents = "";
	ob_start();
        if ( function_exists('dynamic_sidebar') && dynamic_sidebar( $index ) )
	$sidebar_contents = ob_get_clean();
	return $sidebar_contents;
}


/* Load the U-Design Options Page */
include( 'udesign_options_page.php' );

// U-Design Schema.org Stuff
if ( $udesign_options['enable_udesign_schema_tags'] == 'yes' ) {
    include( 'lib/structured-data/schema/u-design-schema.php' );
}

// Remove meta name="generator" content="WordPress" from the <head>
remove_action('wp_head', 'wp_generator');

// Add support for "Featured image"
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

// Filter the "Featured Image" with this theme's custom image frame with alignment. Can be enabled from the theme's "Blog Section".
if ( $udesign_options['enable_custom_featured_image'] == 'yes' ) {
    function udesign_post_image_html( $html, $post_id, $post_image_id ) {
        $html = preg_replace('/title=\"(.*?)\"/', '', $html);
        preg_match( '/aligncenter|alignleft|alignright/', $html, $matches );
        $image_alignment = $matches[0];
        $html = preg_replace('/aligncenter|alignleft|alignright/', 'alignnone', $html);
        $html = '<div class="custom-frame-wrapper '.$image_alignment.'"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a></div></div></div>';
        if( $image_alignment == 'aligncenter' ) $html = '<div style="text-align:center;">'.$html.'</div>';
        return $html;
    }
    add_filter( 'post_thumbnail_html', 'udesign_post_image_html', 10, 3 );
}
// This function is used in processing images (cutting, cropping, zoom)
if ( !function_exists('udesign_process_image') ) {
    function udesign_process_image( $img_source, $img_width, $img_height, $crop = true, $align = '', $retina = false ) {
	global $udesign_options;
        require_once('scripts/image-resizer.php');
        if ( $udesign_options['udesign_disable_img_cropping'] != 'yes' ) {
            switch ( $retina ) {
                case 'yes': // consider 'portfolio_item_thumb_retina' custom field option
                    $udesign_enable_retina_images = true;
                    break;
                case 'no': // consider 'portfolio_item_thumb_retina' custom field option
                    $udesign_enable_retina_images = false;
                    break;
                default: // if no match with above cases fall back on the gloabal setting for retina images
                    $udesign_enable_retina_images = ( $udesign_options['udesign_enable_retina_images'] == 'yes' ) ? true: false;
            }
            $img_source = mr_image_resize( $img_source, $img_width, $img_height, $crop, $align, $udesign_enable_retina_images );
        }
        return $img_source;
    }
}
/**
 * Customize image dimension and apply custom image frame with alignment
 * @param int $post_id Post ID.
 * @param string $img_src Image URL.
 * @param string $width Image width.
 * @param string $height Image height.
 * @param string $image_alignment Image alignment in the form of 'alignleft', 'aligncenter', 'alignright'
 * @param bool $linked Set to 'true' if the image should link to the post or 'false' otherwise
 * @return string HTML formatted image linking (optional) to the Post with $post_id
 */
function customized_featured_image( $post_id, $img_src, $width, $height, $image_alignment = 'alignleft', $linked = true ) {
    $the_image_html = '<img src="'.udesign_process_image( $img_src, $width, $height, true, '', false ).'" width="'.$width.'" height="'.$height.'" alt="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '" />';
    if ( $linked ) $the_image_html = '<a href="'.get_permalink( $post_id ).'" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">'.$the_image_html.'</a>';
    $html = '<div class="custom-frame-wrapper '.$image_alignment.'"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding">'.$the_image_html.'</div></div></div>';
    if( $image_alignment == 'aligncenter' ) $html = '<div style="text-align:center;">'.$html.'</div>';
    return $html;
}
/**
 * Display the post image linked (optional) to the post
 * @param int $post_id Post ID.
 * @param bool $linked Set to 'true' if the image should link to the post or 'false' otherwise
 * @return string HTML formatted post image linking (optional) to the Post with $post_id
 */
function display_post_image_fn( $post_id, $linked = true) {
    global $udesign_options;
    $post_image_url = get_post_meta($post_id, 'post_image', true); // Grab the preview image from the custom field 'post_image', if set.
    if ( !$post_image_url && has_post_thumbnail( $post_id ) ) {
        $tmp_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
        $post_image_url = $tmp_image[0];
    }
    if ( $post_image_url ) :
        if ( $udesign_options['enable_custom_featured_image'] == 'yes' ) :
            // Customize the dimension and alignment of the 'Featured Image' ...
            if( ( $udesign_options['force_image_dimention'] == 'yes' ) && ( $udesign_options['udesign_disable_img_cropping'] != 'yes' )  ) :
                //... by a function defined in 'function.php' specifically for this theme using TimThumb
                echo customized_featured_image( $post_id, $post_image_url, $udesign_options['featured_image_width'], $udesign_options['featured_image_height'], $udesign_options['featured_image_alignment'], $linked );
            else :
                //... by the default WP 'the_post_thumbnail()' function which doesn't stretch images if they are smaller
                echo the_post_thumbnail( array($udesign_options['featured_image_width'], $udesign_options['featured_image_height']), array('class' => $udesign_options['featured_image_alignment']) );
            endif;
        else : ?>
            <div class="post-image-holder pngfix">
                <div class="post-image">
                    <span class="post-hover-image pngfix"> </span>
<?php               if ( $linked ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class="hover-opacity" src="<?php echo udesign_process_image( $post_image_url, 570, 172, true, '', false ); ?>" alt="<?php the_title_attribute(); ?>" /></a>
<?php               else : ?>
                        <img class="hover-opacity" src="<?php echo udesign_process_image( $post_image_url, 570, 172, true, '', false ); ?>" alt="<?php the_title_attribute(); ?>" />
<?php               endif; ?>
                </div>
            </div>
<?php   endif;
    endif;
}

/* Load breadcrumbs script */
if ($udesign_options['show_breadcrumbs'] == 'yes')
    include( 'scripts/breadcrumbs.php' );

/* Load Portfolio Related Function */
require_once( get_template_directory() . '/scripts/portfolio-item-thumbnail.php' );

/* Admin area only*/
if ( is_admin() && current_user_can( 'install_themes' ) ) {
    // Load Theme Notifier
    if ( !$udesign_options['disable_the_theme_update_notifier'] == 'yes' ) {
        require_once( get_template_directory() . '/scripts/notifier/update-notifier.php' );
    }
    // Load the script to register required plugins for U-Design
    require_once( get_template_directory() . '/lib/plugin-activation/register-required-plugins.php' );
}

/* Detect Colour Brightness */
function udesign_get_color_brightness($hexStr) {
    // Gets a proper hex string
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr);
    $rgbArray = array();
    //If a proper hex code, convert using bitwise operation. No overhead... faster
    if (strlen($hexStr) == 6) {
            $colorVal = hexdec($hexStr);
            $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
            $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
            $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
            $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else { //Invalid hex color code
            return false;
    }
    return (($rgbArray['red']*299) + ($rgbArray['green']*587) + ($rgbArray['blue']*114))/1000;
}

if ( $udesign_options['custom_colors_switch'] == 'enable' ) {

    // Add specific CSS class by filter
    function determine_class_names($classes) {
            global $udesign_options;
            // add 'top-bg-color-dark' or 'main-content-bg-dark' to the $classes array
            $classes[] = ( udesign_get_color_brightness("#{$udesign_options['top_bg_color']}") > 200 ) ? '' : 'top-bg-color-dark';
            $classes[] = ( udesign_get_color_brightness("#{$udesign_options['main_content_bg']}") > 220 ) ? '' : 'main-content-bg-dark';
            // return the $classes array
            return $classes;
    }
    add_filter('body_class','determine_class_names');

}

// handle rel="wp-prettyPhoto" in links for the prettyPhoto integrated script (if enabled)
if ( $udesign_options['enable_prettyPhoto_script'] == 'yes') {
    /**
     * Insert rel="wp-prettyPhoto" to all links for images, movie, YouTube and iFrame.
     * This function will ignore links where you have manually entered your own rel reference.
     * @param string $content Post/page contents
     * @return string Prettified post/page contents
     * @link http://0xtc.com/2008/05/27/auto-lightbox-function.xhtml
     * @access public
      */
    function autoinsert_rel_prettyPhoto ($content) {
        global $post;
        $rel = 'wp-prettyPhoto';
        $image_match = '\.bmp|\.gif|\.jpg|\.jpeg|\.png';
        $movie_match = '\.mov.*?';
        $swf_match = '\.swf.*?';
        $youtube_match = 'http:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9]*';
        $iframe_match = '.*iframe=true.*';
        $pattern[0] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(".$image_match."|".$movie_match."|".$swf_match."|".$youtube_match."|".$iframe_match.")('|\")([^\>]*?)>/i";
        $pattern[1] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(".$image_match."|".$movie_match."|".$swf_match."|".$youtube_match."|".$iframe_match.")('|\")(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
        $replacement[0] = '<a$1href=$2$3$4$5$6 rel="'.$rel.'['.$post->ID.']">';
        $replacement[1] = '<a$1href=$2$3$4$5$6$7>';
        $content = preg_replace($pattern, $replacement, $content);
        return $content;
    }
    add_filter('the_content', 'autoinsert_rel_prettyPhoto');
    add_filter('the_excerpt', 'autoinsert_rel_prettyPhoto');


    // Add the 'wp-prettyPhoto' rel attribute to the default WP gallery links
    function gallery_prettyPhoto ($content) {
        // don't modify images on "Attachment" pages so that the next_image_link() and previous_image_link() work properly
        if( is_attachment() ) {
            return $content;
        } else {
            return str_replace("<a", "<a rel='wp-prettyPhoto[gallery]'", $content);
        }
    }
    add_filter( 'wp_get_attachment_link', 'gallery_prettyPhoto');
}

/*
 * Plugin Name: Shortcode Empty Paragraph Fix
 * Plugin URI: http://www.johannheyne.de/wordpress/shortcode-empty-paragraph-fix/
 * Description: Fix issues when shortcodes are embedded in a block of content that is filtered by wpautop.
 * Author URI: http://www.johannheyne.de
 * Version: 0.1
 * Put this in /wp-content/plugins/ of your Wordpress installation
 */
function shortcode_paragraph_insertion_fix($content) {

    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);

    return $content;
}
//add_filter('the_content', 'shortcode_paragraph_insertion_fix');

// format "<!--more-->" tag for u-design
function udesign_more_link( $more_link, $more_link_text ) {
        global $post;
        $more_arrow = ( is_rtl() ) ? '&larr;' : '&rarr;';
        $html = ' <a title="'.$more_link_text.'" href="'.get_permalink().'#more-'.$post->ID.'" class="read-more-align-left"><span>'.$more_link_text.'</span> '.$more_arrow.'</a>';
        $html .= '<div class="clear"></div>';
        return $html;
}
add_filter('the_content_more_link', 'udesign_more_link', 10, 2);

// Capture the output of "the_author_posts_link()" function into a local variable and return it.
// This function must be used within 'The Loop'
if ( !function_exists('udesign_get_the_author_page_link') ) {
    function udesign_get_the_author_page_link() {
        ob_start();
        the_author_posts_link();
        return ob_get_clean();
    }
}

if ( function_exists('icl_get_default_language') && !function_exists('udesign_wpml_replace_category_id') ) {
    /**
     * Replaces the the id given with corresponding one for the current language
     * @global WPML $sitepress
     * @param &int $id
     * @return void
     */
    function udesign_wpml_replace_category_id(&$id) {
	global $sitepress;
	$deflang = $sitepress->get_default_language();
	if(ICL_LANGUAGE_CODE == $deflang) return;
        $cat = get_category($id);
	$id = $cat->term_id;
    }
}


/***** BEGIN: Page Title Business *****/
if ( !function_exists('udesign_page_title') ) {
    function udesign_page_title() {
        global $udesign_options;
        udesign_page_title_before(); // call to 'udesign_page_title_before' hook

        ob_start();

            if ( $udesign_options['page_title_position'] == 'position1' || $udesign_options['page_title_position'] == 'remove1' ) : ?>
                <div id="page-content-title">
                    <div id="page-content-header" class="container_24">
<?php       endif; ?>
                        <div id="page-title">
<?php                       udesign_page_title_top(); ?>
<?php                       if (is_page()) : ?>
                                <h1 class="pagetitle"><?php the_title(); ?></h1>
<?php                       elseif ( is_single() ) : ?>
                                <h1 class="single-pagetitle"><?php the_title(); ?></h1>
<?php                       elseif ( is_post_type_archive() ) : ?>
                                <h1 class="post-type-archive-pagetitle"><?php post_type_archive_title(); ?></h1>
<?php                       elseif (is_tax()) : /* If this is a taxonomy archive */
                                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>
                                <h1 class="taxonomy-pagetitle"><?php echo ucwords( $term->name); ?></h1>
<?php                       elseif (is_category()) : /* If this is a category archive */ ?>
<?php                           if ($udesign_options['show_archive_for_string'] == 'yes') : ?>
                                    <h1 class="category-pagetitle"><?php single_cat_title("", true); ?></h1>
<?php                           else : ?>
                                    <h1 class="category-pagetitle"><?php printf( __('Archive for the <em>%s</em> Category', 'udesign' ), single_cat_title("", false) ); ?></h1>
<?php                           endif; ?>
<?php                       elseif (is_search()) : /* If this is a search results page */ ?>
                                <h1 class="search-pagetitle"><?php printf( __('Search Results for <em>%s</em>', 'udesign' ), get_search_query() ); ?></h1>
<?php                       elseif (is_404()) : /* If this is a 404 page */ ?>
                                <h1 class="404-pagetitle"><?php esc_html_e('Page Not Found (Error 404)', 'udesign'); ?></h1>
<?php                       elseif( is_tag() ) : /* If this is a tag archive */ ?>
                                <h1 class="tag-pagetitle"><?php printf( __('Posts Tagged <em>%s</em>', 'udesign' ), single_tag_title("", false) ); ?></h1>
<?php                       elseif (is_day()) : /* If this is a daily archive */ ?>
                                <h1 class="daily-archive-pagetitle"><?php printf( __('Archive for %s', 'udesign' ), get_the_date() ); ?></h1>
<?php                       elseif (is_month()) : /* If this is a monthly archive */ ?>
                                <h1 class="monthly-archive-pagetitle"><?php printf( __('Archive for %s', 'udesign' ), get_the_time('F Y') ); ?></h1>
<?php                       elseif (is_year()) : /* If this is a yearly archive */ ?>
                                <h1 class="yearly-archive-pagetitle"><?php printf( __('Archive for %s', 'udesign' ), get_the_time('Y') ); ?></h1>
<?php                       elseif (is_author()) : /* If this is an author archive */ ?>
                                <h1 class="author-pagetitle"><?php esc_html_e('Author Archive', 'udesign'); ?></h1>
<?php                       elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : /* If this is a paged archive */ ?>
                                <h1 class="paged-archive-pagetitle"><?php esc_html_e('Blog Archives', 'udesign'); ?></h1>
<?php                       elseif (  function_exists('bp_current_component') && ( bp_current_component() ) ) : ?>
                                <h1 class="buddy-press-pagetitle"><?php the_title(); ?></h1>
<?php                       else : // the case when a Title is NOT present the height should be maintained ?>
                                <div class="no-title-present"></div>
<?php                       endif; ?>
<?php                       udesign_page_title_bottom(); ?>
                        </div>
                        <!-- end page-title -->
<?php       if ( $udesign_options['page_title_position'] == 'position1' || $udesign_options['page_title_position'] == 'remove1' ) : ?>
                    </div>
                    <!-- end page-content-header -->
                </div>
                <!-- end page-content-title -->
                <div class="clear"></div>
<?php       endif;

        // get the Output Buffer
        $udesign_page_title_html = ob_get_clean();
        echo apply_filters( 'udesign_get_page_title', $udesign_page_title_html );

        udesign_page_title_after(); // call to 'udesign_page_title_after' hook
    }
}

function udesign_add_no_title_section_class($classes) {
    $classes[] = 'no_title_section';
    return $classes;
}
// Assign page title position or removal method
switch ( $udesign_options['page_title_position'] ) {
    case 'position1': // Position Title immediately under the Main Menu
        add_action('udesign_page_content_before', 'udesign_page_title');
        break;
    case 'position2': // Position Title Inside Main Content
        add_filter('body_class','udesign_add_no_title_section_class');
        function udesign_test_home_page ( $is_front_page ) {
            // If title "Position 2" is selected, remove the title from pages that are set as home pages
            if ( !$is_front_page ) {
                return udesign_page_title();
            }
        }
        add_action('udesign_main_content_top', 'udesign_test_home_page');
        break;
    case 'remove1': // Remove Title (SEO-Friendly)
        add_filter('body_class','udesign_add_no_title_section_class');
        add_action('udesign_page_content_before', 'udesign_page_title');
        break;
    default: // Remove Title Completely
        add_filter('body_class','udesign_add_no_title_section_class');
}
// Add Page/Post title description
function udesign_add_title_description( $udesign_page_title_html ) {
    global $post;
    $udesign_title_description = get_post_meta($post->ID, 'udesign_title_description', true);
    if ( $udesign_title_description ) {
        $pattern = '/' . preg_quote('</h1>', '/') . '/';
        $replacement = '<span class="title-description">'.$udesign_title_description.'</span></h1>';
        $udesign_page_title_html = preg_replace( $pattern, $replacement, $udesign_page_title_html );
    }
    return $udesign_page_title_html;
}
add_filter('udesign_get_page_title', 'udesign_add_title_description');
/***** END: Page Title Business *****/


// Exclude Portfolio Categories from Blog and Archive pages if enabled
if ( !is_admin() && $udesign_options['exclude_portfolio_from_blog'] == 'yes' ) {
    $portfolio_cats_array = explode(',', $udesign_options['portfolio_categories']);
    function add_minus_prefix_fn( $var ) { return( '-' . $var);}
    $portfolio_cats_with_minus = implode(',', array_map( "add_minus_prefix_fn", $portfolio_cats_array ));

    function udesign_exclude_category( $query ) {
        global $portfolio_cats_with_minus;
        if ( ( $query->is_category() || $query->is_day() || $query->is_month() || $query->is_year() ) && $query->is_main_query() ) {
            $query->set( 'cat', $portfolio_cats_with_minus );
        }
    }
    add_action( 'pre_get_posts', 'udesign_exclude_category' );
}

// Define theme's DOCTYPE and use the 'udesign_html_before' hook to insert it before <html> tag
function udesign_doctype_declaration() {
   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\r\n";
}
add_action('udesign_html_before', 'udesign_doctype_declaration');


// Setup the Feedback button, if enabled...
if ( $udesign_options['enable_feedback'] ) {
    function udesign_feedback_button() {
        global $udesign_options;
        ob_start(); ?>
            <div id="feedback"><a href="<?php echo $udesign_options['feedback_url']; ?>" title="<?php esc_attr_e('Feedback', 'udesign'); ?>" class="feedback"></a></div>
<?php
        $feedback_button_html = ob_get_clean();
        echo apply_filters( 'udesign_get_feedback_button', $feedback_button_html );
    }
    add_action('udesign_body_top', 'udesign_feedback_button', 9);
}


// Setup the Page Peel, if enabled...
if ( $udesign_options['enable_page_peel'] ) {
    function udesign_enable_page_peel() {
        global $udesign_options;
        ob_start(); ?>
            <div id="page-peel">
                    <a href="<?php echo $udesign_options['page_peel_url']; ?>" title="<?php esc_attr_e('Subscribe', 'udesign'); ?>"><img src="<?php bloginfo('template_directory'); ?>/styles/style1/images/page_peel.png" alt="<?php esc_attr_e('Subscribe', 'udesign'); ?>" /></a>
                    <div class="msg_block"></div>
            </div>
<?php
        $page_peel_html = ob_get_clean();
        echo apply_filters( 'udesign_get_page_peel', $page_peel_html );
    }
    add_action('udesign_body_top', 'udesign_enable_page_peel', 9);
}


// Setup the logo
function udesign_top_elements_logo( $is_front_page ) {
    ob_start(); ?>
                    <div id="logo" class="grid_14">
<?php                   if( $is_front_page ) : ?>
                            <h1><a title="<?php bloginfo('name'); ?>" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php                   else : ?>
                            <div class="site-name"><a title="<?php bloginfo('name'); ?>" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
<?php                   endif; ?>
                    </div>
<?php
    $logo_html = ob_get_clean();
    echo apply_filters( 'udesign_get_logo', $logo_html, $is_front_page );
}
add_action('udesign_top_elements_inside', 'udesign_top_elements_logo', 9);


// Setup the slogan/tagline
if( get_bloginfo('description') ) { // display only if not empty
    function udesign_top_elements_slogan() {
        ob_start(); ?>
                        <div id="slogan" class="grid_17"><?php bloginfo('description'); ?></div>
                        <!-- end logo slogan -->
<?php
        $slogan_html = ob_get_clean();
        echo apply_filters( 'udesign_get_slogan', $slogan_html );
    }
add_action('udesign_top_elements_inside', 'udesign_top_elements_slogan', 9);
}


// Setup the phone number in the top section of the theme, if enabled
if ( $udesign_options['top_page_phone_number'] ) {
    function udesign_top_elements_phone_number() {
        global $udesign_options;
        ob_start(); ?>
                    <div class="phone-number grid_7 prefix_17">
                        <div class="phone-number-padding">
<?php                       echo do_shortcode( $udesign_options["top_page_phone_number"] ); ?>
                        </div><!-- end phone-number-padding -->
                    </div><!-- end phone-number -->
<?php   $phone_number_html = ob_get_clean();
        echo apply_filters( 'udesign_get_phone_number', $phone_number_html );
    }
    add_action('udesign_top_elements_inside', 'udesign_top_elements_phone_number', 9);
}


// Setup the searchbox in the top section of the theme, if enabled
if ( $udesign_options['enable_search'] ) {
    function udesign_top_elements_searchbox() {
        ob_start(); ?>
                    <div id="search" class="grid_6 prefix_18">
                        <form action="<?php bloginfo('url'); ?>/" method="get">
                            <div class="search_box">
                                <input id="search_field" name="s" type="text" class="inputbox_focus blur pngfix" value="<?php esc_attr_e('Search...', 'udesign'); ?>" />
                                <input type="submit"  value="" class="search-btn pngfix" />
                            </div>
                        </form>
                    </div><!-- end search -->
<?php   $searchbox_html = ob_get_clean();
        echo apply_filters( 'udesign_get_top_area_searchbox', $searchbox_html );
    }
    add_action('udesign_top_elements_inside', 'udesign_top_elements_searchbox', 9);
}


// Setup the "Top Area Social Media" widget area
if ( sidebar_exist_and_active('top-area-social-media') ) { // hide this area if no widgets are active...
    function udesign_top_area_social_media() {
        ob_start(); ?>
                    <div class="social-media-area grid_9 prefix_15">
<?php                   echo udesign_get_dynamic_sidebar( 'top-area-social-media' ); ?>
                    </div><!-- end social-media-area -->
<?php   $top_area_social_media_html = ob_get_clean();
        echo apply_filters( 'udesign_get_top_area_social_media', $top_area_social_media_html );
    }
    add_action('udesign_top_elements_inside', 'udesign_top_area_social_media', 9);
}


// Setup the main menu
function udesign_top_main_menu() {
    ob_start(); ?>
            <div class="clear"></div>
            <div id="main-menu" class="pngfix">
                <div id="dropdown-holder" class="container_24">
<?php               udesign_nav(); // this function calls the main menu ?>
                </div>
                <!-- end dropdown-holder -->
            </div>
            <!-- end top-main-menu -->
<?php
    $main_menu_html = ob_get_clean();
    echo apply_filters( 'udesign_get_top_main_menu', $main_menu_html );
}
add_action('udesign_top_wrapper_bottom', 'udesign_top_main_menu', 10);


// Setup the "Stay-On-Top" alias to offset page height during scrolling
function udesign_sticky_menu_alias() {
    global $udesign_options;
    if ( $udesign_options['fixed_main_menu'] ) : ?>
        <div id="sticky-menu-alias"></div>
	<div class="clear"></div> <?php
    endif;
}
add_action('udesign_top_wrapper_after', 'udesign_sticky_menu_alias', 9);

//  Modify the Document's Title Element to be compatible with the 'WordPress SEO' plugin for easy overwrites
if ( class_exists('WPSEO_Frontend') ) {
    function modify_head_title_for_wp_seo_plugin(){
        return '<title>' . wp_title( '&laquo;', false ) . '</title>';
    }
    add_filter( 'udesign_head_title_element', 'modify_head_title_for_wp_seo_plugin');
}

// Insert the Breadcrumbs
function udesign_display_breadcrumbs() {
    global $udesign_options;
    if ( $udesign_options['show_breadcrumbs'] == 'yes' ) {
        $wrap_before = '<div id="breadcrumbs-container" class="container_24">';
        // get Yoast breadcrumbs if requested
        if ( function_exists('yoast_breadcrumb') ) {
            $the_breadcrumbs = yoast_breadcrumb('<p class="yoast breadcrumbs">','</p>', false);
            $the_breadcrumbs = preg_replace( '/â†’|&rarr;/', '<span class="breadarrow"> &rarr; </span>', $the_breadcrumbs );
            $the_breadcrumbs = preg_replace( '/â†�|&larr;/', '<span class="breadarrow"> &larr; </span>', $the_breadcrumbs );
        } else { // get theme's default breadcrumbs
            ob_start();
            $breadcrumbs_go = new simple_breadcrumb;
            $the_breadcrumbs = ob_get_contents();
            ob_end_clean();
        }
        $wrap_after .= '</div>';
        $html = $wrap_before . $the_breadcrumbs . $wrap_after;
    } else {
        $html = '<div class="no-breadcrumbs-padding"></div>';
    }
    $html = apply_filters( 'udesign_get_breadcrumbs', $html, $wrap_before, $the_breadcrumbs, $wrap_after );
    echo $html;
}
add_action('udesign_page_content_top', 'udesign_display_breadcrumbs');

// Insert edit link into pages
function udesign_page_edit_link() {
    if ( is_page() ) {
        echo edit_post_link( esc_html__('Edit this page', 'udesign'), '<p class="edit-link">', '</p>' );
    }
}
add_action('udesign_main_content_bottom', 'udesign_page_edit_link');

// Insert page-links for paginated posts (i.e. when the <!--nextpage--> Quicktag is used)
function udesign_nextpage_links() {
    wp_link_pages( array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number') );
}
add_action('udesign_entry_bottom', 'udesign_nextpage_links');


// Insert post title into blog and archive pages' posts
function udesign_blog_section_post_title() {
    echo '<h2><a href="'.get_permalink().'" rel="bookmark" title="'.the_title_attribute('echo=0').'">'.get_the_title().'</a></h2>';
}
add_action('udesign_blog_post_top_area_inside', 'udesign_blog_section_post_title', 9);


// Insert postmetadata block into Blog and Archive pages' posts
function udesign_blog_section_postmetadata() {
    global $udesign_options;
    ob_start(); ?>
                                <div class="postmetadata">
                                    <span>
<?php                                   if( $udesign_options['show_postmetadata_author'] == 'yes' ) :
                                            printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.udesign_get_the_author_page_link().'<span>', get_the_date() );
                                        else :
                                            printf( __('On %1$s ', 'udesign'), get_the_date() );
                                        endif; ?>
                                    </span> &nbsp; <span class="categories-link-divider">/ &nbsp;</span> <span class="postmetadata-categories-link"><?php the_category(', '); ?></span> &nbsp; <?php echo udesign_get_comments_link(); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div class="postmetadata-edit-link">', '</div>'); ?>
<?php                               echo ( $udesign_options['show_postmetadata_tags'] == 'yes' ) ? the_tags('<div class="post-tags-wrapper">'.__('Tags: ', 'udesign'), ', ', '</div>') : ''; ?>
                                </div><!-- end postmetadata -->
<?php
    $postmetadata_html = ob_get_clean();
    $html = apply_filters( 'udesign_get_blog_section_postmetadata', $postmetadata_html );
    echo $html;
}
add_action('udesign_blog_post_top_area_inside', 'udesign_blog_section_postmetadata', 11);


// Insert postmetadata block into Single Post
function udesign_single_postmetadata() {
    global $udesign_options;
    ob_start(); ?>
                                <div class="single-postmetadata-divider-top"><?php echo do_shortcode('[divider]'); ?></div>
                                <div class="postmetadata">
                                    <span>
<?php                                   if( $udesign_options['show_postmetadata_author'] == 'yes' ) :
                                            printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.udesign_get_the_author_page_link().'<span>', get_the_date() );
                                        else :
                                            printf( __('On %1$s ', 'udesign'), get_the_date() );
                                        endif; ?>
                                    </span> &nbsp; <span class="categories-link-divider">/ &nbsp;</span> <span class="postmetadata-categories-link"><?php the_category(', '); ?></span> &nbsp; <?php echo udesign_get_comments_link(); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div class="postmetadata-edit-link">', '</div>'); ?>
<?php                               echo ( $udesign_options['show_postmetadata_tags'] == 'yes' ) ? the_tags('<div class="post-tags-wrapper">'.__('Tags: ', 'udesign'), ', ', '</div>') : ''; ?>
                                </div>
                                <div class="single-postmetadata-divider-bottom"><?php echo do_shortcode('[divider]'); ?></div>
<?php
    $postmetadata_html = ob_get_clean();
    $html = apply_filters( 'udesign_get_udesign_single_postmetadata', $postmetadata_html );
    echo $html;
}
if( $udesign_options['udesign_single_view_postmetadata_location'] == 'aligntop' ) {
    add_action('udesign_single_post_entry_top', 'udesign_single_postmetadata');
} else {
    add_action('udesign_single_post_entry_bottom', 'udesign_single_postmetadata');
}


// Insert postmetadata block into Single Portfolio Post
function udesign_single_portfolio_postmetadata() {
    global $udesign_options;
    ob_start(); ?>

<?php                           if( $udesign_options['show_portfolio_postmetadata'] == 'yes' ) : ?>
                                    <div class="single-portfolio-postmetadata-divider-top"><?php echo do_shortcode('[divider]'); ?></div>
                                    <div class="postmetadata">
                                        <span>
<?php                                       if( $udesign_options['show_portfolio_postmetadata_author'] == 'yes' ) :
                                                printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.udesign_get_the_author_page_link().'<span>', get_the_date() );
                                            else :
                                                printf( __('On %1$s ', 'udesign'), get_the_date() );
                                            endif; ?>
                                        </span> &nbsp; <span class="categories-link-divider">/ &nbsp;</span> <span class="postmetadata-categories-link"><?php the_category(', '); ?></span> &nbsp;  <?php echo udesign_get_comments_link(); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div class="postmetadata-edit-link">', '</div>'); ?>
<?php                                   echo ( $udesign_options['show_portfolio_postmetadata_tags'] == 'yes' ) ? the_tags('<div class="portfolio-post-tags-wrapper">'.__('Tags: ', 'udesign'), ', ', '</div>') : ''; ?>
                                    </div>
<?php                           endif; ?>
                                <div class="single-portfolio-postmetadata-divider-bottom"><?php echo do_shortcode('[divider]'); ?></div>
<?php
    $postmetadata_html = ob_get_clean();
    $html = apply_filters( 'udesign_get_udesign_single_portfolio_postmetadata', $postmetadata_html );
    echo $html;
}
if( $udesign_options['udesign_single_portfolio_postmetadata_location'] == 'aligntop' ) {
    add_action('udesign_single_portfolio_entry_top', 'udesign_single_portfolio_postmetadata');
} else {
    add_action('udesign_single_portfolio_entry_bottom', 'udesign_single_portfolio_postmetadata');
}


// helper function to get the comment popup links used in the theme's postmetadata block
function  udesign_get_comments_link() {
    $comment_link_html = '';
    if ( !post_password_required() && ( comments_open() ) ) {
        ob_start(); ?>
            <span class="postmetadata-comments-link"> / &nbsp; <?php comments_popup_link(
                __( 'Leave a comment', 'udesign' ),
                __( '1 Comment', 'udesign' ),
                __( '% Comments', 'udesign' )
            ); ?></span>
<?php
        $comment_link_html = ob_get_clean();
        $comment_link_html = apply_filters( 'udesign_get_comments_popup_link', $comment_link_html );
    }
    return $comment_link_html;
}



// Setup footer's content part
function udesign_footer_content_part() {
    global $udesign_options;
    ob_start(); ?>
		    <div id="footer_text" class="grid_20">
			<div>
<?php			    echo do_shortcode( $udesign_options['copyright_message'] );
			    if( $udesign_options['show_wp_link_in_footer'] ) :
				_e(' is proudly powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a>', 'udesign');
			    endif;
			    if( $udesign_options['show_udesign_affiliate_link'] ) :
				printf( esc_html__(' | Designed with %1$sU-Design Theme%2$s', 'udesign'), '<a target="_blank" title="U-Design WordPress Premium Theme" href="http://themeforest.net/item/udesign-wordpress-theme/253220?ref='.$udesign_options['affiliate_username'].'">', '</a>' );
			    endif;
			    if( $udesign_options['show_entries_rss_in_footer'] ) : ?>
				| <a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e('Entries (RSS)', 'udesign'); ?></a>
<?php			    endif;
			    if( $udesign_options['show_comments_rss_in_footer'] ) : ?>
				| <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e('Comments (RSS)', 'udesign'); ?></a>
<?php			    endif; ?>
			</div>
		    </div>
<?php
    $footer_html = ob_get_clean();
    $html = apply_filters( 'udesign_get_footer_content_part', $footer_html );
    echo $html;
}
add_action('udesign_footer_inside', 'udesign_footer_content_part', 10);


// Setup footer's "Back to Top" link
function udesign_footer_back_to_top_link() {
    ob_start(); ?>
		    <div class="back-to-top">
			<a href="#top"><?php esc_html_e('Back to Top', 'udesign'); ?></a>
		    </div>
<?php
    $footer_back_to_top_html = ob_get_clean();
    $html = apply_filters( 'udesign_get_footer_back_to_top_link', $footer_back_to_top_html );
    echo $html;
}
add_action('udesign_footer_inside', 'udesign_footer_back_to_top_link', 10);



// "Sticky" footer stuff
if ( $udesign_options['udesign_sticky_footer'] ) {
    function udesign_sticky_footer_func() {
        ob_start(); ?>
            <div class="push"></div>
            <div class="clear"></div>

        </div><!-- end wrapper-1 -->
    <?php
        $sticky_footer_html = ob_get_clean();
        echo $sticky_footer_html;
    }
    add_action('udesign_footer_before', 'udesign_sticky_footer_func', 10);
} else {
    function udesign_insert_wrapper1_closing_div() {
        ob_start(); ?>
    </div><!-- end wrapper-1 -->
    <?php
        $wrapper1_closing_div = ob_get_clean();
        echo $wrapper1_closing_div;
    }
    add_action('wp_footer', 'udesign_insert_wrapper1_closing_div', 9);
}


// Process the "Show Action Hook Locations" option from the theme's "Advaned Options"
if( current_user_can('manage_options') && $udesign_options['show_udesign_action_hooks'] == 'yes' ) {

    // Add U-Design Action Hooks specific CSS class to body tag classes array
    function add_udesign_action_hooks_class($classes) {
            // add 'show-udesign-action-hooks' to the $classes array
            $classes[] = 'show-udesign-action-hooks';
            return $classes;
    }
    add_filter('body_class','add_udesign_action_hooks_class');
    include( 'lib/u-design-hooks/u-design-show-action-hook-locations.php' );
}


// Add revolution slider to pages
function udesign_add_slider_revolution_to_pages() {
    // Do not display the slider if the page is set as Front page
    if ( !is_front_page() && !is_search() ) {
        global $post;
        $udesign_add_slider_revolution = get_post_meta( $post->ID, 'udesign_add_slider_revolution', true );
        if ( $udesign_add_slider_revolution ) { ?>
            <div id="rev-slider-header">
                <?php //Load Revolution slider
                if ( class_exists('RevSliderFront') ) {
                    $rvslider = new RevSlider();
                    $arrSliders = $rvslider->getArrSliders();
                    if( !empty( $arrSliders ) ) {
                        echo do_shortcode( $udesign_add_slider_revolution );
                    }
                } ?>
            </div>
            <div class="clear"></div>
        <?php
        }
    }
}
// Add function to 'udesign_top_wrapper_after' hook
add_action('udesign_top_wrapper_after', 'udesign_add_slider_revolution_to_pages');



// Set the flags for Max or Custom Width particular page overwriting global width with shortcodes (used to load "fluid.css" when required)
function is_custom_width_page_func() {
    global $post;
    set_theme_mod( 'udesign_max_width_page', 'no' );
    set_theme_mod( 'udesign_custom_width_page', 'no' );
    // Max Width Page: Process custom field and set 'udesign_max_width_page' flag accordingly for a particular page
    $udesign_max_page_width = get_post_meta( $post->ID, 'udesign_max_page_width', true );
    if ( $udesign_max_page_width == 'yes' ) {
        set_theme_mod( 'udesign_max_width_page', 'yes' );
    }
    // Custom Width Page: Process custom fields and set 'udesign_custom_width_page' flag accordingly for a particular page
    $udesign_custom_page_width = get_post_meta( $post->ID, 'udesign_custom_page_width', true );
    $udesign_custom_sidebar_width = get_post_meta( $post->ID, 'udesign_custom_sidebar_width', true );
    if ( is_numeric($udesign_custom_page_width) || is_numeric($udesign_custom_sidebar_width) ) {
        set_theme_mod( 'udesign_custom_width_page', 'yes' );
    }
}
add_action('udesign_head_top', 'is_custom_width_page_func');
function custom_width_page_func() {
    if ( get_theme_mod( 'udesign_max_width_page' ) == 'yes' || get_theme_mod( 'udesign_custom_width_page' ) == 'yes' ) {
        global $post;
        $udesign_custom_page_width = get_post_meta( $post->ID, 'udesign_custom_page_width', true );
        // if the user passed invalid value in the custom field (ie. anything other than numbers or a value smaller than 960) assign it to the theme's 'global_sidebar_width' option
        if( !is_numeric($udesign_custom_page_width) ||  $udesign_custom_page_width < 960  ) {
            $udesign_custom_page_width = 960;
        }
        $udesign_custom_sidebar_width = get_post_meta( $post->ID, 'udesign_custom_sidebar_width', true );
        // if the user passed invalid value in the custom field (ie. a negative number or anything other than numbers) assign it to the theme's 'global_sidebar_width' option
        if( !is_numeric($udesign_custom_sidebar_width) || $udesign_custom_sidebar_width < 1  ) {
            $udesign_custom_sidebar_width = 33;
        }
        // calculate content width from sidebar width (in percentages)
        $udesign_custom_content_width = 100 - $udesign_custom_sidebar_width; ?>
        <style type="text/css">
            @media screen and (min-width: 960px) {
                /* Set the Container widths first */
<?php         if ( get_theme_mod( 'udesign_max_width_page' ) == 'yes' ) : ?>
                .container_24 {
                    width: 94%;
                    max-width: 94%;
                    margin-left: 3%;
                    margin-right: 3%;
                }
<?php         else : ?>
                .container_24 {
                    max-width: <?php echo $udesign_custom_page_width; ?>px;
                    width: auto;
                    margin-left: auto;
                    margin-right: auto;
                }
                @media screen and (min-width: 1000px){ #feedback { display: block; } }
                @media screen and (max-width: <?php echo ($udesign_custom_page_width + 40); ?>px) { #feedback { display: none; } }
                @media screen and (min-width: 1040px){ #page-peel { display: block; } }
                @media screen and (max-width: <?php echo ($udesign_custom_page_width + 100); ?>px) { #page-peel { display: none; } }
<?php         endif; ?>
                /* Sidebar */
                #main-content.grid_16 { width: <?php echo $udesign_custom_content_width;?>%; }
                #sidebar.grid_8 { width: <?php echo $udesign_custom_sidebar_width; ?>%; }
                #sidebar.push_8, #main-content.push_8 { left: <?php echo $udesign_custom_sidebar_width; ?>%; }
                #main-content.pull_16, #sidebar.pull_16 { right: <?php echo $udesign_custom_content_width;?>%; }
            }
        </style>
        <?php
    }
}
add_action('udesign_head_bottom', 'custom_width_page_func');



