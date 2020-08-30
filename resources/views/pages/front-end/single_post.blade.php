@extends('layouts.app')

@push('meta_og')
@foreach($posts as $post)
    @foreach($post->photo as $img)
        <meta property="og:title" content="{{ $post->title }}">
        <meta property="og:image" content="{{asset(Storage::url('images/post/' . $img->image)) }}">
        <meta property="og:type" content="http://droos-online.local/post/{{ $post->id }}/{{ $post->slug }}" />
    @endforeach
@endforeach
@endpush

@section('title', $post->title)


@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    @include('pages.front-end.singlepage.breadcrumb')
    <!-- ##### Pager Area Start ##### -->
    @include('pages.front-end.singlepage.paginat')
    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            @include('pages.front-end.singlepage.post')
        </div>
    </section>
@endsection
