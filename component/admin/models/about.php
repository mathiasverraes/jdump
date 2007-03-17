<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class DumpModelAbout extends JModel {
    var $_data;

    function __construct() {
        global $mainframe;

        $this->_data = new JObject();

        //get plugin info
        jimport( 'joomla.application.plugin.helper' );
        $this->_data->plugin = & JPluginHelper::getPlugin( 'system', 'dump' );
        if( !$this->_data->plugin->published ) {
            $mainframe->enqueueMessage( 'To use MjazTools Dump, the Dump plugin has to be <a href="index.php?option=com_installer">installed</a> and <a href="index.php?option=com_plugins&filter_type=system">published</a>.' );
        }

        parent::__construct();
    }

    function & getPlugin() {
        return $this->_data->plugin;
    }
    function & getReadme() {
        return $this->_getFile( 'readme.txt' );
    }
    function & getChangelog() {
        return $this->_getFile( 'changelog.txt' );
    }
    function & getInstallation() {
        return $this->_getFile( 'installation.txt' );
    }
    function & getMjaztools() {
        return $this->_getFile( 'mjaztools.txt' );
    }


    function & _getFile( $filename ){
        jimport( 'joomla.filesystem.file');
        $file = JFile::read( JPATH_COMPONENT_ADMINISTRATOR.DS.$filename );
    $file = nl2br( $file );
        return $file;
    }
}