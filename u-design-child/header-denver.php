<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options, $style, $current_slider, $udesign_responsive;
// get the current color scheme subdirectory
$style = ( $udesign_options['color_scheme'] ) ? "style{$udesign_options['color_scheme']}": "style1";
$current_slider = $udesign_options['current_slider'];
$udesign_responsive = $udesign_options['enable_responsive'];
$udesign_responsive_body_class = ( $udesign_responsive ) ? 'u-design-responsive-on' : '';
$udesign_menu_auto_arrows = ( $udesign_options['show_menu_auto_arrows'] ) ? 'u-design-menu-auto-arrows-on' : '';
$udesign_menu_drop_shadows = ( $udesign_options['show_menu_drop_shadows'] ) ? 'u-design-menu-drop-shadows-on' : '';
$udesign_fixed_main_menu = ( $udesign_options['fixed_main_menu'] ) ? 'u-design-fixed-menu-on' : '';
$udesign_responsive_pinch_to_zoom = ( $udesign_options['responsive_pinch_to_zoom'] ) ? '' : ', maximum-scale=1.0';

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  	================================================== -->
	<meta charset="utf-8">
	<title>Homepage - DFS</title>
	<meta name="description" content="">
	<meta name="author" content="moonflare">

	<!-- Mobile Specific Metas
  	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- FONTS
  	================================================== -->
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->

<!--[if IE 6]>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript">
    // <![CDATA[
	DD_belatedPNG.fix('.pngfix, img, #home-page-content li, #page-content li, #bottom li, #footer li, #recentcomments li span');
    // ]]>
    </script>
<![endif]-->

<?php wp_head(); ?>

<!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie-all.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6-7.css" media="screen" type="text/css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6.css" media="screen" type="text/css" />
    <style type="text/css">
	body{ behavior: url("<?php bloginfo('template_directory'); ?>/scripts/csshover3.htc"); }
    </style>
<![endif]-->
<!--[if lt IE 9]>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/respond.min.js"></script>
<![endif]-->


</head>
<!--  <body  <?php udesign_inside_body_tag(); ?> <?php body_class( array ($udesign_options['enable_cufon'], $udesign_responsive_body_class, $udesign_menu_auto_arrows, $udesign_menu_drop_shadows, $udesign_fixed_main_menu) ); ?>> -->
<body>

<!-- Primary Page Layout
	================================================== -->

	<div class="container container_24">
		<!-- MENU -->
		<aside class="mainmenu">
			<a href="#"><img src="<?=CUSTOM_STYLE_DIR?>/images/logo.jpg" alt="" class="logoImg"></a>

			<ul class="asideMenu">
				<li>
					<ul class="asideMenu2">
						<li><a href="#" class="orange">Sie Filmcenter</a></li>
						<li><a href="#">Now Playing</a></li>
						<li><a href="#">Mini Festivals</a></li>
						<li><a href="#">Fils Series</a></li>
						<li><a href="#">Rentals</a></li>
						<li><a href="#">Special</a></li>
						<li><a href="#">Buy Tickets</a></li>
					</ul>
				</li>

				<li>
					<ul class="asideMenu2">
						<li><a href="#" class="red">Starz Denver Film Festival</a></li>
						<li><a href="#">Schedule</a></li>
						<li><a href="#">Tickets</a></li>
						<li><a href="#">Passes</a></li>
						<li><a href="#">Venues</a></li>
						<li><a href="#">Submit</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Laurels</a></li>
					</ul>
				</li>

				<li>
					<ul class="asideMenu2">
						<li><a href="#" class="blue">Film on the rocks</a></li>
						<li><a href="#">Schedule</a></li>
						<li><a href="#">Tickets</a></li>
						<li><a href="#">VIP</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
				</li>

				<li>
					<ul class="asideMenu2">
						<li><a href="#" class="redd">Stanley Film festival</a></li>
						<li><a href="#">Schedule</a></li>
						<li><a href="#">Tickets</a></li>
						<li><a href="#">Passes</a></li>
						<li><a href="#">Venues</a></li>
						<li><a href="#">Submit</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
				</li>

				<li>
					<ul class="asideMenu2">
						<li><a href="#" class="purple">Education</a></li>
						<li><a href="#">Young Filmmakers Workshops</a></li>
						<li><a href="#">Film 101</a></li>
						<li><a href="#">Now Showing</a></li>
						<li><a href="#">Education</a></li>
					</ul>
				</li>

				<li>
					<ul class="asideMenu2">
						<li><a href="#" class="green">Filmmaker focus</a></li>
						<li><a href="#">Industry Talks</a></li>
						<li><a href="#">Fiscal Sponsorsship</a></li>
						<li><a href="#">Resources</a></li>
						<li><a href="#">Support Filmmakers</a></li>
					</ul>
				</li>
			</ul>
		</aside>