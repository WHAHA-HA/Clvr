<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$faq_category = get_query_var('venues');
if($faq_category == '2014-starz-denver-film-festival-venue'):
	get_header('starz');

?>
	<!-- start custom header section -->
				<?php echo get_top_navigation('starz'); ?>
			</header>

<?php elseif ($faq_category=='venue-stanley'): ?>
	<?php get_header();?>
			<?php echo get_top_navigation('stanley'); ?>
			</header>

<?php else:
	get_header();
?>
	<!-- custom header -->
			</header>

<?php endif; ?>
<?php
/* $content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_archive_sidebar'] == 'yes' ) $content_position = 'grid_24'; */
$content_position = 'grid_16'; ?>

<div id="main-content"	class="<?php echo $content_position; ?> all_news_board " >
	<div class="main-content-padding">
		<h1>Venues</h1>
<?php       udesign_main_content_top( is_front_page() );


	global $wp_query;

	global $query_string;



	$new_query = new WP_Query($query_string."&order=asc");

	$temp_query = $wp_query;

	$wp_query = $new_query;
?>

	    <?php if (have_posts()) : ?>

		  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php while (have_posts()) : the_post(); ?>

			 <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			 	<div class="entry">
			 		<a href="<?php echo get_permalink();?>" style='text-decoration:none'><?php the_title( '<h3 class="yellow" >', '</h3>' ); ?></a>
					<p>
					<?php

						echo apply_filters('the_venue_content', $post->ID);
					?>
				</p>
				</div>
			</div>
			<?php endwhile; ?>

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
	    wp_reset_query(); ?>		<div class="clear"></div>
<?php       udesign_main_content_bottom(); ?>
	</div>
	<!-- end main-content-padding -->
</div>
<!-- end main-content <--></-->
<div class="up_sidebar">
<?php  	if( ( !$udesign_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar3') ) { get_sidebar('PagesSidebar3'); } ?>
</div>
<!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



