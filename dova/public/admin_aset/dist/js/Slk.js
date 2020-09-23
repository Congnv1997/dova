function Light_call(phone) {
    $.Ncolorbox({
        onComplete: function () {
            $("#NcboxTitle").hide();
        }, fixed: true, width: "50%", height: "500px", top: "10%", href: "/frame-ajax.aspx?mod=CALL_API!Call&phone=" + phone, escKey: false, closeButton: false, overlayClose: false, title: " "
    });
}
function Order_table()
{
    $('[data-ride="datatables"]').each(function () {
        var oTable = $(this).dataTable({
            "bFilter": false,
            "bLengthChange": false,
            "bPaginate": false,
            "bInfo": false
        });
    });
}
function addnew_nhansu()
{
    $.colorbox({ iframe: true, width: "80%", height: "80%", href: "/module/khachhang/nhansu_add.aspx?callback=refresh", onClosed: Location_nhansu });
}
function Location_nhansu()
{
    window.location = "/Default.aspx?mod=khachhang!nhansu_chamcong";
}


function Add_Email() {
    $.colorbox({ fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email", title: "<i class=\"i i-pencil2\"></i> Soạn Thư mới" });
}
function Add_Email_idhv(idhv) {
    $.colorbox({ fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email&idhv=" + idhv, title: "<i class=\"i i-pencil2\"></i>  Soạn Thư mới" });
}
function Add_Email_body(idhv, body) {
    $.colorbox({
        onComplete: function () {
            CKEDITOR.instances.txt_email_sender.insertHtml("<p><i>" + body + "</i></p>");
        }, fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email&idhv=" + idhv, title: "<i class=\"i i-pencil2\"></i>  Soạn Thư mới"
    });
}
function Add_Email_body_us(idhv, body, us) {
    $.colorbox({
        onComplete: function () {
            CKEDITOR.instances.txt_email_sender.insertHtml("<p><i>" + body + "</i></p>");
        }, fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email&idhv=" + idhv + "&iduser=" + us, title: "<i class=\"i i-pencil2\"></i>  Soạn Thư mới"
    });
}

function Add_Email_body(idhv, body) {
    $.colorbox({
        onComplete: function () {
            CKEDITOR.instances.txt_email_sender.insertHtml("<p><i>" + body + "</i></p>");
        }, fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email&idhv=" + idhv, title: "<i class=\"i i-pencil2\"></i>  Soạn Thư mới"
    });
}

function Add_Email_body_reply(idhv, body, title, us) {
    $.colorbox({
        onComplete: function () {
            setTimeout(function () {
                //CKEDITOR.instances.txt_email_sender.insertHtml("<p><i>" + body + "</i></p>");
                $("#Containt_footer").val("------<p><i>" + body + "</i></p>")
                $("#Subject_sendmail").val("RE: " + title);
            }, 200)
        }, fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email&idhv=" + idhv + "&iduser=" + us, title: " <i class=\"fa fa-mail-reply\"></i> Trả lời Thư"
    });
}
function Add_Email_body_forward(idhv, body, title, us) {
    $.colorbox({
        onComplete: function () {
            setTimeout(function () {
                //CKEDITOR.instances.txt_email_sender.insertHtml("<p><i>" + body + "</i></p>");
                $("#Containt_footer").val("------<p><i>" + body + "</i></p>")
                $("#Subject_sendmail").val("FW: " + title);
            }, 200)
        }, fixed: true, width: "70%", height: "102%", right: "0px", top: "-30px", href: "/frame-ajax.aspx?mod=emailclient!Add_Email&idhv=" + idhv + "&iduser=" + us, title: " <i class=\"fa fa-mail-reply\"></i> Chuyển tiếp Thư"
    });
}

function changeinfo_colorbox(title) {
    $("#cboxTitle").html(title);
}
function resize_box(wi,hei)
{
    $.colorbox.resize({ width: wi, height: hei});
}
    function readyform() {
    $('input[type="text"]').focus(function () {
        $(this).select();
    }).click(function () { 
            $(this).select(); 
    });
    } 

function showError(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('success info warning').addClass('error').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500, function () {
            $(this).delay(delay).animate({ opacity: 0, right: '-20' }, 500, function () { $(this).hide(); });
        });
        return false;
    }
    $('#alertMessage').addClass('error').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500);
}
function showSuccess(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('error info warning').addClass('success').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500, function () {
            $(this).delay(delay).animate({ opacity: 0, right: '-20' }, 500, function () { $(this).hide(); });
        });
        return false;
    }
    $('#alertMessage').addClass('success').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500);
}
function showWarning(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('error success  info').addClass('warning').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500, function () {
            $(this).delay(delay).animate({ opacity: 0, right: '-20' }, 500, function () { $(this).hide(); });
        });
        return false;
    }
    $('#alertMessage').addClass('warning').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500);
}
function showInfo(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('error success  warning').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500, function () {
            $(this).delay(delay).animate({ opacity: 0, right: '-20' }, 500, function () { $(this).hide(); });
        });
        return false;
    }
    $('#alertMessage').html(str).stop(true, true).show().animate({ opacity: 1, right: '10' }, 500);
}
// tipsy tootip
//$('.tip a ').tipsy({ gravity: 's', live: true });
//$('.ntip a ').tipsy({ gravity: 'n', live: true });
//$('.wtip a ').tipsy({ gravity: 'w', live: true });
//$('.etip a,.Base').tipsy({ gravity: 'e', live: true });
//$('.netip a ').tipsy({ gravity: 'ne', live: true });
//$('.nwtip a , .setting').tipsy({ gravity: 'nw', live: true });
//$('.swtip a,.iconmenu li a ').tipsy({ gravity: 'sw', live: true });
//$('.setip a ').tipsy({ gravity: 'se', live: true });
//$('.wtip input').tipsy({ trigger: 'focus', gravity: 'w', live: true });
//$('.etip input').tipsy({ trigger: 'focus', gravity: 'e', live: true });
//$('.iconBox, div.logout').tipsy({ gravity: 'ne', live: true });
//$('.flot-graph').tipsy({ gravity: 'ne', live: true, trigger: 'click', });

// icon  gray Hover
$('.iconBox.gray').hover(function () {
    var name = $(this).find('img').attr('alt');
    $(this).find('img').animate({ opacity: 0.5 }, 0, function () {
        $(this).attr('src', 'images/icon/color_18/' + name + '.png').animate({ opacity: 1 }, 700);
    });
}, function () {
    var name = $(this).find('img').attr('alt');
    $(this).find('img').attr('src', 'images/icon/gray_18/' + name + '.png');
})
 

// loading
function loading(name, overlay) {
    $('body').append('<div id="overlay"></div><div id="preloader">' + name + '..</div>');
    if (overlay == 1) {
        $('#overlay').css('opacity', 0.4).fadeIn(400, function () { $('#preloader').fadeIn(400); });
        return false;
    }
    $('#preloader').fadeIn();
}


function unloading() {
    $('#preloader').fadeOut(400, function () { $('#overlay').fadeOut(); }).remove();
}


 

function decodeHtml(htmlx) { 
    return $('<div>').html(htmlx).text();
}

function decode_base(htmlx) {
    htmlx = Base64.decode(htmlx);
    return htmlx;
}
var Base64 = {


    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",


    encode: function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

        }

        return output;
    },


    decode: function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = Base64._utf8_decode(output);

        return output;

    },

    _utf8_encode: function (string) {
        string = string.replace(/\r\n/g, "\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    _utf8_decode: function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while (i < utftext.length) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if ((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i + 1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i + 1);
                c3 = utftext.charCodeAt(i + 2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}
