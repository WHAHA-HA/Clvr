<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	global $udesign_options;
	$portfolio_categories = $udesign_options['portfolio_categories']; // Get the portfolio category specified by the user in the 'U-Design Options' page
	$sidebar_position = ( $udesign_options['portfolio_sidebar'] == 'left' ) ? 'grid_8 pull_16 sidebar-box' : 'grid_8';
?>

	<div id="sidebar" class="<?php echo $sidebar_position; ?>">
	    <div id="sidebarSubnav">
<?php           udesign_sidebar_top(); ?>

<?php		// Widgetized sidebar
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PortfolioSidebar') ) : 
		    // Check if a category has been assigned as Portfolio section
		    if( $portfolio_categories ) : ?>
		    	<div class="custom-formatting">
			    <h3><?php esc_html_e('About This Sidebar', 'udesign'); ?></h3>
			    <ul>
				<?php _e("To edit this sidebar, go to admin backend's <strong><em>Appearance -> Widgets</em></strong> and place widgets into the <strong><em>PortfolioSidebar</em></strong> Widget Area", 'udesign'); ?>
			    </ul>
			</div>
<?php		    endif;
		endif; ?>
                
<?php           udesign_sidebar_bottom(); ?>
	    </div>
	</div><!-- end sidebar -->









