function deleteMessage(message_id)
{
  var httpReq = null;

  if (window.XMLHttpRequest)
    httpReq = new XMLHttpRequest();
  else if (window.ActiveObject)
    httpReq = new ActiveXObject("Microsoft.XMLHTTP");
  else
    return false;

  httpReq.onload = function()
  {
    // var obj = document.getElementById(objID);
    // obj.innerHTML = httpReq.responseText;

    location.reload(true);

  }

  httpReq.open('GET','./handlers/handle_delete_message.php?id=' + message_id, true);
  httpReq.send(null);
}

