<?php
/**
 * J!Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 J!Dump Team. All rights reserved.
 * @license      GNU/GPL
 * @link         http://joomlacode.org/gf/project/jdump/
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
J!Dump - Changelog
------------------

Legend
	* -> Security Fix
	# -> Bug Fix
	+ -> Addition
	^ -> Change
	- -> Removed
	! -> Note

2008-04-28
  # Fix for installation in subfolder

2008-01-16
	# Fix for installation in subfolder

2008-01-14
 # Fix for url to popup on SEF enabled sites
 ^ Increased height of preference window
 ^ Changed way of telling if dump plugin is enabled

2007-08-20 Jenscski
 ^ Changed the way JApplicationHelper::getClientInfo is called. Needs clientid as parameter

2007-08-16 Jenscski
 ^ Changed plugin to reflect changes in framework

2007-07-03 Mjaz
 ^ Changed component menu name to J!Dump

2007-06-19 Jenscski
 ^ Change url from forge to joomlacode

2007-05-04 Jenscski
 # API changes in Joomla!

2007-04-27 Mjaz
 # Fixed tooltips layout and other issues

2007-04-24 Jenscski
 # JMenuBar changed to JToolBarHelper
 # JPluginHelper changed place

2007-04-03 Jenscski
 # Fixed popup on IE

2007-03-26 Jenscski
 + Added locking to dump window

2007-03-26 Mjaz
 + Added icons for locking: locked.png, unlocked.png

2007-03-22 Mjaz
 + Source is shown in a tooltip

2007-03-21 Jenscski
 + New shortcut, dumpTrace. Dumps the backtrace

2007-03-19 Jenscski
 + Show the file, method and line number where the dump was done

2007-03-17 Mjaz
 ! Moved project to JoomlaCode.org
 ! Renamed project to J!Dump
 ! Jenscski joined the project

2007-03-09 Mjaz
 ! Released v1.0.3
 ! Moved project to Google Code

2007-Mar-08 Mjaz
 ^ Popup javascript is now added to the header (thanks jenscski)

2007-Feb-23 Mjaz
 ^ Moved toolbar code to views
 - Removed getComponentItemid() due to the new JRoute in J!1.5
 # JMenuBar::config changed to preferences

2007-Jan    Mjaz
 # Using JResponse to append javascript to body
 # onAfterDisplay was renamed to onAfterRender in Joomla (jenscski)
 ^ Updated comments
 # Fixed notice
 ! Imported to SVN
 ! v1.0.1 Released
 #  Moved $dispatcher after class declaration for php5
 #  Added 'return false' to javascript links
 #  Fixed notices

2006-Dec-29 Mjaz
 ! v1.0.0 Released
 +  Added dumpSysinfo()
 +  Close Button
 +  Strings can be trimmed
 +  Strings are shown as raw html
 ^  Some layout details
 ^  Better boolean symbol
 #  Resources showed as 'empty'
 #  No Itemid when no menu is defined

v1.0.0 BETA
 ! First release
