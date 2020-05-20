/* */

function call_logout()
{
  var httpReq = null;

  if (window.XMLHttpRequest)
    httpReq = new XMLHttpRequest();
  else if (window.ActiveObject)
    httpReq = new ActiveXObject("Microsoft.XMLHTTP");
  else
    return false;

  httpReq.onreadystatechange = function()
  {
    var obj = document.getElementById(objID);
    obj.innerHTML = httpReq.responseText;
  }

  httpReq.open('GET','../logout.php',true);
  httpReq.send(null);
  window.location.reload();
}

