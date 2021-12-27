<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\validatePasswoedRequest;
use App\Http\Requests\validateNameRequest;
use App\Http\Requests\validateImageRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{

        // show edit view for admin profile
        public function editprofile()
        {
            $admin = Admin::find(Auth::id());
            return view('admin.edit')->with('admin',$admin);
        }

                // update General information
        public function updateprofile(validateNameRequest $request)
        {


            $admin = Admin::find(Auth::id());
            if($admin->email !=$request->email){
                $request->validate([
                    'email' => ['required', 'string', 'max:255', 'unique:admins']
                ]);
            }

                $admin->first_name = $request->first_name ;
                $admin->last_name = $request->last_name ;
                $admin->email = $request->email ;
                $admin->save();

                return redirect()->back()->with('msg' , "the information updated successfully");

        }


                //update password
        public function upadate_profile_password(validatePasswoedRequest $request)
        {

            $admin  = Admin::find(Auth::id());
            if ( Hash::check($request->oldPassword, $admin->password)) {
                $admin->password =Hash::make($request->newPassword);
                $admin->save();
                return redirect()->back()->with('msgpass' , "the password updated successfully");
            }
        else{
                return redirect()->back()->with('msgincorrect' , "the old password incorrect");
            }

        }


                    //update image
        public function upadate_profile_image(validateImageRequest $request)
        {

            $admin  = Admin::find(Auth::id());
            if($request->hasfile('avatar'))
            {
                $file = $request->file('avatar');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/admin/', $filename);
                $admin->avatar = $filename;
            }

                $admin->save();
                return redirect()->back()->with('msgImg' ,"the picture updated successfully");
        }

}
