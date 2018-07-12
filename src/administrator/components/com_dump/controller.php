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

class DumpController extends JControllerLegacy{

	function display($cachable = false, $urlparams = false) {
		$mainframe = JFactory::getApplication(); 
		$option = JRequest::getCmd('option');
		$Itemid = JRequest::getInt('Itemid');
		

		// we need to add these paths so the component can work in both site and administrator
		$this->addViewPath( JPATH_COMPONENT_ADMINISTRATOR . '/views' );
		$this->addModelPath( JPATH_COMPONENT_ADMINISTRATOR . '/models' );

		$document   = JFactory::getDocument();
		// specify the type of the view (raw for dump tree in Frontend, html for admin comp)
		if($mainframe->isSite()) {
			// specify the RAW format for the JDump Frontend menu link
			$viewType   = "raw";
		} else {
			$viewType   = $document->getType();
		}
		// get some vars
		$viewName	= JRequest::getCmd( 'view', 'about' );
		$viewLayout = JRequest::getCmd( 'layout', 'default' );

		// get the view & set the layout
		$view       = $this->getView( $viewName,  $viewType);
		$view->setLayout( $viewLayout );

		// Get/Create the model
		if ( $model = $this->getModel( $viewName ) ) {
			// Push the model into the view (as default)
			$view->setModel( $model, true );
		}

		// Display the view
		$view->display();
	}
}
