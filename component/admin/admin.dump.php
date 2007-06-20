<?php
/**
 * J!Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 MjazTools. All rights reserved.
 * @license      GNU/GPL
 * @link         http://joomlacode.org/gf/project/jdump/
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

// use JPATH_COMPONENT_ADMINISTRATOR so we can use this in both site and administrator
// Defines
require_once( JPATH_COMPONENT_ADMINISTRATOR . DS . 'defines.php' );
// Require the base controller
require_once( JPATH_COMPONENT_ADMINISTRATOR . DS . 'controller.php' );

// Require specific controller if requested
if( $controller = JRequest::getVar('controller') ) {
    require_once ( JPATH_COMPONENT_ADMINISTRATOR . DS . 'controllers' . DS . $controller . '.php' );
}

// Create the controller
$classname  = 'DumpController'.$controller;
$controller = new $classname();

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

$controller->redirect();
