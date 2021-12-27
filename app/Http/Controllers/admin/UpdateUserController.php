<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserController extends Controller
{
      // show list of users
    public function showUsers()
    {

       $users = User::all();
       $admin = Auth::user();
        return view('admin.showusers')->with('users',$users)->with('admin',$admin);
    }

        // edit user status
    public function editUserStatus($userid)
    {
        $user = User::find($userid);
        if($user->status == 'active')
        {
            $user->status = 'not active' ;
        }
        else
        {
            $user->status = 'active' ;
        }

        $user->save();
         return redirect()->back();

    }

     //delete user
    public function deleteUser($userid)
    {

        $user = User::find($userid);
        $user->delete();
        return redirect()->back()->with('msg','User deleted successfully');

    }

}
