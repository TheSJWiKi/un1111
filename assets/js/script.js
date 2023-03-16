/**
 * Script
 *
 * @author Shahzaib
 */

"use strict";

$(function() {
  
  // Ajax Requests Handling:
  $(document).on('submit', 'form', function(event) {
    event.preventDefault();
    formAjaxRequest($(this));
  });
  
  
  // Manage Modals without Sending Ajax:
  $('.table').on('click', function(event) {
    var $element = $(event.target);
    var isFine = true;
    
    if ($element.hasClass('tool')) {
    } else if ($element.hasClass('tool-i')) {
      $element = $element.parent('.tool');
    } else {
      isFine = false;
    }
    
    if (isFine === true) {
      var $modal = $($element.attr('data-target'));
      var dataID = $element.attr('data-id');
      
      $modal.find('[name="id"]').val(dataID);
    }
  });
  
  
  // On Modal Shown, Clear Extra:
  $(window).on('shown.bs.modal', function() {
    resetResponseMessages();
  });
  
  if ($.isFunction($.fn.summernote))
  {
    // Summernote:
    $( '.textarea' ).summernote(
    {
      height: 245,
      dialogsInBody: true,
      callbacks: {
        onImageUpload: function (image)
        {
          sendFile(image[0]);
        },
        onMediaDelete: function (image)
        {
          deleteFile(image[0].src);
        }
      },
      toolbar: [
        [
          'style',
          [
            'style'
          ]
        ],
        [
          'font',
          [
            'bold',
            'underline'
          ]
        ],
        [
          'fontsize',
          [
            'fontsize'
          ]
        ],
        [
          'para',
          [
            'paragraph',
            'ul',
            'ol'
          ]
        ],
        [
          'table',
          [
            'table'
          ]
        ],
        ['insert',
          [
            'link',
            'picture'
          ]
        ],
        [
          'view', 
          [
            'codeview',
            'fullscreen'
          ]
        ]
      ]
    });
  }
});