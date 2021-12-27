<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{

    use GeneralTrait ;

        // show list of admins
public function index()
{
    $admins = Admin::where('id','<>',Auth::id())->get();
    $admin = Auth::user();

    return view('admin.showadmins')->with('admins',$admins)->with('admin',$admin) ;
}

        // show view 'add' new admin
public function create()
{
    $admin = Admin::find(Auth::id());
    return view('admin.addadmin')->with("admin" , $admin);
}

        // store new admin
public function store(Request $request)
{

    $admin = new Admin;
    $admin->first_name = $request->first_name ;
    $admin->last_name = $request->last_name ;
    $admin->email = $request->email ;
    $admin->password =Hash::make($request->password) ;
    $admin->avatar = 'img.jpg' ;
    $admin->save();
    return redirect()->back()->with('msg' , 'admin added successfully');
}

        // show view 'edit' admin
public function edit($id)
{
    $authAdmin =Auth::user();
$editadmin = Admin::findOrFail($id);
return view('admin.editAdmins')->with('editadmin',$editadmin)->with('admin', $authAdmin);

}

            //update admin information
public function update(Request $request, $id)
{
    $admin = Admin::find($id);
    if($admin->email !=$request->email){
        $request->validate([ 'email' => ['required', 'string', 'max:255', 'unique:admins']]);
    }
    $admin->email = $request->email ;
    $admin->password =Hash::make($request->password)  ;
    $admin->save();

    return redirect()->back()->with('msg' , "the information updated successfully");
}

    //delete specific admin
public function destroy($id)
{
    $admin = Admin::find($id);
    $admin->delete();
    return redirect()->back()->with('msg','admin deleted successfully');
}






}
