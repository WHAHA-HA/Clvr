<?php
/**
 * @author venelin
 * Standard film searchbar widget
 */

class DFS_Widget_RedeemVoucher extends WP_Widget {

	var $defaults;

    /** constructor */
    function DFS_Widget_RedeemVoucher() {
    	$this->defaults = array(
    		'title' => __('Redeem Voucher','dbem'),
    		'button_title' => __('Redeem', 'dbem'),
			'no_vouchers_text' => __('No Vouchers', 'dbem')
    	);

    	$widget_ops = array('description' => __( "Display a redeem voucher form.", 'dbem') );
        parent::WP_Widget(false, $name = 'Redeem Voucher', $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
    	$instance = array_merge($this->defaults, $instance);
    	//$instance = $this->fix_scope($instance); // depcreciate

    	echo $args['before_widget'];
    	if( !empty($instance['title']) ){
		    echo $args['before_title'];
		    echo apply_filters('widget_title',$instance['title'], $instance, $this->id_base);
		    echo $args['after_title'];
    	}


		?>

		<div class="voucher">
			<form method="post" action="#">
						<ul class="browse">
			              	<p>
			              	If you have a ticket voucher, enter the voucher number below.
			              	</p>
			              	<input type="text" name="voucher_code" id="voucher_code" placeholder="code" />
			              	<input type="button" name="btn_voucher" id="btn_voucher" value="<?php echo $instance['button_title'];?>"/>
			            </ul>
			            </form>
			        </div>
		<div class="clear"></div>
		<?php
	    echo $args['after_widget'];
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
    	foreach($this->defaults as $key => $value){
    		if( !isset($new_instance[$key]) ){
    			$new_instance[$key] = $value;
    		}
    	}
    	return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
    	$instance = array_merge($this->defaults, $instance);
            ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'dbem'); ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_title'); ?>"><?php _e('Button Title', 'dbem'); ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id('button_title'); ?>" name="<?php echo $this->get_field_name('button_title'); ?>" value="<?php echo esc_attr($instance['button_title']); ?>" />
		</p>
        <?php
        echo $args['after_widget'];
    }


}
add_action('widgets_init', create_function('', 'return register_widget("DFS_Widget_RedeemVoucher");'));
?>
