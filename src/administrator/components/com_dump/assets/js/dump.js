/**
 * J!Dump
 * @version      $Id$
 * @package      jdump
 * @copyright    Copyright (C) 2006-2011 Mathias Verraes. All rights reserved.
 * @license      GNU/GPL
 * @link         https://github.com/mathiasverraes/jdump
 */

function dumpLockWindow()
{
    $('dumpRefresh').remove();
    $('dumpLock').remove();
		$('dumpLocked').setStyle('display', 'inline');
		window.name='dumpLock' + new Date().getTime(); // Make a new unique name for the window
}
