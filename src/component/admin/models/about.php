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

jimport( 'joomla.application.component.model' );

class DumpModelAbout extends JModel {
    var $_data;

    function __construct() {
        $mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');

        $this->_data = new JObject();

        //get plugin info
        jimport( 'joomla.event.helper' );
        $this->_data->plugin = & JPluginHelper::getPlugin( 'system', 'dump' );
        if( empty($this->_data->plugin) ) {
            $mainframe->enqueueMessage( 'To use J!Dump, the J!Dump plugin has to be <a href="index.php?option=com_installer">installed</a> and <a href="index.php?option=com_plugins&amp;filter_type=system">published</a>.' );
        }

        parent::__construct();
    }

    function & getPlugin() {
        return $this->_data->plugin;
    }
    function & getReadme() {
        return $this->_getFile( 'readme.php' );
    }

    function & getInstallation() {
        return $this->_getFile( 'installation.php' );
    }

    function & _getFile( $filename ){
        ob_start();
        include( JPATH_COMPONENT_ADMINISTRATOR.DS.$filename );
        $file = ob_get_clean();
        $file = nl2br( $file );
        return $file;
    }
}
