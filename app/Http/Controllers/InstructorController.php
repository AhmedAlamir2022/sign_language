<?php

namespace App\Http\Controllers;
use App\Models\Instructor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    //function to display instructor login page
    public function Index(){
        return view('instructor.login');
    }//End of function

    //function to login admin
    public function Login(Request $request){
        $check = $request->all();

        if(Auth::guard('instructor')->attempt(['email' => $check['email'],'password' => $check['password']])){
            $notification = array(
                'message' => trans('messages.Login_successfully'),
                'alert-type' => 'success'
            );
            return redirect()->route('instructor.dashboard')->with($notification);
        }else{
            $notification = array(
                'message' => trans('messages.invalid'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }//End of function

    //function to dispaly instructor dashboard page
    public function Dashboard(){
        return view('instructor.dashboard');
    }//End of function

    //function to logout instructor
    public function InstructorLogout(){
        Auth::guard('instructor')->logout();
        $notification = array(
            'message' => trans('messages.Logout_successfully'),
            'alert-type' => 'error'
        );
        return redirect()->route('login_instructor')->with($notification);
    }//End of function

    //function to dispaly instructor change password page
    public function ChangePassword(){
        return view('instructor.change_password');
    }//End of function

    //function to update instructor password
    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::guard('instructor')->user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = Instructor::find(Auth::guard('instructor')->user()->id);
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

    //function to dispaly instructor profile page
    public function Profile(){
        $id = Auth::guard('instructor')->user()->id;
        $userData = Instructor::find($id);
        return view('instructor.profile',compact('userData'));
    }//End of function

    //function to update instructor profile
    public function StoreProfile(Request $request){
        $id = Auth::guard('instructor')->user()->id;
        $data = Instructor::find($id);
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

    //function to dispaly all students
    public function InstStudents  (){
        $students = User::latest()->get();
        return view('instructor.students.students',compact('students'));
    } //End of function

    //function to delete student
    public function DeleteInstStudent(Request $request)
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
