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

$mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');
$phpversion = explode( '.', phpversion() );

define( 'DUMP_VERSION', '1.6.0' );
define( 'DUMP_PHP',     intval($phpversion[0]) );
define( 'DUMP_URL',     JURI::root() . 'administrator/components/com_dump/' );
