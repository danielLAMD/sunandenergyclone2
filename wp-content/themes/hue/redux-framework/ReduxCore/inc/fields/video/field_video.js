jQuery(document).ready(function($) {
  'use strict';

  var i18n = window.dtb_i18nLocale;
  function remove_detheme_image(event){

    event.preventDefault();

    var button=$(this),container=button.closest('.detheme-field-image'),imagepreview=$('.add_detheme_image',container);
    var imgID=imagepreview.find('img').data('id'),input=container.find('input').val();

    if(input==''){
      input=new Array();
    }
    else{
      input=input.split(/,/);
    }
    for(var i = 0; i < input.length; i++) {
          if(input[i] == imgID) {
            input.splice(i, 1);
          }
    }

    imagepreview.html(imagepreview.attr('title'));
    container.find('input').val('').trigger('change');
    button.hide();
  }


  wp.media.DethemeImageEdit = {
        getData:function () {
          return this.formfield.val();
        },
        set:function (selection) {


          var imagepreview=$('<video autoplay data-id="'+selection.get('id')+'" width="266"/>');
          var videosource=$('<source/>');

          var mime=selection.attributes.mime;
          var thumb=selection.attributes.thumb.src;
          videosource.attr('src',selection.attributes.url);
          videosource.attr('type',mime);
          imagepreview.attr('poster',thumb);
          imagepreview.append(videosource);

          this.preview.find('a').html(imagepreview);
          this.formfield.val(selection.get('id')).trigger('change');

          this.field.find('.remove_detheme_image').show();
 
          return false;
        },
      frame: function($field) {


      var button=$field.find('.add_detheme_image'),remove_image=$field.find('.remove_detheme_image'),
      formfield=$field.find('input'),preview=$field.find('.preview-image'),mediaType=button.data('type');

      if(!preview.length){
        preview=$('<p></p>').addClass('preview-image');
        $field.prepend(preview);
      }


      this.field=$field;
      this.formfield =$field.find('input');
      this.preview =preview;
      remove_image.click(remove_detheme_image);

          if ( this._frame )
              return this._frame;
   
          this._frame = wp.media({
              id:         'detheme_image',               
              state:      'insert-image',
              title:      i18n.insert_image,
              editing:    true,
              multiple:   false,
              toolbar:    'insert-image',
              menu:'insert-image',
              type : 'image',
                states:[ new wp.media.controller.DethemeImageEdit({library: wp.media.query( {type:mediaType})}) ]

          });

            this._frame.on('toolbar:create:insert-image', function (toolbar) {
                this.createSelectToolbar(toolbar, {
                    text:i18n.select_image
                });
            }, this._frame);

            this._frame.state('insert-image').on('select', this.select);
          return this._frame;
      },
        select:function () {

            var selection = this.get('selection').single();
            wp.media.DethemeImageEdit.set(selection ? selection : -1);
        }
  };


    wp.media.controller.DethemeImageEdit = wp.media.controller.FeaturedImage.extend({
        defaults:_.defaults({
            id:'insert-image',
            filterable:'uploaded',
            multiple:false,
            toolbar:'insert-image',
            library:wp.media.query({type:'video'}),
            title:i18n.select_image,
            priority:60,
            syncSelection:false,
        }, wp.media.controller.Library.prototype.defaults),
        updateSelection:function () {
            var selection = this.get('selection'),
                id = wp.media.DethemeImageEdit.getData(),
                attachment;

            if ('' !== id && -1 !== id) {
                attachment = wp.media.model.Attachment.get( id );;
                attachment.fetch();
            }
            selection.reset(attachment ? [ attachment ] : []);
        }
    });


    if($('.detheme-field-image').length){
      $('.detheme-field-image').each(function(){
      var element=$(this);
      element.find('.add_detheme_image').unbind('click').click(function(){
         wp.media.DethemeImageEdit.frame(element).open();
      });

      element.find('.remove_detheme_image').unbind('click').click(remove_detheme_image);

      });
    }
}); 