<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Cusotm Search Page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options;

// construct an array of portfolio categories
$portfolio_categories_array = explode( ',', $udesign_options['portfolio_categories'] );

if ( $portfolio_categories_array != "" && post_is_in_category_or_descendants( $portfolio_categories_array ) ) :
    // Test if this Post is assigned to the Portfolio category or any descendant and switch the single's template accordingly
    include 'single-Portfolio.php';
else : // Continue with normal Loop (Blog category)
    get_header();
?>
<!-- custom header -->
</header>
	<header class="entry-header"><h1 class="entry-title">

	</h1>
	</header><!-- .entry-header -->
<?php

	if(get_post_type()=="event")
		$content_position = "grid_16";
	else
		$content_position = "grid_16";

?>
<div id="main-content-movie-listing" class="<?php echo $content_position; ?>">
<?php get_search_form();?>
<?php     //      udesign_main_content_top( is_front_page() ); ?>
<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();
foreach($query_args as $key=>$string)
{
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] =urlencode($query_split[1]);
}
$search = new WP_Query($search_query);
$total_results = $wp_query->found_posts;
echo "total:". $total_results. "<br/>";
if (have_posts ()) :
		while ( have_posts () ) :
			the_post ();
			?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                       udesign_single_post_entry_before(); ?>
                            <div class="entry">
				<?php                               udesign_blog_entry_top(); ?>

                                    <div class="post-top">
								<?php  the_excerpt();  ?>

                             	   </div>
                             	   <div class="clear"></div>
<?php                           udesign_blog_entry_after(); ?>
			    </div>
	</div>
<?php
		endwhile
		;
	 else :
		?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>

<?php           udesign_main_content_bottom(); ?>

<?php

	?>
	</div>
<div class="up_sidebar">
<?php
if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) {  get_sidebar('BlogSidebar'); }
?>
</div>
<?php
endif; // end normal Loop ?>
<!-- <div class="clear"></div> -->
<script type="text/javascript">

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php

get_footer();


