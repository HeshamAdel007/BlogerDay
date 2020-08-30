<!-- Comment Area Start -->
<div class="comment_area clearfix mb-50">

    <!-- Section Title -->
    <div class="section-heading style-2">
        <h4>[ {{ $post->comments_count }} ] Comment</h4>
        <div class="line"></div>
    </div>

    <ul>
        <!-- Single Comment Area -->
        @foreach($posts as $post)
            @foreach($post->comments as $comment)
                <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                        <!-- Comment Author -->
                        <div class="comment-author">
                            <img src="{{ asset('back-end/dist/img/user3-128x128.jpg') }}" alt="author">
                        </div>
                        <!-- Comment Meta -->
                        <div class="comment-meta">
                            <a href="#" class="comment-date">
                                {{ $comment->created_at->toFormattedDateString() }}
                            </a>
                            <h6>{{ $comment->name }}</h6>
                            <p>{{ $comment->body }}</p>
                            @if(!count($comment->replies))
                                <div class="d-flex align-items-center">
                                    @include('pages.front-end.singlepage.part_post.reply_form')
                                </div>
                            @endif
                        </div>
                    </div>
                    @include('pages.front-end.singlepage.part_post.comment_reply', ['replies' => $comment->replies])
                </li>
            @endforeach
        @endforeach
    </ul>
</div>
