@extends('layouts.adminPanel')

@section('title', 'Create Post')

@section('content')
<section id="imgup" class="content">
    <div class="container-fluid">
        <div class="card card-primary" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">
                    create Post
                </h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ Route('post.store') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('post')}}
                <div class="card-body" style="padding: 10px !important;">
                    <!-- left column -->
                    <div class="col-md-8" style="display: inline-block;">
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">title</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                id="title"
                                placeholder="Add Title"
                                value="{{ old('title') }}"
                                required>
                            @error('title')
                                <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- content -->
                        <div class="form-group">
                            <label>content</label>
                            <textarea
                                class="form-control"
                                name="content"
                                id="summernote"
                                placeholder="Add Content"
                                value="{{ old('content') }}"></textarea>
                            @error('content')
                                <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- Galary -->
                        <div class="card collapsed-card mb-0">
                          <div class="card-header">
                            <h3 class="card-title">Galary</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #000;"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <!-- checkbox -->
                            <div class="form-group clearfix">
                               @foreach ($photos as $photo)
                                    <input
                                        type="radio"
                                        name="imgs"
                                        id="{{ $photo->image }}"
                                        value="{{ $photo->id }}"
                                        style="visibility: hidden;">
                                    <label for="{{ $photo->image }}">
                                        <img
                                            class="checkable"
                                            src="{{$photo->photo_path}}"
                                            alt="{{ $photo->name }}">
                                    </label>

                                @endforeach
                            </div>
                          </div>
                        </div>
                        <small class="text-muted">
                              Choose Image OR Uplode New From Left Widget
                        </small>
                    </div>
                    <!-- right column -->
                    <div class="col-md-4" style="display: inline-block; float: right;">
                        <!-- iCheck Category-->
                        <div class="card collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title">categories</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #000;"><i class="fas fa-plus"></i>
                                </button>
                              </div>
                          </div>
                          <div class="card-body">
                            <!-- checkbox -->
                            <div class="form-group clearfix">
                                @foreach ($categories as $category)
                                      <div class="icheck-primary d-inline">
                                        <input
                                            type="checkbox"
                                            name="categories[]"
                                            id="{{$category->name}}"
                                            value="{{$category->id}}">
                                        <label for="{{$category->name}}">
                                            {{$category->name}}
                                        </label>
                                      </div>
                                @endforeach
                                @error('categories')
                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <!-- iCheck Category-->

                        <!-- iCheck tag-->
                        <div class="card collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title">tags</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #000;"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <!-- checkbox -->
                            <div class="form-group clearfix">

                                <div class="select2-purple">
                                    <select
                                        class="form-control select2 js-example-matcher-start"
                                        multiple="multiple"
                                        name="tags[]"
                                        data-dropdown-css-class="select2-purple"
                                        style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">
                                                {{$tag->name}}
                                            </option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                          </div>
                        </div>

                        <!-- iCheck Post Status-->
                        <div class="card collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title">Post Status</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #000;"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <!-- checkbox -->
                            <div class="form-group clearfix">
                              <div class="icheck-primary">
                                <input
                                    type="radio"
                                    name="status"
                                    id="published"
                                    value="published">
                                <label for="published">
                                  published
                                </label>
                              </div>

                              <div class="icheck-success">
                                <input
                                    type="radio"
                                    name="status"
                                    id="draft"
                                    value="draft"
                                    checked>
                                <label for="draft">
                                  draft
                                </label>
                              </div>

                              <div class="icheck-danger">
                                <input
                                    type="radio"
                                    name="status"
                                    id="archived"
                                    value="archived">
                                <label for="archived">
                                  archived
                                </label>
                              </div>

                            </div>
                          </div>
                        </div>

                        <!-- Images Uplode -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Uplode Image</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #000;"><i class="fas fa-minus"></i>
                                    </button>
                              </div>
                            </div>
                            <div class="card-body">
                                <!-- checkbox -->
                                <div class="form-group clearfix">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input
                                                    type="file"
                                                    name="photo"
                                                    id="images"
                                                    class="img-form image_prev custom-file-input">
                                                <label
                                                    class="custom-file-label"
                                                    for="images">Choose Image
                                                </label>
                                            </div>
                                        </div>
                                        <small class="text-muted">
                                              Must Be Width 1024px or More Than This Width
                                        </small>
                                        <div class="form-group" style="width: 288px; height: 230px">
                                            <img src="{{asset('storage/images/post/post_imag_default.jpg')}}" alt="" style="width: 100%; height: 100%" id="image_perview" class="img-thumbnail">
                                        </div>
                                        @error('photo')
                                            <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Images Uplode -->

                    </div>
                </div>
                <div class="card-footer" style="background-color: unset;">
                    <button type="submit" class="btn btn-primary">
                        create
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

{{-- Push Some Style --}}
@push('styles')
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/select/css/select2.min.css') }}">

<style type="text/css">
.custom-file-input:lang(en)~.custom-file-label::after {
    content: "Uplode" !important;
}
span.imgCheckbox0 {
    width: 8rem;
    height: 8rem;
    overflow: hidden;
}
span.imgCheckbox0 img {
    position: relative;
    width: 100%;
    height: 100%;
}

.select2-container .select2-selection--single {
    height: 41px;
}
</style>
@endpush

{{-- Push Some Script --}}
@push('scripts')
{{-- Summernote Plugin --}}
<script src="{{ asset('back-end/dist/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('back-end/dist/plugins/imgcheck.js') }}"></script>

<script src="{{ asset('back-end/dist/plugins/select/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Add Your Content Here',
        height: 375,
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


    $(".js-example-matcher-start").select2({});

    $("img.checkable").imgCheckbox({
        "radio": true,
        "styles": {
            "span.imgCheckbox.imgChked img": {
                // It's important to note that overriding the "filter" property will remove grayscaling
                "filter": "blur(5px)",

                // This is just css: remember compatibility
                "-webkit-filter": "blur(5px)",

                // Let's change the amount of scaling from the default of "0.8"
                "transform": "scale(0.9)"
            }
        }
    });

})
</script>
@endpush
