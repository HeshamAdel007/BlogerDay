<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageGalaryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use App\Photo;

class PhotoController extends Controller
{

    public function __construct() {

        $this->middleware(['permission:read_gallery'])->only('index');
        $this->middleware(['permission:create_gallery'])->only('create');
        $this->middleware(['permission:update_gallery'])->only('update', 'edit');
        $this->middleware(['permission:delete_gallery'])->only('destroy');

    } // End Of Construct


    public function index()
    {
        $images = Photo::with('post:id,title')
            ->withCount('post')
            ->latest()->paginate(25);

        return view('pages.back-end.galary.index', compact('images'));

    } // End Of Index


    public function create()
    {
        return view('pages.back-end.galary.create');

    } // End Of Create


    public function store(ImageGalaryRequest $request)
    {
        // Get All Directory In Storge/public
        $directories = Storage::directories('public');

        // Check If File images is Exists Or No
        if (Arr::has($directories, 'images') === false) {
            // If File images is Not Exists Make A New One
            $createDirectory = Storage::makeDirectory('public/images');
            // Get All Directory In Storge/public/images
            $directory = Storage::directories('public/images');
            // Check If File post is Exists Or No
            if (Arr::has($directory, 'post') === false) {
                // If File post is Not Exists Make A New One
                $createDirectory = Storage::makeDirectory('public/images/post');

                // Resize Image
                $img = $request->imgs;
                $fakeName = time() . '-' . Str::random(10) . '-' . $img->getClientOriginalName(); // Image Name
                Image::make($img)
                    ->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/images/post/' . $fakeName));

                $photo               = new Photo;
                $photo->title        = $request->title;
                $photo->description  = $request->description;
                $photo->image        = $fakeName;
                $photo->save();
            }
        }

        notify()->preset('galary-create');
        return redirect()->Route('galary.index');

    } // End Of Story


    public function edit($id)
    {
        $photo   = Photo::findOrFail($id);
        return view('pages.back-end.galary.edit', compact('photo'));

    } // End Of Edit


    public function update(Request $request, $id)
    {

        $photo  = Photo::findOrFail($id);

        // Resize Image
        if ($request->imgs) {

            Storage::disk('public')->delete('images/post/' . $photo->image);

            $image = $request->imgs;
            $fakeName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName(); // Image Name
            Image::make($image)
                ->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/images/post/' . $fakeName));

            $photo->image = $fakeName;
        }

        $photo->title        = $request->title;
        $photo->description  = $request->description;
        $photo->save();

        notify()->preset('galary-update');
        return redirect()->Route('galary.index');

    } // End Of Update


    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::disk('public')->delete('images/post/' . $photo->image);
        $photo->delete();
        notify()->preset('galary-delete');
        return redirect()->Route('galary.index');

    } // End Of Destroy


} // End Of Controller
