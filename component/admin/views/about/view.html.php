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

jimport( 'joomla.application.component.view');

class DumpViewAbout extends JView {
    function display($tpl = null) {
        global $mainframe;

        // Toolbar
        JToolBarHelper::title( 'MjazTools Dump v' . DUMP_VERSION );
        $bar = & JToolBar::getInstance('JComponent');
        $bar->appendButton( 'Popup', 'default', 'Popup', "index.php?option=com_dump&view=tree&closebutton=0" );
        JToolBarHelper::preferences( 'com_dump', '280' );


/** Not needed here, DumpViewAbout is only used in the administrator
        // we need to add these paths so the component can work in both site and administrator
        $this->addTemplatePath( dirname(__FILE__) . DS . 'tmpl' );
*/


        $files = array( 'readme', 'changelog', 'mjaztools', 'installation' );
        foreach( $files as $file ) {
            $this->assignRef( $file, $this->get( $file ) );
        }

        parent::display($tpl);
    }
}
