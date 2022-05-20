<?php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Display or retrieve the current post thumbnail from a custom field
 * or image attached to the post.
 *
 * @param string $curr_post_ID The current post ID.
 * @param string $num_cols Optional. Specifies the number of columns for the Portfolio page template layout.
 * @param string $width Optional. The width of the thumbnail in px.
 * @param string $height Optional. The height of the thumbnail in px.
 * @param string $do_not_link_adjacent_items Optional. An option to not link adjacent items in a category as gallery. Either 'yes' or 'no' (default)
 * @param bool $echo Optional, default to true. Whether to display or return.
 * @return string HTML string if $echo parameter is false.
 */
function get_portfolio_item_thumbnail( $curr_post_ID, $num_cols='3', $width='260', $height='160', $do_not_link_adjacent_items = 'no', $echo = true ) {

    global $udesign_options;
    $portfolio_default_thumb = get_bloginfo('template_url') . '/styles/common-images/portfolio-default-thumb.jpg';
    $portfolio_item_thumb = get_post_meta($curr_post_ID, 'portfolio_item_thumb', true);
    $portfolio_item_thumb_retina = get_post_meta($curr_post_ID, 'portfolio_item_thumb_retina', true);
    $portfolio_item_thumb_crop_align = get_post_meta($curr_post_ID, 'portfolio_item_thumb_crop_align', true);
    $portfolio_item_preview = get_post_meta($curr_post_ID, 'portfolio_item_preview', true); // Grab the preview item from the custom field 'portfolio_item_preview', if set.
    $portfolio_item_link = get_post_meta($curr_post_ID, 'portfolio_item_link', true);
    $portfolio_item_link_target = ( get_post_meta($curr_post_ID, 'portfolio_item_link_target', true) == '_blank' ) ? ' target="_blank"' : '';
    $portfolio_item_image_attachments = get_post_meta($curr_post_ID, 'portfolio_item_image_attachments', true);
    $portfolio_item_offset_image_attachments = get_post_meta($curr_post_ID, 'portfolio_item_offset_image_attachments', true);
    $portfolio_item_link_rel = get_post_meta($curr_post_ID, 'portfolio_item_link_rel', true);
    if( $portfolio_item_link_rel ) $portfolio_item_link_rel = ' '.$portfolio_item_link_rel;
    $output = $last_output = '';
    if ( $portfolio_item_link )  {
        $rel_attr = ' rel="'.trim($portfolio_item_link_rel).'"';
        $preview_item = __( $portfolio_item_link );
    } else {
        if( $portfolio_item_image_attachments == 'yes') {
            $rel_attr = ' rel="wp-prettyPhoto[portfolio-'.rand(1,1000).']'.$portfolio_item_link_rel.'"';
            $last_output = udesign_get_image_attachments( $curr_post_ID, $rel_attr, $portfolio_item_offset_image_attachments, false );
        } else {
            $rel_attr = ( $do_not_link_adjacent_items == 'yes' ) ? ' rel="wp-prettyPhoto'.$portfolio_item_link_rel.'"' : ' rel="wp-prettyPhoto[portfolio]'.$portfolio_item_link_rel.'"';
        }
        $preview_item = $portfolio_item_preview;
    }
    $preview_item_title = do_shortcode( esc_html__( get_post_meta($curr_post_ID, 'portfolio_item_preview_title', true) ) ); // Grab the preview item title the custom field 'portfolio_item_preview_title', if set.

    if ( function_exists('get_the_image') ) { // the case when "Get The Image" plugin is available (installed and activated)
	    $portfolio_thumb_as_array = get_the_image( array(
				'meta_key' => array('portfolio_item_thumb'),
				'format' => 'array',
				'size' => 'full',
				'default_image' => $portfolio_default_thumb,
				'link_to_post' => false,
				'image_scan' => true,
			    ) );
	    if ( $preview_item == '' && ( $portfolio_thumb_as_array['src'] != $portfolio_default_thumb ) ) { $preview_item = $portfolio_thumb_as_array['src']; }
	    if ( $preview_item ) { // if preview item is available, go ahead and generate the thumbnail as a link
		$output .= '<span class="portfolio-zoom-image-'.$num_cols.'-col pngfix"> </span>';
		$output .= '<a'.$rel_attr.' href="'.$preview_item.'" title="'.$preview_item_title.'"'.$portfolio_item_link_target.'><img class="hover-opacity" src="'.udesign_process_image( $portfolio_thumb_as_array['url'], $width, $height, true, $portfolio_item_thumb_crop_align, $portfolio_item_thumb_retina ).'" width="'.$width.'" height="'.$height.'" alt="'.$portfolio_thumb_as_array['alt'].'" /></a>';
	    } else { // if preview item is NOT available, generate a thumbnail that is NOT a link
		$output .= '<span class="portfolio-zoom-image-'.$num_cols.'-col pngfix"> </span>';
		$output .= '<img class="hover-opacity" src="'.udesign_process_image( $portfolio_thumb_as_array['url'], $width, $height, true, $portfolio_item_thumb_crop_align, $portfolio_item_thumb_retina ).'" width="'.$width.'" height="'.$height.'" alt="'.esc_attr__('Preview item is not available!.', 'udesign').'" />';
	    }

    } else { // the case when "Get The Image" plugin is NOT available
	    if ( !$portfolio_item_preview ) { // Check if an image is found in the post and assign it as the large preview image.
		if ( function_exists('get_image_url') && findImage() ) {
		    $portfolio_item_preview = get_image_url();
                    if ( !$preview_item ) { // when there's no preview_item nor a link specified but the image can be pulled from the content
                        $preview_item = $portfolio_item_preview; 
                    }
		}
	    }
	    if( $portfolio_item_thumb ) { // thumbnail is provided
		if ( $preview_item ) { // if preview item is available, go ahead an link it to the thumbnail.
		    $output .= '<span class="portfolio-zoom-image-'.$num_cols.'-col pngfix"> </span>';
		    $output .= '<a'.$rel_attr.' href="'.$preview_item.'" title="'.$preview_item_title.'"'.$portfolio_item_link_target.'><img class="hover-opacity" src="'.udesign_process_image( $portfolio_item_thumb, $width, $height, true, $portfolio_item_thumb_crop_align, $portfolio_item_thumb_retina ).'" width="'.$width.'" height="'.$height.'" alt="'.get_the_title().'" /></a>';
		} else { // if preview item is NOT available, generate a thumbnail that is NOT a link
		    $output .= '<span class="portfolio-zoom-image-'.$num_cols.'-col pngfix"> </span>';
		    $output .= '<img class="hover-opacity" src="'.udesign_process_image( $portfolio_item_thumb, $width, $height, true, $portfolio_item_thumb_crop_align, $portfolio_item_thumb_retina ).'" width="'.$width.'" height="'.$height.'" alt="'.esc_attr__('Preview image not available!.', 'udesign').'" />';
		}
	    } elseif ( $preview_item ) { // auto generate thumbnails
		$output .= '<span class="portfolio-zoom-image-'.$num_cols.'-col pngfix"> </span>';
		$output .= '<a'.$rel_attr.' href="'.$preview_item.'" title="'.$preview_item_title.'"'.$portfolio_item_link_target.'><img class="hover-opacity" src="'.udesign_process_image( $portfolio_item_preview, $width, $height, true, $portfolio_item_thumb_crop_align, $portfolio_item_thumb_retina ).'" width="'.$width.'" height="'.$height.'" alt="'.get_the_title().'" /></a>';
	    } else { // Display default thumbnail image
		$output .= '<span class="portfolio-zoom-image-'.$num_cols.'-col pngfix"> </span>';
		$output .= '<img class="hover-opacity" src="'.udesign_process_image( $portfolio_default_thumb, $width, $height, true, $portfolio_item_thumb_crop_align, $portfolio_item_thumb_retina ).'" alt="'.esc_attr__("Default Image", 'udesign').'" width="'.$width.'" height="'.$height.'" />';
	    }
    }
    $output .= $last_output;
    if ( $echo )
	echo $output;
    else
	return $output;
}


/**
 * Get image attachemnts from a post. Return the images as HTML links with 'rel' attribute added to them so that prettyPhoto can use them.
 * The images are made invisible with inline CSS. 
 *
 * @param string $postID A post ID.
 * @param string $rel_attr The rel attribute, e.g. ' rel="wp-prettyPhoto[portfolio]"'
 * @param string $offset The number of items to skip over
 * @param bool $echo Optional, default to true. Whether to display or return.
 * @return string HTML string if $echo parameter is false.
 */
function udesign_get_image_attachments( $postID, $rel_attr, $offset = '0', $echo = true ) {
    $output = '';
    $args = array(
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_type'      => 'attachment',
            'post_parent'    => $postID,
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1,
    );
    $attachments = get_children( $args );
    if ($attachments) {
        $num_of_attachments = count( $attachments );
        $start = ( $offset > 0 ) ? $offset-- : 0;
        $stop = ( $limit > 0 ) ? $limit+$start : $num_of_attachments;
        $i = 0;
        foreach ($attachments as $attachment) {
            if ($start <= $i and $i < $stop) {
                $image_title = apply_filters('the_title', $attachment->post_title);
                $image_alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
                $image_attributes = wp_get_attachment_image_src($attachment->ID, 'full');
                $image_src = $image_attributes[0];
                $image_width = $image_attributes[1];
                $image_height = $image_attributes[2];
                $output .= '<a style="display:none;"' . $rel_attr . ' href="' . $image_src . '" title="' . $image_alt . '"' . $portfolio_item_link_target . '><img src="' . $image_src . '" width="' . $image_width . '" height="' . $image_height . '" alt="' . $image_title . '"></a>';
            }
            $i++;
        }
    }
    if ( $echo )
	echo $output;
    else
	return $output;
}