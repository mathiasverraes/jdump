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

global $mainframe;
$phpversion = explode( '.', phpversion() );

define( 'DUMP_VERSION', '1.0.3' );
define( 'DUMP_PHP',     intval($phpversion[0]) );
define( 'DUMP_URL',     $mainframe->getCfg('live_site') . '/administrator/components/com_dump/' );