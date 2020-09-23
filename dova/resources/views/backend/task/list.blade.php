@extends('layout.index')
@section('content')
    <h2 style="margin-left: 50px;">Task</h2>
    <div class="card">
        <!-- /.card-header -->
        <?php
        $message = Session::get('message');
        if ($message){
            echo'<span class="text-alert">',$message,'</span>' ;
            Session::put('message',null);
        }

        ?>


        <div class="card-body">
            <table class="table table-bordered table-hover" id="table">
                <thead>
                <th>STT</th>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Màu</th>
                <th>
                    <a href="" class="btn btn-sm btn-success">Thêm</a>
                </th>
                </thead>
                <tbody>
                @foreach($list as $M =>$Objrow)
                    <tr>
                        <td>{{$M+1}}</td>
                        <td>{{$Objrow->id}}</td>
                        <td>{{$Objrow->title}}</td>
                        <td>{{$Objrow->content}}</td>
                        <td>{{$Objrow->time_start}}</td>
                        <td>{{$Objrow->time_end}}</td>
                        <td>{{$Objrow->status}}</td>
                        <td>{{$Objrow->color}}</td>
                        <td><span class="text-elly">
                     

                      </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


















@endsection
