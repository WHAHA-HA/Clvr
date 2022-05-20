<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options;

//festival is event_categories post id
	$festival = isset($_GET['festival']) ? trim($_GET['festival']) : null;
	//get festival info



	if($festival && my_get_term_id('event-categories','2014-starz-denver-film-festival') == $festival ):
		get_header('starz');
	 	echo get_top_navigation('starz');
	elseif ($festival &&  my_get_term_id('event-categories','2015-stanley-film-festival')== $festival):
		get_header('stanley');
		echo get_top_navigation('stanley');
	else:
		get_header('sie');
		echo get_top_navigation('sie');
	 endif;?>

		<!-- custom header -->
			</header>
<?php
		$content_position = "grid_16";
?>
	<div id="main-content" class="<?php echo $content_position; ?>">
<?php           udesign_main_content_top( is_front_page() ); ?>
<?php		if (have_posts()) :
		    while (have_posts()) : the_post();
				get_template_part('content','movie');
		    endwhile; else: ?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>
<?php           udesign_main_content_bottom(); ?>

</div>
<?php
	if((!$festival))
	{

		if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); }
	}
	else
	{
		if( ( !$udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('PagesSidebar3') ) { get_sidebar('PagesSidebar3'); }
	}
?>
	    <!-- <div class="clear"></div> -->
	    <script type="text/javascript">

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php

get_footer();


