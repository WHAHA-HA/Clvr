<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options; ?>
			<div class="clearfix"></div>
			<!-- container div ends -->

<!-- SCRIPTS ================================================== -->

	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.bxslider').bxSlider({
				  pager: false,
				  controls: true,
				  autoStart: true,
				  auto: true,
				  onSliderLoad: function(currentIndex){
					  jQuery('.slider').css('visibility','visible');
					  jQuery('.slider').css('height','auto');
				  }
				});
			});

		jQuery('.bxslider2').bxSlider({
		  minSlides: 7,
		  maxSlides: 7,
		  slideWidth: 130,
		  slideMargin: 10,
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

		jQuery(".filmFinder ul.browse > li.toggle > div.scroll> ul > li > a").click(function(){
			console.log(jQuery(this));
			var anc= jQuery(this);
			var cat = jQuery(this).parent().parent().parent().children("input[name^='keyword']").eq(0).val();
			window.location = '<?php echo site_url();?>/movie?'+cat+'='+anc.html();

			});

		<?php
				ob_start();
				include( 'main-menu.php');
				$htmlMenu = ob_get_clean();
			?>
			jQuery('#nav').hide().html(<?=json_encode($htmlMenu)?>);
			jQuery('#nav').show();
	</script>
<!-- footer starts -->
			<footer>
				<div class="topFooter">
					<div class="topFooterLeft">
						<p>Join our weekly newsletter...</p>
						<ul class="topFooterList">
							<li><input type="text" class="topFooterInput" placeholder="your@email.com"></li>
							<li><input type="submit" class="topFooterBtn" value="SIGN UP"></li>
						</ul>
					</div>

					<div class="topFooterRight">
						<ul class="topFooterSocial">
							<li><a href="http://www.facebook.com/denverfilm"><img src="<?=CUSTOM_STYLE_DIR?>/images/fb.jpg" alt=""></a></li>
							<li><a href="http://www.twitter.com/denverfilm"><img src="<?=CUSTOM_STYLE_DIR?>/images/tt.jpg" alt=""></a></li>
							<!-- <li><a href="#"><img src="<?=CUSTOM_STYLE_DIR?>/images/yt.jpg" alt=""></a></li> -->
						</ul>
					</div>

				</div>
				 <div class="clearfix"></div>
				<div class="botFooter">
					<ul class="footerList">
						<li><a href="">About</a></li>
						<li><a href="<?php echo site_url('about/work/'); ?>">Jobs/Internships</a></li>
						<li><a href="<?php echo site_url('about/volunteer/'); ?>">Volunteer</a></li>
						<li><a href="<?php echo site_url('about/misson-history/'); ?>">Mission & History</a></li>
					</ul>
					<ul class="footerList">
						<li><a href="#">Contact</a></li>
						<li><a href="<?php echo site_url('about/admin-office/');?>">Directions</a></li>
						<li><a href="<?php echo site_url('contact/contact-us/'); ?>">Office Directory</a></li>
						<li><a href="<?php echo site_url('contact/sfc-directory/'); ?>">SFC Directory</a></li>
						<li><a href="<?php echo site_url('film-center/rentals/');?>">Rentals</a></li>
					</ul>

					<ul class="footerList">
						<li><a href="<?php echo site_url('industrypress');?>">Industry/Press</a></li>
						<li><a href="<?php echo site_url('news'); ?>">Releases</a></li>
						<li><a href="<?php echo site_url('press'); ?>">Contact Publicity</a></li>
						<li><a href="http://fs21.formsite.com/tbrislinsdff/form6/index.html" target="_blank">Accreditations</a></li>

					</ul>
					<div class="clearfix"></div>

					<p>
					The Denver Film Society's Mission is to develop opportunities for diverse audiences to discover film through creative thought-provoking experiences. The Denver Film Society is a registered 501(c)3 Tax ID: 84-0771070.
					</p>
				</div>

				<a href="#"><img src="<?=CUSTOM_STYLE_DIR?>/images/logo2.jpg" alt="" class="logo2"></a>
			</footer>
			<!--  end footer -->
		</section>
		<!--  end main container section -->
	</div><!-- end page-content -->

<?php   wp_footer(); ?>

<?php udesign_body_bottom(); ?>

</body>
</html>