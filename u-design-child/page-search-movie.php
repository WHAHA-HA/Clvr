<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Search Movie Page
 *
 */
//
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directl

/* function search_results_per_page($query) {
	switch (true) {
		case ($query->is_search) :
			$query->set ( 'posts_per_page', 5 );
			break;
		case ($query->is_archive) :
			$query->set ( 'posts_per_page', 5 );
			break;
		case ($query->is_category) :
			$query->set ( 'posts_per_page', 20 );
			break;
	}

	return $query;
}
add_filter ( 'pre_get_posts', 'search_results_per_page' );
 */
global $wp_query;

 $search_query =array();

//country search
if (isset ( $_GET ['country'] ) && ! empty ( $_GET ['country'] )) {
		$search_query[] = array(
			'key'	=> 'country',
			'value'	=>  trim($_GET['country']),
			'compare' => '='
	);
}

 //venue search
if (isset ( $_GET ['ven'] ) && ! empty ( $_GET ['ven'] )) {
	$search_query[] = array(
			'key'	=> 'venue',
			'value'	=>  trim($_GET['ven']),
			'compare' => 'like'
	);
}

//director search
if (isset ( $_GET ['dir'] ) && ! empty ( $_GET ['dir'] )) {
	$search_query[] = array(
			'key'	=> 'director',
			'value'	=>  trim($_GET['dir']),
			'compare' => 'like' //in array
	);
}

//program search
if (isset ( $_GET ['pro'] ) && ! empty ( $_GET ['pro'] )) {
	$search_query[] = array(
			'key'	=> 'program',
			'value'	=>  trim($_GET['pro']),
			'compare' => 'like'
	);
}

//genre search
if (isset ( $_GET ['genre'] ) && ! empty ( $_GET ['genre'] )) {
	$search_query[] = array(
			'key'	=> 'genre',
			'value'	=>  trim($_GET['genre']),
			'compare' => 'like' //in array
	);
}


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
<?php
	$content_position =  'grid_16';

	//get event movie posts pool
	$festival = $_GET['festival'];
 	$arr_event_movie = get_all_festival_movies($festival);

 	/* echo 'all movies in festival';
	echo count($arr_event_movie); */

?>
	<?php
		if(isset($_GET['ven'])):
			$args = array(
					'post_type'		=> 'screening',
					'posts_per_page'=>-1,
					'meta_query'	=> array(
							'relation'	=> 'OR',
							array(
								'key'	=> 'festival',
								'value'	=>  $festival,
								'compare' => '=')
					)
			);

		else:
			$args = array(
				'post_type'		=> 'movie',
				'post__in'		=> $arr_event_movie,
				'posts_per_page'=>-1,
				'meta_query'	=> array(
					'relation'	=> 'OR',
					)
			);

			//echo $wp_query->request;

		endif;

		add_filter( 'posts_where', 'title_filter', 10, 2 );

		//if keywor search
		if(isset($_GET['keyword']) && !empty($_GET['keyword']))
			$args['keyword_title'] = trim($_GET['keyword']);

		//and other additional queries...
		foreach($search_query as $value)
			array_push($args['meta_query'],$value);

		$temp_query = $wp_query;
		$wp_query = new WP_Query($args);


	?>
	<!-- custom header -->
			</header>
			<h2 class="yellow" style="padding-left:30px;">Search Results</h2>

<div id="main-content-movie-listing" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">

	<?php // get_search_form(); ?>
<?php       udesign_main_content_top( is_front_page() ); ?>

<!-- 		venue search -->
	<?php if(isset($_GET['ven'])): //for specific venue search?>

		<?php if (have_posts()) :

		  $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php
			$arr_post = array();

			echo "Total Found:".$wp_query->found_posts.'<br/>';
			 while (have_posts()) : the_post();
			 	global $post;

			 	$arr_post [] = $post->ID;
			 	$movie = get_field('movie',$post->ID);
			 	?>
			    <div <?php post_class(); ?> id="post-<?php echo $movie->ID; ?>">
<?php                           udesign_blog_entry_before(); ?>
                                <div class="entry">
<?php                               udesign_blog_entry_top(); ?>
                                    <div class="post-top">
				<!-- end post-top -->
				<div class="clear"></div>
<?php 									 echo apply_filters('the_movie_search_entry',$movie, $festival);
                                        if ( $udesign_options['blog_button_text'] ) {
                                          //  echo do_shortcode('[read_more text="'.$udesign_options['blog_button_text'].'" title="'.$udesign_options['blog_button_text'].'" url="'.get_permalink().'" align="left"]');
                                            echo '<div class="clear"></div>';
                                        }
	                              udesign_blog_entry_bottom(); ?>
                                </div>
<?php                           udesign_blog_entry_after(); ?>
<?php                       echo do_shortcode('[divider]'); ?>
			    </div>

				</div>
			<?php endwhile;	 ?>

			<div class="clear"></div>

	    <?php endif; ?>
	<?php else: //other search...
		 ?>
<!-- movie -->
	    <?php if (have_posts()) :

		  $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php
			$arr_post = array();

			echo "Total Found:".$wp_query->found_posts.'<br/>';
			 while (have_posts()) : the_post();
			 	global $post;
			 	$arr_post [] = $post->ID;

			 	?>
			    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                           udesign_blog_entry_before(); ?>
                                <div class="entry">
<?php                               udesign_blog_entry_top(); ?>
                                    <div class="post-top">
				<!-- end post-top -->
				<div class="clear"></div>
<?php 									 echo apply_filters('the_movie_search_entry',$post, $festival);
                                        if ( $udesign_options['blog_button_text'] ) {
                                          //  echo do_shortcode('[read_more text="'.$udesign_options['blog_button_text'].'" title="'.$udesign_options['blog_button_text'].'" url="'.get_permalink().'" align="left"]');
                                            echo '<div class="clear"></div>';
                                        }
	                              udesign_blog_entry_bottom(); ?>
                                </div>
<?php                           udesign_blog_entry_after(); ?>
<?php                       echo do_shortcode('[divider]'); ?>
			    </div>

				</div>
			<?php endwhile;	 ?>

			<div class="clear"></div>

<?php		// Pagination
		/*if(function_exists('wp_pagenavi')) :
		    wp_pagenavi();
		else : ?>
		    <div class="navigation">
			<div class="alignleft"><?php previous_posts_link() ?></div>
			<div class="alignright"><?php next_posts_link() ?></div>
		</div>
<?php		endif; */ ?>

<?php       else :

	/* 	if ( is_category() ) { // If this is a category archive
			printf(__("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", 'udesign'), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e("<h2>Sorry, but there aren't any posts with this date.</h2>", 'udesign');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", 'udesign'), $userdata->display_name);
		} else {
			_e("<h2 class='center'>No posts found.</h2>", 'udesign');
		}
		get_search_form();
 */
	    endif;
	    //Reset Query
	    $wp_query = $temp_query;
	    wp_reset_query(); ?>
<!-- 	   venue or movie -->
	    <?php endif;?>

	    <div class="clear"></div>
<?php       udesign_main_content_bottom(); ?>
	</div>
	<!-- end main-content-padding -->
</div>
<!-- end main-content -->
<div class="up_sidebar">
<?php	if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar3') ) { get_sidebar('PagesSidebar3'); } ?>
</div>
<!-- end content-container -->

<div class="clear"></div>

<?php
get_footer();