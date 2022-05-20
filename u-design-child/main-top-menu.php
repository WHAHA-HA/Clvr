
		<ul class="menu">
					<li class="menuitem"> <a >About</a>
						<ul>
							<li><a href="<?php echo site_url('contact/contact-us/');?>">Staff</a></li>
							<li><a href="<?php echo site_url('board');?>">Board</a></li>
							<li><a href="<?php echo site_url('advisory-council');?>">Ambassadors</a></li>
							<li><a href="<?php echo site_url('about/work/'); ?>">Jobs/Internships</a></li>
							<li><a href="<?php echo site_url('about/volunteer/'); ?>">Volunteer</a></li>
							<li><a href="<?php echo site_url('about/misson-history/'); ?>">Mission & History</a></li>
						</ul>
					</li>

					<li class="menuitem"><a>Join</a>
						 <ul>
							<li><a href="<?php echo site_url('join');?>">Become A Member</a></li>
							<li><a href="<?php echo site_url('login');?>">Renew Membership</a></li>
							<li><a href="<?php echo site_url('join/levels-benefits/'); ?>">Levels & Benefits</a></li>
							<li><a href="<?php echo site_url('join/member-blog/');?>">Member Blog</a></li>
						</ul>

					</li>
					<li class="menuitem"><a >Donate</a>
						<ul>
							<li><a href="<?php echo site_url('donate');?>">Donate Now</a></li>
							<li><a href="<?php echo site_url('bequests');?>">Bequests</a></li>
							<li><a href="<?php echo site_url('foundation-support');?>">Foundation Support</a></li>
							<li><a href="<?php echo site_url('legacy-circle');?>">Legacy Circle</a></li>
						</ul>
					</li>
					<li class="menuitem"><a >Sponsor</a>
						<ul>
							<li><a href="<?php echo site_url('about/sponsor/overview/');?>">Overview</a></li>
							<li><a href="<?php echo site_url('about/sponsor/opportunities/');?>">Opportunities</a></li>
							<li><a href="<?php echo site_url('about/sponsor/benefits/');?>">Benefits</a></li>
							<li><a href="<?php echo site_url('about/sponsor/year-round-sponsors/'); ?>">Year round Sponsors</a></li>
							<li><a href="<?php echo site_url('festival-sponsors/');?>">Festival Sponsors</a></li>
						</ul>
					</li>

					<li class="signin" ><span><a href="<?php echo site_url('login');?>">Sign in</a></span></li>
					<li class="search" ><input type="text" placeholder="SEARCH DFS" id="top_search_box">

					</li>
					<li class="burger"><a id="simple-menu" class="sidr-menu" href="#sidr">
							<img src="<?=CUSTOM_STYLE_DIR?>/images/menu2.png" alt="" width="32" height="32" class="menu-img">
						</a></li>
				</ul>

				<?php
				//	wp_nav_menu(array('container_class'=> 'menu', 'theme_location'=>'primary'));
				?>
<script type="text/javascript">
		jQuery('document').ready(function(){
			jQuery('.menu #top_search_box').live('keypress',function(e){
					if(e.keyCode==13)
					{
						var keyword = jQuery(this).val();
						var searchpage ='<?php echo site_url('/?s=');?>' + keyword;
						location.href=searchpage;
						return false;
					}
				});

		jQuery('.voucher input#widget_keyword').live('keypress',function(e){

			if(e.keyCode==13)
			{
				var keyword = jQuery(this).val();
				var searchpage ='<?php echo site_url('/?s=');?>' + keyword;
				location.href=searchpage;
				return false;
			}
		});
	});
</script>