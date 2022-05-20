<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Festival Year round Sponsors page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$content_position = 'grid_24';
//	fetch sponsors

	/* if(isset($_GET['festival']))
	{
		$festival_id = trim($_GET['festival']);
	}
	else
		$festival_id = 80;

	//festival post id
	$festival_post_id = get_term_IDs('event-categories','festivalid', $festival_id);
	if($festival_post_id)
		$festival_post_id = $festival_post_id[0];

	//print_r($festival_post_id);

	$sponsors = get_field('sponsors', $festival_post_id->taxonomy.'_'. $festival_post_id->term_id);
 */
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'sponsor',
		'meta_key'		=> 'year_round_sponsor',
		'meta_value'	=> 1
	);
	$sponsors = new WP_Query($args);
	if(!empty($sponsors)):
		echo get_top_navigation();
		?>
	<!-- custom header -->

			</header>

    <div id="main-content" class="<?php echo $content_position; ?>" >
	<div class="main-content-padding sponsor-padding ">
		    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			    	<h3 style="color:#596367">Year Round Sponsors</h3>
                                <div class="entry">
                                    <div class="clear"></div>
<?php                               // Post Image

		 if($sponsors->have_posts()):
			$index = 0;
		 	while($sponsors->have_posts()):
		 		$sponsors->the_post();
				global $post;
		 			$logo = get_field('logo', $post->ID);
		 			$index++;
		 			if($index % 4==0)
		 				$class="one_fourth_last";
		 			else
		 				$class="one_fourth";
		 		?>
				<div class="<?php  echo $class;?>" >
		 			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo DENVER_ROOT.$logo;?>">
				</a>
				</div>
		 		<?php
		 	endwhile;

		 endif;
			 ?>
                        </div>
			    </div>
			<div class="clear"></div>

<?php		// Pagination
		if(function_exists('wp_pagenavi')) :
		    wp_pagenavi();
		else: ?>
		    <div class="navigation">
			    <div class="alignleft"><?php previous_posts_link() ?></div>
			    <div class="alignright"><?php next_posts_link() ?></div>
		    </div>
<?php		endif; ?>
<?php endif; ?>

	    <div class="clear"></div>
<?php       udesign_main_content_bottom(); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
<!-- end content-container -->

<div class="clear"></div>

<?php
get_footer('nosponsor');



