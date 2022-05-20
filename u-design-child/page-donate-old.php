<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Donate Page OLD
 *
 */
get_header(); ?>
			<!--  start custom header content -->
			<?php  echo get_top_navigation();?>
			</header>

			<!-- FILMS -->
			<div id=""main-page-content""  class="grid_16" >
				<?php  the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
				<div class="clearfix"></div>

				<div style="text-align:left; padding-left:20px; padding-right:20px;">
					<p><strong>What better way to show your love of film and the arts in Denver than to support aspiring young filmmakers?</strong></p>
					<h3 class="yellow">Become a Donor</h3>
					<p>Please consider the contribution of scholarship funds so deserving youth without the financial means can continue to participate in the Young Filmmakers Workshops.</p>
					<p class="yellow" ><em>"...the workshop was the most influential experience in my life so far.Before the workshop, I had always loved film and dreamed of putting my stories to film, but I had no opportunity to explore this interest."</em></p>
					<p>James Weber - Young Filmmakers Workshop Alumnus <br/> Attending Loyola Marymont School of Film and Television</p>
					<p>Charitable support is fully tax-deductible.
					Denver Film Society is a 501(c)(3) Colorado not-for-profit organization,
					federal tax #84-0771070.</p>
					<hr>
					<h3 class="yellow">You Can Help</h3>
					<p>Demand for scholarship support is high - in 2013, 30% of enrollments (36 out of 121)
					received financial aid, with 92% of these students receiving full-tuition
					scholarships ($800 each). Further, 67% of scholarship recipients are economically
					disadvantaged, with family income below 130% of the federal poverty line.</p>
					<hr>
					<h3 class="yellow">Become a Sponsor</h3>
					<p>We are also seeking corporate sponsors for the program. Please contact Shawn
					Bayer, Director of Development, at 303-595-3456, x232 for more information.</p>
				</div>
			</div>
			<aside style="margin-top:0">
				<div id="sidebar" class="grid_8 movie_sidebar">
					<div id="sidebarSubnav" style="text-align:center;">
						<h3>Donate Now!</h3>
						<div class="donate_price_list">
							<select class="donate_price_select">
								<option value="">-- Select</option>
								<option value="25">$25</option>
								<option value="50">$50</option>
								<option value="100">$100</option>
								<option value="250">$250</option>
								<option value="500">$500</option>
								<option value="1000">$1000</option>
								<option value="2500">$2500</option>

							</select>
							<a class="sliderBtn">Add to Cart</a>
						</div>

						<div class="donate_right_panel">
							<a class="sliderBtn" href="http://vimeo.com/87967982">Click Here</a>
							<p><strong>to see our 2014 promotional video!</strong></p>
						</div>

						<div class="donate_right_panel">
							<a class="sliderBtn" href="http://www.denverfilm.org/_uploaded/2014yfwbrochure_206123.pdf">Click Here</a>
							<p><strong>to view or download 2014 Young Filmmakers Workshop brochure!</strong></p>
						</div>
					</div>
				</div>
			</aside>

			<div class="clearfix"></div>
<?php
get_footer();


