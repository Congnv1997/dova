@extends('layout.fontend_layout')
@section('contend')

@foreach($edit_user as $key => $edit_value)
    <form action="{{\Illuminate\Support\Facades\URL::to('/updateUser/'.$edit_value->id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>EDIT-USER</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Email</label>
                        <input value="{{$edit_value->email}}" type="email" class="form-control" name="email" placeholder="email">
                        @if ($errors->has('email'))
                            <p style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label  for="brand" >Phân quyền</label>
                        <select name="user_role" class="form-control">
                            @foreach($role_user as $key => $cate)
                                @if($cate->id_role==$edit_value->id_role)
                                    <option selected value="{{$cate->id_role}}">{{$cate->name}}</option>
                                @else
                                    <option  value="{{$cate->id_role}}">{{$cate->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="price">Password</label>
                        <input value="{{$edit_value->password}}" type="password" class="form-control" name="password" placeholder="password">
                        @if ($errors->has('password'))
                            <p style="color: red">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
{{--                    <div class="form-group col-md">--}}
{{--                        <label for="salePrice">Nhập lại password</label>--}}
{{--                        <input type="password" class="form-control" name="password-1" placeholder="nhập lại pass">--}}
{{--                        @if ($errors->has('password-1'))--}}
{{--                            <p style="color: red">{{ $errors->first('password-1') }}</p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="modelName">name</label>
                        <input value="{{$edit_value->name_user}}" type="text" class="form-control" name="name" placeholder="name">
                        @if ($errors->has('name'))
                            <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="modelName">phone</label>
                        <input value="{{$edit_value->phone}}" type="number" class="form-control" name="phone" placeholder="phone">
                        @if ($errors->has('phone'))
                            <p style="color: red">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                </div>
                <img width="300px" height="300px" src="{{\Illuminate\Support\Facades\URL::to('public/upload/user/'.$edit_value->avatar)}}" alt="">

                <div class="form-row">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">AVATAR</label>
                        <input type="file" class="form-control-file" name="avatar" >
                        @if ($errors->has('avatar'))
                            <p style="color: red">{{ $errors->first('avatar') }}</p>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>
    </form>
    @endforeach
    <?php
    $message = Session::get('message');
    if ($message){
        echo'<span class="text-alert">',$message,'</span>' ;
        Session::put('message',null);
    }

    ?>
@endsection