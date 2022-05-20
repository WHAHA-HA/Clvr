<?php


$root = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}


header("Content-type: text/xml; charset=utf-8");
print require_once('config_xml.php');


