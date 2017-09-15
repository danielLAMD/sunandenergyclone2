<?php
defined('ABSPATH') or die();

function load_google_fonts(){

    $font = 'http://fonts.googleapis.com/css?family=Droid+Sans%7COpen+Sans%7CTangerine%7CJosefin+Slab%7CArvo%7CLato%7CVollkorn%7CAbril+Fatface%7CUbuntu%7CPT+Sans%7CPT+Serif%7COld+Standard+TT';
    wp_enqueue_style('google-font', $font); 

    wp_enqueue_script( 'icon-picker',DETHEME_VC_DIR_URL.'lib/admin/js/icon_picker.js', array('jquery'));

}

add_action('admin_init','load_google_fonts');

vc_map( array( 
    'name' => __( 'Icon Box', 'detheme' ),
    'base' => 'dt_iconbox',
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows icon with various layouts','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'admin_enqueue_js' => DETHEME_VC_DIR_URL . '/lib/admin/js/backend.js',
    'params' => array(  
        array( 
        'heading' => __( 'Icon', 'detheme' ),
        'param_name' => 'icon_type',
        'class' => '',
        'value'=>'',
        'admin_label' => true,
        'description' => __( 'Select the icon to be displayed by clicking the icon.', 'detheme' ),
        'type' => 'iconlists',
        'std'=>'icon-picture'
         ),     
        array( 
        'heading' => __( 'Icon Size', 'detheme' ),
        'param_name' => 'icon_size',
        'class' => '',
        'type' => 'slider_value',
        'default' => "10",
        'params'=>array('min'=>10,'max'=>'100','step'=>1),
         ),     
        array( 
        'heading' => __( 'Icon Line Height', 'detheme' ),
        'param_name' => 'line_height',
        'default' => "",
        'value'=>'',
        'type' => 'textfield'
        ),
        array( 
        'heading' => __( 'Layout type', 'detheme' ),
        'param_name' => 'layout_type',
        'class' => '',
        'param_holder_class'=>'icon-style-label',
        'type' => 'select_layout',
         'value'=>array(
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-1.png" alt="'.__('Type 1: Squared Border Icon','detheme').'" />' => '1',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-2.png" alt="'.__('Type 2: Circled Border Icon','detheme').'"/>' => '2',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-3.png" alt="'.__('Type 3: Squared Border Icon with Counter','detheme').'"/>' => '3',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-4.png" alt="'.__('Type 4: Squared Border Box','detheme').'"/>' => '4',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-5.png" alt="'.__('Type 5: Circled Border and Transparent Icon','detheme').'"/>' => '5',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-6.png" alt="'.__('Type 6: Squared Box With Hover Color','detheme').'"/>' => '6',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-7.png" alt="'.__('Type 7: Circled boxes Icon On Left','detheme').'"/>' => '7',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/layout-8.png" alt="'.__('Type 8: Circled boxes Icon On Right','detheme').'"/>' => '8'
            ),
        'std'=>'1',
        'admin_label' => true,
        'description' => __( 'Choose the icon layout you want to use.', 'detheme' ),
         ),     
        array( 
        'heading' => __( 'Iconbox heading', 'detheme' ),
        'param_name' => 'iconbox_heading',
        'class' => '',
        'value' => '',
        'type' => 'textfield',
         ),         
        array( 
        'heading' => __( 'Iconbox Heading Color', 'detheme' ),
        'param_name' => 'color_heading',
        'class' => '',
        'value' => '',
        'type' => 'colorpicker'
         ), 
        array( 
        'heading' => __( 'Iconbox Counter Number', 'detheme' ),
        'param_name' => 'iconbox_number',
        'class' => '',
        'value' => '',
        'description' => __( 'A value will count-up.', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'layout_type', 'value' => array('3') )
         ),         
        array( 
        'heading' => __( 'Iconbox text', 'detheme' ),
        'param_name' => 'content',
        'class' => '',
        'value' => '',
        'description' => __( 'Text info', 'detheme' ),
        'type' => 'textarea_html'
         ),         
        array( 
        'heading' => __( 'Link', 'detheme' ),
        'param_name' => 'link',
        'class' => '',
        'value' => '',
        'type' => 'textfield',
         ),         
        array( 
        'heading' => __( 'Target', 'detheme' ),
        'param_name' => 'target',
        'class' => '',
        'value' => array(__("Blank",'detheme') =>"_blank", __("Self","detheme") => "_self"),
        'description' => __( 'Link Target', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
        array(
            "type" => "css_editor",
            "heading" => __('Css', "js_composer"),
            "param_name" => "css",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer"),
            "group" => __('Design options', 'js_composer')
          )
     )
 ) );



vc_map( array( 
    'name' => __( 'Section Heading', 'detheme' ),
    'base' => 'section_header',
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    'show_settings_on_create'=>true,
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows the heading title','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'admin_enqueue_js' => DETHEME_VC_DIR_URL . 'lib/admin/js/backend.js',
    'params' => array(  
          array( 
              'heading' => __( 'Separator', 'detheme' ),
              'param_name' => 'use_decoration',
              'type' => 'radio',
              'value'=>array(
                    '1'=>__("Yes", 'detheme'),
                    '0'=>__("No", 'detheme'),
                  ),
              'std' => 1       
          ),
         array( 
        'heading' => __( 'Layout type', 'detheme' ),
        'param_name' => 'layout_type',
        'class' => '',
        'param_holder_class'=>'section-heading-style',
        'type' => 'select_layout',
         'value'=>array(
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_01.png" alt="'.__('Type 1: Borderer','detheme').'" />' => 'section-heading-border',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_02.png" alt="'.__('Type 2: Border Top-Bottom','detheme').'"/>' => 'section-heading-border-top-bottom',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_03.png" alt="'.__('Type 3: Two Bottom Polkadot','detheme').'"/>' => 'section-heading-polkadot-two-bottom',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_06.png" alt="'.__('Type 4: Color Background','detheme').'"/>' => 'section-heading-colorblock',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_07.png" alt="'.__('Type 5: ','detheme').'"/>' => 'section-heading-point-bottom',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_08.png" alt="'.__('Type 6: ','detheme').'"/>' => 'section-heading-thick-border',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_11.png" alt="'.__('Type 7: ','detheme').'"/>' => 'section-heading-thin-border',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_14.png" alt="'.__('Type 8: ','detheme').'"/>' => 'section-heading-polkadot-left-right',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_15.png" alt="'.__('Type 9: ','detheme').'"/>' => 'section-heading-polkadot-top',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_16.png" alt="'.__('Type 10: ','detheme').'"/>' => 'section-heading-polkadot-bottom',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_17.png" alt="'.__('Type 11: ','detheme').'"/>' => 'section-heading-double-border-bottom',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_18.png" alt="'.__('Type 12: ','detheme').'"/>' => 'section-heading-thin-border-top-bottom',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_19.png" alt="'.__('Type 13: ','detheme').'"/>' => 'section-heading-swirl',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/section_heading_20.png" alt="'.__('Type 14: ','detheme').'"/>' => 'section-heading-wave',
            ),
        'dependency' => array( 'element' => 'use_decoration', 'value' => array('1')),        
         ),
         array( 
        'heading' => __( 'Separator Position', 'detheme' ),
        'param_name' => 'separator_position',
        'class' => '',
        'value' => array(__('Center','detheme') =>'center',__('Left','detheme') =>'left',__('Right','detheme') =>'right'),
        'type' => 'dropdown',
        'default'=>'center'
         ),         
       array( 
        'heading' => __( 'Text Heading', 'detheme' ),
        'param_name' => 'main_heading',
        'admin_label' => true,
        'class' => '',
        'value' => '',
        'type' => 'textfield'
         ),         
        array( 
        'heading' => __( 'Text Alignment', 'detheme' ),
        'param_name' => 'text_align',
        'class' => '',
        'value' => array(__('Center','detheme') =>'center',__('Left','detheme') =>'left',__('Right','detheme') =>'right'),
        'type' => 'dropdown',
        'param_holder_class'=>'width-3 inline-block',
        'default'=>'center'
         ),         
        array( 
        'heading' => __( 'Font Size', 'detheme' ),
        'param_name' => 'font_size',
        'param_holder_class'=>'width-3 inline-block',
        'std' => "default",
        'value'=>array(
              __('Extra Large','detheme')=>'xlarge',
              __('Large','detheme')=>'large',
              __('Default','detheme')=>'default',
              __('Small','detheme')=>'small',
              __('Extra small','detheme')=>'exsmall',
              __( 'Custom Size', 'detheme' )=>'custom'
              ),
        'type' => 'dropdown'
         ),
        array( 
        'heading' => __( 'Custom Font Size', 'detheme' ),
        'param_name' => 'custom_font_size',
        'param_holder_class'=>'width-3 inline-block',
        'class' => '',
        'value' => '',
        'type' => 'textfield',
        'dependency' => array( 'element' => 'font_size', 'value' => array( 'custom') )       
         ),         
        array( 
        'heading' => __( 'Font Style', 'detheme' ),
        'param_holder_class'=>'width-3 inline-block',
        'param_name' => 'font_style',
        'std' => "default",
        'value'=>array(
              __('Italic','detheme')=>'italic',
              __('Oblique','detheme')=>'oblique',
              __('Default','detheme')=>'default',
              __('Normal','detheme')=>'normal',
              ),
        'type' => 'dropdown'
         ),
        array( 
        'heading' => __( 'Font Weight', 'detheme' ),
        'param_name' => 'font_weight',
        'param_holder_class'=>'width-3 inline-block',
        'std' => "default",
        'value'=>array(
              __('Bold','detheme')=>'bold',
              __('Bolder','detheme')=>'bolder',
              __('Normal','detheme')=>'normal',
              __('lighter','detheme')=>'lighter',
              '100'=>'100',
              '200'=>'200',
              '300'=>'300',
              '400'=>'400',
              '500'=>'500',
              '600'=>'600',
              '700'=>'700',
              '800'=>'800',
              '900'=>'900',
              __('Default','detheme')=>'default',
              ),
        'type' => 'dropdown'
         ),
        array( 
        'heading' => __( 'Line Height', 'detheme' ),
        'param_name' => 'line_height',
        'param_holder_class'=>'width-3 inline-block',
        'std' => "",
        'value'=>'',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Letter Spacing', 'detheme' ),
        'param_name' => 'letter_spacing',
        'param_holder_class'=>'width-3 inline-block',
        'std' => "",
        'value'=>'',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Text Color', 'detheme' ),
        'param_name' => 'color',
        'param_holder_class'=>'width-3 inline-block',
        'value' => '',
        'type' => 'colorpicker'
         ),
        array( 
        'heading' => __( 'Separator Color', 'detheme' ),
        'param_name' => 'separator_color',
        'param_holder_class'=>'width-3 inline-block',
        'value' => '',
        'type' => 'colorpicker',
        'dependency' => array( 'element' => 'use_decoration', 'value' => array('1')),        
         ),
        array("type" => "css_editor",
        "heading" => __('Css', "js_composer"),
        "param_name" => "css",
        "group" => __('Design options', 'js_composer')
        ))
 ) );

class WPBakeryShortCode_Section_Header extends WPBakeryShortCode {

    function output($atts, $content = null, $base = ''){

        wp_enqueue_style('detheme-vc');

        $compile='';
        global $dt_main_heading_ID,$detheme_Style;

        if(!isset($dt_main_heading_ID)) $dt_main_heading_ID=0;

        $dt_main_heading_ID++;

        extract(shortcode_atts(array(
            'main_heading' => '',
            'layout_type'=>'section-heading-border',
            'text_align'=>'center',
            'color'=>'',
            'font_size'=>'default',
            'font_weight'=>'',
            'font_style'=>'',
            'custom_font_size'=>'',
            'separator_position'=>'',
            'use_decoration'=>false,
            'line_height'=>'',
            'separator_color'=>'',
            'css'=>''
        ), $atts));


       if($el_class = vc_shortcode_custom_css_class($css)){

            $detheme_Style[]=$css;
       }



        $heading_style=array();
        $sectionid="section-".$dt_main_heading_ID."-".time();


        if(!empty($color)){
            $heading_style['color']="color:".$color;
        }


        if(!empty($font_weight) && $font_weight!='default'){
            $heading_style['font-weight']="font-weight:".$font_weight;
        }


        if(!empty($line_height) && $line_height!='default'){
            $heading_style['line-height']="line-height:".$line_height."px";
        }

        if(!empty($letter_spacing) && $letter_spacing!='default'){
            $heading_style['letter-spacing']="letter-spacing:".$letter_spacing."px";
        }

        if(!empty($font_style) && $font_style!='default'){
            $heading_style['font-style']="font-style:".$font_style;
        }

        if(!empty($custom_font_size) && $font_size=='custom'){
            $custom_font_size=(preg_match('/(px|pt)$/', $custom_font_size))?$custom_font_size:$custom_font_size."px";
            $heading_style['font-size']="font-size:".$custom_font_size;
        }

        if($use_decoration){

            $decoration_position=$after_heading="";

            if($layout_type=='section-heading-polkadot-two-bottom'){
                $decoration_position="polka-".$separator_position;
            }
            elseif($layout_type=='section-heading-thick-border'){
                $decoration_position="thick-".$separator_position;
            }
            elseif($layout_type=='section-heading-thin-border'){
                $decoration_position="thin-".$separator_position;
            }
            elseif($layout_type=='section-heading-double-border-bottom'){
                $decoration_position="double-border-bottom-".$separator_position;
            }
            elseif($layout_type=='section-heading-thin-border-top-bottom'){
                $decoration_position="top-bottom-".$separator_position;
            }

           if(!empty($separator_color)){
                $heading_style['border-color']="border-color:".$separator_color;

                switch ($layout_type) {
                    case 'section-heading-border-top-bottom':
                    case 'section-heading-thin-border-top-bottom':
                    case 'section-heading-thick-border':
                    case 'section-heading-thin-border':
                    case 'section-heading-double-border-bottom':
                    case 'section-heading-swirl':
                        $detheme_Style[]="#".$sectionid." h2:after,#".$sectionid." h2:before{background-color:".$separator_color.";}";
                        break;
                    case 'section-heading-colorblock':
                        $detheme_Style[]="#".$sectionid." h2{background-color:".$separator_color.";}";
                        break;
                    case 'section-heading-point-bottom':
                        $detheme_Style[]="#".$sectionid." h2:before{border-top-color:".$separator_color.";}";
                        break;
                    default:
                        break;
                }

            }

            if($layout_type=='section-heading-swirl'){

                $after_heading.='<svg viewBox="0 0 '.(($text_align=='left')?"104":($text_align=='right'?"24":"64")).' 22"'.($separator_color!=''?" style=\"color:".$separator_color."\"":"").'>
                <use xlink:href="'.DETHEME_VC_DIR_URL.'images/source.svg#swirl"></use>
            </svg>';
            }elseif($layout_type=='section-heading-wave'){
                $after_heading.='<svg viewBox="0 0 '.(($text_align=='left')?"126":($text_align=='right'?"2":"64")).' 30"'.($separator_color!=''?" style=\"color:".$separator_color."\"":"").'>
                <use xlink:href="'.DETHEME_VC_DIR_URL.'images/source.svg#wave"></use>
            </svg>';
            }




            $compile.=
            '<div id="'.$sectionid.'" class="'.$el_class.' dt-section-head '.$text_align.(('default'!=$font_size || 'custom'!=$font_size)?" size-".$font_size:"").(($layout_type=='section-heading-swirl' || $layout_type=='section-heading-wave')?" ".$layout_type:"").('section-heading-polkadot-left-right'==$layout_type?" hide-overflow":"").'">
            <div class="dt-section-container"><h2 class="section-main-title '.$layout_type.' '.$decoration_position.'"'.(count($heading_style)?" style=\"".@implode(";",$heading_style)."\"":"").'>
                '.$main_heading.'
            </h2>'.$after_heading.'
            </div></div>';

        }
        else{

        $compile.='<div id="'.$sectionid.'" class="'.$el_class.' dt-section-head '.$text_align.(('default'!=$font_size || 'custom'!=$font_size)?" size-".$font_size:"").'">
                <div>'.
                ((!empty($main_heading))?'<h2'.(count($heading_style)?" style=\"".@implode(";",$heading_style)."\"":"").' class="section-main-title">'.$main_heading.'</h2>':'').
                '</div>
        </div>';              
        }

        return $compile;

    }
}

vc_map( array( 
    'name' => __( 'Price Item', 'detheme' ),
    'base' => 'dt_pricetable_item',
    'as_child' => array( 'only' => 'dt_pricetable' ),
    'class' => '',
    'controls' => 'full',
    "is_container" => false,
    'icon' => 'admin-icon-box',
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Most popular', 'detheme' ),
        'param_name' => 'most_popular',
        'value' => array('yes'=>__('Yes','detheme'),'no'=>__('No','detheme')),
        'type' => 'radio',
        'std'=>'no'
         ),
        array( 
        'heading' => __( 'Package Name', 'detheme' ),
        'param_name' => 'block_name',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Package Image', 'detheme' ),
        'param_name' => 'block_image',
        'value' => '',
        'type' => 'attach_image'
         ),
        array( 
        'heading' => __( 'Price Unit', 'detheme' ),
        'param_name' => 'block_subtitle',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Currency Symbol', 'detheme' ),
        'param_name' => 'block_symbol',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Price', 'detheme' ),
        'param_name' => 'block_price',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Package Detail', 'detheme' ),
        'param_name' => 'block_text',
        'value' => '',
        'description' => __( 'Type package detail in single line (without breakline/enter). Each breakline is automatically detected as new detail item', 'detheme' ),
        'type' => 'textarea'
         ),
        array( 
        'heading' => __( '"Button" Link', 'detheme' ),
        'param_name' => 'block_link',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( '"Button" Text', 'detheme' ),
        'param_name' => 'get_it_now_caption',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
     )

 ) );


vc_map( array( 
    'name' => __( 'Pricing Table', 'detheme' ),
    'base' => 'dt_pricetable',
    'as_parent' => array( 'only' => 'dt_pricetable_item' ),
    'class' => '',
    'controls' => 'full',
    "is_container" => true,
    'icon' => 'admin-icon-box',
    'js_view' => 'VcColumnView',
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows price comparison table','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Module Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label' => true,
        'value' => __( 'Pricing Table', 'detheme' ),
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Number of Price Column', 'detheme' ),
        'param_name' => 'table_column',
        'value'=>array(
            __('Three','detheme') => '3',
            __('Four','detheme') => '4',
            ),
        'type' => 'dropdown',
        'default'=>'3'
         ),
    )
 ) );


class WPBakeryShortCode_DT_Pricetable_Item extends WPBakeryShortCode {

     function output($atts, $content = null, $base = ''){

         extract(shortcode_atts(array(
            'block_link' => '',
            'get_it_now_caption' => '',
            'most_popular' => '',
            'block_text' => "",
            'block_price' => "",
            'block_name' => "",
            'block_subtitle' => "",
            'block_symbol' => "",
            'price_column' => "1",
            'spy'=>'none',
            'scroll_delay'=>300,
            'block_image'=>'',
            'identifier'=>''
        ), $atts));

        $price_features = @explode("\n", $block_text);


        $colomCss="";

        switch($price_column){
            case '3':
                    $colomCss="price-3-col ";
                break;
            case '4':
                    $colomCss="price-4-col ";
                break;
            case '1':
                    $colomCss="price-3-col ";
            case '2':
                    $colomCss="price-3-col ";
                break;
            default:
                break;
        }

        if($this->isInline()) {
            $identifier="pricing_".rand(1,99).time();
        }



        $compile = '';

        $scollspy="";


        if('none'!==$spy && !empty($spy)){

            wp_enqueue_style('scroll-spy');
            wp_enqueue_script('ScrollSpy');

            $scollspy=' data-uk-scrollspy="{cls:\''.$spy.'\''.(($scroll_delay)?', delay:'.$scroll_delay:"").'}"';
        }


        $block_price=@explode('.',$block_price);
        if (isset($block_price[1])) {
            $price=$block_price[0]."<span class=\"after-price\">".$block_price[1]."</span>";    
        } else {
            $price=$block_price[0]."<span class=\"after-price\"></span>";
        }

        $img = wpb_getImageBySize(array( 'attach_id' => $block_image, 'thumb_size' => 'medium', 'class' =>'pricing-image'));


        $compile.='<div id="'.$identifier.'" class="'.$colomCss.(('yes'==$most_popular)?" featured":"").'"'.$scollspy.'>
                <ul class="plan list-unstyled">
                    <li class="pricing-image-container">'.($img && $img['thumbnail']!=''? $img['thumbnail']:'').'</li>
                    '.(!empty($block_name)?'
                    <li class="hover-tip">
                        <p class="hover-tip-text">'.$block_name.'</p>
                    </li>':'').'
                    <li class="plan-head">
                        <div class="plan-price">'.(!empty($block_symbol)?"<span>$block_symbol</span>":"").(!empty($block_price)?$price:"").'</div>
                        <div class="plan-title"><span>'.$block_subtitle.'</span></div>                        
                    </li>';
        if(count($price_features)):

            $i=0;

            foreach($price_features as $feature):

                   $compile.='<li>'.$feature.'</li>';
                $i++;

            endforeach;
        
        endif;            
        
        if(!empty($get_it_now_caption)){
            $compile.='<li class="plan-action">
                        <a href="'.$block_link.'" class="btn-active">'.$get_it_now_caption.'</a>
                    </li>';
        }

        $compile.='</ul></div>';
        
        if($this->isInline()){

        $compile.='<script type="text/javascript">';
        $compile.='jQuery(document).ready(function($) {
                \'use strict\';
                var $'.$identifier.'=$(\'#'.$identifier.'\'),column=$'.$identifier.'.parents(\'.dt-pricing-table\').data(\'column\');
                $'.$identifier.'.removeClass(\'price-3-col price-4-col\').addClass(\'price-\'+column+\'-col\');
            });</script>'."\n";
        }

        return $compile;
    }
}

class WPBakeryShortCode_DT_Pricetable extends WPBakeryShortCodesContainer {


    protected function contentInline( $atts, $content = null ) {

         extract( shortcode_atts( array(
            'title'=>'',
            'table_column'=>'3',
            'body_back_color'=>'',
            'header_back_color'=>'',
            'evencell_back_color'=>'',
            'oddcell_back_color'=>''
        ), $atts ) );

        if (!$content) 
            return "";

        wp_enqueue_style( 'detheme-vc-front',DETHEME_VC_DIR_URL."lib/admin/css/admin.css?".time(),array());

        $compile = '<div class="dt-pricing-table '.$table_column.'-column" data-column="'.$table_column.'">'.do_shortcode($content).'</div>';
        return $compile;

    }

    function output($atts, $content = null, $base = '') {



    if($this->isInline()){
        return $this->contentInline($atts, $content);
    }

        $regexshortcodes=
        '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "(dt_pricetable_item)"                     // 2: Shortcode name
        . '(?![\\w-])'                       // Not followed by word character or hyphen
        . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
        .     ')*?'
        . ')'
        . '(?:'
        .     '(\\/)'                        // 4: Self closing tag ...
        .     '\\]'                          // ... and closing bracket
        . '|'
        .     '\\]'                          // Closing bracket
        .     '(?:'
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
        .         ')'
        .         '\\[\\/\\2\\]'             // Closing shortcode tag
        .     ')?'
        . ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]


    if(!preg_match_all( '/' . $regexshortcodes . '/s', $content, $matches, PREG_SET_ORDER ))
        return "";

    extract( shortcode_atts( array(
        'title'=>'',
        'table_column'=>'3',
        'body_back_color'=>'',
        'header_back_color'=>'',
        'evencell_back_color'=>'',
        'oddcell_back_color'=>''
    ), $atts ) );

    if(!is_admin()){

        wp_enqueue_style( 'detheme-vc');
    }

    $content=preg_replace('/\[dt_pricetable_item/','[dt_pricetable_item price_column="'.$table_column.'" body_back_color="'.$body_back_color.'" header_back_color="'.$header_back_color.'" evencell_back_color="'.$evencell_back_color.'" oddcell_back_color="'.$oddcell_back_color.'"', $content);

    $compile = '<div class="dt-pricing-table '.$table_column.'-column" data-column="'.$table_column.'">'.do_shortcode($content).'</div>';

    return $compile;

    }
}

vc_map( array( 
    'name' => __( 'Vertical Tab', 'detheme' ),
    'base' => 'dt_verticaltab',
    'as_parent' => array( 'only' => 'dt_verticaltab_item' ),
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    'js_view' => 'VcColumnView',
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows customizable vertical tab','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Module Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label' => true,
        'value' => __( 'Vertical Tab', 'detheme' ),
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Navigation Position', 'detheme' ),
        'param_name' => 'nav_position',
        'class' => '',
        'value'=>array(
            __('Left','detheme') => 'left',
            __('Right','detheme') => 'right'
            ),
        'description' => __( 'Navigation position', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
    )
 ) );


vc_map( array( 
    'name' => __( 'Tab Item', 'detheme' ),
    'base' => 'dt_verticaltab_item',
    'as_child' => array( 'only' => 'dt_verticaltab' ),
    'class' => '',
    'content_element' => true,
    'icon' => 'admin-icon-box',
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array(
        'heading' => __( 'Icon', 'detheme' ),
        'param_name' => 'icon_type',
        'class' => '',
        'value'=>'',
        'description' => __( 'Select the icon to be displayed by clicking the icon.', 'detheme' ),
        'type' => 'iconlists'
        ),
        array( 
        'heading' => __( 'Main Title', 'detheme' ),
        'param_name' => 'title',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Sub Title', 'detheme' ),
        'param_name' => 'sub_title',
        'value' => '',
        'type' => 'textarea'
         ),
        array( 
        'heading' => __( 'Content', 'detheme' ),
        'param_name' => 'content',
        'class' => '',
        'value' => '',
        'type' => 'textarea_html'
         )
        )
 ) );

class WPBakeryShortCode_DT_Verticaltab_Item extends WPBakeryShortCode {

    protected function contentInline( $atts, $content = null,$base = '' ) {

         extract( shortcode_atts( array(
            'title'=>'',
            'sub_title'=>'',
            'link'=>'',
            'icon_type'=>'',
            'active'=>false,
            'id'=>'vstabid_'.time()."_".rand(1,99)
        ), $atts ) );

         $compile='<li id="tab_'.$id.'" class="tab-item'.(($active)?" active":"").'">
                        <div class="vt_text">
                            <h2 class="vt_title"><a href="#'.$id.'" data-toggle="tab">'.$title.'</a></h2>
                            <p class="vt_description">'.$sub_title.'</p>
                        </div>
                        <div class="vt_icon">
                        <a href="#'.$id.'" data-toggle="tab"><i class="'.$icon_type.'"></i></a>
                        </div>
                        </li>';

            $cn_preview_item='<div id="'.$id.'" class="tab-pane fade'.(($active)?" in active":"").'">'.do_shortcode($content).'</div>';

            $compile.='<script type="text/javascript">
            jQuery(document).ready(function($){
                    var mytab=$(\'#tab_'.$id.'\'),tabcontainer=mytab.parents(\'.dt_vertical_tab\'),preview=tabcontainer.find(\'.tab-content\'),navtab=tabcontainer.find(\'.vertical-nav-tab\');
                    preview.append(\''.$cn_preview_item.'\');
                    var $activated=$(\'.vc-dt_verticaltab_item:first-child .tab-item\',navtab),activated_id=$activated.attr(\'id\');
                    $activated.addClass(\'active\');
                    if(activated_id){
                        $(\'.tab-pane\',preview).removeClass(\'in active\');
                        $(\'#\'+activated_id.replace(\'tab_\',\'\')+\'\').addClass(\'in active\');
                    }
                    
            });
            </script>';


        return $compile;

    }

    function output($atts, $content = null, $base = '') {

        if($this->isInline()){
            return $this->contentInline($atts, $content);
        }


         extract( shortcode_atts( array(
            'title'=>'',
            'sub_title'=>'',
            'link'=>'',
            'icon_type'=>'',
            'active'=>false,
            'id'=>'vstabid_'
        ), $atts ) );


        $compile='<li id="tab_'.$id.'"'.(($active)?" class=\"active\"":"").'>
                        <div class="vt_text">
                            <h2 class="vt_title"><a href="#'.$id.'" data-toggle="tab">'.$title.'</a></h2>
                            <p class="vt_description">'.$sub_title.'</p>
                        </div>
                        <div class="vt_icon">
                        <a href="#'.$id.'" data-toggle="tab"><i class="'.$icon_type.'"></i></a>
                        </div>
                        </li>';

        return $compile;

    }
} 

class WPBakeryShortCode_DT_Verticaltab extends WPBakeryShortCodesContainer {

    protected function contentInline( $atts, $content = null ) {

         extract( shortcode_atts( array(
            'nav_position' => 'left',
            'spy'=>'none',
            'scroll_delay'=>300,
        ), $atts ) );

        if (!$content) 
            return "";

        $leftspy=$rightspy="";
        $cn_list=$cn_preview=array();

        $dt_vsliderid=time()."_".rand(1,99);


         $compile='<div  class="dt_vertical_tab">'."\n";
        $compile.='<ul id="vstabid_'.$dt_vsliderid.'" class="nav nav-tabs vertical-nav-tab tab-'.$nav_position.'" '.$leftspy.'>'.
        do_shortcode($content).'
          </ul>'."\n".'<div class="tab-content vertical-tab-content tab-'.$nav_position.'" '.$rightspy.'>'.
          @implode("\n",$cn_preview).'</div>'."\n";
            
        $compile.='</div>';


//        $compile = '<div class="dt-timeline"><div class="liner">'.do_shortcode($content).'</div></div>';

        return $compile;

    }

    function output($atts, $content = null, $base = '') {



        if($this->isInline()){
            return $this->contentInline($atts, $content);
        }

        if(!has_shortcode($content,'dt_verticaltab_item'))
            return "";

        $regexshortcodes=
        '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "(dt_verticaltab_item)"                     // 2: Shortcode name
        . '(?![\\w-])'                       // Not followed by word character or hyphen
        . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
        .     ')*?'
        . ')'
        . '(?:'
        .     '(\\/)'                        // 4: Self closing tag ...
        .     '\\]'                          // ... and closing bracket
        . '|'
        .     '\\]'                          // Closing bracket
        .     '(?:'
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
        .         ')'
        .         '\\[\\/\\2\\]'             // Closing shortcode tag
        .     ')?'
        . ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]


        if(!preg_match_all( '/' . $regexshortcodes . '/s', $content, $matches, PREG_SET_ORDER ))
                return "";

        if(!is_admin()){

            wp_enqueue_script( 'bootstrap' , DETHEME_VC_DIR_URL.'js/bootstrap.js', array( 'jquery' ), '3.0', false );
            wp_register_script( 'bootstrap-tabcollapse', DETHEME_VC_DIR_URL . 'js/bootstrap-tabcollapse.js', array(), '1.0', false );
            wp_enqueue_script( 'bootstrap-tabcollapse');
            wp_enqueue_style('bootstrap-vc',DETHEME_VC_DIR_URL."css/bootstrap_vertical_tab.css",array());

        }

        extract( shortcode_atts( array(
            'nav_position' => 'left',
            'spy'=>'none',
            'scroll_delay'=>300,

        ), $atts ) );

         $leftspy="";
         $rightspy="";
         $spydly=$scroll_delay;

        if('none'!==$spy && !empty($spy)){


            wp_enqueue_style('scroll-spy');
            wp_enqueue_script('ScrollSpy');

            switch($spy){
                case 'uk-animation-slide-left':
                        $leftspy='data-uk-scrollspy="{cls:\''.$spy.'\',delay:'.($spydly+600).'}"';
                        $rightspy='data-uk-scrollspy="{cls:\'uk-animation-slide-right\',delay:'.$spydly.'}"';
                    break;
                case 'uk-animation-slide-right':
                       $leftspy='data-uk-scrollspy="{cls:\''.$spy.'\', delay:'.($spydly+600).'}"';
                       $rightspy='data-uk-scrollspy="{cls:\'uk-animation-slide-left\',delay:'.$spydly.'}"';
                    break;
                default:
                    $leftspy='data-uk-scrollspy="{cls:\''.$spy.'\',delay:'.$spydly.'}"';
                    $rightspy='data-uk-scrollspy="{cls:\''.$spy.'\', delay:'.$spydly.'}"';
                    break;
            }
        }



        $compile="";

        global $dt_vsliderid;
        $cn_list=array();
        $cn_preview=array();

       if(!isset($dt_vsliderid)){
            $dt_vsliderid=0;
        }

        $dt_vsliderid++;
        $itemnumber=0;


        foreach ($matches as $slideitem) {

            $slideitem[3].=($itemnumber==0)?" active=\"1\"":"";
            $slideitem[3].=" id=\"vstabid_".$dt_vsliderid.'_'.$itemnumber."\"";

            $cn_item=do_shortcode("[dt_verticaltab_item ".$slideitem[3]."]".$slideitem[5]."[/dt_verticaltab_item]");

            $cn_preview_item='<div id="vstabid_'.$dt_vsliderid.'_'.$itemnumber.'" class="tab-pane fade'.(($itemnumber==0)?" in active":"").'">'.do_shortcode($slideitem[5]).'</div>';

            array_push($cn_list, $cn_item);
            array_push($cn_preview, $cn_preview_item);

            $itemnumber++;

        }


         $compile='<div  class="dt_vertical_tab">'."\n";
        $compile.='<ul id="vstabid_'.$dt_vsliderid.'" class="nav nav-tabs vertical-nav-tab tab-'.$nav_position.'" '.$leftspy.'>'.@implode("\n",$cn_list).'
          </ul>'."\n".'<div class="tab-content vertical-tab-content tab-'.$nav_position.'" '.$rightspy.'>
                    '.@implode("\n",$cn_preview).'</div>'."\n";
            
        $compile.='</div>';

$compile.='<script type="text/javascript">
jQuery(document).ready(function($){
        $(\'#vstabid_'.$dt_vsliderid.'\').tabCollapse();
});
</script>';

  
        return $compile;




    }

}

vc_map( array( 
    'name' => __( 'Carousel', 'detheme' ),
    'base' => 'dt_carousel',
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    'js_view' => 'VcColumnView',
    "is_container" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows element in carousel','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Module Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label' => true,
        'value' => __( 'DT Carousel', 'detheme' ),
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Slide Speed', 'detheme' ),
        'param_name' => 'speed',
        'class' => '',
        'value' => '800',
        'description' => __( 'Slide speed (in millisecond). The lower value the faster slides', 'detheme' ),
        'type' => 'textfield'
         ),         
        array( 
        'heading' => __( 'Autoplay', 'detheme' ),
        'param_name' => 'autoplay',
        'description' => __( 'Set Autoplay', 'detheme' ),
        'class' => '',
        'std'=>'0',
        'value'=>array(
            __('Yes','detheme') => '1',
            __('No','detheme') => '0'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Slide Interval', 'detheme' ),
        'param_name' => 'interval',
        'class' => '',
        'value' => '1000',
        'description' => __( 'Slide Interval (in millisecond)', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'autoplay', 'value' => array( '1') )       
         ),         
        array( 
        'heading' => __( 'Pagination', 'detheme' ),
        'param_name' => 'pagination',
        'description' => __( 'Pagination Setting', 'detheme' ),
        'class' => '',
        'std'=>'1',
        'value'=>array(
            __('Show','detheme') => '1',
            __('Hidden','detheme') => '0'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Pagination Type', 'detheme' ),
        'param_name' => 'pagination_type',
        'description' => __( 'Pagination Type', 'detheme' ),
        'class' => '',
        'std'=>'bullet',
        'value'=>array(
            __('Standard','detheme') => 'bullet',
            __('Custom Image','detheme') => 'image',
            __('Custom Icon','detheme') => 'icon'
            ),
        'type' => 'dropdown',
        'dependency' => array( 'element' => 'pagination', 'value' => array( '1') )       
         ),     
        array( 
        'heading' => __( 'Color', 'detheme' ),
        'param_name' => 'pagination_color',
        'value' => '',
        'type' => 'colorpicker',
        'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'bullet') )       
         ),
        array( 
        'heading' => __( 'Pagination Preview', 'detheme' ),
        'param_name' => 'pagination_to_preview',
        'value' => '',
        'type' => 'carousel_preview',
        'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'bullet') )       
         ),
        array( 
        'heading' => __( 'Size', 'detheme' ),
        'param_name' => 'pagination_size',
        'params' => array('min'=>12,'max'=>50,'step'=>1),
        'type' => 'slider_value',
        'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'bullet') )       
         ),
        array( 
        'heading' => __( 'Pagination Image', 'detheme' ),
        'param_name' => 'pagination_image',
        'class' => '',
        'value' => '',
        'type' => 'attach_images',
        'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'image') )       
         ),
        array( 
        'heading' => __( 'Thumbnail Width ( in percent )', 'detheme' ),
        'param_name' => 'image_width',
        'class' => '',
        'value' => '',
        'type' => 'textfield',
        'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'image') )         
         ),         
        array(
        'heading' => __( 'Pagination Icon', 'detheme' ),
        'param_name' => 'pagination_icon',
        'class' => '',
        'value'=>'',
        'description' => __( 'The icon you want as pagination', 'detheme' ),
        'type' => 'iconlists_multi',
        'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'icon') )       
        ),
        array( 
        'heading' => __( 'Number of Columns', 'detheme' ),
        'param_name' => 'column',
        'description' => __( 'Number of columns on screen larger than 1200px screen resolution', 'detheme' ),
        'class' => '',
        'value'=>array(
            __('One Column','detheme') => '1',
            __('Two Columns','detheme') => '2',
            __('Three Columns','detheme') => '3',
            __('Four Columns','detheme') => '4'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Desktop Column', 'detheme' ),
        'param_name' => 'desktop_column',
        'description' => __( 'items between 1200px and 1023px', 'detheme' ),
        'class' => '',
        'value'=>array(
            __('One Column','detheme') => '1',
            __('Two Columns','detheme') => '2',
            __('Three Columns','detheme') => '3',
            __('Four Columns','detheme') => '4'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Desktop Small Column', 'detheme' ),
        'param_name' => 'small_column',
        'description' => __( 'items between 1024px and 768px', 'detheme' ),
        'class' => '',
        'value'=>array(
            __('One Column','detheme') => '1',
            __('Two Columns','detheme') => '2',
            __('Three Columns','detheme') => '3',
            __('Four Columns','detheme') => '4'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Tablet Column', 'detheme' ),
        'param_name' => 'tablet_column',
        'description' => __( 'items between 768px and 600px', 'detheme' ),
        'class' => '',
        'value'=>array(
            __('One Column','detheme') => '1',
            __('Two Columns','detheme') => '2',
            __('Three Columns','detheme') => '3',
            __('Four Columns','detheme') => '4'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Mobile Column', 'detheme' ),
        'param_name' => 'mobile_column',
        'description' => __( 'items below 600px', 'detheme' ),
        'class' => '',
        'value'=>array(
            __('One Column','detheme') => '1',
            __('Two Columns','detheme') => '2',
            __('Three Columns','detheme') => '3',
            __('Four Columns','detheme') => '4'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
    )

 ) );

class WPBakeryShortCode_DT_Carousel extends WPBakeryShortCodesContainer {

    function output($atts, $content = null, $base = '') {

        extract( shortcode_atts( array(
            'spy'=>'none',
            'scroll_delay'=>300,
            'pagination' => 1,
            'speed'=>800,
            'column'=>1,
            'desktop_column'=>1,
            'small_column'=>1,
            'tablet_column'=>1,
            'mobile_column'=>1,
            'pagination_type'=>'bullet',
            'pagination_image'=>null,
            'pagination_icon'=>null,
            'pagination_color'=>'',
            'pagination_size'=>'',
            'autoplay'=>0,
            'image_width'=>'',
            'interval'=>1000,
        ), $atts ) );

        global $dt_carousel;

        if(!isset($dt_carousel))
                $dt_carousel=0;

        $dt_carousel++;

        $pattern = get_shortcode_regex();

        if(!preg_match_all( '/' . $pattern . '/s', $content, $matches, PREG_SET_ORDER ))
            return "";

        wp_register_style('owl.carousel',DETHEME_VC_DIR_URL."css/owl.carousel.css",array());
        wp_enqueue_style('owl.carousel');


        wp_register_script( 'owl.carousel', DETHEME_VC_DIR_URL . 'js/owl.carousel.js', array('jquery'), '', false );
        wp_enqueue_script('owl.carousel');



        $widgetID="dt_carousel".$dt_carousel;
        $spydly=0;
        $i=0;
        $paginationthumb=array();

        if('none'!==$spy && !empty($spy)){

            wp_enqueue_style('scroll-spy');
            wp_enqueue_script('ScrollSpy');
        }


        $compile='<div class="owl-carousel-container" dir="ltr"><div class="owl-carousel" id="'.$widgetID.'">';

        if($pagination_image){
            $pagination_thumb=@explode(',',$pagination_image);
        }
        if($pagination_icon){
            $pagination_icons=@explode(',',$pagination_icon);
        }

        foreach ($matches as $key => $matche) {


             $scollspy="";

            if('none'!==$spy && !empty($spy) && $i < $column){

                $spydly=$spydly+(int)$scroll_delay;
                $scollspy=' data-uk-scrollspy="{cls:\''.$spy.'\', delay:'.$spydly.'}"';
            }

            $compile.='<div class="owl-slide"'.$scollspy.'>'.do_shortcode($matche[0]).'</div>';
            $i++;

            if($pagination_type!=='bullet' && $pagination){

                 $thumb="";
                if($pagination_type=='image' && !empty($pagination_thumb[$key])){

                    if(!empty($pagination_thumb[$key])){

                        $image =apply_filters('dt_carousel_pagination_image',wp_get_attachment_image_src($pagination_thumb[$key]),$pagination_thumb[$key]); 
                        $thumb="<img src=\"".$image[0]."\" alt=\"\">";

                    }
                }
                elseif($pagination_type=='icon' && !empty($pagination_icons[$key])){
                    $thumb="<i class=\"".$pagination_icons[$key]."\" ></i>";
                }
                else{

                    $thumb="<span class=\"default-owl-page\">".($key+1)."</span>";

                }

                $paginationthumb[$key]="<span class=\"owl-page\">".$thumb."</span>";
            }
        }

        $compile.='</div>';

        if($pagination && $pagination_type=='bullet' && $pagination_color!==''){

            $compile.="<style type=\"text/css\">#$widgetID .owl-page span{background-color:$pagination_color;border-color:$pagination_color".($pagination_size!==''?";width:".$pagination_size."px;height:".$pagination_size."px;border-radius:50%":"")."}</style>";
        }

        if(count($paginationthumb)){

            $compile.='<div class="owl-custom-pagination">'.@implode(' ',$paginationthumb).'</div>';

        }

        $image_width=intVal($image_width);

        $compile.='</div>';

        $script='<script type="text/javascript">'."\n".'jQuery(document).ready(function($) {
            \'use strict\';'."\n".'
            var '.$widgetID.' = jQuery("#'.$widgetID.'");
            try{
           '.$widgetID.'.owlCarousel({
                items       : '.$column.', 
                itemsDesktop    : [1200,'.$desktop_column.'], 
                itemsDesktopSmall : [1023,'.$small_column.'], // 3 items betweem 900px and 601px
                itemsTablet : [768,'.$tablet_column.'], //2 items between 600 and 0;
                itemsMobile : [600,'.$mobile_column.'], // itemsMobile disabled - inherit from itemsTablet option
                pagination  : '.(($pagination && $pagination_type=='bullet')?"true":"false").",".($autoplay?'autoPlay:'.($speed+$interval).',':'')."
                slideSpeed  : ".$speed.",paginationSpeed  : ".$speed.",rewindSpeed  : ".$speed.",";

      if(count($paginationthumb) && $pagination_type!=='bullet'){
                $script.='afterInit:function(el){
                  var $base=el,perpage=this.options.items,btn,currentBtn=1;
                  btn=Math.ceil(this.itemsAmount/perpage);
                  currentBtn=$(this.$owlItems[this.currentItem]).data("owl-roundPages");

                  $(\'.owl-custom-pagination .owl-page\',$base.parent()).each(function(i,el){

                          '.($image_width?'$(this).width(\''.$image_width.'%\');':'').'
                          if(i >= btn ){$(el).hide();}  else{ $(el).show();}

                          if(i === currentBtn - 1 ){
                            $(this).closest(\'.owl-custom-pagination\').find(\'.owl-page\').removeClass(\'active\');
                            $(this).addClass(\'active\');
                          }
                          $(el).click(function(){
                              $(\'.owl-custom-pagination .owl-page\',$base.parent()).removeClass(\'active\');
                              $(this).addClass(\'active\');
                              $base.trigger(\'owl.goTo\',(i*perpage));
                          });
                     });
                },
                afterUpdate:function(el){
                  var $base=el,perpage=this.options.items,btn,currentBtn=1;
                  btn=Math.ceil(this.itemsAmount/perpage);

                  currentBtn=$(this.$owlItems[this.currentItem]).data("owl-roundPages");

                  $(\'.owl-custom-pagination .owl-page\',$base.parent()).each(function(i,el){

                          if(i >= btn ){$(el).hide();}  else{ $(el).show();}

                          if(i === currentBtn - 1 ){
                            $(this).closest(\'.owl-custom-pagination\').find(\'.owl-page\').removeClass(\'active\');
                            $(this).addClass(\'active\');
                          }

                          $(el).click(function(){
                              $(\'.owl-custom-pagination .owl-page\',$base.parent()).removeClass(\'active\');
                              $(this).addClass(\'active\');
                              $base.trigger(\'owl.goTo\',(i*perpage));
                          });
                     });
                }';

}

$script.='});';
$script.='}
            catch(err){}
        });</script>';

        return $compile.$script;
    }
}


vc_map( array( 
    'name' => __( 'Custom Team Item', 'detheme' ),
    'base' => 'dt_team_custom_item',
    'class' => '',
    'icon' => 'admin-icon-box',
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows team description','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Main Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label'=>true,
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Sub Title', 'detheme' ),
        'param_name' => 'sub_title',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Description', 'detheme' ),
        'param_name' => 'text',
        'value' => '',
        'type' => 'textarea'
         ),
        array( 
        'heading' => __( 'Image', 'detheme' ),
        'param_name' => 'image_url',
        'class' => '',
        'value' => '',
        'type' => 'attach_image'
         ),
        array( 
        'heading' => __( 'Social Link', 'detheme' ),
        'param_name' => 'social_link',
        'value'=>array(__('Show','detheme')=>'show',__('Hide','detheme')=>''),
        'type' => 'dropdown'
         ),
        array( 
        'heading' => '',
        'param_name' => 'facebook',
        'class' => 'fontelloicon-facebook',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => '',
        'param_name' => 'twitter',
        'class' => 'fontelloicon-twitter-5',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => '',
        'param_name' => 'gplus',
        'class' => 'fontelloicon-gplus',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => '',
        'param_name' => 'pinterest',
        'class' => 'fontelloicon-pinterest-2',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => '',
        'param_name' => 'linkedin',
        'class' => 'fontelloicon-linkedin-5',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => '',
        'param_name' => 'website',
        'class' => 'fontelloicon-globe',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => '',
        'param_name' => 'email',
        'class' => 'fontelloicon-mail-alt',
        'value' => '',
        'type' => 'iconfield',
        'dependency' => array( 'element' => 'social_link','value'=>array('show'))       
         ),
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
        )
 ) );


vc_map( array( 
    'name' => __( 'Timeline', 'detheme' ),
    'base' => 'dt_timeline',
    'as_parent' => array( 'only' => 'dt_timeline_item,dt_timeline_sep'),
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    'js_view' => 'VcColumnView',
    "show_settings_on_create" => false,
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows element in timeline view','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Module Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label' => true,
        'value' => __( 'Timeline', 'detheme' ),
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
    )

 ) );

vc_map( array( 
    'name' => __( 'Timeline Item', 'detheme' ),
    'base' => 'dt_timeline_item',
    'as_child' => array( 'only' => 'dt_timeline' ),
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    "show_settings_on_create" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Layout type', 'detheme' ),
        'param_name' => 'position',
        'param_holder_class'=>'item-position',
        'admin_label'=>true,
        'value' => array(
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/timeline-left.png" alt="'.__( 'Left', 'detheme' ).'" />' => 'left',
            '<img src="'.DETHEME_VC_DIR_URL.'lib/admin/images/timeline-right.png" alt="'.__( 'Right', 'detheme' ).'"/>' => 'right',
            ),
        'type' => 'select_layout',
        'std'=>'left'
         ),
        array(
        'heading' => __( 'Icon Box Style', 'detheme' ),
        'param_name' => 'icon_box',
        'class' => '',
        'value'=>array(
            'square'=>__('Square','detheme'),
            'circle'=>__('Circle','detheme'),
            ),
        'std'=>'square',
        'type' => 'radio'
        ),
        array(
        'heading' => __( 'Icon', 'detheme' ),
        'param_name' => 'icon_type',
        'class' => '',
        'value'=>'',
        'description' => __( 'Select the icon to be displayed by clicking the icon.', 'detheme' ),
        'type' => 'iconlists'
        ),
        array( 
        'heading' => __( 'Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label'=>true,
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Text', 'detheme' ),
        'param_name' => 'content',
        'value' => '',
        'type' => 'textarea_html'
         ),
    )

 ) );

vc_map( array( 
    'name' => __( 'Timeline Separator', 'detheme' ),
    'base' => 'dt_timeline_sep',
    'as_child' => array( 'only' => 'dt_timeline' ),
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    "show_settings_on_create" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Content', 'detheme' ),
        'param_name' => 'content',
        'value' => '',
        'type' => 'textarea'
         ),
    )

 ) );

class WPBakeryShortCode_DT_Timeline_Sep extends WPBakeryShortCode {

    protected function contentInline( $atts, $content = null ) {


        $compile='<div class="time-separator">'.do_shortcode($content).'</div>';

        return $compile;

    }

    function output($atts, $content = null, $base = ''){

        if($this->isInline()){
            return $this->contentInline($atts, $content);
        }

        return do_shortcode($content);
    }

}
class WPBakeryShortCode_DT_Timeline_Item extends WPBakeryShortCode {

    protected function contentInline( $atts, $content = null ) {

        extract(shortcode_atts(array(
            'title' => '',
            'text' => '',
            'icon_type'=>'',
            'position'=>'left',
            'icon_box'=>'square'
        ), $atts));

        $text=(empty($content) && !empty($text))?$text:$content;

        $compile='<div class="time-item '.$position.'"><div class="center-line '.$icon_box.'"><i class="'.$icon_type.'"></i></div>
                <div class="content-line">'.(($title!=='')?'<h2>'.$title.'</h2>':"").((!empty($text))?'<div class="content-text">'.do_shortcode($text).'</div>':'').'</div></div>';

        return $compile;

    }

    function output($atts, $content = null, $base = ''){

        if($this->isInline()){
            return $this->contentInline($atts, $content);
        }

        extract(shortcode_atts(array(
            'title' => '',
            'text' => '',
            'icon_type'=>'',
            'icon_box'=>'square'
        ), $atts));

        $text=(empty($content) && !empty($text))?$text:$content;

        $compile='<div class="center-line '.$icon_box.'"><i class="'.$icon_type.'"></i></div>
                <div class="content-line">'.(($title!=='')?'<h2>'.$title.'</h2>':"").((!empty($text))?'<div class="content-text">'.do_shortcode($text).'</div>':'').'</div>';
        return $compile;
    }
}



class WPBakeryShortCode_DT_Timeline extends WPBakeryShortCodesContainer {

    protected function contentInline( $atts, $content = null ) {

         extract( shortcode_atts( array(
            'spy'=>'none',
            'scroll_delay'=>300,
        ), $atts ) );

        if (!$content) 
            return "";

        $compile = '<div class="dt-timeline"><div class="liner">'.do_shortcode($content).'</div></div>';

        return $compile;

    }

    function output($atts, $content = null, $base = '') {


        if($this->isInline()){
            return $this->contentInline($atts, $content);
        }

        $regexshortcodes=
        '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "(dt_timeline_item|dt_timeline_sep)"                     // 2: Shortcode name
        . '(?![\\w-])'                       // Not followed by word character or hyphen
        . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
        .     ')*?'
        . ')'
        . '(?:'
        .     '(\\/)'                        // 4: Self closing tag ...
        .     '\\]'                          // ... and closing bracket
        . '|'
        .     '\\]'                          // Closing bracket
        .     '(?:'
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
        .         ')'
        .         '\\[\\/\\2\\]'             // Closing shortcode tag
        .     ')?'
        . ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]


        if(!preg_match_all( '/' . $regexshortcodes . '/s', $content, $matches, PREG_SET_ORDER ))
                return "";


        extract( shortcode_atts( array(
            'spy'=>'none',
            'scroll_delay'=>300,
        ), $atts ) );



        if(!is_array($matches) || !count($matches))
                return "";


        wp_enqueue_style('detheme-vc');
        wp_enqueue_style('scroll-spy');

        wp_enqueue_script('ScrollSpy');

        $compile='<div class="dt-timeline"><div class="liner">';

        $spydly=0;
        $scollspy="";

        foreach ($matches as $timelineitem) {

            $spydly=$spydly+(int)$scroll_delay;

            if('none'!==$spy && !empty($spy)){

                    $scollspy='data-uk-scrollspy="{cls:\''.$spy.'\', delay:'.$spydly.'}"';
            }

            if($timelineitem[2]=='dt_timeline_item'):

                $param=shortcode_atts(array(
                'title' => '',
                'text' => '',
                'icon_type'=>'',
                'position'=>'left'
                ), shortcode_parse_atts($timelineitem[3]));

                $timelineitemcontent='<div class="time-item '.$param['position'].'" '.$scollspy.'>'.do_shortcode($timelineitem[0]).'</div>';

            else:
                $timelineitemcontent='<div class="time-separator" '.$scollspy.'>'.do_shortcode($timelineitem[0]).'</div>';
            endif;

           $compile.=$timelineitemcontent;

        }

        $compile.="</div></div>";

        return "<!--- start timeline -->".$compile."<!--- end timeline -->";

    }
}



//DT Progress Bar

vc_map( array( 
    'name' => __( 'Progress Bar Item', 'detheme' ),
    'base' => 'dt_progressbar_item',
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    "show_settings_on_create" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows the progress bar','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array(
        'heading' => __( 'Icon', 'detheme' ),
        'param_name' => 'icon_type',
        'class' => '',
        'value'=>'',
        'description' => __( 'Select the icon to be displayed by clicking the icon.', 'detheme' ),
        'type' => 'iconlists'
        ),
        array( 
        'heading' => __( 'Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label'=>true,
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Value', 'detheme' ),
        'param_name' => 'value',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Units', 'detheme' ),
        'param_name' => 'unit',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Bar Color', 'detheme' ),
        'param_name' => 'color',
        'value' => '#90d5e5',
        'type' => 'colorpicker'
         ),
        array( 
        'heading' => __( 'Background Color', 'detheme' ),
        'param_name' => 'bg',
        'value' => '',
        'type' => 'colorpicker'
         ),
    )

 ) );

class WPBakeryShortCode_dt_progressbar_item extends WPBakeryShortCode {

    function output($atts, $content = null, $base = ''){

  if(is_admin()){

    }else{
        wp_register_script('jquery.appear',DETHEME_VC_DIR_URL."js/jquery.appear.js",array());
        wp_register_script('jquery.counto',DETHEME_VC_DIR_URL."js/jquery.counto.js",array());
        wp_register_script('dt-chart',DETHEME_VC_DIR_URL."js/chart.js",array('jquery.appear','jquery.counto'));
        wp_enqueue_script('dt-chart');
    }
    
    extract( shortcode_atts( array(
        'title'=>''
    ), $atts ) );

    if (!isset($compile)) {$compile='';}

    extract(shortcode_atts(array(

        'icon_type' => '',
        'width' => '',
        'title' => '',
        'unit' => '',
        'color'=>'#1abc9c',
        'bg'=>'#ecf0f1',
        'value' => '10',

    ), $atts));


    if(vc_is_inline()){

        $id="bar_".time()."_".rand(1,99);
    }

    $compile.='<div '.((vc_is_inline())?"id=\"".$id."\" ":"").'class=\'progress_bar\'>
                            <i class="'.$icon_type.'"></i>
                            <div class="progress_info">
                            <h4 class=\'progress_title\'>'.$title.'</h4>
                            <span class=\'progress_number\''.((vc_is_inline())?' style="opacity:1;"':"").'><span>'.$value.'</span></span><span class="progres-unit">'.$unit.'</span>
                            </div>
                            <div '.((vc_is_inline())?'style="background:'.$bg.';"  ':"").'class=\'progress_content_outer\'>
                                <div data-percentage=\''.$value.'\' '.((vc_is_inline())?'style="background:'.$color.';width:'.$value.'%"  ':"").'data-active="'.$color.'" data-nonactive="'.$bg.'" class=\'progress_content\'></div>
                           </div>
                </div>';


    $compile = "<div class='progress_bars'>".$compile."</div>";

    return $compile;
    }
}


//DT Circle Bar


vc_map( array( 
    'name' => __( 'Circle Bar', 'detheme' ),
    'base' => 'dt_circlebar_item',
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    "show_settings_on_create" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows the circle bar','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label'=>true,
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Value', 'detheme' ),
        'param_name' => 'value',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Units', 'detheme' ),
        'param_name' => 'unit',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Bar Width', 'detheme' ),
        'param_name' => 'size',
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Bar Color', 'detheme' ),
        'param_name' => 'color',
        'value' => '#90d5e5',
        'type' => 'colorpicker'
         ),
        array( 
        'heading' => __( 'Background Color', 'detheme' ),
        'param_name' => 'bg',
        'value' => '',
        'type' => 'colorpicker'
         ),
    )

 ) );

vc_map( array( 
    'name' => __('DT Twitter Slider','detheme'),
    'base' => 'dt_twitter_slider',
    'class' => '',
    'content_element' => true,
    'icon' => 'admin-icon-box',
    'category' => __( 'deTheme', 'detheme' ),
    'description'=>__('Shows tweets from twitter account','detheme'),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Twitter Account:','detheme' ),
        'param_name' => 'twitteraccount',
        'value' => '',
        'type' => 'textfield',
        'std'=>'detheme'
         ),
        array( 
        'heading' => __( 'Number of tweets to show:','detheme' ),
        'param_name' => 'numberoftweets',
        'value' => '',
        'type' => 'textfield',
        'std'=>4
         ),
        array( 
        'heading' => __( 'Date Format:','detheme' ),
        'param_name' => 'dateformat',
        'description'=>__('%d : day, %m: month in number, %b: textual month abbreviation, %B: textual month, %y: 2 digit year, %Y: 4 digit year','detheme'),
        'value' => '',
        'type' => 'textfield',
        'std'=>'%b. %d, %Y'
         ),
        array( 
        'heading' => __( 'Template :','detheme' ),
        'param_name' => 'twittertemplate',
        'value' => '',
        'std'=>'{{date}}<br />{{tweet}}',
        'type' => 'textarea',
        'description'=>__('{{date}}: Post Date, {{tweet}}: tweet text','detheme')
         ),
        array( 
        'heading' => __( 'Auto Play:','detheme' ),
        'param_name' => 'isautoplay',
        'description' => __( 'Set Autoplay', 'detheme' ),
        'class' => '',
        'std'=>'1',
        'value'=>array(
            __('Yes','detheme') => '1',
            __('No','detheme') => '0'
            ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Transition Threshold (msec):','detheme' ),
        'param_name' => 'transitionthreshold',
        'class' => '',
        'value' => '500',
        'description' => __( 'Slide speed (in millisecond). The lower value the faster slides', 'detheme' ),
        'type' => 'textfield'
         ),         
        )
 ) );

$font_formats=array(
        "Andale Mono"=>"andale mono,times",
        "Arial"=>"arial,helvetica,sans-serif",
        "Arial Black"=>"arial black,avant garde",
        "Book Antiqua"=>"book antiqua,palatino",
        "Comic Sans MS"=>"comic sans ms,sans-serif",
        "Courier New"=>"courier new,courier",
        "Georgia"=>"georgia,palatino",
        "Helvetica"=>"helvetica",
        "Impact"=>"impact,chicago",
        "Symbol"=>"symbol",
        "Tahoma"=>"tahoma,arial,helvetica,sans-serif",
        "Terminal"=>"terminal,monaco",
        "Times New Roman"=>"times new roman,times",
        "Trebuchet MS"=>"trebuchet ms,geneva",
        "Verdana"=>"verdana,geneva",
        "Webdings"=>"webdings",
        "Wingdings"=>"wingdings,zapf dingbats"
);

$font_formats=array(__('Default','detheme')=>'');

$fonts=@explode(";","Droid Sans;Open Sans;Tangerine;Josefin Slab;Arvo;Lato;Vollkorn;Abril Fatface;Ubuntu;PT Sans;PT Serif;Old Standard TT");
foreach ($fonts as $value) {

    $value=trim($value);
    $font_formats[$value]=$value;
}
@ksort($font_formats);
$font_formats= array_merge(array(__('Default','detheme')=>''),$font_formats);

// DT Partner

vc_map( array( 
    'name' => __( 'Partner Item', 'detheme' ),
    'base' => 'dt_partner_item',
    'as_child' => array( 'only' => 'dt_partner' ),
    'class' => '',
    'controls' => 'full',
    "is_container" => false,
    'icon' => 'admin-icon-box',
    "show_settings_on_create" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
    'params' => array(
        array( 
        'heading' => __( 'Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label'=>true,
        'value' => '',
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Image/Logo', 'detheme' ),
        'param_name' => 'image_url',
        'class' => '',
        'value' => '',
        'type' => 'attach_image'
         ),
        array( 
        'heading' => __( 'Website', 'detheme' ),
        'param_name' => 'website',
        'value' => '',
        'type' => 'textfield'
         )
    )

 ) );

vc_map( array( 
    'name' => __( 'Partner', 'detheme' ),
    'base' => 'dt_partner',
    'as_parent' => array( 'only' => 'dt_partner_item' ),
    'description'=>__('Shows the detail of partners','detheme'),
    'class' => '',
    'controls' => 'full',
    "is_container" => true,
    'icon' => 'admin-icon-box',
    'js_view' => 'VcColumnView',
    "show_settings_on_create" => false,
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(
        DETHEME_VC_DIR_URL . 'css/fontello.css',
        DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'
        ),
    'params' => array(
        array( 
        'heading' => __( 'Module Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label' => true,
        'value' => __( 'Partner', 'detheme' ),
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Number of Columns', 'detheme' ),
        'param_name' => 'column',
        'description' => __( 'Number of columns on screen larger than 1200px screen resolution', 'detheme' ),
        'class' => '',
        'value'=>array(
            __('One Column','detheme') => '1',
            __('Two Columns','detheme') => '2',
            __('Three Columns','detheme') => '3',
            __('Four Columns','detheme') => '4',
            __('Six Columns','detheme') => '6'
            ),
        'type' => 'dropdown',
        'std'=>'4'
         ),     
        array( 
        'heading' => __( 'Animation Type', 'detheme' ),
        'param_name' => 'spy',
        'class' => '',
        'value' => 
         array(
            __('Scroll Spy not activated','detheme') =>'none',
            __('The element fades in','detheme') => 'uk-animation-fade',
            __('The element scales up','detheme') => 'uk-animation-scale-up',
            __('The element scales down','detheme') => 'uk-animation-scale-down',
            __('The element slides in from the top','detheme') => 'uk-animation-slide-top',
            __('The element slides in from the bottom','detheme') => 'uk-animation-slide-bottom',
            __('The element slides in from the left','detheme') => 'uk-animation-slide-left',
            __('The element slides in from the right.','detheme') =>'uk-animation-slide-right',
         ),        
        'description' => __( 'Scroll spy effects', 'detheme' ),
        'type' => 'dropdown',
         ),     
        array( 
        'heading' => __( 'Animation Delay', 'detheme' ),
        'param_name' => 'scroll_delay',
        'class' => '',
        'value' => '300',
        'description' => __( 'The number of delay the animation effect of the icon. in milisecond', 'detheme' ),
        'type' => 'textfield',
        'dependency' => array( 'element' => 'spy', 'value' => array( 'uk-animation-fade', 'uk-animation-scale-up', 'uk-animation-scale-down', 'uk-animation-slide-top', 'uk-animation-slide-bottom', 'uk-animation-slide-left', 'uk-animation-slide-right') )       
         ),     
    )

 ) );



class WPBakeryShortCode_DT_Partner_Item extends WPBakeryShortCode {

    function output($atts, $content = null, $base = ''){

       extract(shortcode_atts(array(
            'title' => '',
            'image_url' => '',
            'website' => '',
        ), $atts));

        $compile="";

        if(empty($image_url)) return $compile;

        $alt_image = get_post_meta($image_url, '_wp_attachment_image_alt', true);
        $image = wp_get_attachment_image_src($image_url,'full',false); 
        $image_url=$image[0];


        $compile.=(''!=$website?"<a href=\"".esc_url($website)."\">":"")."<img src=\"".esc_url($image_url)."\" alt=\"".esc_attr($alt_image)."\"/>".(''!=$website?"</a>":"");

       return $compile;

    }
}

class WPBakeryShortCode_DT_Partner extends WPBakeryShortCodesContainer {


    protected function contentInline( $atts, $content = null ) {

         extract( shortcode_atts( array(
            'spy'=>'none',
            'scroll_delay'=>300,
            'column'=>'4'
        ), $atts ) );

         if (!$content) 
            return "";


        $compile="";

        $regexshortcodes=
        '(<div([^>]*)vc-element([^>]*)>)([^vc-element].*?)(<\/div>)'; 


        if(!preg_match_all( '/' . $regexshortcodes . '/s', $content, $matches, PREG_SET_ORDER ))
                return "";

        if(!is_array($matches) || !count($matches))
                return "";

        $compile='[vc_container_anchor]<div class="dt-partner">';

        $spydly=0;
        $scollspy="";
        $class='partner-item ';

        switch ($column) {
              case 2:
                    $class.='col-md-6 col-sm-6 col-xs-6';
                break;
              case 3:
                    $class.='col-md-4 col-sm-6 col-xs-6';
                break;
              case 4:
                    $class.='col-lg-3 col-md-4 col-sm-6 col-xs-6';
                break;
              case 6:
                    $class.='col-lg-2 col-md-3 col-sm-6 col-xs-6';
                break;
              case 1:
              default:
                    $class.='col-sm-12';
                break;
        }

        foreach ($matches as $partneritem) {

            $spydly=$spydly+(int)$scroll_delay;

           if('none'!==$spy && !empty($spy)){

                $scollspy='data-uk-scrollspy="{cls:\''.$spy.'\', delay:'.$spydly.'}"';
            }

           $compile.=$partneritem[1].'<div class="border-right '.$class.'" '.$scollspy.'>'.$partneritem[4].'</div></div>';

        }


         if(count($matches) % $column){
           $compile.=str_repeat("<div class=\"dummy ".$class."\"></div>",$column - (count($matches) % $column));
         }


        $compile.="</div>";

        return "<!--- start partner -->".$compile."<!--- end partner -->";

        }

        function output($atts, $content = null, $base = '') {

        if($this->isInline()){
            return $this->contentInline($atts, $content);
        }


        $regexshortcodes=
        '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "(dt_partner_item)"                     // 2: Shortcode name
        . '(?![\\w-])'                       // Not followed by word character or hyphen
        . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
        .     ')*?'
        . ')'
        . '(?:'
        .     '(\\/)'                        // 4: Self closing tag ...
        .     '\\]'                          // ... and closing bracket
        . '|'
        .     '\\]'                          // Closing bracket
        .     '(?:'
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
        .         ')'
        .         '\\[\\/\\2\\]'             // Closing shortcode tag
        .     ')?'
        . ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]


        if(!preg_match_all( '/' . $regexshortcodes . '/s', $content, $matches, PREG_SET_ORDER ))
                return "";


        extract( shortcode_atts( array(
            'spy'=>'none',
            'scroll_delay'=>300,
            'column'=>'4'
        ), $atts ) );


        if(!is_array($matches) || !count($matches))
                return "";


        wp_enqueue_style('detheme-vc');
        wp_enqueue_style('scroll-spy');

        wp_enqueue_script('ScrollSpy');

        $compile='<div class="dt-partner">';

        $spydly=0;
        $scollspy="";

         $class='partner-item ';

        switch ($column) {
              case 2:
                    $class.='col-md-6 col-sm-6 col-xs-6';
                break;
              case 3:
                    $class.='col-md-4 col-sm-6 col-xs-6';
                break;
              case 4:
                    $class.='col-lg-3 col-md-4 col-sm-6 col-xs-6';
                break;
              case 6:
                    $class.='col-lg-2 col-md-3 col-sm-6 col-xs-6';
                break;
              case 1:
              default:
                    $class.='col-sm-12';
                break;
        }

        foreach ($matches as $partneritem) {

            $spydly=$spydly+(int)$scroll_delay;

           if('none'!==$spy && !empty($spy)){

                $scollspy='data-uk-scrollspy="{cls:\''.$spy.'\', delay:'.$spydly.'}"';
            }

           $compile.='<div class="border-right '.$class.'" '.$scollspy.'>'.do_shortcode($partneritem[0]).'</div>';

        }


         if(count($matches) % $column){
           $compile.=str_repeat("<div class=\"dummy ".$class."\"></div>",$column - (count($matches) % $column));
         }


        $compile.="</div>";

        return "<!--- start partner -->".$compile."<!--- end partner -->";

    }
}


vc_map( array( 
    'name' => __( 'Google Map', 'detheme' ),
    'base' => 'dt_map',
    'description'=>__('Shows the google map','detheme'),
    'class' => '',
    'controls' => 'full',
    'icon' => 'admin-icon-box',
    "show_settings_on_create" => true,
    'category' => __( 'deTheme', 'detheme' ),
    'admin_enqueue_css' =>array(
        DETHEME_VC_DIR_URL . 'css/fontello.css',
        DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'
        ),
    'params' => array(
        array( 
        'heading' => __( 'Module Title', 'detheme' ),
        'param_name' => 'title',
        'admin_label' => true,
        'value' => __( 'Google Map', 'detheme' ),
        'type' => 'textfield'
         ),
        array( 
        'heading' => __( 'Latitude', 'detheme' ),
        'param_name' => 'lat',
        'param_holder_class'=>'latitude-label',
        'description' => __( 'put your latitude coordinate your location, ex: -7.2852292', 'detheme' ),
        'class' => '',
        'value'=>'-7.2852292',
        'type' => 'textfield',
        'std'=>'-7.2852292'
         ),     
        array( 
        'heading' => __( 'Longitude', 'detheme' ),
        'param_name' => 'lang',
        'param_holder_class'=>'longitude-label',
        'description' => __( 'put your longitude coordinate your location, ex: 112.6809869', 'detheme' ),
        'class' => '',
        'value'=>'112.6809869',
        'type' => 'textfield',
        'std'=>'112.6809869'
         ),     
        array( 
        'heading' => __( 'Zoom Level', 'detheme' ),
        'param_name' => 'zoom',
        'param_holder_class'=>'zoom-label',
        'description' => __( 'zoom level ypur map, higher value present more detail.', 'detheme' ),
        'class' => '',
        'value'=>array(7,8,9,10,11,12,13,14,15,16,17,18,19,20,21),
        'type' => 'dropdown',
        'std'=>'15'
         ),     
        array( 
        'param_name' => 'devider',
        'type' => 'devider'
         ),     
        array( 
        'heading' => __( 'Zoom Control', 'detheme' ),
        'param_name' => 'zoomcontrol',
        'param_holder_class'=>'zoom-control-label',
        'description' => __( 'Show/hide zoom control', 'detheme' ),
        'class' => '',
        'value'=>array(1=>__('Show','detheme'),0=>__('Hidden','detheme')),
        'type' => 'radio',
        'std'=>'1'
         ),     
        array( 
        'heading' => __( 'Pan Control', 'detheme' ),
        'param_name' => 'pancontrol',
        'param_holder_class'=>'pan-control-label',
        'description' => __( 'Show/hide pan control', 'detheme' ),
        'class' => '',
        'value'=>array(1=>__('Show','detheme'),0=>__('Hidden','detheme')),
        'type' => 'radio',
        'std'=>'1'
         ),     
        array( 
        'heading' => __( 'Street View Control', 'detheme' ),
        'param_name' => 'streetcontrol',
        'param_holder_class'=>'street-control-label',
        'description' => __( 'Show/hide street view control', 'detheme' ),
        'class' => '',
        'value'=>array(1=>__('Show','detheme'),0=>__('Hidden','detheme')),
        'type' => 'radio',
        'std'=>'1'
         ),     
        array( 
        'heading' => __( 'Mouse Scroll Wheel', 'detheme' ),
        'param_name' => 'scrollcontrol',
        'param_holder_class'=>'mouse-scroll-label',
        'description' => __( 'Disable/enable mouse scroll to control zoom', 'detheme' ),
        'class' => '',
        'value'=>array(1=>__('Enable','detheme'),0=>__('Disable','detheme')),
        'type' => 'radio',
        'std'=>'1'
         ),     
        array( 
        'param_name' => 'devider2',
        'type' => 'devider'
         ),     
        array( 
        'heading' => __( 'Map Height', 'detheme' ),
        'param_name' => 'height',
        'param_holder_class'=>'map-height-label',
        'type' => 'textfield',
        'value'=>'400px',
        'std'=>'400px'
         ),     
        array( 
        'heading' => __( 'Map Width', 'detheme' ),
        'param_name' => 'width',
        'param_holder_class'=>'map-width-label',
        'type' => 'textfield',
        'value'=>'',
         ),     
        array( 
        'heading' => __( 'Map Marker', 'detheme' ),
        'param_name' => 'marker',
        'param_holder_class'=>'map-marker-label',
        'type' => 'radio',
        'value'=>array(
            'default'=>__('Default','detheme'),
            'image'=>__('Custom Image','detheme'),
            ),
        'std'=>'default'
         ),    
        array( 
        'heading' => __( 'Image Marker', 'detheme' ),
        'param_name' => 'image_marker',
        'class' => '',
        'value' => '',
        'type' => 'attach_image',
        'description'=>__('Select image as marker your location on the map','detheme'),
        'dependency' => array( 'element' => 'marker', 'value' => array( 'image') )       
         ),
        array( 
        'heading' => __( 'Map Style', 'detheme' ),
        'param_name' => 'style',
        'param_holder_class'=>'map-style-label',
        'type' => 'select_layout',
        'value'=>array(
            __('Shades of Grey','detheme')=>'shades',
            __('Midnight Commander','detheme')=>'midnight',
            __('Blue water','detheme')=>'bluewater',
            __('Light Monochrome','detheme')=>'lightmonochrome',
            __('Neutral Blue','detheme')=>'neutralblue',
            __('Avocado World','detheme')=>'avocadoworld',
            __('Nature','detheme')=>'nature',
            __('Pastel Tones','detheme')=>'pastel'
            ),
        'std'=>'pastel'
         )     
    )

 ) );

/* social icon */
 vc_map( array( 
        'name' => __( 'Social Box', 'detheme' ),
        'base' => 'dt_social',
        'class' => '',
        'controls' => 'full',
        'icon' => 'admin-icon-box',
        'category' => __( 'deTheme', 'detheme' ),
        'description'=>__('Shows the social icons and links','detheme'),
        'admin_enqueue_css' =>array(DETHEME_VC_DIR_URL . 'css/fontello.css',DETHEME_VC_DIR_URL . 'lib/admin/css/admin.css'),
        'admin_enqueue_js' => DETHEME_VC_DIR_URL . '/lib/admin/js/backend.js',
        'params' => array(  
        array( 
        'heading' => '',
        'param_name' => 'facebook',
        'class' => 'fontelloicon-facebook',
        'value' => '',
        'type' => 'iconfield',
         ),
        array( 
        'heading' => '',
        'param_name' => 'twitter',
        'class' => 'fontelloicon-twitter-5',
        'value' => '',
        'type' => 'iconfield',
         ),
        array( 
        'heading' => '',
        'param_name' => 'gplus',
        'class' => 'fontelloicon-gplus',
        'value' => '',
        'type' => 'iconfield',
         ),
        array( 
        'heading' => '',
        'param_name' => 'pinterest',
        'class' => 'fontelloicon-pinterest-2',
        'value' => '',
        'type' => 'iconfield',
         ),
        array( 
        'heading' => '',
        'param_name' => 'linkedin',
        'class' => 'fontelloicon-linkedin-5',
        'value' => '',
        'type' => 'iconfield',
         ),
         array( 
            'heading' => __( 'Size', 'detheme' ),
            'param_name' => 'size',
            'value' => array(
              'small'=>__('Small','detheme'),
              'medium'=>__('Medium','detheme'),
              'large'=>__('Large','detheme'),
              ),
            'std'=>'medium',
            'type' => 'radio',
          ),     

         array( 
            'heading' => __( 'Shape', 'detheme' ),
            'param_name' => 'shape',
            'value' => array(
                      'square'=>__('Square','detheme'),
                      'circle'=>__('Circle','detheme'),
                      "rounded"=>__("Rounded",'detheme'),
              ),
            'std'=>'square',
            'type' => 'radio',
          ),     
        array( 
            'heading' => __( 'Align', 'detheme' ),
            'param_name' => 'align',
            'value' => array('left'=>__( 'Left', 'detheme' ),'center'=>__( 'Center', 'detheme' ),'right'=>__( 'Right', 'detheme' )),
            'type' => 'radio',
            'std'=>'center'
         ),
        array( 
        'heading' => __( 'Color', 'detheme' ),
        'param_name' => 'color',
        'class' => '',
        'value' => '',
        'type' => 'colorpicker'
         ),
        array( 
        'heading' => __( 'Background Color', 'detheme' ),
        'param_name' => 'bg_color',
        'class' => '',
        'value' => '',
        'type' => 'colorpicker'
         ) 
     
         )
     )
);

function get_iconlists_multi( $settings, $value ) {
   $dependency = vc_generate_dependencies_attributes( $settings );

   $icons=detheme_font_list();
   $theIcons=(''!==$value)?explode(',',trim($value)):false;

   $output="<div class=\"dt-iconlist\">";
    $fieldid=sanitize_title($settings['param_name']);

   if($icons){
         $output.="<ul class=\"edit_form_icon_choice\">";
        if($theIcons){

            foreach ($theIcons as $theIcon) {
                $output.='<li><i data-icon="'.$theIcon.'" class="'.$theIcon.'"></i></li>';
            }

        }

        $output.="</ul>";



       $output.="<i id=\"".$fieldid."_icon_selection_value\" class=\"icon_selection_button fontellopicker-plus\" title=\"".__('Add New Icon','detheme_builder')."\"></i>";
       $output.='<script type="text/javascript">
        jQuery(document).ready(function($){
            var options={
                icons:new Array(\''.@implode("','",$icons).'\'),
                onUpdate:function(e){
                  var par=this.closest(\'.dt-iconlist\'),fieldinput=par.find(\'[name='.$settings['param_name'].']\'),
                  preview=par.find(\'.edit_form_icon_choice\');

                  var newicon=$(\'<li><i data-icon="\'+e+\'" class="\'+e+\'"></i></li>\');
                  newicon.click(function(){
                    this.remove();
                    '.$fieldid.'_saveIcon();
                  });
                  preview.append(newicon);
                  '.$fieldid.'_saveIcon();
                }
            },$'.$fieldid.'choices=$(\'#'.$fieldid.'\').closest(\'.dt-iconlist\').find(\'.edit_form_icon_choice\');

            $("#'.$fieldid.'_icon_selection_value").iconPicker(options);

            var '.$fieldid.'_saveIcon=function(){

              var theicon=$(\'i\',$'.$fieldid.'choices);
              var select=[];
              theicon.each(function (index,el){
                select.push($(el).data(\'icon\'));
              });

              $(\'#'.$fieldid.'\').val(select.join(\',\'));
            }

            $(\'li\',$'.$fieldid.'choices).click(function(){
                this.remove();
              '.$fieldid.'_saveIcon();
            });
        });
        </script>';
    }
    else{

          $output.=__('No css font available, please check plugin folder <b>'.DETHEME_VC_BASENAME.'css/fontello.css and /fonts/</b>','detheme');

    }

    $output .= '<input name="' . $settings['param_name'] . '" id="'.$fieldid.'" class="wpb_vc_param_value wpb-textinput icon-selection-value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . $value . '" ' . $dependency . '/></div>';    

    return $output;
}


function get_iconlists( $settings, $value ) {
   $dependency = vc_generate_dependencies_attributes( $settings );

   $output="<div class=\"dt-iconlist\">";

   $icons=detheme_font_list();

   if($icons){

       $output.="<span class=\"icon-selection-preview\"><i class=\"".$value."\"></i></span>";
       $output.="<i id=\"".sanitize_title($settings['param_name'])."_icon_selection_value\" class=\"icon_selection_button fontellopicker-plus\" title=\"".__('Add New Icon','detheme')."\"></i>";

       $output.='<script type="text/javascript">
        jQuery(document).ready(function($){
            var options={
                icons:new Array(\''.@implode("','",$icons).'\'),
                onUpdate:function(e){
                  var par=this.closest(\'.dt-iconlist\'),fieldinput=par.find(\'[name='.$settings['param_name'].']\'),preview=par.find(\'.icon-selection-preview i\');
                  fieldinput.val(e);
                  preview.removeClass().addClass(e);
                }
            };

            $("#'.sanitize_title($settings['param_name']).'_icon_selection_value").iconPicker(options);
        });
        </script>';
    }
    else{

          $output.=sprintf(__('No css font available, please check plugin folder <b>%s</b>','detheme'),DETHEME_VC_BASENAME.'/webicons/');

    }

    $output .= '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-textinput icon-selection-value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . $value . '" ' . $dependency . '/></div>';    

    return $output;
}

function get_iconfield($settings, $value){

   $dependency = vc_generate_dependencies_attributes( $settings );

    $output = '<span class="icon-wrap"><i class="'.$settings['class'].'"></i></span><input name="' . $settings['param_name'] . '" id="'.sanitize_title($settings['param_name']).'" class="wpb_vc_param_value wpb-textinput ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="text" value="' . $value . '" ' . $dependency . '/>';    

    return $output;

}


function get_row_header($settings, $value){

}

function get_option_layout($settings, $value){

    $dependency = vc_generate_dependencies_attributes( $settings );

    $output="";

    $options=$settings['value'];

    $output.="<ul class=\"option-select ".$settings['param_holder_class']."\" ".$dependency.">";

    if(count($options)){

        foreach($options as $label=>$layout){
            $output.="<li class=\"layout-option layout-".sanitize_title($layout).($value==$layout?" active":"")."\" data-option=\"".$layout."\">".$label."</li>";
        }
    }

    $output.='<input value="' . $value . '" class="wpb_vc_param_value '.$settings['param_name'].' '.$settings['type'].'" type="hidden" name="'.$settings['param_name'].'"/> ';
    $output.="</ul>";
    return $output;

}

function get_pagination_preview($settings, $value){

    $dependency = vc_generate_dependencies_attributes( $settings );

    $output='<div class="carousel-preview" '.$dependency.'>
    <div class="owl-pagination">
    <div class="owl-page active"><span></span></div>
    <div class="owl-page"><span></span></div>
    <div class="owl-page"><span></span></div>
    </div>
    </div>';
    return     $output;


}


function get_slider_value($settings, $value){

    $dependency = vc_generate_dependencies_attributes( $settings );

    $output="";
    $params=$settings['params'];

    $params=wp_parse_args($params,array('min'=>0,'max'=>1000,'step'=>'1'));

    $output='<div class="input-slider-container" '.$dependency.'>';
    $output.='<input type="range" class="wpb_vc_param_value input-slider" min="'.$params['min'].'" max="'.$params['max'].'" step="'.$params['step'].'" name="'.$settings['param_name'].'_slider" value="'.$value.'"/>';
    $output.='<input type="text" class="wpb_vc_param_value '.$settings['param_name'].' '.$settings['type'].'" name="'.$settings['param_name'].'" value="'.$value.'"/>';
    $output.='</div>';

    return     $output;


}

function get_radio_options($settings, $value){

   $dependency = vc_generate_dependencies_attributes( $settings );

   if(!isset($value)){
        $value=$settings['std'];
    }

    $output='<div class="radio-options"'.$dependency.'>';
    $options=$settings['value'];


    if(count($options)){
         $output.='<ul class="inline-list">';

        foreach ($options as $option=>$label) {
            $output.='<li><input type="radio" name="'.$settings['param_name'].'_option" class="radio-option" '.(($option==$value)?'checked="checked"':'').'value="'.$option.'" />'.$label.'</li>';

        }
         $output.='</ul>';
    }
    $output.='<input type="hidden" class="wpb_vc_param_value '.$settings['param_name'].' '.$settings['type'].'" name="'.$settings['param_name'].'" value="'.$value.'"/>';
    $output.='</div>';
    return     $output;

}

function get_media_form_field( $settings, $value ) {

      $dependency = vc_generate_dependencies_attributes( $settings );
      $value=intval($value);
      $mediaPreview='';
      $media_type="";

      if($value){

        $filename=get_attached_file($value);
        $filelabel=basename($filename);
        if(wp_attachment_is_image($value)){
            $media_url=wp_get_attachment_thumb_url($value);
        }
        else{
            $mimetype = get_post_mime_type($value);
            $media_url=wp_mime_type_icon($mimetype);
        }

        $mediaPreview='<div class="media-preview"><img class="" src="'.$media_url.'"/ data-id="'.$value.'"><span class="media-label">'.$filelabel.'</span></div>';
      }

      if(isset($settings['media_type']) && is_array($settings['media_type'])) $media_type=implode(',',$settings['media_type']);

      $param_line = '<div class="attach_media_field" data-type="'.$media_type.'" '.$dependency.'>';
      $param_line .= '<input type="hidden" class="wpb_vc_param_value '.$settings['param_name'].' '.$settings['type'].'" name="'.$settings['param_name'].'" value="'.($value?$value:'').'"/>';
      $param_line .= '<div class="gallery_widget_attached_medias">';
      $param_line .= '<ul class="gallery_widget_attached_medias_list">';
      $param_line .= '<li><a class="gallery_widget_add_media" href="javascript:;" title="'.__('Add Media', "detheme").'">'.($mediaPreview!=''?$mediaPreview:__('Add Media', "detheme")).'</a>';
      $param_line .= '<a href="javascript:;" style="display:'.($mediaPreview!=''?"block":"none").'" class="remove_attach_media">'.__('Remove Media').'</a></li>';
      $param_line .= '</ul>';
      $param_line .= '</div>';
      $param_line .= '</div>';

      return $param_line;
}


add_shortcode_param( 'dt_media', 'get_media_form_field',DETHEME_VC_DIR_URL.'lib/admin/js/media_editor.js');
add_shortcode_param( 'iconlists_multi', 'get_iconlists_multi', DETHEME_VC_DIR_URL . 'lib/admin/js/backend.js' );
add_shortcode_param( 'iconlists', 'get_iconlists',DETHEME_VC_DIR_URL.'lib/admin/js/icon_picker.js');
add_shortcode_param( 'iconfield', 'get_iconfield');
add_shortcode_param( 'header', 'get_row_header');
add_shortcode_param( 'carousel_preview', 'get_pagination_preview',DETHEME_VC_DIR_URL . 'lib/admin/js/backend.js');
add_shortcode_param( 'slider_value', 'get_slider_value',DETHEME_VC_DIR_URL . 'lib/admin/js/backend.js');      
add_shortcode_param( 'radio', 'get_radio_options',DETHEME_VC_DIR_URL . 'lib/admin/js/backend.js');  
add_shortcode_param( 'select_layout', 'get_option_layout',DETHEME_VC_DIR_URL . 'lib/admin/js/backend.js');

if(!function_exists('dt_exctract_DTicon')){

    function dt_exctract_DTicon($file="",$pref="icon"){

        if(!@is_file($file) || !@file_exists($file))
            return false;

        if ($buffers=@file($file)) {

            $icons=array();
            $headerDefault=array('name'=>'',
                                'uri'=>'',
                                'author'=>'',
                                'license'=>''
                                );


            foreach ($buffers as $line => $buffer) {

                if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Icon Name', '/' ) . ':(.*)$/mi', $buffer, $match ) && $match[1] ){

                    $icon=$headerDefault;
                    $icon['name']=$match[1];
                    $icon['icons']=array();

                    $icons[$icon['name']]['name']=$icon['name'];


                }


                if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Author', '/' ) . ':(.*)$/mi', $buffer, $match ) && $match[1] ){


                    $icon['author']=$match[1];
                    $icons[$icon['name']]['author']=$icon['author'];


                }


                if(preg_match("/(".$pref.")-([^:\]\"].*?):/i",$buffer,$out)){
                    if($out[2]!=="")
                        $icons[$icon['name']]['icons'][]="icon-".$out[2];
                }
            }
            return $icons;

        }else{

            return false;
        }
    }

}


?>