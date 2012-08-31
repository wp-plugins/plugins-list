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

    extract( shortcode_atts( array( 'format' => APL_DEFAULT_PLUGIN_FORMAT, 'show_inactive' => false, 'cache' => '' ), $paras ) );

	$output = get_plugins_list( $format, $show_inactive, $cache );

	return $output;
}

add_shortcode( 'plugins_list', 'apl_plugins_list_shortcode' );
?>