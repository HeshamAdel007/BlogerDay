<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home.index') }}" class="nav-link">
                Home
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('contact.index') }}" class="nav-link">
                Contact
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline">
                    {{ Auth::user()->name }}
                    <i class="fas fa-angle-down" style="position: relative;
    top: 2px;"></i>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user mb-0">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header text-white"
                       style="background: url({{ asset('back-end/dist/img/photo1.png') }}) center center;">
                    <h3 class="widget-user-username text-right">{{ Auth::user()->name }}</h3>
                    <h5 class="widget-user-desc text-right">
                        {{ Auth::user()->profile->description }}
                    </h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset(Storage::url('images/avatar/' .Auth::user()->profile->avatar)) }}" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <li class="user-footer">
                                <!-- Profile -->
                                <a href="{{ route('profile.show', ['id'=>Auth::user()->id , 'user'=> strtolower(str_replace(' ', '-', Auth::user()->name))])}}" class="btn btn-default btn-flat">Profile</a>
                                <!-- LogOut -->
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{csrf_field()}}
                                    {{method_field('post')}}
                                </form>
                            </li>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.widget-user -->
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
