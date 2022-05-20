<?php
/**
 * The template for displaying posts in the Venue post format
 *
 * @package WordPress
 * @subpackage U-design
 * @since Ven
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<header class="entry-header">

		<?php
			if ( is_single() ) :
				the_title( '<h3 class="entry-title yellow" >', '</h3>' );
			else :
				the_title( '<h3 class="entry-title yellow"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;
		?>
	</header><!-- .entry-header -->
<?php       udesign_single_post_entry_before(); ?>
                 <div class="entry">
<?php                  udesign_single_post_entry_top();
                       if( $udesign_options['display_post_image_in_single_post'] == 'yes' ) display_post_image_fn( $post->ID, false );


?>
	<p>
		<?php
			echo $post->ID;
			echo apply_filters('the_venue_content', $post->ID);
		?>
	</p>
<?php
				//print content
				the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
						wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<?php             //              udesign_single_post_entry_bottom(); ?>
			    </div>
<?php                       udesign_single_post_entry_after(); ?>
</article><!-- #post-## -->