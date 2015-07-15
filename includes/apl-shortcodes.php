<?php
/**
* Shortcodes
*
* Define the various shortcodes
*
* @package	Artiss-Plugins-List
* @since	1.0
*/

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

	extract( shortcode_atts( array( 'format' => '', 'show_inactive' => '', 'cache' => '', 'nofollow' => '', 'target' => '' ), $paras ) );

	$output = get_plugins_list( $format, $show_inactive, $cache, $nofollow, $target );

	return $output;
}

add_shortcode( 'plugins_list', 'apl_plugins_list_shortcode' );

/**
* Number of plugins shortcode
*
* Shortcode to return number of plugins
*
* @since	2.2
*
* @uses     get_plugin_number   Get the number of plugins
*
* @param    string      $paras  Shortcode parameters
* @return   string              Output
*/

function apl_plugin_number_shortcode( $paras ) {

	extract( shortcode_atts( array( 'inactive' => '', 'cache' => '' ), $paras ) );

	$output = get_plugin_number( $inactive, $cache );

	return $output;
}

add_shortcode( 'plugins_number', 'apl_plugin_number_shortcode' );
?>