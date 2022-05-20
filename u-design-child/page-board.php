<?php
/**
 * @package WordPress
 * @subpackage U-Design
 * Template Name: Board Page
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $post;
	$parent = get_post($post->post_parent);
if($parent->post_name == 'starz-denver-festival'):
	get_header('starz');

?>
	<!-- start custom header section -->
				<?php echo get_top_navigation('starz');?>
			</header>

<?php elseif ($parent->post_name=='stanley-film-festival'): ?>
	<?php get_header('stanley');?>
			<?php echo get_top_navigation('stanley'); ?>
			</header>
<?php elseif ($parent->post_name=='film-education'): ?>
	<?php get_header('education');?>
			<?php echo get_top_navigation('education'); ?>
			</header>
<?php elseif ($parent->post_name=='film-on-the-rocks'): ?>
	<?php get_header('filmrocks');?>
			<?php echo get_top_navigation('filmrocks'); ?>
			</header>
<?php elseif ($parent->post_name=='film-center'): ?>
	<?php get_header('sie');?>
			<?php echo get_top_navigation('sie'); ?>
			</header>
<?php else:
	get_header();
endif;
?>
	<!-- custom header -->
	<?php echo get_top_navigation();?>
			</header>
<?php       udesign_main_content_top( is_front_page() ); ?>
	<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;

			if(get_post_type()=="event")
				$content_position = "grid_16";
			else
				$content_position = "grid_24";
	?>
	 <div id="main-content" class="<?php echo $content_position; ?>" style="padding-left:20px; margin-top:0 !important">
		<p>The Board of Directors is the governing body of the Denver Film Society. Representing a diverse cross-section
of the community, the Board not only provides guidance to the staff as they carry out the mission of DFS, but
also represents the organization to the public at large.</p>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="board-entry">
					<h3 class="yellow">Chair</h3>
			</header>
		    <div class="entry board-entry">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board1.png">
						<p class="yellow board_title">Anthony Paul<br>Morgan Stanley-Smith Barney</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Anthony Paul has been offering knowledgeable financial advice and wealth management services for more than 15 years. He has
worked among some of the most prestigious firms on Wall Street and has extensive experience assisting his team's high-net-worth
clients with financial and investment strategies, wealth transfer and preservation, business services, retirement strategies and
solutions, estate planning strategies, private money management, and concentrated stock strategies.</p>
					</div>
		    </div>
		</div>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="board-entry">
					<h3 class="yellow">Chair Elect</h3>
			</header>
		    <div class="entry board-entry">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board2.png">
						<p class="yellow board_title">Jim Bunch<br/>Grumman Hill</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Jim Bunch is founding principal of Green Manning & Bunch, Ltd., an investment banking firm specializing in mergers and acquisitions
as well as raising private equity and debt from institutional investors. </p>
					</div>
		    </div>
		</div>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="board-entry">
					<h3 class="yellow">Treasurer</h3>
			</header>
		    <div class="entry board-entry">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board3.png">
						<p class="yellow board_title">Jack McGuire, CPA<br/>GHP Horwath, P.C. </p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Jack McGuire is a Senior Manager at GHP Horwath, P.C., a member firm of Crowe Horwath International.  Jack has over eighteen
years of accounting and auditing experience, including not-for-profit accounting and financial reporting.</p>
					</div>
		    </div>
		</div>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="board-entry">
					<h3 class="yellow">Secretary</h3>
			</header>
		    <div class="entry board-entry">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board4.png">
						<p class="yellow board_title">Lauren Handler </p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Lauren Handler is a Colorado native and a Principal in Handler/Silva Management - a management company that  oversees various
business interests, trust interests and real estate holdings.  In addition, she has been working in the healthcare industry in a patient
advocate role for over 10 years.

 </p>
					</div>
		    </div>
		</div>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="board-entry">
					<h3 class="yellow">Trustees</h3>
			</header>
		    <div class="entry board-entry">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board5.png">
						<p class="yellow board_title">Mary Lee Beauregard</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Mary Lee worked for the University of Colorado as Director of Public Affairs for a number of years. When she retired from the
University, she was elected to serve on the University of Colorado Foundation Board. She chaired the board for two years and
finished her chairmanship in November, 2012.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board6.png">
						<p class="yellow board_title">Linda Petrie Bunch<br/>Core Interactive</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Linda Petrie Bunch owns Core Interactive, an Internet development and promotional video business established in 1996.
She is also a children's book author.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board7.png">
						<p class="yellow board_title">John Dee<br>Placewise Media</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>As the president of Placewise Media, John Dee applies his expertise in marketing and digital solutions to the shopping center industry.
Under his guidance, Placewise has grown to be the leading provider of interactive, mobile and social media solutions to shopping
center industry. Placewise has built the Shoptopia Network, a nationwide advertising network of mall shoppers. Prior to Placewise,
John was the VP of Sales and Business Development at Ricochet Networks and VP of Product Marketing at KN Energy where he
developed and launched the nations' first bundled consumer services including telephone, television and mobile. Additionally,
John was an integral part of the marketing team at MCI, pioneering the company's commercial Internet rollout as Regional Manager
of Internet Marketing. John attended the Graduate School of International Studies at the University of Denver and is fluent in French,
Spanish, German, and Arabic.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board8.png">
						<p class="yellow board_title">Shannon Gifford<br/>Helios Associates</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Shannon Gifford works with businesses principally in the real estate industry, advising on business and development plans, planning
and architect selection, financial structure, and lender and investor relations, and preparing complex financial models.
She has an MBA in Finance from Wharton Business School.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board9.png">
						<p class="yellow board_title">Ron Henderson</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Ron Henderson is the co-founder of the Denver Film Society / Denver International Film Festival. He retired in in 2007, on the occasion
of DFS' 30th anniversary. For the past five years, he has served as a senior program consultant for the Starz Denver Film Festival.
Ron is the recipient of the Mayor's Award for Excellence in the Arts, the University of Colorado's Distinguished Community Service
Award, and the festival's John Cassavetes Award. A former book editor at the Macmillan Company in New York, he is author of two
books on film.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board10.png">
						<p class="yellow board_title">Leslie Horna<br/>Cherry Creek North </p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Leslie is an integrated marketing communications leader with over 12 years experience in advertising, creative branding,
community & constituent relations, marketing, promotions and events, measurement & evaluation, public relations, strategic planning,
and interactive media within non-profit and corporate in-house agency teams. She currently serves as Marketing & Communications
Director for the Cherry Creek North Business Improvement District. Leslie's community involvement includes volunteering with the
Museum of Contemporary Art Denver, One of 99, Progressive Health Center, and Denver Film Society; and is Vice Chair of the Board
of Directors for PlatteForum.</p>
					</div>
		    </div>
			<div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">

						<p class="yellow board_title">Joanne Katz<br/>Three Tomatoes Catering</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Joanne Katz has lived in Denver since 1964. She is co-founder of Three Tomatoes Catering, a full service catering service that has
been operation since 1977.</p>
					</div>
		    </div>
		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">

						<p class="yellow board_title">Bob Leighton<br/>SVP, Programming, Liberty Global</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Bob has been Senior Vice President of Programming at Liberty Global Inc. since July, 2007. Mr. Leighton is responsible for coordinating
and leveraging Liberty Global's programming activities worldwide, including both channel carriage and channel venture activities.
Prior to joining Liberty Global, he served as a Consultant on a variety of programming matters for various companies,
including LGI. Mr. Leighton formerly served as President of Starz Encore Entertainment.</p>
					</div>
		    </div>
		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board11.png">
						<p class="yellow board_title">Todd Lemley</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Todd Lemley has been an executive, consultant and entrepreneur in multiple industries, mostly engaged with enterprises during
significant growth or transition periods. He has lived on three continents and been significantly involved in fund raising activity
spanning institutional, venture, private, angel and crowdfunding projects. Todd is also a film writer/producer. The first feature he
lead produced, SHUTTLE, played in theaters across the country and was distributed worldwide.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board12.png">
						<p class="yellow board_title">Polly Loewy</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>This is Chairman's profile</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board13.png">
						<p class="yellow board_title">Julie Mordecai<br/>The Complete Non Profit </p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Julie Mordecai owns and operates the Complete Non Profit, which provides resources for non-profits in Colorado and New Mexico.
She has been involved professionally in the non profit sector for 12 years and as a volunteer for over 24 years. She is working on
her M.A. in Higher Education and Leadership at Adams State University.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board14.png">
						<p class="yellow board_title">Richard Rhodes<br/>RNR Creative Enterprises, CEO</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Richard is the chief executive and chief creative officer of RNR Creative Enterprises (thinkRNR.com) with more than a decade and
a half of experience providing branding and strategic solutions for various business sectors as well as the community. During this
span he has fostered professional relationships with some of today's leading experts, consultants, organizations and business
leaders and collaborates with them and others to offer a comprehensive approach to offering solutions.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board15.png">
						<p class="yellow board_title">Suzanne Sell<br/>Starz Entertainment, Denver, CO</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Suzanne Sell is Vice President of Research for Starz Entertainment, overseeing audience measurement, consumer research,
program development research, and industry intelligence gathering.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board16.png">
						<p class="yellow board_title">Katie Shapiro<br/>Independent Media Consultant, Denver, CO</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Katie Shapiro most recently worked for Denver Magazine as the Director of Public Relations. She was a public relations executive in
New York City before relocating to Denver in 2007. She holds a Master's degree in journalism from the University of Colorado at
Boulder and is a freelance writer, media consultant, and co-chair of Reel Social Club.

 </p>
					</div>
		    </div>
			<div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">

						<p class="yellow board_title">Nancy Silvers tone<br/>Starz Entertainment, Denver, CO</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Nancy Silverstone is Vice President of Program Acquisitions for Starz Entertainment, responsible for negotiating licensing deals,
overseeing a multi-million dollar acquisitions budget, and managing the film evaluation department. </p>
					</div>
		    </div>
		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/board17.png">
						<p class="yellow board_title">Leslie Stratton</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Leslie Stratton is a Denver native who practiced law for thirteen years, specializing in civil litigation. She also holds a real estate
license. Leslie is actively involved in the community, serving on several boards.

 </p>
					</div>
		    </div>
		</div>

	</div>
	    <!-- <div class="clear"></div> -->
	    <script type="text/javascript">

		jQuery(document).ready(function() {
		  jQuery('#simple-menu').sidr();
		});
	</script>
<?php
get_footer();