<?php
/**
 * @author venelin
 * Top Blog commenter widget
 */
function top_comment_authors($limit = 5) {
	global $wpdb;
	$results = $wpdb->get_results('
    SELECT
    COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
    FROM '.$wpdb->comments.'
    WHERE comment_author_email != "" AND comment_type = "" AND comment_approved = 1
    GROUP BY comment_author_email
    ORDER BY comments_count DESC, comment_author ASC
    LIMIT '.$limit
	);
	$output = "<ul>";
	foreach($results as $result) {
		$output .= "<li><a href='".$result->comment_author_url."'>".$result->comment_author."</a></li>";
	}
	$output .= "</ul>";
	echo $output;
}

class Bram_Widget_TopCommenter extends WP_Widget {

	var $defaults;

    /** constructor */
    function Bram_Widget_TopCommenter() {
    	$this->defaults = array(
    		'title' => __('Display Top Commenters','Bram'),
    		'limit'	=> 5,
			'no_commenters_text' => __('No commenters', 'Bram')
    	);

    	$widget_ops = array('description' => __( "Display list of top blog commenters.", 'Bram') );
        parent::WP_Widget(false, $name = 'Top Commenters', $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
    	$instance = array_merge($this->defaults, $instance);

      	if( !empty($instance['title']) ){

		    echo apply_filters('widget_title',$instance['title'], $instance, $this->id_base);

    	}
		?>

		<div class="TopCommenter">
				<?php top_comment_authors($instance['limit']); ?>
		 </div>
		 <div class="clear"></div>

		<?php

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
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'Bram'); ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of Commenters','Bram'); ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" size="3" value="<?php echo esc_attr($instance['limit']); ?>" />
		</p>
        <?php
    }


}
add_action('widgets_init', create_function('', 'return register_widget("Bram_Widget_TopCommenter");'));
?>
