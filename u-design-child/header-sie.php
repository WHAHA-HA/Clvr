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
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
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

	<link rel="shortcut icon" href="<?php echo CUSTOM_STYLE_DIR."/images/favicon.png"?>" />

</head>
<!--  <body  <?php udesign_inside_body_tag(); ?> <?php body_class( array ($udesign_options['enable_cufon'], $udesign_responsive_body_class, $udesign_menu_auto_arrows, $udesign_menu_drop_shadows, $udesign_fixed_main_menu) ); ?>> -->
<body>

<!-- Primary Page Layout
	================================================== -->

	<div class="container">
		<!-- MENU -->
		<aside class="mainmenu">
			<a href="<?php echo home_url();?>"><img
				src="<?=CUSTOM_STYLE_DIR?>/images/logo.jpg" alt="" class="logoImg"></a>
			<?php require_once ('main-menu.php'); ?>
		</aside>
		<!-- CONTENT -->
		<section class="content container_24">
			<!-- HEADER -->
			<header class="header-bgfilmsie" >
				<?php require_once('main-top-menu.php'); ?>
				<!-- SIDR -->
				<div id="sidr">
				  <!-- Your content -->
				  	<div id="nav" role="navigation">
					<?php // require_once( 'main-menu.php'); ?>
					</div>
				</div>
				<div class="clearfix"></div>
		<!-- form here we add some additional header contents and start inner container -->