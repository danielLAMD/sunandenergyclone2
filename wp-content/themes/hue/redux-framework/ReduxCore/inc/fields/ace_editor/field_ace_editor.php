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
 * @package     Redux_Field
 * @subpackage  ACE_Editor
 * @version     3.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( class_exists( 'DethemeReduxFramework_ace_editor' ) ) return;

class DethemeReduxFramework_ace_editor extends DethemeReduxFramework{ 

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since ReduxFramework 1.0.0
    */
    function __construct( $field = array(), $value ='', $parent ) {
    
        $this->args=$parent->args;
        $this->parent = $parent;
        $this->field = $field;
        $this->value = trim($value);

    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since ReduxFramework 1.0.0
    */
    function render() {

        if( !isset($this->field['mode']) ){
            $this->field['mode'] = 'javascript';
        }
        if( !isset($this->field['theme']) ){
            $this->field['theme'] = 'monokai';
        }

        $name = $this->args['opt_name'] . '[' . $this->field['id'] . ']';

        ?>
        <div class="ace-wrapper">
            <textarea name="<?php echo wp_strip_all_tags($name); ?>" id="<?php echo esc_attr($this->field['id']); ?>-textarea" class="ace-editor hide" data-editor="<?php echo esc_attr($this->field['id']); ?>-editor" data-mode="<?php echo esc_attr($this->field['mode']); ?>" data-theme="<?php echo esc_attr($this->field['theme']); ?>">
                <?php echo wp_kses_data($this->value); ?>
            </textarea>
            <pre id="<?php echo esc_attr($this->field['id']); ?>-editor" class="ace-editor-area"><?php echo htmlspecialchars ($this->value); ?></pre>
        </div>
    <?php
        
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

            wp_enqueue_style(
                'redux-field-ace-editor-css', 
                DethemeReduxFramework::$_url . 'inc/fields/ace_editor/field_ace_editor.css',
                "",
                true
            );
            wp_enqueue_script(
                'redux-field-ace-editor-js', 
                DethemeReduxFramework::$_url . 'inc/fields/ace_editor/field_ace_editor.js', 
                array( 'ace-editor-js' ),
                "",
                true
            );
        }
}
