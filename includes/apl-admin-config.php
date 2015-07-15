<?php
/**
* Admin Menu Functions
*
* Various functions relating to the various administration screens
*
* @package	Artiss-Plugins-List
*/

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

	if ( false !== strpos( $file, 'plugins-list.php' ) ) {
		$links = array_merge( $links, array( '<a href="http://wordpress.org/support/plugin/plugins-list">' . __( 'Support' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate' ) . '</a>' ) );
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'apl_set_plugin_meta', 10, 2 );
?>