@extends('layouts.adminPanel')

@section('title', Auth::user()->name . ' - Profile')

@section('content')
<section class="content" style="padding-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ $profile->avatar_path }}"
                   alt="{{ Auth::user()->name }}">
            </div>
            <h3 class="profile-username text-center">{{ $profile->nickname }}</h3>

            <p class="text-muted text-center">{{ $profile->description }}</p>

            <a href="{{ route('profile.edit', ['id'=>Auth::user()->id, 'user'=> strtolower(str_replace(' ', '-', Auth::user()->name))]) }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab">About-Me</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Info</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="about">
                <!-- Post -->
                <div class="post">
                  <!-- /.user-block -->
                    {{$profile->about}}
                <!-- /.post -->
                </div>
              </div>
              <div class="tab-pane" id="settings">
                <form>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input
                        type="text"
                        class="form-control"
                        value="{{ Auth::user()->name }}" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NickName</label>
                    <div class="col-sm-10">
                      <input
                        type="text"
                        class="form-control"
                        value="{{ $profile->nickname }}" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input
                        type="email"
                        class="form-control"
                        value="{{ Auth::user()->email }}" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input
                        type="email"
                        class="form-control"
                        value="{{ $profile->description }}" disabled>
                    </div>
                  </div>

                  <hr>

                  <div class="user-settings">
                    <h4 class="line-head">social</h4>
                    <div class="row">
    <!-- User Social link  -->
                        <div class="col-md-8 mb-4 social">
            <!-- Facebook Link  -->
                            <a href="https://www.facebook.com/{{$profile->facebook}}" class="btn btn-social-icon btn-facebook" target="blank"><i class="fab fa-facebook-f"></i></a>
            <!-- Twitter Link  -->
                            <a href="https://twitter.com/{{$profile->twitter}}" class="btn btn-social-icon btn-twitter" target="blank"><i class="fab fa-twitter"></i></a>

            <!-- Facebook Link  -->
                            <a href="https://www.instagram.com/{{$profile->instagram}}" class="btn btn-social-icon btn-instagram" target="blank"><i class="fab fa-instagram"></i></a>
            <!-- Youtube Link  -->
                            <a href="https://www.youtube.com/channel/{{$profile->youtube}}" class="btn btn-social-icon btn-youtube" target="blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
