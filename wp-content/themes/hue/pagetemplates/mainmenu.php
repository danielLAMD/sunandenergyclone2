<?php
defined('ABSPATH') or die();

class hue_mainmenu_walker extends Walker_Nav_Menu {
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
        <ul id="fof-sub-'.$menu_id.'" class="sub-nav '. $class_sub .'"><li class="sub-heading">'. $menu_title .' <label for="fof'.$menu_id.'" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">'.(is_rtl()?esc_html__('Back','hue').' &rsaquo;':'&lsaquo; '.esc_html__('Back','hue')).'</label></li>';

      }
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {

    if ( detheme_plugin_is_active('hnd-megamenu/hnd-megamenu.php') ) {
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

    if(is_array($args) && $args['fallback_cb']=='wp_page_menu'){

      $item->title=$item->post_title;
      $item->url=get_permalink($item->ID);
    }

    if ( detheme_plugin_is_active('hnd-megamenu/hnd-megamenu.php') ) {

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
      if (($item->megamenuLogo=="active")&&(get_detheme_option('dt-header-type')=='middle')) {

        $logo_img = get_detheme_option('dt-logo-image');
        $logo = isset($logo_img['url']) ? $logo_img['url'] : "";
        $logo_transparent_img = get_detheme_option('dt-logo-image-transparent');
        $logo_transparent = isset($logo_transparent_img['url']) ? $logo_transparent_img['url'] : "";

        $logoContent="";

        if(!empty($logo)){
          $logoContent='<a href="'.esc_url(home_url('/')).'" style=""><img id="logomenu" src="'.esc_url(hue_maybe_ssl_url($logo)).'" alt="'.(get_detheme_option('dt-logo-text') ? esc_attr(get_detheme_option('dt-logo-text','')):"").'" class="img-responsive halfsize" '.(get_detheme_option('logo-width') ? " width=\"".(int)get_detheme_option('logo-width','')."\"":"").'></a>';
          $logoContent.='<a href="'.esc_url(home_url('/')).'" style=""><img id="logomenureveal" src="'.esc_url(hue_maybe_ssl_url($logo_transparent)).'" alt="'.(get_detheme_option('dt-logo-text') ? esc_attr(get_detheme_option('dt-logo-text')):"").'" class="img-responsive halfsize" '.(get_detheme_option('logo-width') ? " width=\"".(int)get_detheme_option('logo-width','')."\"":"").'></a>';
        } else{
          $logoContent=(get_detheme_option('dt-logo-text'))?'<div class="header-logo><a class="navbar-brand-desktop" href="'.esc_url(home_url('/')).'">'.get_detheme_option('dt-logo-text').'</a></div>':"";
        }

        $output .= '<li class="logo-desktop hidden-sm hidden-xs">'.$logoContent;
      }

      if (is_array($item->classes) && in_array('dt-megamenu',$item->classes)) {
        $class_sub = "megamenu-sub";
        $style_sub = "";

        if ( detheme_plugin_is_active('hnd-megamenu/hnd-megamenu.php') ) {
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
        <ul id="fof-sub-'.$menu_id.'" class="sub-nav '. $class_sub .'"'.$style_sub.'><li class="sub-heading">'. $menu_title .' <label for="fof'.$menu_id.'" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">'.(is_rtl()?esc_html__('Back','hue').' &rsaquo;':'&lsaquo; '.esc_html__('Back','hue')).'</label></li>';

        $output .= '<li><div class="row" id="'.$background_id.'">';
      }

    } else {
      parent::start_el($output,$item,$depth,(object)$args,$id);
    }
    
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $this->curItem = $item;

    if ( detheme_plugin_is_active('hnd-megamenu/hnd-megamenu.php') ) {
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

} //class hue_mainmenu_walker


  $headerType=get_detheme_option('dt-header-type','');

  $logo_img = get_detheme_option('dt-logo-image');
  $logo = isset($logo_img['url']) ? $logo_img['url'] : get_template_directory_uri() . '/images/logo.png';
  $logo_transparent_img = get_detheme_option('dt-logo-image-transparent');
  $logo_transparent = isset($logo_transparent_img['url']) ? $logo_transparent_img['url'] : get_template_directory_uri() . '/images/logo_sticky.png';

  $logoContent=$searchContent=$shoppingCart="";
  $logo_width_style = $headerType=='pagebar' &&  get_detheme_option('logo-width') ? " width:".(int)get_detheme_option('logo-width')."px;": "";

  if($headerType!='middle'):
    if(!empty($logo)){
      $alt_image = isset($logo_img['id']) ? get_post_meta($logo_img['id'], '_wp_attachment_image_alt', true) : "";
      $mobilealt_image = isset($logo_transparent_img['id']) ? get_post_meta($logo_transparent_img['id'], '_wp_attachment_image_alt', true) : "";

      $logoContent='<a href="'.esc_url(home_url('/')).'" style="'.$logo_width_style.'"><img id="logomenu" src="'.esc_url(hue_maybe_ssl_url($logo)).'" alt="'.esc_attr($alt_image).'" class="img-responsive halfsize" '.(get_detheme_option('logo-width') ? " width=\"".(int)get_detheme_option('logo-width')."\"":"").'><img id="logomenureveal" src="'.esc_url($logo_transparent).'" alt="'.esc_attr($mobilealt_image).'" class="img-responsive halfsize" '.(get_detheme_option('logo-width') ? " width=\"".(int)get_detheme_option('logo-width')."\"":"").'></a>';
    } else{
       $logoContent=get_detheme_option('dt-logo-text') ?'<div class="header-logo><a class="navbar-brand-desktop" href="'.esc_url(home_url('/')).'">'.get_detheme_option('dt-logo-text').'</a></div>':"";
    }//if(!empty($logo))

    if($logoContent!=''){
      $logoContent = '<li class="logo-desktop"'.(get_detheme_option('logo-width')?" style=\"width:".(int)get_detheme_option('logo-width')."px;\"":"").'>'.$logoContent.'</li>';
    }


    if(get_detheme_option('show-header-shoppingcart') && detheme_plugin_is_active('woocommerce/woocommerce.php')):
      if ( function_exists('WC') && sizeof( WC()->cart->get_cart() ) > 0 ) :
        $shoppingCart= '<li id="menu-item-999999" class="hidden-mobile bag menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-999999">
                  <a href="#">
                    <span><i class="icon-cart"></i> <span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span></span>
                  </a>
                  <label for="fof999999" class="toggle-sub" onclick="">'.(is_rtl()?'&lsaquo;':'&rsaquo;').'</label>
                  <input id="fof999999" class="sub-nav-check" type="checkbox">
                  <ul id="fof-sub-999999" class="sub-nav">
                    <li class="sub-heading">'.esc_html__('Shopping Cart','hue').' <label for="fof999999" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">'.(is_rtl()?esc_html__('Back','hue').' &rsaquo;':'&lsaquo; '.esc_html__('Back','hue')).'</label></li>
                    <li>
                      <!-- popup -->
                      <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                      <!-- end popup -->
                    </li>
                  </ul>

                </li>';
      else:
          $shoppingCart= '<li id="menu-item-999999" class="hidden-mobile bag menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-999999">
                    <a href="#">
                      <span><i class="icon-cart"></i> <span class="item_count">0</span></span>
                    </a>

                    <label for="fof999999" class="toggle-sub" onclick="">'.(is_rtl()?'&lsaquo;':'&rsaquo;').'</label>
                    <input id="fof999999" class="sub-nav-check" type="checkbox">
                    <ul id="fof-sub-999999" class="sub-nav">
                      <li class="sub-heading">'.esc_html__('Shopping Cart','hue').' <label for="fof999999" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">'.(is_rtl()?esc_html__('Back','hue').' &rsaquo;':'&lsaquo; '.esc_html__('Back','hue')).'</label></li>
                      <li>
                        <!-- popup -->
                        <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                        <!-- end popup -->
                      </li>
                    </ul>

                  </li>';
      endif; 
    endif;
endif; 

if(get_detheme_option('show-header-searchmenu')):
    $searchContent= '<li class="menu-item menu-item-type-search"><form class="searchform" id="menusearchform" method="get" action="' . home_url( '/' ) . '">
            <a class="search_btn"><i class="icon-search-6"></i></a>
            <div class="popup_form"><input type="text" class="form-control" id="sm" name="s" placeholder="'.esc_html__('Search','hue').'"></div>
          </form></li>';
endif;

$logoContent="";
$logoContentMobile="";

if(!empty($logo)){
  $alt_image = isset($logo_img['id']) ? get_post_meta($logo_img['id'], '_wp_attachment_image_alt', true) : "";
 
  $mobilealt_image = "";
  $mobilealt_image = isset($logo_transparent_img['id']) ? get_post_meta($logo_transparent_img['id'], '_wp_attachment_image_alt', true) : "";
  
  $logoContent='<a href="'.esc_url(home_url('/')).'" style="" class="logolink"><img id="logomenudesktop" src="'.esc_url(hue_maybe_ssl_url($logo)).'" alt="'.esc_attr($alt_image).'" class="img-responsive halfsize" '.(get_detheme_option('logo-width') ? " width=\"".(int)get_detheme_option('logo-width')."\"":"").'><img id="logomenurevealdesktop" src="'.esc_url(hue_maybe_ssl_url($logo_transparent)).'" alt="'.esc_attr($mobilealt_image).'" class="img-responsive halfsize" '.(get_detheme_option('logo-width')?" width=\"".(int)get_detheme_option('logo-width')."\"":"").'></a>';

  $logoContentMobile='<a href="'.esc_url(home_url('/')).'" style=""><img id="logomenumobile" src="'.esc_url(hue_maybe_ssl_url($logo)).'" alt="'.esc_attr($alt_image).'" class="img-responsive halfsize" '.(get_detheme_option('logo-width') ? " width=\"".(int)get_detheme_option('logo-width')."\"":"").'><img id="logomenurevealmobile" src="'.esc_url(hue_maybe_ssl_url($logo_transparent)).'" alt="'.esc_attr($mobilealt_image).'" class="img-responsive halfsize" '.(get_detheme_option('logo-width')?" width=\"".(int)get_detheme_option('logo-width')."\"":"").'></a>';
} else{
  $logoContent=get_detheme_option('dt-logo-text') ? '<a class="navbar-brand-desktop" href="'.esc_url(home_url('/')).'">'.get_detheme_option('dt-logo-text').'</a>':"";
}

  switch ($headerType) {
      case 'center':
        $classmenu = 'dt-menu-center';
          break;
      case 'right' :
          $classmenu = 'dt-menu-left';
          break;
      case 'leftbar' :
          $classmenu = 'dt-menu-leftbar';
          break;
      case 'pagebar' :
          $classmenu = 'dt-menu-pagebar';
          break;
      case 'middle' :
          $classmenu = 'dt-menu-middle';
          break;
      case "sidemenuoverlay":
          $classmenu = 'dt-menu-sidemenuoverlay';
          break;
      case "pushmenuoverlay":
          $classmenu = 'dt-menu-pushmenuoverlay';
          break;
      case "stackmenuoverlay":
          $classmenu = 'dt-menu-stackmenuoverlay';
          break;
      case "centermenuoverlay":
          $classmenu = 'dt-menu-centermenuoverlay';
          break;
      default:
          $classmenu = 'dt-menu-right';
  }

  $menuParams = array(
        'theme_location' => 'primary',
        'echo' => false,
        'container_class'=>$classmenu,
        'container_id'=>'dt-menu',
        'menu_class'=>'',
        'container'=>'div',
        'before' => '',
        'after' => '',
        'items_wrap' => '<label for="main-nav-check" class="toggle" onclick="" title="'.esc_attr__('Close','hue').'"><i class="icon-cancel-1"></i></label>'.$logoContent.'<ul id="%1$s" class="%2$s">%3$s'.$searchContent.$shoppingCart.'</ul><label class="toggle close-all" onclick="uncheckboxes(&#39;nav&#39;)"><i class="icon-cancel-1"></i></label>',
        'fallback_cb'=>false,
        'walker'  => new hue_mainmenu_walker()
  );

  $menu = wp_nav_menu($menuParams);

  if(!$menu = wp_nav_menu($menuParams)){

    $menuParamsPage = array(
      'echo' => false,
      'container_class'=>'dt-menu-right',
      'container_id'=>'dt-menu',
      'menu_class'=>'dt-menu-right',
      'menu_id'   => 'dt-menu',
      'items_wrap' => '<label for="main-nav-check" class="toggle" onclick="" title="'.esc_attr__('Close','hue').'"><i class="icon-cancel-1"></i></label>'.$logoContent.'<label class="toggle close-all" onclick="uncheckboxes(&#39;nav&#39;)"><i class="icon-cancel-1"></i></label>',
      'fallback_cb'=>'hue_page_menu',
    );

    $menu = wp_nav_menu($menuParamsPage);
  }  


  if($menu && !is_wp_error($menu)){
?>


          <div class="container <?php echo get_detheme_option('dt-sticky-menu') ? 'stickyonscrollup': ''; ?> menu_background_color">
            <?php print ($menu)?$menu:"";?>

            <div id="mobile-header" class="hidden-sm-max col-sm-12">
              <label for="main-nav-check" class="toggle" onclick="" title="Menu"><i class="icon-menu"></i></label>
              <?php echo wp_kses_post($logoContentMobile); ?>
            </div><!-- closing "#header" -->
          </div>
<?php 
  } //if($menu && !is_wp_error($menu))
?>