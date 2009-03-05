<?php
/*
Plugin Name: Plugins list
Plugin URI: http://davidebenini.it/wordpress-plugins/plugins-list/
Description: Displays a list of the active plugins - just insert [plugins_list] in posts or pages, between ul or ol elements. If you want more custimization, take a look at the <a href='http://davidebenini.it /wordpress-plugins/plugins-list' title='Plugins list documentation'>documentation</a>.  

Version: 1.0
Author: Davide Benini
Author URI: http://www.davidebenini.it/
*/
/*  Copyright 2008  Davide Benini (email : benini.davide@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


define(DBENINI_DEFAULT_PLUGIN_FORMAT, "<li><a href='#PluginURI#' title='#Title#'>#Title#</a> (v. #Version#) by <a href='#AuthorURI#' title='#Author#']}'>#Author#</a>.</li>");


if (!function_exists('get_plugins'))
				require_once (ABSPATH."wp-admin/includes/plugin.php");

add_shortcode('plugins_list', 'plugins_list_func');
function plugins_list_func($atts) {
	extract(shortcode_atts(array(
		'format' => DBENINI_DEFAULT_PLUGIN_FORMAT,
		'show_inactive' => false,
	), $atts));
  $list = dbenini_plugins_list($format, $show_inactive);
	return $list;
}

function dbenini_plugins_list($format = DBENINI_DEFAULT_PLUGIN_FORMAT,  $show_inactive = false ) { 
	$plugins = get_plugins ();
	$output = "";
	foreach($plugins as $plugin_file => $plugin_data) {
		if ($show_inactive || is_plugin_active($plugin_file)) 
			$output .= dbenini_plugin_with_format($plugin_data, $format);
	}             
	
	return $output;
}


function dbenini_plugin_with_format($plugin_data, $format) { 
	
	// Alloweed tag
	$plugins_allowedtags1 = array('a' => array('href' => array(),'title' => array()),'abbr' => array('title' => array()),'acronym' => array('title' => array()),'code' => array(),'em' => array(),'strong' => array());
	$plugins_allowedtags2 = array('abbr' => array('title' => array()),'acronym' => array('title' => array()),'code' => array(),'em' => array(),'strong' => array());

	// Sanitize all displayed data
	$plugin_data['Title']       = wp_kses($plugin_data['Title'], $plugins_allowedtags1);
	$plugin_data['PluginURI']       = wp_kses($plugin_data['PluginURI'], $plugins_allowedtags1);
	$plugin_data['AuthorURI']       = wp_kses($plugin_data['AuthorURI'], $plugins_allowedtags1); 
	$plugin_data['Version']     = wp_kses($plugin_data['Version'], $plugins_allowedtags1);
	//$plugin_data['Description'] = wp_kses($plugin_data['Description'], $plugins_allowedtags2);
	$plugin_data['Author']      = wp_kses($plugin_data['Author'], $plugins_allowedtags1);
	//$plugin_data['Description'] = preg_replace ("@<a .*?".">(.*?)</a>@mis", "\\1", $plugin_data['Description']);
	
	
	$format = str_replace("#Title#", $plugin_data['Title'], $format);     
	$format = str_replace("#PluginURI#", $plugin_data['PluginURI'], $format); 
	$format = str_replace("#AuthorURI#", $plugin_data['AuthorURI'], $format);     
	$format = str_replace("#Version#", $plugin_data['Version'], $format);     
	$format = str_replace("#Description#", $plugin_data['Description'], $format);     
	$format = str_replace("#Author#", $plugin_data['Author'], $format);     
	$format = str_replace("#LinkedTitle#", "<a href='".$plugin_data['PluginURI']."' title='".$plugin_data['Title']."'>".$plugin_data['Title']."</a>", $format);
  $format = str_replace("#LinkedAuthor#", "<a href='".$plugin_data['AuthorURI']."' title='".$plugin_data['Author']."'>".$plugin_data['Author']."</a>", $format);
	return $format;
}
?>