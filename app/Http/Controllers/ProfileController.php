<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
// use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\Models\Image;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function profile_index()
    {
        $user_id=Auth::id();
        $user= User::where('id', $user_id)->first();
        // $user=Auth::user();
        return $user;
    }

    public function profile_email_change(Request $request)
    {
        try {
            $user_id=Auth::id();
            User::where('id', $user_id)->update(['email' => $request->email]);
            return "Email cahanged Successfully";
        } catch (Exception $e) {
            return 'Message: ' .$e->getMessage();
        }
    }

    public function profile_pass_change(Request $request)
    {
        // dd($request->curr_pass);
        $user_id=Auth::id();
        $user_pass=User::where('id', $user_id)->first()->password;
        if(Hash::check($request->curr_pass, $user_pass)){

        try {
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new1_pass)]);
            return "Password cahanged Successfully";
        } catch (Exception $e) {
            return 'Message: ' .$e->getMessage();
        }

        }
        else{
            return 'Current Password is Incorrect';
        }
    }


    public function profile_image_change(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
          ]);

          $imageExtension = $request->file->extension();
          $imageName="profile_".uniqid(rand(), true).".".$imageExtension;
          $request->file->move(public_path('img/profile_image/'), $imageName);

          // profile img
        $image = Image::make(public_path('img/profile_image/' . $imageName))->fit(300, 300);
        $image->save();

          $user_id=Auth::id();
          User::where('id', $user_id)->update(['profile_pic' => $imageName]);

          return response()->json('Image uploaded successfully');

    }

    public function profile_name_change(Request $request)
    {
        // dd($request->first_name);

        $user_id=Auth::id();
        User::where('id', $user_id)->update(['name' => $request->first_name]);
          return response()->json('Name Changed successfully');

    }
}
