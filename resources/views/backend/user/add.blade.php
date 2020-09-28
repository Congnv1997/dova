@extends('layout.fontend_layout')
@section('contend')

<form action="{{\Illuminate\Support\Facades\URL::to('/saveUser')}}" method="post" enctype="multipart/form-data" class="mx-5" >
{{csrf_field()}}

<h2>ADD-USER</h2>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" placeholder="email">
      @if ($errors->has('email'))
                            <p style="color: red">{{ $errors->first('email') }}</p>
                        @endif
    </div>
    <div class="form-group">
  <label  for="brand" >Phân quyền</label>
                        <select name="user_role" class="form-control">
                            @foreach($role_user as $key => $cate)
                                <option value="{{$cate->id_role}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
  </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" name="password" placeholder="password">
        @if ($errors->has('password'))
        <p style="color: red">{{ $errors->first('password') }}</p>
        @endif
    </div>
    <div class="form-group">
  <label for="salePrice">Nhập lại password</label>
                        <input type="password" class="form-control" name="password-1" placeholder="nhập lại pass">
                        @if ($errors->has('password-1'))
                            <p style="color: red">{{ $errors->first('password-1') }}</p>
                        @endif
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="modelName">name</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
                        @if ($errors->has('name'))
                            <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif
    </div>
    <div class="form-group col-md-4">
    <label for="modelName">phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="phone">
                        @if ($errors->has('phone'))
                            <p style="color: red">{{ $errors->first('phone') }}</p>
                        @endif
    </div>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleFormControlFile1">AVATAR</label>
                        <input type="file" class="form-control-file" name="avatar" >
                        @if ($errors->has('avatar'))
                            <p style="color: red">{{ $errors->first('avatar') }}</p>
                        @endif
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>





    
    <?php
    $message = Session::get('message');
    if ($message){
        echo'<span class="text-alert">',$message,'</span>' ;
        Session::put('message',null);
    }

    ?>




@endsection


