<?php
/**
 * Widget Name: Custom Category Widget
 * Description: A widget that allows to display a single category's descendants.
 * Version: 0.1
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'custom_category_load_widgets' );

/**
 * Register our widget.
 * 'Custom_Category_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function custom_category_load_widgets() {
	register_widget( 'Custom_Category_Widget' );
}

/**
 * Custom Category Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Custom_Category_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Custom_Category_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_categories', 'description' => esc_html__("A list or dropdown of a single category's descendants.", 'udesign') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'custom-category-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'custom-category-widget', esc_html__('U-Design: Custom Category', 'udesign'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$category_id = $instance['category_id'];
		$show_as_dropdown = isset( $instance['show_as_dropdown'] ) ? $instance['show_as_dropdown'] : false;
		$show_post_counts = isset( $instance['show_post_counts'] ) ? $instance['show_post_counts'] : false;
		$show_hierarchy = isset( $instance['show_hierarchy'] ) ? $instance['show_hierarchy'] : false;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
		    echo $before_title . $title . $after_title;

		/* If a category was selected, display it. */
		if ( $category_id ) :
		    if ( $show_as_dropdown ) : ?>
			<ul>
<?php                       $show_option_none = __('Select Category');
                            wp_dropdown_categories( "show_option_none={$show_option_none}&id=cat-{$category_id}&name=cat-{$category_id}&orderby=name&hierarchical={$show_hierarchy}&show_count={$show_post_counts}&use_desc_for_title=0&child_of=".$category_id ); ?>
<script type='text/javascript'>
/* <![CDATA[ */
	var customCatDropdown = document.getElementById("cat-<?php echo $category_id; ?>");
	function onCustomCatChange() {
		if ( customCatDropdown.options[customCatDropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo home_url(); ?>/?cat="+customCatDropdown.options[customCatDropdown.selectedIndex].value;
		}
	}
	customCatDropdown.onchange = onCustomCatChange;
/* ]]> */
</script>
			</ul>
<?php		    else : ?>
			<ul>
<?php			    wp_list_categories( "title_li=&orderby=name&hierarchical={$show_hierarchy}&show_count={$show_post_counts}&use_desc_for_title=0&child_of=".$category_id ); ?>
			</ul>
<?php		    endif;
		endif;

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags for categories. */
		$instance['category_id'] = $new_instance['category_id'];
		$instance['show_as_dropdown'] = $new_instance['show_as_dropdown'];
		$instance['show_post_counts'] = $new_instance['show_post_counts'];
		$instance['show_hierarchy'] = $new_instance['show_hierarchy'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Categories', 'udesign'), 'category_id' => '', 'show_as_dropdown' => false, 'show_post_counts' => false, 'show_hierarchy' => false );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'udesign'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>

		<!-- Show Categories -->
		<p>
			<label for="<?php echo $this->get_field_id( 'category_id' ); ?>"><?php esc_html_e('Category to be displayed:', 'udesign'); ?></label>
			<?php wp_dropdown_categories('show_option_all=Select Category&hierarchical=1&orderby=name&selected='.$instance['category_id'].'&name='.$this->get_field_name( 'category_id' ).'&class=widefat'); ?>

		</p>


		<p>
			<!-- Show as dropdown checkbox -->
			<label for="<?php echo $this->get_field_id( 'show_as_dropdown' ); ?>">
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_as_dropdown'], true ); ?> id="<?php echo $this->get_field_id( 'show_as_dropdown' ); ?>" name="<?php echo $this->get_field_name( 'show_as_dropdown' ); ?>" value="1" <?php checked('1', $instance['show_as_dropdown']); ?> />
			    <?php esc_html_e('Show as dropdown', 'udesign'); ?>
			</label><br />

			<!-- Show post counts checkbox -->
			<label for="<?php echo $this->get_field_id( 'show_post_counts' ); ?>">
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_post_counts'], true ); ?> id="<?php echo $this->get_field_id( 'show_post_counts' ); ?>" name="<?php echo $this->get_field_name( 'show_post_counts' ); ?>" value="1" <?php checked('1', $instance['show_post_counts']); ?> />
			    <?php esc_html_e('Show post counts', 'udesign'); ?>
			</label><br />

			<!-- Show hierarchy checkbox -->
			<label for="<?php echo $this->get_field_id( 'show_hierarchy' ); ?>">
			    <input class="checkbox" type="checkbox" <?php checked( $instance['show_hierarchy'], true ); ?> id="<?php echo $this->get_field_id( 'show_hierarchy' ); ?>" name="<?php echo $this->get_field_name( 'show_hierarchy' ); ?>" value="1" <?php checked('1', $instance['show_hierarchy']); ?> />
			    <?php esc_html_e('Show hierarchy', 'udesign'); ?>
			</label>
		</p>
		
<?php
	}
}


