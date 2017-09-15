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
 * @subpackage  Video
 * @author      Detheme
 * @version     3.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'DethemeReduxFramework_video' ) ) {

    /**
     * Main ReduxFramework_media class
     *
     * @since       1.0.0
     */
    class DethemeReduxFramework_video extends DethemeReduxFramework {
    
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

          $this->enqueue();

          $value = $this->value;
          if ( !isset( $this->field['mode'] ) ) {
              $this->field['mode'] = "video";
          }


       $video='';

      if($value){

       
        $media_url=wp_get_attachment_url($value);
        $mediadata=wp_get_attachment_metadata($value);


        $videoformat="video/mp4";

        if(is_array($mediadata) && $mediadata['mime_type']=='video/webm'){
             $videoformat="video/webm";
        }

        $video='<video class="attached_video" data-id="'.$value.'" autoplay width="266">
        <source src="'.esc_url($media_url).'" type="'.$videoformat.'" /></video>';
      }

        print '<div class="detheme-field-image page-background">';
        print '<input type="hidden" name="'.$this->args['opt_name'] . '[' . $this->field['id'].']'.'" value="'.$value.'" />';
        print '<p class="preview-image">';
        print '<a title="'.esc_attr__('Set Video','redux-framework').'" href="#" data-type="'.$this->field['mode'].'" id="set-page-background" class="add_detheme_image">'.(($video!='') ? $video:esc_html__('Set Video','redux-framework')).'</a>';
        print '</p>';
        print '<a title="'.esc_attr__('Remove Video','redux-framework').'" style="display:'.(($video=='')?'none':'block').'" href="#" id="clear-page-background" class="remove_detheme_image">'.esc_html__('Remove Video','redux-framework').'</a></div>';

        }

    		/**
    		 * 
    		 * Functions to pass data from the PHP to the JS at render time.
    		 * 
    		 * @return array Params to be saved as a javascript object accessable to the UI.
    		 * 
    		 * @since  Redux_Framework 3.1.1
    		 * 
    		 */
    		function localize() {
                
          if ( !isset( $this->field['mode'] ) ) {
            $this->field['mode'] = "image";
          }
          return array( 'mode' => $this->field['mode'] );
          
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
                'redux-field-video-js',
                DethemeReduxFramework::$_url . 'inc/fields/video/field_video.js',
                array( 'jquery' ),
                "",
                true
            );

            wp_localize_script( 'redux-field-video-js', 'dtb_i18nLocale', array(
                'select_image'=>__('Select Video','redux-framework'),
                'insert_image'=>__('Insert Video','redux-framework'),
            ));

            wp_enqueue_style(
                'redux-field-media-css',
                DethemeReduxFramework::$_url . 'inc/fields/video/field_media.css',
                "",
                true
            );

        }
    }
}
