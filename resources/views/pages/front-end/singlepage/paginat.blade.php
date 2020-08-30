<div class="vizew-pager-area">
    <div class="vizew-pager-prev">
        <p>PREVIOUS ARTICLE</p>

        <!-- Single Feature Post -->
        @foreach($prevPost->photo as $img)
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url({{asset(Storage::url('images/post/' . $img->image)) }});">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="{{ route('post.page', ['id'=>$prevPost->id, 'slug'=>$prevPost->slug]) }}" class="post-title">
                        {{ $prevPost->title }}
                    </a>
                    <div class="post-meta d-flex">
                        <a href="#">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                            {{ $prevPost->comments_count }}
                        </a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                            {{ $prevPost->view_count }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="vizew-pager-next">
        <p>NEXT ARTICLE</p>

        <!-- Single Feature Post -->
        @foreach($nextPost->photo as $img)
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url({{asset(Storage::url('images/post/' . $img->image)) }});">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="{{ route('post.page', ['id'=>$nextPost->id, 'slug'=>$nextPost->slug]) }}" class="post-title">
                        {{ $nextPost->title }}
                    </a>
                    <div class="post-meta d-flex">
                        <a href="#">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                            {{ $nextPost->comments_count }}
                        </a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                            {{ $nextPost->view_count }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- ##### Pager Area End ##### -->
