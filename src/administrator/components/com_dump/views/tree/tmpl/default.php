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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>J!Dump - <?php echo $this->application?></title>
  <link href="<?php echo DUMP_URL?>assets/css/general.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo DUMP_URL?>assets/css/component.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo DUMP_URL?>assets/css/folder-tree-static.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo DUMP_URL?>assets/css/dump.css" type="text/css" />

  <script type="text/javascript" src="<?php echo DUMP_URL?>assets/js/mootools.js"></script>
  <script type="text/javascript" src="<?php echo DUMP_URL?>assets/js/joomla.javascript.js"></script>
  <script type="text/javascript" src="<?php echo DUMP_URL?>assets/js/folder-tree-static.js"></script>
  <script type="text/javascript" src="<?php echo DUMP_URL?>assets/js/dump.js"></script>

  <script type="text/javascript">
		window.addEvent('domready', function(){ var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false}); });
		var imageFolder =  '<?php echo DUMP_URL?>assets/images/';
  </script>

</head>
<body class="contentpane">



<fieldset class="dumpContainer">
<legend>Application: <?php echo $this->application?></legend>
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

<a href='https://github.com/mathiasverraes/jdump' target='_blank' style='margin-right:10px;font-size:10px'>J!Dump v<?php echo $this->version?></a>
</fieldset>



</body>
</html>