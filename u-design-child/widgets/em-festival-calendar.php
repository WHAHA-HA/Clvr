<?php
/**
 * @author Venelin
* Festival Events Calendar Widget
*/
class EM_Widget_FestivalCalendar extends WP_Widget {

	var $defaults = array();

	/** constructor */
	function EM_Widget_FestivalCalendar() {
		$this->defaults = array(
				'title' => __('Festival Calendar','dbem'),
				'long_events' => 0,
				'category' => 0,
				'full' =>0
		);
		$widget_ops = array('description' => __( "Display your events in a Festival Calendar widget.", 'dbem') );
		parent::WP_Widget(false, $name = __('Events FestivalCalendar','dbem'), $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		$instance = array_merge($this->defaults, $instance);

		echo $args['before_widget'];
		if( !empty($instance['title']) ){
			echo $args['before_title'];
			echo apply_filters('widget_title',$instance['title'], $instance, $this->id_base);
			echo $args['after_title'];
		}
		//Shall we show a specific month?
		if ( !empty($_REQUEST['Calendar_day']) ) {
			$date = explode('-', $_REQUEST['Calendar_day']);
			$instance['month'] = $date[1];
			$instance['year'] = $date[0];
		}else{
			$instance['month'] = date("m");
		}

		//Our Widget Content
		if($instance['category']==0)
		{
			echo EM_Calendar::output(apply_filters('em_widget_FestivalCalendar_get_args',$instance));
		}
		else
		{
			$festival = isset($_GET['festival']) ? trim($_GET['festival']) :$instance['category'];

			$festival_post_id = 'event-categories_'.$festival;
			$festival_start_date = get_field('start_date', $festival_post_id);
			$festival_end_date = get_field('end_date', $festival_post_id);

			if(!isset($_GET['showdate']))
				$input_date = $festival_start_date;
			else
				$input_date = $festival_start_date;

			//echo $input_date;
			$calendar_options = array(
					'full'=>0,
					'long_events'=>1,
					'category'=>(int)$_GET['festival'],
					'festival'=>1,
					'month' => (int)date("m",strtotime($input_date)),
					'year'	=> (int)date("Y",strtotime($input_date)),
					'festival_start_date'=>$festival_start_date,
					'festival_end_date'=>$festival_end_date);
			echo EM_Calendar::output($calendar_options);
		}
		echo $args['after_widget'];
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		//filter the new instance and replace blanks with defaults
		$new_instance['title'] = (!isset($new_instance['title'])) ? $this->defaults['title']:$new_instance['title'];
		$new_instance['long_events'] = ($new_instance['long_events'] == '') ? $this->defaults['long_events']:$new_instance['long_events'];
		$new_instance['category'] = ($new_instance['category'] == '') ? $this->defaults['category']:$new_instance['category'];
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
			<label for="<?php echo $this->get_field_id('long_events'); ?>"><?php _e('Show Long Events?', 'dbem'); ?>: </label>
			<input type="checkbox" id="<?php echo $this->get_field_id('long_events'); ?>" name="<?php echo $this->get_field_name('long_events'); ?>" value="1" <?php echo ($instance['long_events'] == '1') ? 'checked="checked"':''; ?>/>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category IDs','dbem'); ?>: </label>
            <input type="text" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" size="3" value="<?php echo esc_attr($instance['category']); ?>" /><br />
            <em><?php _e('1,2,3 or 2 (0 = all)','dbem'); ?> </em>
        </p>
        <?php
    }

}
add_action('widgets_init', create_function('', 'return register_widget("EM_Widget_FestivalCalendar");'));