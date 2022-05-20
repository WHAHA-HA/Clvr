<?php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$el_class = '';
extract(shortcode_atts(array(
    'el_class' => '',
), $atts));
?>
<div>
	I am [your_gallery] div wrapper. Extra class name: <?php echo $el_class; ?>
	<?php echo wpb_js_remove_wpautop($content); //Parse inner shortcodes ?>
</div>