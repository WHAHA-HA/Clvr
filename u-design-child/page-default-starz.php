<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Default Starz Template
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('starz');

/* $content_position = ( $udesign_options['pages_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_default_page_sidebar'] == 'yes' ) $content_position = 'grid_24'; */
?>
			<?php echo get_top_navigation('starz'); ?>
			</header>

<?php       udesign_main_content_top( is_front_page() ); ?>
	<?php
			/* if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
 */
			if(get_post_type()=="event")
				$content_position = "grid_16";
			else
				$content_position = "grid_24";
	?>
	<!--  <div id="main-content" class="<?php echo $content_position; ?>"> -->
<?php	    if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php               udesign_entry_before(); ?>
		    <div class="entry">
<?php                   udesign_entry_top(); ?>
<?php			the_content(); ?>
<?php                   udesign_entry_bottom(); ?>
		    </div>
<?php               udesign_entry_after(); ?>
		</div>
<?php	    endwhile; endif; ?>
	<!-- </div> -->
	    <!-- <div class="clear"></div> -->
	    <script type="text/javascript">

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php
get_footer();