<?php
/*
Plugin Name: Artiss Plugins List
Plugin URI: http://www.artiss.co.uk/plugins-list
Description: Displays a list of the active plugins
Version: 2.0
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Plugins List
*
* Generate list of plugins
*
* @package	Artiss-Plugins-List
*/

define( APL_DEFAULT_PLUGIN_FORMAT, "<li><a href='#PluginURI#' title='#Title#'>#Title#</a> by <a href='#AuthorURI#' title='#Author#']}'>#Author#</a>.</li>" );

if ( !function_exists( 'get_plugins' ) ) { require_once ( ABSPATH . 'wp-admin/includes/plugin.php' ); }

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	2.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function apl_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'plugins-list.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/forum">' . __( 'Support' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate' ) . '</a>' ) );
	}

	return $links;
}
add_filter( 'plugin_row_meta', 'apl_set_plugin_meta', 10, 2 );

/**
* Main Shortcode Function
*
* Extract shortcode parameters and call main function to output results
*
* @since	1.0
*
* @uses     get_plugins_list    Get the list of plugins
*
* @param    string      $paras  Shortcode parameters
* @return   string              Output
*/

function apl_plugins_list_shortcode( $paras ) {

    extract( shortcode_atts( array( 'format' => APL_DEFAULT_PLUGIN_FORMAT, 'show_inactive' => false ), $paras ) );

	$output = get_plugins_list( $format, $show_inactive );

	return $output;
}
add_shortcode( 'plugins_list', 'apl_plugins_list_shortcode' );

/**
* Get Plugins List
*
* Get list of plugins and, optionally, format them
*
* @since	1.0
*
* @uses     apl_format_plugin_list  Format the plugin list
*
* @param    string  $format         Requires format
* @param    string  $show_inactive  Whether to format or not
* @return   string                  Output
*/

function get_plugins_list( $format = APL_DEFAULT_PLUGIN_FORMAT, $show_inactive = false ) {
	$plugins = get_plugins();
	$output = '';
	foreach( $plugins as $plugin_file => $plugin_data ) {
		if ( $show_inactive || is_plugin_active( $plugin_file ) )  { $output .= apl_format_plugin_list( $plugin_data, $format ); }
	}
	return $output;
}

/**
* Format Plugin List
*
* Format the plugin list
*
* @since	1.0
*
* @param    string  $plugin_data    The plugin list
* @param    string  $format         Format to use
* @return   string                  Output
*/

function apl_format_plugin_list( $plugin_data, $format ) {

	// Allowed tag

	$plugins_allowedtags1 = array( 'a' => array( 'href' => array(), 'title' => array() ), 'abbr' => array( 'title' => array() ), 'acronym' => array( 'title' => array() ), 'code' => array(), 'em' => array(), 'strong' => array() );

	$plugins_allowedtags2 = array( 'abbr' => array( 'title' => array() ), 'acronym' => array( 'title' => array() ), 'code' => array(), 'em' => array(), 'strong' => array() );

	// Sanitize all displayed data

	$plugin_data[ 'Title' ] = wp_kses( $plugin_data[ 'Title' ], $plugins_allowedtags1 );
	$plugin_data[ 'PluginURI' ] = wp_kses( $plugin_data[ 'PluginURI' ], $plugins_allowedtags1 );
	$plugin_data[ 'AuthorURI' ] = wp_kses( $plugin_data[ 'AuthorURI' ], $plugins_allowedtags1 );
	$plugin_data[ 'Version' ] = wp_kses( $plugin_data[ 'Version' ], $plugins_allowedtags1 );
	$plugin_data[ 'Author' ] = wp_kses( $plugin_data[ 'Author' ], $plugins_allowedtags1 );

    // Replace the tags

	$format = str_replace( '#Title#', $plugin_data[ 'Title' ], $format );
	$format = str_replace( '#PluginURI#', $plugin_data[ 'PluginURI' ], $format );
	$format = str_replace( '#AuthorURI#', $plugin_data[ 'AuthorURI' ], $format );
	$format = str_replace( '#Version#', $plugin_data[ 'Version' ], $format );
	$format = str_replace( '#Description#', $plugin_data[ 'Description' ], $format );
	$format = str_replace( '#Author#', $plugin_data[ 'Author' ], $format );

    $format = str_replace( '#LinkedTitle#', "<a href='" . $plugin_data[ 'PluginURI' ] . "' title='" . $plugin_data[ 'Title' ] . "'>" . $plugin_data[ 'Title' ] . "</a>", $format );
    $format = str_replace( '#LinkedAuthor#', "<a href='" . $plugin_data[ 'AuthorURI' ] . "' title='" . $plugin_data[ 'Author' ] . "'>" . $plugin_data[ 'Author' ] . "</a>", $format );

	return $format . "\n";
}
?>