<?php
/*
Plugin Name: Plugins list
Plugin URI: http://davidebenini.it/wordpress-plugins/plugins-list/
Description: Displays a list of the active plugins - just insert [plugins list] in posts or pages, betweebìn <ul> and </ul>. If you want to show also the plugins that you have installed but are not presently using, just insert [plugins list all]. ONly one pluin list allowed for post or page.<a href="http://davidebenini.it/credits">Example here</a>.
Version: 0.2.02
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
$my_plugins_version = "0.1";

//if (!function_exists("dbenini_register2"))
  // include (ABSPATH . "wp-content/plugins/my-plugins/dbenini_register_en.php");

if (!function_exists('add_filter'))
	die ("Hello World!");


if (!function_exists('get_plugins'))
				require_once (ABSPATH."wp-admin/includes/plugin.php");

add_filter('the_content', 'dbenini_plugins');
//dbenini_register2 ("my_plugins", $my_plugins_version);





function dbenini_plugins ($content) {
			global $post, $plugin_css_displayed;
			$show_inactive_plugins = FALSE;
			$active_tag = "[plugins list]";
			$all_tag = "[plugins list all]"; 
			$bypass_tag = "<!-- Bypass plugins list -->";
			if ((!strstr($content, $active_tag) && !strstr($content, $all_tag)) || strstr($content,$bypass_tag))
				return $content;
        	if (strstr($content, $active_tag)) { 
				$actual_tag = $active_tag;
			} else { 
				$actual_tag = $all_tag;
				$show_inactive_plugins = TRUE;
				}
			$plugins = get_plugins ();				
			
			
			if (empty($plugins)) {
				echo '<p>';
				_e("Couldn&#8217;t open plugins directory or there are no plugins available."); // TODO: make more helpful
				echo '</p>';
			} else {
			ob_start();
			$i = 1;
			?>
			
			<?php
				$style = '';
			    
				foreach($plugins as $plugin_file => $plugin_data) {
			
				 
			                          
			
					$plugins_allowedtags1 = array('a' => array('href' => array(),'title' => array()),'abbr' => array('title' => array()),'acronym' => array('title' => array()),'code' => array(),'em' => array(),'strong' => array());
					$plugins_allowedtags2 = array('abbr' => array('title' => array()),'acronym' => array('title' => array()),'code' => array(),'em' => array(),'strong' => array());
			
					// Sanitize all displayed data
					$plugin_data['Title']       = wp_kses($plugin_data['Title'], $plugins_allowedtags1);
					$plugin_data['Version']     = wp_kses($plugin_data['Version'], $plugins_allowedtags1);
					// $plugin_data['Description'] = wp_kses($plugin_data['Description'], $plugins_allowedtags2);
					$plugin_data['Author']      = wp_kses($plugin_data['Author'], $plugins_allowedtags1);
					//$plugin_data['Description'] = preg_replace ("@<a .*?".">(.*?)</a>@mis", "\\1", $plugin_data['Description']); 
			
				   
			
					
			
					if ($show_inactive_plugins | is_plugin_active($plugin_file)) {
					   echo "<li>{$plugin_data['Title']} (v. {$plugin_data['Version']} ) by {$plugin_data['Author']}.</li>";
					}
				 //do_action( 'after_plugin_row', $plugin_file );
				 $i++;
				}
				
			?>
		
		    
<?php 			
        $ret = ob_get_contents();
        ob_end_clean ();
        return str_replace ($actual_tag, $ret, $content);
     }
}
?>