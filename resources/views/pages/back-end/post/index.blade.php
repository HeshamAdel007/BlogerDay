@extends('layouts.adminPanel')

@section('title', 'Posts')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top: 1rem;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">post table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>title</th>
                                    <th>author</th>
                                    <th>status</th>
                                    <th>category</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($posts->count() > 0)
                                <tbody>
                                    @foreach($posts as $index=>$post)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->status }}</td>
                                            <td>
                                                @foreach($post->category as $category)
                                                    {{ $category->name }},
                                                @endforeach
                                            </td>
                                            <!-- post  Action Edit Or Delete -->
                                            <td>
                                                {{-- Check Have Permission Edit post --}}
                                                @if (Auth::user()->hasPermission('update_post'))
                                                    <a href="{{Route('post.edit', ['id'=>$post->id])}}" class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                        edit
                                                    </a>
                                                @else
                                                    <button class="btn btn-success" disabled>
                                                        <i class="fa fa-edit"></i> edit
                                                    </button>
                                                @endif
                                                {{-- Check Have Permission Delete post--}}
                                                @if (Auth::user()->hasPermission('delete_post'))
                                                    <a href="{{Route('post.delete', ['id'=>$post->id])}}" class="btn btn-danger">
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
                                   <span> No have Any <strong>Post</strong> </span>
                                </div>
                            @endif
                        </table> <!-- End Table -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $posts->links() }}
                    </div> <!-- End pagination -->
                </div><!-- End Card -->
            </div> <!-- End Col -->
        </div><!-- End Row -->
    </div><!-- End Container -->
<!-- /.card -->
</section>
@endsection
