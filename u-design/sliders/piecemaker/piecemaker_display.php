<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	    $piecemaker_swf = ( !$udesign_options['pm_remove_3d_shadow'] == 'yes' ) ? 'piecemaker.swf': 'piecemakerNoShadow.swf';
	    $pm_image_width = $udesign_options['pm_image_width'];
	    $pm_image_height = $udesign_options['pm_image_height'];
?>

	    <div id="piecemaker-header">
		<div id="header-content" class="container_24">
		    <div id="piecemaker-wrapper">
			<div id="flashcontent">
			    <img src="<?php echo $udesign_options['pm_no_js_img']; ?>" width="<?php echo $pm_image_width; ?>" height="<?php echo $pm_image_height; ?>" alt="<?php esc_attr_e('Slider Image', 'udesign'); ?>" class="slide-img" />
			    <div class="clear"></div>
<?php			    if ( !$udesign_options['pm_remove_3d_shadow'] == 'yes' ) : ?>
				<div id="pm-shadow" class="pngfix"> </div>
<?php			    endif; ?>
			</div>
			<!-- end flashcontent -->
			<div id="flashcontent-responsive">
			    <img src="<?php echo $udesign_options['pm_no_js_img']; ?>" width="<?php echo $pm_image_width; ?>" height="<?php echo $pm_image_height; ?>" alt="<?php esc_attr_e('Slider Image', 'udesign'); ?>" class="slide-img" />
			    <div class="clear"></div>
			</div>
			<script type="text/javascript">
			    // <![CDATA[
			    var so = new SWFObject("<?php bloginfo('template_url'); ?>/sliders/piecemaker/<?php echo $piecemaker_swf; ?>?random_number=<?php echo rand(1, 10000);?>", "piecemaker-slider", "1100", "455", "10");
			    so.addParam("menu", "false");
			    so.addParam("wmode", "transparent");
			    so.addParam("bgcolor", "#F4F4F4");
			    so.addVariable("xmlSource", "<?php bloginfo('template_url'); ?>/sliders/piecemaker/piecemakerXML.xml");
			    so.addVariable("cssSource", "<?php bloginfo('template_url'); ?>/sliders/piecemaker/piecemakerCSS.css");
			    so.write("flashcontent");
			    // ]]>
			</script>
		    </div>
		    <!-- end piecemaker-wrapper -->
		</div>
		<!-- end header-content -->
	    </div>
	    <!-- end piecemaker-header -->










