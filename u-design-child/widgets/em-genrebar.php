<?php
/**
 * @author venelin
 * Standard film searchbar widget
 */

class DFS_Widget_GenreBar extends WP_Widget {

	var $defaults;

    /** constructor */
    function DFS_Widget_GenreBar() {
    	$this->defaults = array(
    		'title' => __('Select Genre','dbem'),
    		'scope' => 'all',
			'no_genres_text' => __('No genres', 'dbem')
    	);

    	$widget_ops = array('description' => __( "Display a gener filter.", 'dbem') );
        parent::WP_Widget(false, $name = 'Genre Filter', $widget_ops);
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

		$instance['owner'] = false;
		//orderby fix for previous versions with old orderby values

		$all_genres = get_all_genres();

		?>

		<div class="genreBar">
			<select class="genrefilter">
				<option value="0">All Genres</option>
             <?php
              		echo apply_filters('the_genre_siderbar_select',$all_genres);
             ?>
             </select>
             <input type="button" value="Go" name="btn_go_genre">
		 </div>
		 <div class="clear"></div>
		 <p><a href="<?php echo site_url('login');?>" class="yellow">Login</a> to view custom schedule</p>
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
        <?php
        echo $args['after_widget'];
    }


}
add_action('widgets_init', create_function('', 'return register_widget("DFS_Widget_GenreBar");'));
?>
