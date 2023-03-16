/**
 * Functions
 *
 * @author Shahzaib
 */

"use strict";


/**
 * Send File ( Summernote )
 *
 * @param  file object
 * @return void
 */
function sendFile(file)
{
  if (typeof snImageUpload !== 'undefined')
  {
    var data = new FormData();
    data.append('file', file);
    data.append('zc_csrf_token', csrfToken);
    
    $.ajax(
    {
      data: data,
      type: 'POST',
      url: snImageUpload,
      cache: false,
      contentType: false,
      processData: false,
      success: function (url)
      {
        var image = $('<img>').attr('src', url);
        $('.textarea').summernote('insertNode', image[0]);
      }
    });
  }
}

/**
 * Delete File ( Summernote )
 *
 * @param  file object
 * @return void
 */
function deleteFile(file)
{
  if (typeof snDeleteUpload !== 'undefined')
  {
    $.ajax(
    {
      data: {file: file, zc_csrf_token: csrfToken},
      type: 'POST',
      url: snDeleteUpload,
      cache: false
    });
  }
}

/**
 * Prefix Zero
 *
 * @param  integer num
 * @return integer
 */
function pfzero(num)
{
  if (num < 10)
  {
    num = '0' + num;
  }
  
  return num;
}

/**
 * Countdown
 *
 * @return void
 */
function countdown()
{
  var todo = release - (new Date().getTime());
  var days = Math.floor(todo / 86400000);
  var hours = Math.floor((todo % 86400000) / 3600000);
  var mins = Math.floor((todo % 3600000) / 60000);
  var secs = Math.floor((todo % 60000) / 1000);
  
  if (todo > 0)
  {
    $('#days').text(pfzero(days, 3));
    $('#hours').text(pfzero(hours));
    $('#mins').text(pfzero(mins));
    $('#secs').text(pfzero(secs));
  }
  else
  {
    clearcd();
  }
}

/**
 * Is Valid JSON Response
 *
 * @param  string response
 * @return boolean
 */
function isValidJSON(response)
{
  var status;
  
  try
  {
    status = $.parseJSON(response);
  }
  catch (e)
  {
    status = false;
  }
  
  return status;
}

/**
 * Manage Success Response
 *
 * @param object $form
 * @param string response
 * @return void
 */
function manageSuccessResponse($form, response)
{
  var response = isValidJSON(response);
  var nrMarkup;
  
  nrMarkup += '<tr id="record-0">';
  nrMarkup += '<td class="pb-0" colspan="6">';
  nrMarkup += 'No Records Found, Seems Moved/Deleted.';
  nrMarkup += '</td>';
  nrMarkup += '</tr>';
  
  if (response != false) {
    var rStatus = response.status;
    
    if (rStatus == 'replace' || rStatus == 'remove' || rStatus == 'add') {
      showResponseMessage(null, response.message, 1);
    }
    
    if (rStatus == 'jump')
    {
      window.location = response.value;
    }
    else if (rStatus == 'true_nbs' || rStatus == 'true_cf')
    {
      showResponseMessageNBS($form, response.value, 1);
      resetForm();
    }
    else if (rStatus == 'true')
    {
      showResponseMessage($form, response.value, 1);
      resetForm();
    }
    else if (rStatus == 'false_nbs' || rStatus == 'false_cf')
    {
      showResponseMessageNBS($form, response.value, 0);
    }
    else if (rStatus == 'false')
    {
      showResponseMessage($form, response.value, 0);
    }
    else if (rStatus == 'replace')
    {
      $('.records #record-' + response.id).html(response.value);
      $('#read').modal('hide');
    }
    else if (rStatus == 'remove')
    {
      $('.records #record-' + response.value).remove();
      $('#delete').modal('hide');
      $('#read').modal('hide');
      
      if ($('.records tr').length == 0)
      {
        $('.records').html(nrMarkup);
      }
      
    }
    else if (rStatus == 'add')
    {
      $('.records').append(response.value);
      $('.close-after').modal('hide');
      
      if ($('#record-0').length)
      {
        $('#record-0').remove();
      }
      
      resetForm();
    }
    
    if (rStatus == 'true_cf' || rStatus == 'false_cf')
    {
      if ( typeof grecaptcha !== 'undefined' )
      {
        grecaptcha.reset();
      }
    }
  }
}

/**
 * Show Ajax Response Message
 *
 * @param  object  $form
 * @param  string  message
 * @param  integer type
 * @return void
 */
function showResponseMessage($form, message, type)
{
  var $response = '';
  
  if ($form === null)
  {
    $response = $('.not-in-form .response-message');
  }
  else
  {
    $response = $form.find('.response-message');
  }
  
  var alertBody = '';
  var alertType = 'alert-danger';
  
  if (type == 1) alertType = 'alert-success';
  
  alertBody += '<div class="alert ' + alertType + ' alert-dismissible">';
  alertBody += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  alertBody += message;
  alertBody += '</div>';
  
  $response.html(alertBody);
}

/**
 * Show Ajax Response Message for Non Bootstrap Page
 *
 * @param  object  $form
 * @param  string  message
 * @param  integer type
 * @return void
 */
function showResponseMessageNBS($form, message, type)
{
    var $response = $form.find('.response-message');
    var resType = 'danger';
    var resBody = '';
    
    if (type == 1) resType = 'success';
    
    resBody += '<div class="' + resType + '">';
    resBody += message;
    resBody += '</div>';
    
    $response.html(resBody);
}

/**
 * Reset Form
 *
 * @return void
 */
function resetForm()
{
  $('form').trigger('reset');
  $('form').blur();
}

/**
 * Reset Response Message
 *
 * @return void
 */
function resetResponseMessages()
{
  $('.response-message').html('');
}

/**
 * Submit a Form Ajax Request
 *
 * @param  object $form
 * @return void
 */
function formAjaxRequest($form)
{
  resetResponseMessages();
  
  var formInput = $form.serializeArray();
  var submitButton = $form.find('[type="submit"]');
  var enctype = $form.attr('enctype');
  var action = $form.attr('action');
  var method = $form.attr('method');
  var isLoader = $form.attr('data-loader');
  var btnPreText = $(submitButton).html();
  var formData = formInput;
  var typeFile;
  var loaderHTML;
  var JSON;
  
  loaderHTML  = '<div class="loadingio-spinner-rolling-t9nzklitdf">';
  loaderHTML += '<div class="ldio-pkrsznvfd1">';
  loaderHTML += '<div></div>';
  loaderHTML += '</div>';
  loaderHTML += '</div>';
  
  if (enctype == 'multipart/form-data')
  {
    formData = new FormData();
    typeFile = $form.find('input[type="file"]');
    
    $.each(typeFile, function(key, input)
    {
      if ($(input).val() != '')
      {
        formData.append($(input).attr('name'), $(input).get(0).files[0]);
      }
    });
    
    $.each(formInput, function(key, input) {
      formData.append(input.name, input.value);
    });
    
    formData.append('zc_csrf_token', csrfToken);
  }
  else
  {
    if (typeof csrfToken !== 'undefined')
    {
      formData.push({
        name: 'zc_csrf_token',
        value: csrfToken
      });
    }
  }
  
  JSON = {
    url: action,
    method: method,
    data: formData,
    beforeSend: function()
    {
      submitButton.attr('disabled', 'disabled');
      
      if (isLoader != 'true')
      {
        submitButton.text('Processing...');
      }
      else
      {
        submitButton.html(loaderHTML);
      }
    },
    error: function(response)
    {
      showResponseMessage($form, response.status + ' - ' + response.statusText, 0);
    },
    success: function(response)
    {
      manageSuccessResponse($form, response);
    }
  };
  
  if (enctype == 'multipart/form-data')
  {
    JSON.contentType = false;
    JSON.processData = false;
    JSON.cache = false;
  }
  
  $.ajax(JSON).done(function() {
    submitButton.removeAttr('disabled');
    $(submitButton).html(btnPreText);
  });
}

/**
 * Get Record From Database Using Ajax
 *
 * @param  integer id
 * @param  string  source
 * @param  object  $element
 * @return void
 */
function getRecord(id, source, $element)
{
  var elementText = $element.html();
  var elementSiblings = $element.siblings();
  var dataToSend = { id: id, zc_csrf_token: csrfToken };
  
  
  $.ajax({
    url: source,
    data: dataToSend,
    method: 'post',
    
    beforeSend: function()
    {
      $element.html('Processing...');
      elementSiblings.add('.get-data-tool')
      .add('.get-data-tool-i')
      .bind('click', function(){
        return false;
      });
    },
    success: function(serverResponse)
    {
      var response = isValidJSON(serverResponse);
      var value = '';
      
      if (response != false)
      {
        if (response.status == 'true')
        {
          value = response.value;
        }
      }
      else
      {
        if (serverResponse != '')
        {
          value = serverResponse;
        }
      }
      
      if (value != '')
      {
        $('.ajax-response').html(value);
        $('#read').modal('show');
      }
    }
  }).done(function() {
    $element.html(elementText);
    elementSiblings.add('.get-data-tool')
    .add('.get-data-tool-i')
    .unbind('click');
  });
}