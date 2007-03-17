<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class DumpViewAbout extends JView {
    function display($tpl = null) {
        global $mainframe;

        // we need to add these paths so the component can work in both site and administrator
        $this->addTemplatePath( dirname(__FILE__) . DS . 'tmpl' );

        $files = array( 'readme', 'changelog', 'mjaztools', 'installation' );
        foreach( $files as $file ) {
            $this->assignRef( $file, $this->get( $file ) );
        }

        parent::display($tpl);
    }
}