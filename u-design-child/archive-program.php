<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_archive_sidebar'] == 'yes' ) $content_position = 'grid_24';

?>
 	<!--  navigation -->
 <?php
 	if(isset($_GET['festival'])):
 		if(my_get_term_id('event-categories','2014-starz-denver-film-festival') == trim($_GET['festival'])):
 			get_header('starz');
 			echo get_top_navigation('starz');
 		?>
 			</header>
 		<?php
 		elseif(my_get_term_id('event-categories','2015-stanley-film-festival') == trim($_GET['festival'])):
 			get_header('stanley');
 			echo get_top_navigation('stanley');
 		?>
 		</header>
	<!-- custom header -->
	<?php else:
		get_header();
	?>
		</header>
	<?php
		endif;
	else:
		get_header();
	?>
	</header>
	<?php
	endif;
	?>

    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php       udesign_main_content_top( is_front_page() ); ?>
		<?php
		global $wp_query;
		$paged = (get_query_var('paged') ? get_query_var('paged'): 1);
		$args = array(
			'post_type'	=> 'program',
			'posts_per_page' => 10,
			'paged'			=> $paged,
			'paging'		=> true,
			'orderby'		=> 'title',
			'order'			=> 'ASC'
		);


		$temp_query = $wp_query;

		$search_query = array();


		if(isset($_GET['festival']))
		{
			$search_query[] = array(
					'key'	=> 'festival',
					'value'	=>  trim($_GET['festival']),
					'compare' => 'like'
			);
			$args['meta_query'] = array('relation'=>'OR', $search_query[0]);
		}


		$wp_query = new WP_Query($args);
		?>

	    <?php if (have_posts()) : ?>

		  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php while (have_posts()) : the_post(); ?>
			    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                           udesign_blog_entry_before(); ?>
                                <div class="entry">
<?php                               udesign_blog_entry_top(); ?>
                                    <div class="post-top">
                                    </div><!-- end post-top -->
                                    <div class="clear"></div>
<?php                               udesign_blog_post_content_before(); ?>
<?php                               // Post Image
									$image= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),array(154,83));
									if(!empty($image)):
                                     ?>
								<div class="one_third">
									<?php if($image):?>
										<a href="<?php echo get_permalink($post->ID);?>"><img src="<?php echo $image[0];?>" width="154" height="83" alt="no image" /></a>
									<?php endif;?>
								</div>
								<div class="two_third last_column">
									<?php  echo apply_filters('the_program_entry_list', $post->ID); ?>
								</div>
								<?php else: ?>
									<?php  echo apply_filters('the_program_entry_list', $post->ID); ?>
								<?php endif;?>
                                </div>
			    </div>
<?php                       echo do_shortcode('[divider_top]'); ?>
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
	    wp_reset_query(); ?>

	    <div class="clear"></div>
<?php       udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( ( !$udesign_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar3') ) { get_sidebar('PagesSidebar3'); } ?>

<!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



