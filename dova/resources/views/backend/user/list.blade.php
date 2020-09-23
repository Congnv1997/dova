@extends('layout.fontend_layout')
@section('contend')
                    
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
                <th>Email</th>
{{--            <th>Password</th>--}}
                <th>Name</th>
                <th>Phone</th>
                 <th>Avartar</th>
                <th>Quyền</th>
                <th>
                    <a href="{{\Illuminate\Support\Facades\URL::to('/addUser')}}" class="btn btn-sm btn-success">Thêm</a>
                </th>
                </thead>
                <tbody>
                @foreach($list as $M =>$Objrow)
                    <tr>
                        <td>{{$M+1}}</td>
                        <td>{{$Objrow->id}}</td>
                        <td>{{$Objrow->email}}</td>
{{--                        <td>{{$Objrow->password}}</td>--}}
                        <td>{{$Objrow->name_user}}</td>
                        <td>{{$Objrow->phone}}</td>
                        <td> <img width="50px;" height="50px" src="public\upload\user\{{$Objrow->avatar}}"></td>
                        <td>{{$Objrow->name}}</td>
                        <td>
                            <a href="{{\Illuminate\Support\Facades\URL::to('/editUser/'.$Objrow->id)}}" class="btn btn-sm btn-primary">Sửa</a> &nbsp;
                            <a onclick="return confirm('Are you sure to delete')" href="{{\Illuminate\Support\Facades\URL::to('/deleteUser/'.$Objrow->id)}}" class="btn btn-sm btn-danger btn-remove">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
