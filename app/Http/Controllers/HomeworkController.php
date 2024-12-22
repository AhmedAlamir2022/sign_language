<?php

namespace App\Http\Controllers;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Instructor;
use App\Models\Subject;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    use AttachFilesTrait;

    //function to get all the homeworks
    public function AllHomeworks ()
    {
        $insts = Instructor::all();
        $subjects = Subject::all();
        $homeworks = Homework::latest()->get();
        return view('admin.homework.homework',compact('homeworks','subjects','insts'));
    }//End of function

    //function to add new homework
    public function AddHomework(Request $request)
    {
        try {

            $homework = new Homework();
            $homework->name =  $request->name;
            $homework->subject_id =  $request->subject_id;
            $homework->inst_id =  $request->inst_id;
            $homework->h_file =  $request->file('h_file')->getClientOriginalName();
            $homework->save();
            $this->uploadFile($request,'h_file','Doucments');

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

    //function to download homework for administration
    public function DownloadAttachment($filename)
    {
        return response()->download(public_path('Attachments/Doucments/'.$filename));
    }//End of function

    //function to delete homework
    public function DeleteHomework (Request $request)
    {
        try {
            $this->deleteFile($request->h_file);
            $homeworks = Homework::findOrFail($request->id)->delete();
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

    //function to to show prof homeworks
    public function InstructorHomeworks   ()
    {
        $subjects = Subject::all();
        $homeworks = Homework::latest()->get();
        return view('instructor.homework.homework',compact('homeworks','subjects'));
    }//End of function

    //function to add prof homework
    public function AddInstHomework(Request $request)
    {
        try {

            $homework = new Homework();
            $homework->name =  $request->name;
            $homework->subject_id =  $request->subject_id;
            $homework->inst_id =  Auth::guard('instructor')->user()->id;
            $homework->h_file =  $request->file('h_file')->getClientOriginalName();
            $homework->save();
            $this->uploadFile($request,'h_file','Doucments');

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

    //function to download homework for prof
    public function DownloadInstAttachment ($filename)
    {
        return response()->download(public_path('Attachments/Doucments/'.$filename));
    }//End of function

    //function to delete homework for prof
    public function DeleteInstHomework  (Request $request)
    {
        try {
            $this->deleteFile($request->h_file);
            $homeworks = Homework::findOrFail($request->id)->delete();
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

    //function to to show student homeworks
    public function StudentHomework  ()
    {
        $subjects = Subject::all();
        $insts = Instructor::all();
        $homeworks = Homework::latest()->get();
        return view('student.homework.homework',compact('homeworks','subjects','insts'));
    }//End of function

    //function to download homework for student
    public function DownloadStudAttachment($filename)
    {
        return response()->download(public_path('Attachments/Doucments/'.$filename));
    }//End of function

    //function to upload the solution file
    public function AddHomeworkFile(Request $request)
    {
        try {
            $homework_id = $request->id;
            Homework::findOrFail($homework_id)->update([
                'status' => $request->status,
                'S_file' =>  $request->file('S_file')->getClientOriginalName(),
                $this->uploadFile($request,'S_file','Doucments')
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
}
