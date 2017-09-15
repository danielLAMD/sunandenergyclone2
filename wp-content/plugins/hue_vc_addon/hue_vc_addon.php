<?php
defined('ABSPATH') or die();
/*
Plugin Name: Hue Visual Composer Add On
Plugin URI: http://www.detheme.com/
Description: Module add on for WPBakery Visual Composer.
Version: 1.0.3
Author: detheme.com
Author URI: http://www.detheme.com/
License: GPLv2 or later
Text Domain: detheme
Domain Path: /languages
*/

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

class hueVCAddon{
  public $fonts_list = '[{"font_family":"Abril Fatface","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Arimo","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Arvo","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Bitter","font_styles":"regular,italic,700","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal"},{"font_family":"Cabin","font_styles":"regular,italic,500,500italic,600,600italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,500 bold regular:500:normal,500 bold italic:500:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Cinzel","font_styles":"regular,700,900","font_types":"400 regular:400:normal,700 bold regular:700:normal,900 bold regular:900:normal"},{"font_family":"Coda","font_styles":"regular,800","font_types":"400 regular:400:normal,800 bold regular:800:normal"},{"font_family":"Condiment","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Delius","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Dosis","font_styles":"200,300,regular,500,600,700,800","font_types":"200 light regular:200:normal,300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal,800 bold regular:800:normal"},{"font_family":"Droid Sans","font_styles":"regular,700","font_types":"400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Droid Serif","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Exo","font_styles":"100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","font_types":"100 light regular:100:normal,100 light italic:100:italic,200 light regular:200:normal,200 light italic:200:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,500 bold regular:500:normal,500 bold italic:500:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic,900 bold regular:900:normal,900 bold italic:900:italic"},{"font_family":"Hind","font_styles":"300,regular,500,600,700","font_types":"300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal"},{"font_family":"Istok Web","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Josefin Sans","font_styles":"100,100italic,300,300italic,regular,italic,600,600italic,700,700italic","font_types":"100 light regular:100:normal,100 light italic:100:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Josefin Slab","font_styles":"100,100italic,300,300italic,regular,italic,600,600italic,700,700italic","font_types":"100 light regular:100:normal,100 light italic:100:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Lato","font_styles":"100,100italic,300,300italic,regular,italic,700,700italic,900,900italic","font_types":"100 light regular:100:normal,100 light italic:100:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic,900 bold regular:900:normal,900 bold italic:900:italic"},{"font_family":"Libre Baskerville","font_styles":"regular,italic,700","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal"},{"font_family":"Lobster","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Lora","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Merienda","font_styles":"regular,700","font_types":"400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Merriweather","font_styles":"300,300italic,regular,italic,700,700italic,900,900italic","font_types":"300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic,900 bold regular:900:normal,900 bold italic:900:italic"},{"font_family":"Merriweather Sans","font_styles":"300,300italic,regular,italic,700,700italic,800,800italic","font_types":"300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic"},{"font_family":"Montserrat","font_styles":"regular,700","font_types":"400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Muli","font_styles":"300,300italic,regular,italic","font_types":"300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic"},{"font_family":"Neuton","font_styles":"200,300,regular,italic,700,800","font_types":"200 light regular:200:normal,300 light regular:300:normal,400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,800 bold regular:800:normal"},{"font_family":"Nothing You Could Do","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Noto Sans","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Noto Serif","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Old Standard TT","font_styles":"regular,italic,700","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal"},{"font_family":"Oleo Script","font_styles":"regular,700","font_types":"400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Open Sans","font_styles":"300,300italic,regular,italic,600,600italic,700,700italic,800,800italic","font_types":"300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic"},{"font_family":"Open Sans Condensed","font_styles":"300,300italic,700","font_types":"300 light regular:300:normal,300 light italic:300:italic,700 bold regular:700:normal"},{"font_family":"Orbitron","font_styles":"regular,500,700,900","font_types":"400 regular:400:normal,500 bold regular:500:normal,700 bold regular:700:normal,900 bold regular:900:normal"},{"font_family":"Oswald","font_styles":"300,regular,700","font_types":"300 light regular:300:normal,400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Oxygen","font_styles":"300,regular,700","font_types":"300 light regular:300:normal,400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"PT Sans","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"PT Serif","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Pacifico","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Permanent Marker","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Philosopher","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Playfair Display","font_styles":"regular,italic,700,700italic,900,900italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic,900 bold regular:900:normal,900 bold italic:900:italic"},{"font_family":"Poppins","font_styles":"regular,300,400,500,600,700","font_types":"400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Radley","font_styles":"regular,italic","font_types":"400 regular:400:normal,400 italic:400:italic"},{"font_family":"Raleway","font_styles":"100,200,300,regular,500,600,700,800,900","font_types":"100 light regular:100:normal,200 light regular:200:normal,300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal,800 bold regular:800:normal,900 bold regular:900:normal"},{"font_family":"Roboto","font_styles":"100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic","font_types":"100 light regular:100:normal,100 light italic:100:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,500 bold regular:500:normal,500 bold italic:500:italic,700 bold regular:700:normal,700 bold italic:700:italic,900 bold regular:900:normal,900 bold italic:900:italic"},{"font_family":"Roboto Condensed","font_styles":"300,300italic,regular,italic,700,700italic","font_types":"300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Roboto Slab","font_styles":"100,300,regular,700","font_types":"100 light regular:100:normal,300 light regular:300:normal,400 regular:400:normal,700 bold regular:700:normal"},{"font_family":"Satisfy","font_styles":"regular","font_types":"400 regular:400:normal"},{"font_family":"Signika","font_styles":"300,regular,600,700","font_types":"300 light regular:300:normal,400 regular:400:normal,600 bold regular:600:normal,700 bold regular:700:normal"},{"font_family":"Source Code Pro","font_styles":"200,300,regular,500,600,700,900","font_types":"200 light regular:200:normal,300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal,900 bold regular:900:normal"},{"font_family":"Ubuntu","font_styles":"300,300italic,regular,italic,500,500italic,700,700italic","font_types":"300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,500 bold regular:500:normal,500 bold italic:500:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Ubuntu Mono","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Vollkorn","font_styles":"regular,italic,700,700italic","font_types":"400 regular:400:normal,400 italic:400:italic,700 bold regular:700:normal,700 bold italic:700:italic"},{"font_family":"Yeseva One","font_styles":"regular","font_types":"400 regular:400:normal"}]';

    function init(){

      if(!function_exists('vc_set_as_theme'))
        return true;

        load_plugin_textdomain('detheme', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        define('DETHEME_VC_BASENAME',dirname(plugin_basename(__FILE__)));
        define('DETHEME_VC_DIR',plugin_dir_path(__FILE__));
        define('DETHEME_VC_DIR_URL',plugin_dir_url(__FILE__));

       if(version_compare(WPB_VC_VERSION,"4.2.3",'<')){
          require_once(plugin_dir_path(__FILE__)."lib/map.old.php");
        }
        else{
          require_once(plugin_dir_path(__FILE__)."lib/map.php");
        }

        require_once(plugin_dir_path(__FILE__)."lib/shortcode.php");
        add_action('wp_enqueue_scripts', array($this,'load_front_css_style' ));
        add_action('admin_enqueue_scripts', array($this,'load_editor_css_style' ));
        add_filter( 'plugin_row_meta', array($this,'vc_compatible_version'),1,4);//
        add_filter('the_content',array($this,'fix_WPautop'),12); 

        if(!is_admin()){
          add_filter('embed_handler_html', array($this,'enable_Jsapi'), 92, 3 ); 
          add_filter('oembed_dataparse', array($this,'enable_Jsapi'), 90, 3 );
          add_filter('embed_oembed_html', array($this,'enable_Jsapi'), 91, 4 );
        }

        wp_enqueue_script('dt-vc-addon',DETHEME_VC_DIR_URL.'js/script.js',array('jquery'));

        //Override Google Fonts List
        add_filter('vc_google_fonts_get_fonts_filter',array($this,'get_hue_google_fonts'));

        //$this->hue_custom_vc_row();
    }

    function get_hue_google_fonts() {
      return json_decode( $this->fonts_list );
    }

    function enable_Jsapi($html){
     if (strpos($html, "<iframe " ) !== false) {
        $search = array('?feature=oembed');
        $replace = array('?feature=oembed&amp;enablejsapi=1');
        $html = str_replace($search, $replace, $html);
        $html=preg_replace('/(player\.vimeo\.com\/video\/)([\d]{1,})/', '$1$2?api=1&', $html);

        return $html;
     }
     return $html;
    }

     function vc_compatible_version($plugin_meta, $plugin_file, $plugin_data, $status){

      if('js_composer/js_composer.php'!=$plugin_file)
        return $plugin_meta;
      $plugin_meta=array();

      if ( !empty( $plugin_data['Version'] ) )
        $plugin_meta[] = sprintf( __( 'Version %s' ), $plugin_data['Version'] );
      if ( !empty( $plugin_data['Author'] ) ) {
        $plugin_meta[] = sprintf( __( 'By %s' ), $plugin_data['Author'] );
      }


      return $plugin_meta;
    }


    function load_editor_css_style(){


        wp_enqueue_style('icon_picker-font',DETHEME_VC_DIR_URL."lib/admin/css/fontello.css");
        wp_enqueue_style('webfonts-font',DETHEME_VC_DIR_URL."webicons/webfonts.css");
        wp_enqueue_style( 'detheme-vc-front',DETHEME_VC_DIR_URL."lib/admin/css/admin.css?".time(),array());

        if(version_compare(WPB_VC_VERSION,"4.2.3",'>=')){

            wp_enqueue_script('detheme-vc-backend',DETHEME_VC_DIR_URL.'lib/admin/js/backend.new.js',array('jquery'));
            wp_localize_script( 'detheme-vc-backend', 'dtvc_i18nLocale', array(
                  'select_media'=>__('Select','detheme'),
                  'insert_media'=>__('Insert Media','detheme'),
                  'select_media_to'=>__('Select Media','detheme'),
            ));
        }

        wp_enqueue_script('icon_picker',DETHEME_VC_DIR_URL.'lib/admin/js/icon_picker.js',array('jquery'));
        wp_localize_script( 'icon_picker', 'picker_i18nLocale', array(
          'search_icon'=>__('Search Icon','detheme'),
        ) );


    }

    function load_front_css_style(){

        wp_register_style('webfonts-font',DETHEME_VC_DIR_URL."webicons/webfonts.css");
        wp_register_style('detheme-vc',DETHEME_VC_DIR_URL."css/plugin_style.css");


        wp_register_style('scroll-spy',DETHEME_VC_DIR_URL."css/scroll_spy.css",array('scroll-spy-ie'));
        wp_register_style( 'scroll-spy-ie', DETHEME_VC_DIR_URL . '/css/scroll_spy_ie9.css', array());
        wp_style_add_data( 'scroll-spy-ie', 'conditional', 'IE 9' );


        wp_register_script( 'uilkit', DETHEME_VC_DIR_URL . 'js/uilkit.js', array(), '1.0', false );
        wp_register_script('ScrollSpy',DETHEME_VC_DIR_URL."js/scrollspy.js",array( 'uilkit' ), '1.0', false );

        wp_enqueue_style('webfonts-font');
        wp_enqueue_style( 'detheme-vc');
    }

    function fix_WPautop($content){


      if ( $content ) {

        $s = array(
          '/' . preg_quote( '</div>', '/' ) . '[\s\n\f]*' . preg_quote( '</p>', '/' ) . '/i',
          '/' . preg_quote( '<p>', '/' ) . '[\s\n\f]*' . preg_quote( '<div ', '/' ) . '/i',
          '/' . preg_quote( '<p>', '/' ) . '[\s\n\f]*' . preg_quote( '<section ', '/' ) . '/i',
          '/' . preg_quote( '</section>', '/' ) . '[\s\n\f]*' . preg_quote( '</p>', '/' ) . '/i'
        );
        $r = array( "</div>", "<div ", "<section ", "</section>" );
        $content = preg_replace( $s, $r, $content );


      }

      return $content;

    }

    function hue_custom_vc_row(){

       vc_add_param( 'vc_row', array( 
            'heading' => esc_html__( 'Expand section width', 'detheme' ),
            'param_name' => 'expanded',
            'class' => '',
            'value' => array(esc_html__('Expand Column','detheme')=>'1',esc_html__('Expand Background','detheme')=>'2'),
            'description' => esc_html__( 'Make section "out of the box".', 'detheme' ),
            'type' => 'checkbox',
            'group'=>esc_html__('Extended options', 'detheme')
        ) );

     
       vc_add_param( 'vc_row',   array( 
              'heading' => esc_html__( 'Background Type', 'detheme' ),
              'param_name' => 'background_type',
              'value' => array('image'=>esc_html__( 'Image', 'detheme' ),'video'=>esc_html__( 'Video', 'detheme' )),
              'type' => 'radio',
              'group'=>esc_html__('Extended options', 'detheme'),
              'std'=>'image'
           ));

       if(version_compare(WPB_VC_VERSION,'4.7.0','>=')){

            vc_remove_param('vc_row','full_width');
            vc_remove_param('vc_row','video_bg');
            vc_remove_param('vc_row','video_bg_url');
            vc_remove_param('vc_row','video_bg_parallax');
            vc_remove_param('vc_row','parallax');
            vc_remove_param('vc_row','parallax_image');

            if(version_compare(WPB_VC_VERSION,'4.11.0','>=') || version_compare(WPB_VC_VERSION,'4.11','>=')){

                vc_remove_param('vc_row','parallax_speed_video');
                vc_remove_param('vc_row','parallax_speed_bg');
            }

            vc_add_param( 'vc_row',   array( 
                    'heading' => esc_html__( 'Video Source', 'detheme' ),
                    'param_name' => 'video_source',
                    'value' => array('local'=>esc_html__( 'Local Server', 'detheme' ),'youtube'=>esc_html__( 'Youtube/Vimeo', 'detheme' )),
                    'type' => 'radio',
                    'group'=>esc_html__('Extended options', 'detheme'),
                    'std'=>'local',
                    'dependency' => array( 'element' => 'background_type', 'value' => array('video') )   
             ));


           vc_add_param( 'vc_row', array( 
                'heading' => esc_html__( 'Background Video (mp4)', 'detheme' ),
                'param_name' => 'background_video',
                'type' => 'attach_video',
                'group'=>esc_html__('Extended options', 'detheme'),
                'dependency' => array( 'element' => 'video_source', 'value' => array('local') )   
            ) );

           vc_add_param( 'vc_row', array( 
                'heading' => esc_html__( 'Background Video (webm)', 'detheme' ),
                'param_name' => 'background_video_webm',
                'type' => 'attach_video',
                'group'=>esc_html__('Extended options', 'detheme'),
                'dependency' => array( 'element' => 'video_source', 'value' => array('local') )   
            ) );

           vc_add_param( 'vc_row', array( 
                'heading' => esc_html__( 'Background Image', 'detheme' ),
                'param_name' => 'background_image',
                'type' => 'attach_image',
                'group'=>esc_html__('Extended options', 'detheme'),
                'dependency' => array( 'element' => 'background_type', 'value' => array('image') )   
            ) );

            vc_add_param( 'vc_row',
                array(
                  'type' => 'textfield',
                  'heading' => esc_html__( 'Video link', 'detheme' ),
                  'param_name' => 'video_bg_url',
                  'group'=>esc_html__('Extended options', 'detheme'),
                  'description' => esc_html__( 'Add YouTube/Vimeo link', 'detheme' ),
                  'dependency' => array(
                    'element' => 'video_source',
                    'value' => array('youtube'),
                  ),
             ));
        }
        else{

           vc_add_param( 'vc_row', array( 
                'heading' => esc_html__( 'Background Video (mp4)', 'detheme' ),
                'param_name' => 'background_video',
                'type' => 'attach_video',
                'group'=>esc_html__('Extended options', 'detheme'),
                'dependency' => array( 'element' => 'background_type', 'value' => array('video') )   
            ) );

           vc_add_param( 'vc_row', array( 
                'heading' => esc_html__( 'Background Video (webm)', 'detheme' ),
                'param_name' => 'background_video_webm',
                'type' => 'attach_video',
                'group'=>esc_html__('Extended options', 'detheme'),
                'dependency' => array( 'element' => 'background_type', 'value' => array('video') )   
            ) );

           vc_add_param( 'vc_row', array( 
                'heading' => esc_html__( 'Background Image', 'detheme' ),
                'param_name' => 'background_image',
                'type' => 'attach_image',
                'group'=>esc_html__('Extended options', 'detheme'),
                'dependency' => array( 'element' => 'background_type', 'value' => array('image') )   
            ) );


        }

       vc_add_param( 'vc_row', array( 
            'heading' => esc_html__( 'Extra id', 'detheme' ),
            'param_name' => 'el_id',
            'type' => 'textfield',
            "description" => esc_html__("If you wish to add anchor id to this row. Anchor id may used as link like href=\"#yourid\"", 'detheme'),
        ) );


       vc_add_param( 'vc_row_inner', array( 
            'heading' => esc_html__( 'Extra id', 'detheme' ),
            'param_name' => 'el_id',
            'type' => 'textfield',
            "description" => esc_html__("If you wish to add anchor id to this row. Anchor id may used as link like href=\"#yourid\"", 'detheme'),
        ) );

        vc_add_param( 'vc_row', array( 
            'heading' => esc_html__( 'Background Style', 'detheme' ),
            'param_name' => 'background_style',
            'type' => 'dropdown',
            'value'=>array(
                  esc_html__('No Repeat', 'detheme') => 'no-repeat',
                  esc_html__("Cover", 'detheme') => 'cover',
                  esc_html__('Contain', 'detheme') => 'contain',
                  esc_html__('Repeat', 'detheme') => 'repeat',
                  esc_html__("Parallax", 'detheme') => 'parallax',
                 esc_html__("Fixed", 'detheme') => 'fixed',
                ),
            'group'=>esc_html__('Extended options', 'detheme'),
            'dependency' => array( 'element' => 'background_type', 'value' => array('image') )       
        ) );
      } //function hue_custom_vc_row() 

} //class hueVCAddon

add_action('init', array(new hueVCAddon(),'init'),1);

if(!function_exists('darken')){

    function darken($colourstr, $procent=0) {
      $colourstr = str_replace('#','',$colourstr);
      $rhex = substr($colourstr,0,2);
      $ghex = substr($colourstr,2,2);
      $bhex = substr($colourstr,4,2);

      $r = hexdec($rhex);
      $g = hexdec($ghex);
      $b = hexdec($bhex);

      $r = max(0,min(255,$r - ($r*$procent/100)));
      $g = max(0,min(255,$g - ($g*$procent/100)));  
      $b = max(0,min(255,$b - ($b*$procent/100)));

      return '#'.str_repeat("0", 2-strlen(dechex($r))).dechex($r).str_repeat("0", 2-strlen(dechex($g))).dechex($g).str_repeat("0", 2-strlen(dechex($b))).dechex($b);
    }

}

if(!function_exists('lighten')){

    function lighten($colourstr, $procent=0){

      $colourstr = str_replace('#','',$colourstr);
      $rhex = substr($colourstr,0,2);
      $ghex = substr($colourstr,2,2);
      $bhex = substr($colourstr,4,2);

      $r = hexdec($rhex);
      $g = hexdec($ghex);
      $b = hexdec($bhex);

      $r = max(0,min(255,$r + ($r*$procent/100)));
      $g = max(0,min(255,$g + ($g*$procent/100)));  
      $b = max(0,min(255,$b + ($b*$procent/100)));

      return '#'.str_repeat("0", 2-strlen(dechex($r))).dechex($r).str_repeat("0", 2-strlen(dechex($g))).dechex($g).str_repeat("0", 2-strlen(dechex($b))).dechex($b);
    }

}


if(!function_exists('dt_exctract_DTicon')){

  function dt_exctract_DTicon($file="",$pref=""){

    $wp_filesystem=new WP_Filesystem_Direct(array());

    if(!$wp_filesystem->is_file($file) || !$wp_filesystem->exists($file))
        return false;

     if ($buffers=$wp_filesystem->get_contents_array($file)) {
       $icons=array();

      foreach ($buffers as $line => $buffer) {

        if(preg_match("/^(\.".$pref.")([^:\]\"].*?):before/i",$buffer,$out)){

          if($out[2]!==""){
              $icons[$pref.$out[2]]=$pref.$out[2];
          }
        }
      }
      return $icons;

    }else{

      return false;
    }
  }
}

function get_font_lists($path){

  $wp_filesystem=new WP_Filesystem_Direct(array());

  $icons=array();
  if($dirlist=$wp_filesystem->dirlist($path)){
    foreach ($dirlist as $dirname => $dirattr) {

       if($dirattr['type']=='d'){
          if($dirfont=$wp_filesystem->dirlist($path.$dirname)){
            foreach ($dirfont as $filename => $fileattr) {
              if(preg_match("/(\.css)$/", $filename)){
                if($icon=dt_exctract_DTicon($path.$dirname."/".$filename)){

                  $icons=@array_merge($icon,$icons);
                }
                break;
              }
             
            }
          }
        }
        elseif($dirattr['type']=='f' && preg_match("/(\.css)$/", $dirname)){

          if($icon=dt_exctract_DTicon($path.$dirname)){
              $icons=@array_merge($icon,$icons);
          }

      }

    }
  }
  return $icons;
}

function detheme_font_list(){

  $path=DETHEME_VC_DIR."webicons/";

  $icons=array();
  if($newicons=get_font_lists($path)){
    $icons=array_merge($icons,$newicons);
  }

  return apply_filters('detheme_font_list',$icons);
}

function detheme_get_element_ID($prefix=""){

  global $dt_el_id;

  if(!isset($dt_el_id)) {
    $dt_el_id=0;
  }

  $dt_el_id++;

  return $prefix.$dt_el_id;

}

?>