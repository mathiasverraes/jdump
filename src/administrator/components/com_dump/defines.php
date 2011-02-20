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

$mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');
$phpversion = explode( '.', phpversion() );

define( 'DUMP_VERSION', '1.2.0.BETA2' );
define( 'DUMP_URL',     JURI::root() . 'administrator/components/com_dump/' );
