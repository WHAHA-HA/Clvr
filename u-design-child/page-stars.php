<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Home Page Stars
 *
 */
get_header('starz'); ?>
		<!-- start custom header section -->
			<?php echo get_top_navigation('starz'); ?>

			</header>

			<!-- home slider -->
						<!-- SLIDER -->
			<?php // echo starz_slider_content();?>
			<?php  echo manual_slider_content('Starz 2014 Slider');?>
			<?php
								//retrieves now and upcoming movies...
			global $wp_query;
			$temp_query = $wp_query;
			$args = array (
					'post_type' => 'event',
					'event-categories' => '2014-starz-denver-film-festival',
					'orderby' => 'title',
					'order' => 'DESC',
					'posts_per_page' => 5
			);
			$args = array(
					'post_type' => 'event',
					'orderby' => 'title',
					'order' => 'ASC',
					'event-categories' => '2014-starz-denver-film-festival',
					'posts_per_page' => 6
			);
			global $post;
			$wp_query = new WP_Query ( $args );
			//my_var_dump($wp_query);
			global $sliders;
			$sliders = array();
			if (have_posts ()) :
			//$post = $posts[0];
			while ( have_posts () ) :
			the_post ();
			$post_object = get_field ( "movie");
			if ($post_object)
			{
				$post = $post_object;
				setup_postdata($post);
				$image =get_movie_image($post);

				wp_reset_postdata();
			}
			/* 	if(empty($image))
			 continue; */
			$sliders [] = array(
					'image'	=> DENVER_ROOT.$image,
					'title'	=> get_the_title(),
					'link'	=> get_post_permalink()."?festival=".my_get_term_id('event-categories','2013-starz-denver-film-festival')
			);
			endwhile;
			endif;
			wp_reset_query();
			$wp_query = $temp_query;
					?>
			<!-- FILMS -->
			<div class="filmsBlock">

				<h3 class="evTitle festTitle">Browse Films</h3>

				<!-- <a href="#" class="festBtn">Submit Film</a> -->

				<div class="clearfix"></div>

					<div class="filmsBox">

					<ul class="filmsList">
						<?php
							$index = 0;
							foreach($sliders as $slider):
						?>
						<li>
							<img src="<?php  echo $slider['image'];?>" alt="" width="258" height="175"/>
							<a href="<?php echo $slider['link']; ?>"><?php echo $slider['title']; ?></a>
						</li>
						<?php
							$index++;
							if($index%2==0)
								echo '<div style="clear:both"></div>';
							endforeach;
						?>
					</ul>
				</div>
				<aside>
				<?php
				$_GET['festival'] =54;
					get_sidebar('PagesSidebar3'); ?>
				</aside>
			</div>

			<div class="clearfix"></div>
			<!-- FESTS -->
			<div class="festEvents">
				<h3 class="evTitle festTitle">Festival Events</h3>

				<a href="<?php echo site_url();?>/news_category/news-stars/" class="festBtn">All news</a>
				<div class="clearfix"></div>
				<?php
					//retrieves latest news
					global $wp_query;
					$temp_query  = $wp_query;

					$args = array(
						'post_type' => 'news',
						'news_category' => 'news-stars',
						'orderby' => 'title',
						'order' => 'ASC',
						'posts_per_page' => 6
					);

					$wp_query = new WP_Query($args);
					$film_thumbs = array();
					if(have_posts()):
						while(have_posts()):
							the_post();
							$film_thumbs[] = array(
								'link'		=> get_post_permalink(),
								'festDate'	=> get_field('time'),
								'title'		=> get_the_title(),
								'short'		=> truncate(get_the_excerpt(), 120)
							);
						endwhile;
					endif;
						//restore original query
					$wp_query  = $temp_query;
					wp_reset_query();
				?>
				<ul class="festList">
					<?php
						foreach($film_thumbs as $film):
					?>
						<li>
						<a href="<?php echo $film['link']; ?>">
						<p class="festDate"><?php echo $film['festDate'];?></p>
						<h5>
							<?php echo apply_filters('news_title_filter',$film['title']);?>
						</h5>
						<p class="festTxt"><?php echo  $film['short']; ?></p>
						</a>
					</li>
					<?php
						endforeach;
				?>
				</ul>
			</div>

<?php
echo get_feed_part();
get_footer();


