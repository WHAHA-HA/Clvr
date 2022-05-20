<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$content_position = 'grid_24';
$news_category = get_query_var('news_category');
if($news_category == 'news-stars'):
	get_header('starz');

?>
	<!-- start custom header section -->
				<?php echo get_top_navigation('starz'); ?>
			</header>

<?php elseif ($news_category=='news-stanley'): ?>
	<?php get_header();?>
			<?php echo get_top_navigation('stanley'); ?>
			</header>

<?php else:
	get_header();
?>
	<!-- custom header -->
			</header>

<?php endif; ?>

    <div id="main-content" class="<?php echo $content_position; ?> all_news_board " style="margin-top:0">
	<div class="main-content-padding">
	<h1>News</h1>
<?php       udesign_main_content_top( is_front_page() ); ?>

	    <?php if (have_posts()) : ?>

		  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php while (have_posts()) : the_post(); ?>
			    <div <?php post_class(); ?> id="post-<?php the_ID(); ?> ">
<?php                           udesign_blog_entry_before(); ?>
                                <div class="entry">
<?php                               udesign_blog_entry_top(); ?>
                                    <div class="post-top">
<?php
	                                  //udesign_blog_post_top_area_inside();
	                                  //print each news
?>
				<p class="yellow"><?php the_field("time"); ?> </p>
 				<p><a class="news_title" href="<?php  echo  get_permalink();?>"><?php  the_title(); ?></a></p>
                                    </div><!-- end post-top -->
                                    <div class="clear"></div>
<?php                               udesign_blog_post_content_before(); ?>

<?php                               udesign_blog_entry_bottom(); ?>
                                </div>
<?php                           udesign_blog_entry_after(); ?>
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
	    wp_reset_query(); ?>

	    <div class="clear"></div>
<?php       udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php  //	if( ( !$udesign_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

<!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



