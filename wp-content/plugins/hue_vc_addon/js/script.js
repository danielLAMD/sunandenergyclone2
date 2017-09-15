jQuery(document).ready(function($){
  'use strict';

   if(typeof themeColor =='undefined'){
      var themeColor="#fff";
   }

   function adjustHeadingColor(themeColor){

        'use strict';

        $('.dt-section-head .section-heading-point-bottom').each(function () {

          var sectionhading=$(this),module=sectionhading.closest('.dt-section-head'),moduleid=module.attr('id');
          var color=module.css("background-color"),parnt=module.parent();

                if('undefined'!==color && ('transparent'==color || 'rgba(0, 0, 0, 0)'==color) )
                {
                    for (var i=0;i<20;i++){

                        var parnt2=$(parnt).parent();
                        color=parnt2.css("background-color");
                        parnt=parnt2;
                       if('transparent'!==color && 'rgba(0, 0, 0, 0)'!==color.toString() && 'undefined'!==color)
                            break;
                    }

                   if('transparent'!==color.toString() && 'rgba(0, 0, 0, 0)'!==color.toString() && 'undefined'!==color ){
                        var style='';

                       style+='#'+moduleid+' .section-heading-point-bottom:after{border-top-color:'+color+' !important;}';
                       $('<style/>', {text: style}).appendTo('body');
                    }
               }
       });

        //dt-iconboxes span
    }

    adjustHeadingColor(themeColor);

    if($('.dt-media-list').length){
      $('.dt-media-list').each(function(){

        $(this).on('change',function(){

          if (this.value=='')
            return;
          window.open(this.value,'_blank');
        });

      });
    }

    $("a[href^='/'][href$='/']:not([href='/']):not([href*='#'])").on("click", function(e) {
      e.preventDefault();

      var id=$(this).attr('href').replace(/\//gi,'');
      var md=$('#'+id);

      if(md.length){
        var popupclose=$('.popup-close',md);
        toggleVideo(md,'show');
        md.removeClass('pophide').addClass('popshow');

        popupclose.click(function(s){

          toggleVideo(md,'hide');
          md.removeClass('popshow').addClass('pophide');
          s.preventDefault();
        });
      }

    });

  function toggleVideo(element,state) {

    var iframes=$('iframe',element);
    var func = state == 'hide' ? 'pauseVideo' : 'playVideo';
    var vfunc = state == 'hide' ? 'pause' : 'play';

    if(iframes.length){
      iframes.each(function(el){
        var iframe=$(this);
        iframe.get(0).contentWindow.postMessage('{"event":"command","func":"'+func+'","args":""}','*');
        iframe.get(0).contentWindow.postMessage('{"method":"'+vfunc+'"}','*');
      });
    }
  }


  $(".dt-social-share li a").click(function(event) {
    if ($(this).attr('href')) {
      event.preventDefault();
      dt_popup_social($(this).attr('href'), {url: $(this).data('url'), u: $(this).data('url')});
    }
  });

});


function dt_popup_social(url, params) {
    var k, popup, qs, v;

    if (params == null) {
      params = {};
    }
    popup = {
      width: 500,
      height: 350
    };

    popup.top = (screen.height / 2) - (popup.height / 2);
    popup.left = (screen.width / 2) - (popup.width / 2);
    qs = ((function() {
      var _results;
      _results = [];
      for (k in params) {
        v = params[k];
        _results.push("" + k + "=" + v);
      }
      return _results;
    }).call(this)).join('&');
    if (qs) {
      qs = "?" + qs;
    }

    return window.open(url + qs, 'targetWindow', "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=" + popup.left + ",top=" + popup.top + ",width=" + popup.width + ",height=" + popup.height);

};

