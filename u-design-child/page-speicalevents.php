<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Special Events Page
 *
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('sie');
	// Home Page Main -Denver Festival
?>
	<!--  start custom header content -->
	<?php echo get_top_navigation('sie');?>
</header>

<!-- home slider -->
<?php echo home_slider_content();?>

<?php $content_position = 'grid_24'; ?>

<?php
global $wp_query;
$paged = (get_query_var ( 'paged' ) ? get_query_var ( 'paged' ) : 1);
$args = array (
		'post_type' => 'program',
		'posts_per_page' => 10,
		'paged' => $paged,
		'paging' => true,
		'orderby' => 'title',
		'order' => 'ASC'
);

$temp_query = $wp_query;

$search_query = array ();


	$search_query [] = array (
			'key' => 'festival',
			'value' =>my_get_term_id('event-categories','special-events'),
			'compare' => 'like'
	);
	$args ['meta_query'] = array (
			'relation' => 'OR',
			$search_query [0]
	);

// generate query
$wp_query = new WP_Query ( $args );
if ( is_single() ) :
the_title( '<h1 class="entry-title">', '</h1>' );
else :
the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
endif;
?>

<div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding jobsinternship">
		<div class="one_fourth">
			<ul class="yellow programmenu">
				  <?php if (have_posts()) : ?>
				  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				<?php while (have_posts()) : the_post(); ?>
					<li><a href= "<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;
				endif; ?>
			</ul>
			<p></p>
		</div>
		<div class="three_fourth last_column">

			<img src="<?=CUSTOM_STYLE_DIR."/images/special_logo.jpg"?>" alt="no">
			<br />
			<p>No mere movie theater, the Sie FilmCenter is Denver's premier
				cinematheque. As the home of the Denver Film Society, it features
				the finest in independent and world cinema - from new limited
				releases to arthouse retrospectives - on a weekly-changing schedule
				that accommodates 600-plus titles per year. The Sie FilmCenter also
				regularly hosts festivals, program series and other special events,
				bringing filmgoers and filmmakers together to celebrate the art of
				the motion picture.</p>
			<a class="yellow" href="#">BEST OF WESTWORD 2013:</a><br /> <a
				class="yellow" href="#">BEST MOVIE THEATRE - PROGRAMMING: Sie
				FilmCenter</a><br /> <a class="yellow" href="#">BEST PRE & POST
				MOVIE PARTY SPOT: Sie FilmCenter</a><br />
		</div>
	</div>
</div>

<?php

get_footer();