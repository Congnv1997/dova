<!DOCTYPE html>
   <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <meta http-equiv="refresh" content="30"> -->
        <base href="{{asset('')}}">
        <title>Trang quản trị</title>

        <!-- calendar -->
        <link href='calendar/lich/css/css.css' rel='stylesheet' />
        <link href='calendar/lich/css/main.css' rel='stylesheet' />
        @yield('calendar')
  
        

        <!-- Bootstrap Core CSS -->
        <link href="admin_aset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="admin_aset/bower_components/bootstrap/dist/css/icon.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="admin_aset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="admin_aset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="admin_aset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="admin_aset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        <!-- CSS -->

        <link rel="stylesheet" href="calendar/css.css">

        <link rel="stylesheet" href="admin_aset/dist/fontawesome/css/all.css">
        <link rel="stylesheet" href="admin_aset/dist/css/css.css">

        <link rel="stylesheet" href="admin_aset/dist/css/animate.css">
        <link rel="stylesheet" href="admin_aset/dist/css/boostrap.css">
        <link rel="stylesheet" href="admin_aset/dist/css/buttons.css">
        <link rel="stylesheet" href="admin_aset/dist/css/colorbox.css">
       <link rel="stylesheet" href="admin_aset/dist/css/font-awesome.min.css">
        <link rel="stylesheet" href="admin_aset/dist/css/font.css">
        <link rel="stylesheet" href="admin_aset/dist/css/icon.css">
        <link rel="stylesheet" href="admin_aset/dist/css/lleader.css">
        <link rel="stylesheet" href="admin_aset/dist/css/Ncolorbax.css">
        <link rel="stylesheet" href="admin_aset/dist/css/orange.css">
        <link rel="stylesheet" href="admin_aset/dist/css/ori-core.css">
        <link rel="stylesheet" href="admin_aset/dist/css/responsive.css">
        <link rel="stylesheet" href="admin_aset/dist/css/style.css">
        <link rel="stylesheet" href="admin_aset/dist/css/style_table.css">
        <link rel="stylesheet" href="admin_aset/dist/css/ui-custom.css">
        <link rel="stylesheet" href="admin_aset/dist/css/jquery.alerts.css">
        <link rel="stylesheet" href="admin_aset/dist/css/vlt.css">
        <link rel="stylesheet" href="admin_aset/dist/css/daotao.css">
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css" type="text/css">

      

       

<style>
.error-form{
    color:red;
}
</style>

 @if(session('toastr'))
    <script>

      var TYPE_MESSAGE="{{session('toastr.type')}}";
      var MESSAGE="{{session('toastr.message')}}";
    </script>
    @endif
    </head>

    <body>

    <div class="modal fade" id="modal-suathongtincanhan">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">Chỉnh sửa thông tin cá nhân</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="POST" id="form-suathongtincanhan" enctype="multipart/form-data">
                        @csrf

                 <div id="ctl10_formContain" class="col-md-12">
                 <div class="clear_both"></div>
                 <div class="prf-contacts sttng"><h2> Thông tin đăng nhập</h2> </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                        <label class="control-label">Ảnh đại diện </label>
                        <input type="file" name="img" id="post_zNhan_suhinhanh" class="form-control">
                        <input type="hidden" name="img_hi" id="img_hi" class="form-control">
                         <img src="" alt="" id="img_cu" name="img_cu" width="50px">
                     </div>
                 </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label class="control-label">Họ Tên </label>
                    <input type="text"  name="name" class="form-control">
                     <span class="error-form"></span>
                </div>

                </div>


                        <div class="clear"></div>

                        <div class="col-sm-12">


                         <div class="form-group"><label class="control-label">Email </label>
                        <input type="text" value="" id="zNhan_suemail" name="email" class="form-control" >
                     <span class="error-form"></span></div>


                        </div>
                     <div class="clear_both"></div>

                           </div>

            <div class="clearfix" style="clear:both;height:30px;text-align:center">
           </div>
           <input type="hidden" name="id" >


                        <button type="submit" class="btn btn-primary js-btn-suathongtincanhan">Chỉnh sửa </button>
                    </form>
                </div>
            </div>
        </div>
        </div>

          @include('layout.main.header')
          @include('layout.main.banner')
         @include('layout.main.menu')
         
    <!-- check -->

    <!-- check -->
            <div class="col-md-offset-1 vlt-than">

<section class="section-layout-1">
  <section class="hbox stretch">

    @yield('content')

    </section>
</section>
        </div>
        <div id="chatbox1_script_fullajax">
     <!-- Facebook Pixel Code -->

 <link rel="stylesheet" href="admin_aset/dist/css/chatbox.css">
<script src="admin_aset/dist/Js/chatbox.js"></script>
<div id="fullloading" style="position:fixed;text-align:center;top:20px;left:45%;z-index:90000;display:none"><img src="/images/loader_green.gif"></div>
<div class="chatbox" id="chatboxform">
    <div class="taskbar" id="taskbarbox">
        <div class="taskbar" id="taskbarbox">

           <div class="box" id="" style="display: none;">
            <input type="hidden" id="" value="0">
             <div class="title"><div class="text"><i class="glyphicon glyphicon-conversation">
              </i>
          </div>
           <span class="bt">
            <a href="">+ Thêm người</a>
            <button id="Button1" class=" btn btn-default btn-xs pull-right  " title="Thu nhỏ" onclick="hidebox()">
                <i class="glyphicon glyphicon-remove"></i>
            </button>
        </span>
    </div>
    <div class="containtbox" id="">
    <div class="itemsys">
     <span class="textsys"> test mời  trò chuyện </span>
 </div>
 <div class="itemsys">
  <span class="textsys">
  17 ngày</span>
</div>
</div>
<div class="inputpost">
    <textarea autofocus="autofocus" id="" onkeypress="return enterup_chatbox(event,this)" data-id="" placeholder="Nhấn enter để gửi">
    </textarea>
    <div class="btonsend" onclick="" title="Gửi" id="">
    </div>
</div>
</div>



    <div class="formmain">
                  <div class="title" onclick="Toogle_chatbox()"><i class="fa fa-comment fa-2x icon-muted" style="font-size:14pt"></i> Chat Nhóm
                     <button id="btn_project" class="joyride-next-tip btn btn-default btn-xs pull-right  " title="Thu nhỏ">
                      <i class="glyphicon glyphicon-expand"></i>  </button>
                  </div>
           <div id="idcontaint_chatbox" class="containt" style="display: none;">
                 <div id="item_group"></div>
                 <div id="item_containt">Bạn bè:

                    <div class="users items clear" onclick="Create_box()">
                    <img src="/module/chat/IMG_AVA.aspx?case=A" class="infoTip cir_avatar_create"></div>

                </div>
           </div>
    </div>
 </div>


     <script>
        function Toogle_chatbox()
        {
            if ($("#idcontaint_chatbox").is(":hidden"))
            {
                Status_formmain("1")
            } else {
                Status_formmain("0");
            }
            $("#idcontaint_chatbox").toggle("slow");
        }
</script>
  <script type="text/javascript">

      var url = 'ws://admin.alibabaschool.vn/module/chat/AHX.ashx?ID=';
      //  alert('Connecting to: ' + url);
      var ws = new WebSocket(url);
      ws.onopen = function () {
      };
      ws.onmessage = function (e) {
          // {function: ,lastid: }
          //   alert(e.data);
          Excute_ws(e.data.replace("{", "").replace("}", ""))
      };
      $('#cmdLeave').click(function () {
          ws.close();
      });
      ws.onclose = function () {
          setTimeout(function () { ws = new WebSocket(url); }, 4000);
          console.log("reconenct ws");
          //   $('#chatMessages').prepend('Closed <br/>');
      };
      ws.onerror = function (e) {
          setTimeout(function () { ws = new WebSocket(url); }, 4000);
          // $('#chatMessages').prepend('Oops something went wront <br/>');
      };

      function Excute_ws(message) {
          //  alert(message)
          var res = message.split(",");
          var fc = res[0].split(":");
          //  alert(fc[1].replace("\"", "").replace("\"", ""));
          var fc_js = fc[1].replace("\"", "").replace("\"", "")
          var vl = res[1].split(":");
          var vl_js = vl[1].replace("\"", "").replace("\"", "")

          var idgr = res[2].split(":");
          var gr_js = idgr[1].replace("\"", "").replace("\"", "")
          if (fc_js == "Chatloadgaint") {
              CB_Ajaxload_agant(gr_js, get_lastedid(gr_js));
          }
      }
      function Post_ws_chat(idgroup) {

          //  ws.onopen = function () {
          //  alert("SNED")
          var Para_post = "{\"module\":\"chat\",\"type\":\"loadagain\",\"value\":\"" + idgroup + "\"}";
          ws.send(Para_post);

          //  }
      }
    </script>
  </div>

      <script>
                // Lấy đối tượng Canvas
                var canvas = document.getElementById('myCanvas');

                // Chọn đối tượng vẽ 2D
                var context = canvas.getContext('2d');

                // Tiến hành vẽ
                context.beginPath();        // Khai báo vẽ đường thẳng mới
                context.moveTo(0, 10);     // Điểm bắt đầu
                context.lineTo(1000, 10);   // Điểm kết thúc
                context.lineWidth = 1;     // rộng 15px
                context.strokeStyle = 'blue';// Màu xanh
                context.stroke();           // Tiến hành vẽ
            </script>

      <script>
          var m = document.querySelector("main"),
        h = document.querySelector("#header"),
        hHeight;

    function setTopPadding() {
      hHeight = h.offsetHeight;
      m.style.paddingTop = hHeight + "px";
    }
    window.onresize = function() {
      setTopPadding();
    };
      </script>

        <!-- /#wrapper -->

        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->

        <!-- Metis Menu Plugin JavaScript -->
        <div class="modal fade" id="modal-suamatkhau">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">Đổi mật khẩu</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="POST" id="form-suamatkhau" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                         <div class="form-group">
                        <label class="control-label">Mật khẩu cũ</label>
                        <input type="password"   name="matkhaucu" class="form-control">
                        <p style="color:red;display:none;" class="error"></p>
                        <span class="error-form"></span>
                        </div>
                        </div>
                        <div class="col-sm-12">
                         <div class="form-group">
                        <label class="control-label">Mật khẩu mới</label>
                        <input type="password"  name="matkhaumoi" class="form-control">
                        <span class="error-form"></span>
                        </div>
                        </div>
                        <div class="col-sm-12">
                         <div class="form-group">
                        <label class="control-label">Xác nhận mật khẩu</label>
                        <input type="password"  name="xacnhan" class="form-control">
                        <span class="error-form"></span>
                        </div>
                        </div>
                        <input type="hidden" name="id" >

                        <button type="submit" class="btn btn-primary js-btn-suamatkhau">Đổi mật khẩu </button>
                    </form>
                </div>
            </div>
        </div>




        <script src="admin_aset/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="admin_aset/dist/js/sb-admin-2.js"></script>
        <!-- DataTables JavaScript -->
        <script src="admin_aset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script src="admin_aset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
       <script language="javascript" type="text/javascript"> </script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->

        



         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

     <script src="js/jquery-ui-11.js"></script>
      <script src="js/jquery.ui.trong.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/tasks.js')}}"></script>
   <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
   <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>





      @yield('script')
    </body>

    </html>
