@extends('layouts.app')

@section('title', $category->name)


@section('content')
<!-- ##### Breadcrumb Area Start ##### -->
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
                            <li class="breadcrumb-item active" aria-current="page">     {{ $category->name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
 <!-- ##### Archive Grid Posts Area Start ##### -->
<div class="vizew-grid-posts-area mb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                @include('pages.front-end.category.category-post')
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="sidebar-area">
                    @include('layouts.front-end.sidebar')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
