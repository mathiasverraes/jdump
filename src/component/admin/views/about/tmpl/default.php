<?php
/**
 * J!Dump
 * @version      $Id$
 * @package      jdump
 * @copyright    Copyright (C) 2006-2011 Mathias Verraes. All rights reserved.
 * @license      GNU/GPL
 * @link         http://joomlacode.org/gf/project/jdump/
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<h1>J!Dump v<?php echo DUMP_VERSION?></h1>

<p>Advanced print_r and var_dump replacer with DHTML tree display.</p>

<h2>Features</h2>
<p>This utility makes life easy for developers and template designers. You use it to see what's inside a variable, an array or an object. Instead of using print_r() or var_dump(), you can now use dump(). This will open a popup window with a nice expandable DHTML tree, showing the contents of the variable. It will even show a list of available methods for each object. You can use dump() in your extensions, in the core, in libraries and even in templates.</p>

<h2>Installation</h2>
<p>Install the component and the plugin. Make sure the plugin is published.</p>

<p>If you don't want the dump popup window to appear automatically, you can disable it in the configuration. To display the dump window manually:</p>
<ul><li>Administrator: Go to Components -> J!Dump and click Popup.</li>
<li>Site: Make a new menu item for J!Dump. Set it to 'Open in New Window'</li>
</ul>


<h2>Using J!Dump</h2>
<p>Anywhere in your code, type:</p>

<code>dump($variable, 'Variable Name');</code>

<p>Simple huh? 'Variable Name' is optional and can be anything you like. If you use a lot of dumps, you'll want to use some descriptive names.</p>

<h2>Shortcuts</h2>
<code>dumpSysinfo();</code>
<p>Displays a whole bunch of system information.</p>

<code>dumpTemplate($this);</code>
<p>Use inside a template's index.php to dump the parameters.</p>

<code>dumpMessage('Your message');</code>
<p>Displays a custom message. Very handy to check if a function or a loop is executed etc...</p>
<code>dumpTrace();</code>
<p>Displays the backtrace.</p>


<h2>Notes</h2>
<ul><li>This component is only meant to be used on development test sites, NOT in live or production environments. If you must use it on a live site, don't do stupid things like dump($password) !</li>
<li>This component was tested with Joomla! v1.5 beta (using the latest nightly builds).</li>
<li>You can't use dump() in system plugins that are run before the J!Dump plugin is run, so it is best to use ordering in the plugin manager to put J!Dump upfront.</li>
</ul>

<h2>Contributors</h2>
<ul><li>
Mathias Verraes (Lead)</li>
<li>Jens-Christian Skibakk</li>
<li>Tom Fuller</li>
</ul>

<p>Thanks to everybody who provided patches.</p>

<h2>Credits</h2>
<p>This component includes Folder Tree Static by Alf Magne Kalleland. It is released under LGPL and can be found at http://www.dhtmlgoodies.com/</p>

