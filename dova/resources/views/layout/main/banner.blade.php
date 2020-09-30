<main>
    <div class=" col-md-10 top">
    <div class="left">
   <div class="vlt-left">
    <div class="vlt-header">
        <div class="banner">
            <img src="{{url("images/logo-dova.png")}}" alt="">
            <div class="vlt-anh">
                <div class="vlt-avatar load-anh" >
                @if (Auth::check())
                                <img src="{{\Illuminate\Support\Facades\URL::to('public/upload/'.Auth::user()->logo)}}" alt="">
                            @else
                            @endif
                </div>

            </div>
        </div>
        <div class="vlt-name">
        <div class="name load-name">
        @if (Auth::check())
                                <h3>{{Auth::user()->name}}</h3>
                            @else
                            @endif
        </div>

        </div>
        <div class="vlt-canvas">
            <canvas id="myCanvas"></canvas>
        </div>

    </div>

   </div>
</div>
</div>
<!-- right    -->
 {{--  <div class="vlt-right col-md-2" >
    <section class="panel panel-primary vlt-menuleft ">
                <div class="vlt-bodyheader">
                    <strong>THÔNG TIN CHƯƠNG TRÌNH</strong>
                </div>
                <div class="panel-body panel-body-full vlt-scrollin4">
                    <div id="ctl21_list_chuongtrinh" class="list-group no-radius">    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse"> Ali Kids 1 (10 - 14 tuổi) </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse"> Ali Teen 1 (12-18tuổi)</a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Ali Adult 3 ( Ca6: 2,4,6)</a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Ali Kids lớn 1(10-14 tuổi) </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Ali Kindy 1</a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Ali Kindy 2 </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Ali Teens Tân Dân </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Chương trình 50% GVNN  </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Học Sinh Giỏi Tiếng Anh cấp 2 </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Học Tiếng Anh: 100% GVNN </a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Khóa 1 Tiếng Anh Người Lớn</a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Tiếng Anh cấp 2 nhóm cô Minh</a>    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalCourse">Tiếng Anh Mầm Non</a></div>
                </div>

                    <!-- thống kê cá nhân -->

                <div class="vlt-bodyheader">
                    <strong>Thống kê cá nhân</strong>
                    </div>


                <div class="panel-body panel-body-full">
                    <div class="list-group no-radius alt">


                        <a class="list-group-item no-b-t" href="#" data-toggle="modal" data-target="#modalAnalyticSmall">
                            <strong id="ctl21_doanhthuhocphi" class="badge">0</strong>
                            <i class="fa fa-money icon-muted"></i>
                            Doanh thu học phí
                        </a>
                        <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalAnalyticSmall">
                            <strong id="ctl21_uudai" class="badge">0</strong>
                            <i class="fa fa-credit-card icon-muted"></i>
                            Ưu Đãi
                        </a>
                        <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalAnalyticSmall">
                            <strong id="ctl21_thucthu" class="badge">0</strong>
                            <i class="fa fa-credit-card icon-muted"></i>
                            Thật thu
                        </a>
                        <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalAnalyticSmall">
                            <strong id="ctl21_thuchi" class="badge">0</strong>
                            <i class="fa fa-money icon-muted"></i>
                            Thu khác
                        </a>
                    </div>
                </div>
                <!-- nhân viên đnag online -->
            </section>
            <!-- /.panel -->
</div>    --}}
<!-- right -->
</main>
