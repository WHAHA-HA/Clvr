<?php

// Avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}

global $udesign_options, $google_webfonts, $cufon_fonts;
$udesign_options  = get_option('udesign_options');	
$google_webfonts = array('ABeeZee', 'Abel', 'Abril+Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent+Pro', 'Aguafina+Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya+SC', 'Alegreya+Sans', 'Alegreya+Sans+SC', 'Alex+Brush', 'Alfa+Slab+One', 'Alice', 'Alike', 'Alike+Angular', 'Allan:bold', 'Allerta', 'Allerta+Stencil', 'Allura', 'Almendra', 'Almendra+Display', 'Almendra+SC', 'Amarante', 'Amaranth', 'Amatic+SC', 'Amethysta', 'Anaheim', 'Andada', 'Andika', 'Annie+Use+Your+Telescope', 'Anonymous+Pro', 'Antic', 'Antic+Didone', 'Antic+Slab', 'Anton', 'Arapey', 'Arbutus', 'Arbutus+Slab', 'Architects+Daughter', 'Archivo+Black', 'Archivo+Narrow', 'Arimo', 'Arizonia', 'Armata', 'Artifika', 'Arvo', 'Asap', 'Asset', 'Astloch', 'Asul', 'Atomic+Age', 'Aubrey', 'Audiowide', 'Autour+One', 'Average', 'Average+Sans', 'Averia+Gruesa+Libre', 'Averia+Libre', 'Averia+Sans+Libre', 'Averia+Serif+Libre', 'Bad+Script', 'Balthazar', 'Bangers', 'Basic', 'Baumans', 'Belgrano', 'Belleza', 'BenchNine', 'Bentham', 'Berkshire+Swash', 'Bevan', 'Bigelow+Rules', 'Bigshot+One', 'Bilbo', 'Bilbo+Swash+Caps', 'Bitter', 'Black+Ops+One', 'Bonbon', 'Boogaloo', 'Bowlby+One', 'Bowlby+One+SC', 'Brawler', 'Bree+Serif', 'Bubblegum+Sans', 'Bubbler+One', 'Buda:light', 'Buenard', 'Butcherman', 'Butcherman+Caps', 'Butterfly+Kids', 'Cabin', 'Cabin+Condensed', 'Cabin+Sketch', 'Cabin+Sketch:bold', 'Cabin:bold', 'Caesar+Dressing', 'Cagliostro', 'Calligraffitti', 'Cambo', 'Candal', 'Cantarell', 'Cantata+One', 'Cantora+One', 'Capriola', 'Cardo', 'Carme', 'Carrois+Gothic', 'Carrois+Gothic+SC', 'Carter+One', 'Caudex', 'Cedarville+Cursive', 'Ceviche+One', 'Changa+One', 'Chango', 'Chau+Philomene+One', 'Chela+One', 'Chelsea+Market', 'Cherry+Cream+Soda', 'Cherry+Swash', 'Chewy', 'Chicle', 'Chivo', 'Cinzel', 'Cinzel+Decorative', 'Clicker+Script', 'Coda', 'Coda:800', 'Codystar', 'Combo', 'Comfortaa', 'Coming+Soon', 'Condiment', 'Contrail+One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Corben:bold', 'Courgette', 'Cousine', 'Coustard', 'Covered+By+Your+Grace', 'Crafty+Girls', 'Creepster', 'Creepster+Caps', 'Crete+Round', 'Crimson', 'Croissant+One', 'Crushed', 'Cuprum', 'Cutive', 'Cutive+Mono', 'Damion', 'Dancing+Script', 'Dawning+of+a+New+Day', 'Days+One', 'Delius', 'Delius+Swash+Caps', 'Delius+Unicase', 'Della+Respira', 'Denk+One', 'Devonshire', 'Didact+Gothic', 'Diplomata', 'Diplomata+SC', 'Domine', 'Donegal+One', 'Doppio+One', 'Dorsa', 'Dosis', 'Dr+Sugiyama', 'Droid+Sans', 'Droid+Sans+Mono', 'Droid+Serif', 'Duru+Sans', 'Dynalight', 'EB+Garamond', 'Eagle+Lake', 'Eater', 'Eater+Caps', 'Economica', 'Ek+Mukta', 'Electrolize', 'Elsie', 'Elsie+Swash+Caps', 'Emblema+One', 'Emilys+Candy', 'Engagement', 'Englebert', 'Enriqueta', 'Erica+One', 'Esteban', 'Euphoria+Script', 'Ewert', 'Exo', 'Exo+2', 'Expletus+Sans', 'Fanwood+Text', 'Fascinate', 'Fascinate+Inline', 'Faster+One', 'Fauna+One', 'Federant', 'Federo', 'Felipa', 'Fenix', 'Finger+Paint', 'Fjalla+One', 'Fjord+One', 'Flamenco', 'Flavors', 'Fondamento', 'Fontdiner+Swanky', 'Forum', 'Francois+One', 'Freckle+Face', 'Fredericka+the+Great', 'Fredoka+One', 'Fresca', 'Frijole', 'Fruktur', 'Fugaz+One', 'Gabriela', 'Gafata', 'Galdeano', 'Galindo', 'Gentium+Basic', 'Gentium+Book+Basic', 'Geo', 'Geostar', 'Geostar+Fill', 'Germania+One', 'Gilda+Display', 'Give+You+Glory', 'Glass+Antiqua', 'Glegoo', 'Gloria+Hallelujah', 'Goblin+One', 'Gochi+Hand', 'Gorditas', 'Goudy+Bookletter+1911', 'Graduate', 'Grand+Hotel', 'Gravitas+One', 'Great+Vibes', 'Griffy', 'Gruppo', 'Gudea', 'Habibi', 'Hammersmith+One', 'Hanalei', 'Hanalei+Fill', 'Handlee', 'Happy+Monkey', 'Headland+One', 'Henny+Penny', 'Herr+Von+Muellerhoff', 'Holtwood+One+SC', 'Homemade+Apple', 'Homenaje', 'IM+Fell', 'Iceberg', 'Iceland', 'Imprima', 'Inconsolata', 'Inder', 'Indie+Flower', 'Inika', 'Irish+Growler', 'Istok+Web', 'Italiana', 'Italianno', 'Jacques+Francois', 'Jacques+Francois+Shadow', 'Jim+Nightshade', 'Jockey+One', 'Jolly+Lodger', 'Josefin+Sans', 'Josefin+Sans', 'Josefin+Slab', 'Joti+One', 'Judson', 'Julee', 'Julius+Sans+One', 'Junge', 'Jura', 'Just+Another+Hand', 'Just+Me+Again+Down+Here', 'Kameron', 'Karla', 'Kaushan+Script', 'Kavoon', 'Keania+One', 'Kelly+Slab', 'Kenia', 'Kite+One', 'Knewave', 'Kotta+One', 'Kranky', 'Kreon', 'Kristi', 'Krona+One', 'La+Belle+Aurore', 'Lancelot', 'Lato', 'League+Script', 'Leckerli+One', 'Ledger', 'Lekton', 'Lemon', 'Libre+Baskerville', 'Life+Savers', 'Lilita+One', 'Lily+Script+One', 'Limelight', 'Linden+Hill', 'Lobster', 'Lobster+Two', 'Londrina+Outline', 'Londrina+Shadow', 'Londrina+Sketch', 'Londrina+Solid', 'Lora', 'Love+Ya+Like+A+Sister', 'Loved+by+the+King', 'Lovers+Quarrel', 'Luckiest+Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo+Swash+Caps', 'Magra', 'Maiden+Orange', 'Mako', 'Marcellus', 'Marcellus+SC', 'Marck+Script', 'Margarine', 'Marko+One', 'Marmelad', 'Marvel', 'Mate', 'Mate+SC', 'Maven+Pro', 'McLaren', 'Meddon', 'MedievalSharp', 'Medula+One', 'Megrim', 'Meie+Script', 'Merienda', 'Merienda+One', 'Merriweather', 'Merriweather+Sans', 'Metal+Mania', 'Metamorphous', 'Metrophobic', 'Michroma', 'Milonga', 'Miltonian', 'Miltonian+Tattoo', 'Miniver', 'Miss+Fajardose', 'Miss+Saint+Delafield', 'Modern+Antiqua', 'Molengo', 'Molle:400italic', 'Monda', 'Monofett', 'Monoton', 'Monsieur+La+Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Montserrat+Alternates', 'Montserrat+Subrayada', 'Mountains+of+Christmas', 'Mouse+Memoirs', 'Mr+Bedford', 'Mr+Bedfort', 'Mr+Dafoe', 'Mr+De+Haviland', 'Mrs+Saint+Delafield', 'Mrs+Sheppards', 'Muli', 'Mystery+Quest', 'Neucha', 'Neuton', 'New+Rocker', 'News+Cycle', 'Niconne', 'Nixie+One', 'Nobile', 'Norican', 'Nosifer', 'Nosifer+Caps', 'Noticia+Text', 'Noto+Sans', 'Noto+Serif', 'Nova+Round', 'Numans', 'Nunito', 'Offside', 'Oldenburg', 'Oleo+Script', 'Oleo+Script+Swash+Caps', 'Open+Sans', 'Open+Sans+Condensed:300', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original+Surfer', 'Oswald', 'Over+the+Rainbow', 'Overlock', 'Overlock+SC', 'Ovo', 'Oxygen', 'Oxygen+Mono', 'PT+Mono', 'PT+Sans', 'PT+Sans+Narrow', 'PT+Serif', 'PT+Serif+Caption', 'Pacifico', 'Paprika', 'Parisienne', 'Passero+One', 'Passion+One', 'Pathway+Gothic+One', 'Patrick+Hand', 'Patrick+Hand+SC', 'Patua+One', 'Paytone+One', 'Peralta', 'Permanent+Marker', 'Petit+Formal+Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon+Script', 'Pirata+One', 'Plaster', 'Play', 'Playball', 'Playfair+Display', 'Playfair+Display+SC', 'Podkova', 'Poiret+One', 'Poller+One', 'Poly', 'Pompiere', 'Pontano+Sans', 'Port+Lligat+Sans', 'Port+Lligat+Slab', 'Prata', 'Press+Start+2P', 'Princess+Sofia', 'Prociono', 'Prosto+One', 'Puritan', 'Purple+Purse', 'Quando', 'Quantico', 'Quattrocento', 'Quattrocento+Sans', 'Questrial', 'Quicksand', 'Quintessential', 'Qwigley', 'Racing+Sans+One', 'Radley', 'Raleway', 'Raleway+Dots', 'Rambla', 'Rammetto+One', 'Ranchers', 'Rancho', 'Rationale', 'Redressed', 'Reenie+Beanie', 'Revalia', 'Ribeye', 'Ribeye+Marrow', 'Righteous', 'Risque', 'Roboto', 'Roboto+Slab', 'Rochester', 'Rock+Salt', 'Rokkitt', 'Romanesco', 'Ropa+Sans', 'Rosario', 'Rosarivo', 'Rouge+Script', 'Rubik+Mono+One', 'Rubik+One', 'Ruda', 'Rufina', 'Ruge+Boogie', 'Ruluko', 'Rum+Raisin', 'Ruslan+Display', 'Russo+One', 'Ruthie', 'Rye', 'Sacramento', 'Sail', 'Salsa', 'Sanchez', 'Sancreek', 'Sansita+One', 'Sarina', 'Satisfy', 'Scada', 'Schoolbell', 'Seaweed+Script', 'Sevillana', 'Seymour+One', 'Shadows+Into+Light', 'Shadows+Into+Light+Two', 'Shanti', 'Share', 'Share+Tech', 'Share+Tech+Mono', 'Shojumaru', 'Short+Stack', 'Sigmar+One', 'Signika', 'Signika+Negative', 'Simonetta', 'Sintony', 'Sirin+Stencil', 'Six+Caps', 'Skranji', 'Slackey', 'Smokum', 'Smythe', 'Sniglet:800', 'Snippet', 'Snowburst+One', 'Sofadi+One', 'Sofia', 'Sonsie+One', 'Sorts+Mill+Goudy', 'Sorts+Mill+Goudy', 'Source+Code+Pro', 'Source+Sans+Pro', 'Special+Elite', 'Spicy+Rice', 'Spinnaker', 'Spirax', 'Squada+One', 'Stalemate', 'Stalinist+One', 'Stardos+Stencil', 'Stint+Ultra+Condensed', 'Stint+Ultra+Expanded', 'Stoke', 'Stoke', 'Strait', 'Sue+Ellen+Francisco', 'Sunshiney', 'Supermercado+One', 'Swanky+and+Moo+Moo', 'Syncopate', 'Tangerine', 'Tauri', 'Telex', 'Tenor+Sans', 'Terminal+Dosis', 'Terminal+Dosis+Light', 'Text+Me+One', 'The+Girl+Next+Door', 'Tienne', 'Tinos', 'Titan+One', 'Titillium+Web', 'Trade+Winds', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen+One', 'Ubuntu', 'Ubuntu+Condensed', 'Ubuntu+Mono', 'Ultra', 'Uncial+Antiqua', 'Underdog', 'Unica+One', 'UnifrakturCook:bold', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro+One', 'Varela', 'Varela+Round', 'Vast+Shadow', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Voltaire', 'Waiting+for+the+Sunrise', 'Wallpoet', 'Walter+Turncoat', 'Warnes', 'Wellfleet', 'Wendy+One', 'Wire+One', 'Yanone+Kaffeesatz', 'Yellowtail', 'Yeseva+One', 'Yesteryear', 'Zeyada');
$google_webfonts = str_replace('+', ' ', $google_webfonts);
$cufon_fonts = array('Aubrey', 'Bebas', 'Blue Highway', 'Blue Highway D Type', 'Diavlo Book', 'eurofurence', 'GeosansLight', 'Oregon LDO', 'Qlassik Medium', 'Sansation', 'Sniglet', 'Tertre Med', 'Waukegan LDO', 'Yorkville');


// Class for the theme options
class UDESIGN_Theme_Options {

	//constructor of class, PHP4 compatible construction for backward compatibility
	function udesign_Theme_Options() {
		add_action('admin_menu', array(&$this, 'udesign_admin_menu'));
		add_action('admin_init', array(&$this, 'register_udesign_theme_settings'));
                add_action('admin_post_save_udesign_options', array(&$this, 'on_save_changes'));
	}


	function init_udesign_theme_options() {
	    global $udesign_options;
	    if( $udesign_options['reset_to_defaults'] == 'yes' ) delete_option( "udesign_options");
	    if (! get_option("udesign_options")) {
		add_option( "udesign_options",
		    array( // intitialize the 'udesign_options' array with the following key => value pairs:
			    "reset_to_defaults" => '',
			    "color_scheme" => "1",
			    "custom_logo_img" => "",
			    "top_area_height" => 110,
			    "logo_width" => 175,
			    "logo_height" => 108,
			    "slogan_distance_from_the_top" => 100,
			    "slogan_distance_from_the_left" => 0,
			    "slogan_font_size" => "12",
			    "top_page_phone_number" => "Call Us Free: 1-800-123-4567",
			    "enable_search" => "yes",
			    "enable_page_peel" => "",
			    "page_peel_url" => '',
			    "enable_feedback" => "",
			    "feedback_url" => '',
			    "feedback_position_fixed" => '',
			    "enable_prettyPhoto_script" => "yes",
			    "fixed_main_menu" => "",
			    "add_fixed_menu_shadow" => "",
			    "remove_fixed_menu_background_image" => "",
			    "remove_fixed_menu_on_mobile_devices" => "",
			    "main_menu_alignment" => "right",
			    "show_menu_auto_arrows" => "yes",
			    "show_menu_drop_shadows" => "",
			    "remove_border_under_menu" => "",
			    "show_breadcrumbs" => "yes",
			    "default_thumb_on" => "yes",
			    "disable_the_theme_update_notifier" => "no",
			    "enable_udesign_schema_tags" => "",
			    "udesign_disable_img_cropping" => "",
			    "udesign_enable_retina_images" => "",
			    "enable_default_style_css" => "no",
			    "page_title_position" => "position1",
			    "home_page_col_1_fixed" => "",
			    "remove_default_page_sidebar" => "",
			    "pages_sidebar" => "left",
			    "pages_sidebar_2" => "left",
			    "pages_sidebar_3" => "left",
			    "pages_sidebar_4" => "left",
			    "pages_sidebar_5" => "left",
			    "pages_sidebar_6" => "left",
			    "pages_sidebar_7" => "left",
			    "pages_sidebar_8" => "left",
			    "sitemap_sidebar" => "right",
			    "show_comments_on_pages" => "no",
			    "max_theme_width" => "no",
			    "global_theme_width" => 960,
			    "global_sidebar_width" => 33,
			    "enable_google_web_fonts" => "",
			    "google_web_fonts_assoc" => array(),
			    "font_family" => "Arial",
			    "font_size" => "12",
			    "top_nav_font_family" => "Arial",
			    "top_nav_font_size" => "14",
			    "title_headings_font_family" => "Comfortaa",  // if cufon should be loaded initially as default font set it here, otherwise enter a default fonts name, e.g. "Arial"
			    "heading_font_size_coefficient" => "1.0",
			    "enable_cufon" => "cufon-on", // if cufon should be loaded initially as default font set it to: "cufon-on", otherwise: ""
			    "cufon_fonts_assoc" =>  array( 'title_headings_font_family' => 'Comfortaa' ), // if cufon should be loaded initially as default font set it to: array( 'title_headings_font_family' => 'cufon_name' ), otherwise: array( )
			    "custom_colors_switch" => "disable",
			    "body_text_color" => "333333",
			    "main_link_color" => "FE5E08",
			    "main_link_color_hover" => "333333",
			    "main_headings_color" => "333333",
			    "top_bg_color" => "FBFBFB",
			    "top_text_color" => "999999",
			    "top_nav_link_color" => "999999",
			    "top_nav_active_link_color" => "F95A09",
			    "top_nav_hover_link_color" => "777777",
			    "page_title_color" => "333333",
			    "header_bg_color" => "FFFFFF",
			    "page_title_bg_color" => "FFFFFF",
			    "main_content_bg" => "FFFFFF",
			    "widget_title_color" => "333333",
			    "widget_text_color" => "333333",
			    "widget_bg_color" => "F8F8F8",
			    "bottom_bg_color" => "F5F5F5",
			    "bottom_title_color" => "FE5E08",
			    "bottom_text_color" => "333333",
			    "bottom_link_color" => "3D6E97",
			    "bottom_hover_link_color" => "000000",
			    "footer_bg_color" => "EAEAEA",
			    "footer_text_color" => "797979",
			    "footer_link_color" => "3D6E97",
			    "footer_hover_link_color" => "000000",
			    "top_bg_img" => "",
			    "top_bg_img_repeat" => "no-repeat",
			    "top_bg_img_position_horizontal" => "center",
			    "top_bg_img_position_vertical" => "top",
			    "header_bg_img" => "",
			    "header_bg_img_repeat" => "no-repeat",
			    "header_bg_img_position_horizontal" => "center",
			    "header_bg_img_position_vertical" => "top",
			    "home_page_before_content_bg_img" => "",
			    "home_page_before_content_bg_img_repeat" => "no-repeat",
			    "home_page_before_content_bg_img_position_horizontal" => "center",
			    "home_page_before_content_bg_img_position_vertical" => "top",
			    "page_title_bg_img" => "",
			    "page_title_bg_img_repeat" => "no-repeat",
			    "page_title_bg_img_position_horizontal" => "center",
			    "page_title_bg_img_position_vertical" => "top",
			    "main_content_bg_img" => "",
			    "main_content_bg_img_repeat" => "no-repeat",
			    "main_content_bg_img_position_horizontal" => "center",
			    "main_content_bg_img_position_vertical" => "top",
			    "bottom_bg_img" => "",
			    "bottom_bg_img_repeat" => "no-repeat",
			    "bottom_bg_img_position_horizontal" => "center",
			    "bottom_bg_img_position_vertical" => "top",
			    "footer_bg_img" => "",
			    "footer_bg_img_repeat" => "no-repeat",
			    "footer_bg_img_position_horizontal" => "center",
			    "footer_bg_img_position_vertical" => "top",
			    "one_continuous_bg_img" => "",
			    "one_continuous_bg_img_repeat" => "no-repeat",
			    "one_continuous_bg_img_position_horizontal" => "center",
			    "one_continuous_bg_img_position_vertical" => "top",
			    "one_continuous_bg_img_fixed" => "",
			    "one_continuous_bg_img_with_other_bg_imgs" => "",
			    "udesign_remove_horizontal_rulers" => "",
			    "save_current_colors_as_array" => "",
			    "saved_custom_colors_array" => array(),
			    "chosen_custom_colors" => '',
			    "chosen_custom_colors_admin_task" => '',
			    "current_slider" => '8',
			    "gs_image_width" => 940,
			    "gs_image_height" => 400,
			    "gs_auto_play" => "true",
			    "gs_auto_play_duration" => 2.4,
			    "gs_grid_row" => 4,
			    "gs_grid_column" => 6,
			    "gs_tween_duration" => 0.7,
			    "gs_tween_delay" => 0.02,
			    "gs_bar_status" => "1",
			    "gs_remove_3d_shadow" => "",
			    "gs_slides_order_str" => "1",
			    "gs_slide_img_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/flashmo/grid_slider/photos/940x400_slide_01.jpg' ),
			    "gs_slide_transition_flow_1" => 'out',
			    "gs_slide_transition_direction_1" => 'left',
			    "gs_slide_transition_rotation_1" => 'zero',
			    "gs_slide_default_info_txt_1" => get_gs_slide_default_info_txt(),
			    "gs_no_js_img" => esc_url_raw( get_bloginfo('template_url').'/sliders/flashmo/grid_slider/photos/940x400_slide_01.jpg' ),
			    "pm_image_width" => 940,
			    "pm_image_height" => 360,
			    "pm_segments" => 7,
			    "pm_tween_time" => 5,
			    "pm_tween_delay" => 0.1,
			    "pm_tween_type" => 'easeOutElastic',
			    "pm_z_distance" => 200,
			    "pm_expand" => 10,
			    "pm_shadow_darkness" => 100,
			    "pm_autoplay" => 5,
			    "pm_text_distance" => 25,
			    "pm_remove_3d_shadow" => "",
			    "pm_text_background" => "B7B7B7",
			    "pm_inner_color" => "111111",
			    "pm_slides_order_str" => "1",
			    "pm_slider_default_info_txt_1" => get_pm_slider_default_info_txt(),
			    "pm_slide_img_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/piecemaker/images/940x360_slide_01.jpg' ),
			    "pm_no_js_img" => esc_url_raw( get_bloginfo('template_url').'/sliders/piecemaker/images/940x360_slide_01.jpg' ),
			    "pm2_image_width" => 940,
			    "pm2_image_height" => 360,
			    "pm2_loader_color" => "333333",
			    "pm2_inner_side_color" => "222222",
			    "pm2_autoplay" => 10,
			    "pm2_field_of_view" => 45,
			    "pm2_side_shadow_alpha" => 0.8,
			    "pm2_drop_shadow_alpha" => 0.7,
			    "pm2_drop_shadow_distance" => 25,
			    "pm2_drop_shadow_scale" => 0.95,
			    "pm2_drop_shadow_blur_x" => 40,
			    "pm2_drop_shadow_blur_y" => 4,
			    "pm2_menu_distance_x" => 20,
			    "pm2_menu_distance_y" => 50,
			    "pm2_menu_color_1" => "999999",
			    "pm2_menu_color_2" => "333333",
			    "pm2_menu_color_3" => "FFFFFF",
			    "pm2_control_size" => 100,
			    "pm2_control_distance" => 20,
			    "pm2_control_color_1" => "222222",
			    "pm2_control_color_2" => "FFFFFF",
			    "pm2_control_alpha" => 0.8,
			    "pm2_control_alpha_over" => 0.95,
			    "pm2_controls_x" => 450,
			    "pm2_controls_y" => 280,
			    "pm2_controls_align" => "center",
			    "pm2_tooltip_height" => 30,
			    "pm2_tooltip_color" => "222222",
			    "pm2_tooltip_text_y" => 5,
			    "pm2_tooltip_text_style" => "P-Italic",
			    "pm2_tooltip_text_color" => "FFFFFF",
			    "pm2_tooltip_margin_left" => 5,
			    "pm2_tooltip_margin_right" => 7,
			    "pm2_tooltip_text_sharpness" => 50,
			    "pm2_tooltip_text_thickness" => -100,
			    "pm2_info_width" => 400,
			    "pm2_info_background" => "FFFFFF",
			    "pm2_info_background_alpha" => 0.95,
			    "pm2_info_margin" => 15,
			    "pm2_info_sharpness" => 0,
			    "pm2_info_thickness" => 0,
			    "pm2_slides_order_str" => "1",
			    "pm2_slide_type_1" => "image",
			    "pm2_slide_img_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/piecemaker_2/contents/940x360_slide_01.jpg' ),
			    "pm2_slide_img_title_1" => "Title",
			    "pm2_slide_link_url_1" => '',
			    "pm2_slide_link_target_1" => 'self',
			    "pm2_slide_default_info_txt_1" => get_pm2_slide_default_info_txt(),
			    "pm2_flash_link_url_1" => '',
			    "pm2_video_link_url_1" => '',
			    "pm2_video_width_1" => '910',
			    "pm2_video_height_1" => '365',
			    "pm2_video_autoplay_1" => 'yes',
			    "pm2_transitions_order_str" => "1",
			    "pm2_transition_pieces_1" => "9",
			    "pm2_transition_time_1"=>"1.2",
			    "pm2_transition_type_1" => 'easeInOutBack',
			    "pm2_transition_delay_1"=>"0.1",
			    "pm2_depth_offset_1"=>"300",
			    "pm2_cube_distance_1"=>"30",
			    "pm2_no_js_img" => esc_url_raw( get_bloginfo('template_url').'/sliders/piecemaker_2/contents/940x360_slide_01.jpg' ),
			    "c1_slides_order_str" => "1",
			    "c1_slide_img_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/cycle/cycle1/images/914x374_slide_01.jpg' ),
			    "c1_transition_type_1" => 'fade',
			    "c1_slide_link_url_1" => '',
			    "c1_slide_link_target_1" => 'self',
			    "c1_slide_image_alt_tag_1" => '',
			    "c1_speed" => 1000,
			    "c1_timeout" => 5000,
			    "c1_sync" => "yes",
			    "c1_remove_image_frame" => "",
			    "c1_remove_3d_shadow" => "yes",
			    "c2_slides_order_str" => "1",
			    "c2_slide_img_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/cycle/cycle2/images/476x287_slide_01.jpg' ),
			    "c2_transition_type_1" => 'fade',
			    "c2_slide_link_url_1" => '',
			    "c2_slide_link_target_1" => 'self',
			    "c2_slide_image_alt_tag_1" => '',
			    "c2_slide_default_info_txt_1" => get_c2_slide_default_info_txt(),
			    "c2_slide_button_txt_1" => "Read More",
			    "c2_slide_button_style_1" => 'dark',
			    "c2_speed" => 1500,
			    "c2_timeout" => 5000,
			    "c2_sync" => "yes",
			    "c2_text_transition_on" => "yes",
			    "c2_text_color" => "333333",
			    "c2_slider_text_size" => "1.2",
			    "c2_slider_text_line_height" => "1.7",
			    "c3_slides_order_str" => "1",
			    "c3_slide_img_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/cycle/cycle3/images/940x430_slide_01.jpg' ),
			    "c3_slide_img2_url_1" => esc_url_raw( get_bloginfo('template_url').'/sliders/cycle/cycle3/images/940x430_slide_02.png' ),
			    "c3_slide_link_url_1" => '',
			    "c3_slide_link_target_1" => 'self',
			    "c3_slide_image_alt_tag_1" => '',
			    "c3_slide_default_info_txt_1" => get_c3_slide_default_info_txt(),
			    "c3_timeout" => 5000,
			    "c3_autostop" => "",
			    "c3_text_color" => "FFFFFF",
			    "c3_slider_text_size" => "1.2",
			    "c3_slider_text_line_height" => "1.7",
			    "no_slider_text" => "Home",
			    "rev_slider_shortcode" => "",
			    "portfolio_categories" => "",
			    "portfolio_title_posistion" => "below",
			    "portfolio_sidebar" => "left",
			    "show_portfolio_postmetadata" => "yes",
			    "udesign_single_portfolio_postmetadata_location" => "alignbottom",
			    "show_portfolio_postmetadata_author" => "",
			    "show_portfolio_postmetadata_tags" => "",
			    "show_portfolio_comments" => "yes",
			    "remove_single_portfolio_sidebar" => "",
			    "blog_sidebar" => "right",
			    "show_excerpt" => "yes",
			    "excerpt_length_in_words" => 47,
			    "blog_button_text" => "Read more",
			    "exclude_portfolio_from_blog" => "yes",
			    "show_postmetadata_author" => "",
			    "show_postmetadata_tags" => "",
			    "show_archive_for_string" => "",
			    "show_comments_are_closed_message" => "",
			    "remove_blog_sidebar" => "",
			    "remove_archive_sidebar" => "",
			    "remove_single_sidebar" => "",
			    "udesign_single_view_postmetadata_location" => "alignbottom",
			    "display_post_image_in_single_post" => "",
			    "enable_custom_featured_image" => "",
			    "featured_image_width" => 150,
			    "featured_image_height" => 150,
			    "force_image_dimention" => "",
			    "featured_image_alignment" => "alignleft",
			    "show_contact_fields" => "yes",
			    "contact_field_name1" => "Address:",
			    "contact_field_value1" => "123 Street Name, Suite #",
			    "contact_field_value2" => "City, State 12345, Country",
			    "contact_field_name3" => "Phone:",
			    "contact_field_value3" => "(123) 123-4567",
			    "contact_field_name4" => "Fax:",
			    "contact_field_value4" => "(123) 123-4567",
			    "contact_field_name5" => "Toll Free:",
			    "contact_field_value5" => "(800) 123-4567",
			    "contact_sidebar" => "left",
			    "remove_contact_sidebar" => "",
			    "NA_phone_format" => "", // North American phone number check, disabled by default
			    "email_receipients" => get_option('admin_email'),
			    "recaptcha_enabled" => "no",
			    "recaptcha_publickey" => "",
			    "recaptcha_privatekey" => "",
			    "recaptcha_theme" => "white",
			    "recaptcha_lang" => "en",
			    "copyright_message" => '&copy; 2014 <strong>U-Design</strong>',
			    "show_wp_link_in_footer" => "yes",
			    "show_udesign_affiliate_link" => "",
			    "affiliate_username" => "",
			    "show_entries_rss_in_footer" => "yes",
			    "show_comments_rss_in_footer" => "yes",
			    "udesign_sticky_footer" => "",
			    "google_analytics" => "",
			    "enable_responsive" => "",
			    "responsive_logo_img" => "",
			    "responsive_logo_height" => 150,
			    "responsive_remove_slider_area" => "",
			    "responsive_remove_bg_images_960-720" => "",
			    "responsive_menu" => "responsive_menu_1",
			    "responsive_pinch_to_zoom" => "",
			    "responsive_disable_pretty_photo_at_width" => 0,
			    "show_udesign_action_hooks" => ""
                        )
		);
	    }
	    //Add more options here if needed
	    //if (! get_option("another_of_my_options")) {
	    //    add_option("another_of_my_options", "Hi there!!!");
	    //}
	}

	function register_udesign_theme_settings() {
	    register_setting( 'udesign_options_page', 'udesign_options', array(&$this, 'validate_options') );
	    // register_setting( 'udesign_options_page', array(&$this, 'another_of_my_options') );         
        }
        
	//extend the admin menu
	function udesign_admin_menu() {
		$this->init_udesign_theme_options();
		// Add the U-Design options menu
		$this->pagehook = add_menu_page('U-Design Theme', esc_html__('U-Design', 'udesign'), 'manage_options', 'udesign_options_page', array(&$this, 'udesign_generate_options_page'));
		add_action('load-'.$this->pagehook, array(&$this, 'on_load_page'));
	}

	function on_load_page() {
                global $udesign_options;
                
		wp_enqueue_style('style', get_template_directory_uri().'/scripts/admin/style.css', false, '1.0', 'screen');
                wp_enqueue_media();
		wp_register_script('admin-scripts', get_template_directory_uri().'/scripts/admin/scripts.js', array('jquery'), '1.0', true);
		wp_enqueue_script('admin-scripts');
                wp_localize_script( 'admin-scripts', 'admin_scripts_params', array(
                                        enable_google_web_fonts => $udesign_options['enable_google_web_fonts'],
                                        custom_colors_switch => $udesign_options['custom_colors_switch'],
                                        current_slider => $udesign_options['current_slider']
                                    )
                                  );
                
		// load tablednd scripts
		wp_register_script('tablednd', get_template_directory_uri().'/scripts/admin/jquery.tablednd.js', array('jquery'), '0.5', true);
		wp_enqueue_script('tablednd');
		//load color picker scripts
		wp_enqueue_style('ud-colorpicker-style', get_template_directory_uri().'/scripts/admin/colorpicker/css/colorpicker.css', false, '1.0', 'screen');
		wp_register_script('ud-colorpicker', get_template_directory_uri().'/scripts/admin/colorpicker/js/colorpicker.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('ud-colorpicker');
                
                
                // jQuery validation script
                wp_enqueue_script('jquery_validate_lib', get_template_directory_uri()."/scripts/jquery-validate/jquery.validate.min.js", array('jquery'), '1.11.1', false);
                wp_enqueue_script('masked_input_plugin', get_template_directory_uri()."/scripts/masked-input-plugin/jquery.maskedinput.min.js", array('jquery'), '1.3.1', false);
                
                
                
                global $wp_scripts;
                wp_enqueue_script('jquery-ui-core');
                wp_enqueue_script('jquery-ui-slider');
                wp_enqueue_script('jquery-ui-tooltip');
                // get the jquery ui object
                $queryui = $wp_scripts->query('jquery-ui-core');
                // load the jquery ui theme
                $url = "http://ajax.googleapis.com/ajax/libs/jqueryui/".$queryui->ver."/themes/flick/jquery-ui.css";
                wp_enqueue_style('jquery-ui-smoothness', $url, false, null);

                
		// load javascripts to allow drag/drop, expand/collapse and hide/show of boxes
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');

		add_meta_box('udesign-help-options-metabox', esc_html__('Help', 'udesign'), array(&$this, 'help_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-general-options-metabox', esc_html__('General Options', 'udesign'), array(&$this, 'general_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-layout-options-metabox', esc_html__('Layout Options', 'udesign'), array(&$this, 'layout_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-font-settings-metabox', esc_html__('Font Settings', 'udesign'), array(&$this, 'font_settings_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-custom-colors-metabox', esc_html__('Custom Colors', 'udesign'), array(&$this, 'custom_colors_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-front-page-options-metabox', esc_html__('Front Page Sliders', 'udesign'), array(&$this, 'front_page_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-portfolio-section-options-metabox', esc_html__('Portfolio Section', 'udesign'), array(&$this, 'portfolio_section_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-blog-section-options-metabox', esc_html__('Blog Section', 'udesign'), array(&$this, 'blog_section_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-contact_page-options-metabox', esc_html__('Contact Page', 'udesign'), array(&$this, 'contact_page_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-footer-options-metabox', esc_html__('Footer Options', 'udesign'), array(&$this, 'footer_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-statistics-options-metabox', esc_html__('Statistics', 'udesign'), array(&$this, 'statistics_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-responsive-options-metabox', esc_html__('Responsive Layout', 'udesign'), array(&$this, 'responsive_options_contentbox'), $this->pagehook, 'normal', 'core');
		add_meta_box('udesign-advanced-options-metabox', esc_html__('Advanced Options', 'udesign'), array(&$this, 'advanced_options_contentbox'), $this->pagehook, 'normal', 'core');
                
                // get the current user ID
                if ( current_user_can('manage_options') ) {
                    $curr_user = get_current_user_id();
                    // close metaboxes when the U-Design options page is visited for the very first time
                    if ( !get_user_meta( $curr_user, "closedpostboxes_$this->pagehook", false ) ) {
                        update_user_meta( 
                                $curr_user, 
                                "closedpostboxes_$this->pagehook", 
                                array(
                                    // 'udesign-help-options-metabox', 
                                    'udesign-general-options-metabox', 
                                    'udesign-layout-options-metabox', 
                                    'udesign-font-settings-metabox', 
                                    'udesign-custom-colors-metabox', 
                                    'udesign-front-page-options-metabox', 
                                    'udesign-portfolio-section-options-metabox', 
                                    'udesign-blog-section-options-metabox', 
                                    'udesign-contact_page-options-metabox', 
                                    'udesign-footer-options-metabox', 
                                    'udesign-statistics-options-metabox', 
                                    'udesign-responsive-options-metabox',
                                    // 'udesign-advanced-options-metabox'
                                )
                         );
                    }
                    
                    // hide the "Advanced Options" metabox by default. The user can toggle this option from the "Screen Options"
                    if ( '' == get_user_meta( $curr_user, "udesign_hidden_metaboxes_by_default", array( 'udesign-advanced-options-metabox' ) ) ) {
                        update_user_meta( $curr_user, "metaboxhidden_$this->pagehook", array( 'udesign-advanced-options-metabox' ) );
                        // add the following user specific meta to know which metabox options need to be hidden by default.
                        add_user_meta( $curr_user, "udesign_hidden_metaboxes_by_default", array( 'udesign-advanced-options-metabox' ), true );
                    }
                    
                }
        }

	function udesign_generate_options_page() {

		// global screen column value to be able to have a sidebar in WordPress 2.8+
		global $screen_layout_columns, $udesign_options;

		/* Messages to display saved and reset */
		if ( isset($_GET['settings-updated']) || isset($_GET['updated']) ) { 
                    echo '<div id="message" class="updated fade"><p><strong>'.esc_html__('Settings saved.', 'udesign').'</strong></p></div>';
                    
                    $file_was_included = true; // used in preventing direct access of 'styles/custom/custom_style.php'
                    // Update custom styles css file
                    $udesign_custom_style_css = TEMPLATEPATH . '/styles/custom/custom_style.css';
                    if ( is_writable($udesign_custom_style_css) ) {
                        set_theme_mod( 'udesign_custom_styles_use_css_file', 'yes' );
                        set_theme_mod( 'udesign_rand_ver_for_caching', rand(100,300) );
                        include_once('styles/custom/custom_style.php');
                    } else {
                        remove_theme_mod( 'udesign_custom_styles_use_css_file' );
                    }
                }
                
		//if ( $_GET['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.esc_html__('Settings reset.', 'udesign').'</strong></p></div>'; ?>
		<div id="udesign-metaboxes-general" class="wrap">
		    <div style="float:left; padding:10px 10px 10px 0;"><img src="<?php echo get_template_directory_uri(); ?>/scripts/admin/images/u-design-logo-small.png" width="90" height="43" /></div>
		    <h2 style="padding-top:25px;"><?php printf( __('Options <small>(version %1$s)</small>', 'udesign'), '2.4.6' ); ?></h2>
<?php 
		    $theme_home_directory = substr(strrchr( TEMPLATEPATH, "/" ), 1 );
		    if ( $theme_home_directory != 'u-design' || strpos(TEMPLATEPATH, '/U-Design-WP-Theme/u-design') || strpos(TEMPLATEPATH, '/u-design/u-design') ) {
			echo '<div id="message" class="error fade"><p>The current directory structure to the theme is not valid! The CORRECT path is: <code>wp-content/themes/u-design/...(theme files)</code></p>
				<p style="line-height:1.5;">You have either not installed the theme correctly or have renamed the theme home directory. In either case the theme will not function properly.
				    Pease refer to <a href="http://support.envato.com/index.php?/Knowledgebase/Article/View/269/0/my-wordpress-theme-isnt-working-what-should-i-do" target="_blank">this guide</a> or preview the Documentation included in the "Help" section below to install the theme correctly. Also, don\'t forget to unzip the zip file you downloaded from ThemeForest after purchase, the actual theme zip file would be inside the extracted folder as "u-design.zip"</p></div>';
		    }
?>
		    <form id="udesign_options_submit_form" method="post" action="options.php">
<?php			settings_fields( 'udesign_options_page' ); // Checks that the user can update options and also redirect the user back to the correct admin page (this form).
			$options = get_option('udesign_options');
			// Allows the 'closed' state of metaboxes to be remembered
			wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
			// Allows the order of metaboxes to be remembered
			wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

			<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
				<div id="post-body" class="has-sidebar">
					<div id="post-body-content" class="has-sidebar-content">
<?php					    do_meta_boxes($this->pagehook, 'normal', $options); ?>
<?php					    do_meta_boxes($this->pagehook, 'additional', $options); ?>
					    <div class="submit-options-wrapper">
                                                <div class="submit">
                                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit" />
                                                    <input class="button-primary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'udesign') ?>" />
                                                    <span class="spinner spinner-float-left"></span>
                                                </div>
                                                <label for="reset_to_defaults" class="reset-to-defaults">
						    <input name="udesign_options[reset_to_defaults]" type="checkbox" id="reset_to_defaults" value="yes" />
						    <?php esc_attr_e('Reset to defaults', 'udesign') ?>
						</label>
					    </div>
					</div>
				</div>
				<br class="clear"/>
			</div>
		    </form>
<?php		    /* The reset button */; ?>
<!--		    <form method="post">
			<p class="submit">
			    <input name="reset" type="submit" value="Reset" />
			    <input type="hidden" name="action" value="reset" />
			</p>
		    </form> -->
		</div>
		<script type="text/javascript">
		    //<![CDATA[
		    jQuery(document).ready( function($) {
			    // close postboxes that should be closed
			    $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			    // postboxes setup
			    postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>');
                            
                            // Confirm the reset
                            $('#reset_to_defaults').click(function() {
                                if ( $(this).is(':checked') ) {
                                    this.checked = confirm("Are you sure you want to reset all options?");
                                    $(this).trigger("change");
                                }
                            });
		    });
		    //]]>
		</script>
<?php	}

	/**
	 * Validate user input
	 *
	 * @param array $input, an array of user input
	 * @return array Return an input array of sanitized input
	 */
	function validate_options( $input ) {
		global $udesign_options, $google_webfonts, $cufon_fonts, $portfolio_pages_array;

                $input['reset_to_defaults'] = $input['reset_to_defaults'];
                $input['color_scheme'] = $udesign_options['color_scheme'];
                
		// General Options
		$input['custom_logo_img'] = esc_url_raw($input['custom_logo_img']);
		$input['top_area_height'] = is_numeric( $input['top_area_height'] ) ? absint($input['top_area_height']) : $udesign_options['top_area_height'];
		$input['logo_width'] = is_numeric( $input['logo_width'] ) ? absint($input['logo_width']) : $udesign_options['logo_width'];
		$input['logo_height'] = is_numeric( $input['logo_height'] ) ? absint($input['logo_height']) : $udesign_options['logo_height'];
		$input['slogan_distance_from_the_top'] =  ( $input['slogan_distance_from_the_top'] ) ? absint($input['slogan_distance_from_the_top']) : $udesign_options['slogan_distance_from_the_top'];
		$input['slogan_distance_from_the_left'] =  ( preg_match('/^0*([0-9]{1}|[0-9]{1,2}|[0-3]{1}[0-9]{1,2}|400)$/', $input['slogan_distance_from_the_left']) )  ? ($input['slogan_distance_from_the_left']) : $udesign_options['slogan_distance_from_the_left'];
		$input['slogan_font_size'] = (  $input['slogan_font_size'] ) ? $input['slogan_font_size'] : $udesign_options['slogan_font_size'];
		$input['top_page_phone_number'] = trim(stripslashes($input['top_page_phone_number']));
                $input['enable_page_peel'] = $input['enable_page_peel'];
		$input['page_peel_url'] = esc_url_raw($input['page_peel_url']);
                $input['enable_feedback'] = $input['enable_feedback'];
		$input['feedback_url'] = esc_url_raw($input['feedback_url']);
                $input['feedback_position_fixed'] = $input['feedback_position_fixed'];
                $input['enable_prettyPhoto_script'] = $input['enable_prettyPhoto_script'];
                $input['fixed_main_menu'] = $input['fixed_main_menu'];
                $input['add_fixed_menu_shadow'] = $input['add_fixed_menu_shadow'];
                $input['remove_fixed_menu_background_image'] = $input['remove_fixed_menu_background_image'];
                $input['remove_fixed_menu_on_mobile_devices'] = $input['remove_fixed_menu_on_mobile_devices'];
		$input['main_menu_alignment'] = ($input['main_menu_alignment']) ? $input['main_menu_alignment'] : $udesign_options['main_menu_alignment'];
                $input['show_menu_drop_shadows'] = $input['show_menu_drop_shadows'];
                $input['remove_border_under_menu'] = $input['remove_border_under_menu'];
                $input['disable_the_theme_update_notifier'] = $input['disable_the_theme_update_notifier'];
                $input['enable_udesign_schema_tags'] = $input['enable_udesign_schema_tags'];
                $input['udesign_disable_img_cropping'] = $input['udesign_disable_img_cropping'];
                $input['udesign_enable_retina_images'] = $input['udesign_enable_retina_images'];
                $input['enable_default_style_css'] = $input['enable_default_style_css'];

                // Layout Options
		$input['page_title_position'] = (  $input['page_title_position'] ) ? $input['page_title_position'] : $udesign_options['page_title_position'];
                $input['home_page_col_1_fixed'] = $input['home_page_col_1_fixed'];
                $input['remove_default_page_sidebar'] = $input['remove_default_page_sidebar'];
		$input['pages_sidebar'] = ($input['pages_sidebar']) ? $input['pages_sidebar'] : $udesign_options['pages_sidebar'];
		$input['pages_sidebar_2'] = ($input['pages_sidebar_2']) ? $input['pages_sidebar_2'] : $udesign_options['pages_sidebar_2'];
		$input['pages_sidebar_3'] = ($input['pages_sidebar_3']) ? $input['pages_sidebar_3'] : $udesign_options['pages_sidebar_3'];
		$input['pages_sidebar_4'] = ($input['pages_sidebar_4']) ? $input['pages_sidebar_4'] : $udesign_options['pages_sidebar_4'];
		$input['pages_sidebar_5'] = ($input['pages_sidebar_5']) ? $input['pages_sidebar_5'] : $udesign_options['pages_sidebar_5'];
		$input['pages_sidebar_6'] = ($input['pages_sidebar_6']) ? $input['pages_sidebar_6'] : $udesign_options['pages_sidebar_6'];
		$input['pages_sidebar_7'] = ($input['pages_sidebar_7']) ? $input['pages_sidebar_7'] : $udesign_options['pages_sidebar_7'];
		$input['pages_sidebar_8'] = ($input['pages_sidebar_8']) ? $input['pages_sidebar_8'] : $udesign_options['pages_sidebar_8'];
		$input['sitemap_sidebar'] = ($input['sitemap_sidebar']) ? $input['sitemap_sidebar'] : $udesign_options['sitemap_sidebar'];
                $input['show_comments_on_pages'] = $input['show_comments_on_pages'];
                $input['max_theme_width'] = $input['max_theme_width'];
		$input['global_theme_width'] = ( is_numeric( $input['global_theme_width']  ) && $input['global_theme_width'] > 959 && $input['global_theme_width'] < 1601 ) ? $input['global_theme_width'] : $udesign_options['global_theme_width'];
		$input['global_sidebar_width'] = ( is_numeric( $input['global_sidebar_width']  ) && $input['global_sidebar_width'] > 19 && $input['global_sidebar_width'] < 51 ) ? $input['global_sidebar_width'] : $udesign_options['global_sidebar_width'];
                
		// Font Settings
		$input['font_family'] = (  $input['font_family'] ) ? $input['font_family'] : $udesign_options['font_family'];
		$input['font_size'] = (  $input['font_size'] ) ? $input['font_size'] : $udesign_options['font_size'];
		$input['top_nav_font_family'] = (  $input['top_nav_font_family'] ) ? $input['top_nav_font_family'] : $udesign_options['top_nav_font_family'];
		$input['top_nav_font_size'] = (  $input['top_nav_font_size'] ) ? $input['top_nav_font_size'] : $udesign_options['top_nav_font_size'];
		$input['title_headings_font_family'] = (  $input['title_headings_font_family'] ) ? $input['title_headings_font_family'] : $udesign_options['title_headings_font_family'];
		$input['heading_font_size_coefficient'] = (  $input['heading_font_size_coefficient'] ) ? $input['heading_font_size_coefficient'] : $udesign_options['heading_font_size_coefficient'];
		// Add any new font family variables (another dropdown) to the array below
                $input['google_web_fonts_assoc'] = array( 'font_family' => $input['font_family'],
                                                          'top_nav_font_family' => $input['top_nav_font_family'],
                                                          'title_headings_font_family' => $input['title_headings_font_family'] );
		$input['google_web_fonts_assoc'] = array_intersect( $input['google_web_fonts_assoc'], $google_webfonts ); // keep ONLY the Google Webfonts in the array
		if( $input['enable_google_web_fonts'] != 'yes' ) { // if disabled clear the 'google_web_fonts_assoc' array
			unset($input['google_web_fonts_assoc']);
			$input['google_web_fonts_assoc'] = array();
		}
		// Add any new font family variables (another dropdown) to the array below
		$input['cufon_fonts_assoc'] = array( 'title_headings_font_family' => $input['title_headings_font_family'] );
		$input['cufon_fonts_assoc'] = array_intersect( $input['cufon_fonts_assoc'], $cufon_fonts ); // keep ONLY the cufon fonts in the array
		$input['enable_cufon'] = ( empty($input['cufon_fonts_assoc']) ) ? '' : 'cufon-on';

		// Custom Colors
		if($input['save_current_colors_as_array'] == 'yes') {
		    $color_array_name = date_i18n('Y-m-d-H-i-s');
		    $udesign_options['saved_custom_colors_array'][$color_array_name] = array(
					"body_text_color"		=> $input['body_text_color'],
					"main_link_color"		=> $input['main_link_color'],
					"main_link_color_hover"		=> $input['main_link_color_hover'],
					"main_headings_color"		=> $input['main_headings_color'],
					"top_bg_color"			=> $input['top_bg_color'],
					"top_text_color"		=> $input['top_text_color'],
					"top_nav_link_color"		=> $input['top_nav_link_color'],
					"top_nav_active_link_color"	=> $input['top_nav_active_link_color'],
					"top_nav_hover_link_color"	=> $input['top_nav_hover_link_color'],
					"page_title_color"		=> $input['page_title_color'],
					"page_title_bg_color"		=> $input['page_title_bg_color'],
					"header_bg_color"		=> $input['header_bg_color'],
					"main_content_bg"		=> $input['main_content_bg'],
					"widget_title_color"		=> $input['widget_title_color'],
					"widget_text_color"		=> $input['widget_text_color'],
					"widget_bg_color"		=> $input['widget_bg_color'],
		    			"bottom_bg_color"		=> $input['bottom_bg_color'],
					"bottom_title_color"		=> $input['bottom_title_color'],
					"bottom_text_color"		=> $input['bottom_text_color'],
					"bottom_link_color"		=> $input['bottom_link_color'],
					"bottom_hover_link_color"	=> $input['bottom_hover_link_color'],
		    			"footer_bg_color"		=> $input['footer_bg_color'],
					"footer_text_color"		=> $input['footer_text_color'],
					"footer_link_color"		=> $input['footer_link_color'],
					"footer_hover_link_color"	=> $input['footer_hover_link_color'],
					"top_bg_img"                    => esc_url_raw($input['top_bg_img']),
					"top_bg_img_repeat"             => $input['top_bg_img_repeat'],
					"top_bg_img_position_horizontal"=> $input['top_bg_img_position_horizontal'],
					"top_bg_img_position_vertical"  => $input['top_bg_img_position_vertical'],
					"header_bg_img"                 => esc_url_raw($input['header_bg_img']),
					"header_bg_img_repeat"          => $input['header_bg_img_repeat'],
					"header_bg_img_position_horizontal"=> $input['header_bg_img_position_horizontal'],
					"header_bg_img_position_vertical"  => $input['header_bg_img_position_vertical'],
					"home_page_before_content_bg_img"  => esc_url_raw($input['home_page_before_content_bg_img']),
					"home_page_before_content_bg_img_repeat"  => $input['home_page_before_content_bg_img_repeat'],
					"home_page_before_content_bg_img_position_horizontal"=> $input['home_page_before_content_bg_img_position_horizontal'],
					"home_page_before_content_bg_img_position_vertical"  => $input['home_page_before_content_bg_img_position_vertical'],
					"page_title_bg_img"              => esc_url_raw($input['page_title_bg_img']),
					"page_title_bg_img_repeat"       => $input['page_title_bg_img_repeat'],
					"page_title_bg_img_position_horizontal"=> $input['page_title_bg_img_position_horizontal'],
					"page_title_bg_img_position_vertical"  => $input['page_title_bg_img_position_vertical'],
					"main_content_bg_img"            => esc_url_raw($input['main_content_bg_img']),
					"main_content_bg_img_repeat"     => $input['main_content_bg_img_repeat'],
					"main_content_bg_img_position_horizontal"=> $input['main_content_bg_img_position_horizontal'],
					"main_content_bg_img_position_vertical"  => $input['main_content_bg_img_position_vertical'],
					"bottom_bg_img"            => esc_url_raw($input['bottom_bg_img']),
					"bottom_bg_img_repeat"     => $input['bottom_bg_img_repeat'],
					"bottom_bg_img_position_horizontal"=> $input['bottom_bg_img_position_horizontal'],
					"bottom_bg_img_position_vertical"  => $input['bottom_bg_img_position_vertical'],
					"footer_bg_img"            => esc_url_raw($input['footer_bg_img']),
					"footer_bg_img_repeat"     => $input['footer_bg_img_repeat'],
					"footer_bg_img_position_horizontal"=> $input['footer_bg_img_position_horizontal'],
					"footer_bg_img_position_vertical"  => $input['footer_bg_img_position_vertical'],
					"one_continuous_bg_img"            => esc_url_raw($input['one_continuous_bg_img']),
					"one_continuous_bg_img_repeat"     => $input['one_continuous_bg_img_repeat'],
					"one_continuous_bg_img_position_horizontal"=> $input['one_continuous_bg_img_position_horizontal'],
					"one_continuous_bg_img_position_vertical"  => $input['one_continuous_bg_img_position_vertical'],
					"one_continuous_bg_img_fixed"  => $input['one_continuous_bg_img_fixed'],
					"one_continuous_bg_img_with_other_bg_imgs"  => $input['one_continuous_bg_img_with_other_bg_imgs'],
					"udesign_remove_horizontal_rulers"  => $input['udesign_remove_horizontal_rulers']
		    );
		    $input['saved_custom_colors_array'] = $udesign_options['saved_custom_colors_array'];
		    $input['save_current_colors_as_array'] = ''; // clear the checkbox
		} else {
		    // preserve the 'saved_custom_colors_array'
		    $input['saved_custom_colors_array'] = $udesign_options['saved_custom_colors_array'];
		}
		if( $input['chosen_custom_colors'] != '' && $input['chosen_custom_colors'] != 'default' ) {
		    if( $input['chosen_custom_colors_admin_task'] == 'load') { // load a specific color scheme
			$chosen_colors_array = $input['saved_custom_colors_array'][$input['chosen_custom_colors']];
			$input['body_text_color'] = ( ctype_alnum($chosen_colors_array['body_text_color']) ) ? strtoupper(stripslashes($chosen_colors_array['body_text_color'])) : $udesign_options['body_text_color'];
			$input['main_link_color'] = ( ctype_alnum($chosen_colors_array['main_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['main_link_color'])) : $udesign_options['main_link_color'];
			$input['main_link_color_hover'] = ( ctype_alnum($chosen_colors_array['main_link_color_hover']) ) ? strtoupper(stripslashes($chosen_colors_array['main_link_color_hover'])) : $udesign_options['main_link_color_hover'];
			$input['main_headings_color'] = ( ctype_alnum($chosen_colors_array['main_headings_color']) ) ? strtoupper(stripslashes($chosen_colors_array['main_headings_color'])) : $udesign_options['main_headings_color'];
			$input['top_bg_color'] = ( ctype_alnum($chosen_colors_array['top_bg_color']) ) ? strtoupper(stripslashes($chosen_colors_array['top_bg_color'])) : $udesign_options['top_bg_color'];
			$input['top_text_color'] = ( ctype_alnum($chosen_colors_array['top_text_color']) ) ? strtoupper(stripslashes($chosen_colors_array['top_text_color'])) : $udesign_options['top_text_color'];
			$input['top_nav_link_color'] = ( ctype_alnum($chosen_colors_array['top_nav_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['top_nav_link_color'])) : $udesign_options['top_nav_link_color'];
			$input['top_nav_active_link_color'] = ( ctype_alnum($chosen_colors_array['top_nav_active_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['top_nav_active_link_color'])) : $udesign_options['top_nav_active_link_color'];
			$input['top_nav_hover_link_color'] = ( ctype_alnum($chosen_colors_array['top_nav_hover_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['top_nav_hover_link_color'])) : $udesign_options['top_nav_hover_link_color'];
			$input['page_title_color'] = ( ctype_alnum($chosen_colors_array['page_title_color']) ) ? strtoupper(stripslashes($chosen_colors_array['page_title_color'])) : $udesign_options['page_title_color'];
			$input['page_title_bg_color'] = ( ctype_alnum($chosen_colors_array['page_title_bg_color']) ) ? strtoupper(stripslashes($chosen_colors_array['page_title_bg_color'])) : $udesign_options['page_title_bg_color'];
			$input['header_bg_color'] = ( ctype_alnum($chosen_colors_array['header_bg_color']) ) ? strtoupper(stripslashes($chosen_colors_array['header_bg_color'])) : $udesign_options['header_bg_color'];
			$input['main_content_bg'] = ( ctype_alnum($chosen_colors_array['main_content_bg']) ) ? strtoupper(stripslashes($chosen_colors_array['main_content_bg'])) : $udesign_options['main_content_bg'];
			$input['widget_title_color'] = ( ctype_alnum($chosen_colors_array['widget_title_color']) ) ? strtoupper(stripslashes($chosen_colors_array['widget_title_color'])) : $udesign_options['widget_title_color'];
			$input['widget_text_color'] = ( ctype_alnum($chosen_colors_array['widget_text_color']) ) ? strtoupper(stripslashes($chosen_colors_array['widget_text_color'])) : $udesign_options['widget_text_color'];
			$input['widget_bg_color'] = ( ctype_alnum($chosen_colors_array['widget_bg_color']) ) ? strtoupper(stripslashes($chosen_colors_array['widget_bg_color'])) : $udesign_options['widget_bg_color'];
			$input['bottom_bg_color'] = ( ctype_alnum($chosen_colors_array['bottom_bg_color']) ) ? strtoupper(stripslashes($chosen_colors_array['bottom_bg_color'])) : $udesign_options['bottom_bg_color'];
			$input['bottom_title_color'] = ( ctype_alnum($chosen_colors_array['bottom_title_color']) ) ? strtoupper(stripslashes($chosen_colors_array['bottom_title_color'])) : $udesign_options['bottom_title_color'];
			$input['bottom_text_color'] = ( ctype_alnum($chosen_colors_array['bottom_text_color']) ) ? strtoupper(stripslashes($chosen_colors_array['bottom_text_color'])) : $udesign_options['bottom_text_color'];
			$input['bottom_link_color'] = ( ctype_alnum($chosen_colors_array['bottom_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['bottom_link_color'])) : $udesign_options['bottom_link_color'];
			$input['bottom_hover_link_color'] = ( ctype_alnum($chosen_colors_array['bottom_hover_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['bottom_hover_link_color'])) : $udesign_options['bottom_hover_link_color'];
			$input['footer_bg_color'] = ( ctype_alnum($chosen_colors_array['footer_bg_color']) ) ? strtoupper(stripslashes($chosen_colors_array['footer_bg_color'])) : $udesign_options['footer_bg_color'];
			$input['footer_text_color'] = ( ctype_alnum($chosen_colors_array['footer_text_color']) ) ? strtoupper(stripslashes($chosen_colors_array['footer_text_color'])) : $udesign_options['footer_text_color'];
			$input['footer_link_color'] = ( ctype_alnum($chosen_colors_array['footer_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['footer_link_color'])) : $udesign_options['footer_link_color'];
			$input['footer_hover_link_color'] = ( ctype_alnum($chosen_colors_array['footer_hover_link_color']) ) ? strtoupper(stripslashes($chosen_colors_array['footer_hover_link_color'])) : $udesign_options['footer_hover_link_color'];
                        $input['top_bg_img'] = esc_url_raw($chosen_colors_array['top_bg_img']);
                        $input['top_bg_img_repeat'] = $chosen_colors_array['top_bg_img_repeat'];
                        $input['top_bg_img_position_horizontal'] = $chosen_colors_array['top_bg_img_position_horizontal'];
                        $input['top_bg_img_position_vertical'] = $chosen_colors_array['top_bg_img_position_vertical'];
                        $input['header_bg_img'] = esc_url_raw($chosen_colors_array['header_bg_img']);
                        $input['header_bg_img_repeat'] = $chosen_colors_array['header_bg_img_repeat'];
                        $input['header_bg_img_position_horizontal'] = $chosen_colors_array['header_bg_img_position_horizontal'];
                        $input['header_bg_img_position_vertical'] = $chosen_colors_array['header_bg_img_position_vertical'];
                        $input['home_page_before_content_bg_img'] = esc_url_raw($chosen_colors_array['home_page_before_content_bg_img']);
                        $input['home_page_before_content_bg_img_repeat'] = $chosen_colors_array['home_page_before_content_bg_img_repeat'];
                        $input['home_page_before_content_bg_img_position_horizontal'] = $chosen_colors_array['home_page_before_content_bg_img_position_horizontal'];
                        $input['home_page_before_content_bg_img_position_vertical'] = $chosen_colors_array['home_page_before_content_bg_img_position_vertical'];
                        $input['page_title_bg_img'] = esc_url_raw($chosen_colors_array['page_title_bg_img']);
                        $input['page_title_bg_img_repeat'] = $chosen_colors_array['page_title_bg_img_repeat'];
                        $input['page_title_bg_img_position_horizontal'] = $chosen_colors_array['page_title_bg_img_position_horizontal'];
                        $input['page_title_bg_img_position_vertical'] = $chosen_colors_array['page_title_bg_img_position_vertical'];
                        $input['main_content_bg_img'] = esc_url_raw($chosen_colors_array['main_content_bg_img']);
                        $input['main_content_bg_img_repeat'] = $chosen_colors_array['main_content_bg_img_repeat'];
                        $input['main_content_bg_img_position_horizontal'] = $chosen_colors_array['main_content_bg_img_position_horizontal'];
                        $input['main_content_bg_img_position_vertical'] = $chosen_colors_array['main_content_bg_img_position_vertical'];
                        $input['bottom_bg_img'] = esc_url_raw($chosen_colors_array['bottom_bg_img']);
                        $input['bottom_bg_img_repeat'] = $chosen_colors_array['bottom_bg_img_repeat'];
                        $input['bottom_bg_img_position_horizontal'] = $chosen_colors_array['bottom_bg_img_position_horizontal'];
                        $input['bottom_bg_img_position_vertical'] = $chosen_colors_array['bottom_bg_img_position_vertical'];
                        $input['footer_bg_img'] = esc_url_raw($chosen_colors_array['footer_bg_img']);
                        $input['footer_bg_img_repeat'] = $chosen_colors_array['footer_bg_img_repeat'];
                        $input['footer_bg_img_position_horizontal'] = $chosen_colors_array['footer_bg_img_position_horizontal'];
                        $input['footer_bg_img_position_vertical'] = $chosen_colors_array['footer_bg_img_position_vertical'];
                        $input['one_continuous_bg_img'] = esc_url_raw($chosen_colors_array['one_continuous_bg_img']);
                        $input['one_continuous_bg_img_repeat'] = $chosen_colors_array['one_continuous_bg_img_repeat'];
                        $input['one_continuous_bg_img_position_horizontal'] = $chosen_colors_array['one_continuous_bg_img_position_horizontal'];
                        $input['one_continuous_bg_img_position_vertical'] = $chosen_colors_array['one_continuous_bg_img_position_vertical'];
                        $input['one_continuous_bg_img_fixed'] = $chosen_colors_array['one_continuous_bg_img_fixed'];
                        $input['one_continuous_bg_img_with_other_bg_imgs'] = $chosen_colors_array['one_continuous_bg_img_with_other_bg_imgs'];
                        $input['udesign_remove_horizontal_rulers'] = $chosen_colors_array['udesign_remove_horizontal_rulers'];
		    } elseif ( $input['chosen_custom_colors_admin_task'] == 'delete' ) { // delete the selected color schemes
			unset( $input['saved_custom_colors_array'][$input['chosen_custom_colors']] );
		    }
		} elseif( $input['chosen_custom_colors'] == 'default' ) {
		    if( $input['chosen_custom_colors_admin_task'] == 'load') { // load a default color scheme
			$input['body_text_color'] = '333333';
			$input['main_link_color'] = 'FE5E08';
			$input['main_link_color_hover'] = '333333';
			$input['main_headings_color'] = '333333';
			$input['top_bg_color'] = 'FBFBFB';
			$input['top_text_color'] = '999999';
			$input['top_nav_link_color'] = '999999';
			$input['top_nav_active_link_color'] = 'F95A09';
			$input['top_nav_hover_link_color'] = '777777';
			$input['page_title_color'] = '333333';
			$input['page_title_bg_color'] = 'FFFFFF';
			$input['header_bg_color'] = 'FFFFFF';
			$input['main_content_bg'] = 'FFFFFF';
			$input['widget_title_color'] = '333333';
			$input['widget_text_color'] = '333333';
			$input['widget_bg_color'] = 'F8F8F8';
			$input['bottom_bg_color'] = 'F5F5F5';
			$input['bottom_title_color'] = 'FE5E08';
			$input['bottom_text_color'] = '333333';
			$input['bottom_link_color'] = '3D6E97';
			$input['bottom_hover_link_color'] = '000000';
			$input['footer_bg_color'] = 'EAEAEA';
			$input['footer_text_color'] = '797979';
			$input['footer_link_color'] = '3D6E97';
			$input['footer_hover_link_color'] = '000000';
                        $input['top_bg_img'] = '';
                        $input['top_bg_img_repeat'] = 'no-repeat';
                        $input['top_bg_img_position_horizontal'] = 'center';
                        $input['top_bg_img_position_vertical'] = 'top';
                        $input['header_bg_img'] = '';
                        $input['header_bg_img_repeat'] = 'no-repeat';
                        $input['header_bg_img_position_horizontal'] = 'center';
                        $input['header_bg_img_position_vertical'] = 'top';
                        $input['home_page_before_content_bg_img'] = '';
                        $input['home_page_before_content_bg_img_repeat'] = 'no-repeat';
                        $input['home_page_before_content_bg_img_position_horizontal'] = 'center';
                        $input['home_page_before_content_bg_img_position_vertical'] = 'top';
                        $input['page_title_bg_img'] = '';
                        $input['page_title_bg_img_repeat'] = 'no-repeat';
                        $input['page_title_bg_img_position_horizontal'] = 'center';
                        $input['page_title_bg_img_position_vertical'] = 'top';
                        $input['main_content_bg_img'] = '';
                        $input['main_content_bg_img_repeat'] = 'no-repeat';
                        $input['main_content_bg_img_position_horizontal'] = 'center';
                        $input['main_content_bg_img_position_vertical'] = 'top';
                        $input['bottom_bg_img'] = '';
                        $input['bottom_bg_img_repeat'] = 'no-repeat';
                        $input['bottom_bg_img_position_horizontal'] = 'center';
                        $input['bottom_bg_img_position_vertical'] = 'top';
                        $input['footer_bg_img'] = '';
                        $input['footer_bg_img_repeat'] = 'no-repeat';
                        $input['footer_bg_img_position_horizontal'] = 'center';
                        $input['footer_bg_img_position_vertical'] = 'top';
                        $input['one_continuous_bg_img'] = '';
                        $input['one_continuous_bg_img_repeat'] = 'no-repeat';
                        $input['one_continuous_bg_img_position_horizontal'] = 'center';
                        $input['one_continuous_bg_img_position_vertical'] = 'top';
                        $input['one_continuous_bg_img_fixed'] = '';
                        $input['one_continuous_bg_img_with_other_bg_imgs'] = '';
                        $input['udesign_remove_horizontal_rulers'] = '';
		    }
		} else { // save user input
		    $input['body_text_color'] = ( ctype_alnum($input['body_text_color']) ) ? strtoupper(stripslashes($input['body_text_color'])) : $udesign_options['body_text_color'];
		    $input['main_link_color'] = ( ctype_alnum($input['main_link_color']) ) ? strtoupper(stripslashes($input['main_link_color'])) : $udesign_options['main_link_color'];
		    $input['main_link_color_hover'] = ( ctype_alnum($input['main_link_color_hover']) ) ? strtoupper(stripslashes($input['main_link_color_hover'])) : $udesign_options['main_link_color_hover'];
		    $input['main_headings_color'] = ( ctype_alnum($input['main_headings_color']) ) ? strtoupper(stripslashes($input['main_headings_color'])) : $udesign_options['main_headings_color'];
		    $input['top_bg_color'] = ( ctype_alnum($input['top_bg_color']) ) ? strtoupper(stripslashes($input['top_bg_color'])) : $udesign_options['top_bg_color'];
		    $input['top_text_color'] = ( ctype_alnum($input['top_text_color']) ) ? strtoupper(stripslashes($input['top_text_color'])) : $udesign_options['top_text_color'];
		    $input['top_nav_link_color'] = ( ctype_alnum($input['top_nav_link_color']) ) ? strtoupper(stripslashes($input['top_nav_link_color'])) : $udesign_options['top_nav_link_color'];
		    $input['top_nav_active_link_color'] = ( ctype_alnum($input['top_nav_active_link_color']) ) ? strtoupper(stripslashes($input['top_nav_active_link_color'])) : $udesign_options['top_nav_active_link_color'];
		    $input['top_nav_hover_link_color'] = ( ctype_alnum($input['top_nav_hover_link_color']) ) ? strtoupper(stripslashes($input['top_nav_hover_link_color'])) : $udesign_options['top_nav_hover_link_color'];
		    $input['page_title_color'] = ( ctype_alnum($input['page_title_color']) ) ? strtoupper(stripslashes($input['page_title_color'])) : $udesign_options['page_title_color'];
		    $input['page_title_bg_color'] = ( ctype_alnum($input['page_title_bg_color']) ) ? strtoupper(stripslashes($input['page_title_bg_color'])) : $udesign_options['page_title_bg_color'];
		    $input['header_bg_color'] = ( ctype_alnum($input['header_bg_color']) ) ? strtoupper(stripslashes($input['header_bg_color'])) : $udesign_options['header_bg_color'];
		    $input['main_content_bg'] = ( ctype_alnum($input['main_content_bg']) ) ? strtoupper(stripslashes($input['main_content_bg'])) : $udesign_options['main_content_bg'];
                    $input['widget_title_color'] = ( ctype_alnum($input['widget_title_color']) ) ? strtoupper(stripslashes($input['widget_title_color'])) : $udesign_options['widget_title_color'];
		    $input['widget_text_color'] = ( ctype_alnum($input['widget_text_color']) ) ? strtoupper(stripslashes($input['widget_text_color'])) : $udesign_options['widget_text_color'];
		    $input['widget_bg_color'] = ( ctype_alnum($input['widget_bg_color']) ) ? strtoupper(stripslashes($input['widget_bg_color'])) : $udesign_options['widget_bg_color'];
		    $input['bottom_bg_color'] = ( ctype_alnum($input['bottom_bg_color']) ) ? strtoupper(stripslashes($input['bottom_bg_color'])) : $udesign_options['bottom_bg_color'];
		    $input['bottom_title_color'] = ( ctype_alnum($input['bottom_title_color']) ) ? strtoupper(stripslashes($input['bottom_title_color'])) : $udesign_options['bottom_title_color'];
		    $input['bottom_text_color'] = ( ctype_alnum($input['bottom_text_color']) ) ? strtoupper(stripslashes($input['bottom_text_color'])) : $udesign_options['bottom_text_color'];
		    $input['bottom_link_color'] = ( ctype_alnum($input['bottom_link_color']) ) ? strtoupper(stripslashes($input['bottom_link_color'])) : $udesign_options['bottom_link_color'];
		    $input['bottom_hover_link_color'] = ( ctype_alnum($input['bottom_hover_link_color']) ) ? strtoupper(stripslashes($input['bottom_hover_link_color'])) : $udesign_options['bottom_hover_link_color'];
		    $input['footer_bg_color'] = ( ctype_alnum($input['footer_bg_color']) ) ? strtoupper(stripslashes($input['footer_bg_color'])) : $udesign_options['footer_bg_color'];
		    $input['footer_text_color'] = ( ctype_alnum($input['footer_text_color']) ) ? strtoupper(stripslashes($input['footer_text_color'])) : $udesign_options['footer_text_color'];
		    $input['footer_link_color'] = ( ctype_alnum($input['footer_link_color']) ) ? strtoupper(stripslashes($input['footer_link_color'])) : $udesign_options['footer_link_color'];
		    $input['footer_hover_link_color'] = ( ctype_alnum($input['footer_hover_link_color']) ) ? strtoupper(stripslashes($input['footer_hover_link_color'])) : $udesign_options['footer_hover_link_color'];
		    $input['top_bg_img'] = esc_url_raw($input['top_bg_img']);
                    $input['top_bg_img_repeat'] = $input['top_bg_img_repeat'];
                    $input['top_bg_img_position_horizontal'] = $input['top_bg_img_position_horizontal'];
                    $input['top_bg_img_position_vertical'] = $input['top_bg_img_position_vertical'];
		    $input['header_bg_img'] = esc_url_raw($input['header_bg_img']);
                    $input['header_bg_img_repeat'] = $input['header_bg_img_repeat'];
                    $input['header_bg_img_position_horizontal'] = $input['header_bg_img_position_horizontal'];
                    $input['header_bg_img_position_vertical'] = $input['header_bg_img_position_vertical'];
		    $input['home_page_before_content_bg_img'] = esc_url_raw($input['home_page_before_content_bg_img']);
                    $input['home_page_before_content_bg_img_repeat'] = $input['home_page_before_content_bg_img_repeat'];
                    $input['home_page_before_content_bg_img_position_horizontal'] = $input['home_page_before_content_bg_img_position_horizontal'];
                    $input['home_page_before_content_bg_img_position_vertical'] = $input['home_page_before_content_bg_img_position_vertical'];
		    $input['page_title_bg_img'] = esc_url_raw($input['page_title_bg_img']);
                    $input['page_title_bg_img_repeat'] = $input['page_title_bg_img_repeat'];
                    $input['page_title_bg_img_position_horizontal'] = $input['page_title_bg_img_position_horizontal'];
                    $input['page_title_bg_img_position_vertical'] = $input['page_title_bg_img_position_vertical'];
		    $input['main_content_bg_img'] = esc_url_raw($input['main_content_bg_img']);
                    $input['main_content_bg_img_repeat'] = $input['main_content_bg_img_repeat'];
                    $input['main_content_bg_img_position_horizontal'] = $input['main_content_bg_img_position_horizontal'];
                    $input['main_content_bg_img_position_vertical'] = $input['main_content_bg_img_position_vertical'];
		    $input['bottom_bg_img'] = esc_url_raw($input['bottom_bg_img']);
                    $input['bottom_bg_img_repeat'] = $input['bottom_bg_img_repeat'];
                    $input['bottom_bg_img_position_horizontal'] = $input['bottom_bg_img_position_horizontal'];
                    $input['bottom_bg_img_position_vertical'] = $input['bottom_bg_img_position_vertical'];
		    $input['footer_bg_img'] = esc_url_raw($input['footer_bg_img']);
                    $input['footer_bg_img_repeat'] = $input['footer_bg_img_repeat'];
                    $input['footer_bg_img_position_horizontal'] = $input['footer_bg_img_position_horizontal'];
                    $input['footer_bg_img_position_vertical'] = $input['footer_bg_img_position_vertical'];
		    $input['one_continuous_bg_img'] = esc_url_raw($input['one_continuous_bg_img']);
                    $input['one_continuous_bg_img_repeat'] = $input['one_continuous_bg_img_repeat'];
                    $input['one_continuous_bg_img_position_horizontal'] = $input['one_continuous_bg_img_position_horizontal'];
                    $input['one_continuous_bg_img_position_vertical'] = $input['one_continuous_bg_img_position_vertical'];
                    $input['one_continuous_bg_img_fixed'] = $input['one_continuous_bg_img_fixed'];
                    $input['one_continuous_bg_img_with_other_bg_imgs'] = $input['one_continuous_bg_img_with_other_bg_imgs'];
                    $input['udesign_remove_horizontal_rulers'] = $input['udesign_remove_horizontal_rulers'];
		}

		// Front Page Sliders
		$input['current_slider'] = ( $input['current_slider'] ) ? $input['current_slider'] : $udesign_options['current_slider'];

		// Flashmo grid slider
		$input['gs_image_width'] = is_numeric( $input['gs_image_width'] ) ? absint($input['gs_image_width']) : $udesign_options['gs_image_width'];
		$input['gs_image_height'] = is_numeric( $input['gs_image_height'] ) ? absint($input['gs_image_height']) : $udesign_options['gs_image_height'];
		$input['gs_auto_play'] = (  $input['gs_auto_play'] ) ? $input['gs_auto_play'] : $udesign_options['gs_auto_play'];
		$input['gs_auto_play_duration'] = is_numeric( $input['gs_auto_play_duration'] ) ? abs($input['gs_auto_play_duration']) : $udesign_options['gs_auto_play_duration'];
		$input['gs_grid_row'] = ( is_numeric( $input['gs_grid_row'] ) && $input['gs_grid_row'] > 0 ) ? absint($input['gs_grid_row']) : $udesign_options['gs_grid_row'];
		$input['gs_grid_column'] = ( is_numeric( $input['gs_grid_column'] ) && $input['gs_grid_column'] > 0 ) ? absint($input['gs_grid_column']) : $udesign_options['gs_grid_column'];
		$input['gs_tween_duration'] = is_numeric(  $input['gs_tween_duration'] ) ? abs($input['gs_tween_duration']) : $udesign_options['gs_tween_duration'];
		$input['gs_tween_delay'] = is_numeric(  $input['gs_tween_delay'] ) ? abs($input['gs_tween_delay']) : $udesign_options['gs_tween_delay'];
		$input['gs_bar_status'] = (  $input['gs_bar_status'] ) ? $input['gs_bar_status'] : $udesign_options['gs_bar_status'];
		$input['gs_slides_order_str'] = ($input['gs_slides_order_str']) ? $input['gs_slides_order_str'] : $udesign_options['gs_slides_order_str'];
		$gs_slides_array = explode( ',', $input['gs_slides_order_str'] );
		foreach( $gs_slides_array as $slide_row_number ) {
		    $input['gs_slide_img_url_'.$slide_row_number] = ( $input['gs_slide_img_url_'.$slide_row_number] ) ? esc_url_raw($input['gs_slide_img_url_'.$slide_row_number]) : $udesign_options['gs_slide_img_url_'.$slide_row_number];
		    $input['gs_slide_transition_flow_'.$slide_row_number] = ( $input['gs_slide_transition_flow_'.$slide_row_number] ) ? $input['gs_slide_transition_flow_'.$slide_row_number] : $udesign_options['gs_slide_transition_flow_'.$slide_row_number];
		    $input['gs_slide_transition_direction_'.$slide_row_number] = ( $input['gs_slide_transition_direction_'.$slide_row_number] ) ? $input['gs_slide_transition_direction_'.$slide_row_number] : $udesign_options['gs_slide_transition_direction_'.$slide_row_number];
		    $input['gs_slide_transition_rotation_'.$slide_row_number] = ( $input['gs_slide_transition_rotation_'.$slide_row_number] ) ? $input['gs_slide_transition_rotation_'.$slide_row_number] : $udesign_options['gs_slide_transition_rotation_'.$slide_row_number];
		    $input['gs_slide_default_info_txt_'.$slide_row_number] = ( $input['gs_slide_default_info_txt_'.$slide_row_number] ) ? stripslashes($input['gs_slide_default_info_txt_'.$slide_row_number]) : $udesign_options['gs_slide_default_info_txt_'.$slide_row_number];
		}
		$input['gs_no_js_img'] = ($input['gs_no_js_img']) ? esc_url_raw($input['gs_no_js_img']) : $udesign_options['gs_no_js_img'];

		// Piecemaker
		$input['pm_image_width'] = is_numeric( $input['pm_image_width'] ) ? absint($input['pm_image_width']) : $udesign_options['pm_image_width'];
		$input['pm_image_height'] = is_numeric( $input['pm_image_height'] ) ? absint($input['pm_image_height']) : $udesign_options['pm_image_height'];
		$input['pm_segments'] = ( is_numeric( $input['pm_segments'] ) && $input['pm_segments'] > 0 ) ? absint($input['pm_segments']) : $udesign_options['pm_segments'];
		$input['pm_tween_time'] = is_numeric( $input['pm_tween_time'] ) ? abs($input['pm_tween_time']) : $udesign_options['pm_tween_time'];
		$input['pm_tween_delay'] = is_numeric(  $input['pm_tween_delay'] ) ? abs($input['pm_tween_delay']) : $udesign_options['pm_tween_delay'];
		$input['pm_tween_type'] = (  $input['pm_tween_type'] ) ? $input['pm_tween_type'] : $udesign_options['pm_tween_type'];
		$input['pm_z_distance'] = is_numeric( $input['pm_z_distance'] ) ? $input['pm_z_distance'] : $udesign_options['pm_z_distance'];
		$input['pm_expand'] = is_numeric( $input['pm_expand'] ) ? absint($input['pm_expand']) : $udesign_options['pm_expand'];
		$input['pm_shadow_darkness'] =  ( preg_match('/^0*([0-9]{1,2}|100)$/', $input['pm_shadow_darkness']) )  ? ($input['pm_shadow_darkness']) : $udesign_options['pm_shadow_darkness'];
		$input['pm_autoplay'] = ( is_numeric( $input['pm_autoplay'] ) && $input['pm_autoplay'] > 0 ) ? absint($input['pm_autoplay']) : $udesign_options['pm_autoplay'];
		$input['pm_text_distance'] = is_numeric( $input['pm_text_distance'] ) ? absint($input['pm_text_distance']) : $udesign_options['pm_text_distance'];
		$input['pm_text_background'] = ( ctype_alnum($input['pm_text_background']) ) ? strtoupper(stripslashes($input['pm_text_background'])) : $udesign_options['pm_text_background'];
		$input['pm_inner_color'] = ( ctype_alnum($input['pm_inner_color']) ) ? strtoupper(stripslashes($input['pm_inner_color'])) : $udesign_options['pm_inner_color'];
		$input['pm_slides_order_str'] = ($input['pm_slides_order_str']) ? $input['pm_slides_order_str'] : $udesign_options['pm_slides_order_str'];
		$pm_slides_array = explode( ',', $input['pm_slides_order_str'] );
		foreach( $pm_slides_array as $slide_row_number ) {
		    $input['pm_slider_default_info_txt_'.$slide_row_number] = ($input['pm_slider_default_info_txt_'.$slide_row_number]) ? stripslashes($input['pm_slider_default_info_txt_'.$slide_row_number]) : $udesign_options['pm_slider_default_info_txt_'.$slide_row_number];
		    $input['pm_slide_img_url_'.$slide_row_number] = ($input['pm_slide_img_url_'.$slide_row_number]) ? $input['pm_slide_img_url_'.$slide_row_number] : $udesign_options['pm_slide_img_url_'.$slide_row_number];
		}
		$input['pm_no_js_img'] = ($input['pm_no_js_img']) ? esc_url_raw($input['pm_no_js_img']) : $udesign_options['pm_no_js_img'];

		// Piecemaker 2
		$input['pm2_image_width'] = is_numeric( $input['pm2_image_width'] ) ? absint($input['pm2_image_width']) : $udesign_options['pm2_image_width'];
		$input['pm2_image_height'] = is_numeric( $input['pm2_image_height'] ) ? absint($input['pm2_image_height']) : $udesign_options['pm2_image_height'];
		$input['pm2_loader_color'] = ( ctype_alnum($input['pm2_loader_color']) ) ? strtoupper(stripslashes($input['pm2_loader_color'])) : $udesign_options['pm2_loader_color'];
		$input['pm2_inner_side_color'] = ( ctype_alnum($input['pm2_inner_side_color']) ) ? strtoupper(stripslashes($input['pm2_inner_side_color'])) : $udesign_options['pm2_inner_side_color'];
		$input['pm2_autoplay'] = is_numeric( $input['pm2_autoplay'] ) ? absint($input['pm2_autoplay']) : $udesign_options['pm2_autoplay'];
		$input['pm2_field_of_view'] = ( is_numeric( $input['pm2_field_of_view'] ) && $input['pm2_field_of_view'] > 0 && $input['pm2_field_of_view'] < 180 ) ? absint($input['pm2_field_of_view']) : $udesign_options['pm2_field_of_view'];
		$input['pm2_side_shadow_alpha'] = ( is_numeric( $input['pm2_side_shadow_alpha'] ) && $input['pm2_side_shadow_alpha'] >= 0 && $input['pm2_side_shadow_alpha'] <= 1 ) ? abs($input['pm2_side_shadow_alpha']) : $udesign_options['pm2_side_shadow_alpha'];
		$input['pm2_drop_shadow_alpha'] = ( is_numeric( $input['pm2_drop_shadow_alpha'] ) && $input['pm2_drop_shadow_alpha'] >= 0 && $input['pm2_drop_shadow_alpha'] <= 1 ) ? abs($input['pm2_drop_shadow_alpha']) : $udesign_options['pm2_drop_shadow_alpha'];
		$input['pm2_drop_shadow_distance'] = is_numeric( $input['pm2_drop_shadow_distance'] ) ? absint($input['pm2_drop_shadow_distance']) : $udesign_options['pm2_drop_shadow_distance'];
		$input['pm2_drop_shadow_scale'] = ( is_numeric( $input['pm2_drop_shadow_scale'] ) && $input['pm2_drop_shadow_scale'] >= 0 && $input['pm2_drop_shadow_scale'] <= 1 ) ? abs($input['pm2_drop_shadow_scale']) : $udesign_options['pm2_drop_shadow_scale'];
		$input['pm2_drop_shadow_blur_x'] = is_numeric( $input['pm2_drop_shadow_blur_x'] ) ? absint($input['pm2_drop_shadow_blur_x']) : $udesign_options['pm2_drop_shadow_blur_x'];
		$input['pm2_drop_shadow_blur_y'] = is_numeric( $input['pm2_drop_shadow_blur_y'] ) ? absint($input['pm2_drop_shadow_blur_y']) : $udesign_options['pm2_drop_shadow_blur_y'];
		$input['pm2_menu_distance_x'] = is_numeric( $input['pm2_menu_distance_x'] ) ? absint($input['pm2_menu_distance_x']) : $udesign_options['pm2_menu_distance_x'];
		$input['pm2_menu_distance_y'] = is_numeric( $input['pm2_menu_distance_y'] ) ? absint($input['pm2_menu_distance_y']) : $udesign_options['pm2_menu_distance_y'];
		$input['pm2_menu_color_1'] = ( ctype_alnum($input['pm2_menu_color_1']) ) ? strtoupper(stripslashes($input['pm2_menu_color_1'])) : $udesign_options['pm2_menu_color_1'];
		$input['pm2_menu_color_2'] = ( ctype_alnum($input['pm2_menu_color_2']) ) ? strtoupper(stripslashes($input['pm2_menu_color_2'])) : $udesign_options['pm2_menu_color_2'];
		$input['pm2_menu_color_3'] = ( ctype_alnum($input['pm2_menu_color_3']) ) ? strtoupper(stripslashes($input['pm2_menu_color_3'])) : $udesign_options['pm2_menu_color_3'];
		$input['pm2_control_size'] = is_numeric( $input['pm2_control_size'] ) ? absint($input['pm2_control_size']) : $udesign_options['pm2_control_size'];
		$input['pm2_control_distance'] = is_numeric( $input['pm2_control_distance'] ) ? absint($input['pm2_control_distance']) : $udesign_options['pm2_control_distance'];
		$input['pm2_control_color_1'] = ( ctype_alnum($input['pm2_control_color_1']) ) ? strtoupper(stripslashes($input['pm2_control_color_1'])) : $udesign_options['pm2_control_color_1'];
		$input['pm2_control_color_2'] = ( ctype_alnum($input['pm2_control_color_2']) ) ? strtoupper(stripslashes($input['pm2_control_color_2'])) : $udesign_options['pm2_control_color_2'];
		$input['pm2_control_alpha'] = ( is_numeric( $input['pm2_control_alpha'] ) && $input['pm2_control_alpha'] >= 0 && $input['pm2_control_alpha'] <= 1 ) ? abs($input['pm2_control_alpha']) : $udesign_options['pm2_control_alpha'];
		$input['pm2_control_alpha_over'] = ( is_numeric( $input['pm2_control_alpha_over'] ) && $input['pm2_control_alpha_over'] >= 0 && $input['pm2_control_alpha_over'] <= 1 ) ? abs($input['pm2_control_alpha_over']) : $udesign_options['pm2_control_alpha_over'];
		$input['pm2_controls_x'] = is_numeric( $input['pm2_controls_x'] ) ? absint($input['pm2_controls_x']) : $udesign_options['pm2_controls_x'];
		$input['pm2_controls_y'] = is_numeric( $input['pm2_controls_y'] ) ? absint($input['pm2_controls_y']) : $udesign_options['pm2_controls_y'];
		$input['pm2_controls_align'] = (  $input['pm2_controls_align'] ) ? $input['pm2_controls_align'] : $udesign_options['pm2_controls_align'];
		$input['pm2_tooltip_height'] = is_numeric( $input['pm2_tooltip_height'] ) ? absint($input['pm2_tooltip_height']) : $udesign_options['pm2_tooltip_height'];
		$input['pm2_tooltip_color'] = ( ctype_alnum($input['pm2_tooltip_color']) ) ? strtoupper(stripslashes($input['pm2_tooltip_color'])) : $udesign_options['pm2_tooltip_color'];
		$input['pm2_tooltip_text_y'] = is_numeric( $input['pm2_tooltip_text_y'] ) ? absint($input['pm2_tooltip_text_y']) : $udesign_options['pm2_tooltip_text_y'];
		$input['pm2_tooltip_text_style'] = ( $input['pm2_tooltip_text_style'] ) ? trim(stripslashes($input['pm2_tooltip_text_style'])) : $udesign_options['pm2_tooltip_text_style'];
		$input['pm2_tooltip_text_color'] = ( ctype_alnum($input['pm2_tooltip_text_color']) ) ? strtoupper(stripslashes($input['pm2_tooltip_text_color'])) : $udesign_options['pm2_tooltip_text_color'];
		$input['pm2_tooltip_margin_left'] = is_numeric( $input['pm2_tooltip_margin_left'] ) ? absint($input['pm2_tooltip_margin_left']) : $udesign_options['pm2_tooltip_margin_left'];
		$input['pm2_tooltip_margin_right'] = is_numeric( $input['pm2_tooltip_margin_right'] ) ? absint($input['pm2_tooltip_margin_right']) : $udesign_options['pm2_tooltip_margin_right'];
		$input['pm2_tooltip_text_sharpness'] = ( is_numeric( $input['pm2_tooltip_text_sharpness'] ) && $input['pm2_tooltip_text_sharpness'] >= -400 && $input['pm2_tooltip_text_sharpness'] <= 400 ) ? $input['pm2_tooltip_text_sharpness'] : $udesign_options['pm2_tooltip_text_sharpness'];
		$input['pm2_tooltip_text_thickness'] = ( is_numeric( $input['pm2_tooltip_text_thickness'] ) && $input['pm2_tooltip_text_thickness'] >= -400 && $input['pm2_tooltip_text_thickness'] <= 400 ) ? $input['pm2_tooltip_text_thickness'] : $udesign_options['pm2_tooltip_text_thickness'];
		$input['pm2_info_width'] = is_numeric( $input['pm2_info_width'] ) ? absint($input['pm2_info_width']) : $udesign_options['pm2_info_width'];
		$input['pm2_info_background'] = ( ctype_alnum($input['pm2_info_background']) ) ? strtoupper(stripslashes($input['pm2_info_background'])) : $udesign_options['pm2_info_background'];
		$input['pm2_info_background_alpha'] = ( is_numeric( $input['pm2_info_background_alpha'] ) && $input['pm2_info_background_alpha'] >= 0 && $input['pm2_info_background_alpha'] <= 1 ) ? abs($input['pm2_info_background_alpha']) : $udesign_options['pm2_info_background_alpha'];
		$input['pm2_info_margin'] = is_numeric( $input['pm2_info_margin'] ) ? absint($input['pm2_info_margin']) : $udesign_options['pm2_info_margin'];
		$input['pm2_info_sharpness'] = ( is_numeric( $input['pm2_info_sharpness'] ) && $input['pm2_info_sharpness'] >= -400 && $input['pm2_info_sharpness'] <= 400 ) ? $input['pm2_info_sharpness'] : $udesign_options['pm2_info_sharpness'];
		$input['pm2_info_thickness'] = ( is_numeric( $input['pm2_info_thickness'] ) && $input['pm2_info_thickness'] >= -400 && $input['pm2_info_thickness'] <= 400 ) ? $input['pm2_info_thickness'] : $udesign_options['pm2_info_thickness'];
		$input['pm2_slides_order_str'] = ($input['pm2_slides_order_str']) ? $input['pm2_slides_order_str'] : $udesign_options['pm2_slides_order_str'];
		$pm2_slides_array = explode( ',', $input['pm2_slides_order_str'] );
		foreach( $pm2_slides_array as $slide_row_number ) {
		    $input['pm2_slide_type_'.$slide_row_number] = ($input['pm2_slide_type_'.$slide_row_number]) ? $input['pm2_slide_type_'.$slide_row_number] : $udesign_options['pm2_slide_type_'.$slide_row_number];
		    $input['pm2_slide_img_url_'.$slide_row_number] = ($input['pm2_slide_img_url_'.$slide_row_number]) ? esc_url_raw($input['pm2_slide_img_url_'.$slide_row_number]) : $udesign_options['pm2_slide_img_url_'.$slide_row_number];
		    if ($input['pm2_slide_img_title_'.$slide_row_number] == ' ') { // if space then remove the title from field
			$input['pm2_slide_img_title_'.$slide_row_number] = '';
		    } elseif ($input['pm2_slide_img_title_'.$slide_row_number] == '') { // if blank then grab the previously saved value
			$input['pm2_slide_img_title_'.$slide_row_number] = $udesign_options['pm2_slide_img_title_'.$slide_row_number];
		    } else { // if some title, clean it, format it an save it
			$input['pm2_slide_img_title_'.$slide_row_number] = stripslashes($input['pm2_slide_img_title_'.$slide_row_number]);
		    }
		    if ($input['pm2_slide_link_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['pm2_slide_link_url_'.$slide_row_number] = '';
		    } elseif ($input['pm2_slide_link_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['pm2_slide_link_url_'.$slide_row_number] = $udesign_options['pm2_slide_link_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it an save it
			$input['pm2_slide_link_url_'.$slide_row_number] = esc_url_raw($input['pm2_slide_link_url_'.$slide_row_number]);
		    }
		    $input['pm2_slide_link_target_'.$slide_row_number] = (  $input['pm2_slide_link_target_'.$slide_row_number] ) ? $input['pm2_slide_link_target_'.$slide_row_number] : $udesign_options['pm2_slide_link_target_'.$slide_row_number];
		    if ($input['pm2_slide_default_info_txt_'.$slide_row_number] == ' ') { // if space then remove the info text from field
			$input['pm2_slide_default_info_txt_'.$slide_row_number] = '';
		    } elseif ($input['pm2_slide_default_info_txt_'.$slide_row_number] == '') { // if blank then grab the previously saved value
			$input['pm2_slide_default_info_txt_'.$slide_row_number] = $udesign_options['pm2_slide_default_info_txt_'.$slide_row_number];
		    } else { // if some text, clean it, format it an save it
			$input['pm2_slide_default_info_txt_'.$slide_row_number] = stripslashes($input['pm2_slide_default_info_txt_'.$slide_row_number]);
		    }
		    if ($input['pm2_flash_link_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['pm2_flash_link_url_'.$slide_row_number] = '';
		    } elseif ($input['pm2_flash_link_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['pm2_flash_link_url_'.$slide_row_number] = $udesign_options['pm2_flash_link_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it an save it
			$input['pm2_flash_link_url_'.$slide_row_number] = esc_url_raw($input['pm2_flash_link_url_'.$slide_row_number]);
		    }
		    if ($input['pm2_video_link_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['pm2_video_link_url_'.$slide_row_number] = '';
		    } elseif ($input['pm2_video_link_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['pm2_video_link_url_'.$slide_row_number] = $udesign_options['pm2_video_link_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it an save it
			$input['pm2_video_link_url_'.$slide_row_number] = esc_url_raw($input['pm2_video_link_url_'.$slide_row_number]);
		    }
		    $input['pm2_video_width_'.$slide_row_number] = is_numeric( $input['pm2_video_width_'.$slide_row_number] ) ? absint($input['pm2_video_width_'.$slide_row_number]) : $udesign_options['pm2_video_width_'.$slide_row_number];
		    $input['pm2_video_height_'.$slide_row_number] = is_numeric( $input['pm2_video_height_'.$slide_row_number] ) ? absint($input['pm2_video_height_'.$slide_row_number]) : $udesign_options['pm2_video_height_'.$slide_row_number];
		    $input['pm2_video_autoplay_'.$slide_row_number] = ( $input['pm2_video_autoplay_'.$slide_row_number] ) ? $input['pm2_video_autoplay_'.$slide_row_number] : $udesign_options['pm2_video_autoplay_'.$slide_row_number];
		}

		$input['pm2_transitions_order_str'] = ($input['pm2_transitions_order_str']) ? $input['pm2_transitions_order_str'] : $udesign_options['pm2_transitions_order_str'];
		$pm2_transitions_array = explode( ',', $input['pm2_transitions_order_str'] );
		foreach( $pm2_transitions_array as $transition_row_number ) {
		    $input['pm2_transition_pieces_'.$transition_row_number] = ( is_numeric( $input['pm2_transition_pieces_'.$transition_row_number] ) && $input['pm2_transition_pieces_'.$transition_row_number] > 0 ) ? absint($input['pm2_transition_pieces_'.$transition_row_number]) : $udesign_options['pm2_transition_pieces_'.$transition_row_number];
		    $input['pm2_transition_time_'.$transition_row_number] = is_numeric( $input['pm2_transition_time_'.$transition_row_number] ) ? abs($input['pm2_transition_time_'.$transition_row_number]) : $udesign_options['pm2_transition_time_'.$transition_row_number];
		    $input['pm2_transition_type_'.$transition_row_number] = ( $input['pm2_transition_type_'.$transition_row_number] ) ? $input['pm2_transition_type_'.$transition_row_number] : $udesign_options['pm2_transition_type_'.$transition_row_number];
		    $input['pm2_transition_delay_'.$transition_row_number] = is_numeric( $input['pm2_transition_delay_'.$transition_row_number] ) ? abs($input['pm2_transition_delay_'.$transition_row_number]) : $udesign_options['pm2_transition_delay_'.$transition_row_number];
		    $input['pm2_depth_offset_'.$transition_row_number] = is_numeric( $input['pm2_depth_offset_'.$transition_row_number] ) ? $input['pm2_depth_offset_'.$transition_row_number] : $udesign_options['pm2_depth_offset_'.$transition_row_number];
		    $input['pm2_cube_distance_'.$transition_row_number] = is_numeric( $input['pm2_cube_distance_'.$transition_row_number] ) ? absint($input['pm2_cube_distance_'.$transition_row_number]) : $udesign_options['pm2_cube_distance_'.$transition_row_number];
		}
		$input['pm2_no_js_img'] = ($input['pm2_no_js_img']) ? esc_url_raw($input['pm2_no_js_img']) : $udesign_options['pm2_no_js_img'];
	    
		// Cycle 1
		$input['c1_slides_order_str'] = ($input['c1_slides_order_str']) ? $input['c1_slides_order_str'] : $udesign_options['c1_slides_order_str'];
		$c1_slides_array = explode( ',', $input['c1_slides_order_str'] );
		foreach( $c1_slides_array as $slide_row_number ) {
		    $input['c1_slide_img_url_'.$slide_row_number] = ($input['c1_slide_img_url_'.$slide_row_number]) ? esc_url_raw($input['c1_slide_img_url_'.$slide_row_number]) : $udesign_options['c1_slide_img_url_'.$slide_row_number];
		    $input['c1_transition_type_'.$slide_row_number] = (  $input['c1_transition_type_'.$slide_row_number] ) ? $input['c1_transition_type_'.$slide_row_number] : $udesign_options['c1_transition_type_'.$slide_row_number];
		    if ($input['c1_slide_link_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['c1_slide_link_url_'.$slide_row_number] = '';
		    } elseif ($input['c1_slide_link_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['c1_slide_link_url_'.$slide_row_number] = $udesign_options['c1_slide_link_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it an save it
			$input['c1_slide_link_url_'.$slide_row_number] = esc_url_raw($input['c1_slide_link_url_'.$slide_row_number]);
		    }
		    $input['c1_slide_link_target_'.$slide_row_number] = (  $input['c1_slide_link_target_'.$slide_row_number] ) ? $input['c1_slide_link_target_'.$slide_row_number] : $udesign_options['c1_slide_link_target_'.$slide_row_number];
		    $input['c1_slide_image_alt_tag_'.$slide_row_number] = ($input['c1_slide_image_alt_tag_'.$slide_row_number]) ? trim(stripslashes($input['c1_slide_image_alt_tag_'.$slide_row_number])) : $udesign_options['c1_slide_image_alt_tag_'.$slide_row_number];
		}
		$input['c1_speed'] = is_numeric( $input['c1_speed'] ) ? absint($input['c1_speed']) : $udesign_options['c1_speed'];
		$input['c1_timeout'] = is_numeric( $input['c1_timeout'] ) ? absint($input['c1_timeout']) : $udesign_options['c1_timeout'];

		// Cycle 2
		$input['c2_slides_order_str'] = ($input['c2_slides_order_str']) ? $input['c2_slides_order_str'] : $udesign_options['c2_slides_order_str'];
		$c2_slides_array = explode( ',', $input['c2_slides_order_str'] );
		foreach( $c2_slides_array as $slide_row_number ) {
		    $input['c2_slide_img_url_'.$slide_row_number] = ($input['c2_slide_img_url_'.$slide_row_number]) ? esc_url_raw($input['c2_slide_img_url_'.$slide_row_number]) : $udesign_options['c2_slide_img_url_'.$slide_row_number];
		    $input['c2_transition_type_'.$slide_row_number] = (  $input['c2_transition_type_'.$slide_row_number] ) ? $input['c2_transition_type_'.$slide_row_number] : $udesign_options['c2_transition_type_'.$slide_row_number];
		    if ($input['c2_slide_link_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['c2_slide_link_url_'.$slide_row_number] = '';
		    } elseif ($input['c2_slide_link_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['c2_slide_link_url_'.$slide_row_number] = $udesign_options['c2_slide_link_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it and save it
			$input['c2_slide_link_url_'.$slide_row_number] = esc_url_raw($input['c2_slide_link_url_'.$slide_row_number]);
		    }
		    $input['c2_slide_link_target_'.$slide_row_number] = (  $input['c2_slide_link_target_'.$slide_row_number] ) ? $input['c2_slide_link_target_'.$slide_row_number] : $udesign_options['c2_slide_link_target_'.$slide_row_number];
		    $input['c2_slide_image_alt_tag_'.$slide_row_number] = ($input['c2_slide_image_alt_tag_'.$slide_row_number]) ? trim(stripslashes($input['c2_slide_image_alt_tag_'.$slide_row_number])) : $udesign_options['c2_slide_image_alt_tag_'.$slide_row_number];
		    $input['c2_slide_default_info_txt_'.$slide_row_number] = ($input['c2_slide_default_info_txt_'.$slide_row_number]) ? stripslashes($input['c2_slide_default_info_txt_'.$slide_row_number]) : $udesign_options['c2_slide_default_info_txt_'.$slide_row_number];
		    $input['c2_slide_button_txt_'.$slide_row_number] = ($input['c2_slide_button_txt_'.$slide_row_number]) ? stripslashes($input['c2_slide_button_txt_'.$slide_row_number]) : $udesign_options['c2_slide_button_txt_'.$slide_row_number];
		    $input['c2_slide_button_style_'.$slide_row_number] = (  $input['c2_slide_button_style_'.$slide_row_number] ) ? $input['c2_slide_button_style_'.$slide_row_number] : $udesign_options['c2_slide_button_style_'.$slide_row_number];
		}
		$input['c2_speed'] = is_numeric( $input['c2_speed'] ) ? absint($input['c2_speed']) : $udesign_options['c2_speed'];
		$input['c2_timeout'] = is_numeric( $input['c2_timeout'] ) ? absint($input['c2_timeout']) : $udesign_options['c2_timeout'];
		$input['c2_text_color'] = ( ctype_alnum($input['c2_text_color']) ) ? strtoupper(stripslashes($input['c2_text_color'])) : $udesign_options['c2_text_color'];
		$input['c2_slider_text_size'] = (  $input['c2_slider_text_size'] ) ? $input['c2_slider_text_size'] : $udesign_options['c2_slider_text_size'];
		$input['c2_slider_text_line_height'] = (  $input['c2_slider_text_line_height'] ) ? $input['c2_slider_text_line_height'] : $udesign_options['c2_slider_text_line_height'];
                

		// Cycle 3
		$input['c3_slides_order_str'] = ($input['c3_slides_order_str']) ? $input['c3_slides_order_str'] : $udesign_options['c3_slides_order_str'];
		$c3_slides_array = explode( ',', $input['c3_slides_order_str'] );
		foreach( $c3_slides_array as $slide_row_number ) {
                    if ($input['c3_slide_img_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['c3_slide_img_url_'.$slide_row_number] = '';
		    } elseif ($input['c3_slide_img_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['c3_slide_img_url_'.$slide_row_number] = $udesign_options['c3_slide_img_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it and save it
			$input['c3_slide_img_url_'.$slide_row_number] = esc_url_raw($input['c3_slide_img_url_'.$slide_row_number]);
                    }
                    if ($input['c3_slide_link_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['c3_slide_link_url_'.$slide_row_number] = '';
		    } elseif ($input['c3_slide_link_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['c3_slide_link_url_'.$slide_row_number] = $udesign_options['c3_slide_link_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it and save it
			$input['c3_slide_link_url_'.$slide_row_number] = esc_url_raw($input['c3_slide_link_url_'.$slide_row_number]);
		    }
                    if ($input['c3_slide_img2_url_'.$slide_row_number] == ' ') { // if space then remove url from field
			$input['c3_slide_img2_url_'.$slide_row_number] = '';
		    } elseif ($input['c3_slide_img2_url_'.$slide_row_number] == '') { // if blank then grab the previously saved value for the link
			$input['c3_slide_img2_url_'.$slide_row_number] = $udesign_options['c3_slide_img2_url_'.$slide_row_number];
		    } else { // if some url, clean it, format it and save it
			$input['c3_slide_img2_url_'.$slide_row_number] = esc_url_raw($input['c3_slide_img2_url_'.$slide_row_number]);
                    }
		    $input['c3_slide_link_target_'.$slide_row_number] = (  $input['c3_slide_link_target_'.$slide_row_number] ) ? $input['c3_slide_link_target_'.$slide_row_number] : $udesign_options['c3_slide_link_target_'.$slide_row_number];
		    $input['c3_slide_image_alt_tag_'.$slide_row_number] = ($input['c3_slide_image_alt_tag_'.$slide_row_number]) ? trim(stripslashes($input['c3_slide_image_alt_tag_'.$slide_row_number])) : $udesign_options['c3_slide_image_alt_tag_'.$slide_row_number];
		    $input['c3_slide_default_info_txt_'.$slide_row_number] = ($input['c3_slide_default_info_txt_'.$slide_row_number]) ? stripslashes(trim($input['c3_slide_default_info_txt_'.$slide_row_number])) : $udesign_options['c3_slide_default_info_txt_'.$slide_row_number];
		}
		$input['c3_timeout'] = is_numeric( $input['c3_timeout'] ) ? absint($input['c3_timeout']) : $udesign_options['c3_timeout'];
		$input['c3_text_color'] = ( ctype_alnum($input['c3_text_color']) ) ? strtoupper(stripslashes($input['c3_text_color'])) : $udesign_options['c3_text_color'];
		$input['c3_slider_text_size'] = (  $input['c3_slider_text_size'] ) ? $input['c3_slider_text_size'] : $udesign_options['c3_slider_text_size'];
		$input['c3_slider_text_line_height'] = (  $input['c3_slider_text_line_height'] ) ? $input['c3_slider_text_line_height'] : $udesign_options['c3_slider_text_line_height'];
               

		// No slider
		$input['no_slider_text'] = stripslashes($input['no_slider_text']);
                
		// Revolution slider
		$input['rev_slider_shortcode'] = $input['rev_slider_shortcode'];

		// Portfolio Section
		foreach ( $portfolio_pages_array as $portfolio_page_obj ) {
		    $port_page_ID = $portfolio_page_obj->ID;
		    $input['portfolio_categories'] .= $input['portfolio_cat_for_page_'.$port_page_ID].',';
		    $input['portfolio_items_per_page_for_page_'.$port_page_ID] = ( is_numeric( $input['portfolio_items_per_page_for_page_'.$port_page_ID] ) && $input['portfolio_items_per_page_for_page_'.$port_page_ID] > 0 ) ? absint($input['portfolio_items_per_page_for_page_'.$port_page_ID]) : $udesign_options['portfolio_items_per_page_for_page_'.$port_page_ID];
                    $input['portfolio_do_not_link_adjacent_items_'.$port_page_ID] = $input['portfolio_do_not_link_adjacent_items_'.$port_page_ID];
		}
		$input['portfolio_categories'] = substr_replace( $input['portfolio_categories'],"",-1 );
		$input['portfolio_title_posistion'] = ($input['portfolio_title_posistion']) ? $input['portfolio_title_posistion'] : $udesign_options['portfolio_title_posistion'];
		$input['portfolio_sidebar'] = ($input['portfolio_sidebar']) ? $input['portfolio_sidebar'] : $udesign_options['portfolio_sidebar'];
                $input['show_portfolio_postmetadata'] = $input['show_portfolio_postmetadata'];
		$input['udesign_single_portfolio_postmetadata_location'] = (  $input['udesign_single_portfolio_postmetadata_location'] ) ? $input['udesign_single_portfolio_postmetadata_location'] : $udesign_options['udesign_single_portfolio_postmetadata_location'];
                $input['show_portfolio_postmetadata_author'] = $input['show_portfolio_postmetadata_author'];
                $input['show_portfolio_postmetadata_tags'] = $input['show_portfolio_postmetadata_tags'];
                $input['show_portfolio_comments'] = $input['show_portfolio_comments'];
                $input['remove_single_portfolio_sidebar'] = $input['remove_single_portfolio_sidebar'];

		// Blog Section
		$input['blog_sidebar'] = ($input['blog_sidebar']) ? $input['blog_sidebar'] : $udesign_options['blog_sidebar'];
                $input['show_excerpt'] = $input['show_excerpt'];
		$input['excerpt_length_in_words'] = is_numeric( $input['excerpt_length_in_words'] ) ? absint($input['excerpt_length_in_words']) : $udesign_options['excerpt_length_in_words'];
		$input['blog_button_text'] = trim(stripslashes($input['blog_button_text']));
                $input['show_postmetadata_author'] = $input['show_postmetadata_author'];
                $input['show_postmetadata_tags'] = $input['show_postmetadata_tags'];
                $input['show_archive_for_string'] = $input['show_archive_for_string'];
                $input['show_comments_are_closed_message'] = $input['show_comments_are_closed_message'];
                $input['remove_blog_sidebar'] = $input['remove_blog_sidebar'];
                $input['remove_archive_sidebar'] = $input['remove_archive_sidebar'];
                $input['remove_single_sidebar'] = $input['remove_single_sidebar'];
		$input['udesign_single_view_postmetadata_location'] = (  $input['udesign_single_view_postmetadata_location'] ) ? $input['udesign_single_view_postmetadata_location'] : $udesign_options['udesign_single_view_postmetadata_location'];
                $input['display_post_image_in_single_post'] = $input['display_post_image_in_single_post'];
                $input['enable_custom_featured_image'] = $input['enable_custom_featured_image'];
		$input['featured_image_width'] = is_numeric( $input['featured_image_width'] ) ? absint($input['featured_image_width']) : $udesign_options['featured_image_width'];
		$input['featured_image_height'] = is_numeric( $input['featured_image_height'] ) ? absint($input['featured_image_height']) : $udesign_options['featured_image_height'];
                $input['force_image_dimention'] = $input['force_image_dimention'];
		$input['featured_image_alignment'] = (  $input['featured_image_alignment'] ) ? $input['featured_image_alignment'] : $udesign_options['featured_image_alignment'];

		// Contact Page
		$input['contact_field_name1'] = stripslashes($input['contact_field_name1']);
		$input['contact_field_value1'] = stripslashes($input['contact_field_value1']);
		$input['contact_field_name2'] = stripslashes($input['contact_field_name2']);
		$input['contact_field_value2'] = stripslashes($input['contact_field_value2']);
		$input['contact_field_name3'] = stripslashes($input['contact_field_name3']);
		$input['contact_field_value3'] = stripslashes($input['contact_field_value3']);
		$input['contact_field_name4'] = stripslashes($input['contact_field_name4']);
		$input['contact_field_value4'] = stripslashes($input['contact_field_value4']);
		$input['contact_field_name5'] = stripslashes($input['contact_field_name5']);
		$input['contact_field_value5'] = stripslashes($input['contact_field_value5']);
		$input['contact_field_name6'] = stripslashes($input['contact_field_name6']);
		$input['contact_field_value6'] = stripslashes($input['contact_field_value6']);
		$input['contact_field_name7'] = stripslashes($input['contact_field_name7']);
		$input['contact_field_value7'] = stripslashes($input['contact_field_value7']);
		$input['contact_sidebar'] = ($input['contact_sidebar']) ? $input['contact_sidebar'] : $udesign_options['contact_sidebar'];
                $input['remove_contact_sidebar'] = $input['remove_contact_sidebar'];
                $input['NA_phone_format'] = $input['NA_phone_format'];
		$email_receipients = $this->email_receipients_are_valid($input['email_receipients']); // validate email(s)
		$input['email_receipients'] = ( $email_receipients ) ?  $email_receipients: $udesign_options['email_receipients'];
		$input['recaptcha_publickey'] = trim(stripslashes($input['recaptcha_publickey']));
		$input['recaptcha_privatekey'] = trim(stripslashes($input['recaptcha_privatekey']));
		$input['recaptcha_enabled'] = ($input['recaptcha_publickey'] && $input['recaptcha_privatekey']) ? $input['recaptcha_enabled'] : 'no'; // disable ReCAPTCHA if publickey and privatekey are empty
		$input['recaptcha_theme'] = (  $input['recaptcha_theme'] ) ? $input['recaptcha_theme'] : $udesign_options['recaptcha_theme'];
		$input['recaptcha_lang'] = (  $input['recaptcha_lang'] ) ? $input['recaptcha_lang'] : $udesign_options['recaptcha_lang'];

		// Footer Options
		$input['copyright_message'] = stripslashes($input['copyright_message']);
                $input['show_wp_link_in_footer'] = $input['show_wp_link_in_footer'];
                $input['show_entries_rss_in_footer'] = $input['show_entries_rss_in_footer'];
                $input['show_comments_rss_in_footer'] = $input['show_comments_rss_in_footer'];
		$input['show_udesign_affiliate_link'] = $input['show_udesign_affiliate_link'];
		$input['affiliate_username'] = str_replace (" ", "", $input['affiliate_username']);
                $input['udesign_sticky_footer'] = $input['udesign_sticky_footer'];
                
                // Responsive
                $input['enable_responsive'] = $input['enable_responsive'];
		$input['responsive_logo_img'] = esc_url_raw($input['responsive_logo_img']);
		$input['responsive_logo_height'] = is_numeric( $input['responsive_logo_height'] ) ? absint($input['responsive_logo_height']) : $udesign_options['responsive_logo_height'];
                $input['responsive_remove_slider_area'] = $input['responsive_remove_slider_area'];
                $input['responsive_remove_bg_images_960-720'] = $input['responsive_remove_bg_images_960-720'];
		$input['responsive_menu'] = (  $input['responsive_menu'] ) ? $input['responsive_menu'] : $udesign_options['responsive_menu'];
                $input['responsive_pinch_to_zoom'] = $input['responsive_pinch_to_zoom'];
		$input['responsive_disable_pretty_photo_at_width'] = is_numeric( $input['responsive_disable_pretty_photo_at_width'] ) ? absint($input['responsive_disable_pretty_photo_at_width']) : $udesign_options['responsive_disable_pretty_photo_at_width'];

		// Statistics
		$input['google_analytics'] = stripslashes($input['google_analytics']);
                
                // Advanced Options
                $input['show_udesign_action_hooks'] = $input['show_udesign_action_hooks'];
                
		return $input;
	}

	function on_save_changes() {
		// user permission check
		if ( !current_user_can('manage_options') )
			wp_die( esc_html__("Cheatin' uh?") );
		// cross check the given referer
		check_admin_referer( 'udesign_options_page-options' );
		//lets redirect the post request into get request (you may add additional params at the url, if you need to show save results
		wp_redirect($_POST['_wp_http_referer']);
	}
        
	/**
	 * Validate email receipient(s) email addresses
	 *
	 * @param string $receipients, a string of CSV email addresses
	 * @return bool|mixed False on failure or a string of properly formatted CSV email addresses otherwise
	 */
	function email_receipients_are_valid ( $receipients ) {
	    	$emails_array = explode( ",", $receipients );
		foreach ( $emails_array as $email ) {
		    if ( !is_email( trim($email) ) )
			return false;
		}
		return implode( ', ', array_map( 'trim', $emails_array) ); // trim white spaced from beginning and end of email addresses
	}



	/**************************************************************************************/
	/**** Below you will find the callback method for each of the registered metaboxes ****/
	/**************************************************************************************/

	function help_options_contentbox( $options ) { ?>
		<p style="margin-left:5px;"><?php esc_html_e('U-Design theme help resources:', 'udesign'); ?></p>
		<ul style="list-style-type:none; margin:5px 5px 10px 20px;">
		    <li><?php echo '<div><a href="'.get_bloginfo('template_url').'/scripts/documentation/index.html" title="Open the documentation" target="_blank">'.esc_html__('Documentation', 'udesign').'</a></div>'; ?></li>
		    <li><?php echo '<div><a title="'.esc_html__('Go to the Support Forum', 'udesign').'" href="http://dreamthemedesign.com/u-design-support/" target="_blank">'.esc_html__('Support Forum', 'udesign').'</a>'; ?> (<span class="description"><?php  printf( __('You should be able to register yourself with the Support Forum %1$sHERE%2$s.', 'udesign'), '<a target="_blank" title="Support Forum Registration" href="http://dreamthemedesign.com/u-design-support/entry/register?Target=discussions">', '</a>' ); ?></span>)</div></li>
		    <li><?php echo '<div><a title="'.esc_html__('Go to the Video Tutorials', 'udesign').'" href="http://www.youtube.com/user/internq7" target="_blank">'.esc_html__('Video Tutorials (Author\'s YouTube Tutorials Channel)', 'udesign').'</a></div>'; ?></li>
		    <li><?php echo '<div><a title="'.esc_html__('Go to the U-Design Demo Site', 'udesign').'" href="http://www.universallyacclaimed.com/wp-themes/u-design/" target="_blank">'.esc_html__('U-Design Demo Site', 'udesign').'</a></div>'; ?></li>
		    <li><?php echo '<div><a title="'.esc_html__('Go to the U-Design Shortcodes examples', 'udesign').'" href="http://www.universallyacclaimed.com/wp-themes/u-design/?page_id=59" target="_blank">'.esc_html__('U-Design Shortcodes', 'udesign').'</a></div>'; ?></li>
		    <li><?php echo '<div><a title="'.esc_html__('Go to the "Get the Code" page', 'udesign').'" href="http://www.universallyacclaimed.com/wp-themes/u-design/?page_id=1417" target="_blank">'.esc_html__('Get the Code: All of the Home page examples source code is available here.', 'udesign').'</a></div>'; ?></li>
		</ul>
<?php	}

	function general_options_contentbox( $options ) { ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Custom Logo', 'udesign'); ?></th>
			    <td>
                                <div style="margin-bottom:5px;  padding:0; float:left;">
                                    <label for="custom_logo_img"><?php esc_html_e('Enter a URL or upload an image for your logo:', 'udesign'); ?></label><br />
                                    <input name="udesign_options[custom_logo_img]" type="text" id="custom_logo_img" value="<?php if( $options['custom_logo_img'] ){ echo esc_url($options['custom_logo_img']); } ?>" size="65" />
                                    <input id="upload_logo_button" type="button" value="<?php esc_attr_e('Upload Logo', 'udesign'); ?>" class="button-secondary" />
                                </div>
                                <div class="clear"></div>
				<span class="description"><?php esc_html_e('To upload an image click on "Upload Logo" button. Once you upload or choose your image click the "Choose Image" button to inserted it into the text field above.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Top Area Height', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[top_area_height]" type="text" id="top_area_height" value="<?php echo esc_attr($options['top_area_height']); ?>" size="5" maxlength="4" />
				px <span class="description"><?php esc_html_e('(Height) in pixels.', 'udesign'); ?><br />
				<?php esc_html_e('Note: the minimum recommended height is 55px.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Logo Dimensions', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[logo_width]" type="text" id="logo_width" value="<?php echo esc_attr($options['logo_width']); ?>" size="5" maxlength="4" />
				<span> X </span>
				<input name="udesign_options[logo_height]" type="text" id="logo_height" value="<?php echo esc_attr($options['logo_height']); ?>" size="5" maxlength="4" />
				px <span class="description"><?php esc_html_e('(Width X Height) in pixels.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><label for="slogan_distance_from_the_top"><?php esc_html_e('Slogan Position from the Top', 'udesign'); ?></label></th>
			    <td>
				<input name="udesign_options[slogan_distance_from_the_top]" type="text" id="slogan_distance_from_the_top" value="<?php echo esc_attr($options['slogan_distance_from_the_top']); ?>" size="5" maxlength="3" />
				<span> px <?php esc_html_e('from the top.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><label for="slogan_distance_from_the_left"><?php esc_html_e('Slogan Position from the Left', 'udesign'); ?></label></th>
			    <td>
				<input name="udesign_options[slogan_distance_from_the_left]" type="text" id="slogan_distance_from_the_left" value="<?php echo esc_attr($options['slogan_distance_from_the_left']); ?>" size="5" maxlength="3" />
				<span> px <?php esc_html_e('from the left. Enter a number between 0 and 400.', 'udesign'); ?></span><br />
				<span class="description"><?php  printf( __('Please note that the actual Slogan text can be changed or deleted at %1$sSettings %2$s General%3$s <strong>Tagline</strong> option.', 'udesign'), '<a title="'.esc_html__('Go to the "General Settings" page', 'udesign').'" href="options-general.php">', '&rarr;', '</a>' ); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Slogan Font Size', 'udesign'); ?></th>
			    <td>
				<label for="slogan_font_size">
					<?php esc_html_e('Font Size: ', 'udesign'); ?>
					<select name="udesign_options[slogan_font_size]" id="slogan_font_size">
					    <option value="8"<?php echo ($options['slogan_font_size'] == '8') ? ' selected="selected"' : ''; ?>>8px</option>
					    <option value="9"<?php echo ($options['slogan_font_size'] == '9') ? ' selected="selected"' : ''; ?>>9px</option>
					    <option value="10"<?php echo ($options['slogan_font_size'] == '10') ? ' selected="selected"' : ''; ?>>10px</option>
					    <option value="11"<?php echo ($options['slogan_font_size'] == '11') ? ' selected="selected"' : ''; ?>>11px</option>
					    <option value="12"<?php echo ($options['slogan_font_size'] == '12') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">12px (Default)</option>
					    <option value="13"<?php echo ($options['slogan_font_size'] == '13') ? ' selected="selected"' : ''; ?>>13px</option>
					    <option value="14"<?php echo ($options['slogan_font_size'] == '14') ? ' selected="selected"' : ''; ?>>14px</option>
					    <option value="15"<?php echo ($options['slogan_font_size'] == '15') ? ' selected="selected"' : ''; ?>>15px</option>
					    <option value="16"<?php echo ($options['slogan_font_size'] == '16') ? ' selected="selected"' : ''; ?>>16px</option>
					    <option value="17"<?php echo ($options['slogan_font_size'] == '17') ? ' selected="selected"' : ''; ?>>17px</option>
					    <option value="18"<?php echo ($options['slogan_font_size'] == '18') ? ' selected="selected"' : ''; ?>>18px</option>
					    <option value="19"<?php echo ($options['slogan_font_size'] == '19') ? ' selected="selected"' : ''; ?>>19px</option>
					    <option value="20"<?php echo ($options['slogan_font_size'] == '20') ? ' selected="selected"' : ''; ?>>20px</option>
					    <option value="21"<?php echo ($options['slogan_font_size'] == '21') ? ' selected="selected"' : ''; ?>>21px</option>
					    <option value="22"<?php echo ($options['slogan_font_size'] == '22') ? ' selected="selected"' : ''; ?>>22px</option>
					    <option value="23"<?php echo ($options['slogan_font_size'] == '23') ? ' selected="selected"' : ''; ?>>23px</option>
					    <option value="24"<?php echo ($options['slogan_font_size'] == '24') ? ' selected="selected"' : ''; ?>>24px</option>
					    <option value="25"<?php echo ($options['slogan_font_size'] == '25') ? ' selected="selected"' : ''; ?>>25px</option>
					    <option value="26"<?php echo ($options['slogan_font_size'] == '26') ? ' selected="selected"' : ''; ?>>26px</option>
					    <option value="27"<?php echo ($options['slogan_font_size'] == '27') ? ' selected="selected"' : ''; ?>>27px</option>
					    <option value="28"<?php echo ($options['slogan_font_size'] == '28') ? ' selected="selected"' : ''; ?>>28px</option>
					    <option value="32"<?php echo ($options['slogan_font_size'] == '32') ? ' selected="selected"' : ''; ?>>32px</option>
					    <option value="36"<?php echo ($options['slogan_font_size'] == '36') ? ' selected="selected"' : ''; ?>>36px</option>
					</select>
				</label>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary udesign-right-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'udesign') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Phone Number Information', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[top_page_phone_number]" type="text" id="top_page_phone_number" value="<?php if ($options['top_page_phone_number']) { echo esc_attr($options['top_page_phone_number'], 'udesign'); } ?>" size="30" maxlength="500" />
				<?php esc_html_e('Use this field to provide a phone number or any other short piece of information (30 character limit for display).  It is displayed near the search box located at the top right corner of the theme.', 'udesign'); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Search Box', 'udesign'); ?></th>
			    <td>
				<label for="enable_search">
				    <input name="udesign_options[enable_search]" type="checkbox" id="enable_search" value="yes" <?php checked('yes', $options['enable_search']); ?> />
				    <?php esc_html_e('Enable the Search box displayed in the top area of the page.', 'udesign'); ?>
				</label>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Page Peel', 'udesign'); ?></th>
			    <td>
				<label for="enable_page_peel">
				    <input name="udesign_options[enable_page_peel]" type="checkbox" id="enable_page_peel" value="yes" <?php checked('yes', $options['enable_page_peel']); ?> />
				    <?php esc_html_e('Enable Page Peel (Display the page curl/peel located in the top right corner of the site).  Could be used for your FeedBurner subscription or advertising.', 'udesign'); ?>
				</label><br />
				<label for="page_peel_url"><?php esc_html_e('Page Peel Link URL:', 'udesign'); ?></label>
				<input name="udesign_options[page_peel_url]" type="text" id="page_peel_url" value="<?php if ($options['page_peel_url']) { echo esc_attr($options['page_peel_url'], 'udesign'); } ?>" size="50" maxlength="100" />
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Feedback Button', 'udesign'); ?></th>
			    <td>
				<label for="enable_feedback">
				    <input name="udesign_options[enable_feedback]" type="checkbox" id="enable_feedback" value="yes" <?php checked('yes', $options['enable_feedback']); ?> />
				    <?php esc_html_e('Enable Feedback button (Display the Feedback button located in the most left side of the site)', 'udesign'); ?>
				</label><br />
				<label for="feedback_url"><?php esc_html_e('Feedback Button URL:', 'udesign'); ?></label>
				<input name="udesign_options[feedback_url]" type="text" id="feedback_url" value="<?php if ($options['feedback_url']) { echo esc_attr($options['feedback_url'], 'udesign'); } ?>" size="50" maxlength="100" />
                                <br />
				<label for="feedback_position_fixed">
				    <input name="udesign_options[feedback_position_fixed]" type="checkbox" id="feedback_position_fixed" value="yes" <?php checked('yes', $options['feedback_position_fixed']); ?> />
				    <?php esc_html_e('Fix the position of the "Feedback" button to prevent it from scrolling with the page.', 'udesign'); ?>
				</label>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable prettyPhoto script', 'udesign'); ?></th>
			    <td>
				<label for="enable_prettyPhoto_script">
				    <input name="udesign_options[enable_prettyPhoto_script]" type="checkbox" id="enable_prettyPhoto_script" value="yes" <?php checked('yes', $options['enable_prettyPhoto_script']); ?> />
				<?php printf( __('Enable %1$sprettyPhoto%2$s script. In case of conflicts with some other lightbox plugins you may wish to disable the %1$sprettyPhoto%2$s script.', 'udesign'), '<a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/" target="_blank" title="Go to prettyPhoto website">', '</a>'); ?>
				</label>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Stay-On-Top" Main Menu', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" the Main Menu', 'udesign'); ?></span></legend>
				<label for="fixed_main_menu">
				    <input name="udesign_options[fixed_main_menu]" type="checkbox" id="fixed_main_menu" value="yes" <?php checked('yes', $options['fixed_main_menu']); ?> />
                                    <?php esc_html_e("Fix the main navigation bar to stay on top of the page once header has been scrolled past.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Stay-On-Top" Menu Shadow', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" Menu Shadow', 'udesign'); ?></span></legend>
				<label for="add_fixed_menu_shadow">
				    <input name="udesign_options[add_fixed_menu_shadow]" type="checkbox" id="add_fixed_menu_shadow" value="yes" <?php checked('yes', $options['add_fixed_menu_shadow']); ?> />
                                    <?php esc_html_e("Add shadow to the Stay-On-Top menu.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Stay-On-Top" Remove Background Image', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" Remove Background Image', 'udesign'); ?></span></legend>
				<label for="remove_fixed_menu_background_image">
				    <input name="udesign_options[remove_fixed_menu_background_image]" type="checkbox" id="remove_fixed_menu_background_image" value="yes" <?php checked('yes', $options['remove_fixed_menu_background_image']); ?> />
                                    <?php esc_html_e("Remove the background image behind the Stay-On-Top menu, in which case the background color assigned to the Top Area will be used instead.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Disable "Stay-On-Top" Menu on Mobile Devices', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable "Stay-On-Top" Menu on Mobile Devices', 'udesign'); ?></span></legend>
				<label for="remove_fixed_menu_on_mobile_devices">
				    <input name="udesign_options[remove_fixed_menu_on_mobile_devices]" type="checkbox" id="remove_fixed_menu_on_mobile_devices" value="yes" <?php checked('yes', $options['remove_fixed_menu_on_mobile_devices']); ?> />
                                    <?php esc_html_e("This option will disable the Stay-On-Top menu on mobile devices only.", 'udesign'); ?>
                                    <span class="description">(<?php esc_html_e("It only applies for non-responsive layout.", 'udesign'); ?>)</span>
				</label>
				</fieldset>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary udesign-right-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'udesign') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Main Menu Alignment', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose alignment:', 'udesign'); ?>
                                <select name="udesign_options[main_menu_alignment]" id="main_menu_alignment">
                                    <option value="right"<?php echo ($options['main_menu_alignment'] == 'right') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('right', 'udesign'); ?></option>
                                    <option value="left"<?php echo ($options['main_menu_alignment'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                    <option value="center"<?php echo ($options['main_menu_alignment'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                </select>
				<span class="description"><?php esc_html_e('This option sets the main navigation menu alignment.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Top Menu Auto Arrows', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Top Menu Auto Arrows', 'udesign'); ?></span></legend>
				<label for="show_menu_auto_arrows">
				    <input name="udesign_options[show_menu_auto_arrows]" type="checkbox" id="show_menu_auto_arrows" value="yes" <?php checked('yes', $options['show_menu_auto_arrows']); ?> />
				    <?php esc_html_e("Show the top navigation menu's auto arrows. Those are the arrows indicating a submenu. ", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Top Menu Drop Shadows', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Top Menu Drop Shadows', 'udesign'); ?></span></legend>
				<label for="show_menu_drop_shadows">
				    <input name="udesign_options[show_menu_drop_shadows]" type="checkbox" id="show_menu_drop_shadows" value="yes" <?php checked('yes', $options['show_menu_drop_shadows']); ?> />
				    <?php esc_html_e("Enable drop shadows to the sub-menus. ", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Border Under the Menu', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Border Under the Menu', 'udesign'); ?></span></legend>
				<label for="remove_border_under_menu">
				    <input name="udesign_options[remove_border_under_menu]" type="checkbox" id="remove_border_under_menu" value="yes" <?php checked('yes', $options['remove_border_under_menu']); ?> />
				    <?php esc_html_e("Remove the border line located under the menu. ", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Breadcrumbs', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Breadcrumbs', 'udesign'); ?></span></legend>
				<label for="show_breadcrumbs">
				    <input name="udesign_options[show_breadcrumbs]" type="checkbox" id="show_breadcrumbs" value="yes" <?php checked('yes', $options['show_breadcrumbs']); ?> />
				    <?php esc_html_e('Show Breadcrumbs', 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Post Thumbnail', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Default Thumb', 'udesign'); ?></span></legend>
				<label for="default_thumb_on">
				    <input name="udesign_options[default_thumb_on]" type="checkbox" id="default_thumb_on" value="yes" <?php checked('yes', $options['default_thumb_on']); ?> />
				    <?php esc_html_e('Enable default thumbnail for posts (This options is used with the "U-Design: Recent Posts" widget).', 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
                        </tr>
		    </tbody>
		  </table>
                  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php printf( __('Disable Theme Update Notifier', 'udesign'), '<code>', '</code>'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable Theme Update Notifier', 'udesign'); ?></span></legend>
				<label for="disable_the_theme_update_notifier">
				    <input name="udesign_options[disable_the_theme_update_notifier]" type="checkbox" id="disable_the_theme_update_notifier" value="yes" <?php checked('yes', $options['disable_the_theme_update_notifier']); ?> />
                                    <?php esc_html_e("Disable the theme's notification of new updates.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable Schema.org Tags', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Schema.org Tags', 'udesign'); ?></span></legend>
				<label for="enable_udesign_schema_tags">
				    <input name="udesign_options[enable_udesign_schema_tags]" type="checkbox" id="enable_udesign_schema_tags" value="yes" <?php checked('yes', $options['enable_udesign_schema_tags']); ?> />
                                    <?php esc_html_e("This option will enable schema.org tags within the theme where applicable.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Disable Image Cropping', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable Image Cropping', 'udesign'); ?></span></legend>
				<label for="udesign_disable_img_cropping">
				    <input name="udesign_options[udesign_disable_img_cropping]" type="checkbox" id="udesign_disable_img_cropping" value="yes" <?php checked('yes', $options['udesign_disable_img_cropping']); ?> />
                                    <?php esc_html_e("Disable image cropping when generating thumbnail images in sections like Blog, Portfolio, 'U-Design: Recent Posts' widget, etc.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable Retina for Cropped Images', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Retina for Cropped Images', 'udesign'); ?></span></legend>
				<label for="udesign_enable_retina_images">
				    <input name="udesign_options[udesign_enable_retina_images]" type="checkbox" id="udesign_enable_retina_images" value="yes" <?php checked('yes', $options['udesign_enable_retina_images']); ?> />
                                    <?php esc_html_e("Enable automatic retina images for the ones being cropped. If enabled, a double pixel ratio will be used for the cropped images. In order for this option to be applied the above 'Disable Image Cropping' option should not be checked. This option can be overwritten for individual portfolio thumbnails by the use of custom fields (see documentation for more information).", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php printf( __('Enable %1$sstyle.css%2$s', 'udesign'), '<code>', '</code>'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable "style.css"', 'udesign'); ?></span></legend>
				<label for="enable_default_style_css">
				    <input name="udesign_options[enable_default_style_css]" type="checkbox" id="enable_default_style_css" value="yes" <?php checked('yes', $options['enable_default_style_css']); ?> />
                                    <?php printf( __('Enable the %1$sstyle.css%2$s located in the theme\'s root folder. You can then edit that file from %3$sAppearance %4$s Edit%5$s to add any custom CSS. You would also need to enable this option if you want to use a %6$schild theme%7$s.', 'udesign'), '<code>', '</code>', '<a href="theme-editor.php">', '&rarr;', '</a>', '<a target="_blank" title="More Info on WordPress Child Themes..." href="http://codex.wordpress.org/Child_Themes">', '</a>'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function layout_options_contentbox( $options ) { ?>
                
                <div style="background-color:#FCFCFC; border:1px solid #DDDDDD; margin:6px 0 0;  padding:15px 15px 5px;">
		  <table class="form-table">
		    <tbody>
                        <tr valign="top">
                            <th scope="row" style="padding-right:0"><?php esc_html_e('Page Title', 'udesign'); ?></th>
                            <td>
                                <label for="page_title_position" class="link-target" style="float:left; display:inline-block;">
                                        <select name="udesign_options[page_title_position]" id="page_title_position">
                                            <option value="position1"<?php echo ($options['page_title_position'] == 'position1') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Title Position 1', 'udesign'); ?></option>
                                            <option value="position2"<?php echo ($options['page_title_position'] == 'position2') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Title Position 2', 'udesign'); ?></option>
                                            <option value="remove1"<?php echo ($options['page_title_position'] == 'remove1') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Remove Title (SEO-Friendly)', 'udesign'); ?></option>
                                            <option value="remove2"<?php echo ($options['page_title_position'] == 'remove2') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Remove Title Completely', 'udesign'); ?></option>
                                        </select>
                                </label>
                                <div class="submit" style="padding-left:20px; float:left; display:inline-block;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Update', 'udesign'); ?>" />
                                    <span class="spinner spinner-float-left"></span>
				</div>
                                <ul style="float:left; margin-bottom:0;">
                                    <li><strong><?php esc_html_e('Title Position 1', 'udesign'); ?></strong> - <?php esc_html_e('Display Title immediately under the Main Menu, it spans the full width of page.', 'udesign'); ?></li>
                                    <li><strong><?php esc_html_e('Title Position 2', 'udesign'); ?></strong> - <?php esc_html_e('Display Title inside Main Content, it spans the main content width.', 'udesign'); ?></li>
                                    <li><strong><?php esc_html_e('Remove Title (SEO-Friendly)', 'udesign'); ?></strong> - <?php esc_html_e('Remove Title visually, so that human visitors will not see it, yet it will still be served as an "h1" heading to search engine spiders.', 'udesign'); ?></li>
                                    <li><strong><?php esc_html_e('Remove Title Completely', 'udesign'); ?></strong> - <?php esc_html_e(' ... just as it says! A word of caution, when using this option keep in mind that your pages will be left without an "h1" heading. It is your responsibility to look after that.', 'udesign'); ?></li>
                                </ul>
                            </td>
                        </tr>
		    </tbody>
                  </table>
                </div>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Home Page Column 1', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Home Page Column 1', 'udesign'); ?></span></legend>
				    <label for="home_page_col_1_fixed">
					<input name="udesign_options[home_page_col_1_fixed]" type="checkbox" id="home_page_col_1_fixed" value="yes" <?php checked('yes', $options['home_page_col_1_fixed']); ?> />
					<?php esc_html_e('Set the width of the "Home Page Column 1" Widget Area as constant 1/3 width (Applies only to a two column layout, in other words having the first widget area "Home Page Column 1" in combination with any of the other widget areas being active).', 'udesign'); ?><br />
				    </label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Remove Sidebar from Default Pages', 'udesign'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove Sidebar from Default Pages', 'udesign'); ?></span></legend>
                                <label for="remove_default_page_sidebar">
                                    <input name="udesign_options[remove_default_page_sidebar]" type="checkbox" id="remove_default_page_sidebar" value="yes" <?php checked('yes', $options['remove_default_page_sidebar']); ?> />
                                    <?php esc_html_e('Remove the sidebar from the default page template. This will make all pages that have been assigned "Default Template" full width.', 'udesign'); ?><br />
                                </label>
                                </fieldset>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar]" id="pages_sidebar_left" value="left" <?php checked('left', $options['pages_sidebar']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar]" id="pages_sidebar_right" value="right" <?php checked('right', $options['pages_sidebar']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Default Template".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 2 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_2]" id="pages_sidebar_2_left" value="left" <?php checked('left', $options['pages_sidebar_2']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_2]" id="pages_sidebar_2_right" value="right" <?php checked('right', $options['pages_sidebar_2']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 2".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 3 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_3]" id="pages_sidebar_3_left" value="left" <?php checked('left', $options['pages_sidebar_3']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_3]" id="pages_sidebar_3_right" value="right" <?php checked('right', $options['pages_sidebar_3']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 3".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 4 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_4]" id="pages_sidebar_4_left" value="left" <?php checked('left', $options['pages_sidebar_4']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_4]" id="pages_sidebar_4_right" value="right" <?php checked('right', $options['pages_sidebar_4']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 4".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 5 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_5]" id="pages_sidebar_5_left" value="left" <?php checked('left', $options['pages_sidebar_5']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_5]" id="pages_sidebar_5_right" value="right" <?php checked('right', $options['pages_sidebar_5']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 5".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 6 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_6]" id="pages_sidebar_6_left" value="left" <?php checked('left', $options['pages_sidebar_6']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_6]" id="pages_sidebar_6_right" value="right" <?php checked('right', $options['pages_sidebar_6']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 6".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 7 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_7]" id="pages_sidebar_7_left" value="left" <?php checked('left', $options['pages_sidebar_7']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_7]" id="pages_sidebar_7_right" value="right" <?php checked('right', $options['pages_sidebar_7']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 7".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 8 Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_8]" id="pages_sidebar_8_left" value="left" <?php checked('left', $options['pages_sidebar_8']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_8]" id="pages_sidebar_8_right" value="right" <?php checked('right', $options['pages_sidebar_8']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 8".', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Sitemap Page Sidebar Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[sitemap_sidebar]" id="sitemap_sidebar_left" value="left" <?php checked('left', $options['sitemap_sidebar']); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[sitemap_sidebar]" id="sitemap_sidebar_right" value="right" <?php checked('right', $options['sitemap_sidebar']); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Sitemap page" template.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Comments on Pages', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Comments on Pages', 'udesign'); ?></span></legend>
				<label for="show_comments_on_pages">
				    <input name="udesign_options[show_comments_on_pages]" type="checkbox" id="show_comments_on_pages" value="yes" <?php checked('yes', $options['show_comments_on_pages']); ?> />
				    <?php esc_html_e("Show Comments on Pages. Those are the pages assigned with the 'Default Page', 'Page Template 2', ..., 'Page Template 8' and 'Full-width Page' templates. Additionally, you can 'Allow' these comments from the individual page's configuration.", 'udesign'); ?>
				</label>
				</fieldset>
                                
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary udesign-right-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'udesign') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
		    </tbody>
		</table>
                
                <div style="margin:10px 0; padding:15px 15px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
                  <h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Greater than 960px Theme Width Fluid Layout', 'udesign'); ?></h2>
                  <p><span class="description"><?php esc_html_e("In Fluid Layout the widths of elements such as the main content block, sidebar, columns, etc. are converted to percentages rather than fixed width in pixels. This allows resizing of those elements to be relative to the browser window width. This section allows you to set the overall theme and sidebar width. The theme width can only be greater than the default 960px and will only exhibit fluid behaviour in widths greater than the default 960px width. If the site is viewed in a device or browser with width less than 960px then the theme will behave as a standard fixed width theme with 960px width frame, unless of course Responsive layout is enabled.", 'udesign'); ?></span></p>
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable Maximum Width', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Maximum Width', 'udesign'); ?></span></legend>
				<label for="max_theme_width">
				    <input name="udesign_options[max_theme_width]" type="checkbox" id="max_theme_width" value="yes" <?php checked('yes', $options['max_theme_width']); ?> />
				    <?php esc_html_e("Set the theme width to the maximum possible browser or device width.", 'udesign'); ?>
                                    <span class="description"><?php esc_html_e('(Fluid Layout)', 'udesign'); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top" id="global_theme_width_slide_bar_wrapper">
			    <th scope="row" style="padding-right:0"><?php esc_html_e('Global Theme Width', 'udesign'); ?></th>
			    <td>
                                <div id="global_theme_width_slide_bar"></div>
				<input name="udesign_options[global_theme_width]" type="text" id="global_theme_width" value="<?php echo ( $options['global_theme_width'] ) ? esc_attr($options['global_theme_width']) : '960'; ?>" size="5" maxlength="4" />px. 
                                <span class="description"><?php esc_html_e('(Width) in pixels.', 'udesign'); ?></span>
                                <?php esc_html_e('This option is about the overall theme width and it will be applied to all pages. You may specify a range between 960px and 1600px.', 'udesign'); ?>
                                <span class="description"><?php esc_html_e('(default: 960)', 'udesign'); ?></span>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row" style="padding-right:0"><?php esc_html_e('Global Sidebar Width', 'udesign'); ?></th>
			    <td>
                                <div id="global_sidebar_width_slide_bar"></div>
				<input name="udesign_options[global_sidebar_width]" type="text" id="global_sidebar_width" value="<?php echo ( $options['global_sidebar_width'] ) ? esc_attr($options['global_sidebar_width']) : '33'; ?>" size="5" maxlength="6" />%. 
                                <span class="description"><?php esc_html_e('(Width) in percentage.', 'udesign'); ?></span>
                                <?php esc_html_e('This option is about the overall sidebar width and it will be applied to all pages. You may specify a range between 20% and 50%.', 'udesign'); ?>
                                <span class="description"><?php esc_html_e('(default: 33)', 'udesign'); ?></span>

                            </td>
                        </tr>
		    </tbody>
                  </table>
                </div>
<?php		display_save_changes_button(); ?>
<?php	}

	function font_settings_contentbox( $options ) {
		global $google_webfonts, $cufon_fonts; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Google Fonts', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Google Fonts', 'udesign'); ?></span></legend>
				<label for="enable_google_web_fonts">
				    <input name="udesign_options[enable_google_web_fonts]" type="checkbox" id="enable_google_web_fonts" value="yes" <?php checked('yes', $options['enable_google_web_fonts']); ?> />
				    <?php esc_html_e('Enable Google Fonts', 'udesign'); ?>
				</label>
				<br />
				<?php esc_html_e('Enable this option and hit "Update" to add the Google Fonts to the available fonts listed below.', 'udesign'); ?>
				<?php esc_html_e('Preview the available fonts at', 'udesign'); ?> <a title="<?php esc_html_e('Go to the "Google Fonts" site', 'udesign'); ?>" href="http://www.google.com/fonts/" target="_blank"> Google Font Directory</a>.
				<br />
				<div class="submit" style="padding:10px 0 0 80px; float:left; clear:both;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Update', 'udesign'); ?>" />
                                    <span class="spinner spinner-float-left"></span>
				</div>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('General Font Settings', 'udesign'); ?></th>
			    <td>
				<label for="font_family" style="float:left; width:220px;">
					<?php esc_html_e('Font Family: ', 'udesign'); ?><br />
					<select name="udesign_options[font_family]" id="font_family" style="width:200px;">
					    <option value="Arial"<?php echo ($options['font_family'] == 'Arial') ? ' selected="selected"' : ''; ?>>Arial</option>
					    <option value="Comic Sans MS"<?php echo ($options['font_family'] == 'Comic Sans MS') ? ' selected="selected"' : ''; ?>>Comic Sans MS</option>
					    <option value="FreeSans"<?php echo ($options['font_family'] == 'FreeSans') ? ' selected="selected"' : ''; ?>>FreeSans</option>
					    <option value="Georgia"<?php echo ($options['font_family'] == 'Georgia') ? ' selected="selected"' : ''; ?>>Georgia</option>
					    <option value="Lucida Sans Unicode"<?php echo ($options['font_family'] == 'Lucida Sans Unicode') ? ' selected="selected"' : ''; ?>>Lucida Sans Unicode</option>
					    <option value="Palatino Linotype"<?php echo ($options['font_family'] == 'Palatino Linotype') ? ' selected="selected"' : ''; ?>>Palatino Linotype</option>
					    <option value="Symbol"<?php echo ($options['font_family'] == 'Symbol') ? ' selected="selected"' : ''; ?>>Symbol</option>
					    <option value="Tahoma"<?php echo ($options['font_family'] == 'Tahoma') ? ' selected="selected"' : ''; ?>>Tahoma</option>
					    <option value="Times New Roman"<?php echo ($options['font_family'] == 'Times New Roman') ? ' selected="selected"' : ''; ?>>Times New Roman</option>
					    <option value="Trebuchet MS"<?php echo ($options['font_family'] == 'Trebuchet MS') ? ' selected="selected"' : ''; ?>>Trebuchet MS</option>
					    <option value="Verdana"<?php echo ($options['font_family'] == 'Verdana') ? ' selected="selected"' : ''; ?>>Verdana</option>
<?php					    if( $options['enable_google_web_fonts'] == 'yes' ) {
						echo '<optgroup label="Google Web Fonts:">';
						foreach ($google_webfonts as $web_font_name) {
						    $make_current_font_selected = ($options['font_family'] == $web_font_name) ? ' selected="selected"' : '';
						    echo '<option value="'.$web_font_name.'"'.$make_current_font_selected.'>'.preg_replace('/:.*/','', $web_font_name).'</option>';
						}
						echo '</optgroup>';
					    } ?>
					</select>
				</label>
				<label for="font_size" style="float:left; width:100px;">
					<?php esc_html_e('Font Size: ', 'udesign'); ?><br />
					<select name="udesign_options[font_size]" id="font_size" style="padding-right:5px;">
					    <option value="8"<?php echo ($options['font_size'] == '8') ? ' selected="selected"' : ''; ?>>8px</option>
					    <option value="9"<?php echo ($options['font_size'] == '9') ? ' selected="selected"' : ''; ?>>9px</option>
					    <option value="10"<?php echo ($options['font_size'] == '10') ? ' selected="selected"' : ''; ?>>10px</option>
					    <option value="11"<?php echo ($options['font_size'] == '11') ? ' selected="selected"' : ''; ?>>11px</option>
					    <option value="12"<?php echo ($options['font_size'] == '12') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">12px (Default)</option>
					    <option value="13"<?php echo ($options['font_size'] == '13') ? ' selected="selected"' : ''; ?>>13px</option>
					    <option value="14"<?php echo ($options['font_size'] == '14') ? ' selected="selected"' : ''; ?>>14px</option>
					    <option value="15"<?php echo ($options['font_size'] == '15') ? ' selected="selected"' : ''; ?>>15px</option>
					    <option value="16"<?php echo ($options['font_size'] == '16') ? ' selected="selected"' : ''; ?>>16px</option>
					    <option value="17"<?php echo ($options['font_size'] == '17') ? ' selected="selected"' : ''; ?>>17px</option>
					    <option value="18"<?php echo ($options['font_size'] == '18') ? ' selected="selected"' : ''; ?>>18px</option>
					    <option value="19"<?php echo ($options['font_size'] == '19') ? ' selected="selected"' : ''; ?>>19px</option>
					    <option value="20"<?php echo ($options['font_size'] == '20') ? ' selected="selected"' : ''; ?>>20px</option>
					    <option value="21"<?php echo ($options['font_size'] == '21') ? ' selected="selected"' : ''; ?>>21px</option>
					    <option value="22"<?php echo ($options['font_size'] == '22') ? ' selected="selected"' : ''; ?>>22px</option>
					    <option value="23"<?php echo ($options['font_size'] == '23') ? ' selected="selected"' : ''; ?>>23px</option>
					    <option value="24"<?php echo ($options['font_size'] == '24') ? ' selected="selected"' : ''; ?>>24px</option>
					    <option value="25"<?php echo ($options['font_size'] == '25') ? ' selected="selected"' : ''; ?>>25px</option>
					    <option value="26"<?php echo ($options['font_size'] == '26') ? ' selected="selected"' : ''; ?>>26px</option>
					    <option value="27"<?php echo ($options['font_size'] == '27') ? ' selected="selected"' : ''; ?>>27px</option>
					    <option value="28"<?php echo ($options['font_size'] == '28') ? ' selected="selected"' : ''; ?>>28px</option>
					    <option value="32"<?php echo ($options['font_size'] == '32') ? ' selected="selected"' : ''; ?>>32px</option>
					    <option value="36"<?php echo ($options['font_size'] == '36') ? ' selected="selected"' : ''; ?>>36px</option>
					</select>
				</label>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Top Navigation Menu Font Settings', 'udesign'); ?></th>
			    <td>
				<label for="top_nav_font_family" style="float:left; width:220px;">
					<?php esc_html_e('Font Family: ', 'udesign'); ?><br />
					<select name="udesign_options[top_nav_font_family]" id="top_nav_font_family" style="width:200px;">
					    <option value="Arial"<?php echo ($options['top_nav_font_family'] == 'Arial') ? ' selected="selected"' : ''; ?>>Arial</option>
					    <option value="Comic Sans MS"<?php echo ($options['top_nav_font_family'] == 'Comic Sans MS') ? ' selected="selected"' : ''; ?>>Comic Sans MS</option>
					    <option value="FreeSans"<?php echo ($options['top_nav_font_family'] == 'FreeSans') ? ' selected="selected"' : ''; ?>>FreeSans</option>
					    <option value="Georgia"<?php echo ($options['top_nav_font_family'] == 'Georgia') ? ' selected="selected"' : ''; ?>>Georgia</option>
					    <option value="Lucida Sans Unicode"<?php echo ($options['top_nav_font_family'] == 'Lucida Sans Unicode') ? ' selected="selected"' : ''; ?>>Lucida Sans Unicode</option>
					    <option value="Palatino Linotype"<?php echo ($options['top_nav_font_family'] == 'Palatino Linotype') ? ' selected="selected"' : ''; ?>>Palatino Linotype</option>
					    <option value="Symbol"<?php echo ($options['top_nav_font_family'] == 'Symbol') ? ' selected="selected"' : ''; ?>>Symbol</option>
					    <option value="Tahoma"<?php echo ($options['top_nav_font_family'] == 'Tahoma') ? ' selected="selected"' : ''; ?>>Tahoma</option>
					    <option value="Times New Roman"<?php echo ($options['top_nav_font_family'] == 'Times New Roman') ? ' selected="selected"' : ''; ?>>Times New Roman</option>
					    <option value="Trebuchet MS"<?php echo ($options['top_nav_font_family'] == 'Trebuchet MS') ? ' selected="selected"' : ''; ?>>Trebuchet MS</option>
					    <option value="Verdana"<?php echo ($options['top_nav_font_family'] == 'Verdana') ? ' selected="selected"' : ''; ?>>Verdana</option>
<?php					    if( $options['enable_google_web_fonts'] == 'yes' ) {
						echo '<optgroup label="Google Web Fonts:">';
						foreach ($google_webfonts as $web_font_name) {
						    $make_current_font_selected = ($options['top_nav_font_family'] == $web_font_name) ? ' selected="selected"' : '';
						    echo '<option value="'.$web_font_name.'"'.$make_current_font_selected.'>'.preg_replace('/:.*/','', $web_font_name).'</option>';
						}
						echo '</optgroup>';
					    } ?>
					</select>
				</label>
				<label for="top_nav_font_size" style="float:left; width:100px;">
					<?php esc_html_e('Font Size: ', 'udesign'); ?>
					<select name="udesign_options[top_nav_font_size]" id="top_nav_font_size">
					    <option value="8"<?php echo ($options['top_nav_font_size'] == '8') ? ' selected="selected"' : ''; ?>>8px</option>
					    <option value="9"<?php echo ($options['top_nav_font_size'] == '9') ? ' selected="selected"' : ''; ?>>9px</option>
					    <option value="10"<?php echo ($options['top_nav_font_size'] == '10') ? ' selected="selected"' : ''; ?>>10px</option>
					    <option value="11"<?php echo ($options['top_nav_font_size'] == '11') ? ' selected="selected"' : ''; ?>>11px</option>
					    <option value="12"<?php echo ($options['top_nav_font_size'] == '12') ? ' selected="selected"' : ''; ?>>12px</option>
					    <option value="13"<?php echo ($options['top_nav_font_size'] == '13') ? ' selected="selected"' : ''; ?>>13px</option>
					    <option value="14"<?php echo ($options['top_nav_font_size'] == '14') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">14px (Default)</option>
					    <option value="15"<?php echo ($options['top_nav_font_size'] == '15') ? ' selected="selected"' : ''; ?>>15px</option>
					    <option value="16"<?php echo ($options['top_nav_font_size'] == '16') ? ' selected="selected"' : ''; ?>>16px</option>
					    <option value="17"<?php echo ($options['top_nav_font_size'] == '17') ? ' selected="selected"' : ''; ?>>17px</option>
					    <option value="18"<?php echo ($options['top_nav_font_size'] == '18') ? ' selected="selected"' : ''; ?>>18px</option>
					    <option value="19"<?php echo ($options['top_nav_font_size'] == '19') ? ' selected="selected"' : ''; ?>>19px</option>
					    <option value="20"<?php echo ($options['top_nav_font_size'] == '20') ? ' selected="selected"' : ''; ?>>20px</option>
					    <option value="21"<?php echo ($options['top_nav_font_size'] == '21') ? ' selected="selected"' : ''; ?>>21px</option>
					    <option value="22"<?php echo ($options['top_nav_font_size'] == '22') ? ' selected="selected"' : ''; ?>>22px</option>
					    <option value="23"<?php echo ($options['top_nav_font_size'] == '23') ? ' selected="selected"' : ''; ?>>23px</option>
					    <option value="24"<?php echo ($options['top_nav_font_size'] == '24') ? ' selected="selected"' : ''; ?>>24px</option>
					    <option value="25"<?php echo ($options['top_nav_font_size'] == '25') ? ' selected="selected"' : ''; ?>>25px</option>
					    <option value="26"<?php echo ($options['top_nav_font_size'] == '26') ? ' selected="selected"' : ''; ?>>26px</option>
					    <option value="27"<?php echo ($options['top_nav_font_size'] == '27') ? ' selected="selected"' : ''; ?>>27px</option>
					    <option value="28"<?php echo ($options['top_nav_font_size'] == '28') ? ' selected="selected"' : ''; ?>>28px</option>
					    <option value="32"<?php echo ($options['top_nav_font_size'] == '32') ? ' selected="selected"' : ''; ?>>32px</option>
					    <option value="36"<?php echo ($options['top_nav_font_size'] == '36') ? ' selected="selected"' : ''; ?>>36px</option>
					</select>
				</label>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Title Headings Font Settings', 'udesign'); ?></th>
			    <td>
				<div style="float:left; margin-bottom:7px;"><?php esc_html_e("This font is applied to all h1, h2, h3, h4, h5, h6 - Headings (with small exceptions) and  the Slogan (Tagline):", 'udesign'); ?></div>
                                <div class="clear"></div>
				<label for="title_headings_font_family" style="float:left; width:220px;">
				    <?php esc_html_e('Font Family: ', 'udesign'); ?><br />
				    <select name="udesign_options[title_headings_font_family]" id="title_headings_font_family" style="width:200px;">
					    <option value="Arial"<?php echo ($options['title_headings_font_family'] == 'Arial') ? ' selected="selected"' : ''; ?>>Arial</option>
					    <option value="Comic Sans MS"<?php echo ($options['title_headings_font_family'] == 'Comic Sans MS') ? ' selected="selected"' : ''; ?>>Comic Sans MS</option>
					    <option value="FreeSans"<?php echo ($options['title_headings_font_family'] == 'FreeSans') ? ' selected="selected"' : ''; ?>>FreeSans</option>
					    <option value="Georgia"<?php echo ($options['title_headings_font_family'] == 'Georgia') ? ' selected="selected"' : ''; ?>>Georgia</option>
					    <option value="Lucida Sans Unicode"<?php echo ($options['title_headings_font_family'] == 'Lucida Sans Unicode') ? ' selected="selected"' : ''; ?>>Lucida Sans Unicode</option>
					    <option value="Palatino Linotype"<?php echo ($options['title_headings_font_family'] == 'Palatino Linotype') ? ' selected="selected"' : ''; ?>>Palatino Linotype</option>
					    <option value="Symbol"<?php echo ($options['title_headings_font_family'] == 'Symbol') ? ' selected="selected"' : ''; ?>>Symbol</option>
					    <option value="Tahoma"<?php echo ($options['title_headings_font_family'] == 'Tahoma') ? ' selected="selected"' : ''; ?>>Tahoma</option>
					    <option value="Times New Roman"<?php echo ($options['title_headings_font_family'] == 'Times New Roman') ? ' selected="selected"' : ''; ?>>Times New Roman</option>
					    <option value="Trebuchet MS"<?php echo ($options['title_headings_font_family'] == 'Trebuchet MS') ? ' selected="selected"' : ''; ?>>Trebuchet MS</option>
					    <option value="Verdana"<?php echo ($options['title_headings_font_family'] == 'Verdana') ? ' selected="selected"' : ''; ?>>Verdana</option>
<?php					    if( $options['enable_google_web_fonts'] == 'yes' ) {
						echo '<optgroup label="Google Web Fonts:">';
						foreach ($google_webfonts as $web_font_name) {
						    $make_current_font_selected = ($options['title_headings_font_family'] == $web_font_name) ? ' selected="selected"' : '';
						    echo '<option value="'.$web_font_name.'"'.$make_current_font_selected.'>'.preg_replace('/:.*/','', $web_font_name).'</option>';
						}
						echo '</optgroup>';
					    } ?>
					    <optgroup label="Cuf&oacute;n Fonts:">
<?php					    foreach ($cufon_fonts as $cufon_font_name) {
						$make_current_font_selected = ($options['title_headings_font_family'] == $cufon_font_name) ? ' selected="selected"' : '';
						echo '<option value="'.$cufon_font_name.'"'.$make_current_font_selected.'>'.ucwords( $cufon_font_name ).' (Cuf&oacute;n)</option>';
					    } ?>
					    </optgroup>
				    </select>
				</label>
				<label for="heading_font_size_coefficient" style="float:left;">
					<?php esc_html_e('Font Size Coefficient: ', 'udesign'); ?><br />
					<select name="udesign_options[heading_font_size_coefficient]" id="heading_font_size_coefficient">
					    <option value="0.2"<?php echo ($options['heading_font_size_coefficient'] == '0.2') ? ' selected="selected"' : ''; ?>>0.2</option>
					    <option value="0.4"<?php echo ($options['heading_font_size_coefficient'] == '0.4') ? ' selected="selected"' : ''; ?>>0.4</option>
					    <option value="0.6"<?php echo ($options['heading_font_size_coefficient'] == '0.6') ? ' selected="selected"' : ''; ?>>0.6</option>
					    <option value="0.8"<?php echo ($options['heading_font_size_coefficient'] == '0.8') ? ' selected="selected"' : ''; ?>>0.8</option>
					    <option value="1.0"<?php echo ($options['heading_font_size_coefficient'] == '1.0') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.0 (Default)</option>
					    <option value="1.2"<?php echo ($options['heading_font_size_coefficient'] == '1.2') ? ' selected="selected"' : ''; ?>>1.2</option>
					    <option value="1.4"<?php echo ($options['heading_font_size_coefficient'] == '1.4') ? ' selected="selected"' : ''; ?>>1.4</option>
					    <option value="1.6"<?php echo ($options['heading_font_size_coefficient'] == '1.6') ? ' selected="selected"' : ''; ?>>1.6</option>
					    <option value="1.8"<?php echo ($options['heading_font_size_coefficient'] == '1.8') ? ' selected="selected"' : ''; ?>>1.8</option>
					    <option value="2.0"<?php echo ($options['heading_font_size_coefficient'] == '2.0') ? ' selected="selected"' : ''; ?>>2.0</option>
					    <option value="2.2"<?php echo ($options['heading_font_size_coefficient'] == '2.2') ? ' selected="selected"' : ''; ?>>2.2</option>
					    <option value="2.4"<?php echo ($options['heading_font_size_coefficient'] == '2.4') ? ' selected="selected"' : ''; ?>>2.4</option>
					    <option value="2.6"<?php echo ($options['heading_font_size_coefficient'] == '2.6') ? ' selected="selected"' : ''; ?>>2.6</option>
					    <option value="2.8"<?php echo ($options['heading_font_size_coefficient'] == '2.8') ? ' selected="selected"' : ''; ?>>2.8</option>
					</select>
				</label>
				<div style="clear:both;"><span class="description"><?php esc_html_e('The Font Size Coefficient is multiplied by the actual heading size in "em", thus any coefficient greater than "1.0" will cause the font size to inclease and any coefficient less than "1.0 will produce smaller font size.', 'udesign'); ?></span></div>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

        function custom_colors_options_contentbox( $options ) { ?>
    		<table class="form-table" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Custom Colors Switch', 'udesign'); ?></th>
			    <td>
				<span class="description"><?php esc_html_e("If enabled this option will overwrite the default CSS styles.", 'udesign'); ?></span><br />
				<?php esc_html_e('Custom colors option:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[custom_colors_switch]" id="custom_colors_switch_enable" value="enable" <?php checked('enable', $options['custom_colors_switch']); ?> /> <?php esc_html_e('Enable', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[custom_colors_switch]" id="custom_colors_switch_disable" value="disable" <?php checked('disable', $options['custom_colors_switch']); ?> /> <?php esc_html_e('Disable', 'udesign'); ?></label>
				<br />
				<div class="submit" style="padding:10px 0 0 80px; float:left; clear:both;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Update', 'udesign'); ?>" />
                                    <span class="spinner spinner-float-left"></span>
				</div>
<?php				if ( $options['custom_colors_switch'] == 'enable' ) : ?>
				    <div style="padding-top:10px; clear:both;"><?php esc_html_e('Continue with the section below to customize the colors...', 'udesign'); ?></div>
<?php				else : ?>
				    <input style="display:none;" name="udesign_options[one_continuous_bg_img_fixed]" type="checkbox" id="one_continuous_bg_img_fixed" value="yes" <?php checked('yes', $options['one_continuous_bg_img_fixed']); ?> />
<?php				endif; ?>
			    </td>
			</tr>
		    </tbody>
		</table>
                
<?php		if ( $options['custom_colors_switch'] == 'enable' ) : ?>
		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('General Text and Link Colors:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Body Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bodyTextColor">
					<div style="background-color: #<?php echo ($options['body_text_color']) ? esc_attr($options['body_text_color']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[body_text_color]" id="body_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['body_text_color']) ? esc_attr($options['body_text_color']) : '333333'; ?>" />
				    <?php esc_html_e("Main body text color affecting the entire site.", 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainLinkColor">
					<div style="background-color: #<?php echo ($options['main_link_color']) ? esc_attr($options['main_link_color']) : 'FE5E08'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_link_color]" id="main_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['main_link_color']) ? esc_attr($options['main_link_color']) : 'FE5E08'; ?>" />
				    <?php esc_html_e("Main link color affecting the entire site.", 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Hover Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainLinkColorHover">
					<div style="background-color: #<?php echo ($options['main_link_color_hover']) ? esc_attr($options['main_link_color_hover']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_link_color_hover]" id="main_link_color_hover" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['main_link_color_hover']) ? esc_attr($options['main_link_color_hover']) : '333333'; ?>" />
				    <?php esc_html_e("This is the link hover color.", 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Headings Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainHeadingsColor">
					<div style="background-color: #<?php echo ($options['main_headings_color']) ? esc_attr($options['main_headings_color']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_headings_color]" id="main_headings_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['main_headings_color']) ? esc_attr($options['main_headings_color']) : '333333'; ?>" />
				    <?php esc_html_e("This is the color for general H1, H2, H3, H4 ,H5 ,H6 Headings where applicable.", 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <h2 id="top-area-background" style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Top Section Colors:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Area Background', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topBGcolorSelector">
					<div style="background-color: #<?php echo ($options['top_bg_color']) ? esc_attr($options['top_bg_color']) : 'FBFBFB'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_bg_color]" id="top_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['top_bg_color']) ? esc_attr($options['top_bg_color']) : 'FBFBFB'; ?>" />
				    <?php esc_html_e("Site's top section background color. This is the section with the logo, slogan, phone number and search box, immediately above the menu.", 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Area Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topTextcolorSelector">
					<div style="background-color: #<?php echo ($options['top_text_color']) ? esc_attr($options['top_text_color']) : '999999'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_text_color]" id="top_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['top_text_color']) ? esc_attr($options['top_text_color']) : '999999'; ?>" />
				    <?php esc_html_e("This color affects the slogan, phone number and search text.", 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Menu Link Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavLinkColor">
					<div style="background-color: #<?php echo ($options['top_nav_link_color']) ? esc_attr($options['top_nav_link_color']) : '999999'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_link_color]" id="top_nav_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['top_nav_link_color']) ? esc_attr($options['top_nav_link_color']) : '999999'; ?>" />
				    <?php esc_html_e('This is the color of the main menu links.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Menu Active Link Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavActiveLinkColor">
					<div style="background-color: #<?php echo ($options['top_nav_active_link_color']) ? esc_attr($options['top_nav_active_link_color']) : 'F95A09'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_active_link_color]" id="top_nav_active_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['top_nav_active_link_color']) ? esc_attr($options['top_nav_active_link_color']) : 'F95A09'; ?>" />
				    <?php esc_html_e('This is the color of the main menu active/selected link.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Menu Hover Link Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavHoverLinkColor">
					<div style="background-color: #<?php echo ($options['top_nav_hover_link_color']) ? esc_attr($options['top_nav_hover_link_color']) : '777777'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_hover_link_color]" id="top_nav_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['top_nav_hover_link_color']) ? esc_attr($options['top_nav_hover_link_color']) : '777777'; ?>" />
				    <?php esc_html_e('This is the color of the main menu hover link.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Midsection Colors:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Page Title Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="pageTitleColor">
					<div style="background-color: #<?php echo ($options['page_title_color']) ? esc_attr($options['page_title_color']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[page_title_color]" id="page_title_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['page_title_color']) ? esc_attr($options['page_title_color']) : '333333'; ?>" />
				    <?php esc_html_e('This is the color for the title of pages/posts/archives, etc. located in the area underneath the menu.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Page Title Background Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="pageTitleBGcolorSelector">
					<div style="background-color: #<?php echo ($options['page_title_bg_color']) ? esc_attr($options['page_title_bg_color']) : 'FFFFFF'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[page_title_bg_color]" id="page_title_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['page_title_bg_color']) ? esc_attr($options['page_title_bg_color']) : 'FFFFFF'; ?>" />
				    <?php esc_html_e('This is the background color behind the page titles.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Header/Slider Background', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="headerBGcolorSelector">
					<div style="background-color: #<?php echo ($options['header_bg_color']) ? esc_attr($options['header_bg_color']) : 'FFFFFF'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[header_bg_color]" id="header_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['header_bg_color']) ? esc_attr($options['header_bg_color']) : 'FFFFFF'; ?>" />
				    <?php esc_html_e('This is the background color behind the home page sliders.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Main Content Area Background', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainContentBG">
					<div style="background-color: #<?php echo ($options['main_content_bg']) ? esc_attr($options['main_content_bg']) : 'FFFFFF'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_content_bg]" id="main_content_bg" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['main_content_bg']) ? esc_attr($options['main_content_bg']) : 'FFFFFF'; ?>" />
				    <?php esc_html_e('This is the color of the main content wrapper background.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Home Page Before Content Widget Area Colors:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Title Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="widgetTitleColor">
					<div style="background-color: #<?php echo ($options['widget_title_color']) ? esc_attr($options['widget_title_color']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[widget_title_color]" id="widget_title_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['widget_title_color']) ? esc_attr($options['widget_title_color']) : '333333'; ?>" />
				    <?php esc_html_e('This is the color for the title of widgets used in this Widget Area, usually an "H3" Headings.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="widgetTextColor">
					<div style="background-color: #<?php echo ($options['widget_text_color']) ? esc_attr($options['widget_text_color']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[widget_text_color]" id="widget_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['widget_text_color']) ? esc_attr($options['widget_text_color']) : '333333'; ?>" />
				    <?php esc_html_e('This is the default text color applied to this Widget Area.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Background Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="widgetBGColor">
					<div style="background-color: #<?php echo ($options['widget_bg_color']) ? esc_attr($options['widget_bg_color']) : 'F8F8F8'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[widget_bg_color]" id="widget_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['widget_bg_color']) ? esc_attr($options['widget_bg_color']) : 'F8F8F8'; ?>" />
				    <?php esc_html_e('This is the background color.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Bottom Area Colors:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Background Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomBGColor">
					<div style="background-color: #<?php echo ($options['bottom_bg_color']) ? esc_attr($options['bottom_bg_color']) : 'F5F5F5'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_bg_color]" id="bottom_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['bottom_bg_color']) ? esc_attr($options['bottom_bg_color']) : 'F5F5F5'; ?>" />
				    <?php esc_html_e('This is the background color for the bottom area.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Titles Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomTitleColor">
					<div style="background-color: #<?php echo ($options['bottom_title_color']) ? esc_attr($options['bottom_title_color']) : 'FE5E08'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_title_color]" id="bottom_title_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['bottom_title_color']) ? esc_attr($options['bottom_title_color']) : 'FE5E08'; ?>" />
				    <?php esc_html_e('This is the color applied to the bottom area widget titles.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomTextColor">
					<div style="background-color: #<?php echo ($options['bottom_text_color']) ? esc_attr($options['bottom_text_color']) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_text_color]" id="bottom_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['bottom_text_color']) ? esc_attr($options['bottom_text_color']) : '333333'; ?>" />
				    <?php esc_html_e('This is the default text color applied to the bottom area.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Link Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomLinkColor">
					<div style="background-color: #<?php echo ($options['bottom_link_color']) ? esc_attr($options['bottom_link_color']) : '3D6E97'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_link_color]" id="bottom_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['bottom_link_color']) ? esc_attr($options['bottom_link_color']) : '3D6E97'; ?>" />
				    <?php esc_html_e('This is the bottom area link color.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Link Hover Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomHoverLinkColor">
					<div style="background-color: #<?php echo ($options['bottom_hover_link_color']) ? esc_attr($options['bottom_hover_link_color']) : '000000'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_hover_link_color]" id="bottom_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['bottom_hover_link_color']) ? esc_attr($options['bottom_hover_link_color']) : '000000'; ?>" />
				    <?php esc_html_e('This is the bottom area link hover color.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Footer Area Colors:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Background Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerBGColor">
					<div style="background-color: #<?php echo ($options['footer_bg_color']) ? esc_attr($options['footer_bg_color']) : 'EAEAEA'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_bg_color]" id="footer_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['footer_bg_color']) ? esc_attr($options['footer_bg_color']) : 'EAEAEA'; ?>" />
				    <?php esc_html_e('This is the footer background color.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerTextColor">
					<div style="background-color: #<?php echo ($options['footer_text_color']) ? esc_attr($options['footer_text_color']) : '797979'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_text_color]" id="footer_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['footer_text_color']) ? esc_attr($options['footer_text_color']) : '797979'; ?>" />
				    <?php esc_html_e('This is the footer general text color.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Link Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerLinkColor">
					<div style="background-color: #<?php echo ($options['footer_link_color']) ? esc_attr($options['footer_link_color']) : '3D6E97'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_link_color]" id="footer_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['footer_link_color']) ? esc_attr($options['footer_link_color']) : '3D6E97'; ?>" />
				    <?php esc_html_e('This is the footer link color.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Link Hover Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerHoverLinkColor">
					<div style="background-color: #<?php echo ($options['footer_hover_link_color']) ? esc_attr($options['footer_hover_link_color']) : '000000'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_hover_link_color]" id="footer_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo ($options['footer_hover_link_color']) ? esc_attr($options['footer_hover_link_color']) : '000000'; ?>" />
				    <?php esc_html_e('This is the footer link hover color.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
<?php		    display_save_changes_button(); ?>

                   
		    <div style="margin:10px;">
                        <h2 style="color:#2680AA; margin: 2px 0 0; padding:0;"><?php esc_html_e('Background Images:', 'udesign'); ?></h2>
                        <p style="margin: 5px 0 10px;"><span class="description"><?php esc_html_e("Tip: To upload an image click on 'Upload Image' button below. Once the image is uploaded it will give you various options. Click on 'Insert into Post' button. Once you click on 'Insert into Post', link with the uploaded image will be inserted into the corresponding text field below. The background image is placed according to the background-position property. If 'No Repeat' is specified (see below), the image is placed at the element's top center possition.", 'udesign'); ?></span></p>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Top Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="top_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[top_bg_img]" type="text" id="top_bg_img" value="<?php if( $options['top_bg_img'] ){ echo esc_url($options['top_bg_img']); } ?>" size="65" />
                                            <input id="upload_top_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'udesign'); ?>
                                            <select name="udesign_options[top_bg_img_repeat]" id="top_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['top_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['top_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['top_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['top_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[top_bg_img_position_horizontal]" id="top_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['top_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['top_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['top_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[top_bg_img_position_vertical]" id="top_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['top_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['top_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['top_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Home Page Header/Slider Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="header_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[header_bg_img]" type="text" id="header_bg_img" value="<?php if( $options['header_bg_img'] ){ echo esc_url($options['header_bg_img']); } ?>" size="65" />
                                            <input id="upload_header_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'udesign'); ?>
                                            <select name="udesign_options[header_bg_img_repeat]" id="header_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['header_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['header_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['header_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['header_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[header_bg_img_position_horizontal]" id="header_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['header_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['header_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['header_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[header_bg_img_position_vertical]" id="header_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['header_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['header_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['header_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Home Page Before Content Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="home_page_before_content_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[home_page_before_content_bg_img]" type="text" id="home_page_before_content_bg_img" value="<?php if( $options['home_page_before_content_bg_img'] ){ echo esc_url($options['home_page_before_content_bg_img']); } ?>" size="65" />
                                            <input id="upload_home_page_before_content_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'udesign'); ?>
                                            <select name="udesign_options[home_page_before_content_bg_img_repeat]" id="home_page_before_content_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['home_page_before_content_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['home_page_before_content_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['home_page_before_content_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['home_page_before_content_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[home_page_before_content_bg_img_position_horizontal]" id="home_page_before_content_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['home_page_before_content_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['home_page_before_content_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['home_page_before_content_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[home_page_before_content_bg_img_position_vertical]" id="home_page_before_content_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['home_page_before_content_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['home_page_before_content_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['home_page_before_content_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Page Title Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="page_title_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[page_title_bg_img]" type="text" id="page_title_bg_img" value="<?php if( $options['page_title_bg_img'] ){ echo esc_url($options['page_title_bg_img']); } ?>" size="65" />
                                            <input id="upload_page_title_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'udesign'); ?>
                                            <select name="udesign_options[page_title_bg_img_repeat]" id="page_title_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['page_title_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['page_title_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['page_title_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['page_title_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[page_title_bg_img_position_horizontal]" id="page_title_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['page_title_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['page_title_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['page_title_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[page_title_bg_img_position_vertical]" id="page_title_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['page_title_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['page_title_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['page_title_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Main Content Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="main_content_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[main_content_bg_img]" type="text" id="main_content_bg_img" value="<?php if( $options['main_content_bg_img'] ){ echo esc_url($options['main_content_bg_img']); } ?>" size="65" />
                                            <input id="upload_main_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'udesign'); ?>
                                            <select name="udesign_options[main_content_bg_img_repeat]" id="main_content_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['main_content_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['main_content_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['main_content_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['main_content_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[main_content_bg_img_position_horizontal]" id="main_content_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['main_content_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['main_content_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['main_content_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[main_content_bg_img_position_vertical]" id="main_content_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['main_content_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['main_content_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['main_content_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Bottom Area Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="bottom_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[bottom_bg_img]" type="text" id="bottom_bg_img" value="<?php if( $options['bottom_bg_img'] ){ echo esc_url($options['bottom_bg_img']); } ?>" size="65" />
                                            <input id="upload_bottom_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'udesign'); ?>
                                            <select name="udesign_options[bottom_bg_img_repeat]" id="bottom_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['bottom_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['bottom_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['bottom_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['bottom_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[bottom_bg_img_position_horizontal]" id="bottom_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['bottom_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['bottom_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['bottom_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[bottom_bg_img_position_vertical]" id="bottom_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['bottom_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['bottom_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['bottom_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Footer Background Image', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="footer_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[footer_bg_img]" type="text" id="footer_bg_img" value="<?php if( $options['footer_bg_img'] ){ echo esc_url($options['footer_bg_img']); } ?>" size="65" />
                                            <input id="upload_footer_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'udesign'); ?>
                                            <select name="udesign_options[footer_bg_img_repeat]" id="footer_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['footer_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['footer_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['footer_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['footer_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[footer_bg_img_position_horizontal]" id="footer_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['footer_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['footer_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['footer_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[footer_bg_img_position_vertical]" id="footer_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['footer_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['footer_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['footer_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#F0F5F5; border:1px solid #DDE6E7;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('One Continuous Background Image That Will Span Across All Sections', 'udesign'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="one_continuous_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input name="udesign_options[one_continuous_bg_img]" type="text" id="one_continuous_bg_img" value="<?php if( $options['one_continuous_bg_img'] ){ echo esc_url($options['one_continuous_bg_img']); } ?>" size="65" />
                                            <input id="upload_one_continuous_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 10px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'udesign'); ?>
                                            <select name="udesign_options[one_continuous_bg_img_repeat]" id="one_continuous_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ($options['one_continuous_bg_img_repeat'] == 'no-repeat') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'udesign'); ?></option>
                                                <option value="repeat-x"<?php echo ($options['one_continuous_bg_img_repeat'] == 'repeat-x') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'udesign'); ?></option>
                                                <option value="repeat-y"<?php echo ($options['one_continuous_bg_img_repeat'] == 'repeat-y') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'udesign'); ?></option>
                                                <option value="repeat"<?php echo ($options['one_continuous_bg_img_repeat'] == 'repeat') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'udesign'); ?>
                                            <select name="udesign_options[one_continuous_bg_img_position_horizontal]" id="one_continuous_bg_img_position_horizontal">
                                                <option value="center"<?php echo ($options['one_continuous_bg_img_position_horizontal'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="left"<?php echo ($options['one_continuous_bg_img_position_horizontal'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
                                                <option value="right"<?php echo ($options['one_continuous_bg_img_position_horizontal'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'udesign'); ?>
                                            <select name="udesign_options[one_continuous_bg_img_position_vertical]" id="one_continuous_bg_img_position_vertical">
                                                <option value="top"<?php echo ($options['one_continuous_bg_img_position_vertical'] == 'top') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'udesign'); ?></option>
                                                <option value="center"<?php echo ($options['one_continuous_bg_img_position_vertical'] == 'center') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'udesign'); ?></option>
                                                <option value="bottom"<?php echo ($options['one_continuous_bg_img_position_vertical'] == 'bottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'udesign'); ?></option>
                                            </select>
                                        </div>
                                        <div class="clear"></div>
                                        <div><span class="description" style="color:#A60000;"><?php printf( __('For Background color  %1$sTop Area Background %2$s%3$s  will be used.', 'udesign'), '<a title="Go To Top Area Background..." href="#top-area-background">', '&rarr;', '</a>'); ?></span></div>
                                        
                                        <fieldset style="margin-top:5px;"><legend class="screen-reader-text"><span><?php esc_html_e('Fixed Position', 'udesign'); ?></span></legend>
                                            <label for="one_continuous_bg_img_fixed">
                                                <input name="udesign_options[one_continuous_bg_img_fixed]" type="checkbox" id="one_continuous_bg_img_fixed" value="yes" <?php checked('yes', $options['one_continuous_bg_img_fixed']); ?> />
                                                <?php esc_html_e("Fix the position of the background image so that it is not scrollable.", 'udesign'); ?><br />
                                            </label>
                                        </fieldset>
                                        <fieldset style="margin-top:5px;"><legend class="screen-reader-text"><span><?php esc_html_e("Allow Other Sections' Images", 'udesign'); ?></span></legend>
                                            <label for="one_continuous_bg_img_with_other_bg_imgs">
                                                <input name="udesign_options[one_continuous_bg_img_with_other_bg_imgs]" type="checkbox" id="one_continuous_bg_img_with_other_bg_imgs" value="yes" <?php checked('yes', $options['one_continuous_bg_img_with_other_bg_imgs']); ?> />
                                                <?php esc_html_e("Enable background images from other sections to show as well, you can achieve sort of layered layout.", 'udesign'); ?><br />
                                            </label>
                                        </fieldset>
                                        <div class="clear"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Remove Horizontal Rulers', 'udesign'); ?></th>
                                    <td>
                                        <fieldset style="margin-top:5px;"><legend class="screen-reader-text"><span><?php esc_html_e("Remove Horizontal Rulers", 'udesign'); ?></span></legend>
                                            <label for="udesign_remove_horizontal_rulers">
                                                <input name="udesign_options[udesign_remove_horizontal_rulers]" type="checkbox" id="udesign_remove_horizontal_rulers" value="yes" <?php checked('yes', $options['udesign_remove_horizontal_rulers']); ?> />
                                                <?php esc_html_e("This option will allow you to remove the horizontal ruler lines that are enabled by default for some sections.", 'udesign'); ?><br />
                                            </label>
                                            <div style="margin-top:10px;"><span class="description"><?php printf( __('Note: If you wish to remove the border line under the top navigation menu, the option for that is located under: %1$s General Options %2$s Border Under the Menu %3$s', 'udesign'), '<br /><strong>', '&rarr;', '</strong>'); ?></span></div>
                                        </fieldset>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clear"></div>
                    </div>
<?php		    display_save_changes_button(); ?>

		    <div id="administrative-tasks" style="margin:20px 10px 17px; padding:20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin-top: 2px; padding:0;"><?php esc_html_e('Administrative Tasks:', 'udesign'); ?></h2>
			<label for="save_current_colors_as_array">
			    <input name="udesign_options[save_current_colors_as_array]" type="checkbox" id="save_current_colors_as_array" value="yes" <?php checked('yes', $options['save_current_colors_as_array']); ?> />
			    <strong><?php esc_html_e('Save the current custom colors.', 'udesign'); ?></strong>
			</label>
			<p><span class="description"><?php esc_html_e('A Color Scheme will be saved with an automatic name generated from the current time stamp. Once saved you will be able to choose it from the dropdown below and load it at a later time.', 'udesign'); ?></span>
			    <div class="submit" style="padding:0 0 10px; float:left; clear:both; display:block;">
				<input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				<input class="button-secondary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Save', 'udesign'); ?>" />
                                <span class="spinner spinner-float-left"></span>
			    </div>
			</p>
			<div class="clear"></div>

			<p><strong><?php esc_html_e('Choose a custom color scheme from the first dropdown below and then choose a task to perform from the second dropdown, then hit the "Update" button.', 'udesign'); ?></strong></p>
			<select name="udesign_options[chosen_custom_colors]" id="chosen_custom_colors">
				<option value="" style="padding:0 10px;">--Custom Color Schemes--</option>
				<option value="default">0. Default Colors</option>
<?php				if( !empty($options['saved_custom_colors_array']) ) {
				    foreach ( array_keys($options['saved_custom_colors_array']) as $key => $custom_color_name ) { // get just the keys, since they contain the names
					echo '<option value="'.$custom_color_name.'">'.($key+1).'. '.$custom_color_name.'</option>';
				    }
				} ?>
			</select> <span style="font-size:18px;">&rarr; </span>
			<select name="udesign_options[chosen_custom_colors_admin_task]" id="chosen_custom_colors_admin_task">
				<option value="" style="padding:0 10px;">--Choose Admin Task--</option>
				<option value="load">Load</option>
				<option value="delete">Delete</option>
			</select>
			<p><span class="description"><?php esc_html_e('Note: The "Default Colors" cannot be deleted.', 'udesign'); ?></span></p>
			<p>
			    <div class="submit" style="padding:0; float:left; clear:both; display:block;">
				<input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				<input class="button-secondary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Update', 'udesign'); ?>" />
                                <span class="spinner spinner-float-left"></span>
			    </div>
			</p>
			<div class="clear"></div>
		    </div>
<?php		endif; ?>

<?php	}

	function front_page_options_contentbox( $options ) {
		$current_slider = $options['current_slider']; ?>

		<table class="form-table" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Current Slider', 'udesign'); ?></th>
			    <td>
				<label for="current_slider"><?php esc_html_e('Choose a slider:', 'udesign'); ?></label>
				<br />
				<select name="udesign_options[current_slider]" id="current_slider">
				    <option value="1"<?php echo ($current_slider == '1') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Flashmo Grid Slider', 'udesign'); ?></option>
				    <option value="2"<?php echo ($current_slider == '2') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Piecemaker', 'udesign'); ?></option>
				    <option value="3"<?php echo ($current_slider == '3') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Piecemaker 2', 'udesign'); ?></option>
				    <option value="4"<?php echo ($current_slider == '4') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Cycle 1 (full width image)', 'udesign'); ?></option>
				    <option value="5"<?php echo ($current_slider == '5') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Cycle 2 (image with text)', 'udesign'); ?></option>
				    <option value="6"<?php echo ($current_slider == '6') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Cycle 3 (image with sliding text)', 'udesign'); ?></option>
				    <option value="8"<?php echo ($current_slider == '8') ? ' selected="selected"' : ''; ?>><?php esc_html_e('Revolution Slider', 'udesign'); ?></option>
				    <option value="7"<?php echo ($current_slider == '7') ? ' selected="selected"' : ''; ?>><?php esc_html_e('No Slider', 'udesign'); ?></option>
				</select>
				<div class="clear"></div>
				<div class="submit" style="padding:10px 0 0 80px; float:left; clear:both;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary udesign-left-submit-btn" type="submit" name="submit" value="<?php esc_attr_e('Save & Activate', 'udesign'); ?>" />
                                    <span class="spinner spinner-float-left"></span>
				</div>
<?php				if ( $current_slider != '5' ) : ?>
				    <div style="padding-top:10px; clear:both;"><?php esc_html_e('Continue with the section below to customize the slider...', 'udesign'); ?></div>
<?php				endif; ?>
			    </td>
			</tr>
		    </tbody>
		</table>

<?php		if ( $current_slider == '1' ) :
		    $gs_image_width = $options['gs_image_width'];
		    $gs_image_height = $options['gs_image_height'];
		    $gs_auto_play = $options['gs_auto_play'];
		    $gs_grid_row = $options['gs_grid_row'];
		    $gs_grid_column = $options['gs_grid_column'];
		    $gs_auto_play_duration = $options['gs_auto_play_duration'];
		    $gs_tween_duration = $options['gs_tween_duration'];
		    $gs_tween_delay = $options['gs_tween_delay'];
		    $gs_bar_status = $options['gs_bar_status'];
		    $gs_remove_3d_shadow = $options['gs_remove_3d_shadow'];
		    $gs_slides_order_str = $options['gs_slides_order_str'];
		    $gs_slides_array = explode( ',', $options['gs_slides_order_str'] );
		    $gs_no_js_img = $options['gs_no_js_img']; ?>

		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes, dropdowns and some text fields)  -->
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Flashmo Grid Slider Settings:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="gs_image_width"><?php esc_html_e('Image Width', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_image_width]" type="text" id="gs_image_width" value="<?php echo esc_attr($gs_image_width); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('The width in pixels of the slider images (940 recommended).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_image_height"><?php esc_html_e('Image Height', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_image_height]" type="text" id="gs_image_height" value="<?php echo esc_attr($gs_image_height); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('The height in pixels of the slider images (400 recommended).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_auto_play"><?php esc_html_e('Auto Play', 'udesign'); ?></label></th>
				<td>
				    <select name="udesign_options[gs_auto_play]" id="gs_auto_play">
					<option value="true"<?php echo ($gs_auto_play == 'true') ? ' selected="selected"' : ''; ?>><?php esc_html_e('True', 'udesign'); ?></option>
					<option value="false"<?php echo ($gs_auto_play == 'false') ? ' selected="selected"' : ''; ?>><?php esc_html_e('False', 'udesign'); ?></option>
				    </select>
				    <span><?php esc_html_e('Set the auto play option, true by default ( or false ).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_auto_play_duration"><?php esc_html_e('Auto Play Duration', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_auto_play_duration]" type="text" id="gs_auto_play_duration" value="<?php echo esc_attr($gs_auto_play_duration); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Number of seconds between transitions, 2.4 seconds by default ( or any number of seconds ).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_grid_row"><?php esc_html_e('Number of Rows', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_grid_row]" type="text" id="gs_grid_row" value="<?php echo esc_attr($gs_grid_row); ?>" size="5" maxlength="2" />
				    <span><?php esc_html_e('Number of rows, in which the images will be sliced, 4 rows by default ( or any number of rows )', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_grid_column"><?php esc_html_e('Number of Columns', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_grid_column]" type="text" id="gs_grid_column" value="<?php echo esc_attr($gs_grid_column); ?>" size="5" maxlength="2" />
				    <span><?php esc_html_e('Number of columns, in which the images will be sliced, 6 columns by default ( or any number of columns )', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_tween_duration"><?php esc_html_e('Tween Duration', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_tween_duration]" type="text" id="gs_tween_duration" value="<?php echo esc_attr($gs_tween_duration); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Duration in seconds of the motion tween for each block in the transition.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_tween_delay"><?php esc_html_e('Tween Delay', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[gs_tween_delay]" type="text" id="gs_tween_delay" value="<?php echo esc_attr($gs_tween_delay); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Delay in seconds between each block in the transition.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="gs_bar_status"><?php esc_html_e('Bar Status', 'udesign'); ?></label></th>
				<td>
				    <select name="udesign_options[gs_bar_status]" id="gs_bar_status">
					<option value="zero"<?php echo ($gs_bar_status == 'zero') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Hide the Bar', 'udesign'); ?></option>
					<option value="1"<?php echo ($gs_bar_status == '1') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Show the Bar', 'udesign'); ?></option>
					<option value="2"<?php echo ($gs_bar_status == '2') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Show the Bar and Photo Description', 'udesign'); ?></option>
				    </select>
				    <span><?php esc_html_e('This is the area in the slider displaying additional controls and text.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('3D Shadow', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('3D Shadow', 'udesign'); ?></span></legend>
				    <label for="gs_remove_3d_shadow">
					<input name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $gs_remove_3d_shadow); ?> />
					<?php esc_html_e('Remove the 3D shadow under the slider', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>

		    <input name="udesign_options[gs_slides_order_str]" type="hidden" id="gs_slides_order_str" value="<?php if ($gs_slides_order_str){ echo esc_attr($gs_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="gs-table-slides" class="gs-table-slides">
			<tbody>
    <?php		    foreach( $gs_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo $slide_row_number; ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo $position+1; ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<div class="gs_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                            <label style="font-weight:bold;" for="gs_slide_img_url_<?php echo $slide_row_number; ?>"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                            <input class="gs_slide_img_url_field" name="udesign_options[gs_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="gs_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['gs_slide_img_url_'.$slide_row_number]){ echo esc_url($options['gs_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="gs_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary gs_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
					<div class="transition-flow" style="padding:10px 5px 0 0; float:left; clear:left;">
					    <strong><?php esc_html_e('Flow:', 'udesign'); ?></strong>
					    <select name="udesign_options[gs_slide_transition_flow_<?php echo $slide_row_number; ?>]" id="gs_slide_transition_flow_<?php echo $slide_row_number; ?>">
						<option value="in"<?php echo ($options['gs_slide_transition_flow_'.$slide_row_number] == 'in') ? ' selected="selected"' : ''; ?>>In</option>
						<option style="padding:4px;" value="out"<?php echo ($options['gs_slide_transition_flow_'.$slide_row_number] == 'out') ? ' selected="selected"' : ''; ?>>Out</option>
					    </select>
					</div>
					<div class="transition-direction" style="padding:10px 5px 0 10px; float:left;">
					    <strong><?php esc_html_e('Direction:', 'udesign'); ?></strong>
					    <select name="udesign_options[gs_slide_transition_direction_<?php echo $slide_row_number; ?>]" id="gs_slide_transition_direction_<?php echo $slide_row_number; ?>">
						<option value="left"<?php echo ($options['gs_slide_transition_direction_'.$slide_row_number] == 'left') ? ' selected="selected"' : ''; ?>>left</option>
						<option value="right"<?php echo ($options['gs_slide_transition_direction_'.$slide_row_number] == 'right') ? ' selected="selected"' : ''; ?>>right</option>
						<option value="up"<?php echo ($options['gs_slide_transition_direction_'.$slide_row_number] == 'up') ? ' selected="selected"' : ''; ?>>up</option>
						<option value="down"<?php echo ($options['gs_slide_transition_direction_'.$slide_row_number] == 'down') ? ' selected="selected"' : ''; ?>>down</option>
						<option style="padding:4px;" value="center"<?php echo ($options['gs_slide_transition_direction_'.$slide_row_number] == 'center') ? ' selected="selected"' : ''; ?>>center</option>
					    </select>
					</div>
					<div class="transition-rotation" style="padding:10px 5px 0 10px; float:left; clear:right;">
					    <strong><?php esc_html_e('Rotation:', 'udesign'); ?></strong>
					    <select name="udesign_options[gs_slide_transition_rotation_<?php echo $slide_row_number; ?>]" id="gs_slide_transition_rotation_<?php echo $slide_row_number; ?>">
						<option style="padding:4px;" value="-180"<?php echo ($options['gs_slide_transition_rotation_'.$slide_row_number] == '-180') ? ' selected="selected"' : ''; ?>>-180</option>
						<option value="-90"<?php echo ($options['gs_slide_transition_rotation_'.$slide_row_number] == '-90') ? ' selected="selected"' : ''; ?>>-90</option>
						<option value="zero"<?php echo ($options['gs_slide_transition_rotation_'.$slide_row_number] == 'zero') ? ' selected="selected"' : ''; ?>>0</option>
						<option value="90"<?php echo ($options['gs_slide_transition_rotation_'.$slide_row_number] == '90') ? ' selected="selected"' : ''; ?>>90</option>
						<option value="180"<?php echo ($options['gs_slide_transition_rotation_'.$slide_row_number] == '180') ? ' selected="selected"' : ''; ?>>180</option>
					    </select>
					</div>
					<div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; display:inline;">
					    <strong><?php esc_html_e('Slide text', 'udesign'); ?></strong>:<br />
					    <textarea name="udesign_options[gs_slide_default_info_txt_<?php echo $slide_row_number; ?>]" class="code"
							style="width:98%; font-size:12px; margin: 5px 0;" id="gs_slide_default_info_txt_<?php echo $slide_row_number; ?>"
							rows="5" cols="60"><?php echo ( $options['gs_slide_default_info_txt_'.$slide_row_number] ) ? esc_attr($options['gs_slide_default_info_txt_'.$slide_row_number]) : ''; ?></textarea>
					    <span class="description" style="margin:20px 0; line-height:1.5; font-size:12px;"><?php esc_html_e('This textfield supports HTML and CSS. The CSS classes used are located in "sliders/flashmo/grid_slider/flashmo_224_style.css"', 'udesign'); ?></span>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="gs-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <div class="gs_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label style="font-weight:bold;" for="gs_slide_img_url_999"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="gs_slide_img_url_field" name="udesign_options[gs_slide_img_url_999]" type="text" id="gs_slide_img_url_999" value="" size="65" />
                                        <input id="gs_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary gs_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
				    <div class="transition-flow" style="padding:10px 5px 0 0; float:left; clear:left;">
					<strong><?php esc_html_e('Flow:', 'udesign'); ?></strong>
					<select name="udesign_options[gs_slide_transition_flow_999]" id="gs_slide_transition_flow_999">
					    <option value="in">In</option>
					    <option style="padding:4px;" value="out" selected="selected">Out</option>
					</select>
				    </div>
				    <div class="transition-direction" style="padding:10px 5px 0 10px; float:left;">
					<strong><?php esc_html_e('Direction:', 'udesign'); ?></strong>
					<select name="udesign_options[gs_slide_transition_direction_999]" id="gs_slide_transition_direction_999">
					    <option value="left" selected="selected">left</option>
					    <option value="right">right</option>
					    <option value="up">up</option>
					    <option value="down">down</option>
					    <option style="padding:4px;" value="center">center</option>
					</select>
				    </div>
				    <div class="transition-rotation" style="padding:10px 5px 0 10px; float:left; clear:right;">
					<strong><?php esc_html_e('Rotation:', 'udesign'); ?></strong>
					<select name="udesign_options[gs_slide_transition_rotation_999]" id="gs_slide_transition_rotation_999">
					    <option style="padding:4px;" value="-180">-180</option>
					    <option value="-90">-90</option>
					    <option value="zero" selected="selected">0</option>
					    <option value="90">90</option>
					    <option value="180">180</option>
					</select>
				    </div>
				    <div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; display:inline;">
					<strong><?php esc_html_e('Slide text', 'udesign'); ?></strong>:<br />
					<textarea name="udesign_options[gs_slide_default_info_txt_999]" class="code"
						    style="width:98%; font-size:12px; margin: 5px 0;" id="gs_slide_default_info_txt_999"
						    rows="5" cols="60"><?php echo get_gs_slide_default_info_txt(); ?></textarea>
					<span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('This textfield supports HTML and CSS. The CSS classes used are located in "sliders/flashmo/grid_slider/flashmo_224_style.css"', 'udesign'); ?></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('No JavaScript image', 'udesign'); ?></th>
				<td>
				    <?php esc_html_e('Paste the full path to your image:', 'udesign'); ?><br />
				    <textarea style="width: 98%;" id="gs_no_js_img" rows="2" cols="60" name="udesign_options[gs_no_js_img]"><?php if( $gs_no_js_img ){ echo esc_url($gs_no_js_img); } ?></textarea><br />
				    <span class="description"><?php esc_html_e('In the case when JavaScript is disabled the 1st slider image is displayed by default in place of the Flashmo slider, you may change that in here', 'udesign'); ?></span>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '2' ) :
		    $pm_image_width = $options['pm_image_width'];
		    $pm_image_height = $options['pm_image_height'];
		    $pm_segments = $options['pm_segments'];
		    $pm_tween_time = $options['pm_tween_time'];
		    $pm_tween_delay = $options['pm_tween_delay'];
		    $pm_tween_type = $options['pm_tween_type'];
		    $pm_z_distance = $options['pm_z_distance'];
		    $pm_expand = $options['pm_expand'];
		    $pm_shadow_darkness = $options['pm_shadow_darkness'];
		    $pm_autoplay = $options['pm_autoplay'];
		    $pm_text_distance = $options['pm_text_distance'];
		    $pm_remove_3d_shadow = $options['pm_remove_3d_shadow'];
		    $pm_text_background = $options['pm_text_background'];
		    $pm_inner_color = $options['pm_inner_color'];
		    $pm_slides_order_str = $options['pm_slides_order_str'];
		    $pm_slides_array = explode( ',', $options['pm_slides_order_str'] );
		    $pm_no_js_img = $options['pm_no_js_img'];
		    // Include the Piecemaker Slider XML generator page
		    require_once('sliders/piecemaker/piecemakerXML.php'); ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Piecemaker Slider Settings:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="pm_image_width"><?php esc_html_e('Image Width', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_image_width]" type="text" id="pm_image_width" value="<?php echo esc_attr($pm_image_width); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('The width of the images to be loaded.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_image_height"><?php esc_html_e('Image Height', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_image_height]" type="text" id="pm_image_height" value="<?php echo esc_attr($pm_image_height); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('The height of the images to be loaded.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_segments"><?php esc_html_e('Number of segments', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_segments]" type="text" id="pm_segments" value="<?php echo esc_attr($pm_segments); ?>" size="5" maxlength="2" />
				    <span><?php esc_html_e('Number of segments, in which the images will be sliced.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_tween_time"><?php esc_html_e('Tween Time', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_tween_time]" type="text" id="pm_tween_time" value="<?php echo esc_attr($pm_tween_time); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Number of seconds for each element to be turned.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_tween_delay"><?php esc_html_e('Tween Delay', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_tween_delay]" type="text" id="pm_tween_delay" value="<?php echo esc_attr($pm_tween_delay); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Number of seconds from one element starting to turn to the next element starting.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_tween_type"><?php esc_html_e('Tween Type', 'udesign'); ?></label></th>
				<td>
				    <select name="udesign_options[pm_tween_type]" id="pm_tween_type">
					<option value="easeInOutBack"<?php echo ($pm_tween_type == 'easeInOutBack') ? ' selected="selected"' : ''; ?>>easeInOutBack</option>
					<option value="easeOutInBack"<?php echo ($pm_tween_type == 'easeOutInBack') ? ' selected="selected"' : ''; ?>>easeOutInBack</option>
					<option value="easeOutBack"<?php echo ($pm_tween_type == 'easeOutBack') ? ' selected="selected"' : ''; ?>>easeOutBack</option>
					<option value="easeInBack"<?php echo ($pm_tween_type == 'easeInBack') ? ' selected="selected"' : ''; ?>>easeInBack</option>
					<option value="easeInBounce"<?php echo ($pm_tween_type == 'easeInBounce') ? ' selected="selected"' : ''; ?>>easeInBounce</option>
					<option value="easeOutBounce"<?php echo ($pm_tween_type == 'easeOutBounce') ? ' selected="selected"' : ''; ?>>easeOutBounce</option>
					<option value="easeInOutBounce"<?php echo ($pm_tween_type == 'easeInOutBounce') ? ' selected="selected"' : ''; ?>>easeInOutBounce</option>
					<option value="easeOutInBounce"<?php echo ($pm_tween_type == 'easeOutInBounce') ? ' selected="selected"' : ''; ?>>easeOutInBounce</option>
					<option value="easeInCirc"<?php echo ($pm_tween_type == 'easeInCirc') ? ' selected="selected"' : ''; ?>>easeInCirc</option>
					<option value="easeOutCirc"<?php echo ($pm_tween_type == 'easeOutCirc') ? ' selected="selected"' : ''; ?>>easeOutCirc</option>
					<option value="easeInOutCirc"<?php echo ($pm_tween_type == 'easeInOutCirc') ? ' selected="selected"' : ''; ?>>easeInOutCirc</option>
					<option value="easeOutInCirc"<?php echo ($pm_tween_type == 'easeOutInCirc') ? ' selected="selected"' : ''; ?>>easeOutInCirc</option>
					<option value="easeInElastic"<?php echo ($pm_tween_type == 'easeInElastic') ? ' selected="selected"' : ''; ?>>easeInElastic</option>
					<option value="easeOutElastic"<?php echo ($pm_tween_type == 'easeOutElastic') ? ' selected="selected"' : ''; ?>>easeOutElastic</option>
					<option value="easeInOutElastic"<?php echo ($pm_tween_type == 'easeInOutElastic') ? ' selected="selected"' : ''; ?>>easeInOutElastic</option>
					<option value="easeOutInElastic"<?php echo ($pm_tween_type == 'easeOutInElastic') ? ' selected="selected"' : ''; ?>>easeOutInElastic</option>
					<option value="easeInQuint"<?php echo ($pm_tween_type == 'easeInQuint') ? ' selected="selected"' : ''; ?>>easeInQuint</option>
					<option value="easeOutQuint"<?php echo ($pm_tween_type == 'easeOutQuint') ? ' selected="selected"' : ''; ?>>easeOutQuint</option>
					<option value="easeInOutQuint"<?php echo ($pm_tween_type == 'easeInOutQuint') ? ' selected="selected"' : ''; ?>>easeInOutQuint</option>
					<option value="easeOutInQuint"<?php echo ($pm_tween_type == 'easeOutInQuint') ? ' selected="selected"' : ''; ?>>easeOutInQuint</option>
					<option value="easeInExpo"<?php echo ($pm_tween_type == 'easeInExpo') ? ' selected="selected"' : ''; ?>>easeInExpo</option>
					<option value="easeOutExpo"<?php echo ($pm_tween_type == 'easeOutExpo') ? ' selected="selected"' : ''; ?>>easeOutExpo</option>
					<option value="easeInOutExpo"<?php echo ($pm_tween_type == 'easeInOutExpo') ? ' selected="selected"' : ''; ?>>easeInOutExpo</option>
					<option value="easeOutInExpo"<?php echo ($pm_tween_type == 'easeOutInExpo') ? ' selected="selected"' : ''; ?>>easeOutInExpo</option>
					<option value="easeInCubic"<?php echo ($pm_tween_type == 'easeInCubic') ? ' selected="selected"' : ''; ?>>easeInCubic</option>
					<option value="easeOutCubic"<?php echo ($pm_tween_type == 'easeOutCubic') ? ' selected="selected"' : ''; ?>>easeOutCubic</option>
					<option value="easeInOutCubic"<?php echo ($pm_tween_type == 'easeInOutCubic') ? ' selected="selected"' : ''; ?>>easeInOutCubic</option>
					<option value="easeOutInCubic"<?php echo ($pm_tween_type == 'easeOutInCubic') ? ' selected="selected"' : ''; ?>>easeOutInCubic</option>
					<option value="easeInQuart"<?php echo ($pm_tween_type == 'easeInQuart') ? ' selected="selected"' : ''; ?>>easeInQuart</option>
					<option value="easeOutQuart"<?php echo ($pm_tween_type == 'easeOutQuart') ? ' selected="selected"' : ''; ?>>easeOutQuart</option>
					<option value="easeInOutQuart"<?php echo ($pm_tween_type == 'easeInOutQuart') ? ' selected="selected"' : ''; ?>>easeInOutQuart</option>
					<option value="easeOutInQuart"<?php echo ($pm_tween_type == 'easeOutInQuart') ? ' selected="selected"' : ''; ?>>easeOutInQuart</option>
					<option value="easeInSine"<?php echo ($pm_tween_type == 'easeInSine') ? ' selected="selected"' : ''; ?>>easeInSine</option>
					<option value="easeOutSine"<?php echo ($pm_tween_type == 'easeOutSine') ? ' selected="selected"' : ''; ?>>easeOutSine</option>
					<option value="easeInOutSine"<?php echo ($pm_tween_type == 'easeInOutSine') ? ' selected="selected"' : ''; ?>>easeInOutSine</option>
					<option value="easeOutInSine"<?php echo ($pm_tween_type == 'easeOutInSine') ? ' selected="selected"' : ''; ?>>easeOutInSine</option>
					<option value="easeInQuad"<?php echo ($pm_tween_type == 'easeInQuad') ? ' selected="selected"' : ''; ?>>easeInQuad</option>
					<option value="easeOutQuad"<?php echo ($pm_tween_type == 'easeOutQuad') ? ' selected="selected"' : ''; ?>>easeOutQuad</option>
					<option value="easeInOutQuad"<?php echo ($pm_tween_type == 'easeInOutQuad') ? ' selected="selected"' : ''; ?>>easeInOutQuad</option>
					<option value="easeOutInQuad"<?php echo ($pm_tween_type == 'easeOutInQuad') ? ' selected="selected"' : ''; ?>>easeOutInQuad</option>
					<option value="linear"<?php echo ($pm_tween_type == 'linear') ? ' selected="selected"' : ''; ?>>linear</option>
				    </select>
				    <span><?php printf( esc_html__('Type of transition from Caurina&#39;s Tweener class. Find all possible transition types and more information about Tweener in the official %1$sdocumentation%2$s.', 'udesign'), '<a href="http://hosted.zeh.com.br/tweener/docs/en-us/misc/transitions.html" target="_blank">', '</a>' ); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_z_distance"><?php esc_html_e('Z Distance', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_z_distance]" type="text" id="pm_z_distance" value="<?php echo esc_attr($pm_z_distance); ?>" size="5" maxlength="5" />
				    <span><?php esc_html_e('To which extent are the cubes moved on z axis when being tweened. Negative values bring the cube closer to the camera, positive values take it further away. A good range is roughly between -200 and 700.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_expand"><?php esc_html_e('Expand', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_expand]" type="text" id="pm_expand" value="<?php echo esc_attr($pm_expand); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('To which extent are the cubes moved away from each other when tweening.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_shadow_darkness"><?php esc_html_e('Shadow Darkness', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_shadow_darkness]" type="text" id="pm_shadow_darkness" value="<?php echo esc_attr($pm_shadow_darkness); ?>" size="5" maxlength="3" />
				    <span><?php esc_html_e('To which extent are the sides shadowed, when the elements are tweening and the sided move towards the background. 100 is black, 0 is no darkening.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_autoplay"><?php esc_html_e('Autoplay', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_autoplay]" type="text" id="pm_autoplay" value="<?php echo esc_attr($pm_autoplay); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Number of seconds to the next image.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="pm_text_distance"><?php esc_html_e('Text Distance', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[pm_text_distance]" type="text" id="pm_text_distance" value="<?php echo esc_attr($pm_text_distance); ?>" size="5" maxlength="4" />
				    <span><?php esc_html_e('Distance of the info text to the borders of its background.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('3D Shadow', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('3D Shadow', 'udesign'); ?></span></legend>
				    <label for="pm_remove_3d_shadow">
					<input name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $pm_remove_3d_shadow); ?> />
					<?php esc_html_e('Remove the 3D shadow under the slider', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Background', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="colorSelector1">
					<div style="background-color: #<?php echo ($pm_text_background) ? esc_attr($pm_text_background) : '0000FF'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[pm_text_background]" id="pm_text_background" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($pm_text_background) ? esc_attr($pm_text_background) : '0000FF'; ?>" />
				    <?php esc_html_e('Description text background', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Inner Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="colorSelector2">
					<div style="background-color: #<?php echo ($pm_inner_color) ? esc_attr($pm_inner_color) : '0000FF'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[pm_inner_color]" id="pm_inner_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($pm_inner_color) ? esc_attr($pm_inner_color) : '0000FF'; ?>" />
				    <?php esc_html_e('Sides color of the sliced elements', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>

		    <input name="udesign_options[pm_slides_order_str]" type="hidden" id="pm_slides_order_str" value="<?php if ($pm_slides_order_str){ echo esc_attr($pm_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="pm-table-slides" class="pm-table-slides">
			<tbody>
<?php			    foreach( $pm_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo $slide_row_number; ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 5px; width:10%; font-weight:bold; font-size:20px; text-align:center;"><?php echo $position+1; ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
                                        <div class="pm_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                            <label for="pm_slide_img_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                            <input class="pm_slide_img_url_field" name="udesign_options[pm_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="pm_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm_slide_img_url_'.$slide_row_number]){ echo esc_attr($options['pm_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="pm_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                        </div>
 
                                        <div class="clear"></div>
                                        <div class="slide-info-text">
                                            <p style="font-weight:bold; margin-bottom:0;"><?php esc_html_e('Edit the info text, erase all for none:', 'udesign'); ?></p>
                                            <textarea name="udesign_options[pm_slider_default_info_txt_<?php echo $slide_row_number; ?>]" class="code"
                                                        style="width:97%; font-size:12px; margin: 5px 0;" id="pm_slider_default_info_txt_<?php echo $slide_row_number; ?>"
                                                        rows="6" cols="60" wrap="off"><?php echo ( $options['pm_slider_default_info_txt_'.$slide_row_number] ) ? esc_attr($options['pm_slider_default_info_txt_'.$slide_row_number]) : ''; ?></textarea>
                                            <p style="margin:5px 0;"><span class="description"><?php esc_html_e("Study the above text for slider's specific syntax", 'udesign'); ?></span></p>
                                        </div>
				    </td>
				</tr>
<?php			    endforeach; ?>
			</tbody>
		    </table>
		    <table id="pm-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 5px; width:10%; font-weight:bold; font-size:20px; text-align:center;">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <div class="pm_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label for="pm_slide_img_url_999" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="pm_slide_img_url_field" name="udesign_options[pm_slide_img_url_999]" type="text" id="pm_slide_img_url_999" value="" size="65" />
                                        <input id="pm_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="slide-info-text">
                                        <p style="font-weight:bold; margin-bottom:0;"><?php esc_html_e('Edit the info text, erase all for none:', 'udesign'); ?></p>
                                        <textarea name="udesign_options[pm_slider_default_info_txt_999]" class="code"
                                                    style="width:97%; font-size:12px; margin: 5px 0;" id="pm_slider_default_info_txt_999"
                                                    rows="6" cols="60" wrap="off"><?php echo get_pm_slider_default_info_txt(); ?></textarea>
                                        <p style="margin:5px 0;"><span class="description"><?php esc_html_e("Study the above text for slider's specific syntax", 'udesign'); ?></span></p>
                                    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('No JavaScript image', 'udesign'); ?></th>
				<td>
				    <?php esc_html_e('Paste the full path to your image:', 'udesign'); ?><br />
				    <textarea style="width: 98%;" id="pm_no_js_img" rows="2" cols="60" name="udesign_options[pm_no_js_img]"><?php if( $pm_no_js_img ){ echo esc_url($pm_no_js_img); } ?></textarea><br />
				    <span class="description"><?php esc_html_e('In the case when JavaScript is disabled the 1st slider image is displayed by default in place of the Piecemaker slider, you may change that in here', 'udesign'); ?></span>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '3' ) :
		    $pm2_slides_order_str = $options['pm2_slides_order_str'];
		    $pm2_slides_array = explode( ',', $options['pm2_slides_order_str'] );
		    $pm2_transitions_order_str = $options['pm2_transitions_order_str'];
		    $pm2_transitions_array = explode( ',', $options['pm2_transitions_order_str'] );
		    // Include the Piecemaker Slider XML generator page
		    require_once('sliders/piecemaker_2/piecemakerXML.php'); ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Piecemaker 2 Slider Settings:', 'udesign'); ?></h2>

		    <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('General Settings:', 'udesign'); ?></h2>
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_image_width"><?php esc_html_e('Image Width', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_image_width]" type="text" id="pm2_image_width" value="<?php echo esc_attr($options['pm2_image_width']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('The width of every image.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_image_height"><?php esc_html_e('Image Height', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_image_height]" type="text" id="pm2_image_height" value="<?php echo esc_attr($options['pm2_image_height']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('The height of every image.', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Loader Color', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2LoaderColor">
					    <div style="background-color: #<?php echo ($options['pm2_loader_color']) ? esc_attr($options['pm2_loader_color']) : '333333'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_loader_color]" id="pm2_loader_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_loader_color']) ? esc_attr($options['pm2_loader_color']) : '333333'; ?>" />
					<?php esc_html_e('Color of the cubes before the first image appears, also the color of the back sides of the cube, which become visible at some transition types.', 'udesign'); ?>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Inner Side Color', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2InnerSideColor">
					    <div style="background-color: #<?php echo ($options['pm2_inner_side_color']) ? esc_attr($options['pm2_inner_side_color']) : '222222'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_inner_side_color]" id="pm2_inner_side_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_inner_side_color']) ? esc_attr($options['pm2_inner_side_color']) : '222222'; ?>" />
					<?php esc_html_e('Color of the inner sides of the cube when sliced', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>
			
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_autoplay"><?php esc_html_e('Autoplay', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_autoplay]" type="text" id="pm2_autoplay" value="<?php echo esc_attr($options['pm2_autoplay']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Number of seconds from one transition to another, if not stopped. Set to 0 to disable autoplay.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_field_of_view"><?php esc_html_e('Field of View', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_field_of_view]" type="text" id="pm2_field_of_view" value="<?php echo esc_attr($options['pm2_field_of_view']); ?>" size="5" maxlength="4" />
					<span><?php  printf( __('The display of the slide object moving down the z axis (1 to 179). It appears to change size quickly and moves a great distance. %1$sMore info%2$s', 'udesign'), '<a target="_blank" href="http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/geom/PerspectiveProjection.html#fieldOfView">', '</a>' ); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>
		    </div><!-- END General Settings -->

		    <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Shadows:', 'udesign'); ?></h2>
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_side_shadow_alpha"><?php esc_html_e('Side Shadow Alpha', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_side_shadow_alpha]" type="text" id="pm2_side_shadow_alpha" value="<?php echo esc_attr($options['pm2_side_shadow_alpha']); ?>" size="5" maxlength="4" />
					<span><?php printf( esc_html__('Sides get darker when moved away from the front. This is the degree of darkness 0 = no change, 1 = 100%s black.', 'udesign'), '%' ); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_drop_shadow_alpha"><?php esc_html_e('Drop Shadow Alpha', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_drop_shadow_alpha]" type="text" id="pm2_drop_shadow_alpha" value="<?php echo esc_attr($options['pm2_drop_shadow_alpha']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Alpha of the drop shadow 0 = no shadow, 1 = opaque.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_drop_shadow_distance"><?php esc_html_e('Drop Shadow Distance', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_drop_shadow_distance]" type="text" id="pm2_drop_shadow_distance" value="<?php echo esc_attr($options['pm2_drop_shadow_distance']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Distance of the shadow from the bottom of the image.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_drop_shadow_scale"><?php esc_html_e('Drop Shadow Scale', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_drop_shadow_scale]" type="text" id="pm2_drop_shadow_scale" value="<?php echo esc_attr($options['pm2_drop_shadow_scale']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e("As the shadow is blurred, it appears wider that the actual image, when not resized. Thus it's a good idea to make it slightly smaller. 1 would be no resizing at all.", 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_drop_shadow_blur_x"><?php esc_html_e('Drop Shadow Blur X', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_drop_shadow_blur_x]" type="text" id="pm2_drop_shadow_blur_x" value="<?php echo esc_attr($options['pm2_drop_shadow_blur_x']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Blur of the drop shadow on the x-axis.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_drop_shadow_blur_y"><?php esc_html_e('Drop Shadow Blur Y', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_drop_shadow_blur_y]" type="text" id="pm2_drop_shadow_blur_y" value="<?php echo esc_attr($options['pm2_drop_shadow_blur_y']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Blur of the drop shadow on the y-axis.', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>
		    </div><!-- END Shadows -->

		    <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Menu:', 'udesign'); ?></h2>
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_menu_distance_x"><?php esc_html_e('Menu Distance X', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_menu_distance_x]" type="text" id="pm2_menu_distance_x" value="<?php echo esc_attr($options['pm2_menu_distance_x']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Distance between two menu items (from center to center).', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_menu_distance_y"><?php esc_html_e('Menu Distance Y', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_menu_distance_y]" type="text" id="pm2_menu_distance_y" value="<?php echo esc_attr($options['pm2_menu_distance_y']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Distance of the menu from the bottom of the image.', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Menu Color 1', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2MenuColor1">
					    <div style="background-color: #<?php echo ($options['pm2_menu_color_1']) ? esc_attr($options['pm2_menu_color_1']) : '999999'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_menu_color_1]" id="pm2_menu_color_1" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_menu_color_1']) ? esc_attr($options['pm2_menu_color_1']) : '999999'; ?>" />
					<?php esc_html_e('Color of an inactive menu item.', 'udesign'); ?>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Menu Color 2', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2MenuColor2">
					    <div style="background-color: #<?php echo ($options['pm2_menu_color_2']) ? esc_attr($options['pm2_menu_color_2']) : '333333'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_menu_color_2]" id="pm2_menu_color_2" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_menu_color_2']) ? esc_attr($options['pm2_menu_color_2']) : '333333'; ?>" />
					<?php esc_html_e('Color of an active menu item.', 'udesign'); ?>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Menu Color 3', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2MenuColor3">
					    <div style="background-color: #<?php echo ($options['pm2_menu_color_3']) ? esc_attr($options['pm2_menu_color_3']) : 'FFFFFF'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_menu_color_3]" id="pm2_menu_color_3" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_menu_color_3']) ? esc_attr($options['pm2_menu_color_3']) : 'FFFFFF'; ?>" />
					<?php esc_html_e('Color of the inner circle of an active menu item. Should equal the background color of the whole thing.', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>
		    </div><!-- END Menu -->

		    <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Controls:', 'udesign'); ?></h2>
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_control_size"><?php esc_html_e("Controls' Size", 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_control_size]" type="text" id="pm2_control_size" value="<?php echo esc_attr($options['pm2_control_size']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Size of the controls, which appear on rollover (play, stop, info, link).', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_control_distance"><?php esc_html_e("Controls' Distance", 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_control_distance]" type="text" id="pm2_control_distance" value="<?php echo esc_attr($options['pm2_control_distance']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Distance between the controls (from the borders).', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Control Color 1', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2ControlColor1">
					    <div style="background-color: #<?php echo ($options['pm2_control_color_1']) ? esc_attr($options['pm2_control_color_1']) : '222222'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_control_color_1]" id="pm2_control_color_1" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_control_color_1']) ? esc_attr($options['pm2_control_color_1']) : '222222'; ?>" />
					<?php esc_html_e('Background color of the controls.', 'udesign'); ?>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Control Color 2', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2ControlColor2">
					    <div style="background-color: #<?php echo ($options['pm2_control_color_2']) ? esc_attr($options['pm2_control_color_2']) : 'FFFFFF'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_control_color_2]" id="pm2_control_color_2" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_control_color_2']) ? esc_attr($options['pm2_control_color_2']) : 'FFFFFF'; ?>" />
					<?php esc_html_e('Font color of the controls.', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_control_alpha"><?php esc_html_e('Control Alpha', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_control_alpha]" type="text" id="pm2_control_alpha" value="<?php echo esc_attr($options['pm2_control_alpha']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Alpha of a control, when mouse is not over.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_control_alpha_over"><?php esc_html_e('Control Alpha Over', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_control_alpha_over]" type="text" id="pm2_control_alpha_over" value="<?php echo esc_attr($options['pm2_control_alpha_over']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Alpha of a control, when mouse is over.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_controls_x"><?php esc_html_e('Controls X', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_controls_x]" type="text" id="pm2_controls_x" value="<?php echo esc_attr($options['pm2_controls_x']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('X-position of the point, which aligns the controls (measured from [0,0] of the image).', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_controls_y"><?php esc_html_e('Controls Y', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_controls_y]" type="text" id="pm2_controls_y" value="<?php echo esc_attr($options['pm2_controls_y']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Y-position of the point, which aligns the controls (measured from [0,0] of the image).', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e("Controls' Alignment", 'udesign'); ?></th>
				    <td>
					<label for="pm2_controls_align" class="link-target">
						<?php esc_html_e('Choose Alignment: ', 'udesign'); ?>
						<select name="udesign_options[pm2_controls_align]" id="pm2_controls_align">
						    <option value="center"<?php echo ($options['pm2_controls_align'] == 'center') ? ' selected="selected"' : ''; ?> style="padding-right:9px;"><?php esc_attr_e('center', 'udesign'); ?> </option>
						    <option value="left"<?php echo ($options['pm2_controls_align'] == 'left') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'udesign'); ?></option>
						    <option value="right"<?php echo ($options['pm2_controls_align'] == 'right') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'udesign'); ?></option>
						</select>
					</label>
					<?php esc_html_e('Type of alignment from the point [controlsX, controlsY] - can be "center", "left" or "right".', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>
		    </div><!-- END Controls -->

		    <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Toolstips:', 'udesign'); ?></h2>
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_tooltip_height"><?php esc_html_e('Tooltip Height', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_height]" type="text" id="pm2_tooltip_height" value="<?php echo esc_attr($options['pm2_tooltip_height']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Height of the tooltip surface in the menu.', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Tooltip Color', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2TooltipColor">
					    <div style="background-color: #<?php echo ($options['pm2_tooltip_color']) ? esc_attr($options['pm2_tooltip_color']) : '222222'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_tooltip_color]" id="pm2_tooltip_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_tooltip_color']) ? esc_attr($options['pm2_tooltip_color']) : '222222'; ?>" />
					<?php esc_html_e('Color of the tooltip surface in the menu.', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_tooltip_text_y"><?php esc_html_e('Tooltip Text Y', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_text_y]" type="text" id="pm2_tooltip_text_y" value="<?php echo esc_attr($options['pm2_tooltip_text_y']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Y-distance of the tooltip text field from the top of the tooltip.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Tooltip Text Style', 'udesign'); ?></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_text_style]" type="text" id="pm2_tooltip_text_style" value="<?php if ($options['pm2_tooltip_text_style']) { echo esc_attr($options['pm2_tooltip_text_style']); } ?>" size="15" maxlength="50" />
					<?php esc_html_e('The style of the tooltip text, specified in the CSS file. Default: "P-Italic"', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Tooltip Text Color', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2TooltipTextColor">
					    <div style="background-color: #<?php echo ($options['pm2_tooltip_text_color']) ? esc_attr($options['pm2_tooltip_text_color']) : 'FFFFFF'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_tooltip_text_color]" id="pm2_tooltip_text_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_tooltip_text_color']) ? esc_attr($options['pm2_tooltip_text_color']) : 'FFFFFF'; ?>" />
					<?php esc_html_e('Color of the tooltip text.', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_tooltip_margin_left"><?php esc_html_e('Tooltip Margin Left', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_margin_left]" type="text" id="pm2_tooltip_margin_left" value="<?php echo esc_attr($options['pm2_tooltip_margin_left']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Margin of the text to the left end of the tooltip.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_tooltip_margin_right"><?php esc_html_e('Tooltip Margin Right', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_margin_right]" type="text" id="pm2_tooltip_margin_right" value="<?php echo esc_attr($options['pm2_tooltip_margin_right']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('Margin of the text to the right end of the tooltip.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_tooltip_text_sharpness"><?php esc_html_e('Tooltip Text Sharpness', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_text_sharpness]" type="text" id="pm2_tooltip_text_sharpness" value="<?php echo esc_attr($options['pm2_tooltip_text_sharpness']); ?>" size="5" maxlength="5" />
					<span><?php  printf( __('Sharpness of the tooltip text (-400 to 400). %1$sMore info%2$s', 'udesign'), '<a target="_blank" href="http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/text/TextField.html#sharpness">', '</a>' ); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_tooltip_text_thickness"><?php esc_html_e('Tooltip Text Thickness', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_tooltip_text_thickness]" type="text" id="pm2_tooltip_text_thickness" value="<?php echo esc_attr($options['pm2_tooltip_text_thickness']); ?>" size="5" maxlength="5" />
					<span><?php  printf( __('Thickness of the tooltip text (-400 to 400). %1$sMore info%2$s', 'udesign'), '<a target="_blank" href="http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/text/TextField.html#thickness">', '</a>' ); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>
		    </div><!-- END Tooltips -->

		    <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Info Text:', 'udesign'); ?></h2>
			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_info_width"><?php esc_html_e('Info Width', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_info_width]" type="text" id="pm2_info_width" value="<?php echo esc_attr($options['pm2_info_width']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('The width of the info text field.', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><?php esc_html_e('Info Background', 'udesign'); ?></th>
				    <td style="width:37px; padding:4px 4px">
					<div id="pm2InfoBackground">
					    <div style="background-color: #<?php echo ($options['pm2_info_background']) ? esc_attr($options['pm2_info_background']) : 'FFFFFF'; ?>;"></div>
					</div>
				    </td>
				    <td>
					<input name="udesign_options[pm2_info_background]" id="pm2_info_background" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($options['pm2_info_background']) ? esc_attr($options['pm2_info_background']) : 'FFFFFF'; ?>" />
					<?php esc_html_e('The background color of the info text field.', 'udesign'); ?>
				    </td>
				</tr>
			    </tbody>
			</table>

			<table class="form-table">
			    <tbody>
				<tr valign="top">
				    <th scope="row"><label for="pm2_info_background_alpha"><?php esc_html_e('Info Background Alpha', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_info_background_alpha]" type="text" id="pm2_info_background_alpha" value="<?php echo esc_attr($options['pm2_info_background_alpha']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('The alpha of the background of the info text, the image shines through, when smaller than 1.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_info_margin"><?php esc_html_e('Info Margin', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_info_margin]" type="text" id="pm2_info_margin" value="<?php echo esc_attr($options['pm2_info_margin']); ?>" size="5" maxlength="4" />
					<span><?php esc_html_e('The margin of the text field in the info section to all sides.', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_info_sharpness"><?php esc_html_e('Info Sharpness', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_info_sharpness]" type="text" id="pm2_info_sharpness" value="<?php echo esc_attr($options['pm2_info_sharpness']); ?>" size="5" maxlength="5" />
					<span><?php esc_html_e('Sharpness of the info text (-400 to 400).', 'udesign'); ?></span>
				    </td>
				</tr>
				<tr valign="top">
				    <th scope="row"><label for="pm2_info_thickness"><?php esc_html_e('Info Thickness', 'udesign'); ?></label></th>
				    <td>
					<input name="udesign_options[pm2_info_thickness]" type="text" id="pm2_info_thickness" value="<?php echo esc_attr($options['pm2_info_thickness']); ?>" size="5" maxlength="5" />
					<span><?php esc_html_e('Thickness of the info text (-400 to 400).', 'udesign'); ?></span>
				    </td>
				</tr>
			    </tbody>
			</table>
		    </div><!-- END Info Text -->

		    <?php display_save_changes_button(); ?>

		    <h2 style="color:#2680AA; margin-top: 2px; padding:0 10px 0;"><?php esc_html_e('Piecemaker 2 Slides:', 'udesign'); ?></h2>
		    <input name="udesign_options[pm2_slides_order_str]" type="hidden" id="pm2_slides_order_str" value="<?php if ($pm2_slides_order_str){ echo esc_attr($pm2_slides_order_str); }?>" />
		    <div class="add-image-row" style></div> <div class="add-flash-row" style></div> <div class="add-video-row" style></div>
		    <table id="pm2-table-slides" class="pm2-table-slides">
			<tbody>
<?php			    foreach( $pm2_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo $slide_row_number; ?>" class="row-style-<?php echo ($options['pm2_slide_type_'.$slide_row_number]); ?>">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo $position+1; ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<!-- hidden field for curent slide's type, e.g. 'image', 'flash', 'video': -->
					<input class="pm2_slide_type" name="udesign_options[pm2_slide_type_<?php echo $slide_row_number; ?>]" type="hidden" id="pm2_slide_type_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['pm2_slide_type_'.$slide_row_number]); ?>" />
<?php					// If Image Slide
					if ( $options['pm2_slide_type_'.$slide_row_number] == 'image') : ?>
						<div class="pm2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                                    <label for="pm2_slide_img_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                                    <input class="pm2_slide_img_url_field" name="udesign_options[pm2_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm2_slide_img_url_'.$slide_row_number]){ echo esc_url($options['pm2_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                                    <input id="pm2_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm2_slide_img_url_btn" />
                                                    <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                                </div>
                                                <div class="clear"></div>
						<div class="pm2_slide_img_title" style="padding:10px 5px 0 0; float:left;">
						    <label for="pm2_slide_img_title_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Title:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_slide_img_title_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_img_title_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['pm2_slide_img_title_'.$slide_row_number]); ?>" size="20" />
						</div>
						<div id="pm2_slide_link_url_<?php echo $slide_row_number; ?>" class="slide-link" style="padding:10px 5px 0; float:left;">
						    <label for="pm2_slide_link_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Link:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_slide_link_url_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_link_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm2_slide_link_url_'.$slide_row_number]){ echo esc_url($options['pm2_slide_link_url_'.$slide_row_number]); }?>" size="30" />
						    <label for="pm2_slide_link_target_<?php echo $slide_row_number; ?>" style="font-weight:bold;">
							<?php esc_html_e('Target: ', 'udesign'); ?>
							<select name="udesign_options[pm2_slide_link_target_<?php echo $slide_row_number; ?>]" id="pm2_slide_link_target_<?php echo $slide_row_number; ?>">
							    <option value="self"<?php echo ($options['pm2_slide_link_target_'.$slide_row_number] == 'self') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'udesign'); ?></option>
							    <option value="blank"<?php echo ($options['pm2_slide_link_target_'.$slide_row_number] == 'blank') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'udesign'); ?></option>
							</select>
						    </label>
						</div>
						<div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; display:inline;">
						    <strong><?php esc_html_e('Slide text', 'udesign'); ?></strong>:<br />
						    <textarea name="udesign_options[pm2_slide_default_info_txt_<?php echo $slide_row_number; ?>]" class="code"
								style="width:98%; font-size:12px; margin: 5px 0;" id="pm2_slide_default_info_txt_<?php echo $slide_row_number; ?>"
								rows="3" cols="60"><?php echo ( $options['pm2_slide_default_info_txt_'.$slide_row_number] ) ? esc_attr($options['pm2_slide_default_info_txt_'.$slide_row_number]) : ''; ?></textarea>
						    <br />
						    <span class="description" style="margin:20px 0; line-height:1.5; font-size:12px;"><?php esc_html_e('To remove the text just leave a single space.', 'udesign'); ?></span>
						</div>
<?php					// If Flash Slide
					elseif ( $options['pm2_slide_type_'.$slide_row_number] == 'flash') : ?> 
						<div class="pm2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                                    <label for="pm2_slide_img_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                                    <input class="pm2_slide_img_url_field" name="udesign_options[pm2_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm2_slide_img_url_'.$slide_row_number]){ echo esc_url($options['pm2_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                                    <input id="pm2_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm2_slide_img_url_btn" />
                                                    <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                                </div>
                                                <div class="clear"></div>
						<div class="pm2_slide_img_title" style="padding:10px 0 0; clear:both;">
						    <label for="pm2_slide_img_title_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Title Attribute:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_slide_img_title_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_img_title_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['pm2_slide_img_title_'.$slide_row_number]); ?>" size="40" /><br />
						    <span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(The title attribute will be shown in the tooltip on the menu)', 'udesign'); ?></span>
						</div>
						<div class="flash-link" id="pm2_flash_link_url_<?php echo $slide_row_number; ?>" style="padding:10px 0 0; clear:both;">
						    <label class="flash-url" for="pm2_flash_link_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('SWF Link:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_flash_link_url_<?php echo $slide_row_number; ?>]" type="text" id="pm2_flash_link_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm2_flash_link_url_'.$slide_row_number]){ echo esc_url($options['pm2_flash_link_url_'.$slide_row_number]); }?>" size="60" /><br />
						    <span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(Paste the URL to the SWF file here. Should be on same Server)', 'udesign'); ?></span>
						</div>
<?php					// If Video Slide
					elseif ( $options['pm2_slide_type_'.$slide_row_number] == 'video') : ?>
						<div class="pm2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                                    <label for="pm2_slide_img_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                                    <input class="pm2_slide_img_url_field" name="udesign_options[pm2_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm2_slide_img_url_'.$slide_row_number]){ echo esc_url($options['pm2_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                                    <input id="pm2_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm2_slide_img_url_btn" />
                                                    <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                                </div>
                                                <div class="clear"></div>
						<div class="pm2_slide_img_title" style="padding:10px 0 0; clear:both;">
						    <label for="pm2_slide_img_title_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Title Attribute:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_slide_img_title_<?php echo $slide_row_number; ?>]" type="text" id="pm2_slide_img_title_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['pm2_slide_img_title_'.$slide_row_number]); ?>" size="40" /><br />
						    <span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(The title attribute will be shown in the tooltip on the menu)', 'udesign'); ?></span>
						</div>
						<div class="video-link" id="pm2_video_link_url_<?php echo $slide_row_number; ?>" style="padding:10px 0 0; clear:both;">
						    <label class="video-url" for="pm2_video_link_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Video Link:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_video_link_url_<?php echo $slide_row_number; ?>]" type="text" id="pm2_video_link_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['pm2_video_link_url_'.$slide_row_number]){ echo esc_url($options['pm2_video_link_url_'.$slide_row_number]); }?>" size="60" /><br />
						    <span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(Paste the URL to the video file here. Should be on same Server. Accepted file formats are MPEG4 with H.264 Codec, as well as F4V and FLV)', 'udesign'); ?></span>
						</div>
						<div class="pm2_video_width" style="padding:10px 20px 0 0; float:left;">
						    <label for="pm2_video_width_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Width:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_video_width_<?php echo $slide_row_number; ?>]" type="text" id="pm2_video_width_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['pm2_video_width_'.$slide_row_number]); ?>" size="5" maxlength="4" />px
						</div>
						<div class="pm2_video_height" style="padding:10px 20px 0 0; float:left;">
						    <label for="pm2_video_height_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Height:', 'udesign'); ?> </label>
						    <input name="udesign_options[pm2_video_height_<?php echo $slide_row_number; ?>]" type="text" id="pm2_video_height_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['pm2_video_height_'.$slide_row_number]); ?>" size="5" maxlength="4" />px
						</div>
						<div class="pm2_video_autoplay" style="padding:10px 20px 0 0; float:left;">
						    <label for="pm2_video_autoplay_<?php echo $slide_row_number; ?>" style="font-weight:bold;">
							<?php esc_html_e('Autoplay: ', 'udesign'); ?>
							<select name="udesign_options[pm2_video_autoplay_<?php echo $slide_row_number; ?>]" id="pm2_video_autoplay_<?php echo $slide_row_number; ?>">
								<option value="yes"<?php echo ($options['pm2_video_autoplay_'.$slide_row_number] == 'yes') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_html_e('Yes', 'udesign'); ?></option>
								<option value="no"<?php echo ($options['pm2_video_autoplay_'.$slide_row_number] == 'no') ? ' selected="selected"' : ''; ?>><?php esc_html_e('No', 'udesign'); ?></option>
							</select>
						    </label>
						</div>
<?php					endif; ?>
				    </td>
				</tr>
<?php			    endforeach; ?>
			</tbody>
		    </table>
		    <table id="pm2-image-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style-image">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <!-- hidden field for current slide's type, e.g. 'image', 'flash', 'video': -->
				    <input class="pm2_slide_type" name="udesign_options[pm2_slide_type_999]" type="hidden" id="pm2_slide_type_999" value="image" />
				    <div class="pm2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label for="pm2_slide_img_url_999" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="pm2_slide_img_url_field" name="udesign_options[pm2_slide_img_url_999]" type="text" id="pm2_slide_img_url_999" value="" size="65" />
                                        <input id="pm2_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm2_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                    </div>
                                    <div class="clear"></div>
				    <div class="pm2_slide_img_title" style="padding:10px 5px 0 0; float:left;">
					<label for="pm2_slide_img_title_999" style="font-weight:bold;"><?php esc_html_e('Title:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_slide_img_title_999]" type="text" id="pm2_slide_img_title_999" value="Title" size="20" />
				    </div>
				    <div id="pm2_slide_link_url_999" class="slide-link" style="padding:10px 5px 0; float:left;">
					<label for="pm2_slide_link_url_999" class="link-url" style="font-weight:bold;"><?php esc_html_e('Link:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_slide_link_url_999]" type="text" id="pm2_slide_link_url_999" value="" size="30" />
					<label for="pm2_slide_link_target_999" class="link-target" style="font-weight:bold;">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[pm2_slide_link_target_999]" id="pm2_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					</label>
				    </div>
				    <div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; display:inline;">
					<strong><?php esc_html_e('Slide text', 'udesign'); ?></strong>:<br />
					<textarea name="udesign_options[pm2_slide_default_info_txt_999]" class="code"
						    style="width:98%; font-size:12px; margin: 5px 0;" id="pm2_slide_default_info_txt_999"
						    rows="3" cols="60"><?php echo get_pm2_slide_default_info_txt(); ?></textarea>
					<br />
					<span class="description" style="margin:20px 0; line-height:1.5; font-size:12px;"><?php esc_html_e('To remove the text just leave a single space.', 'udesign'); ?></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table id="pm2-flash-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style-flash">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <!-- hidden field for current slide's type, e.g. 'image', 'flash', 'video': -->
				    <input class="pm2_slide_type" name="udesign_options[pm2_slide_type_999]" type="hidden" id="pm2_slide_type_999" value="flash" />
				    <div class="pm2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label for="pm2_slide_img_url_999" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="pm2_slide_img_url_field" name="udesign_options[pm2_slide_img_url_999]" type="text" id="pm2_slide_img_url_999" value="" size="65" />
                                        <input id="pm2_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm2_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                    </div>
                                    <div class="clear"></div>
				    <div class="pm2_slide_img_title" style="padding:10px 0 0; clear:both;">
					<label for="pm2_slide_img_title_999" style="font-weight:bold;"><?php esc_html_e('Title Attribute:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_slide_img_title_999]" type="text" id="pm2_slide_img_title_999" value="Title" size="40" /><br />
					<span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(The title attribute will be shown in the tooltip on the menu)', 'udesign'); ?></span>
				    </div>
				    <div class="flash-link" id="pm2_flash_link_url_999" style="padding:10px 0 0; clear:both;">
					<label class="flash-url" for="pm2_flash_link_url_999" style="font-weight:bold;"><?php esc_html_e('SWF Link:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_flash_link_url_999]" type="text" id="pm2_flash_link_url_999" value="" size="60" /><br />
					<span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(Paste the URL to the SWF file here. Should be on same Server)', 'udesign'); ?></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table id="pm2-video-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style-video">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <!-- hidden field for current slide's type, e.g. 'image', 'flash', 'video': -->
				    <input class="pm2_slide_type" name="udesign_options[pm2_slide_type_999]" type="hidden" id="pm2_slide_type_999" value="video" />
				    <div class="pm2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label for="pm2_slide_img_url_999" style="font-weight:bold;"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="pm2_slide_img_url_field" name="udesign_options[pm2_slide_img_url_999]" type="text" id="pm2_slide_img_url_999" value="" size="65" />
                                        <input id="pm2_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary pm2_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                    </div>
                                    <div class="clear"></div>
				    <div class="pm2_slide_img_title" style="padding:10px 0 0; clear:both;">
					<label for="pm2_slide_img_title_999" style="font-weight:bold;"><?php esc_html_e('Title Attribute:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_slide_img_title_999]" type="text" id="pm2_slide_img_title_999" value="Title" size="40" /><br />
					<span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(The title attribute will be shown in the tooltip on the menu)', 'udesign'); ?></span>
				    </div>
				    <div class="video-link" id="pm2_video_link_url_999" style="padding:10px 0 0; clear:both;">
					<label class="video-url" for="pm2_video_link_url_999" style="font-weight:bold;"><?php esc_html_e('Video Link:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_video_link_url_999]" type="text" id="pm2_video_link_url_999" value="" size="60" /><br />
					<span class="description" style="margin:20px 0; line-height:1.5; font-size:10px;"><?php esc_html_e('(Paste the URL to the FLV file here. Should be on same Server. Accepted file formats are MPEG4 with H.264 Codec, as well as F4V and FLV)', 'udesign'); ?></span>
				    </div>
				    <div class="pm2_video_width" style="padding:10px 20px 0 0; float:left;">
					<label for="pm2_video_width_999" style="font-weight:bold;"><?php esc_html_e('Width:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_video_width_999]" type="text" id="pm2_video_width_999" value="910" size="5" maxlength="4" />px
				    </div>
				    <div class="pm2_video_height" style="padding:10px 20px 0 0; float:left;">
					<label for="pm2_video_height_999" style="font-weight:bold;"><?php esc_html_e('Height:', 'udesign'); ?> </label>
					<input name="udesign_options[pm2_video_height_999]" type="text" id="pm2_video_height_999" value="365" size="5" maxlength="4" />px
				    </div>
				    <div class="pm2_video_autoplay" style="padding:10px 20px 0 0; float:left;">
					<label for="pm2_video_autoplay_999" style="font-weight:bold;">
					    <?php esc_html_e('Autoplay: ', 'udesign'); ?> 
					    <select name="udesign_options[pm2_video_autoplay_999]" id="pm2_video_autoplay_999">
						    <option value="yes" selected="selected" style="padding-right:10px;"><?php esc_html_e('Yes', 'udesign'); ?></option>
						    <option value="no"><?php esc_html_e('No', 'udesign'); ?></option>
					    </select>
					</label>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>
<?php		    display_save_changes_button(); ?>

		    <div style="margin:20px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
			<h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Piecemaker 2 Transitions:', 'udesign'); ?></h2>
			<p style="margin: 0 0 10px; font-size: 12px;"><?php esc_html_e('You can add as many transitions to the Piecemaker 2 as you want. These transitions will be started in the order they are specified below. This order is entirely independent from the order of the slides above. Once the last transition is reached, it starts over again with the first transition.', 'udesign'); ?></p>
			<p style="margin: 5px 0 10px; font-size: 12px;"><?php esc_html_e('Every transition needs to have the following six attributes assigned to it:', 'udesign'); ?></p>
			<ul>
			    <li><strong><?php esc_html_e('Pieces', 'udesign'); ?></strong> - <?php esc_html_e('Number of pieces to which the image is sliced.', 'udesign'); ?></li>
			    <li><strong><?php esc_html_e('Time', 'udesign'); ?></strong> - <?php esc_html_e('Time for one cube to turn.', 'udesign'); ?></li>
			    <li><strong><?php esc_html_e('Transition', 'udesign'); ?></strong> - <?php esc_html_e('Transition type of the Tweener class. For more info on these types see the official Tweener Documentation and go to "Transition Types". The best results are achieved by those transition types, which begin with easeInOut.', 'udesign'); ?></li>
			    <li><strong><?php esc_html_e('Delay', 'udesign'); ?></strong> - <?php esc_html_e('Delay between the start of one cube to the start of the next cube.', 'udesign'); ?></li>
			    <li><strong><?php esc_html_e('Depth Offset', 'udesign'); ?></strong> - <?php esc_html_e('The offset during transition on the z-axis. Value between 100 and 1000 are recommended. But go for experiments.', 'udesign'); ?> :)</li>
			    <li><strong><?php esc_html_e('Cube Distance', 'udesign'); ?></strong> - <?php esc_html_e('The distance between the cubes during transition. Values between 5 and 50 are recommended. But go for experiments.', 'udesign'); ?> :)</li>
			</ul>
			<div class="clear"></div>

			<input name="udesign_options[pm2_transitions_order_str]" type="hidden" id="pm2_transitions_order_str" value="<?php if ($pm2_transitions_order_str){ echo esc_attr($pm2_transitions_order_str); }?>" />
			<div class="add-transition-row" style></div>
			<table id="pm2-table-transitions" class="pm2-table-transitions">
			    <tbody>
<?php			    foreach( $pm2_transitions_array as $tr_position=>$transition_row_number ) : ?>
				    <tr id="<?php echo $transition_row_number; ?>" class="row-style">
					<td class="transitionDragHandle showDragHandleCloser" style="width:30px; padding:10px 20px;">&nbsp;</td>
					<td class="deleteTransition" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
					<td class="position" style="padding:10px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:82px"><?php echo $tr_position+1; ?></td>
					<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					    <div class="pm2_transition_pieces" style="padding:12px 20px 0 0; float:left;">
						<label for="pm2_transition_pieces_<?php echo $transition_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Pieces:', 'udesign'); ?> </label><br />
						<input name="udesign_options[pm2_transition_pieces_<?php echo $transition_row_number; ?>]" type="text" id="pm2_transition_pieces_<?php echo $transition_row_number; ?>" value="<?php echo esc_attr($options['pm2_transition_pieces_'.$transition_row_number]); ?>" size="5" maxlength="2" />
					    </div>
					    <div class="pm2_transition_time" style="padding:12px 20px 0 0; float:left;">
						<label for="pm2_transition_time_<?php echo $transition_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Time:', 'udesign'); ?> </label><br />
						<input name="udesign_options[pm2_transition_time_<?php echo $transition_row_number; ?>]" type="text" id="pm2_transition_time_<?php echo $transition_row_number; ?>" value="<?php echo esc_attr($options['pm2_transition_time_'.$transition_row_number]); ?>" size="5" maxlength="4" />
					    </div>
					    <div class="transition-type" style="padding:12px 20px 0 0; float:left;">
						<label for="pm2_transition_type_<?php echo $transition_row_number; ?>" style="font-weight:bold;">
						    <?php esc_html_e('Transition: ', 'udesign'); ?><br />
						    <select name="udesign_options[pm2_transition_type_<?php echo $transition_row_number; ?>]" id="pm2_transition_type_<?php echo $transition_row_number; ?>">
							    <option value="easeInOutBack"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutBack') ? ' selected="selected"' : ''; ?>>easeInOutBack</option>
							    <option value="easeOutInBack"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInBack') ? ' selected="selected"' : ''; ?>>easeOutInBack</option>
							    <option value="easeOutBack"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutBack') ? ' selected="selected"' : ''; ?>>easeOutBack</option>
							    <option value="easeInBack"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInBack') ? ' selected="selected"' : ''; ?>>easeInBack</option>
							    <option value="easeInBounce"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInBounce') ? ' selected="selected"' : ''; ?>>easeInBounce</option>
							    <option value="easeOutBounce"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutBounce') ? ' selected="selected"' : ''; ?>>easeOutBounce</option>
							    <option value="easeInOutBounce"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutBounce') ? ' selected="selected"' : ''; ?>>easeInOutBounce</option>
							    <option value="easeOutInBounce"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInBounce') ? ' selected="selected"' : ''; ?>>easeOutInBounce</option>
							    <option value="easeInCirc"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInCirc') ? ' selected="selected"' : ''; ?>>easeInCirc</option>
							    <option value="easeOutCirc"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutCirc') ? ' selected="selected"' : ''; ?>>easeOutCirc</option>
							    <option value="easeInOutCirc"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutCirc') ? ' selected="selected"' : ''; ?>>easeInOutCirc</option>
							    <option value="easeOutInCirc"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInCirc') ? ' selected="selected"' : ''; ?>>easeOutInCirc</option>
							    <option value="easeInElastic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInElastic') ? ' selected="selected"' : ''; ?>>easeInElastic</option>
							    <option value="easeOutElastic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutElastic') ? ' selected="selected"' : ''; ?>>easeOutElastic</option>
							    <option value="easeInOutElastic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutElastic') ? ' selected="selected"' : ''; ?>>easeInOutElastic</option>
							    <option value="easeOutInElastic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInElastic') ? ' selected="selected"' : ''; ?>>easeOutInElastic</option>
							    <option value="easeInQuint"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInQuint') ? ' selected="selected"' : ''; ?>>easeInQuint</option>
							    <option value="easeOutQuint"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutQuint') ? ' selected="selected"' : ''; ?>>easeOutQuint</option>
							    <option value="easeInOutQuint"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutQuint') ? ' selected="selected"' : ''; ?>>easeInOutQuint</option>
							    <option value="easeOutInQuint"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInQuint') ? ' selected="selected"' : ''; ?>>easeOutInQuint</option>
							    <option value="easeInExpo"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInExpo') ? ' selected="selected"' : ''; ?>>easeInExpo</option>
							    <option value="easeOutExpo"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutExpo') ? ' selected="selected"' : ''; ?>>easeOutExpo</option>
							    <option value="easeInOutExpo"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutExpo') ? ' selected="selected"' : ''; ?>>easeInOutExpo</option>
							    <option value="easeOutInExpo"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInExpo') ? ' selected="selected"' : ''; ?>>easeOutInExpo</option>
							    <option value="easeInCubic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInCubic') ? ' selected="selected"' : ''; ?>>easeInCubic</option>
							    <option value="easeOutCubic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutCubic') ? ' selected="selected"' : ''; ?>>easeOutCubic</option>
							    <option value="easeInOutCubic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutCubic') ? ' selected="selected"' : ''; ?>>easeInOutCubic</option>
							    <option value="easeOutInCubic"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInCubic') ? ' selected="selected"' : ''; ?>>easeOutInCubic</option>
							    <option value="easeInQuart"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInQuart') ? ' selected="selected"' : ''; ?>>easeInQuart</option>
							    <option value="easeOutQuart"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutQuart') ? ' selected="selected"' : ''; ?>>easeOutQuart</option>
							    <option value="easeInOutQuart"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutQuart') ? ' selected="selected"' : ''; ?>>easeInOutQuart</option>
							    <option value="easeOutInQuart"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInQuart') ? ' selected="selected"' : ''; ?>>easeOutInQuart</option>
							    <option value="easeInSine"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInSine') ? ' selected="selected"' : ''; ?>>easeInSine</option>
							    <option value="easeOutSine"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutSine') ? ' selected="selected"' : ''; ?>>easeOutSine</option>
							    <option value="easeInOutSine"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutSine') ? ' selected="selected"' : ''; ?>>easeInOutSine</option>
							    <option value="easeOutInSine"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInSine') ? ' selected="selected"' : ''; ?>>easeOutInSine</option>
							    <option value="easeInQuad"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInQuad') ? ' selected="selected"' : ''; ?>>easeInQuad</option>
							    <option value="easeOutQuad"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutQuad') ? ' selected="selected"' : ''; ?>>easeOutQuad</option>
							    <option value="easeInOutQuad"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeInOutQuad') ? ' selected="selected"' : ''; ?>>easeInOutQuad</option>
							    <option value="easeOutInQuad"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'easeOutInQuad') ? ' selected="selected"' : ''; ?>>easeOutInQuad</option>
							    <option value="linear"<?php echo ($options['pm2_transition_type_'.$transition_row_number] == 'linear') ? ' selected="selected"' : ''; ?>>linear</option>
						    </select>
						</label>
					    </div>
					    <div class="pm2_transition_delay" style="padding:12px 20px 0 0; float:left;">
						<label for="pm2_transition_delay_<?php echo $transition_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Delay:', 'udesign'); ?> </label><br />
						<input name="udesign_options[pm2_transition_delay_<?php echo $transition_row_number; ?>]" type="text" id="pm2_transition_delay_<?php echo $transition_row_number; ?>" value="<?php echo esc_attr($options['pm2_transition_delay_'.$transition_row_number]); ?>" size="5" maxlength="4" />
					    </div>
					    <div class="pm2_depth_offset" style="padding:12px 20px 0 0; float:left;">
						<label for="pm2_depth_offset_<?php echo $transition_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Depth Offset:', 'udesign'); ?> </label><br />
						<input name="udesign_options[pm2_depth_offset_<?php echo $transition_row_number; ?>]" type="text" id="pm2_depth_offset_<?php echo $transition_row_number; ?>" value="<?php echo esc_attr($options['pm2_depth_offset_'.$transition_row_number]); ?>" size="5" maxlength="5" />
					    </div>
					    <div class="pm2_cube_distance" style="padding:12px 20px 0 0; float:left;">
						<label for="pm2_cube_distance_<?php echo $transition_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Cube Distance:', 'udesign'); ?> </label><br />
						<input name="udesign_options[pm2_cube_distance_<?php echo $transition_row_number; ?>]" type="text" id="pm2_cube_distance_<?php echo $transition_row_number; ?>" value="<?php echo esc_attr($options['pm2_cube_distance_'.$transition_row_number]); ?>" size="5" maxlength="4" />
					    </div>
					</td>
				    </tr>
<?php			    endforeach; ?>
			    </tbody>
			</table>
			<table id="pm2-transition-clone-table" style="display:none;">
			    <tbody>
				<tr id="999" class="row-style">
				    <td class="transitionDragHandle showDragHandleCloser" style="width:30px; padding:10px 20px;">&nbsp;</td>
				    <td class="deleteTransition" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:10px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:82px">999</td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<div class="pm2_transition_pieces" style="padding:12px 20px 0 0; float:left;">
					    <label for="pm2_transition_pieces_999" style="font-weight:bold;"><?php esc_html_e('Pieces:', 'udesign'); ?> </label><br />
					    <input name="udesign_options[pm2_transition_pieces_999]" type="text" id="pm2_transition_pieces_999" value="9" size="5" maxlength="2" />
					</div>
					<div class="pm2_transition_time" style="padding:12px 20px 0 0; float:left;">
					    <label for="pm2_transition_time_999" style="font-weight:bold;"><?php esc_html_e('Time:', 'udesign'); ?> </label><br />
					    <input name="udesign_options[pm2_transition_time_999]" type="text" id="pm2_transition_time_999" value="1.2" size="5" maxlength="4" />
					</div>
					<div class="transition-type" style="padding:12px 20px 0 0; float:left;">
					    <label for="pm2_transition_type_999" style="font-weight:bold;">
						    <?php esc_html_e('Transition: ', 'udesign'); ?><br />
						    <select name="udesign_options[pm2_transition_type_999]" id="pm2_transition_type_999">
							    <option value="easeInOutBack" selected="selected">easeInOutBack</option>
							    <option value="easeOutInBack">easeOutInBack</option>
							    <option value="easeOutBack">easeOutBack</option>
							    <option value="easeInBack">easeInBack</option>
							    <option value="easeInBounce">easeInBounce</option>
							    <option value="easeOutBounce">easeOutBounce</option>
							    <option value="easeInOutBounce">easeInOutBounce</option>
							    <option value="easeOutInBounce">easeOutInBounce</option>
							    <option value="easeInCirc">easeInCirc</option>
							    <option value="easeOutCirc">easeOutCirc</option>
							    <option value="easeInOutCirc">easeInOutCirc</option>
							    <option value="easeOutInCirc">easeOutInCirc</option>
							    <option value="easeInElastic">easeInElastic</option>
							    <option value="easeOutElastic">easeOutElastic</option>
							    <option value="easeInOutElastic">easeInOutElastic</option>
							    <option value="easeOutInElastic">easeOutInElastic</option>
							    <option value="easeInQuint">easeInQuint</option>
							    <option value="easeOutQuint">easeOutQuint</option>
							    <option value="easeInOutQuint">easeInOutQuint</option>
							    <option value="easeOutInQuint">easeOutInQuint</option>
							    <option value="easeInExpo">easeInExpo</option>
							    <option value="easeOutExpo">easeOutExpo</option>
							    <option value="easeInOutExpo">easeInOutExpo</option>
							    <option value="easeOutInExpo">easeOutInExpo</option>
							    <option value="easeInCubic">easeInCubic</option>
							    <option value="easeOutCubic">easeOutCubic</option>
							    <option value="easeInOutCubic">easeInOutCubic</option>
							    <option value="easeOutInCubic">easeOutInCubic</option>
							    <option value="easeInQuart">easeInQuart</option>
							    <option value="easeOutQuart">easeOutQuart</option>
							    <option value="easeInOutQuart">easeInOutQuart</option>
							    <option value="easeOutInQuart">easeOutInQuart</option>
							    <option value="easeInSine">easeInSine</option>
							    <option value="easeOutSine">easeOutSine</option>
							    <option value="easeInOutSine">easeInOutSine</option>
							    <option value="easeOutInSine">easeOutInSine</option>
							    <option value="easeInQuad">easeInQuad</option>
							    <option value="easeOutQuad">easeOutQuad</option>
							    <option value="easeInOutQuad">easeInOutQuad</option>
							    <option value="easeOutInQuad">easeOutInQuad</option>
							    <option value="linear">linear</option>
						    </select>
					    </label>
					</div>
					<div class="pm2_transition_delay" style="padding:12px 20px 0 0; float:left;">
					    <label for="pm2_transition_delay_999" style="font-weight:bold;"><?php esc_html_e('Delay:', 'udesign'); ?> </label><br />
					    <input name="udesign_options[pm2_transition_delay_999]" type="text" id="pm2_transition_delay_999" value="0.1" size="5" maxlength="4" />
					</div>
					<div class="pm2_depth_offset" style="padding:12px 20px 0 0; float:left;">
					    <label for="pm2_depth_offset_999" style="font-weight:bold;"><?php esc_html_e('Depth Offset:', 'udesign'); ?> </label><br />
					    <input name="udesign_options[pm2_depth_offset_999]" type="text" id="pm2_depth_offset_999" value="300" size="5" maxlength="5" />
					</div>
					<div class="pm2_cube_distance" style="padding:12px 20px 0 0; float:left;">
					    <label for="pm2_cube_distance_999" style="font-weight:bold;"><?php esc_html_e('Cube Distance:', 'udesign'); ?> </label><br />
					    <input name="udesign_options[pm2_cube_distance_999]" type="text" id="pm2_cube_distance_999" value="30" size="5" maxlength="4" />
					</div>
				    </td>
				</tr>
			    </tbody>
			</table>
			<div class="clear"></div>
		    </div>


		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('No JavaScript image', 'udesign'); ?></th>
				<td>
				    <?php esc_html_e('Paste the full path to your image:', 'udesign'); ?><br />
				    <textarea style="width: 98%;" id="pm2_no_js_img" rows="2" cols="60" name="udesign_options[pm2_no_js_img]"><?php if( $options['pm2_no_js_img'] ){ echo esc_url($options['pm2_no_js_img']); } ?></textarea><br />
				    <span class="description"><?php esc_html_e('In the case when JavaScript is disabled the 1st slider image is displayed by default in place of the Piecemaker 2 slider, you may change that in here', 'udesign'); ?></span>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '4' ) :
		    $c1_slides_order_str = $options['c1_slides_order_str'];
		    $c1_slides_array = explode( ',', $options['c1_slides_order_str'] );
		    $c1_speed = $options['c1_speed'];
		    $c1_timeout = $options['c1_timeout'];
		    $c1_sync = $options['c1_sync']; // see the other slides' forms to add an invisible instance of this checkbox to preserver the state
		    $c1_remove_3d_shadow = $options['c1_remove_3d_shadow'];  ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Cycle 1 Slider Settings:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="c1_speed"><?php esc_html_e('Transition Speed', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[c1_speed]" type="text" id="c1_speed" value="<?php echo esc_attr($c1_speed); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Speed of the transition.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="c1_timeout"><?php esc_html_e('Timeout', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[c1_timeout]" type="text" id="c1_timeout" value="<?php echo esc_attr($c1_timeout); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Milliseconds between slide transitions (0 to disable auto advance).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Sync', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Sync', 'udesign'); ?></span></legend>
				    <label for="c1_sync">
					<input name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $c1_sync); ?> />
					<?php esc_html_e('Toggle this option to see how some effects behave differently (such as blind, curtain, and zoom).', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Image Frame', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Image Frame', 'udesign'); ?></span></legend>
				    <label for="c1_remove_image_frame">
					<input name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
					<?php esc_html_e('Remove the image frame with the border around the image?', 'udesign'); ?><br />
					<span class="description"><?php esc_html_e('With the frame enabled (default state) image dimension is 914px by 374px (width by height). Without the frame image dimension is 940px by 400px. Depending on which option is selected, create and upload images with the corresponding dimensions for optimal quality.', 'udesign'); ?></span>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('3D Shadow', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('3D Shadow', 'udesign'); ?></span></legend>
				    <label for="c1_remove_3d_shadow">
					<input name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $c1_remove_3d_shadow); ?> />
					<?php esc_html_e('Remove the 3D shadow under the slider', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>

		    <input name="udesign_options[c1_slides_order_str]" type="hidden" id="c1_slides_order_str" value="<?php if ($c1_slides_order_str){ echo esc_attr($c1_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="c1-table-slides" class="c1-table-slides">
			<tbody>
    <?php		    foreach( $c1_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo $slide_row_number; ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo $position+1; ?></td>
				    <td style="padding:0 10px 10px 20px; width:100%" valign="top">
                                        <div class="c1_slide_upload_section" style="padding:10px 0; float:left;">
                                            <label style="float:left; margin:1px; font-weight:bold;" for="c1_slide_img_url_<?php echo $slide_row_number; ?>"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                            <input class="c1_slide_img_url_field" name="udesign_options[c1_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="c1_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if( $options['c1_slide_img_url_'.$slide_row_number] ){ echo esc_url($options['c1_slide_img_url_'.$slide_row_number]); } ?>" size="65" />
                                            <input id="c1_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c1_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                        </div>
                                        <div class="clear"></div>
					<div class="transition-type" style="padding:7px 5px 0 0; float:left;">
					    <select name="udesign_options[c1_transition_type_<?php echo $slide_row_number; ?>]" id="c1_transition_type_<?php echo $slide_row_number; ?>">
						<option value="fade"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'fade') ? ' selected="selected"' : ''; ?>>fade</option>
						<option value="curtainX"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'curtainX') ? ' selected="selected"' : ''; ?>>curtainX</option>
						<option value="curtainY"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'curtainY') ? ' selected="selected"' : ''; ?>>curtainY</option>
						<option value="turnUp"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'turnUp') ? ' selected="selected"' : ''; ?>>turnUp</option>
						<option value="turnDown"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'turnDown') ? ' selected="selected"' : ''; ?>>turnDown</option>
						<option value="wipe"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'wipe') ? ' selected="selected"' : ''; ?>>wipe</option>
						<option value="scrollHorz"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'scrollHorz') ? ' selected="selected"' : ''; ?>>scrollHorz</option>
						<option value="scrollVert"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'scrollVert') ? ' selected="selected"' : ''; ?>>scrollVert</option>
						<option value="growX"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'growX') ? ' selected="selected"' : ''; ?>>growX</option>
						<option value="growY"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'growY') ? ' selected="selected"' : ''; ?>>growY</option>
						<option value="scrollUp"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'scrollUp') ? ' selected="selected"' : ''; ?>>scrollUp</option>
						<option value="scrollDown"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'scrollDown') ? ' selected="selected"' : ''; ?>>scrollDown</option>
						<option value="shuffle"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'shuffle') ? ' selected="selected"' : ''; ?>>shuffle</option>
						<option value="blindX"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'blindX') ? ' selected="selected"' : ''; ?>>blindX</option>
						<option value="blindY"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'blindY') ? ' selected="selected"' : ''; ?>>blindY</option>
						<option value="blindZ"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'blindZ') ? ' selected="selected"' : ''; ?>>blindZ</option>
						<option value="cover"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'cover') ? ' selected="selected"' : ''; ?>>cover</option>
						<option value="fadeZoom"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'fadeZoom') ? ' selected="selected"' : ''; ?>>fadeZoom</option>
						<option value="scrollLeft"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'scrollLeft') ? ' selected="selected"' : ''; ?>>scrollLeft</option>
						<option value="scrollRight"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'scrollRight') ? ' selected="selected"' : ''; ?>>scrollRight</option>
						<option value="slideX"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'slideX') ? ' selected="selected"' : ''; ?>>slideX</option>
						<option value="slideY"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'slideY') ? ' selected="selected"' : ''; ?>>slideY</option>
						<option value="toss"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'toss') ? ' selected="selected"' : ''; ?>>toss</option>
						<option value="turnLeft"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'turnLeft') ? ' selected="selected"' : ''; ?>>turnLeft</option>
						<option value="turnRight"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'turnRight') ? ' selected="selected"' : ''; ?>>turnRight</option>
						<option value="uncover"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'uncover') ? ' selected="selected"' : ''; ?>>uncover</option>
						<option value="zoom"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'zoom') ? ' selected="selected"' : ''; ?>>zoom</option>
						<option value="none"<?php echo ($options['c1_transition_type_'.$slide_row_number] == 'none') ? ' selected="selected"' : ''; ?>>none</option>
					    </select>
					    <span><?php esc_html_e('Transition effect.', 'udesign'); ?></span>
					</div>
					<div id="c1_slide_link_url_<?php echo $slide_row_number; ?>" class="slide-link" style="padding:20px 5px 0; clear:both;">
					    <label for="c1_slide_link_url_<?php echo $slide_row_number; ?>"><?php esc_html_e('Link:', 'udesign'); ?> </label>
					    <input name="udesign_options[c1_slide_link_url_<?php echo $slide_row_number; ?>]" type="text" id="c1_slide_link_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['c1_slide_link_url_'.$slide_row_number]){ echo esc_url($options['c1_slide_link_url_'.$slide_row_number]); }?>" size="30" />
					    <label for="c1_slide_link_target_<?php echo $slide_row_number; ?>">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[c1_slide_link_target_<?php echo $slide_row_number; ?>]" id="c1_slide_link_target_<?php echo $slide_row_number; ?>">
						    <option value="self"<?php echo ($options['c1_slide_link_target_'.$slide_row_number] == 'self') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"<?php echo ($options['c1_slide_link_target_'.$slide_row_number] == 'blank') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					    </label>
                                            <div class="slide-alt-tag" style="display:inline-block;">
                                                <label for="c1_slide_image_alt_tag_<?php echo $slide_row_number; ?>" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'udesign'); ?> </label> 
                                                <input name="udesign_options[c1_slide_image_alt_tag_<?php echo $slide_row_number; ?>]" type="text" id="c1_slide_image_alt_tag_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['c1_slide_image_alt_tag_'.$slide_row_number]); ?>" size="20" />
                                            </div>
                                            <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'udesign'); ?></span></div>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="c1-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:0 10px 10px 20px; width:100%" valign="top">
                                    <div class="c1_slide_upload_section" style="padding:10px 0; float:left;">
                                        <label style="float:left; margin:1px; font-weight:bold;" for="c1_slide_img_url_999"><?php esc_html_e('Enter a URL or upload an image:', 'udesign'); ?></label><br />
                                        <input class="c1_slide_img_url_field" name="udesign_options[c1_slide_img_url_999]" type="text" id="c1_slide_img_url_999" value="" size="65" />
                                        <input id="c1_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c1_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                    </div>
                                    <div class="clear"></div>
				    <div class="transition-type" style="padding:7px 5px 0 0; float:left;">
					<select name="udesign_options[c1_transition_type_999]" id="c1_transition_type_999">
					    <option value="fade" selected="selected">fade</option>
					    <option value="curtainX">curtainX</option>
					    <option value="curtainY">curtainY</option>
					    <option value="turnUp">turnUp</option>
					    <option value="turnDown">turnDown</option>
					    <option value="wipe">wipe</option>
					    <option value="scrollHorz">scrollHorz</option>
					    <option value="scrollVert">scrollVert</option>
					    <option value="growX">growX</option>
					    <option value="growY">growY</option>
					    <option value="scrollUp">scrollUp</option>
					    <option value="scrollDown">scrollDown</option>
					    <option value="shuffle">shuffle</option>
					    <option value="blindX">blindX</option>
					    <option value="blindY">blindY</option>
					    <option value="blindZ">blindZ</option>
					    <option value="cover">cover</option>
					    <option value="fadeZoom">fadeZoom</option>
					    <option value="scrollLeft">scrollLeft</option>
					    <option value="scrollRight">scrollRight</option>
					    <option value="slideX">slideX</option>
					    <option value="slideY">slideY</option>
					    <option value="toss">toss</option>
					    <option value="turnLeft">turnLeft</option>
					    <option value="turnRight">turnRight</option>
					    <option value="uncover">uncover</option>
					    <option value="zoom">zoom</option>
					    <option value="none">none</option>
					</select>
					<span><?php esc_html_e('Transition effect.', 'udesign'); ?></span>
				    </div>
				    <div id="c1_slide_link_url_999" class="slide-link" style="padding:20px 5px 0; clear:both;">
					<label for="c1_slide_link_url_999" class="link-url"><?php esc_html_e('Link:', 'udesign'); ?> </label>
					<input name="udesign_options[c1_slide_link_url_999]" type="text" id="c1_slide_link_url_999" value="" size="30" />
					<label for="c1_slide_link_target_999" class="link-target">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[c1_slide_link_target_999]" id="c1_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					</label>
                                        <div class="slide-alt-tag" style="display:inline-block;">
                                            <label for="c1_slide_image_alt_tag_999" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'udesign'); ?> </label>
                                            <input name="udesign_options[c1_slide_image_alt_tag_999]" type="text" id="c1_slide_image_alt_tag_999" value="" size="20" />
                                        </div>
                                        <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'udesign'); ?></span></div>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '5' ) :
		    $c2_slides_order_str = $options['c2_slides_order_str'];
		    $c2_slides_array = explode( ',', $options['c2_slides_order_str'] );
		    $c2_speed = $options['c2_speed'];
		    $c2_timeout = $options['c2_timeout'];
		    $c2_sync = $options['c2_sync']; // see the other slides' forms to add an invisible instance of this checkbox to preserver the state
		    $c2_text_color = $options['c2_text_color'];  ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Cycle 2 Slider Settings:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="c2_speed"><?php esc_html_e('Transition Speed', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[c2_speed]" type="text" id="c2_speed" value="<?php echo esc_attr($c2_speed); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Speed of the transition.', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="c2_timeout"><?php esc_html_e('Timeout', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[c2_timeout]" type="text" id="c2_timeout" value="<?php echo esc_attr($c2_timeout); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Milliseconds between slide transitions (0 to disable auto advance).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Sync', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Sync', 'udesign'); ?></span></legend>
				    <label for="c2_sync">
					<input name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $c2_sync); ?> />
					<?php esc_html_e('Toggle this option to see how some effects behave differently (such as blind, curtain, and zoom).', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Enable Transition on Text', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Transition on Text', 'udesign'); ?></span></legend>
				    <label for="c2_text_transition_on">
					<input name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
					<?php esc_html_e('Toggle this option to enable/disable the transition effect on the info text. If disabled (unchecked) then the text will disapear for the duration of the transition.', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Size', 'udesign'); ?></th>
				<td>
				    <label for="c2_slider_text_size">
					    <?php esc_html_e('Font Size: ', 'udesign'); ?>
					    <select name="udesign_options[c2_slider_text_size]" id="c2_slider_text_size">
						<option value="1.0"<?php echo ($options['c2_slider_text_size'] == '1.0') ? ' selected="selected"' : ''; ?>>1.0em</option>
						<option value="1.1"<?php echo ($options['c2_slider_text_size'] == '1.1') ? ' selected="selected"' : ''; ?>>1.1em</option>
						<option value="1.2"<?php echo ($options['c2_slider_text_size'] == '1.2') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.2em (Default)</option>
						<option value="1.3"<?php echo ($options['c2_slider_text_size'] == '1.3') ? ' selected="selected"' : ''; ?>>1.3em</option>
						<option value="1.4"<?php echo ($options['c2_slider_text_size'] == '1.4') ? ' selected="selected"' : ''; ?>>1.4em</option>
						<option value="1.5"<?php echo ($options['c2_slider_text_size'] == '1.5') ? ' selected="selected"' : ''; ?>>1.5em</option>
						<option value="1.6"<?php echo ($options['c2_slider_text_size'] == '1.6') ? ' selected="selected"' : ''; ?>>1.6em</option>
						<option value="1.7"<?php echo ($options['c2_slider_text_size'] == '1.7') ? ' selected="selected"' : ''; ?>>1.7em</option>
						<option value="1.8"<?php echo ($options['c2_slider_text_size'] == '1.8') ? ' selected="selected"' : ''; ?>>1.8em</option>
						<option value="1.9"<?php echo ($options['c2_slider_text_size'] == '1.9') ? ' selected="selected"' : ''; ?>>1.9em</option>
						<option value="2.0"<?php echo ($options['c2_slider_text_size'] == '2.0') ? ' selected="selected"' : ''; ?>>2.0em</option>
					    </select>
				    </label>
				    <br />
				    <?php esc_html_e('When using "em" you are specifying size relative to the general font size.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Line Height', 'udesign'); ?></th>
				<td>
				    <label for="c2_slider_text_line_height">
					    <?php esc_html_e('Line Height: ', 'udesign'); ?>
					    <select name="udesign_options[c2_slider_text_line_height]" id="c2_slider_text_line_height">
						<option value="0.5"<?php echo ($options['c2_slider_text_line_height'] == '0.5') ? ' selected="selected"' : ''; ?>>0.5</option>
						<option value="0.6"<?php echo ($options['c2_slider_text_line_height'] == '0.6') ? ' selected="selected"' : ''; ?>>0.6</option>
						<option value="0.7"<?php echo ($options['c2_slider_text_line_height'] == '0.7') ? ' selected="selected"' : ''; ?>>0.7</option>
						<option value="0.8"<?php echo ($options['c2_slider_text_line_height'] == '0.8') ? ' selected="selected"' : ''; ?>>0.8</option>
						<option value="0.9"<?php echo ($options['c2_slider_text_line_height'] == '0.9') ? ' selected="selected"' : ''; ?>>0.9</option>
						<option value="1.0"<?php echo ($options['c2_slider_text_line_height'] == '1.0') ? ' selected="selected"' : ''; ?>>1.0</option>
						<option value="1.1"<?php echo ($options['c2_slider_text_line_height'] == '1.1') ? ' selected="selected"' : ''; ?>>1.1</option>
						<option value="1.2"<?php echo ($options['c2_slider_text_line_height'] == '1.2') ? ' selected="selected"' : ''; ?>>1.2</option>
						<option value="1.3"<?php echo ($options['c2_slider_text_line_height'] == '1.3') ? ' selected="selected"' : ''; ?>>1.3</option>
						<option value="1.4"<?php echo ($options['c2_slider_text_line_height'] == '1.4') ? ' selected="selected"' : ''; ?>>1.4</option>
						<option value="1.5"<?php echo ($options['c2_slider_text_line_height'] == '1.5') ? ' selected="selected"' : ''; ?>>1.5</option>
						<option value="1.6"<?php echo ($options['c2_slider_text_line_height'] == '1.6') ? ' selected="selected"' : ''; ?>>1.6</option>
						<option value="1.7"<?php echo ($options['c2_slider_text_line_height'] == '1.7') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.7 (Default)</option>
						<option value="1.8"<?php echo ($options['c2_slider_text_line_height'] == '1.8') ? ' selected="selected"' : ''; ?>>1.8</option>
						<option value="1.9"<?php echo ($options['c2_slider_text_line_height'] == '1.9') ? ' selected="selected"' : ''; ?>>1.9</option>
						<option value="2.0"<?php echo ($options['c2_slider_text_line_height'] == '2.0') ? ' selected="selected"' : ''; ?>>2.0</option>
						<option value="2.1"<?php echo ($options['c2_slider_text_line_height'] == '2.1') ? ' selected="selected"' : ''; ?>>2.1</option>
						<option value="2.2"<?php echo ($options['c2_slider_text_line_height'] == '2.2') ? ' selected="selected"' : ''; ?>>2.2</option>
						<option value="2.3"<?php echo ($options['c2_slider_text_line_height'] == '2.3') ? ' selected="selected"' : ''; ?>>2.3</option>
						<option value="2.4"<?php echo ($options['c2_slider_text_line_height'] == '2.4') ? ' selected="selected"' : ''; ?>>2.4</option>
						<option value="2.5"<?php echo ($options['c2_slider_text_line_height'] == '2.5') ? ' selected="selected"' : ''; ?>>2.5</option>
						<option value="2.6"<?php echo ($options['c2_slider_text_line_height'] == '2.6') ? ' selected="selected"' : ''; ?>>2.6</option>
					    </select>
				    </label>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="c2-colorSelector1">
					<div style="background-color: #<?php echo ($c2_text_color) ? esc_attr($c2_text_color) : '333333'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[c2_text_color]" id="c2_text_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($c2_text_color) ? esc_attr($c2_text_color) : '333333'; ?>" />
				    <?php esc_html_e('Slider text color including the Title.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>


		    <input name="udesign_options[c2_slides_order_str]" type="hidden" id="c2_slides_order_str" value="<?php if ($c2_slides_order_str){ echo esc_attr($c2_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="c2-table-slides" class="c2-table-slides">
			<tbody>
    <?php		    foreach( $c2_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo $slide_row_number; ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo $position+1; ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<div class="c2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                            <label style="font-weight:bold;" for="c2_slide_img_url_<?php echo $slide_row_number; ?>"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                            <input class="c2_slide_img_url_field" name="udesign_options[c2_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="c2_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['c2_slide_img_url_'.$slide_row_number]){ echo esc_url($options['c2_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="c2_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c2_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
					<div class="transition-type" style="padding:10px 5px 0 0; clear:both;">
					    <strong><?php esc_html_e('Transition:', 'udesign'); ?></strong>
					    <select name="udesign_options[c2_transition_type_<?php echo $slide_row_number; ?>]" id="c2_transition_type_<?php echo $slide_row_number; ?>">
						<option value="fade"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'fade') ? ' selected="selected"' : ''; ?>>fade</option>
						<option value="curtainX"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'curtainX') ? ' selected="selected"' : ''; ?>>curtainX</option>
						<option value="curtainY"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'curtainY') ? ' selected="selected"' : ''; ?>>curtainY</option>
						<option value="turnUp"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'turnUp') ? ' selected="selected"' : ''; ?>>turnUp</option>
						<option value="turnDown"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'turnDown') ? ' selected="selected"' : ''; ?>>turnDown</option>
						<option value="wipe"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'wipe') ? ' selected="selected"' : ''; ?>>wipe</option>
						<option value="scrollHorz"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'scrollHorz') ? ' selected="selected"' : ''; ?>>scrollHorz</option>
						<option value="scrollVert"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'scrollVert') ? ' selected="selected"' : ''; ?>>scrollVert</option>
						<option value="growX"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'growX') ? ' selected="selected"' : ''; ?>>growX</option>
						<option value="growY"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'growY') ? ' selected="selected"' : ''; ?>>growY</option>
						<option value="scrollUp"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'scrollUp') ? ' selected="selected"' : ''; ?>>scrollUp</option>
						<option value="scrollDown"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'scrollDown') ? ' selected="selected"' : ''; ?>>scrollDown</option>
						<option value="shuffle"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'shuffle') ? ' selected="selected"' : ''; ?>>shuffle</option>
						<option value="blindX"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'blindX') ? ' selected="selected"' : ''; ?>>blindX</option>
						<option value="blindY"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'blindY') ? ' selected="selected"' : ''; ?>>blindY</option>
						<option value="blindZ"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'blindZ') ? ' selected="selected"' : ''; ?>>blindZ</option>
						<option value="cover"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'cover') ? ' selected="selected"' : ''; ?>>cover</option>
						<option value="fadeZoom"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'fadeZoom') ? ' selected="selected"' : ''; ?>>fadeZoom</option>
						<option value="scrollLeft"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'scrollLeft') ? ' selected="selected"' : ''; ?>>scrollLeft</option>
						<option value="scrollRight"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'scrollRight') ? ' selected="selected"' : ''; ?>>scrollRight</option>
						<option value="slideX"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'slideX') ? ' selected="selected"' : ''; ?>>slideX</option>
						<option value="slideY"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'slideY') ? ' selected="selected"' : ''; ?>>slideY</option>
						<option value="toss"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'toss') ? ' selected="selected"' : ''; ?>>toss</option>
						<option value="turnLeft"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'turnLeft') ? ' selected="selected"' : ''; ?>>turnLeft</option>
						<option value="turnRight"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'turnRight') ? ' selected="selected"' : ''; ?>>turnRight</option>
						<option value="uncover"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'uncover') ? ' selected="selected"' : ''; ?>>uncover</option>
						<option value="zoom"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'zoom') ? ' selected="selected"' : ''; ?>>zoom</option>
						<option value="none"<?php echo ($options['c2_transition_type_'.$slide_row_number] == 'none') ? ' selected="selected"' : ''; ?>>none</option>
					    </select>
					</div>
					<div id="c2_slide_link_url_<?php echo $slide_row_number; ?>" class="slide-link" style="padding:10px 5px 0 0; clear:both;">
					    <label for="c2_slide_link_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Link:', 'udesign'); ?> </label>
					    <input name="udesign_options[c2_slide_link_url_<?php echo $slide_row_number; ?>]" type="text" id="c2_slide_link_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['c2_slide_link_url_'.$slide_row_number]){ echo esc_url($options['c2_slide_link_url_'.$slide_row_number]); }?>" size="30" />
					    <label for="c2_slide_link_target_<?php echo $slide_row_number; ?>">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[c2_slide_link_target_<?php echo $slide_row_number; ?>]" id="c2_slide_link_target_<?php echo $slide_row_number; ?>">
						    <option value="self"<?php echo ($options['c2_slide_link_target_'.$slide_row_number] == 'self') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"<?php echo ($options['c2_slide_link_target_'.$slide_row_number] == 'blank') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					    </label>
                                            <div class="slide-alt-tag" style="display:inline-block;">
                                                <label for="c2_slide_image_alt_tag_<?php echo $slide_row_number; ?>" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'udesign'); ?> </label> 
                                                <input name="udesign_options[c2_slide_image_alt_tag_<?php echo $slide_row_number; ?>]" type="text" id="c2_slide_image_alt_tag_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['c2_slide_image_alt_tag_'.$slide_row_number]); ?>" size="20" />
                                            </div>
					</div>
					<div class="slide-info-text" style="padding:10px 5px 0 0; width:60%; float:left; display:inline;">
					    <strong><?php esc_html_e('Slide text', 'udesign'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'udesign'); ?></span>:<br />
					    <textarea name="udesign_options[c2_slide_default_info_txt_<?php echo $slide_row_number; ?>]" class="code"
							style="width:97%; font-size:12px; margin: 5px 0;" id="c2_slide_default_info_txt_<?php echo $slide_row_number; ?>"
							rows="4" cols="60"><?php echo ( $options['c2_slide_default_info_txt_'.$slide_row_number] ) ? esc_attr($options['c2_slide_default_info_txt_'.$slide_row_number]) : ''; ?></textarea>
					</div>
					<div class="slide-button" style="padding-top:10px; float:left; display:inline; width:35%">
					    <label for="c2_slide_button_txt_<?php echo $slide_row_number; ?>" class="slide-button-text" style="font-weight:bold;"><?php esc_html_e('Button Text:', 'udesign'); ?> </label><br />
					    <input name="udesign_options[c2_slide_button_txt_<?php echo $slide_row_number; ?>]" type="text" id="c2_slide_button_txt_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['c2_slide_button_txt_'.$slide_row_number]); ?>" size="20" /><br />
					    <label for="c2_slide_button_style_<?php echo $slide_row_number; ?>" class="slide-button-style" style="margin-top:5px;font-weight:bold; float:left;"><?php esc_html_e('Button Style: ', 'udesign'); ?>
						<select name="udesign_options[c2_slide_button_style_<?php echo $slide_row_number; ?>]" id="c2_slide_button_style_<?php echo $slide_row_number; ?>">
						    <option value="dark"<?php echo ($options['c2_slide_button_style_'.$slide_row_number] == 'dark') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Dark', 'udesign'); ?></option>
						    <option value="light"<?php echo ($options['c2_slide_button_style_'.$slide_row_number] == 'light') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Light', 'udesign'); ?></option>
						</select>
					    </label><br />
					    <span class="description" style="float:left;padding:5px; display:block; line-height:1.4; font-size:12px;"><?php _e('The button is activated only if a <strong>Link</strong> is provided. To remove the button just replace the link with a single space.', 'udesign'); ?></span>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="c2-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <div class="c2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label style="font-weight:bold;" for="c2_slide_img_url_999"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="c2_slide_img_url_field" name="udesign_options[c2_slide_img_url_999]" type="text" id="c2_slide_img_url_999" value="" size="65" />
                                        <input id="c2_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c2_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
				    <div class="transition-type" style="padding:10px 5px 0 0; clear:both;">
					<strong><?php esc_html_e('Transition:', 'udesign'); ?></strong>
					<select name="udesign_options[c2_transition_type_999]" id="c2_transition_type_999">
					    <option value="fade" selected="selected">fade</option>
					    <option value="curtainX">curtainX</option>
					    <option value="curtainY">curtainY</option>
					    <option value="turnUp">turnUp</option>
					    <option value="turnDown">turnDown</option>
					    <option value="wipe">wipe</option>
					    <option value="scrollHorz">scrollHorz</option>
					    <option value="scrollVert">scrollVert</option>
					    <option value="growX">growX</option>
					    <option value="growY">growY</option>
					    <option value="scrollUp">scrollUp</option>
					    <option value="scrollDown">scrollDown</option>
					    <option value="shuffle">shuffle</option>
					    <option value="blindX">blindX</option>
					    <option value="blindY">blindY</option>
					    <option value="blindZ">blindZ</option>
					    <option value="cover">cover</option>
					    <option value="fadeZoom">fadeZoom</option>
					    <option value="scrollLeft">scrollLeft</option>
					    <option value="scrollRight">scrollRight</option>
					    <option value="slideX">slideX</option>
					    <option value="slideY">slideY</option>
					    <option value="toss">toss</option>
					    <option value="turnLeft">turnLeft</option>
					    <option value="turnRight">turnRight</option>
					    <option value="uncover">uncover</option>
					    <option value="zoom">zoom</option>
					    <option value="none">none</option>
					</select>
				    </div>
				    <div id="c2_slide_link_url_999" class="slide-link" style="padding:10px 5px 0 0; clear:both;">
					<label for="c2_slide_link_url_999" class="link-url" style="font-weight:bold;"><?php esc_html_e('Link:', 'udesign'); ?> </label>
					<input name="udesign_options[c2_slide_link_url_999]" type="text" id="c2_slide_link_url_999" value="" size="30" />
					<label for="c2_slide_link_target_999" class="link-target">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[c2_slide_link_target_999]" id="c2_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					</label>
                                        <div class="slide-alt-tag" style="display:inline-block;">
                                            <label for="c2_slide_image_alt_tag_999" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'udesign'); ?> </label>
                                            <input name="udesign_options[c2_slide_image_alt_tag_999]" type="text" id="c2_slide_image_alt_tag_999" value="" size="20" />
                                        </div>
				    </div>
				    <div class="slide-info-text" style="padding:10px 5px 0 0; width:60%; float:left; display:inline;">
					<strong><?php esc_html_e('Slide text', 'udesign'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'udesign'); ?></span>:<br />
					<textarea name="udesign_options[c2_slide_default_info_txt_999]" class="code"
						    style="width:97%; font-size:12px; margin: 5px 0;" id="c2_slide_default_info_txt_999"
						    rows="4" cols="60"><?php echo get_c2_slide_default_info_txt(); ?></textarea>
				    </div>
				    <div class="slide-button" style="padding-top:10px; float:left; display:inline; width:35%">
					<label for="c2_slide_button_txt_999" class="slide-button-text" style="font-weight:bold;"><?php esc_html_e('Button Text:', 'udesign'); ?> </label><br />
					<input name="udesign_options[c2_slide_button_txt_999]" type="text" id="c2_slide_button_txt_999" value="<?php echo esc_attr($options['c2_slide_button_txt_1']); ?>" size="20" /><br />
					<label for="c2_slide_button_style_999" class="slide-button-style" style="margin-top:5px;font-weight:bold; float:left;"><?php esc_html_e('Button Style: ', 'udesign'); ?>
					    <select name="udesign_options[c2_slide_button_style_999]" id="c2_slide_button_style_999">
						<option value="dark" selected="selected" style="padding-right:10px;"><?php esc_attr_e('Dark', 'udesign'); ?></option>
						<option value="light"><?php esc_attr_e('Light', 'udesign'); ?></option>
					    </select>
					</label><br />
					<span class="description" style="float:left; padding:5px; display:block; line-height:17px;"><?php _e('The button is activated only if a <strong>Link</strong> is provided. To remove the button just replace the link with a single space.', 'udesign'); ?></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '6' ) :
		    $c3_slides_order_str = $options['c3_slides_order_str'];
		    $c3_slides_array = explode( ',', $options['c3_slides_order_str'] );
		    $c3_timeout = $options['c3_timeout'];
		    $c3_text_color = $options['c3_text_color'];  ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Cycle 3 Slider Settings:', 'udesign'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="c3_timeout"><?php esc_html_e('Timeout', 'udesign'); ?></label></th>
				<td>
				    <input name="udesign_options[c3_timeout]" type="text" id="c3_timeout" value="<?php echo esc_attr($c3_timeout); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Milliseconds between slide transitions (0 to disable auto advance).', 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Autostop', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Autostop', 'udesign'); ?></span></legend>
				    <label for="c3_autostop">
					<input name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
					<?php esc_html_e('End slideshow after the last slide.', 'udesign'); ?><br />
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Size', 'udesign'); ?></th>
				<td>
				    <label for="c3_slider_text_size">
					    <?php esc_html_e('Font Size: ', 'udesign'); ?>
					    <select name="udesign_options[c3_slider_text_size]" id="c3_slider_text_size">
						<option value="1.0"<?php echo ($options['c3_slider_text_size'] == '1.0') ? ' selected="selected"' : ''; ?>>1.0em</option>
						<option value="1.1"<?php echo ($options['c3_slider_text_size'] == '1.1') ? ' selected="selected"' : ''; ?>>1.1em</option>
						<option value="1.2"<?php echo ($options['c3_slider_text_size'] == '1.2') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.2em (Default)</option>
						<option value="1.3"<?php echo ($options['c3_slider_text_size'] == '1.3') ? ' selected="selected"' : ''; ?>>1.3em</option>
						<option value="1.4"<?php echo ($options['c3_slider_text_size'] == '1.4') ? ' selected="selected"' : ''; ?>>1.4em</option>
						<option value="1.5"<?php echo ($options['c3_slider_text_size'] == '1.5') ? ' selected="selected"' : ''; ?>>1.5em</option>
						<option value="1.6"<?php echo ($options['c3_slider_text_size'] == '1.6') ? ' selected="selected"' : ''; ?>>1.6em</option>
						<option value="1.7"<?php echo ($options['c3_slider_text_size'] == '1.7') ? ' selected="selected"' : ''; ?>>1.7em</option>
						<option value="1.8"<?php echo ($options['c3_slider_text_size'] == '1.8') ? ' selected="selected"' : ''; ?>>1.8em</option>
						<option value="1.9"<?php echo ($options['c3_slider_text_size'] == '1.9') ? ' selected="selected"' : ''; ?>>1.9em</option>
						<option value="2.0"<?php echo ($options['c3_slider_text_size'] == '2.0') ? ' selected="selected"' : ''; ?>>2.0em</option>
					    </select>
				    </label>
				    <br />
				    <?php esc_html_e('When using "em" you are specifying size relative to the general font size.', 'udesign'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Line Height', 'udesign'); ?></th>
				<td>
				    <label for="c3_slider_text_line_height">
					    <?php esc_html_e('Line Height: ', 'udesign'); ?>
					    <select name="udesign_options[c3_slider_text_line_height]" id="c3_slider_text_line_height">
						<option value="0.5"<?php echo ($options['c3_slider_text_line_height'] == '0.5') ? ' selected="selected"' : ''; ?>>0.5</option>
						<option value="0.6"<?php echo ($options['c3_slider_text_line_height'] == '0.6') ? ' selected="selected"' : ''; ?>>0.6</option>
						<option value="0.7"<?php echo ($options['c3_slider_text_line_height'] == '0.7') ? ' selected="selected"' : ''; ?>>0.7</option>
						<option value="0.8"<?php echo ($options['c3_slider_text_line_height'] == '0.8') ? ' selected="selected"' : ''; ?>>0.8</option>
						<option value="0.9"<?php echo ($options['c3_slider_text_line_height'] == '0.9') ? ' selected="selected"' : ''; ?>>0.9</option>
						<option value="1.0"<?php echo ($options['c3_slider_text_line_height'] == '1.0') ? ' selected="selected"' : ''; ?>>1.0</option>
						<option value="1.1"<?php echo ($options['c3_slider_text_line_height'] == '1.1') ? ' selected="selected"' : ''; ?>>1.1</option>
						<option value="1.2"<?php echo ($options['c3_slider_text_line_height'] == '1.2') ? ' selected="selected"' : ''; ?>>1.2</option>
						<option value="1.3"<?php echo ($options['c3_slider_text_line_height'] == '1.3') ? ' selected="selected"' : ''; ?>>1.3</option>
						<option value="1.4"<?php echo ($options['c3_slider_text_line_height'] == '1.4') ? ' selected="selected"' : ''; ?>>1.4</option>
						<option value="1.5"<?php echo ($options['c3_slider_text_line_height'] == '1.5') ? ' selected="selected"' : ''; ?>>1.5</option>
						<option value="1.6"<?php echo ($options['c3_slider_text_line_height'] == '1.6') ? ' selected="selected"' : ''; ?>>1.6</option>
						<option value="1.7"<?php echo ($options['c3_slider_text_line_height'] == '1.7') ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.7 (Default)</option>
						<option value="1.8"<?php echo ($options['c3_slider_text_line_height'] == '1.8') ? ' selected="selected"' : ''; ?>>1.8</option>
						<option value="1.9"<?php echo ($options['c3_slider_text_line_height'] == '1.9') ? ' selected="selected"' : ''; ?>>1.9</option>
						<option value="2.0"<?php echo ($options['c3_slider_text_line_height'] == '2.0') ? ' selected="selected"' : ''; ?>>2.0</option>
						<option value="2.1"<?php echo ($options['c3_slider_text_line_height'] == '2.1') ? ' selected="selected"' : ''; ?>>2.1</option>
						<option value="2.2"<?php echo ($options['c3_slider_text_line_height'] == '2.2') ? ' selected="selected"' : ''; ?>>2.2</option>
						<option value="2.3"<?php echo ($options['c3_slider_text_line_height'] == '2.3') ? ' selected="selected"' : ''; ?>>2.3</option>
						<option value="2.4"<?php echo ($options['c3_slider_text_line_height'] == '2.4') ? ' selected="selected"' : ''; ?>>2.4</option>
						<option value="2.5"<?php echo ($options['c3_slider_text_line_height'] == '2.5') ? ' selected="selected"' : ''; ?>>2.5</option>
						<option value="2.6"<?php echo ($options['c3_slider_text_line_height'] == '2.6') ? ' selected="selected"' : ''; ?>>2.6</option>
					    </select>
				    </label>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'udesign'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="c3-colorSelector1">
					<div style="background-color: #<?php echo ($c3_text_color) ? esc_attr($c3_text_color) : 'FFFFFF'; ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[c3_text_color]" id="c3_text_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo ($c3_text_color) ? esc_attr($c3_text_color) : 'FFFFFF'; ?>" />
				    <?php esc_html_e('Slider text color.', 'udesign'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>


		    <input name="udesign_options[c3_slides_order_str]" type="hidden" id="c3_slides_order_str" value="<?php if ($c3_slides_order_str){ echo esc_attr($c3_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="c3-table-slides" class="c3-table-slides">
			<tbody>
    <?php		    foreach( $c3_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo $slide_row_number; ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo $position+1; ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<div class="c3_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                            <label style="font-weight:bold;" for="c3_slide_img_url_<?php echo $slide_row_number; ?>"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                            <input class="c3_slide_img_url_field" name="udesign_options[c3_slide_img_url_<?php echo $slide_row_number; ?>]" type="text" id="c3_slide_img_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['c3_slide_img_url_'.$slide_row_number]){ echo esc_url($options['c3_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="c3_slide_upload_button_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c3_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
 
					<div id="c3_slide_link_url_<?php echo $slide_row_number; ?>" class="slide-link" style="padding:5px 5px 10px 0; clear:both;">
					    <label for="c3_slide_link_url_<?php echo $slide_row_number; ?>" style="font-weight:bold;"><?php esc_html_e('Image Link:', 'udesign'); ?> </label>
					    <input name="udesign_options[c3_slide_link_url_<?php echo $slide_row_number; ?>]" type="text" id="c3_slide_link_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['c3_slide_link_url_'.$slide_row_number]){ echo esc_url($options['c3_slide_link_url_'.$slide_row_number]); }?>" size="30" />
					    <label for="c3_slide_link_target_<?php echo $slide_row_number; ?>">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[c3_slide_link_target_<?php echo $slide_row_number; ?>]" id="c3_slide_link_target_<?php echo $slide_row_number; ?>">
						    <option value="self"<?php echo ($options['c3_slide_link_target_'.$slide_row_number] == 'self') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"<?php echo ($options['c3_slide_link_target_'.$slide_row_number] == 'blank') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					    </label>
                                            <div class="slide-alt-tag" style="display:inline-block;">
                                                <label for="c3_slide_image_alt_tag_<?php echo $slide_row_number; ?>" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'udesign'); ?> </label> 
                                                <input name="udesign_options[c3_slide_image_alt_tag_<?php echo $slide_row_number; ?>]" type="text" id="c3_slide_image_alt_tag_<?php echo $slide_row_number; ?>" value="<?php echo esc_attr($options['c3_slide_image_alt_tag_'.$slide_row_number]); ?>" size="20" />
                                            </div>
                                            <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'udesign'); ?></span></div>
					</div>

                                        <div class="c3_slide_img2_url" style="padding:10px 5px 0 0; float:left; display:inline; clear:left;">
                                            <label style="font-weight:bold;" for="c3_slide_img2_url_<?php echo $slide_row_number; ?>"><?php esc_html_e('Image 2:', 'udesign'); ?></label>
                                            <input class="c3_slide_img2_url_field" name="udesign_options[c3_slide_img2_url_<?php echo $slide_row_number; ?>]" type="text" id="c3_slide_img2_url_<?php echo $slide_row_number; ?>" value="<?php if ($options['c3_slide_img2_url_'.$slide_row_number]){ echo esc_url($options['c3_slide_img2_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="c3_slide_upload_button2_<?php echo $slide_row_number; ?>" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c3_slide_img2_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
                                        
					<div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; clear:both;">
					    <strong><?php esc_html_e('Slide text', 'udesign'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'udesign'); ?></span>:<br />
					    <textarea name="udesign_options[c3_slide_default_info_txt_<?php echo $slide_row_number; ?>]" class="code"
							style="float:left; width:70%; display:inline; font-size:12px; margin: 5px 0;" id="c3_slide_default_info_txt_<?php echo $slide_row_number; ?>"
							rows="3" cols="70"><?php echo ( $options['c3_slide_default_info_txt_'.$slide_row_number] ) ? esc_attr($options['c3_slide_default_info_txt_'.$slide_row_number]) : ''; ?></textarea>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="c3-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <div class="c3_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label style="font-weight:bold;" for="c3_slide_img_url_999"><?php esc_html_e('Image:', 'udesign'); ?></label>
                                        <input class="c3_slide_img_url_field" name="udesign_options[c3_slide_img_url_999]" type="text" id="c3_slide_img_url_999" value="" size="65" />
                                        <input id="c3_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c3_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
                                    
				    <div id="c3_slide_link_url_999" class="slide-link" style="padding:5px 5px 10px 0; clear:both;">
					<label for="c3_slide_link_url_999" class="link-url" style="font-weight:bold;"><?php esc_html_e('Image Link:', 'udesign'); ?> </label>
					<input name="udesign_options[c3_slide_link_url_999]" type="text" id="c3_slide_link_url_999" value="" size="30" />
					<label for="c3_slide_link_target_999" class="link-target">
						<?php esc_html_e('Target: ', 'udesign'); ?>
						<select name="udesign_options[c3_slide_link_target_999]" id="c3_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'udesign'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'udesign'); ?></option>
						</select>
					</label>
                                        <div class="slide-alt-tag" style="display:inline-block;">
                                            <label for="c3_slide_image_alt_tag_999" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'udesign'); ?> </label>
                                            <input name="udesign_options[c3_slide_image_alt_tag_999]" type="text" id="c3_slide_image_alt_tag_999" value="" size="20" />
                                        </div>
                                        <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'udesign'); ?></span></div>
				    </div>
                                    
                                    <div class="c3_slide_img2_url" style="padding:10px 5px 0 0; float:left; display:inline; clear:left;">
                                        <label style="font-weight:bold;" for="c3_slide_img2_url_999"><?php esc_html_e('Image 2:', 'udesign'); ?></label>
                                        <input class="c3_slide_img2_url_field" name="udesign_options[c3_slide_img2_url_999]" type="text" id="c3_slide_img2_url_999" value="" size="65" />
                                        <input id="c3_slide_upload_button2_999" type="button" value="<?php esc_attr_e('Upload Image', 'udesign'); ?>" class="button-secondary c3_slide_img2_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
                                    
				    <div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; clear:both;">
					<strong><?php esc_html_e('Slide text', 'udesign'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'udesign'); ?></span>:<br />
					<textarea name="udesign_options[c3_slide_default_info_txt_999]" class="code"
						    style="float:left; width:70%; display:inline; font-size:12px; margin: 5px 0;" id="c3_slide_default_info_txt_999"
						    rows="3" cols="70"><?php echo get_c3_slide_default_info_txt(); ?></textarea>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '7' ) : // No slider ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Title Text', 'udesign'); ?></th>
				<td>
				    <?php esc_html_e('Change the Title:', 'udesign'); ?> <input name="udesign_options[no_slider_text]" type="text" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" size="35" maxlength="120" />
				    <br />
				    <span class="description"><?php esc_html_e('This is the title text displayed in the place of the slider on the home page', 'udesign'); ?></span>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '8' ) : // Revolution Slider ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[gs_remove_3d_shadow]" type="checkbox" id="gs_remove_3d_shadow" value="yes" <?php checked('yes', $options['gs_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[pm_remove_3d_shadow]" type="checkbox" id="pm_remove_3d_shadow" value="yes" <?php checked('yes', $options['pm_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $options['c1_remove_image_frame']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $options['c2_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $options['c2_text_transition_on']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $options['c3_autostop']); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />

<?php               if ( !is_plugin_active('revslider/revslider.php') ) : ?>
                        <div style="background-color:#FFEBE8; border:1px solid #C00; padding:0 0.8em; margin:10px 0;">
                            <p style="font-weight:bold;"><?php  printf( __('You need  to install the "Revolution Slider" first before using this feature. You may install the slider through the %1$sInstall Plugins%2$s section.', 'udesign'), '<a href="themes.php?page=install-required-plugins">', '</a>' ); ?></p>
                        </div>
<?php               else : ?>
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Revolution Slider', 'udesign'); ?></th>
                                    <td>
  <?php                                 $slider = new RevSlider();
                                        $arrSliders = $slider->getArrSliders();
                                        if( empty( $arrSliders ) ) : ?>
                                            <div style="background-color:#FFFFE0; border:1px solid #E6DB55; padding:0 0.8em; margin:0;">
                                                <p style="font-weight:bold; margin:7px 0;"><?php  printf( __('No sliders found!  Please create a new slider from the %1$sRevolution Slider%2$s page.', 'udesign'), '<a href="admin.php?page=revslider">', '</a>' ); ?></p>
                                            </div>
<?php                                   else : ?>
                                            <label for="current_rev_slider"><?php esc_html_e('Choose a Revolution Slider:', 'udesign'); ?></label>
                                            <select name="udesign_options[rev_slider_shortcode]" id="current_rev_slider">
                                                    <option value=""<?php echo ($options['rev_slider_shortcode'] == '') ? ' selected="selected"' : ''; ?>><?php esc_html_e('--Select Slider--', 'udesign'); ?></option> 
<?php                                           foreach( $arrSliders as $slider ): ?>
                                                    <option value="<?php echo $slider->getShortcode(); ?>"<?php echo ($slider->getShortcode() == $options['rev_slider_shortcode']) ? ' selected="selected"' : ''; ?>><?php echo $slider->getTitle(); ?></option> 
<?php                                           endforeach; ?>
                                            </select><br />
                                            <span class="description"><?php  printf( __('To create additional sliders or to configure the existing ones please refer to the %1$sRevolution Slider%2$s page.', 'udesign'), '<a title="'.esc_html__('Go to Revolution Slider page', 'udesign').'" href="admin.php?page=revslider">', '</a>' ); ?></span><br />
                                            <span class="description"><?php  printf( __('For help please refer to the %1$sDocumentation%2$s.', 'udesign'), '<a title="'.esc_html__('Go to the Documentation', 'udesign').'" target="_blank" href="'.get_bloginfo('template_url').'/scripts/documentation/index.html#revslider-description">', '</a>' ); ?></span>
                                            <div class="clear"></div>
<?php                                   endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
<?php               endif; ?>
    
<?php		endif;
		display_save_changes_button();
	}

	function portfolio_section_options_contentbox( $options ) {
		global $portfolio_pages_array;
		$portfolio_title_posistion = $options['portfolio_title_posistion'];
		$portfolio_sidebar = $options['portfolio_sidebar']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Portfolio Pages', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Use this area to assign Portfolio Categories to their respective Portfolio pages.', 'udesign'); ?><br />
				<?php esc_html_e('Firstly though, you have to create the Portfolio page(s) and assign the "Portfolio page" template to it.', 'udesign'); ?><br />
				<?php esc_html_e("If you don't see any categories in the dropdown(s) below it's because you haven't created any yet, in that case go to 'Posts &rarr; Categories' and create a 'Portfolio' category there. Also don't forget to save all your Portfolio related Posts and sub categories under that category.", 'udesign'); ?><br />
<?php				foreach ($portfolio_pages_array as $portfolio_page_obj) :
				    $port_page_ID = $portfolio_page_obj->ID; ?>
				    <div style="margin-bottom:10px; float:left; background-color:#FCFCFC; padding:7px; border:1px solid #ddd;">
                                        <div style="margin-bottom:10px; float:left;">
                                            <?php esc_html_e('To Portfolio page', 'udesign'); ?> <strong><?php echo $portfolio_page_obj->post_title; ?></strong> (page ID: <strong><?php echo $port_page_ID; ?></strong>) <br />
                                            <?php esc_html_e('assign the Category:', 'udesign'); ?> <?php wp_dropdown_categories("show_option_all=".esc_html__('Select Category', 'udesign')."&hierarchical=1&orderby=name&selected={$options['portfolio_cat_for_page_'.$port_page_ID]}&name=udesign_options[portfolio_cat_for_page_{$port_page_ID}]&class=postform"); ?><br />
                                            <?php esc_html_e('with', 'udesign'); ?> <input name="udesign_options[portfolio_items_per_page_for_page_<?php echo $port_page_ID ?>]" type="text" id="portfolio_items_per_page_for_page_<?php echo $port_page_ID ?>" value="<?php echo ($options['portfolio_items_per_page_for_page_'.$port_page_ID]) ? esc_attr($options['portfolio_items_per_page_for_page_'.$port_page_ID]) : '6'; ?>" size="5" maxlength="5" /> <?php esc_html_e('items per page.', 'udesign'); ?><br />
                                        </div>
                                        <div style="float:left; clear:left;">
                                            <label for="portfolio_do_not_link_adjacent_items_<?php echo $port_page_ID ?>">
                                                <input name="udesign_options[portfolio_do_not_link_adjacent_items_<?php echo $port_page_ID ?>]" type="checkbox" id="portfolio_do_not_link_adjacent_items_<?php echo $port_page_ID ?>" value="yes" <?php checked('yes', $options['portfolio_do_not_link_adjacent_items_'.$port_page_ID]); ?> />&nbsp;
                                                <strong><?php esc_html_e('Do not link adjacent items in this category as gallery.', 'udesign'); ?></strong>
                                            </label> 
                                            <span class="description"><?php esc_html_e('(Remove the ability to go to the next or previous item when previewing with prettyPhoto lightbox)', 'udesign'); ?></span>
                                        </div>
				    </div>
<?php				endforeach; ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Portfolio Title Position', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'udesign'); ?><br />
				<label><input type="radio" name="udesign_options[portfolio_title_posistion]" id="portfolio_title_posistion_below" value="below" <?php checked('below', $portfolio_title_posistion); ?> /> <?php esc_html_e('Below', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[portfolio_title_posistion]" id="portfolio_title_posistion_above" value="above" <?php checked('above', $portfolio_title_posistion); ?> /> <?php esc_html_e('Above', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the post title shown with every thumbnail. Choose whether you would like to have it displayed above the Thumbnail or just below it.', 'udesign'); ?></span>
			    </td>
			</tr>
		    </tbody>
		</table>

		<div style="background-color:#FCFCFC; border:1px solid #DDDDDD; margin-bottom:5px; padding-bottom:15px;">
		    <p style="padding:10px 5px;"><?php esc_html_e('The following settings refer to the individual portfolio item post (single post view)', 'udesign'); ?></p>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Sidebar Position', 'udesign'); ?></th>
				<td>
				    <?php esc_html_e('Choose position:', 'udesign'); ?><br />
				    <label><input type="radio" name="udesign_options[portfolio_sidebar]" id="portfolio_sidebar_left" value="left" <?php checked('left', $portfolio_sidebar); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				    <label><input type="radio" name="udesign_options[portfolio_sidebar]" id="portfolio_sidebar_right" value="right" <?php checked('right', $portfolio_sidebar); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				    <span class="description"><?php esc_html_e("This is the sidebar shown on individual portfolio items' posts", 'udesign'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Portfolio Postmetadata', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Portfolio Postmetadata', 'udesign'); ?></span></legend>
				    <label for="show_portfolio_postmetadata">
					<input name="udesign_options[show_portfolio_postmetadata]" type="checkbox" id="show_portfolio_postmetadata" value="yes" <?php checked('yes', $options['show_portfolio_postmetadata']); ?> />
					<?php esc_html_e('Show Portfolio Post Metadata box (Single View).', 'udesign'); ?><br />
					<span class="description"><?php esc_html_e('This is the info block containing the information about Author, Date, Categories, Comments in a single view portfolio post.', 'udesign'); ?></span>
				    </label>
				    </fieldset>
				</td>
			    </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Portfolio Postmetadata Location', 'udesign'); ?></th>
                                <td>
                                    <label for="udesign_single_portfolio_postmetadata_location" class="link-target">
                                            <?php esc_html_e('Choose Location: ', 'udesign'); ?>
                                            <select name="udesign_options[udesign_single_portfolio_postmetadata_location]" id="udesign_single_portfolio_postmetadata_location">
                                                <option value="alignbottom"<?php echo ($options['udesign_single_portfolio_postmetadata_location'] == 'alignbottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Bottom', 'udesign'); ?></option>
                                                <option value="aligntop"<?php echo ($options['udesign_single_portfolio_postmetadata_location'] == 'aligntop') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Top', 'udesign'); ?></option>
                                            </select>
                                            <?php esc_html_e('This is the location of the block containing the information about Author, Date, Categories, Comments in a single view portfolio post.', 'udesign'); ?><br />
                                    </label>
                                </td>
                            </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Portfolio Post Author', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Portfolio Post Author', 'udesign'); ?></span></legend>
				    <label for="show_portfolio_postmetadata_author">
					<input name="udesign_options[show_portfolio_postmetadata_author]" type="checkbox" id="show_portfolio_postmetadata_author" value="yes" <?php checked('yes', $options['show_portfolio_postmetadata_author']); ?> />
					<?php esc_html_e('Show Author Name ("Portfolio Post Metadata" needs to be enabled for this option)', 'udesign'); ?><br />
					<span class="description"><?php  printf( __('The following text: "Written by: Author Name" will be added to the postmetadata box. The author\'s name will be displayed as specified under %1$sUsers %2$s Your Profile%3$s <strong>Display name publicly as</strong> field and linking it to the author\'s page.', 'udesign'), '<a title="'.esc_html__('Go to your Profile', 'udesign').'" href="profile.php">', '&rarr;', '</a>' ); ?></span>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Portfolio Post Tags', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Portfolio Post Tags', 'udesign'); ?></span></legend>
				    <label for="show_portfolio_postmetadata_tags">
					<input name="udesign_options[show_portfolio_postmetadata_tags]" type="checkbox" id="show_portfolio_postmetadata_tags" value="yes" <?php checked('yes', $options['show_portfolio_postmetadata_tags']); ?> />
					<?php esc_html_e('Show Portfolio Post Tags', 'udesign'); ?><br />
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Show Comment Area', 'udesign'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Comment Area', 'udesign'); ?></span></legend>
				    <label for="show_portfolio_comments">
					<input name="udesign_options[show_portfolio_comments]" type="checkbox" id="show_portfolio_comments" value="yes" <?php checked('yes', $options['show_portfolio_comments']); ?> />
					<?php esc_html_e('Show comment area in Portfolio posts (Single View)', 'udesign'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Full-width Single Post View Page', 'udesign'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Single Post View Page', 'udesign'); ?></span></legend>
                                    <label for="remove_single_portfolio_sidebar">
                                        <input name="udesign_options[remove_single_portfolio_sidebar]" type="checkbox" id="remove_single_portfolio_sidebar" value="yes" <?php checked('yes', $options['remove_single_portfolio_sidebar']); ?> />
                                        <?php esc_html_e('Remove the sidebar from Single Post View Portfolio pages.', 'udesign'); ?><br />
                                    </label>
                                    </fieldset>
                                </td>
                            </tr>
			</tbody>
		    </table>
		</div>
<?php		display_save_changes_button(); ?>
<?php	}

	function blog_section_options_contentbox( $options ) {
		$blog_sidebar = $options['blog_sidebar']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Sidebar Position', 'udesign'); ?></th>
			    <td><?php  ?>
				<?php esc_html_e('Choose position:', 'udesign'); ?> <br />
				<label><input type="radio" name="udesign_options[blog_sidebar]" id="blog_sidebar_left" value="left" <?php checked('left', $blog_sidebar); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[blog_sidebar]" id="blog_sidebar_right" value="right" <?php checked('right', $blog_sidebar); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar shown on blog pages', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Excerpt', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Exclude Portfolio(s) from Blog', 'udesign'); ?></span></legend>
				<label for="show_excerpt">
				    <input name="udesign_options[show_excerpt]" type="checkbox" id="show_excerpt" value="yes" <?php checked('yes', $options['show_excerpt']); ?> />
				    <?php esc_html_e('Show the excerpt instead of the full post content on the Blog page.', 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><label for="excerpt_length_in_words"><?php esc_html_e('Excerpt Length', 'udesign'); ?></label></th>
			    <td>
				<?php esc_html_e('Change the excerpt length:', 'udesign'); ?> <input name="udesign_options[excerpt_length_in_words]" type="text" id="excerpt_length_in_words" value="<?php echo esc_attr( $options['excerpt_length_in_words'] ); ?>" size="5" maxlength="5" /> 
				<span class="description"><?php esc_html_e('This number refers to the number of words to show.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Read more" Link', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[blog_button_text]" type="text" id="blog_button_text" value="<?php if ($options['blog_button_text']) { echo esc_attr($options['blog_button_text']); } ?>" size="30" maxlength="100" />
				<?php esc_html_e("Enter the text for the post's 'Read more' link.  Leave blank to hide it.", 'udesign'); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Exclude Portfolio(s) from Blog', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Exclude Portfolio(s) from Blog', 'udesign'); ?></span></legend>
				<label for="exclude_portfolio_from_blog">
				    <input name="udesign_options[exclude_portfolio_from_blog]" type="checkbox" id="exclude_portfolio_from_blog" value="yes" <?php checked('yes', $options['exclude_portfolio_from_blog']); ?> />
				    <?php esc_html_e('Exclude Portfolio section(s) related posts from showing in the the general Blog section ("Blog page" template loop).', 'udesign'); ?><br />
				    <span class="description"><?php esc_html_e('Note: Portfolio posts are those that have been assigned to a portfolio related category. A portfolio related category is one which either directly or indirectly (parent or descendant) has been assigned to a "Portfolio page" template (see the "Portfolio section above for these assignments)', 'udesign'); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Post Author', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Post Author', 'udesign'); ?></span></legend>
				<label for="show_postmetadata_author">
				    <input name="udesign_options[show_postmetadata_author]" type="checkbox" id="show_postmetadata_author" value="yes" <?php checked('yes', $options['show_postmetadata_author']); ?> />
				    <?php esc_html_e('Show Author Name', 'udesign'); ?><br />
				    <span class="description"><?php  printf( __('The following text: "Written by: Author Name" will be added to the postmetadata box. The author\'s name will be displayed as specified under %1$sUsers %2$s Your Profile%3$s <strong>Display name publicly as</strong> field and linking it to the author\'s page.', 'udesign'), '<a title="'.esc_html__('Go to Your Profile', 'udesign').'" href="profile.php">', '&rarr;', '</a>' ); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Post Tags', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Post Tags', 'udesign'); ?></span></legend>
				<label for="show_postmetadata_tags">
				    <input name="udesign_options[show_postmetadata_tags]" type="checkbox" id="show_postmetadata_tags" value="yes" <?php checked('yes', $options['show_postmetadata_tags']); ?> />
				    <?php esc_html_e('Show Post Tags', 'udesign'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Category Archive Title', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Category Archive Title', 'udesign'); ?></span></legend>
				<label for="show_archive_for_string">
				    <input name="udesign_options[show_archive_for_string]" type="checkbox" id="show_archive_for_string" value="yes" <?php checked('yes', $options['show_archive_for_string']); ?> />
				    <?php esc_html_e('Remove the "Archive for the \'...\' Category" string from the category archive title.', 'udesign'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Comments are closed" message', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Comments are closed" message', 'udesign'); ?></span></legend>
				<label for="show_comments_are_closed_message">
				    <input name="udesign_options[show_comments_are_closed_message]" type="checkbox" id="show_comments_are_closed_message" value="yes" <?php checked('yes', $options['show_comments_are_closed_message']); ?> />
				    <?php esc_html_e('Show "Comments are closed" message for posts where the comments have been disabled, otherwise no message will be displayed.', 'udesign'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Full-width Blog Page', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Blog Page', 'udesign'); ?></span></legend>
				<label for="remove_blog_sidebar">
				    <input name="udesign_options[remove_blog_sidebar]" type="checkbox" id="remove_blog_sidebar" value="yes" <?php checked('yes', $options['remove_blog_sidebar']); ?> />
				    <?php esc_html_e('Remove the sidebar from Blog pages.', 'udesign'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Full-width Archive Page', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Archive Page', 'udesign'); ?></span></legend>
				<label for="remove_archive_sidebar">
				    <input name="udesign_options[remove_archive_sidebar]" type="checkbox" id="remove_archive_sidebar" value="yes" <?php checked('yes', $options['remove_archive_sidebar']); ?> />
				    <?php esc_html_e('Remove the sidebar from Archive pages (e.g. Category archives, Date archives, Tag archives, etc.).', 'udesign'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Full-width Single Post View Page', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Single Post View Page', 'udesign'); ?></span></legend>
				<label for="remove_single_sidebar">
				    <input name="udesign_options[remove_single_sidebar]" type="checkbox" id="remove_single_sidebar" value="yes" <?php checked('yes', $options['remove_single_sidebar']); ?> />
				    <?php esc_html_e('Remove the sidebar from Single Post View pages.', 'udesign'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Single View Postmetadata Location', 'udesign'); ?></th>
                            <td>
                                <label for="udesign_single_view_postmetadata_location" class="link-target">
                                        <?php esc_html_e('Choose Location: ', 'udesign'); ?>
                                        <select name="udesign_options[udesign_single_view_postmetadata_location]" id="udesign_single_view_postmetadata_location">
                                            <option value="alignbottom"<?php echo ($options['udesign_single_view_postmetadata_location'] == 'alignbottom') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Bottom', 'udesign'); ?></option>
                                            <option value="aligntop"<?php echo ($options['udesign_single_view_postmetadata_location'] == 'aligntop') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Top', 'udesign'); ?></option>
                                        </select>
                                        <?php esc_html_e('This is the location of the block containing the information about Author, Date, Categories, Comments in a single view post.', 'udesign'); ?><br />
                                </label>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Post Image in Single Post View', 'udesign'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Post Image in Single Post View', 'udesign'); ?></span></legend>
                                <label for="display_post_image_in_single_post">
                                    <input name="udesign_options[display_post_image_in_single_post]" type="checkbox" id="display_post_image_in_single_post" value="yes" <?php checked('yes', $options['display_post_image_in_single_post']); ?> />
                                    <?php esc_html_e('Display the post image in single post view.', 'udesign'); ?><br />
                                </label>
                                </fieldset>
                            </td>
                        </tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>

                <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
                    <h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Blog and Archive Section "Featured Image":', 'udesign'); ?></h2>
                    <p><span class="description"><?php esc_html_e('Use this section to set the Post "Featured Image" the way it will be shown on the Blog and Archive Pages for each post. Please note, that if you have "post_image" custom field specified in a post, it will be given priority over the post "Featured Image", so if you would like to use the "Featured Image" do not use the custom field "post_image".', 'udesign'); ?></span></p>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Enable This Section', 'udesign'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Custom "Featured Image"', 'udesign'); ?></span></legend>
                                    <label for="enable_custom_featured_image">
                                        <input name="udesign_options[enable_custom_featured_image]" type="checkbox" id="enable_custom_featured_image" value="yes" <?php checked('yes', $options['enable_custom_featured_image']); ?> />
                                        <?php esc_html_e('Select this option to apply the settings below to the "Featured Image".', 'udesign'); ?><br />
                                    </label>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><label for="featured_image_width"><?php esc_html_e('Image Width', 'udesign'); ?></label></th>
                                <td>
                                    <input name="udesign_options[featured_image_width]" type="text" id="featured_image_width" value="<?php echo esc_attr($options['featured_image_width']); ?>" size="5" maxlength="4" />
                                    <span><?php esc_html_e('Apply this image width in pixels.', 'udesign'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><label for="featured_image_height"><?php esc_html_e('Image Height', 'udesign'); ?></label></th>
                                <td>
                                    <input name="udesign_options[featured_image_height]" type="text" id="featured_image_height" value="<?php echo esc_attr($options['featured_image_height']); ?>" size="5" maxlength="4" />
                                    <span><?php esc_html_e('Apply this image height in pixels.', 'udesign'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Force Image Dimensions', 'udesign'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Custom "Featured Image"', 'udesign'); ?></span></legend>
                                    <label for="force_image_dimention">
                                        <input name="udesign_options[force_image_dimention]" type="checkbox" id="force_image_dimention" value="yes" <?php checked('yes', $options['force_image_dimention']); ?> />
                                        <?php esc_html_e('Select this option to force cropping and resizing the images which is recommended if you would like all images to be of the same specified dimensions.', 'udesign'); ?><br />
                                    </label>
                                    </fieldset>
                                    <span class="description"><?php esc_html_e('(This option would only be considered if image cropping is enabled (default) from the "General Options" section)', 'udesign'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Image Alignment', 'udesign'); ?></th>
                                <td>
                                    <label for="featured_image_alignment" class="link-target">
                                            <?php esc_html_e('Choose Alignment: ', 'udesign'); ?>
                                            <select name="udesign_options[featured_image_alignment]" id="featured_image_alignment">
                                                <option value="alignleft"<?php echo ($options['featured_image_alignment'] == 'alignleft') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Left', 'udesign'); ?></option>
                                                <option value="aligncenter"<?php echo ($options['featured_image_alignment'] == 'aligncenter') ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Center', 'udesign'); ?></option>
                                                <option value="alignright"<?php echo ($options['featured_image_alignment'] == 'alignright') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Right', 'udesign'); ?></option>
                                            </select>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
<?php		display_save_changes_button(); ?>
<?php	}

	function contact_page_options_contentbox( $options ) {
		$show_contact_fields = $options['show_contact_fields'];
		$contact_field_name1 = $options['contact_field_name1'];
		$contact_field_value1 = $options['contact_field_value1'];
		$contact_field_name2 = $options['contact_field_name2'];
		$contact_field_value2 = $options['contact_field_value2'];
		$contact_field_name3 = $options['contact_field_name3'];
		$contact_field_value3 = $options['contact_field_value3'];
		$contact_field_name4 = $options['contact_field_name4'];
		$contact_field_value4 = $options['contact_field_value4'];
		$contact_field_name5 = $options['contact_field_name5'];
		$contact_field_value5 = $options['contact_field_value5'];
		$contact_field_name6 = $options['contact_field_name6'];
		$contact_field_value6 = $options['contact_field_value6'];
		$contact_field_name7 = $options['contact_field_name7'];
		$contact_field_value7 = $options['contact_field_value7'];
		$contact_sidebar = $options['contact_sidebar'];
		$remove_contact_sidebar = $options['remove_contact_sidebar'];
		$NA_phone_format = $options['NA_phone_format'];
		$email_receipients = $options['email_receipients']; ?>
		<h4><?php esc_html_e('Enable Business Contact', 'udesign'); ?></h4>
		<fieldset style="margin: 10px 20px 20px"><legend class="screen-reader-text"><span><?php esc_html_e('Enable Contact Info Fields', 'udesign'); ?></span></legend>
		    <label for="show_contact_fields">
			<input name="udesign_options[show_contact_fields]" type="checkbox" id="show_contact_fields" value="yes" <?php checked('yes', $show_contact_fields); ?> />
			<?php esc_html_e('Enable the Business Contact fields (see below for description)', 'udesign'); ?>
		    </label>
		</fieldset>
		<h4><?php esc_html_e('Business Contact Fields', 'udesign'); ?></h4>
		<p style="margin:5px 20px">
		    <?php _e('The Business Contact Fields provide a way to better display additional contact information such as Company Name, Address, Phone, etc. An example of a Field pair could be <strong>Telephone: (123) 123-4567</strong>, where you would enter the "<strong>Telephone:</strong>" part in the first field and "<strong>(123) 123-4567</strong>" in the second (under the same "Line #") respectively.', 'udesign'); ?><br /><br />
		    <?php esc_html_e('Line 1:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name1]" type="text" id="contact_field_name1" value="<?php if ($contact_field_name1){echo esc_attr($contact_field_name1);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value1]" type="text" id="contact_field_value1" value="<?php if ($contact_field_value1){echo esc_attr($contact_field_value1);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 2:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name2]" type="text" id="contact_field_name2" value="<?php if ($contact_field_name2){echo esc_attr($contact_field_name2);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value2]" type="text" id="contact_field_value2" value="<?php if ($contact_field_value2){echo esc_attr($contact_field_value2);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 3:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name3]" type="text" id="contact_field_name3" value="<?php if ($contact_field_name3){echo esc_attr($contact_field_name3);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value3]" type="text" id="contact_field_value3" value="<?php if ($contact_field_value3){echo esc_attr($contact_field_value3);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 4:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name4]" type="text" id="contact_field_name4" value="<?php if ($contact_field_name4){echo esc_attr($contact_field_name4);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value4]" type="text" id="contact_field_value4" value="<?php if ($contact_field_value4){echo esc_attr($contact_field_value4);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 5:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name5]" type="text" id="contact_field_name5" value="<?php if ($contact_field_name5){echo esc_attr($contact_field_name5);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value5]" type="text" id="contact_field_value5" value="<?php if ($contact_field_value5){echo esc_attr($contact_field_value5);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 6:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name6]" type="text" id="contact_field_name6" value="<?php if ($contact_field_name6){echo esc_attr($contact_field_name6);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value6]" type="text" id="contact_field_value6" value="<?php if ($contact_field_value6){echo esc_attr($contact_field_value6);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 7:', 'udesign'); ?> <br />
		    <input name="udesign_options[contact_field_name7]" type="text" id="contact_field_name7" value="<?php if ($contact_field_name7){echo esc_attr($contact_field_name7);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value7]" type="text" id="contact_field_value7" value="<?php if ($contact_field_value7){echo esc_attr($contact_field_value7);}?>" size="50" maxlength="500" /><br/><br/>
		    <span class="description"><?php esc_html_e('Some html tags and inline styling could be used for formatting here, e.g.', 'udesign'); ?> &lt;em&gt;<?php esc_html_e('Address', 'udesign'); ?>:&lt;/em&gt; <?php esc_html_e('or', 'udesign'); ?> &lt;span style=&quot;color:red;&quot;&gt;<?php esc_html_e('Address', 'udesign'); ?>:&lt;/span&gt;</span>
		</p>
		<h4><?php esc_html_e('Sidebar Position', 'udesign'); ?></h4>
		<p><?php esc_html_e('Choose position:', 'udesign'); ?><br />
		    <label style="margin:20px"><input type="radio" name="udesign_options[contact_sidebar]" id="contact_sidebar_left" value="left" <?php checked('left', $contact_sidebar); ?> /> <?php esc_html_e('Left', 'udesign'); ?></label>&nbsp;
		    <label><input type="radio" name="udesign_options[contact_sidebar]" id="contact_sidebar_right" value="right" <?php checked('right', $contact_sidebar); ?> /> <?php esc_html_e('Right', 'udesign'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
		    <span class="description"><?php esc_html_e('This is the sidebar shown on the Contact page', 'udesign'); ?></span>
		</p>
		<h4><?php esc_html_e('Remove Sidebar', 'udesign'); ?></h4>
		<fieldset style="margin: 10px 20px 20px"><legend class="screen-reader-text"><span><?php esc_html_e('Remove Sidebar') ?></span></legend>
		    <label for="remove_contact_sidebar">
			<input name="udesign_options[remove_contact_sidebar]" type="checkbox" id="remove_contact_sidebar" value="yes" <?php checked('yes', $remove_contact_sidebar); ?> />
			<?php esc_html_e('Remove the sidebar from the Contact page, which will make it a full-width page layout.', 'udesign'); ?><br />
		    </label>
		</fieldset>
		<h4><?php esc_html_e('Phone Number validation', 'udesign'); ?></h4>
		<p><?php esc_html_e('This is the field displayed in the E-mail form on the Contact page template. If checked, the validation for North American phone numbers will be enabled.', 'udesign'); ?></p>
		<fieldset style="margin: 10px 20px 20px"><legend class="screen-reader-text"><span><?php esc_html_e('Enable North American phone number validation') ?></span></legend>
		    <label for="NA_phone_format">
			<input name="udesign_options[NA_phone_format]" type="checkbox" id="NA_phone_format" value="yes" <?php checked('yes', $NA_phone_format); ?> />
			<?php esc_html_e('Enable North American phone number validation in the contact email form', 'udesign'); ?><br />
		    </label>
		</fieldset>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('E-mail Recipient(s)', 'udesign'); ?></th>
			    <td>
				<?php esc_html_e("Please enter recipient's email address, comma-separate multiple recipients:", 'udesign'); ?><br />
				<textarea style="width: 98%;" id="email_receipients" rows="2" cols="60" name="udesign_options[email_receipients]"><?php if( $email_receipients ){ echo esc_attr($email_receipients); } ?></textarea><br />
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable reCAPTCHA', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable reCAPTCHA', 'udesign'); ?></span></legend>
				<label for="recaptcha_enabled">
				    <input name="udesign_options[recaptcha_enabled]" type="checkbox" id="recaptcha_enabled" value="yes" <?php checked( 'yes', $options['recaptcha_enabled']); ?> />
				    <?php printf( esc_html__('Add reCAPTCHA to the email form for extra security (for more information visit %s)', 'udesign'), '<a title="'.esc_html__('Go to www.reCAPTCHA.net', 'udesign').'" href="http://recaptcha.net/" target="_blank">www.recaptcha.net</a>' ); ?>
				</label><br />
				<span class="description"><?php esc_html_e('Please note: reCAPTCHA will be automatically disabled if the two fields below are empty!', 'udesign'); ?></span>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('reCAPTCHA Public Key', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[recaptcha_publickey]" type="text" id="recaptcha_publickey" value="<?php if ($options['recaptcha_publickey']) { echo esc_attr($options['recaptcha_publickey']); } ?>" size="55" maxlength="100" />
				<br /><?php esc_html_e('To use reCAPTCHA you must get an API public key from', 'udesign'); ?> <a title="<?php esc_html_e('Go to www.reCAPTCHA.net', 'udesign') ?>" href="http://recaptcha.net/" target="_blank">http://recaptcha.net</a>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('reCAPTCHA Private Key', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[recaptcha_privatekey]" type="text" id="recaptcha_privatekey" value="<?php if ($options['recaptcha_privatekey']) { echo esc_attr($options['recaptcha_privatekey']); } ?>" size="55" maxlength="100" />
				<br /><?php esc_html_e('To use reCAPTCHA you must get an API private key from', 'udesign'); ?> <a title="<?php esc_html_e('Go to www.reCAPTCHA.net', 'udesign') ?>" href="http://recaptcha.net/" target="_blank">http://recaptcha.net</a><br />
				<span class="description"><?php esc_html_e('This key is used when communicating between your server and the reCAPTCHA server. Be sure to keep it a secret.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('reCAPTCHA Theme', 'udesign'); ?></th>
			    <td>
				<label for="recaptcha_theme" class="link-target">
					<?php esc_html_e('Choose Theme: ', 'udesign'); ?>
					<select name="udesign_options[recaptcha_theme]" id="recaptcha_theme">
					    <option value="white"<?php echo ($options['recaptcha_theme'] == 'white') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('white', 'udesign'); ?></option>
					    <option value="red"<?php echo ($options['recaptcha_theme'] == 'red') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('red', 'udesign'); ?></option>
					    <option value="blackglass"<?php echo ($options['recaptcha_theme'] == 'blackglass') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blackglass', 'udesign'); ?></option>
					    <option value="clean"<?php echo ($options['recaptcha_theme'] == 'clean') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('clean', 'udesign'); ?></option>
					</select>
				</label>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('reCAPTCHA Language', 'udesign'); ?></th>
			    <td>
				<label for="recaptcha_lang" class="link-target">
					<?php esc_html_e('Language: ', 'udesign'); ?>
					<select name="udesign_options[recaptcha_lang]" id="recaptcha_lang">
					    <option value="en"<?php echo ($options['recaptcha_lang'] == 'en') ? ' selected="selected"' : ''; ?>>English</option>
					    <option value="nl"<?php echo ($options['recaptcha_lang'] == 'nl') ? ' selected="selected"' : ''; ?>>Dutch</option>
					    <option value="fr"<?php echo ($options['recaptcha_lang'] == 'fr') ? ' selected="selected"' : ''; ?>>French</option>
					    <option value="de"<?php echo ($options['recaptcha_lang'] == 'de') ? ' selected="selected"' : ''; ?>>German</option>
					    <option value="pt"<?php echo ($options['recaptcha_lang'] == 'pt') ? ' selected="selected"' : ''; ?>>Portuguese</option>
					    <option value="ru"<?php echo ($options['recaptcha_lang'] == 'ru') ? ' selected="selected"' : ''; ?>>Russian</option>
					    <option value="es"<?php echo ($options['recaptcha_lang'] == 'es') ? ' selected="selected"' : ''; ?>>Spanish</option>
					    <option value="tr"<?php echo ($options['recaptcha_lang'] == 'tr') ? ' selected="selected"' : ''; ?>>Turkish</option>
					</select>
				</label>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function footer_options_contentbox( $options ) {
		$copyright_message = $options['copyright_message'];
		$show_wp_link_in_footer = $options['show_wp_link_in_footer'];
		$show_entries_rss_in_footer = $options['show_entries_rss_in_footer'];
		$show_comments_rss_in_footer = $options['show_comments_rss_in_footer']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Copyright Message', 'udesign'); ?></th>
			    <td>
				<textarea style="width: 98%;" id="copyright_message" rows="2" cols="60" name="udesign_options[copyright_message]"><?php if( $copyright_message ){ echo esc_attr($copyright_message); } ?></textarea>
				<br />
				<span class="description"><?php esc_html_e('Copyright message displayed in the footer.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('WordPress credits link', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('WordPress credits link', 'udesign'); ?></span></legend>
				<label for="show_wp_link_in_footer">
				    <input name="udesign_options[show_wp_link_in_footer]" type="checkbox" id="show_wp_link_in_footer" value="yes" <?php checked('yes', $show_wp_link_in_footer); ?> />
				    <?php printf( esc_html__('Show "is proudly powered by %s" in footer?', 'udesign'), '<strong>WordPress</strong>' ); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		  </table>
                <div style="background-color:#FCFCFC; border:1px solid #DDDDDD; margin:6px 0 0; padding-bottom:8px;">
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Your "U-Design" Affiliate Link', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Your "U-Design" Affiliate Link', 'udesign'); ?></span></legend>
				<label for="show_udesign_affiliate_link">
				    <input name="udesign_options[show_udesign_affiliate_link]" type="checkbox" id="show_udesign_affiliate_link" value="yes" <?php checked('yes', $options['show_udesign_affiliate_link']); ?> />
				    <?php printf( esc_html__('Show %1$sThemeForest Affiliate%2$s link in footer?', 'udesign'), '<a target="_blank" title="More information on the ThemeForest Affiliate Program" href="http://themeforest.net/make_money/affiliate_program/">', '</a>' ); ?>
				</label>
                                <label style="margin-left:20px;" for="affiliate_username"><?php printf( esc_html__('ThemeForest %1$susername%2$s:', 'udesign'), '<strong>','</strong>' ); ?></label>
				<input name="udesign_options[affiliate_username]" type="text" id="affiliate_username" value="<?php if ($options['affiliate_username']) { echo esc_attr($options['affiliate_username']); } ?>" size="15" maxlength="100" />
				<span class="description"><?php esc_html_e('(case-sensitive)', 'udesign'); ?></span>
                                <br /><?php printf( esc_html__('Would you like to make money with "U-Design"? Refer new ThemeForest users to the "U-Design" theme and ThemeForest will pay you 30&#37; of their first purchase or cash deposit!! Click %1$shere%2$s for more information.', 'udesign'), '<a target="_blank" title="More information on the ThemeForest Affiliate Program" href="http://themeforest.net/make_money/affiliate_program/">', '</a>' ); ?>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		  </table>
                </div>
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Entries (RSS) link', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Entries (RSS) link', 'udesign'); ?></span></legend>
				<label for="show_entries_rss_in_footer">
				    <input name="udesign_options[show_entries_rss_in_footer]" type="checkbox" id="show_entries_rss_in_footer" value="yes" <?php checked('yes', $show_entries_rss_in_footer); ?> />
				    <?php esc_html_e('Show "Entries (RSS)" link in footer?', 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Comments (RSS) link', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Comments (RSS) link', 'udesign'); ?></span></legend>
				<label for="show_comments_rss_in_footer">
				    <input name="udesign_options[show_comments_rss_in_footer]" type="checkbox" id="show_comments_rss_in_footer" value="yes" <?php checked('yes', $show_comments_rss_in_footer); ?> />
				    <?php esc_html_e('Show "Comments (RSS)" link in footer?', 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Sticky" Footer', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Sticky" Footer', 'udesign'); ?></span></legend>
				<label for="udesign_sticky_footer">
				    <input name="udesign_options[udesign_sticky_footer]" type="checkbox" id="udesign_sticky_footer" value="yes" <?php checked('yes', $options['udesign_sticky_footer']); ?> />
				    <?php esc_html_e('Have the footer stay at the bottom of the page on pages that have very little content.', 'udesign'); ?>
                                </label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function statistics_options_contentbox( $options ) {
		$google_analytics = $options['google_analytics']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			<th scope="row"><label for="google_analytics"><?php esc_html_e('Google Analytics', 'udesign'); ?></label></th>
			<td>
			    <textarea class="code" style="width: 98%;" id="google_analytics" rows="10" cols="60" name="udesign_options[google_analytics]"><?php if( $google_analytics ){ esc_attr_e($google_analytics); } ?></textarea>
			    <br />
			    <span class="description"><?php esc_html_e('Paste your Google Analytics or other tracking code here. It will be inserted just before the closing &lt;/head&gt; tag.', 'udesign'); ?></span>
			</td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function responsive_options_contentbox( $options ) { ?>
                
    		<table class="form-table" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('General Information', 'udesign'); ?></th>
			    <td>
				<span class="description"><?php esc_html_e("960px is the theme's default width. If responsive is enabled the theme will resize automatically to adjust to the size of the browser window or the type of device being used based on the following three breakpoints:", 'udesign'); ?></span><br />
                                <div style="padding-left:5px;">
                                    <span class="description"><?php esc_html_e("1 ) Breakpoint 1 - [ 960px to 720px ]", 'udesign'); ?></span><br />
                                    <span class="description"><?php esc_html_e("2 ) Breakpoint 2 - [ 720px to 480px ]", 'udesign'); ?></span><br />
                                    <span class="description"><?php esc_html_e("3 ) Breakpoint 3 - [ smaller than 480px ]", 'udesign'); ?></span><br />
                                </div>
			    </td>
			</tr>
		    </tbody>
		</table>
                
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable Responsive', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Responsive', 'udesign'); ?></span></legend>
				<label for="enable_responsive">
				    <input name="udesign_options[enable_responsive]" type="checkbox" id="enable_responsive" value="yes" <?php checked('yes', $options['enable_responsive']); ?> />
				    <?php esc_html_e('Enable responsive layout.', 'udesign'); ?>
                                </label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Responsive Logo (optional)', 'udesign'); ?></th>
			    <td>
                                <div style="margin-bottom:5px;  padding:0; float:left;">
                                    <label for="responsive_logo_img"><?php esc_html_e("Enter a URL or upload an image for your alternative logo:", 'udesign'); ?></label><br />
                                    <input name="udesign_options[responsive_logo_img]" type="text" id="responsive_logo_img" value="<?php if( $options['responsive_logo_img'] ){ echo esc_url($options['responsive_logo_img']); } ?>" size="65" />
                                    <input id="upload_responsive_logo_button" type="button" value="<?php esc_attr_e('Upload Logo', 'udesign'); ?>" class="button-secondary" />
                                </div>
                                <div class="clear"></div>
                                <span class="description"><?php esc_html_e("An alternative logo will be loaded ONLY in the case Breakpoints 2 and 3. Please note, this is optional, in most cases you won't need an alternative logo but in some cases might be handy. In either case the theme will resize (if necessary) and center the logo automatically.", 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Responsive Logo Height', 'udesign'); ?></th>
			    <td>
				<input name="udesign_options[responsive_logo_height]" type="text" id="responsive_logo_height" value="<?php echo esc_attr($options['responsive_logo_height']); ?>" size="5" maxlength="4" />px 
                                <span class="description"><?php esc_html_e('(Height) in pixels.  Note: The width is automatically adjusted to the maximum allowed width.', 'udesign'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Remove the Slider Area', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove the Slider Area', 'udesign'); ?></span></legend>
				<label for="responsive_remove_slider_area">
				    <input name="udesign_options[responsive_remove_slider_area]" type="checkbox" id="responsive_remove_slider_area" value="yes" <?php checked('yes', $options['responsive_remove_slider_area']); ?> />
				    <?php esc_html_e('Remove the Slider Area completely from the home page for the Breakpoints 2 and 3.', 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Remove Background Images', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove Background Images', 'udesign'); ?></span></legend>
				<label for="responsive_remove_bg_images_960-720">
				    <input name="udesign_options[responsive_remove_bg_images_960-720]" type="checkbox" id="responsive_remove_bg_images_960-720" value="yes" <?php checked('yes', $options['responsive_remove_bg_images_960-720']); ?> />
				    <?php esc_html_e("Remove all background images for Breakpoint 1. Those are the background images that have been assigned through the theme's 'Custom Colors' section.", 'udesign'); ?>
                                    <span class="description"><?php esc_html_e("(Note: The background images will be replaced with their corresponding background colors for those respective sections. Also, by default the background images will be removed automatically for Breakpoints 2 and 3 respectively)", 'udesign'); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Responsive Menu', 'udesign'); ?></th>
                            <td>
                                <label for="responsive_menu" class="link-target" style="float:left; display:inline-block;">
                                        <select name="udesign_options[responsive_menu]" id="responsive_menu">
                                            <option value="responsive_menu_1"<?php echo ($options['responsive_menu'] == 'responsive_menu_1') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Responsive Menu 1', 'udesign'); ?></option>
                                            <option value="responsive_menu_2"<?php echo ($options['responsive_menu'] == 'responsive_menu_2') ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Responsive Menu 2', 'udesign'); ?></option>
                                        </select>
                                    <?php esc_html_e("Choose a menu to be used for Breakpoints 2 and 3.", 'udesign'); ?>
                                </label>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Pinch-to-Zoom', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Pinch-to-Zoom', 'udesign'); ?></span></legend>
				<label for="responsive_pinch_to_zoom">
				    <input name="udesign_options[responsive_pinch_to_zoom]" type="checkbox" id="responsive_pinch_to_zoom" value="yes" <?php checked('yes', $options['responsive_pinch_to_zoom']); ?> />
				    <?php esc_html_e("Enable pinch-to-zoom on mobile devices. Adds the ability to zoom in on images, text, links, etc. which could come really handy in some situations.", 'udesign'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Disable prettyPhoto', 'udesign'); ?></th>
			    <td>
                                <div id="disable_pp_at_width_slide_bar"></div>
				<input name="udesign_options[responsive_disable_pretty_photo_at_width]" type="text" id="responsive_disable_pretty_photo_at_width" value="<?php echo ( $options['responsive_disable_pretty_photo_at_width'] ) ? esc_attr($options['responsive_disable_pretty_photo_at_width']) : '0'; ?>" size="5" maxlength="4" />px. 
                                <span class="description"><?php esc_html_e('(Width) in pixels.', 'udesign'); ?></span>
                                <?php esc_html_e('This is the device width or browser width at which the prettyPhoto lightbox effect will be disabled, anything smaller than that width will not have prettyPhoto enabled. This is especially useful for widths smaller than the Breakpoint 3 - [ 480px ], but a value slightly greater than that could be a good start, for instance "600". To disable this option set the width to "0".', 'udesign'); ?>
			    </td>
			</tr>
		    </tbody>
		  </table>
<?php		display_save_changes_button(); ?>
<?php	}

	function advanced_options_contentbox( $options ) { ?>
                
                <p style="margin: 10px 0 10px;"><span class="description"><?php esc_html_e("The options in this section are generally offered to assist more advanced users with deeper knowledge of WordPress programming.", 'udesign'); ?></span></p>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Action Hook Locations', 'udesign'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Action Hook Locations', 'udesign'); ?></span></legend>
				<label for="show_udesign_action_hooks">
				    <input name="udesign_options[show_udesign_action_hooks]" type="checkbox" id="show_udesign_action_hooks" value="yes" <?php checked('yes', $options['show_udesign_action_hooks']); ?> />
				    <?php esc_html_e('Enabling this option will allow you to see in the front end the exact locations of the U-Design action hooks located within the "body" tags.', 'udesign'); ?>
                                </label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		  </table>
<?php		display_save_changes_button(); ?>
<?php	}

} // end of UDESIGN_Theme_Options Class



function display_save_changes_button() {
	    echo ('
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row">&nbsp;</th>
				<td>
				    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
					<input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
					<input class="button-primary udesign-right-submit-btn" type="submit" name="submit" value="'.esc_attr__('Save Changes', 'udesign').'" />
                                        <span class="spinner"></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>');
}


function get_gs_slide_default_info_txt() {
    $this_site_url = get_bloginfo('url');
    return <<<XML
<p class="subtitle">Slide title goes here</p><p><a href="{$this_site_url}" target="_blank">Lorem ipsum dolor sit amet</a>, consectetur adipiscing elit. <span class="highlight">Quisque at ante sit amet</span> erat laoreetfermentum. Quisque nec nisl. Nam scelerisque cursus dolor. Donec in. <span class="note">This textfield supports HTML and CSS.</span></p>
XML;
}

function get_pm_slider_default_info_txt() {
    $secial_break_char = "special_break";
    $this_site_url = get_bloginfo('url');
    return <<<XML
<headline>Description Text</headline>
<break>{$secial_break_char}</break>
<paragraph>Here you can add a description text for this slide.</paragraph>
<break>{$secial_break_char}</break>
<inline>This text will be loaded from an XML file and formatted with an external CSS file. You can also easily add {$secial_break_char}</inline>
<a href="{$this_site_url}" target="_blank">hyperlinks</a>
<paragraph>. This one leads you to the home page, by the way.</paragraph>
XML;
}


function get_pm2_slide_default_info_txt() {
    return <<<XML
<h2>New hot Features</h2>
<p>The all new Piecemaker comes with lots of new features, making it even more slick.</p>
<p>Just to mention a few - you can now specify unlimited transition styles, include your own SWF and Video files, add hyperlinks to images and info texts with all special characters.</p>
<p>We also improved the navigation and the animation with animated shadows and pixel-perfect transitions.</p>
XML;
}


function get_c2_slide_default_info_txt() {
    return <<<XML
<h2>Title Goes Here...</h2>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
XML;
}

function get_c3_slide_default_info_txt() {
    return <<<XML
<div style="width:400px; height:100px; top:300px; left:220px; position:absolute; z-index:9999;">
    <p style="text-align:left;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
</div>
XML;
}

// let's begin...
$my_UDESIGN_Theme_Options = new udesign_Theme_Options();




