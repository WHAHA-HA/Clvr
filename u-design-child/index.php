<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

	// Home Page Main -Denver Festival
?>
			<!--  start custom header content -->
				<?php
					if(is_home()):
				?>
				<p class="quote" id="main_quote"><span>"The Denver Film Society is the greatest institution in Colorado to experience film at a higher level."</span> <br> - DFS Founder Ron Henderson</p>
				<?php endif; ?>
			</header>


			<!-- home slider -->
			<?php echo home_slider_content();?>
			<!-- EVENTS -->
			<div class="eventsBlock">
				<div class="showingBlock">
					<h3 class="evTitle">Now Showing</h3>
						<?php
								//retrieves now and upcoming movies...
								global $wp_query;
								$temp_query  = $wp_query;

								$args = array(
									'post_type' => 'event',
									'orderby' => 'date',
									'order' => 'DESC',
									'event-categories' => 'sfc-2014',
									'posts_per_page' => 1
								);

								$wp_query = new WP_Query($args);
							if(have_posts()):
								while(have_posts()):
									the_post();
									$show_time = get_event_duration($post->ID);
									$post_object = get_field ( "movie");

										if ($post_object)
										{

											$post = $post_object;
											setup_postdata($post);

											$image =get_movie_image($post);
											wp_reset_postdata();
										}
							?>
					<div class="showing">
						<a href="<?php  echo get_post_permalink();?>">
						<img src="<?=DENVER_ROOT.$image;?>" width="478" height="271" alt="">
						</a>
						<div class="caption">
							<h3><?php echo truncate(get_the_title(),17);?></h3>
							<h5><?php echo $show_time;?></h5>
							<!-- <p><?php the_excerpt();?></p>  -->
							<a href="<?php  echo get_post_permalink();?>" class="sliderBtn">Buy Ticket</a>
						</div>

					</div>
					<?php
						endwhile;
					endif;
					?>
				</div>

				<div class="calBlock">
					<h3 class="evTitle">Calendar</h3>
					<div class="cal">
						<!-- <img src="<?=CUSTOM_STYLE_DIR?>/images/calendar.jpg" alt=""> -->
						<!-- printcs calendar widget -->
						<?php
							echo EM_Calendar::output(array('full'=>0, 'long_events'=> 1));
						?>
					</div>
				</div>
				<div class="clearfix" style="height:20px;"></div>

				<!-- CAROUSEL-->
				<div class="carousel1">
					<?php
								//retrieves now and upcoming movies...
								global $wp_query;
								$temp_query  = $wp_query;

								$args = array(
									'post_type' => 'event',
									'orderby' => 'title',
									'order' => 'ASC',
									'event-categories' => 'sfc-2014',
									'posts_per_page' => 6
								);

								$wp_query = new WP_Query($args);
					?>
					<ul class="bxslider3" style="height: 271px;">
						<?php
							if(have_posts()):
								while(have_posts()):
									the_post();
									$show_time= get_event_duration($post->ID);
									$post_object = get_field("movie");
									if ($post_object)
									{
										$post = $post_object;
										setup_postdata($post);

										$image =get_movie_image($post);
										wp_reset_postdata();
									}
							?>

						  	<li>
						  		<?php echo apply_filters('the_movie_event_box', $post->ID, $show_time, $image);?>
							</li>
							<?php
								endwhile;
							endif;
							//restore original query
							$wp_query  = $temp_query;
						?>

					</ul>
				</div>


			</div>
<?php
echo get_feed_part();
get_footer();