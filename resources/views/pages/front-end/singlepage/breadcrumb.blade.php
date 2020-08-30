<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.index') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Home
                            </a>
                        </li>
                        @foreach($posts as $post)
                            @foreach($post->category->take(1) as $category)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('category.page', ['id'=>$category->id, 'slug'=>$category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $post->title }}
                            </li>
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
