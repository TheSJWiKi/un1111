/**
 * Script ( Admin )
 *
 * @author Shahzaib
 */

"use strict";

$(function() {
  
  // Manage Modal by Sending Ajax:
  $('.table').on('click', function(event) {
    var $element = $(event.target);
    var isFine = true;
    var source = '';
    
    if ($element.hasClass('get-data-tool')) {
    } else if ($element.hasClass('get-data-tool-i')) {
      $element = $element.parent('.get-data-tool');
    } else {
      isFine = false;
    }
    
    if (isFine === true) {
      var dataReference = $element.attr('data-reference');
      var dataRequirement = $element.attr('data-requirement');
      var dataID = $element.attr('data-id');
      
      source = baseURL + 'admin/actions/' + dataReference + '/read/';
      source += dataRequirement;
      
      getRecord(dataID, source, $element);
    }
  });
  
  
  // Tooltip:
  $('[data-toggle="tooltip"]').tooltip();
  
  
  // Settings > Email Fields Handling:
  if (eProtocol == 'smtp') {
    $('.smtp-field').css('display', 'block');
  }
  
  $('#eProtocol').on('change', function() {
    if (this.value == 'smtp') {
      $('.smtp-field').css('display', 'block');
    } else {
      $('.smtp-field').css('display', 'none');
    }
  });
  
  
  // Date Picker:
  $('#datetimepicker').datetimepicker({
    minDate: new Date(),
    format: 'M d, Y',
    timepicker: false
  }).on('keypress paste', function(event) {
    event.preventDefault();
    return false;
  });
  
});