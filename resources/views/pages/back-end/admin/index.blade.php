@extends('layouts.adminPanel')

@section('title', 'Admins')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top: 1rem;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">admin table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>name</th>
                                    <th>e-mail</th>
                                    <th>role</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($admins->count() > 0)
                                <tbody>
                                    @foreach($admins as $index=>$admin)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                @if($admin->role_id == 1)
                                                    <span class="btn btn-block btn-xs btn-primary">
                                                        owner
                                                    </span>
                                                @elseif($admin->role_id == 2)
                                                    <span class="btn btn-block btn-xs btn-success">
                                                        super admin
                                                    </span>
                                                @elseif($admin->role_id == 3)
                                                    <span class="btn btn-block btn-xs btn-warning">
                                                        admin
                                                    </span>
                                                @else
                                                    <span class="btn btn-block btn-xs btn-info">
                                                        user
                                                    </span>
                                                @endif
                                            </td>
                                            <!-- Admin  Action Edit Or Delete -->
                                            <td>
                                                {{-- Check Have Permission Edit Admin --}}
                                                @if (Auth::user()->hasPermission('update_users'))
                                                    <a href="{{Route('admin.edit', ['id'=>$admin->id])}}" class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                        edit
                                                    </a>
                                                @else
                                                    <button class="btn btn-success" disabled>
                                                        <i class="fa fa-edit"></i> edit
                                                    </button>
                                                @endif
                                                {{-- Check Have Permission Delete Admin--}}
                                                @if (Auth::user()->hasPermission('delete_users'))
                                                    <a href="{{Route('admin.delete', ['id'=>$admin->id])}}" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                        delete
                                                    </a>
                                                @else
                                                    <button class="btn btn-danger" disabled>
                                                        <i class="fas fa-trash"></i> delete
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-warning" role="alert">
                                   <span> No have Any <strong>Admin</strong> </span>
                                </div>
                            @endif
                        </table> <!-- End Table -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $admins->links() }}
                    </div> <!-- End pagination -->
                </div><!-- End Card -->
            </div> <!-- End Col -->
        </div><!-- End Row -->
    </div><!-- End Container -->
<!-- /.card -->
</section>
@endsection
