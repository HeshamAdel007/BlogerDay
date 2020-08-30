<!-- Post Content -->
@foreach($posts as $post)
    <div class="post-content mt-0">
        @foreach($post->category as $category)
            <a href="{{ route('category.page', ['id'=>$category->id, 'slug'=>$category->slug]) }}" class="post-cata cata-sm cata-danger">
                {{ $category->name }}
            </a>
        @endforeach
        <a  href="{{ route('post.page', ['id'=>$post->id, 'slug'=>$post->slug]) }}" class="post-title mb-2">
            {{ $post->title }}
        </a>

        <div class="d-flex justify-content-between mb-30">
            <div class="post-meta d-flex align-items-center">
                <a href="#" class="post-author">
                    By {{ $post->user->name }}
                </a>
                <i class="fa fa-circle" aria-hidden="true"></i>
                <a href="#" class="post-date">
                    {{$post->created_at->since()}}
                </a>
            </div>
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

    <!-- Content -->
    {!! $post->content !!}
    <!-- End Content -->

    <!-- Post Tags -->
    <div class="post-tags mt-30">
        <ul>
            <li>
                @foreach($post->tag as $tag)
                    <a href="#">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </li>
        </ul>
    </div>
    <!-- Post Author -->
    <div class="vizew-post-author d-flex align-items-center py-5">
        <div class="post-author-thumb">
        <img src="{{ asset(Storage::url('images/avatar/' . $post->user->profile->avatar)) }}" alt="{{ $post->user->name }}">
        </div>
        <div class="post-author-desc pl-4">
            <a href="#" class="author-name">
                {{ $post->user->name }}
            </a>
            <p>
                {{$post->user->profile->description}}
            </p>
            <div class="post-author-social-info">
                <a href="{{ 'https://www.facebook.com/' .$post->user->profile->facebook }}" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="{{ 'https://www.twitter.com/' .$post->user->profile->twitter }}" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="{{ 'https://www.instagram.com/' .$post->user->profile->instagram }}" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="{{ 'https://www.youtube.com/channel/' .$post->user->profile->youtube }}" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach
