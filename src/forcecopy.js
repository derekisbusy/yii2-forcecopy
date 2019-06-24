
function waitForToolbarAndAttachClickEventToForcecopy()
{
    var link = document.getElementById('debug-toolbar-forcecopy-link');
    if (link === null) {
        setTimeout(function(){ waitForToolbarAndAttachClickEventToForcecopy(); }, 1000);
        return;
    }
    var url = link.getAttribute('data-url');
    link.onclick = function(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
               if (xmlhttp.status == 200) {
                   document.getElementById("debug-toolbar-forcecopy-link").innerHTML = xmlhttp.responseText;
               }
               else if (xmlhttp.status == 400) {
                  alert('There was an error 400');
               }
               else {
                   alert('something else other than 200 was returned');
               }
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        return false;
    }
}

waitForToolbarAndAttachClickEventToForcecopy();