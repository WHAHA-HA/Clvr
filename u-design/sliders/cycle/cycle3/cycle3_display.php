<?php 
            if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	    $c3_slides_array = explode( ',', $udesign_options['c3_slides_order_str'] );
	    $hide_controls = ( count($c3_slides_array) < 2 ) ? 'visibility:hidden;': '';
?>


	    <div id="c3-header">
		<div id="header-content" class="container_24">
		    <div class="c3-slideshow">
			    <ul id="c3-slider">
<?php                           foreach( $c3_slides_array as $slide_row_number ) :
				    $c3_slide_link_url = $udesign_options['c3_slide_link_url_'.$slide_row_number];
				    $c3_slide_link_target = $udesign_options['c3_slide_link_target_'.$slide_row_number];
				    $c3_slide_default_info_txt = $udesign_options['c3_slide_default_info_txt_'.$slide_row_number];
				    $c3_slide_img2_url = $udesign_options['c3_slide_img2_url_'.$slide_row_number]; ?>
				    <li>
					<div class="c3-slide-img-wrapper">
                                            <img src="<?php echo $udesign_options['c3_slide_img_url_'.$slide_row_number]; ?>" alt="<?php echo $udesign_options['c3_slide_image_alt_tag_'.$slide_row_number]; ?>" class="slide-img" width="940" height="430" />
					</div>
<?php                                   if ( $c3_slide_img2_url != '' ) : ?>
                                            <div class="sliding-image">
                                                <img src="<?php echo $c3_slide_img2_url; ?>" alt="" class="slide-img" width="940" height="430" />
                                            </div>
<?php                                   endif; ?>
<?php                                   // The slide link (if any)
                                        if ( $c3_slide_link_url ) : ?>
                                            <div class="c3_slide_link_url">
                                                <a target="_<?php echo $c3_slide_link_target; ?>" href="<?php echo $c3_slide_link_url; ?>" title=""><img src="<?php echo get_template_directory_uri(); ?>/styles/common-images/spacer.gif" alt="spacer" width="940" height="430" /></a>
                                            </div>
<?php                                   endif; ?>
<?php                                   // The slide text (if any)
                                        if ( $c3_slide_default_info_txt != '' ) : ?>
                                            <div class="sliding-text">
<?php                                           echo do_shortcode(  $c3_slide_default_info_txt ); ?>
                                            </div>
<?php                                   endif; ?>
				    </li>
<?php				endforeach; ?>
			    </ul>
		    </div>
		    <!-- end c3-slideshow -->
		    <div class="c3-controls">
                        <span id="c3-resumeButton" style="<?php echo $hide_controls; ?>"><a href="" title="<?php esc_attr_e('Play', 'udesign'); ?>" class="pngfix"><?php esc_html_e('Play', 'udesign'); ?></a></span>
                        <span id="c3-pauseButton" style="<?php echo $hide_controls; ?>"><a href="" title="<?php esc_attr_e('Pause', 'udesign'); ?>" class="pngfix"><?php esc_html_e('Pause', 'udesign'); ?></a></span>
                        <div id="c3-nav" style="<?php echo $hide_controls; ?>"></div>
		    </div>

		</div>
		<!-- end header-content -->
	    </div>
	    <!-- end c3-header -->








