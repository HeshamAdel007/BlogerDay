@extends('layouts.adminPanel')

@section('title', 'Create Admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary" style="margin-top: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title">create admin</h3></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form
                        action="{{ Route('admin.store') }}" method="POST">
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
                                    name="email"
                                    id="email"
                                    placeholder="Add Your E-Mail"
                                    required>
                                @error('email')
                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    id="password"
                                    placeholder="Add Your Password"
                                    required>
                                @error('password')
                                    <span class="error invalid-feedback" style="font-size: 17px;font-weight: 600; display: block;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Confirm -->
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    placeholder="Confirmation Password"
                                    required>
                            </div>
                            <!-- Roles & Permissions -->
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                id="role-tab"
                                                data-toggle="pill"
                                                href="#role"
                                                role="tab"
                                                aria-controls="role"
                                                aria-selected="true">
                                                roles
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                id="permission-tab"
                                                data-toggle="pill"
                                                href="#permissions"
                                                role="tab"
                                                aria-controls="permissions" aria-selected="false">
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
                                                                value="{{$role->id}}">
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
                                                                value="{{$perm->id}}">
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
