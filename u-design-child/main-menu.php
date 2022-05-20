	<ul class="asideMenu">
		<li>
			<ul class="asideMenu2">
				<li><a href="<?php echo site_url('film-center');?>" class="orange root-menu">Sie
						Filmcenter</a><span class="expand "></span></li>
				<div class="submenu">
					<li><a
						href="<?php echo site_url("events/".date("Y-m-d",time()));?>">Now
							Playing</a></li>
					<li><a
						href="<?php echo site_url('/package/mini-fests/');?>">Mini
							Festivals</a></li>
					<li><a href="<?php echo site_url('/package/series/');?>">Film
							Series</a></li>
					<li><a href="<?php echo site_url('film-center/rentals/');?>">Rentals</a></li>
					<li><a
						href="<?php echo site_url('package/special-events/'); ?>">Special
							Events</a></li>
					<li><a
						href="<?php echo site_url("events/".date("Y-m-d",time()));?>">Buy
							Tickets</a></li>
					<li><a
						href="<?php echo site_url('film-center/box-office/');?>">Box Office</a></li>
				</div>
			</ul>
		</li>

		<li>
			<ul class="asideMenu2">
				<li><a
					href="<?php echo get_permalink(get_page_by_title("Starz Denver Festival"));?>"
					class="red root-menu">Denver Film Festival</a><span class="expand"></span></li>
				<div class="submenu">
					<li><a
						href="<?php echo site_url('schedule/?festival='.my_get_term_id('event-categories','2014-starz-denver-film-festival'));?>">Schedule</a></li>
					<li><a href="<?php echo site_url('starz-denver-festival/buy-tickets/'); ?>">Tickets</a></li>
					<li><a href="<?php echo site_url('/starz-denver-festival/passes/');?>">Passes</a></li>
					<li><a href="<?php echo site_url('venues/starz-venue/');?>">Venues</a></li>
					<li><a
						href="<?php echo site_url('starz-denver-festival/submit/'); ?>">Submit</a></li>
					<li><a href="<?php echo site_url('starz-denver-festival/faq/'); ?>">FAQ</a></li>
					<li><a href="<?php echo site_url('starz-laurels/'); ?>">Laurels</a></li>
				</div>
			</ul>
		</li>

		<li>
			<ul class="asideMenu2">
				<li><a href="<?php echo site_url('film-on-the-rocks/');?>" class="blue">Film on the rocks</a><span class="expand"></span></li>
				<div class="submenu">
					<li><a href="<?php echo site_url('film-on-the-rocks-schedule/');?>">Schedule</a></li>
					<li><a href="<?php  echo site_url('film-on-the-rocks/tickets/');?>">Tickets</a></li>
					<li><a href="<?php echo site_url('film-on-the-rocks/vip/');?>">VIP Experience</a></li>
					<li><a href="<?php echo site_url('film-on-the-rocks/faq/'); ?>">FAQ</a></li>
				</div>
			</ul>
		</li>

		<li>
			<ul class="asideMenu2">
				<li><a
					href="<?php echo get_permalink(get_page_by_title("Stanley Film Festival"));?>"
					class="redd root-menu">Stanley Film festival</a><span class="expand"></span></li>
				<div class="submenu">
					<li><a
						href="<?php echo site_url('schedule/?festival='.my_get_term_id('event-categories','2015-stanley-film-festival'));?>">Schedule</a></li>
					<li><a href="<?php echo site_url('stanley-film-festival/passes/');?>">Tickets & Passes</a></li>
					<li><a href="<?php echo site_url('stanley-venues');?>">Venues</a></li>
					<li><a href="https://www.withoutabox.com/03film/03t_fin/03t_fin_fest_01over.php?festival_id=13494" target="_blank">Submit</a></li>
					<li><a href="<?php echo site_url('faq-category/faq-stanley/');?>">FAQ</a></li>
				</div>
			</ul>
		</li>
		<li>
			<ul class="asideMenu2">
				<li><a href="<?php echo site_url('film-education/');?>"
					class="purple root-menu">Education</a><span class="expand"></span></li>
				<div class="submenu">
					<li><a
						href="<?php echo site_url('young-filmmaker-workshops');?>">Young
							Filmmakers Workshops</a></li>
					<li><a href="<?php echo site_url('package/film-education/');?>">Film Courses</a></li>
					<li><a href="<?php echo site_url('package/educational-screenings/');?>">Now Showing</a></li>
					<li><a href="<?php echo site_url('film-education/support-education/');?>">Support
							Education</a></li>
				</div>
			</ul>
		</li>

		<li>
			<ul class="asideMenu2">
				<li><a href="<?php  echo site_url('filmmaker-focus/');?>"
					class="green root-menu">Filmmaker focus</a><span class="expand"></span></li>
				<div class="submenu">
					<li><a href="<?php echo site_url('filmmaker-focus/industry-talks/');?>">Industry Talks</a></li>
					<li><a href="<?php echo site_url('filmmaker-focus/fiscal-sponsorship/'); ?>">Fiscal Sponsorship</a></li>
					<li><a href="<?php echo site_url('filmmaker-focus/resources/');?>">Resources</a></li>
					<li><a href="<?php echo site_url('donate');?>">Support Filmmakers</a></li>
				</div>
			</ul>
		</li>
	</ul>