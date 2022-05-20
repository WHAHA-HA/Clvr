<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options; ?>


<?php udesign_page_content_bottom(); ?>
</div><!-- end page-content -->
<?php udesign_page_content_after(); ?>

<div class="clear"></div>

<?php

	$bottom_1_is_active = sidebar_exist_and_active('bottom-widget-area-1');
	$bottom_2_is_active = sidebar_exist_and_active('bottom-widget-area-2');
	$bottom_3_is_active = sidebar_exist_and_active('bottom-widget-area-3');
	$bottom_4_is_active = sidebar_exist_and_active('bottom-widget-area-4');

	if ( $bottom_1_is_active || $bottom_2_is_active || $bottom_3_is_active || $bottom_4_is_active ) : // hide this area if no widgets are active...
?>
	    <div id="bottom-bg">
		<div id="bottom" class="container_24">
		    <div class="bottom-content-padding">
<?php                   udesign_bottom_section_top(); ?>
<?php
                        $output = '';
			// all 4 active: 1 case
			if ( $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_fourth', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_fourth', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_fourth', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_fourth last_column', 'bottom-widget-area-4' );
			}
			// 3 active: 4 cases
			if ( $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_third last_column', 'bottom-widget-area-3' );
			}
			if ( $bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
			}
			if ( $bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_third', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_third', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
			}
			// 2 active: 6 cases
			if ( $bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_half last_column', 'bottom-widget-area-2' );
			}
			if ( $bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_half last_column', 'bottom-widget-area-3' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'one_half', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_half last_column', 'bottom-widget-area-3' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'one_half', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
			}
			if ( !$bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_3', 'one_half', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
			}
			if ( $bottom_1_is_active && !$bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
			}
			// 1 active: 4 cases
			if ( $bottom_1_is_active && !$bottom_2_is_active && !$bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'full_width', 'bottom-widget-area-1' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'full_width', 'bottom-widget-area-2' );
			}
			if ( !$bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_3', 'full_width', 'bottom-widget-area-3' );
			}
			if ( !$bottom_1_is_active && !$bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_4', 'full_width', 'bottom-widget-area-4' );
			}
                        
                        echo $output;

                        udesign_bottom_section_bottom(); ?>
		    </div>
		    <!-- end bottom-content-padding -->
		</div>
		<!-- end bottom -->
	    </div>
	    <!-- end bottom-bg -->

	    <div class="clear"></div>

<?php	endif; ?>

<?php   udesign_footer_before(); ?>
	<div id="footer-bg">
		<div id="footer" class="container_24 footer-top">
<?php               udesign_footer_inside(); ?>
		</div>
	</div>
<?php   udesign_footer_after(); ?>

	<div class="clear"></div>

<?php   wp_footer(); ?>
        
<?php
    if( $udesign_options['enable_cufon'] ) : ?>
	<script type="text/javascript"> Cufon.now(); </script>
<?php
    endif; ?>
<?php udesign_body_bottom(); ?>
</body>
</html>