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


class DumpHelper extends JObject {

    static function showPopup() {
        $mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');

        jimport( 'joomla.application.helper' );
        $client     = JApplicationHelper::getClientInfo($mainframe->getClientID());

        // settings from config.xml
        $dumpConfig = JComponentHelper::getParams( 'com_dump' );
        $w          = $dumpConfig->get( 'popupwidth', 500 );
        $h          = $dumpConfig->get( 'popupheight', 500 );

        // build the url
        $url = JURI::base(true).'/index.php?option=com_dump&view=tree&format=raw';

        /* @TODO remove this and implement this in a later version using JRoute
        // only add Itemid in Site
        if ( $mainframe->isSite() ) {
            $url .= '&Itemid=' . DumpHelper::getComponentItemid( 'com_dump' );
        }
        */

        // create the javascript
        // We can't use $document, because it's already rendered
        $nl = "\n";
        $script = $nl. '<!-- J!Dump -->' .$nl.
                '<script type="text/javascript">' .$nl.
                '// <!--' .$nl.
                'window.open( "'.$url.'", "dump_'.$client->name.'", "height='.$h.',width='.$w.',toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1");' .$nl.
                '// -->' .$nl.
                '</script>' .$nl.
                '<!-- / J!Dump -->';

        // add the code to the header (thanks jenscski)
        // JResponse::appendBody( $script );
        $body = JResponse::getBody();
        $body = str_replace('</head>', $script.'</head>', $body);
        JResponse::setBody($body);

    }

/* @TODO remove this and implement this in a later version using JRoute
    function getComponentItemid( $option ) {
        jimport('joomla.application.menu');
        $menu = JMenu::getInstance();
        $components = $menu->getItems( 'type', 'component' );

        $attribs['option'] = '';
        foreach( $components as $component ) {
            $str = str_replace( 'index.php?', '', $component->link );
            parse_str( $str, $attribs );
            if( $attribs['option'] == $option ){
                return $component->id;
            }
        }
        // if no Itemid is found (because there's no menuitem for $option), return current
        return $GLOBALS['Itemid'];
    }
*/


		static function getSourceFunction(&$trace)
		{
				$function = '';

				for ($i=1, $n=count($trace); $i<$n; $i++)
				{
					$func = $trace[$i]['function'];

					if ($func!='include' && $func!='include_once' && $func!='require' && $func!='require_once')
					{
							if (@$trace[$i]['type'] && @$trace[$i]['class'])
									$function = $trace[$i]['class'].'<br />&nbsp;'.$trace[$i]['type'].'&nbsp;'.$func.'()';
							else
									$function = $func;
					}

					if ($function) break;
				}


				return "Function: $function<br />";
		}

		static function getSourcePath(&$trace)
		{
				$path = 'File: '.str_replace(JPATH_BASE.'/', '', $trace[0]['file'])
				. '<br />'
				. 'Line: '.$trace[0]['line']
                . '<br />';

				return $path;
		}

    static function & getMaxDepth() {
        static $maxdepth = null;

        if ( !$maxdepth ) {
            $dumpConfig         = JComponentHelper::getParams( 'com_dump' );
            $maxdepth           = intval( $dumpConfig->get( 'maxdepth', 5 ) );
            if( $maxdepth > 20 ) $maxdepth=20;
            if( $maxdepth < 1  ) $maxdepth=1;
        }

        return $maxdepth;
    }
}
