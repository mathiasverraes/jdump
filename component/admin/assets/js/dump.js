/**
 * J!Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 J!Dump Team. All rights reserved.
 * @license      GNU/GPL
 * @link         http://joomlacode.org/gf/project/jdump/
 */

function dumpLockWindow()
{
    $('dumpRefresh').remove();
    $('dumpLock').remove();
		$('dumpLocked').setStyle('display', 'inline');
		window.name='dumpLock' + new Date().getTime(); // Make a new unique name for the window
}
