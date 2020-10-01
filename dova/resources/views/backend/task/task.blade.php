@extends('layout.index')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="menu-option-top1 panel b-a m-b-sm">
      <div class="row m-n">
        <div id="menutop_danhsach" class="item-menu col-md-2 b-r m-t-xs m-b-xs">
          <a href="/?mod=nhansu!danhsach" class="block hover">
            <span class="i-s i-s-1-5x pull-left m-r-xs">
              <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
              <i class="fa fa-list text-white i-sm"></i>
            </span>
            <span class="clear">
              <span class="h5 block m-t-xs text-success">Danh sách</span>
              <small class="text-muted">Nhân sự</small>
            </span>
          </a>
        </div>

        <div id="menutop_thongke_doanhso" class="item-menu col-md-2 b-r m-t-xs m-b-xs">
          <a target="_bank" href="nhan-su/thong-ke">
            <span class="i-s i-s-1-5x pull-left m-r-xs">
              <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
              <i class="fa fa fa-bar-chart-o text-white i-sm"></i>
            </span>
            <span class="clear">
              <span class="h5 block m-t-xs text-success">Thống kê</span>
              <small class="text-muted">Nhân sự</small>
            </span>
          </a>
        </div>

        <div id="menutop_chamcong" class="item-menu col-md-2 b-r m-t-xs m-b-xs">
          <a target="_bank" href="nhan-su/cham-cong" class="block hover">
            <span class="i-s i-s-1-5x pull-left m-r-xs">
              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
              <i class="fa fa-check-circle text-white i-sm"></i>
            </span>
            <span class="clear">
              <span class="h5 block m-t-xs text-success">Chấm Công</span>
              <small class="text-muted">Điểm nhân sự</small>
            </span>
          </a>
        </div>
        <div class="item-menu col-md-2 b-r m-t-xs m-b-xs">
          <a href="" class="block hover" data-toggle="modal" data-target="#modal-themTask">
            <span class="i-s i-s-1-5x pull-left m-r-xs">
              <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
              <i class="fa fa-edit text-white i-sm"></i>
            </span>
            <span class="clear">
              <span class="h5 block m-t-xs text-success themTask">Thêm mới <br />
                Công việc</span>
            </span>
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="response">
    <div class="modal fade" id="modal-themTask" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Thêm mới title</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="" method="POST" id="form-themTask" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input type="text" name="title" id="title" class="form-control">
                  <span class="error-form"></span>
                </div>

              </div>
              @if ($errors->has('title'))
              <p style="color: red">{{ $errors->first('title') }}</p>
              @endif
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Color</label>
                  <select name="color" id="color" class="form-control" id="color">
                    <option value="">Choose</option>
                    <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                    <option style="color:#008000;" value="#008000">&#9724; Green</option>
                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                    <option style="color:#000;" value="#000">&#9724; Black</option>

                  </select>
                </div>

              </div>
              @if ($errors->has('color'))
              <p style="color: red">{{ $errors->first('color') }}</p>
              @endif

              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Content</label>

                  <textarea name="content" id="editor1"></textarea>


                  <span class="error-form"></span>
                  <input type="hidden" name="test" id="test">
                </div>




              </div>
              @if ($errors->has('content'))
              <p style="color: red">{{ $errors->first('content') }}</p>
              @endif



              <div class="clearfix" style="clear:both;height:30px;text-align:center">
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Start</label>
                  <input type="date" name="start" id="start" class="form-control">
                  <label class="control-label">Giờ bắt đầu</label>
                  <select name="time_start" id="time_start">
                    <option value="09">9</option>
                    <?php
                    $i = 1;
                    for ($i; $i <= 24; $i++) { ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>

                    <?php } ?>
                  </select>
                  <label for="">phút</label>
                  <select name="startdate_minute" id="startdate_minute">
                    <option value="00">00</option>
                    <?php
                    $j = 15;
                    for ($j; $j <= 60;) { ?>
                      <option value="<?php echo $j ?>"><?php echo $j ?></option>
                      <?php $j = $j + 15; ?>
                    <?php } ?>
                  </select>
                </div>

              </div>

              @if ($errors->has('start'))
              <p style="color: red">{{ $errors->first('start') }}</p>
              @endif
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">End</label>
                  <input type="date" name="end" id="end" class="form-control">
                  <label class="control-label">Giờ kết thúc</label>
                  <select name="time_end" id="time_end">
                    <option value="09">9</option>
                    <?php
                    $i = 1;
                    for ($i; $i <= 24; $i++) { ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>

                    <?php } ?>
                  </select>
                  <label for="">phút</label>
                  <select name="enddate_minute" id="enddate_minute">
                    <option value="00">00</option>
                    <?php
                    $j = 0;
                    for ($j; $j <= 45;) { ?>
                      <option value="<?php echo $j ?>"> <?php echo $j ?> </option>
                      <?php $j = $j + 15; ?>

                    <?php } ?>
                  </select>
                </div>

              </div>
              @if ($errors->has('end'))
              <p style="color: red">{{ $errors->first('end') }}</p>
              @endif

              @if ($errors->has('time_end'))
              <p style="color: red">{{ $errors->first('tiem_end') }}</p>
              @endif
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Status</label>
                  <select class="custom-select" id="inputGroupSelect01" name="status">
                    <option value="0">ẩn </option>
                    <option value="1">hiển thị</option>
                  </select>
                  <span class="error-form"></span>
                </div>

              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="response">
    <div class="modal fade" id="modal-suaTask" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Sua title</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{\Illuminate\Support\Facades\URL::to('/task')}}" method="POST" id="form-suaTask" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input type="text" name="title" id="title" class="form-control">
                  <span class="error-form"></span>
                </div>

              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <select name="color" id="color" class="form-control" id="color">
                    <option value="">Choose</option>
                    <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                    <option style="color:#008000;" value="#008000">&#9724; Green</option>
                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                    <option style="color:#000;" value="#000">&#9724; Black</option>

                  </select>
                </div>

              </div>
              @if ($errors->has('color'))
              <p style="color: red">{{ $errors->first('color') }}</p>
              @endif

              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Content</label>

                  <textarea name="content" id="editor2"></textarea>


                  <span class="error-form"></span>
                  <input type="hidden" name="test1" id="test1">
                  <input type="hidden" name="id" id="id">
                </div>



              </div>

              @if ($errors->has('content'))
              <p style="color: red">{{ $errors->first('content') }}</p>
              @endif



              <div class="clearfix" style="clear:both;height:30px;text-align:center">
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Start</label>
                  <input type="date" name="start" id="start" class="form-control">
                  <label class="control-label">giờ bắt đầu</label>

                  <select name="time_start" id="time_start">
                    <option value="09">9</option>
                    <?php
                    $i = 1;
                    for ($i; $i <= 24; $i++) { ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>

                    <?php } ?>
                  </select>
                  <label for="">phút</label>
                  <select name="startdate_minute" id="startdate_minute">
                    <option value="00">00</option>
                    <?php
                    $j = 0;
                    for ($j; $j <= 45;) { ?>
                      <option value="<?php echo $j ?>"> <?php echo $j ?> </option>
                      <?php $j = $j + 15; ?>

                    <?php } ?>
                  </select>
                  <span class="error-form"></span>
                </div>

              </div>


              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">End</label>
                  <input type="date" name="end" id="end" class="form-control">
                  <label class="control-label">giờ kết thúc</label>

                  <select name="time_end" id="time_end">
                    <option value="09">9</option>
                    <?php
                    $i = 1;
                    for ($i; $i <= 24; $i++) { ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>

                    <?php } ?>
                  </select>
                  <label for="">phút</label>
                  <select name="enddate_minute" id="enddate_minute">
                    <option value="00">00</option>
                    <?php
                    $j = 0;
                    for ($j; $j <= 45;) { ?>
                      <option value="<?php echo $j ?>"> <?php echo $j ?> </option>
                      <?php $j = $j + 15; ?>

                    <?php } ?>
                  </select>
                  <span class="error-form"></span>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<div id="calendar"></div>
</div>
</div>

@endsection
@section('calendar')

<link rel="stylesheet" href="FullCalendar/css/bootrap.min.css" />
<link rel="stylesheet" href="FullCalendar/css/fullCalendar.css" />
@endsection
@section('script')
<script>
  CKEDITOR.replace('editor1');
</script>
<script>
  CKEDITOR.replace('editor2');
</script>
<script src="FullCalendar/js/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {


    var SITEURL = "{{url('/')}}";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'month,basicWeek,basicDay',
        right: 'title'
      },
      eventLimit: true,
      editable: true,
      selectable: true,
      timeFormat: 'H:mm',

      events: [
        <?php foreach ($task as $event) :


          $time_start = explode(" ", $event['time_start']);
          $time_end = explode(" ", $event['time_end']);

          if ($time_start[0] == '00:00:00') {
            $time_start = $time_start[0];
          } else {
            $time_start = $event['time_start'];
          }
          if ($time_end[0] == '00:00:00') {
            $time_end = $time_end[0];
          } else {
            $time_end = $event['time_end'];
          }
        ?> {
            id: '<?php echo $event['id']; ?>',
            title: '<?php echo $event['title']; ?>',
            content: '<?php echo $event['content']; ?>',
            start: '<?php echo $event['start']; ?>',
            end: '<?php echo $event['end']; ?>',
            time_start: '<?php echo $time_start;  ?>',
            time_end: '<?php echo $time_end; ?>',
            color: '<?php echo $event['color']; ?>',
          },
        <?php endforeach; ?>

      ],
      // displayEventTime: true,
      // selectHelper: true,
      // timeFormat: 'H:mm',
      // eventRender: function(event, element, view) {
      //   if (event.allDay === 'true') {
      //     event.allDay = true;
      //   } else {
      //     event.allDay = false;
      //   }
      // },
      // selectable: true,
      // selectHelper: true,

      eventRender: function(event, element) {
        $time_start = event.start._i.split(" ");
        $house_start = $time_start[1].split(":");

        $time_end = event.end._i.split(" ");
        $house_end = $time_start[1].split(":");


        element.bind('dblclick', function() {
          $('#modal-suaTask #id').val(event.id);
          $('#modal-suaTask #title').val(event.title);
          $('#modal-suaTask #editor2').val(event.content);
          $('#modal-suaTask #start').val($time_start[0]);
          $('#modal-suaTask #time_start').val($house_start[0]);
          $('#modal-suaTask #startdate_minute').val($house_start[1]);
          $('#modal-suaTask #end').val($time_end[0]);
          $('#modal-suaTask #time_end').val($house_end[0]);
          $('#modal-suaTask #enddate_minute').val($house_end[1]);
          $('#modal-suaTask #color').val(event.color);
          CKEDITOR.instances.editor2.setData(event.content)
          $('#modal-suaTask').modal('show');
        });
      },

      // eventDrop: function(event, delta) {
      //   var time_start = $.fullCalendar.formatDate(event.time_start, "HH:mm:ss");
      //   var time_end = $.fullCalendar.formatDate(event.time_end, "HH:mm:ss");
      //   $.ajax({
      //     url: SITEURL + 'edit-task',
      //     data: {
      //       'title': event.title,
      //       'content': event.content,
      //       'start': event.start,
      //       'end': event.end,
      //       'time_start': time_start,
      //       'time_end': time_end,
      //       'color': event.color,
      //       'id': event.id
      //     },
      //     type: "POST",
      //     success: function(response) {
      //       displayMessage("Updated Successfully");
      //     }
      //   });
      // },





    });


  });

  function displayMessage(message) {
    $(".response").html("<div class='success'>" + message + "</div>");
    setInterval(function() {
      $(".success").fadeOut();
    }, 1000);
  }
</script>
<script>
  $(function() {
    $(".themTask").click(function(event) {
      event.preventDefault();
      $("#modal-themTask").modal("show");
    })
    let URL = "{{ route('ajax_post.themTask')}}"
    $('.js-btn-themTask').click(function(e) {

      e.preventDefault();
      let a = CKEDITOR.instances.editor1.getData();
      $("#test").attr('value', a);
      let $this = $(this);

      let $domForm = $this.closest('#form-themTask');
      $.ajax({
        url: URL,
        data: new FormData($("#modal-themTask form")[0]),
        contentType: false,
        processData: false,
        method: "POST",
      })

    });
  })
  $(function() {

    $('.js-btn-suaTask').click(function(e) {
      e.preventDefault();
      let a = CKEDITOR.instances.editor2.getData();
      $("#test1").attr('value', a);
      let $this = $(this);
      let $domForm = $this.closest('#form-suaTask');



    });
  })
  // $(function() {
  //       $(".suaTask").click(function(event) {
  //         event.preventDefault();
  //         $("#modal-suaTask").modal("show");
  //       })
  //       let URL = "{{ route('ajax_post.suaTask')}}"
  //       $('.js-btn-suaTask').click(function(e) {

  //         e.preventDefault();
  //         let a = CKEDITOR.instances.editor1.getData();
  //         $("#test").attr('value', a);
  //         let $this = $(this);

  //         let $domForm = $this.closest('#form-suaTask');


  //       });
  // function edittask(cn) {

  //   $.ajax({

  //     type: 'GET',
  //     url: 'task/update/' + cn,
  //     success: function(data) {
  //       $("#form-suaTask input[name=title]").val(data.cn.title);
  //       $("#form-suaTask input[name=content]").val(data.cn.content);
  //       $("#form-suaTask input[name=start]").val(data.cn.start);
  //       $("#form-suaTask input[name=end]").val(data.cn.end);
  //       $("#form-suaTask input[name=status]").val(data.cn.status);
  //       $("#form-suaTask input[name=color]").val(data.cn.color);



  //       $('#modal-suachinhanh').modal('show');
  //     },
  //     error: function(data) {
  //       console.log(data);
  //     }
  //   });
  // }
</script>
@endsection