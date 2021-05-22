window.dataLayer = window.dataLayer || [];
function gtag() { dataLayer.push(arguments); }

(function () { 
  
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  function agreed(e) {
    e.preventDefault();
    setCookie('gagdpr', 1, parseInt('$GAGDPRDURATION'));
    window['ga-disable-' + gaid] = false;
    gtag('config', '$GAGDPRTAG');
    document.getElementById('gagdpr').style.display = 'none';
  }

  var allowed = getCookie('gagdpr');
  var gaid = '$GAGDPRTAG';

  if (allowed) {
    window['ga-disable-' + gaid] = false;
    document.getElementById('gagdpr').style.display = 'none';
  } else {
    window['ga-disable-' + gaid] = true;
  }

  document.getElementById('gagdpr-btn').addEventListener("click", agreed);

})();

gtag('js', new Date());
gtag('config', '$GAGDPRTAG');
