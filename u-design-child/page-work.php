<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Work withus Page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
	// Home Page Main -Denver Festival
?>
<!--  start custom header content -->
	<?php echo get_top_navigation();?>
</header>
<?php $content_position = 'grid_24'; ?>

<div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding jobsinternship">
		<?php if(have_posts()): the_post(); ?>
		<?php the_content(); ?>
		<?php endif;?>
	</div>
</div>
<!--  script -->
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("a.leftLink").click(function(){
			//console.log(jQuery(this).attr('href'));
			jQuery(".jobsinternship .three_fourth.last_column .tab_content").removeClass("active");
			var id =".jobsinternship .three_fourth.last_column .tab_content"+jQuery(this).attr('href');
			jQuery("a.leftLink").removeClass("active");
			jQuery(this).addClass("active")

			jQuery(id).addClass("active");
			return false;
		});
});
</script>
<?php

get_footer();