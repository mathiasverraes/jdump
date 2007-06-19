<?php
/**
 * MjazTools Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 MjazTools. All rights reserved.
 * @license      GNU/GPL
 * @link         http://joomlacode.org/gf/project/jdump/
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class DumpModelAbout extends JModel {
    var $_data;

    function __construct() {
        global $mainframe;

        $this->_data = new JObject();

        //get plugin info
        jimport( 'joomla.event.helper' );
        $this->_data->plugin = & JPluginHelper::getPlugin( 'system', 'dump' );
        if( !$this->_data->plugin OR !$this->_data->plugin->published ) {
            $mainframe->enqueueMessage( 'To use MjazTools Dump, the Dump plugin has to be <a href="index.php?option=com_installer">installed</a> and <a href="index.php?option=com_plugins&filter_type=system">published</a>.' );
        }

        parent::__construct();
    }

    function & getPlugin() {
        return $this->_data->plugin;
    }
    function & getReadme() {
        return $this->_getFile( 'readme.php' );
    }
    function & getChangelog() {
        return $this->_getFile( 'changelog.php' );
    }
    function & getInstallation() {
        return $this->_getFile( 'installation.php' );
    }
    function & getMjaztools() {
        return $this->_getFile( 'mjaztools.php' );
    }


    function & _getFile( $filename ){
        ob_start();
        include( JPATH_COMPONENT_ADMINISTRATOR.DS.$filename );
        $file = ob_get_clean();
        $file = nl2br( $file );
        return $file;
    }
}
