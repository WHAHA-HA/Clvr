<?php 

/* 
 * The below code deals with the display of the action hooks in the front end has the user enabled that option.
 * Enabling the "Show Action Hook Locations" from "Advaned Options" will allow you to see in the front end the exact locations of the U-Design action hooks located within the "body" tags.
 * 
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



function udesign_body_top_function() {
   echo '<div class="--> action-hook-ref udesign_body_top"><span>udesign_body_top</span></div>';
}
add_action('udesign_body_top', 'udesign_body_top_function', 10);

function udesign_body_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_body_bottom"><span>udesign_body_bottom</span></div>';
}
add_action('udesign_body_bottom', 'udesign_body_bottom_function', 10);

function udesign_top_wrapper_before_function() {
   echo '<div class="--> action-hook-ref udesign_top_wrapper_before"><span>udesign_top_wrapper_before</span></div>';
}
add_action('udesign_top_wrapper_before', 'udesign_top_wrapper_before_function', 10);

function udesign_top_wrapper_after_function( $is_front_page ) {
   echo '<div class="--> action-hook-ref udesign_top_wrapper_after"><span>udesign_top_wrapper_after <em>&nbsp;( $is_front_page boolean parameter passed )</em></span></div>';
}
add_action('udesign_top_wrapper_after', 'udesign_top_wrapper_after_function', 10);

function udesign_top_wrapper_top_function() {
   echo '<div class="--> action-hook-ref udesign_top_wrapper_top"><span>udesign_top_wrapper_top</span></div>';
}
add_action('udesign_top_wrapper_top', 'udesign_top_wrapper_top_function', 10);

function udesign_top_wrapper_bottom_function( $is_front_page ) {
   echo '<div class="--> action-hook-ref udesign_top_wrapper_bottom"><span>udesign_top_wrapper_bottom <em>&nbsp;( $is_front_page boolean parameter passed )</em></span></div>';
}
add_action('udesign_top_wrapper_bottom', 'udesign_top_wrapper_bottom_function', 10);

function udesign_top_elements_inside_function( $is_front_page ) {
   echo '<div class="--> action-hook-ref udesign_top_elements_inside"><span>udesign_top_elements_inside <em>&nbsp;( $is_front_page boolean parameter passed )</em></span></div>';
}
add_action('udesign_top_elements_inside', 'udesign_top_elements_inside_function', 10);

function udesign_front_page_slider_before_function() {
   echo '<div class="--> action-hook-ref udesign_front_page_slider_before"><span>udesign_front_page_slider_before</span></div>';
}
add_action('udesign_front_page_slider_before', 'udesign_front_page_slider_before_function', 10);

function udesign_front_page_slider_after_function() {
   echo '<div class="--> action-hook-ref udesign_front_page_slider_after"><span>udesign_front_page_slider_after</span></div>';
}
add_action('udesign_front_page_slider_after', 'udesign_front_page_slider_after_function', 10);

function udesign_home_page_content_before_function() {
   echo '<div class="--> action-hook-ref udesign_home_page_content_before"><span>udesign_home_page_content_before</span></div>';
}
add_action('udesign_home_page_content_before', 'udesign_home_page_content_before_function', 10);

function udesign_page_content_before_function() {
   echo '<div class="--> action-hook-ref udesign_page_content_before"><span>udesign_page_content_before</span></div>';
}
add_action('udesign_page_content_before', 'udesign_page_content_before_function', 10);

function udesign_page_content_after_function() {
   echo '<div class="--> action-hook-ref udesign_page_content_after"><span>udesign_page_content_after</span></div>';
}
add_action('udesign_page_content_after', 'udesign_page_content_after_function', 10);

function udesign_home_page_content_top_function() {
   echo '<div class="--> action-hook-ref udesign_home_page_content_top"><span>udesign_home_page_content_top</span></div>';
}
add_action('udesign_home_page_content_top', 'udesign_home_page_content_top_function', 10);

function udesign_page_content_top_function() {
   echo '<div class="--> action-hook-ref udesign_page_content_top"><span>udesign_page_content_top</span></div>';
}
add_action('udesign_page_content_top', 'udesign_page_content_top_function', 10);

function udesign_page_content_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_page_content_bottom"><span>udesign_page_content_bottom</span></div>';
}
add_action('udesign_page_content_bottom', 'udesign_page_content_bottom_function', 10);

function udesign_page_title_before_function() {
   echo '<div class="--> action-hook-ref udesign_page_title_before"><span>udesign_page_title_before</span></div>';
}
add_action('udesign_page_title_before', 'udesign_page_title_before_function', 10);

function udesign_page_title_after_function() {
   echo '<div class="--> action-hook-ref udesign_page_title_after"><span>udesign_page_title_after</span></div>';
}
add_action('udesign_page_title_after', 'udesign_page_title_after_function', 10);

function udesign_page_title_top_function() {
   echo '<div class="--> action-hook-ref udesign_page_title_top"><span>udesign_page_title_top</span></div>';
}
add_action('udesign_page_title_top', 'udesign_page_title_top_function', 10);

function udesign_page_title_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_page_title_bottom"><span>udesign_page_title_bottom</span></div>';
}
add_action('udesign_page_title_bottom', 'udesign_page_title_bottom_function', 10);

function udesign_main_content_top_function( $is_front_page ) {
   echo '<div class="--> action-hook-ref udesign_main_content_top"><span>udesign_main_content_top <em>&nbsp;( $is_front_page boolean  parameter passed )</em></span></div>';
}
add_action('udesign_main_content_top', 'udesign_main_content_top_function', 10);

function udesign_main_content_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_main_content_bottom"><span>udesign_main_content_bottom</span></div>';
}
add_action('udesign_main_content_bottom', 'udesign_main_content_bottom_function', 10);

function udesign_entry_before_function() {
   echo '<div class="--> action-hook-ref udesign_entry_before"><span>udesign_entry_before</span></div>';
}
add_action('udesign_entry_before', 'udesign_entry_before_function', 10);

function udesign_entry_after_function() {
   echo '<div class="--> action-hook-ref udesign_entry_after"><span>udesign_entry_after</span></div>';
}
add_action('udesign_entry_after', 'udesign_entry_after_function', 10);

function udesign_entry_top_function() {
   echo '<div class="--> action-hook-ref udesign_entry_top"><span>udesign_entry_top</span></div>';
}
add_action('udesign_entry_top', 'udesign_entry_top_function', 10);

function udesign_entry_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_entry_bottom"><span>udesign_entry_bottom</span></div>';
}
add_action('udesign_entry_bottom', 'udesign_entry_bottom_function', 10);

function udesign_blog_entry_before_function() {
   echo '<div class="--> action-hook-ref udesign_blog_entry_before"><span>udesign_blog_entry_before</span></div>';
}
add_action('udesign_blog_entry_before', 'udesign_blog_entry_before_function', 10);

function udesign_blog_entry_after_function() {
   echo '<div class="--> action-hook-ref udesign_blog_entry_after"><span>udesign_blog_entry_after</span></div>';
}
add_action('udesign_blog_entry_after', 'udesign_blog_entry_after_function', 10);

function udesign_blog_entry_top_function() {
   echo '<div class="--> action-hook-ref udesign_blog_entry_top"><span>udesign_blog_entry_top</span></div>';
}
add_action('udesign_blog_entry_top', 'udesign_blog_entry_top_function', 10);

function udesign_blog_entry_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_blog_entry_bottom"><span>udesign_blog_entry_bottom</span></div>';
}
add_action('udesign_blog_entry_bottom', 'udesign_blog_entry_bottom_function', 10);

function udesign_blog_post_content_before_function() {
   echo '<div class="--> action-hook-ref udesign_blog_post_content_before"><span>udesign_blog_post_content_before</span></div>';
}
add_action('udesign_blog_post_content_before', 'udesign_blog_post_content_before_function', 10);

function udesign_single_post_entry_before_function() {
   echo '<div class="--> action-hook-ref udesign_single_post_entry_before"><span>udesign_single_post_entry_before</span></div>';
}
add_action('udesign_single_post_entry_before', 'udesign_single_post_entry_before_function', 10);

function udesign_single_post_entry_after_function() {
   echo '<div class="--> action-hook-ref udesign_single_post_entry_after"><span>udesign_single_post_entry_after</span></div>';
}
add_action('udesign_single_post_entry_after', 'udesign_single_post_entry_after_function', 10);

function udesign_single_post_entry_top_function() {
   echo '<div class="--> action-hook-ref udesign_single_post_entry_top"><span>udesign_single_post_entry_top</span></div>';
}
add_action('udesign_single_post_entry_top', 'udesign_single_post_entry_top_function', 10);

function udesign_single_post_entry_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_single_post_entry_bottom"><span>udesign_single_post_entry_bottom</span></div>';
}
add_action('udesign_single_post_entry_bottom', 'udesign_single_post_entry_bottom_function', 10);

function udesign_blog_post_top_area_inside_function() {
   echo '<div class="--> action-hook-ref udesign_blog_post_top_area_inside"><span>udesign_blog_post_top_area_inside</span></div>';
}
add_action('udesign_blog_post_top_area_inside', 'udesign_blog_post_top_area_inside_function', 10);

function udesign_single_portfolio_entry_before_function() {
   echo '<div class="--> action-hook-ref udesign_single_portfolio_entry_before"><span>udesign_single_portfolio_entry_before</span></div>';
}
add_action('udesign_single_portfolio_entry_before', 'udesign_single_portfolio_entry_before_function', 10);

function udesign_single_portfolio_entry_after_function() {
   echo '<div class="--> action-hook-ref udesign_single_portfolio_entry_after"><span>udesign_single_portfolio_entry_after</span></div>';
}
add_action('udesign_single_portfolio_entry_after', 'udesign_single_portfolio_entry_after_function', 10);

function udesign_single_portfolio_entry_top_function() {
   echo '<div class="--> action-hook-ref udesign_single_portfolio_entry_top"><span>udesign_single_portfolio_entry_top</span></div>';
}
add_action('udesign_single_portfolio_entry_top', 'udesign_single_portfolio_entry_top_function', 10);

function udesign_single_portfolio_entry_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_single_portfolio_entry_bottom"><span>udesign_single_portfolio_entry_bottom</span></div>';
}
add_action('udesign_single_portfolio_entry_bottom', 'udesign_single_portfolio_entry_bottom_function', 10);

function udesign_bottom_section_top_function() {
   echo '<div class="--> action-hook-ref udesign_bottom_section_top"><span>udesign_bottom_section_top</span></div>';
}
add_action('udesign_bottom_section_top', 'udesign_bottom_section_top_function', 10);

function udesign_bottom_section_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_bottom_section_bottom"><span>udesign_bottom_section_bottom</span></div>';
}
add_action('udesign_bottom_section_bottom', 'udesign_bottom_section_bottom_function', 10);

function udesign_footer_before_function() {
   echo '<div class="--> action-hook-ref udesign_footer_before"><span>udesign_footer_before</span></div>';
}
add_action('udesign_footer_before', 'udesign_footer_before_function', 10);

function udesign_footer_after_function() {
   echo '<div class="--> action-hook-ref udesign_footer_after"><span>udesign_footer_after</span></div>';
}
add_action('udesign_footer_after', 'udesign_footer_after_function', 10);

function udesign_footer_inside_function() {
   echo '<div class="--> action-hook-ref udesign_footer_inside"><span>udesign_footer_inside</span></div>';
}
add_action('udesign_footer_inside', 'udesign_footer_inside_function', 10);

function udesign_sidebar_top_function() {
   echo '<div class="--> action-hook-ref udesign_sidebar_top"><span>udesign_sidebar_top</span></div>';
}
add_action('udesign_sidebar_top', 'udesign_sidebar_top_function', 10);

function udesign_sidebar_bottom_function() {
   echo '<div class="--> action-hook-ref udesign_sidebar_bottom"><span>udesign_sidebar_bottom</span></div>';
}
add_action('udesign_sidebar_bottom', 'udesign_sidebar_bottom_function', 10);



