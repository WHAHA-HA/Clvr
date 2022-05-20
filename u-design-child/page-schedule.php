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
	<?php get_header('stanley');?>
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

	//retrive some festival info

	$festival_post_id = 'event-categories_'. trim($_GET['festival']);
	$festival_start_date = get_field('start_date', $festival_post_id);
	$festival_end_date = get_field('end_date', $festival_post_id);
	//by default....
	if(!isset($_GET['showdate']))
		$input_date = $festival_start_date;

	$print_date = date("l, F j, Y", strtotime($input_date));
	?>
	<div id="main-page-content" class="content_24" style="padding-top:20px; padding-left:20px;">
		<div class="grid_16">
			<h1><?php echo $print_date; ?></h1>
			<p>Screenings begin at the film times listed below. Please arrive at least fifteen minutes
		before your scheduled screening allowing enough time to travel to the venue,
		park, enter the venue, purchase popcorn (optional), and find a seat.</p>
		</div>
		<div class="grid_8 calendar_part">
			<?php

				 if(!isset($_GET['showdate']))
						$input_date = $festival_start_date;
				// echo $input_date;
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
	 	//customized schedule
	//Firstly, let's check for a limit/offset here, because if there is we need to remove it and manually do this
		$args = array();
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

		//populate venues
		//populate schuedules

		$venues = array();
		$schedules = array();

		foreach($events as $EM_Event)
		{
			$screenings = get_field('screenings', $EM_Event->post_id);
			//my_var_dump($screenings);
			//my_var_dump($EM_Event);
			$venue 			= get_event_venue($EM_Event->post_id, $input_date);
			$schedule 		= get_event_schedule($EM_Event->post_id, $input_date);
			if(!in_array($venue,$venues))
				$venues[] 		= $venue;
			$schedules[] 	= $schedule;
			//include thumbnails
			?>

			<div class="schedule_hover_thumbnail" id="hover_<?php echo $EM_Event->post_id;?>" style="display:none; position: absolute; top:-30px; width:300px; min-height:300px; border:1px solid red; background:#1d1d1d; z-index:1000;">
			<!-- <div class="schedule_hover_thumbnail" id="hover_<?php echo $EM_Event->post_id;?>" style=" position: relative; top:-30px; width:300px; min-height:300px; border:1px solid red; background:#1d1d1d; z-index:1000;">-->
			<?php

					echo get_movie_hover_thumbnail($EM_Event->post_id);
			?>
			</div>
			<?php
		}

		//my_var_dump($venues);
		//my_var_dump($schedules);
		if(count($venues)==0)
			$venues[] = '200';


		$showtime_range = get_showtime_range($events);
		$showtime_range = get_day_screentime_range($schedules);

		//my_var_dump($showtime_range);

		$slot_interval = 1800;
	?>
	<div style="width:100%; position:relative;" class="myschedule_wrapper">
		<table border="0" class="timetable" id="table_canvas">
			<thead>
				<th class="time-axis"><?php // echo date("y/m/d",strtotime($input_date)); ?></th>
				<!-- 	shows venues -->
				<?php
					$index =0;
					foreach($venues as $venue) :
						$venue_title = get_the_title($venue);
						echo "<th class='tbl_slot_column' id='tbl_column_{$index}'><a class='yellow' href='".get_post_permalink($venue)."'>{$venue_title}</a></th>";
						$index++;
					endforeach;
					//get earliest start time and latest end time
					$min_time= (int)(floor((min($showtime_range) % 86400)/$slot_interval))*$slot_interval;
					$max_time= (int)(ceil((max($showtime_range) % 86400)/$slot_interval))*$slot_interval;

					/* echo 'min:'. $min_time;
					echo 'max:'. $max_time; */

				?>
			</thead>
			<tbody>
				<?php
					//add time lines


					if($min_time % 3600 !=0)
						$min_time -= $slot_interval;

					$time = $min_time;

					while($time <= $max_time+4* $slot_interval )
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
	var venues = <?php echo json_encode($venues); ?>;
	var schedules = eval('<?php echo json_encode($schedules);?>');
	var mintime = eval('<?php echo $min_time;?>');
	var maxtime = eval('<?php echo $max_time;?>');
	console.log(venues);
	console.log(schedules);
	console.log(schedules.length);

	//mintime - timstamp
	//maxtime - timestamp
	/* console.log(new Date(mintime*1000));
	console.log(new Date(maxtime*1000)); */
	console.log(mintime);
	console.log(maxtime);
	var dt = new Date();

	if(schedules.length>=1)
	{
		var startIndex = mintime/3600 * 2  + 1;
		var unit_height = jQuery("table.timetable td.timeaxis#slotaxis-"+startIndex).outerHeight();
		for (var i=0; i< schedules.length; i++)
		{
			console.log(schedules[i].start);
			var local_time = new Date(schedules[i].start+ " GMT+0000").toLocaleString();
			console.log(local_time);
			var timestamp = Date.parse(local_time);

			timestamp = (timestamp / 1000) % 86400;
			console.log(timestamp);

			//get top position
			//var unit_height = jQuery("table.timetable td.timeaxis").height();
			//36 used for margin height


			var off_top = ((timestamp-mintime)/1800) * unit_height;
			console.log(timestamp + ":" + mintime + ":" + off_top + ":" + unit_height);
			//var container = ".myschedule_wrapper #myschedule_overlay td.td_slot_column#venue_0";
			var venueIndex = 0;
			if(schedules[i].venue=="")
			{
				venueIndex = 0;
				console.log('here');
			}
			else
			{

				for(var j=0;j<venues.length; j++)
				{

					if(venues[j] == schedules[i].venue)
						venueIndex = j;
				}

			}

			var overlay_container = ".myschedule_wrapper #myschedule_overlay td.td_slot_column:eq("+venueIndex+ ")";
			var container = ".myschedule_wrapper #table_canvas thead tr th.tbl_slot_column#tbl_column_" +venueIndex;
			//console.log(new Date(schedules[i].start).toLocaleTimeString());
			var outtime = new Date(schedules[i].start);//.toLocaleTimeString();
			var ampm = 'AM';
			var h = outtime.getHours();
			var m = outtime.getMinutes();
			if(h>=12){
				if(h>12) h -= 12;
				ampm = 'PM';
			}
			if(m<10) m ='0'+m;

			var outTime = h + ":" + m  + ' ' +ampm;
			var outTitle = "<a class='schedule_hover_source' id='"+schedules[i].event_post_id+"' href='"+schedules[i].url+ "'>" + schedules[i].title +"</a><br/>";
			var new_div = "<div class='unit_schedule'  id='unit_box_"+i+"'>"+outTitle +" " +outTime+ ", " +  schedules[i].duration+" min"+   "</div>";
			var new_top = off_top;
			var zindex = off_top / unit_height;
			//jQuery(container).css('border','1px solid red');
			var new_left=  jQuery(container).position().left;
			//var new_width = jQuery(container).outerWidth();
			var new_width = jQuery(container).outerWidth()-1;
			var new_height = (schedules[i].duration / 30 ) * unit_height;
			if(new_height<50)
				new_height = 50;
			var newdiv_id = ".unit_schedule#unit_box_"+i;
			jQuery(overlay_container).append(new_div);
			jQuery(newdiv_id).width(new_width).height(new_height).css({top: new_top ,left: new_left }).zIndex(1000);
			console.log(schedules[i].venue);
		}
	}

	//event handlers
	//schedule hover


	 // jQuery('table#myschedule_overlay tbody tr td.td_slot_column .unit_schedule a').live('hover',(function(){
	  jQuery('.unit_schedule a.schedule_hover_source').hover(function(e){
		  //alert('in');
		  var id=jQuery(this).attr('id');
		  var target_id = 'hover_'+id;
		  console.log(target_id);
		  var div = jQuery('#'+target_id);
		  div.css('top',jQuery(this).offset().top-30);
		  div.css('left',jQuery(this).offset().left+ jQuery(this).width());

		  div.show();
		  return false;
	  },function(e){
		  var id=jQuery(this).attr('id');
		  var target_id = 'hover_'+id;
		  var div = jQuery('.schedule_hover_thumbnail#'+target_id);
		  div.hide();
	  });
});
</script>
<!-- sidebar -->
<?php //	if( ( !$udesign_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar4') ) { get_sidebar('PagesSidebar4'); } ?>
 <div class="clear"></div>
<?php
get_footer();