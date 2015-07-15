<?php
/*
Plugin Name: Plugins List
Description: Displays a list of the active plugins
Version: 2.2.3
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Artiss Plugins List
*
* Main code - include various functions
*
* @package	Artiss-Plugins-List
* @since	2.1
*/

define( 'plugins_list_version', '2.2.3' );

define( 'APL_DEFAULT_PLUGIN_FORMAT', '<li>#LinkedTitle# by #LinkedAuthor#.</li>' );

if ( !function_exists( 'get_plugins' ) ) { require_once ( ABSPATH . 'wp-admin/includes/plugin.php' ); }

$functions_dir = WP_PLUGIN_DIR . '/plugins-list/includes/';

// Include all the various functions

if ( is_admin() ) {

	include_once( $functions_dir . 'apl-admin-config.php' );		        // Assorted admin configuration changes

} else {

	include_once( $functions_dir . 'apl-shortcodes.php' );       		    // Define shortcodes

	include_once( $functions_dir . 'apl-generate-list.php' );       		// Generate the list of plugins

}
?>