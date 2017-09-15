<?php
defined('ABSPATH') or die();

require_once( get_template_directory().'/lib/tgm/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'hue_register_required_plugins' );

if ( ! isset( $content_width ) ) $content_width = 2000;


function hue_register_required_plugins() {

	$plugins = array(

		array(
			'name'     				=> esc_html__('WPBakery Visual Composer','hue'), 
			'slug'     				=> 'js_composer', 
			'source'   				=> get_template_directory() . '/plugins/js_composer_5.1.1.zip',
			'required' 				=> true, 
		),
		array(
			'name'     				=> esc_html__('Hue Visual Composer Add On','hue'),
			'slug'     				=> 'hue_vc_addon', 
			'source'   				=> get_template_directory() . '/plugins/hue_vc_addon.zip',
			'required' 				=> false,
		),
		array(
			'name'     				=> esc_html__('Contact Form 7','hue'),
			'slug'     				=> 'contact-form-7', 
			'required' 				=> false, 
		),
		array(
			'name'     				=> esc_html__('WooCommerce - excelling eCommerce','hue'),
			'slug'     				=> 'woocommerce', 
			'required' 				=> false, 
		),
		array(
			'name'     				=> esc_html__('Revolution Slider','hue'),
			'slug'     				=> 'revslider',
			'source'   				=> get_template_directory() . '/plugins/rev-slider-5.3.1.5.zip',
			'required' 				=> true, 
		),
		array(
			'name'     				=> esc_html__('Hue Icon Font - Add-on','hue'),
			'slug'     				=> 'hue_icons', 
			'source'   				=> get_template_directory() . '/plugins/hue_icons.zip', 
			'required' 				=> false,
		),
		array(
			'name'     				=> esc_html__('Detheme Custom Post','hue'),
			'slug'     				=> 'detheme-post',
			'source'   				=> get_template_directory() . '/plugins/detheme-post.zip',
			'required' 				=> false,
		),
		array(
			'name'     				=> esc_html__('Essential_Grid','hue'),
			'slug'     				=> 'essential-grid', 
			'source'   				=> get_template_directory() . '/plugins/essential-grid.zip',
			'required' 				=> false, 
		),
		array(
			'name'     				=> esc_html__('Detheme Menu','hue'),
			'slug'     				=> 'dt_menu',
			'source'   				=> get_template_directory() . '/plugins/dt_menu.zip',
			'required' 				=> true,
		),
		array(
			'name'     				=> esc_html('DT Recruitment','hue'), 
			'slug'     				=> 'detheme-career', 
			'source'   				=> get_template_directory() . '/plugins/detheme-career.zip', 
			'required' 				=> false, 
		),
		array(
			'name'     				=> esc_html('Hue Plugin Social Share','hue'), 
			'slug'     				=> 'hue-social-share', 
			'source'   				=> get_template_directory() . '/plugins/hue-social-share.zip', 
			'required' 				=> false, 
		),
		array(
			'name'     				=> esc_html('Hue Demo Installer','hue'), 
			'slug'     				=> 'hue-demo', 
			'source'   				=> get_template_directory() . '/plugins/hue-demo.zip', 
			'required' 				=> false, 
		),
		);



	$config = array(
		'id'       		    => 'hue-tgmpa',         			
		'domain'       		=> 'hue',         			
		'default_path' 		=> '',                         	
		'parent_slug' 		=> 'themes.php', 				
		'menu'         		=> 'install-required-plugins', 	
		'has_notices'      	=> true,                       	
		'is_automatic'    	=> false,					   	
		'message' 			=> ''							
	);

	tgmpa( $plugins, $config );

}

function hue_startup() {

	global $detheme_revealData, $detheme_Scripts,$detheme_Style, $dt_el_id, $woocommerce_loop;

	$woocommerce_loop = array();
	$dt_el_id = 0;

	$detheme_revealData=array();
	$detheme_Scripts=array();
	$detheme_Style=array();

	$locale = get_locale();

	if((is_child_theme() && !load_textdomain( 'hue', get_stylesheet_directory() . "/languages/{$locale}.mo")) || !is_child_theme()){
		load_theme_textdomain('hue',get_template_directory()."/languages");
	}

	add_theme_support('post-thumbnails');
	add_theme_support( 'title-tag' );

	add_theme_support('menus');
	add_theme_support( 'post-formats', array( 'quote', 'video', 'audio', 'gallery', 'link' , 'image' , 'aside' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );


	register_nav_menus(array(
		'primary' => esc_html__('Top Navigation', 'hue')
	));

	// sidebar widget
	register_sidebar(
		array('name'=> esc_html__('Sidebar Widget Area', 'hue'),
			'id'=>'detheme-sidebar',
			'description'=> esc_html__('Sidebar Widget Area', 'hue'),
			'before_widget' => '<div class="widget %s %s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget_title">',
			'after_title' => '</h3>'
		));

	register_sidebar(
		array('name'=> esc_html__('Bottom Widget Area', 'hue'),
			'id'=>'detheme-bottom',
			'description'=> esc_html__('Bottom Widget Area', 'hue'),
			'before_widget' => '<div class="widget %s %s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="row"><div class="col col-sm-12 centered"><h3 class="widget-title">',
			'after_title' => '</h3></div></div>'

		));

	register_sidebar(
		array('name'=> esc_html__('Sticky Widget Area', 'hue'),
			'id'=>'detheme-scrolling-sidebar',
			'description'=> esc_html__('Sticky Widget Area', 'hue'),
			'before_widget' => '<div class="widget %s %s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="row"><div class="col col-sm-12 centered"><h3>',
			'after_title' => '</h3></div></div>'

		));

	if (detheme_plugin_is_active('woocommerce/woocommerce.php')) {

		register_sidebar(
			array('name'=> esc_html__('Shop Sidebar Widget Area', 'hue'),
				'id'=>'shop-sidebar',
				'description'=> esc_html__('Sidebar will display on woocommerce page only', 'hue'),
				'before_widget' => '<div class="widget %s %s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget_title">',
				'after_title' => '</h3>'
			));

		// Display 12 products per page.
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
	}

	add_action('wp_head', 'hue_load_preloader', 10000);
  	add_action('wp_head','detheme_og_generator',2);
	add_action('admin_head','detheme_load_admin_stylesheet');
	add_action('admin_enqueue_scripts', 'hue_admin_scripts');
	add_action('wp_enqueue_scripts', 'hue_scripts', 999);
	add_action('wp_enqueue_scripts', 'detheme_css_style',999);
  	add_action('wp_enqueue_scripts','hue_define_var_script');
	add_action('wp_enqueue_scripts','hue_load_vc_custom_css_style',99999);
	add_action('wp_enqueue_scripts', 'detheme_print_inline_style' );
  	add_action('wp_enqueue_scripts','hue_load_custom_script',99997);
	add_action('wp_enqueue_scripts','hue_load_modal_content',99998);

} 

add_action('after_setup_theme','hue_startup');


if ( ! function_exists( '_wp_render_title_tag' ) ) :
/* backword compatibility */
	
	function detheme_page_title($title){

	  if(defined('WPSEO_VERSION'))
	    return $title;

	  $blogname=get_bloginfo('name','raw'); 

	  if($blogname!='')
	    return $blogname." | ".$title;
	  return $title;
	}

	add_filter('wp_title','detheme_page_title',1);

endif;


function detheme_css_style(){

	if(is_admin())
		return;

	wp_enqueue_style( 'styleable-select-style', get_template_directory_uri() . '/css/select-theme-default.css', array(), null, 'all' );
	wp_enqueue_style( 'hue-style-ie', get_template_directory_uri() . '/css/ie9.css', array(), null);
	wp_style_add_data( 'hue-style-ie', 'conditional', 'IE 9' );

	//add_filter( "get_post_metadata",'detheme_check_vc_custom_row',1,3);

	if(function_exists('vc_set_as_theme')){

		$assetPath=plugins_url( 'js_composer/assets/css','js_composer');

		$front_css_file = version_compare(WPB_VC_VERSION,"4.2.3",'>=')?$assetPath.'/js_composer.css':$assetPath.'/js_composer_front.css';

		$upload_dir = wp_upload_dir();

		if(function_exists('vc_settings')){

		  if ( vc_settings()->get( 'use_custom' ) == '1' && is_file( $upload_dir['basedir'] . '/js_composer/js_composer_front_custom.css' ) ) {
		    $front_css_file = $upload_dir['baseurl'] . '/js_composer/js_composer_front_custom.css';
		  }
		}
		else{
		  if ( WPBakeryVisualComposerSettings::get('use_custom') == '1' && is_file( $upload_dir['basedir'] . '/js_composer/js_composer_front_custom.css' ) ) {
		    $front_css_file = $upload_dir['baseurl'] . '/js_composer/js_composer_front_custom.css';
		  }

		}

		wp_register_style( 'js_composer_front', $front_css_file, false, null, 'all' );

		if ( is_file( $upload_dir['basedir'] . '/js_composer/custom.css' ) ) {
		  wp_register_style( 'js_composer_custom_css', $upload_dir['baseurl'] . '/js_composer/custom.css', array(), null, 'screen' );
		}

		wp_enqueue_style('js_composer_front');
		wp_enqueue_style('js_composer_custom_css');

		if (get_detheme_option('blog_type')=='masonry'){
			wp_enqueue_style( 'masonry-component', get_template_directory_uri() . '/css/masonry/component.css', array(), null, 'all' );
		}
	} //if(function_exists('vc_set_as_theme'))

}

function hue_define_var_script(){
	wp_add_inline_script('hue-script', "var ajaxurl = '".admin_url('admin-ajax.php')."';var themecolor='".get_detheme_option('primary-color','#000000')."';",'before');
}

function hue_load_modal_content(){

		global $detheme_revealData; 

		if(count($detheme_revealData)) { 
			print @implode("\n",$detheme_revealData);
			print "<div class=\"md-overlay\"></div>";
		}

}

function hue_load_custom_script(){
	global $detheme_Scripts;

	if(count($detheme_Scripts)) {
		wp_add_inline_script('hue-script', @implode("\n",$detheme_Scripts));
	}
}

function hue_load_vc_custom_css_style(){

	global $detheme_Style; 

	if(count($detheme_Style)){
		wp_add_inline_style('hue-style', @implode("",$detheme_Style));
	}
}

function detheme_check_vc_custom_row($post=null,$object_id, $meta_key=''){

  if('_wpb_shortcodes_custom_css'==$meta_key){

    $meta_cache = wp_cache_get($object_id, 'post_meta');
    return '';
   }
}

function detheme_og_generator(){

	if(is_admin())
		return;

	if (!get_detheme_option('meta-og'))
		return;

	$ogimage = "";
	if (function_exists('wp_get_attachment_thumb_url')) {
		$ogimage = wp_get_attachment_thumb_url(get_post_thumbnail_id(get_the_ID())); 
	}

	print '<meta property="og:title" content="'.esc_attr(get_the_title()).'" />'."\n";
	print '<meta property="og:type" content="article"/>'."\n";
	print '<meta property="og:locale" content="'.get_locale().'" />'."\n";
	print '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'"/>'."\n";
	print '<meta property="og:url" content="'.esc_url(get_permalink()).'" />'."\n";
	print '<meta property="og:description" content="'.esc_attr(str_replace( '[&hellip;]', '&hellip;', strip_tags( get_the_excerpt() ))).'" />'."\n";
	print '<meta property="og:image" content="'.esc_attr($ogimage).'" />'."\n";

}


function detheme_theme_slug_font_url($font_family,$subset,$font_weight='300,300italic,400,400italic,700,700italic') {
	$fonts_url = '';
	 
	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans = _x( 'on', $font_family . ' font: on or off', 'hue' );

 
	if ( 'off' !== $open_sans ) {
		$font_families = array();
	 
		$font_families[] = $font_family.':'.$font_weight;
		 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subset ),
		);
		 
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
} //function theme_slug_fonts_url

function detheme_print_inline_style(){

	if(is_admin() || in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php')))
		return;


	$is_ssl=wp_http_supports( array( 'ssl' ));

  	$css_banner=array();

	if(get_detheme_option('banner')){
		$css_banner[]= 'background: url('.esc_url(get_detheme_option('banner','')).') no-repeat 50% 50%; max-height: 100%; background-size: cover;'; 
	}

	if(get_detheme_option('banner-color')){
		$css_banner[]='background-color: '.get_detheme_option('banner-color','').';'; 
	}


	$banner_height=get_detheme_banner_height();
	if($banner_height){
		$css_banner[]='min-height:'.$banner_height.";";
		$css_banner[]='height:'.$banner_height.";";
	}

	wp_enqueue_style( "hue-theme-style", get_template_directory_uri() . "/style.css");
	wp_enqueue_style( "hue-bootstrap", get_template_directory_uri() . "/css/bootstrap.css");
	wp_enqueue_style( "hue-flaticon", get_template_directory_uri() . "/css/flaticon.css");
	wp_enqueue_style( "hue-socialicon", get_template_directory_uri() . "/css/socialicons/flaticon.css");

	$primaryFont=get_detheme_option('primary-font');

	if (isset($primaryFont['font-family']) && isset($primaryFont['google'])) {
		if (isset($primaryFont['google']) && $primaryFont['google']) {
			$fontfamily = $primaryFont['font-family'];
			$subsets = (!empty($primaryFont['subsets'])) ? $primaryFont['subsets']: '';
			
			wp_enqueue_style( sanitize_title($fontfamily) , esc_url(detheme_theme_slug_font_url($fontfamily,$subsets)));
		}	
	} else {
		wp_enqueue_style('open-sans', esc_url(detheme_theme_slug_font_url('Open Sans','')));
	}

	$secondaryFont=get_detheme_option('secondary-font');

	if (isset($secondaryFont['font-family']) && isset($secondaryFont['google'])) {
		if ($secondaryFont['google']) {
			$fontfamily = $secondaryFont['font-family'];
			$subsets = (!empty($secondaryFont['subsets'])) ? $secondaryFont['subsets'] : '';

			wp_enqueue_style( sanitize_title($fontfamily) , esc_url(detheme_theme_slug_font_url($fontfamily,$subsets)));
		}	
	} else {
		wp_enqueue_style('poppins', esc_url(detheme_theme_slug_font_url('Poppins','')));
	}

	$sectionFont=get_detheme_option('section-font');

	if (isset($sectionFont['font-family']) && isset($sectionFont['google'])) {

		if ($sectionFont['google']) {
			$fontfamily = $sectionFont['font-family'];
			$subsets = (!empty($sectionFont['subsets'])) ? $sectionFont['subsets'] : '';

			if (!empty($sectionFont['font-weight'])) {
				$fontweight = $sectionFont['font-weight'].','.$sectionFont['font-weight'].'italic';

				wp_enqueue_style( sanitize_title($fontfamily) , esc_url(detheme_theme_slug_font_url($fontfamily,$subsets,$fontweight)));
			} else {
				wp_enqueue_style( sanitize_title($fontfamily) , esc_url(detheme_theme_slug_font_url($fontfamily,$subsets)));
			}

		}	
	} else {
		wp_enqueue_style('poppins', esc_url(detheme_theme_slug_font_url('Poppins','')));
	}

	$tertiaryFont=get_detheme_option('tertiary-font');

	if (isset($tertiaryFont['font-family']) && isset($tertiaryFont['google'])) {
		if ($tertiaryFont['google']) {
			$fontfamily = $tertiaryFont['font-family'];
			$subsets = (!empty($tertiaryFont['subsets'])) ? $tertiaryFont['subsets'] : '';

			wp_enqueue_style( sanitize_title($fontfamily) , esc_url(detheme_theme_slug_font_url($fontfamily,$subsets)));
		}	
	} else {
		wp_enqueue_style('playfair-display', esc_url(detheme_theme_slug_font_url('Playfair Display','')));
	}

	if(!defined('IFRAME_REQUEST')){
		wp_enqueue_style('hue-style', get_template_directory_uri() . '/css/hue.css');

		if(is_rtl()){
			wp_enqueue_style('hue-rtl-style', get_template_directory_uri() . '/css/hue-rtl.css',array('hue-style'));
		}
	}

	if(is_child_theme()){
		wp_enqueue_style('hue-child-style', get_stylesheet_directory_uri() . '/style.css');
	}

	$blog_id="";

	if ( is_multisite()){
		$blog_id="-site".get_current_blog_id();
	}

	wp_enqueue_style("hue-custom-style",get_template_directory_uri() . '/css/customstyle'.$blog_id.'.css');

	print "<style type=\"text/css\">\n";

	if(get_detheme_option('sandbox-mode')){
  		$customstyle=detheme_style_compile(get_detheme_options(),"",false);

  		print $customstyle."\n";
  	}


	if(count($css_banner) || count($css_header)){
		print (count($css_banner))?"section#banner-section {".@implode("\n",$css_banner)."}\n":"";

		if (get_detheme_option('logo-top')) {
			print "div#head-page #dt-menu.dt-menu-center ul li.logo-desktop a {margin-top:".get_detheme_option('logo-top','')."px;}\n"; 
			print "div#head-page #dt-menu.dt-menu-left ul li.logo-desktop a {margin-top:".get_detheme_option('logo-top','')."px;}\n"; 
			print "div#head-page #dt-menu.dt-menu-leftbar ul li.logo-desktop a {margin-top:".get_detheme_option('logo-top','')."px;}\n"; 
			print "div#head-page #dt-menu.dt-menu-right ul li.logo-desktop a {margin-top:".get_detheme_option('logo-top','')."px;}\n"; 
			//print "div#head-page #dt-menu.dt-menu-middle ul li.logo-desktop {top:".get_detheme_option('logo-top','')."px;}\n"; 
		}

		print get_detheme_option('logo-left') ?"div#head-page #dt-menu ul li.logo-desktop a {margin-left:".get_detheme_option('logo-left','')."px;}\n":"";
		print get_detheme_option('body_background') ? get_detheme_option('body_background',''):"";
	}

	print "</style>\n";

	/* favicon handle */

	$favicon=get_detheme_option('dt-favicon-image');

	if($favicon && isset($favicon['url']) && ''!=$favicon['url'] && !function_exists('wp_site_icon')){
		$favicon_url=$favicon['url'];
		print "<link rel=\"shortcut icon\" type=\"image/png\" href=\"".esc_url(hue_maybe_ssl_url($favicon_url))."\">\n";
	}

}

function hue_scripts(){

    $suffix       = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

  	if(get_detheme_option('js-code')){
  		wp_add_inline_script('hue-script', get_detheme_option('js-code'));
	}

	if(get_detheme_option('boxed_layout_activate') && get_detheme_option('dt-header-type')!='leftbar' && get_detheme_option('boxed_layout_stretched')){
		wp_enqueue_script('paspartu',get_template_directory_uri() . '/js/paspartu.js', array('jquery'),null,true);
	}

    wp_enqueue_script( 'modernizr' , get_template_directory_uri() . '/js/modernizr.js', array( ), null, true );
    wp_enqueue_script( 'bootstrap' , get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'hue-script' , get_template_directory_uri() . '/js/myscript.js', array( 'jquery','bootstrap'), null, true );
    wp_enqueue_script( 'styleable-select', get_template_directory_uri() . '/js/select'.$suffix.'.js', array(), null, true );
    wp_enqueue_script( 'styleable-select-exec' , get_template_directory_uri() . '/js/select.init.js', array('styleable-select'), null, true );
    wp_enqueue_script( 'jquery.appear' , get_template_directory_uri() . '/js/jquery.appear'.$suffix.'.js', array(), null, true );
    wp_enqueue_script( 'jquery.counto' , get_template_directory_uri() . '/js/jquery.counto'.$suffix.'.js', array(), null, true );
	wp_enqueue_script( 'classie',get_template_directory_uri()."/js/classie.js",array(), null, true);
	wp_enqueue_script( 'modal-effects',get_template_directory_uri()."/js/modal_effects.js",array(), null, true);

	if (get_detheme_option('blog_type')=='masonry'){
		wp_enqueue_script( 'modernizr-custom' , get_template_directory_uri() . '/js/masonry/modernizr.custom.js', array(), null, true );
		wp_enqueue_script( 'masonry-pkgd' , get_template_directory_uri() . '/js/masonry/masonry.pkgd.min.js', array(), null, true );
		wp_enqueue_script( 'imagesloaded' , get_template_directory_uri() . '/js/masonry/imagesloaded.js', array(), null, true );
		wp_enqueue_script( 'AnimOnScroll' , get_template_directory_uri() . '/js/masonry/AnimOnScroll.js', array(), null, true );
		wp_enqueue_script( 'masonry-script' , get_template_directory_uri() . '/js/masonry/script.js', array(), null, true );
	}

	if ( is_singular() ) { 
		 wp_enqueue_script( 'hue-comment-reply' , get_template_directory_uri() . '/js/comment-reply.min.js', array( 'jquery' ), null, true );
	} 

	if(function_exists('vc_set_as_theme')){
	    wp_enqueue_script( 'wpb_composer_front_js' );
	}

}

function hue_admin_scripts() {
    wp_enqueue_script( 'hue-admin-script' , get_template_directory_uri() . '/js/adminscript.js', array(), null, true );
}	

function hue_load_preloader(){

	if(!get_detheme_option('page_loader') || defined('IFRAME_REQUEST') || is_404() || (defined('DOING_AJAX') && DOING_AJAX) )
		return '';

	wp_add_inline_script('hue-script','jQuery(document).ready(function ($) {
		\'use strict\';
	    $("body").queryLoader2({
	        barColor: "#fff",
	        backgroundColor: "none",
	        percentage: false,
	        barHeight: 0,
	        completeAnimation: "fade",
	        minimumTime: 500,
	        onLoadComplete: function() { $(\'.modal_preloader\').fadeOut(300,function () {$(\'.modal_preloader\').remove();})}
	    });
	});');
}

function detheme_load_admin_stylesheet(){
	wp_enqueue_style( 'detheme-admin',get_template_directory_uri() . '/lib/css/admin.css', array(), '', 'all' );
}

require_once( get_template_directory().'/lib/webicon.php'); // load detheme icon
require_once( get_template_directory().'/lib/options.php'); // load bootstrap stylesheet and scripts
require_once( get_template_directory().'/lib/custom_functions.php'); // load specific functions
require_once( get_template_directory().'/lib/metaboxes.php'); // load custom metaboxes
require_once( get_template_directory().'/lib/widgets.php'); // load custom widgets
require_once( get_template_directory().'/lib/updater.php'); // load easy update
require_once( get_template_directory().'/lib/fonts.php'); // load detheme font family

if (function_exists('set_vc_is_inline')) {
	set_vc_is_inline(true);
}

if(function_exists('vc_set_as_theme')){
	vc_set_as_theme(true);
}
?>