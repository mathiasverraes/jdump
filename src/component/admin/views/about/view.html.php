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

jimport( 'joomla.application.component.view');

class DumpViewAbout extends JView {
    function display($tpl = null) {
        $mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');

        // Toolbar
        JToolBarHelper::title( 'J!Dump v' . DUMP_VERSION );
        $bar = & JToolBar::getInstance('toolbar');
        $bar->appendButton( 'Popup', 'default', 'Popup', "index.php?option=com_dump&view=tree&closebutton=0" );
        JToolBarHelper::preferences( 'com_dump', '300' );


/** Not needed here, DumpViewAbout is only used in the administrator
        // we need to add these paths so the component can work in both site and administrator
        $this->addTemplatePath( dirname(__FILE__) . DS . 'tmpl' );
*/


        $this->assignRef( 'readme', $this->get( 'readme' ) );
        $this->assignRef( 'installation', $this->get( 'installation' ) );

        parent::display($tpl);
    }
}
