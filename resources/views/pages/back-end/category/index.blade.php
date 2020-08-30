@extends('layouts.adminPanel')

@section('title', 'Categories')

@section('content')
<section class="content" style="padding-top: 2rem;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <tbody>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <tr data-widget="expandable-table" aria-expanded="true">
                                        <td>
                                            <i class="fas fa-caret-right fa-fw"></i>
                                            {{ $category->name }}
                                            {{-- Check Have Permission Update Category --}}
                                            @if (Auth::user()->hasPermission('update_category'))
                                                <a href="{{Route('category.edit', ['id' => $category->id ])}}" class="btn btn-primary">Edit</a>
                                            @else
                                                <button class="btn btn-primary" disabled>Edit</button>
                                            @endif
                                            {{-- Check Have Permission Delete Category --}}
                                            @if (Auth::user()->hasPermission('delete_category'))
                                                <a href="{{Route('category.delete', ['id' => $category->id ])}}" class="btn btn-danger">Delete</a>
                                            @else
                                                <button class="btn btn-danger" disabled>Delete</button>
                                            @endif
                                                </td>
                                            </tr>
                                            @if(count($category->childrenRecursive))
                                                @include('pages.back-end.category.subCategoryLv2',['subcategories' => $category->childrenRecursive])
                                            @endif
                                @endforeach
                            @else
                                <div class="alert alert-warning" role="alert">
                                   <span> No have Any <strong> Categories </strong> </span>
                                </div>
                            @endif
                            </tbody>
                        </table><!-- End table-->
                    </div><!-- End Card body -->
                </div><!-- End Card -->
            </div> <!-- End Col -->
        </div> <!-- End Row -->
    </div> <!-- End Container -->
</section>
@endsection
