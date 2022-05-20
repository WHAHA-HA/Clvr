<?php
/**
 * Widget Name: Google Map Widget
 * Description: A widget that allows a Google Map to be added to a sidebar.
 * Version: 0.1
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'google_map_load_widgets' );

/**
 * Register our widget.
 * 'Google_Map_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function google_map_load_widgets() {
	register_widget( 'Google_Map_Widget' );
}

/**
 * Google Map Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Google_Map_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Google_Map_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_googlemap', 'description' => esc_html__('A Google Map widget.', 'udesign') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 350, 'height' => 350, 'id_base' => 'googlemap-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'googlemap-widget', esc_html__('U-Design: Google Map', 'udesign'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$googlemap_code = $instance['googlemap_code'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $googlemap_code )
			echo $googlemap_code;

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		/* Strip slashes (important for text inputs). */
		$instance['googlemap_code'] = stripslashes( $new_instance['googlemap_code'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Google Map', 'udesign'), 'googlemap_code' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
		    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'udesign'); ?></label>
		    <input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<!-- Widget Title: Text Area Input -->
		<p>
		    <label for="<?php echo $this->get_field_id( 'googlemap_code' ); ?>"><?php esc_html_e('Google Map Code:', 'udesign'); ?></label>
		    <textarea id="<?php echo $this->get_field_id( 'googlemap_code' ); ?>" class="code" style="width: 100%;" rows="10" cols="20" name="<?php echo $this->get_field_name( 'googlemap_code' ); ?>"><?php if( $instance['googlemap_code'] ){ echo esc_attr($instance['googlemap_code']); } ?></textarea>
		</p>

<?php
	}
}

