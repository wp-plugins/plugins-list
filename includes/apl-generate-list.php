<?php
/**
* Generate list
*
* Functions calls to generate the required output
*
* @package	Artiss-Plugins-List
*/

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

function get_plugins_list( $format = APL_DEFAULT_PLUGIN_FORMAT, $show_inactive = false, $cache = 1 ) {

    // Attempt to get output from cache

    $output = false;
    $cache_key = 'apl_plugins_' . md5( $format . $show_inactive . $cache );
    if ( !is_numeric( $cache ) ) { $output = get_transient( $cache_key ); }

    // If not using cache, generate a new list

    if ( !$output ) {

        $plugins = get_plugins();
        $output = '';

        foreach( $plugins as $plugin_file => $plugin_data ) {

            if ( $show_inactive || is_plugin_active( $plugin_file ) )  {
                $output .= apl_format_plugin_list( $plugin_data, $format );
            }
        }

        // Update the cache

        if ( !is_numeric( $cache ) ) { set_transient( $cache_key, $output, 3600 * $cache );	}
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
* @uses     apl_replace_tags        Replace the tags
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

    $format = apl_replace_tags( $plugin_data, $format );

    // Return the code, with HTML comments

    $format = "\n<!-- Artiss Plugins List v" . plugins_list_version . " | http://www.artiss.co.uk/plugins-list -->\n" . $format . "\n<!-- End of YouTube Embed code -->\n";

	return $format;
}

/**
* Replace tags
*
* Replace the tags in the provided format
*
* @since	2.1
*
* @param    string  $plugin_data    The plugin list
* @param    string  $format         Format to use
* @return   string                  Output
*/

function apl_replace_tags( $plugin_data, $format ) {

	$format = str_replace( '#Title#', $plugin_data[ 'Title' ], $format );
	$format = str_replace( '#PluginURI#', $plugin_data[ 'PluginURI' ], $format );
	$format = str_replace( '#AuthorURI#', $plugin_data[ 'AuthorURI' ], $format );
	$format = str_replace( '#Version#', $plugin_data[ 'Version' ], $format );
	$format = str_replace( '#Description#', $plugin_data[ 'Description' ], $format );
	$format = str_replace( '#Author#', $plugin_data[ 'Author' ], $format );

    $format = str_replace( '#LinkedTitle#', "<a href='" . $plugin_data[ 'PluginURI' ] . "' title='" . $plugin_data[ 'Title' ] . "'>" . $plugin_data[ 'Title' ] . "</a>", $format );
    $format = str_replace( '#LinkedAuthor#', "<a href='" . $plugin_data[ 'AuthorURI' ] . "' title='" . $plugin_data[ 'Author' ] . "'>" . $plugin_data[ 'Author' ] . "</a>", $format );

    return $format;
}
?>