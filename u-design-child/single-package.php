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
 if((get_the_title() !='Film Education') && (get_the_title() != 'Educational Screenings')):
    get_header('sie');
	 echo get_top_navigation('sie');
else:
	get_header('education');
	echo get_top_navigation('education');
endif;
		?>
			</header>
<?php
	if((get_the_title() !='Film Education') && (get_the_title() != 'Educational Screenings')):
		$content_position = "grid_16";
	else:
		$content_position = "grid_24";
	endif;
?>
<div id="main-content-movie-listing" class="<?php echo $content_position; ?>" style="margin:auto;">
<?php           udesign_main_content_top( is_front_page() ); ?>
<?php		if (have_posts()) :
			    while (have_posts()) : the_post();
					get_template_part('content',get_post_type());
			    endwhile;
		    else: ?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>
<?php           udesign_main_content_bottom(); ?>
</div>
<?php
	if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') && ((get_the_title() !='Film Education') && (get_the_title() != 'Educational Screenings')) ) { get_sidebar('BlogSidebar'); }
?>
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


