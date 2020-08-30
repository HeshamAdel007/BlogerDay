<!-- Post Image -->
<div class="row">
    <div class="col-12">
        <div class="post-details-thumb mb-50">
            @foreach($posts as $post)
                @foreach($post->photo as $img)
                    <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}">
                @endforeach
            @endforeach
        </div>
    </div>
</div>

<!-- Post Content -->
<div class="row justify-content-center">
    <!-- Post Details Content Area -->
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="post-details-content">
            <!-- Blog Content -->
            <div class="blog-content">
                @include('pages.front-end.singlepage.part_post.post_content')
                @include('pages.front-end.singlepage.part_post.comment')
                @include('pages.front-end.singlepage.part_post.leavecomment')
            </div>
        </div>
    </div>
    @include('pages.front-end.singlepage.part_post.sidebar')
</div>
