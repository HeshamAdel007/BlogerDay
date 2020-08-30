<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Setting;

class SettingController extends Controller
{
    public function __construct() {

        $this->middleware(['permission:read_setting'])->only('index');
        $this->middleware(['permission:update_setting'])->only('update', 'edit');

    } // End Of Construct

    public function index()
    {
        $settings = Setting::all();
        return view('pages.back-end.setting.edit', compact('settings'));

    } // End Of Index

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('pages.back-end.setting.edit', compact('setting'));

    } // End Of Edit

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        if ($request->logo) {

            // Get All Directory In Storge/public
            $directories = Storage::directories('public');

            // Check If File images is Exists Or No
            if (Arr::has($directories, 'images') === false) {
                // If File images is Not Exists Make A New One
                $createDirectory = Storage::makeDirectory('public/images');
                // Get All Directory In Storge/public/images
                $directory = Storage::directories('public/images');
                // Check If File logo is Exists Or No
                if (Arr::has($directory, 'logo') === false) {
                    // If File logo is Not Exists Make A New One
                    $createDirectory = Storage::makeDirectory('public/images/logo');


                    if ($setting->logo != 'website-logo.png') {
                        //Check if have a default image dont remove the image
                        //if not have a default image
                            //1:remove old image
                            //2: add a new image
                        Storage::disk('public')->delete('/images/logo/' . $setting->logo);

                    }
                    $image = $request->logo;
                    $fakeName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName(); // Image Name
                    Image::make($image)
                        ->resize(350, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(storage_path('app/public/images/logo/' . $fakeName));

                    $setting->logo = $fakeName;

                } // End Of If Check File logo is Exists Or No

            } // End Of If Check File images is Exists Or No

        }
        $setting->name        = $request->name;
        $setting->email       = $request->email;
        $setting->about       = $request->about;
        $setting->description = $request->description;
        $setting->facebook    = $request->facebook;
        $setting->twitter     = $request->twitter;
        $setting->instagram   = $request->instagram;
        $setting->youtube     = $request->youtube;
        $setting->save();

        notify()->preset('setting-update');
        return redirect()->back();

    } // End Of Update

} // End Of Controller
