<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="{{asset('loginLayout/css/style.css')}}" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />

    <title>Chào mừng bạn đến với Dova Việt Nam</title>
  </head>
  <body>
    <div class="header">
      <div class="container">
	  @foreach($errs as $e)
                <p style="color: red">
                    @if(is_array($e))
                        {{implode('<br>',$e)}}
                    @else
                        {{$e}}
                    @endif
                </p>
            @endforeach
        <div class="row">
          <div class="col-md-7 brand">
            <div class="logo">&nbsp;</div>
          </div>
          <div class="col-md-5 form-login">
            <div class="row login-block">
              <div class="col-md-4 inp-email remove-padding-left">
			  <form method="post" action="{{route('Auth.Login')}}">
			  {{csrf_field()}}
			
                <div class="form-group">
                  <label for="inpEmail">Email address</label>
                  <input
                    type="text"
					name="admin_email"
                    class="form-control"
                    id="inpEmail"
                    name="admin_email"
                    placeholder="email hoặc sđt"
                  />
                </div>
				@if ($errors->has('email'))
                        <p style="color: red">{{ $errors->first('admin_email') }}</p>
                    @endif
              </div>
              <div class="col-md4 inp-pass remove-padding-left">
                <div class="form-group">
                  <label for="inpPass">password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="inpPass"
                    name="admin_password"
                    placeholder="nhập mật khẩu"
                  />
                </div>
				@if ($errors->has('admin_password'))
                        <p style="color: red">{{ $errors->first('admin_password') }}</p>
                    @endif
                <a href="" class="forgot-acc">Quên tài khoản mật khẩu</a>
              </div>
              <div class="login col-md-4">
                <button class="btn btn-login">Đăng nhập</button>
              </div>
            </div>

			</form>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-left">
            <h4>
              Dova giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của
              bạn.
            </h4>
            <img src="images/unnamed.jpg" alt="" />
          </div>

          <div class="col-md-6 col-right">
            <h3>Đăng nhập</h3>
            <form method="post" action="{{route('Auth.Login')}}">
			{{csrf_field()}}
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label"
                  >Email</label
                >
                <div class="col-sm-10">
                  <input type="text" name="admin_email" class="form-control" placeholder="nhập mật khẩu" />
                </div>
				@if ($errors->has('email'))
                        <p style="color: red">{{ $errors->first('admin_email') }}</p>
                    @endif
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"
                  >Password</label
                >
                <div class="col-sm-10">
                  <input
                    type="password"
					name="admin_password"
                    class="form-control"
                    placeholder="nhập mật khẩu" 
                  />
                </div>
				@if ($errors->has('admin_password'))
                        <p style="color: red">{{ $errors->first('admin_password') }}</p>
                    @endif
				
              </div>
              <div class="form-group row">
                <div class="col-sm-2">Checkbox</div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="gridCheck1"
                    />
                    <label class="form-check-label" for="gridCheck1">
                      Example checkbox
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
