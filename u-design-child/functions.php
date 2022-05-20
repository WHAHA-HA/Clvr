<?php
/**
 * DynamiX Child Theme Functions
 * Load languages directory for translation
*/

define('CHILD_DIR', get_stylesheet_directory_uri());
define('CUSTOM_STYLE_DIR', get_stylesheet_directory_uri()."/homepage");
define('DENVER_ROOT', 'http://www.denverfilm.org');
define('DENVER_RESERVE_ROOT',DENVER_ROOT.'/filmcenter/reserve.aspx?');
/**
 * Loads style sheets for own css...
 *
 */

wp_enqueue_style('denver-festival-homepage', CUSTOM_STYLE_DIR . "/css/style.css", false, '1.0', 'screen');
wp_enqueue_style('denver-festival-customscrollbar', CUSTOM_STYLE_DIR . "/css/customscrollbar.css", false, '1.0', 'screen');
wp_enqueue_style('denver-festival-boxslider', CUSTOM_STYLE_DIR . "/css/jquery.bxslider.css", false, '1.0', 'screen');
wp_enqueue_style('denver-festival-sidrdark', CUSTOM_STYLE_DIR . "/css/sidr-dark.css", false, '1.0', 'screen');
wp_enqueue_style('denver-festival-customtheme', CUSTOM_STYLE_DIR . "/css/custom-theme.css", false, '1.0', 'screen');
/**
 * Loads scritps for homepages..
 */
wp_enqueue_script('custom-scrollbar', CUSTOM_STYLE_DIR."/js/jquery-customscrollbar.js", array('jquery'));
wp_enqueue_script('custom-scripts', CUSTOM_STYLE_DIR."/js/jquery-scripts.js", array('jquery'));

wp_enqueue_script('custom-bxslidermin', CUSTOM_STYLE_DIR."/js/jquery.bxslider.min.js", array('jquery'));
wp_enqueue_script('custom-sidrmin', CUSTOM_STYLE_DIR."/js/jquery.sidr.min.js", array('jquery'));
wp_enqueue_script('custom-faqslider', CUSTOM_STYLE_DIR."/js/main.js", array('jquery'));

//news cusotm post type and news category custom taxonomy added automatically by Custom Post Type UI plugin...

function truncate($str, $len) {
	$tail = max(0, $len-10);
	$trunk = substr($str, 0, $tail);
	$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
	return $trunk;
}
add_filter('news_title_filter','dfs_news_filter');

function dfs_news_filter($title)
{
	return truncate($title,40);
}
add_filter('the_content_movie', 'dfs_movie_filter');

function dfs_movie_filter($movie_input,$show_title = FALSE)
{
	//$movie is object.
	//print_r($movie);
	$output = "";
	if($show_title)
		$output .= "<h3>".get_the_title($movie_input)."</h3>";

	$country_val = get_field_object('country', $movie_input->ID);
	$country = trim($country_val['choices'][get_field('country',$movie_input->ID)]);
	if(!empty($country))
		$output .= "<br/>".$country.", ";

	$year = get_field('year', $movie_input->ID);
	if(!empty($year))
		$output .= $year.", ";
	$output .= get_field('duration',$movie_input->ID). " Minute Running Time";
	if(get_movie_genres($movie_input))
	$output .= "<br/>Genre/Subjects: ".get_movie_genres($movie_input);
	/*
	$programs = get_field('program', $movie_input->ID);
	$program_title = array();
	foreach($programs as $program)
		$program_title []= get_the_title($program); */
	//$output .= "<br/>Program: ".implode(", ",$program_title);
	if(get_field('language',$movie_input->ID))
		$output .= "<br/>Language: ".get_field('language',$movie_input->ID);

	$directors = get_movie_directors($movie_input);
	//implode(",", array_unique($director_label));
	if(!empty($directors) && is_array($directors))
		$output .= "<br/><br/><strong>DIRECTOR: </strong>". implode(",",$directors);

	$editors =trim(get_field('editor',$movie_input->ID));
	if(!empty($editors))
		$output .= "<br/><strong>Editor: </strong>".$editors;

	$screenwriters =trim(get_field('screenwriter',$movie_input->ID));
	if(!empty($screenwriters))
		$output .= "<br/><strong>Screenwriter: </strong>".$screenwriters;

	$cinematographers = trim(get_field('cinematographer',$movie_input->ID));
	if(!empty($cinematographers))
	$output .= "<br/><strong>Cinematographer: </strong>".$cinematographers;

	$casts = trim(get_field('principal_cast',$movie_input->ID));
	if(!empty($casts))
		$output .= "<br/><strong>Principal Cast: </strong>".$casts;

	//$output .= "<br/><br/>".html_entity_decode(htmlspecialchars_decode($movie_input->post_content,ENT_QUOTES));

	$output .= "<br/><br/>".htmlspecialchars_decode(utf8_decode(htmlentities($movie_input->post_content, ENT_COMPAT, 'utf-8', false)));
	return $output;
}
function get_movie_hover_thumbnail($post_id)
{
	ob_start();

	?>
<article <?php post_class(); ?> id="post-<?php echo $post_id; ?>">
	<header class="entry-header">

			<?php

				echo '<h1 class="entry-title">'.get_the_title($post_id).'</h1>';

			?>

		</header>
	<!-- .entry-header -->
	<div class="entry" style="font-size: 10px;">
					<?php

	                       $event = em_get_event($post_id,'post_id');

	                       //PRINT SHOW_TIMES
	                       //get all showdates

	                       //print content

		                       $movie_info_array = get_field("movie", $post_id);

/* 							   if($movie_info_array):

		                       	my_var_dump($movie_info_array);
							   else:
							   	echo 'null';
							   endif;
 */
	                       $movie = $movie_info_array;

	                       if(is_array($movie_info_array))
	                       		$movie = $movie_info_array[0];
	                       /* return ob_get_clean(); */
	                       //print movie info
	                       if($movie):
	                       		$image = get_movie_image($movie);

	                       ?>

	                       			 <img src="<?php echo DENVER_ROOT.$image;?>"
			width="292" height="158" />
		<div class="clear"></div>
	                       		<?php

	                       				//get movie info....
	                       				$movie_content = apply_filters('the_content_movie_thumbnail', $movie);
	                       				echo $movie_content;
	                       	endif;
	                       	?>
  				    </div>
</article>
<?php
	return ob_get_clean();
}
add_filter('the_content_movie_thumbnail', 'dfs_movie_thumbnail_filter');

function dfs_movie_thumbnail_filter($movie_input,$show_title = FALSE)
{
	//$movie is object.
	//print_r($movie);
	$output = "";
	if($show_title)
		$output .= "<h3>".get_the_title($movie_input)."</h3>";


	/* $year = get_field('year', $movie_input->ID);
	if(!empty($year))
		$output .= $year.", "; */
	$output .= get_field('duration',$movie_input->ID). " Minutes ";

	$country_val = get_field_object('country', $movie_input->ID);
	$country = trim($country_val['choices'][get_field('country',$movie_input->ID)]);
	if(!empty($country))
		$output .= "/ ".$country."<br/>";

	$iframePos = strpos(htmlspecialchars_decode(utf8_decode(htmlentities($movie_input->post_content, ENT_COMPAT, 'utf-8', false))),'<iframe');


	$cutLength = $iframePos;
	if($cutLength > 350 || !$cutLength)
		$cutLength = 350;
	$output .= substr(htmlspecialchars_decode(utf8_decode(htmlentities($movie_input->post_content, ENT_COMPAT, 'utf-8', false))),0,$cutLength).'...';
	return $output;
}
function convert_url($var)
{
	return DENVER_ROOT.$var;
}
function img_url_change($content)
{
	$string = "<html><body><img src='images/test.jpg' /><img src='http://test.com/images/test3.jpg'/><video controls=\"controls\" src='../videos/movie.ogg'></video></body></html>";
	$string = '<img src="/_uploaded/filmedincolorado100x100_780418.png">';
	//$string2 = preg_replace("~src=[']([^']+)[']~e", '"src=\'" . convert_url("$1") . "\'"', $content);
	$string2 = preg_replace('~src=["]([^"]+)["]~e', '"src=\'" . convert_url("$1") . "\'"', $string);
	echo $string2;
}
add_filter('the_search_siderbar_select', 'search_filter_select',11,2);
function search_filter_select($arr_select,$type)
{
	if(count($arr_select)>0)
	{
		$ret = "<ul>";
		foreach($arr_select as $key=>$value)
		{
			if(!is_array($value))
			{
				$link = $key;
				$text = $value;
				if(isset($_GET['festival']))
					$link .= "&festival={$_GET['festival']}";

				$ret.= "<li><a href='".site_url("movie/?{$type}=$link")."'>".$text."</a></li>";

			}
			else{
				$link = key($value);
				$text = $value[$link];
				if(isset($_GET['festival']))
					$link .= "&festival={$_GET['festival']}";

				$ret.= "<li><a href='".site_url("movie/?{$type}=$link")."'>".$text."</a></li>";

			}

		}
		$ret .= "</ul>";

		return $ret;
	}
	return "";
}
add_filter('the_genre_siderbar_select', 'dfs_genre_filter_select',11,2);
function dfs_genre_filter_select($arr_select,$type)
{
	if(count($arr_select)>0)
	{
		//$ret = "<ul>";

		foreach($arr_select as $key=>$value)
		{
			if(!is_array($value))
				$ret .= "<option value='{$value}'>{$value}</option>";
			else{
				$link = key($value);
				$text = $value[$link];
				$ret.= "<option value='{$link}'>{$text}</option>";
			}
		}

		return $ret;
	}
	return "";
}
//populate all films for festivals
global $festival_movies;
function get_all_festival_movies($festival_id=0)
{
	$args = array (
			'orderby'=>'id',
			'post_type' => 'event',
			'posts_per_page'=>-1,
			'order' => 'DESC',
			'tax_query'=>array(
					array(
							'taxonomy'=>'event-categories',
							'field'=> 'id',
							'terms'=> $festival_id
					)),
	);

	$events = new WP_Query($args);
	$arr_event_movie = array();
	if($events->have_posts()):
	while($events->have_posts () ) :
			$events->the_post ();
			global $post;

			$movie_info_array = get_field ( "movie", $post->ID );
			$movie = $movie_info_array;
			if (is_array ( $movie_info_array ))
				$movie = $movie_info_array [0];

			$arr_event_movie [] = $movie->ID;

			//get film type
			$film_type = get_field ( 'film_type_id', $movie->ID );
			if ($film_type == 4) 			// if it's package movie
			{
				// echo $movie->ID;
				// get package info
				$film_id = get_field ( 'film_id', $movie->ID );
				$package_post_id = get_post_IDs ( 'package', 'film_id', $film_id );
				if($package_post_id>0)
				{
					$packaged_films = get_field ( 'films', $package_post_id );
					//my_var_dump($packaged_films);
					foreach ( $packaged_films as $packaged_film )
						$arr_event_movie [] = $packaged_film->ID;
				}
			}else if ($film_type==1) //feature filmk
			{
				//get shorts if any

					$short_films = get_field ( 'shorts', $movie->ID );
					if($short_films && count($short_films)>0)
					{
						//my_var_dump($packaged_films);
						foreach ( $short_films as $short_film )
							$arr_event_movie [] = $short_film->ID;
					}
			}
		endwhile
		;

	endif;
	return $arr_event_movie;
}
//populate all genres for sidebar
function get_all_programs($festival_id= 0)
{
	$args = array(
		'post_type' => 'program',
		'posts_per_page' => -1,
		'orderby'	=> 'id'
	);
	if($festival_id!=0)
		$args['meta_query'] = array(
				array(
						'key'	=> 'festival',
						'value'	=>  $festival_id,
						'compare' => 'like')
		);
	//my_var_dump($args);
	query_posts($args);
	$arr_programs = array();

	while(have_posts()):
		the_post();
		//$arr_programs[] =get_the_title();
	$arr_programs[get_the_ID()] =get_the_title();
	//very important
	endwhile;
	//use asort to main key value association...
	asort($arr_programs);
	return $arr_programs;
}

function get_all_venues($festival_id)
{
	$args = array(
			'post_type' => 'venue',
			'posts_per_page' => -1
	);
	$venue_category = get_term_IDs('venues', 'festival_id',$festival_id);
	if( $venue_category && is_array($venue_category))
		$venue_category = $venue_category[0];

	//my_var_dump($venue_category);
	if($festival_id!=0)
	{
			$args['tax_query'] = array(
					array(
							'taxonomy'=>'venues',
							'field'=> 'id',
							'terms'=> $venue_category->term_id
					));
	}
	query_posts($args);
	$arr_venues = array();

	while(have_posts()):
		the_post();
		$arr_venues[] =array(get_the_ID()=>get_the_title());
	endwhile;
	sort($arr_venues);
	return $arr_venues;
}
function get_all_directors($festival_id = 0)
{
/* 	$pools = Get_Festival_Movies($festival_id);
	my_var_dump($pools); */
	$ret_directors = array();
	if($festival_id==0)
	{
		global $wpdb;
		$tbl_prefix = $wpdb->prefix;
		$sql = "SELECT distinct(meta_value) FROM `{$tbl_prefix}postmeta` where meta_key = 'director'";
		$results = $wpdb->get_col($sql);

		if( $results && is_array($results) && count($results)>0)
		{
			foreach($results as $result)
			{
				$arr_directors = unserialize($result);
				foreach($arr_directors as $director)
				{
					$ret_directors[]=array($director=>get_the_title($director));
				}
			}
		}
		return $ret_directors;
	}else{
		$all_films = get_all_festival_movies($festival_id);
		foreach($all_films as $festival_movie):
			//get film directors...
			$film_directors = get_movie_directors($festival_movie);
			//my_var_dump($film_directors);
			//save
			if(is_array($film_directors))
			{

				foreach($film_directors as $key=>$film_director):

					$ret_directors [$key] = $film_director;
				endforeach;
			}

		endforeach;
		//reset post data
		wp_reset_postdata();
		ksort($ret_directors);
		return array_unique($ret_directors);
	}

}
function get_all_countries($festival_id=0)
{
	$all_countries = array(
			"0" =>"-All Countries-",
			"1" => "USA"
			,"2" => "Canada"
			,"145" => "Albania"
			,"64" => "Argentina"
			,"3" => "Armenia"
			,"4" => "Australia"
			,"5" => "Austria"
			,"127" => "Bangladesh"
			,"6" => "Belgium"
			,"7" => "Bolivia"
			,"8" => "Bosnia"
			,"70" => "Bosnia and Herzegovina"
			,"9" => "Brazil"
			,"72" => "Bulgaria"
			,"73" => "Burkina Faso"
			,"10" => "Cameroon"
			,"11" => "Central African Republic"
			,"12" => "Chile"
			,"13" => "China"
			,"14" => "Colombia"
			,"144" => "Costa Rica"
			,"15" => "Croatia"
			,"16" => "Cuba"
			,"17" => "Czech Republic"
			,"18" => "Denmark"
			,"19" => "Egypt"
			,"20" => "Estonia"
			,"138" => "Ethiopia"
			,"21" => "Finland"
			,"22" => "France"
			,"23" => "Gabon"
			,"24" => "Georgia"
			,"25" => "Germany"
			,"146" => "Ghana"
			,"26" => "Greece"
			,"129" => "Guinea"
			,"27" => "Herzegovena"
			,"28" => "Hong Kong"
			,"29" => "Hungary"
			,"88" => "Iceland"
			,"30" => "India"
			,"130" => "Indonesia"
			,"31" => "Iran"
			,"137" => "Iraq"
			,"65" => "Ireland"
			,"32" => "Israel"
			,"33" => "Italy"
			,"34" => "Japan"
			,"35" => "Kazakhstan"
			,"139" => "Kenya"
			,"140" => "Kuwait"
			,"36" => "Latvia"
			,"37" => "Lebanon"
			,"38" => "Luxembourg"
			,"98" => "Macedonia"
			,"131" => "Malaysia"
			,"39" => "Mexico"
			,"40" => "Mongolia"
			,"100" => "Montenegro"
			,"41" => "Morocco"
			,"42" => "Netherlands"
			,"43" => "New Zealand"
			,"104" => "Nicaragua"
			,"143" => "Northern Ireland"
			,"44" => "Norway"
			,"45" => "Pakistan"
			,"106" => "Palestine"
			,"107" => "Peru"
			,"108" => "Philippines"
			,"46" => "Poland"
			,"47" => "Portugal"
			,"132" => "Puerto Rico"
			,"133" => "Romania"
			,"147" => "Rwanda"
			,"48" => "Russia"
			,"49" => "Scotland"
			,"134" => "Senegal"
			,"50" => "Serbia"
			,"51" => "Singapore"
			,"141" => "Slovakia"
			,"52" => "Slovenia"
			,"148" => "Slovak Republic"
			,"53" => "South Africa"
			,"54" => "South Korea"
			,"118" => "Soviet Union"
			,"55" => "Spain"
			,"135" => "Sri Lanka"
			,"56" => "Sweden"
			,"57" => "Switzerland"
			,"58" => "Taiwan"
			,"59" => "Thailand"
			,"136" => "Tunisia"
			,"60" => "Turkey"
			,"61" => "Venezuela"
			,"126" => "Vietnam"
			,"62" => "Yugoslavia"
			,"63" => "United Kingdom"
			,"142" => "Uruguay"
			,"66" => "Great Britain"
	);
	if($festival_id!=0)
	{
		//init countries
		$ret_countries = array();

		$all_films = get_all_festival_movies ( $festival_id );
		foreach ( $all_films as $festival_movie ) :
			// get film directors...
			$film_country = get_field('country', $festival_movie );
			// my_var_dump($film_directors);
			// save
			$ret_countries [$film_country] = $all_countries[$film_country];
		endforeach
		;
		// reset post data
		wp_reset_postdata ();
		//key sort, must maintain key values for search...
		ksort ( $ret_countries );
		return array_unique ( $ret_countries);
	}else{
		return $all_countries;
	}

}
function get_all_genres($festival_id=0)
{
	//get adanced custom field - film fields options...
	//return array("Comedy","Coming of Age","Cult","Documentary","Drama","Family Friendly","Film Noir-","Horror","Political","Romance","Thriller","Animation","Social Issues","War","Asian","African-American","Music","Environmenta","Crime","Family Issues","GLBT","Sports","Womens Issues","Colorado","Americana","American Indie","Jewish","Short","Animals","Animated","Religious","Sci-Fi","Teen","Psychological","Art/Filmmaking","Biographical","Historical/Period","Medical/Health","Mexican","Mystery","Literary","Dark Comedy","French/French Canadian","Avant Garde/Experimental","Japan");
	/*  if($festival_id !=0)
	{
		//init genres
		$ret_genres= array();
		//get all films in festival
		$all_films = get_all_festival_movies ( $festival_id );
		foreach ( $all_films as $festival_movie ) :

			$film_genres = get_movie_genres( $festival_movie );
			my_var_dump($film_genres);
			// save
			foreach ( $film_genres as $film_genre ) :
				$ret_genres [] = $film_genre;
			endforeach
			;
		endforeach
		;
		// reset post data
		wp_reset_postdata ();
		sort ( $ret_genres );
		return array_unique ( $ret_genres);
	} */
	return array("1"=>"Action/Adventure"
,"56"=>"Adult"
,"42"=>"African-American"
,"95"=>"African/Af. Amer"
,"61"=>"American Indie"
,"60"=>"Americana"
,"69"=>"Animals"
,"70"=>"Animated"
,"32"=>"Animation"
,"94"=>"Architecture/Design"
,"33"=>"Archival"
,"46"=>"Art"
,"76"=>"Art/Filmmaking"
,"40"=>"Asian"
,"89"=>"Avant Garde/Experimental"
,"47"=>"Based on a Book"
,"77"=>"Biographical"
,"2"=>"Biopic"
,"3"=>"Black Comedy"
,"4"=>"Buddy Picture"
,"88"=>"Classic"
,"57"=>"Colorado"
,"5"=>"Comedy"
,"6"=>"Coming of Age"
,"48"=>"Crime"
,"7"=>"Cult"
,"85"=>"Dark Comedy"
,"8"=>"Detective/Mystery"
,"9"=>"Documentary"
,"10"=>"Drama"
,"45"=>"Educational"
,"44"=>"Environmental"
,"62"=>"Environmental Focus"
,"11"=>"Epic"
,"12"=>"Erotic"
,"13"=>"Experimental"
,"14"=>"Family Friendly"
,"49"=>"Family Issues"
,"15"=>"Fantasy"
,"16"=>"Film Noir"
,"63"=>"Filmmaking Focus"
,"35"=>"Foreign"
,"87"=>"French/French Canadian"
,"17"=>"Gangster"
,"18"=>"Gay/Lesbian"
,"50"=>"GLBT"
,"64"=>"Health and Medicine"
,"38"=>"Historic"
,"78"=>"Historical/Period"
,"65"=>"Historical/Period Film"
,"58"=>"History"
,"19"=>"Horror"
,"93"=>"Human Rights"
,"96"=>"Independent"
,"86"=>"Iran"
,"84"=>"Iran"
,"92"=>"Japan"
,"67"=>"Jewish"
,"91"=>"Korean"
,"41"=>"Latino"
,"83"=>"Literary"
,"82"=>"Local"
,"21"=>"Martial Arts"
,"79"=>"Medical/Health"
,"80"=>"Mexican"
,"66"=>"Mexican Focus"
,"39"=>"Mockumentary"
,"43"=>"Music"
,"22"=>"Musical"
,"81"=>"Mystery"
,"97"=>"Native American"
,"51"=>"Nature"
,"23"=>"Political"
,"75"=>"Psychological"
,"52"=>"Religion"
,"71"=>"Religious"
,"24"=>"Road Movie"
,"25"=>"Romance"
,"26"=>"Romantic Comedy"
,"72"=>"Sci-Fi"
,"27"=>"Science Fiction"
,"68"=>"Short"
,"90"=>"Silent Film"
,"28"=>"Slapstick"
,"34"=>"Social Issues"
,"37"=>"Spiritual"
,"53"=>"Sports"
,"59"=>"Student"
,"54"=>"Substance Abuse"
,"73"=>"Technology/Science"
,"74"=>"Teen"
,"29"=>"Teen Flick"
,"30"=>"Thriller"
,"36"=>"War"
,"31"=>"Western"
,"55"=>"Womens Issues"
,"98"=>"Youth/Teen");
}

add_action('save_post', 'mypost_action');
function mypost_action($post_id)
{
	$post_type = get_post_type($post_id);
	if($post_type=='event')
	{
		$event = get_post($post_id);

		$show_dates = get_field('show_dates', $post_id);
		if(!isset($show_dates) || (count($show_dates)==0))
		{
			echo "no dates.<br/>";
			return;
		}
		$my_event = em_get_event($post_id,'post_id');
		$ret_value = array();
		$ret_value [] = $my_event->event_start_date;
		$ret_value [] = $my_event->event_end_date;
		foreach($show_dates as $subfields)
		{
			if(isset($subfields['show_date']) && !empty($subfields['show_date']))
			{
				//$date_info =  DateTime::createFromFormat('m/d/Y', trim($subfields['show_date']));
				$date_info = DateTime::createFromFormat('m/d/Y', trim($subfields['show_date']))->format("Y-m-d");
				$ret_value []= $date_info;
			}
		}
		$ret_value = array_unique($ret_value);
		$date_search_value = implode(",", $ret_value);
	//	print_r($date_search_value);
		update_post_meta($post_id,'date_search_value', $date_search_value);
		//upate event and start date

	}

}

//event-listing filter
add_filter('em_events_output_events','dfs_events_my_output');
function dfs_events_my_output($events)
{
	return $events;
}

//hot ticket box
function hot_ticket_box() {
	ob_start();
?>
<h4>Hot Tickets</h4>
<div class="hot_ticket_box" style="background: #000">

	<p>Sign up for Our FREE newsletter</p>
	<input type="text" name="email" id="email" placeholder="Email Address" />
	<input type="text" name="fname" id="fname" placeholder="First Name" />
	<input type="button" value="Subscribe" />
</div>
<?php
	return ob_get_clean();
}
function manual_sponsor_bar($title)
{
	$sponsorbar = get_page_by_title($title,OBJECT,'sponsorbar');
	global $post;
	if($sponsorbar)
	{
		$temp_post = $post;
		$post = $sponsorbar;
		get_template_part('content','sponsorbar');
	}
	wp_reset_postdata();
}
//starz slider function
function manual_slider_content($title)
{
	$slider = get_page_by_title($title,OBJECT,'sectionslider');
	if($slider)
		$post_id = $slider->ID;
	//my_var_dump($wp_query);
	global $sliders;
	$sliders = array();

	$img_width = get_field('image_width',$post_id);
	$img_height = get_field('image_height',$post_id);
	if(!$img_width)
		$img_width = 880;

	if(!$img_height)
		$img_height = 420;
	$info = get_field('sliders',$post_id);
	//check validity
	if(!$info || count($info)==0)
		return '';
	//check each row
	foreach($info as $subfields)
	{
		$slider_data = array();
		if(isset($subfields['title']) && !empty($subfields['title']))
		{
			$slider_data['title'] = $subfields['title'];
		}
		if(isset($subfields['link']) && !empty($subfields['link']))
		{
			$slider_data['link'] = $subfields['link'];
		}
		if(isset($subfields['image']) && !empty($subfields['image']))
		{
			$slider_data['image'] = $subfields['image'];
		}
		if(isset($subfields['show_time']) && !empty($subfields['show_time']))
		{
			$slider_data['show_time'] = $subfields['show_time'];
		}

		//store
		$sliders []= $slider_data;
	}
	/* $sliders [] = array(
			'image'	=> DENVER_ROOT.$image,
			'title'	=> get_the_title(),
			'link'	=> get_post_permalink()."?festival=".my_get_term_id('event-categories','2013-starz-denver-film-festival')
	); */
	ob_start();
	?>
<!-- SLIDER -->
<div class="slider slider1">
	<ul class="bxslider">
					<?php
				foreach ( $sliders as $slider ) :
			?>
					<li><img src="<?php echo $slider['image']; ?>" alt=""
			width="<?=$img_width?>" height="<?=$img_height?>">
			<div class="caption0">
				<p></p>
				<h1> <?php echo $slider['title']; ?></h1>
				<a href="<?php echo $slider['link']; ?>" class="sliderBtn">Buy
					Ticket</a>
			</div></li>
			<?php endforeach;	?>
				</ul>
</div>
<?php
			return ob_get_clean();
}
function starz_slider_content()
{
	global $wp_query;
	$temp_query = $wp_query;
	$args = array (
			'post_type' => 'event',
			'event-categories' => '2013-starz-denver-film-festival',
			'orderby' => 'title',
			'order' => 'DESC',
			'posts_per_page' => 5
	);
	$args = array(
			'post_type' => 'event',
			'orderby' => 'title',
			'order' => 'ASC',
			'event-categories' => '2013-starz-denver-film-festival',
			'posts_per_page' => 6
	);
	global $post;
	$wp_query = new WP_Query ( $args );
	//my_var_dump($wp_query);
	global $sliders;
	$sliders = array();
	if (have_posts ()) :
		//$post = $posts[0];
		while ( have_posts () ) :
			the_post ();
			$post_object = get_field ( "movie");
			if ($post_object)
			{
				$post = $post_object;
				setup_postdata($post);
				$image =get_movie_image($post);

				wp_reset_postdata();
			}
		/* 	if(empty($image))
				continue; */
			$sliders [] = array(
				'image'	=> DENVER_ROOT.$image,
				'title'	=> get_the_title(),
				'link'	=> get_post_permalink()."?festival=".my_get_term_id('event-categories','2013-starz-denver-film-festival')
			);
		endwhile;
	endif;
		wp_reset_query();
		$wp_query = $temp_query;
	ob_start();
?>
<!-- SLIDER -->
<div class="slider slider1">
	<ul class="bxslider">
				<?php
			foreach ( $sliders as $slider ) :
		?>
				<li><img src="<?php echo $slider['image']; ?>" alt="" width="880"
			height="420">
			<div class="caption0">
				<p></p>
				<h1> <?php echo $slider['title']; ?></h1>
				<a href="<?php echo $slider['link']; ?>" class="sliderBtn">Buy
					Ticket</a>
			</div></li>
		<?php endforeach;	?>
			</ul>
</div>
<?php
		return ob_get_clean();
}

//stanley slider
function stanley_slider_content()
{
	global $wp_query;
	$temp_query = $wp_query;
	$args = array (
			'post_type' => 'event',
			'event-categories' => '2015-stanley-film-festival',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 5
	);
	global $post;
	$wp_query = new WP_Query ( $args );
	//my_var_dump($wp_query);
	global $sliders;
	$sliders = array();
	if (have_posts ()) :
		//$post = $posts[0];
		while ( have_posts () ) :
			the_post ();
			$post_object = get_field ( "movie");
			if ($post_object)
			{
				$post = $post_object;
				setup_postdata($post);
				$image =get_movie_image($post);

				wp_reset_postdata();
			}
			$sliders [] = array(
				'image'	=> DENVER_ROOT.$image,
				'title'	=> get_the_title(),
				'link'	=> get_post_permalink()."?festival=".my_get_term_id('event-categories','2015-stanley-film-festival')
			);
		endwhile;
	endif;
		wp_reset_query();
		$wp_query = $temp_query;
	ob_start();
?>
<!-- SLIDER -->
<div class="slider slider1">
	<ul class="bxslider">
				<?php
			foreach ( $sliders as $slider ) :
		?>
				<li><img src="<?php echo $slider['image']; ?>" alt="" width="880"
			height="420">
			<div class="caption0">
				<p></p>
				<h1> <?php echo $slider['title']; ?></h1>
				<a href="<?php echo $slider['link']; ?>" class="sliderBtn">Buy
					Ticket</a>
			</div></li>
		<?php endforeach;	?>
			</ul>
</div>
<?php
		return ob_get_clean();
}

//home slider output
function home_slider_content()
{
	ob_start();
?>
<!-- SLIDER -->
<div class="slider slider1">

	<ul class="bxslider">
		<li><img
			src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/Alphaville_960x530.jpg"
			alt="" width="880" height="480">
			<div class="caption0">
				<p>September 15, 2014</p>
				<h1>Alphaville</h1>
				<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26776"
					class="sliderBtn">Buy Ticket</a>
			</div></li>
		<li><img
			src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/BillMurray2_960x530.jpg"
			alt="" width="880" height="480">
			<div class="caption0">
				<p>September 15, 2014</p>
				<h1>Bill Murray: The Triumph of the Infantile</h1>
				<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26776"
					class="sliderBtn">Buy Ticket</a>
			</div></li>
		<li><img
			src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/CineLatino_960x530.jpg"
			alt="" width="880" height="480">
			<div class="caption0">
				<p>CineLatino Film Festival</p>
				<h1><?php the_title(); ?></h1>
				<a
					href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26706&FID=77"
					class="sliderBtn">Buy Ticket</a>
			</div></li>
		<li><img
			src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/DavidBowieIs_960x530.jpg"
			alt="" width="880" height="480">
			<div class="caption0">
				<p>September 15, 2014</p>
				<h1>David Bowie Is</h1>
				<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26701"
					class="sliderBtn">Buy Ticket</a>
			</div></li>
		<li><img
			src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/MudBloods_960x530.jpg"
			alt="" width="880" height="480">
			<div class="caption0">
				<p>September 15, 2014</p>
				<h1>Mudbloods</h1>
				<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26814"
					class="sliderBtn">Buy Ticket</a>
			</div></li>
		<li><img
			src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/TheOneILove_960x530.jpg"
			alt="" width="880" height="480">
			<div class="caption0">
				<p>September 15, 2014</p>
				<h1>The One I Love</h1>
				<a
					href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26699
				  		"
					class="sliderBtn">Buy Ticket</a>
			</div></li>
	</ul>

</div>
<?php
	return ob_get_clean();
}
//get the taxnomy info
function my_get_term_id($taxonomy,$slug)
{
	if(!empty($slug))
	{
		$args = array(
				'slug' 	=> $slug
		);
		$terms = get_terms($taxonomy, $args);
		if((count($terms)>0) && !is_wp_error($terms))
			return  $terms[0]->term_id;
	}
	return FALSE;
}
//move event box filter
add_filter('the_movie_event_box', 'dfs_movie_event_box_filter', 10, 3);
function dfs_movie_event_box_filter($post_id, $show_time,$image)
{
	ob_start();
	?>
<div class="eventBox">
	<a href="<?php echo get_post_permalink($post_id);?>"> <img
		src="<?php echo DENVER_ROOT.$image;?>" width="258" height="271" />
		<div class="caption2">
			<h3><?php echo truncate(get_the_title(),30); ?></h3>
			<h5><?php echo $show_time; ?></h5>
			<a href="<?php  echo get_post_permalink($post_id);?>"
				class="sliderBtn">Buy Ticket</a>
		</div>
	</a>
</div>
<?php
	return ob_get_clean();
}
//movie entry filter
add_filter('the_movie_entry_list','dfs_movie_entry_filter');
function dfs_movie_entry_filter($movie_input)
{
	ob_start();
	//$image= get_movie_image($movie_input,1);
	$image= get_movie_image($movie_input);
	if(empty($image))
		$image = get_movie_image($movie_input,1);
	?>

<div class="entry">
	<?php //print_r($movie_input);
		$movie_link = get_permalink($movie_input->ID);

	?>
	<div class="one_third">
		<a href='<?php echo $movie_link; ?>'> <img
			src="<?php echo DENVER_ROOT.$image;?>" width="292" height="158"
			alt="no image" /></a>
	</div>
	<div class="two_third last_column">
		<h4 class="yellow normal" style="margin: 0; position: relative;">
			<a class="entry_hover_source"><?php echo $movie_input->post_title; ?></a>
		</h4>
		<!--  movie hover thumbnail -->
		<div class="entry_hover_thumbnail"
			style="display: none; position: absolute; top: -30px; width: 300px; min-height: 300px; border: 1px solid red; background: #1d1d1d; z-index: 1000;">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<header class="entry-header">

							<?php

								echo '<h1 class="entry-title">'.$movie_input->post_title.'</h1>';
							?>
						</header>
				<!-- .entry-header -->
					<?php       udesign_single_post_entry_before(); ?>
					                 <div class="entry" style="font-size: 10px;">
					<?php                  					?>
						<!-- 	<div class="movie_thumb"> -->
					<img
						src="<?php echo apply_filters('the_movie_image_path', $image); ?>"
						width="292" height="158" />
					<!-- </div> -->
					<div class="clear"></div>
				</div>
					<?php                       udesign_single_post_entry_after(); ?>
					</article>
		</div>
		<!-- movie hover thumbnail ends -->
		<p><?php
			 $more_link = "<a class='yellow' href='{$movie_link}'> more</a>";
			if(!empty($movie_input->post_excerpt))
				echo htmlspecialchars_decode(utf8_decode(htmlentities($movie_input->post_excerpt, ENT_COMPAT, 'utf-8', false))).$more_link;
			else
				echo htmlspecialchars_decode(utf8_decode(htmlentities(truncate($movie_input->post_content,200), ENT_COMPAT, 'utf-8', false))).$more_link;
		?></p>

	</div>
</div>
<?php  echo do_shortcode('[divider]'); ?>
	<?php
	return ob_get_clean();
}
add_filter('the_program_entry_list','dfs_program_entry_filter');
function dfs_program_entry_filter($post_id)
{
	ob_start();
	?>
<h2 class="yellow" style="margin-top: 0;"><?php  the_title(); ?></h2>
<p>
	<?php
      the_excerpt(); //display the excerpt
      echo "<a href='".get_permalink()."' class='yellow'>more</a>";
	?>
	</p>
<?php
	  return ob_get_clean();
}
add_filter('the_movie_image_path', 'dfs_movie_image_path');
function dfs_movie_image_path($rel_path)
{
	if(!empty($rel_path))
		return DENVER_ROOT. $rel_path;
	else
		return '';
}
//event entry list filter
add_filter('the_event_entry_list', 'dfs_event_entry_filter');
function dfs_event_entry_filter ($EM_Event)
{
	ob_start();
	$start_date = $EM_Event->event_start_date;
	$end_date = $EM_Event->event_end_date;

	//PRINT SHOW_TIMES

	//print content
	if($EM_Event->event_id)
		$movie = get_field("movie", $EM_Event->post_id);
	else
		$movie= $EM_Event;


	//htmlspecialchars_decode(utf8_decode(htmlentities(truncate($movie_input->post_content,200), ENT_COMPAT, 'utf-8', false))).$more_link;
	$short_descr = get_the_excerpt($EM_Event->post_id);

	if(empty($short_descr))
		$short_descr = truncate(get_the_content($EM_Event->post_id), 120);
	//format short_descr
	$short_descr = htmlspecialchars_decode(utf8_decode(htmlentities($short_descr, ENT_COMPAT, 'utf-8', false)));

	if(is_array($movie))
		$movie = $movie[0];

	//print movie info
	//echo "<h1>ddd</h1>";
	//print_r($movie);
	if($movie)
		$image= get_movie_image($movie);

	?>
<div class="movie_thumb">
	<a href="<?php  echo get_permalink($EM_Event->post_id);?>"><img
		src="<?php echo DENVER_ROOT. $image;?>" width="292" height="158" /></a>
</div>
<div class="movie_showtime">
	<h4>
		<a href="<?php  echo get_permalink($EM_Event->post_id);?>"><?php echo get_the_title($EM_Event->post_id);?></a>
	</h4>
	<p class="yellow">
		<?php echo $short_descr;?>
	</p>
</div>

<?php
	return ob_get_clean ();
}

function get_feed_part()
{
	ob_start();
?>
<div class="clearfix"></div>
<!-- FEEDS -->
<div class="feedsBlock">
	<h3 class="evTitle feedTitle">FEEDS</h3>
	<ul class="feedsList">
		<li id="fb_feed">
			<!--
				<h5>@something</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nisl ut enim auctor, nec tincidunt magna.</p>
				<span>6/30/14</span>
				 -->

				 <?php
				 	 fb_feed(null,array('container_id'=> 'fb_feed'));
				 ?>
			</li>

		<li>
			<?php echo twitter_widgets(); ?>
			<!--
			<div id="latest_tweets">
				<pre style="color: #444444;"><code></code></pre>
			</div>
			 -->
		</li>
	</ul>
</div>
<?php
	return ob_get_clean();
}

add_filter('the_movie_search_entry','dfs_movie_search_entry_filter', 10, 2);
function dfs_movie_search_entry_filter ($movie, $festival)
{
	ob_start();

	$short_descr =  htmlspecialchars_decode(utf8_decode(htmlentities($movie->post_excerpt,ENT_COMPAT, 'utf-8', false)));

	if(empty($short_descr))
		$short_descr = htmlspecialchars_decode(utf8_decode(htmlentities($movie->post_content, ENT_COMPAT, 'utf-8', false)));
	$iframePos = strpos($short_descr,'<iframe');
	$cutLength = $iframePos;
	if($cutLength > 120 || !$cutLength)
		$cutLength = 120;

	$short_descr = truncate($short_descr, $cutLength);

	if(is_array($movie))
		$movie = $movie[0];

	//print movie info
	//echo "<h1>ddd</h1>";
	//print_r($movie);
	if($movie)
		$image= get_movie_image($movie);

	$link = get_permalink($movie->ID);
	if(isset($festival))
		$link .= "?festival={$festival}";
	$movie_link = get_permalink($movie->ID);
	$more_link = "<a class='yellow' style='color:#ffe600' href='{$movie_link}'> more</a>";
	?>
<div class="movie_thumb">
	<a href="<?php  echo $link;?>"><img
		src="<?php echo DENVER_ROOT. $image;?>" width="292" height="158" /></a>
</div>
<div class="movie_showtime">
	<h4>
		<a href="<?php  echo $link;?>"><?php echo get_the_title($movie->ID);?></a>
	</h4>
	<?php echo $short_descr.$more_link;?>
</div>

<?php
	return ob_get_clean ();
}
function get_top_navigation($section='default')
{
	ob_start();
	if($section =='starz'): ?>
<!-- start custom header section -->
<div class="headerSection">
	<a
		href="<?php echo get_permalink(get_page_by_title("Starz Denver Festival"));?>"><img
		src="<?=CUSTOM_STYLE_DIR?>/images/starz.png" alt=""></a>

	<h4>NOVEMBER 12-23 2014</h4>

	<div class="clearfix"></div>

	<div class="navBlock">

		<ul class="nav">
			<li><a
				href="<?php echo site_url('schedule/?festival='.my_get_term_id('event-categories','2014-starz-denver-film-festival'));?>">Schedule</a></li>
			<li><a
				href="<?php echo site_url('starz-denver-festival/buy-tickets/'); ?>">Tickets</a></li>
			<li><a
				href="<?php echo site_url('/starz-denver-festival/passes/');?>">Passes</a></li>
			<li><a href="<?php echo site_url('venues/starz-venue/'); ?>">Venues</a></li>
			<li><a
				href="<?php echo site_url('starz-denver-festival/submit/'); ?>">Submit</a></li>
			<li><a href="<?php echo site_url('faq-category/faq-starz/');?>">FAQ</a></li>
			<li><a href="<?php echo site_url('starz-laurels/'); ?>">Laurels</a></li>
		</ul>
	</div>

</div>
<?php elseif($section =='stanley'): ?>
<div class="headerSection">
	<a
		href="<?php echo get_permalink(get_page_by_title("Stanley Film Festival"));?>"><img
		src="<?=CUSTOM_STYLE_DIR?>/images/stanley.png" alt=""></a>

	<h4>April 30 - May 3, 2015</h4>

	<div class="clearfix"></div>

	<div class="navBlock">

		<ul class="nav">
			<li><a
				href="<?php echo site_url('schedule/?festival='.my_get_term_id('event-categories','2015-stanley-film-festival'));?>">Schedule</a></li>
			<li><a href="<?php echo site_url('stanley-film-festival/passes/');?>">Tickets
					& Passes</a></li>
			<li><a href="<?php echo site_url('stanley-venues');?>">Venues</a></li>
			<li><a
				href="https://www.withoutabox.com/03film/03t_fin/03t_fin_fest_01over.php?festival_id=13494"
				target="_blank">Submit</a></li>
			<li><a href="<?php echo site_url('faq-category/faq-stanley/');?>">FAQ</a></li>
		</ul>
	</div>
</div>
<?php elseif($section =='education'): ?>
<div class="headerSection">
	<a
		href="<?php echo get_permalink(get_page_by_title("Film Education"));?>"><img
		src="<?=CUSTOM_STYLE_DIR?>/images/education.png" alt=""></a>
	<div class="clearfix"></div>

	<div class="navBlock">
		<ul class="nav">
			<li><a href="<?php echo site_url('young-filmmaker-workshops');?>">Young
					Filmmakers Workshops</a></li>
			<li><a href="<?php echo site_url('package/film-education/');?>">Film
					Courses</a></li>
			<li><a
				href="<?php echo site_url('package/educational-screenings/');?>">Now
					Showing</a></li>
			<li><a
				href="<?php echo site_url('film-education/support-education/');?>">Support
					Education</a></li>
		</ul>
	</div>
</div>
<?php elseif($section =='sie'): ?>
<div class="headerSection">
	<a href="<?php echo get_permalink(get_page_by_title("Film Center"));?>"><img
		src="<?=CUSTOM_STYLE_DIR?>/images/filmsie.png" alt=""></a>

	<div class="clearfix"></div>

	<div class="navBlock">
		<ul class="nav">
			<li><a href="<?php echo site_url("events/".date("Y-m-d",time()));?>">Now
					Playing</a></li>
			<li><a href="<?php echo site_url('/package/mini-fests/');?>">Mini
					Festivals</a></li>
			<li><a href="<?php echo site_url('/package/series/');?>">Film Series</a></li>
			<li><a href="<?php echo site_url('film-center/rentals/');?>">Rentals</a></li>
			<li><a href="<?php echo site_url('package/special-events/'); ?>">Special
					Events</a></li>
			<li><a href="<?php echo site_url("events/".date("Y-m-d",time()));?>">Buy
					Tickets</a></li>
			<li><a href="<?php echo site_url('film-center/box-office/');?>">Box
					Office</a></li>

		</ul>
	</div>
</div>
<?php elseif($section =='filmmaker'): ?>
<div class="headerSection">
	<a
		href="<?php echo get_permalink(get_page_by_title("Filmmaker Focus"));?>"><img
		src="<?=CUSTOM_STYLE_DIR?>/images/filmmaker.png" alt=""></a>

	<div class="clearfix"></div>


	<div class="navBlock">
		<ul class="nav">
			<li><a
				href="<?php echo site_url('filmmaker-focus/industry-talks/');?>">Industry
					Talks</a></li>
			<li><a
				href="<?php echo site_url('filmmaker-focus/fiscal-sponsorship/'); ?>">Fiscal
					Sponsorship</a></li>
			<li><a href="<?php echo site_url('filmmaker-focus/resources/');?>">Resources</a></li>
			<li><a href="<?php echo site_url('donate');?>">Support Filmmakers</a></li>

		</ul>
	</div>
</div>
<?php elseif($section =='filmrocks'): ?>
<div class="headerSection">
	<a
		href="<?php echo get_permalink(get_page_by_title("Film on the Rocks"));?>"><img
		src="<?=CUSTOM_STYLE_DIR?>/images/filmrocks.png" alt=""></a>

	<div class="clearfix"></div>

	<div class="navBlock">
		<ul class="nav">
			<li><a href="<?php echo site_url('film-on-the-rocks-schedule/');?>">Schedule</a></li>
			<li><a href="<?php  echo site_url('film-on-the-rocks/tickets/');?>">Tickets</a></li>
			<li><a href="<?php echo site_url('film-on-the-rocks/vip/');?>">VIP
					Experience</a></li>
			<li><a href="<?php echo site_url('film-on-the-rocks/faq/'); ?>">FAQ</a></li>

		</ul>
	</div>
</div>
<?php else: ?>
<?php
	if(is_home()):
?>
<p class="quote">
	<span>"The Denver Film Society is the greatest institution in Colorado
		to experience film at a higher level."</span> <br> - DFS Founder Ron
	Henderson
</p>
<?php endif; ?>
<?php
	endif;
	return ob_get_clean();
}

//get showtim ranges from events
function get_showtime_range ($events)
{
	if(!$events || !is_array($events) || (count($events)==0))
		return FALSE;

	$earliest_time = 0;
	$latest_time = 0;
	$duration = 0;
	//foreach event
	$arr_times = array();
	foreach($events as $EM_Event)
	{
		$show_times_info = get_field('show_times', $EM_Event->post_id);
		$show_times = array();

		//venue....
		foreach($show_times_info as $subfields)
		{
			// array_push($arr_times,strtotime($subfields['show_time'])%86400);
			array_push($arr_times,strtotime($subfields['show_time']));
			//echo $subfields['show_time']."<br/>";
		}
	}
	return $arr_times;
}
/**
 *
 * @param unknown $schedules
 * return timestamp
 */
function get_day_screentime_range($schedules)
{
	if(!$schedules || !is_array($schedules) || (count($schedules)==0))
		return FALSE;

	$earliest_time = 0;
	$latest_time = 0;
	$duration = 0;
	//foreach event
	$arr_times = array();
	foreach($schedules as $a_schedule)
	{
		$arr_times []= strtotime($a_schedule['start']);

	}

	return array_unique($arr_times);
}
function rangeWeek($datestr) {
	date_default_timezone_set(date_default_timezone_get());
	$dt = strtotime($datestr);
	$res['start'] = date('N', $dt)==1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last sunday', $dt));
	$res['end'] = date('N', $dt)==7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next saturday', $dt));
	return $res;
}

//retrieve movie first image
/**
 *
 * @param unknown $movie
 * @param number $index 0: normal 1: thumb
 * @return Ambigous <string, boolean>
 */
function get_movie_image($movie, $index = 0)
{
	$movie_images = get_field("images", $movie->ID);
	$image='';
	if($movie_images):
		$first_image = $movie_images[$index];
		//$image= wp_get_attachment_image_src(get_post_thumbnail_id($movie->ID),array(258,271));
		$image = $first_image['image_url'];
	endif;

	return $image;
}
function get_movie_genres($movie)
{
	if($movie)
	{
		if(!is_int($movie))
			$genre_objects = get_field_object('genre', $movie->ID);
		else //$movie is ID itself
			$genre_objects = get_field_object('genre', $movie);
	//	my_var_dump($genre_objects);
		$choices = get_field('genre', $movie->ID);
		//my_var_dump($choices);
		$genre_labels = array();
		if(!$choices)
			return "";
		foreach($choices as $choice_index)
			$genre_labels [] = $genre_objects['choices'][$choice_index];
		//return implode(",", $genre_labels);
		return $genre_labels;
	}else{
		return false;
	}
}
function get_movie_directors($movie)
{
	if($movie)
	{
		if(!is_int($movie))
			$directors = get_field('director', $movie->ID);
		else
			$directors = get_field('director',$movie);
		$director_label = array();
		if($directors):
			foreach($directors as $director):
				$director_label [$director->ID] = get_field('last_name',$director->ID). ' '. get_field('first_name',$director->ID);
			endforeach;
		else:
			return get_the_title($movie->ID);
		endif;
		//return implode(",", array_unique($director_label));
		return array_unique($director_label);
	}else{
		return '';
	}
}
/**
 *
 * @param unknown $post_id : event post id
 * @return string|multitype:
 */
function get_event_show_dates($post_id)
{
	$post_type = get_post_type($post_id);
	if($post_type=='event')
	{
		$show_dates = get_field('show_dates', $post_id);
		if(!isset($show_dates) || (count($show_dates)==0))
		{
			return '';
		}
		$my_event = em_get_event($post_id,'post_id');
		foreach($show_dates as $subfields)
		{
			if(isset($subfields['show_date']) && !empty($subfields['show_date']))
			{
				//$date_info =  DateTime::createFromFormat('m/d/Y', trim($subfields['show_date']));
				//$date_info = DateTime::createFromFormat('m/d/Y', trim($subfields['show_date']))->format("Y-m-d");
				$date_info = DateTime::createFromFormat('m/d/Y', trim($subfields['show_date']))->format("m/d/Y");
				$ret_value []= $date_info;
			}
		}
		$ret_value = array_unique($ret_value);
		return $ret_value;
	}
}
/**
 *
 * @param unknown $post_id  : event post id
 * @param unknown $date     : date Y-m-d
 */
function get_event_venue($post_id, $date)
{
	$screenings = get_field('screenings', $post_id);
	$venues = array();
	foreach($screenings as $screening)
	{
		/* echo date("Y-m-d",strtotime(trim($screening['screening_time'])));
		echo ':'. $date; */
		if(date("Y-m-d",strtotime(trim($screening['screening_time'])))==date("Y-m-d",strtotime($date)))
		{
			$screening_id = $screening['screening_id'];
			$screen_post_id = get_post_IDs('screening','screening_id', $screening_id);
			$venue = get_field('venue', $screen_post_id);

			return $venue->ID;
		}
	}
}
/**
 *
 * @param unknown $post_id
 * @param unknown $date
 */
function get_event_schedule($post_id, $date)
{
	$screenings = get_field('screenings', $post_id);
	$venues = array();
	foreach($screenings as $screening)
	{
		/* echo date("Y-m-d",strtotime(trim($screening['screening_time'])));
		echo ':'. $date; */
		if(date("Y-m-d",strtotime(trim($screening['screening_time'])))==date("Y-m-d",strtotime($date)))
		{
			$screening_id = $screening['screening_id'];
			$screen_post_id = get_post_IDs('screening','screening_id', $screening_id);
			$movie_post_id = get_field('movie', $screen_post_id);
			$venue 			=get_field('venue', $screen_post_id);
			$festival = get_field('festival', $screen_post_id);
			$festival_id = $festival[0];


			$schuedle = array();

			$schedule['venue'] = $venue->ID;
			$schedule['start'] = get_field('screening_time', $screen_post_id);
			$schedule['duration']	=get_field('duration', $movie_post_id);
			$schedule['title'] = get_the_title($movie_post_id);
			$schedule['url'] = get_post_permalink($post_id)."?festival={$festival_id}";
			$schedule['event_post_id'] =  $post_id;
			return $schedule;
		}
	}
}
/**
 *
 * @param unknown $post_id
 * @return string
 */
function get_event_duration($post_id)
{
	$show_dates = get_event_show_dates($post_id);
	$start_date = min($show_dates);
	$end_date = max($show_dates);
	$start_month = date("F", strtotime($start_date));
	$end_month = date("F",strtotime($end_date));
	if($start_month != $end_month)
		return  $start_month. "-". $end_month;
	else
		return $start_month;
}
/**
 *
 * @param unknown $post_id : event post id
 * @return string|multitype:
 */
function get_event_show_times($post_id, $date_in='')
{
	$post_type = get_post_type($post_id);
	if($post_type=='event')
	{
		$show_dates = get_field('show_times', $post_id);
		if(!isset($show_dates) || (count($show_dates)==0))
		{
			return '';
		}
		$my_event = em_get_event($post_id,'post_id');
		foreach($show_dates as $subfields)
		{
			if(isset($subfields['show_time']) && !empty($subfields['show_time']))
			{
				//$date_info = DateTime::createFromFormat('g:i a', trim($subfields['show_time']));
				$date_value = date('Y-m-d',strtotime(trim($subfields['show_time'])));
				$time_info= date('g:ia',strtotime(trim($subfields['show_time'])));
				$ret_value [$date_value][]= $time_info;
			}
		}
		//$ret_value = array_unique($ret_value);


		if(empty($date_in))
			$date_in = date('Y-m-d', time());
		//echo $date_in;
			return $ret_value[$date_in];


	}
}
function get_event_show_times_withlink($post_id, $date_in='')
{
	$post_type = get_post_type($post_id);
	$festival_id = get_field('festival', $post_id);
	if(is_array($festival_id))
		$festival_id = $festival_id[0];
	//get_field('festivalid',$festival_id);
	//retrieve festival post _id
	$taxonomy_festival_id = $festival_id;
	$festival_id = get_field('festivalid','event-categories_'.$festival_id);

	if($post_type=='event')
	{
		$show_dates = get_field('screenings', $post_id);
		if(!isset($show_dates) || (count($show_dates)==0))
		{
			return '';
		}
		$my_event = em_get_event($post_id,'post_id');
		foreach($show_dates as $subfields)
		{
			if(isset($subfields['screening_time']) && !empty($subfields['screening_time']))
			{
				//$date_info = DateTime::createFromFormat('g:i a', trim($subfields['show_time']));
				$date_value = date('Y-m-d',strtotime(trim($subfields['screening_time'])));
				$time_info= date('g:ia',strtotime(trim($subfields['screening_time'])));
				$screen_id = $subfields['screening_id'];
				$link = DENVER_RESERVE_ROOT."fid={$festival_id}&id=".$screen_id;
				$ret_value [$date_value][]= "<a class='showtime' href='{$link}'>$time_info</a>";
			}
		}
		//$ret_value = array_unique($ret_value);


		if(empty($date_in))
			$date_in = date('Y-m-d', time());
		//echo $date_in;
		return $ret_value[$date_in];


	}
}
function my_var_dump($var)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}
function get_term_IDs($taxonomy, $meta_field, $meta_value)
{

	if(empty($taxonomy) || empty($meta_field) || empty($meta_value))
		return FALSE;

	$term_args = array('orderby'=>'count', 'hide_empty'=>0);

	$terms = get_terms($taxonomy,$term_args);
	$ret_terms = array();

	foreach($terms as $term)
	{
		if(get_field($meta_field, $taxonomy.'_'.$term->term_id)==$meta_value)
		{
			$ret_terms [] = $term;
		}
	}
	return $ret_terms;
}

function search_form_no_filters() {
	$search_form_template = locate_template('searchform.php');
	if('' !== $search_form_template)
	{
		//searchform.php exists and remove all filters
		remove_all_filters('get_search_form');
	}
}

function get_post_IDs($post_type, $meta_field, $meta_value)
{

	if(empty($post_type) || empty($meta_field) || empty($meta_value))
		return FALSE;

	$post_args = array(
			'numberposts'	=> -1,
			'post_type'		=> $post_type,
			'meta_key'		=> $meta_field,
			'meta_value'	=> $meta_value
	);

	$the_query = new WP_Query($post_args);
	//echo $the_query->request;
	if($the_query->have_posts())
	{
		//we assume 1:1 for FilmID
		$ret_IDs = array();
		while ($the_query->have_posts())
		{
			$the_query->the_post();
			//$ret_IDs [] = $the_query->post;
			return $the_query->post->ID;
		}
		wp_reset_query();
		return $ret_IDs;
	}else{
		return 0;
	}
}
function dfs_venue_filter($post_id)
{
	$facility =  get_field('facility_id', $post_id);
	echo get_field("address",$facility->ID);
	echo "<br/>";
	echo get_field("city",$facility->ID);
	echo ",";
	echo get_field("state", $facility->ID);
	echo " ";
	echo get_field("postcode",$facility->ID);
	echo "&nbsp;";
	echo get_field("country", $facility->ID);
}
add_filter('the_venue_content','dfs_venue_filter');
add_action('pre_get_search_form', 'search_form_no_filters');

//post title search filter
function title_filter( $where, &$wp_query )
        {
            global $wpdb;
            if ( $search_term = $wp_query->get( 'keyword_title' ) ) {
                $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
            }
            return $where;
        }

// showtime widget
require_once ('widgets/em-sortfilm.php');
//search festival
require_once ('widgets/em-searchbar.php');
//voucher widget
require_once('widgets/em-voucher.php');
//genre filterwidget
require_once('widgets/em-genrebar.php');
//festival calendar widget
require_once('widgets/em-festival-calendar.php');

