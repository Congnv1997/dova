@extends('layout.index')

@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12 col-md-12">          
                <div class="statistic"> 
                    <div class="row">                       
                        
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a href="{{ route('list_project') }}" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                    <i class="i i-calendar text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-success-lt">Tất cả dự án ({{count($project)}})</span>
                                    <small class="text-muted text-u-c">Danh sách tất cả dự án</small>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a href="#" class="block padder-v hover" data-toggle="modal" data-target="#modal-addproject">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                    <i class="fa fa-edit icon text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-success-lt">Thêm dự án</span>
                                    <small class="text-muted text-u-c">Thêm mới dự án vào danh sách</small>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a target="_bank" href="lop-hoc/diem-danh" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                    <i class="fa fa-check-circle text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-success-lt">Tìm kiếm</span>
                                    <small class="text-muted text-u-c">Tìm kiếm dự án</small>
                                </span>
                            </a>
                        </div>
                    
                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a href="{{ route('ongoing_project') }}" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                    <i class="i i-cube icon text-white"></i>
                                </span>
                                <span class="clear">
                                <span class="h3 block m-t-xs text-primary">Đang thực hiện ({{count($ongoing)}})</span>
                                    <small class="text-muted text-u-c">Danh sách dự án đang thực hiện </small>
                                </span>
                            </a>
                        </div>                    

                        <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a href="{{ route('complete_project') }}" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                    <i class="i i-cube icon text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-success-lt">Đã hoàn thành ({{count($complete)}})</span>
                                    <small class="text-muted text-u-c">Danh sách dự án đã hoàn thành </small>
                                </span>
                            </a>
                        </div>
                        

                            <div class="col-lg-4 col-md-6 m-t text-center btn-manager">
                            <a href="{{ route('idea_project') }}" class="block padder-v hover">
                                <span class="i-s i-s-2x">
                                    <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                                    <i class="i i-cube icon text-white"></i>
                                </span>
                                <span class="clear">
                                    <span class="h3 block m-t-xs text-warning">Ý tưởng ({{count($idea)}})</span>
                                    <small class="text-muted text-u-c">Danh sách dự án đang lên ý tưởng</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-addproject" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="model-content" style="background-color: #fff; border-radius: 10px">
                        <!-- Modal header -->
                        <div class="modal-header" style="display: flex; justify-content: space-between; margin: 0 20px; align-items: center">
                            <h2 class="model-title">Thêm mới dự án</h2>
                            <button type="button" class="close" data-dismiss="modal" style="width:20px; height: 20px;">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('create_project') }}" id="form-addproject" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Tên dự án</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="error-form"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content" class="control-label">Mô tả dự án</label><br>
                                        <textarea name="content" style="width:100%"></textarea>
                                        <span class="error-form"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time_start" class="control-label">Thời gian bắt đầu</label>
                                        <input type="date" class="form-control" name="time_start">
                                        <span class="error-form"></span>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deadline" class="control-label">Dự kiến kết thúc</label>
                                        <input type="date" class="form-control" name="deadline">
                                        <span class="error-form"></span>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" class="control-label">Trạng thái</label>
                                        <select name="status" class="form-control">
                                            <option value=0>Ý tưởng</option>
                                            <option value=1>Chưa hoàn thành</option>
                                            <option value=2>Đã hoàn thành</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate" class="control-label">Đánh giá</label>
                                        <select name="rate" class="form-control">
                                            <option value=0>Fail</option>
                                            <option value=1>Not Fail</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="branch" class="control-label">Chi nhánh:</label>
                                        <select name="branch" class="form-control">
                                            @foreach($branch as $br_id)
                                                <option value="{{$br_id -> id}}">{{ $br_id -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix" style="clear:both;height:30px;text-align:center"> 
                                <button class="btn btn-primary" type="submit">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
       </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $(".addproject").click(function (event) {
                event.preventDefault();
                $("#modal-addproject").modal('show');
            })
        })

        $(function () {
            $(".editproject").click(function (event) {
                event.preventDefault();
                $("#modal-editproject").modal('show');
            })
        })
    </script>
@endsection