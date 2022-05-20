<?php
/**************************************************************
 *                                                            *
 *   Provides a notification to the user everytime            *
 *   your WordPress theme is updated                          *
 *                                                            *
 *   Author: Joao Araujo                                      *
 *   Profile: http://themeforest.net/user/unisphere           *
 *   Follow me: http://twitter.com/unispheredesign            *
 *                                                            *
 **************************************************************/
 
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 

// Constants for the theme name, folder and remote XML url
define( 'UDESIGN_NOTIFIER_THEME_NAME', 'U-Design' ); // The theme name
define( 'UDESIGN_NOTIFIER_THEME_FOLDER_NAME', 'u-design' ); // The theme folder name
define( 'UDESIGN_NOTIFIER_XML_FILE', 'http://idesignmywebsite.com/notifier/u-design/notifier.xml' ); // The remote notifier XML file containing the latest version of the theme and changelog
define( 'UDESIGN_NOTIFIER_CACHE_INTERVAL', 21600 ); // The time interval for the remote XML cache in the database (21600 seconds = 6 hours)

// Get the current theme version (always from parent theme)
if ( function_exists('wp_get_theme') ) { // if WordPress v3.4+
    $curr_theme = ( wp_get_theme()->parent() ) ? wp_get_theme()->parent() : wp_get_theme();
    $curr_theme_version = $curr_theme->get('Version');
} else {
    $curr_theme = get_theme_data(TEMPLATEPATH . '/style.css');
    $curr_theme_version = $curr_theme['Version'];
}
define( 'UDESIGN_NOTIFIER_CURR_THEME_VERSION', $curr_theme_version );

// Adds an update notification to the WordPress Dashboard menu
function update_notifier_menu() {  
	if (function_exists('simplexml_load_string')) { // Stop if simplexml_load_string funtion isn't available
	    $xml = get_latest_theme_version(UDESIGN_NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server
            
            if( version_compare($xml->latest, UDESIGN_NOTIFIER_CURR_THEME_VERSION, '>') ) { // Compare current theme version with the remote XML version
                    add_dashboard_page( UDESIGN_NOTIFIER_THEME_NAME . ' Theme Updates', UDESIGN_NOTIFIER_THEME_NAME . ' <span class="update-plugins count-1"><span class="update-count">1 Update</span></span>', 'administrator', 'theme-update-notifier', 'update_notifier');
            }
	}	
}
add_action('admin_menu', 'update_notifier_menu');  



// Adds an update notification to the WordPress 3.1+ Admin Bar
function update_notifier_bar_menu_udesign() {
	if (function_exists('simplexml_load_string')) { // Stop if simplexml_load_string funtion isn't available
		global $wp_admin_bar, $wpdb;
	
		if ( !is_super_admin() || !is_admin_bar_showing() ) // Don't display notification in admin bar if it's disabled or the current user isn't an administrator
		return;
		
		$xml = get_latest_theme_version(UDESIGN_NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server
	
		if( version_compare($xml->latest, UDESIGN_NOTIFIER_CURR_THEME_VERSION, '>') ) { // Compare current theme version with the remote XML version
			$wp_admin_bar->add_menu( array( 'id' => 'update_notifier', 'title' => '<span>' . UDESIGN_NOTIFIER_THEME_NAME . ' <span id="ab-updates">1 Update</span></span>', 'href' => get_admin_url() . 'index.php?page=theme-update-notifier' ) );
		}
	}
}
add_action( 'admin_bar_menu', 'update_notifier_bar_menu_udesign', 1000 );



// The notifier page
function update_notifier() { 
	$xml = get_latest_theme_version(UDESIGN_NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server ?>
	
	<style>
		.update-nag { display: none; }
		#instructions {max-width: 100%;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
	</style>

	<div class="wrap">
	
		<div id="icon-tools" class="icon32"></div>
		<h2><?php echo UDESIGN_NOTIFIER_THEME_NAME ?> Theme Updates</h2>
                <div id="message" class="updated below-h2"><p><strong>There is a new version of the <?php echo UDESIGN_NOTIFIER_THEME_NAME; ?> theme available.</strong> You have version <?php echo UDESIGN_NOTIFIER_CURR_THEME_VERSION; ?> installed. Update to version <?php echo $xml->latest; ?>.</p></div>

		<img style="float: left; margin: 0 20px 20px 0; border: 1px solid #ddd;" src="<?php echo get_bloginfo( 'template_url' ) . '/screenshot.png'; ?>" width="350" />
                
		<div id="instructions">
		    <h2>Update Instructions:</h2>
                    <h3>Automated update using a plugin:</h3>
<?php               // Add update alert, to update the theme
                    if ( class_exists('Envato_WP_Toolkit') ) {
                        printf( __( "It looks like you have the <em>Envato WordPress Toolkit</em> plugin installed and active. If this is the first time using the plugin have your ThemeForest account username and API key for the account you used to purchase the theme. To proceed with updating the 'U-Design' theme, head over to the %s page now and follow the insturctions there.", "udesign" ),
                            "<strong><a title='Go to Envato WordPress Toolkit plugin page' href='" . admin_url() . "admin.php?page=envato-wordpress-toolkit'>Envato WordPress Toolkit Plugin</a></strong>" );
                    } else {
                        ob_start(); ?>
                            <p>The easiest and quickest way to update your "U-Design" theme is using the <em>Envato WordPress Toolkit</em> plugin. This plugin allows you to backup the current instance of the theme before updating it, a great option to have. You could install the <em>Envato WordPress Toolkit</em> plugin from <a title='Go to Appearance &rarr; Install Plugins setion'  href='<?php echo admin_url(); ?>themes.php?page=install-required-plugins'>Appearance &rarr; Install Plugins</a></strong> section. After installing and activating the plugin you may return to this page for further instructions.</p>
<?php                   echo ob_get_clean();
                    } ?>
                    <h3>Manual update:</h3>
                    <p><strong>Please note:</strong> It's always a great idea to make a backup of the theme's folder <strong>/wp-content/themes/<?php echo UDESIGN_NOTIFIER_THEME_FOLDER_NAME; ?>/</strong>, or better yet, a full backup of your site including the database before proceeding with an update.</p>
                    <p>First you need to download the latest version of the <a href="http://themeforest.net/item/udesign-wordpress-theme/253220?ref=internq7" target="_blank">U-Design</a> theme, for that log into your <a href="http://www.themeforest.net/" target="_blank">ThemeForest</a> account used to purchase the theme and from your <strong>Downloads</strong> section grab the theme's latest zip.</p>
                    <p>Now, <strong>assuming that you have NOT modified any of the themes' core files</strong>, there are two ways you can attempt to update the theme:</p>
                    <strong>Method 1:</strong> You may simply drag-and-drop using your favorite FTP client the latest version of the theme (unzipped "u-design" folder) over the existing ones in your web server. This will overwrite the current theme files with the new ones (example: <a rel="nofollow" target="_blank" href="http://www.screenr.com/F7hs">http://www.screenr.com/F7hs</a>). That way if you have uploaded any additional files to the theme's folder, they will not be deleted.<br />
                    <strong>Method 2:</strong> Go to <a title='Go to Appearance &rarr; Themes setion' href='<?php echo admin_url(); ?>themes.php' target="_blank">Appearance &rarr; Themes</a> section, activate another theme temporarily which will de-activate the "U-Design" theme automatically. At this point go ahead and delete the "U-Design" theme (don't worry, you will not lose any of your themes' options since those are saved in the database). Then upload, install and activate the latest version of the "U-Design" theme as if doing it for the first time.
                    <p>After the update make sure to go to the "U-Design" options page and re-save your options, for that you just need to hit the "Save Changes" button. This will refresh all the necessary files to reflect your specific settings, as those files might have been replaced by the update to their default state. Also, if you have any caching plugins active don't forget to clear the cache.</p>
                    <p>Now if you have modified files like CSS or some php files and you haven't kept track of your changes then you can use some 'diff' tools to compare the two versions' files and folders. That way you'd know exactly what files to update and where, line by line. Otherwise you'll loose your customizations.</p>
                    <p>For a full list of affected files please refer to the theme's "Changelog" below.</p>
                    <p><strong>For additional information and alternative ways to update the theme please refer to the theme's support forum <a target="_blank" title="How do I update the theme!" href="http://dreamthemedesign.com/u-design-support/discussion/13/how-do-i-update-the-theme/p1">HERE</a>.</strong></p>
		</div>
                <div class="clear"></div>

	    <h3 class="title">Changelog</h3>
	    <?php echo $xml->changelog; ?>

	</div>
    
<?php } 



// Get the remote XML file contents and return its data (Version and Changelog)
// Uses the cached version if available and inside the time interval defined
function get_latest_theme_version($interval) {
	$notifier_file_url = UDESIGN_NOTIFIER_XML_FILE;	
	$db_cache_field = 'udesign-notifier-cache';
	$db_cache_field_last_updated = 'udesign-notifier-cache-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
                if( function_exists('wp_remote_get') ) { // if WordPress HTTP API is available use it...
                        $resp = wp_remote_get( $notifier_file_url, array( 'timeout' => 10 ) );
                        if ( !is_wp_error( $resp ) && is_array($resp) && 200 == $resp['response']['code'] ) {
                            $cache = $resp['body'];
                        }
		} elseif( function_exists('curl_init') ) { // if cURL is available, use it...
			$ch = curl_init($notifier_file_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$cache = curl_exec($ch);
			curl_close($ch);
                } else {
			$cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
		}
		
		if ($cache) {			
			// we got good results	
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );
		} 
		// read from the cache file
		$notifier_data = get_option( $db_cache_field );
	} else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
	}
	
	// Let's see if the $xml data was returned as we expected it to.
	// If it didn't, use the default 1.0.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down
	if( strpos((string)$notifier_data, '<notifier>') === false ) {
		$notifier_data = '<?xml version="1.0.0" encoding="UTF-8"?><notifier><latest>1.0.0</latest><changelog></changelog></notifier>';
	}
	
	// Load the remote XML data into a variable and return it
	$xml = @simplexml_load_string($notifier_data); 
	
	return $xml;
}

