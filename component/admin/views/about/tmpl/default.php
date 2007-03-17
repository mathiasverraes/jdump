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
                <legend>MjazTools</legend>
                <div style="font-family:courier"><?php echo $this->mjaztools?></div>
            </fieldset>

            <fieldset class="adminform">
                <legend>Installation</legend>
                <div style="font-family:courier"><?php echo $this->installation?></div>
            </fieldset>
            <fieldset class="adminform">
                <legend>Changelog</legend>
                <div style="font-family:courier"><?php echo $this->changelog?></div>
            </fieldset>
        </td>
    </tr>
</table>