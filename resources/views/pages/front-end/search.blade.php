@extends('layouts.app')

@section('title', 'Search')

@section('content')
<section class="vizew-post-area mb-50">
    <div class="container">
        <div class="row">
            <!-- posts -->
            <div class="col-12 col-md-7 col-lg-8">
                <div class="all-posts-area">
                    <!-- Single Post Area -->
                    @foreach($posts as $post)
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        @foreach($post->photo as $img)
                                            <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%;">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        @foreach($post->category->take(3) as $category)
                                            <a href="#" class="post-cata cata-sm cata-success">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach

                                        <a href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="post-title mb-2">
                                            {{ $post->title }}
                                        </a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-date">
                                                {{$post->created_at->toFormattedDateString()}}
                                            </a>
                                        </div>
                                        <p class="mb-2">
                                            {!!  substr(strip_tags($post->content), 0, 150) !!}
                                        </p>
                                        <div class="post-meta d-flex">
                                            <a href="#">
                                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                {{ $post->comments_count }}
                                            </a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                                {{ $post->view_count }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $posts->appends(request()->query())->links() }}
            </div>
            <!-- ***** Sidebar ***** -->
            <div class="col-12 col-md-5 col-lg-4">
                <div class="sidebar-area">
                    @include('layouts.front-end.sidebar')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
