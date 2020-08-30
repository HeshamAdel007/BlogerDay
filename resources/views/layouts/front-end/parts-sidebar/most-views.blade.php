<!-- ***** Single Most Views Widget ***** -->
<div class="single-widget mb-50">
    <!-- Section Heading -->
    <div class="section-heading style-2 mb-30">
        <h4>Most Viewed</h4>
        <div class="line"></div>
    </div>

    <!-- Single Blog Post -->
    @foreach($post_trend->take(6) as $post)
        <div class="single-blog-post d-flex" style="height: 70px;">
            <div class="post-thumbnail" style="width: 100%; height: 100%;">
                @foreach($post->photo as $img)
                   <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%;">
                @endforeach
            </div>
            <div class="post-content">
                <a href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="post-title">
                    {{ $post->title }}
                </a>
                <div class="post-meta d-flex justify-content-between">
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
</div>
