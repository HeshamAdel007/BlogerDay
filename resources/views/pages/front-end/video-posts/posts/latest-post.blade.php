<!-- Section Heading -->
<div class="section-heading style-2">
    <h4>Latest News</h4>
    <div class="line"></div>
</div>
<!-- Featured Post Slides -->
<div class="featured-post-slides owl-carousel mb-30">
    <!-- Single Feature Post -->
    @foreach($latest_post->skip(6)->take(5) as $post)
        @foreach($post->photo as $img)
            <div class="single-feature-post video-post bg-img" style="background-image: url({{asset(Storage::url('images/post/' . $img->image)) }});">
                <!-- Play Button -->
                <a href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                <!-- Post Content -->
                <div class="post-content">
                    @foreach($post->category->take(3) as $category)
                        <a href="{{ route('category.page', ['id'=>$category->id, 'slug'=>$category->slug]) }}" class="post-cata">
                            {{ $category->name }}
                        </a>
                    @endforeach
                    <a href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="post-title">
                        {{ $post->title }}
                    </a>
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
        @endforeach
    @endforeach

</div>


<!-- Single Post Area -->
@foreach($latest_post->skip(11)->take(5) as $post)
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
