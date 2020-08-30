<!-- Section Heading -->
<div class="section-heading style-2">
    <h4>Featured Videos</h4>
    <div class="line"></div>
</div>

<!-- Featured Post Slides -->
<div class="featured-post-slides owl-carousel mb-30">
    <!-- Single Feature Post -->
    @foreach($featur_post->skip(6)->take(5) as $post)
        @foreach($post->photo as $img)
            <div class="single-feature-post video-post bg-img" style="background-image: url({{asset(Storage::url('images/post/' . $img->image)) }});">
                <!-- Play Button -->
                <a href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="btn play-btn">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </a>
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
                        <a href="#">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            {{ $post->view_count }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

</div>

<!-- Single Post -->
<div class="row">
    <!-- Single Blog Post -->
    @foreach($featur_post->skip(5)->take(2) as $post)
        <div class="col-12 col-md-6" style="margin-bottom: 5rem;">
            <div class="single-post-area mb-80" style="height: 357px;">
                <!-- Post Thumbnail -->
                <div class="post-thumbnail" style="width: 100%; height: 100%;">
                    @foreach($post->photo as $img)
                        <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%;">
                    @endforeach
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    @foreach($post->category->take(3) as $category)
                        <a href="#" class="post-cata cata-sm cata-danger">
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
    </div>
    @endforeach
</div>
