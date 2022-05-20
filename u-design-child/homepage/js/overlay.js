jQuery(document).ready(function(){
	//init location for overlay
	var ov_container_left = 0;
	var ov_container_top = jQuery("table.timetable tbody").position().top;
	var ov_container_id = ".myschedule_wrapper #myschedule_overlay";
	var ov_container = jQuery(ov_container_id);

	ov_container.css({top:ov_container_top, left:ov_container_left});

	jQuery(ov_container_id +" td.axis").eq(0).css({width: jQuery("table.timetable th.time-axis").css('width')});
	jQuery(ov_container_id +" td.td_slot_column").each(function(index,element){
		//
		var td_width = jQuery("table.timetable th.tbl_slot_column#tbl_column_"+index).width();
		//console.log(element);
		jQuery(element).width(td_width);
	});
});
