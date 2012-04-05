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

$mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');
$phpversion = explode( '.', phpversion() );

define( 'DUMP_VERSION', '%%VERSION%%' );
define( 'DUMP_URL',     JURI::root() . 'administrator/components/com_dump/' );
