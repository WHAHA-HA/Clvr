<?php
/**
 * @package WordPress
 * @subpackage U-Design
 * Template Name: Advisory Council Page
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
	 <div id="main-content" class="<?php echo $content_position; ?>" style="padding-left:20px;  margin-top:0 !important">
		<p>The Denver Film Society has created an Advisory Council to recognize some of the extraordinary individuals
and/or their organizations who have advocated for DFS' and its vision of cultivating community and transforming
lives through film. The Denver Film Society is very proud that these special people have chosen to publicly
support our organization.</p>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="board-entry">
					<h3 class="yellow">Ambassadors</h3>
			</header>
		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory1.png">
						<p class="yellow board_title">Ellie Caulkins</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Opera Colorado- Lifetime Honorary Chairman of the Board
Graland Country Day School- Life Trustee
Metropolitan Opera of New York City-Board member
University of Colorado Foundation-Board member
Children's Hospital and Children's Hospital Foundation-former board member</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory2.png">
						<p class="yellow board_title">Robert Clasen</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Robert Clasen spent 40 years in the media and entertainment industry, holding senior positions at Starz LLC (chairman and CEO),
Comcast Cable Communications (president and president of Comcast's international division), McCaw Cellular Communications,
now AT&T (divisional president) and ComStream Corporation (president and CEO), among other companies. He was named a
Convergence Pioneer by Cable World in 2000 and Executive of the Year by Cable Television Business in 1988. Clasen was inducted
into the Cable TV Pioneers by the Cable Center in 2001. In retirement he Chairs the Colorado Creative Industries Council and is an
Executive in Residence at the Daniels College of Business at the University of Denver.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory3.png">
						<p class="yellow board_title">Axel Cruau</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Mr. Axel Cruau took his post as Consul General of France in September 2012, with jurisdiction over the southwestern United States,
including Southern California, Southern Nevada, Arizona, New Mexico and Colorado. Before this assignment, Mr. Cruau was an
adviser to the French Foreign Minister, with a portfolio including the United Nations and Global Affairs. He was Second Counselor
in Beijing in 2009 and 2010, advising for strategic affairs and the foreign policy of China. He was First Secretary at the French
Permanent Mission to the United Nations for five years, where he was first Press Counselor and then in charge of strategic affairs.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory4.png">
						<p class="yellow board_title">Donna Dewey</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Donna Dewey is an Academy Award winning filmmaker who has been writing, producing and directing documentaries, commercials
and theatrical films for over twenty years. Ms. Dewey's documentary, A Story of Healing, filmed in the Mekong Delta of Vietnam,
won the 1997 Academy Award for Best Documentary Short. In addition, her films have won top prizes at Tribeca in New York, SXSW
in Austin, Edinburgh, Warsaw, Jacksonville, Aspen and many others.

She was named 2000 Colorado Businesswoman of the Year, is a 2004 Girl Scout Woman of Distinction, has served on the Colorado
Governor's Film Commission Advisory Board, and was appointed by then Denver Mayor John Hickenlooper to serve as Chair of the
Denver Commission on Cultural Affairs.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory5.png">
						<p class="yellow board_title">Zee Ferrufino</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>A distinguished leader within the Denver business and Hispanic communities and an accomplished businessman, Zee Ferrufino
embodies the spirit of the "American Dream."Throughout his distinguished career as an entrepreneur, Zee Ferrufino has played a
leading role within the community. He owned his first business, Denver Fine Furniture, for more than 25 years. During that time
Mr. Ferrufino continued to add additional businesses interests such as Denver Music Distributing and Colorado Latin Promotions to
his portfolio. As owner and CEO of KNBO Spanish Radio 1280-AM in Denver, he is able to reach out to more than 500,000 Hispanics
in the greater Metro Denver area. He also owns 1490-AM in Colorado Springs and 1480-AM in Pueblo.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory6.png">
						<p class="yellow board_title">Mike Fries</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>President and CEO, Liberty Global
A 28-year veteran of the cable and media industry, Mike Fries has been President and CEO of Liberty Global since 2005. Under his
leadership, Liberty Global has grown into the largest international cable company in the world. Mr. Fries was a founding member of
the management team which launched the company's international expansion over two decades ago, and has served in various
strategic and operating capacities since that time. He sits on the board of Liberty Global, CableLabs&copy; and the Cable Center, is a
Cable Television Pioneer and an active Telecom Governor of the World Economic Forum. He was named Communications Executive
of the Year (2010) by Communications Technology Professionals, U.S. National Entrepreneur of the Year in Media, Entertainment and
Communications (2012) by Ernst & Young, Industry Leader of the Year (2010, 2013) by Digital TV Europe, and honored by 5280
Magazine's Top of the Town Awards, Reader's Choice as Top Humanitarian (2013).</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory7.png">
						<p class="yellow board_title">Daniel Junge</p>
					</div>
					<div class="clear"></div>
					<div>
						<p>Daniel Junge is an Oscar-winning documentary filmmaker (and two-time nominee). His first feature-length film, CHIEFS, won the
Grand Jury Prize at the Tribeca Film Festival and broadcast nationally on PBS. His subsequent feature, IRON LADIES OF LIBERIA
premiered at the Toronto Film Festival and aired on over 50 broadcasters worldwide including PBS and the BBC. THEY KILLED
SISTER DOROTHY, his third feature film, won the Audience and Grand Jury Prizes at the South by Southwest Film Festival before
broadcasting on HBO and earning a 2010 Emmy nomination for Best Investigative Journalism. Junge's film THE LAST CAMPAIGN
OF GOVERNOR BOOTH GARDNER was nominated for an Academy Award for Best Documentary Short in 2010. His most recent film,
SAVING FACE, won the 2011 Academy Award for Best Documentary Short.</p>
					</div>
		    </div>

		    <div class="entry board-entry continue-board">

					<div style="position:relative; height:100px;">
						<img src="<?=CHILD_DIR?>/homepage/images/advisory8.png">
						<p class="yellow board_title">AnnaSophia Robb </p>
					</div>
					<div class="clear"></div>
					<div>
						<p>AnnaSophia currently stars as the young Carrie Bradshaw in the CW's The Carrie Diaries, based on the novel by Candace Bushnell.
The series, now in its second season, is a prequel to Sex and the City, and follows the character of Carrie Bradshaw during her high
school years as she ventures to New York City to become a writer in the 1980s. Robb has previously starred in such films including
The Space Between, Race To Witch Mountain, Jumper, The Reaping, A West Texas Children's Story, Because of Winn Dixie, Spy School
and the highly rated TV movie Samantha: An American Girl Holiday.

Revered for her stand-out performances in the films Soul Surfer, Bridge to Terabithia, Charlie and the Chocolate Factory and
Sleepwalking, Robb has performed under the tutelage of directors Tim Burton, Doug Liman, Stephen Hopkins and Wayne Wang.
She most recently co-starred in the motion picture The Way, Way Back with Steve Carell and Toni Collette, which premiered at the
Sundance Film Festival and will next be seen on the big screen in Khumba, set to premiere at the Toronto International Film Festival.</p>
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