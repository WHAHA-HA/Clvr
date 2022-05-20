<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Festival Sponsors page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$content_position = 'grid_24';
//	fetch sponsors

	if(isset($_GET['festival']))
	{
		$festival_id = trim($_GET['festival']);
	}
	else
		$festival_id = 77;

	//festival post id
	$festival_post_id = get_term_IDs('event-categories','festivalid', $festival_id);
	if($festival_post_id)
		$festival_post_id = $festival_post_id[0];

	//print_r($festival_post_id);

	$sponsors = get_field('sponsors', $festival_post_id->taxonomy.'_'. $festival_post_id->term_id);
	//sort it
	$sort_sponsors = array();
	foreach($sponsors as $sponsor_id)
	{
		$sponsor_taxonomy = wp_get_post_terms($sponsor_id, 'sponsor-category');
		$sponsor_category = $sponsor_taxonomy[0];
		$logo_image = get_field('logo',$sponsor_id);
		if(empty($logo_image))
			continue;
		$sort_sponsors[$sponsor_category->slug][]= array(
				'logo'=>get_field('logo', $sponsor_id),
				'link'=>$sponsor_id);

	}

	if(!empty($sort_sponsors)):
		echo get_top_navigation();
		?>
	<!-- custom header -->
			</header>

    <div id="main-content" class="<?php echo $content_position; ?>" >
	<div class="main-content-padding sponsor-padding ">
		<h1 style="color:#000">Festival Sponsors</h1>
	  	<?php
	  		foreach($sort_sponsors as $sponsor_type=>$sub_sponsors):

	  		?>
			    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			    	<h3 style="color:#596367"><?php echo $sponsor_type;?></h3>
                                <div class="entry">
                                    <div class="clear"></div>
<?php                               // Post Image
			foreach($sub_sponsors as $sponsor_logo):
				if(!empty($sponsor_logo['logo']))

?>				<a href="<?php echo get_post_permalink($sponsor_logo['link']);?>">
				<img src="<?php echo DENVER_ROOT. $sponsor_logo['logo'];?>">
				</a>
<?php		endforeach; ?>
                        </div>
			    </div>
<?php                       echo do_shortcode('[divider_top]'); ?>
			<?php endforeach; ?>
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



