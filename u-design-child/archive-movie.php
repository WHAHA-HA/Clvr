<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

//
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directl

function search_results_per_page($query) {
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

global $wp_query;

 $search_query =array();

//country search
if (isset ( $_GET ['country'] ) && ! empty ( $_GET ['country'] )) {
		$search_query[] = array(
			'key'	=> 'country',
			'value'	=>  trim($_GET['country']),
			'compare' => 'like'
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
if (isset ( $_GET ['director'] ) && ! empty ( $_GET ['director'] )) {
	$search_query[] = array(
			'key'	=> 'director',
			'value'	=>  trim($_GET['director']),
			'compare' => 'like'
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
			'compare' => 'like'
	);
}




get_header();

$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_archive_sidebar'] == 'yes' ) $content_position = 'grid_24';

?>
	<?php
		if(isset($_GET['ven'])):

			$events = EM_Events::get_on_venue('',$_GET['ven']);

		else:
			$args = array(
				'numberposts' => 5,
				'post_type'		=> 'movie',
				'meta_query'	=> array(
					'relation'	=> 'OR',
					)
			);
			foreach($search_query as $value)
				array_push($args['meta_query'],$value);

			$temp_query = $wp_query;
			$wp_query = new WP_Query($args);
			//echo $wp_query->request;
		endif;

	?>
	<!-- custom header -->
			</header>
			<h2 class="yellow" style="padding-left:30px;">Search Results</h2>

<div id="main-content-movie-listing" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">

	<?php // get_search_form(); ?>
<?php       udesign_main_content_top( is_front_page() ); ?>



<!-- 		venue search -->
	<?php if(isset($_GET['ven'])): ?>
		<?php if(count($events)>0):?>

							<?php foreach($events as $event): ?>
			    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                           udesign_blog_entry_before(); ?>
                                <div class="entry">
<?php                               udesign_blog_entry_top(); ?>

                                    <div class="post-top">
								<?php     	echo apply_filters('the_event_entry_list', $event);                           ?>

                             	   </div>
                             	   <div class="clear"></div>
<?php                           udesign_blog_entry_after(); ?>
						</div>
			    </div>
<?php                       echo do_shortcode('[divider_top]'); ?>
			<?php endforeach;

			 ?>

		<?php endif;?>
	<?php else: ?>
<!-- movie -->
	    <?php if (have_posts()) : ?>

		  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php while (have_posts()) : the_post(); ?>
			    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                           udesign_blog_entry_before(); ?>
                                <div class="entry">
<?php                               udesign_blog_entry_top(); ?>
                                    <div class="post-top">
<?php                               //    udesign_blog_post_top_area_inside(); ?>
                                    </div>
				<!-- end post-top -->
				<div class="clear"></div>
<?php                             //  udesign_blog_post_content_before(); ?>
<?php                               // Post Image
                                   // display_post_image_fn( $post->ID, true ); ?>

<?php				    if ( $udesign_options['show_excerpt'] == 'yes' ) {


									$events = EM_Events::get_on_movies($post);
									$my_event = $events[0];
									echo apply_filters('the_event_entry_list', $my_event);

                                     //   the_excerpt(); //display the excerpt
                                        if ( $udesign_options['blog_button_text'] ) {
                                          //  echo do_shortcode('[read_more text="'.$udesign_options['blog_button_text'].'" title="'.$udesign_options['blog_button_text'].'" url="'.get_permalink().'" align="left"]');
                                            echo '<div class="clear"></div>';
                                        }
                                    } else {
                                        the_content( $udesign_options['blog_button_text'] );
                                    } ?>

<?php                               udesign_blog_entry_bottom(); ?>
                                </div>
<?php                           udesign_blog_entry_after(); ?>
			    </div>
<?php                       echo do_shortcode('[divider_top]'); ?>
			<?php endwhile;

			 ?>

			<div class="clear"></div>

<?php		// Pagination
		if(function_exists('wp_pagenavi')) :
		    wp_pagenavi();
		else : ?>
		    <div class="navigation">
			<div class="alignleft"><?php previous_posts_link() ?></div>
			<div class="alignright"><?php next_posts_link() ?></div>
		</div>
<?php		endif; ?>

<?php       else :

		if ( is_category() ) { // If this is a category archive
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
<?php		if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar2') ) { get_sidebar('PagesSidebar2'); } ?>
</div>
<!-- end content-container -->

<div class="clear"></div>

<?php
get_footer();