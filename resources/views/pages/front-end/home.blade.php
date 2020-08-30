@extends('layouts.app')

@section('title', 'Home')


@section('content')
    <!-- ##### Hero Area Start ##### -->
    @include('pages.front-end.video-area.video')
    <!-- ##### Trending Posts Area Start ##### -->
    @include('pages.front-end.trend-post.trending')
    <!-- ##### Vizew Post Area Start ##### -->
    @include('pages.front-end.video-posts.vizew-post')
@endsection
