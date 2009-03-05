=== Plugins List ===
Contributors: nutsmuggler
Donate link: http://davidebenini.it/wordpress-plugins
Tags: comments
Requires at least: 2.5.1
Tested up to: 2.7
Stable tag: /tags/1.0/

This plugins allows you to insert a list of the Wordpress plugins you are using into any post/page.

== Description ==

This is a simple Wordpress plug-in aimed at giving credit where credit is due. 

I am talking about those wonderful plug-in creators who make our life easier, allowing us to do wonderful things without any knowledge of php. After completing my website I felt I had to thanks those people and quote them somewhere. This plug-in lists all the plugins you are using. The plugin can inserts a simple html list into any post/page.

Plugins List allows to insert a simple list of your plugins into you posts and pages through a shortcode. If you're into customisation, you can specify a format argument and indicate the exact data you are after. There's also an option to display also inactive plugins.

My thanks to [Matej Nastran](http://matej.nastran.net/)'s [My plugins](http://wordpress.org/extend/plugins/my-plugins/), from which *Plugins list* was initially derived.

== Installation ==

Upload the plugin to your wp-content/plugins folder and activate it.  
To get a list of the plugins that are installed and activated in your website, insert the following into any post or page:
	          
	
    <ul>
    [plugins_list]
	 </ul>

You can customise the output specifying the `format` argument. Here's an example:

	<table>
		<tr>
			<th>Title</th><th>Author</th>
		</tr>
	    [plugins_list format="<tr><td>#LinkedTitle#</td><td>#LinkedAuthor#</td></tr>"]
	</table>

The placeholders are: `#Title#`, `#PluginURI#`, `#Author#"` ,`#AuthorURI#`, `#Version#`, `#Description#`, `#LinkedTitle#`, `#LinkedAuthor#`. I guess their meaning is self evident.
 
If, for some obscure reason (I cannot think of any), you want to list also the plug-ins you have installed but are not using, here's the formula:


    <ul>
    [plugins_list show_inactive='true']
    </ul>

The plugins list can be freely styled with css, just place any *class* or *id* attribute on the `format` string, or on the elements surrounding it.     

== Frequently Asked Questions ==

No questions yet.



== Screenshots ==

1. An example of *Plugins List* on my [Credits](http://davidebenini.it/credits) page
 
 

