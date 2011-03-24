<?php
/**
 * J!Dump
 * @version      $Id$
 * @package      jdump
 * @copyright    Copyright (C) 2006-2011 Mathias Verraes. All rights reserved.
 * @license      GNU/GPL
 * @link         https://github.com/mathiasverraes/jdump
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<style>
div.jdump {width:550px;margin:0px auto;}
.jdump p, .jdump li { font-size: 14px;margin: 10px;}
.jdump code { font-size: 14px; color: white; background-color:black; margin-bottom: 26px;margin-left:15px; padding: 5px;}
div.box {padding:10px; margin:10px;border-radius: 32px;-moz-border-radius: 32px;-webkit-border-radius: 32px;}
div.orange {background-color: #FC8F30;}
div.blue {background-color: #70ace4;}
div.green {background-color: #7fb01d;}
</style>




<div class="jdump">
	<div class="box orange">
		<p>Advanced print_r and var_dump replacer with object tree display.</p>
		<p>The J!Dump project is now officially hosted on <a href="https://github.com/mathiasverraes/jdump">https://github.com/mathiasverraes/jdump</a></p>
		<p><a href="http://extensions.joomla.org/extensions/miscellaneous/development/1509">Vote for this extension at the JED</a></p>

	</div>

	<div class="box blue">
		<h2>Features</h2>
		<p>This utility makes life easy for developers and template
		designers. You use it to see what's inside a variable, an array or an
		object. Instead of using print_r() or var_dump(), you can now use
		dump(). This will open a popup window with a nice expandable DHTML tree,
		showing the contents of the variable. It will even show a list of
		available methods for each object. You have to see it to believe it! You
		can use dump() in your extensions, in the core, in libraries and even in
		templates.</p>
	</div>

	<div class="box green">
		<h2>Installation</h2>
		<p>Install both the component and the plugin. Make sure the plugin
		is published. But you probably figured that out already.</p>

		<p>If you don't want the dump popup window to appear automatically,
		you can disable it in the configuration. To display the dump window
		manually:</p>
		<ul>
			<li>Administrator: Go to Components -> J!Dump and click Popup.</li>
			<li>Site: Make a new menu item for J!Dump. Set it to 'Open in New
			Window'</li>
		</ul>
	</div>

	<div class="box orange">
		<p>Want updates? Follow <a href="http://twitter.com/mathiasverraes">@mathiasverraes</a>
		on Twitter and be the first to know.</p>
	</div>

	<div class="box blue">
		<h2>Using J!Dump</h2>
		<p>Anywhere in your code, type:</p>

		<code>dump($variable, 'Variable Name');</code>

		<p>Simple huh? 'Variable Name' is optional and can be anything you
		like. If you use a lot of dumps, you'll want to use some descriptive
		names.</p>

		<h2>Shortcuts</h2>
		<code>dumpSysinfo();</code>
		<p>Displays a whole bunch of system information.</p>

		<code>dumpTemplate($this);</code>
		<p>Use inside a template's index.php to dump the parameters.</p>

		<code>dumpMessage('Your message');</code>
		<p>Displays a custom message. Very handy to check if a function or a
		loop is executed etc...</p>
		<code>dumpTrace();</code>
		<p>Displays the backtrace.</p>
	</div>

	<div class="box green">
		<h2>Notes</h2>
		<ul>
			<li>This component is only meant to be used on development test
			sites, NOT in live or production environments. If you must use it on a
			live site, don't do stupid things like dump($password) !</li>
			<li>You can't use dump() in system plugins that are run before the
			J!Dump plugin is run, so it is best to use ordering in the plugin
			manager to put J!Dump upfront.</li>
		</ul>
	</div>

	<div class="box orange">
		<h2>Contributors</h2>
		<ul>
			<li><a href="http://twitter.com/mathiasverraes">Mathias Verraes</a> (Lead)</li>
			<li><a href="http://community.joomla.org/august-2008/author/70-jens-christian-skibakk.html">Jens-Christian Skibakk</a></li>
			<li><a href="http://www.alltogetherasawhole.org/profile/TomFuller">Tom Fuller</a></li>
		</ul>

		<p>Thanks to everybody who provided patches.</p>
	</div>

	<div class="box blue">
		<h2>Bugs</h2>
		<p>Found some bugs? <a
			href="https://github.com/mathiasverraes/jdump/issues">To the
		Bugmobile!</a> Be a <a
			href="http://stephenjungels.com/jungels.net/articles/diff-patch-ten-minutes.html">good
		boy or girl</a> and add a patch yourself :-) Ideas and feature requests are welcome as well.</p>
	</div>

	<div class="box green">
		<h2>Credits</h2>
		<p>This component includes Folder Tree Static by Alf Magne
		Kalleland. It is released under LGPL and can be found at
		http://www.dhtmlgoodies.com/</p>
	</div>

</div>