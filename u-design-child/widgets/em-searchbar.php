<?php
/**
 * @author venelin
 * Standard film  widget
 */

class DFS_Widget_SearchBar extends WP_Widget {

	var $defaults;

    /** constructor */
    function DFS_Widget_SearchBar() {
    	$this->defaults = array(
    		'title' => __('Search Festival','dbem'),
    		'button_title' => __('Search', 'dbem'),
			'no_vouchers_text' => __('No Screenings', 'dbem')
    	);

    	$widget_ops = array('description' => __( "Display a search festival box.", 'dbem') );
        parent::WP_Widget(false, $name = 'Search Festival', $widget_ops);
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

    	$parent = get_post($post->post_parent);
		//my_var_dump($_GET);

    		if($parent->post_name=='starz-denver-festival')
    		{
    			$festival = get_term_IDs('event-categories','festivalid',80);
    		}
    		elseif($parent->post_name=='stanley-film-festival')
    		{
    			$festival = get_term_IDs('event-categories','festivalid',85);
    		}
    		else
    		{
    			if(isset($_GET['festival']))
    			{
    				$festival_id = $_GET['festival'];
    			}
    		}
			//my_var_dump($festival);
    		if(is_array($festival))
    		{
    			$festival_id = $festival[0]->term_id;
    			$_GET['festival'] = $festival_id;
    		}

    	?>

		<div class="voucher">
			<form method="get" action="<?php echo  get_permalink(get_page_by_title('Film Search Results'));?>" name="searchform">
						<ul class="browse">
			              	<input type="text" name="keyword" id="keyword"  />
			              	<input type="hidden" name="festival" id="festvial" value="<?php echo $festival_id;?>">
			              	<input type="button" name="btn_search" id="btn_search" onclick="searchform.submit();" value="<?php echo $instance['button_title'];?>"/>
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
add_action('widgets_init', create_function('', 'return register_widget("DFS_Widget_SearchBar");'));
?>
