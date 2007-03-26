function dumpLockWindow()
{
    $('dumpRefresh').remove();
    $('dumpLock').remove();
		$('dumpLocked').setStyle('display', 'inline');
		window.name='dumpLock' + new Date().getTime(); // Make a new unique name for the window
}
