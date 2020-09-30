function CreateXMLHTTP() {
    var request = false;
    try {
        request = new ActiveXObject('Msxml2.XMLHTTP');
    }
    catch (err2) {
        try {
            request = new ActiveXObject('Microsoft.XMLHTTP');
        }
        catch (err3) {
            try {
                request = new XMLHttpRequest();
            }
            catch (err1) {
                request = false;
            }
        }
    }
    return request;
}


function PostDataToServer() {
    document.getElementById("checkit").innerHTML = " <img src='/images/loadder/loader_green.gif' /> ";
    var objHTTP = CreateXMLHTTP();
    // var sQueryString = "cmd=senddata&touser=" + ToUser + "&fromuser=" + FromUser + "&controldisplay=" + DvDisplay + "&msg=" + sContent;

    var para = "iduser=" + document.getElementById("user").value + "&idpass=" + MD5(document.getElementById("pass").value);
    objHTTP.open("POST", "checklogin.aspx", false);
    objHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objHTTP.send(para);

    objHTTP.onreadystatechange = function () {
        if (objHTTP.readyState == 4) {

        }
    };
    var sReply = objHTTP.responseText;
    if (objHTTP.status != 200) {
        sReply = "failure"; return false
    }

    if (sReply == "true") {
        window.location = "default.aspx"; return true;
    }
    else { document.getElementById("checkit").innerHTML = "Sai User Ho&#7863;c Password "; return false; }
    return false
}