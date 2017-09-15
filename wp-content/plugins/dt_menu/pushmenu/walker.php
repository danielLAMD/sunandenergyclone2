<?php
defined('ABSPATH') or die();

class detheme_pushmenuoverlay_mainmenu_walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<!--start_lvl '.$depth.'-->';
        $output .= '<ul class="dropmenu">';
    } //function start_lvl

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<!--end_lvl-->';
        $output .= '</ul>';
    } //function end_lvl
}

?>