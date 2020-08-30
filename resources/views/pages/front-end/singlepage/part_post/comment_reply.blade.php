@foreach($replies as $replay)
    <ol class="children">
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
                        {{ $replay->created_at->toFormattedDateString() }}
                    </a>
                    <h6>{{ $replay->name }}</h6>
                    <p>{{ $replay->body }}</p>
            </div>
        </li>
    </ol>
@endforeach
