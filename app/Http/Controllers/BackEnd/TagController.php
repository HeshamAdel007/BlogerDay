<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Tag;

class TagController extends Controller
{
    public function __construct() {

        $this->middleware(['permission:read_tag'])->only('index');
        $this->middleware(['permission:create_tag'])->only('create');
        $this->middleware(['permission:update_tag'])->only('update', 'edit');
        $this->middleware(['permission:delete_tag'])->only('destroy');

    } // End Of Construct

    public function index()
    {
        $tags = Tag::latest()->paginate(50);
        return view('pages.back-end.tag.index', compact('tags'));

    } // End Of Index


    public function create()
    {
        return view('pages.back-end.tag.create');

    } // End Of Create


    public function store(Request $request)
    {

        $validator = $this->validate($request,[
             'name' => 'required',
        ]);


        foreach ($request->name as $tag) {
            // Cheeck Filld Is Null Or No
            if ($tag == null) {
                notify()->preset('filled-null');
                return redirect()->back();
            } else {
                // Explode All Tags In Array
                $tags = explode(',', $tag);
                for ($i = 0; $i < count($tags); $i++) {
                    // Make Loop From This Array & Save Every Single Tag
                    $addTag          = new Tag;
                    $addTag->name    = $tags[$i];
                    $addTag->slug    = Str::slug($tags[$i]);
                    $addTag->save();

                }; // End For Loop

            }; // End If

        }; // End For Each

        notify()->preset('tag-create');
        return redirect()->Route('tag.index');

    } // End Of story


    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('pages.back-end.tag.edit', compact('tag'));

    } // End Of Edit


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
        ]);

        $tag          = Tag::findOrFail($id);
        $tag->name    = $request->name;
        $tag->slug    = Str::slug($request->name);
        $tag->save();

        notify()->preset('tag-update');
        return redirect()->Route('tag.index');

    } // End Of Update

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        notify()->preset('tag-delete');
        return redirect()->Route('tag.index');

    } // End Of Destroy

} // End Of Controller
