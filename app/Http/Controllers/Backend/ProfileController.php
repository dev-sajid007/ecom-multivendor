<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile.index');
    }


    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        if($request->hasFile('image')){
             if(File::exists(public_path($user->image))){
                 File::delete(public_path($user->image));
             }
 
             $image = $request->image;
             $imageName = rand().'_'.$image->getClientOriginalName();
             $image->move(public_path('uploads'), $imageName);
 
             $path = "/uploads/".$imageName;
 
             $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }
}
