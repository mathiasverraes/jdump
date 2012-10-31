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

// use JPATH_COMPONENT_ADMINISTRATOR so we can use this in both site and administrator
// Defines
require_once( JPATH_COMPONENT_ADMINISTRATOR . '/defines.php' );
// Require the base controller
require_once( JPATH_COMPONENT_ADMINISTRATOR . '/controller.php' );

// Require specific controller if requested
if( $controller = JRequest::getCmd('controller') ) {
    require_once ( JPATH_COMPONENT_ADMINISTRATOR . '/controllers/' . $controller . '.php' );
}

// Create the controller
$classname  = 'DumpController'.$controller;
$controller = new $classname();

// Perform the Request task
$controller->execute( JRequest::getCmd( 'task' ) );

$controller->redirect();
