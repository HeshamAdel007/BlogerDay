@extends('layouts.adminPanel')

@section('title', 'Tags')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top: 1rem;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">tags table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>name</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($tags->count() > 0)
                                <tbody>
                                    @foreach($tags as $index=>$tag)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <!-- Admin Action Edit Or Delete -->
                                            <td>
                                                {{-- Check Have Permission Edit Tag--}}
                                                @if (Auth::User()->hasPermission('update_tag'))
                                                    <a href="{{Route('tag.edit', ['id'=>$tag->id])}}" class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                        edit
                                                    </a>
                                                @else
                                                    <button class="btn btn-success" disabled>
                                                        <i class="fa fa-edit"></i> edit
                                                    </button>
                                                @endif
                                                {{-- Check Have Permission Delete Tag--}}
                                                @if (Auth::User()->hasPermission('delete_tag'))
                                                    <a href="{{Route('tag.delete', ['id'=>$tag->id])}}" class="btn btn-danger">
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
                                   <span> No have Any <strong>tags</strong> </span>
                                </div>
                            @endif
                        </table> <!-- End Table -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $tags->links() }}
                    </div> <!-- End pagination -->
                </div><!-- End Card -->
            </div> <!-- End Col -->
        </div><!-- End Row -->
    </div><!-- End Container -->
<!-- /.card -->
</section>
@endsection
