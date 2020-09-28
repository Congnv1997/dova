@extends('layout.index')

@section('content')
    <section>
    <style>
            
            .project-item {
                position: relative;
                width: 284px;
                height: 370px;
                padding: 0;
            }
            

            /* .project-edit-btn{
                border-right: 1px solid #ccc;
                width: 142px;
                display: flex;
                justify-content: center;
                height: 32px;
                text-align: center;
                border-bottom-left-radius: 35px;
                outline: none;
                border: 1px solid #0262A6;
                background-color: #fff;
            }

            .project-edit-btn:hover{
                color: #fff;
                background-color: #b3e6ff;
            }

            .project-del-btn{
                border-left: 1px solid #ccc;
                width: 142px;
                display: flex;
                justify-content: center;
                height: 32px;
                text-align: center;
                border-bottom-right-radius: 35px;
                outline: none;
                border: 1px solid #0262A6;
                background-color: #fff;
            }

            .project-del-btn:hover{
                color: #fff;
                background-color: #ffb3b3;
                
            }

            .project-action-link {
                margin: 4px 0;
            }

            .project-action-icon {
                margin-right: 4px;
            } */
            
            /* project item css */
            
            .project-main-content{
                margin:0;
                color: #fff;
                width: inherit;
                background-color: #0262A6;
                border-radius: 35px;
                padding:15px;
                position: absolute;
                bottom: 0;
                z-index: 4;
                height: 230px;
            }
            
            /* .project-action {
                width: 284px;
                display: flex;
                justify-content: space-between;
                cursor: pointer;
                position:relative;
                left: 0;
                bottom: -91%;
                z-index: 10;
            } */

            .project-deadline {
                background-color: #24B8EC;
                position: absolute;
                width: inherit;
                height: 270px;
                bottom: 0%;
                color: #fff;
                border-radius: 35px;
                padding: 10px 15px;
                z-index: 3;

            }
            .project-time-start {
                background-color: #0262A6;
                position: absolute;
                width: inherit;
                height: 310px;
                bottom: 0%;
                color: #fff;
                border-radius: 35px;
                padding: 10px 15px;
                z-index: 2;x
            }

            .project-name {
                width: inherit;
                height: 370px;
                background-color:#fff;
                border-radius: 35px;
                bottom: 0%;
                position: absolute;
                text-align: center;
                color: #0262A6;
                position: absolute;
                z-index: 1;
                border: 1px solid #0262A6;
                text-transform: uppercase;
                display: flex;
                justify-content: space-around;
            }
            /* .project-title{
                margin-left: 70px;
            } */
            .project-status {
                margin: 10px 10px 0 30px;
            }
            
            .btn-details {
                width: 254px;
                height:40px;
                background-color: #24B8EC;
                border:none;
                border-radius: 35px;
                outline: none;
            }

            .btn-details:active{
                background-color: #eaeaea;
                color: #0262A6;
            }
            .project-button-details{
                position: absolute;
                bottom: 5%;
            }

        </style>
        <!-- test -->
        <div class="row">
        <div class="col-sm-12">
            <div class="menu-option-top1 panel b-a m-b-sm">
                <div class="row m-n">
                     <div  class="item-menu col-md-2 b-r m-t-xs m-b-xs ">
                        <a href="{{ route('ongoing_project') }}" class="block hover">
                            <span class="i-s i-s-1-5x pull-left m-r-xs">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="i i-cube icon text-white i-sm"></i>
                            </span>
                            <span class="clear">
                                <span class="h5 block m-t-xs text-success-lt">Dự án <br> đang thực hiện  </span>
                                
                            </span>
                        </a>
                    </div> 
                    <div class="item-menu col-md-2 b-r m-t-xs m-b-xs">
                        <a href="{{ route('complete_project') }}" class="block hover">
                            <span class="i-s i-s-1-5x pull-left m-r-xs">
                                <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                <i class="i i-cube icon text-white i-sm"></i>
                            </span>
                            <span class="clear">
                                <span class="h5 block m-t-xs text-primary">Dự án <br> đã hoàn thành </span>
                                
                            </span>
                        </a>
                    </div>
                    <div class="item-menu col-md-2 b-r m-t-xs m-b-xs">
                        <a href="{{ route('idea_project') }}" class="block hover">
                            <span class="i-s i-s-1-5x pull-left m-r-xs">
                                <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                                <i class="i i-cube icon text-white i-sm"></i>
                            </span>
                            <span class="clear">
                                <span class="h5 block m-t-xs text-danger">Ý tưởng <br> dự án</span>
                                
                            </span>
                        </a>
                    </div>
             
                    <div id="menutop_diemdanh" class="item-menu col-md-2 b-r m-t-xs m-b-xs">
                        <a target="_bank" href="lop-hoc/diem-danh" class="block hover">
                            <span class="i-s i-s-1-5x pull-left m-r-xs">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="fa fa-check-circle text-white i-sm"></i>
                            </span>
                            <span class="clear">
                                <span class="h5 block m-t-xs text-success">Điểm danh <br> theo lớp </span>
                               
                            </span>
                        </a>
                    </div> 
                        <div class="item-menu col-md-2 b-r m-t-xs m-b-xs">
                        <a href="" class="block hover" data-toggle="modal" data-target="#modal-addproject">
                            <span class="i-s i-s-1-5x pull-left m-r-xs">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="fa fa-edit text-white i-sm"></i>
                            </span>
                            <span class="clear">
                                <span class="h5 block m-t-xs text-success">Thêm mới <br> dự án</span>
                            </span>
                        </a>
                    </div> 
                     <div id="menutop_tkb_statics" class="item-menu col-md-2 b-r m-t-xs m-b-xs">
                        <a href="lop-hoc/thoi-khoa-bieu" class="block hover">
                            <span class="i-s i-s-1-5x pull-left m-r-xs">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="i i-calendar text-white text-white i-sm"></i>
                            </span>
                            <span class="clear">
                                <span class="h5 block m-t-xs text-success-lt">Thời khóa biểu</span>

                             </span>
                        </a>
                    </div> 
                   
                </div>
            </div>
        </div>
    </div>
        <!-- end test -->
        <div class="project-list">
            
            <div class="project-page-title">
                <h1 style="color:#3578E5; font-weight:700;text-align: center">DỰ ÁN ĐÃ HOÀN THÀNH</h1>
            </div>
            <div style="position: relative" class="container">
                @foreach($complete as $com)
                <div class="project-item col-sm-3" style="background-color: #fff;border: none;border-radius: 35px;margin: 18px; position: flex; justify-content: space-between">
                    <div class="project-name">
                        <h4>{{ $com -> name }}</h4>
                    </div>
                    <div class="project-time-start">
                        <p>Bắt đầu: {{ $com -> time_start }}</p>
                    </div>                        
                    <div class="project-deadline">
                         <p>Dự kiến kết thúc: {{ $com -> deadline }}</p>  
                    </div>    
                    <div class="project-main-content">  
                        <p>Nội dung dự án: <br> {{ $com -> content }}</p>
                        <div class="project-button-details">
                            <button class="btn-details">Xem chi tiết</button>
                        </div>
                    </div>
                    <!-- <div class="project-action">
                        <button onclick="event.preventDefault();" data-toggle="modal" data-target="#modal-editproject" type="button" class="project-edit-btn">
                            <span class="project-action-link" style="color: blue"><i class="project-action-icon fa fa-pencil"></i>Edit</span>
                        </button>
                        <button class="project-del-btn">
                            <span type="button" class="project-action-link" style="color: red"><i class="project-action-icon fa fa-times "></i>Delete</span>
                        </button>
                    </div> -->
                </div>
                @endforeach
                
            </div>
            
            <!-- add new project -->
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
                            <form action="{{ route('complete_project') }}" id="form-addproject" method="POST" enctype="multipart/form-data">
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
                                            <option value=0>Đang tiến hành</option>
                                            <option value=1>Hoàn thành</option>
                                            <option value=2>Không hoàn thành</option>
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