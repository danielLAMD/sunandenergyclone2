<?php
defined('ABSPATH') or die();
/**
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */

function detheme_sanitize_html_class($classes=""){

  if(!empty($classes)){

    $classes_array=@explode(" ",$classes);
    $newclasses=array_filter($classes_array, "sanitize_html_class");
    return join(" ",$newclasses);
  }
  return $classes;
}

function get_detheme_banner_height(){

  $banner_height=get_detheme_option('dt-banner-height');
  $height=(strpos($banner_height, "px") || strpos($banner_height, "%"))?$banner_height:$banner_height."px";

  return apply_filters('detheme_banner_height',$height,$banner_height);
}

function detheme_plugin_is_active( $plugin ) {
  return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || detheme_plugin_is_active_for_network( $plugin );
}

function detheme_plugin_is_active_for_network( $plugin ) {
  if ( !is_multisite() )
    return false;

  $plugins = get_site_option( 'active_sitewide_plugins');
  if ( isset($plugins[$plugin]) )
    return true;

  return false;
}

function get_detheme_sidebar_position(){

  if(function_exists('is_shop') && is_shop()){

   $post_id=get_option( 'woocommerce_shop_page_id');
  }
  elseif(is_home()){
    $post_id=get_option( 'page_for_posts');
  }
  elseif (is_page()){
    $post_id= get_the_ID();
  }

  $sidebar_position = isset($post_id) ?get_post_meta( $post_id, '_sidebar_position', true ):'default';

  if(!isset($sidebar_position) || empty($sidebar_position) || $sidebar_position=='default'){

    switch (get_detheme_option('layout')) {
      case 1:
        $sidebar_position = "nosidebar";
        break;
      case 2:
        $sidebar_position = "sidebar-left";
        break;
      case 3:
        $sidebar_position = "sidebar-right";
        break;
      case 4:
        $sidebar_position = "fullwidth";
        break;
      default:
        $sidebar_position = "sidebar-left";
    }


  }

  return $sidebar_position;
}


add_filter('nav_menu_link_attributes','hue_formatMenuAttibute',2,2);

/* page attribute */
add_action( 'save_post', 'detheme_save_sidebar_metaboxes' );

function detheme_save_sidebar_metaboxes($post_id){

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if(!wp_verify_nonce( isset($_POST['detheme_page_metaboxes'])?$_POST['detheme_page_metaboxes']:"", 'detheme_page_metaboxes'))
    return;

     $old = get_post_meta( $post_id, '_sidebar_position', true );
     $new = (isset($_POST['_sidebar_position']))?$_POST['_sidebar_position']:'';
     
     update_post_meta( $post_id, '_sidebar_position', $new,$old );

     $old = get_post_meta( $post_id, '_hide_title', true );
     $new = (isset($_POST['hide_title']))?$_POST['hide_title']:'';

     update_post_meta( $post_id, '_hide_title', $new,$old );

     $old = get_post_meta( $post_id, '_hide_loader', true );
     $new = (isset($_POST['hide_loader']))?$_POST['hide_loader']:'';

     update_post_meta( $post_id, '_hide_loader', $new,$old );

     $old = get_post_meta( $post_id, '_hide_banner', true );
     $new = (isset($_POST['hide_banner']))?sanitize_text_field($_POST['hide_banner']):'';

     update_post_meta( $post_id, '_hide_banner', $new,$old );


     if('page'==get_post_type()){

       $old = get_post_meta( $post_id, '_background_style', true );
       $new = (isset($_POST['background_style']))?$_POST['background_style']:'';

       update_post_meta( $post_id, '_background_style', $new,$old );

       $old = get_post_meta( $post_id, '_page_background', true );
       $new = (isset($_POST['page_background']))?$_POST['page_background']:'';

       update_post_meta( $post_id, '_page_background', $new,$old );

       if(isset($_POST['page_banner'])){

         $old = get_post_meta( $post_id, '_page_banner', true );
         $new = sanitize_text_field($_POST['page_banner']);
         update_post_meta( $post_id, '_page_banner', $new,$old );
       }    


    }
}

function detheme_dtmedia_script_loader($hook){

  wp_register_script('detheme-media',get_template_directory_uri() . '/lib/js/media.min.js', array('jquery','media-views','media-editor'),null,true);
  wp_enqueue_script('detheme-media');
}

//  add_action( 'dbx_post_advanced' , 'detheme_dtmedia_script_loader' );


function detheme_page_attibutes_metabox($posttypes){

  return array('page'=>$posttypes['page'],'essential_grid'=>esc_html__('Page Atribute','hue'),'post'=>esc_html__('Page Attribute','hue'),'dtpost'=>esc_html__('Page Attribute','hue'));
}

add_filter('detheme_page_metaboxes','detheme_page_attibutes_metabox');

function detheme_page_metaboxes_title_show($titles){

  return array('page','essential_grid','post','dtpost');
}

function detheme_page_metaboxes_banner_show($titles){

  return array('page','essential_grid','post','dtpost');

}

add_filter('detheme_page_metaboxes_title','detheme_page_metaboxes_title_show');
add_filter('detheme_page_metaboxes_banner','detheme_page_metaboxes_banner_show');

function hue_formatMenuAttibute($atts, $item){

  global $dropdownmenu;
  if (is_array($item->classes)) {
    if(in_array('dropdown', $item->classes)){
      $atts['class']="dropdown-toggle";
      $atts['data-toggle']="dropdown";
      $dropdownmenu=$item;
    }
  }
  return $atts;
}

function hue_createFontelloIconMenu($css,$item,$args=array()){

  $css=@implode(" ",$css);
  $args->link_before="";
  $args->link_after="";
  
  if(preg_match('/([-_a-z-0-9]{0,})icon([-_a-z-0-9]{0,})/', $css, $matches)){
  
    $css=preg_replace('/'.$matches[0].'/', "", $css);
    $item->title="<i class=\"".$matches[0]."\"></i>";
  }
  return @explode(" ",$css);
}


function hue_createFontelloMenu($css,$item,$args=array()){

  $css=@implode(" ",$css);
  $args->link_before="";
  $args->link_after="";
  
  if(preg_match('/([-_a-z-0-9]{0,})icon([-_a-z-0-9]{0,})/', $css, $matches)){
  
    $css=preg_replace('/'.$matches[0].'/', "", $css);
    $args->link_before.="<i class=\"".$matches[0]."\"></i>";
  }

  $args->link_before.="<span>";
  $args->link_after="</span>";

  return @explode(" ",$css);
}

add_filter( 'nav_menu_css_class', 'hue_createFontelloMenu', 10, 3 );
add_filter( 'hue_nav_menu_icon_css_class', 'hue_createFontelloIconMenu', 10, 3 );


class hue_iconmenu_walker extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filter the CSS class(es) applied to a menu item's <li>.
     *
     * @since 3.0.0
     *
     * @param array  $classes The CSS classes that are applied to the menu item's <li>.
     * @param object $item    The current menu item.
     * @param array  $args    An array of arguments. @see wp_nav_menu()
     */
    $class_names = join( ' ', apply_filters('hue_nav_menu_icon_css_class',array_filter( $classes ), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


    /**
     * Filter the ID applied to a menu item's <li>.
     *
     * @since 3.0.1
     *
     * @param string The ID that is applied to the menu item's <li>.
     * @param object $item The current menu item.
     * @param array $args An array of arguments. @see wp_nav_menu()
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

    /**
     * Filter the HTML attributes applied to a menu item's <a>.
     *
     * @since 3.6.0
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
     *
     *     @type string $title  The title attribute.
     *     @type string $target The target attribute.
     *     @type string $rel    The rel attribute.
     *     @type string $href   The href attribute.
     * }
     * @param object $item The current menu item.
     * @param array  $args An array of arguments. @see wp_nav_menu()
     */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    /**
     * Filter a menu item's starting output.
     *
     * The menu item's starting output only includes $args->before, the opening <a>,
     * the menu item's title, the closing </a>, and $args->after. Currently, there is
     * no filter for modifying the opening and closing <li> for a menu item.
     *
     * @since 3.0.0
     *
     * @param string $item_output The menu item's starting HTML output.
     * @param object $item        Menu item data object.
     * @param int    $depth       Depth of menu item. Used for padding.
     * @param array  $args        An array of arguments. @see wp_nav_menu()
     */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }    
}


class hue_topbarmenuright_walker extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
      $tem_output = $output . 'akhir';

      $found = preg_match_all('/<li (.*)<span>(.*?)<\/span><\/a>akhir/s', $tem_output, $matches);

      $foundid = preg_match_all('/<li id="menu\-item\-(.*?)"/s', $tem_output, $ids);

      if ($found) {
        $menu_title = $matches[count($matches)-1][0];

        if (count($ids[1])>0) {
          $menu_id = $ids[1][count($ids[1])-1];
        } else {
          $menu_id = rand (1000,9999);
        }


        $output .= '<label for="topright'.$menu_id.'" class="toggle-sub" onclick="">&rsaquo;</label>
        <input id="topright'.$menu_id.'" class="sub-nav-check" type="checkbox">
        <ul id="topright-sub-'.$menu_id.'" class="sub-nav"><li class="sub-heading">'. $menu_title .' <label for="topright'.$menu_id.'" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">&lsaquo; '.esc_html__('Back','hue').'</label></li>';
      }
  }

}

class hue_topbarmenuleft_walker extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
      $tem_output = $output . 'akhir';

      $found = preg_match_all('/<li (.*)<span>(.*?)<\/span><\/a>akhir/s', $tem_output, $matches);

      $foundid = preg_match_all('/<li id="menu\-item\-(.*?)"/s', $tem_output, $ids);

      if ($found) {
        $menu_title = $matches[count($matches)-1][0];

        if (count($ids[1])>0) {
          $menu_id = $ids[1][count($ids[1])-1];
        } else {
          $menu_id = rand (1000,9999);
        }


        $output .= '<label for="topleft'.$menu_id.'" class="toggle-sub" onclick="">&rsaquo;</label>
        <input id="topleft'.$menu_id.'" class="sub-nav-check" type="checkbox">
        <ul id="topleft-sub-'.$menu_id.'" class="sub-nav"><li class="sub-heading">'. $menu_title .' <label for="topleft'.$menu_id.'" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">&lsaquo; '.esc_html__('Back','hue').'</label></li>';
      }
  }

}

function hue_add_class_to_first_submenu($items) {
  $menuhaschild = array();

  foreach($items as $key => $item) {

    if (in_array('menu-item-has-children',$item->classes)) {
      $menuhaschild[] = $item->ID;
    }

  }

  foreach($menuhaschild as $key => $parent_id) {
    foreach($items as $key => $item) {
      if ($item->menu_item_parent==$parent_id) {
        $item->classes[] = 'menu-item-first-child';
        break;
      }
    }
  }


  return $items;
}

add_filter('wp_nav_menu_objects', 'hue_add_class_to_first_submenu');

add_filter( 'the_password_form', 'hue_password_form' );
function hue_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"><label class="pass-label" for="' . $label . '">' . esc_attr__('This content is password protected. To view it please enter your password below:','hue') . ' </label><br /><input name="post_password" id="' . $label . '" type="password"  size="20" />&nbsp;<input type="submit" name="Submit" class="btn-lg primary_color_button btn btn-ghost skin-dark" value="' . esc_attr__('Submit','hue') . '" />
    </form>
    ';
    return $o;
}

function hue_tag_cloud_args($args=array()){
  $args['filter']=1;
  return $args;

}

function hue_tag_cloud($return="",$tags, $args = '' ){

  if(!count($tags))
    return $return;
  $return='<ul class="list-unstyled">';
  foreach ($tags as $tag) {
    $return.='<li class="tag"><a href="'.esc_url($tag->link).'">'.ucwords($tag->name).'</a></li>';
  }
  $return.='</ul>';
  return $return;
}

function hue_widget_title($title="",$instance=array(),$id=null){

  if(empty($instance['title']))
      return "";
  return $title;
}

add_filter('widget_tag_cloud_args','hue_tag_cloud_args');
add_filter('wp_generate_tag_cloud','hue_tag_cloud',1,3);
add_filter('widget_title','hue_widget_title',1,3);

function detheme_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    if (isset($matches[1])) {
      return $matches[1];
    } else {
      return;
    }
}


// Comment Functions
function hue_comment_form( $args = array(), $post_id = null ) {
  if ( null === $post_id )
    $post_id = get_the_ID();
  else
    $id = $post_id;

  $commenter = wp_get_current_commenter();
  $user = wp_get_current_user();
  $user_identity = $user->exists() ? $user->display_name : '';

  $args = wp_parse_args( $args );
  if ( ! isset( $args['format'] ) )
    $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

  $req      = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );
  $html5    = 'html5' === $args['format'];
  
  $fields   =  array(
    'author' => '<div class="row">
                    <div class="form-group col-xs-12 col-sm-4">
                      <i class="icon-user-7"></i>
                      <input type="text" class="form-control" name="author" id="author" placeholder="'.esc_attr__('full name','hue').'" required>
                  </div>',
    'email' => '<div class="form-group col-xs-12 col-sm-4">
                      <i class="icon-mail-7"></i>
                      <input type="email" class="form-control"  name="email" id="email" placeholder="'.esc_attr__('email address','hue').'" required>
                  </div>',
    'url' => '<div class="form-group col-xs-12 col-sm-4">
                  <i class="icon-globe-6"></i>
                  <input type="text" class="form-control icon-user-7" name="url" id="url" placeholder="'.esc_attr__('website','hue').'">
                </div>
              </div>',
  );

  $required_text = sprintf( ' ' . esc_html__('Required fields are marked %s','hue'), '<span class="required">*</span>' );
  $defaults = array(
    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'        => '<div class="row">
                                  <div class="form-group col-xs-12">
                                    <textarea class="form-control" rows="3" name="comment" id="comment" placeholder="'.esc_html__('your comment','hue').'" required></textarea>
                                  </div>
                              </div>',
    'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.','hue'), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
    'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','hue'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
    'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.','hue') . ( $req ? $required_text : '' ) . '</p>',
    'comment_notes_after'  => '',
    'id_form'              => 'commentform',
    'id_submit'            => 'submit',
    'title_reply'          => esc_html__('Leave a Comment','hue'),
    'title_reply_to'       => esc_html__( 'Leave a Comment to %s','hue'),
    'cancel_reply_link'    => esc_html__( 'Cancel reply','hue'),
    'label_submit'         => esc_html__( 'Submit','hue' ),
    'format'               => 'html5',
  );

  $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

  ?>
    <?php if ( comments_open( $post_id ) ) : ?>
      <?php do_action( 'comment_form_before' ); ?>
      <section id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
        <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
          <?php echo wp_kses_data($args['must_log_in']); ?>
          <?php do_action( 'comment_form_must_log_in_after' ); ?>
        <?php else : ?>
          <form action="<?php echo esc_url(site_url( '/wp-comments-post.php' )); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form"<?php echo ($html5) ? ' novalidate' : ''; ?> data-abide>
            <?php do_action( 'comment_form_top' ); ?>
            <?php 
              if ( is_user_logged_in() ) :
                echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
                do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
                echo wp_kses_data($args['comment_notes_before']);
              else : 
                do_action( 'comment_form_before_fields' );
                foreach ( (array) $args['fields'] as $name => $field ) {
                  echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                }
                do_action( 'comment_form_after_fields' );
              endif; 
            ?>
            <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
            <?php echo wp_kses_data($args['comment_notes_after']); ?>
            <p class="form-submit">
              <input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" class="btn-lg primary_color_button btn btn-ghost skin-dark" />
              <?php comment_id_fields( $post_id ); ?>
            </p>
            <?php do_action( 'comment_form', $post_id ); ?>
          </form>
        <?php endif; ?>
      </section><!-- #respond -->
      <?php do_action( 'comment_form_after' ); ?>
    <?php else : ?>
      <?php do_action( 'comment_form_comments_closed' ); ?>
    <?php endif; ?>
  <?php
}

/**
 * Retrieve HTML content for reply to comment link.
 *
 * The default arguments that can be override are 'add_below', 'respond_id',
 * 'reply_text', 'login_text', and 'depth'. The 'login_text' argument will be
 * used, if the user must log in or register first before posting a comment. The
 * 'reply_text' will be used, if they can post a reply. The 'add_below' and
 * 'respond_id' arguments are for the JavaScript moveAddCommentForm() function
 * parameters.
 *
 * @since 2.7.0
 *
 * @param array $args Optional. Override default options.
 * @param int $comment Optional. Comment being replied to.
 * @param int $post Optional. Post that the comment is going to be displayed on.
 * @return string|bool|null Link to show comment form, if successful. False, if comments are closed.
 */
function hue_get_comment_reply_link($args = array(), $comment = null, $post = null) {
  global $user_ID;

  $defaults = array('add_below' => 'comment', 'respond_id' => 'respond', 'reply_text' => esc_html__('Reply','hue'),
    'login_text' => esc_html__('Log in to Reply','hue'), 'depth' => 0, 'before' => '', 'after' => '');

  $args = wp_parse_args($args, $defaults);

  if ( 0 == $args['depth'] || $args['max_depth'] <= $args['depth'] )
    return;

  extract($args, EXTR_SKIP);

  $comment = get_comment($comment);
  if ( empty($post) )
    $post = $comment->comment_post_ID;
  $post = get_post($post);

  if ( !comments_open($post->ID) )
    return false;

  $link = '';

  if ( get_option('comment_registration') && !$user_ID )
    $link = '<a rel="nofollow" class="comment-reply-login" href="' . esc_url( wp_login_url( get_permalink() ) ) . '">' . $login_text . '</a>';
  else 
    $link = "<a class='reply comment-reply-link btn btn-ghost skin-dark' href='#' onclick='return addComment.moveForm(\"$add_below-$comment->comment_ID\", \"$comment->comment_ID\", \"$respond_id\", \"$post->ID\")'>$reply_text</a>";
  
  return apply_filters('comment_reply_link', $before . $link . $after, $args, $comment, $post);
}

/**
 * Displays the HTML content for reply to comment link.
 *
 * @since 2.7.0
 * @see hue_get_comment_reply_link() Echoes result
 *
 * @param array $args Optional. Override default options.
 * @param int $comment Optional. Comment being replied to.
 * @param int $post Optional. Post that the comment is going to be displayed on.
 * @return string|bool|null Link to show comment form, if successful. False, if comments are closed.
 */
function hue_comment_reply_link($args = array(), $comment = null, $post = null) {
  echo hue_get_comment_reply_link($args, $comment, $post);
}

if ( ! function_exists( 'hue_edit_comment_link' ) ) :
  function hue_edit_comment_link( $link = null, $before = '', $after = '' ) {
    global $comment;

    if ( !current_user_can( 'edit_comment', $comment->comment_ID ) )
      return;

    if ( null === $link )
      $link = esc_html__('Edit This','hue');

    $link = '<a class="comment-edit-link primary_color_button btn btn-ghost skin-dark" href="' . esc_url(get_edit_comment_link( $comment->comment_ID )) . '">' . $link . '</a>';
    echo wp_kses_post($before . apply_filters( 'edit_comment_link', $link, $comment->comment_ID ) . $after);
  }
endif; 

if( ! function_exists( 'hue_comment_end_callback' )){

  function hue_comment_end_callback( $comment, $args, $depth){
    ?>
</li>
<?php 
  }

}
if ( ! function_exists( 'hue_comment' ) ) :
function hue_comment( $comment, $args, $depth ) {

  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
      // Display trackbacks differently than normal comments.
      ?>
      <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
      <p><?php esc_html_e( 'Pingback:', 'hue' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'hue' ), '<span class="edit-link">', '</span>' ); ?></p>
      </li>
      <?php
    break;
  
    default :
      // Proceed with normal comments.

      ?>
              <li class="comment_item media" id="comment-<?php print $comment->comment_ID; ?>">
                <div class="pull-<?php print is_rtl()?"right":"left";?> text-center">
                  <?php $avatar_url = detheme_get_avatar_url(get_avatar( $comment, 100 )); ?>
                  <a href="<?php echo esc_url(comment_author_url()); ?>"><img src="<?php echo esc_url($avatar_url); ?>" class="author-avatar img-responsive img-circle" alt="<?php comment_author(); ?>"></a>
                </div>
                <div class="media-body">
                  <div class="col-xs-12 col-sm-5<?php print is_rtl()?" col-sm-push-7":"";?> dt-comment-author"><?php comment_author(); ?></div>
                  <div class="col-xs-12 col-sm-7<?php print is_rtl()?" col-sm-pull-5":"";?> dt-comment-date secondary_color_text text-<?php print is_rtl()?"left":"right";?>"><?php comment_date('d.m.Y') ?></div>
                  <div class="col-xs-12 dt-comment-comment"><?php comment_text(); ?></div>
                  <div class="col-xs-12 text-<?php print is_rtl()?"left":"right";?> dt-comment-buttons">
                      <?php hue_comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'hue' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                      <?php hue_edit_comment_link( esc_html__( 'Edit', 'hue' ), '', '' ); ?>
                  </div>
                </div>
      <?php
    break;
  endswitch; // end comment_type check
}
endif; 

// function to display number of posts.
function detheme_get_post_views($postID){

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return sprintf(esc_html__("%d View",'hue'),0);
    } elseif ($count<=1) {
        return sprintf(esc_html__("%d View",'hue'),$count);  
    }


    $output = str_replace('%', number_format_i18n($count),esc_html__('% Views','hue'));
    return $output;
}

// function to count views.
function detheme_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function detheme_post_view_column(){

  $post_types = get_post_types( array(),'names' );

      foreach ( $post_types as $post_type ) {
        if ( in_array($post_type,array('page','attachment','wpcf7_contact_form','vc_grid_item','nav_menu_item','revision')))
            continue;

          add_filter('manage_'.$post_type.'_posts_columns', 'detheme_posts_column_views');
          add_action('manage_'.$post_type.'_posts_custom_column', 'detheme_posts_custom_column_views',5,2);
    }
}

add_action('admin_init','detheme_post_view_column');

function detheme_posts_column_views($defaults){
    $defaults['post_views'] = esc_html__('Views','hue');
    return $defaults;
}

function detheme_posts_custom_column_views($column_name, $id){

  if($column_name === 'post_views'){
        echo detheme_get_post_views(get_the_ID());
    }
}

if(!function_exists('detheme_is_ssl_mode')){
function detheme_is_ssl_mode(){
  $ssl=strpos("a".site_url(),'https://');

  return (bool)$ssl;
}}

function hue_maybe_ssl_url($url=""){
  return detheme_is_ssl_mode()?str_replace('http://', 'https://', $url):$url;
}

if (!function_exists('detheme_aq_resize')) {
  function detheme_aq_resize( $url, $width, $height = null, $crop = null, $single = true ) {

    if(!$url OR !($width || $height)) return false;

    //define upload path & dir
    $upload_info = wp_upload_dir();
    $upload_dir = $upload_info['basedir'];
    $upload_url = $upload_info['baseurl'];
    
    //check if $img_url is local
    /* Gray this out because WPML doesn't like it.
    if(strpos( $url, home_url('/') ) === false) return false;
    */
    
    //define path of image
    $rel_path = str_replace( str_replace( array( 'http://', 'https://' ),"",$upload_url), '', str_replace( array( 'http://', 'https://' ),"",$url));
    $img_path = $upload_dir . $rel_path;
    
    //check if img path exists, and is an image indeed
    if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;
    
    //get image info
    $info = pathinfo($img_path);
    $ext = $info['extension'];
    list($orig_w,$orig_h) = getimagesize($img_path);
    
    $dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
    if(!$dims){
      return $single?$url:array('0'=>$url,'1'=>$orig_w,'2'=>$orig_h);
    }

    $dst_w = $dims[4];
    $dst_h = $dims[5];

    //use this to check if cropped image already exists, so we can return that instead
    $suffix = "{$dst_w}x{$dst_h}";
    $dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

    //if orig size is smaller
    if($width >= $orig_w) {

      if(!$dst_h) :
        //can't resize, so return original url
        $img_url = $url;
        $dst_w = $orig_w;
        $dst_h = $orig_h;
        
      else :
        //else check if cache exists
        if(file_exists($destfilename) && getimagesize($destfilename)) {
          $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
        } 
        else {

          $imageEditor=wp_get_image_editor( $img_path );

          if(!is_wp_error($imageEditor)){

              $imageEditor->resize($width, $height, $crop );
              $imageEditor->save($destfilename);

              $resized_rel_path = str_replace( $upload_dir, '', $destfilename);
              $img_url = $upload_url . $resized_rel_path;


          }
          else{
              $img_url = $url;
              $dst_w = $orig_w;
              $dst_h = $orig_h;
          }

        }
        
      endif;
      
    }
    //else check if cache exists
    elseif(file_exists($destfilename) && getimagesize($destfilename)) {
      $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
    } 
    else {

      $imageEditor=wp_get_image_editor( $img_path );

      if(!is_wp_error($imageEditor)){
          $imageEditor->resize($width, $height, $crop );
          $imageEditor->save($destfilename);

          $resized_rel_path = str_replace( $upload_dir, '', $destfilename);
          $img_url = $upload_url . $resized_rel_path;
      }
      else{
          $img_url = $url;
          $dst_w = $orig_w;
          $dst_h = $orig_h;
      }


    }
    
    if(!$single) {
      $image = array (
        '0' => $img_url,
        '1' => $dst_w,
        '2' => $dst_h
      );
      
    } else {
      $image = $img_url;
    }
    
    return $image;
  }
}


function detheme_responsiveVideo($html, $url,$attr=array(),$post_ID=0) {

  $html=detheme_add_video_wmode_transparent($html);

  if (!is_admin() && !preg_match("/flex\-video/mi", $html) /*&& preg_match("/youtube|vimeo/", $url)*/) {
    $html = str_replace('frameborder="0"',' ',$html);
    $html="<div class=\"flex-video widescreen\">".$html."</div>";
  }
  return $html;
}

add_filter('embed_handler_html', 'detheme_responsiveVideo', 92, 3 ); 
add_filter('oembed_dataparse', 'detheme_responsiveVideo', 90, 3 );
add_filter('embed_oembed_html', 'detheme_responsiveVideo', 91, 4 );

function detheme_add_video_wmode_transparent($html) {
   if (strpos($html, "<iframe " ) !== false) {
      $search = array('?feature=oembed');
      $replace = array('?feature=oembed&amp;wmode=transparent&amp;rel=0&amp;autohide=1&amp;showinfo=0');
      $html = str_replace($search, $replace, $html);
      $html = preg_replace('/frameborder/si','style="border:none;" data-border',$html);
      return $html;
   } else {
      return $html;
   }
}

function detheme_makeBottomWidgetColumn($params){

  if('detheme-bottom'==$params[0]['id']){

    $class="col-sm-4";

    if($col=(int)get_detheme_option('dt-footer-widget-column')){

      switch($col){

          case 2:
                $class='col-md-6 col-sm-6 col-xs-6';
            break;
          case 3:
                $class='col-md-4 col-sm-6 col-xs-6';
            break;
          case 4:
                $class='col-lg-3 col-md-4 col-sm-6 col-xs-6';
            break;
          case 1:
          default:
                $class='col-sm-12';
            break;
      }
    }


    $makerow="";

    $params[0]['before_widget']='<div class="border-left '.$class.' col-'.$col.'">'.$params[0]['before_widget'];
    $params[0]['after_widget']=$params[0]['after_widget'].'</div>'.$makerow;

 }

  return $params;

}

function detheme_protected_meta($protected, $meta_key, $meta_type){

 $protected=(in_array($meta_key,
    array('vc_teaser','slide_template','pagebuilder','masonrycolumn','portfoliocolumn','portfoliotype','post_views_count','show_comment','show_social','sidebar_position','subtitle')
  ))?true:$protected;

  return $protected;
}

add_filter('is_protected_meta','detheme_protected_meta',1,3);
add_filter( 'dynamic_sidebar_params', 'detheme_makeBottomWidgetColumn' );

function detheme_fill_width_dummy_widget (){

   $col=1;
   if(get_detheme_option('dt-footer-widget-column')) {
      $col=(int)get_detheme_option('dt-footer-widget-column');
   }


   $sidebar = wp_get_sidebars_widgets();


   $itemCount=(isset($sidebar['detheme-bottom']))?count($sidebar['detheme-bottom']):0;

   switch($col){

          case 2:
                $class='col-md-6 col-sm-6 col-xs-6';
            break;
          case 3:
                $class='col-md-4 col-sm-6 col-xs-6';
            break;
          case 4:
                $class='col-lg-3 col-md-4 col-sm-6 col-xs-6';
            break;
          case 1:
          default:
                $class='col-sm-12';
            break;
  }


  if($itemCount % $col){
   print str_repeat("<div class=\"border-left dummy ".$class."\"></div>",$col - ($itemCount % $col));
 }
}

add_action('dynamic_sidebar_detheme-bottom','detheme_fill_width_dummy_widget');

function hue_remove_shortcode_from_content($content) {
  // remove shortcodes
  $content = strip_shortcodes( $content );

  // remove images
  $content = preg_replace('/<img[^>]+./','', $content);
  
  return $content;
}

function detheme_get_first_image_url_from_content() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  if (isset($post->post_content)) {
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches[1][0])) {
      $first_img = $matches[1][0];
    }
  }

  return $first_img;
}

/* vc_set_as_theme */

if(function_exists('vc_set_as_theme'))
{

  if(version_compare(WPB_VC_VERSION,'4.9.0','<')):

      function hue_vc_settings_general_callback(){


      $pt_array = ( $pt_array = get_option( 'wpb_js_content_types' ) ) ? ( $pt_array ) : vc_default_editor_post_types();

      $excludePostype=apply_filters( 'vc_settings_exclude_post_type',array( 'attachment', 'revision', 'nav_menu_item', 'mediapage' ));

      foreach ( get_post_types( array( 'public' => true )) as $pt) {
        if ( ! in_array( $pt, $excludePostype ) ) {
           $post_type_object=get_post_type_object($pt);
           $label = $post_type_object->labels->singular_name;
          ?>
          <label>
            <input type="checkbox"<?php echo ( in_array( $pt, $pt_array ) ) ? ' checked="checked"' : ''; ?> value="<?php echo esc_attr($pt); ?>"
                   id="wpb_js_post_types_<?php echo sanitize_title($pt); ?>"
                   name="wpb_js_content_types[]">
            <?php echo ucfirst(esc_html( $label )); ?>
          </label><br>
        <?php
        }
      }
      ?>
      <p
        class="description indicator-hint"><?php esc_html_e( "Select for which content types Visual Composer should be available during post creation/editing.", "hue" ); ?></p>
    <?php
        }

      function detheme_vc_settings_general(){
          add_settings_field('wpb_js_content_types',esc_html__( "Content types", "hue" ),'hue_vc_settings_general_callback','vc_settings_general','wpb_js_composer_settings_general');
      }

      add_action('admin_init','detheme_vc_settings_general',9999);   

  endif;

  add_action('init','hue_basic_grid_params');   

  function hue_basic_grid_params(){

      $post_types = get_post_types( array(),'names' );

      $post_types_list = array();
      foreach ( $post_types as $post_type ) {
          if ( $post_type !== 'revision' && $post_type !== 'nav_menu_item' ) {
              
              $post_type_object=get_post_type_object($post_type);

              $label = $post_type_object->labels->singular_name;

              $post_types_list[] = array( $post_type, ucfirst(esc_html( $label )) );
          }
      }

      $post_types_list[] = array( 'custom', esc_html__( 'Custom query', 'hue' ) );
      $post_types_list[] = array( 'ids', esc_html__( 'List of IDs', 'hue' ) );

      vc_add_param( 'vc_basic_grid', array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Data source', 'hue' ),
              'param_name' => 'post_type',
              'value' => $post_types_list,
              'description' => esc_html__( 'Select content type for your grid.', 'hue' )
      ));

  }


  if(detheme_plugin_is_active('hue_vc_addon/hue_vc_addon.php')){
  
      add_action('init','hue_vc_cta_2');   

      function hue_vc_cta_2(){

           vc_remove_param('vc_cta_button2','color');
            vc_add_param( 'vc_cta_button2', array( 
                    "type" => "dropdown",
                    "heading" => esc_html__("Button style", 'hue'),
                    "param_name" => "btn_style",
                    "value" => array(
                      esc_html__('Primary','hue')=>'color-primary',
                      esc_html__('Secondary','hue')=>'color-secondary',
                      esc_html__('Success','hue')=>'success',
                      esc_html__('Info','hue')=>'info',
                      esc_html__('Warning','hue')=>'warning',
                      esc_html__('Danger','hue')=>'danger',
                      esc_html__('Ghost Button','hue')=>'ghost',
                      esc_html__('Link','hue')=>'link',
                      ),
                    "std" => 'default',
                    "description" => esc_html__("Button style", 'hue')."."
                    )
            );
         vc_add_param( 'vc_cta_button2',
            array(
              "type" => "dropdown",
              "heading" => esc_html__("Size", 'hue'),
              "param_name" => "size",
                  "value" => array(
                    esc_html__('Large','hue')=>'btn-lg',
                    esc_html__('Default','hue')=>'btn-default',
                    esc_html__('Small','hue')=>'btn-sm',
                    esc_html__('Extra small','hue')=>'btn-xs'
                    ),
              "std" => 'btn-default',
              "description" => esc_html__("Button size", 'hue')
            ));
      }

      function hue_remove_meta_box_vc(){
        remove_meta_box( 'vc_teaser','page','side');
      }

      add_action('admin_init','hue_remove_meta_box_vc');   

    add_action('init','hue_custom_vc_row');  

    function hue_custom_vc_row(){

     vc_add_param( 'vc_row', array( 
          'heading' => esc_html__( 'Expand section width', 'hue' ),
          'param_name' => 'expanded',
          'class' => '',
          'value' => array(esc_html__('Expand Column','hue')=>'1',esc_html__('Expand Background','hue')=>'2'),
          'description' => esc_html__( 'Make section "out of the box".', 'hue' ),
          'type' => 'checkbox',
          'group'=>esc_html__('Extended options', 'hue')
      ) );

   
     vc_add_param( 'vc_row',   array( 
            'heading' => esc_html__( 'Background Type', 'hue' ),
            'param_name' => 'background_type',
            'value' => array('image'=>esc_html__( 'Image', 'hue' ),'video'=>esc_html__( 'Video', 'hue' )),
            'type' => 'radio',
            'group'=>esc_html__('Extended options', 'hue'),
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
                  'heading' => esc_html__( 'Video Source', 'hue' ),
                  'param_name' => 'video_source',
                  'value' => array('local'=>esc_html__( 'Local Server', 'hue' ),'youtube'=>esc_html__( 'Youtube/Vimeo', 'hue' )),
                  'type' => 'radio',
                  'group'=>esc_html__('Extended options', 'hue'),
                  'std'=>'local',
                  'dependency' => array( 'element' => 'background_type', 'value' => array('video') )   
           ));


         vc_add_param( 'vc_row', array( 
              'heading' => esc_html__( 'Background Video (mp4)', 'hue' ),
              'param_name' => 'background_video',
              'type' => 'attach_video',
              'group'=>esc_html__('Extended options', 'hue'),
              'dependency' => array( 'element' => 'video_source', 'value' => array('local') )   
          ) );

         vc_add_param( 'vc_row', array( 
              'heading' => esc_html__( 'Background Video (webm)', 'hue' ),
              'param_name' => 'background_video_webm',
              'type' => 'attach_video',
              'group'=>esc_html__('Extended options', 'hue'),
              'dependency' => array( 'element' => 'video_source', 'value' => array('local') )   
          ) );

         vc_add_param( 'vc_row', array( 
              'heading' => esc_html__( 'Background Image', 'hue' ),
              'param_name' => 'background_image',
              'type' => 'attach_image',
              'group'=>esc_html__('Extended options', 'hue'),
              'dependency' => array( 'element' => 'background_type', 'value' => array('image') )   
          ) );

          vc_add_param( 'vc_row',
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Video link', 'hue' ),
                'param_name' => 'video_bg_url',
                'group'=>esc_html__('Extended options', 'hue'),
                'description' => esc_html__( 'Add YouTube/Vimeo link', 'hue' ),
                'dependency' => array(
                  'element' => 'video_source',
                  'value' => array('youtube'),
                ),
           ));
      }
      else{

         vc_add_param( 'vc_row', array( 
              'heading' => esc_html__( 'Background Video (mp4)', 'hue' ),
              'param_name' => 'background_video',
              'type' => 'attach_video',
              'group'=>esc_html__('Extended options', 'hue'),
              'dependency' => array( 'element' => 'background_type', 'value' => array('video') )   
          ) );

         vc_add_param( 'vc_row', array( 
              'heading' => esc_html__( 'Background Video (webm)', 'hue' ),
              'param_name' => 'background_video_webm',
              'type' => 'attach_video',
              'group'=>esc_html__('Extended options', 'hue'),
              'dependency' => array( 'element' => 'background_type', 'value' => array('video') )   
          ) );

         vc_add_param( 'vc_row', array( 
              'heading' => esc_html__( 'Background Image', 'hue' ),
              'param_name' => 'background_image',
              'type' => 'attach_image',
              'group'=>esc_html__('Extended options', 'hue'),
              'dependency' => array( 'element' => 'background_type', 'value' => array('image') )   
          ) );


      }

     vc_add_param( 'vc_row', array( 
          'heading' => esc_html__( 'Extra id', 'hue' ),
          'param_name' => 'el_id',
          'type' => 'textfield',
          "description" => esc_html__("If you wish to add anchor id to this row. Anchor id may used as link like href=\"#yourid\"", 'hue'),
      ) );


     vc_add_param( 'vc_row_inner', array( 
          'heading' => esc_html__( 'Extra id', 'hue' ),
          'param_name' => 'el_id',
          'type' => 'textfield',
          "description" => esc_html__("If you wish to add anchor id to this row. Anchor id may used as link like href=\"#yourid\"", 'hue'),
      ) );

      vc_add_param( 'vc_row', array( 
          'heading' => esc_html__( 'Background Style', 'hue' ),
          'param_name' => 'background_style',
          'type' => 'dropdown',
          'value'=>array(
                esc_html__('No Repeat', 'hue') => 'no-repeat',
                esc_html__("Cover", 'hue') => 'cover',
                esc_html__('Contain', 'hue') => 'contain',
                esc_html__('Repeat', 'hue') => 'repeat',
                esc_html__("Parallax", 'hue') => 'parallax',
               esc_html__("Fixed", 'hue') => 'fixed',
              ),
          'group'=>esc_html__('Extended options', 'hue'),
          'dependency' => array( 'element' => 'background_type', 'value' => array('image') )       
      ) );
    }


  }

 add_action('init','detheme_vc_single_image');   

  function detheme_vc_single_image(){

      vc_add_param( 'vc_single_image', array( 
          'heading' => esc_html__( 'Image Hover Option', 'hue' ),
          'param_name' => 'image_hover',
          'type' => 'radio',
          'value'=>array(
                'none'=>esc_html__("None", 'hue'),
                'image'=>esc_html__("Image", 'hue'),
                'text'=>esc_html__("Text", 'hue'),
              ),
          'group'=>esc_html__('Extended options', 'hue'),
          'std' => 'none',  
          'dependency' => array(
            'element' => 'source',
            'value' => array( 'media_library', 'featured_image' )
          ),
     
      ) );

      vc_add_param( 'vc_single_image', array( 
          'heading' => esc_html__( 'Image', 'hue' ),
          'param_name' => 'image_hover_src',
          'type' => 'attach_image',
          'value'=>"",
          'holder'=>'div',
          'param_holder_class'=>'image-hover',
          'group'=>esc_html__('Extended options', 'hue'),
          'dependency' => array( 'element' => 'image_hover','value'=>array('image'))       
      ) );

      vc_add_param( 'vc_single_image', array( 
          'heading' => esc_html__( 'Animation Style', 'hue' ),
          'param_name' => 'image_hover_type',
          'type' => 'dropdown',
          'value'=>array(
              esc_html__('Default','hue')=>'default',
              esc_html__('From Left','hue')=>'fromleft',
              esc_html__('From Right','hue')=>'fromright',
              esc_html__('From Top','hue')=>'fromtop',
              esc_html__('From Bottom','hue')=>'frombottom',
            ),
          'group'=>esc_html__('Extended options', 'hue'),
          'dependency' => array( 'element' => 'image_hover','value'=>array('image'))       
      ) );

        vc_add_param( 'vc_single_image', array( 
            'heading' => esc_html__("Image style", "hue"),
            'param_name' => 'style',
            'type' => 'dropdown',
            'value'=>array(
                        esc_html__("Default",'hue') => "",
                        esc_html__('Rounded','hue') => 'vc_box_rounded',
                        esc_html__('Border','hue') => 'vc_box_border',
                        esc_html__('Outline','hue') => 'vc_box_outline',
                        esc_html__('Shadow','hue') => 'vc_box_shadow',
                        esc_html__('Bordered shadow','hue') => 'vc_box_shadow_border',
                        esc_html__('3D Shadow','hue') => 'vc_box_shadow_3d',
                        esc_html__('Round','hue') => 'vc_box_circle', //new
                        esc_html__('Round Border','hue') => 'vc_box_border_circle', //new
                        esc_html__('Round Outline','hue') => 'vc_box_outline_circle', //new
                        esc_html__('Round Shadow','hue') => 'vc_box_shadow_circle', //new
                        esc_html__('Round Border Shadow','hue') => 'vc_box_shadow_border_circle', //new
                        esc_html__('Circle','hue') => 'vc_box_circle_2', //new
                        esc_html__('Circle Border','hue') => 'vc_box_border_circle_2', //new
                        esc_html__('Circle Outline','hue') => 'vc_box_outline_circle_2', //new
                        esc_html__('Circle Shadow','hue') => 'vc_box_shadow_circle_2', //new
                        esc_html__('Circle Border Shadow','hue') => 'vc_box_shadow_border_circle_2', //new
                        esc_html__('Diamond','hue') => "dt_vc_box_diamond" //new from detheme
                    ),
          'dependency' => array(
            'element' => 'source',
            'value' => array( 'media_library', 'featured_image' )
          ),

        ) );



      vc_add_param( 'vc_single_image', array( 
          'heading' => esc_html__( 'Pre Title', 'hue' ),
          'param_name' => 'image_hover_pre_text',
          'type' => 'textfield',
          'value'=>"",
          'group'=>esc_html__('Extended options', 'hue'),
          'dependency' => array( 'element' => 'image_hover','value'=>array('text'))       
      ) );
      vc_add_param( 'vc_single_image', array( 
          'heading' => esc_html__( 'Title', 'hue' ),
          'param_name' => 'image_hover_text',
          'type' => 'textfield',
          'value'=>"",
          'group'=>esc_html__('Extended options', 'hue'),
          'dependency' => array( 'element' => 'image_hover','value'=>array('text'))       
      ) );
  }
}

/* end vc_set_as_theme */

add_filter( 'get_search_form','hue_get_search_form', 10, 1 );

function hue_get_search_form( $form ) {
    $format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
    $format = apply_filters( 'search_form_format', $format );

    if ( 'html5' == $format ) {
      $form = '<form method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
        <label>
          <span class="screen-reader-text">' . _x( 'Search for:', 'label','hue' ) . '</span>
          <i class="icon-search-6"></i>
          <input type="search" class="search-field" placeholder="'.esc_attr__('To search type and hit enter','hue').'" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label','hue' ) . '" />
        </label>
        <input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button', 'hue' ) .'" />
      </form>';
    } else {
      $form = '<form method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
        <div>
          <label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label','hue' ) . '</label>
          <i class="icon-search-6"></i>
          <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('To search type and hit enter','hue').'" />
          <input type="submit" id="searchsubmit" value="'. esc_attr_x( 'Search', 'submit button', 'hue' ) .'" />
        </div>
      </form>';
    }

  return $form;
}


add_filter( 'get_product_search_form','hue_get_product_search_form', 10, 1 );

function hue_get_product_search_form( $form ) {
  $form = '<form method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
      <div>
        <label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'hue' ) . '</label>
        <i class="icon-search-6"></i>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search for products', 'hue' ) . '" />
        <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'hue' ) .'" />
        <input type="hidden" name="post_type" value="product" />
      </div>
    </form>';

  return $form;
}

function is_detheme_home($post=null){

  if(!isset($post)) $post=get_post();

  return apply_filters('is_detheme_home',false,$post);
}


function detheme_remove_excerpt_more($excerpt_more=""){

  return "&hellip;";
}

add_filter('excerpt_more','detheme_remove_excerpt_more');

function detheme_prepost_vc_basic_grid_settings($content){

        $regexshortcodes=
        '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "(vc_basic_grid|vc_masonry_grid)"// 2: Shortcode name
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

  $content=preg_replace('/'.$regexshortcodes.'/s', '[$2 $3 post_id="'.get_the_ID().'"]', $content);
  return $content;

}

function get_detheme_pre_footer_page(){

  $post_ID=get_the_ID();

  $originalpost = $GLOBALS['post'];

  if(!get_detheme_option('showfooterpage',true) || !get_detheme_option('footerpage') || $post_ID==get_detheme_option('footerpage'))
    return;

  $post = detheme_get_wpml_post(get_detheme_option('footerpage'));
  if(!$post)  return;

  $old_sidebar=get_query_var('sidebar');

  set_query_var('sidebar','nosidebar');

  if(get_detheme_option('dt-header-type')=='leftbar'){
    $pre_footer_page="<div class=\"vertical_menu_container pre_footer_page\">".do_shortcode($post->post_content)."</div>";

    $custom_css = get_post_meta($post->ID, '_wpb_shortcodes_custom_css', true );
    if (!empty($custom_css)) { 
      wp_add_inline_style('hue-style', $custom_css);  
    }

  } else if($post){
    $GLOBALS['post']=$post;
    $pre_footer_page="<div class=\"pre_footer_page\">".do_shortcode(detheme_prepost_vc_basic_grid_settings($post->post_content))."</div>";

    $custom_css = get_post_meta($post->ID, '_wpb_shortcodes_custom_css', true );
    if (!empty($custom_css)) { 
      wp_add_inline_style('hue-style', $custom_css);  
    }
    
    $GLOBALS['post']=$originalpost;
  }

  set_query_var('sidebar',$old_sidebar);
  print $pre_footer_page;

}


add_action('hue_before_footer_section','get_detheme_pre_footer_page'); 

function get_detheme_post_footer_page(){

  $post_ID=get_the_ID();

  $originalpost = $GLOBALS['post'];

  if(!get_detheme_option('showfooterpage',true) || !get_detheme_option('postfooterpage') || $post_ID==get_detheme_option('postfooterpage'))
    return;


  $post = detheme_get_wpml_post(get_detheme_option('postfooterpage'));
  if(!$post)  return;

  $old_sidebar=get_query_var('sidebar');
  set_query_var('sidebar','nosidebar');

  if(get_detheme_option('dt-header-type')=='leftbar'){
    $post_footer_page="<div class=\"vertical_menu_container post_footer_page\">".do_shortcode($post->post_content)."</div>";

    $custom_css = get_post_meta($post->ID, '_wpb_shortcodes_custom_css', true );
    if (!empty($custom_css)) { 
      wp_add_inline_style('hue-style', $custom_css);  
    }

  } else if($post){
    $GLOBALS['post']=$post;
    $post_footer_page="<div class=\"post_footer_page\">".do_shortcode(detheme_prepost_vc_basic_grid_settings($post->post_content))."</div>";

    $custom_css = get_post_meta($post->ID, '_wpb_shortcodes_custom_css', true );
    if (!empty($custom_css)) { 
      wp_add_inline_style('hue-style', $custom_css);  
    }

    $GLOBALS['post']=$originalpost;
  }
  set_query_var('sidebar',$old_sidebar);

  print $post_footer_page;

}

add_action('hue_after_footer_section','get_detheme_post_footer_page'); 

/*wpml translation */

function detheme_get_wpml_post($post_id){

  if(!defined('ICL_LANGUAGE_CODE'))
        return get_post($post_id);

    global $wpdb;

   $postid = $wpdb->get_var(
      $wpdb->prepare("SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid=(SELECT trid FROM {$wpdb->prefix}icl_translations WHERE element_id='%d' LIMIT 1) AND element_id!='%d' AND language_code='%s'", $post_id,$post_id,ICL_LANGUAGE_CODE)
   );

  if($postid)
      return get_post($postid);
  
  return get_post($post_id);
}

function get_hue_menu_pagebar(){

  $post_ID=get_the_ID();
  $originalpost = $GLOBALS['post'];


  if(get_detheme_option('dt-header-type')!='pagebar' || !get_detheme_option('showpostmenupage') || !get_detheme_option('postmenupage') || 
    ($post_ID==get_detheme_option('postmenupage') && !is_search())) {
      return;
  }

  $post = detheme_get_wpml_post(get_detheme_option('postmenupage'));
  if(!$post)  return;

  $old_sidebar=get_query_var('sidebar');

  set_query_var('sidebar','nosidebar');

  $GLOBALS['post']=$post;
  print "<div id=\"".esc_attr('dt_pagebar')."\"><div class=\"dt_pagebar_menu\"><div class=\"menu_background_color\"></div></div><div class=\"dt_pagebar_wrapper\">".do_shortcode(detheme_prepost_vc_basic_grid_settings($post->post_content))."</div></div>";

  $GLOBALS['post']=$originalpost;

  set_query_var('sidebar',$old_sidebar);
}

add_action('after_menu_section','get_hue_menu_pagebar'); 

/* detheme-post*/

function hue_loadDethemePostTemplate(){

    global $post,$wp_query,$GLOBALS;

    if(!isset($post) || isset($_GET['type']))
        return true;

    $standard_type=$post->post_type;

    if(is_archive() && in_array($standard_type,array('essential_grid'))){

        $post_type_data = get_post_type_object( $standard_type);

        $post_type_slug = $post_type_data->rewrite['slug'];

        if(!$page = get_page_by_path($post_type_slug))
        return true;

        $query_vars=array(
        'post_type' => 'page',
        'page_id'=>$page->ID,
        'posts_per_page'=>1
        );

       $original_query_vars=$wp_query->query_vars;

       $wp_query->query($query_vars);
       if(!$wp_query->have_posts()){
           $wp_query->query($original_query_vars);
           return true;
       }

      $GLOBALS['post']=$page;
    }
    else{
      return true;
    }
}

add_action('template_redirect', 'hue_loadDethemePostTemplate');


/* essential grid post handle */

if (detheme_plugin_is_active('essential-grid/essential-grid.php')) {

  function hue_essential_grid_labels($labels){

    $dtpost_settings=get_option('essential_grid_settings');

    if(!$dtpost_settings || !is_array($dtpost_settings)){
      return $labels;
    }

    if(isset($dtpost_settings['label']) && ''!=$dtpost_settings['label']){

      $labels->label=$dtpost_settings['label'];
      $labels->all_items=$dtpost_settings['label'];
      $labels->menu_name=$dtpost_settings['label'];
      $labels->name=$dtpost_settings['label'];

    }

    if(isset($dtpost_settings['singular_label']) && ''!=$dtpost_settings['singular_label']){

      $labels->singular_label=$dtpost_settings['singular_label'];
      $labels->singular_name=$dtpost_settings['singular_label'];

    }

    if(isset($dtpost_settings['slug']) && ''!=$dtpost_settings['slug']){

      $labels->rewrite['slug']=$dtpost_settings['slug'];

    }
    return $labels;
  }

  function hue_essential_grid_setting_page($post){


    $dtpost_settings=get_option('essential_grid_settings',array('label'=>esc_html__("Ess. Grid Posts", 'hue'),'singular_label'=>esc_html__("Ess. Grid Post", 'hue'),'slug'=>''));

    if(wp_verify_nonce( isset($_POST['essential_grid-setting'])?$_POST['essential_grid-setting']:"", 'essential_grid-setting')){

         $dtpost_name=(isset($_POST['dtpost_name']))?$_POST['dtpost_name']:'';
         $singular_name=(isset($_POST['singular_name']))?$_POST['singular_name']:'';
         $rewrite_slug=(isset($_POST['dtpost_slug']))?$_POST['dtpost_slug']:'';

         $do_update=false;

         if($dtpost_name!=$dtpost_settings['label'] && ''!=$dtpost_name){
            $dtpost_settings['label']=$dtpost_name;
            $do_update=true;
         }

         if($singular_name!=$dtpost_settings['singular_label'] && ''!=$singular_name){
            $dtpost_settings['singular_label']=$singular_name;
            $do_update=true;
           
         }

         if($rewrite_slug!=$dtpost_settings['slug']){
            $dtpost_settings['slug']=$rewrite_slug;
            $do_update=true;
         
         }

         if($do_update){
             update_option('essential_grid_settings',$dtpost_settings);
         }

    }



    $args = array( 'page' => 'essential_grid_setting');
    $url = esc_url(add_query_arg( $args, admin_url( 'admin.php' )));

    $dtpost_name=$dtpost_settings['label'];
    $singular_name=$dtpost_settings['singular_label'];
    $slug=$dtpost_settings['slug'];
?>
<div class="dtpost-panel">
<h2><?php printf(esc_html__('%s Settings', 'hue'),ucwords($dtpost_name));?></h2>
<form method="post" action="<?php print esc_url($url);?>">
<?php wp_nonce_field( 'essential_grid-setting','essential_grid-setting');?>
<input name="option_page" value="reading" type="hidden"><input name="action" value="update" type="hidden">
<table class="form-table">
<tbody>
<tr>
<th scope="row"><label for="dtpost_name"><?php esc_html_e('Label Name','hue');?></label></th>
<td>
<input name="dtpost_name" id="dtpost_name" max-length="50" value="<?php print sanitize_text_field($dtpost_name);?>" class="" type="text"></td>
</tr>
<tr>
<th scope="row"><label for="singular_name"><?php esc_html_e('Singular Name','hue');?></label></th>
<td>
<input name="singular_name" id="singular_name" max-length="50" value="<?php print sanitize_text_field($singular_name);?>" class="" type="text"></td>
</tr>
<tr>
<th scope="row"><label for="dtpost_slug"><?php esc_html_e('Rewrite Slug','hue');?></label></th>
<td>
<input name="dtpost_slug" id="dtpost_slug" max-length="50" value="<?php print sanitize_text_field($slug);?>" class="" type="text"></td>
</tr>
</tbody></table>


<p class="submit"><input name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes','hue');?>" type="submit"></p></form>
</div>
<?php
  }

  function hue_essential_grid_seeting_menu(){
      add_theme_page(esc_html__('Portfolio Settings', 'hue'), esc_html__('Portfolio Settings', 'hue'),'manage_options','essential_grid_setting','hue_essential_grid_setting_page');
  }

  add_action('admin_menu', 'hue_essential_grid_seeting_menu');

  add_filter( 'post_type_labels_essential_grid', 'hue_essential_grid_labels');

  function hue_related_query_post_grid($query){

    if(isset($query['related']) && (bool)$query['related']){

      $query["post_type"]= get_post_type(get_the_id());
      $query['post__not_in']=(isset($query['post__not_in']) && is_array($query['post__not_in']))? array_push(get_the_id(),$query['post__not_in']):array(get_the_id());

      if($query["post_type"] == 'post'){

        $terms = get_the_terms( get_the_id(), 'category' );

        $query['tax_query']=array(
          array(
          'taxonomy'=>'category',
          'field' =>'id',
          'terms'=>$terms
          ),
          'relation'=>'OR');

      }
      elseif($query["post_type"] == 'essential_grid'){

        $terms = get_object_term_cache( get_the_id(), 'essential_grid_category' );

        $terms_ids=array();
        if($terms && count($terms)){
          foreach($terms as $term){
            $terms_ids[]=$term->term_id;
          }

        $query['tax_query']=array(
          array(
          'taxonomy'=>'essential_grid_category',
          'field' =>'id',
          'terms'=>$terms_ids
          ),
          'relation'=>'OR');
        }
        elseif(isset($query['tax_query'])){
          unset($query['tax_query']);
        }
      }
      elseif($query["post_type"] == 'dtpost'){

        $terms = get_object_term_cache( get_the_id(), 'dtpostcat' );

        $terms_ids=array();
        if($terms && count($terms)){
          foreach($terms as $term){
            $terms_ids[]=$term->term_id;
          }

        $query['tax_query']=array(
          array(
          'taxonomy'=>'dtpostcat',
          'field' =>'id',
          'terms'=>$terms_ids
          ),
          'relation'=>'OR');
        }
        elseif(isset($query['tax_query'])){
          unset($query['tax_query']);
        }
      }
      
    }
    return $query;
  }

  add_filter('essgrid_get_posts','hue_related_query_post_grid');

  add_filter('essgrid_query_caching','__return_false');


  function hue_ess_grid_post_type($post_type, $args){

    global $wp_post_types;

    if($post_type!='essential_grid') return true;

     $dtpost_settings = get_option('essential_grid_settings');

     if(!$dtpost_settings || !isset($dtpost_settings['slug']) || $dtpost_settings['slug']=='') return true;



     $essential_post=$wp_post_types['essential_grid'];
     $essential_post->has_archive=true;
     $essential_post->rewrite['slug']=$dtpost_settings['slug'];

     $wp_post_types['essential_grid']=$essential_post;

     add_rewrite_tag( "%$post_type%", '(.+?)', $args->query_var ? "{$args->query_var}=" : "post_type=$post_type&pagename=" );

     add_rewrite_rule( "{$dtpost_settings['slug']}/?$", "index.php?post_type=$post_type", 'top' );


     $permastruct_args = $args->rewrite;

     $permastruct_args['feed'] = isset($permastruct_args['feeds'])?$permastruct_args['feeds']:false;
     add_permastruct( $post_type, $dtpost_settings['slug']."/%$post_type%", $permastruct_args );
  }

  add_action( 'registered_post_type', 'hue_ess_grid_post_type',999,2);
}


/* comment setting */

function detheme_is_comment_open($open, $post_id){

  $post_type = get_post_type($post_id);
  if(!in_array($post_type,detheme_post_use_comment())){
    return ((bool)get_detheme_option('comment-open-'.$post_type)) && $open;
  }

  return $open;
}

add_filter( 'comments_open','detheme_is_comment_open',0,2);

/* dt carousel image size */

function detheme_create_carousel_size($out, $id){

  if(!$id) return $out;

  $img_url = wp_get_attachment_url($id);
  if($newsize=detheme_aq_resize($img_url,350,230,true,false)){
    return $newsize;
  }
  return $out;
}

add_filter('dt_carousel_pagination_image','detheme_create_carousel_size',1,2);

/** Breadcrumbs **/
/** http://dimox.net/wordpress-breadcrumbs-without-a-plugin/ **/

function detheme_dimox_breadcrumb($args=array()){

  $args=wp_parse_args($args,array(
    'wrap_before' => '<div class="breadcrumbs">',
    'wrap_after' => '</div>',
    'format' => '<span%s>%s</span>',
    'delimiter'=>'/',
    'current_class' => 'current',
    'home_text' => esc_html__('Home','hue'), 
    'home_link' => home_url('/')
   ));

   $breadcrumbs=detheme_get_breadcrumbs($args);

    if (detheme_plugin_is_active('woocommerce/woocommerce.php') && (is_product()||is_cart()||is_checkout()||is_shop()||is_product_category())) {
      // do nothing
      // woocomerce has different breadcrumb method
    } else {
       $out=$args['wrap_before'];
       $out.=join($args['delimiter']."\n",is_rtl()?array_reverse($breadcrumbs):$breadcrumbs);
       $out.=$args['wrap_after'];
       print $out;
    }
}

if ( ! function_exists( 'detheme_woocommerce_breadcrumb' ) ) {

  /**
   * Output the WooCommerce Breadcrumb
   */
  function detheme_woocommerce_breadcrumb(&$breadcrumbs, $args = array() ) {
    $wc_breadcrumb_args = array(
      'delimiter' => $args['delimiter'],
      'wrap_before' => '<div class="breadcrumbs">',
      'wrap_after' => '</div>',
      'before' => '<span>',
      'beforecurrent' => '<span class="current">',
      'after' => '</span>',
      'home' => $args['home_text'],
    );

    woocommerce_breadcrumb($wc_breadcrumb_args);

  }
}



function detheme_get_breadcrumbs($breadcrumb_args) {
  global $post;

   $breadcrumbs[]=sprintf($breadcrumb_args['format'],is_front_page()?' class="current"':'','<a href="'.esc_url($breadcrumb_args['home_link']).'" title="'.$breadcrumb_args['home_text'].'">'.$breadcrumb_args['home_text'].'</a>');

  if (is_front_page()) { // home page
  } elseif (is_home()) { // blog page
      detheme_get_breadcrumbs_from_menu(get_option('page_for_posts'),$breadcrumbs,$breadcrumb_args);

  } elseif (is_singular('dtpost')||is_singular('dtreportpost')||is_singular('essential_grid')) {


      $post_type_data = get_post_type_object($post->post_type);
      $post_type_slug = $post_type_data->rewrite['slug'];
      $page = get_page_by_path($post_type_slug);

      if ($page) {
        detheme_get_breadcrumbs_from_menu($page->ID,$breadcrumbs,$breadcrumb_args,false);
      }

      array_push($breadcrumbs, sprintf($breadcrumb_args['format']," class=\"".$breadcrumb_args['current_class']."\"",$post->post_title));

  } elseif (is_singular()) {
        if (detheme_plugin_is_active('woocommerce/woocommerce.php') && (is_product()||is_cart()||is_checkout())) {

            detheme_woocommerce_breadcrumb($breadcrumbs,$breadcrumb_args);
        } else if (is_single()) {
            detheme_get_breadcrumbs_from_menu(get_option('page_for_posts'),$breadcrumbs,$breadcrumb_args,false);
            array_push($breadcrumbs, sprintf($breadcrumb_args['format']," class=\"".$breadcrumb_args['current_class']."\"",$post->post_title));
        } else {
            detheme_get_breadcrumbs_from_menu($post->ID,$breadcrumbs,$breadcrumb_args);
            if (count($breadcrumbs) < 2 ) {
              array_push($breadcrumbs, sprintf($breadcrumb_args['format']," class=\"".$breadcrumb_args['current_class']."\"",$post->post_title));
            }
        }
  } else {
      $post_id = -1;
      if (detheme_plugin_is_active('woocommerce/woocommerce.php') && (is_shop()||is_product_category())) {

        detheme_woocommerce_breadcrumb($breadcrumbs,$breadcrumb_args);

      } else {

        if(is_category()){
          $breadcrumbs[]=sprintf($breadcrumb_args['format']," class=\"".$breadcrumb_args['current_class']."\"",single_cat_title(' ',false));
        }
        elseif(is_archive()){
          $breadcrumbs[]=sprintf($breadcrumb_args['format']," class=\"".$breadcrumb_args['current_class']."\"",is_tag()||is_tax()?single_tag_title(' ',false):single_month_title( ' ', false ));
        }
        else{
          if (isset($post->ID)) {
            $post_id = $post->ID;
            detheme_get_breadcrumbs_from_menu($post_id,$breadcrumbs,$breadcrumb_args);
          }
        }
      }
  }

  return apply_filters('detheme_dimox_breadcrumbs',$breadcrumbs,$breadcrumb_args);
}


function detheme_get_breadcrumbs_from_menu($post_id,&$breadcrumbs,$args,$iscurrent=true) {
  $primary = get_nav_menu_locations();

  if (isset($primary['primary'])) {
    $navs = wp_get_nav_menu_items($primary['primary']);

    if (!empty($navs)) :
      foreach ($navs as $nav) {
        if (($nav->object_id)==$post_id) {

          if ($nav->menu_item_parent!=0) {
            //start recursive by menu parent
            detheme_get_breadcrumbs_from_menu_by_menuid($nav->menu_item_parent,$breadcrumbs,$args);
          }

          if ($iscurrent) {
            array_push($breadcrumbs, sprintf($args['format']," class=\"".$args['current_class']."\"",$nav->title));
          } else {
            array_push($breadcrumbs, sprintf($args['format'],"", '<a href="'.esc_url($nav->url).'" title="'.esc_attr($nav->title).'">'.$nav->title .'</a>' ));
          }

          break;
        }
      }
    endif; //if (!empty($navs))
  }  
}

function detheme_get_breadcrumbs_from_menu_by_menuid($menu_id,&$breadcrumbs,$args) {
  $primary = get_nav_menu_locations();

  if (isset($primary['primary'])) {
    $navs = wp_get_nav_menu_items($primary['primary']);

    foreach ($navs as $nav) {
      if (($nav->ID)==$menu_id) {

        if ($nav->menu_item_parent!=0) {
          //recursive by menu parent
          detheme_get_breadcrumbs_from_menu_by_menuid($nav->menu_item_parent,$breadcrumbs,$args);
        }

        array_push($breadcrumbs, sprintf($args['format'],"",'<a href="'.esc_url($nav->url).'" title="'.esc_attr($nav->title).'">'.$nav->title .'</a>'));

        break;
      }
    } 
  } 
}


function hue_remove_blog_slug( $wp_rewrite ) {
  if ( ! is_multisite() )
    return;
  // check multisite and main site
  if ( ! is_main_site() )
    return;

  // set checkup
  $rewrite = FALSE;

  // update_option
  $wp_rewrite->permalink_structure = preg_replace( '!^(/)?blog/!', '$1', $wp_rewrite->permalink_structure );
  update_option( 'permalink_structure', $wp_rewrite->permalink_structure );

  // update the rest of the rewrite setup
  $wp_rewrite->author_structure = preg_replace( '!^(/)?blog/!', '$1', $wp_rewrite->author_structure );
  $wp_rewrite->date_structure = preg_replace( '!^(/)?blog/!', '$1', $wp_rewrite->date_structure );
  $wp_rewrite->front = preg_replace( '!^(/)?blog/!', '$1', $wp_rewrite->front );

  // walk through the rules
  $new_rules = array();
  foreach ( $wp_rewrite->rules as $key => $rule )
    $new_rules[ preg_replace( '!^(/)?blog/!', '$1', $key ) ] = $rule;
  $wp_rewrite->rules = $new_rules;

  // walk through the extra_rules
  $new_rules = array();
  foreach ( $wp_rewrite->extra_rules as $key => $rule )
    $new_rules[ preg_replace( '!^(/)?blog/!', '$1', $key ) ] = $rule;
  $wp_rewrite->extra_rules = $new_rules;

  // walk through the extra_rules_top
  $new_rules = array();
  foreach ( $wp_rewrite->extra_rules_top as $key => $rule )
    $new_rules[ preg_replace( '!^(/)?blog/!', '$1', $key ) ] = $rule;
  $wp_rewrite->extra_rules_top = $new_rules;

  // walk through the extra_permastructs
  $new_structs = array();
  foreach ( $wp_rewrite->extra_permastructs as $extra_permastruct => $struct ) {
    $struct[ 'struct' ] = preg_replace( '!^(/)?blog/!', '$1', $struct[ 'struct' ] );
    $new_structs[ $extra_permastruct ] = $struct;
  }
  $wp_rewrite->extra_permastructs = $new_structs;
} 

add_action( 'generate_rewrite_rules', 'hue_remove_blog_slug' );


function hue_woocommerce_product_settings($settings=array()){


  if(is_array($settings) && count($settings)){

    $newsettings=array();

    foreach ($settings as $key => $setting) {

      array_push($newsettings, $setting);
      if('woocommerce_shop_page_id'==$setting['id']){

                array_push($newsettings,
                      
                        array(
                        'title'    => esc_html__( 'Product Display Columns', 'hue' ),
                        'desc'     => esc_html__( 'This controls num column product display', 'hue' ),
                        'id'       => 'loop_shop_columns',
                        'class'    => 'wc-enhanced-select',
                        'css'      => 'min-width:300px;',
                        'default'  => '4',
                        'type'     => 'select',
                        'options'  => array(
                          '2' => esc_html__( 'Two Columns', 'hue' ),
                          '3' => esc_html__( 'Three Columns', 'hue' ),
                          '4' => esc_html__( 'Four Columns', 'hue' ),
                          '5' => esc_html__( 'Five Columns', 'hue' ),
                        ),
                        'desc_tip' =>  true,
                      )
                );
      }


    }

    return $newsettings;

  }

  return $settings;
}

add_filter( 'loop_shop_columns',create_function('$column','return ($col=get_option(\'loop_shop_columns\'))?$col:$column;'));
add_filter('woocommerce_product_settings','hue_woocommerce_product_settings');

 add_filter("dt_carousel_navigation_btn",'hue_dt_carousel_pagination');

 function hue_dt_carousel_pagination($pagination){
  return array('<span class="btn-owl prev page"><i class="icon-angle-left"></i></span>','<span class="page">/</span>','<span class="btn-owl next page"><i class="icon-angle-right"></i></span>');
 }

/* auto update handle */
function detheme_automatic_updater_disabled($disabled){

    $core_automatic_update=get_detheme_option('core_automatic_update');
    if("minor"==$core_automatic_update){
      add_filter('allow_dev_auto_core_updates','__return_false');
      add_filter('allow_minor_auto_core_updates','__return_true');
      add_filter('allow_major_auto_core_updates','__return_false');
    }
    elseif('true'==$core_automatic_update){
      add_filter('allow_dev_auto_core_updates','__return_true');
      add_filter('allow_minor_auto_core_updates','__return_true');
      add_filter('allow_major_auto_core_updates','__return_true');
    }
    else{
      add_filter('allow_dev_auto_core_updates','__return_false');
      add_filter('allow_minor_auto_core_updates','__return_false');
      add_filter('allow_major_auto_core_updates','__return_false');
    }


  return !(bool)get_detheme_option('disable_automatic_update');
}

add_filter('automatic_updater_disabled','detheme_automatic_updater_disabled');

function hue_banner_height_setting($height){

  if(get_post_type()=='essential_grid'){
    return get_detheme_option('dt-ess-banner-height');
  }

  return $height;
}

add_filter('detheme_banner_height','hue_banner_height_setting');

add_filter( 'wp_nav_menu_items','detheme_add_search_box_to_menu', 10, 2 );

function detheme_add_search_box_to_menu( $items, $args ) {
  if(get_detheme_option('dt-header-type')=='middle') :

    if(get_detheme_option('show-header-shoppingcart')):
      if( $args->theme_location == 'primary' ) :
        if ( detheme_plugin_is_active('woocommerce/woocommerce.php') ) :

          if ( function_exists('WC') && sizeof( WC()->cart->get_cart() ) > 0 ) :
            $items .= '<li id="menu-item-999999" class="hidden-mobile bag menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-999999">
                      <a href="#">
                        <span><i class="icon-cart"></i><span class="item_count">'. WC()->cart->get_cart_contents_count() . '</span></span>
                      </a>
                        
                      <label for="fof999999" class="toggle-sub" onclick="">&rsaquo;</label>
                      <input id="fof999999" class="sub-nav-check" type="checkbox">
                      <ul id="fof-sub-999999" class="sub-nav">
                        <li class="sub-heading">'.esc_html__('Shopping Cart','hue').' <label for="fof999999" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">&lsaquo; '.esc_html__('Back','hue').'</label></li>
                        <li>
                          <!-- popup -->
                          <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                          <!-- end popup -->
                        </li>
                      </ul>

                    </li>';
          else:
              $items .= '<li id="menu-item-999999" class="hidden-mobile bag menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-999999">
                        <a href="#">
                          <span><i class="icon-cart"></i> <span class="item_count">0</span></span>
                        </a>
    
                        <label for="fof999999" class="toggle-sub" onclick="">&rsaquo;</label>
                        <input id="fof999999" class="sub-nav-check" type="checkbox">
                        <ul id="fof-sub-999999" class="sub-nav">
                          <li class="sub-heading">'.esc_html__('Shopping Cart','hue').' <label for="fof999999" class="toggle" onclick="" title="'.esc_attr__('Back','hue').'">&lsaquo; '.esc_html__('Back','hue').'</label></li>
                          <li>
                            <!-- popup -->
                            <div class="cart-popup"><div class="widget_shopping_cart_content"></div></div>  
                            <!-- end popup -->
                          </li>
                        </ul>

                      </li>';
          endif; //if ( function_exists('WC') && sizeof( WC()->cart->get_cart() ) > 0 )
        endif; //if ( detheme_plugin_is_active('woocommerce/woocommerce.php') )

      endif; //if( $args->theme_location == 'primary' )

    endif; //if(get_detheme_option('show-header-shoppingcart')):

  endif; //if(get_detheme_option('dt-header-type')=='middle') :

  return $items;
}

function detheme_style_loader_tag($tag){

  return preg_replace('/\<link/','<link property', $tag);
}
add_filter('style_loader_tag','detheme_style_loader_tag');

if ( ! function_exists( 'detheme_remove_http' ) ) {
  function detheme_remove_http($url) {
    //Remove http: to make URL compatible on SSL / HTTPS site
    $url = str_replace('http:','',$url);
    $url = str_replace('https:','',$url);
    return $url;
  } //function detheme_remove_http
} //if ( ! function_exists( 'detheme_remove_http' ) )

if ( ! function_exists( 'detheme_hex2rgba' ) ) {
  function detheme_hex2rgba( $hex, $alpha = '' ) {
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
  } //function detheme_hex2rgba
} //if ( ! function_exists( 'detheme_hex2rgba' ) )

function hue_set_blog_masonry_posts_per_page($query) {
    if (($query->is_posts_page==1) && (get_detheme_option('blog_type')=='masonry')) {
      $query->set( 'posts_per_page', -1 );
      return;
    }
}

add_action('pre_get_posts','hue_set_blog_masonry_posts_per_page');

function detheme_get_link_pages_args() {
  $detheme_link_pages_args = array(
    'before'           => '<div class="row"><div class="billio_link_page container">',
    'after'            => '</div></div>',
    'link_before'      => '<span class="page-numbers">',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'separator'        => ' ',
    'nextpagelink'     => esc_html__( 'Next page','hue' ),
    'previouspagelink' => esc_html__( 'Previous page','hue' ),
    'pagelink'         => '%',
    'echo'             => 1
  );

  return $detheme_link_pages_args;
}

function detheme_set_global_more($value=0) {
  global $more;

  $more = $value;
}

function detheme_set_global_more_post() {
  global $more;

  if (is_single()) {
    $more = 1;
  } else {
    $more = 0;
  }
}

function detheme_set_global_style($value) {
  global $detheme_Style;

  $detheme_Style[] = $value;     
}

function detheme_get_global_var($varname) {
  if (isset($GLOBALS[$varname])) {
    return $GLOBALS[$varname];  
  }
}

function detheme_set_global_var($varname,$value) {
  if (isset($GLOBALS[$varname])) {
    $GLOBALS[$varname] = $value;  
  }
}

function hue_page_menu( $args = array() ) {
  $defaults = array(
    'sort_column'  => 'menu_order, post_title',
    'container'    => 'div',
    'echo'         => true,
    'link_before'  => '',
    'link_after'   => '',
    'before'       => '<ul>',
    'after'        => '</ul>',
    'item_spacing' => 'discard',
    'items_wrap'   => '',
    'walker'       => '',
  );
  $args = wp_parse_args( $args, $defaults );

  if ( ! in_array( $args['item_spacing'], array( 'preserve', 'discard' ) ) ) {
    // invalid value, fall back to default.
    $args['item_spacing'] = $defaults['item_spacing'];
  }

  if ( 'preserve' === $args['item_spacing'] ) {
    $t = "\t";
    $n = "\n";
  } else {
    $t = '';
    $n = '';
  }

  /**
   * Filters the arguments used to generate a page-based menu.
   *
   * @since 2.7.0
   *
   * @see wp_page_menu()
   *
   * @param array $args An array of page menu arguments.
   */
  $args = apply_filters( 'hue_page_menu_args', $args );

  $menu = '';

  $list_args = $args;

  // Show Home in the menu
  if ( ! empty($args['show_home']) ) {
    if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
      $text = __('Home','hue');
    else
      $text = $args['show_home'];
    $class = '';
    if ( is_front_page() && !is_paged() )
      $class = 'class="current_page_item"';
    $menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
    // If the front page is a page, add it to the exclude list
    if (get_option('show_on_front') == 'page') {
      if ( !empty( $list_args['exclude'] ) ) {
        $list_args['exclude'] .= ',';
      } else {
        $list_args['exclude'] = '';
      }
      $list_args['exclude'] .= get_option('page_on_front');
    }
  }

  $list_args['echo'] = false;
  $list_args['title_li'] = '';
  $menu .= wp_list_pages( $list_args );

  $container = sanitize_text_field( $args['container'] );

  // Fallback in case `wp_nav_menu()` was called without a container.
  if ( empty( $container ) ) {
    $container = 'div';
  }

  if ( $menu ) {

    // wp_nav_menu doesn't set before and after
    if ( isset( $args['fallback_cb'] ) &&
      'hue_page_menu' === $args['fallback_cb'] &&
      'ul' !== $container ) {
      $args['before'] = $args['items_wrap'] . "<ul>{$n}";
      $args['after'] = '</ul>';
    }

    $menu = $args['before'] . $menu . $args['after'];
  }

  $attrs = '';
  if ( ! empty( $args['menu_id'] ) ) {
    $attrs .= ' id="' . esc_attr( $args['menu_id'] ) . '"';
  }

  if ( ! empty( $args['menu_class'] ) ) {
    $attrs .= ' class="' . esc_attr( $args['menu_class'] ) . '"';
  }

  $menu = "<{$container}{$attrs}>" . $menu . "</{$container}>{$n}";

  /**
   * Filters the HTML output of a page-based menu.
   *
   * @since 2.7.0
   *
   * @see wp_page_menu()
   *
   * @param string $menu The HTML output.
   * @param array  $args An array of arguments.
   */
  $menu = apply_filters( 'hue_page_menu', $menu, $args );
  if ( $args['echo'] )
    echo $menu;
  else
    return $menu;
} //function hue_page_menu


?>