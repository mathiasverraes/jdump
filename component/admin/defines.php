<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

global $mainframe;
$phpversion = explode( '.', phpversion() );

define( 'DUMP_VERSION', '1.0.1' );
define( 'DUMP_PHP',     intval($phpversion[0]) );
define( 'DUMP_URL',     $mainframe->getCfg('live_site') . '/administrator/components/com_dump/' );