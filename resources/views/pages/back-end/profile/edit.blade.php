@extends('layouts.adminPanel')

@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <form action="{{ Route('profile.update',['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('post')}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                    <!-- NickName -->
                                <div class="form-group">
                                    <label>NickName :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                      </div>
                                      <input
                                        type="text"
                                        name="nickname"
                                        class="form-control"
                                        value="{{$profile->nickname}}">
                                    </div>
                                     @error('nickname')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                    <!-- Description -->
                                <div class="form-group">
                                    <label>Description :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-map-marker"></i>
                                        </span>
                                      </div>
                                      <input
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        value="{{$profile->description}}">
                                    </div>
                                    @error('description')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                    <!-- About -->
                                <div class="form-group">
                                    <label>About :</label>
                                    <textarea
                                        class="form-control"
                                        name="about"
                                        id="summernote"
                                        rows="8">{{$profile->about}}</textarea>
                                    @error('about')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                    <!-- Facebook -->
                                <div class="form-group">
                                    <label>Facebook :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-facebook"></i>
                                        </span>
                                      </div>
                                      <input
                                        type="text"
                                        name="facebook"
                                        class="form-control"
                                        value="{{$profile->facebook}}">
                                    </div>
                                    @error('facebook')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                    <!-- Twitter -->
                                <div class="form-group">
                                    <label>Twitter :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-twitter"></i>
                                        </span>
                                      </div>
                                      <input
                                        type="text"
                                        name="twitter"
                                        class="form-control"
                                        value="{{$profile->twitter}}">
                                    </div>
                                    @error('twitter')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                    <!-- Instagram -->
                                <div class="form-group">
                                    <label>Instagram :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                      </div>
                                      <input
                                        type="text"
                                        name="instagram"
                                        class="form-control"
                                        value="{{$profile->instagram}}">
                                    </div>
                                    @error('instagram')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                    <!-- YouTube  -->
                                <div class="form-group">
                                    <label>YouTube :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-youtube"></i>
                                        </span>
                                      </div>
                                      <input
                                        type="text"
                                        name="youtube"
                                        class="form-control"
                                        value="{{$profile->youtube}}">
                                    </div>
                                     @error('youtube')
                                        <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Col User Info-->
                <!-- Start Col User Images -->
                            <div class="col-4">
                        <!-- User Avatar -->
                                <div class="form-group">
                                    <label for="title">Avatar :</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input
                                                type="file"
                                                class="custom-file-input image_prev"
                                                name="avatar"
                                                id="images">
                                            <label class="custom-file-label" for="images">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <img src="{{$profile->avatar_path }}" alt="" style="width: 190px; height: 200px" id="image_perview" class="img-thumbnail">
                                </div>
                    <!-- Button  -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div><!-- End Row -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Push Some Style --}}
@push('styles')
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

{{-- Push Some Script --}}
@push('scripts')
{{-- Summernote Plugin --}}
<script src="{{ asset('back-end/dist/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'About-Me',
        height: 280,
    }); // End Summernote

    $("#images").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#image_perview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });// End User Post Image preview

})
</script>
@endpush
