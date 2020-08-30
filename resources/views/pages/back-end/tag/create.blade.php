@extends('layouts.adminPanel')

@section('title', 'Create Tag')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary" style="margin-top: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title">create tag</h3></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ Route('tag.store') }}" method="POST" >
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="card-body">
                            <!-- Tag Name -->
                            <div class="form-group">
                                <label for="name">Tags Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tokenfield"
                                    value="addTag"
                                    name="name[]">
                                @error('name')
                                    <span class="invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                create
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

{{-- Push Some Style --}}
@push('styles')
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/tags/bootstrap-tokenfield.min.css') }}">
@endpush

{{-- Push Some Script --}}
@push('scripts')
<script src="{{ asset('back-end/dist/plugins/tags/bootstrap-tokenfield.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#tokenfield').tokenfield({
        minLength: 3,
    })
})
</script>
@endpush
