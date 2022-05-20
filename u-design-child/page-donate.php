<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Donate Page
 *
 */
get_header(); ?>
			<!--  start custom header content -->
			<?php  echo get_top_navigation();?>
			</header>

			<!-- FILMS -->
			<div id="main-page-content"  class="grid_16" >
				<?php  the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
				<div class="clearfix"></div>

				<div style="text-align:left;  padding-right:20px;">
					<?php	    if (have_posts()) : while (have_posts()) : the_post();
						?>

								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php               udesign_entry_before(); ?>
								    <div class="entry">
						<?php                   udesign_entry_top(); ?>
						<?php			the_content();
							?>
						<?php                   udesign_entry_bottom(); ?>
								    </div>
						<?php               udesign_entry_after(); ?>
								</div>
						<?php	    endwhile; endif; ?>
				</div>
			</div>
			<aside style="margin-top:0">
			<form action="http://www.denverfilm.org/cart/index.aspx" method="post" id="donateform" name="donateform">
				<div id="sidebar" class="grid_8 movie_sidebar">
					<div id="sidebarSubnav" style="text-align:center;">
						<h3>Donate Now!</h3>
						<div class="donate_price_list">
							<select class="donate_price_select" name="dd_Amount" id="template_dd_Amount">
								<option value="">-- Select</option>
								<option value="25">$25</option>
								<option value="50">$50</option>
								<option value="100">$100</option>
								<option value="250">$250</option>
								<option value="500">$500</option>
								<option value="1000">$1000</option>
								<option value="2500">$2500</option>

							</select>
							<a href="javascript:{}" id="btnAddCart" onclick="donateform.submit(); return false;" class="sliderBtn" type="submit" >Add to Cart</a>
						</div>

					</div>
				</div>
			</form>
			</aside>

			<div class="clearfix"></div>
<?php
get_footer();


