
var var_tree;
var Array_box = [];
var ibox = 0;

// array idbox, lasted id
//var Array_ibox = [[], []];

var Array_ibox = new Array(20)
for (i = 0; i < 20; i++)
    Array_ibox[i] = new Array(5)
 
var abox = 0;
function showaray()
{
    var str=""
    for (var i = 0; i < (abox) ; i++) {  
        str += ",(" + i + ")" + Array_ibox[i] [0] + ": " + Array_ibox[i][1];
    }
    alert(str);
}
function getid_array(id) { 
    for (var i = 0; i < (abox) ; i++) {
       // alert("dò " + Array_ibox[i, 0])
        if (Array_ibox[i][0] == id) {
            return i;
        }
    }
  //  alert("ko thay de set" + id)
    return -1;
}
// set lasted id array
function set_lastedid(idgroup, lastedid) {
    //find i
    var i = getid_array(idgroup);
    if (i == -1) {
    //    alert("ko thay  set" + idgroup); 
        return "no" ;
    }
   Array_ibox[i][1] = lastedid;
 }
function get_lastedid(idgroup) {
    //find i
    var i = getid_array(idgroup);
    if (i == -1) {
        //alert("ko thay " + idgroup);
        return 0;
    }
    return Array_ibox[i][1];
}
function load_tree()
{
    if (var_tree != null) {
        var_tree.abort();
    }
 
    var_tree= $.ajax(
           {
               url: "/chatbox?cmd=load_list",
               type: 'Get',
               data: { 
               }
           }).done(function (msg) {
               if (msg != "") {
                   $("#item_containt").html("Bạn bè:"+msg);
                //   setTimeout(load_groupchat, 60000);

               }
           }); 
}
var ajax_groupchat;
function load_groupchat() {
    if (ajax_groupchat!=null) {
        ajax_groupchat.abort();
    }
    ajax_groupchat= $.ajax(
                {
                    url: "/chatbox?cmd=load_group",
                    type: 'Get',
                    data: {
                    },
                    dataType: "json",
                    success: function (data) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) { 
                            var name = decode_base(data[i].name)
                            var typeview = data[i].typeview;
                            var idgroup = data[i].idgroup;
                            str = "<div class='users items clear' data-id=\"idgroup\" ><div class='subitems' onclick=\"showbox('" + name + "','1','" + idgroup + "','1','click')\" > <i class=\"glyphicon glyphicon-conversation\"> </i>" + name + "</div>  <span class=\"countgroup\" id=\"countgroupnew_" + idgroup + "\"></span>"
                                + "<a class=\"point menuJob_BT pull-right\" type=\"button\" href=\"javascript:delete_chatbox('"+idgroup+"')\" >  <div class=\"glyphicon glyphicon-remove\">  </div></a>"
                                +"</div>"+str;
                            showbox(name, 1, idgroup, typeview); 
                        }
                        if (str!="") {
                            str = "Đang chat: " + str;
                        }
                        $("#item_group").html(str);
                        setTimeout(load_groupchat, 20000);
                    }
                }
          );
}

function showbox(name, type, id, typeview,action) {
    // checkin box visible 
    if (getid_array(id) != -1) {
        if (action!=null) {
         visible_box(id); 
        } 
       return;// đã có box
    }
    Array_box[ibox] = id; ibox++; 
    // create new box 
    Array_ibox[abox][0] = id; // mang 2 chieu created
    Array_ibox[abox][1] = "0";
//  alert(abox + "-" + Array_ibox[(abox-1)][0] +":"+ Array_ibox[abox][0])
    abox++;
    var str = " <div class=\"box\" id=\"ibox_containt"+id+"\" "+(typeview=="0"?" style=\"display:none\"":"")+">"
                + "<input type=hidden id=\"ibox_visible" + id + "\" value='" + typeview + "' >"
                + " <div class=\"title\"><div class=\"text\"><i class=\"glyphicon glyphicon-conversation\"> </i> " + name + "</div>"
                + " <span class=\"bt\"> <a href=\"javascript:cb_addtogroup('"+id+"')\">+ Thêm người</a>"
                + "<button id=\"Button1\" class=\" btn btn-default btn-xs pull-right  \" title=\"Thu nhỏ\" onclick=\"hidebox('"+id+"')\">"
                 +" <i class=\"glyphicon glyphicon-remove\"></i> </button></span></div>"
                 + "<div class=\"containtbox\" id=\"ibox_text" + id + "\">"
                 +"<div class=\"item\"><img src=\"/images/default-user-icon-profile.png\" class=\"infoTip cir_avatar_create\"> "
                 +"<span class=\"textpost\"> </span></div> "
                 +" </div>"
                 +" <div class=\"inputpost\">"
                 + "<textarea autofocus=\"autofocus\" id='ibox_txtpost" + id + "'  onkeypress=\"return enterup_chatbox(event,this)\" data-id='" + id + "' placeholder=\"Nhấn enter để gửi\"></textarea>"
                 + "<div class='btonsend'   onclick=\"ibox_post('" + id + "')\" title='Gửi' id='btchatS_"+id+"'/></div"
                 +" </div>"
                 + "</div>"
    $("#taskbarbox").append(str); 
    CB_Ajaxload_first(id);
}
function enterup_chatbox(e, objet) {
    if (e.keyCode == 13) {
        var idfeed = $(objet).attr("data-id");
        ibox_post(idfeed);
    }
    else {
      
    }
} 
function ibox_post(id)
{
    $("#btchatS_" + id).css("background-image", "url('/images/loader_green.gif')")
    $.ajax(
                   {
                       url: "/chatbox?cmd=iboxpost",
                       type: 'Post',
                       data: {
                           "idgroup": id, "txt": $("#ibox_txtpost"+id).val()
                       },
                       dataType: "text",
                       success: function (data) {
                           if (data == "denied") {
                               var str = "<div class=\"itemsys\"> <span class=\"textsys\">Bạn đã bị chặn trò chuyện vào nhóm này</span></div> ";
                               $("#ibox_text" + id).append(str);
                           }
                           else {
                               $("#ibox_txtpost" + id).val("")
                               CB_Ajaxload_agant(id, get_lastedid(id))
                              // alert(id)
                               Post_ws_chat(id);
                           }
                           $("#btchatS_" + id).css("background-image", "url('/images/send_comment_small.png')");
                       }
                   }
         );
}
var status_windowfocus = 0;
$(window).blur(function () { 
    status_windowfocus = 0;
   // alert("blur")
});
$(window).focus(function () {     
    status_windowfocus = 1; 
  //  alert("focus")
});
function CB_Ajaxload_first(idgroup)
{ 
    $.ajax(
            {
                url: "/chatbox?cmd=chattext_load",
                type: 'Get',
                data: {
                    idgroup: idgroup,type:"1"
                },
                dataType: "json",
                success: function (data) {
                    var str = "";
                    var lastid = "0";
                    for (var i = 0; i < data.length; i++)
                    {
                        lastid = data[i].id;
                        var text = decode_base(data[i].text);
                        if (data[i].system == "1") {
                            str += "<div class=\"itemsys\">  "
                              + "<span class=\"textsys\"> " + text + "</span></div> ";
                        }
                        else {
                            str += "<div class=\"item " + (data[i].typeview == "1" ? "itemright" : "") + "\"> " + (data[i].typeview == "0" ? "   <img src=\"" + data[i].avatar + "\" class=\"infoTip cir_avatar_create\">" : "")
                                + "<span class=\"textpost\"> " + text + "</span></div> ";
                        }  
                    }
                    set_lastedid(idgroup, lastid); 
                    $("#ibox_text" + idgroup).html(str);  
                    $("#ibox_text" + idgroup).scrollTop($("#ibox_text" + idgroup)[0].scrollHeight);
                   // setTimeout(function () { CB_Ajaxload_agant(idgroup, lastid);}, 10000);
                }
            }
      );    
}
var Array_ajax = []; var cb_iajax = 0;
var ajax_id = [];
function CB_Ajaxload_agant(idgroup, lastid) {
    // checkin ajax
    for (var i = 0; i < Array_ajax.length; i++) {
        if (ajax_id[i]==idgroup)
        { 
            Array_ajax[i].abort();
        }
    }
    lastid = get_lastedid(idgroup);

    ajax_id[cb_iajax] = idgroup;
    var notishowz1 = 0;
    Array_ajax[cb_iajax] = $.ajax(
                    {
                        url: "/chatbox?cmd=chattext_load_againt",
                        type: 'Get',
                        data: {
                           "idgroup": idgroup,"lastid": lastid
                        },
                        dataType: "json",
                        success: function (data) {
                            var str = "";              
                            for (var i = 0; i < data.length; i++) {
                                var text = decode_base(data[i].text);
                                lastid = data[i].id;
                                var setid = set_lastedid(idgroup, lastid);
                                if (setid=="no") {
                                    return;
                                }

                                if (data[i].system == "1") {
                                    str += "<div class=\"itemsys\">  "
                                      + "<span class=\"textsys\"> " + text + "</span></div> ";
                                }
                                else {
                                    str += "<div class=\"item " + (data[i].typeview == "1" ? "itemright" : "") + "\">" + (data[i].typeview == "0" ? "   <img src=\"" + data[i].avatar + "\" class=\"infoTip cir_avatar_create\">" : "")
                                           + "<span class=\"textpost\"> " + text + "</span></div> "; 
                                    //notifycation
                                    if (data[i].typeview == "0" && (status_windowfocus == 0 && $("#ibox_visible" + idgroup).val() == "1")) {
                                        if (notishowz1 == 0) {
                                            spawnNotification_chatbox(text, data[i].avatar, "ILeader", "/", idgroup);
                                            notishowz1++;
                                        }
                                    }
                                    else {
                                        if (data[i].typeview == "0" && $("#ibox_visible" + idgroup).val() == "0") {
                                            if (notishowz1 == 0) {
                                                spawnNotification_chatbox(text, data[i].avatar, "ILeader", "/", idgroup);
                                                notishowz1++;
                                            }
                                        }
                                    }
                                    if (data[i].typeview == "0") {
                                        $("#countgroupnew_" + idgroup).html("1");
                                    }
                                }
                            }
                            $("#ibox_text" + idgroup).append(str);
                            if (str!="") {
                                $("#ibox_text" + idgroup).scrollTop($("#ibox_text" + idgroup)[0].scrollHeight);
                            }
                       //     setTimeout(function () { CB_Ajaxload_agant(idgroup, lastid) }, 15000);
                        }
                        ,
                        error: function () {
                            setTimeout(function () { CB_Ajaxload_agant(idgroup, lastid) }, 15000); 
                        } 
                    }
                 );
    cb_iajax++;
}
var notiz;
function spawnNotification_chatbox(theBody, theIcon, theTitle, link,id) {
    try {
        notifyMe();
        if (notiz != null) {
            notiz.close();
        }
        var options = {
            body: theBody,
            icon: theIcon,
        }
        notiz = new Notification(theTitle, options);
        notiz.onclick = function (event) { 
            visible_box(id)
            this.close();
            //   event.preventDefault();  // prevent the browser from focusing the Notification's tab
           // window.location = link;
        }
    } catch (e) {
    }
}
var Permision_noti = 0; // allow noti
function notifyMe() {

    if (!("Notification" in window)) {
        Permision_noti = 1;
        setInterval(function () { get_Data_Notifycation(); }, 30000);
        return;
    }
        // Let's check whether notification permissions have already been granted
    else if (Notification.permission === "granted") {
        Permision_noti = 0;
         return;
    }
        // Otherwise, we need to ask the user for permission
    else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            if (permission === "granted") {
                Permision_noti = 0;
                 return;
            }
            else { Permision_noti = 1;   }
        });
    }
    Permision_noti = 1;
 }

function visible_box(id)
{
   // alert(Array_box[(ibox-1)])
    $("#ibox_containt" + id).insertAfter("#ibox_containt" + Array_box[(ibox - 1)]);
    // chuyển vị trí box
    for (var i = 0; i < Array_box.length; i++) { 
        if (Array_box[i] == id) {
            var iscache = Array_box[i];
            Array_box[i] = Array_box[(ibox - 1)];
            Array_box[(ibox - 1)] = iscache 
        }
    }
    $("#ibox_containt" + id).show(100);
    $("#ibox_visible" + id).val("1");
    $("#ibox_txtpost" + id).focus();
    $("#ibox_text" + id).scrollTop($("#ibox_text" + id)[0].scrollHeight);         
    $.ajax(
               {
                   url: "/chatbox?cmd=typeview_ibox",
                   type: 'Post',
                   data: {
                       "type": "1", "idgroup": id
                   },
                   dataType: "text",
                   success: function (data) {
                   }
               }
               );    
}
function hidebox(id)
{
    $("#ibox_containt" + id).hide(300);
    $("#ibox_visible" + id).val("0");
    $.ajax(
                  {
                      url: "/chatbox?cmd=typeview_ibox",
                      type: 'Post',
                      data: {
                          "type": "0", "idgroup": id
                      },
                      dataType: "text",
                      success: function (data) { 
                      }
                  }
        );
}
function Status_formmain(status) { 
    $.ajax(
                  {
                      url: "/chatbox?cmd=toogle_form",
                      type: 'Get',
                      data: {
                          "type": status
                      },
                      dataType: "text",
                      success: function (data) {
                      }
                  }
        );
}
function delete_chatbox(id) {
    jConfirm('Bạn có chắc muốn xóa nhóm chat này?', 'Xác nhận', function (r) {
        if (r) {
            $("#ibox_containt" + id).hide(300);
            $("#ibox_visible" + id).val("0");
            $.ajax(
                          {
                              url: "/chatbox?cmd=delbox",
                              type: 'Post',
                              data: {
                                  "type": "0", "idgroup": id
                              },
                              dataType: "text",
                              success: function (data) {
                                  load_groupchat();
                              }
                          }
                );
        }
    });
}
function Create_box(id) { 
            $.ajax(
                          {
                              url: "/chatbox?cmd=Create_box",
                              type: 'Post',
                              data: {
                                  "idusers": id 
                              },
                              dataType: "json",
                              success: function (data) {                                  
                                  var name = decode_base(data[0].name)
                                  var typeview = data[0].typeview;
                                  var idgroup =  data[0].idgroup;
                                  if (data[0].name != "-1") {
                                      //$.alerts.okButton = 'Chat tiếp';
                                      //$.alerts.cancelButton = 'Tạo nhóm mới';
                                      //jConfirm('Bạn đã trò chuyện với người này trước đó', 'Xác nhận', function (r) {
                                      //    if (r) {

                                    
                                      var _id = getid_array(idgroup);
                                          if (_id != "-1") {
                                              visible_box(Array_ibox[_id][0])
                                          }
                                          else {
                                                showbox(name, 1, idgroup, typeview);
                                          }
                                      
                                      //    }
                                      //    else {
                                      //        Create_box_continue(id, "ok");
                                      //    }
                                      //    $.alerts.okButton = '&nbsp;OK&nbsp;';
                                      //    $.alerts.cancelButton = '&nbsp;Cancel&nbsp;';
                                      //});
                                  }
                                  else {
                                      Create_box_continue(id, "ok");
                                  }
                              }
                          }
               );
}
function Create_box_continue(id, continuex)
{
    if (ajax_groupchat != null) {
        ajax_groupchat.abort();
    }
    ajax_groupchat = $.ajax(
                {
                    url: "/chatbox?cmd=Create_box_continue",
                    type: 'Post',
                    data: {
                        "idusers": id, "continue": continuex
                    },
                    dataType: "json",
                    success: function (data) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            var name = decode_base(data[i].name)
                            var typeview = data[i].typeview;
                            var idgroup = data[i].idgroup;
                            str += "<div class='users items clear' data-id=\"idgroup\" ><span onclick=\"showbox('" + name + "','1','" + idgroup + "','1','click')\" > <i class=\"glyphicon glyphicon-conversation\"> </i>" + name + " <span class=\"countgroup\" id=\"countgroupnew_" + idgroup + "\"></span></span>"
                                + "<a class=\"point menuJob_BT pull-right\" type=\"button\" href=\"javascript:delete_chatbox('" + idgroup + "')\" >  <div class=\"glyphicon glyphicon-remove\">  </div></a>"
                                + "</div>";
                            showbox(name, 1, idgroup, typeview);
                        }
                        $("#item_group").prepend(str); 
                    }
                }
          );
}
function cb_addtogroup(id) {
    $.Ncolorbox({ width: "500px", height: "100%", href: "/module/chat/Add_jobusers.aspx?idgroup=" + id, fixed: false, title: "Thêm vào nhóm" });
}

//jQuery(document).ready(function ($) {
    var width_win = $(window).width();
    if (width_win <= 850) {
        setTimeout(function () { $("#chatboxform").hide(); }, 1000);
    }
    else {
       load_tree();
      load_groupchat();
    }
//});