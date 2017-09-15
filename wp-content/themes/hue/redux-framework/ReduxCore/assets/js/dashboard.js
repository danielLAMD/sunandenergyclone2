jQuery(document).ready(function($){
	'use strict';

  var 
  $devider1 = $('#detheme_config-devider-1').closest('.form-table tr'),
  $devider2 = $('#detheme_config-devider-2').closest('.form-table tr'),
  $backgroundImage = $('#detheme_config-dt-banner-image').closest('.form-table tr'),
  $backgroundVideo = $('#detheme_config-dt-banner-video').closest('.form-table tr'),
  $backgroundColor = $('#detheme_config-banner-color').closest('.form-table tr'),
  $background=$('select#dt-show-banner-page-select'),
  $homebackground=$('#detheme_config-homepage-background-type .cb-enable,#detheme_config-homepage-background-type .cb-disable'),
  $homebackgroundColor = $('#detheme_config-homepage-header-color').closest('.form-table tr'),
  $scrollsidebgcolor = $('#detheme_config-dt_scrollingsidebar_bg_color').closest('.form-table tr'),
  $pagebackground=$('#detheme_config-header-background-type .cb-enable,#detheme_config-header-background-type .cb-disable'),
  $pagebackgroundColor = $('#detheme_config-header-color').closest('.form-table tr'),
  $shopbackgroundColor = $('#detheme_config-dt-shop-banner-image').closest('.form-table tr'),
  $showfooterwidget=$('#detheme_config-showfooterwidget .cb-enable,#detheme_config-showfooterwidget .cb-disable'),
  $footerwidget=$('#detheme_config-dt-footer-widget-column').closest('.form-table tr'),
  $showfooterpage=$('#detheme_config-showfooterpage .cb-enable,#detheme_config-showfooterpage .cb-disable'),
  $footerpage=$('#detheme_config-footerpage').closest('.form-table tr'),
  $footertext=$('#detheme_config-footer-text').closest('.form-table tr'),
  $footertextposition=$('#detheme_config-dt-footer-position').closest('.form-table tr'),
  $footerwidget=$('#detheme_config-dt-footer-widget-column').closest('.form-table tr'),
  $showfooterwidgetcountainer=$('#detheme_config-showfooterwidget').closest('.form-table tr'),
  $footercolor=$('#detheme_config-footer-color').closest('.form-table tr'),
  $footerfontcolor=$('#detheme_config-footer-font-color').closest('.form-table tr'),
  $showfooterarea=$('#detheme_config-showfooterarea .cb-enable,#detheme_config-showfooterarea .cb-disable'),
  $postfooterpage=$('#detheme_config-postfooterpage').closest('.form-table tr');

  var $page_loader =$('#detheme_config-page_loader .cb-enable,#detheme_config-page_loader .cb-disable'),
  $page_loader_background=$('#detheme_config-page_loader_background').closest('.form-table tr'),
  $page_loader_ball_1=$('#detheme_config-page_loader_ball_1').closest('.form-table tr'),
  $page_loader_ball_2=$('#detheme_config-page_loader_ball_2').closest('.form-table tr'),
  $page_loader_ball_3=$('#detheme_config-page_loader_ball_3').closest('.form-table tr'),
  $page_loader_ball_4=$('#detheme_config-page_loader_ball_4').closest('.form-table tr');

  var $scrollingsidebar =$('#detheme_config-dt_scrollingsidebar_on .cb-enable,#detheme_config-dt_scrollingsidebar_on .cb-disable'),
  $scrollsidebgtype = $('#detheme_config-dt_scrollingsidebar_bg_type .cb-enable,#detheme_config-dt_scrollingsidebar_bg_type .cb-disable'),
  $scrollingsidebar_bg_type=$('#detheme_config-dt_scrollingsidebar_bg_type').closest('.form-table tr'),
  $scrollingsidebar_bg_color=$('#detheme_config-dt_scrollingsidebar_bg_color').closest('.form-table tr'),
  $scrollingsidebar_top_margin=$('#detheme_config-dt_scrollingsidebar_top_margin').closest('.form-table tr'),
  $scrollingsidebar_position=$('#detheme_config-dt_scrollingsidebar_position').closest('.form-table tr'),
  $scrollingsidebar_margin=$('#detheme_config-dt_scrollingsidebar_margin').closest('.form-table tr');

  var $boxed_layout =$('#detheme_config-boxed_layout_activate .cb-enable,#detheme_config-boxed_layout_activate .cb-disable'),
  $boxed_layout_boxed_background_image=$('#detheme_config-boxed_layout_boxed_background_image').closest('.form-table tr'),
  $boxed_layout_boxed_background_color=$('#detheme_config-boxed_layout_boxed_background_color').closest('.form-table tr'),
  $boxed_layout_stretched=$('#detheme_config-boxed_layout_stretched').closest('.form-table tr');

  var $dtshowheader =$('#detheme_config-dt-show-header .cb-enable,#detheme_config-dt-show-header .cb-disable'),
  $dtshowheader_child=$('#detheme_config-dt-show-header').closest('.form-table tr');

  var $showbannerarea =$('#detheme_config-show-banner-area .cb-enable,#detheme_config-show-banner-area .cb-disable'),
  $showbannerarea_child=$('#detheme_config-show-banner-area').closest('.form-table tr');


  var $headerlayout=$('input[name="detheme_config[dt-header-type]"]'),
  $bgmenuimage=$('#detheme_config-dt-menu-image').closest('.form-table tr'),
  $bgmenuimagehorizontal=$('#detheme_config-dt-menu-image-horizontal').closest('.form-table tr'),
  $bgmenuimagesize=$('#detheme_config-dt-menu-image-size').closest('.form-table tr'),
  $bgmenuimagevertical=$('#detheme_config-dt-menu-image-vertical').closest('.form-table tr'),
  $stickylogo=$('#detheme_config-dt-logo-image-transparent').closest('.form-table tr'),
  $homestickylogo=$('#detheme_config-homepage-dt-logo-image-transparent').closest('.form-table tr'),
  $stickylogomargin=$('#detheme_config-dt-logo-top-margin-reveal').closest('.form-table tr'),
  $headertype=$('input[name="detheme_config[dt-header-type]"]'),
  $logotoppadding=$('#detheme_config-dt-logo-top-padding').closest('.form-table tr');

    var $pagebackgroundsticky=$('#detheme_config-header-background-transparent-active .cb-enable,#detheme_config-header-background-transparent-active .cb-disable'),
  $pagebackgroundstickyColor = $('#detheme_config-header-color-transparent').closest('.form-table tr'),
  $pagebackgroundstickyrow = $('#detheme_config-header-background-transparent-active').closest('.form-table tr'),
  $homebackgroundsticky=$('#detheme_config-homepage-header-color-transparent-active .cb-enable,#detheme_config-homepage-header-color-transparent-active .cb-disable'),
  $homebackgroundstickyColor = $('#detheme_config-homepage-header-color-transparent').closest('.form-table tr'),
  $homebackgroundstickyrow = $('#detheme_config-homepage-header-color-transparent-active').closest('.form-table tr');


  $headerlayout.live('change',function(){

    if ($('input[name="detheme_config[dt-header-type]"]:checked').val()=="leftbar") {
      $bgmenuimage.fadeIn('slow');$bgmenuimagehorizontal.fadeIn('slow');$bgmenuimagevertical.fadeIn('slow');$bgmenuimagesize.fadeIn('slow');
    } else {
      $bgmenuimage.fadeOut('slow');$bgmenuimagehorizontal.fadeOut('slow');$bgmenuimagevertical.fadeOut('slow');$bgmenuimagesize.fadeOut('slow');
    }
  });


  /* sticky menu */
  var $stickymenu =$('#detheme_config-dt-sticky-menu .cb-enable,#detheme_config-dt-sticky-menu .cb-disable'),
  $headercolorsticky=$('#detheme_config-header-color-sticky').closest('.form-table tr'),
  $headerfontcolorsticky=$('#detheme_config-header-font-color-sticky').closest('.form-table tr'),
  $homeheadercolorsticky=$('#detheme_config-homepage-header-color-sticky').closest('.form-table tr'),
  $homeheaderfontcolorsticky=$('#detheme_config-homepage-header-font-color-sticky').closest('.form-table tr');


    $stickymenu.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){

        $stickylogo.fadeIn('fast');
        $homestickylogo.fadeIn('fast');
        $stickylogomargin.fadeIn('fast');
        $headercolorsticky.fadeIn('fast');
        $headerfontcolorsticky.fadeIn('fast');
        $pagebackgroundstickyrow.fadeIn('fast');
        $homeheadercolorsticky.fadeIn('fast');
        $homeheaderfontcolorsticky.fadeIn('fast');
        $homebackgroundstickyrow.fadeIn('fast');
        $pagebackgroundsticky.trigger('change');
        $homebackgroundsticky.trigger('change');
      }

    }else{
      if($(this).hasClass('selected')){
        $stickylogo.fadeOut('fast');
        $homestickylogo.fadeOut('fast');
        $stickylogomargin.fadeOut('fast');
        $headercolorsticky.fadeOut('fast');
        $headerfontcolorsticky.fadeOut('fast');
        $pagebackgroundstickyrow.fadeOut('fast');
        $homeheadercolorsticky.fadeOut('fast');
        $homeheaderfontcolorsticky.fadeOut('fast');
        $homebackgroundstickyrow.fadeOut('fast');
        $pagebackgroundstickyColor.fadeOut('fast');
        $homebackgroundstickyColor.fadeOut('fast');
      }
    }

  }).live('change',function(e){

    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){

       $stickylogo.fadeIn('fast');
       $homestickylogo.fadeIn('fast');
       $stickylogomargin.fadeIn('fast');
       $headercolorsticky.fadeIn('fast');
       $headerfontcolorsticky.fadeIn('fast');
       $pagebackgroundstickyrow.fadeIn('fast');
       $homeheadercolorsticky.fadeIn('fast');
       $homeheaderfontcolorsticky.fadeIn('fast');
       $homebackgroundstickyrow.fadeIn('fast');
       $pagebackgroundsticky.trigger('change');
       $homebackgroundsticky.trigger('change');
      }
    }else{


      if($(this).hasClass('selected')){
        $stickylogo.fadeOut('fast');
        $homestickylogo.fadeOut('fast');
        $stickylogomargin.fadeOut('fast');
        $headercolorsticky.fadeOut('fast');
        $headerfontcolorsticky.fadeOut('fast');
        $pagebackgroundstickyrow.fadeOut('fast');
        $homeheadercolorsticky.fadeOut('fast');
        $homeheaderfontcolorsticky.fadeOut('fast');
        $homebackgroundstickyrow.fadeOut('fast');
        $pagebackgroundstickyColor.fadeOut('fast');
        $homebackgroundstickyColor.fadeOut('fast');
      }
    }

  });

/* Auto update */

  var $disable_automatic_update =$('#detheme_config-disable_automatic_update .cb-enable,#detheme_config-disable_automatic_update .cb-disable'),
  $core_automatic_update=$('#detheme_config-core_automatic_update').closest('.form-table tr');

    $disable_automatic_update.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $core_automatic_update.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $core_automatic_update.fadeOut('fast');

      }
    }

  }).live('change',function(e){

    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
       $core_automatic_update.fadeIn('fast');
      }
    }else{

      if($(this).hasClass('selected')){
        $core_automatic_update.fadeOut('fast');
      }
    }

  });


  $background.live('change',function(){

    var background = $(this).val();
    switch ( background ) {
      case 'image':
        $backgroundImage.fadeIn('slow');
        $backgroundColor.fadeOut('slow');
        $backgroundVideo.fadeOut('slow');
        break;
      case 'color':
        $backgroundColor.fadeIn('fast');
        $backgroundImage.fadeOut('slow');
        $backgroundVideo.fadeOut('slow');
        break;
      case 'video':
        $backgroundVideo.fadeIn('fast');
        $backgroundColor.fadeOut('slow');
        $backgroundImage.fadeOut('slow');
        break;
      default:
        $backgroundColor.fadeOut('slow');
        $backgroundImage.fadeOut('slow');
        $backgroundVideo.fadeOut('slow');
      }

  });

  /* menu type */

  var headertypevalue="";

  $headertype.live('change',function(e){

    if($(this).prop('checked')){
      headertypevalue=$(this).val();
    }
     if(headertypevalue=='center'){
      $logotoppadding.fadeIn('fast');
     }
     else{
      $logotoppadding.fadeOut('fast');
     }
  });


  /* Background Color */
  $pagebackground.live('click',function(e){

    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $pagebackgroundColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $pagebackgroundColor.fadeOut('fast');
      }
    }
  }).
  live('change',function(e){
    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $pagebackgroundColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $pagebackgroundColor.fadeOut('fast');
      }
    }
  });

  $pagebackgroundsticky.live('click',function(e){

    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $pagebackgroundstickyColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $pagebackgroundstickyColor.fadeOut('fast');
      }
    }
  }).
  live('change',function(e){
    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $pagebackgroundstickyColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $pagebackgroundstickyColor.fadeOut('fast');
      }
    }
  });


  $homebackground.live('click',function(e){

    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $homebackgroundColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $homebackgroundColor.fadeOut('fast');
      }
    }
  }).
  live('change',function(e){
    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $homebackgroundColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $homebackgroundColor.fadeOut('fast');
      }
    }
  });

  $homebackgroundsticky.live('click',function(e){

    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $homebackgroundstickyColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $homebackgroundstickyColor.fadeOut('fast');
      }
    }
  }).
  live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $homebackgroundstickyColor.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $homebackgroundstickyColor.fadeOut('fast');
      }
    }
  });

  $scrollsidebgtype.live('click',function(e){

    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_color.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_color.fadeOut('fast');
      }
    }
  }).
  live('change',function(e){
    e.preventDefault();

    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_color.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_color.fadeOut('fast');
      }
    }
  });

 $showfooterwidget.live('click',function(e){


    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
          $footerwidget.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){

          $footerwidget.fadeOut('fast');
      }
    }

  }).live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
          $footerwidget.fadeIn('fast');
      }
    }else{
      if($(this).hasClass('selected')){

          $footerwidget.fadeOut('fast');
      }
    }

  });

  $showfooterpage.live('click',function(e){

    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
          $footerpage.fadeIn('fast');$postfooterpage.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){

          $footerpage.fadeOut('fast');$postfooterpage.fadeOut('fast');
      }
    }

  }).live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
          $footerpage.fadeIn('fast');$postfooterpage.fadeIn('fast');
      }
    }else{
      if($(this).hasClass('selected')){

          $footerpage.fadeOut('fast');$postfooterpage.fadeOut('fast');
      }
    }

  });

 $showfooterarea.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $footertext.fadeIn('fast');
        $footerwidget.fadeIn('fast');
        $showfooterwidgetcountainer.fadeIn('fast');
        $footercolor.fadeIn('fast');
        $footerfontcolor.fadeIn('fast');  
        $footertextposition.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $footertext.fadeOut('fast');
        $footerwidget.fadeOut('fast');
        $showfooterwidgetcountainer.fadeOut('fast');
        $footercolor.fadeOut('fast');
        $footerfontcolor.fadeOut('fast');  
        $footertextposition.fadeOut('fast');
      }
    }

  }).live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $footertext.fadeIn('fast');
        $footerwidget.fadeIn('fast');
        $showfooterwidgetcountainer.fadeIn('fast');
        $footercolor.fadeIn('fast');
        $footerfontcolor.fadeIn('fast');  
        $footertextposition.fadeIn('fast');
      }
    }else{
      if($(this).hasClass('selected')){
        $footertext.fadeOut('fast');
        $footerwidget.fadeOut('fast');
        $showfooterwidgetcountainer.fadeOut('fast');
        $footercolor.fadeOut('fast');
        $footerfontcolor.fadeOut('fast');  
        $footertextposition.fadeOut('fast');
      }
    }

  });

 $page_loader.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $page_loader_ball_1.fadeIn('fast');
        $page_loader_ball_2.fadeIn('fast');
        $page_loader_ball_3.fadeIn('fast');
        $page_loader_ball_4.fadeIn('fast');
        $page_loader_background.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $page_loader_ball_1.fadeOut('fast');
        $page_loader_ball_2.fadeOut('fast');
        $page_loader_ball_3.fadeOut('fast');
        $page_loader_ball_4.fadeOut('fast');
        $page_loader_background.fadeOut('fast');
      }
    }

  }).live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $page_loader_ball_1.fadeIn('fast');
        $page_loader_ball_2.fadeIn('fast');
        $page_loader_ball_3.fadeIn('fast');
        $page_loader_ball_4.fadeIn('fast');
        $page_loader_background.fadeIn('fast');
      }
    }else{
      if($(this).hasClass('selected')){
        $page_loader_ball_1.fadeOut('fast');
        $page_loader_ball_2.fadeOut('fast');
        $page_loader_ball_3.fadeOut('fast');
        $page_loader_ball_4.fadeOut('fast');
        $page_loader_background.fadeOut('fast');
      }
    }

  });

   $scrollingsidebar.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_type.fadeIn('fast');
        $scrollingsidebar_bg_color.fadeIn('fast');
        $scrollingsidebar_top_margin.fadeIn('fast');
        $scrollingsidebar_position.fadeIn('fast');
        $scrollingsidebar_margin.fadeIn('fast');
        $scrollsidebgtype.trigger('change');
      }

    }else{
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_type.fadeOut('fast');
        $scrollingsidebar_bg_color.fadeOut('fast');
        $scrollingsidebar_top_margin.fadeOut('fast');
        $scrollingsidebar_position.fadeOut('fast');
        $scrollingsidebar_margin.fadeOut('fast');
      }
    }

  }).live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_type.fadeIn('fast');
        $scrollingsidebar_bg_color.fadeIn('fast');
        $scrollingsidebar_top_margin.fadeIn('fast');
        $scrollingsidebar_position.fadeIn('fast');
        $scrollingsidebar_margin.fadeIn('fast');
        $scrollsidebgtype.trigger('change');
      }
    }else{
      if($(this).hasClass('selected')){
        $scrollingsidebar_bg_type.fadeOut('fast');
        $scrollingsidebar_bg_color.fadeOut('fast');
        $scrollingsidebar_top_margin.fadeOut('fast');
        $scrollingsidebar_position.fadeOut('fast');
        $scrollingsidebar_margin.fadeOut('fast');
      }
    }

  });

   $boxed_layout.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $boxed_layout_boxed_background_image.fadeIn('fast');
        $boxed_layout_boxed_background_color.fadeIn('fast');
        $boxed_layout_stretched.fadeIn('fast');
      }

    }else{
      if($(this).hasClass('selected')){
        $boxed_layout_boxed_background_image.fadeOut('fast');
        $boxed_layout_boxed_background_color.fadeOut('fast');
        $boxed_layout_stretched.fadeOut('fast');
      }
    }

  }).live('change',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $boxed_layout_boxed_background_image.fadeIn('fast');
        $boxed_layout_boxed_background_color.fadeIn('fast');
        $boxed_layout_stretched.fadeIn('fast');
      }
    }else{
      if($(this).hasClass('selected')){
        $boxed_layout_boxed_background_image.fadeOut('fast');
        $boxed_layout_boxed_background_color.fadeOut('fast');
        $boxed_layout_stretched.fadeOut('fast');
      }
    }

  });

  $dtshowheader.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
         $dtshowheader_child.siblings().fadeIn('fast');
         $homebackground.trigger('change');
         $pagebackground.trigger('change');
      }

    }else{
      if($(this).hasClass('selected')){
        $dtshowheader_child.siblings().fadeOut('fast');
      }
    }

  }).live('change',function(e){

    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $dtshowheader_child.siblings().fadeIn('fast');
         $homebackground.trigger('change');
         $pagebackground.trigger('change');
      }
    }else{
      if($(this).hasClass('selected')){
        $dtshowheader_child.siblings().fadeOut('fast');
      }
    }

  });

  $showbannerarea.live('click',function(e){
    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $showbannerarea_child.siblings().fadeIn('fast');
        $background.trigger('change');
      }

    }else{
      if($(this).hasClass('selected')){
        $showbannerarea_child.siblings().fadeOut('fast');
      }
    }

  }).live('change',function(e){

    e.preventDefault();
    if($(this).hasClass('cb-enable')){
      if($(this).hasClass('selected')){
        $showbannerarea_child.siblings().fadeIn('fast');
        $background.trigger('change');
      }
    }else{
      if($(this).hasClass('selected')){
        $showbannerarea_child.siblings().fadeOut('fast');
      }
    }

  });

   $disable_automatic_update.trigger('change');
   $dtshowheader.trigger('change');
   $stickymenu.trigger('change');
   $showbannerarea.trigger('change');
   $page_loader.trigger('change');
   $showfooterwidget.trigger('change');
   $scrollingsidebar.trigger('change');
   $boxed_layout.trigger('change');
   $showfooterpage.trigger('change');
   $showfooterarea.trigger('change');
   $headerlayout.trigger('change');
 });
