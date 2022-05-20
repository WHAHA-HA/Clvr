<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Now Playing Page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options;

//festival is event_categories post id
$festival = isset($_GET['festival']) ? trim($_GET['festival']) : null;

//there are some cases when we accept category parameter as of now

$festival = isset($_GET['category']) ? trim($_GET['category']) : null;
//get festival info

	if($festival && my_get_term_id('event-categories','2013-starz-denver-film-festival') == $festival ):
	get_header('starz');
	echo get_top_navigation('starz');
	elseif ($festival &&  my_get_term_id('event-categories','2015-stanley-film-festival')== $festival):
	get_header('stanley');
	echo get_top_navigation('stanley');
	else:
	get_header('sie');
	echo get_top_navigation('sie');
		 endif;?>
<!-- custom header -->
</header>
	<header class="entry-header"><h1 class="entry-title">
			Now Playing
	</h1>
	</header><!-- .entry-header -->
<?php

	if(get_post_type()=="event")
		$content_position = "grid_16";
	else
		$content_position = "grid_16";

?>
<div id="main-content-movie-listing" class="<?php echo $content_position; ?>">
<?php     //      udesign_main_content_top( is_front_page() ); ?>
<?php


if (have_posts ()) :
		while ( have_posts () ) :
			the_post ();
			?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php                       udesign_single_post_entry_before(); ?>
                            <div class="entry">
<?php
			the_content ( __ ( '<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign' ) );
			?>
			    </div>
	</div>
<?php
		endwhile
		;
	 else :
		?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>

<?php           udesign_main_content_bottom(); ?>

<?php

	?>
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


