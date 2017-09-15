<?php
defined('ABSPATH') or die();

class detheme_stackmenuoverlay_mainmenu_walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	array_push($item->classes,'MFO-li-open');
        $output .= '<!--start_el begin-->';
        parent::start_el($output,$item,$depth,(object)$args,$id);
        $output .= '<!--start_el end-->';
    } //function start_el

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '<!--end_el-->';
        parent::end_el($output,$item,$depth,$args);
    } //function end_el
}

?>