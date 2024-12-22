<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function AllStudInstMessages (){
        $stud_messages = Message::latest()->get();
        $insts = Instructor::all();
        return view('student.messages.inst_messages',compact('stud_messages', 'insts'));
    } // End Method

    public function SendStudInstMessage (Request $request){
        try{
            Message::insert([
                'inst_id' => $request->inst_id,
                'stud_id' => Auth::user()->id,
                'stud_message' => $request->stud_message,
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
    }// End Method

    //function to dispaly professor messages from admin
    public function AllInstMessages  (){
        $stud_messages = Message::latest()->get();
        $users = User::all();
        return view('instructor.messages.student_messages',compact('stud_messages', 'users'));
    } //End of function


    public function EditInstStudentMessage(Request $request)
    {
        try {
            $message_id = $request->id;
            Message::findOrFail($message_id)->update([
                'inst_message' => $request->inst_message,
            ]);
            $notification = array(
                'message' => trans('messages.Update'),
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to send message from professor to admin
    public function SendInstStudentMessage (Request $request){
        try{
            Message::insert([
                'inst_id' => Auth::guard('instructor')->user()->id,
                'stud_id' => $request->stud_id,
                'inst_message' => $request->inst_message,
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


    public function EditStudInstMessage (Request $request)
    {
        try {
            $message_id = $request->id;
            Message::findOrFail($message_id)->update([
                'stud_message' => $request->stud_message,
            ]);
            $notification = array(
                'message' => trans('messages.Update'),
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to dispaly all messages
    public function AllMessages  (){
        $mess = Message::latest()->get();
        return view('admin.messages.all_messages',compact('mess'));
    } //End of function
}
