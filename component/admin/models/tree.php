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

jimport( 'joomla.application.component.model' );

class DumpModelTree extends JModel {
    var $_nodes = array();

    function __construct() {
        global $mainframe;

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
