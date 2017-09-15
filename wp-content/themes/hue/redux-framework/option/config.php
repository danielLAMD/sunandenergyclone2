<?php
defined('ABSPATH') or die();

function detheme_post_use_sidebar_layout(){

  return apply_filters('post_type_sidebar_layout_filter',array('revision','nav_menu_item','post','page','product_variation','shop_order','shop_webhook','shop_coupon','shop_order_refund','attachment'));
}


function detheme_post_use_comment(){

  return apply_filters('post_type_comment_filter',array('revision','nav_menu_item','product','product_variation','shop_order','shop_webhook','shop_coupon','shop_order_refund','attachment'));
}


if (!function_exists('detheme_redux_init')) :
	function detheme_redux_init() {


	global $wp_filesystem;

	if (empty($wp_filesystem)) {
		require_once(ABSPATH .'/wp-admin/includes/file.php');
		require_once(ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php');
		require_once(ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php');
		WP_Filesystem();
	}  		

	/* internationalise */

    $domain = 'redux-framework';
    $locale = get_locale();
    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
    load_textdomain( $domain, get_template_directory() . '/redux-framework/ReduxCore/languages/' . $domain . '-' . $locale . '.mo' );


	/**
		ReduxFramework Sample Config File
		For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
	**/


	/**
	 
		Most of your editing will be done in this section.

		Here you can override default values, uncomment args and change their values.
		No $args are required, but they can be overridden if needed.
		
	**/
	$args = array();


	// For use with a tab example below
	$tabs = array();

	ob_start();

	$ct = wp_get_theme();
	$theme_data = $ct;
	$item_name = $theme_data->get('Name'); 
	$tags = $ct->Tags;
	$screenshot = $ct->get_screenshot();
	$class = $screenshot ? 'has-screenshot' : '';

	$customize_title = sprintf( esc_html__( 'Customize &#8220;%s&#8221;','redux-framework' ), $ct->display('Name') );



	?>
	<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
		<h4>
			<?php echo wp_kses_data($ct->display('Name')); ?>
		</h4>

		<div>
			<ul class="theme-info">
				<li><?php printf( esc_html__('By %s','redux-framework'), $ct->display('Author') ); ?></li>
				<li><?php printf( esc_html__('Version %s','redux-framework'), $ct->display('Version') ); ?></li>
			</ul>
			<p class="theme-description"><?php esc_html($ct->display('Description')); ?></p>
			<?php if ( $ct->parent() ) {
				printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.','redux-framework' ) . '</p>',
					esc_html__( 'http://codex.wordpress.org/Child_Themes','redux-framework' ),
					$ct->parent()->display( 'Name' ) );
			} ?>
			
		</div>

	</div>

	<?php
	$item_info = ob_get_contents();
	    
	ob_end_clean();

	$sampleHTML = '';
	if( file_exists( get_template_directory().'/redux-framework/option/info-html.html' )) {
		/** @global WP_Filesystem_Direct $wp_filesystem  */

		global $wp_filesystem;
		if (!empty($wp_filesystem)) {
			$sampleHTML = $wp_filesystem->get_contents(get_template_directory().'/redux-framework/option/info-html.html');
		}  		
	}



	$icon_info='';
	$args['dev_mode'] = false;
	$args['opt_name'] = 'detheme_config';
	$theme = wp_get_theme();
	$args['display_name'] = $theme->get('Name');
	$args['display_version'] = $theme->get('Version');
	$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';
	$args['share_icons']['twitter'] = array(
	    'link' => 'http://twitter.com/detheme',
	    'title' => 'Follow me on Twitter', 
	    'img' => DethemeReduxFramework::$_url . 'assets/img/social/Twitter.png'
	);

	$args['share_icons']['facebook'] = array(
	    'link' => 'https://www.facebook.com/detheme',
	    'title' => 'Find me on Facebook', 
	    'img' => DethemeReduxFramework::$_url . 'assets/img/social/Facebook.png'
	);
	$args['show_import_export'] = true;
	$args['menu_title'] = esc_html__('Theme Options', 'redux-framework');
	$args['page_title'] = esc_html__('Options', 'redux-framework');

	$args['page_slug'] = 'redux_options';

	$args['default_show'] = false;
	$args['default_mark'] = '';

	$args['intro_text'] = $args['menu_title'];


	$sections = array();              

	//$dt_theme_images  = substr_replace(DethemeReduxFramework::$_url,'images',strpos(DethemeReduxFramework::$_url,'redux-framework'));
	$dt_theme_images  = get_template_directory_uri() . '/images';
   
	$sections['general'] = array(
		'icon' => 'el-icon-cogs',
		'title' => esc_html__('General', 'redux-framework'),
		'fields' => array(
			array(
				'id'=>'devider-1',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('General Settings', 'redux-framework')."</h2>",
				),	
			array(
				'id'=>'layout',
				'type' => 'image_select',
				'compiler'=>true,
				'title' => esc_html__('Main Layout', 'redux-framework'), 
				'subtitle' => esc_html__('Select main layout for the site', 'redux-framework'),
				'options' => array(
						'1' => array('alt' => '1 Column', 'img' => DethemeReduxFramework::$_url.'assets/img/boxed.png'),
						'2' => array('alt' => '2 Column Left', 'img' => DethemeReduxFramework::$_url.'assets/img/side-bar-left-boxed.png'),
						'3' => array('alt' => '2 Column Right', 'img' => DethemeReduxFramework::$_url.'assets/img/side-bar-right-boxed.png'),
						'4' => array('alt' => 'Fullwidh', 'img' => DethemeReduxFramework::$_url.'assets/img/full-width.png')
					),
				'default' => '2'
				),
			)
		);

  	$post_types = get_post_types( array());
      foreach ( $post_types as $post_type ) {
          if (!in_array($post_type, detheme_post_use_sidebar_layout())) {
              

	        $post_type_object=get_post_type_object($post_type);

	        if($post_type_object->name=='product'){
	        	$post_type_object->labels->name=$post_type_object->labels->singular_name="Woocommerce Product";
	        }

	        $label = $post_type_object->labels->singular_name;

	        if($post_type_object->public){

	          	array_push($sections['general']['fields'],
				array(
					'id'=>'layout_'.$post_type,
					'type' => 'image_select',
					'compiler'=>true,
					'title' => sprintf(esc_html__('%s Layout', 'redux-framework'),ucfirst($post_type_object->labels->name)), 
					'subtitle' => sprintf(esc_html__('Select layout for the %s page', 'redux-framework'),strtolower($label)),
					'options' => array(
							'1' => array('alt' => '1 Column', 'img' => DethemeReduxFramework::$_url.'assets/img/boxed.png'),
							'2' => array('alt' => '2 Column Left', 'img' => DethemeReduxFramework::$_url.'assets/img/side-bar-left-boxed.png'),
							'3' => array('alt' => '2 Column Right', 'img' => DethemeReduxFramework::$_url.'assets/img/side-bar-right-boxed.png'),
							'4' => array('alt' => 'Fullwidh', 'img' => DethemeReduxFramework::$_url.'assets/img/full-width.png')
						),
					'default' => '2'
					));
	         }
          }
      }



	$sections['general']['fields']=array_merge($sections['general']['fields'],array(
			array(
				'id'		=> 'boxed_layout_activate',
				'title' 	=> esc_html__('Boxed Layout', 'redux-framework'), 
				'subtitle'		=> esc_html__('Enable or Disable the boxed layout','redux-framework'),
				'type'		=> 'switch',
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework'),
				'default' 	=> 0
			),
			array(
				'id'		=> 'boxed_layout_stretched',
				'title' 	=> esc_html__('Stretched', 'redux-framework'), 
				'subtitle'		=> esc_html__('Enable or Disable the stretched boxed layout','redux-framework'),
				'type'		=> 'switch',
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework'),
				'default' 	=> 0
			),
			array(
				'id'=>'boxed_layout_boxed_background_image',
				'type' => 'media', 
				'title' => esc_html__('Boxed Background Image', 'redux-framework'),
				'subtitle'=>esc_html__('Select image for the boxed background layout','redux-framework'),
				'compiler' => true,
				'default'=>array('url'=>''),
				),
			array(
				'id'=>'boxed_layout_boxed_background_color',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Boxed Background Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the boxed background layout', 'redux-framework'),
				'default' => '#ffffff',
				'validate' => 'color',
				),	
			array(
				'id'=>'dt-404-page',
				'type' => 'select',
				'title' => esc_html__('404 Page', 'redux-framework'), 
				'subtitle'=>esc_html__('Select the 404 page','redux-framework'),
				'data' => 'pages',
				'description'=>'<a class="btn button" href="'.esc_url(admin_url( 'post-new.php?post_type=page', 'relative' )).'" target="_blank">'.esc_html__('Create New Page','redux-framework').'</a>',
				)
			)
		);
		
	if(!function_exists('wp_site_icon')){
		array_push(
			$sections['general']['fields'],
			array(
				'id'=>'dt-favicon-image',
				'type' => 'media', 
				'title' => esc_html__('Favicon Image', 'redux-framework'),
				'subtitle'=>esc_html__('Select image for the favicon','redux-framework'),
				'compiler' => true,
				//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'desc'=> esc_html__('Upload your image (.png,.ico, .jpg) with size 16x16 pixel', 'redux-framework'),
				'default'=>'',
				)
			);
	}

    $post_object=get_post_type_object('post');
    $postlabel = $post_object->labels->singular_name;

	$sections['general']['fields']=array_merge($sections['general']['fields'],array(
		array(
			'id'=>'dt-show-title-page',
			'type' => 'switch', 
			'title' => esc_html__('Page Title', 'redux-framework'),
			'subtitle'=>esc_html__('Enable or Disable the page title','redux-framework'),
			"default" => 1,
			'on' => esc_html__('On', 'redux-framework'),
			'off' => esc_html__('Off', 'redux-framework')
			),	
		array(
			'id'=>$post_object->name.'-title',
			'type' => 'switch', 
			'title' => sprintf(esc_html__('%s Title', 'redux-framework'),ucfirst($postlabel)),
			"default" => 1,
			'on' => esc_html__('On', 'redux-framework'),
			'off' => esc_html__('Off', 'redux-framework')
		)
	));


	if (detheme_plugin_is_active('detheme-post/detheme_post.php')) {

			 $dtpost_object=get_post_type_object('dtpost');
		     $dtpostlabel = $dtpost_object->labels->singular_name;

			$sections['general']['fields']=array_merge($sections['general']['fields'],array(
				array(
					'id'=>$dtpost_object->name.'-title',
					'type' => 'switch', 
					'title' => sprintf(esc_html__('%s Title', 'redux-framework'),ucfirst($dtpostlabel)),
					"default" => 1,
					'on' => esc_html__('On', 'redux-framework'),
					'off' => esc_html__('Off', 'redux-framework')
				)
			));

	}

	if (detheme_plugin_is_active('essential-grid/essential-grid.php')) {

		 $dtpost_object=get_post_type_object('essential_grid');
	     $dtpostlabel = $dtpost_object->labels->singular_name;
		$sections['general']['fields']=array_merge($sections['general']['fields'],array(
			array(
				'id'=>$dtpost_object->name.'-title',
				'type' => 'switch', 
				'title' => sprintf(esc_html__('%s Title', 'redux-framework'),ucfirst($dtpostlabel)),
				"default" => 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
			)
		));

	}

		$sections['general']['fields']=array_merge($sections['general']['fields'],array(

			array(
				'id'=>'devider-2',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Page Loader', 'redux-framework').'</h2>',
				),	
			array(
				'id'		=> 'page_loader',
				'title' 	=> esc_html__('Page Loader', 'redux-framework'), 
				'subtitle'	=>esc_html__('Enable or Disable the page loader','redux-framework'),
				'type'		=> 'switch',
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework'),
				'default' 	=> 0
				),
			array(
				'id'=>'page_loader_background',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Background Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the page loader background', 'redux-framework'),
				'default' => '#000000',
				'validate' => 'color',
				),	
			array(
				'id'=>'page_loader_ball_1',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Ball 1 Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the first ball on the page loader', 'redux-framework'),
				'default' => '#cb2025',
				'validate' => 'color',
				),	
			array(
				'id'=>'page_loader_ball_2',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Ball 2 Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the second ball on the page loader', 'redux-framework'),
				'default' => '#f8b334',
				'validate' => 'color',
				),	
			array(
				'id'=>'page_loader_ball_3',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Ball 3 Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the third ball on the page loader', 'redux-framework'),
				'default' => '#00a096',
				'validate' => 'color',
				),	
			array(
				'id'=>'page_loader_ball_4',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Ball 4 Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the fourth ball on the page loader', 'redux-framework'),
				'default' => '#97bf0d',
				'validate' => 'color',
				),	
			array(
				'id'=>'devider-3',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Sticky Sidebar', 'redux-framework').'</h2>',
				),	
			array(
				'id'		=> 'dt_scrollingsidebar_on',
				'title' 	=> esc_html__('Sticky Sidebar', 'redux-framework'), 
				'subtitle'	=>esc_html__('Enable or Disable the sticky sidebar','redux-framework'),
				'type'		=> 'switch',
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework'),
				'default' 	=> 0
				),
			array(
				'id'=>'dt_scrollingsidebar_bg_type',
				'type' => 'switch',
				'title' => esc_html__('Background Color', 'redux-framework'), 
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework'),
				'subtitle' => esc_html__('Enable or Disable the background color as well as select the background color', 'redux-framework'),
				'default'=>1
				),
			array(
				'id'=>'dt_scrollingsidebar_bg_color',
				'type' => 'color_nocheck',
				'output' => '',
//				'title' => esc_html__('Background Color', 'redux-framework'), 
//				'subtitle' => esc_html__('Enable or Disable the background color as well as select the background color', 'redux-framework'),
				'default' => '#ecf0f1',
				'validate' => 'color',
				),	
			array(
				'id'		=> 'dt_scrollingsidebar_position',
				'type' 		=> 'select', 
				'title' 	=> esc_html__('Position', 'redux-framework'),
				'subtitle' 	=> esc_html__('Select position for the sticky sidebar', 'redux-framework'),
				'default' 	=> 'right',
				'options' 	=> array(
					'right' => esc_html__('Right','redux-framework'),
					'left' => esc_html__('Left','redux-framework'),
					),
				),	
			array(
				'id'		=> 'dt_scrollingsidebar_top_margin',
				'type' 		=> 'text',
				'compiler'	=> true,
				'title' 	=> esc_html__('Top Margin', 'redux-framework'), 
				'subtitle' 	=> esc_html__('Adjust the sticky sidebar position from the top (in pixel)', 'redux-framework'),
				'validate' 	=> 'numeric',
				'msg'		=> esc_html__('Please enter number.','redux-framework'),
				'default' 	=> 200
				),
			array(
				'id'		=> 'dt_scrollingsidebar_margin',
				'type' 		=> 'text',
				'compiler'	=> true,
				'title' 	=> esc_html__('Other Margin', 'redux-framework'), 
				'subtitle' 	=> esc_html__('Adjust the sticky sidebar position from its surrounding (in pixel)', 'redux-framework'),
				'validate' 	=> 'numeric',
				'msg'		=> esc_html__('Please enter number.','redux-framework'),
				'default' 	=> 0
				),
			array(
				'id'=>'devider-5',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Meta Open Graph', 'redux-framework').'</h2>',
				),
			array(
				'id'=>'meta-og',
				'type' => 'switch', 
				'title' => esc_html__('Meta Open Graph', 'redux-framework'),
				'subtitle'=> esc_html__('Allow show/hide Meta Open Graph', 'redux-framework'),
				'default'=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'devider-10',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Blog Type', 'redux-framework').'</h2>',
				),
			array(
				'id'=>'blog_type',
				'type' => 'select',
				'title' => esc_html__('Blog Type','redux-framework'),
				'subtitle'=>esc_html__('Select Blog Type','redux-framework'), 
				'options'=>array(
				      'default'=>esc_html__("Default", 'hue'),
				      'masonry'=> esc_html__("Masonry", 'hue') ,
					),
				'default'=> 'default',
				),
			array(
				'id'=>'devider-11',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Author', 'redux-framework').'</h2>',
				),
			array(
				'id'=>'show-author',
				'type' => 'switch', 
				'title' => esc_html__('Display About Author Box ?', 'redux-framework'),
				'subtitle'=> esc_html__('Display/Hide About Author Box', 'redux-framework'),
				"default" => 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),
			array(
				'id'=>'devider-4',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Comments', 'redux-framework').'</h2>',
				))
			);	

	$post_types = get_post_types( array());
      foreach ( $post_types as $post_type ) {

          if (!in_array($post_type, detheme_post_use_comment())) {

	        $post_type_object=get_post_type_object($post_type);
	        $label = $post_type_object->labels->name;

	        if($post_type_object->public){

	          	array_push($sections['general']['fields'],
				array(
					'id'=>'comment-open-'.$post_type,
					'type' => 'switch', 
					'title' => sprintf(esc_html__('%s Comment', 'redux-framework'),ucfirst($label)),
					'subtitle'=> sprintf(esc_html__('Enable or Disable comment on the %s', 'redux-framework'),$label),
					"default" => 1,
					'on' => esc_html__('On', 'redux-framework'),
					'off' => esc_html__('Off', 'redux-framework')
					));
	        }
          }
      }

	$sections['styling'] = array(
		'icon' => 'el-icon-website',
		'title' => esc_html__('Style', 'redux-framework'),
		'fields' => array(
			array(
				'id'=>'primary-color',
				'type' => 'color_nocheck',
				'output' => array('.site-title'),
				'title' => esc_html__('Primary Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select primary color for the theme', 'redux-framework'),
				'default' => '#000000',
				'validate' => 'color',
				),		

			array(
				'id'=>'secondary-color',
				'type' => 'color_nocheck',
				'output' => array('.site-title'),
				'title' => esc_html__('Secondary Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select secondary color for the theme', 'redux-framework'),
				'default' => '#000000',
				'validate' => 'color',
				),		
			array(
				'id'=>'body_text_color',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Body Text Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the body text', 'redux-framework'),
				'default' => '#444444',
				'validate' => 'color',
				),	
			array(
				'id'=>'body_background_color',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Body Background Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the body background', 'redux-framework'),
				'default' => '#ffffff',
				'validate' => 'color',
				),	
			array(
				'id'=>'body_background_image',
				'type' => 'media', 
				'title' => esc_html__('Body Background Image', 'redux-framework'),
				'compiler' => true,
				//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'subtitle'=> esc_html__('Select image for the body background', 'redux-framework'),
				'default'=>array('url'=>''),
				),
			array(
				'id'=>'body_background_style',
				'type' => 'select',
				'title' => esc_html__('Body Background Image Style','redux-framework'),
				'subtitle'=>esc_html__('Select style for the body background image','redux-framework'), 
				'options'=>array(
				      'cover'=>esc_html__("Cover", 'hue'),
				      'cover_all'=> esc_html__("Cover All", 'hue') ,
				      'contain'=> esc_html__('Contain', 'hue') ,
				      'no-repeat'=> esc_html__('No Repeat', 'hue') ,
				      'repeat'=> esc_html__('Repeat', 'hue') ,
				      'parallax'=> esc_html__("Parallax", 'hue') ,
				      'parallax_all'=> esc_html__("Parallax All", 'hue') ,
				      'fixed'=> esc_html__("Fixed", 'hue') ,
					)
				),
			array(
				'id'=>'primary-font',
				'type' => 'typography',
				'title' => esc_html__('Body Text Font', 'redux-framework'),
				'subtitle' => esc_html__('Select font properties for the body text', 'redux-framework'),
				'font-style'=>false,
				'font-weight'=>false,
				'font-size'=>false,
				'color'=>false,
				'google'=>true,
				'line-height'=>true,
				'letter-spacing'=>true,
				'class'=>'no-border-bottom',
				'default' => array(
					'font-family'=>'Open Sans'
					),
				),
			array(
				'id'=>'secondary-font',
				'type' => 'typography',
				'title' => esc_html__('Heading Text Font', 'redux-framework'),
				'subtitle' => esc_html__('Select font properties for the heading text', 'redux-framework'),
				'font-style'=>false,
				'font-weight'=>true,
				'font-size'=>false,
				'color'=>false,
				'google'=>true,
				'line-height'=>true,
				'letter-spacing'=>true,
				'class'=>'no-border-bottom has-border-top',
				'default' => array(
					'font-family'=>'Poppins',
					'google'=>true
					),
				),
			array(
				'id'=>'section-font',
				'type' => 'typography',
				'title' => esc_html__('Section Heading Text Font', 'redux-framework'),
				'subtitle' => esc_html__('Select font properties for the section heading text', 'redux-framework'),
				'font-style'=>false,
				'font-weight'=>true,
				'font-size'=>false,
				'color'=>false,
				'google'=>true,
				'line-height'=>false,
				'class'=>'has-border-top',
				'default' => array(
					'font-family'=>'Poppins',
					'google'=>true
					),
				),
			array(
				'id'=>'tertiary-font',
				'type' => 'typography',
				'title' => esc_html__('Quote Text Font', 'redux-framework'),
				'subtitle' => esc_html__('Select font properties for the quote text', 'redux-framework'),
				'font-style'=>false,
				'font-weight'=>false,
				'font-size'=>false,
				'color'=>false,
				'google'=>true,
				'line-height'=>true,
				'letter-spacing'=>true,
				'class'=>'no-border-bottom',
				'default' => array(
					'font-family'=>'Playfair Display',
					),
				),
			array(
				'id'=>'heading-style',
				'type' => 'select',
				'title' => esc_html__('Heading Text Style', 'redux-framework'),
				'subtitle'=>esc_html__('Select style for the heading text','redux-framework'),
				'class'=>'has-border-top',
				'options'=>array(
					'uppercase'=>esc_html__('Uppercase', 'redux-framework'),
					'capitalize'=>esc_html__('Capitalize', 'redux-framework'),
					'none'=>esc_html__('None', 'redux-framework')
					),
				'default'=>'none'
				)
		)
	);


	$sections['navigation'] = array(

		'title' => esc_html__('Main Navigation', 'redux-framework'),
		'icon' => 'el-icon-lines',
		'fields' => array(
			array(
				'id'=>'dt-show-header',
				'type' => 'switch', 
				'title' => esc_html__('Navigation Bar', 'redux-framework'),
				'subtitle'=>esc_html__('Enable or Disable the Navigation Bar','redux-framework'),
				"default" 		=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),
			array(
				'id'=>'devider-8',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('General', 'redux-framework').'</h2>',
				),	
			array(
				'id'=>'dt-header-type',
				'type' => 'image_select', 
				'title' => esc_html__('Layout Type', 'redux-framework'),
				'subtitle'=>esc_html__('Select layout for the navigation bar','redux-framework'),
				'options' => array(
						'left' => array('title' => esc_html__('Logo on Left', 'redux-framework'), 'img' => DethemeReduxFramework::$_url.'assets/img/header-layout-1.png'),
						'center' => array('title' => esc_html__('Logo on Center', 'redux-framework'), 'img' => DethemeReduxFramework::$_url.'assets/img/header-layout-2.png'),
						'right' => array('title' => esc_html__('Logo on Right', 'redux-framework'), 'img' => DethemeReduxFramework::$_url.'assets/img/header-layout-3.png'),
						//'middle' => array('title' => esc_html__('Logo in the middle of menu', 'redux-framework'), 'img' => DethemeReduxFramework::$_url.'assets/img/header-layout-6.png'),
						//'leftbar' => array('title' => esc_html__('Vertical Menu on Left', 'redux-framework'), 'img' => DethemeReduxFramework::$_url.'assets/img/header-layout-4.png')
						//'pagebar' => array('title' => esc_html__('Static Navigation with post-nav Area', 'redux-framework'), 'img' => DethemeReduxFramework::$_url.'assets/img/header-layout-5.jpg')
					),
				"default"=> 'left'
				),
			array(
				'id'=>'dt-sticky-menu',
				'type' => 'switch', 
				'title' => esc_html__('Sticky Menu', 'redux-framework'),
				'subtitle'=> esc_html__('Enable or Disable the sticky menu', 'redux-framework'),
				"default" => 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'dt-is-stretched-menu',
				'type' => 'switch', 
				'title' => esc_html__('Stretched Menu', 'redux-framework'),
				'subtitle'=> esc_html__('Enable or Disable the stretched menu', 'redux-framework'),
				"default" => 0,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'show-header-searchmenu',
				'type' => 'switch', 
				'title' => esc_html__('Search Bar', 'redux-framework'),
				'subtitle' => esc_html__('Enable or Disable the search bar', 'redux-framework'),
				"default" 		=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'show-header-shoppingcart',
				'type' => 'switch', 
				'title' => esc_html__('Shopping Cart ', 'redux-framework'),
				'subtitle' => esc_html__('Enable or Disable Woocommerce shopping cart', 'redux-framework'),
				"default" 		=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'socialmenu',
				'type' => 'select',
				'title' => esc_html__('Select Social Menu', 'redux-framework'), 
				'data' => 'menus',
				'description'=>'<a class="btn button" href="'.esc_url(admin_url( 'nav-menus.php?action=edit&menu=0', 'relative' )).'" target="_blank">'.esc_html__('Create New Menu','redux-framework').'</a>',
			),
			array(
				'id'=>'showpostmenupage',
				'type' => 'switch', 
				'title' => esc_html__('Show Post Menu Page', 'redux-framework'),
				'subtitle'=> esc_html__('Allow show/hide Show Post Menu Page', 'redux-framework'),
				"default"=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'postmenupage',
				'type' => 'select',
				'title' => esc_html__('Select Post Menu Page', 'redux-framework'), 
				'data' => 'pages',
				'description'=>'<a class="btn button" href="'.esc_url(admin_url( 'post-new.php?post_type=page', 'relative' )).'" target="_blank">'.esc_html__('Create New Page','redux-framework').'</a>',
			),
			array(
				'id'=>'dt-logo-image',
				'type' => 'media', 
				'title' => esc_html__('Logo', 'redux-framework'),
				'compiler' => true,
				//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'desc'=> esc_html__('Set logo image.', 'redux-framework'),
				'subtitle' => esc_html__('Select the default logo for the site', 'redux-framework'),
				'default'=>array('url'=>$dt_theme_images.'/logo.png'),
			),
			array(
				'id'=>'dt-logo-image-transparent',
				'type' => 'media', 
				'title' => esc_html__('Logo (Sticky)', 'redux-framework'),
				'compiler' => true,
				//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'subtitle' => esc_html__('Select the default logo when in sticky mode', 'redux-framework'),
				'default'=>array('url'=>$dt_theme_images.'/logo_sticky.png'),
				),
			array(
				'id'=>'dt-logo-text',
				'type' => 'text', 
				'title' => esc_html__('Logo Alt Text', 'hue'),
				'subtitle' => esc_html__('Adjust the logo alt text', 'redux-framework'),
				'default'=>get_template(),
				),
			array(
				'id'=>'dt-logo-width',
				'type' => 'text', 
				'title' => esc_html__('Logo Width', 'redux-framework'),
				'subtitle' => esc_html__('Adjust the logo width (in pixel)', 'redux-framework'),
				'class'=>'width_100',
				'desc'=>esc_html__('leave blank or put "0" if no set', 'redux-framework'),
				'default'=>'50',
				),
			array(
				'id'=>'dt-logo-margin',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Logo Top Margin', 'redux-framework'),
				'subtitle' => esc_html__('Adjust the logo position from the top (in pixel)', 'redux-framework'),
				'default'=>'0',
				),
			array(
				'id'=>'dt-logo-leftmargin',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Logo Left Margin', 'redux-framework'),
				'subtitle' => esc_html__('Adjust the logo position from the left (in pixel)', 'redux-framework'),
				'default'=>'0',
				),
			array(
				'id'=>'dt-logo-top-padding',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Logo Top Padding', 'redux-framework'),
				'subtitle' => esc_html__('Adjust the logo top padding (in pixel)', 'redux-framework'),
				'default'=> 100,
				),
			array(
				'id'=>'dt-logo-top-margin-reveal',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Logo Top Margin (Sticky)', 'redux-framework'),
				'subtitle' => esc_html__('Adjust the logo top margin when in sticky mode (in pixel)', 'redux-framework'),
				'default'=> 0,
				),
			array(
				'id'=>'dt-menu-height',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Navigation Bar Height', 'redux-framework'),
				'subtitle' => sprintf(esc_html__('Adjust the navigation bar in em (Default: %dem)', 'redux-framework'),6),
				'default'=> 6,
				),
			array(
				'id'=>'dt-menu-image',
				'compiler' => true,
				'type' => 'media', 
				'title' => esc_html__('Background Image', 'redux-framework'),
				'subtitle'=>esc_html__('Select image to cover the navigation bar','redux-framework'),
				"default"=> ''
				),
			array(
				'id'=>'dt-menu-image-size',
				'type' => 'radio',
				'title' => esc_html__('Background Image Style', 'redux-framework'), 
				'subtitle'=>esc_html__('Select the background image style for the navigation bar','redux-framework'),
				'options'=>array('cover'=>esc_html__('Cover the whole Navigation Bar', 'redux-framework'),
					'contain'=>esc_html__('Fit image into the Navigation Bar', 'redux-framework'),
					'default'=>esc_html__('Default', 'redux-framework'),
					),
				'default'=>'default'
				),
			array(
				'id'=>'dt-menu-image-horizontal',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Horizontal Position(%)', 'redux-framework'),
				'subtitle'=>esc_html__('Adjust the horizontal percentage position of the background image','redux-framework'),
				'default'=> '50',
				),
			array(
				'id'=>'dt-menu-image-vertical',
				'type' => 'text', 
				'class'=>'width_100',
				'title' => esc_html__('Vertical Position(%)', 'redux-framework'),
				'subtitle'=>esc_html__('Adjust the vertical percentage position of the background image','redux-framework'),
				'default'=> '100',
				),
            array(
                'id'=>'header-color',
                'type'=>'color_rgba',
                'title' => esc_html__('Navigation Bar Background Color', 'redux-framework'),
                'subtitle'=>esc_html__('Select Navigation Bar Background Color','redux-framework'),
                'default'=>array('color'=>'#ffffff','alpha'=>1),
                'mode' => 'background'
                ),
			array(
				'id'=>'header-font-color',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Navigation Bar Font Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select the font color for the navigation bar', 'redux-framework'),
				'default' => '#222222',
				'validate' => 'color',
				),	
            array(
                'id'=>'header-color-sticky',
                'type'=>'color_rgba',
                'title' => esc_html__('Navigation Bar Background Color (Sticky)', 'redux-framework'),
                'subtitle'=>esc_html__('Select Navigation Bar Background Color (Sticky)','redux-framework'),
                'default'=>array('color'=>'#ffffff','alpha'=>1),
                'mode' => 'background'
                ),
			array(
				'id'=>'header-font-color-sticky',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Navigation Bar Font Color (Sticky)', 'redux-framework'), 
				'subtitle' => esc_html__('Select the font color for the navigation bar when in sticky mode', 'redux-framework'),
				'default' => '#222222',
				'validate' => 'color',
				),	
			array(
				'id'=>'devider-9',
				'type' => 'divider', 
				'title' => '<h2 class="redux-title">'.esc_html__('Homepage', 'redux-framework').'</h2>',
				),	
			array(
				'id'=>'homepage-dt-logo-image',
				'type' => 'media', 
				'title' => esc_html__('Logo', 'redux-framework'),
				'compiler' => true,
				'subtitle' => esc_html__('Select the logo that will be displayed at homepage', 'redux-framework'),
				'default'=>array('url'=>$dt_theme_images.'/logo.png'),
				),
            array(
                'id'=>'homepage-header-color',
                'type'=>'color_rgba',
                'title' => esc_html__('Navigation Bar Background Color', 'redux-framework'),
                'subtitle'=>esc_html__('Select Navigation Bar Background Color on Homepage','redux-framework'),
                'default'=>array('color'=>'#ffffff','alpha'=>1),
                'mode' => 'background'
                ),
			array(
				'id'=>'homepage-header-font-color',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Navigation Bar Font Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select the font color for the navigation bar', 'redux-framework'),
				'default' => '#222222',
				'validate' => 'color',
				),	
			array(
				'id'=>'homepage-dt-logo-image-transparent',
				'type' => 'media', 
				'title' => esc_html__('Logo (Sticky)', 'redux-framework'),
				'compiler' => true,
				'subtitle' => esc_html__('Select the default logo when in sticky mode', 'redux-framework'),
				'default'=>array('url'=>$dt_theme_images.'/logo_sticky.png'),
				),
            array(
                'id'=>'homepage-header-color-sticky',
                'type'=>'color_rgba',
                'title' => esc_html__('Navigation Bar Background Color (Sticky)', 'redux-framework'),
                'subtitle'=>esc_html__('Select Navigation Bar Background Color on Homepage (Sticky)','redux-framework'),
                'default'=>array('color'=>'#ffffff','alpha'=>1),
                'mode' => 'background'
                ),
			array(
				'id'=>'homepage-header-font-color-sticky',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Navigation Bar Font Color (Sticky)', 'redux-framework'), 
				'subtitle' => esc_html__('Select the font color for the navigation bar when in sticky mode', 'redux-framework'),
				'default' => '#222222',
				'validate' => 'color',
				),

			)
	);

if (detheme_plugin_is_active('dt_menu/dt_menu.php')) {
	$sections['navigation']['fields'][2]['options'] = array_merge($sections['navigation']['fields'][2]['options'],
		dt_menu::get_redux_layout_type_options());

	$sections['navigation']['fields'] = array_merge($sections['navigation']['fields'],
		dt_menu::get_redux_overlay_options());
}

	$sections['page-banner'] = array(
		'icon' => 'el-icon-picture',
		'title' => esc_html__('Banner', 'redux-framework'),
		'fields' => array(
			array(
				'id'=>'show-banner-area',
				'type' => 'switch', 
				'title' => esc_html__('Banner', 'redux-framework'),
				'subtitle'=>esc_html__('Enable or Disable the Banner','redux-framework'),
				"default" 		=> 0,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'dt-show-banner-page',
				'type' => 'select', 
				'title' => esc_html__('Background Banner Type', 'redux-framework'),
				'subtitle'=>esc_html__('Select background banner type that fills the banner section area','redux-framework'),
				'compiler' => true,
				'options' => array(
					'featured' => esc_html__('Page Banner','redux-framework'),
					'image' => esc_html__('Image','redux-framework'),
					'color' => esc_html__('Color','redux-framework'),
					'video' => esc_html__('Video','redux-framework'),
					'none' => esc_html__('None','redux-framework'),
					),
				'default' => 'color'
				),	
			array(
				'id'=>'dt-banner-image',
				'type' => 'media', 
				'title' => esc_html__('Background Image', 'redux-framework'),
				'compiler' => true,
				//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'subtitle' => esc_html__('Select image for the banner background', 'redux-framework'),
				'default'=>array('url'=>$dt_theme_images.'/header_subpage_bg.jpg'),
				),
			array(
				'id'=>'dt-banner-video',
				'type' => 'video', 
				'title' => esc_html__('Background Video', 'redux-framework'),
				'compiler' => true,
				'mode'=>'video/mp4',
				'subtitle' => esc_html__('Select video for the banner background', 'redux-framework'),
				'default'=>'',
				),
			array(
				'id'=>'banner-color',
				'type' => 'color_nocheck',
				'output' => array('.site-title'),
				'title' => esc_html__('Background Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the banner background', 'redux-framework'),
				'default' => '#ededed',
				'validate' => 'color',
				),	
			array(
				'id'=>'dt-banner-height',
				'type' => 'text',
				'title' => esc_html__('Banner Height', 'redux-framework'),
				'subtitle'=>esc_html__('Adjust the banner height (in pixel)','redux-framework'),
				'class'=>'width_100',
				'default' => '400px'
				)));	

	if (detheme_plugin_is_active('essential-grid/essential-grid.php')) {

		$ess_post_type_object=get_post_type_object('essential_grid');

		$sections['page-banner']['fields']=array_merge($sections['page-banner']['fields'],array(
			array(
				'id'=>'dt-ess-banner-height',
				'type' => 'text',
				'title' => sprintf(esc_html__('%s Banner Height', 'redux-framework'),$ess_post_type_object->labels->singular_name),
				'subtitle'=>sprintf(esc_html__('Adjust the %s banner height (in pixel)','redux-framework'),$ess_post_type_object->labels->singular_name),
				'class'=>'width_100',
				'default' => '600px')
		));
	}

		$sections['page-banner']['fields']=array_merge($sections['page-banner']['fields'],array(
			array(
				'id'=>'show-banner-homepage',
				'type' => 'switch', 
				'title' => esc_html__('Banner on homepage', 'redux-framework'),
				'subtitle'=>esc_html__('Enable or Disable the banner on homepage','redux-framework'),
				"default" => 0,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'dt-title-top-margin',
				'type' => 'text',
				'title' => esc_html__('Page Title Top Margin', 'redux-framework'),
				'subtitle'=>esc_html__('Adjust the page title space margin from the top (in pixel)','redux-framework'),
				'class'=>'width_100',
				'default' => '270px'
				),
			array(
				'id'=>'title-color',
				'type' => 'color_nocheck',
				'output' => array('.site-title'),
				'title' => esc_html__('Page Title Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the page title', 'redux-framework'),
				'default' => '#000000',
				'validate' => 'color',
				)	
			));

	if (detheme_plugin_is_active('woocommerce/woocommerce.php')) {

		array_push($sections['page-banner']['fields'],
			array(
				'id'=>'dt-shop-title-page',
				'type' => 'text',
				'title' => esc_html__('Shop Page Tittle', 'redux-framework'),
				'subtitle'=>esc_html__('Set the page title for the Woocommerce page','redux-framework'),
				'default' => esc_html__('Shop', 'redux-framework'),
				)
		);				

		array_push($sections['page-banner']['fields'], 
				array(
					'id'=>'dt-shop-banner-image',
					'type' => 'media', 
					'title' => esc_html__('Shop Background Image', 'redux-framework'),
					'subtitle'=>esc_html__('Select image for the Woocommerce page background','redux-framework'),
					'compiler' => true,
					'default'=>array('url'=>$dt_theme_images.'/header_subpage_bg.jpg'),
					)
			);
	}

 
	$sections['footer'] = array(
		'title' => esc_html__('Footer', 'redux-framework'),
		'icon' => 'el-icon-fork',
		'fields' => array(
			array(
				'id'=>'showfooterarea',
				'type' => 'switch', 
				'title' => esc_html__('Footer', 'redux-framework'),
				'subtitle'=> esc_html__('Enable or Disable footer', 'redux-framework'),
				"default"=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'footer-text',
				'type' => 'editor',
				'title' => esc_html__('Footer Text', 'redux-framework'), 
				'subtitle' => esc_html__('Type in the text that will be show on footer area <br>You can use the following shortcodes in your footer text','redux-framework').': [wp-url] [site-url] [theme-url] [login-url] [logout-url] [site-title] [site-tagline] [current-year]',
				'default' => '&copy; 2017 '.sprintf(esc_html__('%s, The Awesome Theme. All right reserved.','redux-framework'),get_template()),
				'editor_options'=>array( 'media_buttons' => true, 'tinymce' => true,'wpautop' => false)
				),
			array(
				'id'=>'dt-footer-position',
				'type' => 'radio',
				'title' => esc_html__('Footer Text Position', 'redux-framework'), 
				'subtitle'=>esc_html__('Select position for the footer text','redux-framework'),
				'options'=>array(
					'left'=>esc_html__('Left', 'redux-framework'),
					'right'=>esc_html__('Right', 'redux-framework'),
					),
				'multi_layout'=>'inline',
				'default'=>'left'
				),
			array(
				'id'=>'showfooterwidget',
				'type' => 'switch', 
				'title' => esc_html__('Footer Widget', 'redux-framework'),
				'subtitle'=> esc_html__('Enable or Disable footer widget', 'redux-framework'),
				"default"=> 0,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'dt-footer-widget-column',
				'type' => 'radio',
				'title' => esc_html__('Footer Widget Columns', 'redux-framework'), 
				'subtitle'=>esc_html__('Select number of column for the footer widget <br>You can set the footer widget on Appearance > Widgets > Bottom Widget Area','redux-framework'),
				'options'=>array(1=>esc_html__('One Column', 'redux-framework'),
					2=>esc_html__('Two Columns', 'redux-framework'),
					3=>esc_html__('Three Columns', 'redux-framework'),
					4=>esc_html__('Four Columns', 'redux-framework')
					),
				'multi_layout'=>'inline',
				'default'=>3
				),
			array(
				'id'=>'footer-color',
				'type' => 'color_nocheck',
				'output' => array('.description'),
				'title' => esc_html__('Footer Background Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the footer background', 'redux-framework'),
				'default' => '#222222',
				'validate' => 'color',
				),	
			array(
				'id'=>'footer-font-color',
				'type' => 'color_nocheck',
				'output' => '',
				'title' => esc_html__('Footer Font Color', 'redux-framework'), 
				'subtitle' => esc_html__('Select color for the footer font', 'redux-framework'),
				'default' => '#ffffff',
				'validate' => 'color',
				),	
			array(
				'id'=>'showfooterpage',
				'type' => 'switch', 
				'title' => esc_html__('Pre and Post Footer', 'redux-framework'),
				'subtitle'=> esc_html__('Enable or Disable pre and post footer area', 'redux-framework'),
				"default"=> 1,
				'on' => esc_html__('On', 'redux-framework'),
				'off' => esc_html__('Off', 'redux-framework')
				),	
			array(
				'id'=>'footerpage',
				'type' => 'select',
				'title' => esc_html__('Pre Footer Page', 'redux-framework'), 
				'subtitle'=>esc_html__('Select page for the pre footer','redux-framework'),
				'data' => 'pages',
				'description'=>'<a class="btn button" href="'.esc_url(admin_url( 'post-new.php?post_type=page', 'relative' )).'" target="_blank">'.esc_html__('Create New Page','redux-framework').'</a>',
			),
			array(
				'id'=>'postfooterpage',
				'type' => 'select',
				'title' => esc_html__('Post Footer Page', 'redux-framework'), 
				'subtitle'=>esc_html__('Select page for the post footer','redux-framework'),
				'data' => 'pages',
				'description'=>'<a class="btn button" href="'.esc_url(admin_url( 'post-new.php?post_type=page', 'relative' )).'" target="_blank">'.esc_html__('Create New Page','redux-framework').'</a>',
			),
			)
		);

	if (detheme_plugin_is_active('detheme-career/detheme_career.php')) {

		$sections['dtcareer'] = array(
		'icon' => 'el-icon-envelope',
		'title' => esc_html__('Simple Recruitment', 'redux-framework'),
		'fields' => array(
			array(
				'id'=>'career_fields',
				'type' => 'career_multi_text',
				'title' => esc_html__('Job Description Fields', 'redux-framework'),
				'subtitle'=>esc_html__('Manage the field that will be displayed on the job description','redux-framework'),
				'sortable' => true,
				),
			array(
				'id'=>'career_email',
				'type' => 'text',
				'title' => esc_html__('Email Address', 'redux-framework'),
				'subtitle'=>esc_html__('Target email address for the application form. If your\'e using multiple email addresses separate them using comma. Leave it blank if you\'re using site\'s admin email','redux-framework'),
				),
			array(
				'id'=>'career_attach_type',
				'type' => 'checkbox',
				'title' => esc_html__('Attachment Type', 'redux-framework'),
				'subtitle'=>esc_html__('Select the attachment type allowed in the application form','redux-framework'),
				'multi_layout'=>'inline',
				'default'=>array('image'=>1,'zip'=>1,'rtf'=>1,'pdf'=>1,'text'=>1,'html'=>1,'htm'=>1,'msword'=>1,'openxmlformats'=>1),
				'options'=>array(
				      'image'=>".jpg, .jpeg, .png, .gif",
				      'zip'=>".zip",
				      'rtf'=> '.rtf',
				      'pdf'=> '.pdf',
				      'text'=> ".txt",
				      'html'=> ".html",
				      'htm'=> ".htm",
				      'msword'=> '.doc',
				      'openxmlformats'=> ".docx"
					)
				),
			array(
				'id'=>'career_attach_limit',
				'type' => 'text',
				'title' => esc_html__('Attachment Size', 'redux-framework'),
				'subtitle'=>esc_html__('Set the maximum attachment size allowed in KB, etc: 1024 form 1MB size','redux-framework'),
				'default'=>1024,
				),
			array(
				'id'=>'career-apply-head-text',
				'type' => 'editor',
				'title' => esc_html__('Application Form Heading Text', 'redux-framework'),
				'default'=>esc_html__('Please complete the form below to send an application for the selected job {job_title}.','redux-framework'),
				'subtitle'=>esc_html__('Set the heading text for the application Form','redux-framework'),
				'desc' => esc_html__('Shortcode:{job_title}, {job_link} ', 'redux-framework')
				),
			array(
				'id'=>'career-emailfriend-head-text',
				'type' => 'editor',
				'title' => esc_html__('Email to Friend Form Heading Text', 'redux-framework'),
				'subtitle'=>esc_html__('Set the heading text for the "Email to Friend" Form','redux-framework'),
				'default'=>esc_html__('Please complete the form below to tell a friend about job {job_title}.','redux-framework'),
				'desc' => esc_html__('Shortcode:{job_title}, {job_link} ', 'redux-framework')
				),
			array(
				'id'=>'career_thankyou',
				'type' => 'editor',
				'title' => esc_html__('Confirmation Message', 'redux-framework'),
				'subtitle'=>esc_html__('Message that will be displayed when the application has been successfully sent','redux-framework')
				),
			)
		);

	}

	$sections['advance'] = array(
		'icon' => 'el-icon-wrench',
		'title' => esc_html__('Advanced Settings', 'redux-framework'),
		'fields' => array(
	        array(
				'id'=>'css-code',
				'type' => 'ace_editor',
				'title' => esc_html__('CSS Code', 'redux-framework'), 
				'subtitle' => sprintf(esc_html__('Put your CSS code in here<br/>Your css code will saving at %s', 'redux-framework'),'/css/customstyle.css'),
				'mode' => 'css',
	            'theme' => 'monokai',
	            'default' => "body{\nheight: 100%;\n}"
				),
	        array(
				'id'=>'js-code',
				'type' => 'ace_editor',
				'title' => esc_html__('Javascript Code', 'redux-framework'), 
				'subtitle' => esc_html__('Put your Javascript code in here. <br> The code will be loaded at the end of every page', 'redux-framework'),
				'mode' => 'javascript',
	            'theme' => 'chrome',
				'desc' => esc_html__('Be careful!','redux-framework'),
	            'default' => "jQuery(document).ready(function(){\n\n});"
				)
	        )
	);


	global $wp_filesystem;

	$sections['info'] = array(
		'icon' => 'el-icon-info-sign',
		'title' => esc_html__('Theme Information & Update', 'redux-framework'),
		'desc' => '<p class="description">'.esc_html__('The Awesome WordPress Theme by %s', 'redux-framework').'</p>',
		'fields' => array(
			array(
				'title' => esc_html__('Item Purchase Number', 'redux-framework'),
				'id'=>'detheme_license',
				'type' => 'text',
				'validate_callback'=>'detheme_check_for_update',
				'default'=>get_option("detheme_license_".get_template()),
				'desc' => sprintf(esc_html__('purchase number from %s. ex:xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'redux-framework'),"themeforest.net")
				),
			array(
				'id'=>'raw_new_info',
				'type' => 'raw',
				'content' => $item_info,
				)
			),   
		);

	if(file_exists(trailingslashit(get_template_directory().'/redux-framework/option/') . 'README.html')) {
	    $tabs['docs'] = array(
			'icon' => 'el-icon-book',
			    'title' => esc_html__('Documentation', 'redux-framework'),
	        'content' => nl2br($wp_filesystem->get_contents(trailingslashit(get_template_directory().'/redux-framework/option/') . 'README.html'))
	    );
	}

	global $DethemeReduxFramework;
	$DethemeReduxFramework = new DethemeReduxFramework();
	$DethemeReduxFramework->__render($sections, $args, $tabs);

	// END Sample Config
	}

	add_filter('theme_option_name','detheme_redux_option_name');
	add_action('init', 'detheme_redux_init');
endif;

function detheme_redux_option_name($option_name){
	return "detheme_config";
}

if(!function_exists('detheme_darken')){
	function detheme_darken($colourstr, $procent=0) {
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

if(!function_exists('detheme_lighten')){

    function detheme_lighten($colourstr, $procent=0){

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

if(!function_exists('detheme_lightenrgba')){

    function detheme_lightenrgba($colourstr, $procent=0){

      $colourstr = str_replace('#','',$colourstr);
      $rhex = substr($colourstr,0,2);
      $ghex = substr($colourstr,2,2);
      $bhex = substr($colourstr,4,2);

      $r = hexdec($rhex);
      $g = hexdec($ghex);
      $b = hexdec($bhex);

      $r = max(0,min(255,$r));
      $g = max(0,min(255,$g));  
      $b = max(0,min(255,$b));

      return 'rgba('.$r.','.$g.','.$b.','.($procent/100).');';
    }

}

if(!function_exists('get_redux_boxed_layout')){
	function get_redux_boxed_layout($args){
		$cssline = "";

		if ($args['boxed_layout_activate']) {
			$cssline.=".dt-boxed-container, .dt-boxed-stretched-container { background-image: url(".$args['boxed_layout_boxed_background_image']['url']."); }";
			$cssline.=".dt-boxed-container, .dt-boxed-stretched-container { background-color: ".$args['boxed_layout_boxed_background_color']."; }";

		}

		return $cssline;
	}
}

if(!function_exists('get_redux_body_style')){
	function get_redux_body_style($args){
		$cssline = $backgroundattr= "";

		if (isset($args['body_background_image']['url'])&&!empty($args['body_background_image']['url'])) {
			$cssline.="body.dt_custom_body { background-image: url(".$args['body_background_image']['url']."); }";

			switch($args['body_background_style']){
			    case'parallax':
			        $backgroundattr="background-position: 0% 0%; background-repeat: no-repeat; background-size: cover;";
			        break;
			    case'parallax_all':
			        $backgroundattr="background-position: 0% 0%; background-repeat: repeat; background-size: cover;";
			        break;
			    case'cover':
			        $backgroundattr="background-position: center; background-repeat: no-repeat ; background-size: cover;";
			        break;
			    case'cover_all':
			        $backgroundattr="background-position: center; background-repeat: repeat ; background-size: cover;";
			        break;
			    case'no-repeat':
			        $backgroundattr="background-position: center; background-repeat: no-repeat ;background-size:auto;";
			        break;
			    case'repeat':
			        $backgroundattr="background-position: 0 0;background-repeat: repeat ;background-size:auto;";
			        break;
			    case'contain':
			        $backgroundattr="background-position: center; background-repeat: no-repeat ;background-size: contain;";
			        break;
			    case 'fixed':
			        $backgroundattr="background-position: center; background-repeat: no-repeat ; background-size: cover;background-attachment: fixed;";
			        break;
			    default:
			        $backgroundattr="background-position: center; background-repeat: no-repeat ; background-size: cover;";
			        break;
			}


			$cssline.="body.dt_custom_body { ".$backgroundattr." }";
		}

		if (isset($args['body_background_color'])&&!empty($args['body_background_color'])) {
			$cssline.="body.dt_custom_body, .body_background_color { background-color: ".$args['body_background_color']."; }";
		}

		if (isset($args['body_text_color'])&&!empty($args['body_text_color'])) {
			$cssline.="body.dt_custom_body { color: ".$args['body_text_color']."; }";
			//$cssline.=".blog_info_date, .blog_info_comments, .blog_info_share { color: ".detheme_lightenrgba($args['body_text_color'],40)."; }";
			$cssline.=".blog_info_tags, .blog_info_tags a { color: ".detheme_lightenrgba($args['body_text_color'],40)."!important; }";
			$cssline.=".blog .blog-masonry .single-masonry { border: 1px solid ".detheme_lightenrgba($args['body_text_color'],10)."!important; }";
		}

		return $cssline;
	}
}

if(!function_exists('get_redux_custom_primary_font')){
	function get_redux_custom_primary_font($font) {
		ob_start();

		$primary_font_family = $font['font-family'];
		if(!empty($primary_font_family) && ''!==$primary_font_family) :
?>
			body { font-family: <?php print $primary_font_family;?>; }
			.postdate .year {
			  font-family: <?php print $primary_font_family;?>;
			}
			.footer-right {
			  font-family: <?php print $primary_font_family;?>;
			}
			#dt-menu li a {	font-family: <?php print $primary_font_family;?>; }
			#mobile-header label { font-family: <?php print $primary_font_family;?>; }
			#dt-menu label { font: 3.125em/1.375em <?php print $primary_font_family;?>; }
			#dt-menu .sub-nav label { font: 2em/2em <?php print $primary_font_family;?>; }
			#dt-menu { font-family: <?php print $primary_font_family;?>; }
			#dt-menu .sub-nav label { font: 2em/2em <?php print $primary_font_family;?>; }
			#dt-menu .sub-nav, #dt-menu .sub-nav a { font-family: <?php print $primary_font_family;?>; }
			#dt-topbar-menu-left .sub-nav label { font: 2em/2em <?php print $primary_font_family;?>; }
			#dt-topbar-menu-left .sub-nav { font-family: <?php print $primary_font_family;?>; }
			#dt-topbar-menu-right .sub-nav label { font: 2em/2em <?php print $primary_font_family;?>; }
			#dt-topbar-menu-right .sub-nav { font-family: <?php print $primary_font_family;?>; }
			.btn {
			  font-family: <?php print $primary_font_family;?>;
			}
			.eg-service-grid-element-1 { font-family: <?php print $primary_font_family;?>!important; }
<?php
		endif;

		$line_height = $font['line-height'];
		if(!empty($line_height) && ''!==$line_height) :
?>
			body,
			.postdate .year,
			.footer-right,
			#dt-menu li a,
			#mobile-header label,
			#dt-menu label,
			#dt-menu .sub-nav label,
			#dt-menu,
			#dt-menu .sub-nav label,
			#dt-menu .sub-nav, #dt-menu .sub-nav a,
			#dt-topbar-menu-left .sub-nav label,
			#dt-topbar-menu-left .sub-nav,
			#dt-topbar-menu-right .sub-nav label,
			#dt-topbar-menu-right .sub-nav,
			.btn,
			.eg-service-grid-element-1 {
  				line-height: <?php print $line_height;?>;
			}
<?php
		endif;

		$letter_spacing = $font['letter-spacing'];
		if(!empty($letter_spacing) && ''!==$letter_spacing) :
?>
			body,
			.postdate .year,
			.footer-right,
			#dt-menu li a,
			#mobile-header label,
			#dt-menu label,
			#dt-menu .sub-nav label,
			#dt-menu,
			#dt-menu .sub-nav label,
			#dt-menu .sub-nav, #dt-menu .sub-nav a,
			#dt-topbar-menu-left .sub-nav label,
			#dt-topbar-menu-left .sub-nav,
			#dt-topbar-menu-right .sub-nav label,
			#dt-topbar-menu-right .sub-nav,
			.btn,
			.eg-service-grid-element-1 {
				letter-spacing: <?php print $letter_spacing;?>;
			}
<?php
		endif;
		
		$cssline=ob_get_contents();

		ob_end_clean();

		return $cssline;

	} //function get_redux_custom_primary_font
} //if(!function_exists('get_redux_custom_primary_font'))

if(!function_exists('get_redux_custom_section_font')){

	function get_redux_custom_section_font($font_family=''){

	if(empty($font_family) && ''!==$font_family)
		return '';

	ob_start();
?>
.dt-section-head h1,
.dt-section-head h2,
.dt-section-head h3,
.dt-section-head h4,
.dt-section-head h5,
.dt-section-head h6 {
  font-family: <?php print $font_family['font-family'];?>;
<?php if(''!=$font_family['font-weight']):?>
  font-weight: <?php print $font_family['font-weight'];?>;
<?php endif;?>
<?php if(''!=$font_family['font-style']):?>
  font-style: <?php print $font_family['font-style'];?>;
<?php endif;?>
}
<?php
	$cssline=ob_get_contents();
	ob_end_clean();

	return $cssline;


	}
}

if(!function_exists('get_redux_custom_secondary_font')){
	function get_redux_custom_secondary_font($font) {
		ob_start();

		$secondary_font_family = $font['font-family'];
		if(!empty($secondary_font_family) && ''!==$secondary_font_family) :
?>
			#dt-menu label {
			  font: 3.125em/1.375em <?php print $secondary_font_family;?>;
			}
			#dt-topbar-menu-left label {
			  font: 3.125em/1.375em <?php print $secondary_font_family;?>;
			}

			#dt-topbar-menu-left ul li a:after {
			    font: 1.5em <?php print $secondary_font_family;?>;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.horizontal-wp-custom-menu .widget_nav_menu ul li,
			.dt-media .select-target,
			input.secondary_color_button,
			.social-share-link,
			.postdate .day,
			.postmetabottom,
			.dt-comment-author,
			#mobile-header label,
			#dt-menu, #dt-menu a,
			#mobile-header-top-left label,
			#dt-topbar-menu-left,
			#dt-topbar-menu-left .toggle-sub,
			#mobile-header-top-right label,
			#dt-topbar-menu-right,
			#dt-topbar-menu-right .toggle-sub,
			#top-bar,
			#footer h3.widget-title,
			.share-button.float-right.sharer-0 label span,
			.carousel-content .carousel-inner a.inline-block,
			.box-main-color .iconbox-detail h3,
			.box-secondary-color .iconbox-detail h3, 
			section#banner-section .breadcrumbs ,
			.postmetatop ul li,
			.singlepostmetatop ul li,
			.paging-nav,
			.dt-comment-date,
			.comment-leave-title,
			.comment-reply-title,
			footer#footer .widget_archive,
			footer#footer .dt_widget_recent_post,
			footer#footer .widget_categories, 
			footer#footer .widget_tag_cloud .tagcloud .tag {
			  font-family: <?php print $secondary_font_family;?>;
			}

			#dt-topbar-menu-right label {
			  font: 3.125em/1.375em <?php print $secondary_font_family;?>;
			}

			#dt-topbar-menu-right ul li a:after {
			    font: 1.5em <?php print $secondary_font_family;?>;
			}

			.widget_archive, 
			.widget_categories,
			.dt_widget_recent_post, 
			.widget_tag_cloud .tagcloud .tag {
			  font-family: inherit;
			}

			#sequence ul li .slide-title { font-family: <?php print $secondary_font_family;?>; }
			#footer .widget-title h3 { font-family: <?php print $secondary_font_family;?>; }

			.woocommerce #content input.button, 
			.woocommerce #respond input#submit, 
			.woocommerce a.button, 
			.woocommerce button.button, 
			.woocommerce input.button, 
			.woocommerce-page #content input.button, 
			.woocommerce-page #respond input#submit, 
			.woocommerce-page a.button, 
			.woocommerce-page button.button, 
			.woocommerce-page input.button,
			.cart-popup .button,
			.shipping-calculator-button {
			  font-family: <?php print $secondary_font_family;?>;
			}

			.woocommerce.widget_product_tag_cloud li, 
			.woocommerce.widget_product_tag_cloud .tagcloud .tag,
			footer#footer .woocommerce.widget_product_tag_cloud .tagcloud .tag {
			  font-family: <?php print $secondary_font_family;?>;
			}

			h3.dt_report_pre_title, h2.dt_report_title, .dt_report_button { font-family: <?php print $secondary_font_family;?>; }

			.eg-service-grid-element-2,
			.eg-portfolio-element-0,
			.eg-portfolio-element-5 { 
				font-family: <?php print $secondary_font_family;?>; 
			}

			.billio-nav-skin .esg-filterbutton,
			.billio-nav-skin .esg-navigationbutton,
			.billio-nav-skin .esg-sortbutton,
			.billio-nav-skin .esg-cartbutton {
				font-family: <?php print $secondary_font_family;?>; 
			}

			.woocommerce div.product .woocommerce-tabs #reviews #comments .comment_container .comment-text .meta .author,
			.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta {
				font-family: <?php print $secondary_font_family;?>; 	
			}

			.widget_rss .rsswidget, 
			.widget_rss cite { 
				font-family: <?php print $secondary_font_family;?>; 
			}

<?php
		endif;

		$line_height = $font['line-height'];
		if(!empty($line_height) && ''!==$line_height) :
?>
			#dt-menu label,
			#dt-topbar-menu-left label,
			#dt-topbar-menu-left ul li a:after,
			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.horizontal-wp-custom-menu .widget_nav_menu ul li,
			.dt-media .select-target,
			input.secondary_color_button,
			.social-share-link,
			.postdate .day,
			.dt-comment-author,
			#mobile-header label,
			#dt-menu, #dt-menu a,
			#mobile-header-top-left label,
			#dt-topbar-menu-left,
			#dt-topbar-menu-left .toggle-sub,
			#mobile-header-top-right label,
			#dt-topbar-menu-right,
			#dt-topbar-menu-right .toggle-sub,
			#top-bar,
			#footer h3.widget-title,
			.share-button.float-right.sharer-0 label span,
			.carousel-content .carousel-inner a.inline-block,
			.box-main-color .iconbox-detail h3,
			.box-secondary-color .iconbox-detail h3, 
			section#banner-section .breadcrumbs ,
			.postmetatop ul li,
			.singlepostmetatop ul li,
			.paging-nav,
			.dt-comment-date,
			.comment-leave-title,
			.comment-reply-title,
			footer#footer .widget_archive,
			footer#footer .dt_widget_recent_post,
			footer#footer .widget_tag_cloud .tagcloud .tag,
			#dt-topbar-menu-right label,
			#dt-topbar-menu-right ul li a:after,
			.widget_archive, 
			.dt_widget_recent_post, 
			.widget_tag_cloud .tagcloud .tag,
			#sequence ul li .slide-title,
			#footer .widget-title h3,
			.woocommerce #content input.button, 
			.woocommerce #respond input#submit, 
			.woocommerce a.button, 
			.woocommerce button.button, 
			.woocommerce input.button, 
			.woocommerce-page #content input.button, 
			.woocommerce-page #respond input#submit, 
			.woocommerce-page a.button, 
			.woocommerce-page button.button, 
			.woocommerce-page input.button,
			.woocommerce.widget_product_tag_cloud li, 
			.woocommerce.widget_product_tag_cloud .tagcloud .tag,
			.shipping-calculator-button,
			footer#footer .woocommerce.widget_product_tag_cloud .tagcloud .tag,
			h3.dt_report_pre_title, 
			h2.dt_report_title, 
			.dt_report_button,
			.eg-service-grid-element-2,
			.eg-portfolio-element-0,
			.eg-portfolio-element-5,
			.billio-nav-skin .esg-filterbutton,
			.billio-nav-skin .esg-navigationbutton,
			.billio-nav-skin .esg-sortbutton,
			.billio-nav-skin .esg-cartbutton,
			.woocommerce div.product .woocommerce-tabs #reviews #comments .comment_container .comment-text .meta .author, 
			.widget_rss .rsswidget, 
			.widget_rss cite {
  				line-height: <?php print $line_height;?>;
			}
<?php
		endif;

		$letter_spacing = $font['letter-spacing'];
		if(!empty($letter_spacing) && ''!==$letter_spacing) :
?>
			#dt-menu label,
			#dt-topbar-menu-left label,
			#dt-topbar-menu-left ul li a:after,
			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.horizontal-wp-custom-menu .widget_nav_menu ul li,
			.dt-media .select-target,
			input.secondary_color_button,
			.social-share-link,
			.postdate .day,
			.postmetabottom,
			.dt-comment-author,
			#mobile-header label,
			#dt-menu, #dt-menu a,
			#mobile-header-top-left label,
			#dt-topbar-menu-left,
			#dt-topbar-menu-left .toggle-sub,
			#mobile-header-top-right label,
			#dt-topbar-menu-right,
			#dt-topbar-menu-right .toggle-sub,
			#top-bar,
			#footer h3.widget-title,
			.share-button.float-right.sharer-0 label span,
			.carousel-content .carousel-inner a.inline-block,
			.box-main-color .iconbox-detail h3,
			.box-secondary-color .iconbox-detail h3, 
			section#banner-section .breadcrumbs ,
			.postmetatop ul li,
			.singlepostmetatop ul li,
			.paging-nav,
			.dt-comment-date,
			.comment-leave-title,
			.comment-reply-title,
			footer#footer .widget_archive,
			footer#footer .dt_widget_recent_post,
			footer#footer .widget_categories, 
			footer#footer .widget_tag_cloud .tagcloud .tag,
			#dt-topbar-menu-right label,
			#dt-topbar-menu-right ul li a:after,
			.widget_archive, 
			.widget_categories,
			.dt_widget_recent_post, 
			.widget_tag_cloud .tagcloud .tag,
			#sequence ul li .slide-title,
			#footer .widget-title h3,
			.woocommerce #content input.button, 
			.woocommerce #respond input#submit, 
			.woocommerce a.button, 
			.woocommerce button.button, 
			.woocommerce input.button, 
			.woocommerce-page #content input.button, 
			.woocommerce-page #respond input#submit, 
			.woocommerce-page a.button, 
			.woocommerce-page button.button, 
			.woocommerce-page input.button,
			.woocommerce.widget_product_tag_cloud li, 
			.woocommerce.widget_product_tag_cloud .tagcloud .tag,
			.cart-popup .button, 
			.shipping-calculator-button,
			footer#footer .woocommerce.widget_product_tag_cloud .tagcloud .tag,
			h3.dt_report_pre_title, 
			h2.dt_report_title, 
			.dt_report_button,
			.eg-service-grid-element-2,
			.eg-portfolio-element-0,
			.eg-portfolio-element-5,
			.billio-nav-skin .esg-filterbutton,
			.billio-nav-skin .esg-navigationbutton,
			.billio-nav-skin .esg-sortbutton,
			.billio-nav-skin .esg-cartbutton,
			.woocommerce div.product .woocommerce-tabs #reviews #comments .comment_container .comment-text .meta .author, 
			.widget_rss .rsswidget, 
			.widget_rss cite {
				letter-spacing: <?php print $letter_spacing;?>;
			}
<?php
		endif;
		
		$cssline=ob_get_contents();

		ob_end_clean();

		return $cssline;

	} //function get_redux_custom_secondary_font
} //if(!function_exists('get_redux_custom_secondary_font'))

if(!function_exists('get_redux_custom_quote_font')){

function get_redux_custom_quote_font($font) {
	ob_start();

	$tertiary_font_family = $font['font-family'];
	if(!empty($tertiary_font_family) && ''!==$tertiary_font_family) :
?>
blockquote, article blockquote, .dt_column blockquote, #footer blockquote { font-family: <?php print $tertiary_font_family;?>; }

.blog_info_author, .blog_info_date, .blog_info_tags, .blog_info_comments { font-family: <?php print $tertiary_font_family;?>; }

.blog .postcontent.postcontent-quote { font-family: <?php print $tertiary_font_family;?>; }
.postcontent-quote { font-family: <?php print $tertiary_font_family;?>; }

.woocommerce ul.products li.product .price, 
.woocommerce-page ul.products li.product .price,
.woocommerce #content div.product p.price, 
.woocommerce-page #content div.product p.price, 
.woocommerce #content div.product span.price, 
.woocommerce-page #content div.product span.price, 
.woocommerce div.product p.price, 
.woocommerce-page div.product p.price, 
.woocommerce div.product span.price, 
.woocommerce-page div.product span.price,
.woocommerce .upsells.products .price, 
.woocommerce-page .upsells.products .price, 
.woocommerce .related.products .price,
.woocommerce-page .related.products .price,
.woocommerce div.product .woocommerce-product-rating .woocommerce-review-link,
.single-product .product_meta > span,
.widget_rss .rss-date,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time {
  font-family: <?php print $tertiary_font_family;?>;
}

<?php
	endif; //if(!empty($tertiary_font_family) && ''!==$tertiary_font_family)

	$line_height = $font['line-height'];
	if(!empty($line_height) && ''!==$line_height) :
?>
blockquote, article blockquote, .dt_column blockquote, #footer blockquote,
.blog_info_date, .blog_info_tags, .blog_info_comments,
.blog .postcontent.postcontent-quote,
.postcontent-quote,
.woocommerce ul.products li.product .price, 
.woocommerce-page ul.products li.product .price,
.woocommerce #content div.product p.price, 
.woocommerce-page #content div.product p.price, 
.woocommerce #content div.product span.price, 
.woocommerce-page #content div.product span.price, 
.woocommerce div.product p.price, 
.woocommerce-page div.product p.price, 
.woocommerce div.product span.price, 
.woocommerce-page div.product span.price,
.woocommerce .upsells.products .price, 
.woocommerce-page .upsells.products .price, 
.woocommerce .related.products .price,
.woocommerce-page .related.products .price,
.woocommerce div.product .woocommerce-product-rating .woocommerce-review-link,
.single-product .product_meta > span,
.widget_rss .rss-date {
  line-height: <?php print $line_height;?>;
}

<?php
	endif;

	$letter_spacing = $font['letter-spacing'];
	if(!empty($letter_spacing) && ''!==$letter_spacing) :
?>
blockquote, article blockquote, .dt_column blockquote, #footer blockquote,
.blog_info_date, .blog_info_tags, .blog_info_comments,
.blog .postcontent.postcontent-quote,
.postcontent-quote,
.woocommerce ul.products li.product .price, 
.woocommerce-page ul.products li.product .price,
.woocommerce #content div.product p.price, 
.woocommerce-page #content div.product p.price, 
.woocommerce #content div.product span.price, 
.woocommerce-page #content div.product span.price, 
.woocommerce div.product p.price, 
.woocommerce-page div.product p.price, 
.woocommerce div.product span.price, 
.woocommerce-page div.product span.price,
.woocommerce .upsells.products .price, 
.woocommerce-page .upsells.products .price, 
.woocommerce .related.products .price,
.woocommerce-page .related.products .price,
.woocommerce div.product .woocommerce-product-rating .woocommerce-review-link,
.single-product .product_meta > span,
.widget_rss .rss-date {
  letter-spacing: <?php print $letter_spacing;?>;
}

<?php
	endif;

	$cssline=ob_get_contents();

	ob_end_clean();

	return $cssline;
} //function get_redux_custom_quote_font

} //if(!function_exists('get_redux_custom_quote_font'))

if(!function_exists('get_redux_custom_primary_color')){
function get_redux_custom_primary_color($color='') {

	if(empty($color) && ''!==$color)
		return '';

	ob_start();

	$mainColor=$color;

    @list($r, $g, $b) = sscanf($mainColor, "#%02x%02x%02x");
    $rgbcolor=$r.','.$g.','.$b;

    @list($r50d, $g50d, $b50d) = sscanf(detheme_darken($mainColor,50), "#%02x%02x%02x");
    $rgb50dcolor=$r50d.','.$g50d.','.$b50d;
?>


		/* Hue */

		.widget_recent_comments a:hover,
		.widget a:hover, .sidebar a:hover,
		.postinfo a:hover { color: <?php print $mainColor;?>;	}

		a:hover, a:focus { color : <?php print detheme_darken($mainColor,20);?>; }
		h1 a:hover,
		h2 a:hover,
		h3 a:hover,
		h4 a:hover,
		h5 a:hover,
		h6 a:hover,
		h1 a:focus,
		h2 a:focus,
		h3 a:focus,
		h4 a:focus,
		h5 a:focus,
		h6 a:focus,
		.portfolio-type-text .portfolio-item .portfolio-termlist a
		 {
		  color: <?php print $mainColor;?>;
		}

		/* End Hue */

		.primary_color_bg, .paging-nav span.current, .paging-nav a:hover { background-color: <?php print $mainColor;?>; }
		.billio_link_page a:hover, .billio_link_page > span.page-numbers { background-color: <?php print $mainColor;?>; }
		.primary_color_text { color: <?php print $mainColor;?>; }
		.primary_color_border { border-color: <?php print $mainColor;?>; }
		.primary_color_button {
		  background-color: <?php print $mainColor;?>;
		}

		.woocommerce.widget_product_tag_cloud li { background-color: <?php print $mainColor;?>; }

		.btn-color-primary,
		.portfolio-navigation a.more-post, 
		.shipping-calculator-button,
		.woocommerce #content input.button,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.woocommerce-page #content input.button,
		.woocommerce-page #respond input#submit,
		.woocommerce-page a.button,
		.woocommerce-page button.button,
		.woocommerce-page input.button,
		.woocommerce.widget_product_search #searchsubmit,
		.woocommerce #content input.button.alt,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce-page #content input.button.alt,
		.woocommerce-page #respond input#submit.alt,
		.woocommerce-page a.button.alt,
		.woocommerce-page button.button.alt,
		.woocommerce-page input.button.alt,
		.cart-popup .button, 
		.shipping-calculator-button {
			background: <?php print $mainColor;?>;
		}

		.woocommerce .posted_in a { color: <?php print $mainColor;?>; }
		.woocommerce .single_add_to_cart_button:hover {background-color: <?php print detheme_darken($mainColor, 10);?>!important;}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active { border-color: <?php print $mainColor;?>!important; }
		.woocommerce div.product .woocommerce-tabs #reviews #review_form_wrapper input[type="submit"]:hover {
  			background-color: <?php print detheme_darken($mainColor, 10);?>;
		}
		
		footer#footer .widget_text ul.list-inline-icon li:hover { border: 1px solid <?php print $mainColor;?>; background: <?php print $mainColor;?>; }
		footer#footer .owl-theme .owl-controls .owl-page span { background-color: <?php print $mainColor;?>; border: 2px solid <?php print $mainColor;?>; }
		footer#footer .owl-theme .owl-controls .owl-page.active span { border: 2px solid <?php print $mainColor;?>; }

		footer#footer .widget_calendar #today {
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .widget_calendar thead th {
		  color: <?php print $mainColor;?>;
		}
		footer#footer .widget_tag_cloud .tagcloud .tag a:hover {
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_tabs .nav-tabs li a:hover {
		  color: #ffffff;
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_tabs .nav-tabs li:hover {
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_tabs .nav-tabs li.active a {
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_tabs .nav-tabs li.active a:hover,
		footer#footer .dt_widget_tabs .nav-tabs li.active a:focus {
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_accordion .btn-accordion {
		  background-color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_accordion .opened {
		  background: #ffffff; 
		  color: <?php print $mainColor;?>;
		}
		footer#footer .dt_widget_accordion .openedup {
		  background-color: <?php print $mainColor;?>;
		}
		.sidebar .owl-theme .owl-controls .owl-page span {
		  background-color: <?php print $mainColor;?>;
		}
		.sidebar .owl-theme .owl-controls .owl-page.active span {
		  border: 2px solid <?php print $mainColor;?>;
		}
		.widget_calendar a {
		  color: <?php print $mainColor;?>;
		}
		.widget_calendar #today {
		  background-color: <?php print $mainColor;?>;
		}
		.widget_text ul.list-inline-icon li:hover {
		   border: 1px solid <?php print $mainColor;?>; background: <?php print $mainColor;?>; 
		}
		.widget_tag_cloud .tagcloud .tag a:hover {
		  background-color: <?php print $mainColor;?>;
		}
		#footer h3.widget-title:after {
		  border-top: solid 2px <?php print $mainColor;?>;
		}
		#related-port .related-port figure figcaption .related-tag a {
		  color: <?php print $mainColor;?>;
		}

		.dt_team_custom_item hr:after {
		  width: 50px !important;
		}
		.dt-iconboxes span:hover:after,
		.dt-iconboxes span:hover:before,
		.dt-iconboxes.layout-3 span:hover:after,
		.dt-iconboxes.layout-3 span:hover:before,
		.dt-iconboxes-4:hover .dt-section-icon:after,
		.dt-iconboxes-4:hover .dt-section-icon:before {
		  border-top-color: <?php print $mainColor;?> !important;
		}
		.dt_team_custom_item .profile-position,
		.dt-iconboxes-4:hover .dt-section-icon i:hover,
		.dt-iconboxes.layout-6 i,
		.no-touch .dt-iconboxes-4:hover .hi-icon-effect-5 .hi-icon {
		  color: <?php print $mainColor;?> !important;
		}
		.no-touch .dt-iconboxes-5:hover .hi-icon-effect-5 .hi-icon {
		  border-color: <?php print $mainColor;?> !important;
		}
		.dt-iconboxes span:hover,
		.dt-iconboxes-2:hover .dt-section-icon i.hi-icon,
		.dt-iconboxes-2:hover i,
		.dt-iconboxes.layout-3 span:hover,
		.dt-iconboxes-4:hover .dt-section-icon,
		.no-touch .dt-iconboxes-5:hover .hi-icon-effect-5 .hi-icon,
		.dt-iconboxes.layout-6:hover {
		  background-color: <?php print $mainColor;?> !important;
		}
		.dt-iconboxes.layout-3 span:hover {
			border-color: <?php print $mainColor;?>!important;
	    }
		.dt_team_custom_item .profile-scocial a:hover,
		.dt_team_custom_item .profile-scocial i:hover {
		  color: <?php print $mainColor;?>;
		}
		.price-4-col.featured ul, .price-3-col.featured ul{
		  background-color: <?php print $mainColor;?>;
		}
		.price-4-col.featured .hover-tip:before, .price-3-col.featured .hover-tip:before,
		.price-4-col.featured .hover-tip:after, .price-3-col.featured .hover-tip:after {
			border-bottom-color: <?php print detheme_darken($mainColor,30);?>;
		}
		.price-4-col.featured .plan-action:before, .price-3-col.featured .plan-action:before,
		.price-4-col.featured .plan-action:after, .price-3-col.featured .plan-action:after {
			border-top-color: <?php print detheme_darken($mainColor,30);?>;
		}
		.dt-pricing-table .price-4-col .btn-active,
		.dt-pricing-table .price-3-col .btn-active {
		  background-color: <?php print $mainColor;?>;
		}
		.dt-pricing-table .price-4-col .btn-active:hover,
		.dt-pricing-table .price-3-col .btn-active:hover {
		  background-color: <?php print detheme_darken($mainColor,20);?>;
		}
		.mejs-container .mejs-controls .mejs-horizontal-volume-current,
		.mejs-container .mejs-controls .mejs-time-loaded {
		  background-color: <?php print $mainColor;?> !important;
		}

		#dt-menu li a:hover,
		#dt-topbar-menu-left li a:hover,
		#dt-topbar-menu-right li a:hover, 
		#dt-menu ul.sub-nav li:hover > a,
		#head-page #dt-menu > ul > li > a:hover,
		#head-page.reveal #dt-menu > ul > li > a:hover,
		#head-page.reveal.alt #dt-menu > ul > li > a:hover,
		.home #head-page #dt-menu > ul > li > a:hover,
		.home #head-page.reveal #dt-menu > ul > li > a:hover,
		.home #head-page.reveal.alt #dt-menu > ul > li > a:hover,
		.home #head-page.reveal:not(.alt) #dt-menu > ul > li > a:hover,
		.home #head-page.reveal:not(.alt) #dt-menu a.search_btn:hover {
			color: <?php print $mainColor;?>;
		}

		@media (max-width: 991px) {
			#head-page #dt-menu > ul > li > a:hover,
			#head-page.reveal #dt-menu > ul > li > a:hover,
			#head-page.reveal.alt #dt-menu > ul > li > a:hover {
				color: <?php print $mainColor;?> !important;
			}
		}

		@media (min-width: 767px) {
			#dt-menu ul li:hover > a {
				color: <?php print $mainColor;?>;
			}
		}
		#dt-menu a.search_btn:hover {
		    color: <?php print $mainColor;?> !important;
		}
		#dt-topbar-menu-left ul li:hover > a {
		    color: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-left .toggle-sub {
		  background: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-left li:hover > .toggle-sub {
		  color: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-left ul li:first-child {
		    border-top: 3px solid <?php print $mainColor;?> !important;
		  }

		#dt-topbar-menu-right ul li:hover > a {
		    color: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-right .toggle-sub {
		  background: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-right li:hover > .toggle-sub {
		  color: <?php print $mainColor;?>;
		}

		.select.select-theme-default .select-options .select-option:hover, .select.select-theme-default .select-options .select-option.select-option-highlight {background: <?php print $mainColor;?>;}

		footer#footer .dt_widget_portfolio_posts .post-item figure figcaption {
		  background: rgba(<?php print $rgb50dcolor;?>, 0.6);
		}
		.sidebar .dt_widget_portfolio_posts .portfolio_wrapper .post-item figure figcaption {
		  background: rgba(<?php print $rgb50dcolor;?>, 0.6);
		}
		.dt_widget_featured_posts .post-item figure figcaption {
		  background: rgba(<?php print $rgb50dcolor;?>, 0.6);
		}
		.sidebar .widget_calendar a:hover {
		  color: <?php print detheme_darken($mainColor,30);?>;
		}


		.dt-iconboxes.layout-7:hover i{
		  border-color: <?php print detheme_darken($mainColor,35);?> !important;	
		}
		.dt-iconboxes.layout-7 i,
		.dt-iconboxes.layout-8 i {
		  color: <?php print $mainColor;?>;	
		}

		@media (max-width: 768px) {
		  #footer-left {
		    border-bottom: solid 1px <?php print detheme_darken($mainColor,60);?>;
		  }
		}
		.dt-iconboxes-4:hover { 
			background-color: <?php print detheme_darken($mainColor,20);?>; 
		}

		.sidebar .woocommerce.widget_product_tag_cloud .tagcloud .tag:hover,
		footer#footer .woocommerce.widget_product_tag_cloud .tagcloud .tag:hover {
		  background-color: <?php print $mainColor;?>;
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
		  background-color: <?php print $mainColor;?>;
		}

		.border-color-primary, 
		.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, 
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, 
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, 
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a {
		  border-color: <?php print $mainColor;?>;
		}
		.woocommerce .stars a:hover:after { color: <?php print $mainColor;?>; }
		
		.box-main-color .img-blank {
		  background-color: <?php print $mainColor;?>;
		}
		.link-color-primary, 
		#dt-menu #menu-main-menu .current-menu-parent > a,
		#head-page.reveal #dt-menu > ul > li.current-menu-item > a,
		#head-page.reveal.alt #dt-menu > ul > li.current-menu-item > a,
		.home #head-page.reveal #dt-menu > ul > li.current-menu-item > a,
		.home #head-page.reveal:not(.alt) #dt-menu > ul > li.current-menu-item > a,
		.home #head-page.reveal.alt #dt-menu > ul > li.current-menu-item > a,
		#head-page.reveal #dt-menu > ul > li.current-menu-ancestor > a,
		#head-page.reveal.alt #dt-menu > ul > li.current-menu-ancestor > a,
		#head-page.reveal #dt-menu ul li.current-menu-item > a,
		#head-page.reveal.alt #dt-menu ul li.current-menu-item > a,
		#head-page.reveal #dt-menu ul li.current-menu-ancestor > a,
		#head-page.reveal.alt #dt-menu ul li.current-menu-ancestor > a {
		  color: <?php print $mainColor;?>;
		}
		
		#dt-menu li.current-menu-parent > a {
		  color: <?php print $mainColor;?>!important;
		}

		.woocommerce nav.woocommerce-pagination ul li a.prev:hover, 
		.woocommerce-page nav.woocommerce-pagination ul li a.prev:hover, 
		.woocommerce nav.woocommerce-pagination ul li a.next:hover, 
		.woocommerce-page nav.woocommerce-pagination ul li a.next:hover {
		  color: <?php print $mainColor;?>;
		}
		.background-color-primary,
		.dt-icon-square.primary-color, 
		.dt-icon-circle.primary-color, 
		.dt-icon-ghost.primary-color, 
		.sidebar .widget_text .social-circled li:hover, 
		#footer .container .widget_text .social-circled li:hover, 
		#featured-work-navbar #featured-filter.dt-featured-filter li.active a, 
		.owl-custom-pagination .owl-page.active i, 
		.wpb_wrapper .wpb_content_element .wpb_accordion_wrapper .ui-state-default .ui-icon:after, 
		.wpb_wrapper .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active,  
		.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, 
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, 
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, 
		.woocommerce nav.woocommerce-pagination ul li span.current, 
		.woocommerce-page nav.woocommerce-pagination ul li span.current, 
		.woocommerce #content nav.woocommerce-pagination ul li span.current, 
		.woocommerce-page #content nav.woocommerce-pagination ul li span.current, 
		.woocommerce nav.woocommerce-pagination ul li a:hover, 
		.woocommerce-page nav.woocommerce-pagination ul li a:hover, 
		.woocommerce #content nav.woocommerce-pagination ul li a:hover, 
		.woocommerce-page #content nav.woocommerce-pagination ul li a:hover, 
		.woocommerce nav.woocommerce-pagination ul li a:focus, 
		.woocommerce-page nav.woocommerce-pagination ul li a:focus, 
		.woocommerce #content nav.woocommerce-pagination ul li a:focus, 
		.woocommerce-page #content nav.woocommerce-pagination ul li a:focus, 
		#sequence ul li .btn-cta:after, .dt-iconboxes-4, .dt-iconboxes span:hover, 
		.dt-iconboxes-2:hover .dt-section-icon i.hi-icon, .dt-iconboxes-2:hover i, 
		.dt-iconboxes.layout-3 span:hover, .dt-iconboxes-4:hover .dt-section-icon, 
		.no-touch .dt-iconboxes-5:hover .hi-icon-effect-5 .hi-icon, 
		.dt-iconboxes.layout-6:hover, 
		.dt-iconboxes.layout-3 span:hover {
		  background: none repeat scroll 0 0 <?php print $mainColor;?>;
		}
		.bulat2 {
		  background: none repeat scroll 0 0 <?php print $mainColor;?>;
		}
		#featured-work-navbar #featured-filter.dt-featured-filter li.active {
		  border: 1px solid <?php print $mainColor;?> !important;
		}
		.no-touch .dt-iconboxes-5:hover .hi-icon-effect-5 .hi-icon {
		  background-color: <?php print $mainColor;?>;
		  border-color: <?php print $mainColor;?>;
		}
		.container .owl-theme .owl-controls .owl-page span {
		  background-color: <?php print $mainColor;?>;
		  border-color: <?php print $mainColor;?>; 
		}
		.owl-theme .owl-controls .owl-page.active span {
		  border-color: <?php print $mainColor;?>; 
		}
		.container .carousel-content .carousel-indicators li {
		  	background-color: <?php print $mainColor;?>;
		  	border-color: <?php print $mainColor;?>; 
		}
		.container .carousel-content .carousel-indicators .active {
		  	border-color: <?php print $mainColor;?>; 
		}
		.dt-iconboxes span:hover {
		  	border-color: <?php print $mainColor;?>;
		}
		#dt-menu .sub-nav li.current-menu-item,
		#dt-menu .sub-nav li:hover {
		  border-color: <?php print $mainColor;?>;
		}
		.dt_vertical_tab .vertical-nav-tab > li > div i { color: <?php print $mainColor;?>; }
		.wpb_wrapper .wpb_content_element .wpb_accordion_wrapper .ui-state-active .ui-icon:after {
			color: <?php print $mainColor;?>;
		}
		.wpb_wrapper .wpb_content_element .wpb_tabs_nav li.ui-tabs-active {
			background: none repeat scroll 0 0 <?php print $mainColor;?>;
		}

		.btn.btn-link { color: <?php print $mainColor;?>; }
		.btn.btn-link:hover { color: <?php print $mainColor;?>; }
		
		.btn.btn-rounded { color: <?php print $mainColor;?>; border-color: <?php print $mainColor;?>; }

		#footer .widget-title h3:after { border-top: 2px solid <?php print $mainColor;?>; }

		.woocommerce #content div.product p.price, 
		.woocommerce-page #content div.product p.price, 
		.woocommerce #content div.product span.price, 
		.woocommerce-page #content div.product span.price, 
		.woocommerce div.product p.price, 
		.woocommerce-page div.product p.price, 
		.woocommerce div.product span.price, 
		.woocommerce-page div.product span.price,
		.woocommerce ul.products li.product .price, 
		.woocommerce-page ul.products li.product .price,
		.woocommerce .upsells.products .price, 
		.woocommerce-page .upsells.products .price, 
		.woocommerce .related.products .price,
		.woocommerce-page .related.products .price {
			color: <?php print $mainColor;?>;
		}

		.woocommerce div.product .woocommerce-tabs #reviews #comments .comment_container .comment-text .meta .datePublished {
			color: <?php print $mainColor;?>;
		}

		.woocommerce #content div.product .woocommerce-tabs ul.tabs li a, 
		.woocommerce div.product .woocommerce-tabs ul.tabs li a, 
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a, 
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li a {
			color: <?php print $mainColor;?>;
		}

		

		.dt_report_pre_title { color : <?php print $mainColor;?>; }
		.dt_report_button a { background-color : <?php print $mainColor;?>; }
		.dt_report_button a:hover { background-color : <?php print detheme_darken($mainColor,30);?>; }
		.dt_report_pagination .page-numbers.current { background-color: <?php print $mainColor;?>; }
		.dt_report_pagination .page-numbers:hover { background-color: <?php print $mainColor;?>; }

		.eg-portfolio-element-5 {background-color: <?php print $mainColor;?>!important;}
		.eg-portfolio-element-5:hover {background-color: <?php print detheme_darken($mainColor,10);?>!important;}


		.woocommerce .onsale, .woocommerce-page .onsale, .woocommerce span.onsale, .woocommerce-page span.onsale {background-color: <?php print $mainColor;?>;}

		
		.flex-control-paging li a.flex-active, .flex-control-paging li a:hover {
  			background: <?php print $mainColor;?>!important;
		}

		section#banner-section .breadcrumbs .current {color: <?php print $mainColor;?>;}
		

		.dt-timeline .time-item:hover .center-line i { background: <?php print $mainColor;?>; }
		.dt-timeline .time-item:hover .content-line { border-color: <?php print $mainColor;?>; }
		.dt-timeline .time-item:hover .content-line:before { border-color: <?php print $mainColor;?>; }
		.dt-media .select-target { background-color: <?php print $mainColor;?>; }
		
		.horizontal-wp-custom-menu li.current-menu-item { background-color: <?php print $mainColor;?>; }
		.horizontal-wp-custom-menu .widget_nav_menu ul { border-top-color: <?php print $mainColor;?>!important; }

		.dt-icon.primary-color { color: <?php print $mainColor;?>; }
		.products .type-product .button:hover,
		.products .type-product .woocommerce_after_shop_loop_item_title .button:hover { 
			background-color: <?php print detheme_darken($mainColor,10);?>; 
		}


		.dt-shop-category .owl-carousel-navigation .btn-owl { background-color: <?php print $mainColor;?>; }
		.dt-shop-category .owl-carousel-navigation .btn-owl:hover { background-color: <?php print detheme_darken($mainColor,10);?>!important; }
		.widget_rss .rsswidget { color: <?php print $mainColor;?>; }		
		
		

<?php
	$cssline=ob_get_contents();
	ob_end_clean();

	return $cssline;
}
}
if(!function_exists('get_redux_custom_secondary_color')){
function get_redux_custom_secondary_color($color='') {

	if(empty($color) && ''!==$color)
		return '';

	ob_start();

	$mainColor=$color;

    @list($r, $g, $b) = sscanf($mainColor, "#%02x%02x%02x");
    $rgbcolor=$r.','.$g.','.$b;
?>
		.secondary_color_bg { background-color: <?php print $mainColor;?>; }
		.secondary_color_text { color: <?php print $mainColor;?>; }
		.secondary_color_border { border-color: <?php print $mainColor;?>; }

		.secondary_color_button, .btn-color-secondary {
		  background-color: <?php print $mainColor;?>;
		}
		.secondary_color_button:hover, .btn-color-secondary:hover {
		  background-color: <?php print detheme_darken($mainColor,20);?>!important;
		}
		.background-color-secondary, .dt-icon-circle.secondary-color, .dt-icon-ghost.secondary-color, .dt-icon-square.secondary-color, #sequence ul.sequence-canvas li .slide-title:after {
			 background: <?php print $mainColor;?>;
		}
		:selection {
		  background: <?php print $mainColor;?>;
		}
		::selection {
		  background: <?php print $mainColor;?>;
		}
		::-moz-selection {
		  background: <?php print $mainColor;?>;
		}
		.woocommerce.widget_product_tag_cloud li:hover {
		  background-color: <?php print $mainColor;?>;
		}
		.woocommerce ul.products li.product .onsale:after,
		.woocommerce-page ul.products li.product .onsale:after,
		.woocommerce span.onsale:after,
		.woocommerce-page span.onsale:after {
		  border-bottom: 40px solid <?php print $mainColor;?>;
		}
		


		
		#dt-topbar-menu-left li .toggle-sub:hover {
		  color: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-left a.search_btn:hover {
		    color: <?php print $mainColor;?>;
		  }
		#dt-topbar-menu-right li .toggle-sub:hover {
		  color: <?php print $mainColor;?>;
		}
		#dt-topbar-menu-right a.search_btn:hover {
		    color: <?php print $mainColor;?>;
		  }
		footer#footer .widget_calendar a {
		  color: <?php print $mainColor;?>;
		}
		footer#footer .widget_recent_comments a:hover {
		  color: <?php print $mainColor;?>;
		}
		
		.sidebar .dt-widget-twitter .sequence-twitter a {
		  color: <?php print $mainColor;?>;
		}
		
		.share-button label span {
		  color: <?php print $mainColor;?> !important;
		}
		#top-bar a:hover {
		  color: <?php print $mainColor;?>;
		}
		.dt-section-head header i {
		  background: <?php print $mainColor;?>;
		}
		.progress_bars i {
		  background-color: <?php print $mainColor;?>;
		}
		.post-masonry li.isotope-item .isotope-inner .comment-count i:before {
		  color: <?php print $mainColor;?>;
		}
		.post-masonry li.isotope-item .post-info .author a {
		  color: <?php print $mainColor;?>;
		}

		.box-secondary-color .img-blank {
		  background-color: <?php print $mainColor;?>;
		}
		.bulat1 {
		  background: none repeat scroll 0 0 <?php print $mainColor;?>;
		}
		.dt-icon.secondary-color { color: <?php print $mainColor;?>; }
		.blog_info_tags a:hover { color: <?php print $mainColor;?>!important; }
<?php
	$cssline=ob_get_contents();
	ob_end_clean();

	return $cssline;
}
}

if(!function_exists('get_redux_custom_footer_bg_color')){
function get_redux_custom_footer_bg_color($color='') {

	if(empty($color) && ''!==$color)
		return '';

	ob_start();

	$footer_bg_color = $color;

    @list($r, $g, $b) = sscanf($footer_bg_color, "#%02x%02x%02x");
    $rgbcolor=$r.','.$g.','.$b;
?>
		.tertier_color_bg {background-color: <?php print $footer_bg_color;?>; }
<?php
	$cssline=ob_get_contents();
	ob_end_clean();

	return $cssline;
}
}

if(!function_exists('get_redux_custom_footer_font_color')){
function get_redux_custom_footer_font_color($color='') {

	if(empty($color) && ''!==$color)
		return '';

	ob_start();

	$footer_font_color = $color;

    @list($r, $g, $b) = sscanf($footer_font_color, "#%02x%02x%02x");
    $rgbcolor=$r.','.$g.','.$b;
?>
		.footer-left { color: <?php print $footer_font_color;?>; }
		.footer-right { color: <?php print $footer_font_color;?>; }
		footer#footer a { color: <?php print $footer_font_color;?>; }
		#footer .widget-title { color: <?php print $footer_font_color;?>; }

		#footer .container .widget_text .social-circled li,
		#footer .container .widget_text .social-circled li:last-child,
		#footer .woocommerce ul.cart_list li,
		#footer .woocommerce ul.product_list_widget li,
		#footer .woocommerce-page ul.cart_list li,
		#footer .woocommerce-page ul.product_list_widget li,
		#footer .woocommerce.widget_product_categories li,
		footer#footer .widget_tag_cloud .tagcloud .tag,
		footer#footer .dt_widget_tabs .nav-tabs li a,
		footer#footer .dt_widget_tabs .tab-pane .rowlist,
		footer#footer .dt_widget_accordion .panel-heading,
		footer#footer .dt_widget_accordion .panel-body,
		#footer .widget_categories ul li,
		#footer .widget_recent_entries ul li,
		#footer .widget_recent_comments ul li,
		#footer .widget_rss ul li,
		#footer .widget_meta ul li,
		#footer .widget_nav_menu ul li,
		#footer .widget_archive ul li,
		#footer .widget_text ul li,
		footer#footer .woocommerce.widget_product_tag_cloud .tagcloud .tag {
		  border-color: rgba(<?php print $rgbcolor;?>, 0.4);
		}

		footer#footer .widget_text ul.list-inline-icon li {
		  border: 1px solid rgba(<?php print $rgbcolor;?>, 0.4);
		}

		footer#footer .widget_search {
		  color: <?php print $footer_font_color;?>;
		}

		footer#footer .widget_search #s {
		  border: 1px solid rgba(<?php print $rgbcolor;?>, 0.4);
		  color: <?php print $footer_font_color;?>;
		}

		footer#footer .select-target.select-theme-default {
	  		border: 1px solid rgba(<?php print $rgbcolor;?>, 0.4);
		}

		footer#footer .dt_widget_accordion .panel-heading {
		  color: <?php print $footer_font_color;?>;
		}
		
		footer#footer .widget_recent_comments a {
		  color: rgba(<?php print $rgbcolor;?>, 0.4);
		}

		footer#footer .woocommerce.widget_product_search #s {
		  border: 1px solid rgba(<?php print $rgbcolor;?>, 0.4);
		}
<?php
	$cssline=ob_get_contents();
	ob_end_clean();

	return $cssline;
}

}

if(!function_exists('get_redux_custom_menu_height')){
	function get_redux_custom_menu_height($line_height='') {

		if (empty($line_height) && ''!==$line_height) return '';
			
		if (!is_numeric($line_height)) return '';

		ob_start();
	?>
		#head-page > .container { height: <?php print $line_height;?>em; }
		@media(min-width: 992px) {
			#dt-menu > ul > li { line-height: <?php print $line_height;?>em;}
		}
	<?php
		$cssline=ob_get_contents();
		ob_end_clean();

		return $cssline;
	}
}

if(!function_exists('get_redux_custom_page_loader')){
	function get_redux_custom_page_loader($args) {
		$cssline="";

		if ($args['page_loader']==1) {
			$cssline.=".modal_preloader { background-color: ".$args['page_loader_background']."; }";
			$cssline.=".ball_1 { background-color: ".$args['page_loader_ball_1']."; }";
			$cssline.=".ball_2 { background-color: ".$args['page_loader_ball_2']."; }";
			$cssline.=".ball_3 { background-color: ".$args['page_loader_ball_3']."; }";
			$cssline.=".ball_4 { background-color: ".$args['page_loader_ball_4']."; }";
		}

		return $cssline;
	}
}

if(!function_exists('get_redux_custom_sticky_sidebar')){
	function get_redux_custom_sticky_sidebar($args) {

	ob_start();
	?>
		@media(min-width: 768px) {
			#floatMenu {
				<?php print (!empty($args['dt_scrollingsidebar_position']) && !empty($args['dt_scrollingsidebar_margin']))?$args['dt_scrollingsidebar_position'].":".intval($args['dt_scrollingsidebar_margin'])."px;".($args['dt_scrollingsidebar_position']=='left'?"right:auto;":""):"";
				print (!empty($args['dt_scrollingsidebar_top_margin']))?"top: ".intVal($args['dt_scrollingsidebar_top_margin'])."px;":"";
				print ($args['dt_scrollingsidebar_bg_type'] && !empty($args['dt_scrollingsidebar_bg_color']))?"background-color: ".$args['dt_scrollingsidebar_bg_color'].";":"";?>;
			}
		}
	<?php
		$cssline=ob_get_contents();
		ob_end_clean();

		return $cssline;
	}
}

if(!function_exists('get_redux_custom_banner')){
	function get_redux_custom_banner($args) {
		$cssline = "";

		if(!empty($args['dt-title-top-margin'])){
			$dt_title_top_margin=(strpos($args['dt-title-top-margin'], "px") || strpos($args['dt-title-top-margin'], "%") || strpos($args['dt-title-top-margin'], "em"))?$args['dt-title-top-margin']:$args['dt-title-top-margin']."px";

			$cssline .= (!empty($dt_title_top_margin)) ? "#banner-section .row {top: ".$dt_title_top_margin.";}" : "";
		}



		$cssline .= ($args['title-color']) ? "section#banner-section .page-title, section#banner-section .breadcrumbs, section#banner-section .breadcrumbs a { color:".$args['title-color'].";}\n":"";

		return $cssline;
	}
}

function get_redux_custom_header($args){

	$cssline="";

	if (isset($args['header-color'])) {
		$header_color = detheme_hex2rgba($args['header-color']['color'],$args['header-color']['alpha']);
		$cssline.=".menu_background_color { background-color: ".$header_color."; }";
		$cssline.="#head-page.reveal.alt.menu_background_color { background-color: ".$header_color."; }";
		$cssline.="@media (max-width: 991px) { #head-page { background-color: ".$header_color."; }}";
		$cssline.="@media (max-width: 991px) { #head-page.reveal.alt { background-color: ".$header_color."; }}";
	}

	if (isset($args['header-color-sticky'])) {
		$header_color_sticky = detheme_hex2rgba($args['header-color-sticky']['color'],$args['header-color-sticky']['alpha']);
		$cssline.="#head-page.reveal.menu_background_color { background-color: ".$header_color_sticky."; }";
		$cssline.="@media (max-width: 991px) { #head-page.reveal { background-color: ".$header_color_sticky."; }}";
	}
/*
	if($args['header-background-type']){	
			$cssline.=".menu_background_color { background-color: ".$args['header-color']."; }";
			$cssline.="#head-page.reveal.alt.menu_background_color { background-color: ".$args['header-color']."; }";
			$cssline.="@media (max-width: 991px) { #head-page { background-color: ".$args['header-color']."; }}";
			$cssline.="@media (max-width: 991px) { #head-page.reveal.alt { background-color: ".$args['header-color']."; }}";
	}

	if($args['header-background-transparent-active']){	
			$cssline.="#head-page.reveal.menu_background_color { background-color: ".$args['header-color-transparent']."; }";
			$cssline.="@media (max-width: 991px) { #head-page.reveal { background-color: ".$args['header-color-transparent']."; }}";
	}
*/

	if (isset($args['homepage-header-color'])) {
		$header_color = detheme_hex2rgba($args['homepage-header-color']['color'],$args['homepage-header-color']['alpha']);

		$cssline.=".home .menu_background_color { background-color: ".$header_color."; }";
		$cssline.=".home #head-page.reveal.alt.menu_background_color { background-color: ".$header_color."; }";
		$cssline.="@media (max-width: 991px) { .home #head-page { background-color: ".$header_color."; }}";
		$cssline.="@media (max-width: 991px) { .home #head-page.reveal.alt { background-color: ".$header_color."; }}";
	}

	if (isset($args['homepage-header-color-sticky'])) {
		$header_color_sticky = detheme_hex2rgba($args['homepage-header-color-sticky']['color'],$args['homepage-header-color-sticky']['alpha']);

		$cssline.=".home #head-page.reveal.menu_background_color { background-color: ".$header_color_sticky."; }";
		$cssline.="@media (max-width: 991px) { .home #head-page.reveal { background-color: ".$header_color_sticky."; }}";
		$cssline.=".home .stickyonscrollup.is-visible.menu_background_color { background-color: ".$header_color_sticky."; }";
	}


		$cssline.="#head-page {color:".$args['header-font-color'].";}";

		$cssline.="#head-page:not(.reveal) #mobile-header label.toggle { color:".$args['header-font-color'].";}";
		$cssline.="#head-page.reveal.alt #mobile-header label.toggle { color:".$args['header-font-color'].";}";
		$cssline.="#head-page.reveal.alt #mobile-header label.toggle:hover { color:".$args['header-font-color'].";}";

		//$cssline.="@media (min-width: 991px) { #head-page.reveal.alt #dt-menu > ul > li > a { color:".$args['header-font-color'].";}}";
		$cssline.="#head-page.reveal.alt #dt-menu a.search_btn { color:".$args['header-font-color'].";}";

		//$cssline.="#head-page #dt-menu > ul > li > a {color:".$args['header-font-color'].";}";
		$cssline.="#head-page #dt-menu a.search_btn {color:".$args['header-font-color'].";}";

	    @list($r, $g, $b) = sscanf($args['header-font-color'], "#%02x%02x%02x");
	    $rgbcolor=$r.','.$g.','.$b;

		$cssline.="@media (min-width: 991px) { #head-page.reveal #dt-menu > ul > li > a { color:".$args['header-font-color-sticky'].";}}";
		$cssline.="#head-page.reveal #dt-menu a.search_btn { color:".$args['header-font-color-sticky'].";}";
		$cssline.="#head-page.reveal #mobile-header label.toggle { color:".$args['header-font-color-sticky'].";}";
		$cssline.="#head-page.reveal #mobile-header label.toggle:hover { color:".$args['header-font-color-sticky'].";}";

		$cssline.="@media (min-width: 991px) { .home #head-page.reveal:not(.alt) #dt-menu > ul > li > a { color:".$args['homepage-header-font-color-sticky'].";}}";
		$cssline.=".home #head-page.reveal:not(.alt) #dt-menu a.search_btn { color:".$args['homepage-header-font-color-sticky'].";}";

		$cssline.="#mobile-header { color:".$args['homepage-header-font-color-sticky'].";}";
		$cssline.=".home #head-page.reveal:not(.alt) #mobile-header label.toggle { color:".$args['homepage-header-font-color-sticky'].";}";
		$cssline.=".home #head-page.reveal:not(.alt) #mobile-header label.toggle:hover { color:".$args['homepage-header-font-color-sticky'].";}";

		$cssline.=".home #head-page {color:".$args['homepage-header-font-color'].";}";
		//$cssline.="@media (min-width: 991px) { .home #head-page.reveal.alt #dt-menu > ul > li > a {color:".$args['homepage-header-font-color'].";}}";
		$cssline.=".home #head-page.reveal.alt #dt-menu a.search_btn {color:".$args['homepage-header-font-color'].";}";

		$cssline.=".home #head-page:not(.reveal) #mobile-header label.toggle {color:".$args['homepage-header-font-color'].";}";
		$cssline.=".home #head-page.reveal.alt #mobile-header label.toggle {color:".$args['homepage-header-font-color'].";}";
		$cssline.=".home #head-page.reveal.alt #mobile-header label.toggle:hover {color:".$args['homepage-header-font-color'].";}";

		//$cssline.=".home #head-page #dt-menu > ul > li > a {color:".$args['homepage-header-font-color'].";}";
		$cssline.=".home #head-page #dt-menu a.search_btn {color:".$args['homepage-header-font-color'].";}";

	    @list($r, $g, $b) = sscanf($args['homepage-header-font-color'], "#%02x%02x%02x");
	    $rgbcolor=$r.','.$g.','.$b;


	//set top margin logo for mobile
	if (isset($args['dt-logo-margin-mobile'])&&!empty($args['dt-logo-margin-mobile'])) {
		$cssline.="#head-page #logomenumobile { padding-top: ".$args['dt-logo-margin-mobile']."px; }";
		$cssline.="#head-page #logomenurevealmobile { padding-top: ".$args['dt-logo-margin-mobile']."px; }";
	}

	//set logo top margin for 'logo on center'
	if (isset($args['dt-logo-margin'])&&!empty($args['dt-logo-margin'])) {
		$cssline.="#dt-menu.dt-menu-left .logolink { margin-top: ".$args['dt-logo-margin']."px; }";
		$cssline.="#dt-menu.dt-menu-right .logolink { margin-top: ".$args['dt-logo-margin']."px; }";
		$cssline.="#dt-menu.dt-menu-center .logolink { top: ".$args['dt-logo-margin']."px; }";
	}

	//set logo top margin for 'logo on center'
	if (isset($args['dt-logo-width'])&&!empty($args['dt-logo-width'])) {
		$cssline.="#dt-menu.dt-menu-center .logolink { width: ".$args['dt-logo-width']."px; }";
	}


	return $cssline;
}

if(!function_exists('get_redux_custom_menu_margin_top')){
	function get_redux_custom_menu_margin_top($margin_top='') {

		if (empty($margin_top) && ''!==$margin_top) return '';
			
		if (!is_numeric($margin_top)) return '';

		ob_start();
	?>
		.reveal.alt #dt-menu.dt-menu-center > ul { margin-top: <?php print $margin_top;?>px; }
	<?php
		$cssline=ob_get_contents();
		ob_end_clean();

		return $cssline;
	}
}

if(!function_exists('get_redux_custom_logo_margin_top_reveal')){
	function get_redux_custom_logo_margin_top_reveal($margin_top='') {

		if (empty($margin_top) && ''!==$margin_top) return '';
			
		if (!is_numeric($margin_top)) return '';

		ob_start();
	?>
		#head-page.reveal .dt-menu-center #logomenureveal { margin-top: <?php print $margin_top;?>px;	}
		#head-page.reveal .dt-menu-center #logomenu { margin-top: <?php print $margin_top;?>px;	}
		#head-page.reveal.alt .dt-menu-center #logomenureveal { margin-top: auto;	}
		#head-page.reveal.alt .dt-menu-center #logomenu { margin-top: auto;	}
	<?php
		$cssline=ob_get_contents();
		ob_end_clean();

		return $cssline;
	}
}

if(!function_exists('get_redux_custom_topbar')){
	function get_redux_custom_topbar($args) {
		$cssline = "";

		if (is_array($args['topbar-background-color'])) {
			if ($args['topbar-background-color']['color']=='transparent') {
				$cssline .= "#top-bar {background-color: rgba(255,255,255,0);}";
			} else {
				$colourstr = $args['topbar-background-color']['color'];
				$colourstr = str_replace('#','',$colourstr);
		      	$rhex = substr($colourstr,0,2);
		      	$ghex = substr($colourstr,2,2);
		      	$bhex = substr($colourstr,4,2);

		      	$r = hexdec($rhex);
		      	$g = hexdec($ghex);
		      	$b = hexdec($bhex);

		      	$a = $args['topbar-background-color']['alpha'];

		      	$cssline .= "#top-bar {background-color: rgba(".$r.",".$g.",".$b.",".$a.");}";
			}
		} //if (is_array($args['topbar-background-color']))

		$cssline.="#top-bar {color:".$args['topbar-font-color'].";}";
		$cssline.="#top-bar a {color:".$args['topbar-font-color'].";}";

		return $cssline;
	}
}


if(!function_exists('detheme_style_compile')){

function detheme_style_compile($detheme_config=array(),$css="",$write=true){

	global $wp_filesystem;


	if(function_exists('icl_register_string')){
		icl_register_string('hue', 'left-top-bar-text', $detheme_config['dt-left-top-bar-text']);
		icl_register_string('hue', 'right-top-bar-text', $detheme_config['dt-right-top-bar-text']);
		icl_register_string('hue', 'footer-text', $detheme_config['footer-text']);
	}

	$cssline=(isset($detheme_config['primary-color']))?get_redux_custom_primary_color($detheme_config['primary-color']):"";
	$cssline.=(isset($detheme_config['secondary-color']))?get_redux_custom_secondary_color($detheme_config['secondary-color']):"";
	$cssline.=get_redux_custom_primary_font($detheme_config['primary-font']);
	$cssline.=get_redux_custom_secondary_font($detheme_config['secondary-font']);

	$cssline.=(isset($detheme_config['section-font']) && 'montserrat'!=$detheme_config['section-font']['font-family'] && ''!=$detheme_config['section-font']['font-family'])?get_redux_custom_section_font($detheme_config['section-font']):"";

	$cssline.=get_redux_custom_quote_font($detheme_config['tertiary-font']);

	$cssline.=(isset($detheme_config['footer-color']))?get_redux_custom_footer_bg_color($detheme_config['footer-color']):"";
	$cssline.=(isset($detheme_config['footer-font-color']) && '#ffffff'!=$detheme_config['footer-font-color'])?get_redux_custom_footer_font_color($detheme_config['footer-font-color']):"";
	$cssline.=get_redux_custom_header($detheme_config);
	$cssline.=get_redux_body_style($detheme_config);
	$cssline.=get_redux_boxed_layout($detheme_config);
	$cssline.=get_redux_custom_sticky_sidebar($detheme_config);
	$cssline.=get_redux_custom_banner($detheme_config);

	if (detheme_plugin_is_active('dt_menu/dt_menu.php') && class_exists('dt_menu') && method_exists('dt_menu','get_redux_cssinline')) {
        $menuAttributes = array(
        	'menu_type' 						=> $detheme_config['dt-header-type'],
            'logo_top_margin' 					=> $detheme_config['dt-logo-margin'],
            'logo_left_margin' 					=> $detheme_config['dt-logo-leftmargin'],
            'logo_top_margin_sticky' 			=> $detheme_config['dt-logo-top-margin-reveal'],
            'nav_bar_height' 					=> (isset($detheme_config['dt-menu-height'])) ? $detheme_config['dt-menu-height'] : '',
            'nav_background_color' 				=> (isset($detheme_config['header-color'])) ? detheme_hex2rgba($detheme_config['header-color']['color'],$detheme_config['header-color']['alpha']) : '',
            'nav_font_color' 					=> (isset($detheme_config['header-font-color'])) ? $detheme_config['header-font-color'] : '',
            'nav_background_color_sticky' 		=> (isset($detheme_config['header-color-sticky'])) ? detheme_hex2rgba($detheme_config['header-color-sticky']['color'],$detheme_config['header-color-sticky']['alpha']) : '',
            'nav_font_color_sticky' 			=> (isset($detheme_config['header-font-color-sticky'])) ? $detheme_config['header-font-color-sticky'] : '',
            'home_nav_background_color' 		=> (isset($detheme_config['homepage-header-color'])) ? detheme_hex2rgba($detheme_config['homepage-header-color']['color'],$detheme_config['homepage-header-color']['alpha']) : '',
            'home_nav_font_color' 				=> (isset($detheme_config['homepage-header-font-color'])) ? $detheme_config['homepage-header-font-color'] : '',
            'home_nav_background_color_sticky' 	=> (isset($detheme_config['homepage-header-color-sticky'])) ? detheme_hex2rgba($detheme_config['homepage-header-color-sticky']['color'],$detheme_config['homepage-header-color-sticky']['alpha']) : '',
            'home_nav_font_color_sticky' 		=> (isset($detheme_config['homepage-header-font-color-sticky'])) ? $detheme_config['homepage-header-font-color-sticky'] : '',
            'overlay_nav_background_color' 		=> (isset($detheme_config['overlay-background-color'])) ? detheme_hex2rgba($detheme_config['overlay-background-color']['color'],$detheme_config['overlay-background-color']['alpha']) : '',
            'overlay_nav_font_color' 			=> (isset($detheme_config['overlay-header-font-color'])) ? $detheme_config['overlay-header-font-color'] : '',
            'menu_hover_color'					=> (isset($detheme_config['primary-color'])) ? $detheme_config['primary-color'] : '',
            'show_searchmenu' 					=> $detheme_config['show-header-searchmenu'],
            'show_shoppingcart' 				=> $detheme_config['show-header-shoppingcart']
        );

		$cssline.= dt_menu::get_redux_cssinline($menuAttributes);
	}

	$cssline.=(isset($detheme_config['dt-header-type']) && 'leftbar'==$detheme_config['dt-header-type'])?get_redux_leftbar_menu($detheme_config['dt-menu-image'],$detheme_config['dt-menu-image-horizontal'],$detheme_config['dt-menu-image-vertical'],$detheme_config['dt-menu-image-size']):"";
	$cssline.=(isset($detheme_config['dt-menu-height']))?get_redux_custom_menu_height($detheme_config['dt-menu-height']):"";
	$cssline.=(isset($detheme_config['dt-logo-top-padding']))?get_redux_custom_menu_margin_top($detheme_config['dt-logo-top-padding']):"";
	$cssline.=(isset($detheme_config['dt-logo-top-margin-reveal']))?get_redux_custom_logo_margin_top_reveal($detheme_config['dt-logo-top-margin-reveal']):"";

	if(isset($detheme_config['heading-style']) && $detheme_config['heading-style']!=='none'){
		$cssline.="h1,h2,h3,h4,h5,h6,.breadcrumbs{text-transform:".$detheme_config['heading-style']."}";
	}

	$cssline.=get_redux_custom_page_loader($detheme_config);

	$cssline.=(isset($detheme_config['css-code']) && !empty($detheme_config['css-code']))?"\n/* custom css generate from your custom css code*/\n".$detheme_config['css-code']:"";	

	$cssline.=(isset($detheme_config['topbar-background-color']))?get_redux_custom_topbar($detheme_config):"";

	$blog_id="";
	if ( is_multisite()){
		$blog_id="-site".get_current_blog_id();
	}

	if(!$write){
		return $css.$cssline;
	}

	$filename = get_template_directory() . '/css/customstyle'.$blog_id.'.css';

	$notes="/* ================================================ */\n"
				."/* don't touch this style auto generating by system */\n"
				."/* ================================================ */\n";

	if ( !$wp_filesystem->put_contents( $filename, $notes.$cssline) ) {
		$error = $wp_filesystem->errors;

		if('empty_hostname'==$error->get_error_code()){
			$wp_filesystem=new WP_Filesystem_Direct(array());
			if($wp_filesystem){
				if(!$wp_filesystem->put_contents( $filename, $notes.$cssline)){
						$error = $wp_filesystem->errors;
						return new WP_Error('fs_error', esc_html__('Filesystem error','redux-framework'), $error);
				}

			}else{
				return $css;
			}


		}else{

			return $css;
		}
	}
	return $css.$cssline;
}
}

if(!function_exists('detheme_save_license')){


function detheme_save_license($config=array()){

	$template=get_template();
	update_option("detheme_license_$template",$config['detheme_license']);
}

}

add_action( 'redux-saved-detheme_config' ,'detheme_save_license' ); 
add_action('redux-compiler-detheme_config','detheme_style_compile',2);

/* wpml translation */


if(!function_exists('load_detheme_admin_script')){

	function load_detheme_admin_script(){
		wp_enqueue_script('detheme-admin-script', DethemeReduxFramework::$_url. 'assets/js/dashboard.js',array('jquery'),null);
	}
}

add_action( 'redux/page/detheme_config/enqueue','load_detheme_admin_script' );

if(!function_exists('get_redux_leftbar_menu')){
	function get_redux_leftbar_menu($image='',$horizontal="50",$vertical="100",$size="") {
		$backgroundImage=(isset($image['url']) && ''!=$image['url'])?$image['url']:"";
		$leftPosition=preg_replace('/%/',"",$horizontal)."%";
		$topPosition=preg_replace('/%/',"",$vertical)."%";

		if(!$backgroundImage)
			return "";

		ob_start();

		?>
		.vertical_menu #head-page.reveal {background-image:url(<?php print $backgroundImage;?>);background-repeat:no-repeat;background-position:<?php print $leftPosition." ".$topPosition;?>;<?php if($size!='' && $size!='default'):?>background-size:<?php print $size; endif;?>}
		<?php 

		$cssline=ob_get_contents();
		ob_end_clean();

		return $cssline;
	}
}

add_action('theme_option_name_update','detheme_style_compile');

function hue_update_complete($theme,$hook_extra){

	if('theme'==$hook_extra['type'] && 'update'==$hook_extra['action'] && $theme->skin->theme == get_template()){
		$option_name=apply_filters('theme_option_name','theme_config');
		$theme_config=get_option($option_name);
		do_action('theme_option_name_update',$theme_config);
	}
}

add_action('upgrader_process_complete','hue_update_complete',1,2);

function get_detheme_options(){

	global $DethemeReduxFramework;

	if(!is_object($DethemeReduxFramework)){

      $DethemeReduxFramework= new DethemeReduxFramework();
	
	    $args['opt_name']           = 'detheme_config'; 
	    $args['database']           = ''; 
	    $args['global_variable']    = '';

	    $DethemeReduxFramework->args= $args;
	}

	$theme_config=$DethemeReduxFramework->get_options();

	$new_theme_config=apply_filters('detheme_options_config',$theme_config);

	return $new_theme_config;
}


function get_detheme_option($key="",$default=false){
	$options=get_detheme_options();
	if(isset($options[$key]))
		return $options[$key];
	return $default? $default : false;
}

function get_hue_career_field($fields=array()){

	$config=get_detheme_options();

	if(!isset($config['career_fields']) || !is_array($config['career_fields']))
		return $fields;

	$new_fields=array();

	foreach ($config['career_fields'] as $k=>$field) {

		if(empty($field['label']))
			continue;

		 $metaname=sanitize_key($field['label']);
		 $new_fields[$metaname]=$field;


	}
	return $new_fields;
}

add_filter('dtcareer_job_fields','get_hue_career_field');
?>