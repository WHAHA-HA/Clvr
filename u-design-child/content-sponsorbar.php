<?php
/**
 * The template for displaying posts in the Venue post format
 *
 * @package WordPress
 * @subpackage U-design
 * @since Ven
 */
?>
	<!-- SPONSORS -->
			<div class="sponsors">
				<ul class="bxslider2">

<?php
				//print content
				$sponsors = get_field("sponsors");
				if($sponsors):
					foreach($sponsors as $sponsor):
						$image = get_field('logo',$sponsor->ID);
						if($image && !empty($image)):
?>
				<a href="<?php echo get_post_permalink($sponsor->ID);?>">
				<img src="<?php echo DENVER_ROOT. $image;?>">
				</a>
<?php
						endif;
					endforeach;
				endif;
?>
				</ul>
			</div>
