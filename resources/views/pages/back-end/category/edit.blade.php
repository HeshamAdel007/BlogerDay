@extends('layouts.adminPanel')

@section('title', 'Edit Category')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary" style="margin-top: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title">edit tag</h3></h3>
                    </div>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ Route('category.update', ['id' =>$category->id]) }}" method="POST" >
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Enter User Name"
                                    value="{{$category->name}}">
                                @error('name')
                                    <span class="invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="parent_id">Category Type</label>
                              <select
                                class="form-control select2 js-example-matcher-start"
                                name="parent_id"
                                id="category_id"
                                style="width: 100%;">
                                <option value="{{ $category->parent_id }}">
                                    Parent
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                              </select>
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

@push('styles')
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/select/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('back-end/dist/plugins/select/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".js-example-matcher-start").select2({});

})
</script>
@endpush
