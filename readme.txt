=== Artiss Plugins List ===
Contributors: dartiss, nutsmuggler
Donate link: http://artiss.co.uk/donate
Tags: blog, display, installed, plugin, list, shortcode, show
Requires at least: 2.5.1
Tested up to: 3.5
Stable tag: 2.2

Allows you to insert a list of the Wordpress plugins you are using into any post/page.

== Description ==

**Artiss Plugins List is the plugin *Plugins List*, authored by [nutsmuggler](http://profiles.wordpress.org/nutsmuggler/ "nutsmuggler"), brought up to date. Further enhancements are planned, including widget support. If there any features that you'd like to see then please [get in touch](http://www.artiss.co.uk/forum "WordPress Plugins Forum")!**

This is a simple Wordpress plug-in aimed at giving credit where credit is due.

The plugin inserts an XHTML list into any post/page through a shortcode. If you're into customisation, you can specify a format argument and indicate the exact output you are after. There's also an option to display inactive plugins as well.

Thanks to [Matej Nastran](http://matej.nastran.net/)'s [My plugins](http://wordpress.org/extend/plugins/my-plugins/), from which *Plugins list* was initially derived.

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

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

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/plugins-list "Artiss Plugins List") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Reviews & Mentions ==

[A default WP credit page would be kind of neat](http://halfelf.org/2012/penguins-just-gotta-be-me/#comments "PENGUINS JUST GOTTA BE ME")

== Installation ==

1. Upload the entire `plugins-list` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it, you're done - you just need to add the shortcode to the required post/page.

== Frequently Asked Questions ==

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

Please note, however, that the minimum for WordPress is now PHP 5.2.4. Even though this plugin supports a lower version, I am not coding specifically to achieve this - therefore this minimum may change in the future.

== Screenshots ==

1. An example of the list in use

== Changelog ==

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

= 2.2 =
* Updated with a number of new features

= 2.1 =
* Upgrade to add caching feature

= 2.0 =
* Upgrade to bring code up to date