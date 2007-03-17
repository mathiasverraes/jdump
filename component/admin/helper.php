<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


class DumpHelper extends JObject {

    function showPopup() {
        global $mainframe;

        jimport( 'joomla.application.helper' );
        $client     = JApplicationHelper::getClientInfo();

        // settings from config.xml
        $dumpConfig = & JComponentHelper::getParams( 'com_dump' );
        $w          = $dumpConfig->get( 'popupwidth', 500 );
        $h          = $dumpConfig->get( 'popupheight', 500 );

        // build the url
        $url = 'index.php?option=com_dump&view=tree&tmpl=component';

        // only add Itemid in Site
        if ( $mainframe->isSite() ) {
            $url .= '&Itemid=' . DumpHelper::getComponentItemid( 'com_dump' );
        }

        // add the javascript to the document
        ?>
<!-- MjazTools Dump -->
<script type="text/javascript">
// <!--
window.open( "<?php echo $url ?>", "dump-<?php echo $client->name?>", "height=<?php echo $h?>,width=<?php echo $w?>,toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1");
// -->
</script>
<!-- / MjazTools Dump -->
<?php
    }

    function getComponentItemid( $option ) {
        jimport('joomla.application.menu');
        $menu = & JMenu::getInstance();
        $components = & $menu->getItems( 'type', 'component' );

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

    function & getMaxDepth() {
        static $maxdepth = null;

        if ( !$maxdepth ) {
            $dumpConfig         = & JComponentHelper::getParams( 'com_dump' );
            $maxdepth           = intval( $dumpConfig->get( 'maxdepth', 5 ) );
            if( $maxdepth > 20 ) $maxdepth=20;
            if( $maxdepth < 1  ) $maxdepth=1;
        }

        return $maxdepth;
    }
}