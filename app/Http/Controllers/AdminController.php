<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Instructor;
use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //function to display admin login page
    public function Index(){
        return view('admin.login');
    }//End of function

    //function to login admin
    public function Login(Request $request){
        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'],'password' => $check['password']])){
            $notification = array(
                'message' => trans('messages.Login_successfully'),
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);
        }else{
            $notification = array(
                'message' => trans('messages.invalid'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }//End of function

    //function to dispaly admin dashboard page
    public function Dashboard(){
        return view('admin.dashboard');
    }//End of function

    //function to logout admin
    public function AdminLogout(){
        Auth::guard('admin')->logout();
        $notification = array(
            'message' => trans('messages.Logout_successfully'),
            'alert-type' => 'error'
        );
        return redirect()->route('admin_form')->with($notification);
    }//End of function

    //function to dispaly admin change password page
    public function ChangePassword(){
        return view('admin.change_password');
    }//End of function

    //function to update admin password
    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = Admin::find(Auth::guard('admin')->user()->id);
            $users->password = bcrypt($request->newpassword);
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
    }//End of function

    //function to dispaly admin profile page
    public function Profile(){
        $id = Auth::guard('admin')->user()->id;
        $userData = Admin::find($id);
        return view('admin.profile',compact('userData'));
    }//End of function

    //function to update admin profile
    public function StoreProfile(Request $request){
        $id = Auth::guard('admin')->user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city	 = $request->city	;
        $data->save();
        $notification = array(
            'message' => trans('messages.success'),
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }//End of function

    //function to dispaly admins page
    public function AllAdmins(){
        $admins = Admin::latest()->get();
        return view('admin.users.admins',compact('admins'));
    } //End of function

    //function to add new admin
    public function AddAdmin(Request $request){
        try{
            Admin::insert([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'contact' => $request->contact,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => trans('messages.success'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to delete admin
    public function DeleteAdmin($id){
        try{
            Admin::findOrFail($id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    } //End of function

    //function to dispaly all profs
    public function AllInst (){
        $insts = Instructor::latest()->get();
        return view('admin.users.instructors',compact('insts'));
    } //End of function

    //function to delete prfo
    public function DeleteInst(Request $request)
    {
        try {
            $insts = Instructor::findOrFail($request->id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to add new admin
    public function AddInst(Request $request){
        try{
            Instructor::insert([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'contact' => $request->contact,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => trans('messages.success'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to dispaly all students
    public function AllStudents  (){
        $students = User::latest()->get();
        return view('admin.users.students',compact('students'));
    } //End of function



    //function to delete student
    public function DeleteStudent(Request $request)
    {
        try {
            $student = User::findOrFail($request->id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function


}
