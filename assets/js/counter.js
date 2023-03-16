/**
 * Counter
 *
 * @author Shahzaib
 */
 
"use strict";

var cd = setInterval(countdown, 1000);

/**
 * Clear Countdown
 *
 * @return void
 */
function clearcd() {
  clearInterval(cd);
  
  if (jumpURL != '')
  {
    window.location = jumpURL;
  }
}