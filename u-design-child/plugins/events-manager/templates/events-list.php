<?php
/*
 * Default Events List Template
 * This page displays a list of events, called during the em_content() if this is an events list page.
 * You can override the default display settings pages by copying this file to yourthemefolder/plugins/events-manager/templates/ and modifying it however you need.
 * You can display events however you wish, there are a few variables made available to you:
 *
 * $args - the args passed onto EM_Events::output()
 *
 */


$args = apply_filters('em_content_events_args', $args);
//if( get_option('dbem_css_evlist') ) echo "<div class='css-events-list'>";
	//echo "<h1>Now Playing</h1>";
	echo date("D M j,	 Y", strtotime($args['calendar_day']));
	$param_date = $args['calendar_day'];
	global $EM_Event;
	$EM_Event_old = $EM_Event; //When looping, we can replace EM_Event global with the current event in the loop
	//get page number if passed on by request (still needs pagination enabled to have effect)
	if( !empty($args['pagination']) && !array_key_exists('page',$args) && !empty($_REQUEST['pno']) && is_numeric($_REQUEST['pno']) ){
		$page = $args['page'] = $_REQUEST['pno'];
	}

	$output = "";

	//print_r($args);
	//Can be either an array for the get search or an array of EM_Event objects
	if( is_object(current($args)) && get_class((current($args))) == 'EM_Event' ){


		$func_args = func_get_args();
		$events = $func_args[0];
		$args = (!empty($func_args[1]) && is_array($func_args[1])) ? $func_args[1] : array();
		$args = apply_filters('em_events_output_args', EM_Events::get_default_search($args), $events);
		$limit = ( !empty($args['limit']) && is_numeric($args['limit']) ) ? $args['limit']:false;
		$offset = ( !empty($args['offset']) && is_numeric($args['offset']) ) ? $args['offset']:0;
		$page = ( !empty($args['page']) && is_numeric($args['page']) ) ? $args['page']:1;
		$events_count = count($events);
	}else{

		//Firstly, let's check for a limit/offset here, because if there is we need to remove it and manually do this
		$args = apply_filters('em_events_output_args', EM_Events::get_default_search($args));

		$limit = ( !empty($args['limit']) && is_numeric($args['limit']) ) ? $args['limit']:false;
		$offset = ( !empty($args['offset']) && is_numeric($args['offset']) ) ? $args['offset']:0;
		$page = ( !empty($args['page']) && is_numeric($args['page']) ) ? $args['page']:1;
		$args_count = $args;
		$args_count['limit'] = false;
		$args_count['offset'] = false;
		$args_count['page'] = false;
		$events_count = EM_Events::count($args_count);

		//this is the most important part we have to update
		$events = EM_Events::get( $args );
	}

	//What format shall we output this to, or use default
	$format = ( empty($args['format']) ) ? get_option( 'dbem_event_list_item_format' ) : $args['format'] ;


	//$events = apply_filters('em_events_output_events', $events);

	if ( $events_count > 0 ) {
		$output .= "<ul class='movie_list'>";
		ob_start();
		foreach ( $events as $EM_Event ) {
			//$output .= $EM_Event->output($format)."<br/><br/>";

			//start and end date
			$start_date = $EM_Event->event_start_date;
			$end_date = $EM_Event->event_end_date;


			//PRINT SHOW_TIMES
			$show_dates = get_event_show_dates($EM_Event->post_id);
			//$date_index = date("Y-m-d",strtotime($show_dates[0]));

			if(in_array(date("m/d/Y",strtotime($args['calendar_day'])),$show_dates))
				$date_index = date("Y-m-d", strtotime($param_date));
			else
				$date_index = date("Y-m-d",strtotime($param_date));

            //show with buy ticket link
            $show_times = get_event_show_times_withlink($EM_Event->post_id, $date_index);
			//print content
			$movie_info_array = get_field("movie", $EM_Event->post_id);
			$movie = $movie_info_array;
			if(is_array($movie_info_array))
				$movie = $movie_info_array[0];

			//print movie info

			if(!empty($movie))
				$image=get_movie_image($movie);

			?>		<li>

					<div class="movie_thumb">
					 	<a href="<?php  echo $EM_Event->get_permalink();?>"><img src="<?php echo DENVER_ROOT.$image;?>" width="292" height="158"/></a>
					</div>
					<div class="movie_showtime" style="position: relative;">
						<h4 ><a class="hover_source" href="<?php  echo $EM_Event->get_permalink();?>"><?php echo get_the_title($EM_Event->post_id);?></a></h4>
						<!--  movie hover thumbnail -->
						<div class="hover_thumbnail" style="display:none; position: absolute; top:-30px; width:300px; min-height:300px; border:1px solid red; background:#1d1d1d; z-index:1000;">
							<?php
							global $post;
							$post->ID = $EM_Event->post_id;
							get_template_part('content','event-thumb');
							wp_reset_postdata();
								 ?>
						</div>
						<!-- movie hover thumbnail ends -->
						<p class="yellow">Click on showtimes to buy tickets<br/>
						<strong><span style='color:white'>Showtimes:</span>
						<a class="showtime" href="">
						<?php
							if($show_times)
							{
								//print_r($show_times);
								echo implode(", ", $show_times);
							}else{

								echo date("H:i:sA",strtotime($event->event_start_time));
							}
						?>
						</a>
					 	</strong><br/>
						</p>
					</div>

					</li>
<?php

		}
		$output .= ob_get_clean();
		$output .= "</ul>";
		if( !empty($args['pagination']) && !empty($limit) && $events_count > $limit ){
				$output .= EM_Events::get_pagination_links($args, $events_count);

		}
	} else {
		$output = get_option ( 'dbem_no_events_message' );
	}

	//TODO check if reference is ok when restoring object, due to changes in php5 v 4
	$EM_Event = $EM_Event_old;
	$output = apply_filters('em_events_output', $output, $events, $args);
	echo  $output;


//if( get_option('dbem_css_evlist') ) echo "</div>";
