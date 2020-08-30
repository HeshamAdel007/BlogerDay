@extends('layouts.adminPanel')

@section('title', 'Setting')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="tile">
                <h3 class="tile-title">WebSite Info</h3>
                {{--Check Have Permission Update Setting--}}
                @if (Auth::user()->hasPermission('update_setting'))
                    @foreach($settings as $setting)
                        <form action="{{ Route('setting.update', ['id'=>$setting->id])}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                        <!-- website Name -->
                                        <div class="form-group">
                                            <label>WebSite Name :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    class="form-control"
                                                    value="{{$setting->name}}">
                                            </div>
                                        </div>
                        <!-- website Email -->
                                        <div class="form-group">
                                            <label>WebSite E-Mail :</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    class="form-control"
                                                    value="{{$setting->email}}">
                                            </div>
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
                                                value="{{$setting->description}}">
                                            </div>
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
                                                value="{{$setting->facebook}}">
                                            </div>
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
                                                value="{{$setting->twitter}}">
                                            </div>
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
                                                value="{{$setting->instagram}}">
                                            </div>
                                        </div>
                                        <!-- Youtube -->
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
                                                value="{{$setting->youtube}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- About -->
                                        <div class="form-group">
                                            <label>About :</label>
                                            <textarea
                                                class="form-control"
                                                name="about"
                                                id="summernote"
                                                rows="4">{{$setting->about}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Images :</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input
                                                        type="file"
                                                        class="custom-file-input image_prev"
                                                        name="logo"
                                                        id="images">
                                                    <label class="custom-file-label" for="images">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <img src="{{$setting->logo_path }}" alt="{{ $setting->name }}" style="width: 190px; height: 200px" id="image_perview" class="img-thumbnail">
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @else
                    <h4 class="btn btn-secondry"> You Don't Have Permission To Access This Page</h4>
                @endif
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
        placeholder: 'Add Your Content Here',
        height: 250,
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

