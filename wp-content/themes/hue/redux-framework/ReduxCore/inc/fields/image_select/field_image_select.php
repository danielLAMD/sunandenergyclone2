<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @subpackage  Field_Images
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'DethemeReduxFramework_image_select' ) ) {

    /**
     * Main ReduxFramework_image_select class
     *
     * @since       1.0.0
     */
    class DethemeReduxFramework_image_select extends DethemeReduxFramework {
    
        /**
         * Field Constructor.
         *
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        function __construct( $field = array(), $value ='', $parent ) {
        
            $this->args=$parent->args;
            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;
        
        }

        /**
         * Field Render Function.
         *
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render() {
                
            if( !empty( $this->field['options'] ) ) {

                echo '<ul class="redux-image-select">';
            
                $x = 1;

                foreach( $this->field['options'] as $k => $v ) {

                    if( !is_array( $v ) )
                        $v = array( 'img' => $v );

                    if( !isset( $v['title'] ) )
                        $v['title'] = '';

                    if( !isset( $v['alt'] ) )
                        $v['alt'] = $v['title'];

                    $style = '';

                    if( !empty( $this->field['width'] ) ) {
                        $style .= 'width: ' . $this->field['width'];
                    
                        if( is_numeric( $this->field['width'] ) )
                            $style .= 'px';
                    
                        $style .= ';';
                    }

                    if( !empty( $this->field['height'] ) ) {
                        $style .= 'height: ' . $this->field['height'];

                        if( is_numeric( $this->field['height'] ) )
                            $style .= 'px';

                        $style .= ';';
                    }
                    $style .= " max-width: 100%; ";

                    $theValue = $k;
                    if( !empty( $this->field['tiles'] ) && $this->field['tiles'] == true ) {
                        $theValue = $v['img'];
                    }

                    $selected = ( checked( $this->value, $theValue, false ) != '' ) ? ' redux-image-select-selected' : '';

                    $presets = '';
                    $is_preset = false;

                    $this->field['class'] .= ' noUpdate ';
                    if( !empty( $this->field['presets'] ) && $this->field['presets'] && !empty( $v['presets'] ) ) {

                        if( !is_array( $v['presets'] ) )
                            $v['presets'] = json_decode( $v['presets'], true );

                        $v['presets']['redux-backup'] = 1;

                        $presets = ' data-presets="' . htmlspecialchars( json_encode( $v['presets'] ), ENT_QUOTES, 'UTF-8' ) . '"';
                        $is_preset = true;
                        //$selected = '';
                        $this->field['class'] .= 'redux-presets';
                    }               

                    $is_preset_class = $is_preset?'-preset-':'';

                    echo '<li class="redux-image-select">';
                    echo '<label class="' . $selected . ' redux-image-select' . $is_preset_class . $this->field['id'] . '_' . $x . '" for="' . $this->field['id'] . '_' . (array_search( $k, array_keys( $this->field['options'] ) ) + 1) . '">';

                    echo '<input type="radio" class="' . $this->field['class'] . '" id="' . $this->field['id'] . '_' . (array_search( $k, array_keys( $this->field['options'] ) ) + 1) . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']" value="' . $theValue . '" ' . checked( $this->value, $theValue, false ) . $presets . '/>';
                    
                    if( !empty( $this->field['tiles'] ) && $this->field['tiles'] == true ) {
                        echo '<span class="tiles" style="background-image: url(' . $v['img'] . ');" rel="'.$v['img'].'"">&nbsp;</span>';
                    } else {
                        echo '<img src="' . esc_url($v['img']) . '" alt="' . $v['alt'] . '" style="' . $style . '"' . $presets . ' />';
                    }
                
                    if ( $v['title'] != '' )
                        echo '<br /><span>' . $v['title'] . '</span>';  

                    echo '</label>';
                    echo '</li>';
                    $x++;
                }
                
                echo '</ul>';       

            }


        }
    
        /**
         * Enqueue Function.
         *
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function enqueue() {
        
            wp_enqueue_script(
                'redux-field-image-select-js', 
                DethemeReduxFramework::$_url . 'inc/fields/image_select/field_image_select.js', 
                array( 'jquery' ),
                "",
                true
            );

            wp_enqueue_style(
                'redux-field-image-select-css', 
                DethemeReduxFramework::$_url . 'inc/fields/image_select/field_image_select.css',
                "",
                true
            );
        
        }
    }
}
