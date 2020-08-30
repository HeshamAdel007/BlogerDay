@extends('layouts.adminPanel')

@section('title', 'Contact')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top: 1rem;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contact Message</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>message</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($messages->count() > 0)
                                <tbody>
                                    @foreach($messages as $index=>$message)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ Str::limit( $message->message, 30, '') }}</td>
                                            <!-- message  Action Edit Or Delete -->
                                            <td>
                                                {{-- Check Have Permission Edit message --}}
                                                @if (Auth::user()->hasPermission('read_contact'))
                                                    <a href="{{Route('contact.show', ['id'=>$message->id])}}" class="btn btn-success">
                                                        <i class="fa fa-eye"></i>
                                                        show
                                                    </a>
                                                @else
                                                    <button class="btn btn-success" disabled>
                                                        <i class="fa fa-eye"></i> show
                                                    </button>
                                                @endif
                                                {{-- Check Have Permission Delete message--}}
                                                @if (Auth::user()->hasPermission('delete_contact'))
                                                    <a href="{{Route('contact.delete', ['id'=>$message->id])}}" class="btn btn-danger">
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
                                   <span> No have Any <strong>message</strong> </span>
                                </div>
                            @endif
                        </table> <!-- End Table -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $messages->links() }}
                    </div> <!-- End pagination -->
                </div><!-- End Card -->
            </div> <!-- End Col -->
        </div><!-- End Row -->
    </div><!-- End Container -->
<!-- /.card -->
</section>
@endsection

