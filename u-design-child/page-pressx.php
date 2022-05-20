<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Press Page old
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options;

    get_header();
// Home Page Main -Denver Festival
?>
			<!--  start custom header content -->
				<p class="quote"><span>"The Denver Film Society is the greatest institution in Colorado to experience film at a higher level."</span> <br> - DFS Founder Ron Henderson</p>
			</header>

			<!-- SLIDER -->
			<div class="slider">
				<ul class="bxslider">

				<?php
						//retrieves now and upcoming movies...
								global $wp_query;
								$temp_query  = $wp_query;

								$args = array(
									'post_type' => 'event',
									'event-categories' =>'film-rocks',
									'orderby' => 'date',
									'order' => 'DESC',
									'posts_per_page' => 5
								);

								$wp_query = new WP_Query($args);
							if(!have_posts()):
								while(have_posts()):the_post();

									$image= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),array(880,480));
									global $post;

							?>

				  <li>
				  	<!-- <img src="<?=CUSTOM_STYLE_DIR?>/images/slider.jpg" alt="" width="880" height="480"> -->
				  	<img src="<?php echo $image[0];?>" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>September 15, 2014</p>
				  		<h1><?php the_title(); ?></h1>
				  		<a href="#" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				  <?php
				  		endwhile;
				  	endif;
				  	$wp_query = $temp_query;
				  ?>


				  <li>
				  	<img src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/Alphaville_960x530.jpg" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>September 15, 2014</p>
				  		<h1>Alphaville</h1>
				  		<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26776" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				<li>
				  	<img src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/BillMurray2_960x530.jpg" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>September 15, 2014</p>
				  		<h1>Bill Murray: The Triumph of the Infantile</h1>
				  		<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26776" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				  <li>
				  	<img src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/CineLatino_960x530.jpg" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>CineLatino Film Festival</p>
				  		<h1><?php the_title(); ?></h1>
				  		<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26706&FID=77" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				  <li>
				  	<img src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/DavidBowieIs_960x530.jpg" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>September 15, 2014</p>
				  		<h1>David Bowie Is</h1>
				  		<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26701" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				  <li>
				  	<img src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/MudBloods_960x530.jpg" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>September 15, 2014</p>
				  		<h1>Mudbloods</h1>
				  		<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26814" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				  <li>
				  	<img src="<?=CUSTOM_STYLE_DIR?>/images/newrotator/TheOneILove_960x530.jpg" alt="" width="880" height="480">
				  	<div class="caption0">
				  		<p>September 15, 2014</p>
				  		<h1>The One I Love</h1>
				  		<a href="http://www.denverfilm.org/filmcenter/detail.aspx?id=26699
				  		" class="sliderBtn">Buy Ticket</a>
				  	</div>
				  </li>
				</ul>

			</div>
<?php

		$content_position = "grid_16";

?>
<div id="main-content-film-eudcation" class="<?php echo $content_position; ?> <?php  get_page_template();?>">
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
<div class="education_sidebar">
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


