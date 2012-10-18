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

class DumpModelTree extends JModelLegacy {
    var $_nodes = array();

    function __construct() {
        $mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');

        //get the userstate
        $this->_nodes = $mainframe->getUserState( 'dump.nodes' );
        if ( !is_array( $this->_nodes ) ) {
            $this->_nodes = array();
        }
        // and clear it
        $mainframe->setUserState( 'dump.nodes', array() );

        parent::__construct();

    }

    function & getNodes() {
        return $this->_nodes;
    }

    function countDumps() {
        return count( $this->_nodes ) ;
    }
}
