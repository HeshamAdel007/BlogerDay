<section class="vizew-post-area mb-50">
    <div class="container">
        <div class="row">
            <!-- posts -->
            <div class="col-12 col-md-7 col-lg-8">
                <div class="all-posts-area">
                    @include('pages.front-end.video-posts.posts.featured')
                    @include('pages.front-end.video-posts.posts.latest-post')
                </div>
            </div>
            <!-- ***** Sidebar ***** -->
            <div class="col-12 col-md-5 col-lg-4">
                <div class="sidebar-area">
                    @include('layouts.front-end.sidebar')
                </div>
            </div>
        </div>
    </div>
</section>
