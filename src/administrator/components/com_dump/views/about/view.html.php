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

class DumpViewAbout extends JViewLegacy {
    function display($tpl = null) {
        $mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');

        // Toolbar
        JToolBarHelper::title( 'J!Dump v' . DUMP_VERSION );
        $bar = JToolBar::getInstance('toolbar');
        $bar->appendButton( 'Popup', 'default', 'Popup', "index.php?option=com_dump&view=tree&format=raw&closebutton=0" );
        JToolBarHelper::preferences( 'com_dump', '300' );

        parent::display($tpl);
    }
}
