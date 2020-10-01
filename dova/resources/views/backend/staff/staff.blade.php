@extends('layout.index')
@section('content')
<section id="content">
    <section class="hbox stretch">

        <section class="section-layout-2">

            <section class="vbox">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="menu-option-top1 panel b-a m-b-sm">
                            <div class="row m-n">

                                <div id="menutop_danhsach" class="item-menu col-md-2 b-r m-t-xs m-b-xs  ">
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

                                <div id="menutop_thongke_doanhso" class="item-menu col-md-2 b-r m-t-xs m-b-xs  ">
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

                            </div>
                        </div>
                    </div>
                </div>


                <span id="ctl10_menu_top_script_menutop">
                    <script>
                        document.getElementById("menutop_danhsach").classList.add('item-active');
                    </script>
                </span>
                <section class="scrollable wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <section class="panel panel-default">
                                <div class="panel-heading">
                                    <p class="inline m-b-xs m-t-xs font-bold">

                                        TÌM KIẾM NHÂN SỰ
                                    </p>
                                    <div class="pull-right">
                                        <a href="" class="block hover" data-toggle="modal" data-target="#modal-themnhansu">

                                            <span style="cursor: pointer;" class="btn btn-success btn-sm themnhansu" title="Thêm một nhân sự"><i class="i i-plus2"></i> Thêm nhân sự</span>
                                        </a>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                                <div class="row wrapper">
                                    <form method="post" id="form-timnhansu">
                                        {{csrf_field()}}
                                        <div class="col-sm-4">
                                            <div class="">
                                                <input name="name" type="text" id="searchtxt" class="form-control" placeholder="Họ tên" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <select name="vitri_tim" id="vitri_tim" class="form-control">
                                                    <option value="0">Tất cả</option>
                                                    <option value="1">Gi&#225;o vi&#234;n</option>
                                                    <option value="2">Tư vấn</option>
                                                    <option value="3">Kế to&#225;n</option>
                                                    <option value="4">Quản l&#253;</option>
                                                    <option value="5">Kh&#225;c</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <select name="chinhanh_tim" id="chinhanh_tim" class="form-control">
                                                    <option value="0">Tất cả</option>


                                                </select>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="table-responsive listing">

                                    <table class="table table-striped b-t b-light" id="table-nhansu">
                                        <thead>
                                            <tr>
                                                <th class="th-sortable text-center" data-toggle="class">Hình đại diện
                                                </th>
                                                <th class="th-sortable text-center" data-toggle="class">Tên nhân sự
                                                </th>
                                                <th class="text-center">Số điện thoại
                                                </th>
                                                <th class="text-center">Địa chỉ
                                                </th>
                                                <th class="text-center">email
                                                </th>
                                                <th class="text-center">chi nhánh</th>
                                                <th class="text-center">giới tính</th>
                                                <th class="text-center">Vị trí</th>
                                                <th class="text-center">chức năng</th>

                                            </tr>
                                        </thead>
                                        <tbody id="nhansu">
                                            @if($nhansu)
                                            @foreach($nhansu as $ns)
                                            <tr>
                                                <td class="text-center"><img src="{{url('')}}/public/upload/{{$ns->image}}" alt="" width="80px"></td>
                                                <td class="text-center">{{$ns->name}}</td>
                                                <td class="text-center">{{$ns->phone_number}}</td>
                                                <td class="text-center">{{$ns->address}}</td>
                                                <td class="text-center">{{$ns->email}}</td>
                                                <td class="text-center">{{$ns->branch}}</td>
                                                <td class="text-center">{{$ns->gender}}</td>
                                                <td class="text-center">
                                                    @if($ns->vitri==1)
                                                    giáo viên
                                                    @elseif($ns->vitri==2)
                                                    Tư vấn
                                                    @elseif($ns->vitri==3)
                                                    Kế toán
                                                    @elseif($ns->vitri==4)
                                                    Quản lý
                                                    @else
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a onclick="" href="#" class="btn btn-primary btn-sm m-r-xs"><i class="fa fa-pencil"></i> Sửa</a>
                                                    <a href="" class="btn btn-danger btn-sm js-xoanhansu"><i class="fa fa-times "></i> Xóa</a>
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>


                                </div>
                            </section>
                        </div>
                    </div>
                </section>


            </section>

            <!-- modal thêm nhân sư -->
            <div class="modal fade" id="modal-themnhansu">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h2 class="modal-title">Thêm mới nhân sự</h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="POST" id="form-themnhansu" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div id="ctl10_formContain" class="col-md-12">
                                    <div class="clear_both"></div>
                                    <div class="prf-contacts sttng">
                                        <h2> Thông tin cá nhân</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Ảnh đại diện </label>
                                            <input type="file" name="img" id="post_zNhan_suhinhanh" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Họ Tên </label>
                                            <input type="text" name="name" class="form-control">
                                            <span class="error-form"></span>
                                        </div>

                                    </div>

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Địa chỉ </label>
                                                    <input type="text" value="" id="zNhan_sudiachi" name="address" class="form-control">
                                                    <span class="error-form"></span> </div>
                                            </div>
                                            <div class=" col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label">Ngày sinh </label>

                                                    <input type="text" id="datepicker" name="ngaysinh" class="form-control" />
                                                </div>
                                            </div>
                                            <div class=" col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label">Giới tính </label> <br>
                                                    <label class="checkbox-inline radio i-checks">
                                                        <input value="0" name="sex" id="zNhan_sugioitinh0" type="radio" checked="checked"><i></i>Nam</label>
                                                    <span style="margin-top: 10px;padding-left:5px;">
                                                        <label class="checkbox-inline radio i-checks">
                                                            <input value="1" name="sex" id="zNhan_sugioitinh1" type="radio"><i></i>Nữ</label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Điện thoại </label>
                                                    <input type="text" value="" id="zNhan_sudienthoai" name="phone_number" class="form-control">
                                                    <span class="error-form"></span></div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="form-group"><label class="control-label">Facebook </label>
                                                    <input type="text" value="" id="zNhan_sufacebook" name="facebook" class="form-control"> </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="form-group"><label class="control-label">Email </label>
                                                    <input type="text" value="" id="zNhan_suemail" name="email" class="form-control">
                                                    <span class="error-form"></span></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <label class="control-label">Chọn chi nhánh</label>
                                                    <select name="branch" class="form-control" id="chuongtrinh">

                                                    </select>
                                                    <span class="error-form"></span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="clear_both"></div>
                                    <div class="prf-contacts sttng">
                                        <h2> Thông tin đào tạo</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Trình độ </label>
                                            <select name="academic_level" id="zNhan_sutrinhdo" class="form-control">
                                                <option value="Đại học">Đại học</option>
                                                <option value="Cao đẳng">Cao đẳng</option>
                                                <option value="Trung cấp">Trung cấp</option>
                                                <option value="Khác">Khác</option>
                                            </select> </div>
                                    </div>
                                    <div class=" col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Nghiệp vụ </label> <br>
                                            <label class="checkbox-inline radio i-checks">
                                                <input value="Có" name="position" id="zNhan_sunghiepvu0" type="radio" checked="checked"> <i></i>Có </label>
                                            <span style="margin-top: 10px;padding-left:5px;">
                                                <label class="checkbox-inline radio i-checks">
                                                    <input value="Không " name="position" id="zNhan_sunghiepvu1" type="radio"> <i></i>Không </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Vị trí công việc </label>
                                            <select name="vitri" id="zNhan_suvitri" class="form-control">

                                                <option value="1">Giáo viên</option>
                                                <option value="2">Tư vấn</option>
                                                <option value="3">Kế toán</option>
                                                <option value="4">Quản lý</option>
                                                <option value="5">Khác</option>
                                            </select> </div>
                                    </div>
                                    <div class=" col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Ghi chú </label><input type="text" value="" id="zNhan_sughichu" name="ghichu" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="clearfix" style="clear:both;text-align:center">

                                </div>
                                <div class="clearfix" style="clear:both;height:30px;text-align:center">
                                </div>

                                <button type="submit" class="btn btn-primary js-btn-themnhansu">Thêm mới </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @section('script')
            <script type="text/javascript">
                $(document).ready(
                    function() {
                        $("#datepicker").datepicker({
                            dateFormat: 'dd-mm-yy',
                            changeMonth: true, //Tùy chọn này cho phép người dùng chọn tháng
                            changeYear: true //Tùy chọn này cho phép người dùng lựa chọn từ phạm vi năm
                        });
                    }
                );
                $(document).ready(
                    function() {
                        $("#datepicker1").datepicker({
                            dateFormat: 'dd-mm-yy',
                            changeMonth: true, //Tùy chọn này cho phép người dùng chọn tháng
                            changeYear: true //Tùy chọn này cho phép người dùng lựa chọn từ phạm vi năm
                        });
                    }
                );

                // thêm nhân sư
                $(function() {

                    $(".themnhansu").click(function(event) {
                        event.preventDefault();
                        $("#modal-themnhansu").modal('show');
                    })
                    let URL = "{{ route('ajax_post.themStaff')}}"
                    $('.js-btn-themnhansu').click(function(e) {

                        e.preventDefault();

                        let $this = $(this);

                        let $domForm = $this.closest('#form-themnhansu');


                        $.ajax({
                            url: URL,
                            data: new FormData($("#modal-themnhansu form")[0]),
                            contentType: false,
                            processData: false,
                            method: "POST",
                        }).done(function(data) {
                            $("#modal-themnhansu").modal('hide');
                            $("#form-themnhansu")[0].reset();
                            $('#nhansu').html(data);
                            toastr.success('', 'Thêm mới thành công');
                        }).fail(function(data) {
                            var errors = data.responseJSON;
                            $.each(errors.errors, function(i, val) {
                                $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
                            });
                        });
                    });
                })

                // xóa nhân sự

                $(function() {
                    $('body').on("click", '.js-xoanhansu', function(event) {
                        event.preventDefault();
                        let URL = $(this).attr('href');

                        let $this = $(this);
                        $.ajax({
                            url: URL,

                        }).done(function(results) {
                            if (results.code == 200) {
                                $this.parents("tr").remove();
                                toastr.success('', 'Xóa thành công');
                            }
                        }).fail(function(data) {

                        });

                    })
                })





                // tìm kiếm nhân sự
            </script>

            @endsection