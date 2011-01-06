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

jimport('joomla.application.component.controller');

class DumpController extends JController{

    function display() {
        $mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');
        $Itemid = JRequest::getInt('Itemid');
        

        // we need to add these paths so the component can work in both site and administrator
        $this->addViewPath( JPATH_COMPONENT_ADMINISTRATOR . DS . 'views' );
        $this->addModelPath( JPATH_COMPONENT_ADMINISTRATOR . DS . 'models' );

        // get some vars
        $document   = & JFactory::getDocument();
        $viewType   = $document->getType();
        $viewName	= JRequest::getCmd( 'view', 'about' );
        $viewLayout = JRequest::getCmd( 'layout', 'default' );

        // get the view & set the layout
        $view       = & $this->getView( $viewName,  $viewType);
        $view->setLayout( $viewLayout );

        // Get/Create the model
        if ( $model = & $this->getModel( $viewName ) ) {
            // Push the model into the view (as default)
            $view->setModel( $model, true );
        }

        // Display the view
        $view->display();
    }
}