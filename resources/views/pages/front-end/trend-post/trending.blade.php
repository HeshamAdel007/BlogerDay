<section class="trending-posts-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h4>Trending Videos</h4>
                    <div class="line"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Blog Post -->
            @foreach($post_trend->take(3) as $post)
                <div class="col-12 col-md-4" style="margin-bottom: 5rem;">
                    <div class="single-post-area mb-80" style="height: 357px;">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail" style="width: 100%; height: 100%;">
                            @foreach($post->photo as $img)
                               <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}" style="    width: 100%; height: 100%;">
                            @endforeach
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
                            @foreach($post->category->take(3) as $category)
                                <a href="{{ route('category.page', ['id'=>$category->id, 'slug'=>$category->slug]) }}" class="post-cata cata-sm cata-success">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                            <a href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="post-title">
                                {{ $post->title }}
                            </a>
                            <div class="post-meta d-flex">
                                <a href="#">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->comments_count }}
                                </a>
                                <a href="#">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    {{ $post->view_count }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- ##### Trending Posts Area End ##### -->
