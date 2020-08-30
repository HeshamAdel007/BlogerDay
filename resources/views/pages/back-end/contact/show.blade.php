@extends('layouts.adminPanel')

@section('title', 'Contact')


@section('content')
<section id="imgup" class="content">
    <div class="container-fluid">
        <div class="card card-primary" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">
                    Message
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $message->name }}">
                </div>
                <div class="form-group">
                    <label for="title">E-Mail</label>
                    <input
                        type="email"
                        class="form-control"
                        value="{{ $message->email }}">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea
                        class="form-control">{{ $message->message }}</textarea>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
