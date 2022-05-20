<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Schedule Page
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$festival = trim($_GET['festival']);

//get festival info



if($festival && my_get_term_id('event-categories','2014-starz-denver-film-festival') == $festival ):
get_header('starz');

?>
	<!-- start custom header section -->
				<?php echo get_top_navigation('starz');?>
			</header>

<?php elseif ($festival &&  my_get_term_id('event-categories','2015-stanley-film-festival')== $festival): ?>
	<?php get_header();?>
			<?php echo get_top_navigation('stanley'); ?>
			</header>

<?php else:
	get_header();

?>			<!--  custom header -->
			</header>
<?php endif;?>

<?php       udesign_main_content_top( is_front_page() ); ?>
	<?php
	$input_date = date("Y-m-d", time());
	if(isset($_GET['showdate']))
		$input_date = $_GET['showdate'];
	else
		$input_date = "2013-11-7";
	$print_date = date("l, F j, Y", strtotime($input_date));
	?>
	<div id="page-header-padding">
		<div class="two_third">
			<h1><?php echo $print_date; ?></h1>
			<p>Screenings begin at the film times listed below. Please arrive at least fifteen minutes
		before your scheduled screening allowing enough time to travel to the venue,
		park, enter the venue, purchase popcorn (optional), and find a seat.</p>
		</div>
		<div class="one_third last_column calendar_part">
			<?php

				$calendar_options = array(
					'full'=>0,
					'long_events'=>1,
					'category'=>54,
					'festival'=>1,
					'month' => 11,
					'festival_start_date'=>'2013-11-6',
					'festival_end_date'=>'2013-11-17');
				echo EM_Calendar::output($calendar_options);
			 ?>
		</div>
	</div>
	<?
			$content_position = "grid_24";
	?>
<div id="main-content-loginPage" class="<?php echo $content_position; ?>">
	<div class="main-content-padding loginPage" >
	<!-- 		display custom calendar -->
	<?php
		//echo EM_Calendar::output(array('full'=>0, 'long_events'=>1));
		//sohw full calendar specific to festival
		//echo do_shortcode("[fullcalendar category='36' ]");


		//echo EM_Calendar::output(array('full'=>0, 'long_events'=>1));
		//$date = date("Y-m-d", time());

	?>
	<?php
	 	//customized schedule
	//Firstly, let's check for a limit/offset here, because if there is we need to remove it and manually do this
		$args = apply_filters('em_events_output_args', EM_Events::get_default_search($args));



		if(isset($_GET['festival']))
			$args['category'] = $_GET['festival'];
		$args['scope'] = date("Y-m-d",strtotime($input_date));
		$limit = ( !empty($args['limit']) && is_numeric($args['limit']) ) ? $args['limit']:false;
		$offset = ( !empty($args['offset']) && is_numeric($args['offset']) ) ? $args['offset']:0;
		$page = ( !empty($args['page']) && is_numeric($args['page']) ) ? $args['page']:1;
		$args_count = $args;
		$args_count['limit'] = false;
		$args_count['offset'] = false;
		$args_count['page'] = false;


		$events_count = EM_Events::count($args_count);

		//$args['calendar_day'] = strtotime("2014-09-05");
		//this is the most important part we have to update
		$events = EM_Events::get( $args );

		//srt events by start_time
		//my_var_dump($events);

		$venues = array();
		//echo $events_count;
		//get all venues for a day
	//	echo '<pre>';
		foreach($events as $EM_Event)
		{
			$screenings = get_field('screenings', $EM_Event->post_id);
			my_var_dump($screenings);

			$venue= get_event_venue($EM_Event->post_id, $input_date);

			$venues[] = $venue;
		}
		$venues = array_unique($venues);
		my_var_dump($venues);
		if(count($venues)==0)
			$venues[] = '200';

		//echo '</pre>';
		$showtime_range = get_showtime_range($events);
		/* echo"<pre>";
		print_r($showtime_range);
		echo "</pre>"; */
		$slot_interval = 1800;
	?>
	<div style="width:100%; position:relative;" class="myschedule_wrapper">
		<table border="0" class="timetable">
			<thead>
				<th class="time-axis"><?php echo date("y/m/d",strtotime($input_date)); ?></th>
				<!-- 	shows venues -->
				<?php
					$index =0;
					foreach($venues as $venue) :
						$venue_title = get_the_title($venue);
						echo "<th class='tbl_slot_column' id='tbl_column_{$index}'>{$venue_title}</th>";
						$index++;
					endforeach;
					//get earliest start time and latest end time
					$min_time= (int)(floor((min($showtime_range) % 86400)/$slot_interval))*$slot_interval;
					$max_time= (int)(ceil((max($showtime_range) % 86400)/$slot_interval))*$slot_interval;

				?>
			</thead>
			<tbody>
				<?php
					//add time lines
					$time = $min_time;

					while($time <= $max_time+3* $slot_interval )
					{
						echo '<tr>';
						$offset_index = $time / $slot_interval;
						echo "<td class='timeaxis' id='slotaxis-{$offset_index}'>".(($offset_index %2 ==0)?date("h:i A",$time): '')."</td>";
						foreach($venues as $venue)
							echo "<td>&nbsp;</td>";
						echo "</tr>";
						$time += $slot_interval;
					}
				?>
			</tbody>
		</table>
		<table id="myschedule_overlay">
			<tr>
			<td class="axis"></td>
			<?php
				$venue_index = 0;
			 	foreach($venues as $venue):

					echo "<td class='td_slot_column' id='venue_{$venue_index}'></td>";
			 		$venue_index++;
				endforeach;
			?>
			</tr>
		</table>
	</div>
	</div>
</div>
<script type="text/javascript" src="<?=CUSTOM_STYLE_DIR.'/js/overlay.js'?>"></script>
<script type="text/javascript">
//drawing
jQuery(document).ready(function(){
	var venues = eval('<?php echo json_encode($venues); ?>');
	var schedules = eval('<?php echo wpfc_em_ajax_mine($events);?>');
	var mintime = eval('<?php echo $min_time;?>');
	var maxtime = eval('<?php echo $max_time;?>');
	console.log(venues);
	console.log(schedules);
	console.log(schedules.length);
	//mintime - timstamp
	//maxtime - timestamp
	console.log(new Date(mintime*1000));
	console.log(new Date(maxtime*1000));
	var dt = new Date();
	var tz_offset = dt.getTimezoneOffset();
	if(schedules.length>1)
	{
		var startIndex = mintime/3600 * 2  + 1;
		var unit_height = jQuery("table.timetable td.timeaxis#slotaxis-"+startIndex).outerHeight();
		for (var i=0; i< schedules.length; i++)
		{
			console.log(schedules[i].start);
			var timestamp = Date.parse(schedules[i].start);
			timestamp = (timestamp / 1000) % 86400;
			timestamp = (timestamp - tz_offset * 60) % 86400;
			//get top position
			//var unit_height = jQuery("table.timetable td.timeaxis").height();
			//36 used for margin height


			var off_top = ((timestamp-mintime)/1800) * unit_height;
			console.log(timestamp + ":" + mintime + ":" + off_top + ":" + unit_height);
			//var container = ".myschedule_wrapper #myschedule_overlay td.td_slot_column#venue_0";
			var venueIndex = 0;
			if(schedules[i].venue[0]=="")
				venueIndex = 0;
			else
			{
				for(var j=0;j<venues.length; j++)
					if(venues[j] == schedules[i].venue[0])
						venueIndex = j;
				venueIndex = venues.length-1;
			}
			var container = ".myschedule_wrapper #myschedule_overlay td.td_slot_column:eq("+venueIndex+ ")";
			var outTime = new Date(schedules[i].start).toLocaleTimeString();
			var outTitle = "<a href='"+schedules[i].url+ "'>" + schedules[i].title +"</a><br/>";
			var new_div = "<div class='unit_schedule' id='unit_box_"+i+"'>"+outTitle +" " +outTime+ ", Venue: "+ schedules[i].venue + " " +  schedules[i].duration+"minutes"+   "</div>";
			var new_top = off_top;
			var zindex = off_top / unit_height;
			var new_left=  jQuery(container).position().left;
			var new_width = jQuery(container).outerWidth();
			// var new_height = (schedules[i].duration / 30 ) * unit_height;
			var new_height = 50;
			var newdiv_id = ".unit_schedule#unit_box_"+i;
			jQuery(container).append(new_div);
			jQuery(newdiv_id).width(new_width).height(new_height).css({top: new_top ,left: new_left }).zIndex(zindex+3);
			console.log(schedules[i].venue);
		}
	}
});
</script>
<!-- sidebar -->
<?php //	if( ( !$udesign_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar4') ) { get_sidebar('PagesSidebar4'); } ?>
 <div class="clear"></div>
<?php
get_footer();