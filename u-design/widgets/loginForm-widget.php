<?php 
/**
 * Widget Name: Login Form Widget
 * Description: A widget that allows a Login Form to be added to a sidebar.
 * Version: 0.1
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'login_form_load_widgets' );

/**
 * Register our widget.
 * 'Login_Form_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function login_form_load_widgets() {
	register_widget( 'Login_Form_Widget' );
}

/**
 * Login Form Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Login_Form_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Login_Form_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'loginform', 'description' => esc_html__('A user login form.', 'udesign') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'loginform-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'loginform-widget', esc_html__('U-Design: Login Form', 'udesign'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;



		global $user_identity, $user_level;
		$redirect = $_SERVER['REQUEST_URI']; ?>
<?php		if ( is_user_logged_in() ) : ?>
		    <?php esc_html_e('You are logged in as', 'udesign'); ?> <strong><?php echo $user_identity ?></strong>.
		    <ul>
			<li><?php wp_register(); ?></li>
			<li><a href="<?php echo esc_url( wp_logout_url( $redirect ) ); ?>"><?php esc_attr_e('Logout', 'udesign'); ?></a></li>
		    </ul>
<?php		else : ?>
		    <ul>
			<div>
			    <form action="<?php echo site_url(); ?>/wp-login.php" method="post">
				<p>
				    <label for="log"><?php esc_html_e('User', 'udesign'); ?><br />
					<input type="text" name="log" id="log" value="<?php echo esc_html( stripslashes($user_login), 1 ) ?>" size="20" />
				    </label><br />
				    <label for="pwd"><?php esc_html_e('Password', 'udesign'); ?><br />
					<input type="password" name="pwd" id="pwd" size="20" />
				    </label>
				    <div>
					<input type="submit" name="submit" value="<?php esc_attr_e('Login', 'udesign'); ?>" class="button" />
					<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php esc_html_e('Remember me', 'udesign'); ?></label>
				    </div>
				</p>
				<input type="hidden" name="redirect_to" value="<?php echo esc_url( $redirect ); ?>"/>
			    </form>
			</div>
<?php			if ( get_option('users_can_register') ) : ?>
			    <li><a href="<?php echo get_bloginfo('url'); ?>/wp-login.php?action=register"><?php esc_attr_e('Register', 'udesign'); ?></a></li>
<?php			endif; ?>
			<li><a href="<?php echo get_bloginfo('url') ?>/wp-login.php?action=lostpassword"><?php esc_attr_e('Recover password', 'udesign'); ?></a></li>
		    </ul>
<?php		endif;





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

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Login Form', 'udesign') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'udesign'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

<?php
	}
}

