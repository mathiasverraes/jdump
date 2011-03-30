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

jimport( 'joomla.utilities.array' );

class DumpSysinfo extends JObject
{
    var $data = array();

    function __construct()
    {
        // execute all methods that start with '_load'
        foreach( get_class_methods( $this ) as $method ) {
            if( '_load' == substr( $method, 0, 5 ) ) {
                $this->$method();
            }
        }
        $this->sort( $this->data );
    }

    function _loadConfig()
    {
        $jconf                  = new JConfig();
        $jconf->password        = '*******';
        $jconf->ftp_pass        = '*******';
        $jconf->secret          = '*******';
        $this->data['Joomla Configuration'] = JArrayHelper::fromObject( $jconf );
    }

    function _loadVersions()
    {
        $version = new JVersion();
        $this->data['Versions']['Joomla!']        = $version->getLongVersion();
        $this->data['Versions']['J!Dump'] = DUMP_VERSION;
        $this->data['Versions']['PHP']            = phpversion();
        $this->data['Versions']['Apache']         = function_exists('apache_get_version') ? apache_get_version() : 'unknown';
        $this->data['Versions']['Zend Engine']    = zend_version();
    }

    function _loadEnvironment()
    {
        $this->data['Environment']['_SERVER']		=  $_SERVER;
        $this->data['Environment']['_GET']			=  $_GET;
        $this->data['Environment']['_POST']			=  $_POST;
        $this->data['Environment']['_COOKIE']		=  $_COOKIE;
        $this->data['Environment']['_FILES']		=  $_FILES;
        $this->data['Environment']['_ENV']			=  $_ENV;
        $this->data['Environment']['_REQUEST']		=  $_REQUEST;
    }

    // recursive natural key sort
    function sort( & $array ){
        uksort( $array, 'strnatcasecmp' ); // this will do natural key sorting (A=a)
        foreach( array_keys( $array ) as $k ){
            if( 'array' == gettype( $array[$k] ) ){
                $this->sort( $array[$k] );
            }
        }
    }
}
