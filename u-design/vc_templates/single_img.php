<?php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$el_class = '';
extract(shortcode_atts(array(
    'el_class' => '',
), $atts));
?>
<div>
	I am single image. Extra class name: <?php echo $el_class; ?>
</div>