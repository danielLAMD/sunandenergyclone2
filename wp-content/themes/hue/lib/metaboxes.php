<?php
defined('ABSPATH') or die();

add_action( 'save_post', 'save_detheme_metaboxes' );
function save_detheme_metaboxes($post_id){

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if(!wp_verify_nonce( isset($_POST['detheme_page_metaboxes'])?sanitize_text_field($_POST['detheme_page_metaboxes']):"", 'detheme_page_metaboxes'))
    return;

     $old = get_post_meta( $post_id, '_sidebar_position', true );
     $new = (isset($_POST['_sidebar_position']))?sanitize_text_field($_POST['_sidebar_position']):'';
     
     update_post_meta( $post_id, '_sidebar_position', $new,$old );

     $old = get_post_meta( $post_id, '_hide_title', true );
     $new = (isset($_POST['hide_title']))?sanitize_text_field($_POST['hide_title']):'';

     update_post_meta( $post_id, '_hide_title', $new,$old );

     $old = get_post_meta( $post_id, '_hide_loader', true );
     $new = (isset($_POST['hide_loader']))?sanitize_text_field($_POST['hide_loader']):'';

     update_post_meta( $post_id, '_hide_loader', $new,$old );

     $old = get_post_meta( $post_id, '_hide_banner', true );
     $new = (isset($_POST['hide_banner']))?sanitize_text_field($_POST['hide_banner']):'';

     update_post_meta( $post_id, '_hide_banner', $new,$old );

     if('page'==get_post_type()){

       $old = get_post_meta( $post_id, '_background_style', true );
       $new = (isset($_POST['background_style']))?sanitize_text_field($_POST['background_style']):'';

       update_post_meta( $post_id, '_background_style', $new,$old );

       $old = get_post_meta( $post_id, '_page_background', true );
       $new = (isset($_POST['page_background']))?sanitize_text_field($_POST['page_background']):'';

       update_post_meta( $post_id, '_page_background', $new,$old );
    }


     if(isset($_POST['page_banner'])){

       $old = get_post_meta( $post_id, '_page_banner', true );
       $new = sanitize_text_field($_POST['page_banner']);
       update_post_meta( $post_id, '_page_banner', $new,$old );
     }    
}


function detheme_page_metaboxes() {


  $posttypes=get_detheme_page_attributes();

  if(count($posttypes)){
    foreach ($posttypes as $posttype => $title) {
      remove_meta_box('pageparentdiv', $posttype,'side');

      add_meta_box('dtpageparentdiv',  ($title==""?esc_html__('Page Attributes','hue'):$title), 'detheme_page_attributes_meta_box', $posttype, 'side', 'core');
    }

  }
}

function get_detheme_post_type_show_title(){

    return apply_filters('detheme_page_metaboxes_title',array('page'));
}

function get_detheme_post_type_show_banner(){

    return apply_filters('detheme_page_metaboxes_banner',array('page'));
}


function get_detheme_page_attributes(){

  $defaultpost=array(
    'page'=>esc_html__('Page Attributes','hue'),
    'post'=>esc_html__('Page Attributes','hue'),
    'port'=>esc_html__('Page Attributes','hue'),
    'product'=>esc_html__('Page Attributes','hue')
  );

  return apply_filters('detheme_page_metaboxes',$defaultpost);

}

add_action( 'admin_menu' , 'detheme_page_metaboxes');

function detheme_page_attributes_meta_box($post) {

  wp_register_script('detheme-media',get_template_directory_uri() . '/lib/js/media.min.js', array('jquery','media-views','media-editor'),'',true);
  wp_enqueue_script('detheme-media');

  wp_nonce_field( 'detheme_page_metaboxes','detheme_page_metaboxes');

  do_action('detheme_page_attribute_metaboxes',$post);
  do_action('after_detheme_page_attribute');
}


function detheme_page_attribute_post_parent($post){

  $post_type_object = get_post_type_object($post->post_type);
  if ( $post_type_object->hierarchical ) {

    $dropdown_args = array(
      'post_type'        => $post->post_type,
      'exclude_tree'     => $post->ID,
      'selected'         => $post->post_parent,
      'name'             => 'parent_id',
      'show_option_none' => esc_html__('(no parent)','hue'),
      'sort_column'      => 'menu_order, post_title',
      'echo'             => 0,
    );

    $dropdown_args = apply_filters( 'page_attributes_dropdown_pages_args', $dropdown_args, $post );
    $pages = wp_dropdown_pages( $dropdown_args );

  if ( ! empty($pages) ) {?>
<p><strong><?php esc_html_e('Parent','hue') ?></strong></p>
<label class="screen-reader-text" for="parent_id"><?php esc_html_e('Parent','hue') ?></label>
<?php print $pages; 
    } 
  } 

}


function detheme_page_attribute_checkbox($post){

  $post_type_hide_title=get_detheme_post_type_show_title();
  $post_type_hide_banner=get_detheme_post_type_show_banner();

?>
<?php if ( in_array($post->post_type,$post_type_hide_title) && (get_detheme_option($post->post_type.'-title') ||   ($post->post_type=='page' && get_detheme_option('dt-show-title-page')))):?>
<p><input type="checkbox" name="hide_title" id="hide_title" value="1" <?php echo ($post->_hide_title)?'checked="checked"':""?>/> <?php esc_html_e('Hide title','hue') ?></strong></p>
<?php endif;?>
<?php if ( in_array($post->post_type,$post_type_hide_banner) && get_detheme_option('show-banner-area') ):?>
<p><input type="checkbox" name="hide_banner" id="hide_banner" value="1" <?php echo ($post->_hide_banner)?'checked="checked"':""?>/> <?php esc_html_e('Hide banner','hue') ?></strong></p>
<?php
  wp_add_inline_script('hue-admin-script','jQuery(document).ready(function($) {
    \'use strict\'; 

    var hide_banner=$(\'#hide_banner\');
      
    if(hide_banner.length){
      hide_banner.on(\'change\',function(){
        if(hide_banner.prop(\'checked\')){
          $(\'.page-banner\').hide();
        }
        else{
          $(\'.page-banner\').show();
        }

      })
      .trigger(\'change\');
    }
  });');
?>
<?php endif;?>
<?php if ( in_array($post->post_type,$post_type_hide_banner) && get_detheme_option('page_loader') ):?>
<p><input type="checkbox" name="hide_loader" id="hide_loader" value="1" <?php echo ($post->_hide_loader)?'checked="checked"':""?>/> <?php esc_html_e('Disable Page Loader','hue') ?></strong></p>
<?php 
endif;

}

function detheme_page_attribute_page_template($post){

  if ( 'page' != $post->post_type )
      return true;

  $template = !empty($post->page_template) ? $post->page_template : false;
  $templates = get_page_templates();
  $sidebar_position=array('sidebar-left'=>esc_html__('Left','hue'),'sidebar-right'=>esc_html__('Right','hue'),'nosidebar'=>esc_html__('No Sidebar','hue'));

  ksort( $templates );
   ?>
<p><strong><?php esc_html_e('Template','hue') ?></strong></p>
<label class="screen-reader-text" for="page_template"><?php esc_html_e('Page Template','hue'); ?></label><select name="page_template" id="page_template">
<option value='default'><?php esc_html_e('Default Template','hue'); ?></option>
<?php 

if(count($templates)):

foreach (array_keys( $templates ) as $tmpl )
    : if ( $template == $templates[$tmpl] )
      $selected = " selected='selected'";
    else
      $selected = '';
    echo "\n\t<option value='".$templates[$tmpl]."' $selected>".esc_html($tmpl,'hue')."</option>";
  endforeach;
  endif;?>
 ?>
</select>
<div id="custommeta">
<p id="sidebar_option">
  <strong><?php esc_html_e('Sidebar Position','hue') ?></strong>&nbsp;
<select name="_sidebar_position" id="sidebar_position">
<option value='default'><?php esc_html_e('Default','hue'); ?></option>
<?php foreach ($sidebar_position as $position=>$label) {
  print "<option value='".$position."'".(($post->_sidebar_position==$position)?" selected":"").">".ucwords($label)."</option>";

}?>
</select>
</p>
</div>
<p><strong><?php esc_html_e('Order','hue'); ?></strong></p>
<p><label class="screen-reader-text" for="menu_order"><?php esc_html_e('Order','hue'); ?></label><input name="menu_order" type="text" size="4" id="menu_order" value="<?php echo esc_attr($post->menu_order); ?>" /></p>
<p><?php esc_html_e( 'Need help? Use the Help tab in the upper right of your screen.','hue'); ?></p>

<?php
  wp_add_inline_script('hue-admin-script','jQuery(document).ready(function($) {
  \'use strict\'; 

  var $select = $(\'select#page_template\'),$custommeta = $(\'#custommeta\'),$background_style=$(\'#background_style\');
    
  $select.live(\'change\',function(){
    var this_value = $(this).val();
    switch ( this_value ) {
      case \'squeeze.php\':
            $custommeta.find(\'#sidebar_option\').fadeOut(\'slow\');
        break;
      case \'fullwidth.php\':
            $custommeta.find(\'#sidebar_option\').fadeOut(\'slow\');
        break;
      default:
         $custommeta.find(\'#sidebar_option\').fadeIn(\'slow\');
    }

  });
  $select.trigger(\'change\');
});');
?>

<?php  
}

function detheme_page_attribute_page_background($post){

  if ( 'page'!=$post->post_type)
  return true;

  $background_image=get_post_meta($post->ID, '_page_background', true);
  $background_style=get_post_meta( $post->ID, '_background_style', true );
  $image="";
  $styles = array(
      esc_html__("Cover", 'hue') => 'cover',
      esc_html__("Cover All", 'hue') => 'cover_all',
      esc_html__('Contain', 'hue') => 'contain',
      esc_html__('No Repeat', 'hue') => 'no-repeat',
      esc_html__('Repeat', 'hue') => 'repeat',
      esc_html__("Parallax", 'hue') => 'parallax',
      esc_html__("Parallax All", 'hue') => 'parallax_all',
      esc_html__("Fixed", 'hue') => 'fixed',
    );

  if($background_image){

    $image = wp_get_attachment_image( $background_image, array( 266,266 ));
  }

  ?>
<div class="detheme-field-image page-background">
  <p><strong><?php esc_html_e('Background Image','hue');?></strong>
  <input type="hidden" name="page_background" value="<?php print esc_attr($background_image);?>" />
  <p class="preview-image">
  <a title="<?php esc_html_e('Set background image','hue');?>" href="#" id="set-page-background" class="add_detheme_image"><?php echo (""!==$image)? wp_kses_data($image) : esc_html__('Set background image','hue');?></a>
  </p>
  <a title="<?php esc_html_e('Remove background image','hue');?>" style="display:<?php echo (""==$image)?"none":"block";?>" href="#" id="clear-page-background" class="remove_detheme_image"><?php esc_html_e('Remove background image','hue');?></a>
</div>
 <div  id="background_style"><strong><?php esc_html_e('Background Style','hue');?></strong>&nbsp;
  <select name="background_style">
  <option value="default"><?php esc_html_e('Default','hue');?></option>
  <?php 
  foreach ($styles as $name=>$style) {
    print "<option value='".$style."'".(($background_style==$style)?" selected":"").">".ucwords($name)."</option>";

  }
  ?>
  </select>
</div>
<?php   
}
function detheme_page_attribute_page_banner($post){

  if(get_detheme_option('dt-show-banner-page')!='featured' || !get_detheme_option('show-banner-area'))
    return true;

  $banner_image=get_post_meta($post->ID, '_page_banner', true);
  $banner_image_url="";

  if($banner_image){

    $banner_image_data=wp_get_attachment_metadata(intval($banner_image));

    if(isset($banner_image_data['mime_type']) && preg_match('/video/', $banner_image_data['mime_type'])){

        $video_url=wp_get_attachment_url(intval($banner_image));

        $videoformat="video/mp4";
        if(is_array($banner_image_data) && $banner_image_data['mime_type']=='video/webm'){
             $videoformat="video/webm";
        }

        $banner_image_url='<video autoplay width="266">';
        $banner_image_url.="<source src=\"".esc_url($video_url)."\" type=\"".$videoformat."\" />";
        $banner_image_url.="</video>";

    }
    else{

      $banner_image_url = wp_get_attachment_image( $banner_image, array( 266,266 ));
    }
  }
?>
<div class="detheme-field-image page-banner">
  <p><strong><?php esc_html_e('Banner','hue');?></strong>
  <input type="hidden" name="page_banner" value="<?php print esc_attr($banner_image);?>" />
  <p class="preview-image">
  <a title="<?php esc_html_e('Set Page Banner','hue');?>" href="#" id="set-page-banner" data-type="image,video"  data-select-label="<?php esc_html_e('Select Banner','hue');?>" data-insert-label="<?php esc_html_e('Insert Banner','hue');?>" class="add_detheme_image"><?php echo (""!==$banner_image_url)? wp_kses_data($banner_image_url) : esc_html__('Set Page Banner','hue');?></a>
  </p>
  <a title="<?php esc_html_e('Remove Page Banner','hue');?>" style="display:<?php echo (""==$banner_image_url)?"none":"block";?>" href="#" id="clear-page-banner" class="remove_detheme_image"><?php esc_html_e('Remove Page Banner','hue');?></a>
</div>
<?php
}

add_action ('detheme_page_attribute_metaboxes','detheme_page_attribute_checkbox');
add_action ('detheme_page_attribute_metaboxes','detheme_page_attribute_post_parent');
add_action ('detheme_page_attribute_metaboxes','detheme_page_attribute_page_template');
add_action ('detheme_page_attribute_metaboxes','detheme_page_attribute_page_banner');
add_action ('detheme_page_attribute_metaboxes','detheme_page_attribute_page_background');
?>