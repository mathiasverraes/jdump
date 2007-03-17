<?php
/**
 * MjazTools Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 MjazTools. All rights reserved.
 * @license      GNU/GPL
 * @link         http://forge.joomla.org/sf/projects/mjaztools
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
MjazTools Dump
--------------

Advanced print_r and var_dump replacer with DHTML tree display.

Features
--------
This utility makes life easy for developers and template designers. You use it to see what's inside a variable, an array or an object. Instead of using print_r() or var_dump(), you can now use dump(). This will open a popup window with a nice expandable DHTML tree, showing the contents of the variable. It will even show a list of available methods for each object. You can use dump() in your extensions, in the core, in libraries and even in templates.

Using Dump
----------
Anywhere in your code, type:

dump( $variable, 'Variable Name' );

Simple huh? 'Variable Name' is optional and can be anything you like. If you use a lot of dumps, you'll want to use some descriptive names.

Shortcuts
---------
- dumpSysinfo();
  Displays a whole bunch of system information.
- dumpTemplateParams( $this );
  Use inside a template's index.php to dump the parameters.
- dumpMessage( 'Your message' );
  Displays a custom message. Very handy to check if a function or a loop is executed etc...

Notes
-----
- This component is only meant to be used on development test sites, NOT in live or production environments. If you must use it on a live site, don't do stupid things like dump($password) !
- This component was tested with Joomla! v1.5 beta (using the latest nightly builds).
- You can't use dump() in system plugins that are run before the Dump plugin is run, so it is best to use ordering in the plugin manager to put Dump upfront.

About DHMTL Goodies
-------------------
This component includes the excellent Folder Tree Static by Alf Magne Kalleland. It is released under LGPL and can be found at http://www.dhtmlgoodies.com/