<?php
defined('ABSPATH') or die();

class dt_menu_mobile_walker extends Walker_Nav_Menu {
  protected $megamenu_parent_ids = array();
  private $curItem;

  function start_lvl( &$output, $depth = 0, $args = array() ) {
      $tem_output = $output . 'akhir';

      $found = preg_match_all('/<li (.*)<span>(.*?)<\/span><\/a>akhir/s', $tem_output, $matches);

      $foundid = preg_match_all('/<li id="menu\-item\-(.*?)"/s', $tem_output, $ids);

      $found_full_megamenu = preg_match_all('/class="(.*)dt\-megamenu(.*?)"/s', $tem_output, $full_megamenu);

      if ($found) {
        $menu_title = $matches[count($matches)-1][0];

        if (count($ids[1])>0) {
          $menu_id = $ids[1][count($ids[1])-1];
        } else {
          $menu_id = rand (1000,9999);
        }
        $class_sub = "";

        $output .= '<label for="fof'.$menu_id.'" class="toggle-sub" onclick="">'.(is_rtl()?'&lsaquo;':'&rsaquo;').'</label>
        <input id="fof'.$menu_id.'" class="sub-nav-check" type="checkbox">
        <ul id="fof-sub-'.$menu_id.'" class="sub-nav '. $class_sub .'"><li class="sub-heading">'. $menu_title .' <label for="fof'.$menu_id.'" class="toggle" onclick="" title="'.esc_attr(__('Back','dt_menu')).'">'.(is_rtl()?__('Back','dt_menu').' &rsaquo;':'&lsaquo; '.__('Back','dt_menu')).'</label></li>';

      }
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    if ( is_plugin_active('hnd-megamenu/hnd-megamenu.php') ) {
      if (isset($this->curItem)) {
        if ($this->curItem->megamenuType=='megamenu-column') {
          $output .= '</div></li><!--end of <li><div class="row">-->';// end of <li><div class="row">
          $output .= '<!--end_lvl1 '.$this->curItem->ID.' '. $this->curItem->megamenuType . ' -->';
          parent::end_lvl($output,$depth,$args);
        } else {
          $output .= '<!--end_lvl2 '.$this->curItem->ID.' '. $this->curItem->megamenuType . ' -->';
          parent::end_lvl($output,$depth,$args);
        }
      } else {
        $output .= '<!--end_lvl3-->';
        parent::end_lvl($output,$depth,$args);
      }
    } else {
      $output .= '<!--end_lvl4-->';
      parent::end_lvl($output,$depth,$args);
    }
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $detheme_Style;
    global $detheme_config;

    if(is_array($args) && $args['fallback_cb']=='wp_page_menu'){

      $item->title=$item->post_title;
      $item->url=get_permalink($item->ID);
    }

    if ( is_plugin_active('hnd-megamenu/hnd-megamenu.php') ) {

      switch($item->megamenuType) {
        case 'megamenu-column':

          $classes = implode(" ",$item->classes);

          $output .= '<div class="'.$classes.' dt-megamenu-grid">';
          $output .= '  <ul class="dt-megamenu-sub-nav">';
        break;
        case 'megamenu-heading':
          parent::start_el($output,$item,$depth,$args,$id);
        break;
        case 'megamenu-content':
          parent::start_el($output,$item,$depth,$args,$id);
        break;
        default :
          if ($item->megamenuLogo!="active") parent::start_el($output,$item,$depth,(object)$args,$id);
        break;
      }

      //Kalo Option "Logo Here" dicentang
      if (($item->megamenuLogo=="active")&&($detheme_config['dt-header-type']=='middle')) {
        $logo = $detheme_config['dt-logo-image']['url'];
        $logo_transparent = $detheme_config['dt-logo-image-transparent']['url'];

        $logoContent="";

        if(!empty($logo)){
          $logoContent='<a href="'.esc_url(home_url()).'" style=""><img id="logomenu" src="'.esc_url(maybe_ssl_url($logo)).'" alt="'.(!empty($detheme_config['dt-logo-text'])?esc_attr($detheme_config['dt-logo-text']):"").'" class="img-responsive halfsize" '.(($detheme_config['logo-width'])?" width=\"".(int)$detheme_config['logo-width']."\"":"").'></a>';
          $logoContent.='<a href="'.esc_url(home_url()).'" style=""><img id="logomenureveal" src="'.esc_url(maybe_ssl_url($logo_transparent)).'" alt="'.(!empty($detheme_config['dt-logo-text'])?esc_attr($detheme_config['dt-logo-text']):"").'" class="img-responsive halfsize" '.(($detheme_config['logo-width'])?" width=\"".(int)$detheme_config['logo-width']."\"":"").'></a>';
        } else{
          $logoContent=(!empty($detheme_config['dt-logo-text']))?'<div class="header-logo><a class="navbar-brand-desktop" href="'.esc_url(home_url()).'">'.$detheme_config['dt-logo-text'].'</a></div>':"";
        }

        $output .= '<li class="logo-desktop hidden-sm hidden-xs">'.$logoContent;
      }

      if (is_array($item->classes) && in_array('dt-megamenu',$item->classes)) {
        $class_sub = "megamenu-sub";
        $style_sub = "";

        if ( is_plugin_active('hnd-megamenu/hnd-megamenu.php') ) {
          if (isset($item->megamenuWidthOptions)) {
            if ($item->megamenuWidthOptions=='dt-megamenu-width-set sticky-left') {
              if (!empty($item->megamenuWidth)) {
                $class_sub .= " dt-megamenu-custom-width-".$item->ID;
                $detheme_Style[] = ".dt-megamenu-custom-width-".$item->ID."{ width:". $item->megamenuWidth . " !important; }";
                $detheme_Style[] = "@media ( max-width:991px ) {.dt-megamenu-custom-width-".$item->ID."{ width:270px !important; }}";
              }
            } else {
              $class_sub = "megamenu-sub ". $item->megamenuWidthOptions;
            }
          }
        }


        $menu_id = $item->ID;
        $this->megamenu_parent_ids[] = $menu_id;

        $background_id = '';
        if (isset($item->megamenuBackgroundURL)) {
          $background_id = 'megamenu_bg_'.$menu_id;
          $detheme_Style[] = '#megamenu_bg_' . $menu_id . ' {background: url('.$item->megamenuBackgroundURL.') '. $item->megamenuBackgroundHorizontalPosition . ' ' . $item->megamenuBackgroundVerticalPosition . ' ' . $item->megamenuBackgroundRepeat . ';}';

          $detheme_Style[] = '@media ( max-width:990px ) { #megamenu_bg_' . $menu_id . ' {background: none;}}';
        }

        $menu_title = $item->post_title;

        $output .= '<label for="fof'.$menu_id.'" class="toggle-sub" onclick="">'.(is_rtl()?'&lsaquo;':'&rsaquo;').'</label>
        <input id="fof'.$menu_id.'" class="sub-nav-check" type="checkbox">
        <ul id="fof-sub-'.$menu_id.'" class="sub-nav '. $class_sub .'"'.$style_sub.'><li class="sub-heading">'. $menu_title .' <label for="fof'.$menu_id.'" class="toggle" onclick="" title="'.esc_attr(__('Back','dt_menu')).'">'.(is_rtl()?__('Back','dt_menu').' &rsaquo;':'&lsaquo; '.__('Back','dt_menu')).'</label></li>';

        $output .= '<li><div class="row" id="'.$background_id.'">';
      }

    } else {
      parent::start_el($output,$item,$depth,(object)$args,$id);
    }
    
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $this->curItem = $item;

    if ( is_plugin_active('hnd-megamenu/hnd-megamenu.php') ) {
      switch($item->megamenuType) {
        case 'megamenu-column':
          $output .= '</div><!--end_el megamenu-column-->';
        break;
        case 'megamenu-heading':
          parent::end_el($output,$item,$depth,$args);
        break;
        case 'megamenu-content':
          parent::end_el($output,$item,$depth,$args);
        break;
        default :
          parent::end_el($output,$item,$depth,$args);
        break;
      }
    } else {

      parent::end_el($output,$item,$depth,$args);
    }
  }

} //class dt_menu_mobile_walker
?>