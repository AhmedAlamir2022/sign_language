<?php

namespace App\Http\Controllers;
use App\Models\Homework;
use App\Models\Instructor;
use App\Models\User;
use App\Models\HSolution;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HSolutionController extends Controller
{
    use AttachFilesTrait;
    //function to to show student homeworks Solutions
    public function MyHomeworkSolutions  ()
    {
        $insts = Instructor::all();
        $homeworks = Homework::all();
        $solutions = HSolution::latest()->get();
        return view('student.homework.shomework',compact('insts','homeworks','solutions'));
    }//End of function

    //function to add new Solution homework
    public function AddSHomework (Request $request)
    {
        try {

            $shomework = new HSolution();
            $shomework->name =  $request->name;
            $shomework->inst_id =  $request->inst_id;
            $shomework->stud_id =  Auth::user()->id;
            $shomework->homework_id =  $request->homework_id;
            $shomework->hs_file =  $request->file('hs_file')->getClientOriginalName();
            $shomework->save();
            $this->uploadFile($request,'hs_file','Solutions');

            $notification = array(
                'message' => trans('messages.Update'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to download Solution for Student
    public function DownloadSAttachment($filename)
    {
        return response()->download(public_path('Attachments/Solutions/'.$filename));
    }//End of function

     //function to to show prof shomeworks
    public function InstructorSHomeworks    ()
    {
        $studs = User::all();
        $homeworks = Homework::all();
        $solutions = HSolution::latest()->get();
        return view('instructor.homework.shomework',compact('homeworks','solutions','studs'));
    }//End of function

    //function to download Solution for Professor
    public function DownloadSHomework($filename)
    {
        return response()->download(public_path('Attachments/Solutions/'.$filename));
    }//End of function
}
