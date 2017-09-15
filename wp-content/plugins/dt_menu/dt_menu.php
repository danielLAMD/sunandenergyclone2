<?php
defined( 'ABSPATH' ) OR exit;
/*
Plugin Name:  Detheme Menu Plugin
Plugin URI:   http://detheme.com
Description:  Adds Detheme Menu functionality to your website
Version:      1.0.5
Author:       Detheme
Author URI:
Author Email:
License:
License URI:

Copyright 2015 Detheme
*/
require_once(plugin_dir_path( __FILE__ ).'mobile_walker.php');
require_once(plugin_dir_path( __FILE__ ).'sidemenu/walker.php');
require_once(plugin_dir_path( __FILE__ ).'pushmenu/walker.php');
require_once(plugin_dir_path( __FILE__ ).'stackmenu/walker.php');
require_once(plugin_dir_path( __FILE__ ).'centermenu/walker.php');

// Load at the default priority of 10
add_action( 'plugins_loaded', array( 'dt_menu', 'init' ) );

class dt_menu {
    /**
     * Instance of the class
     * @static
     * @access protected
     * @var object
     */

    protected static $instance;
    private static $mobileMenu = '';

    public static function init() {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }


    /**
     * Constructor.
     * @return \dt_menu
     */
    public function __construct() {
        dt_menu::register_widget_area();

        add_action('wp_enqueue_scripts',array( $this, 'dt_menu_enqueue_style' ),99995 );

        add_action('wp_enqueue_scripts',array( $this, 'dt_sidemenu_enqueue_style' ),99996 );
        add_action('wp_enqueue_scripts',array( $this, 'dt_centermenu_enqueue_style' ),99997 );
        add_action('wp_enqueue_scripts',array( $this, 'dt_stackmenu_enqueue_style' ),99998 );
        add_action('wp_enqueue_scripts',array( $this, 'dt_pushmenu_enqueue_style' ),99999 );
    } //__construct()

    public static function dt_menu_enqueue_style() {
        wp_enqueue_style( 'dt_menu_style', plugins_url('/css/style.css', __FILE__));
        if(is_rtl()){
            wp_enqueue_style( 'dt_menu_style', plugins_url('/css/style-rtl.css', __FILE__));
        }
        wp_enqueue_style( 'dt_menu_flaticon', plugins_url('/css/flaticon.css', __FILE__));
        wp_enqueue_script( 'dt_menu_js' , plugins_url('/js/script.js', __FILE__), array('jquery'), '', true );
    }


    public static function get_redux_layout_type_options(){
        return array(
            'sidemenuoverlay' => array('title' => __('Side Menu Overlay', 'redux-framework'), 'img' => plugins_url('/sidemenu/screenshot.png', __FILE__)),
            'pushmenuoverlay' => array('title' => __('Push Menu Overlay', 'redux-framework'), 'img' => plugins_url('/pushmenu/screenshot.png', __FILE__)),
            'stackmenuoverlay' => array('title' => __('Stack Menu Overlay', 'redux-framework'), 'img' => plugins_url('/stackmenu/screenshot.png', __FILE__)),
            'centermenuoverlay' => array('title' => __('Center Menu Overlay', 'redux-framework'), 'img' => plugins_url('/centermenu/screenshot.png', __FILE__))
        );
    } //function get_redux_layout_type_options


    public static function get_redux_overlay_options(){
        return array(
            array(
                'id'=>'devider-10',
                'type' => 'divider', 
                'title' => '<h2 class="redux-title">'.__('Overlay', 'redux-framework').'</h2>',
                ),  
            array(
                'id'=>'overlay-dt-logo-image',
                'type' => 'media', 
                'title' => __('Logo', 'redux-framework'),
                'compiler' => true,
                'subtitle' => __('Select the logo that will be displayed at homepage', 'redux-framework'),
                'default'=>array('url'=>''),
                ),
            array(
                'id'=>'overlay-background-color',
                'type'=>'color_rgba',
                'title' => __('Background Color', 'redux-framework'),
                'subtitle'=>__('Select Overlay Background Color','redux-framework'),
                'default'=>array('color'=>'#ffffff','alpha'=>1),
                'mode' => 'background'
                ),
            array(
                'id'=>'overlay-header-font-color',
                'type' => 'color_nocheck',
                'output' => '',
                'title' => __('Navigation Bar Font Color', 'redux-framework'), 
                'subtitle' => __('Select the font color for the navigation bar', 'redux-framework'),
                'default' => '#222222',
                'validate' => 'color',
                )  
        );
    } //function get_redux_overlay_options

    public static function get_redux_cssinline($menuAttributes = array()){
        $defaultMenuAttributes = array(
            'menu_type' => 'sidemenuoverlay',
            'logo_url' => '',
            'logo_alt' => '',
            'logo_sticky_url' => '',
            'logo_sticky_alt' => '',
            'logo_width' => '',
            'logo_top_margin' => '',
            'logo_left_margin' => '',
            'logo_top_margin_sticky' => '',
            'logo_overlay_url' => '',
            'logo_overlay_alt' => '',
            'home_url' => home_url(),
            'nav_bar_height' => '',
            'nav_background_color' => '',
            'nav_font_color' => '',
            'nav_background_color_sticky' => '',
            'nav_font_color_sticky' => '',
            'home_logo_url' => '',
            'home_logo_alt' => '',
            'home_logo_sticky_url' => '',
            'home_logo_sticky_alt' => '',
            'home_nav_background_color' => '',
            'home_nav_font_color' => '',
            'home_nav_background_color_sticky' => '',
            'home_nav_font_color_sticky' => '',
            'overlay_nav_background_color' => '',
            'overlay_nav_font_color' => '',
            'menu_hover_color' => '',
            'show_searchmenu' => 1,
            'show_shoppingcart' => 1
        );

        $menuAttributes = wp_parse_args($menuAttributes, $defaultMenuAttributes);

        $cssline = "";
        switch ($menuAttributes['menu_type']) {
            case 'sidemenuoverlay':
                // BACKGROUND COLOR
                $cssline .= ".sidemenuoverlay #ef-header {background-color: ".$menuAttributes['nav_background_color']."; }";
                $cssline .= ".sidemenuoverlay #ef-header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['nav_background_color_sticky']."; }";

                $cssline .= ".home .sidemenuoverlay #ef-header {background-color: ".$menuAttributes['home_nav_background_color']."; }";
                $cssline .= ".home .sidemenuoverlay #ef-header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['home_nav_background_color_sticky']."; }";

                $cssline .= "#ef-site-nav-inner {background-color: ".$menuAttributes['overlay_nav_background_color']."!important; }";

                // FONT COLOR
                $cssline .= ".sidemenuoverlay #ef-header #ef-toggle-menu,
                    .sidemenuoverlay #ef-header .searchform .search_btn i,
                    .sidemenuoverlay #ef-header ul.shopmenu > li.bag a i,
                    .sidemenuoverlay #ef-header ul.shopmenu > li.bag a .item_count { color: ". $menuAttributes['nav_font_color'] . "!important; }";

                $cssline .= ".sidemenuoverlay #ef-header.is-visible #ef-toggle-menu,
                    .sidemenuoverlay #ef-header.is-visible .searchform .search_btn i,
                    .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a i,
                    .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a .item_count { color: ". $menuAttributes['nav_font_color_sticky'] . "!important; }";

                $cssline .= ".home .sidemenuoverlay #ef-header #ef-toggle-menu,
                    .home .sidemenuoverlay #ef-header .searchform .search_btn i,
                    .home .sidemenuoverlay #ef-header ul.shopmenu > li.bag a i,
                    .home .sidemenuoverlay #ef-header ul.shopmenu > li.bag a .item_count { color: ". $menuAttributes['home_nav_font_color'] . "!important; }";

                $cssline .= ".home .sidemenuoverlay #ef-header.is-visible #ef-toggle-menu,
                    .home .sidemenuoverlay #ef-header.is-visible .searchform .search_btn i,
                    .home .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a i,
                    .home .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a .item_count { color: ". $menuAttributes['home_nav_font_color_sticky'] . "!important; }";

                // FONT COLOR OVERLAY
                $cssline .= ".sidemenuoverlay #ef-site-nav, .sidemenuoverlay #ef-site-nav a { color: ". $menuAttributes['overlay_nav_font_color'] . "; }";
                $cssline .= ".sidemenuoverlay #ef-site-nav h4 { color: ". $menuAttributes['overlay_nav_font_color'] . "; }";
                $cssline .= ".ef-menu-active .sidemenuoverlay #ef-controls-bar a { color: ". $menuAttributes['overlay_nav_font_color'] . "!important;}";
                
                $cssline .= ".ef-menu-active .sidemenuoverlay #ef-header .searchform .search_btn i,
                    .ef-menu-active .sidemenuoverlay #ef-header.is-visible .searchform .search_btn i,
                    .ef-menu-active.home .sidemenuoverlay #ef-header .searchform .search_btn i,
                    .ef-menu-active.home .sidemenuoverlay #ef-header.is-visible .searchform .search_btn i,
                    .ef-menu-active .sidemenuoverlay #ef-header ul.shopmenu > li.bag a i,
                    .ef-menu-active .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a i,
                    .ef-menu-active.home .sidemenuoverlay #ef-header ul.shopmenu > li.bag a i,
                    .ef-menu-active.home .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a i,
                    .ef-menu-active .sidemenuoverlay #ef-header ul.shopmenu > li.bag a .item_count, 
                    .ef-menu-active .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a .item_count,
                    .ef-menu-active.home .sidemenuoverlay #ef-header ul.shopmenu > li.bag a .item_count, 
                    .ef-menu-active.home .sidemenuoverlay #ef-header.is-visible ul.shopmenu > li.bag a .item_count,
                    .ef-menu-active .sidemenuoverlay #ef-header #ef-toggle-menu,
                    .ef-menu-active .sidemenuoverlay #ef-header.is-visible #ef-toggle-menu {color: ". $menuAttributes['overlay_nav_font_color'] . "!important;}";

                //NAV BAR HEIGHT
                $cssline .= "#head-page.sidemenuoverlay { height: ". $menuAttributes['nav_bar_height'] ."em!important; }";
                $cssline .= "#ef-header { height: ". $menuAttributes['nav_bar_height'] ."em!important; }";
                /*logo_top_margin*/
                break;
            case 'pushmenuoverlay':
                // BACKGROUND COLOR
                $cssline .= ".pushmenuoverlay header {background-color: ".$menuAttributes['nav_background_color']."; }";
                $cssline .= ".pushmenuoverlay header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['nav_background_color_sticky']."; }";
                $cssline .= ".home .pushmenuoverlay header {background-color: ".$menuAttributes['home_nav_background_color']."; }";
                $cssline .= ".home .pushmenuoverlay header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['home_nav_background_color_sticky']."; }";

                $cssline .= ".pushmenuoverlay nav {background-color: ".$menuAttributes['overlay_nav_background_color']."!important; }";
                $cssline .= ".pushmenuoverlay .dropmenu {background-color: ".$menuAttributes['overlay_nav_background_color']."!important; }";
                
                // FONT COLOR
                $cssline .= ".pushmenuoverlay .nav-menu-icon a i, 
                    .pushmenuoverlay .nav-menu-icon a i:before, 
                    .pushmenuoverlay .nav-menu-icon a i:after  {background-color: ".$menuAttributes['nav_font_color']."!important; }";
                $cssline .= ".pushmenuoverlay .is-visible .nav-menu-icon a i, 
                    .pushmenuoverlay .is-visible .nav-menu-icon a i:before, 
                    .pushmenuoverlay .is-visible .nav-menu-icon a i:after  {background-color: ".$menuAttributes['nav_font_color_sticky']."!important; }";

                $cssline .= ".pushmenuoverlay .searchform .search_btn i {color: ".$menuAttributes['nav_font_color']."!important; }";
                $cssline .= ".pushmenuoverlay .is-visible .searchform .search_btn i {color: ".$menuAttributes['nav_font_color_sticky']."!important; }";

                $cssline .= ".pushmenuoverlay ul.shopmenu > li.bag a i {color: ".$menuAttributes['nav_font_color']."!important; }";
                $cssline .= ".pushmenuoverlay .is-visible ul.shopmenu > li.bag a i {color: ".$menuAttributes['nav_font_color_sticky']."!important; }";

                $cssline .= ".pushmenuoverlay ul.shopmenu > li.bag a .item_count {color: ".$menuAttributes['nav_font_color']."!important; }";
                $cssline .= ".pushmenuoverlay .is-visible ul.shopmenu > li.bag a .item_count {color: ".$menuAttributes['nav_font_color_sticky']."!important; }";

                $cssline .= ".home .pushmenuoverlay .nav-menu-icon a i, 
                    .home .pushmenuoverlay .nav-menu-icon a i:before, 
                    .home .pushmenuoverlay .nav-menu-icon a i:after {background-color: ".$menuAttributes['home_nav_font_color']."!important}";
                $cssline .= ".home .pushmenuoverlay .is-visible .nav-menu-icon a i, 
                    .home .pushmenuoverlay .is-visible .nav-menu-icon a i:before, 
                    .home .pushmenuoverlay .is-visible .nav-menu-icon a i:after  {background-color: ".$menuAttributes['home_nav_font_color_sticky']."!important; }";

                $cssline .= ".home .pushmenuoverlay .searchform .search_btn i {color: ".$menuAttributes['home_nav_font_color']."!important}";
                $cssline .= ".home .pushmenuoverlay .is-visible .searchform .search_btn i {color: ".$menuAttributes['home_nav_font_color_sticky']."!important; }";

                $cssline .= ".home .pushmenuoverlay ul.shopmenu > li.bag a i {color: ".$menuAttributes['home_nav_font_color']."!important}";
                $cssline .= ".home .pushmenuoverlay .is-visible ul.shopmenu > li.bag a i {color: ".$menuAttributes['home_nav_font_color_sticky']."!important; }";

                $cssline .= ".home .pushmenuoverlay ul.shopmenu > li.bag a .item_count {color: ".$menuAttributes['home_nav_font_color']."!important}";
                $cssline .= ".home .pushmenuoverlay .is-visible ul.shopmenu > li.bag a .item_count {color: ".$menuAttributes['home_nav_font_color_sticky']."!important; }";

                // FONT COLOR OVERLAY
                $cssline .= ".pushmenuoverlay nav > ul > li > a > span,
                    .pushmenuoverlay .dropmenu a {color: ".$menuAttributes['overlay_nav_font_color']."!important; }";

                $cssline .= ".pushmenuoverlay .searchform .search_btn.active i,
                    .pushmenuoverlay .is-visible .searchform .search_btn.active i,
                    .home .pushmenuoverlay .searchform .search_btn.active i,
                    .home .pushmenuoverlay .is-visible .searchform .search_btn.active i,

                    .pushmenuoverlay ul.shopmenu > li.bag a.active i,
                    .pushmenuoverlay .is-visible ul.shopmenu > li.bag a.active i,
                    .home .pushmenuoverlay ul.shopmenu > li.bag a.active i,
                    .home .pushmenuoverlay .is-visible ul.shopmenu > li.bag a.active i,

                    .pushmenuoverlay ul.shopmenu > li.bag a.active .item_count, 
                    .pushmenuoverlay .is-visible ul.shopmenu > li.bag a.active .item_count,
                    .home .pushmenuoverlay ul.shopmenu > li.bag a.active .item_count, 
                    .home .pushmenuoverlay .is-visible ul.shopmenu > li.bag a.active .item_count { color: ".$menuAttributes['overlay_nav_font_color']."!important; }";
                
                $cssline .= ".pushmenuoverlay .nav-menu-icon a.active i, 
                    .pushmenuoverlay .nav-menu-icon a.active i:before, 
                    .pushmenuoverlay .nav-menu-icon a.active i:after,
                    .pushmenuoverlay.reveal .nav-menu-icon a.active i, 
                    .pushmenuoverlay.reveal .nav-menu-icon a.active i:before, 
                    .pushmenuoverlay.reveal .nav-menu-icon a.active i:after,
                    .pushmenuoverlay.reveal.alt .nav-menu-icon a.active i, 
                    .pushmenuoverlay.reveal.alt .nav-menu-icon a.active i:before, 
                    .pushmenuoverlay.reveal.alt .nav-menu-icon a.active i:after,
                    .home .pushmenuoverlay .nav-menu-icon a.active i, 
                    .home .pushmenuoverlay .nav-menu-icon a.active i:before, 
                    .home .pushmenuoverlay .nav-menu-icon a.active i:after,
                    .home .pushmenuoverlay.reveal .nav-menu-icon a.active i, 
                    .home .pushmenuoverlay.reveal .nav-menu-icon a.active i:before, 
                    .home .pushmenuoverlay.reveal .nav-menu-icon a.active i:after,
                    .home .pushmenuoverlay.reveal.alt .nav-menu-icon a.active i, 
                    .home .pushmenuoverlay.reveal.alt .nav-menu-icon a.active i:before, 
                    .home .pushmenuoverlay.reveal.alt .nav-menu-icon a.active i:after  {background-color: ".$menuAttributes['overlay_nav_font_color']."!important}";
                
                //POSITION
                if (is_rtl()) {
                    $cssline .= ".pushmenuoverlay .logo { right: ".$menuAttributes['logo_left_margin']."px!important; }";
                    $cssline .= ".pushmenuoverlay .mobile-icon { left: ".$menuAttributes['logo_left_margin']."px!important; }";
                } else {
                    $cssline .= ".pushmenuoverlay .logo { left: ".$menuAttributes['logo_left_margin']."px!important; }";
                    $cssline .= ".pushmenuoverlay .mobile-icon { right: ".$menuAttributes['logo_left_margin']."px!important; }";
                }

                $right_nav = $menuAttributes['logo_left_margin'];
                $right_shop = $menuAttributes['logo_left_margin'] + 25;

                if ($menuAttributes['show_searchmenu']) {
                    $right_nav = $right_nav + 40;
                    $right_shop = $right_shop + 40;
                } 
                if ($menuAttributes['show_shoppingcart']) $right_nav = $right_nav + 40; 

                if (is_rtl()) {
                    $cssline .= ".pushmenuoverlay .navigation { left: ".$right_nav."px!important; }";
                    $cssline .= ".pushmenuoverlay ul.shopmenu { left: ".$right_shop."px!important; }";
                } else {
                    $cssline .= ".pushmenuoverlay .navigation { right: ".$right_nav."px!important; }";
                    $cssline .= ".pushmenuoverlay ul.shopmenu { right: ".$right_shop."px!important; }";
                }

                $cssline .= ".pushmenuoverlay .navigation { 
                                -webkit-transform: translateY(".$menuAttributes['logo_top_margin']."px)!important;
                                -moz-transform: translateY(".$menuAttributes['logo_top_margin']."px)!important;
                                -ms-transform: translateY(".$menuAttributes['logo_top_margin']."px)!important;
                                -o-transform: translateY(".$menuAttributes['logo_top_margin']."px)!important;
                                transform: translateY(".$menuAttributes['logo_top_margin']."px)!important;
                            }";
                $cssline .= ".pushmenuoverlay .logo { top: ".$menuAttributes['logo_top_margin']."px!important; }";
                $cssline .= ".pushmenuoverlay .mobile-icon { top: ".$menuAttributes['logo_top_margin']."px!important; }";

                //NAV BAR HEIGHT
                $cssline .= ".pushmenuoverlay header { height: ". $menuAttributes['nav_bar_height'] ."em!important; }";
                break;
            case 'stackmenuoverlay':
                $cssline .= ".stackmenuoverlay .MFO-header {background-color: ".$menuAttributes['nav_background_color']."; }";

                $cssline .= ".stackmenuoverlay .MFO-header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['nav_background_color_sticky']."; }";

                $cssline .= ".home .stackmenuoverlay .MFO-header {background-color: ".$menuAttributes['home_nav_background_color']."; }";
                $cssline .= ".home .stackmenuoverlay .MFO-header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['home_nav_background_color_sticky']."; }";

                $cssline .= "@media (min-width: 991px) { .MFO-header.MFO-header-open {background-color: ".$menuAttributes['overlay_nav_background_color']."!important; }}";
                $cssline .= ".MFO-header .MFO-menu-list ul.sub-menu {background-color: ".$menuAttributes['overlay_nav_background_color']."!important; }";

                // FONT COLOR
                $cssline .= ".stackmenuoverlay .MFO-button .MFO-text,
                    .stackmenuoverlay .searchform .search_btn i,
                    .stackmenuoverlay ul.shopmenu > li.bag a i,
                    .stackmenuoverlay ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['nav_font_color']."!important; }";

                $cssline .= ".stackmenuoverlay .is-visible .MFO-button .MFO-text,
                    .stackmenuoverlay .is-visible .searchform .search_btn i,
                    .stackmenuoverlay .is-visible ul.shopmenu > li.bag a i,
                    .stackmenuoverlay .is-visible ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['nav_font_color_sticky']."!important; }";

                $cssline .= ".stackmenuoverlay .MFO-header .MFO-button .MFO-burger hr { background-color: ".$menuAttributes['nav_font_color']."; }";
                $cssline .= ".stackmenuoverlay .MFO-header.stickyonscrollup.is-visible .MFO-button .MFO-burger hr { background-color: ".$menuAttributes['nav_font_color_sticky']."; }";

                $cssline .= ".home .stackmenuoverlay .MFO-header .MFO-button .MFO-text,
                    .home .stackmenuoverlay .searchform .search_btn i,
                    .home .stackmenuoverlay ul.shopmenu > li.bag a i,
                    .home .stackmenuoverlay ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['home_nav_font_color']."!important; }";
                $cssline .= ".home .stackmenuoverlay .is-visible .MFO-button .MFO-text,
                    .home .stackmenuoverlay .is-visible .searchform .search_btn i,
                    .home .stackmenuoverlay .is-visible ul.shopmenu > li.bag a i,
                    .home .stackmenuoverlay .is-visible ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['home_nav_font_color_sticky']."!important; }";
                
                $cssline .= ".home .stackmenuoverlay .MFO-header .MFO-button .MFO-burger hr { background-color: ".$menuAttributes['home_nav_font_color']."; }";
                $cssline .= ".home .stackmenuoverlay .MFO-header.stickyonscrollup.is-visible .MFO-button .MFO-burger hr { background-color: ".$menuAttributes['home_nav_font_color_sticky']."; }";

                // FONT COLOR OVERLAY
                $cssline .= ".stackmenuoverlay .MFO-header-open .MFO-button .MFO-text, 
                .stackmenuoverlay .MFO-header-open.is-visible .MFO-button .MFO-text,
                .home .stackmenuoverlay .MFO-header-open .MFO-button .MFO-text, 
                .home .stackmenuoverlay .MFO-header-open.is-visible .MFO-button .MFO-text { color: ".$menuAttributes['overlay_nav_font_color']."!important; }";
                $cssline .= ".stackmenuoverlay .MFO-header.MFO-header-open .MFO-button .MFO-burger hr { background-color: ".$menuAttributes['overlay_nav_font_color']."!important; }";
                $cssline .= ".stackmenuoverlay .MFO-header .MFO-menu-list li a { color: ".$menuAttributes['overlay_nav_font_color']."; }";
                $cssline .= ".stackmenuoverlay .MFO-header-open .searchform .search_btn i,
                    .stackmenuoverlay .MFO-header-open.is-visible .searchform .search_btn i,
                    .home .stackmenuoverlay .MFO-header-open .searchform .search_btn i,
                    .home .stackmenuoverlay .MFO-header-open.is-visible .searchform .search_btn i,

                    .stackmenuoverlay .MFO-header-open ul.shopmenu > li.bag a i,
                    .stackmenuoverlay .MFO-header-open.is-visible ul.shopmenu > li.bag a i,
                    .home .stackmenuoverlay .MFO-header-open ul.shopmenu > li.bag a i,
                    .home .stackmenuoverlay .MFO-header-open.is-visible ul.shopmenu > li.bag a i,

                    .stackmenuoverlay .MFO-header-open ul.shopmenu > li.bag a .item_count, 
                    .stackmenuoverlay .MFO-header-open.is-visible ul.shopmenu > li.bag a .item_count,
                    .home .stackmenuoverlay .MFO-header-open ul.shopmenu > li.bag a .item_count, 
                    .home .stackmenuoverlay .MFO-header-open.is-visible ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['overlay_nav_font_color']."!important; }";
                
                //POSITION
                $cssline .= ".MFO-header .MFO-button { top: ". $menuAttributes['logo_top_margin'] ."px!important; }";

                if (is_rtl()) {
                    $cssline .= ".MFO-header .MFO-button { left: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                } else {
                    $cssline .= ".MFO-header .MFO-button { right: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                }
                $cssline .= ".MFO-header .MFO-Logo { top: ". $menuAttributes['logo_top_margin'] ."px!important; }";

                if (is_rtl()) {
                    $cssline .= ".MFO-header .MFO-Logo { right: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                } else {
                    $cssline .= ".MFO-header .MFO-Logo { left: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                }

                $right_shop = $menuAttributes['logo_left_margin'] + 65;

                if ($menuAttributes['show_searchmenu']) {
                    $right_shop = $right_shop + 45;
                } 

                if (is_rtl()) {
                    $cssline .= ".stackmenuoverlay ul.shopmenu { left: ".$right_shop."px!important; }";
                } else {
                    $cssline .= ".stackmenuoverlay ul.shopmenu { right: ".$right_shop."px!important; }";
                }

                //NAV BAR HEIGHT
                $cssline .= ".MFO-header:not(.MFO-header-open) { height: ". $menuAttributes['nav_bar_height'] ."em!important; }";
                break;
            case 'centermenuoverlay':
                $cssline .= ".centermenuoverlay .cd-header {background-color: ".$menuAttributes['nav_background_color']."; }";
                $cssline .= ".centermenuoverlay .cd-header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['nav_background_color_sticky']."; }";
                
                $cssline .= ".home .centermenuoverlay .cd-header {background-color: ".$menuAttributes['home_nav_background_color']."; }";
                $cssline .= ".home .centermenuoverlay .cd-header.stickyonscrollup.is-visible {background-color: ".$menuAttributes['home_nav_background_color_sticky']."; }";
                $cssline .= ".cd-primary-nav {background-color: ".$menuAttributes['overlay_nav_background_color']."!important; }";       

                // FONT COLOR
                $cssline .= ".centermenuoverlay .cd-primary-nav-trigger .cd-menu-icon, 
                    .centermenuoverlay .cd-primary-nav-trigger .cd-menu-icon:before, 
                    .centermenuoverlay .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['nav_font_color']."; }";
                $cssline .= ".centermenuoverlay .cd-header .searchform .search_btn i,
                    .centermenuoverlay .cd-header ul.shopmenu > li.bag a i,
                    .centermenuoverlay .cd-header ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['nav_font_color']."!important; }";

                $cssline .= ".centermenuoverlay .stickyonscrollup.is-visible .cd-primary-nav-trigger .cd-menu-icon, 
                    .centermenuoverlay .stickyonscrollup.is-visible .cd-primary-nav-trigger .cd-menu-icon:before, 
                    .centermenuoverlay .stickyonscrollup.is-visible .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['nav_font_color_sticky']."; }";
                $cssline .= ".centermenuoverlay .cd-header.is-visible .searchform .search_btn i,
                    .centermenuoverlay .cd-header.is-visible ul.shopmenu > li.bag a i,
                    .centermenuoverlay .cd-header.is-visible ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['nav_font_color_sticky']."!important; }";

                $cssline .= ".home .centermenuoverlay .cd-primary-nav-trigger .cd-menu-icon, 
                    .home .centermenuoverlay .cd-primary-nav-trigger .cd-menu-icon:before, 
                    .home .centermenuoverlay .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['home_nav_font_color']."; }";
                $cssline .= ".home .centermenuoverlay .cd-header .searchform .search_btn i,
                    .home .centermenuoverlay .cd-header ul.shopmenu > li.bag a i, 
                    .home .centermenuoverlay .cd-header ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['home_nav_font_color']."!important; }";

                $cssline .= ".home .centermenuoverlay .stickyonscrollup.is-visible .cd-primary-nav-trigger .cd-menu-icon, .home .centermenuoverlay .stickyonscrollup.is-visible .cd-primary-nav-trigger .cd-menu-icon:before, .home .centermenuoverlay .stickyonscrollup.is-visible .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['home_nav_font_color_sticky']."; }";
                $cssline .= ".home .centermenuoverlay .cd-header.is-visible .searchform .search_btn i,
                    .home .centermenuoverlay .cd-header.is-visible ul.shopmenu > li.bag a i,
                    .home .centermenuoverlay .cd-header.is-visible ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['home_nav_font_color_sticky']."!important; }";


                // FONT COLOR OVERLAY
                $cssline .= ".centermenuoverlay .menu-is-open .cd-primary-nav-trigger .cd-menu-icon, 
                    .centermenuoverlay .menu-is-open .cd-primary-nav-trigger .cd-menu-icon:before, 
                    .centermenuoverlay .menu-is-open .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['overlay_nav_font_color']."; }";
                $cssline .= ".centermenuoverlay.reveal .menu-is-open .cd-primary-nav-trigger .cd-menu-icon, 
                    .centermenuoverlay.reveal .menu-is-open .cd-primary-nav-trigger .cd-menu-icon:before, 
                    .centermenuoverlay.reveal .menu-is-open .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['overlay_nav_font_color']."; }";
                $cssline .= ".centermenuoverlay.reveal.alt .menu-is-open .cd-primary-nav-trigger .cd-menu-icon, 
                    .centermenuoverlay.reveal.alt .menu-is-open .cd-primary-nav-trigger .cd-menu-icon:before, 
                    .centermenuoverlay.reveal.alt .menu-is-open .cd-primary-nav-trigger .cd-menu-icon:after {background-color: ".$menuAttributes['overlay_nav_font_color']."; }";
                $cssline .= ".centermenuoverlay .cd-primary-nav a, 
                    .centermenuoverlay a.curent-nav-color, 
                    .centermenuoverlay li.active a, 
                    .centermenuoverlay li.current-menu-ancestor.current-menu-parent > a,
                    .no-touch .cd-primary-nav a:hover { 
                        color: ".$menuAttributes['overlay_nav_font_color']."!important; }";
                $cssline .= ".cd-primary-nav .cd-scndr-nav a:before, 
                    .cd-primary-nav .cd-scndr-nav a:after {
                        background-color: ".$menuAttributes['overlay_nav_font_color']."!important;
                    }";

                $cssline .= ".centermenuoverlay .cd-header.menu-is-open .searchform .search_btn i,
                    .centermenuoverlay .cd-header.menu-is-open.is-visible .searchform .search_btn i,
                    .home .centermenuoverlay .cd-header.menu-is-open .searchform .search_btn i,
                    .home .centermenuoverlay .cd-header.menu-is-open.is-visible .searchform .search_btn i,

                    .centermenuoverlay .cd-header.menu-is-open ul.shopmenu > li.bag a i,
                    .centermenuoverlay .cd-header.menu-is-open.is-visible ul.shopmenu > li.bag a i,
                    .home .centermenuoverlay .cd-header.menu-is-open ul.shopmenu > li.bag a i,
                    .home .centermenuoverlay .cd-header.menu-is-open.is-visible ul.shopmenu > li.bag a i,

                    .centermenuoverlay .cd-header.menu-is-open ul.shopmenu > li.bag a .item_count, 
                    .centermenuoverlay .cd-header.menu-is-open.is-visible ul.shopmenu > li.bag a .item_count,
                    .home .centermenuoverlay .cd-header.menu-is-open ul.shopmenu > li.bag a .item_count, 
                    .home .centermenuoverlay .cd-header.menu-is-open.is-visible ul.shopmenu > li.bag a .item_count { color: ".$menuAttributes['overlay_nav_font_color']."!important; }";

                //POSITION
                $cssline .= ".logo-wrap { margin-top: ". $menuAttributes['logo_top_margin'] ."px!important; }";

                if (is_rtl()) {
                    $cssline .= ".logo-wrap { margin-right: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                } else {
                    $cssline .= ".logo-wrap { margin-left: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                }

                $cssline .= ".cd-primary-nav-trigger { margin-top: ". $menuAttributes['logo_top_margin'] ."px!important; }";

                if (is_rtl()) {
                    $cssline .= ".cd-primary-nav-trigger { margin-left: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                } else {
                    $cssline .= ".cd-primary-nav-trigger { margin-right: ". $menuAttributes['logo_left_margin'] ."px!important; }";
                }

                if (is_rtl()) {
                    $x_search = 115 + $menuAttributes['logo_left_margin'];
                } else {
                    $x_search = -30 - $menuAttributes['logo_left_margin'];
                }
                $y_search = -2 + $menuAttributes['logo_top_margin'];


                $cssline .= ".centermenuoverlay .cd-header .searchform { 
                                -webkit-transform: translate(".$x_search."px,".$y_search."px)!important;
                                -moz-transform: translate(".$x_search."px,".$y_search."px)!important;
                                -ms-transform: translate(".$x_search."px,".$y_search."px)!important;
                                -o-transform: translate(".$x_search."px,".$y_search."px)!important;
                                transform: translate(".$x_search."px,".$y_search."px)!important;
                            }";

                $x_shop = 100 + $menuAttributes['logo_left_margin'];
                $y_shop = 5 + $menuAttributes['logo_top_margin'];

                if ($menuAttributes['show_searchmenu']) {
                    $x_shop = $x_shop + 35;
                } 

                if (is_rtl()) {
                    $cssline .= ".centermenuoverlay .cd-header ul.shopmenu {left: ".$x_shop."px!important; top: ".$y_shop."px!important;}";
                } else {
                    $cssline .= ".centermenuoverlay .cd-header ul.shopmenu {right: ".$x_shop."px!important; top: ".$y_shop."px!important;}";
                }

                //NAV BAR HEIGHT
                $cssline .= ".cd-header  { height: ". $menuAttributes['nav_bar_height'] ."em!important; }";
                $cssline .= ".cd-header.is-fixed { top: -". $menuAttributes['nav_bar_height'] ."em!important; }";
                break;

                //$cssline .= ".cd-primary-nav a:hover { background-color: ".$menuAttributes['menu_hover_color']."!important; }";
                break;
            
            default:
                # code...
                break;
        }
        return $cssline;
        
    } //function get_redux_cssinline

    public static function register_widget_area(){
        register_sidebar(
            array('name'=> __('Menu Overlay Widget Area', 'dt_menu'),
                'id'=>'detheme-menu-overlay',
                'description'=> __('Menu Overlay Widget Area', 'dt_menu'),
                'before_widget' => '<section id="%s" class="ef-widget col-lg-3 col-md-6 %s"><h2></h2><div class="widget">',
                'after_widget' => '</div></section>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            ));
    } //function get_redux_layout_type_options

    private static function hex2rgba( $hex, $alpha = '' ) {
        $hex = str_replace( "#", "", $hex );
        if ( strlen( $hex ) == 3 ) {
            $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
            $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
            $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex, 0, 2 ) );
            $g = hexdec( substr( $hex, 2, 2 ) );
            $b = hexdec( substr( $hex, 4, 2 ) );
        }
        $rgb = $r . ',' . $g . ',' . $b;

        if ( '' == $alpha ) {
            //return $rgb;
            return 'rgba(' . $rgb . ',' . 0 . ')';
        } else {
            $alpha = floatval( $alpha );

            return 'rgba(' . $rgb . ',' . $alpha . ')';
        }
    }

    public static function get_menu($menu_type,$menuAttributes = array()){
        $defaultMenuAttributes = array(
            'logo_url' => '',
            'logo_alt' => '',
            'logo_width' => '',
            'logo_top_margin' => '',
            'logo_left_margin' => '',
            'logo_top_margin_sticky' => '',
            'logo_overlay_url' => '',
            'logo_overlay_alt' => '',
            'home_url' => home_url(),
            'nav_bar_height' => '',
            'nav_background_color' => '',
            'nav_font_color' => '',
            'nav_background_color_sticky' => '',
            'nav_font_color_sticky' => '',
            'home_nav_background_color' => '',
            'home_nav_font_color' => '',
            'home_nav_background_color_sticky' => '',
            'home_nav_font_color_sticky' => '',
            'social_menu' => '',
            'is_sticky' => 0,
            'show_searchmenu' => 1,
            'show_shoppingcart' => 1
        );

        $menuAttributes = wp_parse_args($menuAttributes, $defaultMenuAttributes);
/*
        wp_enqueue_style( 'dt_menu_style', plugins_url('/css/style.css', __FILE__));
        if(is_rtl()){
            wp_enqueue_style( 'dt_menu_style', plugins_url('/css/style-rtl.css', __FILE__));
        }
        wp_enqueue_style( 'dt_menu_flaticon', plugins_url('/css/flaticon.css', __FILE__));
        wp_enqueue_script( 'dt_menu_js' , plugins_url('/js/script.js', __FILE__), array('jquery'), '', true );
*/
        $logoContent = '';
        $searchContent = '';
        $shoppingCart = '';

        if ($menuAttributes['show_shoppingcart'] && is_plugin_active('woocommerce/woocommerce.php')) {
            $shoppingCart= '<li id="menu-item-999999" class="hidden-mobile bag menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-999999">
                      <a href="#">
                        <span><i class="icon-cart"></i> <span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span></span>
                      </a>
                      <label for="fof999999" class="toggle-sub" onclick="">'.(is_rtl()?'&lsaquo;':'&rsaquo;').'</label>
                      <input id="fof999999" class="sub-nav-check" type="checkbox">
                      <ul id="fof-sub-999999" class="sub-nav">
                        <li class="sub-heading">'.__('Shopping Cart','dt_menu').' <label for="fof999999" class="toggle" onclick="" title="'.esc_attr(__('Back','dt_menu')).'">'.(is_rtl()?__('Back','dt_menu').' &rsaquo;':'&lsaquo; '.__('Back','dt_menu')).'</label></li>
                        <li>
                          <!-- popup -->
                          <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                          <!-- end popup -->
                        </li>
                      </ul>

                    </li>';
        } //if ($menuAttributes['show_shoppingcart']

        if ($menuAttributes['show_searchmenu']) {
            $searchContent= '<li class="menu-item menu-item-type-search"><form class="searchform" id="mobilemenusearchform" method="get" action="' . home_url( '/' ) . '" role="search"><a class="search_btn"><i class="icon-search-6"></i></a><div class="popup_form"><input type="text" class="form-control" id="mobile_sm" name="s" placeholder="'.__('Search','dt_menu').'"></div></form></li>';

            //$searchContentMobile= '<li class="menu-item menu-item-type-search"><form class="searchform" id="mobilemenusearchform" method="get" action="' . home_url( '/' ) . '" role="search"><a class="search_btn"><i class="icon-search-6"></i></a><div class="popup_form"><input type="text" class="form-control" id="sm" name="s" placeholder="'.__('Search','dt_menu').'"></div></form></li>';
        } //if ($menuAttributes['show_searchmenu'])

        $mobileParams = array(
            'theme_location' => 'primary',
            'echo' => false,
            'container_class'=>'dt-menu-mobile hidden',
            'container_id'=>'dt-menu-mobile',
            'menu_class'=>'',
            'container'=>'div',
            'before' => '',
            'after' => '',
            'items_wrap' => '<label for="main-nav-check" class="toggle" onclick="" title="'.__('Close','dt_menu').'"><i class="icon-cancel-1"></i></label><ul id="%1$s" class="%2$s">'.$logoContent.'%3$s'.$searchContent.$shoppingCart.'</ul><label class="toggle close-all" for="main-nav-check"><i class="icon-cancel-1"></i></label>',
            'fallback_cb'=>false,
            'walker'  => new dt_menu_mobile_walker()
        );

        self::$mobileMenu = wp_nav_menu($mobileParams);

        switch ($menu_type) {
            case "sidemenuoverlay":
                dt_menu::get_sidemenuoverlay($menuAttributes);
                break;
            case "pushmenuoverlay":
                dt_menu::get_pushmenuoverlay($menuAttributes);
                break;
            case "stackmenuoverlay":
                dt_menu::get_stackmenuoverlay($menuAttributes);
              break;
            case "centermenuoverlay":
                dt_menu::get_centermenuoverlay($menuAttributes);
              break;
        }
    } //function get_menu


    public static function dt_pushmenu_enqueue_style() {
        wp_enqueue_style('pushmenu-font-awesome', plugins_url('/pushmenu/font-awesome.css', __FILE__));
        
        if (is_rtl()) {
            wp_enqueue_style( 'pushmenu', plugins_url('/pushmenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'pushmenu', plugins_url('/pushmenu/style.css', __FILE__));    
        }
        
        wp_enqueue_script( 'pushmenu' , plugins_url('/pushmenu/script.js', __FILE__), array(), '', true );
    }

    public static function get_pushmenuoverlay($menuAttributes = array()){
/*
        wp_enqueue_style('pushmenu-font-awesome', plugins_url('/pushmenu/font-awesome.css', __FILE__));
        
        if (is_rtl()) {
            wp_enqueue_style( 'pushmenu', plugins_url('/pushmenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'pushmenu', plugins_url('/pushmenu/style.css', __FILE__));    
        }
        
        wp_enqueue_script( 'pushmenu' , plugins_url('/pushmenu/script.js', __FILE__), array(), '', true );
*/
        $menuParams = array(
            'theme_location' => 'primary',
            'echo' => false,
            'menu_class'=>'navigation',
            'container'=>'',
            'before' => '',
            'after' => '',
            'fallback_cb'=>false,
            'walker'  => new detheme_pushmenuoverlay_mainmenu_walker()
        );

        $menu = wp_nav_menu($menuParams);

        $scrollmenu = '';
        if (isset($menuAttributes['is_sticky']) && $menuAttributes['is_sticky']) {
            $scrollmenu .= 'stickyonscrollup';
        }

        $searchContent = '';
        $shoppingMenu = '';
        $shoppingCart = '';

        if ($menuAttributes['show_shoppingcart'] && is_plugin_active('woocommerce/woocommerce.php')) {
            $shoppingMenu= '<ul class="shopmenu"><li class="hidden-mobile bag">
                        <span>
                            <label for="fof999998" class="toggle-sub" onclick=""><i class="icon-cart"></i> <span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span>
                            </label>
                        </span>
                    </li></ul>';

            $shoppingCart= '<input id="fof999998" class="sub-nav-check" type="checkbox" style="display: none;">
                      <ul id="fof-sub-999998" class="sub-nav">
                        <li>
                          <!-- popup -->
                          <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                          <!-- end popup -->
                        </li>
                      </ul>';

        } //if ($menuAttributes['show_shoppingcart']

        if ($menuAttributes['show_searchmenu']) {
            $searchContent= '<form class="searchform" id="menusearchform" method="get" action="' . home_url( '/' ) . '" role="search"><a class="search_btn"><i class="icon-search-6"></i></a><div class="popup_form"><input type="text" class="form-control" id="sm" name="s" placeholder="'.__('Search','dt_menu').'"></div></form>';

        } //if ($menuAttributes['show_searchmenu'])

        $logo_width = (isset($menuAttributes['logo_width'])) ? ' width="'.intval($menuAttributes['logo_width']).'" ' : '';

?>
        <?php echo $shoppingCart; ?>
        <header class="<?php echo esc_attr($scrollmenu); ?>" style="display: none;">
            <div class="logo">
                <a href="<?php echo $menuAttributes['home_url']; ?>" class="animsition-link">
                    <img class="logo_url" src="<?php echo esc_url($menuAttributes['logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_alt']); ?>" <?php echo $logo_width; ?>>
                    <img class="logo_sticky_url" src="<?php echo esc_url($menuAttributes['logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
                    <img class="home_logo_url" src="<?php echo esc_url($menuAttributes['home_logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_alt']); ?>" <?php echo $logo_width; ?>>
                    <img class="home_logo_sticky_url" src="<?php echo esc_url($menuAttributes['home_logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
                </a>
            </div>
                    
            <div class="mobile-icon">
                <?php echo $shoppingMenu; ?>
                <?php echo $searchContent; ?>
                <div class="nav-menu-icon">
                    <a href="#"><i></i></a>
                </div> 
            </div>

            <nav class="menu-menu-1-container">
                <?php print ($menu)?$menu:"";?>
            </nav>

            <?php print (self::$mobileMenu)?self::$mobileMenu:"";?>    
        </header>
<?php
    } //function get_pushmenuoverlay

    public static function dt_stackmenu_enqueue_style() {
        wp_enqueue_style('stackmenu-font-awesome', plugins_url('/stackmenu/font-awesome.css', __FILE__));
        if (is_rtl()) {
            wp_enqueue_style( 'stackmenu', plugins_url('/stackmenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'stackmenu', plugins_url('/stackmenu/style.css', __FILE__));
        }
        
        wp_enqueue_script( 'stackmenu' , plugins_url('/stackmenu/script.js', __FILE__), array('jquery'));
    }

    public static function get_stackmenuoverlay($menuAttributes = array()){
/*
        wp_enqueue_style('stackmenu-font-awesome', plugins_url('/stackmenu/font-awesome.css', __FILE__));
        if (is_rtl()) {
            wp_enqueue_style( 'stackmenu', plugins_url('/stackmenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'stackmenu', plugins_url('/stackmenu/style.css', __FILE__));
        }
        
        wp_enqueue_script( 'stackmenu' , plugins_url('/stackmenu/script.js', __FILE__), array('jquery'));
*/
        $menuParams = array(
            'theme_location' => 'primary',
            'echo' => false,
            'menu_class'=>'MFO-menu-list navigation',
            'container'=>'',
            'before' => '',
            'after' => '',
            'fallback_cb'=>false,
            'walker'  => new detheme_stackmenuoverlay_mainmenu_walker()
        );

        $menu = wp_nav_menu($menuParams);

        $scrollmenu = '';
        if (isset($menuAttributes['is_sticky']) && $menuAttributes['is_sticky']) {
            $scrollmenu .= 'stickyonscrollup';
        }

        $searchContent = '';
        $shoppingMenu = '';
        $shoppingCart = '';

        if ($menuAttributes['show_shoppingcart'] && is_plugin_active('woocommerce/woocommerce.php')) {
            $shoppingMenu= '<ul class="shopmenu"><li class="hidden-mobile bag">
                        <span>
                            <label for="fof999998" class="toggle-sub" onclick=""><i class="icon-cart"></i> <span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span>
                            </label>
                        </span>
                    </li></ul>';

            $shoppingCart= '<input id="fof999998" class="sub-nav-check" type="checkbox">
                      <ul id="fof-sub-999998" class="sub-nav">
                        <li>
                          <!-- popup -->
                          <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                          <!-- end popup -->
                        </li>
                      </ul>';

        } //if ($menuAttributes['show_shoppingcart']

        if ($menuAttributes['show_searchmenu']) {
            $searchContent= '<form class="searchform" id="menusearchform" method="get" action="' . home_url( '/' ) . '" role="search"><a class="search_btn"><i class="icon-search-6"></i></a><div class="popup_form"><input type="text" class="form-control" id="sm" name="s" placeholder="'.__('Search','dt_menu').'"></div></form>';

        } //if ($menuAttributes['show_searchmenu'])

        $logo_width = (isset($menuAttributes['logo_width'])) ? ' width="'.intval($menuAttributes['logo_width']).'" ' : '';


?>
<header id="MFO-header" class="MFO-header <?php echo esc_attr($scrollmenu); ?>">
    <!--LOGO SMALL-->
    <a href="<?php echo $menuAttributes['home_url']; ?>" class="MFO-Logo">
        <img class="logo_url" src="<?php echo esc_url($menuAttributes['logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_alt']); ?>" <?php echo $logo_width; ?>>
        <img class="logo_sticky_url" src="<?php echo esc_url($menuAttributes['logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
        <img class="home_logo_url" src="<?php echo esc_url($menuAttributes['home_logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_alt']); ?>" <?php echo $logo_width; ?>>
        <img class="home_logo_sticky_url" src="<?php echo esc_url($menuAttributes['home_logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
    </a>
    <!--END LOGO SMALL-->
    
    <!--BURGER-->
    <div class="MFO-button">
        <?php echo $shoppingMenu; ?>
        <?php echo $shoppingCart; ?>
        <?php echo $searchContent; ?>

        <p class="MFO-text"><?php echo __('Menu', 'dt_menu'); ?></p>
        <div class="MFO-burger">
            <hr><hr><hr>
        </div>
    </div>
    <!--END BURGER-->
    
    <!--LOGO BIG-->
    <a href="<?php echo $menuAttributes['home_url']; ?>" class="MFO-menu-logo">
        <img class="logo_overlay_url" src="<?php echo esc_url($menuAttributes['logo_overlay_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_overlay_alt']); ?>">
    </a>
    <!--LOGO BIG-->
    
    <!--CATEGORIES-->
        <?php print ($menu)?$menu:"";?>
    <!--END CATEGORIES-->
    
    <!--CLOSE BUTTON FOR MOBILE MENU-->
    <!--div class="MFO-close-mobile">close</div-->
    <!--END CLOSE BUTTON FOR MOBILE MENU-->

    <?php print (self::$mobileMenu)?self::$mobileMenu:"";?>
</header>
<?php
    } //function get_stackmenuoverlay

    public static function dt_centermenu_enqueue_style() {
        if (is_rtl()) {
            wp_enqueue_style( 'centermenu', plugins_url('/centermenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'centermenu', plugins_url('/centermenu/style.css', __FILE__));
        }
        
        wp_enqueue_script( 'centermenu' , plugins_url('/centermenu/script.js', __FILE__), array( 'jquery' ) );
    }


    public static function get_centermenuoverlay($menuAttributes = array()){
/*
        if (is_rtl()) {
            wp_enqueue_style( 'centermenu', plugins_url('/centermenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'centermenu', plugins_url('/centermenu/style.css', __FILE__));
        }
        
        wp_enqueue_script( 'centermenu' , plugins_url('/centermenu/script.js', __FILE__), array( 'jquery' ) );
*/
        $menuParams = array(
            'theme_location' => 'primary',
            'echo' => false,
            'menu_class'=>'cd-scndr-nav hidden',
            'container'=>'',
            'before' => '',
            'after' => '',
            'fallback_cb'=>false,
            'walker'  => new detheme_centermenuoverlay_mainmenu_walker()
        );

        $menu = wp_nav_menu($menuParams);

        $socialmenu = '';
        if (isset($menuAttributes['social_menu'])&&!empty($menuAttributes['social_menu'])) {
            $socialmenuParams = array(
                'menu' => $menuAttributes['social_menu'],
                'echo' => false,
                'menu_class'=>'list-social-nav hidden',
                'container'=>'',
                'before' => '',
                'after' => '',
                'fallback_cb'=>false,
            );

            $socialmenu = wp_nav_menu($socialmenuParams);
        }

        $scrollmenu = '';
        if (isset($menuAttributes['is_sticky']) && $menuAttributes['is_sticky']) {
            $scrollmenu .= 'stickyonscrollup';
        }

        $searchContent = '';
        $shoppingMenu = '';
        $shoppingCart = '';

        if ($menuAttributes['show_shoppingcart'] && is_plugin_active('woocommerce/woocommerce.php')) {
            $shoppingMenu= '<ul class="shopmenu"><li class="hidden-mobile bag">
                        <span>
                            <label for="fof999998" class="toggle-sub" onclick=""><i class="icon-cart"></i> <span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span>
                            </label>
                        </span>
                    </li></ul>';

            $shoppingCart= '<input id="fof999998" class="sub-nav-check" type="checkbox">
                      <ul id="fof-sub-999998" class="sub-nav">
                        <li>
                          <!-- popup -->
                          <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                          <!-- end popup -->
                        </li>
                      </ul>';

        } //if ($menuAttributes['show_shoppingcart']

        if ($menuAttributes['show_searchmenu']) {
            $searchContent= '<form class="searchform" id="menusearchform" method="get" action="' . home_url( '/' ) . '" role="search"><a class="search_btn"><i class="icon-search-6"></i></a><div class="popup_form"><input type="text" class="form-control" id="sm" name="s" placeholder="'.__('Search','dt_menu').'"></div></form>';

        } //if ($menuAttributes['show_searchmenu'])

        $logo_width = (isset($menuAttributes['logo_width'])) ? ' width="'.intval($menuAttributes['logo_width']).'" ' : '';

?>
        <header class="cd-header <?php echo esc_attr($scrollmenu); ?> hidden">
        
            <div class="container">     
                <div class="twelve columns">
                    <div class="logo-wrap">
                        <a href="<?php echo $menuAttributes['home_url']; ?>">
                            <img class="logo_url" src="<?php echo esc_url($menuAttributes['logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_alt']); ?>" <?php echo $logo_width; ?>>
                            <img class="logo_sticky_url" src="<?php echo esc_url($menuAttributes['logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
                            <img class="home_logo_url" src="<?php echo esc_url($menuAttributes['home_logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_alt']); ?>" <?php echo $logo_width; ?>>
                            <img class="home_logo_sticky_url" src="<?php echo esc_url($menuAttributes['home_logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
                            <img class="logo_overlay_url" src="<?php echo esc_url($menuAttributes['logo_overlay_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_overlay_alt']); ?>" <?php echo $logo_width; ?>>
                        </a>    
                    </div>                      
                    <?php echo $shoppingMenu; ?>
                    <?php echo $shoppingCart; ?>
                    <?php echo $searchContent; ?>
                    <a class="cd-primary-nav-trigger" href="#">
                        <span class="cd-menu-text"></span><span class="cd-menu-icon"></span>
                    </a>
                </div>  
            </div>      
                
        </header>   
        <nav>
            <div class="cd-primary-nav">
                <?php print ($menu)?$menu:"";?>
                <div class="social-nav"><?php print ($socialmenu)?$socialmenu:"";?></div>
            </div>
        </nav>
        <?php print (self::$mobileMenu)?self::$mobileMenu:"";?>
<?php
    } //function get_centermenuoverlay

    public static function dt_sidemenu_enqueue_style() {
        if (is_rtl()) {
            wp_enqueue_style( 'sidemenu', plugins_url('/sidemenu/style-rtl.css', __FILE__));
        } else {
            wp_enqueue_style( 'sidemenu', plugins_url('/sidemenu/style.css', __FILE__));
        }
        wp_enqueue_script( 'sidemenu' , plugins_url('/sidemenu/script.js', __FILE__), array(), '', true );
    }

    public static function get_sidemenuoverlay($menuAttributes = array()){
/*
        if (is_rtl()) {
            wp_enqueue_style( 'sidemenu', plugins_url('/sidemenu/style-rtl.css', __FILE__), array('dt_menu_style'));
        } else {
            wp_enqueue_style( 'sidemenu', plugins_url('/sidemenu/style.css', __FILE__), array('dt_menu_style'));
        }
        wp_enqueue_script( 'sidemenu' , plugins_url('/sidemenu/script.js', __FILE__), array(), '', true );
*/
        $menuParams = array(
            'theme_location' => 'primary',
            'echo' => false,
            'menu_class'=>'top-bar-menu left',
            'container'=>'',
            'before' => '',
            'after' => '',
            'fallback_cb'=>false,
            'walker'  => new detheme_sidemenuoverlay_mainmenu_walker()
        );

        $menu = wp_nav_menu($menuParams);

        $scrollmenu = '';
        if (isset($menuAttributes['is_sticky']) && $menuAttributes['is_sticky']) {
            $scrollmenu .= 'stickyonscrollup';
        }

        $searchContent = '';
        $shoppingMenu = '';
        $shoppingCart = '';

        if ($menuAttributes['show_shoppingcart'] && is_plugin_active('woocommerce/woocommerce.php')) {
            $shoppingMenu= '<ul class="shopmenu"><li class="hidden-mobile bag">
                        <span>
                            <label for="fof999998" class="toggle-sub" onclick=""><i class="icon-cart"></i> <span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span>
                            </label>
                        </span>
                    </li></ul>';

            $shoppingCart= '<input id="fof999998" class="sub-nav-check" type="checkbox">
                      <ul id="fof-sub-999998" class="sub-nav">
                        <li>
                          <!-- popup -->
                          <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                          <!-- end popup -->
                        </li>
                      </ul>';

        } //if ($menuAttributes['show_shoppingcart']

        if ($menuAttributes['show_searchmenu']) {
            $searchContent= '<form class="searchform" id="menusearchform" method="get" action="' . home_url( '/' ) . '" role="search"><a class="search_btn"><i class="icon-search-6"></i></a><div class="popup_form"><input type="text" class="form-control" id="sm" name="s" placeholder="'.__('Search','dt_menu').'"></div></form>';

        } //if ($menuAttributes['show_searchmenu'])

        $logo_width = (isset($menuAttributes['logo_width'])) ? ' width="'.intval($menuAttributes['logo_width']).'" ' : '';

?>
        <header id="ef-header" class="ef-positioner <?php echo esc_attr($scrollmenu); ?>">
            <div id="ef-site-name">
                <div class="navbar-brand">
                    <a id="ef-logo" href="<?php echo home_url(); ?>" title="<?php echo esc_attr($menuAttributes['logo_alt']); ?>">
                        <img class="ef-default-logo logo_url" src="<?php echo esc_url($menuAttributes['logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_alt']); ?>" <?php echo $logo_width; ?>>
                        <img class="ef-default-logo logo_sticky_url" src="<?php echo esc_url($menuAttributes['logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>
                        <img class="ef-default-logo home_logo_url" src="<?php echo esc_url($menuAttributes['home_logo_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_alt']); ?>" <?php echo $logo_width; ?>>
                        <img class="ef-default-logo home_logo_sticky_url" src="<?php echo esc_url($menuAttributes['home_logo_sticky_url']); ?>" alt="<?php echo esc_attr($menuAttributes['home_logo_sticky_alt']); ?>" <?php echo $logo_width; ?>>

                    </a>
                </div>
                <div id="ef-controls-bar">
                    <?php echo $shoppingMenu;?>
                    <?php echo $shoppingCart;?>
                    <?php echo $searchContent;?>
                    <label id="ef-toggle-menu" for="main-nav-check"><span></span></label>
                </div>
            </div>
            <div style="width: 0%; transition: width 0.8s ease 0s;" id="ef-site-nav">
                <div id="ef-site-nav-inner">
                    <div id="ef-brand">
                        <?php if (isset($menuAttributes['logo_overlay_url']) and !empty($menuAttributes['logo_overlay_url'])) { ?>
                        <a class="ef-default-logo1" href="<?php echo $menuAttributes['home_url']; ?>">
                            <img class="logo_overlay_url" src="<?php echo esc_url($menuAttributes['logo_overlay_url']); ?>" alt="<?php echo esc_attr($menuAttributes['logo_overlay_alt']); ?>"  width="<?php echo $menuAttributes['logo_width']; ?>">

                        </a>
                        <?php } //if (isset($menuAttributes['logo_overlay_url']) and !empty($menuAttributes['logo_overlay_url'])) ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 clearfix">
                            <nav class="top-bar" data-topbar="" data-options="mobile_show_parent_link: true">
                                <ul class="title-area">
                                    <li class="name"></li>
                                    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
                                </ul>
                                <section class="top-bar-section"><h2></h2>
                                    <?php print ($menu)?$menu:"";?>
                                </section>
                            </nav>
                        </div>
                        <div class="col-lg-6">
                            <aside id="ef-menu-widgets">
                                <div class="row">
                                    <?php dynamic_sidebar('detheme-menu-overlay'); ?>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <?php print (self::$mobileMenu)?self::$mobileMenu:"";?>
        </header>
<?php

    } //function get_sidemenuoverlay
    
} //class dt_menu

?>