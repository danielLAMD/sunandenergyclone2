<?php

/**
 * This is a test3.
 *
 *
 *
 * Here is another.
 *
 * And one more.
 *
 * @internal This file must be parsable by PHP4.
 *
 * @package Redux_Framework
 * @subpackage Fields
 * @access public
 * @global $optname
 * @internal Internal Note string
 * @link http://reduxframework.com
 * @method Test
 * @name $globalvariablename
 * @param   string  $this->field['test']    This is cool.
 * @param   string|boolean  $field[default] Default value for this field.
 * @return Test
 * @see ParentClass
 * @since Redux 3.0.9
 * @todo Still need to fix this!
 * @var string cool
 * @var int notcool
 * @param string[] $options {
 *  @type boolean $required Whether this element is required
 *  @type string  $label    The display name for this element
 * }
 *
 *
 * 
 */



class DethemeReduxFramework_textarea extends DethemeReduxFramework {

    /**
     * Field Constructor.
     *
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     *
     * @param $field 
     *
     *  | Name        | Type   | Default  | Description.                                |
        |-------------|--------|----------|---------------------------------------------|
        | type        | string | 'text' | Controls the field type.                    |
        | id          | string |          | Must be unique to all other options.        |
        | title       | string |          | Title of item to be displayed.              |
        | subtitle    | string |          | Subtitle of item to be displayed.           |
        | desc        | string |          | Description of item to be displayed.        |
        | compiler    | boolean | false   | Flag to run the compiler hook.              |
        | class       | string |          | Append any number of classes to the field.  |
        | required    | string/array |    | Provide the parent and value which affects this field's visibility. |
        | default     | string |          | Default text. |
        | validate    | string |           | Controls the entered validation. |
        | placeholder | string |           | Message to display when no text is present. |
        | rows        | int | 6          | Numbers of text rows to display. |
        | allowed_html| array |           | array of allowed HTML tags.  See http://codex.wordpress.org/Function_Reference/wp_kses for more information. |

     * @param $value Constructed by Redux class. Based on the passing in $field['defaults'] value and what is stored in the database.
     * @param $parent ReduxFramework object is passed for easier pointing.
     * @since ReduxFramework 1.0.0
     * @type string $field[test] Description. Default <value>. Accepts <value>, <value>.
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
     * @since ReduxFramework 1.0.0
    */



    /**
     * Holds configuration settings for each field in a model.
     * Defining the field options
     *
     * array['fields']              array Defines the fields to be shown by scaffolding.
     *          [fieldName]         array Defines the options for a field, or just enables the field if array is not applied.
     *              ['name']        string Overrides the field name (default is the array key)
     *              ['model']       string (optional) Overrides the model if the field is a belongsTo associated value.
     *              ['width']       string Defines the width of the field for paginate views. Examples are "100px" or "auto"
     *              ['align']       string Alignment types for paginate views (left, right, center)
     *              ['format']      string Formatting options for paginate fields. Options include ('currency','nice','niceShort','timeAgoInWords' or a valid Date() format)
     *              ['title']       string Changes the field name shown in views.
     *              ['desc']        string The description shown in edit/create views.
     *              ['readonly']    boolean True prevents users from changing the value in edit/create forms.
     *              ['type']        string Defines the input type used by the Form helper (example 'password')
     *              ['options']     array Defines a list of string options for drop down lists.
     *              ['editor']      boolean If set to True will show a WYSIWYG editor for this field.
     *              ['default']     string The default value for create forms.
     *
     * @param array $arr (See above)
     * @return Object A new editor object.
     **/
    function render() {

        $name = $this->args['opt_name'] . '[' . $this->field['id'] . ']';
        $this->field['placeholder'] = isset($this->field['placeholder']) ? $this->field['placeholder'] : "";
        $this->field['rows'] = isset($this->field['rows']) ? $this->field['rows'] : 6;

        ?><textarea name="<?php echo wp_strip_all_tags($name); ?>" id="<?php echo esc_attr($this->field['id']); ?>-textarea" placeholder="<?php print esc_attr($this->field['placeholder']); ?>" class="large-text <?php echo esc_attr($this->field['class']); ?>" rows="<?php echo esc_attr($this->field['rows']); ?>"><?php echo wp_kses_data($this->value); ?></textarea><?php
        
    }
}
