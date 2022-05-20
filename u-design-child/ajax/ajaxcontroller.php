<?php
require_once("../../../../wp-load.php");
require_once("../functions.php");
$action = trim($_POST['action']);

//echo $action;
if($action=='get_event_showtimes')
{
	$event_id = trim($_POST['event_id']);
	$date_index =  trim($_POST['date_index']);
	$show_times = get_event_show_times_withlink($event_id, $date_index);
	echo implode(" | ", $show_times);
}else{
	echo "unknown action";
}