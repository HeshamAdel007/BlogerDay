@extends('layouts.adminPanel')

@section('title', 'Edit Photo')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary" style="margin-top: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title">Edit Image</h3></h3>
                    </div>
                    <!-- form start -->
                    <form action="{{ Route('image.update', ['id' =>$photo->id]) }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    placeholder="Enter Image Name"
                                    value="{{$photo->title}}">
                                @error('title')
                                    <span class="invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="description"
                                    placeholder="Enter Image Description"
                                    value="{{$photo->description}}">
                                @error('description')
                                    <span class="invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            name="imgs"
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
                                    <img src="{{$photo->photo_path}}" alt="img" style="width: 100%; height: 100%" id="image_perview" class="img-thumbnail">
                                </div>
                                @error('imgs')
                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer" style="background-color: unset;">
                            <button type="submit" class="btn btn-primary">
                                update
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<style type="text/css">
.select2-container .select2-selection--single {
    height: 41px;
}
</style>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {

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
