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
MjazTools Dump - Changelog
--------------------------

Legend
	* -> Security Fix
	# -> Bug Fix
	+ -> Addition
	^ -> Change
	- -> Removed
	! -> Note

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