<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $post;
	$parent = get_post($post->post_parent);
if($parent->post_name == 'starz-denver-festival'):
	get_header('starz');

?>
	<!-- start custom header section -->
				<?php echo get_top_navigation('starz');?>
			</header>

<?php elseif ($parent->post_name=='stanley-film-festival'): ?>
	<?php get_header('stanley');?>
			<?php echo get_top_navigation('stanley'); ?>
			</header>
<?php elseif ($parent->post_name=='film-education'): ?>
	<?php get_header('education');?>
			<?php echo get_top_navigation('education'); ?>
			</header>
<?php elseif ($parent->post_name=='film-on-the-rocks'): ?>
	<?php get_header('filmrocks');?>
			<?php echo get_top_navigation('filmrocks'); ?>
			</header>
<?php elseif ($parent->post_name=='filmmaker-focus'): ?>
	<?php get_header('filmmaker');?>
			<?php echo get_top_navigation('filmmaker'); ?>
			</header>
<?php elseif ($parent->post_name=='film-center'): ?>
	<?php get_header('sie');?>
			<?php echo get_top_navigation('sie'); ?>
			</header>
<?php else:
	get_header();
	echo get_top_navigation();
endif;
?>
	<!-- custom header -->
			</header>
<?php       udesign_main_content_top( is_front_page() ); ?>
	<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;

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