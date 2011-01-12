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
?>
<table class="noshow">
    <tr>
        <td width="50%">
            <fieldset class="adminform">
                <legend>Readme</legend>
                <div style="font-family:courier"><?php echo $this->readme?></div>
            </fieldset>
        </td>
        <td width="50%">
            <fieldset class="adminform">
                <legend>Installation</legend>
                <div style="font-family:courier"><?php echo $this->installation?></div>
            </fieldset>
        </td>
    </tr>
</table>
