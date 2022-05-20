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
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>
	</header><!-- .entry-header -->
<?php       udesign_single_post_entry_before(); ?>
                 <div class="entry">
<?php                  udesign_single_post_entry_top();
                       if( $udesign_options['display_post_image_in_single_post'] == 'yes' ) display_post_image_fn( $post->ID, false );

                       //print content
?>

<p>
<?php  the_field("time"); ?>
</p>
<p>
<?php  the_field("subtitle"); ?>
</p>
<p>  <?php
		$author = get_field("author");
		if(!empty($author))
		{
		 	echo "By ". $author;
		}
?>
</p>
<?php 				the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
?>

<?php
						wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<?php                           udesign_single_post_entry_bottom(); ?>
			    </div>
<?php                       udesign_single_post_entry_after(); ?>
</article><!-- #post-## -->