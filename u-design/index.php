<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

	// Home Page Main Content Widget Areas
	$cont_1_is_active = sidebar_exist_and_active('home-page-column-1');
	$cont_2_is_active = sidebar_exist_and_active('home-page-column-2');
	$cont_3_is_active = sidebar_exist_and_active('home-page-column-3');
	$cont_4_is_active = sidebar_exist_and_active('home-page-column-4');
	$home_page_col_1_fixed = $udesign_options['home_page_col_1_fixed'];
	$after_cont_row_1_is_active = sidebar_exist_and_active('home-page-after-content-row-1');
	$after_cont_row_2_is_active = sidebar_exist_and_active('home-page-after-content-row-2');
	$active_count = $cont_1_is_active + $cont_2_is_active + $cont_3_is_active + $cont_4_is_active;

	if ( $cont_1_is_active || $cont_2_is_active || $cont_3_is_active || $cont_4_is_active || $after_cont_row_1_is_active ) : // hide this area if no widgets are active...
?>

	    <div id="content-container" class="container_24">
		<div id="main-content" class="grid_24">
		    <div class="main-content-padding">
<?php
                        $output = '';
			// all 4 active: 1 case
			if ( $cont_1_is_active && $cont_2_is_active && $cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-1', 'one_fourth home-cont-box', 'home-page-column-1' );
			    $output .= get_dynamic_column( 'cont-box-2', 'one_fourth home-cont-box', 'home-page-column-2' );
			    $output .= get_dynamic_column( 'cont-box-3', 'one_fourth home-cont-box', 'home-page-column-3' );
			    $output .= get_dynamic_column( 'cont-box-4', 'one_fourth home-cont-box last_column', 'home-page-column-4' );
			}
			// 3 active: 4 cases
			if ( $cont_1_is_active && $cont_2_is_active && $cont_3_is_active && !$cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-1', 'one_third home-cont-box', 'home-page-column-1' );
			    $output .= get_dynamic_column( 'cont-box-2', 'one_third home-cont-box', 'home-page-column-2' );
			    $output .= get_dynamic_column( 'cont-box-3', 'one_third home-cont-box last_column', 'home-page-column-3' );
			}
			if ( $cont_1_is_active && $cont_2_is_active && !$cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-1', 'one_third home-cont-box', 'home-page-column-1' );
			    $output .= get_dynamic_column( 'cont-box-2', 'one_third home-cont-box', 'home-page-column-2' );
			    $output .= get_dynamic_column( 'cont-box-4', 'one_third home-cont-box last_column', 'home-page-column-4' );
			}
			if ( $cont_1_is_active && !$cont_2_is_active && $cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-1', 'one_third home-cont-box', 'home-page-column-1' );
			    $output .= get_dynamic_column( 'cont-box-3', 'one_third home-cont-box', 'home-page-column-3' );
			    $output .= get_dynamic_column( 'cont-box-4', 'one_third home-cont-box last_column', 'home-page-column-4' );
			}
			if ( !$cont_1_is_active && $cont_2_is_active && $cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-2', 'one_third home-cont-box', 'home-page-column-2' );
			    $output .= get_dynamic_column( 'cont-box-3', 'one_third home-cont-box', 'home-page-column-3' );
			    $output .= get_dynamic_column( 'cont-box-4', 'one_third home-cont-box last_column', 'home-page-column-4' );
			}
			// 2 active: 6 cases:
			if ( $home_page_col_1_fixed && $active_count == 2 ) { // if "Home Page Column 1" Widget Area width is set to be fixed (applies only for 2 columns active)
			    if ( $cont_1_is_active && !$cont_2_is_active && $cont_3_is_active ) {
				$output .= get_dynamic_column( 'cont-box-1', 'one_third home-cont-box', 'home-page-column-1' );
				$output .= get_dynamic_column( 'cont-box-3', 'two_third home-cont-box last_column', 'home-page-column-3' );
			    }
			    if ( $cont_1_is_active && $cont_2_is_active && !$cont_3_is_active ) {
				$output .= get_dynamic_column( 'cont-box-1', 'one_third home-cont-box', 'home-page-column-1' );
				$output .= get_dynamic_column( 'cont-box-2', 'two_third home-cont-box last_column', 'home-page-column-2' );
			    }
			    if ( $cont_1_is_active && !$cont_2_is_active && !$cont_3_is_active && $cont_4_is_active ) {
				$output .= get_dynamic_column( 'cont-box-1', 'one_third home-cont-box', 'home-page-column-1' );
				$output .= get_dynamic_column( 'cont-box-4', 'two_third home-cont-box last_column', 'home-page-column-4' );
			    }
			} else { // if "Home Page Column 1" Widget Area width is NOT set to fixed span the two colums equally
			    if ( $cont_1_is_active && $cont_2_is_active && !$cont_3_is_active && !$cont_4_is_active ) {
				$output .= get_dynamic_column( 'cont-box-1', 'one_half home-cont-box', 'home-page-column-1' );
				$output .= get_dynamic_column( 'cont-box-2', 'one_half home-cont-box last_column', 'home-page-column-2' );
			    }
			    if ( $cont_1_is_active && !$cont_2_is_active && $cont_3_is_active && !$cont_4_is_active ) {
				$output .= get_dynamic_column( 'cont-box-1', 'one_half home-cont-box', 'home-page-column-1' );
				$output .= get_dynamic_column( 'cont-box-3', 'one_half home-cont-box last_column', 'home-page-column-3' );
			    }
			    if ( $cont_1_is_active && !$cont_2_is_active && !$cont_3_is_active && $cont_4_is_active ) {
				$output .= get_dynamic_column( 'cont-box-1', 'one_half home-cont-box', 'home-page-column-1' );
				$output .= get_dynamic_column( 'cont-box-4', 'one_half home-cont-box last_column', 'home-page-column-4' );
			    }
			}
			if ( !$cont_1_is_active && $cont_2_is_active && $cont_3_is_active && !$cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-2', 'one_half home-cont-box', 'home-page-column-2' );
			    $output .= get_dynamic_column( 'cont-box-3', 'one_half home-cont-box last_column', 'home-page-column-3' );
			}
			if ( !$cont_1_is_active && $cont_2_is_active && !$cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-2', 'one_half home-cont-box', 'home-page-column-2' );
			    $output .= get_dynamic_column( 'cont-box-4', 'one_half home-cont-box last_column', 'home-page-column-4' );
			}
			if ( !$cont_1_is_active && !$cont_2_is_active && $cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-3', 'one_half home-cont-box', 'home-page-column-3' );
			    $output .= get_dynamic_column( 'cont-box-4', 'one_half home-cont-box last_column', 'home-page-column-4' );
			}
			// 1 active: 4 cases
			if ( $cont_1_is_active && !$cont_2_is_active && !$cont_3_is_active && !$cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-1', 'full_width home-cont-box', 'home-page-column-1' );
			}
			if ( !$cont_1_is_active && $cont_2_is_active && !$cont_3_is_active && !$cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-2', 'full_width home-cont-box', 'home-page-column-2' );
			}
			if ( !$cont_1_is_active && !$cont_2_is_active && $cont_3_is_active && !$cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-3', 'full_width home-cont-box', 'home-page-column-3' );
			}
			if ( !$cont_1_is_active && !$cont_2_is_active && !$cont_3_is_active && $cont_4_is_active ) {
			    $output .= get_dynamic_column( 'cont-box-4', 'full_width home-cont-box', 'home-page-column-4' );
			}

			// home-page-after-content-row-1 Widget Area
			if ( $after_cont_row_1_is_active ) {
                            echo '<div class="clear"></div>';
			    $output .= get_dynamic_column( 'after-cont-row-1', 'full_width home-cont-box', 'home-page-after-content-row-1' );
			}
			// home-page-after-content-row-2 Widget Area
			if ( $after_cont_row_2_is_active ) {
                            echo '<div class="clear"></div>';
			    $output .= get_dynamic_column( 'after-cont-row-2', 'full_width home-cont-box', 'home-page-after-content-row-2' );
			}

                        echo $output;
?>
		      </div>
		      <!-- end main-content-padding -->
		  </div>
		  <!-- end main-content -->
	    </div>
	    <!-- end content-container -->

	    <div class="clear"></div>

<?php	endif; ?>


<?php	get_footer();






