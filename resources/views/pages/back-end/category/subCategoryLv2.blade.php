@foreach($subcategories as $subcategory)
    <tr class="expandable-body">
        <td>
            <div class="p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                              {{$subcategory->name}}
                              {{-- Check Have Permission Update Category --}}
                                @if (Auth::user()->hasPermission('update_category'))
                                    <a href="{{Route('category.edit', ['id' => $subcategory->id ])}}" class="btn btn-primary">Edit</a>
                                @else
                                    <button class="btn btn-primary" disabled>Edit</button>
                                @endif
                                {{-- Check Have Permission Delete Category --}}
                                @if (Auth::user()->hasPermission('delete_category'))
                                    <a href="{{Route('category.delete', ['id' => $subcategory->id ])}}" class="btn btn-danger">Delete</a>
                                @else
                                    <button class="btn btn-danger" disabled>Delete</button>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
@endforeach
