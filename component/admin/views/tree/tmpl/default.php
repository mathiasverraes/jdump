<?php
/**
 * MjazTools Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 MjazTools. All rights reserved.
 * @license      GNU/GPL
 * @link         http://joomlacode.org/gf/project/jdump/
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<fieldset class="dumpContainer">
<legend>Application: <?php echo ucfirst($this->application) ?></legend>
<br />

<a href="#" onclick="return false;" id="dumpLocked" class="dumpLocked">Window is locked</a>

<a href="#" onclick="dumpLockWindow();return false;" id="dumpLock" class="dumpLock">Lock Window</a>

<a href="#" onclick="window.location.reload( true );return false;" id="dumpRefresh" class="dumpRefresh">Refresh</a>

<?php if( $this->closebutton ) {
    ?><a href="#" onclick="window.close();return false;" class="dumpClose">Close Window</a><?php
} ?>

<?php if( $this->tree=='' ) {
    ?><br /><br />No dumped variables found.<br /><?php
} else {
    ?><a href="#" onclick="expandAll('dhtmlgoodies_tree');return false;" class="dumpExpandAll">Expand all</a>
<a href="#" onclick="collapseAll('dhtmlgoodies_tree');return false;" class="dumpCollapseAll">Collapse all</a><br /><br />
<ul id="dhtmlgoodies_tree" class="dhtmlgoodies_tree"><?php
    echo $this->tree
    ?></ul><?php
}?>

<br />

<a href='http://joomlacode.org/gf/project/jdump/' target='_blank' style='margin-right:10px;font-size:10px'>MjazTools Dump v<?php echo $this->version?></a>
</fieldset>
