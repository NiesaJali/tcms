<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.view_profile',compact('user'));
    }

    public function ProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('backend.user.edit_profile',compact('editData'));
    }

    public function ProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    } 
    // End of Method

    public function PasswordView(){
        return view('backend.user.edit_password');
    }

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed', 
        ]);

        $hashedPassword = Auth::user()->password;
        // if condition to check if the password entered is the same as the current password
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            // to automate logout after changing password
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    } // End of Method

}