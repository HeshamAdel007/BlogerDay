<!-- Archive Catagory  -->
<div class="row">
    @foreach($categories as $category)
        @foreach($category->postWithImage as $post)
            <div class="col-12 col-md-6">
                <div class="single-post-area mb-50">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        @foreach($post->photo as $img)
                            <img src="{{asset(Storage::url('images/post/' . $img->image)) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%;">
                        @endforeach
                    </div>

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
            </div>
        @endforeach
    @endforeach
</div>

<!-- Pagination -->
<nav class="mt-50">
   <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul>
</nav>
