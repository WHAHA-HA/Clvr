<?php 

/**
 * List of U-Design action hook functions
 * 
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly




/**********************( <html> hooks )*********************/

/**
 * Fire the 'udesign_html_before' action
 * Useful for <DOCTYPE>, etc.
 *
 * @uses do_action() Calls 'udesign_html_before' hook.
 */
function udesign_html_before() {
    do_action('udesign_html_before');
}



/**********************( <head> hooks )*********************/

/**
 * Fire the 'udesign_head_top' action
 *
 * @uses do_action() Calls 'udesign_head_top' hook.
 */
function udesign_head_top() {
    do_action('udesign_head_top');
}

/**
 * Fire the 'udesign_head_bottom' action
 *
 * @uses do_action() Calls 'udesign_head_bottom' hook.
 */
function udesign_head_bottom() {
    do_action('udesign_head_bottom');
}



/**********************( <body> hooks )*********************/

/**
 * Fire the 'udesign_inside_body_tag' action
 *
 * @uses do_action() Calls 'udesign_inside_body_tag' hook.
 */
function udesign_inside_body_tag() {
    do_action('udesign_inside_body_tag');
}

/**
 * Fire the 'udesign_body_top' action
 *
 * @uses do_action() Calls 'udesign_body_top' hook.
 */
function udesign_body_top() {
    do_action('udesign_body_top');
}

/**
 * Fire the 'udesign_body_bottom' action
 *
 * @uses do_action() Calls 'udesign_body_bottom' hook.
 */
function udesign_body_bottom() {
    do_action('udesign_body_bottom');
}

 

/**********************( <top-wrapper> hooks )*********************/

/**
 * Fire the 'udesign_top_wrapper_before' action
 *
 * @uses do_action() Calls 'udesign_top_wrapper_before' hook.
 */
function udesign_top_wrapper_before() {
    do_action('udesign_top_wrapper_before');
}

/**
 * Fire the 'udesign_top_wrapper_after' action.
 * Passes as an argument (boolean) whether the current page is front page or not
 * 
 * @param bool $is_front_page Based on call to is_front_page() core WordPress function
 * @uses do_action() Calls 'udesign_top_wrapper_after' hook.
 */
function udesign_top_wrapper_after( $is_front_page ) {
    do_action('udesign_top_wrapper_after', $is_front_page);
}

/**
 * Fire the 'udesign_top_wrapper_top' action
 *
 * @uses do_action() Calls 'udesign_top_wrapper_top' hook.
 */
function udesign_top_wrapper_top() {
    do_action('udesign_top_wrapper_top');
}

/**
 * Fire the 'udesign_top_wrapper_bottom' action
 * Passes as an argument (boolean) whether the current page is front page or not
 *
 * @param bool $is_front_page Based on call to is_front_page() core WordPress function
 * @uses do_action() Calls 'udesign_top_wrapper_bottom' hook.
 */
function udesign_top_wrapper_bottom( $is_front_page ) {
    do_action('udesign_top_wrapper_bottom', $is_front_page);
}
 


/**********************( <top-elements> hooks )*********************/

/**
 * Fire the 'udesign_top_elements_inside' action
 * Passes as an argument (boolean) whether the current page is front page or not
 *
 * @param bool $is_front_page Based on call to is_front_page() core WordPress function
 * @uses do_action() Calls 'udesign_top_elements_inside' hook.
 */
function udesign_top_elements_inside( $is_front_page ) {
    do_action('udesign_top_elements_inside', $is_front_page);
}

  

/**********************( front page slider hooks )*********************/

/**
 * Fire the 'udesign_front_page_slider_before' action
 *
 * @uses do_action() Calls 'udesign_front_page_slider_before' hook.
 */
function udesign_front_page_slider_before() {
    do_action('udesign_front_page_slider_before');
}

/**
 * Fire the 'udesign_front_page_slider_after' action
 *
 * @uses do_action() Calls 'udesign_front_page_slider_after' hook.
 */
function udesign_front_page_slider_after() {
    do_action('udesign_front_page_slider_after');
}
 
 
 
/**********************( <home-page-content> and <page-content> hooks )*********************/

/**
 * Fire the 'udesign_home_page_content_before' action
 *
 * @uses do_action() Calls 'udesign_home_page_content_before' hook.
 */
function udesign_home_page_content_before() {
    do_action('udesign_home_page_content_before');
}

/**
 * Fire the 'udesign_page_content_before' action.
 * 
 * @uses do_action() Calls 'udesign_page_content_before' hook.
 */
function udesign_page_content_before() {
    do_action('udesign_page_content_before');
}

/**
 * Fire the 'udesign_page_content_after' action.
 * 
 * @uses do_action() Calls 'udesign_page_content_after' hook.
 */
function udesign_page_content_after() {
    do_action('udesign_page_content_after');
}

/**
 * Fire the 'udesign_home_page_content_top' action
 *
 * @uses do_action() Calls 'udesign_home_page_content_top' hook.
 */
function udesign_home_page_content_top() {
    do_action('udesign_home_page_content_top');
}

/**
 * Fire the 'udesign_page_content_top' action
 *
 * @uses do_action() Calls 'udesign_page_content_top' hook.
 */
function udesign_page_content_top() {
    do_action('udesign_page_content_top');
}

/**
 * Fire the 'udesign_page_content_bottom' action
 *
 * @uses do_action() Calls 'udesign_page_content_bottom' hook.
 */
function udesign_page_content_bottom() {
    do_action('udesign_page_content_bottom');
}

 
 
/**********************( <page-title> hooks )*********************/

/**
 * Fire the 'udesign_page_title_before' action
 *
 * @uses do_action() Calls 'udesign_page_title_before' hook.
 */
function udesign_page_title_before() {
    do_action('udesign_page_title_before');
}

/**
 * Fire the 'udesign_page_title_after' action.
 * 
 * @uses do_action() Calls 'udesign_page_title_after' hook.
 */
function udesign_page_title_after() {
    do_action('udesign_page_title_after');
}

/**
 * Fire the 'udesign_page_title_top' action
 *
 * @uses do_action() Calls 'udesign_page_title_top' hook.
 */
function udesign_page_title_top() {
    do_action('udesign_page_title_top');
}

/**
 * Fire the 'udesign_page_title_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_page_title_bottom' hook.
 */
function udesign_page_title_bottom() {
    do_action('udesign_page_title_bottom');
}
 
 
/**********************( <main-content> hook )*********************/

/**
 * Fire the 'udesign_main_content_top' action
 * Passes as an argument (boolean) whether the current page is front page or not
 * 
 * @param bool $is_front_page Based on call to is_front_page() core WordPress function
 * @uses do_action() Calls 'udesign_main_content_top' hook.
 */
function udesign_main_content_top( $is_front_page ) {
    do_action('udesign_main_content_top', $is_front_page);
}

/**
 * Fire the 'udesign_main_content_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_main_content_bottom' hook.
 */
function udesign_main_content_bottom() {
    do_action('udesign_main_content_bottom');
}


/**********************( <entry> hooks )*********************/

/**
 * Fire the 'udesign_entry_before' action
 *
 * @uses do_action() Calls 'udesign_entry_before' hook.
 */
function udesign_entry_before() {
    do_action('udesign_entry_before');
}

/**
 * Fire the 'udesign_entry_after' action.
 * 
 * @uses do_action() Calls 'udesign_entry_after' hook.
 */
function udesign_entry_after() {
    do_action('udesign_entry_after');
}

/**
 * Fire the 'udesign_entry_top' action
 *
 * @uses do_action() Calls 'udesign_entry_top' hook.
 */
function udesign_entry_top() {
    do_action('udesign_entry_top');
}

/**
 * Fire the 'udesign_entry_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_entry_bottom' hook.
 */
function udesign_entry_bottom() {
    do_action('udesign_entry_bottom');
}


/**********************( blog posts <entry> hooks )*********************/

/**
 * Fire the 'udesign_blog_entry_before' action
 *
 * @uses do_action() Calls 'udesign_blog_entry_before' hook.
 */
function udesign_blog_entry_before() {
    do_action('udesign_blog_entry_before');
}

/**
 * Fire the 'udesign_blog_entry_after' action.
 * 
 * @uses do_action() Calls 'udesign_blog_entry_after' hook.
 */
function udesign_blog_entry_after() {
    do_action('udesign_blog_entry_after');
}

/**
 * Fire the 'udesign_blog_entry_top' action
 *
 * @uses do_action() Calls 'udesign_blog_entry_top' hook.
 */
function udesign_blog_entry_top() {
    do_action('udesign_blog_entry_top');
}

/**
 * Fire the 'udesign_blog_entry_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_blog_entry_bottom' hook.
 */
function udesign_blog_entry_bottom() {
    do_action('udesign_blog_entry_bottom');
}

/**
 * Fire the 'udesign_blog_post_content_before' action.
 * 
 * @uses do_action() Calls 'udesign_blog_post_content_before' hook.
 */
function udesign_blog_post_content_before() {
    do_action('udesign_blog_post_content_before');
}

/**
 * Fire the 'udesign_single_post_entry_before' action
 *
 * @uses do_action() Calls 'udesign_single_post_entry_before' hook.
 */
function udesign_single_post_entry_before() {
    do_action('udesign_single_post_entry_before');
}

/**
 * Fire the 'udesign_single_post_entry_after' action.
 * 
 * @uses do_action() Calls 'udesign_single_post_entry_after' hook.
 */
function udesign_single_post_entry_after() {
    do_action('udesign_single_post_entry_after');
}

/**
 * Fire the 'udesign_single_post_entry_top' action
 *
 * @uses do_action() Calls 'udesign_single_post_entry_top' hook.
 */
function udesign_single_post_entry_top() {
    do_action('udesign_single_post_entry_top');
}

/**
 * Fire the 'udesign_single_post_entry_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_single_post_entry_bottom' hook.
 */
function udesign_single_post_entry_bottom() {
    do_action('udesign_single_post_entry_bottom');
}


/**********************( blog posts <post-top> hooks )*********************/

/**
 * Fire the 'udesign_blog_post_top_area_inside' action
 *
 * @uses do_action() Calls 'udesign_blog_post_top_area_inside' hook.
 */
function udesign_blog_post_top_area_inside() {
    do_action('udesign_blog_post_top_area_inside');
}




/**********************( portfolio <entry> hooks )*********************/

/**
 * Fire the 'udesign_single_portfolio_entry_before' action
 *
 * @uses do_action() Calls 'udesign_single_portfolio_entry_before' hook.
 */
function udesign_single_portfolio_entry_before() {
    do_action('udesign_single_portfolio_entry_before');
}

/**
 * Fire the 'udesign_single_portfolio_entry_after' action.
 * 
 * @uses do_action() Calls 'udesign_single_portfolio_entry_after' hook.
 */
function udesign_single_portfolio_entry_after() {
    do_action('udesign_single_portfolio_entry_after');
}

/**
 * Fire the 'udesign_single_portfolio_entry_top' action
 *
 * @uses do_action() Calls 'udesign_single_portfolio_entry_top' hook.
 */
function udesign_single_portfolio_entry_top() {
    do_action('udesign_single_portfolio_entry_top');
}

/**
 * Fire the 'udesign_single_portfolio_entry_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_single_portfolio_entry_bottom' hook.
 */
function udesign_single_portfolio_entry_bottom() {
    do_action('udesign_single_portfolio_entry_bottom');
}


/**********************( <bottom> hooks )*********************/

/**
 * Fire the 'udesign_bottom_section_top' action
 *
 * @uses do_action() Calls 'udesign_bottom_section_top' hook.
 */
function udesign_bottom_section_top() {
    do_action('udesign_bottom_section_top');
}

/**
 * Fire the 'udesign_bottom_section_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_bottom_section_bottom' hook.
 */
function udesign_bottom_section_bottom() {
    do_action('udesign_bottom_section_bottom');
}




/**********************( <footer> hooks )*********************/

/**
 * Fire the 'udesign_footer_before' action
 *
 * @uses do_action() Calls 'udesign_footer_before' hook.
 */
function udesign_footer_before() {
    do_action('udesign_footer_before');
}

/**
 * Fire the 'udesign_footer_after' action.
 * 
 * @uses do_action() Calls 'udesign_footer_after' hook.
 */
function udesign_footer_after() {
    do_action('udesign_footer_after');
}

/**
 * Fire the 'udesign_footer_inside' action
 *
 * @uses do_action() Calls 'udesign_footer_inside' hook.
 */
function udesign_footer_inside() {
    do_action('udesign_footer_inside');
}




/**********************( <sidebar> hooks )*********************/

/**
 * Fire the 'udesign_sidebar_top' action
 *
 * @uses do_action() Calls 'udesign_sidebar_top' hook.
 */
function udesign_sidebar_top() {
    do_action('udesign_sidebar_top');
}

/**
 * Fire the 'udesign_sidebar_bottom' action.
 * 
 * @uses do_action() Calls 'udesign_sidebar_bottom' hook.
 */
function udesign_sidebar_bottom() {
    do_action('udesign_sidebar_bottom');
}








