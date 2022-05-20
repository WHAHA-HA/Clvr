<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Join Now Page
 *
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

	// Home Page Main -Denver Festival
?>
			<!--  start custom header content -->
			</header>

			<!-- 			title -->
			<div style="margin-left:35px; margin-top:40px">
				<h2>Membership</h2>
				<p>
				<strong>Film buff. Cinephile. Cineaste. Whatever you choose to call yourself, you're no mere moviegoer. After all, it's not
				just viewing pleasure you derive from the cinema-it's insight. It's not just entertainment, but a cultural experience.
				Not just a box office transaction, but a shared interactive film going experience. Take your film going experience to
				 a higher level and join today. </strong>
				</p>
				<h3 class="yellow">Levels and Benefits</h3>
				<strong>As a member of the Denver Film Society, you will help support our mission while receiving benefits and exclusive
				access. Become a part of our creative community and enjoy special advance screenings, discounted festival
				experiences, and activities throughout the year. </strong>
				<h4>For specific benefits, see the <a class="yellow" href="<?php echo site_url('join/levels-benefits/');?>">benefits chart</a> </h4>
				<h4>To renew your membership, <a class="yellow" href=https://www.denverfilm.org/account/login.aspx?mode=renewform&next=http://www.denverfilm.org/join/renew.aspx ">click here</a></h4>
			</div>
			<!-- JOIN FIELDS -->
			<div class="joinBlock">
				<h3 class="joinTitle">Join now</h3>

				<h6 class="joinSubtitle">Please fill out the membership form below - <span>Already a member?</span> <a href="https://www.denverfilm.org/account/login.aspx?mode=renewform&next=http://www.denverfilm.org/join/renew.aspx">Renew Now</a>.</h6>

				<ul class="joinList">
					<li>
						<div class="joinlistRight">
							<h5>Account Information</h5>
						</div>
					</li>

					<li>
						<div class="joinlistLeft">
							<p>Username:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Password</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
							<p class="joinsubTxt">must be 5 or more characters</p>
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Confirm Password:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
				</ul>

				<ul class="joinList">
					<li>
						<div class="joinlistRight">
							<h5>Personal Information</h5>
							<p class="joinSubtitle1">All fields required for membership.</p>
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>First name:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Last name:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Address 1:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Address 2:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>City:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>State:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Country:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Zip:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Phone:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Email:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
				</ul>

				<ul class="joinList">
					<li>
						<div class="joinlistRight">
							<h5>Partner Information</h5>
							<p class="joinSubtitle1">Only for Dual Membership levels.</p>
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>First name:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Last name:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Email:</p>
						</div>
						<div class="joinlistRight">
							<input type="text" class="input-join">
						</div>
					</li>
					<li>
						<div class="joinlistLeft">
							<p>Special Instructions:</p>
						</div>
						<div class="joinlistRight">
							<textarea></textarea>
						</div>
					</li>
					<li>
						<div class="joinlistRight">
							<a href="#" class="btn-cart">Add to cart</a>
						</div>
					</li>
				</ul>
			</div>
<?php
get_footer();