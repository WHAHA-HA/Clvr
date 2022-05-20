<?php
/**
 * The template for displaying posts in the Venue post format
 *
 * @package WordPress
 * @subpackage U-design
 * @since Ven
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" class="grid_16">
	<!--
	<header class="entry-header">

		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>
	</header>
	 -->
	<!-- .entry-header -->
<?php       udesign_single_post_entry_before(); ?>
                 <div class="entry">
<?php                  udesign_single_post_entry_top();
                       if( $udesign_options['display_post_image_in_single_post'] == 'yes' ) display_post_image_fn( $post->ID, false );

?>
<?php
	//first print image
	$image= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
	if($image)
		echo "<img src='{$image[0]}' />";
?>
	<h2><?php  the_title(); ?></h2>
<?php
	the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
	echo do_shortcode('[divider]');
?>
	<h3 class="yellow">Films and Events in Program...</h4>
<?php
	//output films in progarms list
	$movies = get_field('films', $post->ID);
	foreach($movies as $movie)
	{
		echo apply_filters('the_movie_entry_list', $movie);
	}
?>
<?php
						wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<?php           //                udesign_single_post_entry_bottom(); ?>
			    </div>
<?php                       udesign_single_post_entry_after(); ?>
</article><!-- #post-## -->