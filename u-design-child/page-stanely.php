<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Home Page Stanley
 * It's now for 2015
 */


get_header('stanley'); ?>

			<?php echo get_top_navigation('stanley'); ?>
			</header>

			<!-- SLIDER -->
			<?php echo stanley_slider_content(); ?>

			<!-- FILMS -->
			<div class="filmsBlock">

				<h3 class="evTitle festTitle">Browse Films</h3>

				<div class="clearfix"></div>
				<?php
					global $wp_query;
					global $sliders;
					wp_reset_query();
				?>
				<div class="filmsBox">
					<ul class="filmsList">
						<?php
							foreach($sliders as $slider):
						?>
						<li>
							<img src="<?php  echo $slider['image'];?>" alt="" width="258" height="175"/>
							<a href="<?php echo $slider['link']; ?>"><?php echo $slider['title']; ?></a>
						</li>
						<?php
							endforeach;
						?>
					</ul>
				</div>
				<aside>
				<?php
					//need to set this param in admin UI
					//stanley 2015
					$_GET['festival'] =221;
					get_sidebar('PagesSidebar3'); ?>
				</aside>
			</div>

			<div class="clearfix"></div>

	<!-- SCRIPTS
	================================================== -->
	<script type="text/javascript">
        /* (function (jQuery) {
            jQuery(window).load(function () {
                jQuery("div.scroll").mCustomScrollbar();
            });
        })(jQuery); */
	</script>
<!--
	<script type="text/javascript">
		jQuery(document).ready(function(){

		  jQuery('.bxslider').bxSlider({
			  pager: false,
			  controls: true
			});
		});

		//jQuery("div.scroll").mCustomScrollbar();

		jQuery('.bxslider2').bxSlider({
		  minSlides: 4,
		  maxSlides: 4,
		  slideWidth: 170,
		  slideMargin: 50,
		  autoStart: true,
		  auto: true,
		  pager: false,
		  controls: true
		});

		jQuery('.bxslider3').bxSlider({
		  minSlides: 1,
		  maxSlides: 3,
		  slideWidth: 258,
		  slideMargin: 25,
		  autoStart: true,
		  auto: true,
		  pager: false,
		  controls: true,
		  responsive: true
		});

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
 -->
<?php
echo get_feed_part();
get_footer();