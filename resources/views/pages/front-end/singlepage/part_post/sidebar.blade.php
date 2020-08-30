<!-- Sidebar Widget -->
<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    @foreach($posts as $post)
        <div class="sidebar-area">

            <!-- ***** Single Widget ***** -->
            <div class="single-widget share-post-widget mb-50">
                <p>Share This Post</p>
                <a
                    href="https://www.facebook.com/sharer/sharer.php?u=www.droos-online.local.com/post/{{ $post->id }}/{{ $post->slug }}"
                    class="facebook" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    Facebook
                </a>
                <a
                    href="https://twitter.com/intent/tweet?text=www.droos-online.local.com/post/{{ $post->id }}/{{ $post->slug }}"
                    class="twitter" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    Twitter
                </a>
            </div>

            <!-- ***** Single Widget ***** -->
            <div class="single-widget p-0 author-widget">
                    <div class="p-4">
                        <img class="author-avatar" src="{{ asset(Storage::url('images/avatar/' . $post->user->profile->avatar)) }}" alt="{{ $post->user->name }}">

                        <a href="#" class="author-name">{{ $post->user->name }}</a>
                        <div class="author-social-info">
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
                        <p>{{$post->user->profile->description}}</p>
                    </div>

                    <div class="authors--meta-data d-flex">
                        <p>Posted
                            <span class="counter">
                               {{ $post->user->posts_count }}
                            </span>
                        </p>
                    </div>
            </div>

        </div>
    @endforeach
</div>
