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

JHTML::_('behavior.tooltip');

class DumpViewTree extends JViewLegacy
{
    function display($tpl = null)
    {
        $mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');

        // we need to add these paths so the component can work in both site and administrator
        $this->addTemplatePath( dirname(__FILE__) . '/tmpl' );

        // client information (site, administrator, ... )
        jimport( 'joomla.application.helper' );
        $client = JApplicationHelper::getClientInfo($mainframe->getClientID());

        // make sure we only show the component
        JRequest::setVar( 'tmpl', 'component' );

        // render tree and assign to template
        $tree = $this->renderTree();
        $this->assignRef('tree', $tree );

        $this->assignRef(	'application',	$client->name );
        $this->assign(		'version',			DUMP_VERSION );
        $this->assign(		'closebutton',		JRequest::getInt( 'closebutton', 1 ) );

        parent::display($tpl);
    }

    function & renderTree() {
        $mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');

        $output = '';

        // get the nodes from the model
        $nodes = $this->get('nodes');

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
        $mainframe = JFactory::getApplication(); $option = JRequest::getCmd('option');

        $params   = JComponentHelper::getParams('com_dump');

        $output = '';

        if ($node['source'] && $params->get('showOrigin', 1))
        {
            // next line doesn't work - bug in J?
            //$output .=  JCommonHTML::ToolTip($node['source'], 'Source');

            $tooltip  = '<span class="tool-title">Source</span><br />';
            $tooltip .= '<span class="tool-text">' . $node['source'] . '</span>';
            $tooltip  = htmlspecialchars($tooltip);
            $output  .= '&nbsp;<span class="hasTip" width="600px" title="'.$tooltip.'"><img src="'.DUMP_URL.'assets/images/content.png" alt="Tooltip" border="0" width="12" height="12" /></span>';

        }

        return $output;
    }
}
