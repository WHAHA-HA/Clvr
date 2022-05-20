<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Create Doctype
$dom = new DOMDocument("1.0", "utf-8");

// Create $piecemaker Element
$piecemaker = $dom->createElement("Piecemaker");
$dom->appendChild($piecemaker);

// Create Contents Child Element
$contents = $dom->createElement("Contents");
$piecemaker->appendChild($contents);


foreach( $pm2_slides_array as $slide_row_number ) {
    if ( $options['pm2_slide_type_'.$slide_row_number] == 'image' ) { // Image
	$pm2_slide_img_src = $options['pm2_slide_img_url_'.$slide_row_number];
	$pm2_slide_img_title = $options['pm2_slide_img_title_'.$slide_row_number];
	$pm2_slider_default_info_txt = $options['pm2_slide_default_info_txt_'.$slide_row_number];
	$pm2_slide_link_url = $options['pm2_slide_link_url_'.$slide_row_number];
	$pm2_slide_link_target = '_'.$options['pm2_slide_link_target_'.$slide_row_number];
	// Create Child Node Image
	$image_node = $dom->createElement("Image");
	$contents->appendChild($image_node);
	// Create Source Attribute Node
	$source_attr = $dom->createAttribute("Source");
	$image_node->appendChild($source_attr);
	// Create Source Attribute Content
	$source_attr_content = $dom->createTextNode($pm2_slide_img_src);
	$source_attr->appendChild($source_attr_content);
	// Create Title Attribute Node
	$title_attr = $dom->createAttribute("Title");
	$image_node->appendChild($title_attr);
	// Create Title Attribute Content
	$title_attr_content = $dom->createTextNode($pm2_slide_img_title);
	$title_attr->appendChild($title_attr_content);
	// Create Text Node
	$text_node = $dom->createElement("Text");
	$image_node->appendChild($text_node);
	// create Text node content
	$text_node_content = $dom->createTextNode($pm2_slider_default_info_txt);
	$text_node->appendChild($text_node_content);
	// Create Hyperlink node
	$hyperlink_node = $dom->createElement("Hyperlink");
	$image_node->appendChild($hyperlink_node);
	// Create Attribute URL
	$url_attr = $dom->createAttribute("URL");
	$hyperlink_node->appendChild($url_attr);
	// Create Attribute Content
	$url_attr_content = $dom->createTextNode($pm2_slide_link_url);
	$url_attr->appendChild($url_attr_content);
	// Create Attribute Target
	$target_attr = $dom->createAttribute("Target");
	$hyperlink_node->appendChild($target_attr);
	// Create Attribute Content
	$target_attr_content = $dom->createTextNode($pm2_slide_link_target);
	$target_attr->appendChild($target_attr_content);
    } elseif ( $options['pm2_slide_type_'.$slide_row_number] == 'flash' ) { // Flash
	$pm2_flash_link_url = $options['pm2_flash_link_url_'.$slide_row_number];
	$pm2_slide_img_title = $options['pm2_slide_img_title_'.$slide_row_number];
	$pm2_slide_img_src = $options['pm2_slide_img_url_'.$slide_row_number];
	// Create Child Node Flash
	$flash_node = $dom->createElement("Flash");
	$contents->appendChild($flash_node);
	// Create Source Attribute Node
	$source_attr = $dom->createAttribute("Source");
	$flash_node->appendChild($source_attr);
	// Create Source Attribute Content
	$source_attr_content = $dom->createTextNode($pm2_flash_link_url);
	$source_attr->appendChild($source_attr_content);
	// Create Title Attribute Node
	$title_attr = $dom->createAttribute("Title");
	$flash_node->appendChild($title_attr);
	// Create Title Attribute Content
	$title_attr_content = $dom->createTextNode($pm2_slide_img_title);
	$title_attr->appendChild($title_attr_content);
	// Create Image Node
	$image_node = $dom->createElement("Image");
	$flash_node->appendChild($image_node);
	// Create Source Attribute Node
	$source_attr = $dom->createAttribute("Source");
	$image_node->appendChild($source_attr);
	// Create Source Attribute Content
	$source_attr_content = $dom->createTextNode($pm2_slide_img_src);
	$source_attr->appendChild($source_attr_content);
    } else { // Video
	$pm2_video_link_url = $options['pm2_video_link_url_'.$slide_row_number];
	$pm2_slide_img_title = $options['pm2_slide_img_title_'.$slide_row_number];
	$pm2_video_width_attr = $options['pm2_video_width_'.$slide_row_number];
	$pm2_video_height_attr = $options['pm2_video_height_'.$slide_row_number];
	$pm2_video_autoplay_attr = ($options['pm2_video_autoplay_'.$slide_row_number] == 'yes') ? 'true' : 'false';
	$pm2_slide_img_src = $options['pm2_slide_img_url_'.$slide_row_number];
	// Create Child Node Flash
	$video_node = $dom->createElement("Video");
	$contents->appendChild($video_node);
	// Create Source Attribute Node
	$source_attr = $dom->createAttribute("Source");
	$video_node->appendChild($source_attr);
	// Create Source Attribute Content
	$source_attr_content = $dom->createTextNode($pm2_video_link_url);
	$source_attr->appendChild($source_attr_content);
	// Create Title Attribute Node
	$title_attr = $dom->createAttribute("Title");
	$video_node->appendChild($title_attr);
	// Create Title Attribute Content
	$title_attr_content = $dom->createTextNode($pm2_slide_img_title);
	$title_attr->appendChild($title_attr_content);
	// Create Title Attribute Node
	$width_attr = $dom->createAttribute("Width");
	$video_node->appendChild($width_attr);
	// Create Title Attribute Content
	$width_attr_content = $dom->createTextNode($pm2_video_width_attr);
	$width_attr->appendChild($width_attr_content);
	// Create Title Attribute Node
	$height_attr = $dom->createAttribute("Height");
	$video_node->appendChild($height_attr);
	// Create Title Attribute Content
	$height_attr_content = $dom->createTextNode($pm2_video_height_attr);
	$height_attr->appendChild($height_attr_content);
	// Create Title Attribute Node
	$autoplay_attr = $dom->createAttribute("Autoplay");
	$video_node->appendChild($autoplay_attr);
	// Create Title Attribute Content
	$autoplay_attr_content = $dom->createTextNode($pm2_video_autoplay_attr);
	$autoplay_attr->appendChild($autoplay_attr_content);
	// Create Image Node
	$image_node = $dom->createElement("Image");
	$video_node->appendChild($image_node);
	// Create Source Attribute Node
	$source_attr = $dom->createAttribute("Source");
	$image_node->appendChild($source_attr);
	// Create Source Attribute Content
	$source_attr_content = $dom->createTextNode($pm2_slide_img_src);
	$source_attr->appendChild($source_attr_content);
    }
}


$settings_array = array( 'ImageWidth'=>"{$options['pm2_image_width']}", 'ImageHeight'=>"{$options['pm2_image_height']}", 'LoaderColor'=>"0x{$options['pm2_loader_color']}", 'InnerSideColor'=>"0x{$options['pm2_inner_side_color']}", 'Autoplay'=>"{$options['pm2_autoplay']}", 'FieldOfView'=>"{$options['pm2_field_of_view']}", 'SideShadowAlpha'=>"{$options['pm2_side_shadow_alpha']}", 'DropShadowAlpha'=>"{$options['pm2_drop_shadow_alpha']}", 'DropShadowDistance'=>"{$options['pm2_drop_shadow_distance']}", 'DropShadowScale'=>"{$options['pm2_drop_shadow_scale']}", 'DropShadowBlurX'=>"{$options['pm2_drop_shadow_blur_x']}", 'DropShadowBlurY'=>"{$options['pm2_drop_shadow_blur_y']}", 'MenuDistanceX'=>"{$options['pm2_menu_distance_x']}", 'MenuDistanceY'=>"{$options['pm2_menu_distance_y']}", 'MenuColor1'=>"0x{$options['pm2_menu_color_1']}", 'MenuColor2'=>"0x{$options['pm2_menu_color_2']}", 'MenuColor3'=>"0x{$options['pm2_menu_color_3']}", 'ControlSize'=>"{$options['pm2_control_size']}", 'ControlDistance'=>"{$options['pm2_control_distance']}", 'ControlColor1'=>"0x{$options['pm2_control_color_1']}", 'ControlColor2'=>"0x{$options['pm2_control_color_2']}", 'ControlAlpha'=>"{$options['pm2_control_alpha']}", 'ControlAlphaOver'=>"{$options['pm2_control_alpha_over']}", 'ControlsX'=>"{$options['pm2_controls_x']}", 'ControlsY'=>"{$options['pm2_controls_y']}", 'ControlsAlign'=>"{$options['pm2_controls_align']}", 'TooltipHeight'=>"{$options['pm2_tooltip_height']}", 'TooltipColor'=>"0x{$options['pm2_tooltip_color']}", 'TooltipTextY'=>"{$options['pm2_tooltip_text_y']}", 'TooltipTextStyle'=>"{$options['pm2_tooltip_text_style']}", 'TooltipTextColor'=>"0x{$options['pm2_tooltip_text_color']}", 'TooltipMarginLeft'=>"{$options['pm2_tooltip_margin_left']}", 'TooltipMarginRight'=>"{$options['pm2_tooltip_margin_right']}", 'TooltipTextSharpness'=>"{$options['pm2_tooltip_text_sharpness']}", 'TooltipTextThickness'=>"{$options['pm2_tooltip_text_thickness']}", 'InfoWidth'=>"{$options['pm2_info_width']}", 'InfoBackground'=>"0x{$options['pm2_info_background']}", 'InfoBackgroundAlpha'=>"{$options['pm2_info_background_alpha']}", 'InfoMargin'=>"{$options['pm2_info_margin']}", 'InfoSharpness'=>"{$options['pm2_info_sharpness']}", 'InfoThickness'=>"{$options['pm2_info_thickness']}" );
// create Settings Child Element
$settings = $dom->createElement("Settings");
$piecemaker->appendChild($settings);
foreach ( $settings_array as $attr_name => $attr_value ) {
	// Create Settings Attribute Node
	$setting_attr = $dom->createAttribute( $attr_name );
	$settings->appendChild($setting_attr);
	// Create Settings Attribute Content
	$setting_attr_value = $dom->createTextNode( $attr_value );
	$setting_attr->appendChild( $setting_attr_value );
}

// create Transitions Child Element
$transitions = $dom->createElement("Transitions");
$piecemaker->appendChild($transitions);
foreach( $pm2_transitions_array as $transition_row_number ) {
	// create Transitions Child Element
	$transition = $dom->createElement("Transition");
	$transitions->appendChild($transition);

	// Create Pieces Attribute Node
	$transition_attr = $dom->createAttribute( 'Pieces' );
	$transition->appendChild($transition_attr);
	// Create Pieces Attribute Content
	$transition_attr_value = $dom->createTextNode( $options['pm2_transition_pieces_'.$transition_row_number] );
	$transition_attr->appendChild( $transition_attr_value );

	// Create Time Attribute Node
	$transition_attr = $dom->createAttribute( 'Time' );
	$transition->appendChild($transition_attr);
	// Create Time Attribute Content
	$transition_attr_value = $dom->createTextNode( $options['pm2_transition_time_'.$transition_row_number] );
	$transition_attr->appendChild( $transition_attr_value );

	// Create Transition Attribute Node
	$transition_attr = $dom->createAttribute( 'Transition' );
	$transition->appendChild($transition_attr);
	// Create Transition Attribute Content
	$transition_attr_value = $dom->createTextNode( $options['pm2_transition_type_'.$transition_row_number] );
	$transition_attr->appendChild( $transition_attr_value );

	// Create Delay Attribute Node
	$transition_attr = $dom->createAttribute( 'Delay' );
	$transition->appendChild($transition_attr);
	// Create Delay Attribute Content
	$transition_attr_value = $dom->createTextNode( $options['pm2_transition_delay_'.$transition_row_number] );
	$transition_attr->appendChild( $transition_attr_value );

	// Create DepthOffset Attribute Node
	$transition_attr = $dom->createAttribute( 'DepthOffset' );
	$transition->appendChild($transition_attr);
	// Create DepthOffset Attribute Content
	$transition_attr_value = $dom->createTextNode( $options['pm2_depth_offset_'.$transition_row_number] );
	$transition_attr->appendChild( $transition_attr_value );

	// Create CubeDistance Attribute Node
	$transition_attr = $dom->createAttribute( 'CubeDistance' );
	$transition->appendChild($transition_attr);
	// Create CubeDistance Attribute Content
	$transition_attr_value = $dom->createTextNode( $options['pm2_cube_distance_'.$transition_row_number] );
	$transition_attr->appendChild( $transition_attr_value );
}


// get complete xml document
$piecemakerXML = $dom->saveXML();

// Checks whether the piecemaker.xml file is writable and save it, otherwise display error message
$pm2_xml_file = TEMPLATEPATH . "/sliders/piecemaker_2/piecemaker.xml";
if ( is_writable($pm2_xml_file) ) {
    $handling = fopen($pm2_xml_file, 'w');
    fwrite($handling, $piecemakerXML);
    fclose($handling);
} else {
    echo '<div id="message" class="error fade"><p>The file ( "'.$pm2_xml_file.'" ) <strong>is not writable!</strong></p>
	    <p style="line-height:1.5;">You will NOT be able to save some of your settings for the the Piecemaker 2 slider unless this file is writable.
	    File permissions are the usual cause for this. Please contact your hosting provider\'s technical support
	    to assist you in setting the WordPress file permissions correctly.</p></div>';
}

