<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$secial_break_char = mb_convert_encoding('&#1217;', 'UTF-8', 'HTML-ENTITIES');

$piecemakerXML = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<Piecemaker>
    <Settings>
	<imageWidth>{$pm_image_width}</imageWidth>
	<imageHeight>{$pm_image_height}</imageHeight>
	<segments>{$pm_segments}</segments>
	<tweenTime>{$pm_tween_time}</tweenTime>
	<tweenDelay>{$pm_tween_delay}</tweenDelay>
	<tweenType>{$pm_tween_type}</tweenType>
	<zDistance>{$pm_z_distance}</zDistance>
	<expand>{$pm_expand}</expand>
	<shadowDarkness>{$pm_shadow_darkness}</shadowDarkness>
	<autoplay>{$pm_autoplay}</autoplay>
	<textDistance>{$pm_text_distance}</textDistance>
	<textBackground>0x{$pm_text_background}</textBackground>
	<innerColor>0x{$pm_inner_color}</innerColor>
    </Settings>

XML;

$pm_slides_array = explode( ',', $pm_slides_order_str );
foreach( $pm_slides_array as $slide_row_number ) {
    $slide_img_name = $options['pm_slide_img_url_'.$slide_row_number];
    $pm_slider_default_info_txt = preg_replace( '/special_break/', $secial_break_char, $options['pm_slider_default_info_txt_'.$slide_row_number] );
$piecemakerXML .= <<<XML
    <Image Filename="{$slide_img_name}">
	<Text>
	    {$pm_slider_default_info_txt}
	</Text>
    </Image>

XML;
}

$piecemakerXML .= <<<XML
</Piecemaker>
XML;

// Checks whether the piecemakerXML.xml file is writable and save it, otherwise display error message
$pm_xml_file = TEMPLATEPATH . "/sliders/piecemaker/piecemakerXML.xml";
if ( is_writable($pm_xml_file) ) {
    $handling = fopen($pm_xml_file, 'w');
    fwrite($handling, $piecemakerXML);
    fclose($handling);
} else {
    echo '<div id="message" class="error fade"><p>The file ( "'.$pm_xml_file.'" ) <strong>is not writable!</strong></p>
	    <p style="line-height:1.5;">You will NOT be able to save some of your settings for the the Piecemaker slider unless this file is writable.
	    File permissions are the usual cause for this. Please contact your hosting provider\'s technical support
	    to assist you in setting the WordPress file permissions correctly.</p></div>';
}

