var xmlhttp = false;

/*@cc_on @*/
/*@if (@_jscript_version >= 5)
  try {
    xmlhttp  = new ActiveXObject("Msxml2.XMLHTTP");
    xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp  = new ActiveXObject("Microsoft.XMLHTTP");
      xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
        xmlhttp  = false;
        xmlhttp2 = false;
    }
  }
@end @*/

if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
  try {
    xmlhttp  = new XMLHttpRequest();
    xmlhttp2 = new XMLHttpRequest();
  } catch (e) {
    xmlhttp  = false;
    xmlhttp2 = false;
  }
}

if (!xmlhttp && window.createRequest) {
  try {
    xmlhttp  = window.createRequest();
    xmlhttp2 = window.createRequest();
  } catch (e) {
    xmlhttp  = false;
    xmlhttp2 = false;
  }
}
