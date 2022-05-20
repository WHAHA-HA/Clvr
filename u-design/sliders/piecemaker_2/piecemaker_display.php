<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	    $piecemaker_swf = 'piecemaker.swf';
	    $pm2_image_width = $udesign_options['pm2_image_width'];
	    $pm2_image_height = $udesign_options['pm2_image_height'];
?>

	    <div id="piecemaker-header">
		<div id="header-content" class="container_24">
		    <div id="piecemaker-wrapper">
			<div id="flashcontent">
			    <img src="<?php echo $udesign_options['pm2_no_js_img']; ?>" width="<?php echo $pm2_image_width; ?>" height="<?php echo $pm2_image_height; ?>" alt="<?php esc_attr_e('Slider Image', 'udesign'); ?>" class="slide-img" />
			    <div class="clear"></div>
			</div>
			<!-- end flashcontent -->
			<div id="flashcontent-responsive">
			    <img src="<?php echo $udesign_options['pm2_no_js_img']; ?>" width="<?php echo $pm2_image_width; ?>" height="<?php echo $pm2_image_height; ?>" alt="<?php esc_attr_e('Slider Image', 'udesign'); ?>" class="slide-img" />
			    <div class="clear"></div>
			</div>
			<script type="text/javascript">
			    // <![CDATA[
			    var so = new SWFObject("<?php bloginfo('template_url'); ?>/sliders/piecemaker_2/<?php echo $piecemaker_swf; ?>?random_number=<?php echo rand(1, 10000);?>", "piecemaker-slider", "1100", "455", "10");
			    so.addVariable("cssSource", "<?php bloginfo('template_url'); ?>/sliders/piecemaker_2/piecemaker.css");
			    so.addVariable("xmlSource", "<?php bloginfo('template_url'); ?>/sliders/piecemaker_2/piecemaker.xml");
			    so.addParam("play", "true");
			    so.addParam("menu", "false");
			    so.addParam("scale", "showall");
			    so.addParam("wmode", "transparent");
			    so.addParam("bgcolor", "#F4F4F4");
			    so.addParam("allowfullscreen", "true");
			    so.addParam("allowscriptaccess", "always");
			    so.addParam("allownetworking", "all");
			    so.write("flashcontent");
			    // ]]>
			</script>
		    </div>
		    <!-- end piecemaker-wrapper -->
		</div>
		<!-- end header-content -->
	    </div>
	    <!-- end piecemaker-header -->










