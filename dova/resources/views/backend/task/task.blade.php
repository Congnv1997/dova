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

        <div
          id="menutop_thongke_doanhso"
          class="item-menu col-md-2 b-r m-t-xs m-b-xs"
        >
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
      <a
        href=""
        class="block hover"
        data-toggle="modal"
        data-target="#modal-themTask"
      >
        <span class="i-s i-s-1-5x pull-left m-r-xs">
          <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
          <i class="fa fa-edit text-white i-sm"></i>
        </span>
        <span class="clear">
          <span class="h5 block m-t-xs text-success themTask"
            >Thêm mới <br />
            Công việc</span
          >
        </span>
      </a>
    </div>
    <?php
        $message = Session::get('message');
        if ($message){
            echo'<span class="text-alert">',$message,'</span>' ;
            Session::put('message',null);
        }

        ?>
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
          <form
            action="{{\Illuminate\Support\Facades\URL::to('task/create')}}"
            method="POST"
            id="form-themTask"
            enctype="multipart/form-data"
          >
          {{csrf_field()}}
          <div class="col-sm-12"> 
                  	<div class="form-group">
                  		<label class="control-label">Title</label>
                  		<input type="text" name="name"  class="form-control">
                  		<span class="error-form"></span>
                    </div> 
                    
                  </div>
                  
                  <div class="col-sm-12"> 
                  	<div class="form-group">
                  	<label class="control-label">Content</label>

                      <textarea  name="content" id="editor1"></textarea>


                  	<span class="error-form"></span>
                  
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
                  		<input type="date" name="start"  class="form-control">
                  		<span class="error-form"></span>
                    </div> 
                    
                  </div>
                  @if ($errors->has('start'))
                    <p style="color: red">{{ $errors->first('start') }}</p>
                @endif
                  <div class="col-sm-12"> 
                  	<div class="form-group">
                  		<label class="control-label">End</label>
                  		<input type="date" name="end"  class="form-control">
                  		<span class="error-form"></span>
                    </div> 
                    
                  </div>
                  @if ($errors->has('end'))
                    <p style="color: red">{{ $errors->first('end') }}</p>
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
                  <div class="col-sm-12"> 
                  	<div class="form-group">
                    <select name="color" class="form-control" id="color">
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
                  		<label class="control-label">user_id</label>
                  		<input type="text" name="user_id"  class="form-control">
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

@endsection
@section('calendar')
<link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
/>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"
/>
@endsection
 @section('script')
 <script> CKEDITOR.replace('editor1'); </script>
 <script> CKEDITOR.replace('editor2'); </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
  integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ="
  crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script>
  $(document).ready(function () {

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
            events: [
                <?php foreach($task as $event):

            $start = explode(" ", $event['start']);
            $end = explode(" ", $event['end']);
            if($start[1] == '00:00:00'){
                $start = $start[0];
            }else{
                $start = $event['start'];
            }
            if($end[1] == '00:00:00'){
                $end = $end[0];
            }else{
                $end = $event['end'];
            }
        ?>
            {
                id: '<?php echo $event['id']; ?>',
                title: '<?php echo $event['title']; ?>',
                content:'<?php echo $event['content']; ?>',
                start: '<?php echo $start; ?>',
                end: '<?php echo $end; ?>',
                color: '<?php echo $event['color']; ?>',
            },
        <?php endforeach; ?>

            ],
            displayEventTime: true,
            selectHelper: true,
            timeFormat: 'H:mm',
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,

        
        

        });
    });

   
</script>
<script>
  $(function () {
    $(".themTask").click(function (event) {
      event.preventDefault();
      $("#modal-themTask").modal("show");
    })
    let URL = '{{ route('ajax_post.themTask') }}'
        $('.js-btn-themTask').click(function (e) {

			e.preventDefault();
     let a=CKEDITOR.instances.editor1.getData();
     $("#test").attr('value',a);
			let $this = $(this);

     let $domForm = $this.closest('#form-themTask');
    
    });
 
</script>
@endsection
