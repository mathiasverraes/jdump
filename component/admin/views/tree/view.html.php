<?php
/**
 * MjazTools Dump
 * @version      $Id$
 * @package      mjaztools_dump
 * @copyright    Copyright (C) 2007 MjazTools. All rights reserved.
 * @license      GNU/GPL
 * @link         http://forge.joomla.org/sf/projects/mjaztools
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
jimport('joomla.html.tooltips');

class DumpViewTree extends JView {
    function display($tpl = null) {
        global $mainframe;

        // we need to add these paths so the component can work in both site and administrator
        $this->addTemplatePath( dirname(__FILE__) . DS . 'tmpl' );

        // client information (site, administrator, ... )
        jimport( 'joomla.application.helper' );
        $client = JApplicationHelper::getClientInfo();

        // make sure we only show the component
        JRequest::setVar( 'tmpl', 'component' );

        $document   =& JFactory::getDocument();
        $document->setTitle( 'MjazTools Dump - ' . ucfirst( $client->name ) );
        $document->addScriptDeclaration( "var imageFolder =  '" . DUMP_URL . "assets/images/'" );	// Path to images
        $document->addStyleSheet( DUMP_URL . 'assets/css/folder-tree-static.css' );
        $document->addStyleSheet( DUMP_URL . 'assets/css/dump.css' );
        $document->addScript( DUMP_URL . 'assets/js/folder-tree-static.js');

        // render tree and assign to template
        $tree =& $this->renderTree();
        $this->assignRef('tree', $tree );

        $this->assignRef(	'application',	$client->name );
        $this->assign(		'version',			DUMP_VERSION );
        $this->assign(		'closebutton',		JRequest::getVar( 'closebutton', 1 ) );

        parent::display($tpl);
    }

    function & renderTree() {
        global $mainframe;

        $output = '';

        // get the nodes from the model
        $nodes =& $this->get('nodes');

        // render the nodes to <ul><li...
        foreach ( $nodes as $node ) {
            $output .= $this->renderNode( $node );
        }
        return $output;
    }

    function renderNode( & $node ) {
        switch ( $node['type'] ) {
            case 'object':
            case 'array':
                return $this->renderObjArray( $node );
                break;
            case 'integer':
            case 'float':
            case 'double':
                return $this->renderNumber( $node );
                break;
            case 'string':
                return $this->renderString( $node );
                break;
            case 'null':
            case 'resource':
                return $this->renderNull( $node );
                break;
            case 'boolean':
                return $this->renderBoolean( $node );
                break;
            case 'method':
                return $this->renderMethod( $node );
                break;
            case 'methods':
            case 'properties':
                return $this->renderMethProp( $node );
                break;
            case 'message':
                return $this->renderMessage( $node );
                break;
            default:
                return $this->renderObjArray( $node );
                break;
        }
    }

    function renderObjArray( & $node ) {
        global $node_id;



        $children = count( $node['children'] );

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="a' . ++$node_id . '">' ;
        $output .= '<span class="dumpType"> [';
        $output .= ( isset( $node['classname'] ) ? $node['classname'] . ' ' : '' );
        $output .= $node['type'];
        $output .= ']</span> ';

        $output .= $node['name'];
        $output .= $this->renderSource( $node );



        $output .= $children ? '' : ' = <i>(empty)</i>';
        $output .= '</a>';

        if ( $children ) {
            $output .= '<ul>';
            foreach( $node['children'] as $child ) {
                $output .= $this->renderNode( $child );
            }
            $output .= '</ul>';

        }
        $output .= '</li>';

        return $output;
    }

    function renderNull( & $node ) {
        global $node_id;

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' ;
        $output .= '<span class="dumpType"> ['. $node['type'] . ']</span> ';
        $output .= $node['name'];
        $output .= $this->renderSource( $node );
        $output .= '</a>';
        $output .= '</li>';
        return $output;
    }


    function renderNumber( & $node ) {
        global $node_id;

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' ;
        $output .= '<span class="dumpType"> ['. $node['type'] . ']</span> ';
        $output .= $node['name'];
        $output .= ' = ' . $node['value'];
        $output .= $this->renderSource( $node );
        $output .= '</a>';
        $output .= '</li>';

        return $output;

    }

    function renderBoolean( & $node ) {
        global $node_id;

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' ;
        $output .= '<span class="dumpType"> ['. $node['type'] . ']</span> ';
        $output .= $node['name'];
        $output .= $this->renderSource( $node );
        $output .= ' = ' . ( $node['value'] ? 'TRUE' : 'FALSE' );
        $output .= $this->renderSource( $node );
        $output .= '</a>';
        $output .= '</li>';
        return $output;

    }

    function renderString( & $node ) {
        global $node_id;


        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' ;
        $output .= '<span class="dumpType"> ['. $node['type'] . ']</span> ';
        $output .= $node['name'];
        $output .= ' = "' . nl2br(htmlspecialchars( $node['value'] , ENT_QUOTES ) ). '"';
        if ( isset($node['length']) ) { $output .= ' <span class="dumpString">(Length = '.intval($node['length']).')</span>'; }
        $output .= $this->renderSource( $node );
        $output .= '</a>';
        $output .= '</li>';
        return $output;

    }

    function renderMessage( & $node ) {
        global $node_id;

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' ;
        $output .= '<i>'.$node['value'].'</i>';
        $output .= $this->renderSource( $node );
        $output .= '</a>';
        $output .= '</li>';
        return $output;

    }

    function renderMethod( & $node ) {
        global $node_id;

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' . $node['name'] . '</a>';
        $output .= '</li>';

        return $output;

    }
    function renderMethProp( & $node ) {
        global $node_id;

        $output = '';

        $output .= '<li class="' . $node['type'] . '.gif">';
        $output .= '<a href="#" id="node_' . ++$node_id . '">' . $node['name'] . '</a>';

        if ( count( $node['children'] ) ) {
            $output .= '<ul>';
            foreach( $node['children'] as $child ) {
                $output .= $this->renderNode( $child );
            }
            $output .= '</ul>';
        }
        $output .= '</li>';




        return $output;


    }

    function & renderSource( & $node ) {
        global $mainframe;

        $params   = JComponentHelper::getParams('com_dump');

        $output = '';

        if ($node['source'] && $params->get('showOrigin', 1))
        {
            // next line doesn't work - bug in J?
            //$output .=  JCommonHTML::ToolTip($node['source'], 'Source');

            $tooltip    = htmlspecialchars($node['source']);
            $output .= '&nbsp;<span class="hasTip" width="600px" title="'.$tooltip.'"><img src="'.$mainframe->getCfg('live_site').'/includes/js/ThemeOffice/content.png" alt="Tooltip" border="0" width="12" hieght="12"></span>';

        }

        return $output;
    }
}
