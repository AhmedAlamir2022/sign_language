<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function Profile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('student.profile',compact('userData'));
    }// End Method

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city	 = $request->city	;
        $data->save();
        $notification = array(
            'message' => trans('messages.Update'),
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }// End Method

    public function ChangePassword(){
        return view('student.change_password');
    }// End Method

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::user()->id);
            $users->password = Hash::make($request->newpassword);
            $users->save();

            $notification = array(
                'message' => trans('messages.Password_Update'),
                'alert-type' => 'info'
            );
            return back()->with($notification);
        } else{

            $notification = array(
                'message' => trans('messages.Old_Password'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }// End Method

    //function to logout student
    public function StudentLogout(){
        Auth::logout();
        $notification = array(
            'message' => trans('messages.Logout_successfully'),
            'alert-type' => 'error'
        );
        return redirect()->route('login')->with($notification);
    }//End of function
}
