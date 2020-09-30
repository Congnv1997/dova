<header >
    <nav class="vlt-menutop">
      <h1>
        <a href="" class="logo "></a>
      </h1>
       <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
       <li class="hidden-xs">
            <a onclick="loadtoday_mailbox()" class="dropdown-toggle  vlt-colorbanner" data-toggle="dropdown">
                          <i class="i i-mail2"></i>
                            <b class="caret"></b>
                              <span class="count_mailinbox badge badge-sm up bg-danger count" style="margin-left: 0px;"></span>
                          </a>
                          <section class="dropdown-menu aside-xl animated flipInY">
                              <section class="panel bg-white">
                                  <div class="panel-heading b-light bg-light">
                                      <strong>Danh sách top thư mới</strong>
                                  </div>
                                  <div class="list-group list-group-alt mailbox" id="containt_top10_inbox">
                                  </div>
                                  <div class="panel-footer text-sm">
                                      <a href="javascript:Add_Email()" class="block hover pull-left">
                                      <span class="i-s i-s-1-5x pull-left m-r-xs">
                                          <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                                          <i class="fa fa-fw fa-pencil text-white i-sm"></i>
                                      </span>
                                      <span class="clear">
                                          <span class="h5 block m-t-xs text-danger">Soạn thư</span>
                                          <small class="text-muted">   </small>
                                      </span>
                                  </a>
                                      <a  class="hover">
                                  <span class="i-s i-s-1-5x pull-left m-r-xs">
                                      <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                      <i class="fa fa-fw fa-inbox text-white i-sm"></i>
                                  </span>
                                  <span class="clear">
                                      <span class="h5 block m-t-xs text-success">Đọc Thư</span>
                                      <small class="text-muted"></small>

                                  </span>
                              </a>
                                   </div>
                              </section>
                          </section>
      </li>
      <li class="hidden-xs">
          <a href="#" class="dropdown-toggle vlt-colorbanner" data-toggle="dropdown">
              <i class="i i-chat3"></i>
              <span class="badge badge-sm up bg-danger count"></span>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
              <section class="panel bg-white">
                  <div class="panel-heading b-light bg-light">
                      <strong>Bạn có <span class="count">0</span> thông báo</strong>
                  </div>
                  <div class="list-group list-group-alt">

                  </div>
                  <div class="panel-footer text-sm">
                      <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                      <a href="#notes" data-toggle="class:show animated fadeInRight">Xem tất cả thông báo</a>
                  </div>
              </section>
          </section>
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggl  vlt-colorbanner" data-toggle="dropdown">

              <span class="thumb-sm avatar pull-left load-anh1">
              @if (Auth::check())
                                  <img src="{{\Illuminate\Support\Facades\URL::to('public/upload/'.Auth::user()->logo)}}" alt="">

                              @else
                              @endif
              </span>
             <span id="menu_top_namelogin" class="load-name">@if (Auth::check())
                                  <h2>{{Auth::user()->name}}</h2>
                              @else
                              @endif</span><b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
               <li>
                  <span class="arrow top"></span>
                  <a href="#" onclick="event.preventDefault();editmatkhau(@if (Auth::check())
                                  <h2>{{Auth::user()->id}}</h2>
                              @else
                              @endif)">Đổi Mật Khẩu</a>
              </li>
              <li>
                  <span class="arrow top"></span>
                  <a href="#" onclick="event.preventDefault();editthongtincanhan(@if (Auth::check())
                                  <h2>{{Auth::user()->id}}</h2>
                              @else
                              @endif)">Thay đổi thông tin</a>
              </li>
              <li>
                  <span class="arrow top"></span>
                  <a href="dang-nhap/thoat">Thoát</a>
              </li>
          </ul>
      </li>
  </ul>
      <button class="toggle-menu" aria-label="Responsive Navigation Menu">☰</button>
    </nav>
  </header>
