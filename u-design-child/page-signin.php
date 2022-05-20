<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Signin Page
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

?>
		<!--  custom header -->
			</header>

<?php       udesign_main_content_top( is_front_page() ); ?>
	<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;

			$content_position = "grid_24";
	?>
<div id="main-content-loginPage" class="<?php echo $content_position; ?>">
	<div class="main-content-padding loginPage" >
		<div class="one_half">
			<h3 class="yellow">I Don't Have An Account</h3>
			<p>Creating an account is quick, easy, and painless, and with
			an account you can:</p>
			<ul class="yellow">
				<li>Purchase tickets online</li>
				<li>Browse and save films to your MyFestivals page for easy	purchasing</li>
				<li>Stay on top of your films with your customized Festival	Schedule</li>
			</ul>
			<br/><br/>
			<a class="sliderBtn" href="https://www.denverfilm.org/account/register.aspx?next=http://www.denverfilm.org/join/index.aspx">Register Now</a>
		</div>
		<div class="one_half last_column">
			<h3 class="yellow">I Have An Account </h3>
			<p>Please enter your login information.</p>
			<ul class="loginForm">
				<li>Username:</li>
				<li><input type="text" name="username" id="username" class="input-join"/></li>
				<li>Password:</li>
				<li><input type="password" name="password" id="password" class="input-join"/></li>
			</ul>
			<a class="sliderBtn" href="http://www.denverfilm.org/account/login.aspx?next=http%3a%2f%2fwww.denverfilm.org%2fparticipate%2fdonate%2findex.aspx ">Login</a>
			<p><a class="yellow" href=" https://www.denverfilm.org/account/forgot.aspx ">Forgot Your Username?</a></p>
			<p><a class="yellow" href="https://www.denverfilm.org/account/forgotpassword.aspx ">Forgot Your Password?</a></p>

		</div>
		<!-- Bottom part -->
		<div class="clear"></div>
		<h3 class="yellow">*ATTENTION MEMBERS!</h3>
		<p>All Members have existing accounts, so please do not register again. Please click both "Forgot your username"
			and "Forgot your password" to have your user id and password e-mailed to you.</p>
		<h4 class="yellow normal">Temporary Login</h4>
		<p>Did you receive temporary login information from us? Simply enter your temporary login in the fields above to activate your account.
		If you need assistance, <font class="yellow">e-mail or contact the boxoffice.</font></p>
		<h4 class="yellow normal">Members</h4>
		<p>Members receive special discounts on tickets and merchandise. In order to receive the member discount, you must purchase a
		membership or login BEFORE you place items in your cart.</p>

	</div>
</div>
 <div class="clear"></div>
<?php
get_footer();