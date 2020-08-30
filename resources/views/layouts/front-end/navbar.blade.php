<!-- Navbar Area -->
<div class="vizew-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">

            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="vizewNav">

                <!-- Nav brand -->
                <a href="{{ route('home') }}" class="nav-brand">
                    @foreach ($settings as $setting)
                        <img src="{{ URL::asset(Storage::url('images/logo/' . $setting->logo))}}" alt="{{$setting->name}}">
                    @endforeach
                </a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>

                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li>
                                <a href="{{ route('home.index') }}">Home</a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('category.page', ['id'=>$category->id, 'slug'=>$category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                    @if(count($category->childrenRecursive))
                                        @include('layouts.front-end.subCategory',['subcategories' => $category->childrenRecursive])
                                    @endif
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ route('contact.page') }}">contact</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
