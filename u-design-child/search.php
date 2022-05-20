<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Allsite Search page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options;

	get_header('sie');
	echo get_top_navigation('sie');
?>
<!-- custom header -->
</header>
	<header class="entry-header"><h1 class="entry-title">

	</h1>
	</header><!-- .entry-header -->
<?php

	if(get_post_type()=="event")
		$content_position = "grid_16";
	else
		$content_position = "grid_16";

?>
<div id="main-content-movie-listing" class="<?php echo $content_position; ?>">
<div class="main-content-padding">
<?php get_search_form();?>
<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key=>$string)
{
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] =urlencode($query_split[1]);
}
$search = new WP_Query($search_query);
$total_results = $wp_query->found_posts;
?>
<div <?php post_class(); ?>>
<div class="entry">
About <?php echo $total_results; ?> results (0.39secs)
</div>
</div>
<?php

if (have_posts ()) :
		while ( have_posts () ) :
			the_post ();
		//	print_r($post);
			?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                       udesign_single_post_entry_before(); ?>
                            <div class="entry">
				<?php       udesign_blog_entry_top(); ?>
							<a class="yellow" href="<?php echo get_permalink();?>"><h3><?php the_title();?></h3></a>
                                    <div class="post-top">
								<?php  echo truncate(get_the_content(),120);  ?>
                             	   </div>
                             	   <div class="clear"></div>
<?php                           udesign_blog_entry_after(); ?>
			    </div>
			    <?php                           udesign_blog_entry_after(); ?>
			</div>
			<?php                       echo do_shortcode('[divider_top]'); ?>
<?php
		endwhile; ?>
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
<?php
	 else :
		?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>

<?php           udesign_main_content_bottom(); ?>

<?php

	?>
	<div class="clear"></div>
	</div>
	</div>
<div class="up_sidebar">
<?php
if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) {  get_sidebar('BlogSidebar'); }
?>
</div>

<!-- <div class="clear"></div> -->
<script type="text/javascript">
		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php
get_footer();