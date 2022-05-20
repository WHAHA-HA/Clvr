<?php
/**
 * @author venelin
 * Standard film searchbar widget
 */

class DFS_Widget_FilmFilter extends WP_Widget {

	var $defaults;

    /** constructor */
    function DFS_Widget_FilmFilter() {
    	$this->defaults = array(
    		'title' => __('Sort Films','dbem'),
    		'scope' => 'future',
    		'order' => 'ASC',
    		'limit' => 5,
    		'category' => 0,
    		'nolistwrap' => false,
    		'orderby' => 'filter_start_date,filter_start_time,filter_name',
			'all_filters' => 0,
			'all_filters_text' => __('all filters', 'dbem'),
			'no_filters_text' => __('No filters', 'dbem')
    	);

    	$widget_ops = array('description' => __( "Display a film search bar.", 'dbem') );
        parent::WP_Widget(false, $name = 'Film Search', $widget_ops);
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

		$festival_id = isset($_GET['festival']) ? $_GET['festival']: null;

		$all_programs = get_all_programs($festival_id);
		//get denver festival id
		$sql_festival_id = get_field('festivalid','event-categories_'.$festival_id);
		$all_venues = get_all_venues($sql_festival_id);
		$all_countries = get_all_countries($festival_id);
		$all_genres = get_all_genres($festival_id);
		$all_directors = get_all_directors($festival_id);
		$_GET['festival'] = $festival_id;
		?>

		<div class="filmFinder">
						<ul class="browse">
			                <li class="toggle"><a href="#">By Film Program</a>
			                    <div class="scroll">
			                    	<input type='hidden' name='keyword' value='pro'/>
			                         <?php
			                         	echo apply_filters('the_search_siderbar_select',$all_programs,'pro');
			                         ?>
			                    </div>
                			</li>
			                <li class="toggle"><a href="#">By Country</a>
			                    <div class="scroll">
			                    		<input type='hidden' name='keyword' value='country'/>
			                            <?php
			                         	echo apply_filters('the_search_siderbar_select',$all_countries,'country');
			                         ?>
			                    </div>
                			</li>
                			<li class="toggle"><a href="#">By Genre/Subject</a>
			                    <div class="scroll">
									<input type='hidden' name='keyword' value='genre'/>
		                             <?php
			                         	echo apply_filters('the_search_siderbar_select',$all_genres,'genre');
			                         ?>
			                    </div>
                			</li>
                			<li class="toggle"><a href="#">By Director</a>
			                    <div class="scroll">
			                    	<input type='hidden' name='keyword' value='dir'/>
			                       	 <?php
			                         	echo apply_filters('the_search_siderbar_select',$all_directors,'dir');
			                         ?>
			                    </div>
                			</li>
                			<li class="toggle"><a href="#">By Venue</a>
			                    <div class="scroll">
			                    		<input type='hidden' name='keyword' value='ven'/>
			                          <?php
			                         	echo apply_filters('the_search_siderbar_select',$all_venues,'ven');
			                         ?>
			                    </div>
                			</li>

			            </ul>
			        </div>
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
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of Filters','dbem'); ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" size="3" value="<?php echo esc_attr($instance['limit']); ?>" />
		</p>
        <?php
        echo $args['after_widget'];
    }
}
add_action('widgets_init', create_function('', 'return register_widget("DFS_Widget_FilmFilter");'));
?>
