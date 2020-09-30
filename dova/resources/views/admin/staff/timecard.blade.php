@extends('layout.index')
@section('content')
   <style>
       .date {
           margin-top: 10px;
       }
       .date input {
           margin-left: 5px;
       }
   </style>
    <div class="container">
        <div class="row">
            <div class="row m-n">           
                <div id="menutop_danhsach" class="item-menu col-md-2 b-r m-t-xs m-b-xs  ">
                   <a  href="/?mod=nhansu!danhsach" class="block hover">
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
                   <a  target="_bank" href="nhan-su/thong-ke">
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
           <div class="col-md-12">
              <h1>Công ty TNHH DoVa Việt Nam</h1>
              <p><b>Địa chỉ: </b>Thanh Bình, Hà Đông, Hà Nội</p>
              <p><b>Email: </b>info@dova-vn.com</p>
              <p><b>Website: </b>www.dova-vn.com</p>
           </div>
             <div class="col-md-12">
                <table  class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên nhân viên</th>
                            <th class="text-center">Ngày</th>
                            <th class="text-center">Check in</th>
                            <th class="text-center">Check out</th>
                            <th class="text-center">Tổng thời gian(giờ)</th>
                            <th class="text-center">Ghi chú</th>
                            <th class="text-center">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="prf-contacts sttng"><h2>Bảng chấm công nhân sự công ty DoVa</h2></div>
                      @foreach ($staff_timecard as $tc)
                            <tr class="text-center">
                                <td>{{$tc->id}}</td>
                                <td>{{$tc->name}}</td>
                                <td>{{date('d-m-Y',strtotime($tc->day))}}</td>
                                <td>
                                   {{date('H:i',strtotime($tc->check_in))}}
                                </td>
                                <td>{{date('H:i',strtotime($tc->check_out))}}</td>
                                <td>
                                    <?php
                                    $check_in = strtotime($tc->check_in); //tính ra số giây được tính từ thời điểm 1970
                                    $check_out = strtotime($tc->check_out);
                                    $sum_date = abs($check_in - $check_out); //hàm abs để lấy giá trị tuyệt đối của hiệu 2 ngày đó
                                    echo floor($sum_date/(60*60));
                                   
                                    ?>
                                </td>
                                <td>
                                   {{$tc->note}}
                                </td>
                                <td>
                                    <button onclick="editnote({{$tc->id}})" href="#" class="btn btn-warning"  value="{{$tc->id}}">Ghi chú</button>
                                </td>   
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
                <div class="col-md-12 date">
                    <input type="button" class="btn btn-primary" value="Tháng 1">
                    <input type="button" class="btn btn-primary" value="Tháng 2">
                    <input type="button" class="btn btn-primary" value="Tháng 3">
                    <input type="button" class="btn btn-primary" value="Tháng 4">
                    <input type="button" class="btn btn-primary" value="Tháng 5">
                    <input type="button" class="btn btn-primary" value="Tháng 6">
                    <input type="button" class="btn btn-primary" value="Tháng 7">
                    <input type="button" class="btn btn-primary" value="Tháng 8">
                    <input type="button" class="btn btn-primary" value="Tháng 9">
                    <input type="button" class="btn btn-primary" value="Tháng 10">
                    <input type="button" class="btn btn-primary" value="Tháng 11">
                    <input type="button" class="btn btn-primary" value="Tháng 12">
                </div>
                {{--  {{$time_card->links()}}  --}}
            </div>
        </div>
    </div>
    <!-- The Modal -->
        <div class="modal fade" id="modal-editnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm ghi chú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-editnote" action="">
                    @method('post')
                    @csrf     
                    <div>
                        <input type="text" id="note" name="note">
                    </div>
                    <input id="idUpdate" type="text" value="" name="update">
                    <button type="submit" id="submit" value="submit" class="btn btn-danger">Lưu ghi chú</button>
                </form>         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </div>
 @endsection
 @section('script')
 <script>
    function editnote(tc_id) {
        $.ajax({
            type: 'GET',
            url: 'editnote/'+tc_id,
            success: function(data)
             {          
                //đưa dữ liệu controller gửi về điền vào input trong form edit.
                $("#form-editnote input[name=note]").val(data.tc_id.note);
                $("#form-editnote input[name=update]").val(data.tc_id.id);
                $('#modal-editnote').modal('show');
              
             },
             error: function (error) {
                 console.log(data);
             }
                
        });
        }  
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form-editnote').on('submit', function(e){
            e.preventDefault();
            var id = $('#idUpdate').val();
            alert(id);
            $.ajax({
                type: 'POST',
                url: 'editNote/edit/' + id,
                dataType: $('#form-editnote').serialize(),
                success: function (response) {
                    console.log(response);
                    alert("Data Updated");
                    location.reload();
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    
 </script>
 @endsection
