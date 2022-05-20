<?php 
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	    $gs_image_width = $udesign_options['gs_image_width'];
	    $gs_image_height = $udesign_options['gs_image_height'];
	    $gs_remove_3d_shadow = $udesign_options['gs_remove_3d_shadow'];
?>

	    <!-- embedding SWF -->
	    <script type="text/javascript">
		// <![CDATA[
		var flashvars = {};
		flashvars.xml_file = "<?php bloginfo('template_url'); ?>/sliders/flashmo/grid_slider/load_config_xml.php";
		var params = {};
		params.wmode = "transparent";
		var attributes = {};
		attributes.id = "slider";
		swfobject.embedSWF("<?php bloginfo('template_url'); ?>/sliders/flashmo/grid_slider/flashmo_224_grid_slider.swf", "flashmo_slider", "<?php echo $gs_image_width; ?>", "<?php echo $gs_image_height; ?>", "9.0.0", false, flashvars, params, attributes);
		// ]]>
	    </script>
	    <!-- embedding SWF -->

	    <div id="gs-header">
		<div id="header-content">
		    <div class="gs-slideshow">
			<!-- grid slider SWF -->
			<div id="flashmo_slider">
			    <img src="<?php echo $udesign_options['gs_no_js_img']; ?>" width="<?php echo $gs_image_width; ?>" height="<?php echo $gs_image_height; ?>" alt="<?php esc_attr_e('Slider Image', 'udesign'); ?>" class="slide-img" />
			</div>
			<!-- grid slider SWF -->
			<div id="flashmo-slider-responsive">
			    <img src="<?php echo $udesign_options['gs_no_js_img']; ?>" width="<?php echo $gs_image_width; ?>" height="<?php echo $gs_image_height; ?>" alt="<?php esc_attr_e('Slider Image', 'udesign'); ?>" class="slide-img" />
			</div>
		    </div>
		    <!-- end gs-slideshow -->
		</div>
		<!-- end header-content -->

<?php		if ( !$gs_remove_3d_shadow == 'yes' ) : ?>
		    <div class="clear"></div>
		    <div id="gs-shadow" class="container_24 pngfix"> </div>
<?php		endif; ?>
	    </div>
	    <!-- end gs-header -->










