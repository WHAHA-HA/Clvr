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
<?php
				//print content
				$image = get_field("logo");
				if($image):
?>
				<img src="<?=DENVER_ROOT.$image?>"/>
<?php
				endif;
				the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
?>
			    </div>
<?php                       udesign_single_post_entry_after(); ?>
</article><!-- #post-## -->