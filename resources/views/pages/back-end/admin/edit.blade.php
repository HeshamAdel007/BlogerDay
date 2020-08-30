@extends('layouts.adminPanel')

@section('title', 'Edit Admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-success" style="margin-top: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title">edit admin</h3></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ Route('admin.update', ['id'=>$admin->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="card-body">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id="name"
                                    placeholder="Add Admin Name"
                                    value="{{$admin->name}}"
                                    required>
                                @error('name')
                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- E-Mail -->
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email" id="email"
                                    placeholder="Add Your E-Mail"
                                    value="{{$admin->email}}"
                                    required>
                                @error('email')
                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <!-- Roles & Permissions -->
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="role-tab" data-toggle="pill" href="#role" role="tab" aria-controls="role" aria-selected="true">
                                                roles
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="permission-tab" data-toggle="pill" href="#permissions" role="tab" aria-controls="permissions" aria-selected="false">
                                                permissions
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="role" role="tabpanel" aria-labelledby="role-tab">
                                            {{-- Get All Roles --}}
                                            <div class="form-group">
                                                @foreach ($roles as $role)
                                                    <div class="animated-radio-button">
                                                        <label>
                                                            <input
                                                                type="radio"
                                                                name="role[]"
                                                                id="{{$role->name}}"
                                                                value="{{$role->id}}"
                                                                {{-- Check If Have This Role Or No--}}
                                                                {{$admin->hasRole($role->name) ? 'checked' : ''}}>
                                                                <span class="label-text">{{$role->display_name}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @error('role')
                                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600;color: red;display: block;">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permission-tab">
                                            {{-- Get All Permissions --}}
                                           <div class="form-group">
                                                @foreach ($permissions as $perm)
                                                    <div class="animated-checkbox" style="display: inline-block;margin-right: 1rem; width: 9.3rem;">
                                                        <label>
                                                            <input
                                                                type="checkbox"
                                                                class="is-invalid"
                                                                name="permissions[]"
                                                                id="{{$perm->name}}"
                                                                value="{{$perm->id}}"
                                                                 {{-- Check If Have This Permission Or No--}}
                                                                {{$admin->hasPermission($perm->name) ? 'checked' : ''}}>
                                                                <span class="label-text">{{$perm->display_name}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @error('permissions')
                                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600;color: red;display: block;">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
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
@endsection
