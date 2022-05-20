<?php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// this file is called with "include" from "widgets/latestPost-widgets.php file
global $udesign_options;
@$the_post_thumbnail_link = (get_post_meta($num_posts_query->post->ID, 'post_thumbnail', true)) ? get_post_meta($num_posts_query->post->ID, 'post_thumbnail', true) : get_post_meta($num_posts_query->post->ID, 'thumbnail', true);
$default_thumb = get_bloginfo('template_url') . '/styles/common-images/default-thumb.png';
$shadow_class = ($thumb_frame_shadow == '' | $thumb_frame_shadow == false) ? '': ' frame-shadow'; // $thumb_frame_shadow is set in 'latestPost-widget.php' file
// the case when "Get The Image" plugin is available (installed and activated)
if ( function_exists('get_the_image') ) { 
	if ( $udesign_options['default_thumb_on'] == 'yes' ) { // Default thumbnail option is selected
		$the_thumb_html_as_array = get_the_image( array(
				    'meta_key' => array('post_thumbnail','thumbnail'),
                                    'format' => 'array',
				    'size' => 'full',
				    'default_image' => $default_thumb,
				    'link_to_post' => false,
				    'image_scan' => true,
				    'width' => $post_thumb_width,
				    'height' => $post_thumb_height,
                                    'cache' => false,
				    'echo' => false,
				) );
	} else { // Default thumbnail option is NOT selected
		$the_thumb_html_as_array = get_the_image( array(
				    'meta_key' => array('post_thumbnail','thumbnail'),
                                    'format' => 'array',
				    'size' => 'full',
				    'default_image' => false,
				    'link_to_post' => false,
				    'image_scan' => true,
				    'width' => $post_thumb_width,
				    'height' => $post_thumb_height,
                                    'cache' => false,
				    'echo' => false,
				) );
	}
	echo ( $the_thumb_html_as_array['src'] ) ? '<div class="small-custom-frame-wrapper alignleft'.$shadow_class.'"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><a href="'.get_permalink().'" title="'.the_title('', '', false).'"><img src="'.udesign_process_image( $the_thumb_html_as_array['url'], $post_thumb_width, $post_thumb_height, true, '', false ).'" width="'.$post_thumb_width.'" height="'.$post_thumb_height.'" alt="'.$the_thumb_html_as_array['alt'].'" /></a></div></div></div>' : '';
	
} else { // the case when "Get The Image" plugin is NOT available
	if ( $udesign_options['default_thumb_on'] == 'yes' ) { // Default thumbnail option is selected
	    if ( $the_post_thumbnail_link ) { // look for the thumbnail passed as a 'post_thumbnail' or 'thumbnail' custom field ?>
                    <div class="small-custom-frame-wrapper alignleft<?php echo $shadow_class; ?>"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo udesign_process_image( $the_post_thumbnail_link, $post_thumb_width, $post_thumb_height, true, '', false ); ?>" width="<?php echo $post_thumb_width; ?>" height="<?php echo $post_thumb_height; ?>" alt="<?php the_title(); ?>" /></a></div></div></div>
<?php	    } else { // load default thumbnail image ?>
		    <div class="small-custom-frame-wrapper alignleft<?php echo $shadow_class; ?>"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo $default_thumb; ?>" width="<?php echo $post_thumb_width; ?>" height="<?php echo $post_thumb_height; ?>" alt="<?php the_title(); ?>" /></a></div></div></div>
<?php	    }
	} else { // Default thumbnail option is NOT selected
	    if ( $the_post_thumbnail_link ) { // look for the thumbnail passed as a 'post_thumbnail' or 'thumbnail' custom field ?>
		    <div class="small-custom-frame-wrapper alignleft<?php echo $shadow_class; ?>"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo udesign_process_image( $the_post_thumbnail_link, $post_thumb_width, $post_thumb_height, true, '', false ); ?>" width="<?php echo $post_thumb_width; ?>" height="<?php echo $post_thumb_height; ?>" alt="<?php the_title(); ?>" /></a></div></div></div>
<?php	    }
	}
}


