<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

global $option;

switch ($task) {
    default:
        JMenuBar::title( 'MjazTools Dump v' . DUMP_VERSION );

        $bar = & JToolBar::getInstance('JComponent');
        $bar->appendButton( 'Popup', 'default', 'Popup', "index.php?option=$option&view=tree&closebutton=0" );

        JMenuBar::configuration( $option, '250' );
        break;
}