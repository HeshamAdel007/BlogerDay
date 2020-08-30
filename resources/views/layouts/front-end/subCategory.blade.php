@foreach($subcategories as $subcategory)
<ul class="dropdown">
    <li>
        <a  href="{{ route('category.page',['id'=>$subcategory->id, 'slug'=>$subcategory->slug]) }}">
            {{$subcategory->name}}
        </a>
    </li>
</ul>
@endforeach
