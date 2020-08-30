<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    @foreach($settings as $setting)
        <img src="{{ asset(Storage::url('images/logo/' . $setting->logo))}}" alt="{{ $setting->name }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            @if(!empty($setting->name))
                {{ $setting->name }}
            @else
                {{ config('app.name', 'laravel') }}
            @endif
        </span>
      @endforeach
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-capitalize">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Dahsboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            dashboard
                        </p>
                    </a>
                </li>
                <!-- Post -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('post.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.trash') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>trush</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Category -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Tag -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            tag
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tag.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>tags</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tag.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Media -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            media
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>galary</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="margin-left: 1.5rem;">
                                    <a href="{{ route('galary.index') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>galary</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="margin-left: 1.5rem;">
                                    <a href="{{ route('image.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>create</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Admin -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.show', ['id'=>Auth::user()->id, 'user'=> strtolower(str_replace(' ', '-', Auth::user()->name))])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Setting -->
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            settings
                        </p>
                    </a>
                </li>
                <!-- contact -->
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            contact
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

{{-- <script>
$(document).ready(function() {
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
    return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
    return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
})
</script> --}}
