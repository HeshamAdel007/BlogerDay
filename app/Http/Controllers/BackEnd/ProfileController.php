<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Profile;
use App\User;

class ProfileController extends Controller
{

     public function __construct() {

        $this->middleware(['permission:read_profile'])->only('show');
        $this->middleware(['permission:update_profile'])->only('update', 'edit');

    } // End Of Construct

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('pages.back-end.profile.index', compact('profile'));

    } // End Of Show


    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('pages.back-end.profile.edit', compact('profile'));

    } // End Of Edit


    public function update(ProfileRequest $request, $id)
    {

        $profile = Profile::findOrFail($id);

        // User Avater
        if ($request->avatar) {

            // Get All Directory In Storge/public
            $directories = Storage::directories('public');

            // Check If File images is Exists Or No
            if (Arr::has($directories, 'images') === false) {
                // If File images is Not Exists Make A New One
                $createDirectory = Storage::makeDirectory('public/images');
                // Get All Directory In Storge/public/images
                $directory = Storage::directories('public/images');
                // Check If File avatar is Exists Or No
                if (Arr::has($directory, 'avatar') === false) {
                    // If File avatar is Not Exists Make A New One
                    $createDirectory = Storage::makeDirectory('public/images/avatar');


                    if ($profile->avatar != 'avatar_default.png') {
                        //Check if have a default image dont remove the image
                        //if not have a default image
                            //1:remove old image
                            //2: add a new image
                        Storage::disk('public')->delete('/images/avatar/' . $profile->avatar);

                    }

                    $image = $request->avatar;
                    $fakeName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName(); // Image Name
                    Image::make($image)
                        ->resize(350, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(storage_path('app/public/images/avatar/' . $fakeName));

                    $profile->avatar = $fakeName;

                } // End Of If Check File avatar is Exists Or No

            } // End Of If Check File images is Exists Or No

        }

        $profile->nickname    = $request->nickname;
        $profile->description = $request->description;
        $profile->about       = $request->about;
        $profile->facebook    = $request->facebook;
        $profile->twitter     = $request->twitter;
        $profile->instagram   = $request->instagram;
        $profile->youtube     = $request->youtube;
        $profile->save();

        notify()->preset('profile-update');
        return redirect()->Route('dashboard.index');

    } // End Of Update

} // End Of Controller
