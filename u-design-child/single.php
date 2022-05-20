<?php
/**
 * @package WordPress
 * @subpackage U-Design
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

<?php
	the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	if(get_post_type()=="event")
		$content_position = "grid_16";
	else
		$content_position = "grid_24";

?>

		<div id="main-content" class="<?php echo $content_position; ?>">
<?php           udesign_main_content_top( is_front_page() ); ?>
<?php		if (have_posts()) :
		    while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                       udesign_single_post_entry_before(); ?>
                            <div class="entry-point">
<?php                           udesign_single_post_entry_top(); ?>

<?php                           // Post Image
                                if( $udesign_options['display_post_image_in_single_post'] == 'yes' ) display_post_image_fn( $post->ID, false );
				the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
				wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<?php                           udesign_single_post_entry_bottom(); ?>
			    </div>
<?php                       udesign_single_post_entry_after(); ?>
			</div>
<?php
		    endwhile; else: ?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>

<?php           udesign_main_content_bottom(); ?>

<?php

?>
	</div>
<?php

//if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) {  get_sidebar('BlogSidebar'); }
endif; // end normal Loop ?>
	    <!-- <div class="clear"></div> -->
	    <script type="text/javascript">

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php

get_footer();


