<?php
defined('ABSPATH') or die();

class detheme_sidemenuoverlay_mainmenu_walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<!--start_lvl '.$depth.'-->';
        //if ($depth > 0) {
            $output .= '<ul class="sub-menu dropdown">
                <li class="title back js-generated">
                    <div><a href="javascript:void(0)">Back</a></div>
                </li>';
        //} else {
        //    parent::start_lvl($output,$depth,$args);    
        //}
    } //function start_lvl

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<!--end_lvl-->';
        //if ($depth > 0) {
            $output .= '</ul>';
        //} else {
        //    parent::end_lvl($output,$depth,$args);
        //}
    } //function end_lvl

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= '<!--start_el begin-->';
        if (in_array('menu-item-has-children',$item->classes)) {
            array_push($item->classes,'has-dropdown');
        }
        parent::start_el($output,$item,$depth,(object)$args,$id);
        $output .= '<!--start_el end-->';
    } //function start_el

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '<!--end_el-->';
        parent::end_el($output,$item,$depth,$args);
    } //function end_el
}
?>