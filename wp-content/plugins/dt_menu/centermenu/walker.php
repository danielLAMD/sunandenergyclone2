<?php
defined('ABSPATH') or die();

class detheme_centermenuoverlay_mainmenu_walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= '<!--start_el begin-->';
        if ($depth==0) {
        	array_push($item->classes,'dt-dropdown','cd-label');
            parent::start_el($output,$item,$depth,(object)$args,$id);

            $tem_output = $output . '<akhir>';

            if (in_array('menu-item-has-children',$item->classes)) {
                $output = preg_replace('/(.*)<a href="(.*)"><span>(.*)<\/span><\/a><akhir>/', ' $1 <a href="#" class="dt-dropdown-toggle" data-toggle="dt-dropdown" title="$3">$3<span class="caret"></span></a>', $tem_output);
            } else {
                $output = preg_replace('/(.*)<a href="(.*)"><span>(.*)<\/span><\/a><akhir>/', ' $1 <a href="$2" title="$3">$3</a>', $tem_output);
            }



            /*
            print_r('<!--testing '.$testoutput.' endtesting-->');
            exit;

            echo preg_replace("/([Cc]opyright) 200(3|4|5|6)/", "$1 2007", "copyright 2005");
            exit;
            */
            //$output .= '<!--trace ' . $output . ' ecart-->'; 
        } else {
        	parent::start_el($output,$item,$depth,(object)$args,$id);	
        }
        $output .= '<!--start_el end-->';
    } //function start_el

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '<!--end_el-->';
        parent::end_el($output,$item,$depth,$args);
    } //function end_el
}
?>