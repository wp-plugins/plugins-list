=== Plugins List ===
Contributors: nutsmuggler
Donate link: http://davidebenini.it/wordpress-plugins
Tags: comments
Requires at least: 2.5.1
Tested up to: 2.7
Stable tag: /trunk/

This plugins allows you to insert a list of the Wordpress plugins you are using into any post/page.

== Description ==

This is a simple Wordpress plug-in aimed at giving credit where credit is due. 

I am talking about those wonderful plug-in creators who make our life easier, allowing us to do wonderful things without any knowledge of php. After completing my website I felt I had to thanks those people and quote them somewhere. This plug-in lists all the plugins you are using. The plugin can inserts a simple html list into any post/page.

*Plugins list* is directly derived from [My plugins](http://wordpress.org/extend/plugins/my-plugins/), a plug-in by [Matej Nastran](http://matej.nastran.net/) which produces a table of installed plug-ins. I made this plug-in because I was after a simple list, and I am not planning to go much further; if you are looking for something more full-featured, try [My plugins](http://wordpress.org/extend/plugins/my-plugins/).

== Installation ==

Upload the plugin to your wp-content/plugins folder and activate it.  
To get a list of the plugins that are installed and activated in your website, insert the following into any post or page:
	          
	
    <ul>
    [plugins list]
	  </ul>


If, for some obscure reason (I cannot think of any), you want to list also the plug-ins you have installed but are not using, here's the formula:


    <ul>
    [plugins list all]
    </ul>


Only a single plug-ins list is allowed per post/page. (At this stage at least.)

The plug-in list can be freely styled with css, just place any *class* or *id* attribute on the *ul* element.       

== Frequently Asked Questions ==

No questions yet.



== Screenshots ==

1. An example of *Plugins List* on my [Credits](http://davidebenini.it/credits) page
 
 

