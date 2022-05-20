<?php
define('CHILD_DIR',get_stylesheet_directory_uri());

//load child theme style sheets on loading
wp_enqueue_style('u-design-style-child', get_stylesheet_directory_uri() . "/style.css", false, '2.4.6', 'screen');

//for related video effects
wp_enqueue_style('u-design-style-child-video-relate', get_stylesheet_directory_uri() . "/styles/video_style_common.css", false, '1.1.1', 'screen');
wp_enqueue_style('u-design-style-child-video-relate-thumb', get_stylesheet_directory_uri() . "/styles/video_style1.css", false, '1.1.2', 'screen');
wp_enqueue_style('u-design-style-child-video-relate-thumb_8', get_stylesheet_directory_uri() . "/styles/video_style5.css", false, '1.1.2', 'screen');


//import juqery 1.9.1 for advanced animation effects
//wp_register_script('jquery-1.9.1','http://code.jquery.com/jquery-1.js',false,'1.9.1');//
//wp_enqueue_script('jquery-1.9.1');
wp_enqueue_script('jquery_validate_lib', get_bloginfo('template_url')."/scripts/jquery-validate/jquery.validate.min.js", array('jquery'), '1.11.1', true);
wp_enqueue_script('custom-script', get_stylesheet_directory_uri()."/scripts/custom.js", array('jquery'));



$main_page=get_page_by_title("Improve Your Breathing");
/*
function add_login_logout_link_old($items, $args)
{
	if(is_user_logged_in())
	{
		$newitems = '<li><a title="Logout" href="'.wp_logout_url('index.php').'"><span>Logout</span></a></li>';
		$newitems .= $items;
	}else{
		//    $newitems = '<li><a title="Logout" href="'.wp_login_url('index.php').'">Login</a></li>';
		$newitems = '<li><a title="Login" href="'.get_permalink(woocommerce_get_page_id('myaccount')).'"><span>Login</span></a></li>';
		$newitems .= '<li><a title="Register" href="'.get_permalink(woocommerce_get_page_id('myaccount')).'"><span>Register</span></a></li>';
		$newitems .= $items;
	}
	return $newitems;
}
add_filter('wp_nav_menu_items','add_login_logout_link_old', 10, 2);
*/

//remove_action('udesign_top_elements_inside', 'udesign_top_elements_slogan', 9);
//add custom taxonomy - chapters...

function cbr_define_course_type_taxonomy() {

	$labels = array(
			'name'			=> 'Chapters',
			'singular_name'	=> 'Chapter',
			'search_items'	=> 'Search Chapters',
			'all_items'		=> 'All Chapters',
			'parent_item'	=> 'Parent Chapter',
			'pareint_item_colon'=>'Parent Chapter:',
			'edit_item'		=> 'Edit Chapter',
			'update_item'	=> 'Update Chapter',
			'add_new_item'	=> 'Add New Chapter',
			'new_item_name'	=> 'New Chapter Name',
			'menu_name'		=> 'Chapters'
	);

	$args = array(
			'labels'	=> $labels,
			'hierarchical'	=> true,
			'query_var'		=> true,
			'rewrite'		=> array('slug' => 'kapitel'),
			'supports'		=> array('title','editor','thumbnail','custom-fields')
	);
	register_taxonomy('chapter','courses', $args);
}
function cbr_update_course_type_taxonomy()
{


}
add_action('init', 'cbr_define_course_type_taxonomy');
//add_action('init', 'cbr_update_course_type_taxonomy');
//add custom types for video courses

function cbr_register_my_post_types() {

	$labels = array(
		'name'			=> 'Courses',
		'singular_name'	=> 'Course',
		'add_new'		=> 'Add New Course',
		'add_new_item'	=> 'Add New Course',
		'edit_item'		=> 'Edit Course',
		'new_item'		=> 'New Course',
		'all_item'		=> 'All Courses',
		'view_item'		=> 'View Course',
		'search_item'	=> 'Search Courses',
		'not_found'		=> 'No Courses Found',
		'not_found_in_trash'	=> 'No Courses Found in Trash',
		'parent_item_colon'		=> '',
		'menu_name'				=> 'Courses'
	);

	$args = array(
		'labels'	=> $labels,
		'public' 	=> true,
		'has_archive' =>true,
		'taxonomies'  =>array('chapter'),
		'rewrite'	=> array('slug'=>'avsnitt'),
		'supports'	=> array('title','comments','thumbnail','custom-fields')
	);
	register_post_type('courses',$args);
}

add_action('init', 'cbr_register_my_post_types');

// Return the column (widget area) HTML
function get_dynamic_column_contents($contents, $id = '', $class = '', $widget_area = '' ) {
	$html = "<div id='{$id}' class='{$class}'><div class='column-content-wrapper'>".$contents."</div></div><!-- end {$id} -->";
	$html = apply_filters( 'udesign_get_dynamic_column', $html, $id, $class, $widget_area );
	return $html;
}

//add meta data for courses and chapters...

/* Add the PMPro meta box to CPT  */
function my_page_meta_wrapper()
{
	//duplicate this row for each CPT
	add_meta_box('pmpro_page_meta', 'Require Membership','pmpro_page_meta','courses','side');
}
function pmpro_cpt_init()
{
	if(is_admin())
	{
		add_action('admin_menu', 'my_page_meta_wrapper');
	}
}
add_action('init', 'pmpro_cpt_init', 20);

//automatically add premium membership to cart and go to checkout page....

function add_membership_to_cart($default_id = 'premium')
{

	$product_page = get_page_by_title('Premium Product',OBJECT, 'product');
	$membership_id = $product_page->ID;

	if(!is_admin())
	{
		global $woocommerce;

		$found = false;
		//$woocommerce->cart->add_to_cart($membership_id);
		//check if product already in cart

		//first remove everything and add a new item
		$woocommerce->cart->empty_cart();
		if(sizeof($woocommerce->cart->get_cart())>0)
		{
			foreach($woocommerce->cart->get_cart() as $cart_item_key =>$values)
			{

				$_product = $values['data'];
				if($product->id == $membership_id)
					$found = true;

			}
			//if prouduct not found ,add it
			if( !$found)
				$woocommerce->cart->add_to_cart($membership_id);
		}else
		{
			//echo "in here";
			$woocommerce->cart->add_to_cart($membership_id);

		}
	}
}

//add_action('init', 'add_membership_to_cart');

//turn off normal woocommerce style sheets so that we could customize them in our child theme
/*
add_filter('woocommerce_enqueue_styles', 'jk_deque_styles');
function jk_deque_styles($enqueue_styles)
{
	unset($enqueue_styles['woocommerce-general']);
	//we should follow the same layout as woocommerce...
	//unset($enqueue_styles['woocommerce-layout']);
	unset($enqueue_styles['woocommerce-smallscreen']);
	return $enqueue_styles;

}
*/
//As we are using woocommerce stand CSS in plugin/woocommere we don't need to additional filter at the moment

//and then add my own stylesheet
/*
function wp_enqueue_woocommerce_style()
{
	wp_register_style('mywoocommerce_style', CHILD_DIR.'/woocommerce/style.css');
	if(class_exists('woocommerce'))
	{
		wp_enqueue_style('mywoocommerce_style');
	}
}

add_action('wp_enqueue_scripts', 'wp_enqueue_woocommerce_style'); */

//when we updte coures post type we also remove video_duration meta for refresh....

function remove_courses_meta($post_id)
{
	$slug = 'courses';
	if($slug != $_POST['post_type'])
		return;
	delete_post_meta($post_id, "video_duration");
}
add_action('save_post','remove_courses_meta');

//format video duration into h:m:s
require_once('includes/vimeo-php-lib-master/vimeo.php');
// Create the object and enable caching
$vimeo = new phpVimeo('5a1105823cb4add2ff172e72fd39322ff5116b55', '1ad34150fc130aeb2701098ef8997ddd6e043573');
$vimeo->enableCache(phpVimeo::CACHE_FILE, './cache', 300);

//for pouplar/recent testimonial side bar
function observePostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
function fetchPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}

//for woocommerce customizatioon...

//remove review part , only remains descripton...
if ( ! function_exists( 'woocommerce_template_single_description' ) ) {

	/**
	 * Output the product title.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_template_single_description() {
		wc_get_template( 'single-product/description.php' );
	}
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_description', 10 );

//disable product review tab
/* function woo_remove_product_tab($tabs)
{
	unset($tabs['reviews']);
	return $tabs;
}
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs',98); */
function show_updated_date_on_page(){
	echo "<div style='float:right'>Updated on ".get_the_date()."</div>";
}
add_shortcode('updated-date','show_updated_date_on_page');
if ( ! function_exists( 'woocommerce_template_single_add_to_cart2' ) ) {

	/**
	 * Trigger the single product add to cart action.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_template_single_add_to_cart2($param ='form') {
		global $product;
		do_action( 'woocommerce_' . $product->product_type . '_add_to_cart2' ,$param );
	}
}
if ( ! function_exists( 'woocommerce_simple_add_to_cart2' ) ) {

	/**
	 * Output the simple product add to cart area.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_simple_add_to_cart2($param) {
		if($param=='form')
			wc_get_template( 'single-product/add-to-cart2/simple.php' );
		else
			wc_get_template( 'single-product/add-to-cart2/simple-inline.php' );
	}
}
if ( ! function_exists( 'woocommerce_grouped_add_to_cart2' ) ) {

	/**
	 * Output the grouped product add to cart area.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_grouped_add_to_cart2() {
		global $product;

		wc_get_template( 'single-product/add-to-cart2/grouped.php', array(
		'grouped_product'    => $product,
		'grouped_products'   => $product->get_children(),
		'quantites_required' => false
		) );
	}
}

if ( ! function_exists( 'woocommerce_variable_add_to_cart2' ) ) {

	/**
	 * Output the variable product add to cart area.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_variable_add_to_cart2() {
		global $product;

		// Enqueue variation scripts
		wp_enqueue_script( 'wc-add-to-cart-variation' );

		// Load the template
		wc_get_template( 'single-product/add-to-cart2/variable.php', array(
		'available_variations'  => $product->get_available_variations(),
		'attributes'   			=> $product->get_variation_attributes(),
		'selected_attributes' 	=> $product->get_variation_default_attributes()
		) );
	}
}
if ( ! function_exists( 'woocommerce_external_add_to_cart2' ) ) {

	/**
	 * Output the external product add to cart area.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_external_add_to_cart2() {
		global $product;

		if ( ! $product->get_product_url() )
			return;

		wc_get_template( 'single-product/add-to-cart2/external.php', array(
		'product_url' => $product->get_product_url(),
		'button_text' => $product->single_add_to_cart_text()
		) );
	}
}

add_action( 'woocommerce_simple_add_to_cart2', 'woocommerce_simple_add_to_cart2', 30 );
add_action( 'woocommerce_grouped_add_to_cart2', 'woocommerce_grouped_add_to_cart2', 30 );
add_action( 'woocommerce_variable_add_to_cart2', 'woocommerce_variable_add_to_cart2', 30 );
add_action( 'woocommerce_external_add_to_cart2', 'woocommerce_external_add_to_cart2', 30 );



//for java script management in woocommerce
function _remove_script_version($src){$parts=explode('?',$src);return $parts[0];}add_filter('script_loader_src','_remove_script_version',15,1);add_filter('style_loader_src','_remove_script_version',15,1);/*function defer_parsing_of_js($url){if(FALSE===strpos($url,'.js'))return $url;if(strpos($url,'jquery.js') or strpos($url,'jquery.themepunch.revolution.min.js') or strpos($url,'add-to-cart-variation.min.js'))return $url;return "$url' defer='defer";}add_filter('clean_url','defer_parsing_of_js',11,1);*/
wp_enqueue_script('chosen_jquery',GROUPS_PLUGIN_URL."js/chosen/chosen.jquery.min.js",array('jquery'),'1.0.0',false);

//automatically go to check out page when clicking 'premium membership'
//skip cart page...

//add_action('add_to_cart_redirect', 'custom_add_to_cart_redirect');

function custom_add_to_cart_redirect()
{
	return get_permalink(get_option('woocommerce_checkout_page_id'));
	//Replace with thr url of my choice..
	global $woocommerce;

	$checkout_url = $woocommmerce->cart->get_cart_url();
	//echo $checkout_url;

	return $checkout_url;
	//return get_permalink(get_option('woocommerce_checkout_page_id'));
}

function print_filters_for($hook = '')
{
	global $wp_filter;
	if(empty($hook) || !isset($wp_filter[$hook]))
		return;
	print '<pre>';
	print_r($wp_filter[$hook]);
	print '</pre>';
}
/*
function add_to_cart_checkout_redirect()
{
	//echo "going";
	//exit;
	wp_safe_redirect(get_permalink(get_option('woocommerce_checkout_page_id')));
	die();
}

add_action('woocommerce_add_to_cart', 'add_to_cart_checkout_redirect',11);
*/
//print_filters_for('add_to_cart_redirect');

//add customized field checking form...

//add_filter('registration_errors', 'anders_coupon_check');

add_action('wp_logout', 'go_myaccount');
function go_myaccount()
{
	if(!is_admin())
	{
		wp_redirect(get_permalink(woocommerce_get_page_id('myaccount')));
		exit();
	}
}
add_filter('woocommerce_process_registration_errors', 'anders_coupon_check');
function anders_coupon_check($errors, $sanitized_user_login, $coupon_code)
{

	if(empty($_POST['reg_coupon']))
			$errors->add('coupon_code_error',__('<strong>ERROR</strong>: You must give your coupon code!','mydomain'));
		return $errors;
}

/**
 * is_couponcode - check validity of coupon code generated by smart coupon
 */

function is_couponcode($code){

	$smart_coupon = new WC_Coupon( $code );
	//we could also consider amount of coupon for membership
	//type
	//expiry_date
	//individual use

	//echo $smart_coupon->is_valid();
	//print_r($smart_coupon);

	if ( $smart_coupon->is_valid() && $smart_coupon->type=='smart_coupon' )
	{
		return true;
	}
	else
		return false;
}

//apply register coupon code to cart
function apply_register_couponcode($code='aa53c7c226a04adsx')
{
	if(!is_admin())
	{
		global $woocommerce;
		//$coupon_code = new WC_Smart_Coupons();
		$woocommerce->cart->add_discount(sanitize_text_field($code));
		//$woocommerce->show_messages();
	}
}
//add_action('init','apply_register_couponcode',100);

//diabling woocommerce checkout billing & shipping info


function fused_disable_billing_shipping($checkout)
{
	$checkout->checkout_fields['billing'] = array();
	$checkout->checkout_fields['shipping'] = array();
	return $checkout;
}

//for main menu location...
function udesign_customize_top_main_menu(){
//	if(is_front_page()) {
		//remove the orig menu
		remove_action('udesign_top_wrapper_bottom', 'udesign_top_main_menu');
		//assign the menu tho the hook after logo
		add_action('udesign_top_elements_inside', 'udesign_top_main_menu',11);
//	}
}
add_action('udesign_top_wrapper_before','udesign_customize_top_main_menu');


/**
 *  Returns all the orders made by a user
 *  @param int $user_id
 *  @param string $status (completed|processing|cancelled|on-hold etc)
 *  @return array of order ids
 */
function fused_get_all_user_orders($user_id, $status ='completed') {
	if(!$user_id)
		return false;

	$orders = array(); //order ids
	$args = array(
			'numberposts'	=> -1,
			'meta_key'		=> '_customer_user',
			'meta_value'	=> $user_id,
			'post_type'		=> 'shop_order',
			'post_status'	=> 'publish',
			'tax_query'		=> array(
					array(
							'taxonomy'	=> 'shop_order_status',
							'field'		=> 'slug',
							'terms'		=> $status
					)
			)
	);

	$posts = get_posts($args);
	//get the post ids as order ids
	$orders = wp_list_pluck($posts, 'ID');

	return $orders;

}
/**
 * GEt all prodcuts successfully ordered by user
 */
function fused_get_all_produts_ordered_by_user($user_id = false, $status='completed')
{
	$orders = fused_get_all_user_orders($user_id, $status);
	if(empty($orders))
		return;

	$order_list = '('.join(',',$orders).')';

	global $wpdb;
	$query_select_order_items = "SELECT order_item_id as id FROM {$wpdb->prefix}woocommerce_order_items WHERE order_id IN {$order_list}";

	$query_select_product_ids = "SELECT meta_value as product_id FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE meta_key=%s AND order_item_id IN {$query_select_order_items}";

	$products = $wpdb->get_col($wpdb->prepare($query_select_product_ids,'_product_id'));
	return $products;
}

/**
 * check if the user has bought the item
 */
function fused_has_user_bought($user_id, $product_id)
{
	$ordered_products = fused_get_all_produts_ordered_by_user($user_id);
	if(in_array($product_id, (array)$ordered_products))
		return true;
	return false;
}

/**
 * get all chainged products with the product
 */

/**
 * add_login_link -add login link when unlogged in user come to page..
 * @param unknown $msg
 * @param unknown $redirect_url
 * @param string $lang
 * @return Ambigous <unknown, mixed>
 */

function add_login_link($msg,$redirect_url, $lang="en")
{
	//change $msg <login> into link....
	$filter_msg = $msg;
	if($lang == "en")
		$filter_msg= str_replace("log in","<a href='{$redirect_url}'>log in</a>",$msg);
	else
		$filter_msg =str_replace("logga in","<a href='{$redirect_url}?'>logga in</a>",$msg);
	return $filter_msg;
}

/**
 *
 * @param unknown $message
 * @return Ambigous <string, boolean, mixed, WP_Post, NULL, multitype:, unknown>
 */
function and_return_to_shop($message)
{
	//return get_permalink(get_option('woocommerce_shop_page_id'));
	return "/produkt";
}
add_filter('woocommerce_return_to_shop_redirect','and_return_to_shop',10,2);

//show cart update message on product listing ...
add_action('woocommerce_before_my_page', 'wc_print_notices',10);

//redirect to previous page after successful login

//add_filter('woocommerce_login_redirect', 'redirect_previous_page',10);
function redirect_previous_page($redirect_to){
	global $user;
	$request =  $_SERVER['HTTP_REFERER'];
	print_r($request);
	exit;
	if(in_array($user->roles[0],array('administraor'))) {
		return admin_url();
		return $redirect_to;
	}else{
		return $request;
		return $redirect_to;
	}
}