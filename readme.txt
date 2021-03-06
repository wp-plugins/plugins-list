=== Plugins List ===
Contributors: dartiss, nutsmuggler
Donate link: http://artiss.co.uk/donate
Tags: blog, display, installed, plugin, list, shortcode, show
Requires at least: 2.8
Tested up to: 4.2.2
Stable tag: 2.2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to insert a list of the Wordpress plugins you are using into any post/page.

== Description ==

This is a simple Wordpress plug-in aimed at giving credit where credit is due.

The plugin inserts an XHTML list into any post/page through a shortcode. If you're into customisation, you can specify a format argument and indicate the exact output you are after. There's also an option to display inactive plugins as well.

Thanks to [Matej Nastran](http://matej.nastran.net/)'s [My plugins](http://wordpress.org/extend/plugins/my-plugins/), from which *Plugins list* was initially derived.

Further enhancements are planned, including widget support. If there any features that you'd like to see then please let me know in the forum.

== Instructions on use ==

To get a list of the plugins that are installed and activated in your website, insert the following into any post or page:

`<ul>[plugins_list]</ul>`

You can customise the output specifying the `format` argument and a number of pre-defined `tags`. Here's an example:

`[plugins_list format="#LinkedTitle# - #LinkedAuthor#</br>"]`

The tags are: `#Title#`, `#PluginURI#`, `#Author#"` ,`#AuthorURI#`, `#Version#`, `#Description#`, `#LinkedTitle#`, `#LinkedAuthor#`.

If you want to list also the plug-ins you have installed but are not using, here's the formula:

`<ul>[plugins_list show_inactive=true]</ul>`

The plugins list can be freely styled with css, just place any *class* or *id* attribute on the `format` string, or on the elements surrounding it.

By default links will be followed but you can make these "nofollow" by simply adding the parameter of `nofollow=true`. For example...

`<ul>[plugins_list nofollow=true]</ul>`

You can also specify the link target too. For example...

`<ul>[plugins_list target="_blank"]</ul>`

== Cache ==

By default your plugin list will be cached for 1 hour, ensuring that performance is impacted as little as possible. Use the parameter `cache` to change the number of hours. Set this to false to switch off caching.

For example...

`<ul>[plugins_list cache=24]</ul>`

This will cache for 24 hours. The following will switch the cache off...

`<ul>[plugins_list cache=false]</ul>`

== Plugin Count ==

A shortcode also exists to allow you to display the number of plugins that you have. Simply add `[plugins_number]` to your post or page and it will return the number of active plugins.

To display the number of active AND inactive plugins use `[plugins_number inactive=true]`.

As with the other shortcode results will be cached by default. To change the number of hours simply use the `cache` parameter. Set it to `false` to switch off caching. For example...

`[plugins_number inactive=true cache=2]`

== Function Calls ==

If you wish to get the plugin data via a PHP function call (for example, to integrate it into your theme or add to your own plugin) then the following can be used..

`<?php $list = get_plugins_list(  $format, $show_inactive, $cache, $nofollow, $target ); ?>`

None of the parameters are required and are as per the shortcode.

For getting the plugin numbers you can use the function...

`<?php $number = get_plugin_number( $inactive, $cache ); ?>`

Both function calls will return the appropriate text but not output it.

== Licence ==

This WordPress plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License").

== Reviews & Mentions ==

[A default WP credit page would be kind of neat](http://halfelf.org/2012/penguins-just-gotta-be-me/#comments "PENGUINS JUST GOTTA BE ME")

== Installation ==

Plugins List can be found and installed via the Plugin menu within WordPress administration. Alternatively, it can be downloaded and installed manually...

1. Upload the entire `plugins-list` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it, you're done - you just need to add the shortcode!

== Screenshots ==

1. An example of the list in use

== Changelog ==

= 2.2.3 =
* Maintenance: Updated links and changed branding

= 2.2.2 =
* Bug: Accidently left some debug output in place. Sorry!

= 2.2.1 =
* Bug: Fixed PHP error
* Bug: Corrected caching
* Enhancement: Added uninstaller - cache will be wiped upon uninstall

= 2.2 =
* Maintenance: Added instructions for generating list via PHP function call
* Enhancement: Improved caching so that data is not left behind on options table
* Enhancement: Prevent plugin's HTML comment from appearing around each entry
* Enhancement: Add link target and nofollow option
* Enhancement: Added shortcode to return number of plugins

= 2.1 =
* Maintenance: Divided code into seperate files all of which, except the main launch file, have been added into an 'includes' folder
* Maintenance: Split main code into seperate functions to make future enhancement easier. This and the previous change have been made in preperation for version 3.
* Enhancement: Added caching
* Enhancement: Comment added to HTML output with debug information on

= 2.0 =
* Maintenance: Renamed plugin and functions within it
* Maintenance: Improved code readabilty, including adding PHPDoc comments
* Maintenance: Re-written README
* Maintenance: Changed default format to not display plugin version, as this is a security risk
* Enhancement: Added links to plugin meta

== Upgrade Notice ==

= 2.2.3 =
* Update for new branding and fixed links

= 2.2.2 =
* Update to remove debug output

= 2.2.1 =
* Update to fix some bugs, including with the caching

= 2.2 =
* Updated with a number of new features

= 2.1 =
* Upgrade to add caching feature

= 2.0 =
* Upgrade to bring code up to date