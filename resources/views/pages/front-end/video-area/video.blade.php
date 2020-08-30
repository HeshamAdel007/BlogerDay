<section class="hero--area section-padding-80">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 col-md-7 col-lg-8">
                <div class="tab-content">
                    @foreach($viedo_post as $post)
                        <div class="tab-pane" id="post-{{ $post->id }}" role="tabpanel" aria-labelledby="post-{{ $post->id }}-tab">
                            <!-- Single Feature Post -->
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
                                            <a href="#">
                                                <i class="fa fa-eye" aria-hidden="true"></i> {{ $post->view_count }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-5 col-lg-4">
                <ul class="nav vizew-nav-tab" role="tablist">
                    @foreach($viedo_post as $post)
                        <li class="nav-item">
                            <a class="nav-link" id="post-{{ $post->id }}-tab" data-toggle="pill" href="#post-{{ $post->id }}" role="tab" aria-controls="post-{{ $post->id }}" aria-selected="false">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    @foreach($post->photo as $img)
                                        <div class="post-thumbnail">
                                            <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}">
                                        </div>
                                    @endforeach
                                    <div class="post-content">
                                        <h6 class="post-title">
                                            {{ $post->title }}
                                        </h6>
                                        <div class="post-meta d-flex justify-content-between">
                                            <span>
                                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                {{ $post->comments_count }}
                                            </span>
                                            <span>
                                                <i class="fa fa-eye" aria-hidden="true"></i> {{ $post->view_count }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->
